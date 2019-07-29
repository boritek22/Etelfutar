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
		<meta charset="UTF-8"; http-equiv="Content-Type" content="text/html">
		<link rel="stylesheet" href="./styles/food.css">
    <a href="http://webprogramozas.inf.elte.hu/hallgatok/kojg0x/ETELFUTAR/">Vissza a menühöz</a>
		<link rel="icon" href="https://cdn3.iconfinder.com/data/icons/food-155/100/Healthy_food_1-512.png">
    <script type="text/javascript" src="./javascript/index.js" src="./javascript/reg.js"></script>
    <title>Ételfutár</title>
</head>
<body style="background-image: url('https://i.pinimg.com/originals/76/89/c5/7689c5513084cd3ae199cec4f9b84af3.jpg')">
	<div id="munkalap_folott"></div>
		<article id="munkalap">



<div class="container">
  <div class="row">
    <div class="col-lg-10">
      <p></p><br>
    <div style="background-color: rgba(255, 255, 255, 0.6);">
      <h2 style="color: black">Leírás</h2>
      <div style="background-color: rgba(255, 255, 255, 0.7);">
        <div class="row no-gutters">
          <div class="col-md-1">
            
            <span class=" <? $MenuItem['Name'] ?>" style="width: 180px; height: 240px;">
          </div>
          <div class="col-md-9">
            <div class="card-body">
              <h3 style="color: black" class="card-title"><?= $MenuItem['Name'] ?></h3>
             
              <dl style="color: black" class="row">
                <dt class="col-sm-5">Vegetáriánus</dt>
                <?php
                    if ($MenuItem['Vegatarian'] == 0){
                      $Vegatarian = "Nem";
                    }
                    else{
                      $Vegatarian = "Igen";
                    }
                  ?>
                  <?= $Vegatarian ?>
                  </dl>

                  <dl style="color: black" class="row">
                  <dt class="col-sm-5">Csípősség</dt>
                <?php
                    if ($MenuItem['Spicy'] == 0){
                      $Spicy = "Nem csíp";
                    }
                    else{
                      $Spicy = "Csipős";
                    }
                  ?>
                  <?= $Spicy ?>
                </dl>

                  <dl style="color: black" class="row">
                  <dt class="col-sm-5">Leírás</dt>
                  <span><?= $MenuItem['Description'] ?></span>
                </dl>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
/* unvisited link */
a:link {
    color: red;
    background-color: rgba(255, 255, 255, 0.6);
    font-weight: bold;
    font-size: 20px;
  }
  
  /* visited link */
  a:visited {
    color: red;
    background-color: rgba(255, 255, 255, 0.6);
    font-weight: bold;
    font-size: 20px;
  }
  
  /* mouse over link */
  a:hover {
    color: green;
    background-color: rgba(255, 255, 255, 0.6);
    font-weight: bold;
    font-size: 20px;
  }
</style>
</article>
</body>
</html>