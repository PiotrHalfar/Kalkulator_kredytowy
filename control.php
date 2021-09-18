<?php
require_once 'init.php';
// Skrypt kontrolera głównego jako jedyny "punkt wejścia" inicjuje aplikację.

// Inicjacja ładuje konfigurację, definiuje funkcje getConf(), getMessages() oraz getSmarty(),
// pozwalające odwołać się z każdego miejsca w systemie do obiektów konfiguracji, messages i smarty.

// Ponadto ładuje skrypt funkcji pomocniczych (functions.php) oraz wczytuje parametr 'action' do zmiennej $action.
// Wystarczy już tylko podjąć decyzję co zrobić na podstawie $action.

// Dodatkowo zmieniono organizację kontrolerów i widoków. Teraz wszystkie są w odpowiednio nazwanych folderach w app



switch ($action) {
	default : // 'strona domowa'
	    // załaduj definicję kontrolera
                include_once 'app/controllers/HomeControl.class.php';
                $control = new HomeControl ();
		$control->generateView ();
	break;
        case 'calcView' :
                include_once 'app/controllers/CalcControlKredyt.class.php';
		// utwórz obiekt i uzyj
		$control = new CalcControlKredyt ();
		$control->generateView ();
        break;
	case 'calcCompute' :
		// załaduj definicję kontrolera
		include_once 'app/controllers/CalcControlKredyt.class.php';
		// utwórz obiekt i uzyj
		$control = new CalcControlKredyt ();
		$control->process ();
	break;

}
