<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-12-19 19:12:45 --> Invalid argument supplied for foreach()
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CEN/CENPaginacionService.php(21): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Invalid argumen...', '/home/n4iram7ws...', 21, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Cliente.php(28): App\Models\CEN\CENPaginacionService->Set(NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Cliente->Get_Cliente()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Cliente))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
