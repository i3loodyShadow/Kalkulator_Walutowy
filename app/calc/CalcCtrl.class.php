<?php
require_once $conf->root_path.'/lib/smarty/Smarty.class.php';
require_once $conf->root_path.'/lib/Messages.class.php';
require_once $conf->root_path.'/app/calc/CalcForm.class.php';
require_once $conf->root_path.'/app/calc/CalcResult.class.php';

class CalcCtrl {

	private $msgs;  
	private $infos;  
	private $form;   
	private $result; 
	private $hide_intro; 

	public function __construct(){
		$this->msgs = new Messages();
		$this->form = new CalcForm();
		$this->result = new CalcResult();
		$this->hide_intro = false;
	}
	
	public function getParams(){
		$this->form->x = isset($_REQUEST ['x']) ? $_REQUEST ['x'] : null;
		$this->form->currency = isset($_REQUEST ['op']) ? $_REQUEST ['op'] : null;
	}
        
	public function validate() {

		if (! (isset ( $this->form->x )  && isset ( $this->form->currency ))) {

			return false; 
		} else { 
			$this->hide_intro = true; 
		}
		
		if ($this->form->x == "") {
			$this->msgs->addError('No amount to be converted!');
		}
		
		if (! $this->msgs->isError()) {
			
			if (! is_numeric ( $this->form->x )) {
				$this->msgs->addError('Typed "amount" is not numeric!');
			}
			
			if ($this->form->x <= 0) {
				$this->msgs->addError('Typed amount can not be equals (or less than) 0!');
			}
		}
		
		return ! $this->msgs->isError();
	}
	

	public function process(){

		$this->getparams();
		
		if ($this->validate()) {
				
			$this->form->x = intval($this->form->x);
			$this->msgs->addInfo('Parameters has beed passed.');
				
			switch ($this->form->currency) {
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
			
			$this->msgs->addInfo('Parameters is correct. Im heading into convert cellar.');
		}
		
		$this->generateView();
	}
        
	public function generateView(){
		global $conf;
		
		$smarty = new Smarty();
		$smarty->assign('conf',$conf);
		
		$smarty->assign('page_title','Cellar calculator');
		$smarty->assign('page_description','The exchange rate may not be up to date!');
		$smarty->assign('page_header','(Very very simple)');
				
		$smarty->assign('hide_intro',$this->hide_intro);
		
		$smarty->assign('msgs',$this->msgs);
		$smarty->assign('form',$this->form);
		$smarty->assign('res',$this->result);
		
		$smarty->display($conf->root_path.'/app/calc/CalcView.tpl');
	}
}
