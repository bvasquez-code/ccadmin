<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-10-11 00:11:55 --> Call to undefined method stdClass::getVar()
#0 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-10-11 00:12:12 --> Call to undefined method stdClass::getVar()
#0 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#1 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#2 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#3 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#4 {main}
CRITICAL - 2019-10-11 00:32:05 --> hash(): Unknown hashing algorithm: sdfgdsgsdf
#0 [internal function]: CodeIgniter\Debug\Exceptions->errorHandler(2, 'hash(): Unknown...', '/home/n4iram7ws...', 10, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNLogin.php(10): hash('sdfgdsgsdf', 'fdsdgsdf')
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Login.php(22): App\Models\CLN\CLNLogin->Autentificar('fdsdgsdf', 'sdfgdsgsdf')
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2019-10-11 21:37:21 --> You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'YOUR QUERY' at line 1
#0 /home/n4iram7wszfs/public_html/ccadmin/system/Database/MySQLi/Connection.php(329): mysqli->query('YOUR QUERY')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Database/BaseConnection.php(737): CodeIgniter\Database\MySQLi\Connection->execute('YOUR QUERY')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Database/BaseConnection.php(665): CodeIgniter\Database\BaseConnection->simpleQuery('YOUR QUERY')
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADLogin.php(16): CodeIgniter\Database\BaseConnection->query('YOUR QUERY')
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNLogin.php(17): App\Models\CAD\CADLogin->Autentificar('brater_tk15@hot...', 'adsgafgsdf')
#5 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Login.php(23): App\Models\CLN\CLNLogin->Autentificar('brater_tk15@hot...', 'adsgafgsdf')
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#8 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#9 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#10 {main}
CRITICAL - 2019-10-11 21:38:56 --> You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'YOUR QUERY' at line 1
#0 /home/n4iram7wszfs/public_html/ccadmin/system/Database/MySQLi/Connection.php(329): mysqli->query('YOUR QUERY')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Database/BaseConnection.php(737): CodeIgniter\Database\MySQLi\Connection->execute('YOUR QUERY')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Database/BaseConnection.php(665): CodeIgniter\Database\BaseConnection->simpleQuery('YOUR QUERY')
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADLogin.php(17): CodeIgniter\Database\BaseConnection->query('YOUR QUERY')
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNLogin.php(17): App\Models\CAD\CADLogin->Autentificar('brater_tk15@hot...', 'adsgafgsdf')
#5 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Login.php(23): App\Models\CLN\CLNLogin->Autentificar('brater_tk15@hot...', 'adsgafgsdf')
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#8 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#9 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#10 {main}
CRITICAL - 2019-10-11 22:12:55 --> You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near 'YOUR QUERY' at line 1
#0 /home/n4iram7wszfs/public_html/ccadmin/system/Database/MySQLi/Connection.php(329): mysqli->query('YOUR QUERY')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Database/BaseConnection.php(737): CodeIgniter\Database\MySQLi\Connection->execute('YOUR QUERY')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Database/BaseConnection.php(665): CodeIgniter\Database\BaseConnection->simpleQuery('YOUR QUERY')
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADLogin.php(17): CodeIgniter\Database\BaseConnection->query('YOUR QUERY')
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNLogin.php(17): App\Models\CAD\CADLogin->Autentificar('brater_tk15@hot...', 'adsgafgsdf')
#5 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Login.php(23): App\Models\CLN\CLNLogin->Autentificar('brater_tk15@hot...', 'adsgafgsdf')
#6 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#8 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#9 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#10 {main}
CRITICAL - 2019-10-11 23:20:38 --> A non-numeric value encountered
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADLogin.php(17): CodeIgniter\Debug\Exceptions->errorHandler(2, 'A non-numeric v...', '/home/n4iram7ws...', 17, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNLogin.php(17): App\Models\CAD\CADLogin->Autentificar('brater_tk15@hot...', 'adsgafgsdf')
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Login.php(23): App\Models\CLN\CLNLogin->Autentificar('brater_tk15@hot...', 'adsgafgsdf')
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2019-10-11 23:22:13 --> A non-numeric value encountered
#0 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADLogin.php(17): CodeIgniter\Debug\Exceptions->errorHandler(2, 'A non-numeric v...', '/home/n4iram7ws...', 17, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNLogin.php(17): App\Models\CAD\CADLogin->Autentificar('ADMIN', 'ADMIN')
#2 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Login.php(23): App\Models\CLN\CLNLogin->Autentificar('ADMIN', 'ADMIN')
#3 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#4 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#5 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#6 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#7 {main}
CRITICAL - 2019-10-11 23:30:05 --> Undefined offset: 1
#0 /home/n4iram7wszfs/public_html/ccadmin/system/Database/Query.php(480): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined offse...', '/home/n4iram7ws...', 480, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Database/Query.php(407): CodeIgniter\Database\Query->matchSimpleBinds('CALL sp_cixmart...', Array, 2, 1)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Database/Query.php(196): CodeIgniter\Database\Query->compileBinds()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/Database/BaseConnection.php(665): CodeIgniter\Database\Query->getQuery()
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADLogin.php(20): CodeIgniter\Database\BaseConnection->query('CALL sp_cixmart...', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNLogin.php(17): App\Models\CAD\CADLogin->Autentificar('ADMIN', 'ADMIN')
#6 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Login.php(23): App\Models\CLN\CLNLogin->Autentificar('ADMIN', 'ADMIN')
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#8 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#9 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2019-10-11 23:35:22 --> Undefined offset: 1
#0 /home/n4iram7wszfs/public_html/ccadmin/system/Database/Query.php(480): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined offse...', '/home/n4iram7ws...', 480, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Database/Query.php(407): CodeIgniter\Database\Query->matchSimpleBinds('CALL sp_cixmart...', Array, 2, 1)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Database/Query.php(196): CodeIgniter\Database\Query->compileBinds()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/Database/BaseConnection.php(665): CodeIgniter\Database\Query->getQuery()
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADLogin.php(20): CodeIgniter\Database\BaseConnection->query('CALL sp_cixmart...', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNLogin.php(17): App\Models\CAD\CADLogin->Autentificar('ADMIN', 'ADMIN')
#6 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Login.php(23): App\Models\CLN\CLNLogin->Autentificar('ADMIN', 'ADMIN')
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#8 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#9 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2019-10-11 23:40:12 --> Undefined offset: 1
#0 /home/n4iram7wszfs/public_html/ccadmin/system/Database/Query.php(480): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined offse...', '/home/n4iram7ws...', 480, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Database/Query.php(407): CodeIgniter\Database\Query->matchSimpleBinds('CALL sp_cixmart...', Array, 2, 1)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Database/Query.php(196): CodeIgniter\Database\Query->compileBinds()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/Database/BaseConnection.php(665): CodeIgniter\Database\Query->getQuery()
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADLogin.php(20): CodeIgniter\Database\BaseConnection->query('CALL sp_cixmart...', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNLogin.php(17): App\Models\CAD\CADLogin->Autentificar('ADMIN', 'ADMIN')
#6 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Login.php(23): App\Models\CLN\CLNLogin->Autentificar('ADMIN', 'ADMIN')
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#8 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#9 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
CRITICAL - 2019-10-11 23:49:46 --> Undefined offset: 1
#0 /home/n4iram7wszfs/public_html/ccadmin/system/Database/Query.php(480): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Undefined offse...', '/home/n4iram7ws...', 480, Array)
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Database/Query.php(407): CodeIgniter\Database\Query->matchSimpleBinds('CALL sp_cixmart...', Array, 2, 1)
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Database/Query.php(196): CodeIgniter\Database\Query->compileBinds()
#3 /home/n4iram7wszfs/public_html/ccadmin/system/Database/BaseConnection.php(665): CodeIgniter\Database\Query->getQuery()
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADLogin.php(20): CodeIgniter\Database\BaseConnection->query('CALL sp_cixmart...', Array)
#5 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNLogin.php(17): App\Models\CAD\CADLogin->Autentificar('ADMIN', 'ADMIN')
#6 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Login.php(23): App\Models\CLN\CLNLogin->Autentificar('ADMIN', 'ADMIN')
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Login->Autentificar()
#8 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Login))
#9 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
