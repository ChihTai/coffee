<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>東山咖啡 | 景點介紹</title>

    <!-- FAVIOCN -->
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">

    <!-- 網站META -->
    <!-- 說明最好要設，讓Google搜尋能抓到網站說明 -->
    <meta name="keywords" content="東山咖啡,咖啡,東山">
    <meta name="description" content="東山咖啡景點介紹">
    <meta name="author" content="泰山網頁設計班">

    <!-- FACEBOOK META -->
    <meta property="og:title" content="東山咖啡 | 景點介紹">
    <meta property="og:image" content="./img/Geography_03.jpg">
    <meta property="og:description" content="東山咖啡景點介紹">
    <meta property="og:site_name" content="東山咖啡">

    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/coffee.css">
    <link rel="stylesheet" href="./css/animate.css">
    <link rel="stylesheet" href="./css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./packages//core//main.min.css">
    <link rel="stylesheet" href="./packages/bootstrap/main.min.css">
    <!-- PWA -->
    <link rel="manifest" href="manifest.json">




</head>

<body>
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

  curl_setopt($curl, CURLOPT_URL,"http://data.ntpc.gov.tw/api/v1/rest/datastore/382000000A-000225-002");
  


  //curl_exec($curl); //AA
  $result = curl_exec($curl);
  //關閉curl
  curl_close($curl);

  $json=json_decode($result,true);
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-hover table-light table-rwd my-2 rounded " id="showtable">
                <thead class="thead-dark rounded th-hide">

                                <tr>
                                <td>行政區</td>
                                <td>停車場名稱</td>
                                <td>停車場概況</td>
                                <td>停車場地址</td>
                                <td>停車場收費資訊</td>
                                <td>開放時間</td>
                                <td>汽車總車位數</td>
                                </tr>

                </thead>
                <tbody>
                    <?php
                        foreach($json["result"]["records"] as $rec){
                            ?>
        <tr>
          <td><?=$rec["AREA"]?></td>
          <td><?=$rec["NAME"]?></td>
          <td><?=$rec["SUMMARY"]?></td>
          <td><?=$rec["ADDRESS"]?></td>
          <td><?=$rec["PAYEX"]?></td>
          <td><?=$rec["SERVICETIME"]?></td>
          <td><?=$rec["TOTALCAR"]?></td>


        </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    <div class="container-fluid bg-primary" id="footer">
        <div class="row justify-content-center">
            <div class="col-12 text-white text-center">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
                &copy;<script>let d = new Date; document.write(d.getFullYear());</script>泰山網頁設計班
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="" alt="" class="w-100 modal-img">
                    <br><br>
                    <h6><i class="fas fa-map-marker-alt text-success"></i>&nbsp;&nbsp;地址：<span class="modal-addr"></span></h6>
                    <h6><i class="fas fa-phone-alt text-success"></i>&nbsp;電話：<span class="modal-tel"></span></h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                </div>
            </div>
        </div>
    </div>
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/wow.min.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap4.min.js"></script>
    <script src="./packages/core/main.min.js"></script>
    <script src="./packages//bootstrap//main.min.js"></script>
 
    <script>
        
  /*           $.ajax({
              url:"http://data.ntpc.gov.tw/api/v1/rest/datastore/382000000A-000225-002",
              type:"GET",
              dataTppe:"json",
              success:function(r){
                //console.log(r);
                for(let i=0;i<r.length;i++){
                    let rowdata = [r[i].records.AREA, r[i].records.NAME];
                    console.log(rowdata);
                    showtable.row.add(rowdata).draw().node();
                 // console.log(r[i].title);
                 // $("#showtable").append(/*html*/
                 // <tr>
                 // <td>${r[i].title} </td>
                 // <td>${r[i].showInfo[0].time} </td>
                 // <td>${r[i].showInfo[0].locationName} </td>
                 // </tr>
        
                 // `);
               // }
             // }
           // }) */
            let showtable = $("#showtable").DataTable({
                "language":{
                "url": "./datatables-chinese-traditional.json"
                  }
              })
          </script>
</body>

</html>