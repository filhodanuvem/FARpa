<?php

namespace FARpa;

abstract class FObject{
    protected $con;
    public function __construct()
    {
        $this->con = FConnection::getConnection();
        echo get_class($this);
    }
    
    public function getAll()
    {
        $props = $this->getFields();
        $query = "SELECT+".implode(',',$props)."+FROM+user+WHERE+".$props['pk']."=me();";
        $result  = $this->execute($query);
        if(!$result || !isset($result['data'])){
            
            return null;
        }
        
        $current_class = get_class($this);
        $collection    = array();
        foreach($result['data'] as $row){
            $object = new $current_class;
            foreach($row as $field => $value){
                 $object->$field = $value;
            }   
            $collection[] = $object; 
        }
        
        return $collection;
    }
    
    public function execute($sql){
        
        return $this->con->face->api('/fql?q='.$sql);
    }
    
    
    protected abstract function getFields();
}
