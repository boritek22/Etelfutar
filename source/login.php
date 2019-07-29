<?php
include("database.php");
include("auth.php");

function ellenoriz($kapcsolat, $email, $password) {
  $felhasznalok = lekerdezes($kapcsolat,
    "SELECT * FROM `users` WHERE `email` = :email",
    [ ":email" => $email ] 
  );
  if (count($felhasznalok) === 1) {
    $felhasznalo = $felhasznalok[0];
    return password_verify($password, $felhasznalo["password"]) 
      ? $felhasznalo 
      : false;
  }
  return false;
}

session_start();

$hibak = [];
if (count($_POST) > 0) {
  $email = $_POST["email"];
  $password = $_POST["password"];

  $felhasznalo = ellenoriz($db, $email, $password);

  if ($felhasznalo === false) {
    $hibak[] = "Hibás adatok!";
  }

  if (count($hibak) === 0) {
    beleptet($felhasznalo);
    header("Location: index.php");
    exit();
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
</head>
<body>
  
<h2>Login</h2>
	
  <ul>
    <?php 
	
		foreach($hibak as $hiba) {
			echo '<li style="color: red">'.$hiba.'</li>';
		}

	?>
	</ul>

  <form action="" method="post">

      <label>
          Email
          <input type="text" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : '' ?>" name="email">
      </label>
      <br /><br />
      <label>
          Jelszó
          <input type="password" name="password" required> <br />
      </label>
      <br />
    <button type="submit">Bejelentkezik</button>
  </form>
  <br />
  <a href="reg.php">Regisztráció</a>

</body>
</html>