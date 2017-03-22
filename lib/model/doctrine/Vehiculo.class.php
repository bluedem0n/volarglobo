<?php

/**
 * Vehiculo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    hub-usmjesus
 * @subpackage model
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Vehiculo extends BaseVehiculo
{
    
    public function __toString() {
        return $this->getNombre();
    }

    public function getVehiculos() {
        $q = Doctrine_Query::create()
                ->from('Vehiculo c');
//            ->where('c.empresa_id=?', sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
        $q->orderBy('c.nombre ASC');
        return $q->execute();
    }

}