<?php

/**
 * excursiones actions.
 *
 * @package    hub-usmjesus
 * @subpackage excursiones
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class excursionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    
      $this->categoria_id   = $request->getParameter('categoria_id');
      $this->marca_id       = $request->getParameter('marca_id');
      $this->nombre         = $request->getParameter('nombre');
      
      $excursiones = new Excursion();
      $this->excursiones = $excursiones->getExcursiones();
              
    
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ExcursionForm();
    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ExcursionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

 
  public function executeEdit(sfWebRequest $request)
  {
    
      
      
    $this->forward404Unless($excursiones = Doctrine_Core::getTable('Excursion')->find(array($request->getParameter('id'))), sprintf('Object excursion does not exist (%s).', $request->getParameter('id')));
    $this->form = new ExcursionForm($excursiones);

    
    
    
  }
  
    public function executeEditExcursion(sfWebRequest $request)
  {
    
      
      
    $this->forward404Unless($excursiones = Doctrine_Core::getTable('Excursion')->find(array($this->getUser()->getAttribute('agente_user_excursion_id'))), sprintf('Object excursion does not exist (%s).', $request->getParameter('id')));
    $this->form = new ExcursionForm($excursiones);
    
    
    
    
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($excursiones = Doctrine_Core::getTable('Excursion')->find(array($request->getParameter('id'))), sprintf('Object excursiones does not exist (%s).', $request->getParameter('id')));
    $this->form = new ExcursionForm($excursiones);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($excursiones = Doctrine_Core::getTable('Excursion')->find(array($request->getParameter('id'))), sprintf('Object excursiones does not exist (%s).', $request->getParameter('id')));
    $excursiones->delete();

    $this->redirect('excursion/index');
  }


  
    protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      
      
        $excursiones = $form->save();
        $this->getUser()->setFlash('notice', 'Realizado de forma exitosa la operación'); 
      
        
        $this->setTemplate('edit');
      
            

    }
  }
}
