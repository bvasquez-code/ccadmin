<?php
namespace CodeIgniter;

class MyEntity extends Entity
{

    protected $listType = [];

    /**
     * Define el tipo de clase de los Elemento de una Lista
     * 
     * @param string $key   Nombre de la lista
     * 
     * @param mixed $Class  Tipo de clase del elemento de la lista
     * 
     */
    public function NewList(string $key, $Class) :array
    {
        $this->listType[ $key ]  =  $Class;

        return [];
    }

    /**
     * Captura los valores de un array por sus index y los guarda en los elementos de la clase
     * 
     * @param array $Data   Array con los elemento para cargar en el Objeto
     */
    public function Set( $Data = [] ){

        foreach ($Data as $key => $value) 
        {
            if( is_object($this->{$key}) === true &&  $value !== null )
            {
                $this->{$key}->Set($value);
            }
            else if(is_array($this->{$key}) === true && $value !== null )
            {
                $this->SetListObject($key,$value);
            }
            else
            {
                $this->{$key} = $value;      
            }
        }

    }

    /**
     * Captura los valores de un array por sus index y los guarda en los elementos de una lista perneciente a la clase
     * 
     * @param array $ListArray   Lista Array que se intentara pasar a lista del objeto
     * @param string $key_List    Nombre del elemento de la lista
     */
    public function SetListClass(array $ListArray, string $key_List):array
    {
        $l_List_Final = [];
        $l_Item_Clase = [];

        foreach($ListArray as $Item)
        {
            $l_Item_Clase = $this->GetTipeList($key_List);

            $l_Item_Clase->Set($Item);

            array_push($l_List_Final,$l_Item_Clase);
        }
        return $l_List_Final;
    }

    private function GetTipeList( $key = "" )
    {
        $l_Obj = [];

        if(key_exists(trim($key),$this->listType))
        {
            $l_Obj = new $this->listType[$key];
        }

        return $l_Obj;
    }

    private function SetListObject( $key = "", $value = [] )
    {
        $l_SubLista = null;
        foreach($value as $item)
        {
            $l_SubLista = $this->GetTipeList($key);

            if(is_array($l_SubLista))
            {
                $l_SubLista = $item;
            }
            else if((is_object($l_SubLista)))
            {
                $l_SubLista->Set($item);
            }

            array_push($this->{$key},$l_SubLista);
        }
    }
}
?>