<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-12-15 10:48:55 --> Array to string conversion
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNPreventa.php(162): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Array to string...', '/home/n4iram7ws...', 162, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNPreventa.php(102): App\Models\CLN\CLNPreventa->Add_Item_Carrito(Object(App\Models\CEN\CENCarrito), Array, 20, 0)
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(145): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(Object(App\Models\CEN\CENCarrito), Object(App\Models\CEN\CENAccionesCarrito), 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
