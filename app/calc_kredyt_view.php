<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator Kredytowy</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>

<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button">Kolejna chroniona strona</a>
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout_kredyt.php" class="pure-button pure-button-active">Wyloguj</a>
</div>
    
<div style="width:90%; margin: 2em auto;"> 
   
<form action="<?php print(_APP_URL);?>/app/calc_kredyt.php" method="post" class="pure-form pure-form-stacked">
	<legend>Kalkulator kredytowy</legend>
        <p>Oblicz swoją miesięczną ratę kredytu:</p>
        <fieldset>
        
        <label for="id_amount">Kwota kredytu: </label>
	<input id="id_amount" type="text" name="amount" value="<?php out($amount) ?>" /><br />
	<label for="id_period">Okres spłaty (miesiące): </label>
	<input id="id_period" type="text" name="period" value="<?php out($period) ?>" /><br />
	<label for="id_percent">Oprocentowanie: </label>
	<input id="id_percent" type="text" name="percent" value="<?php out($percent) ?>" /><br />
        </fieldset>
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