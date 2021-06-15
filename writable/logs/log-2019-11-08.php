<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-11-08 16:16:38 --> Invalid argument supplied for foreach()
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CEN/CENPaginacionService.php(21): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Invalid argumen...', '/home/n4iram7ws...', 21, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Categoriaproducto.php(79): App\Models\CEN\CENPaginacionService->Set(NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Categoriaproducto->Get_Categoria_Producto()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-11-08 16:19:30 --> Invalid argument supplied for foreach()
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CEN/CENPaginacionService.php(21): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Invalid argumen...', '/home/n4iram7ws...', 21, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Categoriaproducto.php(79): App\Models\CEN\CENPaginacionService->Set(NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Categoriaproducto->Get_Categoria_Producto()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-11-08 16:48:12 --> Undefined offset: 0
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Categoriaproducto.php(54): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined offse...', '/home/n4iram7ws...', 54, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Categoriaproducto->crear('54')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2019-11-08 16:59:52 --> Undefined index: l_Id_CategoriaPro_Pdr
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/categoriaproducto/crear.php(54): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', '/home/n4iram7ws...', 54, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('categoriaproduc...', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(61): view('categoriaproduc...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Categoriaproducto.php(57): App\Controllers\BaseController->ConstruirMenu('categoriaproduc...', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Categoriaproducto->crear('43')
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
