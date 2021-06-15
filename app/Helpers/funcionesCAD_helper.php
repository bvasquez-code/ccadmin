<?php

    function CrearEstructuraSP(string $p_Procedimiento,array $p_ListParametros)
    {
        $l_Response = array('store'=>"",'parametros'=>[]);
        $l_Sql = "";
        $l_Parametros = [];
        $l_StringParametros = "";
        $l_NomParametro =  "";
        $l_ValParametro =  null;

        $l_Sql = "CALL ".$p_Procedimiento;

        if( $p_ListParametros != null && count($p_ListParametros)>0 )
        {
            $l_Sql = $l_Sql . "(";
            foreach($p_ListParametros as $elem)
            {
                $l_NomParametro =  $elem[0];
                $l_ValParametro =  $elem[1];

                $l_StringParametros = Concatenador($l_StringParametros,"?",",");

                if($l_ValParametro!==null)
                {
                    if(!is_array($l_ValParametro))
                    {
                        array_push($l_Parametros,$l_ValParametro);                       
                    }
                    else
                    {
                        $l_ValParametro = CrearListaStringGenerico($l_ValParametro);
                        array_push($l_Parametros,$l_ValParametro);
                    }
                }
                else
                {
                    array_push($l_Parametros,null);
                }


            }
            $l_Sql = $l_Sql .$l_StringParametros. ")";
        }
        else
        {
            $l_Sql = $l_Sql . "()";
        }

        $l_Response['store'] = $l_Sql;
        $l_Response['parametros'] = $l_Parametros;

        return $l_Response;
    }
     
    function CrearEstructuraQuery(string $p_Query,array $p_ListParametros)
    {
        $l_Response = array('store'=>"",'parametros'=>[]);
        $l_Parametros = [];
        $l_NomParametro =  "";
        $l_ValParametro =  null;

        if( $p_ListParametros != null && count($p_ListParametros)>0 )
        {
            foreach($p_ListParametros as $elem)
            {
                $l_NomParametro =  $elem[0];
                $l_ValParametro =  $elem[1];

                if($l_ValParametro!==null)
                {
                    if(!is_array($l_ValParametro))
                    {
                        array_push($l_Parametros,$l_ValParametro);                       
                    }
                    else
                    {
                        $l_ValParametro = CrearListaStringGenerico($l_ValParametro);
                        array_push($l_Parametros,$l_ValParametro);
                    }
                }
                else
                {
                    array_push($l_Parametros,null);
                }

            }
        }

        $l_Response['query'] = $p_Query;
        $l_Response['parametros'] = $l_Parametros;

        return $l_Response;
    }

    function Concatenador(string $p_Cadena,string $p_Val,string $p_Separador=",")
    {
        if($p_Cadena=="")
        {
            $p_Cadena = $p_Val;
        }
        else
        {
            $p_Cadena = $p_Cadena.$p_Separador.$p_Val;
        }
        return $p_Cadena;
    }

    function CrearListaStringGenerico(array $p_ListaArray):string
    {
        $l_ListaString = "";
        $l_Elemento = "";
        foreach ($p_ListaArray as $elem) {
            
            $l_Elemento = "(";
            foreach ($elem as $key => $value) {                
                if($l_Elemento=="(")
                {
                    $l_Elemento = $l_Elemento."'".$value."'";
                }else
                {
                    $l_Elemento = $l_Elemento.","."'".$value."'";
                }                
            }
            $l_Elemento = $l_Elemento.")";
            
            if($l_ListaString=="")
            {
                $l_ListaString = $l_Elemento;
            }
            else
            {
                $l_ListaString = $l_ListaString.",".$l_Elemento;
            }
        }
        
        return $l_ListaString;
    }    

?>