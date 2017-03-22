<?php

/**
 * cobro actions.
 *
 * @package    hub-usmjesus
 * @subpackage cobro
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class seccionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      
      $empresa_secciones = new EmpresaSeccion();
      $this->empresa_secciones = $empresa_secciones->getEmpresaSecciones();
        
  }

  public function executeNew(sfWebRequest $request)
  {
       //Recibe la variable IdUser para poder asociarlo al usuario
     
         //Armado del Objeto Mensaje Alerta
         $empresa_seccion = new EmpresaSeccion();
         //Arma Formulario Mensaje Alerta para el usuario en cuestion
         $this->form = new EmpresaSeccionForm($empresa_seccion);
         

    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new EmpresaSeccionForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($empresa_seccion = Doctrine_Core::getTable('EmpresaSeccion')->find(array($request->getParameter('id'))), sprintf('Object cobro does not exist (%s).', $request->getParameter('id')));
    $this->form = new EmpresaSeccionForm($empresa_seccion);
    
         
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($empresa_seccion = Doctrine_Core::getTable('EmpresaSeccion')->find(array($request->getParameter('id'))), sprintf('Object cobro does not exist (%s).', $request->getParameter('id')));
    

    $this->form = new EmpresaSeccionForm($empresa_seccion);
    $this->processForm($request, $this->form);

    
    $this->setTemplate('edit');
    
    
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($empresa_seccion = Doctrine_Core::getTable('EmpresaSeccion')->find(array($request->getParameter('id'))), sprintf('Object cobro does not exist (%s).', $request->getParameter('id')));
    
    try {
           $empresa_seccion->delete();
           $this->getUser()->setFlash('eliminar', 'El Item fué removido exitosamente.'); 
           
          
      } catch (Doctrine_Exception $e) {
          $this->getUser()->setFlash('noeliminar', 'No se puedo eliminar el item, existen referencias a esta entrada.'); 
          
      }
      $this->redirect('seccion/index');
      
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      
      try {
        $empresa_secciones = $form->save();
        $this->getUser()->setFlash('notice', 'Realizado de forma exitosa la operación'); 
        
        $this->redirect('/seccion/index');
        
      } catch(Doctrine_Exception $e) {

        $this->getUser()->setFlash('error', 'Ocurrio un error en la operación'); 
        
        $this->redirect('/seccion/index');
        
      }

    }
    
    
  }
}
