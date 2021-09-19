<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

namespace app\controllers;

class HomeControl{
    
        public function action_homeShow(){
		getMessages()->addInfo('Witaj w na stronie domowej');
		$this->generateView();
	}
	public function generateView()
       {        
            getSmarty()->assign('user',unserialize($_SESSION['user']));
            getSmarty()->display('homeView.tpl');
       }
			
}
