<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-11-28 21:28:35 --> session_start(): Failed to decode session object. Session has been destroyed
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'session_start()...', '/home/n4iram7ws...', 1001, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Session/Session.php(1001): session_start()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Session/Session.php(237): CodeIgniter\Session\Session->startSession()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/Config/Services.php(773): CodeIgniter\Session\Session->start()
#4 /home/n4iram7wszfs/public_html/ccadmin/system/Config/BaseService.php(119): CodeIgniter\Config\Services::session(Object(Config\App), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/system/Config/Services.php(754): CodeIgniter\Config\BaseService::getSharedInstance('session', NULL)
#6 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/BaseController.php(38): CodeIgniter\Config\Services::session()
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(820): App\Controllers\BaseController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
#8 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(330): CodeIgniter\CodeIgniter->createController()
#9 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2019-11-28 21:28:53 --> count(): Parameter must be an array or an object that implements Countable
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'count(): Parame...', '/home/n4iram7ws...', 83, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(83): count(NULL)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->search()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
