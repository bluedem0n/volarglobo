<?php

/**
 * cobro actions.
 *
 * @package    hub-usmjesus
 * @subpackage cobro
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tipo_motivoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      
      $tipo_motivos = new TipoMotivo();
      $this->tipo_motivos = $tipo_motivos->getTipoMotivos()->execute();
        
  }

  public function executeNew(sfWebRequest $request)
  {
       //Recibe la variable IdUser para poder asociarlo al usuario
     
         //Armado del Objeto Mensaje Alerta
         $tipo_motivo = new TipoMotivo();
         //Arma Formulario Mensaje Alerta para el usuario en cuestion
         $this->form = new TipoMotivoForm($tipo_motivo);
         

    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TipoMotivoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($tipo_motivo = Doctrine_Core::getTable('TipoMotivo')->find(array($request->getParameter('id'))), sprintf('Object cobro does not exist (%s).', $request->getParameter('id')));
    $this->form = new TipoMotivoForm($tipo_motivo);
    
         
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($tipo_motivo = Doctrine_Core::getTable('TipoMotivo')->find(array($request->getParameter('id'))), sprintf('Object cobro does not exist (%s).', $request->getParameter('id')));
    

    $this->form = new TipoMotivoForm($tipo_motivo);
    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
    
    
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($tipo_motivo = Doctrine_Core::getTable('TipoMotivo')->find(array($request->getParameter('id'))), sprintf('Object cobro does not exist (%s).', $request->getParameter('id')));
    
    try {
           $tipo_motivo->delete();
           $this->getUser()->setFlash('eliminar', 'El Item fué removido exitosamente.'); 
           
          
      } catch (Doctrine_Exception $e) {
          $this->getUser()->setFlash('noeliminar', 'No se puedo eliminar el item, existen referencias a esta entrada.'); 
          
      }
      $this->redirect('tipo_motivo/index');
      
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $tipo_motivo = $form->save();
      
      $this->getUser()->setFlash('notice', 'Realizado de forma exitosa la operación'); 
      
      $this->setTemplate('edit');

    }
  }
}
