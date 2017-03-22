<?php

/**
 * dashboard actions.
 *
 * @package    hub-usmjesus
 * @subpackage dashboard
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dashboardActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {

   

      
         
     if ($this->getUser()->isFirstRequest()){
         
        $this->getUser()->isFirstRequest(false);
        $this->agente_id = $this->getUser()->getAttribute('agente_user');
        $date= new DateTime($this->getUser()->getAttribute('agente_user_fecha_ultima'));
        $this->getUser()->setAttribute('page', 1);
        $this->getUser()->setAttribute('page_producto', 1);
        
        
        
      }else {
          
          
        $this->agente_id = $this->getUser()->getAttribute('agente_user');
        $date= new DateTime($this->getUser()->getAttribute('agente_user_fecha_ultima'));
        
        
      }
      
      
      
      
      $this->fechas = new Empresa();
         
      
      
  }
  

  
    
}
