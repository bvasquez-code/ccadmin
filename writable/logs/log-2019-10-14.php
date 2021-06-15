<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-10-14 00:20:50 --> mysqli_next_result() expects parameter 1 to be mysqli, null given
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'mysqli_next_res...', '/home/n4iram7ws...', 35, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADLogin.php(35): mysqli_next_result(NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNLogin.php(17): App\Models\CAD\CADLogin->Autentificar('ADMIN', 'ADMIN')
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Login.php(37): App\Models\CLN\CLNLogin->Autentificar('ADMIN', 'ADMIN')
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2019-10-14 00:21:02 --> mysqli_next_result() expects parameter 1 to be mysqli, null given
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'mysqli_next_res...', '/home/n4iram7ws...', 35, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADLogin.php(35): mysqli_next_result(NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNLogin.php(17): App\Models\CAD\CADLogin->Autentificar('ADMIN', 'ADMIN')
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Login.php(37): App\Models\CLN\CLNLogin->Autentificar('ADMIN', 'ADMIN')
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2019-10-14 00:33:50 --> Call to a member function Fail() on null
#0 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Perfilusuario->Get_Perfil_Usuario()
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Perfilusuario))
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-10-14 01:09:24 --> syntax error, unexpected '->' (T_OBJECT_OPERATOR)
#0 /home/n4iram7wszfs/public_html/ccadmin/system/Autoloader/Autoloader.php(295): CodeIgniter\Autoloader\Autoloader->requireFile('/home/n4iram7ws...')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Autoloader/Autoloader.php(257): CodeIgniter\Autoloader\Autoloader->loadInNamespace('App\\Models\\CLN\\...')
#2 [internal function]: CodeIgniter\Autoloader\Autoloader->loadClass('App\\Models\\CLN\\...')
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Perfilusuario.php(17): spl_autoload_call('App\\Models\\CLN\\...')
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(819): App\Controllers\Perfilusuario->__construct()
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(330): CodeIgniter\CodeIgniter->createController()
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2019-10-14 01:09:47 --> Cannot use empty array elements in arrays
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
