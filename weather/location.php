<?php
// エリアリスト
$areas = array(
  1850144 => '東京都',
  6940394 => '埼玉県（さいたま市）',
  2130404 => '北海道（江別市）',
  1856035 => '沖縄県（那覇市）',
  1853909 => '大阪府（大阪市）'
);
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
  <body  style="background:url(photo/background.jpg); background-size:cover;">
    <nav class="navbar navbar-expand-sm navbar-dark bg-warning  mb-5 pull-center">
        <a class="navbar-brand text-center" href="#">SELE℃T</a>
    </nav>    
    
    <div class="container">
      <div class="mt-5 text-center">
        <h1 class="font-weight-bold">お住まいの地域を選択してください</h1>
      </div>
      <div class="mt-5 text-center">
        <form action="api.php" method="get">
          <div class="form-group">
            <select name="area" id="area" calss="form-control-lg" style="font-size:35px">
              <?php foreach($areas as $key =>$area):?>
                <option value="<?=$key;?>"><?=$area;?></option>
              <?php endforeach;?>
            </select>
            <button type="submit" class="btn btn-warning"style="font-size:27px">ベストな服を探す</button>              
          </div>
        </form>          
      </div>
        <div class="col-2">
        </div>
      </div>
    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>