<?php
/* Smarty version 3.1.30, created on 2021-09-15 14:36:45
  from "G:\xampp\htdocs\kalkulator_kredytowy\app\calc_kredyt_view.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6141e8dd96c040_99189819',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86cffebbfaf06872397bfd9c025c7c29ae5504de' => 
    array (
      0 => 'G:\\xampp\\htdocs\\kalkulator_kredytowy\\app\\calc_kredyt_view.php',
      1 => 1631708727,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6141e8dd96c040_99189819 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>

        <meta charset="utf-8"/>
	<title>Kalkulator Kredytowy</title>
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="<?php echo '<?php';
echo $_smarty_tpl->tpl_vars['this']->value->conf->app_url;
echo '?>';?> /css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo '<?php';
echo $_smarty_tpl->tpl_vars['this']->value->conf->app_url;
echo '?>';?> /css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo '<?php';
echo $_smarty_tpl->tpl_vars['this']->value->conf->app_url;
echo '?>';?> /css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="<?php echo '<?php';
echo $_smarty_tpl->tpl_vars['this']->value->conf->app_url;
echo '?>';?> /css/main.css">
    
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
 
                <form action="<?php echo '<?php';
echo $_smarty_tpl->tpl_vars['this']->value->{$_smarty_tpl->tpl_vars['conf']->value}->app_url;
echo '?>';?>/app/calc.php " method="post">
                    <div class="row">
                        <div class="col-sm-4">
                                <label for="amount">Kwota kredytu: </label>
                                <input class="form-control" placeholder="kwota w złotówkach" name="amount" value="<?php echo '<?php ';?>$this->form->amount<?php echo '?>';?>" />
                        </div>
                        <div class="col-sm-4">
                            <label for="period">Okres spłaty: </label>
                            <input class="form-control" placeholder="okres w miesiącach" name="period" value="<?php echo '<?php ';?>$this->form->period<?php echo '?>';?>" />
                        </div>
                        <div class="col-sm-4">
                            <label for="percent">Oprocentowanie: </label>
                            <input id="percent" type="text" placeholder="procent" name="percent" value="<?php echo '<?php ';?>$this->form->percent<?php echo '?>';?>" />
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
<?php echo '<?php ';?>if (isset($res->result)){ <?php echo '?>';?>
    
	<h4>Wynik</h4>
	<p class="res">
        ($res->result);
	</p>
<?php echo '<?php ';?>} <?php echo '?>';?>
        </div>
    </div>
<br>  
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
