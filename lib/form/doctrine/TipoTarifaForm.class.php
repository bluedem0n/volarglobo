<?php

/**
 * TipoTarifa form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TipoTarifaForm extends BaseTipoTarifaForm
{
  public function configure()
  {
      
       
       //Eliminar los campos del formularios  created_at y updated_at
      unset (
        $this['created_at'],
        $this['updated_at'],
        $this['orden'],
        $this['imagen']

      );
      
      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
      $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));
      $this->widgetSchema['nombre'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nombre','class' => 'form-control'));
      $this->widgetSchema['descripcion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Descripción','class' => 'form-control'));
      
      //Cambiar a lista y su validador de los status Activo e Inativo 0/1
      $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
         'choices' => Categoria::$status,
         'expanded' => false,
         'multiple' => false

      ),array('class' => 'form-control'));

      $this->validatorSchema['status'] = new sfValidatorChoice(array(
          'choices' => array_keys(Pago::$status),

      ));
      
      
       $tipo_vuelo = new TipoVuelo();
        $this->widgetSchema['tipo_vuelo_id'] = new sfWidgetFormDoctrineChoice(array(
                  'model'     => 'TipoVuelo',
                  'key_method'=>'getId',
                  'query'    => $tipo_vuelo->getTipoVuelos(),
        ),array('class' => 'form-control'));
        
    
        $this->widgetSchema['cant_desde'] = new sfWidgetFormInputText(array(),array('placeholder'=>'0','class' => 'form-control'));
        $this->widgetSchema['cant_hasta'] = new sfWidgetFormInputText(array(),array('placeholder'=>'0','class' => 'form-control'));
    
      
        
  
  
        //RangoEdad 
      $precios = $this->getObject()->getTipoTarifaPrecio();
      
      
      if(!count($precios)) {
          $precios = array();
      }      
      
      if($this->isNew()){
        
                   $preciosSQ = new RangoEdad();
                   $preciosSQ = $preciosSQ->getRangoEdades();
                  
                   foreach ($preciosSQ as $red){
          
                   $precio = new TipoTarifaPrecio();
                   $precio->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                   $precio->setTipoTarifa($this->getObject());
                   $precio->setRangoEdadId($red->getId());
                   array_push ($precios, $precio);
                   
                   }
            
      }
      
      
      //recorro los valores para ver si falta alguno de los nuevos
      foreach ($precios as $precio) ${'pag'.$precio->getRangoEdadId()} = $precio->getRangoEdadId();
      
      
      $precios_form = new sfForm();
      $count = 0;
      
      $preciosSQ = new RangoEdad();
      $preciosSQ = $preciosSQ->getRangoEdades();

       foreach ($preciosSQ as $red){

                if(${'pag'.$red->getId()}<>$red->getId()){
                        
                $precio = new TipoTarifaPrecio();
                $precio->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                $precio->setTipoTarifa($this->getObject());
                $precio->setRangoEdadId($red->getId());
                $precio->setValor('');
                $precio->save();
                
                $precio_form = new TipoTarifaPrecioForm($precio);
                $precios_form->embedForm($count, $precio_form);
                $count++;
                
               }
       }
      

      
      foreach ($precios as $precio){
          
          if($precio->getEmpresaId()==sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')){
              
                $precio_form = new TipoTarifaPrecioForm($precio);
                $precios_form->embedForm($count, $precio_form);
                $count++;
                
                
                
          }
      }

      $this->embedForm('precios', $precios_form);
      
    
      // Fin RangoEdad
   
        
  }
}
