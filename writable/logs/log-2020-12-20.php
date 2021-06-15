<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-12-20 23:35:27 --> syntax error, unexpected '?', expecting variable (T_VARIABLE)
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Autoloader\Autoloader.php(295): CodeIgniter\Autoloader\Autoloader->requireFile('D:\\WIN_INSTALAD...')
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Autoloader\Autoloader.php(257): CodeIgniter\Autoloader\Autoloader->loadInNamespace('App\\Models\\CEN\\...')
#2 [internal function]: CodeIgniter\Autoloader\Autoloader->loadClass('App\\Models\\CEN\\...')
#3 [internal function]: spl_autoload_call('App\\Models\\CEN\\...')
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Session\Session.php(1001): session_start()
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Session\Session.php(237): CodeIgniter\Session\Session->startSession()
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Config\Services.php(773): CodeIgniter\Session\Session->start()
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Config\BaseService.php(119): CodeIgniter\Config\Services::session(Object(Config\App), false)
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Config\Services.php(754): CodeIgniter\Config\BaseService::getSharedInstance('session', NULL)
#9 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(38): CodeIgniter\Config\Services::session()
#10 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(820): App\Controllers\BaseController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
#11 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(330): CodeIgniter\CodeIgniter->createController()
#12 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#13 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#14 {main}
