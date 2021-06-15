<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-04-25 12:29:52 --> Trying to access array offset on value of type null
#0 C:\xampp\htdocs\ccadmin\app\Controllers\Categoriaproducto.php(50): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to acces...', 'C:\\xampp\\htdocs...', 50, Array)
#1 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Categoriaproducto->crear('6')
#2 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#3 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-04-25 15:12:47 --> Too few arguments to function App\Controllers\Caja::crear(), 0 passed in C:\xampp\htdocs\ccadmin\system\CodeIgniter.php on line 844 and exactly 1 expected
#0 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Caja->crear()
#1 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Caja))
#2 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2020-04-25 16:06:27 --> Cannot use object of type App\Models\CEN\CENCaja as array
#0 C:\xampp\htdocs\ccadmin\system\View\View.php(235): include()
#1 C:\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('caja/crear', Array, NULL)
#2 C:\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(62): view('caja/crear', Array)
#3 C:\xampp\htdocs\ccadmin\app\Controllers\Caja.php(42): App\Controllers\BaseController->ConstruirMenu('caja/crear', Array)
#4 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Caja->crear(2)
#5 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Caja))
#6 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2020-04-25 16:10:31 --> Cannot use object of type App\Models\CEN\CENCaja as array
#0 C:\xampp\htdocs\ccadmin\system\View\View.php(235): include()
#1 C:\xampp\htdocs\ccadmin\system\Common.php(175): CodeIgniter\View\View->render('caja/crear', Array, NULL)
#2 C:\xampp\htdocs\ccadmin\app\Controllers\BaseController.php(62): view('caja/crear', Array)
#3 C:\xampp\htdocs\ccadmin\app\Controllers\Caja.php(42): App\Controllers\BaseController->ConstruirMenu('caja/crear', Array)
#4 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Caja->crear(2)
#5 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Caja))
#6 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2020-04-25 18:53:55 --> Too few arguments to function App\Models\CLN\CLNUsuario::Get_Usuario(), 1 passed in C:\xampp\htdocs\ccadmin\app\Controllers\Usuario.php on line 42 and exactly 3 expected
#0 C:\xampp\htdocs\ccadmin\app\Controllers\Usuario.php(42): App\Models\CLN\CLNUsuario->Get_Usuario(0)
#1 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Usuario->crear()
#2 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Usuario))
#3 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-04-25 18:55:41 --> You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.Id_Datie_FK  FROM DA_USUARIO     JOIN DA_PERNATU ON DA_PERNATU.Id_Dapnat = DA_U' at line 1
#0 C:\xampp\htdocs\ccadmin\system\Database\MySQLi\Connection.php(329): mysqli->query(' SELECT     DA_...')
#1 C:\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(737): CodeIgniter\Database\MySQLi\Connection->execute(' SELECT     DA_...')
#2 C:\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(665): CodeIgniter\Database\BaseConnection->simpleQuery(' SELECT     DA_...')
#3 C:\xampp\htdocs\ccadmin\app\Models\CAD\CADUsuario.php(215): CodeIgniter\Database\BaseConnection->query(' SELECT     DA_...', Array)
#4 C:\xampp\htdocs\ccadmin\app\Models\CLN\CLNUsuario.php(52): App\Models\CAD\CADUsuario->Get_Usuario(0, 1, 1)
#5 C:\xampp\htdocs\ccadmin\app\Controllers\Usuario.php(42): App\Models\CLN\CLNUsuario->Get_Usuario(0, 1, 1)
#6 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Usuario->crear()
#7 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Usuario))
#8 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#9 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#10 {main}
CRITICAL - 2020-04-25 18:57:22 --> You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.Id_Datie_FK  FROM DA_USUARIO     JOIN DA_PERNATU ON DA_PERNATU.Id_Dapnat = DA_U' at line 1
#0 C:\xampp\htdocs\ccadmin\system\Database\MySQLi\Connection.php(329): mysqli->query(' SELECT     DA_...')
#1 C:\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(737): CodeIgniter\Database\MySQLi\Connection->execute(' SELECT     DA_...')
#2 C:\xampp\htdocs\ccadmin\system\Database\BaseConnection.php(665): CodeIgniter\Database\BaseConnection->simpleQuery(' SELECT     DA_...')
#3 C:\xampp\htdocs\ccadmin\app\Models\CAD\CADUsuario.php(215): CodeIgniter\Database\BaseConnection->query(' SELECT     DA_...', Array)
#4 C:\xampp\htdocs\ccadmin\app\Models\CLN\CLNUsuario.php(52): App\Models\CAD\CADUsuario->Get_Usuario(0, 1, 1)
#5 C:\xampp\htdocs\ccadmin\app\Controllers\Usuario.php(42): App\Models\CLN\CLNUsuario->Get_Usuario(0, 1, 1)
#6 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Usuario->crear()
#7 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Usuario))
#8 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#9 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#10 {main}
