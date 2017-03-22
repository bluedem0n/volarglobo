<?php

/**
 * vehiculo_tipo_reproductor actions.
 *
 * @package    hub-usmjesus
 * @subpackage vehiculo_tipo_reproductor
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class vehiculo_tipo_reproductorActions extends sfActions
{
    
  //funcion que hace el llamado a template que lista las opcines
  public function executeIndex(sfWebRequest $request)
  {
      
      $vehiculo_tipo_reproductores = new VehiculoTipoReproductor();
      $this->vehiculo_tipo_reproductores = $vehiculo_tipo_reproductores->getVehiculoTipoReproductores();
        
  }

  //funcion que hace el llamado al formulario nuevo
  public function executeNew(sfWebRequest $request)
  {
       //Recibe la variable IdUser para poder asociarlo al usuario
     
         //Armado del Objeto Mensaje Alerta
         $vehiculo_tipo_reproductores = new VehiculoTipoReproductor();
         //Arma Formulario Mensaje Alerta para el usuario en cuestion
         $this->form = new VehiculoTipoReproductorForm($vehiculo_tipo_reproductores);
         

    
  }

  
  //Validacion de los datos del formulario cuando es nuevo 
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new VehiculoTipoReproductorForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  
  //Funcion que hace el llamado al formulario de edicion
  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($vehiculo_tipo_reproductor = Doctrine_Core::getTable('VehiculoTipoReproductor')->find(array($request->getParameter('id'))), sprintf('Object vehiculo tipo reproductor does not exist (%s).', $request->getParameter('id')));
    $this->form = new VehiculoTipoReproductorForm($vehiculo_tipo_reproductor);
    
         
  }

  //Validacion de los del formulario de edicion
  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($vehiculo_tipo_reproductor = Doctrine_Core::getTable('VehiculoTipoReproductor')->find(array($request->getParameter('id'))), sprintf('Object vehiculo tipo reproductor does not exist (%s).', $request->getParameter('id')));
    

    $this->form = new VehiculoTipoReproductorForm($vehiculo_tipo_reproductor);
    $this->processForm($request, $this->form);

    
    
  }
  //Procesa los formulario de ingreso y edicion
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $vehiculo_tipo_reproductor = $form->save();
      
      $this->getUser()->setFlash('notice', 'Realizado de forma exitosa la operación'); 
      
      $this->setTemplate('edit');

    }
  }
  
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($vehiculo_tipo_reproductor = Doctrine_Core::getTable('VehiculoTipoReproductor')->find(array($request->getParameter('id'))), sprintf('Object cobro does not exist (%s).', $request->getParameter('id')));
    
    try {
           $vehiculo_tipo_reproductor->delete();
           $this->getUser()->setFlash('eliminar', 'El Item fué removido exitosamente.'); 
           
          
      } catch (Doctrine_Exception $e) {
          $this->getUser()->setFlash('noeliminar', 'No se puedo eliminar el item, existen referencias a esta entrada.'); 
          
      }
      $this->redirect('vehiculo_tipo_reproductor/index');
      
  }

  
}
