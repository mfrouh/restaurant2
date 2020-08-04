<?php

use App\Addition;
use App\Product;
use App\Variant;

class Cart
{

 public static function create($id,$variant=null,$additions=[],$quantity=null)
 {
    if(isset($_COOKIE["Cart"]))
    {
     $cookie_data = stripslashes($_COOKIE['Cart']);
     $cart_data = json_decode($cookie_data, true);
    }
    else
    {
     $cart_data = array();
    }
    $q=isset($quantity)?$quantity:1;
    $v=isset($variant)?$variant:null;
    $a=isset($additions)?$additions:[];
    $cartid=isset($variant)?'p'.$id.'v'.$variant:'p'.$id;
     $item_array = array(
      'id'   => $cartid,
      'product'=>$id,
      'variant'=>$v,
      'additions'=>$a,
      'quantity'=>$q,
     );
    $cart_data[] = $item_array;
    $item_data = json_encode($cart_data,JSON_UNESCAPED_UNICODE);
    setcookie('Cart', $item_data, time() + (86400 * 30),'/');
 }

 public static function update($id,$variant=null,$additions=[],$quantity=null)
 {
     $cookie_data = stripslashes($_COOKIE['Cart']);
     $cart_data = json_decode($cookie_data, true);
     $id_list = array_column($cart_data, 'id');
     $cartid=isset($variant)?'p'.$id.'v'.$variant:'p'.$id;
     if(in_array($cartid, $id_list))
     {
        foreach($cart_data as $keys => $values)
        {
           if($cart_data[$keys]["id"] == $cartid && !isset($quantity))
           {
            $cart_data[$keys]["quantity"] = $cart_data[$keys]["quantity"] +1;
           }
           if($cart_data[$keys]["id"] == $cartid && isset($quantity))
           {
            $cart_data[$keys]["quantity"] =$quantity;
           }
        }
    }
    $item_data = json_encode($cart_data,JSON_UNESCAPED_UNICODE);
    setcookie('Cart', $item_data, time() + (86400 * 30),'/');
 }

 public static function destroy($id)
 {
     $cookie_data = stripslashes($_COOKIE['Cart']);
     $cart_data = json_decode($cookie_data, true);
     foreach($cart_data as $keys => $values)
     {
      if($cart_data[$keys]['id'] == $id)
      {
       unset($cart_data[$keys]);
       $item_data = json_encode($cart_data,JSON_UNESCAPED_UNICODE);
       setcookie("Cart", $item_data, time() + (86400 * 30),'/');
      }
     }
  }

 public static function clear()
 {
    setcookie("Cart", "", time() - 3600,'/');
 }

 public static function count()
 {
    if(isset($_COOKIE['Cart']))
    {
      return count(self::content());
    }
    return 0;
 }
 public static function total()
 {
    $total=0;
    foreach (self::content() as $key => $value) {
       $total+=$value->price;
    }
    return $total;
 }
 public static function content()
 {
    $cart=array();
    if(isset($_COOKIE['Cart']))
    {
       foreach (json_decode($_COOKIE['Cart']) as $key => $value) {
         $cart['id']=$value->id;
         //get product
         $product=Product::where('id',$value->product)->first();
         //get variant  if found
         if ($value->variant) {
            $variant=Variant::where('id',$value->variant)->first();
            $price=$variant->price;
         }
         else
         {
            $variant=null;
            $price=$product->price;
         }
         //get additions if found
         if ($value->additions) {
            $additions=Addition::whereIn('id',$value->additions)->get();
            $addprice=0;
            foreach ($additions as $key => $addition) {
              $addprice+=$addition->price;
            }
            $price+=$addprice;
         }
         else
         {
            $additions=[];
         }
         $cart['product']=$product;
         $cart['quantity']=$value->quantity;
         $cart['variant']=$variant;
         $cart['additions']=$additions;
         $cart['price']=$price;
       }
     return $cart;
    }
    return $cart;
 }

 public static function CreateORUpdate($id,$variant=null,$additions=[],$quantity=null)
 {
   $cookie_data = stripslashes($_COOKIE['Cart']);
   $cart_data = json_decode($cookie_data, true);
   $id_list = array_column($cart_data, 'id');
   $cartid=isset($variant)?'p'.$id.'v'.$variant:'p'.$id;
   
    if(isset($_COOKIE['Cart']) && in_array($cartid,$id_list))
    {
      return  self::update($id,$variant=null,$additions=[],$quantity);
    }
    else
    {
      return  self::create($id,$variant=null,$additions=[],$quantity);
    }
 }

}
