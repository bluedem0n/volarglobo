<?php

/**
 * VueloCliente form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VueloClienteForm extends BaseVueloClienteForm
{
  public function configure()
  {
      
       //Eliminar los campos del formularios  created_at y updated_at
      unset (
        $this['created_at'],
        $this['updated_at'],
        $this['proveedor_vuelo_id']
      );
      
      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
      $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));
      
        $cliente = new Cliente();
        $this->widgetSchema['cliente_id'] = new sfWidgetFormDoctrineChoice(array(
                  'model'     => 'Cliente',
                  'key_method'=>'getId',
                  'query'    => $cliente->getClientesPager(),
        ),array('class' => 'form-control'));
      
      
  }
}
