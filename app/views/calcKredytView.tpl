<!DOCTYPE HTML>
<html lang="pl">
<head>
        <meta charset="utf-8"/>
	<title>Kalkulator Kredytowy</title>
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="{$conf->app_url}/css/bootstrap.min.css">
	<link rel="stylesheet" href="{$conf->app_url}/css/font-awesome.min.css">
	<link rel="stylesheet" href="{$conf->app_url}/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="{$conf->app_url}/css/main.css">
</head>

<body>
 <div class="navbar navbar-inverse navbar-static-top headroom" >
		<div class="container">
				<ul class="nav navbar-nav pull-right">
					<li><a href="{$conf->action_url}">Strona Główna</a></li>		
					<li class="active"><a href="{$conf->action_url}calcView">Kalkulator Kredytowy</a></li>
                                        <li><a href="{$conf->action_url}logout">Wyloguj</a></li>  
				</ul>
		</div>
	</div> 
    <div class="container">
        <div class="row"> 
            <ol class="breadcrumb">
                            <li><a href="{$conf->action_url}">Strona Główna</a></li>
                            <li class="active"><a href="{$conf->action_url}calcView">Kalkulator Kredytowy</a></li>
                    </ol>
        </div>
        <div class="row"> 
            <article class="col-sm- maincontent">
            <header class="page-header">
                <h1 class="page-title">Kalkulator kredytowy</h1>
            </header>
        
            <p>Za pomocą kalkulatora możesz obliczyc wysokość swojej miesięcznej raty.</p>
 
                <form action="{$conf->action_root}calcCompute" method="post">
                    <div class="row">
                        <div class="col-sm-4">
                                <label for="amount">Kwota kredytu: </label>
                                <input class="form-control" placeholder="kwota w złotówkach" name="amount" value="{$form->amount}" />
                        </div>
                        <div class="col-sm-4">
                            <label for="period">Okres spłaty: </label>
                            <input class="form-control" placeholder="okres w miesiącach" name="period" value="{$form->period}" />
                        </div>
                        <div class="col-sm-4">
                            <label for="percent">Oprocentowanie: </label>
                            <input class="form-control" placeholder="procent" name="percent" value="{$form->percent}" />
                        </div>
                    </div>
                    <br> 
                    <div class="row">
                         <div class="col-sm-4 text-left">
                              <input class="btn btn-action btn-lg" type="submit" value="Oblicz ratę">
                         </div>
                    </div>
                </form>
            </article>
        </div>       
    </div>  
    <br>
    
    
<div class="container">
    <div class="row">
<div class="messages">

{* wyświeltenie listy błędów, jeśli istnieją *}
{if $msgs->isError()}
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	{foreach $msgs->getErrors() as $err}
	{strip}
		<li>{$err}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{* wyświeltenie listy informacji, jeśli istnieją *}
{if $msgs->isInfo()}
	<h4>Informacje: </h4>
	<ol class="inf">
	{foreach $msgs->getInfos() as $inf}
	{strip}
		<li>{$inf}</li>
	{/strip}
	{/foreach}
	</ol>
{/if}

{if isset($res->result)}
	<h4>Wysokość raty wynosi:</h4>
	<p class="res">
	{$res->result}zł
	</p>
{/if}
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
                                                        Copyright © 2021 Piotr Halfar
                                                </p>
                                        </div>
                                </div>
                        </div> 
                </div>
        </div>
    </footer>            
</body>
</html>