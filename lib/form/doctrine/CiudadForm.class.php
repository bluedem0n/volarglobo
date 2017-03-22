<?php

/**
 * Ciudad form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CiudadForm extends BaseCiudadForm
{
  public function configure()
  {
       //Eliminar los campos del formularios  created_at y updated_at
      unset (
        $this['codigo'],
        $this['created_at'],
        $this['updated_at']

      );
      
      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
    $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));
      $this->widgetSchema['nombre'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nombre del provincia/estado','class' => 'form-control'));
  
      $provincia = new Provincia();
      $this->widgetSchema['provincia_id'] = new sfWidgetFormDoctrineChoice(array(
                      'model'     => 'Provincia',
                      'key_method'=>'getId',
                      'query'    => $provincia->getProvinciasSelect()
            ),array('class' => 'form-control'));
      
      //Cambiar a lista y su validador de los status Activo e Inativo 0/1
      $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
         'choices' => Categoria::$status,
         'expanded' => false,
         'multiple' => false

      ),array('class' => 'form-control'));
      
      
      $this->widgetSchema['observacion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Observaciones del provincia','class' => 'form-control'));
      
  }
}
