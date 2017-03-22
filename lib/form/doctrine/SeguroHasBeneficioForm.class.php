<?php

/**
 * SeguroHasBeneficio form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SeguroHasBeneficioForm extends BaseSeguroHasBeneficioForm
{
  public function configure()
  {
      
      unset(
                $this['created_at'], $this['updated_at'], $this['seguro_id']
        );

        $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser()->getAttribute('agente_user')));
        $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));

        $this->widgetSchema['seguro_beneficio_id'] = new sfWidgetFormInputHidden();


        //Cambiar a lista y su validador de los status Activo e Inativo 0/1
        $this->widgetSchema['valor'] = new sfWidgetFormChoice(array(
            'choices' => Categoria::$status,
            'expanded' => false,
            'multiple' => false
                ), array('class' => 'form-control'));
    }
}
