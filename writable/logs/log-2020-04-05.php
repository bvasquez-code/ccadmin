<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-04-05 14:14:32 --> include(library/phpqrcode/qrlib.php): failed to open stream: No such file or directory
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNServices.php(16): CodeIgniter\Debug\Exceptions->errorHandler(2, 'include(library...', '/home/n4iram7ws...', 16, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNServices.php(16): include()
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Services.php(20): App\Models\CLN\CLNServices->__construct()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Services->Get_Code_qr()
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Services))
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2020-04-05 14:25:10 --> include(app/Libraries/phpqrcode/qrlib.php): failed to open stream: No such file or directory
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNServices.php(16): CodeIgniter\Debug\Exceptions->errorHandler(2, 'include(app/Lib...', '/home/n4iram7ws...', 16, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNServices.php(16): include()
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Services.php(20): App\Models\CLN\CLNServices->__construct()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Services->Get_Code_qr()
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Services))
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2020-04-05 14:29:01 --> include(app/Libraries/phpqrcode/qrlib.php): failed to open stream: No such file or directory
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNServices.php(10): CodeIgniter\Debug\Exceptions->errorHandler(2, 'include(app/Lib...', '/home/n4iram7ws...', 10, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNServices.php(10): include()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Autoloader/Autoloader.php(364): require_once('/home/n4iram7ws...')
#3 /home/n4iram7wszfs/public_html/ccadmin/system/Autoloader/Autoloader.php(295): CodeIgniter\Autoloader\Autoloader->requireFile('/home/n4iram7ws...')
#4 /home/n4iram7wszfs/public_html/ccadmin/system/Autoloader/Autoloader.php(257): CodeIgniter\Autoloader\Autoloader->loadInNamespace('App\\Models\\CLN\\...')
#5 [internal function]: CodeIgniter\Autoloader\Autoloader->loadClass('App\\Models\\CLN\\...')
#6 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Services.php(20): spl_autoload_call('App\\Models\\CLN\\...')
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Services->Get_Code_qr()
#8 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Services))
#9 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2020-04-05 14:38:05 --> Class 'App\Libraries\phpqrcode\qrlib' not found
#0 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(820): App\Controllers\BaseController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(330): CodeIgniter\CodeIgniter->createController()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2020-04-05 14:38:47 --> Class 'App\Libraries\phpqrcode\qrlib' not found
#0 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(820): App\Controllers\BaseController->initController(Object(CodeIgniter\HTTP\IncomingRequest), Object(CodeIgniter\HTTP\Response), Object(CodeIgniter\Log\Logger))
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(330): CodeIgniter\CodeIgniter->createController()
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2020-04-05 14:41:13 --> CodeIgniter\Autoloader\Autoloader::main(): Failed opening required '/home/n4iram7wszfs/public_html/ccadmin/system/app/Libraries/phpqrcode/qrlib.php' (include_path='.:/opt/alt/php73/usr/share/pear')
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2020-04-05 14:45:12 --> CodeIgniter\Autoloader\Autoloader::main(): Failed opening required 'app/Libraries/phpqrcode/qrlib.php' (include_path='.:/opt/alt/php73/usr/share/pear')
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2020-04-05 15:11:46 --> App\Models\CLN\CLNServices::Get_Code_qr(): Failed opening required 'phpqrcode/qrlib.php' (include_path='.:/opt/alt/php73/usr/share/pear')
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2020-04-05 15:12:24 --> App\Models\CLN\CLNServices::Get_Code_qr(): Failed opening required 'app/Libraries/phpqrcode/qrlib.php' (include_path='.:/opt/alt/php73/usr/share/pear')
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2020-04-05 16:19:25 --> Interface 'Endroid\QrCode\QrCodeInterface' not found
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2020-04-05 16:20:04 --> Interface 'Endroid\QrCode\QrCodeInterface' not found
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2020-04-05 16:21:29 --> Interface 'Endroid\QrCode\QrCodeInterface' not found
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2020-04-05 16:24:26 --> Interface 'Endroid\QrCode\QrCodeInterface' not found
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2020-04-05 16:32:28 --> Interface 'Endroid\QrCode\QrCodeInterface' not found
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2020-04-05 16:32:46 --> Interface 'Endroid\QrCode\QrCodeInterface' not found
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2020-04-05 20:12:05 --> Interface 'Endroid\QrCode\QrCodeInterface' not found
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
CRITICAL - 2020-04-05 20:13:44 --> Interface 'Endroid\QrCode\QrCodeInterface' not found
#0 [internal function]: CodeIgniter\Debug\Exceptions->shutdownHandler()
#1 {main}
