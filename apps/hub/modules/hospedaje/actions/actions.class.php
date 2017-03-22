<?php

/**
 * hospedajes actions.
 *
 * @package    hub-usmjesus
 * @subpackage hospedajes
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class hospedajeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    
      $this->categoria_id   = $request->getParameter('categoria_id');
      $this->marca_id       = $request->getParameter('marca_id');
      $this->nombre         = $request->getParameter('nombre');
      
      
      
      //Reinicio los buscadores
        if($request->getParameter('reboot')){
        $this->getUser()->getAttributeHolder()->remove('hospedaje_filters');
        }
      
      if($request->getParameter('buscar_hospedaje')=='Filtrar'){
            
            //Asigna a la variable de sesion, todos los valores del filtro para q se mantenga
            $this->getUser()->setAttribute("hospedaje_filters", $request->getParameter('hospedaje_filters'));
            //Empieza la Paginacion en la pagina 1
            $this->getUser()->setAttribute('page_hospedaje', 1);
            
            $this->getUser()->getAttributeHolder()->remove('tel');
            
        }   
      
        
        
        
    //Crea la consulta del Filtro con los valores de la variable de sesion
    $filtros = $this->getUser()->getAttribute('hospedaje_filters');
    $this->filtro = $filtros;
    
    $consulta = new Hospedaje();
    $consulta = $consulta->getHospedajesPager();
     
            //Nombre del hospedaje
            if($filtros['nombre'])  $consulta->andWhere('CONCAT(p.nombre,nickname,rif,telefono1,telefono2,contacto_nombre) like "%'.$filtros['nombre'].'%"');
            
      //Hace permanente la pagina en una variable de sesion
      if($request->getParameter('page_hospedaje')){
          $this->getUser()->setAttribute('page_hospedaje', $request->getParameter('page_hospedaje'));
      }
        
      
      
      
      $this->hospedajes = new sfDoctrinePager('Hospedaje', sfConfig::get('app_hospedaje_x_pag'));
      $this->hospedajes->setQuery($consulta);
      $this->hospedajes->setPage($this->getUser()->getAttribute('page_hospedaje'));
      $this->hospedajes->init();
      
      
      
      
      //filtros internos
      $this->filtro = new HospedajeFormFilter($this->getUser()->getAttribute('hospedaje_filters'));
      
      
      
    
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new HospedajeForm();
    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new HospedajeForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

 
  public function executeEdit(sfWebRequest $request)
  {
    
      
      
    $this->forward404Unless($hospedajes = Doctrine_Core::getTable('Hospedaje')->find(array($request->getParameter('id'))), sprintf('Object hospedaje does not exist (%s).', $request->getParameter('id')));
    $this->form = new HospedajeForm($hospedajes);

    
    
    
  }
  
    public function executeEditHospedaje(sfWebRequest $request)
  {
    
      
      
    $this->forward404Unless($hospedajes = Doctrine_Core::getTable('Hospedaje')->find(array($this->getUser()->getAttribute('agente_user_hospedaje_id'))), sprintf('Object hospedaje does not exist (%s).', $request->getParameter('id')));
    $this->form = new HospedajeForm($hospedajes);
    
    
    
    
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($hospedajes = Doctrine_Core::getTable('Hospedaje')->find(array($request->getParameter('id'))), sprintf('Object hospedajes does not exist (%s).', $request->getParameter('id')));
    $this->form = new HospedajeForm($hospedajes);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($hospedajes = Doctrine_Core::getTable('Hospedaje')->find(array($request->getParameter('id'))), sprintf('Object hospedajes does not exist (%s).', $request->getParameter('id')));
    $hospedajes->delete();

    $this->redirect('hospedaje/index');
  }


  
    protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      
      
        $hospedajes = $form->save();
        $this->getUser()->setFlash('notice', 'Realizado de forma exitosa la operación'); 
      
        $this->redirect('hospedaje/index');
        //$this->setTemplate('edit');
      
            

    }
  }
  
  
   
  public function executeAddHabitacionForm(sfWebRequest $request)
  {
      
      $this->forward404unless($request->isXmlHttpRequest());
      $habitacion = intval($request->getParameter("num"));
      
      $prod = $hospedaje = Doctrine_Core::getTable('Hospedaje')->find($request->getParameter('id'));
      if(!is_null($prod)){
            $form = new HospedajeForm($hospedaje);
      }else{
            $form = new HospedajeForm();
      }

      $form->addHabitacion($habitacion);
      return $this->renderPartial('addHabitacion',array('form' => $form, 'num' => $habitacion));
  }
  
  public function executeDelHabitacion(sfWebRequest $request)
  {
    $this->forward404Unless($hospedaje_habitacion = Doctrine_Core::getTable('HospedajePrecio')->find(array($request->getParameter('id'))), sprintf('Object sf_guard_user does not exist (%s).', $request->getParameter('id')));
    $hospedaje_habitacion->delete();
    
    $this->servicio_tipo = $request->getParameter("servicio_tipo");
    $hospedaje = Doctrine_Core::getTable('Hospedaje')->find($hospedaje_habitacion->getHospedajeId());
    $this->form = new HospedajeForm($hospedaje);
    
    
  }
  
  public function executeAddRedeForm(sfWebRequest $request)
  {
      
      $this->forward404unless($request->isXmlHttpRequest());
      $rede = intval($request->getParameter("num"));
      
      $prod = $hospedaje = Doctrine_Core::getTable('Hospedaje')->find($request->getParameter('id'));
      if(!is_null($prod)){
            $form = new HospedajeForm($hospedaje);
      }else{
            $form = new HospedajeForm();
      }

      $form->addRede($rede);
      return $this->renderPartial('addRede',array('form' => $form, 'num' => $rede));
  }
  
  public function executeDelRede(sfWebRequest $request)
  {
    $this->forward404Unless($hospedaje_rede = Doctrine_Core::getTable('HospedajePrecio')->find(array($request->getParameter('id'))), sprintf('Object sf_guard_user does not exist (%s).', $request->getParameter('id')));
    $hospedaje_rede->delete();
    
    $this->servicio_tipo = $request->getParameter("servicio_tipo");
    $hospedaje = Doctrine_Core::getTable('Hospedaje')->find($hospedaje_rede->getHospedajeId());
    $this->form = new HospedajeForm($hospedaje);
    
    
  }
  
  public function executeAddGaleriaForm(sfWebRequest $request)
  {
      
      $this->forward404unless($request->isXmlHttpRequest());
      $galeria = intval($request->getParameter("num"));
      
      $prod = $hospedaje = Doctrine_Core::getTable('Hospedaje')->find($request->getParameter('id'));
      if(!is_null($prod)){
            $form = new HospedajeForm($hospedaje);
      }else{
            $form = new HospedajeForm();
      }

      $form->addGaleria($galeria);
      return $this->renderPartial('addGaleria',array('form' => $form, 'num' => $galeria));
  }
  

  
  
 
}
