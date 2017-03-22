<?php

/**
 * Empresa filter form.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EmpresaFormFilter extends BaseEmpresaFormFilter
{
  public function configure()
  {
      
      $this->widgetSchema['nombre'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Buscar empresa','class' => 'form-control input-sm pull-right', 'style'=>'width: 150px;margin-right: 10px;'));
      
  }
}
