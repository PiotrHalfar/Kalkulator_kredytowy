<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$amount = $_REQUEST ['amount'];
$period = $_REQUEST ['period'];
$percent = $_REQUEST ['percent'];


// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($amount) && isset($period) )) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane (mozliwe jest pominiecie wpisania wartosci oprocentowania)
if ( $amount == "") {
	$messages [] = 'Nie podano kwoty';
}
if ( $period == "") {
	$messages [] = 'Nie podano okresu spłaty';
}


//nie ma sensu walidować dalej gdy brak parametrów 
if (empty( $messages )) {
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $amount )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą';
	}
	if (! is_numeric( $period )) {
		$messages [] = 'Druga wartość nie jest liczbą';
	}	
	if (! is_numeric( $percent )&&!empty($percent)) {
		$messages [] = 'Trzecia wartość nie jest liczbą';
	}	
	if ( ($amount >intval(1000000))) {
		$messages [] = 'Maksymalna wartość kredytu to milion złoty';
	}
	if ( ($period >intval(120))) {
		$messages [] = 'Maksymalny okres splaty to 120 miesięcy';
	}

}

// 3. wykonaj zadanie jeśli wszystko w porządku
if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów
	$amount = floatval($amount);
	$period = intval($period);
	$percent = floatval($percent);
	
	$result = ($amount / $period) + (($amount / $period)* $percent/100); //dzielimy kwote przez liczbe miesiecy a nastepnie obliczamy procent z kwoty i dodajemy calosc
	$result = round($result, 2); //zaokraglenie wyniku do 2 liczb po przecinku
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_kredyt_view.php';