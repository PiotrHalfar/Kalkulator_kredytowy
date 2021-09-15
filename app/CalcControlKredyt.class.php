<?php
// W skrypcie definicji kontrolera nie trzeba dołączać problematycznego skryptu config.php,
// ponieważ będzie on użyty w miejscach, gdzie config.php zostanie już wywołany.

require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/CalcFormKredyt.class.php';
require_once $conf->root_path.'/app/CalcResultKredyt.class.php';


class CalcControlKredyt{
	private $msgs;   //wiadomości dla widoku
	private $form;   //dane formularza (do obliczeń i dla widoku)
	private $result; //inne dane dla widoku

	/** 
	 * Konstruktor - inicjalizacja właściwości
	 */
	public function __construct(){
		//stworzenie potrzebnych obiektów
		$this->msgs = new Messages();
		$this->form = new CalcFormKredyt();
		$this->result = new CalcResultKredyt();
	}
	
	/** 
	 * Pobranie parametrów
	 */
	public function getParams(){
		$this->form->amount = isset($_REQUEST ['amount']) ? $_REQUEST ['amount'] : null;
		$this->form->period = isset($_REQUEST ['period']) ? $_REQUEST ['period'] : null;
		$this->form->percent = isset($_REQUEST ['percent']) ? $_REQUEST ['percent'] : null;
	}
	
	/** 
	 * Walidacja parametrów
	 * @return true jeśli brak błedów, false w przeciwnym wypadku 
	 */
	public function validate() {
		// sprawdzenie, czy parametry zostały przekazane
		if (! (isset ( $this->form->amount ) && isset ( $this->form->period ) && isset ( $this->form->percent ))) {
			// sytuacja wystąpi kiedy np. kontroler zostanie wywołany bezpośrednio - nie z formularza
			return false; //zakończ walidację z błędem
		}
		
		// sprawdzenie, czy potrzebne wartości zostały przekazane
		if ($this->form->amount == "") {
			$this->msgs->addError('Nie podano kwoty');
		}
		if ($this->form->period == "") {
			$this->msgs->addError('Nie podano okresu splaty');
		}
		
		// nie ma sensu walidować dalej gdy brak parametrów
		if (! $this->msgs->isError()) {
			
			// sprawdzenie, czy $amount i $period są liczbami całkowitymi
			if (! is_numeric ( $this->form->amount )) {
				$this->msgs->addError('Pierwsza wartość nie jest liczbą całkowitą');
			}
			
			if (! is_numeric ( $this->form->period )) {
				$this->msgs->addError('Druga wartość nie jest liczbą całkowitą');
			}
                        if ( ($this->form->amount >intval(1000000))) 
                        {
                                $this->msgs->addError('Maksymalna wartość kredytu to milion złoty');
                        }
                        if ( ($this->form->period >intval(120))) 
                        {
                                $this->msgs->addError('Maksymalny okres splaty to 120 miesięcy');
                        }
		}
		
		return ! $this->msgs->isError();
	}
	
	/** 
	 * Pobranie wartości, walidacja, obliczenie i wyświetlenie
	 */
	public function process(){
                global $conf;
		$this->getparams();
		
		if ($this->validate()) {
				
			//konwersja parametrów
			$this->form->amount = floatval($this->form->amount);
			$this->form->period = intval($this->form->period);
                        $this->form->percent = floatval($this->form->percent);
                        
			$this->msgs->addInfo('Parametry poprawne.');
				
			//wykonanie obliczen oraz zaokrąglenie wyniku
			$this->result->result = ($this->form->amount / $this->form->period) + (($this->form->amount / $this->form->period)* $this->form->percent/100); //dzielimy kwote przez liczbe miesiecy a nastepnie obliczamy procent z kwoty i dodajemy calosc
                        $this->result->result = round($this->result->result, 2); //zaokraglenie wyniku do 2 liczb po przecinku   
			
			$this->msgs->addInfo('Wykonano obliczenia.');
		}
		
		$this->generateView();
              
	}
	
	public function generateView()
       {  
            global $conf;
            $smarty = new Smarty();
            $smarty->assign('conf',$conf);
        

            $smarty->assign('msgs',$this->msgs);
            $smarty->assign('form',$this->form);
            $smarty->assign('res',$this->result);

            
            $smarty->display($conf->root_path.'/app/calcKredytView.tpl');
       }
			
}
