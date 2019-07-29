<!-- CSS... -->
<?php

session_start();

include("auth.php");
include("database.php");
$MenuItems = lekerdezes($db, "select * from MenuItems");

//ETTŐL LÁTSZIK AZ AMI BEJELENTKEZÉS UTÁN VAN
if (azonositott_e()) {
	$levels = lekerdezes($db, "select * from levels");
	$user_rounds = lekerdezes($db, "select * from rounds WHERE `user_id` = ".$_SESSION['felhasznalo']['id']);
}

?>


<!DOCTYPE html>
<!-- saved from url=(0085)http://webprogramozas.inf.elte.hu/ebr/public/storage/tasks/xmd13hejadu3xlzj/vegleges/ -->
<html lang="hu">
	<head>
		<meta charset="UTF-8"; http-equiv="Content-Type" content="text/html"> <!-- MI A MÁSIK 2?? -->
		<link rel="icon" href="https://cdn3.iconfinder.com/data/icons/food-155/100/Healthy_food_1-512.png">
		<title>Ételfutár</title>
		<script type="text/javascript" src="./javascript/index.js" src="./javascript/reg.js"></script>
		<link rel="stylesheet" href="./styles/index.css">
	</head>
	<body>
	<div id="munkalap_folott"></div>
		<article id="munkalap">

		<h1>Üdvözöljük, 
			<?php 
			
			echo (isset($_SESSION['felhasznalo'])) ? $_SESSION['felhasznalo']['username'].'!' : 'Ismeretlen! A rendeléshez előbb be kell jelentkeznie!';
			
			?>
		</h1>
		<h2>Kínálatunk</h2> 


		<details>
		<summary class="name" id='forras'>Előételek</summary>
		<aside class="types">
			<?php
				foreach($MenuItems as $MenuItem){ ?>
					<?php if($MenuItem['Category'] == 'Starter'){?>
						<li> 
							<a href="food.php?id=<?= $MenuItem['id'] ?>"><?= $MenuItem['Name'] ?></a>
							<div id="ar"><?php echo($MenuItem['Price'].' Ft') ?></div>
						</li>
					<?php } ?>
			<?php } ?>
			</aside>
			</details>
			<!-- </div> -->
			<p></p>


		<details>
		<summary class="name" id='forras'>Levesek</summary>
		<aside class="types">
		<?php
			foreach($MenuItems as $MenuItem){ ?>
				<?php if($MenuItem['Category'] == 'Soup'){?>
					<li> 
						<a href="food.php?id=<?= $MenuItem['id'] ?>"><?= $MenuItem['Name'] ?></a>
						<div id="ar"><?php echo($MenuItem['Price'].' Ft') ?></div>
					</li>
				<?php } ?>
		<?php } ?>
		</aside>
		</details>
		<p></p>


		<details>
		<summary class="name" id='forras'>Főételek</summary>
		<aside class="types">
		<?php
			foreach($MenuItems as $MenuItem){ ?>
				<?php if($MenuItem['Category'] == 'MainDish'){?>
					<li> 
						<a href="food.php?id=<?= $MenuItem['id'] ?>"><?= $MenuItem['Name'] ?></a>
						<div id="ar"><?php echo($MenuItem['Price'].' Ft') ?></div>
					</li>
				<?php } ?>
		<?php } ?>
		</aside>
		</details>
		<p></p>


		<details>
		<summary class="name" id='forras'>Pizzák</summary>
		<aside class="types">
		<?php
			foreach($MenuItems as $MenuItem){ ?>
				<?php if($MenuItem['Category'] == 'Pizza'){?>
					<li> 
						<a href="food.php?id=<?= $MenuItem['id'] ?>"><?= $MenuItem['Name'] ?></a>
						<div id="ar"><?php echo($MenuItem['Price'].' Ft') ?></div>
					</li>
				<?php } ?>
		<?php } ?>
		</aside>
		</details>
		<p></p>


		<details>
		<summary class="name" id='forras'>Desszertek</summary>
		<aside class="types">
		<?php
			foreach($MenuItems as $MenuItem){ ?>
				<?php if($MenuItem['Category'] == 'Dessert'){?>
					<li> 
						<a href="food.php?id=<?= $MenuItem['id'] ?>"><?= $MenuItem['Name'] ?></a>
						<div id="ar"><?php echo($MenuItem['Price'].' Ft') ?></div>
					</li>
				<?php } ?>
		<?php } ?>
		</aside>
		</details>
		<p></p>
	

		<details>
		<summary class="name" id='forras'>Italok</summary>
		<aside class="types">
		<?php
			foreach($MenuItems as $MenuItem){ ?>
				<?php if($MenuItem['Category'] == 'Drink'){?>
					<li> 
						<a href="food.php?id=<?= $MenuItem['id'] ?>"><?= $MenuItem['Name'] ?></a>
						<div id="ar"><?php echo($MenuItem['Price'].' Ft') ?></div>

					</li>
				<?php } ?>
		<?php } ?>
		</aside>
		</details>		
			
		<!-- <img class="center" src="https://www.logolynx.com/images/logolynx/56/56d86a284a675b2bee9758946f751a34.jpeg"> -->
		<!-- <p>Juttassa el Wall-E-t a sérülés helyére! Válasszon ki a kilenc utasítás közül ötöt, majd nyomjon rá az execute gombra, 
		hogy Wall-E végrehajtsa azokat. A pályán találhatóak különböző akadályok: a nyilak futószalagként működnek és a megjelölt 
		irányba mozgatják Wall-E-t, a fekete lyukak gödrök, ha Wall-E rájuk lép akkor lezuhan, a sárga szegélyű mezők pedig falak, 
		amin Wall-E nem tud átmenni, továbbá forgatók is vannak elhelyezve, amelyre rálépve Wall-E a megfelelő irányba forog. Utasítások:
		<ul>
			<li>→ Wall-E egyet megy abba az irányba, amerre áll.</li>
			<li>⮆ Wall-E kettőt megy abba az irányba, amerre áll.</li>
			<li>⇶ Wall-E hármat megy abba az irányba, amerre áll.</li>
			<li>⬏ Wall-E balra fordul.</li>
			<li>⬎ Wall-E jobbra fordul.</li>
			<li>⮌ Wall-E tesz egy 180˙-os fordulatot.</li>
			<li>← Wall-E tesz egy lépést azzal ellentétes irányba, amerre néz.</li>
		</ul>
		</p>
		EZ LESZ A BEJELENTKEZÉS ELŐTT IS LÁTHATÓ RÉSZ-->

		<?php if(azonositott_e()) { ?>
							<a href="..."><img style="width: 200px; height: 240px; class="gomb" type="button" src="https://cdn4.iconfinder.com/data/icons/shopping-21/64/shopping-06-512.png" alt="Shopping cart">					<a href="http://webprogramozas.inf.elte.hu/hallgatok/kojg0x/2.Beadando/Bonusz"><input class="gomb" type="button" value="<?php echo $level['label'] ?>"></a>

							<?php } ?>

		</article>
	</body>
</html>