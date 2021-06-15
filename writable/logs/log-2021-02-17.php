<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2021-02-17 21:28:41 --> json_decode() expects parameter 1 to be string, array given
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'json_decode() e...', 'D:\\WIN_INSTALAD...', 62, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNTalonario.php(62): json_decode(Array)
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Talonario.php(43): App\Models\CLN\CLNTalonario->Render_Crear(Object(App\Models\CEN\CENAutenticacionService), 1)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Talonario->crear(1)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Talonario))
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
