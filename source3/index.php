<?php

session_start();

include("auth.php");
include("database.php");
$MenuItems = lekerdezes($db, "select * from MenuItems");

//ETTŐL LÁTSZIK AZ AMI BEJELENTKEZÉS UTÁN VAN
if (azonositott_e()) {
}

?>

<!DOCTYPE html>
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
		<h2 style="text-decoration: underline">Kínálatunk</h2> 


		<details>
		<summary class="name" id='forras'>Előételek</summary>
		<aside class="types">
			<?php
				foreach($MenuItems as $MenuItem){ ?>
					<?php if($MenuItem['Category'] == 'Starter'){?>
						<ul> 
							<a href="food.php?id=<?= $MenuItem['id'] ?>"><?= $MenuItem['Name'] ?></a>
							<div id="ar"><?php echo($MenuItem['Price'].' Ft') ?></div>
							<?php if(azonositott_e()) { ?>
								<a id="ar" href="basket.php"><img style="width: 50px; height: 50px"; class="gomb" type="button" src="https://cdn4.iconfinder.com/data/icons/shopping-21/64/shopping-06-512.png" alt="Shopping cart"></a>
							<?php } ?>
						</ul>
					<?php } ?>
			<?php } ?>
			</aside>
			</details>
			<p></p>


		<details>
		<summary class="name" id='forras'>Levesek</summary>
		<aside class="types">
		<?php
			foreach($MenuItems as $MenuItem){ ?>
				<?php if($MenuItem['Category'] == 'Soup'){?>
					<ul> 
						<a href="food.php?id=<?= $MenuItem['id'] ?>"><?= $MenuItem['Name'] ?></a>
						<div id="ar"><?php echo($MenuItem['Price'].' Ft') ?></div>
						<?php if(azonositott_e()) { ?>
							<a id="ar" href="basket.php"><img style="width: 50px; height: 50px"; class="gomb" type="button" src="https://cdn4.iconfinder.com/data/icons/shopping-21/64/shopping-06-512.png" alt="Shopping cart"></a>
						<?php } ?>
					</ul>
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
					<ul> 
						<a href="food.php?id=<?= $MenuItem['id'] ?>"><?= $MenuItem['Name'] ?></a>
						<div id="ar"><?php echo($MenuItem['Price'].' Ft') ?></div>
						<?php if(azonositott_e()) { ?>
							<a id="ar" href="basket.php"><img style="width: 50px; height: 50px"; class="gomb" type="button" src="https://cdn4.iconfinder.com/data/icons/shopping-21/64/shopping-06-512.png" alt="Shopping cart"></a>
						<?php } ?>
					</ul>
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
					<ul> 
						<a href="food.php?id=<?= $MenuItem['id'] ?>"><?= $MenuItem['Name'] ?></a>
						<div id="ar"><?php echo($MenuItem['Price'].' Ft') ?></div>
						<?php if(azonositott_e()) { ?>
							<a id="ar" href="basket.php"><img style="width: 50px; height: 50px"; class="gomb" type="button" src="https://cdn4.iconfinder.com/data/icons/shopping-21/64/shopping-06-512.png" alt="Shopping cart"></a>
						<?php } ?>
					</ul>
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
					<ul> 
						<a href="food.php?id=<?= $MenuItem['id'] ?>"><?= $MenuItem['Name'] ?></a>
						<div id="ar"><?php echo($MenuItem['Price'].' Ft') ?></div>
						<?php if(azonositott_e()) { ?>
							<a id="ar" href="basket.php"><img style="width: 50px; height: 50px"; class="gomb" type="button" src="https://cdn4.iconfinder.com/data/icons/shopping-21/64/shopping-06-512.png" alt="Shopping cart"></a>
						<?php } ?>
					</ul>
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
					<ul> 
						<a href="food.php?id=<?= $MenuItem['id'] ?>"><?= $MenuItem['Name'] ?></a>
						<div id="ar"><?php echo($MenuItem['Price'].' Ft') ?></div>
						<?php if(azonositott_e()) { ?>
							<a id="ar" href="basket.php"><img style="width: 50px; height: 50px"; class="gomb" type="button" src="https://cdn4.iconfinder.com/data/icons/shopping-21/64/shopping-06-512.png" alt="Shopping cart"></a>
						<?php } ?>
					</ul>
				<?php } ?>
		<?php } ?>
		</aside>
		</details>		
			
		<p></p>
		<?php if(!azonositott_e()) { ?>
			<div>
				<a class="types" href="./login.php">Bejelentkezés</a>
				<a class="types" href="./reg.php">Regisztráció</a>
			</div>
		<?php } ?>

		<?php if(azonositott_e()){ ?>
			<div>
				<a class="types" href="./logout.php">Kijelentkezés</a>
			</div>
		<?php } ?>

		</article>
	</body>
</html>