<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-09-06 10:40:49 --> Class 'App\Models\CLN\CLNTrxcuenta' not found
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Trxcuenta->index()
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Trxcuenta))
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2020-09-06 14:39:26 --> Trying to get property 'Flg_Cargado' of non-object
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Facturacion.php(38): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to get p...', 'D:\\WIN_INSTALAD...', 38, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Facturacion->index()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Facturacion))
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-09-06 15:07:14 --> array_push() expects parameter 1 to be array, null given
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'array_push() ex...', 'D:\\WIN_INSTALAD...', 304, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNGenerico.php(304): array_push(NULL, Object(App\Models\CEN\CENParbusqueda))
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNFacElectronica.php(44): App\Models\CLN\CLNGenerico->Get_List_Documento_Sunat()
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\FacElectronica.php(27): App\Models\CLN\CLNFacElectronica->Render_Index(Object(App\Models\CEN\CENAutenticacionService))
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\FacElectronica->index()
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\FacElectronica))
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
