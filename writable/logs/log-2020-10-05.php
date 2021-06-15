<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-10-05 10:24:19 --> session_start(): Failed to decode session object. Session has been destroyed
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'session_start()...', 'D:\\WIN_INSTALAD...', 1001, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Session\Session.php(1001): session_start()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Session\Session.php(237): CodeIgniter\Session\Session->startSession()
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Config\Services.php(773): CodeIgniter\Session\Session->start()
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Config\BaseService.php(119): CodeIgniter\Config\Services::session(Object(Config\App), false)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Config\Services.php(754): CodeIgniter\Config\BaseService::getSharedInstance('session', NULL)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(38): CodeIgniter\Config\Services::session()
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(820): App\Controllers\BaseController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(330): CodeIgniter\CodeIgniter->createController()
#9 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2020-10-05 15:22:16 --> Trying to get property 'Resultado' of non-object
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Cliente.php(27): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to get p...', 'D:\\WIN_INSTALAD...', 27, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Cliente->index()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Cliente))
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-10-05 15:23:02 --> Trying to get property 'Resultado' of non-object
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Cliente.php(27): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to get p...', 'D:\\WIN_INSTALAD...', 27, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Cliente->index()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Cliente))
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
