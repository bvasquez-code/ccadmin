<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-02-24 21:33:51 --> Cannot use object of type stdClass as array
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Stockmanual.php(51): App\Models\CLN\CLNStockmanual->Get_Detalle_Carga_Stock_Formateado(19, 1, 1)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Stockmanual->confirmar(19)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Stockmanual))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-02-24 21:54:38 --> Undefined variable: Obj_PreVenta
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/stockmanual/confirmar.php(112): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined varia...', '/home/n4iram7ws...', 112, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('stockmanual/con...', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(62): view('stockmanual/con...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Stockmanual.php(55): App\Controllers\BaseController->ConstruirMenu('stockmanual/con...', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Stockmanual->confirmar(19)
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Stockmanual))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
