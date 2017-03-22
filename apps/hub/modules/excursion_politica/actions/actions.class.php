<?php

/**
 * excursion politica actions.
 *
 * @package    hub-usmjesus
 * @subpackage cobro
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class excursion_politicaActions extends sfActions
{
    
  //funcion que hace el llamado a template que lista las opcines
  public function executeIndex(sfWebRequest $request)
  {
      
      $excursion_politicas = new ExcursionPolitica();
      $this->excursion_politicas = $excursion_politicas->getExcursionPoliticas();
        
  }

  //funcion que hace el llamado al formulario nuevo
  public function executeNew(sfWebRequest $request)
  {
       //Recibe la variable IdUser para poder asociarlo al usuario
     
         //Armado del Objeto Mensaje Alerta
         $excursion_politicas = new ExcursionPolitica();
         //Arma Formulario Mensaje Alerta para el usuario en cuestion
         $this->form = new ExcursionPoliticaForm($excursion_politicas);
         

    
  }

  
  //Validacion de los datos del formulario cuando es nuevo 
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ExcursionPoliticaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  
  //Funcion que hace el llamado al formulario de edicion
  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($excursion_politica = Doctrine_Core::getTable('ExcursionPolitica')->find(array($request->getParameter('id'))), sprintf('Object excursion politica does not exist (%s).', $request->getParameter('id')));
    $this->form = new ExcursionPoliticaForm($excursion_politica);
    
         
  }

  //Validacion de los del formulario de edicion
  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($excursion_politica = Doctrine_Core::getTable('ExcursionPolitica')->find(array($request->getParameter('id'))), sprintf('Object excursion politica does not exist (%s).', $request->getParameter('id')));
    

    $this->form = new ExcursionPoliticaForm($excursion_politica);
    $this->processForm($request, $this->form);

    
    
  }
  //Procesa los formulario de ingreso y edicion
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $excursion_politica = $form->save();
      
      $this->getUser()->setFlash('notice', 'Realizado de forma exitosa la operación'); 
      
      $this->setTemplate('edit');

    }
  }
  
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($excursion_politica = Doctrine_Core::getTable('ExcursionPolitica')->find(array($request->getParameter('id'))), sprintf('Object excursion politica does not exist (%s).', $request->getParameter('id')));
    
    try {
           $excursion_politica->delete();
           $this->getUser()->setFlash('eliminar', 'El Item fué removido exitosamente.'); 
           
          
      } catch (Doctrine_Exception $e) {
          $this->getUser()->setFlash('noeliminar', 'No se puedo eliminar el item, existen referencias a esta entrada.'); 
          
      }
      $this->redirect('excursion_politica/index');
      
  }

  
}
