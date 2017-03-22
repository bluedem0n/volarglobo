<?php

/**
 * ProveedorVuelo form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProveedorVueloForm extends BaseProveedorVueloForm
{
  public function configure()
  {
      
      //Eliminar los campos del formularios  created_at y updated_at
      unset (
        $this['created_at'],
        $this['updated_at'],
              $this['fecha_finalizacion'],
              $this['status']
      );
      
      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
      $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));
    
      $this->widgetSchema['codigo'] = new sfWidgetFormInputText(array(),array('placeholder'=>'','class' => 'form-control'));
      $this->widgetSchema['horario'] = new sfWidgetFormInputText(array(),array('placeholder'=>'','class' => 'form-control'));
      
      
      $this->widgetSchema['precio'] = new sfWidgetFormInputText(array(),array('placeholder'=>'0.00','class' => 'form-control'));
      $this->widgetSchema['precio_oferta'] = new sfWidgetFormInputText(array(),array('placeholder'=>'0.00','class' => 'form-control'));
      
      $this->widgetSchema['observacion'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Ingresar observaciones relacionadas','class' => 'form-control textarea'));
        $this->widgetSchema['condiciones'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Detallar las condiciones para uso','class' => 'form-control textarea'));
        
        $this->widgetSchema['fecha_activacion'] = new sfWidgetFormInputText(array(), array( 'placeholder'=>'00/00/0000','class' => 'form-control date', 'readonly' => 'true'));
        
        
        
        $globo = new Globo();
        $this->widgetSchema['globo_id'] = new sfWidgetFormDoctrineChoice(array(
                  'model'     => 'Globo',
                  'key_method'=>'getId',
                  'query'    => $globo->getGlobosSelect(),
        ),array('class' => 'form-control'));
        
        $tipo_vuelo = new TipoVuelo();
        $this->widgetSchema['tipo_vuelo_id'] = new sfWidgetFormDoctrineChoice(array(
                  'model'     => 'TipoVuelo',
                  'key_method'=>'getId',
                  'query'    => $tipo_vuelo->getTipoVuelos(),
        ),array('class' => 'form-control'));
        
        $tipo_tarifa = new TipoTarifa();
        $this->widgetSchema['tipo_tarifa_id'] = new sfWidgetFormDoctrineChoice(array(
                  'model'     => 'TipoTarifa',
                  'key_method'=>'getId',
                  'query'    => $tipo_tarifa->getTipoTarifasUnicas(),
        ),array('class' => 'form-control'));
        
        
        $tipo_motivo = new TipoMotivo();
        $this->widgetSchema['tipo_motivo_id'] = new sfWidgetFormDoctrineChoice(array(
                  'model'     => 'TipoMotivo',
                  'key_method'=>'getId',
                  'query'    => $tipo_motivo->getTipoMotivos(),
        ),array('class' => 'form-control'));
        
        
        $tipo_lona = new TipoLona();
        $this->widgetSchema['tipo_lona_id'] = new sfWidgetFormDoctrineChoice(array(
                  'model'     => 'TipoLona',
                  'key_method'=>'getId',
                  'query'    => $tipo_lona->getTipoLonas(),
        ),array('class' => 'form-control'));
        
        
        
      
    
  
  
      //Sucursales 
      $clientes = $this->getObject()->getVueloCliente();
      
      
      if(!count($clientes)) {
          $clientes = array();
      }      
      
      if($this->isNew()){
        
                   
                       
            $precio = new VueloCliente();
            $precio->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
            $precio->setProveedorVuelo($this->getObject());
            array_push ($clientes, $precio);
                        
            
      }
      
      
              
      $clientes_form = new sfForm();
      $count = 0;
      foreach ($clientes as $precio){
          
          if($precio->getEmpresaId()==sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')){
              
                $precio_form = new VueloClienteForm($precio);
                $clientes_form->embedForm($count, $precio_form);
                $count++;
                
          }
      }

      $this->embedForm('clientes', $clientes_form);
      // Fin Sucursales
   
      
      
  
      //hospedajes 
      $hospedajes = $this->getObject()->getVueloHospedaje();
      
      
      if(!count($hospedajes)) {
          $hospedajes = array();
      }      
      
      if($this->isNew()){
        
                   
                       
            $precio = new VueloHospedaje();
            $precio->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
            $precio->setProveedorVuelo($this->getObject());
            array_push ($hospedajes, $precio);
                        
            
      }
      
      
              
      $hospedajes_form = new sfForm();
      $count = 0;
      foreach ($hospedajes as $precio){
          
          if($precio->getEmpresaId()==sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')){
              
                $precio_form = new VueloHospedajeForm($precio);
                $hospedajes_form->embedForm($count, $precio_form);
                $count++;
                
          }
      }

      $this->embedForm('hospedajes', $hospedajes_form);
      // Fin hospedajes
      
        
         //TipoRestriciones 
      $restriciones = $this->getObject()->getVueloRestriciones();
      
      
      if(!count($restriciones)) {
          $restriciones = array();
      }      
      
      if($this->isNew()){
        
                   $restricionesSQ = new TipoRestriciones();
                   $restricionesSQ = $restricionesSQ->getTipoRestriciones()->execute();
                  
                   foreach ($restricionesSQ as $red){
          
                   $precio = new VueloRestriciones();
                   $precio->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                   $precio->setProveedorVuelo($this->getObject());
                   $precio->setTipoRestricionesId($red->getId());
                   array_push ($restriciones, $precio);
                   
                   }
            
      }
      
      
      //recorro los valores para ver si falta alguno de los nuevos
      foreach ($restriciones as $precio) ${'pag'.$precio->getTipoRestricionesId()} = $precio->getTipoRestricionesId();
      
      
      $restriciones_form = new sfForm();
      $count = 0;
      
      $restricionesSQ = new TipoRestriciones();
      $restricionesSQ = $restricionesSQ->getTipoRestriciones()->execute();

       foreach ($restricionesSQ as $red){

                if(${'pag'.$red->getId()}<>$red->getId()){
                        
                $precio = new VueloRestriciones();
                $precio->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                $precio->setProveedorVuelo($this->getObject());
                $precio->setTipoRestricionesId($red->getId());
                $precio->setValor('');
                $precio->save();
                
                $precio_form = new VueloRestricionesForm($precio);
                $restriciones_form->embedForm($count, $precio_form);
                $count++;
                
               }
       }
      

      
      foreach ($restriciones as $precio){
          
          if($precio->getEmpresaId()==sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')){
              
                $precio_form = new VueloRestricionesForm($precio);
                $restriciones_form->embedForm($count, $precio_form);
                $count++;
                
                
                
          }
      }

      $this->embedForm('restriciones', $restriciones_form);
      
    
      // Fin TipoRestriciones
   
    
      
       //TipoRecomendaciones 
      $recomendaciones = $this->getObject()->getVueloRecomendaciones();
      
      
      if(!count($recomendaciones)) {
          $recomendaciones = array();
      }      
      
      if($this->isNew()){
        
                   $recomendacionesSQ = new TipoRecomendaciones();
                   $recomendacionesSQ = $recomendacionesSQ->getTipoRecomendaciones()->execute();
                  
                   foreach ($recomendacionesSQ as $red){
          
                   $precio = new VueloRecomendaciones();
                   $precio->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                   $precio->setProveedorVuelo($this->getObject());
                   $precio->setTipoRecomendacionesId($red->getId());
                   array_push ($recomendaciones, $precio);
                   
                   }
            
      }
      
      
      //recorro los valores para ver si falta alguno de los nuevos
      foreach ($recomendaciones as $precio) ${'pag'.$precio->getTipoRecomendacionesId()} = $precio->getTipoRecomendacionesId();
      
      
      $recomendaciones_form = new sfForm();
      $count = 0;
      
      $recomendacionesSQ = new TipoRecomendaciones();
      $recomendacionesSQ = $recomendacionesSQ->getTipoRecomendaciones()->execute();

       foreach ($recomendacionesSQ as $red){

                if(${'pag'.$red->getId()}<>$red->getId()){
                        
                $precio = new VueloRecomendaciones();
                $precio->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                $precio->setProveedorVuelo($this->getObject());
                $precio->setTipoRecomendacionesId($red->getId());
                $precio->setValor('');
                $precio->save();
                
                $precio_form = new VueloRecomendacionesForm($precio);
                $recomendaciones_form->embedForm($count, $precio_form);
                $count++;
                
               }
       }
      

      
      foreach ($recomendaciones as $precio){
          
          if($precio->getEmpresaId()==sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')){
              
                $precio_form = new VueloRecomendacionesForm($precio);
                $recomendaciones_form->embedForm($count, $precio_form);
                $count++;
                
                
                
          }
      }

      $this->embedForm('recomendaciones', $recomendaciones_form);
      
    
      // Fin TipoRecomendaciones  
      
    
      
      
                //ProveedorDescuento 
      $proveedor_descuento = $this->getObject()->getProveedorVuelosPager();
      
      
      if(!count($proveedor_descuento)) {
          $proveedor_descuento = array();
      }      
      
      if($this->isNew()){
        
                   $proveedor_descuentoSQ = new ProveedorDescuento();
                   $proveedor_descuentoSQ = $proveedor_descuentoSQ->getProveedorDescuentosPager()->execute();
                  
                   foreach ($proveedor_descuentoSQ as $red){
          
                   $precio = new VueloServicio();
                   $precio->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                   $precio->setProveedorVuelo($this->getObject());
                   $precio->setProveedorDescuentoId($red->getId());
                   array_push ($proveedor_descuento, $precio);
                   
                   }
            
      }
      
      
        
      //recorro los valores para ver si falta alguno de los nuevos
      foreach ($proveedor_descuento as $precio) ${'pag'.$precio->getProveedorDescuentoId()} = $precio->getProveedorDescuentoId();
      
      
      $proveedor_descuento_form = new sfForm();
      $count = 0;
      
      $proveedor_descuentoSQ = new ProveedorDescuento();
      $proveedor_descuentoSQ = $proveedor_descuentoSQ->getProveedorDescuentosPager()->execute();

       foreach ($proveedor_descuentoSQ as $red){

                if(${'pag'.$red->getId()}<>$red->getId()){
                        
                $precio = new VueloServicio();
                $precio->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                $precio->setProveedorVuelo($this->getObject());
                $precio->setProveedorDescuentoId($red->getId());
                $precio->setValor('');
                $precio->save();
                
                $precio_form = new VueloServicioForm($precio);
                $proveedor_descuento_form->embedForm($count, $precio_form);
                $count++;
                
               }
       }
      

      
      foreach ($proveedor_descuento as $precio){
          
          if($precio->getEmpresaId()==sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')){
              
                $precio_form = new VueloServicioForm($precio);
                $proveedor_descuento_form->embedForm($count, $precio_form);
                $count++;
                
                
                
          }
      }

      $this->embedForm('proveedor_descuento', $proveedor_descuento_form);
      
        
  }
  
  
    
  public function addCliente($num) {
      $pre = new VueloCliente();
      $pre->setProveedorVuelo($this->getObject());
      $pre_form = new VueloClienteForm($pre);

      $this->embeddedForms['clientes']->embedForm($num, $pre_form);

      $this->embedForm('clientes', $this->embeddedForms['clientes']);

  }
  
  
  
  public function  bind(array $taintedValues = null, array $taintedFiles = null) {
    

    
  
    
    foreach ($taintedValues['clientes'] as $key => $newClientes)
    {
        if(!isset ($this['clientes'][$key])){
            $this->addCliente($key);
        }
    }
    
    
    

    parent::bind($taintedValues, $taintedFiles);
    }
    
}
