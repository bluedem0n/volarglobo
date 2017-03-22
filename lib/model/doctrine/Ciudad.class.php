<?php

/**
 * Ciudad
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    cronos-doctrine
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Ciudad extends BaseCiudad
{
    public function __toString() {
        return $this->getNombre();
    }
    
    public function getCiudad(){
        $q = Doctrine_Query::create()
                ->from('Ciudad e')
//                ->where('e.empresa_id=?', sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'))
                ->orderBy('e.nombre asc');
        return $q;
    }
    
    public function getCiudades(){
        $q = Doctrine_Query::create()
            -> from('Ciudad e')
            ->orderBy('e.nombre ASC');
       return $q->execute();
    }
    
    public function getCiudadProvincia($provincia_id){
        $q = Doctrine_Query::create()
            ->select('e.id, e.nombre')
            -> from('Ciudad e')
            ->where('e.provincia_id=?',$provincia_id)
            ->orderBy('e.nombre ASC');
       return $q;
    }
    
     public function postSave($values){
   
         
        $query1 = "UPDATE ciudad SET provincia_final_id=provincia_id WHERE id=".$this->getId()."";
        $rs = Doctrine_Manager::getInstance()->getCurrentConnection()->execute($query1);
             
      
    }   
    
}