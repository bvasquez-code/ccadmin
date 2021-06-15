<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-10-08 15:03:07 --> Call to a member function get() on null
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(819): App\Controllers\Proveedor->__construct()
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(330): CodeIgniter\CodeIgniter->createController()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2020-10-08 15:36:45 --> Too few arguments to function App\Controllers\Proveedor::crear(), 0 passed in D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php on line 844 and exactly 1 expected
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Proveedor->crear()
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Proveedor))
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
