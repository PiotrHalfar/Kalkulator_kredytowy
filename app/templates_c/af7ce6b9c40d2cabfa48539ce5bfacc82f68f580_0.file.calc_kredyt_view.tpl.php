<?php
/* Smarty version 3.1.30, created on 2021-09-15 15:00:54
  from "G:\xampp\htdocs\kalkulator_kredytowy\app\calc_kredyt_view.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6141ee86e4e094_12685062',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af7ce6b9c40d2cabfa48539ce5bfacc82f68f580' => 
    array (
      0 => 'G:\\xampp\\htdocs\\kalkulator_kredytowy\\app\\calc_kredyt_view.tpl',
      1 => 1631710852,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6141ee86e4e094_12685062 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE HTML>
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
<body>
 <div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li><a>Home</a></li>
					<li><a>About</a></li>
					
					<li class="active"><a>Contact</a></li>			
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
 
                <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/app/calc_kredyt.php " method="post">
                    <div class="row">
                        <div class="col-sm-4">
                                <label for="amount">Kwota kredytu: </label>
                                <input class="form-control" placeholder="kwota w złotówkach" name="amount" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->amount;?>
" />
                        </div>
                        <div class="col-sm-4">
                            <label for="period">Okres spłaty: </label>
                            <input class="form-control" placeholder="okres w miesiącach" name="period" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->period;?>
" />
                        </div>
                        <div class="col-sm-4">
                            <label for="percent">Oprocentowanie: </label>
                            <input class="form-control" placeholder="procent" name="percent" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->percent;?>
" />
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
<div class="messages">


<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
?>
	<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</ol>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
	<h4>Informacje: </h4>
	<ol class="inf">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
?>
	<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</ol>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['res']->value->result)) {?>
	<h4>Wynik</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>
.zł
	</p>
<?php }?>
<br>  
    </div>  
    </div>
    </div>
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
</html><?php }
}
