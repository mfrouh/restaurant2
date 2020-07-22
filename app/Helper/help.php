<?php
function direction($text){
    for ($i=0; $i < strlen($text) ; $i++) {
       $fristletter=$text[$i];
       $containsar = Str::contains('أ,ب,ت,ث,ج,ح,خ,د,ذ,ر,ز,س,ش,ص,ض,ط,ظ,ع,غ,ف,ق,ك,ل,م,ن,هـ,و,ي',$fristletter);
       $containsen = Str::contains('a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z',strtolower($fristletter));
         if($containsar==1)
         {
            return "rtl";
         }
         elseif($containsen==1){
            return "ltr";
         }
     }
  }
  function floattext($text)
  {
      if(direction($text)=='rtl')
      {
        return "right";
      }
      else
      {
        return "left";
      }
  }
  function sorteimage($despath,$req_file_img){
    $destinationPath =$despath;
    $files = $req_file_img;
    $file_name =time() . $files->getClientOriginalName();
    $files->move($destinationPath, $file_name);
    return $file_name;
  }
  function active($value)
  {
    if ($value==0) {
        return 'لا';
    }
    if ($value==1) {
        return 'نعم';
    }
  }
  function typeoffer($value)
  {
    if ($value=="fixed") {
        return 'ثابت';
    }
    if ($value=="variable") {
        return 'متغير';
    }
  }
