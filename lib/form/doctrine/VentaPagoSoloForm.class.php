<?php

/**
 * VentaPago form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VentaPagoSoloForm extends BaseVentaPagoForm
{
  public function configure()
  {
      
      //Eliminar los campos del formularios  created_at y updated_at
      unset (
        $this['created_at'],
        $this['updated_at']
      );
      
      
      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
      $this->widgetSchema['venta_id'] = new sfWidgetFormInputHidden();
      
       $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
       $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));
      
       
       if($this->isNew()){
       
        $this->widgetSchema['monto'] = new sfWidgetFormInputText(array(),array('onkeyup'=>'SumTotales()','placeholder'=>'0','class' => 'form-control TotalPagado'));
        
        $tipo_pago = new TipoPago();
        $this->widgetSchema['tipo_pago_id'] = new sfWidgetFormDoctrineChoice(array(
                  'model'     => 'TipoPago',
                  'key_method'=>'getId',
                  'query'    => $tipo_pago->getTipoPagosProductos(),

        ),array('class' => 'form-control'));
        
       }else{
         
           
        $this->widgetSchema['monto'] = new sfWidgetFormInputText(array(),array('onkeyup'=>'SumTotales()','placeholder'=>'0','class' => 'form-control TotalPagado', 'readonly'=>'readonly'));
        
        $tipo_pago = new TipoPago();
        $this->widgetSchema['tipo_pago_id'] = new sfWidgetFormDoctrineChoice(array(
                  'model'     => 'TipoPago',
                  'key_method'=>'getId',
                  'query'    => $tipo_pago->getTipoPagosProductos(),

        ),array('class' => 'form-control', 'readonly'=>'readonly'));
        
           
       }
        
  }
}
