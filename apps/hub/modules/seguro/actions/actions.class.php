<?php

/**
 * seguross actions.
 *
 * @package    hub-usmjesus
 * @subpackage seguros
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class seguroActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    
      $this->categoria_id   = $request->getParameter('categoria_id');
      $this->marca_id       = $request->getParameter('marca_id');
      $this->nombre         = $request->getParameter('nombre');
      
      $seguros = new Seguro();
      $this->seguros = $seguros->getSeguros();
              
    
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new SeguroForm();
    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SeguroForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

 
  public function executeEdit(sfWebRequest $request)
  {
    
      
      
    $this->forward404Unless($seguros = Doctrine_Core::getTable('Seguro')->find(array($request->getParameter('id'))), sprintf('Object seguro does not exist (%s).', $request->getParameter('id')));
    $this->form = new SeguroForm($seguros);

    
    
    
  }
  
    public function executeEditSeguro(sfWebRequest $request)
  {
    
      
      
    $this->forward404Unless($seguros = Doctrine_Core::getTable('Seguro')->find(array($this->getUser()->getAttribute('agente_user_seguro_id'))), sprintf('Object seguro does not exist (%s).', $request->getParameter('id')));
    $this->form = new SeguroForm($seguros);
    
    
    
    
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($seguros = Doctrine_Core::getTable('Seguro')->find(array($request->getParameter('id'))), sprintf('Object seguros does not exist (%s).', $request->getParameter('id')));
    $this->form = new SeguroForm($seguros);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($seguros = Doctrine_Core::getTable('Seguro')->find(array($request->getParameter('id'))), sprintf('Object seguros does not exist (%s).', $request->getParameter('id')));
    $seguros->delete();

    $this->redirect('seguro/index');
  }


  
    protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      
      
        $seguros = $form->save();
        $this->getUser()->setFlash('notice', 'Realizado de forma exitosa la operación'); 
      
        
        $this->setTemplate('edit');
      
            

    }
  }
}
