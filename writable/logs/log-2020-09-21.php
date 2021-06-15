<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-09-21 16:02:50 --> Invalid argument supplied for foreach()
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CEN\CENCliente.php(90): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Invalid argumen...', 'D:\\WIN_INSTALAD...', 90, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CEN\CENCliente.php(27): App\Models\CEN\CENPersonaJuridica->Set(NULL)
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CEN\CENAccionesCarrito.php(52): App\Models\CEN\CENCliente->Set(Array)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(178): App\Models\CEN\CENAccionesCarrito->Set(Array)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2020-09-21 19:33:02 --> Array to string conversion
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Login.php(64): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Array to string...', 'D:\\WIN_INSTALAD...', 64, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Login->CerrarSession()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-09-21 19:33:05 --> Trying to access array offset on value of type null
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(121): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to acces...', 'D:\\WIN_INSTALAD...', 121, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->search()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
