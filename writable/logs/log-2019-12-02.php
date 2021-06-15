<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-12-02 21:16:08 --> Invalid argument supplied for foreach()
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CEN/CENAccionesCarrito.php(20): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Invalid argumen...', '/home/n4iram7ws...', 20, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(122): App\Models\CEN\CENAccionesCarrito->Set(NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
