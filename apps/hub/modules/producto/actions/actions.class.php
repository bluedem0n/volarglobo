<?php

/**
 * proveedor_descuentos actions.
 *
 * @package    hub-usmjesus
 * @subpackage proveedor_descuentos
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class productoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    
      $this->categoria_id   = $request->getParameter('categoria_id');
      $this->idCtte   = $request->getParameter('idCtte');
      
      
      //Reinicio los buscadores
        if($request->getParameter('reboot')){
        $this->getUser()->getAttributeHolder()->remove('proveedor_descuento_filters');
        }
      
      if($request->getParameter('buscar_proveedor_descuento')=='Filtrar'){
            
            //Asigna a la variable de sesion, todos los valores del filtro para q se mantenga
            $this->getUser()->setAttribute("proveedor_descuento_filters", $request->getParameter('proveedor_descuento_filters'));
            //Empieza la Paginacion en la pagina 1
            $this->getUser()->setAttribute('page_proveedor_descuento', 1);
            
            $this->getUser()->getAttributeHolder()->remove('tel');
            
        }   
      
        
        
        
    //Crea la consulta del Filtro con los valores de la variable de sesion
    $filtros = $this->getUser()->getAttribute('proveedor_descuento_filters');
    $this->filtro = $filtros;
    
    $consulta = new ProveedorDescuento();
    $consulta = $consulta->getProveedorDescuentosPager();
     
            //Nombre del proveedor_descuento
            if($filtros['nombre'])  $consulta->andWhere('CONCAT(p.nombre,observacion,condiciones) like "%'.$filtros['nombre'].'%"');
            
            if($this->idCtte)
            $consulta->andWhere('p.proveedor_id="'.$this->idCtte.'"');    
            
            
            
      //Hace permanente la pagina en una variable de sesion
      if($request->getParameter('page_proveedor_descuento')){
          $this->getUser()->setAttribute('page_proveedor_descuento', $request->getParameter('page_proveedor_descuento'));
      }
        
      
      
      
      $this->proveedor_descuentos = new sfDoctrinePager('ProveedorDescuento', sfConfig::get('app_proveedor_descuento_x_pag'));
      $this->proveedor_descuentos->setQuery($consulta);
      $this->proveedor_descuentos->setPage($this->getUser()->getAttribute('page_proveedor_descuento'));
      $this->proveedor_descuentos->init();
      
      $this->categorias = $this->getUser()->getAttribute('categorias_proveedor_descuento');
      
      
      
      //filtros internos
      $this->filtro = new ProveedorDescuentoFormFilter($this->getUser()->getAttribute('proveedor_descuento_filters'));
      
      
      
      //Activacion de los valores que se ingresaran en el PDf y Mail
      
      
        // Set some content to print
        $html = '';
        $html .= '<table class="table table-striped" border="1" id="tableId">'
                . '<thead>';
        $html .= '<tr>';
        $html .= '<th><span >ID </span></th>';
        
        $html .= '<th><span >Sucursal</span></th>';
        $html .= '<th><span >Categoría</span></th>';
        $html .= '<th><span >Titulo</span></th>';
        $html .= '<th><span >Activacion</span></th>';
        $html .= '<th><span >Finalizacion</span></th>';

        $html .= '</tr>'
                . '</thead>'
                . '<tbody>';
        foreach ($this->proveedor_descuentos as $dato){ 
          $html .= '<tr>';
                      $html .= '<td><span>'.$dato->getId().'</span></td>';
                      
                        if($dato->getProveedorSucursalId())
                        $html .= '<td><span>'.$dato->getProveedorSucursal().'</span></td>';
                        else
                        $html .= '<td><span>Todas</span></td>';
                      $html .= '<td><span>'.$dato->getCategoria().'</span></td>';
                      $html .= '<td><span>'.$dato->getNombre().'</span></td>';
                      $html .= '<td><span>'.$dato->getFechaActivacion().'</span></td>';
                      $html .= '<td><span>'.$dato->getFechaFinalizacion().'</span></td>';
                      
          $html .= '</tr>';
       }
        $html .= '<tbody>'
              . '</table>';
      
      
      
      $this->getUser()->setAttribute("export", $html);
      
    
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ProveedorDescuentoHubForm();
    
    if($request->getParameter('idCtte')>0){
        $this->de =$request->getParameter('idCtte');    
    }
    
    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ProveedorDescuentoHubForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  
  public function executeEdit(sfWebRequest $request)
  {
    
      
      
    $this->forward404Unless($proveedor_descuentos = Doctrine_Core::getTable('ProveedorDescuento')->find(array($request->getParameter('id'))), sprintf('Object proveedor_descuento does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProveedorDescuentoHubForm($proveedor_descuentos);
    
    
    
    
  }
  
    public function executeEditProveedorDescuento(sfWebRequest $request)
  {
    
      
      
    $this->forward404Unless($proveedor_descuentos = Doctrine_Core::getTable('ProveedorDescuento')->find(array($this->getUser()->getAttribute('agente_user_proveedor_descuento_id'))), sprintf('Object proveedor_descuento does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProveedorDescuentoHubForm($proveedor_descuentos);
    
    
    
    
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($proveedor_descuentos = Doctrine_Core::getTable('ProveedorDescuento')->find(array($request->getParameter('id'))), sprintf('Object proveedor_descuentos does not exist (%s).', $request->getParameter('id')));
    $this->form = new ProveedorDescuentoHubForm($proveedor_descuentos);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }
  
  
  public function executeStatus(sfWebRequest $request)
  {
    
    $this->forward404Unless($agendado = Doctrine_Core::getTable('ProveedorDescuento')->find(array($request->getParameter('id'))), sprintf('Object agendado does not exist (%s).', $request->getParameter('id')));
        $agendado->setStatus($request->getParameter('cambia'));
        $agendado->save();
    
    $this->redirect('descuento/index');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($proveedor_descuentos = Doctrine_Core::getTable('ProveedorDescuento')->find(array($request->getParameter('id'))), sprintf('Object proveedor_descuentos does not exist (%s).', $request->getParameter('id')));
    $proveedor_descuentos->delete();

    $this->redirect('descuento/index');
  }


  
    protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      
      try {
        $proveedor_descuentos = $form->save();
        $this->getUser()->setFlash('notice', 'Realizado de forma exitosa la operación'); 
        $this->redirect('/descuento/index?idCtte='.$proveedor_descuentos->getProveedorId());
      
      } catch(Doctrine_Exception $e) {

        $this->getUser()->setFlash('error', 'Ocurrio un error en la operación'); 
        
        $this->redirect('/descuento/index');
        
      }

      
      
            

    }
  }
  
  
   
  public function executeAddGaleriaForm(sfWebRequest $request)
  {
      
      $this->forward404unless($request->isXmlHttpRequest());
      $galeria = intval($request->getParameter("num"));
      
      $prod = $proveedor_descuento = Doctrine_Core::getTable('ProveedorDescuento')->find($request->getParameter('id'));
      if(!is_null($prod)){
            $form = new ProveedorDescuentoHubForm($proveedor_descuento);
      }else{
            $form = new ProveedorDescuentoHubForm();
      }

      $form->addGaleria($galeria);
      return $this->renderPartial('addGaleria',array('form' => $form, 'num' => $galeria));
  }
  
  public function executeDelGaleria(sfWebRequest $request)
  {
    $this->forward404Unless($galeria_descuento = Doctrine_Core::getTable('GaleriaDescuento')->find(array($request->getParameter('id'))), sprintf('Object sf_guard_user does not exist (%s).', $request->getParameter('id')));
    $galeria_descuento->delete();
    
    
    $proveedor_descuento = Doctrine_Core::getTable('ProveedorDescuento')->find($galeria_descuento->getProveedorDescuentoId());
    $this->form = new ProveedorDescuentoHubForm($proveedor_descuento);
    
    
  }
 
  
}
