<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\CalcForm;
use app\transfer\CalcResult;

class CalcCtrl {
        
	private $form;
	private $result;
        private $datas;
        private $hide_intro;

	public function __construct(){
		$this->form = new CalcForm();
		$this->result = new CalcResult();               
	}
        
        public function getParams(){
            $this->form->x = ParamUtils::getFromRequest('x');
            $this->form->op = ParamUtils::getFromRequest('op');
                
        }
	
	public function validate() {               
                       
		if (!(isset ($this->form->x) && isset($this->form->op))){
                    Utils::addErrorMessage('Amount and cellar must be setted!');
                    return false;
		}else {
                    $this->hide_intro = true;
                }
		
		if ($this->form->x == "") {
			Utils::addErrorMessage('No amount to be converted!');
		}
		
		if (!App::getMessages()->isError()){
			
			if (!is_numeric ( $this->form->x )) {
				Utils::addErrorMessage('Typed "amount" is not numeric!');
			}
			
			if ($this->form->x <= 0) {
				Utils::addErrorMessage('Typed amount can not be equals (or less than) 0!');
			}
		}
		
		return !App::getMessages()->isError();
	}
        
	public function action_calcCompute(){

		$this->getParams();
		
		if ($this->validate()) {
				
			$this->form->x = intval($this->form->x);
			Utils::addInfoMessage('Parameters has beed passed.');
				
			switch ($this->form->op) {
				case 'CHF' :
					if (RoleUtils::inRole('admin')) {
						$this->result->result = $this->form->x * $this->form->CHF_Curr;
                                                $this->result->cellar = 'CHF';
                                                $this->save_history();
					} else {
						Utils::addErrorMessage('Only admin can use this cellar');
					}
					break;
				case 'Euro' :
					$this->result->result = $this->form->x * $this->form->Euro_Curr;
					$this->result->cellar = 'EUR';
                                        $this->save_history();
					break;
				case 'Pound' :
					if (RoleUtils::inRole('admin')) {
						$this->result->result = $this->form->x * $this->form->Pound_Curr;
                                                $this->result->cellar = 'GBP';
                                                $this->save_history();
					} else {
						Utils::addErrorMessage('Only admin can use this cellar');
					}
					break;
				case 'Dollar' : 
					$this->result->result = $this->form->x * $this->form->Dollar_Curr;
					$this->result->cellar = 'USD';
                                        $this->save_history();
					break;
			}
			
                        
			Utils::addInfoMessage('Parameters is correct. Im heading into convert cellar.');
                        
                }
		$this->generateView();
	} 
        
        private function save_history(){
            
            App::getDB()->insert("result", [
               "amount" => $this->form->x,
               "cellar" => $this->result->cellar,
               "amountPLN" => $this->result->result,
               "date" => date("Y-m-d H:i:s")
            ]);
        }
        
        public function action_backFromHistory(){
            Utils::addInfoMessage('Welcome again into cellar calculator');
            $this->generateView();
        }
        
	public function action_calcShow(){
		Utils::addInfoMessage('Welcome into cellar calculator');
		$this->generateView();
	}
	
	public function generateView(){
				
		App::getSmarty()->assign('page_title','Cellar calculator');
                App::getSmarty()->assign('page_description','The exchange rate may not be up to date!');
                App::getSmarty()->assign('page_header','(Very very simple)');
                
                App::getSmarty()->assign('hide_intro',$this->hide_intro);	
                
		App::getSmarty()->assign('form',$this->form);
		App::getSmarty()->assign('res',$this->result);
		
		App::getSmarty()->display('CalcView.tpl');
	}
}