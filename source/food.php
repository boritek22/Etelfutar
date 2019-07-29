<?php 
include('database.php');

$id = $_GET['id'];
$MenuItem = lekerdezes($db,
    'select * from MenuItems where id = :id',
    [':id' => $id]
)[0];
?>

<!DOCTYPE html>
<html lang="hu">
<head>
		<meta charset="UTF-8"; http-equiv="Content-Type" content="text/html"> <!-- MI A MÁSIK 2?? -->
		<link rel="stylesheet" href="./styles/food.css">
    <a href="http://webprogramozas.inf.elte.hu/hallgatok/kojg0x/ETELFUTAR/">Vissza a menühöz</a>
    <link rel="icon" href="https://cdn3.iconfinder.com/data/icons/food-155/100/Healthy_food_1-512.png">
    <script type="text/javascript" src="./javascript/index.js" src="./javascript/reg.js"></script>
    <title>Ételfutár</title>
</head>
<body>
	<div id="munkalap_folott"></div>
		<article id="munkalap">



<div class="container">
  <div class="row">
    <div class="col-lg">
      <h2>Leírás</h2>
      <div class="card">
        <div class="row no-gutters">
          <div class="col-md-3">
            
            <span class="card-img food <? $MenuItem['Name'] ?>" style="width: 180px; height: 240px;">
          </div>
          <div class="col-md-9">
            <div class="card-body">
              <h3 class="card-title"><?= $MenuItem['Name'] ?></h3>
             
              <dl class="row">
                <dt class="col-sm-3">Vegetáriánus</dt>
                <?php
                    if ($MenuItem['Vegatarian'] == 0){
                      $Vegatarian = "No";
                    }
                    else{
                      $Vegatarian = "Yes";
                    }
                  ?>
                  <?= $Vegatarian ?>
                  </dl>

                  <dl class="row">
                  <dt class="col-sm-3">Csípős</dt>
                <?php
                    if ($MenuItem['Spicy'] == 0){
                      $Spicy = "No";
                    }
                    else{
                      $Spicy = "Yes";
                    }
                  ?>
                  <?= $Spicy ?>
                </dl>

                <dl class="row">
                <dt class="col-sm-3">Leírás</dt>
                <span><?= $MenuItem['Description'] ?></span>
              </dl>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 
</article>
</body>
</html>