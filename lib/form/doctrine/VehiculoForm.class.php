<?php

/**
 * Vehiculo form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VehiculoForm extends BaseVehiculoForm
{
  public function configure()
  {
      
        //Eliminar los campos del formularios  created_at y updated_at
        unset(
            $this['created_at'], $this['updated_at'], $this['expires_at']
        );
        
        $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser()->getAttribute('agente_user')));
        $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));

        $vehiculo_tipo_reproductor = new VehiculoTipoReproductor();
        $this->widgetSchema['vehiculo_tipo_reproductor_id'] = new sfWidgetFormDoctrineChoice(array(
                  'model'     => 'VehiculoTipoReproductor',
                  'key_method'=>'getId',
                  'query'    => $vehiculo_tipo_reproductor->getVehiculoTipoReproductorSelectFront(),
        ),array('class' => 'form-control'));
        
     $this->widgetSchema['vehiculo_marca_id'] = new sfWidgetFormDoctrineChoice(array(
                    'model'     => 'VehiculoMarca',
      ),array('class' => 'form-control'));
      
      $this->widgetSchema['vehiculo_marca_modelo_id'] = new sfWidgetFormDoctrineDependentSelect(array(
	            'model'     => 'VehiculoMarcaModelo',
                    'depends'   => 'VehiculoMarca',
                    'table_method' => 'getNombre',
                    'add_empty' => 'Seleccione modelo',
      ));

        $vehiculo_categoria = new VehiculoCategoria();
        $this->widgetSchema['vehiculo_categoria_id'] = new sfWidgetFormDoctrineChoice(array(
                  'model'     => 'VehiculoCategoria',
                  'key_method'=>'getId',
                  'query'    => $vehiculo_categoria->getVehiculoCategoriaSelectFront(),
        ),array('class' => 'form-control'));
        
        $vehiculo_tipo_transmision = new VehiculoTipoTransmision();
        $this->widgetSchema['vehiculo_tipo_transmision_id'] = new sfWidgetFormDoctrineChoice(array(
            'model' => 'VehiculoTipoTransmision',
            'key_method' => 'getId',
            'query' => $vehiculo_tipo_transmision->getVehiculoTipoTransmisionSelectFront(),
                ), array('class' => 'form-control'));
        
        $vehiculo_tipo = new VehiculoTipo();
        $this->widgetSchema['vehiculo_tipo_id'] = new sfWidgetFormDoctrineChoice(array(
            'model' => 'VehiculoTipo',
            'key_method' => 'getId',
            'query' => $vehiculo_tipo->getVehiculoTipoSelectFront(),
                ), array('class' => 'form-control'));
      
      $this->widgetSchema['nombre'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Nombre del vehículo', 'class' => 'form-control'));
      $this->widgetSchema['placa'] = new sfWidgetFormInputText(array(), array('placeholder' => 'AE715KP', 'class' => 'form-control'));
      $this->widgetSchema['anno'] = new sfWidgetFormInputText(array(), array('placeholder' => '2017', 'class' => 'form-control'));
      $this->widgetSchema['precio'] = new sfWidgetFormInputText(array(), array('placeholder' => '0.00', 'class' => 'form-control'));
      
      
//-------------/ Inicio de los formularios embebido
      
      
//------//Formulario de politicas  
        $politicas = $this->getObject()->getVehiculoHasPolitica();

        //Se verifica si el arreglo tiene algun valor
        if (!count($politicas)) {
            $politicas = array();
        }

        //llamada a el listado de valores de politicas
        $politicasSQ = new VehiculoPolitica();
        $politicasSQ = $politicasSQ->getVehiculoPoliticas();
        
        
        if($this->isNew()){// Cuando el formulario es nuevo
        
                   foreach ($politicasSQ as $politica){
          
                   //Se selcciona la tabla Has many to many donde se guardara la informacion
                   $politicaSave = new VehiculoHasPolitica();
                   $politicaSave->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                   //Se coloco el nombre del Moledo que se va a ingresar
                   $politicaSave->setVehiculo($this->getObject());
                   $politicaSave->setVehiculoPoliticaId($politica->getId());
                   //Se anexa el arreglo a el arreglo inicial
                   array_push ($politicas, $politicaSave);
                   
                   
                   }
        }// FIN Cuando el formulario es nuevo
      
        //recorro los valores para ver si falta alguno de los nuevos
        foreach ($politicas as $politica)
            ${'politica' . $politica->getVehiculoPoliticaId()} = $politica->getVehiculoPoliticaId();

      //Creo los formularios embebidos  
      $politicas_form = new sfForm();
      $count = 0;
      
       //Recorro nuevamente para definir los valores faltante
       foreach ($politicasSQ as $politica){

                if(${'politica'.$politica->getId()}<>$politica->getId()){
                        
                $politicaSave = new VehiculoHasPolitica();
                $politicaSave->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                $politicaSave->setVehiculo($this->getObject());
                $politicaSave->setVehiculoPoliticaId($politica->getId());
                $politicaSave->save();
                
                $politicaSave_form = new VehiculoHasPoliticaForm($politicaSave);
                $politicas_form->embedForm($count, $politicaSave_form);
                $count++;
                
                }
       }    
       
      
       //Finalizacion de la activacion de los formularios
       foreach ($politicas as $politica){
          
          if($politica->getEmpresaId()==sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')){
              
                $politica_form = new VehiculoHasPoliticaForm($politica);
                $politicas_form->embedForm($count, $politica_form);
                $count++;
                
                
          }
      }

      $this->embedForm('politicas', $politicas_form);
            
            
            

//------//FIN - Formulario de politicas  
      
//------//Formulario de adicionales  
        $adicionales = $this->getObject()->getVehiculoHasAdicional();

        //Se verifica si el arreglo tiene algun valor
        if (!count($adicionales)) {
            $adicionales = array();
        }

        //llamada a el listado de valores de adicionales
        $adicionalesSQ = new VehiculoAdicional();
        $adicionalesSQ = $adicionalesSQ->getVehiculoAdicionales();


        if ($this->isNew()) {// Cuando el formulario es nuevo
            foreach ($adicionalesSQ as $adicional) {

                //Se selcciona la tabla Has many to many donde se guardara la informacion
                $adicionalSave = new VehiculoHasAdicional();
                $adicionalSave->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                //Se coloco el nombre del Moledo que se va a ingresar
                $adicionalSave->setVehiculo($this->getObject());
                $adicionalSave->setVehiculoAdicionalId($adicional->getId());
                //Se anexa el arreglo a el arreglo inicial
                array_push($adicionales, $adicionalSave);
            }
        }// FIN Cuando el formulario es nuevo
        //recorro los valores para ver si falta alguno de los nuevos
        foreach ($adicionales as $adicional)
            ${'adicional' . $adicional->getVehiculoAdicionalId()} = $adicional->getVehiculoAdicionalId();

        //Creo los formularios embebidos  
        $adicionales_form = new sfForm();
        $count = 0;

        //Recorro nuevamente para definir los valores faltante
        foreach ($adicionalesSQ as $adicional) {

            if (${'adicional' . $adicional->getId()} <> $adicional->getId()) {

                $adicionalSave = new VehiculoHasAdicional();
                $adicionalSave->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                $adicionalSave->setVehiculo($this->getObject());
                $adicionalSave->setVehiculoAdicionalId($adicional->getId());
                $adicionalSave->save();

                $adicionalSave_form = new VehiculoHasAdicionalForm($adicionalSave);
                $adicionales_form->embedForm($count, $adicionalSave_form);
                $count++;
            }
        }


        //Finalizacion de la activacion de los formularios
        foreach ($adicionales as $adicional) {

            if ($adicional->getEmpresaId() == sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')) {

                $adicional_form = new VehiculoHasAdicionalForm($adicional);
                $adicionales_form->embedForm($count, $adicional_form);
                $count++;
            }
        }

        $this->embedForm('adicionales', $adicionales_form);




//------//FIN - Formulario de adicionales 
        //------//Formulario de seguros  
        $seguros = $this->getObject()->getVehiculoHasSeguro();

        //Se verifica si el arreglo tiene algun valor
        if (!count($seguros)) {
            $seguros = array();
        }

        //llamada a el listado de valores de seguros
        $segurosSQ = new VehiculoSeguro();
        $segurosSQ = $segurosSQ->getVehiculoSeguros();


        if ($this->isNew()) {// Cuando el formulario es nuevo
            foreach ($segurosSQ as $seguro) {

                //Se selcciona la tabla Has many to many donde se guardara la informacion
                $seguroSave = new VehiculoHasSeguro();
                $seguroSave->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                //Se coloco el nombre del Moledo que se va a ingresar
                $seguroSave->setVehiculo($this->getObject());
                $seguroSave->setVehiculoSeguroId($seguro->getId());
                //Se anexa el arreglo a el arreglo inicial
                array_push($seguros, $seguroSave);
            }
        }// FIN Cuando el formulario es nuevo
        //recorro los valores para ver si falta alguno de los nuevos
        foreach ($seguros as $seguro)
            ${'seguro' . $seguro->getVehiculoSeguroId()} = $seguro->getVehiculoSeguroId();

        //Creo los formularios embebidos  
        $seguros_form = new sfForm();
        $count = 0;

        //Recorro nuevamente para definir los valores faltante
        foreach ($segurosSQ as $seguro) {

            if (${'seguro' . $seguro->getId()} <> $seguro->getId()) {

                $seguroSave = new VehiculoHasSeguro();
                $seguroSave->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                $seguroSave->setVehiculo($this->getObject());
                $seguroSave->setVehiculoSeguroId($seguro->getId());
                $seguroSave->save();

                $seguroSave_form = new VehiculoHasSeguroForm($seguroSave);
                $seguros_form->embedForm($count, $seguroSave_form);
                $count++;
            }
        }


        //Finalizacion de la activacion de los formularios
        foreach ($seguros as $seguro) {

            if ($seguro->getEmpresaId() == sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')) {

                $seguro_form = new VehiculoHasSeguroForm($seguro);
                $seguros_form->embedForm($count, $seguro_form);
                $count++;
            }
        }

        $this->embedForm('seguros', $seguros_form);




//------//FIN - Formulario de seguros
        
  
        
//------// - Formulario de precios / insertados por Jquery PASO 1
        
  
      //Llamada a los precios del formulario 
      $vehiculos = $this->getObject()->getVehiculoPrecio();
      
      
      if(!count($vehiculos)) {
          $vehiculos = array();
      }      
      
      if($this->isNew()){
                       
            $precio = new VehiculoPrecio();
            $precio->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
            $precio->setVehiculo($this->getObject());
            array_push ($vehiculos, $precio);
                        
            
      }
      
      
              
      $vehiculos_form = new sfForm();
      $count = 0;
      foreach ($vehiculos as $precio){
          
          if($precio->getEmpresaId()==sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')){
              
                $precio_form = new VehiculoPrecioForm($precio);
                $vehiculos_form->embedForm($count, $precio_form);
                $count++;
                
          }
      }

      $this->embedForm('precios', $vehiculos_form);
      // Fin Vehiculos
        
//------// - FIN Formulario de precios / insertados por Jquery 
  }
  
  
  
     
  //------// - Formulario de precios / insertados por Jquery PASO 2  
  public function addPrecio($num) {
      $pre = new VehiculoPrecio();
      $pre->setVehiculo($this->getObject());
      $pre_form = new VehiculoPrecioForm($pre);

      $this->embeddedForms['precios']->embedForm($num, $pre_form);

      $this->embedForm('precios', $this->embeddedForms['precios']);

  }
  //------// - FIN Formulario de precios / insertados por Jquery PASO 2
    
  
  public function  bind(array $taintedValues = null, array $taintedFiles = null) {
    

    //------// - Formulario de precios / insertados por Jquery PASO 2 
    foreach ($taintedValues['precios'] as $key => $newPrecio)
    {
        if(!isset ($this['precios'][$key])){
            $this->addPrecio($key);
        }
    }
    //------// - FIN Formulario de precios / insertados por Jquery PASO 3
  
    

    parent::bind($taintedValues, $taintedFiles);
    }
  
  
    

}
