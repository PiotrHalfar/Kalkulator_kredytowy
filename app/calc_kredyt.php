<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.

// 1. pobranie parametrów

$x = $_REQUEST ['x'];
$y = $_REQUEST ['y'];
$z = $_REQUEST ['z'];


// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku

// sprawdzenie, czy parametry zostały przekazane
if ( ! (isset($x) && isset($y) )) {
	//sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

// sprawdzenie, czy potrzebne wartości zostały przekazane (mozliwe jest pominiecie wpisania wartosci oprocentowania)
if ( $x == "") {
	$messages [] = 'Nie podano kwoty';
}
if ( $y == "") {
	$messages [] = 'Nie podano dlugosci splaty';
}


//nie ma sensu walidować dalej gdy brak parametrów 
if (empty( $messages )) {
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $x )) {
		$messages [] = 'Pierwsza wartość nie jest liczbą';
	}
	if (! is_numeric( $y )) {
		$messages [] = 'Druga wartość nie jest liczbą';
	}	
	if (! is_numeric( $z )&&!empty($z)) {
		$messages [] = 'Trzecia wartość nie jest liczbą';
	}	
	if ( ($x >intval(1000000))) {
		$messages [] = 'Maksymalna wartość kredytu to milion złoty';
	}
	if ( ($y >intval(120))) {
		$messages [] = 'Maksymalny okres splaty to 120 miesięcy';
	}

}

// 3. wykonaj zadanie jeśli wszystko w porządku
if (empty ( $messages )) { // gdy brak błędów
	
	//konwersja parametrów
	$x = floatval($x);
	$y = intval($y);
	$z = floatval($z);
	
	$result = ($x / $y) + (($x / $y)* $z/100); //dzielimy kwote przez liczbe miesiecy a nastepnie obliczamy procent z kwoty i dodajemy calosc
	$result = round($result, 2); //zaokraglenie wyniku do 2 liczb po przecinku
}

// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_kredyt_view.php';