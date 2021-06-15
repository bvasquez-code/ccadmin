<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-11-07 10:28:14 --> Undefined index: Num_RegistroIni
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNCategoriaproducto.php(57): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', '/home/n4iram7ws...', 57, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Categoriaproducto.php(51): App\Models\CLN\CLNCategoriaproducto->Get_Categoria_Producto(Array, 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Categoriaproducto->Get_Categoria_Producto()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-11-07 11:34:54 --> Undefined index: Num_Pagina
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNCategoriaproducto.php(56): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', '/home/n4iram7ws...', 56, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Categoriaproducto.php(51): App\Models\CLN\CLNCategoriaproducto->Get_Categoria_Producto(Array, 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Categoriaproducto->Get_Categoria_Producto()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-11-07 13:45:06 --> Argument 1 passed to App\Models\CLN\CLNCategoriaproducto::Get_Categoria_Producto() must be an instance of App\Models\CEN\CENDataService or null, array given, called in /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Categoriaproducto.php on line 51
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Categoriaproducto.php(51): App\Models\CLN\CLNCategoriaproducto->Get_Categoria_Producto(Array, 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Categoriaproducto->Get_Categoria_Producto()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-11-07 14:26:29 --> Call to a member function Set() on null
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CEN/CENDataService.php(27): App\Models\CEN\CENDataService->SetListObject('Busqueda', Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNCategoriaproducto.php(56): App\Models\CEN\CENDataService->Set(Array)
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Categoriaproducto.php(52): App\Models\CLN\CLNCategoriaproducto->Get_Categoria_Producto(Array, NULL, 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Categoriaproducto->Get_Categoria_Producto()
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2019-11-07 14:53:20 --> json_decode() expects parameter 1 to be string, array given
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'json_decode() e...', '/home/n4iram7ws...', 41, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Categoriaproducto.php(41): json_decode(Array)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Categoriaproducto->crear()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-11-07 14:55:24 --> Undefined index: List_Resultado
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Categoriaproducto.php(43): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', '/home/n4iram7ws...', 43, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Categoriaproducto->crear()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-11-07 15:14:37 --> Use of undefined constant p_Id_CategoriaPro - assumed 'p_Id_CategoriaPro' (this will throw an Error in a future version of PHP)
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Categoriaproducto.php(45): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Use of undefine...', '/home/n4iram7ws...', 45, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Categoriaproducto->crear('45')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-11-07 15:23:04 --> Undefined offset: 0
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Categoriaproducto.php(54): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined offse...', '/home/n4iram7ws...', 54, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Categoriaproducto->crear('1000')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
