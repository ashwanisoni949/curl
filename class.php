<?php

class cURL{

   function data($res){
    // echo $res."<br>";
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $res,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Cookie: ASP.NET_SessionId=soirykb5jb0y3yb3n2soc4bg; sd=s5gnwOAQGaKB9+L5dkAdDB6xmQTaYKXF/nRDDFtRh1Twb9mNEyf2HoirOqM37wLLlnYbAOFRo/v1YpiC4GNrL/nGU29OwuSbMV4nIYoEfXI=; shipEstLoc='
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        // echo $response;
        preg_match_all('/ctl00_ctl00_Body__mainContent_DetailOrig1_ProductPageTitleWrapper\".*?>(.*?)<\/div>/mis',$response,$test);
        // print_r($test[1][0]);
        preg_match('/class\=\"styleSalePricedp">(.*?)<\/span>/ism',$response,$price1);
        preg_match('/"ctl00_ctl00_Body__mainContent_DetailOrig1_ProductTabs_ProductDesc1_MfgDescPanel\">(.*?)<\/div>/ism',$response,$desc);
        echo "<pre>";
        // print_r($desc[1]);
        $xyz = preg_replace('/<h6.*?>(.*?)<\/h6>/ism','',$desc[1]);
        // print_r($xyz);
        preg_match_all('/PrSpecsName".*?>(.*?)<\/td>/ism',$response,$keys);
        // print_r($key[1]); 
       
        preg_match_all('/PrSpecsValue".*?>(.*?)<\/td>/ism',$response,$new_value);
          // print_r($keys);
          // print_r($new_value[1]);die;
        $data="";
         foreach ($keys[1]  as $key => $point) {
           // $data.= "<li>".$point."## ".$new_value[1][$key]."</li><br>";
           $data.= $point."## ".$new_value[1][$key]."<br>";
            // echo $point;
            //  echo "<br>"; 
            // // echo $key;
            // echo $new_value[1][$key];

        }
        preg_match('/<h1>(.*?)<\/h1>/si',$test[1][0],$test2);
        preg_match('/data-zoom-id\=\"ProductImage".*?>(.*?)<\/a>/ism',$response,$image);
        // print_r($image);
        preg_match_all('/id\=\"MoreImagesPanel".*?>(.*?)<\/div>/ism',$response,$image_count);
        // print_r($image_count[1][0]);
        preg_match_all('/resp-gallery-link ThumbLink cloudzoom-gallery.*?">(.*?)<\/a>/ism',$image_count[1][0],$imagecount);
        // print_r(count($imagecount[1]));
         $img_count = count(($imagecount[1]))-1;
         // echo $img_count;
       
        // print_r($image[1]);
        // return $res."<b> # </b>".$test2[1]."<br>";
       return array($test2[1],$price1[1],$xyz,$data,$image[1],$img_count);
}
}
$class = new cURL();
?>


<!-- /data-zoom-id\=\"ProductImage".*?>(.*?)<\/a>/gism -->
