<?php

/**
 * tripulaciones actions.
 *
 * @package    hub-usmjesus
 * @subpackage tripulaciones
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tripulacionActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    
      
      //Reinicio los buscadores
        if($request->getParameter('reboot')){
        $this->getUser()->getAttributeHolder()->remove('tripulacion_filters');
        }
      
      if($request->getParameter('buscar_tripulacion')=='Filtrar'){
            
            //Asigna a la variable de sesion, todos los valores del filtro para q se mantenga
            $this->getUser()->setAttribute("tripulacion_filters", $request->getParameter('tripulacion_filters'));
            //Empieza la Paginacion en la pagina 1
            $this->getUser()->setAttribute('page_tripulacion', 1);
            
            $this->getUser()->getAttributeHolder()->remove('tel');
            
        }   
      
        
        
        
    //Crea la consulta del Filtro con los valores de la variable de sesion
    $filtros = $this->getUser()->getAttribute('tripulacion_filters');
    $this->filtro = $filtros;
    
    $consulta = new sfGuardUser();
    $consulta = $consulta->getsfGuardUsersPager();
     
    
            $consulta->andWhere("p.tipo_personal_id>1");
            //Nombre del tripulacion
            if($filtros['nombre_tripulacion'])  $consulta->andWhere('CONCAT(p.nombre_tripulacion,nickname,rif,telefono1,telefono2,contacto_nombre) like "%'.$filtros['nombre_tripulacion'].'%"');
            
      //Hace permanente la pagina en una variable de sesion
      if($request->getParameter('page_tripulacion')){
          $this->getUser()->setAttribute('page_tripulacion', $request->getParameter('page_tripulacion'));
      }
        
      
      
      
      $this->tripulaciones = new sfDoctrinePager('sfGuardUser', sfConfig::get('app_tripulacion_x_pag'));
      $this->tripulaciones->setQuery($consulta);
      $this->tripulaciones->setPage($this->getUser()->getAttribute('page_tripulacion'));
      $this->tripulaciones->init();
      
      $this->categorias = $this->getUser()->getAttribute('categorias_tripulacion');
      $this->marcas = $this->getUser()->getAttribute('sis_marcas');
      
      
      //filtros internos
      $this->filtro = new sfGuardUserFormFilter($this->getUser()->getAttribute('tripulacion_filters'));
      
      
    
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new sfGuardUserForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new sfGuardUserForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    
      
      
    $this->forward404Unless($tripulaciones = Doctrine_Core::getTable('sfGuardUser')->find(array($request->getParameter('id'))), sprintf('Object empresa does not exist (%s).', $request->getParameter('id')));
    $this->form = new sfGuardUserForm($tripulaciones);
    
    
    
    
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($tripulaciones = Doctrine_Core::getTable('sfGuardUser')->find(array($request->getParameter('id'))), sprintf('Object tripulaciones does not exist (%s).', $request->getParameter('id')));
    $this->form = new sfGuardUserForm($tripulaciones);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($tripulaciones = Doctrine_Core::getTable('sfGuardUser')->find(array($request->getParameter('id'))), sprintf('Object tripulaciones does not exist (%s).', $request->getParameter('id')));
    $tripulaciones->delete();

    $this->redirect('tripulacion/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $tripulaciones = $form->save();

      $this->getUser()->setFlash('notice', 'Realizado de forma exitosa la operación'); 
      
      $this->setTemplate('edit');

      
    }
  }
}
