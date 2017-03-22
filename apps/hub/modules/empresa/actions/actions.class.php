<?php

/**
 * empresas actions.
 *
 * @package    hub-usmjesus
 * @subpackage empresas
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class empresaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    
      $this->categoria_id   = $request->getParameter('categoria_id');
      $this->marca_id       = $request->getParameter('marca_id');
      $this->nombre         = $request->getParameter('nombre');
      
      //Reinicio los buscadores
        if($request->getParameter('reboot')){
        $this->getUser()->getAttributeHolder()->remove('empresa_filters');
        }
      
      if($request->getParameter('buscar_empresa')=='Filtrar'){
            
            //Asigna a la variable de sesion, todos los valores del filtro para q se mantenga
            $this->getUser()->setAttribute("empresa_filters", $request->getParameter('empresa_filters'));
            //Empieza la Paginacion en la pagina 1
            $this->getUser()->setAttribute('page_empresa', 1);
            
            $this->getUser()->getAttributeHolder()->remove('tel');
            
        }   
      
        
        
        
    //Crea la consulta del Filtro con los valores de la variable de sesion
    $filtros = $this->getUser()->getAttribute('empresa_filters');
    $this->filtro = $filtros;
    
    $consulta = new Empresa();
    $consulta = $consulta->getEmpresasPager();
     
            //Nombre del empresa
            //if($filtros['nombre'])  $consulta->andWhere('CONCAT(p.nombre,nickname,rif,telefono1,telefono2,contacto_nombre) like "%'.$filtros['nombre'].'%"');
            
      //Hace permanente la pagina en una variable de sesion
      if($request->getParameter('page_empresa')){
          $this->getUser()->setAttribute('page_empresa', $request->getParameter('page_empresa'));
      }
        
      
      
      
      $this->empresas = new sfDoctrinePager('Empresa', sfConfig::get('app_empresa_x_pag'));
      $this->empresas->setQuery($consulta);
      $this->empresas->setPage($this->getUser()->getAttribute('page_empresa'));
      $this->empresas->init();
      
      $this->categorias = $this->getUser()->getAttribute('categorias_empresa');
      $this->marcas = $this->getUser()->getAttribute('sis_marcas');
      
      
      //filtros internos
      //$this->filtro = new EmpresaFormFilter($this->getUser()->getAttribute('empresa_filters'));
      
    
  }

    public function executeEditEmpresa(sfWebRequest $request)
  {
    
      $franquicia = new Empresa();
    $this->franquicias = $franquicia->getEmpresasPager()->execute();
      
    $this->forward404Unless($empresas = Doctrine_Core::getTable('Empresa')->find(array($this->getUser()->getAttribute('agente_user_empresa_id'))), sprintf('Object empresa does not exist (%s).', $request->getParameter('id')));
    $this->form = new EmpresaForm($empresas);
    
    
    
    
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($empresas = Doctrine_Core::getTable('Empresa')->find(array($request->getParameter('id'))), sprintf('Object empresas does not exist (%s).', $request->getParameter('id')));
    $this->form = new EmpresaForm($empresas);

    $this->processForm($request, $this->form);

    $this->setTemplate('editEmpresa');
  }

 

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $empresas = $form->save();
      
              //Datos dinamicos de la tabla empresa 
            $this->getUser()->setAttribute('select_titulo',$empresas->getTitulo());
            $this->getUser()->setAttribute('select_nacionalidad',$empresas->getNacionalidad());
            $this->getUser()->setAttribute('select_edo_civil',$empresas->getEdoCivil());
            $this->getUser()->setAttribute('select_ocupacion',$empresas->getOcupacion());
            $this->getUser()->setAttribute('select_grado_instruccion',$empresas->getGradoInstruccion());
            
      
            
            
      $this->getUser()->setFlash('notice', 'Realizado de forma exitosa la operación'); 
      
      $this->setTemplate('editEmpresa');

    }
  }
  
  

  
  
}
