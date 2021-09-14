<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html lang="pl">
<head>

        <meta charset="utf-8"/>
	<title>Kalkulator Kredytowy</title>
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="<?php print(_APP_URL); ?> ../lib/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php print(_APP_URL); ?> ../lib/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php print(_APP_URL); ?> ../lib/assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="<?php print(_APP_URL); ?> ../lib/assets/css/main.css">

</head>
<body>
 
    <div class="container">
        <div class="row"> 
            <header class="page-header">
                <h1 class="page-title">Kalkulator kredytowy</h1>
            </header>
            <p>Za pomocą kalkulatora możesz obliczyc wysokość swojej miesięcznej raty.</p>

            <form action="<?php print(_APP_URL);?>/app/calc_kredyt.php" method="post">
                <div class="col">
                        <label for="id_amount">Kwota kredytu: </label>
                        <input id="id_amount" type="text" placeholder="kwota w złotówkach" name="amount" value="<?php out($amount) ?>" /><br />
                </div>
                <div class="col">
                    <label for="id_period">Okres spłaty: </label>
                    <input id="id_period" type="text" placeholder="okres w miesiącach" name="period" value="<?php out($period) ?>" /><br />
                </div>
                <div class="col">
                    <label for="id_percent">Oprocentowanie: </label>
                    <input id="id_percent" type="text" placeholder="procent" name="percent" value="<?php out($percent) ?>" /><br />
                </div>
                    
                        <div class="col text-left">
                             <input class="btn btn-action" type="submit" value="Oblicz ratę kredytu">
                        </div>
            </form>	                         

    <div class="row">   
<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) 
        {
		echo '<ol style="margin: 15px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f00; width:300px;">';
		foreach ( $messages as $key => $msg ) 
                {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>
    </div> 
<?php if (isset($result)){ ?>
   
    <div class="row">   

            <div style=" margin: 15px; padding: 10px; border-radius: 5px; background-color: #0fe; width:200px;">
<?php echo 'Wysokość raty: '.$result. 'zł'; ?>
            </div>

        </div>
    </div>
       </div>
<?php } ?>
    

    <footer id="footer">

        <div class="footer2">
                <div class="container">
                        <div class="row">

                                <div class="col-md-12 widget">
                                        <div class="widget-body">
                                                <p class="text-right">
                                                        Copyright © 2021,By Piotr Halfar
                                                </p>
                                        </div>
                                </div>
                        </div> 
                </div>
        </div>
    </footer>
            
</body>
</html>