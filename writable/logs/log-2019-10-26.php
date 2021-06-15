<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-10-26 00:53:22 --> You must set the database table to be used with your query.
#0 /home/n4iram7wszfs/public_html/ccadmin/system/Model.php(1190): CodeIgniter\Database\BaseConnection->table(NULL)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Model.php(1681): CodeIgniter\Model->builder()
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Parsistema.php(56): CodeIgniter\Model->__call('Get_Parametros_...', Array)
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Parsistema->config('1')
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Parsistema))
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
