<?php
include "curl.php";
include "class.php";
// echo $resp;

if($resp)
{
    echo '<script type="text/javascript">toastr.success("Data Comes for Curl File")</script>';
}else
{
   echo '<script type="text/javascript">toastr.success("Data not Comes for Curl File")</script>';
}
 $abc = preg_match_all('/class\=\"row\sno\-gutter\sproduct\-desc\sgutter\-top\"\>(.*?)<\/div>/is',$resp,$data);

 if($abc)
 {
   echo '<script type="text/javascript">toastr.info("1st match data count '.$abc.'")</script>';
}else
{
   echo '<script type="text/javascript">toastr.error("not match any data")</script>';
}
 $data1 = $data[1];
 // print_r($price1);
 // echo "<pre>";
 // print_r($data[1]);
 echo "<table border='1' cellpadding='1px' cellspacing='1px'>
            <tr>
            <th>Sr No</th>
            <th>Name</th>
            <th>Image</th>
            <th>URL</th>
            <th>Price</th>
            <th>Description</th>
            <th>Product Details</th>
            </tr>
 ";
 $number = 1;
 foreach($data1 as $key => $value)
   {
    preg_match('/href\=\"(.*?)"(.*?)<\/a>/is',$value,$value1);

   $res = preg_replace('/\/lighting\//','https://www.thelightingshop.com/lighting/', $value1[1]); 
    // echo $res."<br>";    
    $demo = $class->data($res); 
    // echo "<pre>";
    // print_r($demo);
    // echo $demo[0]." ".$demo[1]."<br>";
     // data($res);
    // echo $res." ".$demo."<br>";
    echo "<tr>
        <td>$number</td>
        <td>$demo[0]</td>
        <td>$demo[4]Number of Image = $demo[5]</td>
        <td>$res</td>
        <td>$demo[1]</td>
        <td>$demo[2]</td>
        <td>$demo[3]</td>
    </tr>";
    $number++;

   }
 echo "</table>";






?>