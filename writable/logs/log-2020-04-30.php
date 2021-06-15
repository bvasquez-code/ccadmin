<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-04-30 17:47:14 --> Trying to get property 'Flg_Cargado' of non-object
#0 C:\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(33): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to get p...', 'C:\\xampp\\htdocs...', 33, Array)
#1 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->index()
#2 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#3 C:\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 C:\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
