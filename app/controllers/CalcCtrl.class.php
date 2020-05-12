<?php

require_once 'CalcForm.class.php';
require_once 'CalcResult.class.php';

class CalcCtrl {

	private $form;
	private $result;
        private $hide_intro;

	public function __construct(){

		$this->form = new CalcForm();
		$this->result = new CalcResult();
	}
	
	public function getParams(){
		$this->form->x = getFromRequest('x');
		$this->form->op = getFromRequest('op');
	}
	
	public function validate() {

		if (! (isset ( $this->form->x ) && isset ( $this->form->op ))) {
			return false;
		} else {
                    $this->hide_intro = true;
                }
		
		if ($this->form->x == "") {
			getMessages()->addError('No amount to be converted!');
		}
		
		if (! getMessages()->isError()) {
			
			if (! is_numeric ( $this->form->x )) {
				getMessages()->addError('Typed "amount" is not numeric!');
			}
			
			if ($this->form->x <= 0) {
				getMessages()->addError('Typed amount can not be equals (or less than) 0!');
			}
		}
		
		return ! getMessages()->isError();
	}
	
	public function process(){

		$this->getParams();
		
		if ($this->validate()) {
				
			$this->form->x = intval($this->form->x);
			getMessages()->addInfo('Parameters has beed passed.');
                        
			switch ($this->form->op) {
				case 'CHF' :
					$this->result->result = $this->form->x * $this->form->CHF_Curr;
					$this->result->op_name = 'CHF';
					break;
				case 'Euro' :
					$this->result->result = $this->form->x * $this->form->Euro_Curr;
					$this->result->op_name = 'Euro';
					break;
				case 'Pound' :
					$this->result->result = $this->form->x * $this->form->Pound_Curr;
					$this->result->op_name = 'Pound';
					break;
                                case 'Dollar' : 
					$this->result->result = $this->form->x * $this->form->Dollar_Curr;
					$this->result->op_name = 'Dollar';
					break;
			}
			
			getMessages()->addInfo('Parameters is correct. Im heading into convert cellar.');
		}
		
		$this->generateView();
	}
	
	public function generateView(){
		
		getSmarty()->assign('page_title','Cellar calculator');
		getSmarty()->assign('page_description','The exchange rate may not be up to date!');
		getSmarty()->assign('page_header','(Very very simple)');
                
                getSmarty()->assign('hide_intro',$this->hide_intro);
					
		getSmarty()->assign('form',$this->form);
		getSmarty()->assign('res',$this->result);
		
		getSmarty()->display('CalcView.tpl');
	}
}