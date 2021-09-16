<?php
// Skrypt kontrolera głównego uruchamiający określoną
// akcję użytkownika na podstawie przekazanego parametru

//każdy punkt wejścia aplikacji (skrypt uruchamiany bezpośrednio przez klienta) musi dołączać konfigurację
// - w tym wypadku jest już tylko jeden punkt wejścia do aplikacji - skrypt ctrl.php
require_once dirname (__FILE__).'/../config.php';

//1. pobierz nazwę akcji
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

//2. wykonanie akcji
switch ($action) {
	default : // 'strona domowa'
	    // załaduj definicję kontrolera
                include_once $conf->root_path.'/app/home/Home.class.php';
                $control = new Home ();
		$control->generateView ();
	break;
        case 'calcView' :
                include_once $conf->root_path.'/app/calc/CalcControlKredyt.class.php';
		// utwórz obiekt i uzyj
		$control = new CalcControlKredyt ();
		$control->generateView ();
        break;
	case 'calcCompute' :
		// załaduj definicję kontrolera
		include_once $conf->root_path.'/app/calc/CalcControlKredyt.class.php';
		// utwórz obiekt i uzyj
		$control = new CalcControlKredyt ();
		$control->process ();
	break;

}
