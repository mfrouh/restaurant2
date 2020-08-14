<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Order;
use App\Order_details;
use App\Product;
use Cart;
use Exception;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
      return $this->middleware('auth');
    }
    public function checkout()
    {
        return view('front.pages.checkout');
    }
    public function savecheckout(Request $request)
    {
        $this->validate($request,[
            'address'=>'required',
            'street'=>'required',
            'phone_number'=>'required|min:11|max:11',
           ]);
           Stripe::setApiKey(env('STRIPE_SECRET'));
        try {
           $token = $request['stripeToken'];
           $charge =Charge::create([
               'amount' => (Cart::total())*100,
               'currency' => 'egp',
               'description' => 'Example charge',
               'source' => $token,
               'receipt_email'=>auth()->user()->email,
               'metadata' =>[
               ]
           ]);
           $chargeid=$charge['id'];
         if($chargeid){
            $order =new Order();
            $order->discount =0;
            $order->total_price =Cart::total();
            $order->delivery_time =NULL;
            $order->payment_id =$chargeid;
            $order->state ="pending";
            $order->address =$request->address;
            $order->street =$request->street;
            $order->phone_number =$request->phone_number;
            $order->note_for_driver =$request->note_for_driver;
            $order->user_id =auth()->user()->id;
            $order->save();
            $products=Product::whereIn('id',Cart::content()['products'])->get();
           foreach ($products as $key => $product) {
            $order_details =new Order_details();
            $order_details->name =$product->name;
            $order_details->price =$product->price_with_offer;
            $order_details->total_price =$product->price_with_offer*Cart::content()['quantity'][$product->id];
            $order_details->quantity =Cart::content()['quantity'][$product->id];
            $order_details->product_id =$product->id;
            $order_details->order_id =$order->id;
            $order_details->save();
           }
            return redirect('/')->with('success',"track your order_id $order->id");
            }
           else
            {
            return back();
           }

        } catch(\Stripe\Exception\CardException $e) {
            // // Since it's a decline, \Stripe\Exception\CardException will be caught
            // echo 'Status is:' . $e->getHttpStatus() . '\n';
            // echo 'Type is:' . $e->getError()->type . '\n';
            // echo 'Code is:' . $e->getError()->code . '\n';
            // // param is '' in this case
            // echo 'Param is:' . $e->getError()->param . '\n';
            // echo 'Message is:' . $e->getError()->message . '\n';
            return back()->with('error',$e->getError()->message);
          } catch (\Stripe\Exception\RateLimitException $e) {
            // Too many requests made to the API too quickly
          } catch (\Stripe\Exception\InvalidRequestException $e) {
            // Invalid parameters were supplied to Stripe's API
          } catch (\Stripe\Exception\AuthenticationException $e) {
            // Authentication with Stripe's API failed
            // (maybe you changed API keys recently)
          } catch (\Stripe\Exception\ApiConnectionException $e) {
            // Network communication with Stripe failed
          } catch (\Stripe\Exception\ApiErrorException $e) {
            // Display a very generic error to the user, and maybe send
            // yourself an email
          } catch (Exception $e) {
            // Something else happened, completely unrelated to Stripe
          }
    }

}
