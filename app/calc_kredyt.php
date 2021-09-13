<?php
// KONTROLER strony kalkulatora
require_once dirname(__FILE__).'/../config.php';

// W kontrolerze niczego nie wysyła się do klienta.
// Wysłaniem odpowiedzi zajmie się odpowiedni widok.
// Parametry do widoku przekazujemy przez zmienne.
// 
//ochrona kontrolera - poniższy skrypt przerwie przetwarzanie w tym punkcie gdy użytkownik jest niezalogowany
// 1. pobranie parametrów
function getParams(&$amount,&$period,&$percent)
{
	$amount = isset($_REQUEST['amount']) ? $_REQUEST['amount'] : null;
	$period = isset($_REQUEST['period']) ? $_REQUEST['period'] : null;
	$percent = isset($_REQUEST['percent']) ? $_REQUEST['percent'] : null;	
}

// 2. walidacja parametrów z przygotowaniem zmiennych dla widoku
// sprawdzenie, czy parametry zostały przekazane
function validate(&$amount,&$period,&$percent,&$messages)
{
	if ( ! (isset($amount) && isset($period) )) 
        {
                //sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
                return false;
	}
	// sprawdzenie, czy potrzebne wartości zostały przekazane (mozliwe jest pominiecie wpisania wartosci oprocentowania)
	if ( $amount == "") 
	{
                $messages [] = 'Nie podano kwoty';
	}
	if ( $period == "") 
	{
                $messages [] = 'Nie podano okresu spłaty';
	}
	//nie ma sensu walidować dalej gdy brak parametrów 
	if (count ( $messages ) != 0) return false;
	
	// sprawdzenie, czy $x i $y są liczbami całkowitymi
	if (! is_numeric( $amount )) 
        {
		$messages [] = 'Pierwsza wartość nie jest liczbą';
	}
	if (! is_numeric( $period )) 
        {
		$messages [] = 'Druga wartość nie jest liczbą';
	}	
	if (! is_numeric( $percent )&&!empty($percent)) 
        {
		$messages [] = 'Trzecia wartość nie jest liczbą';
	}	
    if ( ($amount >intval(1000000))) 
    {
		$messages [] = 'Maksymalna wartość kredytu to milion złoty';
	}
	if ( ($period >intval(120))) 
        {
		$messages [] = 'Maksymalny okres splaty to 120 miesięcy';
	}
        
         if (count ( $messages ) != 0) return false;
                else return true;
}

// 3. wykonaj zadanie jeśli wszystko w porządku
function process(&$amount,&$period,&$percent,&$messages,&$result)
{
	//konwersja parametrów
	$amount = floatval($amount);
	$period = intval($period);
	$percent = floatval($percent);
        	
        $result = ($amount / $period) + (($amount / $period)* $percent/100); //dzielimy kwote przez liczbe miesiecy a nastepnie obliczamy procent z kwoty i dodajemy calosc
        $result = round($result, 2); //zaokraglenie wyniku do 2 liczb po przecinku          
}
$amount = null;
$period = null;
$percent = null;
$result = null;
$messages = array();

//pobierz parametry i wykonaj zadanie jeśli wszystko w porządku
getParams($amount,$period,$percent);
if ( validate($amount,$period,$percent,$messages) ) 
{ // gdy brak błędów
	process($amount,$period,$percent,$messages,$result);
}
// 4. Wywołanie widoku z przekazaniem zmiennych
// - zainicjowane zmienne ($messages,$x,$y,$operation,$result)
//   będą dostępne w dołączonym skrypcie
include 'calc_kredyt_view.php';