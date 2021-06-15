<?php namespace App\Models\CAD;

use CodeIgniter\Model;

use App\Models\CEN\CENTienda as ENTienda;
use App\Models\CEN\CENAlmacen as ENAlmacen;

class CADGenerico extends Model
{
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }


    public function Get_List_Tienda(int $p_Id_Tienda):array
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_Sting_Query = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];

        $l_Flg_Activo = true;
        $l_Tienda = null; //objeto tienda
        $l_List_Tienda = []; //Lista de tiendas

        $l_Sting_Query  = " SELECT Id_Datie,Cod_Datie,Des_Datie_Nom FROM DA_TIENDA WHERE Flg_Estado = ? AND Flg_Marcabaja = ? ";
        if ( $p_Id_Tienda != 0 ) $l_Sting_Query .= " AND Id_Datie = ? ";

        array_push($l_ListParametros,["Flg_Estado",$l_Flg_Activo]);
        array_push($l_ListParametros,["Flg_Marcabaja",$l_Flg_Activo]);
        if ( $p_Id_Tienda != 0 ) array_push($l_ListParametros,["Id_Datie",$p_Id_Tienda]);

        $l_ObjetoQuery = CrearEstructuraQuery($l_Sting_Query,$l_ListParametros);
        $l_query = $this->db->query($l_ObjetoQuery["query"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();

            if($l_ResultDt)
            {
                foreach($l_ResultDt as $Item)
                {
                    $l_Tienda = new ENTienda();
                    $l_Tienda->Id_Tienda = (int)$Item["Id_Datie"];
                    $l_Tienda->Cod_Tienda = (string)$Item["Cod_Datie"];
                    $l_Tienda->Des_Tienda = (string)$Item["Des_Datie_Nom"];
                    array_push($l_List_Tienda,$l_Tienda);
                }
            }
        }

        return $l_List_Tienda;

    }

    public function Get_Ultima_Actualizacion_Moneda(int $p_Tip_Moneda):string
    {
        $l_ResultDt = null;
        $l_query = null;
        $l_Fec_Actualizacion = "";
        $l_SQL = "";
        $l_Type_Money = 7; //TIPOS DE MONEDA
        $l_ListParametros = [];
        $l_Fec_Principal = false;

        $l_SQL = "  SELECT
                        Fec_Modifica,Flg_Cfpsis_Bo1
                    FROM 
                        CF_PARSISTEMA
                    WHERE 
                    CF_PARSISTEMA.Cod_Cfsis_FK = :Cod_Cfsis_FK:
                    AND CF_PARSISTEMA.Cod_Cfpsis = :Cod_Cfpsis:  ";

        $l_ListParametros["Cod_Cfsis_FK"] = $l_Type_Money;
        $l_ListParametros["Cod_Cfpsis"] = $p_Tip_Moneda;
            
        $l_query = $this->db->query( $l_SQL , $l_ListParametros );

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            if($l_ResultDt)
            {
                $l_Fec_Principal = (bool)$l_ResultDt[0]["Flg_Cfpsis_Bo1"];

                if( $l_Fec_Principal == false )
                {
                    $l_Fec_Actualizacion = (string)$l_ResultDt[0]["Fec_Modifica"];
                }else
                {
                    $l_Fec_Actualizacion = date("Y-m-d H:i:s");
                }
                    
            }
        }

        return $l_Fec_Actualizacion;
    }

    public function Get_List_Departamento():array
    {
        $l_List_Departamento = [];
        $l_ResultDt = null;
        $l_query = null;
        $l_SQL = "";

        $l_SQL = "  SELECT
                        DISTINCT(DA_UBIGEO.Des_Daubi_Dep) AS Des_Daubi_Dep
                    FROM 
                        DA_UBIGEO
                    ORDER BY Des_Daubi_Dep ASC";
            
        $l_query = $this->db->query( $l_SQL );

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            if($l_ResultDt)
            {
                foreach( $l_ResultDt as $Item )
                {
                    array_push($l_List_Departamento,
                        [ 
                             "Cod_Departamento" => $Item["Des_Daubi_Dep"]
                            ,"Des_Departamento"=> strtoupper($Item["Des_Daubi_Dep"])
                        ]
                    );
                }
            }
        }
        return $l_List_Departamento;   
    }

    public function Get_List_Provincia(string $p_Cod_Departamento):array
    {
        $l_List_Provincia = [];
        $l_ResultDt = null;
        $l_query = null;
        $l_SQL = "";
        $l_ListParametros = [];

        $l_SQL = "  SELECT
                        DISTINCT(Des_Daubi_Pro) AS Des_Daubi_Pro
                    FROM 
                        DA_UBIGEO
                    WHERE 
                        Des_Daubi_Dep = :p_Cod_Departamento: ";

        $l_ListParametros["p_Cod_Departamento"] = $p_Cod_Departamento;
            
        $l_query = $this->db->query( $l_SQL , $l_ListParametros );

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            if($l_ResultDt)
            {
                foreach( $l_ResultDt as $Item )
                {
                    array_push($l_List_Provincia,
                        [ 
                             "Cod_Provincia" => $Item["Des_Daubi_Pro"]
                            ,"Des_Provincia"=> strtoupper($Item["Des_Daubi_Pro"])
                        ]
                    );
                }
            }
        }
        return $l_List_Provincia;   
    }

    public function Get_List_Distrito(string $p_Cod_Departamento,string $p_Cod_Provincia):array
    {
        $l_List_Departamento = [];
        $l_ResultDt = null;
        $l_query = null;
        $l_SQL = "";
        $l_ListParametros = [];

        $l_SQL = "  SELECT
                        Cod_Daubi,
                        Des_Daubi_Dis
                    FROM 
                        DA_UBIGEO
                    WHERE 
                        Des_Daubi_Dep = :p_Cod_Departamento:
                        AND Des_Daubi_Pro = :p_Cod_Provincia: ";

        $l_ListParametros["p_Cod_Departamento"] = $p_Cod_Departamento;
        $l_ListParametros["p_Cod_Provincia"] = $p_Cod_Provincia;
            
        $l_query = $this->db->query( $l_SQL , $l_ListParametros );

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            if($l_ResultDt)
            {
                foreach( $l_ResultDt as $Item )
                {
                    array_push($l_List_Departamento,
                        [ 
                             "Cod_Ubigeo" => $Item["Cod_Daubi"]
                            ,"Des_Distrito"=> strtoupper($Item["Des_Daubi_Dis"])
                        ]
                    );
                }
            }
        }
        return $l_List_Departamento;   
    }

    public function Get_List_Almacen(int $p_Id_Tienda):array
    {
        $l_List_Departamento = [];
        $l_ResultDt = null;
        $l_query = null;
        $l_SQL = "";
        $l_ListParametros = [];
        $l_List_Almacen = [];

        $l_SQL = "  SELECT
                        Id_Cfalm,
                        Des_Cfalm_Nom,
                        Des_Cfalm_Dir
                    FROM 
                        CF_ALMACEN
                    WHERE 
                        Id_Datie_FK = :p_Id_Tienda:
                        AND Flg_Estado = :p_Flg_Estado:
                        AND Flg_Marcabaja = :p_Flg_Marcabaja: ";

        $l_ListParametros["p_Id_Tienda"] = $p_Id_Tienda;
        $l_ListParametros["p_Flg_Estado"] = true;
        $l_ListParametros["p_Flg_Marcabaja"] = true;

        $l_query = $this->db->query( $l_SQL , $l_ListParametros );
        $l_ResultDt =  $l_query->getResultArray();

        if($l_ResultDt)
        {
            foreach( $l_ResultDt as $Item )
            {
                $l_Almacen = new ENAlmacen();
                $l_Almacen->Id_Almacen = (int)$Item["Id_Cfalm"];
                $l_Almacen->Des_Almacen = (string)$Item["Des_Cfalm_Nom"];
                $l_Almacen->Des_Direccion = (string)$Item["Des_Cfalm_Dir"];

                array_push($l_List_Almacen,$l_Almacen);
            }
        }

        return $l_List_Almacen;

    }

}