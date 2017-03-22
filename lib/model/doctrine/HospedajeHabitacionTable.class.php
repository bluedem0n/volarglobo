<?php

/**
 * HospedajeHabitacionTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class HospedajeHabitacionTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object HospedajeHabitacionTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('HospedajeHabitacion');
    }
    
     public function getNombre(){
       $q = Doctrine_Query::create()
            -> from('HospedajeHabitacion m')
            -> orderBy('m.nombre ASC');
       return $q->execute();
    }
    
}