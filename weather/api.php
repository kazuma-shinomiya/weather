<?php
function getWeather($api_type, $area_id)
{
  $api_base = 'https://api.openweathermap.org/data/2.5/';
  $api_parm = '?id='.$area_id.'&units=metric&appid=cbbb71c892f2d312526f56efe90cc95a';
  $api_url = $api_base.$api_type.$api_parm;
  
  return json_decode(file_get_contents($api_url), true);
}
//エリアコードを取得
$area_id=$_GET['area'];

$response_now=getWeather('weather',$area_id);

//現在の天気
$now_weather=$response_now['weather'][0]['main'];

//現在の気温
$now_temp=$response_now['main']['temp'];

//気温ごとのおすすめの服
if(30<=$now_temp)
{
  $cloth='半袖';
  $advice='熱中症に気をつけて';
}elseif(25<=$now_temp&&$now_temp<30)
{
  $cloth='半袖';
  $advice='朝夜は薄手のカーディガンかシャツを羽織るとよい';
}elseif(20<=$now_temp&&$now_temp<25)
{
  $cloth='長袖のTシャツやシャツ、セーター';
  $advice='朝夜はジャケットなどで防寒対策を';
}elseif(15<=$now_temp&&$now_temp<20)
{
  $cloth='薄手のアウター、シャツ、セーター';
  $advice='風邪をひかないように';
}elseif(10<=$now_temp&&$now_temp<15)
{
  $cloth='薄手のコートやブルゾン、シャツ、セーター';
  $advice='寒いな〜';
}elseif(5<=$now_temp&&$now_temp<10)
{
  $cloth='冬物コート、ダウン';
  $advice='しっかりと防寒対策を';
}elseif($now_temp<=4)
{
  $cloth='冬物コート、ダウン';
  $advice='マフラーや手袋も忘れるな';
}

//天気ごとに表示を変える
switch($now_weather)
{
  case 'Clouds':
    $back='background:url(photo/clouds.jpg); background-size:cover;';
    $weather_name='曇り';
  break;
  case 'Clear':
    $back='background:url(photo/background.jpg); background-size:cover;';
    $weather_name='晴れ';
  break;
  case 'Rain':
    $back='background:url(photo/rain.jpg); background-size:cover;';
    $weather_name='雨';
  break;
  case 'Snow':
    $back='background:url(photo/snow.jpg); background-size:cover;';
    $weather_name='雪';
  break;
  case 'Atmosphere':
    $back='background:url(photo/clouds.jpg); background-size:cover;';
    $weather_name='霧';
  break;
  case 'Thunderstorm':
    $back='background:url(photo/clouds.jpg); background-size:cover;';
    $weather_name='雷';
  break;
  case 'Drizzle':
    $back='background:url(photo/clouds.jpg); background-size:cover;';
    $weather_name='霧雨';
  break;
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>気温✕服</title>
  </head>
  <body  style="<?=$back;?>">
    <nav class="navbar navbar-expand-sm navbar-dark bg-warning  mb-5 pull-center">
        <a class="navbar-brand text-center" href="#">SELE℃T</a>
    </nav>  
    <div class="container">
      <div class="row">
        <div class="col-6 text-center">
          <h1>天気：<?=$weather_name;?></h1>
        </div>
        <div class="col-6 text-center">
          <h1>現在の気温：<?=$now_temp;?>℃</h1>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-4">
          <img src="photo/cloth.jpg" alt="衣類のアイコンです" class="float-right" width="30%" height="auto">
        </div>
        <div class=col-8>
          <h1><?=$cloth;?></h1>
        </div>
      </div>
      <div class="row mt-5 mb-5">
        <div class="col-4">
          <img src="photo/advise.jpg" alt="吹き出しのアイコンです" class="float-right" width="30%" height="auto">
        </div>
        <div class=col-8>
          <h1><?=$advice;?></h1>
        </div>
      </div>
    </div>
    <div class="text-center"> 
      <a href='location.php'>
        <button type="button" class="btn btn-warning"style="font-size:27px">戻る</button>
      </a>
    </div>
    
  </body>
     
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>




