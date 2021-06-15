<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-11-01 01:15:34 --> Cannot use ___PHPSTORM_HELPERS\object as object because 'object' is a special class name
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2019-11-01 01:18:48 --> Cannot use ___PHPSTORM_HELPERS\object as object because 'object' is a special class name
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2019-11-01 02:08:02 --> Cannot use ___PHPSTORM_HELPERS\object as object because 'object' is a special class name
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2019-11-01 19:45:04 --> Invalid file: categoriaproducto/listar.php
#0 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(223): CodeIgniter\Exceptions\FrameworkException::forInvalidFile('categoriaproduc...')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('categoriaproduc...', Array, NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(61): view('categoriaproduc...', Array)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Categoriaproducto.php(21): App\Controllers\BaseController->ConstruirMenu('categoriaproduc...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Categoriaproducto->index()
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Categoriaproducto))
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
