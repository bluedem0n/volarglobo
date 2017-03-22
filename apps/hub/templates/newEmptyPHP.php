
        
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
  
  
    
    
    
     
  //------// - Formulario de precios / insertados por Jquery PASO 4
  
  public function executeAddPrecioForm(sfWebRequest $request)
  {
      //El error 404 en caso de que no se envie el valor por Html request
      $this->forward404unless($request->isXmlHttpRequest());
      $precio = intval($request->getParameter("num"));
      
      $prod = $precio = Doctrine_Core::getTable('Vehiculo')->find($request->getParameter('id'));
      if(!is_null($prod)){
            $form = new VehiculoForm($precio);
      }else{
            $form = new VehiculoForm();
      }

      $form->addPrecio($precio);
      return $this->renderPartial('addPrecio',array('form' => $form, 'num' => $precio));
      
      
  }
  //------// -FIN  Formulario de precios / insertados por Jquery PASO 4
  
  
  //------// - Formulario de precios / insertados por Jquery PASO 5
  public function executeDelPrecio(sfWebRequest $request)
  {
    $this->forward404Unless($vehiculo_precio = Doctrine_Core::getTable('VehiculoPrecio')->find(array($request->getParameter('id'))), sprintf('Object sf_guard_user does not exist (%s).', $request->getParameter('id')));
    $hospedaje_habitacion->delete();
    
    $precio = Doctrine_Core::getTable('Vehiculo')->find($vehiculo_precio->getVehiculoId());
    $this->form = new VehiculoForm($precio);
    
  }
  //------// - FIN Formulario de precios / insertados por Jquery PASO 5
  