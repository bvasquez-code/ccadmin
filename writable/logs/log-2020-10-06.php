<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-10-06 17:39:15 --> Cannot use object of type App\Models\CEN\CENLogin as array
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2020-10-06 18:32:09 --> Typed property App\Models\CEN\CENUsuarioSistema::$DataLogin must not be accessed before initialization
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CAD\CADUsuario.php(236): App\Models\CEN\CENUsuarioSistema->set_Des_Password('a7c03683517297c...')
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNUsuario.php(52): App\Models\CAD\CADUsuario->Get_Usuario(16, 0, 1)
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Usuario.php(43): App\Models\CLN\CLNUsuario->Get_Usuario(16, 0, 1)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Usuario->crear(16)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Usuario))
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2020-10-06 18:33:21 --> Typed property App\Models\CEN\CENUsuarioSistema::$DataLogin must be an instance of App\Models\CEN\CENLogin, array used
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CAD\CADUsuario.php(183): App\Models\CEN\CENUsuarioSistema->__construct()
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNUsuario.php(52): App\Models\CAD\CADUsuario->Get_Usuario(16, 0, 1)
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Usuario.php(43): App\Models\CLN\CLNUsuario->Get_Usuario(16, 0, 1)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Usuario->crear(16)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Usuario))
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
