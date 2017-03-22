<?php

/**
 * proveedor_vuelos actions.
 *
 * @package    hub-usmjesus
 * @subpackage proveedor_vuelos
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class vueloActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    
      $this->categoria_id   = $request->getParameter('categoria_id');
      $this->idCtte   = $request->getParameter('idCtte');
      
      
      //Reinicio los buscadores
        if($request->getParameter('reboot')){
        $this->getUser()->getAttributeHolder()->remove('proveedor_vuelo_filters');
        }
      
      if($request->getParameter('buscar_proveedor_vuelo')=='Filtrar'){
            
            //Asigna a la variable de sesion, todos los valores del filtro para q se mantenga
            $this->getUser()->setAttribute("proveedor_vuelo_filters", $request->getParameter('proveedor_vuelo_filters'));
            //Empieza la Paginacion en la pagina 1
            $this->getUser()->setAttribute('page_proveedor_vuelo', 1);
            
            $this->getUser()->getAttributeHolder()->remove('tel');
            
        }   
      
        
        
        
    //Crea la consulta del Filtro con los valores de la variable de sesion
    $filtros = $this->getUser()->getAttribute('proveedor_vuelo_filters');
    $this->filtro = $filtros;
    
    $consulta = new ProveedorVuelo();
    $consulta = $consulta->getProveedorVuelosPager();
     
      //Hace permanente la pagina en una variable de sesion
      if($request->getParameter('page_proveedor_vuelo')){
          $this->getUser()->setAttribute('page_proveedor_vuelo', $request->getParameter('page_proveedor_vuelo'));
      }
        
      
      
      
      $this->proveedor_vuelos = new sfDoctrinePager('ProveedorVuelo', sfConfig::get('app_proveedor_vuelo_x_pag'));
      $this->proveedor_vuelos->setQuery($consulta);
      $this->proveedor_vuelos->setPage($this->getUser()->getAttribute('page_proveedor_vuelo'));
      $this->proveedor_vuelos->init();
      
      $this->categorias = $this->getUser()->getAttribute('categorias_proveedor_vuelo');
      
      
      
      //filtros internos
      $this->filtro = new ProveedorVueloFormFilter($this->getUser()->getAttribute('proveedor_vuelo_filters'));
      
   
    
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ProveedorVueloForm();
    
    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ProveedorVueloForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  
  public function executeEdit(sfWebRequest $request)
  {
    
      
      
    $this->forward404Unless($proveedor_vuelos = Doctrine_Core::getTable('ProveedorVuelo')->find(array($request->getParameter('id'))), sprintf('Object proveedor_vuelo does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProveedorVueloForm($proveedor_vuelos);
    
    
    
    
  }
  
    public function executeEditProveedorVuelo(sfWebRequest $request)
  {
    
      
      
    $this->forward404Unless($proveedor_vuelos = Doctrine_Core::getTable('ProveedorVuelo')->find(array($this->getUser()->getAttribute('agente_user_proveedor_vuelo_id'))), sprintf('Object proveedor_vuelo does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProveedorVueloForm($proveedor_vuelos);
    
    
    
    
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($proveedor_vuelos = Doctrine_Core::getTable('ProveedorVuelo')->find(array($request->getParameter('id'))), sprintf('Object proveedor_vuelos does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProveedorVueloForm($proveedor_vuelos);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }
  
  
  public function executeStatus(sfWebRequest $request)
  {
    
    $this->forward404Unless($agendado = Doctrine_Core::getTable('ProveedorVuelo')->find(array($request->getParameter('id'))), sprintf('Object agendado does not exist (%s).', $request->getParameter('id')));
        $agendado->setStatus($request->getParameter('cambia'));
        $agendado->save();
    
    $this->redirect('vuelo/index');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($proveedor_vuelos = Doctrine_Core::getTable('ProveedorVuelo')->find(array($request->getParameter('id'))), sprintf('Object proveedor_vuelos does not exist (%s).', $request->getParameter('id')));
    $proveedor_vuelos->delete();

    $this->redirect('vuelo/index');
  }


  
    protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      
      try {
        $proveedor_vuelos = $form->save();
        $this->getUser()->setFlash('notice', 'Realizado de forma exitosa la operación'); 
        $this->redirect('/vuelo/index');
      
      } catch(Doctrine_Exception $e) {

          
        $this->getUser()->setFlash('error', 'Ocurrio un error en la operación'); 
        
        $this->setTemplate('edit');
        
      }

      
      
            

    }
  }
  
  
   
  public function executeAddGaleriaForm(sfWebRequest $request)
  {
      
      $this->forward404unless($request->isXmlHttpRequest());
      $galeria = intval($request->getParameter("num"));
      
      $prod = $proveedor_vuelo = Doctrine_Core::getTable('ProveedorVuelo')->find($request->getParameter('id'));
      if(!is_null($prod)){
            $form = new ProveedorVueloForm($proveedor_vuelo);
      }else{
            $form = new ProveedorVueloForm();
      }

      $form->addGaleria($galeria);
      return $this->renderPartial('addGaleria',array('form' => $form, 'num' => $galeria));
  }
  
  public function executeDelGaleria(sfWebRequest $request)
  {
    $this->forward404Unless($galeria_descuento = Doctrine_Core::getTable('GaleriaDescuento')->find(array($request->getParameter('id'))), sprintf('Object sf_guard_user does not exist (%s).', $request->getParameter('id')));
    $galeria_descuento->delete();
    
    
    $proveedor_vuelo = Doctrine_Core::getTable('ProveedorVuelo')->find($galeria_descuento->getProveedorVueloId());
    $this->form = new ProveedorVueloForm($proveedor_vuelo);
    
    
  }
 
  
  public function executeAddCampoForm(sfWebRequest $request)
  {
      
      $this->forward404unless($request->isXmlHttpRequest());
      $campo = intval($request->getParameter("num"));
      
      $prod = $proveedor = Doctrine_Core::getTable('Proveedor')->find($request->getParameter('id'));
      if(!is_null($prod)){
            $form = new ProveedorForm($proveedor);
      }else{
            $form = new ProveedorForm();
      }

      $form->addCampo($campo);
      return $this->renderPartial('addCampo',array('form' => $form, 'num' => $campo));
  }
  
  public function executeDelCampo(sfWebRequest $request)
  {
    $this->forward404Unless($proveedor_campo = Doctrine_Core::getTable('ProveedorPrecio')->find(array($request->getParameter('id'))), sprintf('Object sf_guard_user does not exist (%s).', $request->getParameter('id')));
    $proveedor_campo->delete();
    
    $this->servicio_tipo = $request->getParameter("servicio_tipo");
    $proveedor = Doctrine_Core::getTable('Proveedor')->find($proveedor_campo->getProveedorId());
    $this->form = new ProveedorForm($proveedor);
    
    
  }
  
  
  public function executeAddClienteForm(sfWebRequest $request)
  {
      
      $this->forward404unless($request->isXmlHttpRequest());
      $sucursal = intval($request->getParameter("num"));
      
      $prod = $cliente = Doctrine_Core::getTable('ProveedorVuelo')->find($request->getParameter('id'));
      if(!is_null($prod)){
            $form = new ProveedorVueloForm($cliente);
      }else{
            $form = new ProveedorVueloForm();
      }

      $form->addCliente($sucursal);
      return $this->renderPartial('addCliente',array('form' => $form, 'num' => $sucursal));
  }
  
  public function executeDelCliente(sfWebRequest $request)
  {
    $this->forward404Unless($vuelo_cliente = Doctrine_Core::getTable('ProveedorVuelo')->find(array($request->getParameter('id'))), sprintf('Object sf_guard_user does not exist (%s).', $request->getParameter('id')));
    $vuelo_cliente->delete();
    
    $this->servicio_tipo = $request->getParameter("servicio_tipo");
    $cliente = Doctrine_Core::getTable('ProveedorVuelo')->find($vuelo_cliente->getProveedorVueloId());
    $this->form = new ProveedorVueloForm($cliente);
    
    
  }
  
  
  
}
