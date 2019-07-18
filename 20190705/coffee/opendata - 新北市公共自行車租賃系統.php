<?php
//初始化 curl
  $curl = curl_init();
  //識別發出請求的軟體,/瀏覽器類型
  curl_setopt($curl, CURLOPT_USERAGENT,"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36");
  
  //預設為ture,要驗證https ssl憑證
  //如果來源是https網站時,沒有做其他設定會錯誤
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false);
  //將curl回傳的資料以字串接收,而不是直接顯示
/*   curl_setopt($curl, CURLOPT_RETURNTRANSFER,false); */  //AA
  curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);

 // curl_setopt($curl, CURLOPT_URL,"http://data.ntpc.gov.tw/api/v1/rest/datastore/382000000A-000371-001");
    curl_setopt($curl, CURLOPT_URL,"http://data.ntpc.gov.tw/api/v1/rest/datastore/382000000A-000352-001");
  //curl_setopt($curl, CURLOPT_URL,"https://gis.taiwan.net.tw/XMLReleaseALL_public/hotel_C_f.json");

  //curl_exec($curl); //AA
  $result = curl_exec($curl);
  //關閉curl
  curl_close($curl);

  $json=json_decode($result,true);
?>
<table border="1">
  <?php
    foreach($json["result"]["records"] as $rec){
  ?>
        <tr>
          <td><?=$rec["sna"]?></td>
          <td><?=$rec["sarea"]?></td>
          <td><?=$rec["mday"]?></td>
          <td><?=$rec["lat"]?></td>
          <td><?=$rec["lng"]?></td>
          <td><?=$rec["ar"]?></td>
        </tr>
  <?php 
    }
  ?>
</table>