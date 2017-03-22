<?php

/**
 * clientes actions.
 *
 * @package    hub-usmjesus
 * @subpackage clientes
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class clienteActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    
      $this->categoria_id   = $request->getParameter('categoria_id');
      $this->marca_id       = $request->getParameter('marca_id');
      $this->nombre         = $request->getParameter('nombre');
      
      //Reinicio los buscadores
        if($request->getParameter('reboot')){
        $this->getUser()->getAttributeHolder()->remove('cliente_filters');
        }
      
      if($request->getParameter('buscar_cliente')=='Filtrar'){
            
            //Asigna a la variable de sesion, todos los valores del filtro para q se mantenga
            $this->getUser()->setAttribute("cliente_filters", $request->getParameter('cliente_filters'));
            //Empieza la Paginacion en la pagina 1
            $this->getUser()->setAttribute('page_cliente', 1);
            
            $this->getUser()->getAttributeHolder()->remove('tel');
            
        }   
      
        
        
        
    //Crea la consulta del Filtro con los valores de la variable de sesion
    $filtros = $this->getUser()->getAttribute('cliente_filters');
    $this->filtro = $filtros;
    
    $consulta = new Cliente();
    $consulta = $consulta->getClientesPager();
     
            //Nombre del cliente
            if($filtros['nombre_cliente'])  $consulta->andWhere('CONCAT(p.nombre_cliente,nickname,rif,telefono1,telefono2,contacto_nombre) like "%'.$filtros['nombre_cliente'].'%"');
            
      //Hace permanente la pagina en una variable de sesion
      if($request->getParameter('page_cliente')){
          $this->getUser()->setAttribute('page_cliente', $request->getParameter('page_cliente'));
      }
        
      
      
      
      $this->clientes = new sfDoctrinePager('Cliente', sfConfig::get('app_cliente_x_pag'));
      $this->clientes->setQuery($consulta);
      $this->clientes->setPage($this->getUser()->getAttribute('page_cliente'));
      $this->clientes->init();
      
      $this->categorias = $this->getUser()->getAttribute('categorias_cliente');
      $this->marcas = $this->getUser()->getAttribute('sis_marcas');
      
      
      //filtros internos
      $this->filtro = new ClienteFormFilter($this->getUser()->getAttribute('cliente_filters'));
      
      
    
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ClienteForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ClienteForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    
      
      
    $this->forward404Unless($clientes = Doctrine_Core::getTable('Cliente')->find(array($request->getParameter('id'))), sprintf('Object empresa does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClienteForm($clientes);
    
    
    
    
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($clientes = Doctrine_Core::getTable('Cliente')->find(array($request->getParameter('id'))), sprintf('Object clientes does not exist (%s).', $request->getParameter('id')));
    $this->form = new ClienteForm($clientes);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($clientes = Doctrine_Core::getTable('Cliente')->find(array($request->getParameter('id'))), sprintf('Object clientes does not exist (%s).', $request->getParameter('id')));
    $clientes->delete();

    $this->redirect('cliente/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $clientes = $form->save();

      $this->getUser()->setFlash('notice', 'Realizado de forma exitosa la operación'); 
      
      $this->setTemplate('edit');

      
    }
  }
}
