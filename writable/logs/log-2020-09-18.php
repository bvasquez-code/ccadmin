<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-09-18 22:18:50 --> You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '0' at line 1
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\MySQLi\Connection.php(329): mysqli->query(' SELECT Cod_Cfp...')
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(737): CodeIgniter\Database\MySQLi\Connection->execute(' SELECT Cod_Cfp...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(665): CodeIgniter\Database\BaseConnection->simpleQuery(' SELECT Cod_Cfp...')
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CAD\CADConfigsistema.php(97): CodeIgniter\Database\BaseConnection->query(' SELECT Cod_Cfp...', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CAD\CADConfigsistema.php(145): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_array(2, 0, 'Cod_Cfpsis,Des_...', Array)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNConfigsistema.php(31): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_object(2, 0, 'Cod_Cfpsis,Des_...', Array)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Kardex.php(34): App\Models\CLN\CLNConfigsistema->Get_Parametros_Sistema_object(2, 0, 'Cod_Cfpsis,Des_...', Array)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Kardex->index()
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Kardex))
#9 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2020-09-18 22:20:14 --> You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '0' at line 1
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\MySQLi\Connection.php(329): mysqli->query(' SELECT Cod_Cfp...')
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(737): CodeIgniter\Database\MySQLi\Connection->execute(' SELECT Cod_Cfp...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(665): CodeIgniter\Database\BaseConnection->simpleQuery(' SELECT Cod_Cfp...')
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CAD\CADConfigsistema.php(97): CodeIgniter\Database\BaseConnection->query(' SELECT Cod_Cfp...', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CAD\CADConfigsistema.php(145): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_array(2, 0, 'Cod_Cfpsis,Des_...', Array)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNConfigsistema.php(31): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_object(2, 0, 'Cod_Cfpsis,Des_...', Array)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Kardex.php(34): App\Models\CLN\CLNConfigsistema->Get_Parametros_Sistema_object(2, 0, 'Cod_Cfpsis,Des_...', Array)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Kardex->index()
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Kardex))
#9 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2020-09-18 22:24:12 --> Uncaught mysqli_sql_exception: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '0' at line 1 in D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\MySQLi\Connection.php:329
Stack trace:
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\MySQLi\Connection.php(329): mysqli->query(' SELECT Cod_Cfp...')
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(737): CodeIgniter\Database\MySQLi\Connection->execute(' SELECT Cod_Cfp...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(665): CodeIgniter\Database\BaseConnection->simpleQuery(' SELECT Cod_Cfp...')
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CAD\CADConfigsistema.php(97): CodeIgniter\Database\BaseConnection->query(' SELECT Cod_Cfp...', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CAD\CADConfigsistema.php(145): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_array(2, 0, 'Cod_Cfpsis,Des_
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2020-09-18 22:32:41 --> You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '0' at line 1
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\MySQLi\Connection.php(329): mysqli->query(' SELECT Cod_Cfp...')
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(737): CodeIgniter\Database\MySQLi\Connection->execute(' SELECT Cod_Cfp...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(665): CodeIgniter\Database\BaseConnection->simpleQuery(' SELECT Cod_Cfp...')
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CAD\CADConfigsistema.php(97): CodeIgniter\Database\BaseConnection->query(' SELECT Cod_Cfp...', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CAD\CADConfigsistema.php(145): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_array(2, 0, 'Cod_Cfpsis,Des_...', Array)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNConfigsistema.php(31): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_object(2, 0, 'Cod_Cfpsis,Des_...', Array)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Kardex.php(34): App\Models\CLN\CLNConfigsistema->Get_Parametros_Sistema_object(2, 0, 'Cod_Cfpsis,Des_...', Array)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Kardex->index()
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Kardex))
#9 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2020-09-18 22:37:03 --> You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '0' at line 1
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\MySQLi\Connection.php(329): mysqli->query(' SELECT Cod_Cfp...')
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(737): CodeIgniter\Database\MySQLi\Connection->execute(' SELECT Cod_Cfp...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(665): CodeIgniter\Database\BaseConnection->simpleQuery(' SELECT Cod_Cfp...')
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CAD\CADConfigsistema.php(97): CodeIgniter\Database\BaseConnection->query(' SELECT Cod_Cfp...', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CAD\CADConfigsistema.php(145): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_array(2, 0, 'Cod_Cfpsis,Des_...', Array)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNConfigsistema.php(31): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_object(2, 0, 'Cod_Cfpsis,Des_...', Array)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Kardex.php(34): App\Models\CLN\CLNConfigsistema->Get_Parametros_Sistema_object(2, 0, 'Cod_Cfpsis,Des_...', Array)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Kardex->index()
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Kardex))
#9 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2020-09-18 22:39:49 --> You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '0' at line 1
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\MySQLi\Connection.php(329): mysqli->query(' SELECT Cod_Cfp...')
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(737): CodeIgniter\Database\MySQLi\Connection->execute(' SELECT Cod_Cfp...')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(665): CodeIgniter\Database\BaseConnection->simpleQuery(' SELECT Cod_Cfp...')
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CAD\CADConfigsistema.php(97): CodeIgniter\Database\BaseConnection->query(' SELECT Cod_Cfp...', Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CAD\CADConfigsistema.php(145): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_array(2, 0, 'Cod_Cfpsis,Des_...', Array)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNConfigsistema.php(31): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_object(2, 0, 'Cod_Cfpsis,Des_...', Array)
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Kardex.php(34): App\Models\CLN\CLNConfigsistema->Get_Parametros_Sistema_object(2, 0, 'Cod_Cfpsis,Des_...', Array)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Kardex->index()
#8 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Kardex))
#9 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
