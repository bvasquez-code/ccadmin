<?php
namespace App\Controllers;
/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];
	public $session = null;
	public $template = null;
	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);
		$this->session = \Config\Services::session();
		helper('funcionesCAD');
		helper('constantesGLO');
		// setlocale(LC_MONETARY, 'es_PE');
		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();
	}


	public function ConstruirMenu(string $p_Vista,$p_Datos=[])
	{
		$p_DatosHtml = [];

		if( $this->session->get("session") === true &&  (int)$this->session->get("Tip_Session") === 1 )
		{
			if($p_Vista=="login") return view('login');

			$p_Datos['Datos_Sesion']['List_Menu_Permitidos'] = $this->session->get("List_Menu_Permitidos");
			
			$p_DatosHtml["nav"] = view('home/nav', $p_Datos);
			$p_DatosHtml["sidebar"] = view('home/sidebar', $p_Datos);
			
			if ( $p_Vista != "" ) {				
				$p_DatosHtml['content'] = view($p_Vista, $p_Datos);
			}
			
			$p_DatosHtml['Datos_Sesion']['Nom_Usuario'] = $this->session->get("Nom_Usuario");
			$p_DatosHtml['Datos_Sesion']['List_Menu_Permitidos'] = $this->session->get("List_Menu_Permitidos");

			return view('home/index', $p_DatosHtml);	

		}else{
			return view('login');
		}
	}

	public function Enviar_Login()
	{
		return view('login');		
	}

	public function Enviar_Pagina_Externa(string $p_Ruta)
	{
		return view($p_Ruta);		
	}

}
