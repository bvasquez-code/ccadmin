<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-10-21 12:12:45 --> Class 'App\Controllers\LNConfigsistema' not found
#0 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(819): App\Controllers\Parsistema->__construct()
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(330): CodeIgniter\CodeIgniter->createController()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-10-21 16:21:50 --> Class 'App\Controllers\LNConfigsistema' not found
#0 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(819): App\Controllers\Parsistema->__construct()
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(330): CodeIgniter\CodeIgniter->createController()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-10-21 16:43:18 --> Cannot use App\Models\CLN\CLNParsistema as LNParsistema because the name is already in use
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2019-10-21 17:27:43 --> Invalid argument supplied for foreach()
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/opcionesmenu/crear.php(37): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Invalid argumen...', '/home/n4iram7ws...', 37, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('opcionesmenu/cr...', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(61): view('opcionesmenu/cr...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Parsistema.php(49): App\Controllers\BaseController->ConstruirMenu('opcionesmenu/cr...', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Parsistema->crear('4')
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Parsistema))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2019-10-21 17:29:13 --> Invalid argument supplied for foreach()
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/opcionesmenu/crear.php(37): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Invalid argumen...', '/home/n4iram7ws...', 37, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('opcionesmenu/cr...', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(61): view('opcionesmenu/cr...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Parsistema.php(49): App\Controllers\BaseController->ConstruirMenu('opcionesmenu/cr...', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Parsistema->crear()
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Parsistema))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
