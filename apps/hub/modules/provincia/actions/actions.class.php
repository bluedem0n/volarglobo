<?php

/**
 * provincia actions.
 *
 * @package    hub-usmjesus
 * @subpackage provincia
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class provinciaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      
      $provincias = new Provincia();
      $this->provincias = $provincias->getProvincias();
        
  }

  public function executeNew(sfWebRequest $request)
  {
       //Recibe la variable IdUser para poder asociarlo al usuario
     
         //Armado del Objeto Mensaje Alerta
         $provincia = new Provincia();
         //Arma Formulario Mensaje Alerta para el usuario en cuestion
         $this->form = new ProvinciaForm($provincia);
         

    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ProvinciaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($provincia = Doctrine_Core::getTable('Provincia')->find(array($request->getParameter('id'))), sprintf('Object provincia does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProvinciaForm($provincia);
    
         
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($provincia = Doctrine_Core::getTable('Provincia')->find(array($request->getParameter('id'))), sprintf('Object provincia does not exist (%s).', $request->getParameter('id')));
    

    $this->form = new ProvinciaForm($provincia);
    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
    
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($provincia = Doctrine_Core::getTable('Provincia')->find(array($request->getParameter('id'))), sprintf('Object provincia does not exist (%s).', $request->getParameter('id')));
    
    try {
           $provincia->delete();
           $this->getUser()->setFlash('eliminar', 'El Item fué removido exitosamente.'); 
           
          
      } catch (Doctrine_Exception $e) {
          $this->getUser()->setFlash('noeliminar', 'No se puedo eliminar el item, existen referencias a esta entrada.'); 
          
      }
      $this->redirect('provincia/index');
      
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $provincia = $form->save();
      
      $this->getUser()->setFlash('notice', 'Realizado de forma exitosa la operación'); 
      
      $this->setTemplate('edit');

    }
  }
}
