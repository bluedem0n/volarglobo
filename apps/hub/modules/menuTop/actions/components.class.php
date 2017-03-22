<?php

/**
 * componentes actions.
 *
 * @package    hub-usmjesus
 * @subpackage componentes
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class menuTopComponents extends sfComponents
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeMenu(sfWebRequest $request)
  {
    
    $this->permisos = $this->getUser()->getGuardUser()->getPermissions();
    $this->empresa_id = $this->getUser()->getAttribute('agente_user_empresa_id');
    
    $this->agente_user_fecha_ultima = $this->getUser()->getAttribute('agente_user_fecha_ultima');
    $this->agente_user_nombre = $this->getUser()->getAttribute('agente_user_nombre');
    $this->empresa_nombre = $this->getUser()->getAttribute('agente_user_empresa');
    
    $this->usuario_id = $this->getUser()->getAttribute('agente_user');
    
    $this->padre = $this->getUser()->getAttribute('agente_user_empresa_padre');
    
    
    $this->fechas = new Empresa();
    
    
  }

}
