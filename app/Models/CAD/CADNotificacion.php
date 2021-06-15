<?php namespace App\Models\CAD;

use CodeIgniter\Model;
use App\Models\CEN\CENResponse as ENResponse;


class CADNotificacion extends Model
{
    public $db = null;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function Get_List_Usuarios_Notificacion(int $p_Tip_Notificacion):ENResponse
    {
        $l_Rpt = new ENResponse();
        $l_ResultDt = null;
        $l_query = null;
        $l_Sql = "";
        $l_ListParametros = [];
        $l_ObjetoQuery = [];
        $l_Type_Mail_Notificaciones = 30;

        $l_Sql .= " SELECT
                        DA_PERNATU.Des_Dapnat_Em1 AS Des_Email
                    FROM
                    DT_USUNOTIFICA
                    LEFT JOIN DA_USUARIO ON DA_USUARIO.Id_Dausu = DT_USUNOTIFICA.Id_Dausu_FK
                    LEFT JOIN DA_PERNATU ON DA_PERNATU.Id_Dapnat = DA_USUARIO.Id_Dapnat_FK
                    JOIN CF_PARSISTEMA TMP_NOTIFICACION ON TMP_NOTIFICACION.Cod_Cfpsis = DT_USUNOTIFICA.Tip_Dtnot_not 
                                       AND TMP_NOTIFICACION.Cod_Cfsis_FK = ?
                    WHERE
                    DT_USUNOTIFICA.Flg_Estado = ?
                    AND DT_USUNOTIFICA.Flg_Marcabaja = ?
                    AND DA_USUARIO.Flg_Estado = ?
                    AND DA_USUARIO.Flg_Marcabaja = ?
                    AND DA_PERNATU.Flg_Estado = ?
                    AND DA_PERNATU.Flg_Marcabaja = ?
                    AND TMP_NOTIFICACION.Cod_Cfpsis = ? ";

        array_push($l_ListParametros,["Cod_Cfsis_FK",$l_Type_Mail_Notificaciones]);
        array_push($l_ListParametros,["Flg_Estado",true]);
        array_push($l_ListParametros,["Flg_Marcabaja",true]);
        array_push($l_ListParametros,["Flg_Estado",true]);
        array_push($l_ListParametros,["Flg_Marcabaja",true]);
        array_push($l_ListParametros,["Flg_Estado",true]);
        array_push($l_ListParametros,["Flg_Marcabaja",true]);
        array_push($l_ListParametros,["Cod_Cfpsis",$p_Tip_Notificacion]);

        $l_ObjetoQuery = CrearEstructuraQuery($l_Sql,$l_ListParametros);

        $l_query = $this->db->query($l_ObjetoQuery["query"],$l_ObjetoQuery["parametros"]);

        if($l_query)
        {
            $l_ResultDt =  $l_query->getResultArray();
            $l_Rpt->Resultado = $l_ResultDt;
        }
 
        return $l_Rpt;
    }
}
?>