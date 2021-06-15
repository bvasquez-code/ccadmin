<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-10-24 00:13:44 --> Constant expression contains invalid operations
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2019-10-24 00:13:56 --> Constant expression contains invalid operations
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2019-10-24 00:14:13 --> Constant expression contains invalid operations
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2019-10-24 19:16:24 --> Cannot use object of type App\Models\CEN\CENConfigsistema as array
#0 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include()
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('parsistema/crea...', Array, NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(61): view('parsistema/crea...', Array)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Parsistema.php(43): App\Controllers\BaseController->ConstruirMenu('parsistema/crea...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Parsistema->crear('5')
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Parsistema))
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
