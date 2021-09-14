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
 <div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li><a href="index.html">Home</a></li>
					<li><a href="about.html">About</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">More Pages <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="sidebar-left.html">Left Sidebar</a></li>
							<li><a href="sidebar-right.html">Right Sidebar</a></li>
						</ul>
					</li>
					<li class="active"><a href="contact.html">Contact</a></li>			
				</ul>
			</div>
		</div>
	</div> 
    <header id="head" class="secondary"></header>
    <div class="container">
        <div class="row"> 
            <ol class="breadcrumb">
                            <li><a>Home</a></li>
                            <li class="active">Kalkulator Kredytowy</li>
                    </ol>
        </div>
        <div class="row"> 
            <article class="col-sm- maincontent">
            <header class="page-header">
                <h1 class="page-title">Kalkulator kredytowy</h1>
            </header>
        
            <p>Za pomocą kalkulatora możesz obliczyc wysokość swojej miesięcznej raty.</p>
 
                <form action="<?php print(_APP_URL);?>/app/calc_kredyt.php" method="post">
                    <div class="row">
                        <div class="col-sm-4">
                                <label for="id_amount">Kwota kredytu: </label>
                                <input class="form-control" placeholder="kwota w złotówkach" name="amount" value="<?php out($amount) ?>" />
                        </div>
                        <div class="col-sm-4">
                            <label for="id_period">Okres spłaty: </label>
                            <input class="form-control" placeholder="okres w miesiącach" name="period" value="<?php out($period) ?>" />
                        </div>
                        <div class="col-sm-4">
                            <label for="id_percent">Oprocentowanie: </label>
                            <input class="form-control" placeholder="procent" name="percent" value="<?php out($percent) ?>" />
                        </div>
                    </div>
                    <br> 
                    <div class="row">
                         <div class="col-sm-12 text-left">
                              <input class="btn btn-action" type="submit" value="Oblicz ratę">
                         </div>
                    </div>
                </form>
            </article>
        </div>       
    </div>  
    <br>
    
    
<div class="container">
    <div class="messages">
        <div class="row">
        <?php
        //wyświeltenie listy błędów, jeśli istnieją
        if (isset($messages)) {
                if (count ( $messages ) > 0) {
                echo '<h4>Wystąpiły błędy: </h4>';
                echo '<ol class="err">';
                        foreach ( $messages as $key => $msg ) {
                                echo '<li>'.$msg.'</li>';
                        }
                        echo '</ol>';
                }
        }
        ?> 

        </div> 
    </div>
</div> 
    
    
    
<?php if (isset($result)){ ?>
    <div class="container">
        <div class="row">
	<h4>Wynik</h4>
	<p class="res">
<?php print($result); ?>
	</p>
<?php } ?>
        </div>
    </div>
<br>  
                
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