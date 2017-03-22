<?php

/**
 * Project form base class.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormBaseTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class BaseFormDoctrine extends sfFormDoctrine
{
  public function setup()
  {
      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
  }
}
