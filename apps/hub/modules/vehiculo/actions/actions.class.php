<?php

/**
 * vehiculoss actions.
 *
 * @package    hub-usmjesus
 * @subpackage vehiculos
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class vehiculoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    
      $this->categoria_id   = $request->getParameter('categoria_id');
      $this->marca_id       = $request->getParameter('marca_id');
      $this->nombre         = $request->getParameter('nombre');
      
      $vehiculos = new Vehiculo();
      $this->vehiculos = $vehiculos->getVehiculos();
              
    
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new VehiculoForm();
    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new VehiculoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

 
  public function executeEdit(sfWebRequest $request)
  {
    
      
      
    $this->forward404Unless($vehiculos = Doctrine_Core::getTable('Vehiculo')->find(array($request->getParameter('id'))), sprintf('Object vehiculo does not exist (%s).', $request->getParameter('id')));
    $this->form = new VehiculoForm($vehiculos);

    
    
    
  }
  
    public function executeEditVehiculo(sfWebRequest $request)
  {
    
      
      
    $this->forward404Unless($vehiculos = Doctrine_Core::getTable('Vehiculo')->find(array($this->getUser()->getAttribute('agente_user_vehiculo_id'))), sprintf('Object vehiculo does not exist (%s).', $request->getParameter('id')));
    $this->form = new VehiculoForm($vehiculos);
    
    
    
    
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($vehiculos = Doctrine_Core::getTable('Vehiculo')->find(array($request->getParameter('id'))), sprintf('Object vehiculos does not exist (%s).', $request->getParameter('id')));
    $this->form = new VehiculoForm($vehiculos);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($vehiculos = Doctrine_Core::getTable('Vehiculo')->find(array($request->getParameter('id'))), sprintf('Object vehiculos does not exist (%s).', $request->getParameter('id')));
    $vehiculos->delete();

    $this->redirect('vehiculo/index');
  }


  
    protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      
      
        $vehiculos = $form->save();
        $this->getUser()->setFlash('notice', 'Realizado de forma exitosa la operación'); 
      
        
        $this->setTemplate('edit');
      
            

    }
  }
 
  
  //------// - Formulario de precios / insertados por Jquery PASO 4
  
  public function executeAddPrecioForm(sfWebRequest $request)
  {
      //El error 404 en caso de que no se envie el valor por Html request
      $this->forward404unless($request->isXmlHttpRequest());
      $num = intval($request->getParameter("num"));
      
      $precio = Doctrine_Core::getTable('Vehiculo')->find($request->getParameter('id'));
      if(!is_null($precio)){
            $form = new VehiculoForm($precio);
      }else{
            $form = new VehiculoForm();
      }

      $form->addPrecio($num);
      return $this->renderPartial('addPrecio',array('form' => $form, 'num' => $num));
      
      
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
  
}
