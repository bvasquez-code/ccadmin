<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-11-04 17:22:07 --> Array to string conversion
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Categoriaproducto.php(40): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Array to string...', '/home/n4iram7ws...', 40, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Categoriaproducto->Set_Categoria_Producto()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-11-04 21:00:10 --> Cannot use ___PHPSTORM_HELPERS\object as object because 'object' is a special class name
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2019-11-04 21:01:05 --> Class 'App\Models\CEN\object' not found
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNCategoriaproducto.php(22): App\Models\CEN\CENRequestService->__construct()
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Categoriaproducto.php(38): App\Models\CLN\CLNCategoriaproducto->Set_Categoria_Producto(Array, 2, 1)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Categoriaproducto->Set_Categoria_Producto()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-11-04 21:09:37 --> Illegal string offset 'ListCategoriaProducto'
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNCategoriaproducto.php(26): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Illegal string ...', '/home/n4iram7ws...', 26, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Categoriaproducto.php(38): App\Models\CLN\CLNCategoriaproducto->Set_Categoria_Producto(Array, 2, 1, 1)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Categoriaproducto->Set_Categoria_Producto()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-11-04 21:10:10 --> Illegal string offset 'ListCategoriaProducto'
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNCategoriaproducto.php(26): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Illegal string ...', '/home/n4iram7ws...', 26, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Categoriaproducto.php(38): App\Models\CLN\CLNCategoriaproducto->Set_Categoria_Producto(Array, 2, 1, 1)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Categoriaproducto->Set_Categoria_Producto()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-11-04 21:12:09 --> array_push() expects parameter 1 to be array, null given
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'array_push() ex...', '/home/n4iram7ws...', 26, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNCategoriaproducto.php(26): array_push(NULL, Array)
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Categoriaproducto.php(38): App\Models\CLN\CLNCategoriaproducto->Set_Categoria_Producto(Array, 2, 1, 1)
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Categoriaproducto->Set_Categoria_Producto()
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
