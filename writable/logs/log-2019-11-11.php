<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-11-11 22:33:00 --> Class 'App\Controllers\LNCategoriaproducto' not found
#0 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Producto->crear()
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-11-11 22:33:29 --> Argument 2 passed to view() must be of the type array, null given, called in /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php on line 57
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(57): view('home/nav', NULL)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Producto.php(32): App\Controllers\BaseController->ConstruirMenu('producto/crear', NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Producto->crear()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Producto))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
