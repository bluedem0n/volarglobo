<?php

/**
 * ciudad actions.
 *
 * @package    hub-usmjesus
 * @subpackage ciudad
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ciudadActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      
      $ciudades = new Ciudad();
      $this->ciudades = $ciudades->getCiudades();
      
      
      
        
  }

  public function executeNew(sfWebRequest $request)
  {
       //Recibe la variable IdUser para poder asociarlo al usuario
     
         //Armado del Objeto Mensaje Alerta
         $ciudad = new Ciudad();
         //Arma Formulario Mensaje Alerta para el usuario en cuestion
         $this->form = new CiudadForm($ciudad);
         

    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CiudadForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($ciudad = Doctrine_Core::getTable('Ciudad')->find(array($request->getParameter('id'))), sprintf('Object ciudad does not exist (%s).', $request->getParameter('id')));
    $this->form = new CiudadForm($ciudad);
    
         
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($ciudad = Doctrine_Core::getTable('Ciudad')->find(array($request->getParameter('id'))), sprintf('Object ciudad does not exist (%s).', $request->getParameter('id')));
    

    $this->form = new CiudadForm($ciudad);
    $this->processForm($request, $this->form);

    
    
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($ciudad = Doctrine_Core::getTable('Ciudad')->find(array($request->getParameter('id'))), sprintf('Object ciudad does not exist (%s).', $request->getParameter('id')));
    
    try {
           $ciudad->delete();
           $this->getUser()->setFlash('eliminar', 'El Item fué removido exitosamente.'); 
           
          
      } catch (Doctrine_Exception $e) {
          $this->getUser()->setFlash('noeliminar', 'No se puedo eliminar el item, existen referencias a esta entrada.'); 
          
      }
      $this->redirect('ciudad/index');
      
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $ciudad = $form->save();
      
      $this->getUser()->setFlash('notice', 'Realizado de forma exitosa la operación'); 
      
      $this->setTemplate('edit');

    }
  }
}
