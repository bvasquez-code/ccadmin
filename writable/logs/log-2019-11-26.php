<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-11-26 19:48:37 --> Argument 4 passed to App\Models\CLN\CLNPreventa::Set_Producto_Carrito() must be of the type int, string given, called in /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php on line 113
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(113): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(Object(App\Models\CEN\CENCarrito), 23, 0, 'add', 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-11-26 19:57:35 --> Argument 1 passed to App\Models\CLN\CLNPreventa::Set_Producto_Carrito() must be an instance of App\Models\CEN\CENCarrito, array given, called in /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php on line 113
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(113): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(Array, Object(App\Models\CEN\CENAccionesCarrito), 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-11-26 23:11:07 --> count(): Parameter must be an array or an object that implements Countable
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'count(): Parame...', '/home/n4iram7ws...', 69, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(69): count(NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->search()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-11-26 23:11:08 --> count(): Parameter must be an array or an object that implements Countable
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'count(): Parame...', '/home/n4iram7ws...', 69, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(69): count(NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->search()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-11-26 23:11:08 --> count(): Parameter must be an array or an object that implements Countable
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'count(): Parame...', '/home/n4iram7ws...', 69, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(69): count(NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->search()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-11-26 23:36:04 --> Call to a member function Fail() on null
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNPreventa.php(87): App\Models\CLN\CLNPreventa->Validar_Acciones_Carrito(Object(App\Models\CEN\CENAccionesCarrito))
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(113): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(Object(App\Models\CEN\CENCarrito), Object(App\Models\CEN\CENAccionesCarrito), 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-11-26 23:41:28 --> Argument 1 passed to App\Models\CLN\CLNPreventa::Set_Producto_Carrito() must be an instance of App\Models\CEN\CENCarrito, null given, called in /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php on line 113
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(113): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(NULL, Object(App\Models\CEN\CENAccionesCarrito), 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-11-26 23:41:32 --> Argument 1 passed to App\Models\CLN\CLNPreventa::Set_Producto_Carrito() must be an instance of App\Models\CEN\CENCarrito, null given, called in /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php on line 113
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(113): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(NULL, Object(App\Models\CEN\CENAccionesCarrito), 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-11-26 23:42:24 --> Argument 1 passed to App\Models\CLN\CLNPreventa::Set_Producto_Carrito() must be an instance of App\Models\CEN\CENCarrito, null given, called in /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php on line 113
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(113): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(NULL, Object(App\Models\CEN\CENAccionesCarrito), 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-11-26 23:45:15 --> Argument 1 passed to App\Models\CLN\CLNPreventa::Set_Producto_Carrito() must be an instance of App\Models\CEN\CENCarrito, null given, called in /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php on line 113
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(113): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(NULL, Object(App\Models\CEN\CENAccionesCarrito), 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
