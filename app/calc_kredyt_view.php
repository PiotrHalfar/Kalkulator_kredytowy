<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator Kredytowy</title>
</head>
<body>
<h2>Kalkulator kredytowy</h2>
<p>Oblicz swoją miesięczną ratę kredytu:</p>
<form action="<?php print(_APP_URL);?>/app/calc_kredyt.php" method="post">
	<label for="id_amount">Kwota kredytu: </label>
	<input id="id_amount" type="text" name="amount" value="<?php if(isset($x)) print($amount); ?>" /><br />
	<label for="id_period">Okres spłaty (miesiące): </label>
	<input id="id_period" type="text" name="period" value="<?php if(isset($y)) print($period); ?>" /><br />
	<label for="id_percent">Oprocentowanie: </label>
	<input id="id_percent" type="text" name="percent" value="<?php if(isset($z)) print($percent); ?>" /><br />
	<input type="submit" value="Oblicz ratę kredytu" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f00; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #0fe; width:200px;">
<?php echo 'Wysokość raty: '.$result. 'zł'; ?>
</div>
<?php } ?>

</body>
</html>