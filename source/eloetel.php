<?php

session_start();

include("auth.php");
include("database.php");
$MenuItems = lekerdezes($db, "select * from MenuItems");

?>
<!DOCTYPE html>
<!-- saved from url=(0085)http://webprogramozas.inf.elte.hu/ebr/public/storage/tasks/xmd13hejadu3xlzj/vegleges/ -->
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<!-- BÉKAVÁRBÓL: LOGOT HOGY KELL???? -->
		<title>Ételfutár</title>
		<script type="text/javascript" src="./scripts/index.js"></script>
		<link rel="stylesheet" href="./styles/index.css">
	</head>
	<body>
<p>
			<?php
				foreach($MenuItems as $MenuItem){ ?>
					<?php if($MenuItem['Category'] == 'Starter'){ 
                        echo($MenuItem['Name'])
                        ?>
						<h1>ELŐÉTEL</h1>
					<?php } ?>
			<?php } ?>					
		</p>
        </body>
</html>