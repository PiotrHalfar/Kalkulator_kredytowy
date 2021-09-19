<?php
require_once 'init.php';
// Skrypt kontrolera głównego jako jedyny "punkt wejścia" inicjuje aplikację.

// Inicjacja ładuje konfigurację, definiuje funkcje getConf(), getMessages() oraz getSmarty(),
// pozwalające odwołać się z każdego miejsca w systemie do obiektów konfiguracji, messages i smarty.

// Ponadto ładuje skrypt funkcji pomocniczych (functions.php) oraz wczytuje parametr 'action' do zmiennej $action.
// Wystarczy już tylko podjąć decyzję co zrobić na podstawie $action.

// Dodatkowo zmieniono organizację kontrolerów i widoków. Teraz wszystkie są w odpowiednio nazwanych folderach w app

getConf()->login_action = 'login'; //określenie akcji logowania - robimy to w tym miejscu, ponieważ tu są zdefiniowane wszystkie akcje

switch ($action) {
	default : // 'strona domowa'
                 control('app\\controllers', 'HomeControl', 'generateView', ['user', 'admin']);
        case 'login': 
		control('app\\controllers', 'LoginControl', 'doLogin');
        case 'calcView' :
                control('app\\controllers', 'CalcControlKredyt', 'generateView', ['user','admin'] );
	case 'calcCompute' :
                control(null, 'CalcControlKredyt', 'process', ['user','admin']);
        case 'logout' : 
		control(null, 'LoginControl', 'doLogout', ['user','admin']);

}