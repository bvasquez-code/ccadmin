<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-11-18 12:30:31 --> Use of undefined constant “INR” - assumed '“INR”' (this will throw an Error in a future version of PHP)
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNPreventa.php(33): CodeIgniter\Debug\Exceptions->errorHandler(2, 'Use of undefine...', '/home/n4iram7ws...', 33, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(83): App\Models\CLN\CLNPreventa->Get_Producto_Avanzado()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->search()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-11-18 12:31:02 --> file_get_contents(https://www.google.com/finance/converter?a=1&amp;from=INR&amp;to=USD): failed to open stream: HTTP request failed! HTTP/1.0 403 Forbidden

#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'file_get_conten...', '/home/n4iram7ws...', 65, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNPreventa.php(65): file_get_contents('https://www.goo...')
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNPreventa.php(36): App\Models\CLN\CLNPreventa->currencyConverter('INR', 'USD', 10)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(83): App\Models\CLN\CLNPreventa->Get_Producto_Avanzado()
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->search()
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2019-11-18 12:50:01 --> file_get_contents(https://www.google.com/finance/converter?a=1&amp;from=USD&amp;to=DOP): failed to open stream: HTTP request failed! HTTP/1.0 403 Forbidden

#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'file_get_conten...', '/home/n4iram7ws...', 54, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNPreventa.php(54): file_get_contents('https://www.goo...')
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNPreventa.php(37): App\Models\CLN\CLNPreventa->currency('USD', 'DOP', 1)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(83): App\Models\CLN\CLNPreventa->Get_Producto_Avanzado()
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->search()
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2019-11-18 12:52:30 --> file_get_contents(https://www.google.com/finance/converter?a=1&amp;from=USD&amp;to=DOP): failed to open stream: HTTP request failed! HTTP/1.0 403 Forbidden

#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'file_get_conten...', '/home/n4iram7ws...', 62, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNPreventa.php(62): file_get_contents('https://www.goo...', false, Resource id #117)
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNPreventa.php(37): App\Models\CLN\CLNPreventa->currency('USD', 'DOP', 1)
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(83): App\Models\CLN\CLNPreventa->Get_Producto_Avanzado()
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->search()
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2019-11-18 18:05:11 --> count(): Parameter must be an array or an object that implements Countable
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'count(): Parame...', '/home/n4iram7ws...', 65, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(65): count(NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->search()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-11-18 18:05:11 --> count(): Parameter must be an array or an object that implements Countable
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'count(): Parame...', '/home/n4iram7ws...', 65, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(65): count(NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->search()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2019-11-18 18:05:11 --> count(): Parameter must be an array or an object that implements Countable
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'count(): Parame...', '/home/n4iram7ws...', 65, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(65): count(NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->search()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
