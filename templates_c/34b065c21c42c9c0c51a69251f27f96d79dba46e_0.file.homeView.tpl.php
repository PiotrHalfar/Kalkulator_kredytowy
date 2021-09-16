<?php
/* Smarty version 3.1.30, created on 2021-09-16 13:52:14
  from "G:\xampp\htdocs\kalkulator_kredytowy\app\home\homeView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_61432fee5400f5_42663075',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '34b065c21c42c9c0c51a69251f27f96d79dba46e' => 
    array (
      0 => 'G:\\xampp\\htdocs\\kalkulator_kredytowy\\app\\home\\homeView.tpl',
      1 => 1631793102,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61432fee5400f5_42663075 (Smarty_Internal_Template $_smarty_tpl) {
?>

<!DOCTYPE html>
<html lang="pl">
<head>

    <meta charset="utf-8"/>
	<title>Kalkulator Kredytowy</title>
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/main.css">
</head>

<body class="home">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
				<ul class="nav navbar-nav pull-right">
					<li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
">Strona Główna</a></li>
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcView">Kalkulator Kredytowy</a></li>
				</ul>
		</div>
	</div> 

	<header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">Witaj na stronie z kalkulatorami</h1>
				<p class="tagline">Za pomocą naszych kalkulatorów obliczysz wysokość raty kredytu!</p>
				<p><a class="btn btn-action btn-lg" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcView"">Kalkulator Kredytowy</a></p>
			</div>
		</div>
	</header>

	 <footer id="footer">
        <div class="footer2">
                <div class="container">
                        <div class="row">

                                <div class="col-md-12 widget">
                                        <div class="widget-body">
                                                <p class="text-right">
                                                        Copyright © 2021 Piotr Halfar
                                                </p>
                                        </div>
                                </div>
                        </div> 
                </div>
        </div>
    </footer>        
		




	
</body>
</html><?php }
}
