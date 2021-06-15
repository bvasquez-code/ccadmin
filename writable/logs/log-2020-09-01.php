<?php defined('SYSTEMPATH') || exit('No direct script access allowed'); ?>

CRITICAL - 2020-09-01 17:01:53 --> Argument 2 passed to App\Models\CLN\CLNFacturacion::Get_Venta() must be an instance of App\Models\CEN\CENAutenticacionService, null given, called in D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Facturacion.php on line 111
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Facturacion.php(111): App\Models\CLN\CLNFacturacion->Get_Venta(Object(App\Models\CEN\CENDataService), NULL)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Facturacion->crear('280')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Facturacion))
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-09-01 17:02:02 --> Trying to get property 'Flg_Cargado' of non-object
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Facturacion.php(38): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Trying to get p...', 'D:\\WIN_INSTALAD...', 38, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Facturacion->index()
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Facturacion))
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-09-01 22:39:50 --> Argument 2 passed to App\Models\CLN\CLNFacturacion::Get_Venta() must be an instance of App\Models\CEN\CENAutenticacionService, null given, called in D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Facturacion.php on line 111
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Facturacion.php(111): App\Models\CLN\CLNFacturacion->Get_Venta(Object(App\Models\CEN\CENDataService), NULL)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Facturacion->crear('282')
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Facturacion))
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#5 {main}
CRITICAL - 2020-09-01 23:26:27 --> Object of class App\Models\CEN\CENImpuesto could not be converted to number
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(351): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Object of class...', 'D:\\WIN_INSTALAD...', 351, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(229): App\Models\CLN\CLNPreventa->Recalcular_Item_Carrito(Object(App\Models\CEN\CENItemproducto), 1)
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(147): App\Models\CLN\CLNPreventa->Add_Item_Carrito(Object(App\Models\CEN\CENCarrito), Array, 47, 0)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(181): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(Object(App\Models\CEN\CENCarrito), Object(App\Models\CEN\CENAccionesCarrito), 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2020-09-01 23:26:30 --> Object of class App\Models\CEN\CENImpuesto could not be converted to number
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(351): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Object of class...', 'D:\\WIN_INSTALAD...', 351, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(229): App\Models\CLN\CLNPreventa->Recalcular_Item_Carrito(Object(App\Models\CEN\CENItemproducto), 1)
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(147): App\Models\CLN\CLNPreventa->Add_Item_Carrito(Object(App\Models\CEN\CENCarrito), Array, 47, 0)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(181): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(Object(App\Models\CEN\CENCarrito), Object(App\Models\CEN\CENAccionesCarrito), 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
CRITICAL - 2020-09-01 23:26:39 --> Object of class App\Models\CEN\CENImpuesto could not be converted to number
#0 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(351): CodeIgniter\Debug\Exceptions->errorHandler(8, 'Object of class...', 'D:\\WIN_INSTALAD...', 351, Array)
#1 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(229): App\Models\CLN\CLNPreventa->Recalcular_Item_Carrito(Object(App\Models\CEN\CENItemproducto), 1)
#2 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Models\CLN\CLNPreventa.php(147): App\Models\CLN\CLNPreventa->Add_Item_Carrito(Object(App\Models\CEN\CENCarrito), Array, 46, 0)
#3 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\app\Controllers\Preventa.php(181): App\Models\CLN\CLNPreventa->Set_Producto_Carrito(Object(App\Models\CEN\CENCarrito), Object(App\Models\CEN\CENAccionesCarrito), 2, 1, 1, 'ADMIN', '$argon2i$v=19$m...')
#4 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(844): App\Controllers\Preventa->Set_Producto_Carrito()
#5 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(335): CodeIgniter\CodeIgniter->runController(Object(App\Controllers\Preventa))
#6 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\system\CodeIgniter.php(245): CodeIgniter\CodeIgniter->handleRequest(NULL, Object(Config\Cache), false)
#7 D:\WIN_INSTALADO\xampp\htdocs\ccadmin\public\index.php(45): CodeIgniter\CodeIgniter->run()
#8 {main}
