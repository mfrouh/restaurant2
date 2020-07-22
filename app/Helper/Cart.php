<?php

use App\product;

class Cart
{

 public static function create($id,$quantity=null)
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
     $item_array = array(
      'id'   => $id,
      'quantity'=>$q,
     );
    $cart_data[] = $item_array;
    $item_data = json_encode($cart_data,JSON_UNESCAPED_UNICODE);
    setcookie('Cart', $item_data, time() + (86400 * 30),'/');
 }

 public static function update($id,$quantity=null)
 {
     $cookie_data = stripslashes($_COOKIE['Cart']);
     $cart_data = json_decode($cookie_data, true);
     $id_list = array_column($cart_data, 'id');
     if(in_array($id, $id_list))
     {
        foreach($cart_data as $keys => $values)
        {
           if($cart_data[$keys]["id"] == $id && !isset($quantity))
           {
            $cart_data[$keys]["quantity"] = $cart_data[$keys]["quantity"] +1;
           }
           if($cart_data[$keys]["id"] == $id && isset($quantity))
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
       $arry+=$value*$product->price_with_offer;
    }
    return $arry;
 }
 public static function content()
 {
    if(isset($_COOKIE['Cart']))
    {
     $product=array();
     $quantity=array();
       foreach (json_decode($_COOKIE['Cart']) as $key => $value) {
         $product[]=$value->id;
         $quantity[$value->id]=$value->quantity;
       }
     return ['products'=>$product,'quantity'=>$quantity];
    }
    return ['products'=>[],'quantity'=>[]];
 }

 public static function createorupdate($id,$quantity=null)
 {
    if(isset($_COOKIE['Cart']) && in_array($id,self::content()['products']))
    {
      return  self::update($id,$quantity);
    }
    else
    {
      return  self::create($id,$quantity);
    }
 }

}
