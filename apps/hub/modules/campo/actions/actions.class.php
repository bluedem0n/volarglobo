<?php

/**
 * cobro actions.
 *
 * @package    hub-usmjesus
 * @subpackage cobro
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class campoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      
      $campos = new Campo();
      $this->campos = $campos->getCampos();
        
  }

  public function executeNew(sfWebRequest $request)
  {
       //Recibe la variable IdUser para poder asociarlo al usuario
     
         //Armado del Objeto Mensaje Alerta
         $campo = new Campo();
         //Arma Formulario Mensaje Alerta para el usuario en cuestion
         $this->form = new campoForm($campo);
         

    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new campoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($campo = Doctrine_Core::getTable('campo')->find(array($request->getParameter('id'))), sprintf('Object cobro does not exist (%s).', $request->getParameter('id')));
    $this->form = new campoForm($campo);
    
         
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($campo = Doctrine_Core::getTable('campo')->find(array($request->getParameter('id'))), sprintf('Object cobro does not exist (%s).', $request->getParameter('id')));
    

    $this->form = new campoForm($campo);
    $this->processForm($request, $this->form);

    
    
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($campo = Doctrine_Core::getTable('campo')->find(array($request->getParameter('id'))), sprintf('Object cobro does not exist (%s).', $request->getParameter('id')));
    
    try {
           $campo->delete();
           $this->getUser()->setFlash('eliminar', 'El Item fué removido exitosamente.'); 
           
          
      } catch (Doctrine_Exception $e) {
          $this->getUser()->setFlash('noeliminar', 'No se puedo eliminar el item, existen referencias a esta entrada.'); 
          
      }
      $this->redirect('campo/index');
      
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $campo = $form->save();
      
           $campo = new Campo();
           $campos = $campo->getCamposSelect()->execute();
           foreach ($campos as $red){
                $this->getUser()->setAttribute('red'.$red->getId(),$red->getNombre());
           }
      
      $this->getUser()->setFlash('notice', 'Realizado de forma exitosa la operación'); 
      
      $this->setTemplate('edit');

    }
  }
}
