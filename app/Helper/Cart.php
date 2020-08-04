<?php

use App\product;

class Cart
{

 public static function create($id,$variant=null,$additions=null,$quantity=null)
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
    $cartid=isset($variant)?'p'.$id.'v'.$variant:'p'.$id;
     $item_array = array(
      'id'   => $cartid,
      'product'=>$id,
      'variant'=>$v,
      'additions'=>$additions,
      'quantity'=>$q,
     );
    $cart_data[] = $item_array;
    $item_data = json_encode($cart_data,JSON_UNESCAPED_UNICODE);
    setcookie('Cart', $item_data, time() + (86400 * 30),'/');
 }

 public static function update($id,$variant=null,$additions=null,$quantity=null)
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
      return count(self::content()['products']);
    }
    return 0;
 }
 public static function total()
 {
    $arry=0;
    foreach (self::content()['quantity'] as $key => $value) {
       $product=product::where('id',$key)->first();
       $arry+=$value*$product->price;
    }
    return $arry;
 }
 public static function content()
 {
    $cart=array();
    if(isset($_COOKIE['Cart']))
    {
       foreach (json_decode($_COOKIE['Cart']) as $key => $value) {
         $cart['id']=$value->id;
         $cart['product']=$value->product;
         $cart['quantity']=$value->quantity;
         $cart['variant']=$value->variant?$value->variant:null;
         $cart['additions']=$value->additions?$value->additions:null;
         $cart['price']=$value->price;
       }
     return $cart;
    }
    return $cart;
 }

 public static function CreateORUpdate($id,$variant=null,$additions=null,$quantity=null)
 {
   $cookie_data = stripslashes($_COOKIE['Cart']);
   $cart_data = json_decode($cookie_data, true);
   $id_list = array_column($cart_data, 'id');
   $cartid=isset($variant)?'p'.$id.'v'.$variant:'p'.$id;
   
    if(isset($_COOKIE['Cart']) && in_array($cartid,$id_list))
    {
      return  self::update($id,$variant=null,$additions=null,$quantity);
    }
    else
    {
      return  self::create($id,$variant=null,$additions=null,$quantity);
    }
 }

}
