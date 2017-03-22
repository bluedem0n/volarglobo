<?php

/**
 * ExcursionAdicional
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    hub-usmjesus
 * @subpackage model
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ExcursionAdicional extends BaseExcursionAdicional
{
    
    public function __toString() {
        return $this->getNombre();
    }

    public function getExcursionAdicionales() {
        $q = Doctrine_Query::create()
                ->from('ExcursionAdicional c');
        $q->orderBy('c.nombre ASC');
        return $q->execute();
    }

    static public $status = array(
        0 => 'Inactivo',
        1 => 'Activo',
    );

    public function getExcursionAdicionalSelectFront() {
        $q = Doctrine_Query::create()
                ->from('ExcursionAdicional c')
                ->orderBy('c.nombre ASC');
        return $q;
    }

    public function postSave($values) {

        $excursion_adicionales = new ExcursionAdicional();
        $excursion_adicionales = $excursion_adicionales->getExcursionAdicionales();
        foreach ($excursion_adicionales as $excursion_adicional) {
            sfContext::getInstance()->getUser()->setAttribute('excursiones_adicionales' . $excursion_adicional->getId(), $excursion_adicional->getNombre());
        }
    }

}