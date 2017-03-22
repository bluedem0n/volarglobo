<?php

/**
 * colonia actions.
 *
 * @package    hub-usmjesus
 * @subpackage colonia
 * @author     Jesus Salazar & VKLD - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class corregimientoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      
      
      //Reinicio los buscadores
        if($request->getParameter('reboot')){
        $this->getUser()->getAttributeHolder()->remove('parroquia_filters');
        }
      
      if($request->getParameter('buscar_parroquia')=='Filtrar'){
            
            //Asigna a la variable de sesion, todos los valores del filtro para q se mantenga
            $this->getUser()->setAttribute("parroquia_filters", $request->getParameter('parroquia_filters'));
            //Empieza la Paginacion en la pagina 1
            $this->getUser()->setAttribute('page_corregimiento', 1);
            
            
        }   
      
        
        
        
    //Crea la consulta del Filtro con los valores de la variable de sesion
    $filtros = $this->getUser()->getAttribute('parroquia_filters');
    $this->filtro = $filtros;
    
    $consulta = new Parroquia();
    $consulta = $consulta->getParroquiasPager();
     
            //Nombre del parroquia
            if($filtros['nombre'])  $consulta->andWhere('p.nombre like "%'.$filtros['nombre'].'%"');
            
      //Hace permanente la pagina en una variable de sesion
      if($request->getParameter('page_corregimiento')){
          $this->getUser()->setAttribute('page_corregimiento', $request->getParameter('page_corregimiento'));
      }
        
      
      
      
      $this->parroquias = new sfDoctrinePager('Parroquia', sfConfig::get('app_proveedor_x_pag'));
      $this->parroquias->setQuery($consulta);
      $this->parroquias->setPage($this->getUser()->getAttribute('page_corregimiento'));
      $this->parroquias->init();
      
            //Activacion de los valores que se ingresaran en el PDf y Mail
      
      
        // Set some content to print
        $html = '';
        $html .= '<table class="table table-striped" border="1" id="tableId">'
                . '<thead>';
        $html .= '<tr>';
        $html .= '  <th><span>ID </span></th>
                    <th><span>Provincia</span></th>
                    <th><span>provincia</span></th>
                    <th><span>distrito</span></th>
                    <th><span>corregimiento</span></th>';

        $html .= '</tr>'
                . '</thead>'
                . '<tbody>';
        foreach ($this->parroquias as $dato){ 
          $html .= '<tr>';
                      $html .= '<td><span>'.$dato->getId().'</span></td>
                                <td><span>'.$dato->getCiudad()->getProvincia().'</span></td>
                                <td><span>'.$dato->getCiudad().'</span></td>
                                <td><span>'.$dato->getMunicipio().'</span></td>
                                <td><span>'.$dato->getNombre().'</span></td>';
          $html .= '</tr>';
       }
        $html .= '<tbody>'
              . '</table>';
      
      
      
      $this->getUser()->setAttribute("export", $html);
        
  }

  public function executeNew(sfWebRequest $request)
  {
       //Recibe la variable IdUser para poder asociarlo al usuario
     
         //Armado del Objeto Mensaje Alerta
         $parroquia = new Parroquia();
         //Arma Formulario Mensaje Alerta para el usuario en cuestion
         $this->form = new ParroquiaForm($parroquia);
         

    
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ParroquiaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($parroquia = Doctrine_Core::getTable('Parroquia')->find(array($request->getParameter('id'))), sprintf('Object parroquia does not exist (%s).', $request->getParameter('id')));
    $this->form = new ParroquiaForm($parroquia);
    
         
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($parroquia = Doctrine_Core::getTable('Parroquia')->find(array($request->getParameter('id'))), sprintf('Object parroquia does not exist (%s).', $request->getParameter('id')));
    

    $this->form = new ParroquiaForm($parroquia);
    $this->processForm($request, $this->form);

        $this->setTemplate('edit');
    
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($parroquia = Doctrine_Core::getTable('Parroquia')->find(array($request->getParameter('id'))), sprintf('Object parroquia does not exist (%s).', $request->getParameter('id')));
    
    try {
           $parroquia->delete();
           $this->getUser()->setFlash('eliminar', 'El Item fué removido exitosamente.'); 
           
          
      } catch (Doctrine_Exception $e) {
          $this->getUser()->setFlash('noeliminar', 'No se puedo eliminar el item, existen referencias a esta entrada.'); 
          
      }
      $this->redirect('parroquia/index');
      
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $parroquia = $form->save();
      
      $this->getUser()->setFlash('notice', 'Realizado de forma exitosa la operación'); 
      
      $this->setTemplate('edit');

    }
  }
}
