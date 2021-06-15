<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-10-19 14:15:27 --> Undefined offset: 0
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/opcionesmenu/crear.php(5): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined offse...', '/home/n4iram7ws...', 5, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('opcionesmenu/cr...', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(60): view('opcionesmenu/cr...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Opcionesmenu.php(46): App\Controllers\BaseController->ConstruirMenu('opcionesmenu/cr...', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Opcionesmenu->crear()
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Opcionesmenu))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
CRITICAL - 2019-10-19 14:22:31 --> Cannot use object of type App\Models\CEN\CENMenu as array
#0 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include()
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('opcionesmenu/cr...', Array, NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(60): view('opcionesmenu/cr...', Array)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Opcionesmenu.php(46): App\Controllers\BaseController->ConstruirMenu('opcionesmenu/cr...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Opcionesmenu->crear()
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Opcionesmenu))
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2019-10-19 14:23:13 --> syntax error, unexpected '(array)' (array) (T_ARRAY_CAST)
#0 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('opcionesmenu/cr...', Array, NULL)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(60): view('opcionesmenu/cr...', Array)
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Opcionesmenu.php(46): App\Controllers\BaseController->ConstruirMenu('opcionesmenu/cr...', Array)
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Opcionesmenu->crear()
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Opcionesmenu))
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2019-10-19 14:23:32 --> Cannot use object of type App\Models\CEN\CENMenu as array
#0 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include()
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('opcionesmenu/cr...', Array, NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(60): view('opcionesmenu/cr...', Array)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Opcionesmenu.php(46): App\Controllers\BaseController->ConstruirMenu('opcionesmenu/cr...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Opcionesmenu->crear()
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Opcionesmenu))
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2019-10-19 18:41:34 --> Undefined index: Des_Perfil
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Views/opcionesmenu/crear.php(24): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined index...', '/home/n4iram7ws...', 24, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/View/View.php(235): include('/home/n4iram7ws...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Common.php(175): CodeIgniter\View\View->render('opcionesmenu/cr...', Array, NULL)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(60): view('opcionesmenu/cr...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Opcionesmenu.php(46): App\Controllers\BaseController->ConstruirMenu('opcionesmenu/cr...', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Opcionesmenu->crear('2')
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Opcionesmenu))
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#8 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#9 {main}
