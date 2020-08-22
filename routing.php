<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('calcShow'); // akcja/ścieżka domyślna
App::getRouter()->setLoginRoute('login'); // akcja/ścieżka na potrzeby logowania (przekierowanie, gdy nie ma dostępu)

Utils::addRoute('login',       'LoginCtrl');
Utils::addRoute('logout',      'LoginCtrl');
Utils::addRoute('calcShow',    'CalcCtrl',    ['user','admin']);
Utils::addRoute('calcCompute', 'CalcCtrl',    ['user','admin']);

