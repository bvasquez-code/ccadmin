<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2019-12-18 21:15:41 --> Unknown column 'Flg_ParSis_Bo3' in 'field list'
#0 /home/n4iram7wszfs/public_html/ccadmin/system/Database/MySQLi/Connection.php(329): mysqli->query(' SELECT Cod_Cfp...')
#1 /home/n4iram7wszfs/public_html/ccadmin/system/Database/BaseConnection.php(737): CodeIgniter\Database\MySQLi\Connection->execute(' SELECT Cod_Cfp...')
#2 /home/n4iram7wszfs/public_html/ccadmin/system/Database/BaseConnection.php(665): CodeIgniter\Database\BaseConnection->simpleQuery(' SELECT Cod_Cfp...')
#3 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADConfigsistema.php(75): CodeIgniter\Database\BaseConnection->query(' SELECT Cod_Cfp...', Array)
#4 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CAD/CADConfigsistema.php(123): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_array(1, 0, 'Cod_Cfpsis,Des_...', NULL)
#5 /home/n4iram7wszfs/public_html/ccadmin/app/Models/CLN/CLNConfigsistema.php(31): App\Models\CAD\CADConfigsistema->Get_Parametros_Sistema_object(1, 0, 'Cod_Cfpsis,Des_...', NULL)
#6 /home/n4iram7wszfs/public_html/ccadmin/app/Controllers/Preventa.php(46): App\Models\CLN\CLNConfigsistema->Get_Parametros_Sistema_object(1, 0, 'Cod_Cfpsis,Des_...')
#7 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(844): App\Controllers\Preventa->crear()
#8 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#9 /home/n4iram7wszfs/public_html/ccadmin/system/CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#10 /home/n4iram7wszfs/public_html/ccadmin/public/index.php(45): CodeIgniter\CodeIgniter->run()
#11 {main}
