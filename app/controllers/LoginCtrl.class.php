<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\LoginForm;

class LoginCtrl{
	private $form;
	
	public function __construct(){
            $this->form = new LoginForm();
	}
	
	public function validate() {
            $this->form->login = ParamUtils::getFromRequest('login');
            $this->form->pass = ParamUtils::getFromRequest('pass');

            
            if (!isset($this->form->login))
                return false;

            if (empty($this->form->login)) {
                Utils::addErrorMessage('Login cannot be empty!');
            }
            if (empty($this->form->pass)) {
                Utils::addErrorMessage('Password cannot be empty');
            }

            if (App::getMessages()->isError())
                return false;

            if ($this->form->login == "admin" && $this->form->pass == "admin") {
                RoleUtils::addRole('admin');
            } else if ($this->form->login == "user" && $this->form->pass == "user") {
                RoleUtils::addRole('user');
            } else {
                Utils::addErrorMessage('Incorrect login or password');
            }

            return !App::getMessages()->isError();
        }   
        
        public function action_loginShow() {
            $this->generateView();
        }
	
	public function action_login() {
            if ($this->validate()) {
                App::getRouter()->redirectTo("calcShow");
            } else {
                $this->generateView();
            }
        }
	
	public function action_logout(){
		session_destroy();

		Utils::addInfoMessage('Logout successfull');
                App::getRouter()->redirectTo('login');

		$this->generateView();		 
	}
	
	public function generateView(){
		
		App::getSmarty()->assign('page_title','Log in page');
                App::getSmarty()->assign('page_description','Click button below to go to log in.');
		App::getSmarty()->assign('form',$this->form);
		App::getSmarty()->display('LoginView.tpl');		
	}
}