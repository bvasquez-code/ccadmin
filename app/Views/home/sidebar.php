<?php
//extrayendo lo que va despues de /index.php hasta antes del metodo
$uri = uri_string();
$menu = explode("/",$uri);
$l_List_Menu_Permitidos = $Datos_Sesion["List_Menu_Permitidos"];

?>
<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="">
						<a href="index.html">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					<?php if(key_exists("menu_procesos",$l_List_Menu_Permitidos)){ ?>
					<li class="<?php if ($menu[0] == "proceso")
					{ echo "active open";}else{ echo "";}?>">

						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text"> PROCESOS </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

							<?php if(key_exists("proceso",$l_List_Menu_Permitidos)){ ?>
							<ul class="submenu">
								<li class="<?php if ($menu[0] == "proceso")
								{ echo "active open";}else{ echo "";}?>">
									<a href="<?=base_url('public/proceso'); ?>">
										<i class="menu-icon fa fa-caret-right"></i>
										PROCESOS AUTOMATICOS
									</a>

									<b class="arrow"></b>
								</li>
							</ul>
							<?php } ?>
					</li>
					<?php } ?>
					
					<?php if(key_exists("menu_mantenimiento",$l_List_Menu_Permitidos)){ ?>
					<li	class="<?php if ($menu[0] == "parsistema" || $menu[0] == "perfilusuario" || $menu[0] == "usuario" || $menu[0]=="opcionesmenu" ||
										 $menu[0] == "categoriaproducto" || $menu[0] == "marcaproducto" || $menu[0] == "producto" ||
										 $menu[0] == "kardex" || $menu[0] == "caja" || $menu[0] == "transaccion" || $menu[0] == "talonario"
										 || $menu[0] == "promo" || $menu[0] == "cliente" || $menu[0] == "proveedor")
					{ echo "active open";}else{ echo "";}?>">

						<a href="" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text">
								MANTENIMIENTO
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<?php if(key_exists("sub_menu_sistema",$l_List_Menu_Permitidos)){ ?>
						<ul class="submenu">
							<li class="<?php if ($menu[0] == "parsistema" || $menu[0]=="opcionesmenu")
							{ echo "active open";}else{ echo "";}?>">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>
									SISTEMA
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

									<?php if(key_exists("parsistema",$l_List_Menu_Permitidos)){ ?>
									<ul class="submenu">
										<li class="<?php if ($menu[0] == "parsistema") echo "active"; ?>">
											<a href="<?=base_url('public/parsistema'); ?>"><i class="menu-icon fa fa-caret-right"></i>
												PARAMETROS DE SISTEMA
											</a>
											<b class="arrow"></b>
										</li>
									</ul>
									<?php } ?>

									<?php if(key_exists("opcionesmenu",$l_List_Menu_Permitidos)){ ?>
									<ul class="submenu">
										<li class="<?php if ($menu[0] == "opcionesmenu") echo "active"; ?>">
											<a href="<?=base_url('public/opcionesmenu'); ?>"><i class="menu-icon fa fa-caret-right"></i>
												OPCIONES DE MENU
											</a>
											<b class="arrow"></b>
										</li>
									</ul>
									<?php } ?>							
							</li>
						</ul>
						<?php } ?>
						
						<?php if(key_exists("sub_menu_seguridad",$l_List_Menu_Permitidos)){ ?>
						<ul class="submenu">
							<li class="<?php if ($menu[0] == "perfilusuario" || $menu[0] == "usuario" || $menu[0] == "caja" || $menu[0] == "talonario")
							{ echo "active open";}else{ echo "";}?>">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>
									SEGURIDAD
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">
									
									<?php if(key_exists("perfilusuario",$l_List_Menu_Permitidos)){ ?>
									<li class="<?php if ($menu[0] == "perfilusuario") echo "active"; ?>">
										<a href="<?=base_url('public/perfilusuario'); ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											PERFILES DE USUARIO
										</a>

										<b class="arrow"></b>
									</li>
									<?php } ?>
								
									<?php if(key_exists("usuario",$l_List_Menu_Permitidos)){ ?>
									<li class="<?php if ($menu[0] == "usuario") echo "active"; ?>">
										<a href="<?=base_url('public/usuario'); ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											USUARIOS
										</a>

										<b class="arrow"></b>
									</li>
									<?php } ?>
								
									<?php if(key_exists("caja",$l_List_Menu_Permitidos)){ ?>
									<li class="<?php if ($menu[0] == "caja") echo "active"; ?>">
										<a href="<?=base_url('public/caja'); ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											CONFIGURACION CAJAS
										</a>

										<b class="arrow"></b>
									</li>
									<?php } ?>
								
									<?php if(key_exists("talonario",$l_List_Menu_Permitidos)){ ?>
									<li class="<?php if ($menu[0] == "talonario") echo "active"; ?>">
										<a href="<?=base_url('public/talonario'); ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											TALONARIO
										</a>

										<b class="arrow"></b>
									</li>
									<?php } ?>
								</ul>
							</li>
						</ul>
						<?php } ?>						
						
						<?php if(key_exists("sub_menu_negocio",$l_List_Menu_Permitidos)){ ?>
						<ul class="submenu">
							<li class="<?php if ($menu[0] == "categoriaproducto" || $menu[0] == "marcaproducto" || $menu[0] == "producto" || $menu[0] == "kardex"
													|| $menu[0] == "transaccion" || $menu[0] == "promo" || $menu[0] == "cliente" || $menu[0] == "proveedor")
							{ echo "active open";}else{ echo "";}?>">
								<a href="#" class="dropdown-toggle">
									<i class="menu-icon fa fa-caret-right"></i>
									NEGOCIO
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								<ul class="submenu">

									<?php if(key_exists("categoriaproducto",$l_List_Menu_Permitidos)){ ?>
									<li class="<?php if ($menu[0] == "categoriaproducto") echo "active"; ?>">
										<a href="<?=base_url('public/categoriaproducto'); ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											CATEGORIA PRODUCTO
										</a>

										<b class="arrow"></b>
									</li>
									<?php } ?>
									
									<?php if(key_exists("marcaproducto",$l_List_Menu_Permitidos)){ ?>
									<li class="<?php if ($menu[0] == "marcaproducto") echo "active"; ?>">
										<a href="<?=base_url('public/marcaproducto'); ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											MARCA PRODUCTO
										</a>

										<b class="arrow"></b>
									</li>
									<?php } ?>
									
									<?php if(key_exists("producto",$l_List_Menu_Permitidos)){ ?>
									<li class="<?php if ($menu[0] == "producto") echo "active"; ?>">
										<a href="<?=base_url('public/producto'); ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											PRODUCTO
										</a>

										<b class="arrow"></b>
									</li>
									<?php } ?>
									
									<?php if(key_exists("kardex",$l_List_Menu_Permitidos)){ ?>
									<li class="<?php if ($menu[0] == "kardex") echo "active"; ?>">
										<a href="<?=base_url('public/kardex'); ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											KARDEX
										</a>

										<b class="arrow"></b>
									</li>
									<?php } ?>
									
									<?php if(key_exists("promo",$l_List_Menu_Permitidos)){ ?>
									<li class="<?php if ($menu[0] == "promo") echo "active"; ?>">
										<a href="<?=base_url('public/promo'); ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											PROMOCIONES
										</a>

										<b class="arrow"></b>
									</li>
									<?php } ?>
									
									<?php if(key_exists("cliente",$l_List_Menu_Permitidos)){ ?>
									<li class="<?php if ($menu[0] == "cliente") echo "active"; ?>">
										<a href="<?=base_url('public/cliente'); ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											CLIENTES
										</a>

										<b class="arrow"></b>
									</li>
									<?php } ?>
									
									<?php if(key_exists("proveedor",$l_List_Menu_Permitidos)){ ?>
									<li class="<?php if ($menu[0] == "proveedor") echo "active"; ?>">
										<a href="<?=base_url('public/proveedor'); ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											PROVEEDORES
										</a>

										<b class="arrow"></b>
									</li>
									<?php } ?>
									
									<?php if(key_exists("transaccion",$l_List_Menu_Permitidos)){ ?>
									<li class="<?php if ($menu[0] == "transaccion") echo "active"; ?>">
										<a href="<?=base_url('public/transaccion'); ?>">
											<i class="menu-icon fa fa-caret-right"></i>
											TRANSACCIÓNES
										</a>

										<b class="arrow"></b>
									</li>
									<?php } ?>

								</ul>
							</li>
						</ul>
						<?php } ?>

					</li>
					<?php } ?>
					
					<?php if(key_exists("menu_operaciones",$l_List_Menu_Permitidos)){ ?>
					<li class="<?php if ($menu[0] == "venta" || $menu[0] == "preventa" || $menu[0] == "facturacion" || $menu[0] == "stockmanual"
											|| $menu[0] == "compra" || $menu[0] == "trxcuenta" || $menu[0] == "facelectronica" || $menu[0] == "almacen"
											|| $menu[0] == "notacredito" )
					{ echo "active open";}else{ echo "";}?>">

						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> OPERACIONES </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							
							<?php if(key_exists("preventa",$l_List_Menu_Permitidos)){ ?>
							<li class="<?php if ($menu[0] == "preventa")
							{ echo "active open";}else{ echo "";}?>">
								<a href="<?=base_url('public/preventa'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									PREVENTA
								</a>

								<b class="arrow"></b>
							</li>
							<?php } ?>
							
							<?php if(key_exists("facturacion",$l_List_Menu_Permitidos)){ ?>
							<li class="<?php if ($menu[0] == "facturacion")
							{ echo "active open";}else{ echo "";}?>">
								<a href="<?=base_url('public/facturacion'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									FACTURACION
								</a>

								<b class="arrow"></b>
							</li>
							<?php } ?>

							<?php if(key_exists("notacredito",$l_List_Menu_Permitidos)){ ?>
							<li class="<?php if ($menu[0] == "notacredito")
							{ echo "active open";}else{ echo "";}?>">
								<a href="<?=base_url('public/notacredito'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									NOTA DE CREDITO
								</a>

								<b class="arrow"></b>
							</li>
							<?php } ?>

							<?php if(key_exists("facelectronica",$l_List_Menu_Permitidos)){ ?>
							<li class="<?php if ($menu[0] == "facelectronica")
							{ echo "active open";}else{ echo "";}?>">
								<a href="<?=base_url('public/facelectronica'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									FACTURACIÓN ELECTRONICA
								</a>

								<b class="arrow"></b>
							</li>
							<?php } ?>

							<li class="<?php if ($menu[0] == "almacen")
							{ echo "active open";}else{ echo "";}?>">
								<a href="<?=base_url('public/almacen'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									ALMACEN
								</a>

								<b class="arrow"></b>
							</li>

							<?php if(key_exists("compra",$l_List_Menu_Permitidos)){ ?>
							<li class="<?php if ($menu[0] == "compra")
							{ echo "active open";}else{ echo "";}?>">
								<a href="<?=base_url('public/compra'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									COMPRAS
								</a>

								<b class="arrow"></b>
							</li>
							<?php } ?>

							<?php if(key_exists("stockmanual",$l_List_Menu_Permitidos)){ ?>
							<li class="<?php if ($menu[0] == "stockmanual")
							{ echo "active open";}else{ echo "";}?>">
								<a href="<?=base_url('public/stockmanual'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									CARGA STOCK MANUAL
								</a>

								<b class="arrow"></b>
							</li>
							<?php } ?>

							<?php if(key_exists("trxcuenta",$l_List_Menu_Permitidos)){ ?>
							<li class="<?php if ($menu[0] == "trxcuenta")
							{ echo "active open";}else{ echo "";}?>">
								<a href="<?=base_url('public/trxcuenta'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									TRANSACCIONES CUENTA
								</a>

								<b class="arrow"></b>
							</li>
							<?php } ?>
						</ul>
					</li>
					<?php } ?>
					
					<?php if(key_exists("menu_reporte",$l_List_Menu_Permitidos)){ ?>
					<li class="<?php if ($menu[0] == "reporte")
					{ echo "active open";}else{ echo "";}?>">

						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> REPORTE </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>
						<ul class="submenu">
							<?php if(key_exists("ReporteGananciaSKU",$l_List_Menu_Permitidos)){ ?>
							<li class="<?php if($menu[0] == "reporte") {if ($menu[1] == "ReporteGananciaSKU")
							{ echo "active open";}}else{ echo "";}?>">
								<a href="<?=base_url('public/reporte/ReporteGananciaSKU'); ?>">
									<i class="menu-icon fa fa-caret-right"></i>
									GANANCIA POR VENTA
								</a>

								<b class="arrow"></b>
							</li>
							<?php } ?>
						</ul>
					</li>
					<?php } ?>

				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>