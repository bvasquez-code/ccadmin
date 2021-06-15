<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-10-02 20:47:13 --> Argument 5 passed to App\Models\CLN\CLNCategoriaproducto::Get_Categoria_Producto() must be of the type string, null given, called in D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php on line 74
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(74): App\Models\CLN\CLNCategoriaproducto->Get_Categoria_Producto(Object(App\Models\CEN\CENDataService), 2, 1, 1, NULL, NULL)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(161): App\Models\CLN\CLNPreventa->Render_search(Array, Object(App\Models\CEN\CENAutenticacionService))
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->search()
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2020-10-02 20:48:40 --> Argument 5 passed to App\Models\CLN\CLNCategoriaproducto::Get_Categoria_Producto() must be of the type string, null given, called in D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php on line 74
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(74): App\Models\CLN\CLNCategoriaproducto->Get_Categoria_Producto(Object(App\Models\CEN\CENDataService), 2, 1, 1, NULL, NULL)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(161): App\Models\CLN\CLNPreventa->Render_search(Array, Object(App\Models\CEN\CENAutenticacionService))
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->search()
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#6 {main}
CRITICAL - 2020-10-02 21:05:29 --> You must set the database table to be used with your query.
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Model.php(1190): CodeIgniter\Database\BaseConnection->table(NULL)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Model.php(1629): CodeIgniter\Model->builder()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(45): CodeIgniter\Model->__get('session')
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(32): App\Models\CLN\CLNPreventa->Render_Index()
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->index()
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2020-10-02 21:06:49 --> You must set the database table to be used with your query.
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Model.php(1190): CodeIgniter\Database\BaseConnection->table(NULL)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Model.php(1629): CodeIgniter\Model->builder()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(45): CodeIgniter\Model->__get('session')
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(32): App\Models\CLN\CLNPreventa->Render_index()
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->index()
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2020-10-02 21:08:39 --> You must set the database table to be used with your query.
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Model.php(1190): CodeIgniter\Database\BaseConnection->table(NULL)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\Model.php(1629): CodeIgniter\Model->builder()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(45): CodeIgniter\Model->__get('session')
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(32): App\Models\CLN\CLNPreventa->Render_index()
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->index()
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
