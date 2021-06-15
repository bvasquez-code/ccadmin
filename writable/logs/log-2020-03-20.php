<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-03-20 14:39:35 --> Trying to get property 'Flg_Cargado' of non-object
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Facturacion.php(38): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to get p...', '/home/n4iram7ws...', 38, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Facturacion->index()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Facturacion))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-03-20 16:26:24 --> Undefined index: Tip_Pago
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Facturacion.php(119): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', '/home/n4iram7ws...', 119, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Facturacion->crear('59')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Facturacion))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
