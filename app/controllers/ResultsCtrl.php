<?php

namespace app\controllers;

class ResultsCtrl {
    
    private $records;
    
    public function action_results(){
        $this->records = getDB()->select("result","*");
        getSmarty()->assign('result', $this->records);
        getSmarty()->display('ResultsWiew.tpl');
    }
}
?>
