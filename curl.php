<?php
include "toastr.php";
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://www.thelightingshop.com/Arteriors/0-0-0-445/list.aspx',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
        'Cookie: ASP.NET_SessionId=soirykb5jb0y3yb3n2soc4bg; sd=s5gnwOAQGaKB9+L5dkAdDB6xmQTaYKXF/nRDDFtRh1Twb9mNEyf2HoirOqM37wLLlnYbAOFRo/v1YpiC4GNrL/nGU29OwuSbMV4nIYoEfXI=; shipEstLoc=; visit_id=263541f726dd4bf4a6a8e5b46ed2d2fd; visitor_id=8604538c20784e1da63bb8ca9e96c5dd'
        ),
        ));

$resp = curl_exec($curl);
print_r($resp);die;

if (curl_error($curl)) {
    ?>
    <script>
            alert(`curl don't initialize .curl_error($curl)`);

    </script>
    <?php
}
$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
if($httpcode)
{
        echo '<script type="text/javascript">toastr.success("curl Connction Successfully")</script>';
        /*?>
        <script>
                // alert("connection successfully");
                toastr.success('Have Fun')
        </script>
        <?php*/
}


curl_close($curl);
// echo $resp;