<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use app\forms\HistorySearchForm;

class ResultCtrl {
    
    private $form;
    private $records;
    
    public function __construct() {
        $this->form = new HistorySearchForm();
    }
    
    public function validate() {

        $this->form->currency = ParamUtils::getFromRequest('hsf_currency');
        
        return !App::getMessages()->isError();
    }
    
    public function load_data(){
       
        $this->validate();

        $search_params = [];
        if (isset($this->form->currency) && strlen($this->form->currency) > 0) {
            $search_params['cellar[~]'] = $this->form->currency;
        }
        
        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }
        $where ["ORDER"] = "idresult";

        try {
            $this->records = App::getDB()->select("result", [
                "idresult",
                "amount",
                "cellar",
                "amountPLN",
                "date",
                    ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Error occured while downloading data from database!');
            if (App::getConf()->debug){
                Utils::addErrorMessage($e->getMessage());
            }
        
        }
        
    }       
        
        public function action_historyView() {
            $this->load_data(); 
            $this->assignView();
            
            App::getSmarty()->display('ResultsView.tpl');
        }
        
        public function action_historyPartView(){
            $this->load_data();
            $this->assignView();
            
            App::getSmarty()->display('ResultPartView.tpl');
        }
        
        public function assignView(){
            App::getSmarty()->assign('page_title','History of exchanges');
            App::getSmarty()->assign('page_description','Click button below to scroll to history and seach from it');
            App::getSmarty()->assign('page_header','(Very very simple)');        
        
            App::getSmarty()->assign('currency', $this->form);
            App::getSmarty()->assign('data', $this->records);
            
        }
}
