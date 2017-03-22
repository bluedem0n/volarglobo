<?php

/**
 * cobro actions.
 *
 * @package    hub-usmjesus
 * @subpackage cobro
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class faqActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      
      $faqs = new CategoriaFaq();
      $this->faqs = $faqs->getCategoriaFaqs();
        
  }

  public function executeNew(sfWebRequest $request)
  {
       //Recibe la variable IdUser para poder asociarlo al usuario
     
         //Armado del Objeto Mensaje Alerta
         $faq = new CategoriaFaq();
         //Arma Formulario Mensaje Alerta para el usuario en cuestion
         $this->form = new CategoriaFaqForm($faq);
         

    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CategoriaFaqForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($faq = Doctrine_Core::getTable('CategoriaFaq')->find(array($request->getParameter('id'))), sprintf('Object cobro does not exist (%s).', $request->getParameter('id')));
    $this->form = new CategoriaFaqForm($faq);
    
         
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($faq = Doctrine_Core::getTable('CategoriaFaq')->find(array($request->getParameter('id'))), sprintf('Object cobro does not exist (%s).', $request->getParameter('id')));
    

    $this->form = new CategoriaFaqForm($faq);
    $this->processForm($request, $this->form);

    
    $this->setTemplate('edit');
    
    
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($faq = Doctrine_Core::getTable('CategoriaFaq')->find(array($request->getParameter('id'))), sprintf('Object cobro does not exist (%s).', $request->getParameter('id')));
    
    try {
           $faq->delete();
           $this->getUser()->setFlash('eliminar', 'El Item fué removido exitosamente.'); 
           
          
      } catch (Doctrine_Exception $e) {
          $this->getUser()->setFlash('noeliminar', 'No se puedo eliminar el item, existen referencias a esta entrada.'); 
          
      }
      $this->redirect('faq/index');
      
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      
      try {
        $cliente_faqs = $form->save();
        $this->getUser()->setFlash('notice', 'Realizado de forma exitosa la operación'); 
        
      } catch(Doctrine_Exception $e) {

        $this->getUser()->setFlash('error', 'Ocurrio un error en la operación'); 
        
        $this->redirect('/faq/index');
        
      }

    }
    
    
  }
}
