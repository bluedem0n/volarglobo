<?php

/**
 * proveedores actions.
 *
 * @package    hub-usmjesus
 * @subpackage proveedores
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class proveedorActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    
      $this->categoria_id   = $request->getParameter('categoria_id');
      $this->marca_id       = $request->getParameter('marca_id');
      $this->nombre         = $request->getParameter('nombre');
      
      
      
      //Reinicio los buscadores
        if($request->getParameter('reboot')){
        $this->getUser()->getAttributeHolder()->remove('proveedor_filters');
        }
      
      if($request->getParameter('buscar_proveedor')=='Filtrar'){
            
            //Asigna a la variable de sesion, todos los valores del filtro para q se mantenga
            $this->getUser()->setAttribute("proveedor_filters", $request->getParameter('proveedor_filters'));
            //Empieza la Paginacion en la pagina 1
            $this->getUser()->setAttribute('page_proveedor', 1);
            
            $this->getUser()->getAttributeHolder()->remove('tel');
            
        }   
      
        
        
        
    //Crea la consulta del Filtro con los valores de la variable de sesion
    $filtros = $this->getUser()->getAttribute('proveedor_filters');
    $this->filtro = $filtros;
    
    $consulta = new Proveedor();
    $consulta = $consulta->getProveedoresPager();
     
            //Nombre del proveedor
            if($filtros['nombre'])  $consulta->andWhere('CONCAT(p.nombre,nickname,rif,telefono1,telefono2,contacto_nombre) like "%'.$filtros['nombre'].'%"');
            
      //Hace permanente la pagina en una variable de sesion
      if($request->getParameter('page_proveedor')){
          $this->getUser()->setAttribute('page_proveedor', $request->getParameter('page_proveedor'));
      }
        
      
      
      
      $this->proveedores = new sfDoctrinePager('Proveedor', sfConfig::get('app_proveedor_x_pag'));
      $this->proveedores->setQuery($consulta);
      $this->proveedores->setPage($this->getUser()->getAttribute('page_proveedor'));
      $this->proveedores->init();
      
      
      
      
      //filtros internos
      $this->filtro = new ProveedorFormFilter($this->getUser()->getAttribute('proveedor_filters'));
      
      
      
    
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ProveedorForm();
    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ProveedorForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

 
  public function executeEdit(sfWebRequest $request)
  {
    
      
      
    $this->forward404Unless($proveedores = Doctrine_Core::getTable('Proveedor')->find(array($request->getParameter('id'))), sprintf('Object proveedor does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProveedorForm($proveedores);
    
    $proveedor_descuentos = new ProveedorDescuento();
    $this->proveedor_descuentos = $proveedor_descuentos->getDescuentosCtteId($request->getParameter('id'));
    
    
    
  }
  
    public function executeEditProveedor(sfWebRequest $request)
  {
    
      
      
    $this->forward404Unless($proveedores = Doctrine_Core::getTable('Proveedor')->find(array($this->getUser()->getAttribute('agente_user_proveedor_id'))), sprintf('Object proveedor does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProveedorForm($proveedores);
    
    
    
    
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($proveedores = Doctrine_Core::getTable('Proveedor')->find(array($request->getParameter('id'))), sprintf('Object proveedores does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProveedorForm($proveedores);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($proveedores = Doctrine_Core::getTable('Proveedor')->find(array($request->getParameter('id'))), sprintf('Object proveedores does not exist (%s).', $request->getParameter('id')));
    $proveedores->delete();

    $this->redirect('proveedor/index');
  }


  
    protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      
      
        $proveedores = $form->save();
        $this->getUser()->setFlash('notice', 'Realizado de forma exitosa la operación'); 
      
        $this->redirect('proveedor/index');
        //$this->setTemplate('edit');
      
            

    }
  }
  
  
   
  public function executeAddSucursalForm(sfWebRequest $request)
  {
      
      $this->forward404unless($request->isXmlHttpRequest());
      $sucursal = intval($request->getParameter("num"));
      
      $prod = $proveedor = Doctrine_Core::getTable('Proveedor')->find($request->getParameter('id'));
      if(!is_null($prod)){
            $form = new ProveedorForm($proveedor);
      }else{
            $form = new ProveedorForm();
      }

      $form->addSucursal($sucursal);
      return $this->renderPartial('addSucursal',array('form' => $form, 'num' => $sucursal));
  }
  
  public function executeDelSucursal(sfWebRequest $request)
  {
    $this->forward404Unless($proveedor_sucursal = Doctrine_Core::getTable('ProveedorPrecio')->find(array($request->getParameter('id'))), sprintf('Object sf_guard_user does not exist (%s).', $request->getParameter('id')));
    $proveedor_sucursal->delete();
    
    $this->servicio_tipo = $request->getParameter("servicio_tipo");
    $proveedor = Doctrine_Core::getTable('Proveedor')->find($proveedor_sucursal->getProveedorId());
    $this->form = new ProveedorForm($proveedor);
    
    
  }
  
  public function executeAddRedeForm(sfWebRequest $request)
  {
      
      $this->forward404unless($request->isXmlHttpRequest());
      $rede = intval($request->getParameter("num"));
      
      $prod = $proveedor = Doctrine_Core::getTable('Proveedor')->find($request->getParameter('id'));
      if(!is_null($prod)){
            $form = new ProveedorForm($proveedor);
      }else{
            $form = new ProveedorForm();
      }

      $form->addRede($rede);
      return $this->renderPartial('addRede',array('form' => $form, 'num' => $rede));
  }
  
  public function executeDelRede(sfWebRequest $request)
  {
    $this->forward404Unless($proveedor_rede = Doctrine_Core::getTable('ProveedorPrecio')->find(array($request->getParameter('id'))), sprintf('Object sf_guard_user does not exist (%s).', $request->getParameter('id')));
    $proveedor_rede->delete();
    
    $this->servicio_tipo = $request->getParameter("servicio_tipo");
    $proveedor = Doctrine_Core::getTable('Proveedor')->find($proveedor_rede->getProveedorId());
    $this->form = new ProveedorForm($proveedor);
    
    
  }
  
  public function executeAddGaleriaForm(sfWebRequest $request)
  {
      
      $this->forward404unless($request->isXmlHttpRequest());
      $galeria = intval($request->getParameter("num"));
      
      $prod = $proveedor = Doctrine_Core::getTable('Proveedor')->find($request->getParameter('id'));
      if(!is_null($prod)){
            $form = new ProveedorForm($proveedor);
      }else{
            $form = new ProveedorForm();
      }

      $form->addGaleria($galeria);
      return $this->renderPartial('addGaleria',array('form' => $form, 'num' => $galeria));
  }
  

  
  
 
}
