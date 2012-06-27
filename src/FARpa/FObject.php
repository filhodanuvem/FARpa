<?php

namespace FARpa;

abstract class FObject{
    protected $con;
    public function __construct($face = null)
    {
        $this->con = new FConnection($face);
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
    
    public function execute($sql)
    {
        return $this->con->face->api('/fql?q='.$sql);
    }
    
    public function __call($method,$params)
    {
        if(substr($method,0,3) == 'get'){
            return $this->get($method,$params);
        }
    }
    
    
    private function get($method,$params)
    {
        $method = substr($method,3);
        $class  = 'FARpa\\'.substr($method,0,strlen($method) - 1);
        
        $object = new $class;
        return $object->getAll();        
    }
    
    protected abstract function getFields();
    
    
}
