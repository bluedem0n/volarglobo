<?php

/**
 * ubicacion actions.
 *
 * @package    hub-usmjesus
 * @subpackage ubicacion
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ubicacionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      
      $ubicaciones = new Ubicacion();
      $this->ubicaciones = $ubicaciones->getUbicaciones();
        
  }

  public function executeNew(sfWebRequest $request)
  {
       //Recibe la variable IdUser para poder asociarlo al usuario
     
         //Armado del Objeto Mensaje Alerta
         $ubicacion = new Ubicacion();
         //Arma Formulario Mensaje Alerta para el usuario en cuestion
         $this->form = new UbicacionForm($ubicacion);
         

    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new UbicacionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($ubicacion = Doctrine_Core::getTable('Ubicacion')->find(array($request->getParameter('id'))), sprintf('Object ubicacion does not exist (%s).', $request->getParameter('id')));
    $this->form = new UbicacionForm($ubicacion);
    
         
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($ubicacion = Doctrine_Core::getTable('Ubicacion')->find(array($request->getParameter('id'))), sprintf('Object ubicacion does not exist (%s).', $request->getParameter('id')));
    

    $this->form = new UbicacionForm($ubicacion);
    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
    
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($ubicacion = Doctrine_Core::getTable('Ubicacion')->find(array($request->getParameter('id'))), sprintf('Object ubicacion does not exist (%s).', $request->getParameter('id')));
    
    try {
           $ubicacion->delete();
           $this->getUser()->setFlash('eliminar', 'El Item fué removido exitosamente.'); 
           
          
      } catch (Doctrine_Exception $e) {
          $this->getUser()->setFlash('noeliminar', 'No se puedo eliminar el item, existen referencias a esta entrada.'); 
          
      }
      $this->redirect('ubicacion/index');
      
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $ubicacion = $form->save();
      
      $this->getUser()->setFlash('notice', 'Realizado de forma exitosa la operación'); 
      
      $this->setTemplate('edit');

    }
  }
}
