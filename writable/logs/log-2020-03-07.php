<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-03-07 00:16:17 --> Undefined offset: 5
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNStockmanual.php(114): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined offse...', '/home/n4iram7ws...', 114, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Stockmanual.php(47): App\Models\CLN\CLNStockmanual->Get_Detalle_Carga_Stock_Formateado(49, 1, 1)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Stockmanual->confirmar(49)
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Stockmanual))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
