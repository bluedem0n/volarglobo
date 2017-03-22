<?php

/**
 * personales actions.
 *
 * @package    hub-usmjesus
 * @subpackage personales
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class personalActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    
      $this->categoria_id   = $request->getParameter('categoria_id');
      $this->marca_id       = $request->getParameter('marca_id');
      $this->nombre         = $request->getParameter('nombre');
      
      //Reinicio los buscadores
        if($request->getParameter('reboot')){
        $this->getUser()->getAttributeHolder()->remove('personal_filters');
        }
      
      if($request->getParameter('buscar_personal')=='Filtrar'){
            
            //Asigna a la variable de sesion, todos los valores del filtro para q se mantenga
            $this->getUser()->setAttribute("personal_filters", $request->getParameter('personal_filters'));
            //Empieza la Paginacion en la pagina 1
            $this->getUser()->setAttribute('page_personal', 1);
            
            $this->getUser()->getAttributeHolder()->remove('tel');
            
        }   
      
        
        
        
    //Crea la consulta del Filtro con los valores de la variable de sesion
    $filtros = $this->getUser()->getAttribute('personal_filters');
    $this->filtro = $filtros;
    
    $consulta = new sfGuardUser();
    $consulta = $consulta->getsfGuardUsersPager();
     
            //Nombre del personal
            if($filtros['nombre_personal'])  $consulta->andWhere('CONCAT(p.nombre_personal,nickname,rif,telefono1,telefono2,contacto_nombre) like "%'.$filtros['nombre_personal'].'%"');
            
      //Hace permanente la pagina en una variable de sesion
      if($request->getParameter('page_personal')){
          $this->getUser()->setAttribute('page_personal', $request->getParameter('page_personal'));
      }
        
      
      
      
      $this->personales = new sfDoctrinePager('sfGuardUser', sfConfig::get('app_personal_x_pag'));
      $this->personales->setQuery($consulta);
      $this->personales->setPage($this->getUser()->getAttribute('page_personal'));
      $this->personales->init();
      
      $this->categorias = $this->getUser()->getAttribute('categorias_personal');
      $this->marcas = $this->getUser()->getAttribute('sis_marcas');
      
      
      //filtros internos
      $this->filtro = new sfGuardUserFormFilter($this->getUser()->getAttribute('personal_filters'));
      
      
    
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
    
      
      
    $this->forward404Unless($personales = Doctrine_Core::getTable('sfGuardUser')->find(array($request->getParameter('id'))), sprintf('Object empresa does not exist (%s).', $request->getParameter('id')));
    $this->form = new sfGuardUserForm($personales);
    
    
    
    
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($personales = Doctrine_Core::getTable('sfGuardUser')->find(array($request->getParameter('id'))), sprintf('Object personales does not exist (%s).', $request->getParameter('id')));
    $this->form = new sfGuardUserForm($personales);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($personales = Doctrine_Core::getTable('sfGuardUser')->find(array($request->getParameter('id'))), sprintf('Object personales does not exist (%s).', $request->getParameter('id')));
    $personales->delete();

    $this->redirect('personal/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $personales = $form->save();

      $this->getUser()->setFlash('notice', 'Realizado de forma exitosa la operación'); 
      
      $this->setTemplate('edit');

      
    }
  }
}
