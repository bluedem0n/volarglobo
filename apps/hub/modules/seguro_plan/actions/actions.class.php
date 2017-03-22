<?php

/**
 * seguro tipo actions.
 *
 * @package    hub-usmjesus
 * @subpackage cobro
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class seguro_planActions extends sfActions
{
    
  //funcion que hace el llamado a template que lista las opcines
  public function executeIndex(sfWebRequest $request)
  {
      
      $seguro_planes = new SeguroPlan();
      $this->seguro_planes = $seguro_planes->getSeguroPlanes();
        
  }

  //funcion que hace el llamado al formulario nuevo
  public function executeNew(sfWebRequest $request)
  {
       //Recibe la variable IdUser para poder asociarlo al usuario
     
         //Armado del Objeto Mensaje Alerta
         $seguro_planes = new SeguroPlan();
         //Arma Formulario Mensaje Alerta para el usuario en cuestion
         $this->form = new SeguroPlanForm($seguro_planes);
         

    
  }

  
  //Validacion de los datos del formulario cuando es nuevo 
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new SeguroPlanForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  
  //Funcion que hace el llamado al formulario de edicion
  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($seguro_plan = Doctrine_Core::getTable('SeguroPlan')->find(array($request->getParameter('id'))), sprintf('Object seguro plan does not exist (%s).', $request->getParameter('id')));
    $this->form = new SeguroPlanForm($seguro_plan);
    
         
  }

  //Validacion de los del formulario de edicion
  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($seguro_plan = Doctrine_Core::getTable('SeguroPlan')->find(array($request->getParameter('id'))), sprintf('Object seguro plan does not exist (%s).', $request->getParameter('id')));
    

    $this->form = new SeguroPlanForm($seguro_plan);
    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
    
  }
  //Procesa los formulario de ingreso y edicion
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $seguro_plan = $form->save();
      
      $this->getUser()->setFlash('notice', 'Realizado de forma exitosa la operación'); 
      
      $this->redirect('seguro_plan/index');

    }
  }
  
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($seguro_plan = Doctrine_Core::getTable('SeguroPlan')->find(array($request->getParameter('id'))), sprintf('Object seguro plan does not exist (%s).', $request->getParameter('id')));
    
    try {
           $seguro_plan->delete();
           $this->getUser()->setFlash('eliminar', 'El Item fué removido exitosamente.'); 
           
          
      } catch (Doctrine_Exception $e) {
          $this->getUser()->setFlash('noeliminar', 'No se puedo eliminar el item, existen referencias a esta entrada.'); 
          
      }
      $this->redirect('seguro_plan/index');
      
  }

  
}
