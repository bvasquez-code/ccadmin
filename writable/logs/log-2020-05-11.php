<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-05-11 13:34:48 --> Access denied for user '****'@'localhost' (using password: YES)
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(376): CodeIgniter\Database\MySQLi\Connection->connect(false)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(642): CodeIgniter\Database\BaseConnection->initialize()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CAD\CADConfigsistema.php(90): CodeIgniter\Database\BaseConnection->query(' SELECT Flg_Cfp...', Array)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CAD\CADConfigsistema.php(121): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_array(9, 13, 'Flg_Cfpsis_Bo1', NULL)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNConfigsistema.php(22): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_string(9, 13, 19, NULL)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CSE\CSEOrquestador.php(376): App\Models\CLN\CLNConfigsistema->Get_Parametros_Sistema_string(9, 13, 19)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNLogin.php(38): App\Models\CSE\CSEOrquestador->Ejecutar_13_ws_wa_ValidarCredenciales(Array, 1)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Login.php(37): App\Models\CLN\CLNLogin->Autentificar('74285109', '74285109')
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#9 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#10 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#11 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#12 {main}
CRITICAL - 2020-05-11 13:34:53 --> Access denied for user '****'@'localhost' (using password: YES)
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(376): CodeIgniter\Database\MySQLi\Connection->connect(false)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(642): CodeIgniter\Database\BaseConnection->initialize()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CAD\CADConfigsistema.php(90): CodeIgniter\Database\BaseConnection->query(' SELECT Flg_Cfp...', Array)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CAD\CADConfigsistema.php(121): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_array(9, 13, 'Flg_Cfpsis_Bo1', NULL)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNConfigsistema.php(22): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_string(9, 13, 19, NULL)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CSE\CSEOrquestador.php(376): App\Models\CLN\CLNConfigsistema->Get_Parametros_Sistema_string(9, 13, 19)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNLogin.php(38): App\Models\CSE\CSEOrquestador->Ejecutar_13_ws_wa_ValidarCredenciales(Array, 1)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Login.php(37): App\Models\CLN\CLNLogin->Autentificar('74285109', '74285109')
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#9 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#10 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#11 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#12 {main}
CRITICAL - 2020-05-11 14:34:04 --> Trying to get property 'Flg_Cargado' of non-object
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Facturacion.php(38): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to get p...', 'D:\\WIN_INSTALAD...', 38, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Facturacion->index()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Facturacion))
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-05-11 14:34:12 --> Access denied for user '****'@'localhost' (using password: YES)
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(376): CodeIgniter\Database\MySQLi\Connection->connect(false)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(642): CodeIgniter\Database\BaseConnection->initialize()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CAD\CADConfigsistema.php(90): CodeIgniter\Database\BaseConnection->query(' SELECT Flg_Cfp...', Array)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CAD\CADConfigsistema.php(121): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_array(9, 13, 'Flg_Cfpsis_Bo1', NULL)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNConfigsistema.php(22): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_string(9, 13, 19, NULL)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CSE\CSEOrquestador.php(376): App\Models\CLN\CLNConfigsistema->Get_Parametros_Sistema_string(9, 13, 19)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNLogin.php(38): App\Models\CSE\CSEOrquestador->Ejecutar_13_ws_wa_ValidarCredenciales(Array, 1)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Login.php(37): App\Models\CLN\CLNLogin->Autentificar('74285109', '74285109')
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#9 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#10 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#11 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#12 {main}
CRITICAL - 2020-05-11 14:34:20 --> Access denied for user '****'@'localhost' (using password: YES)
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(376): CodeIgniter\Database\MySQLi\Connection->connect(false)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(642): CodeIgniter\Database\BaseConnection->initialize()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CAD\CADConfigsistema.php(90): CodeIgniter\Database\BaseConnection->query(' SELECT Flg_Cfp...', Array)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CAD\CADConfigsistema.php(121): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_array(9, 13, 'Flg_Cfpsis_Bo1', NULL)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNConfigsistema.php(22): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_string(9, 13, 19, NULL)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CSE\CSEOrquestador.php(376): App\Models\CLN\CLNConfigsistema->Get_Parametros_Sistema_string(9, 13, 19)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNLogin.php(38): App\Models\CSE\CSEOrquestador->Ejecutar_13_ws_wa_ValidarCredenciales(Array, 1)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Login.php(37): App\Models\CLN\CLNLogin->Autentificar('74285109', '74285109')
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#9 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#10 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#11 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#12 {main}
CRITICAL - 2020-05-11 18:57:32 --> Trying to get property 'Flg_Cargado' of non-object
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(33): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to get p...', 'D:\\WIN_INSTALAD...', 33, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->index()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-05-11 20:54:24 --> Trying to get property 'Flg_Cargado' of non-object
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(33): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to get p...', 'D:\\WIN_INSTALAD...', 33, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->index()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
