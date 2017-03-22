<?php

/**
 * ExcursionLugarInteres form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ExcursionLugarInteresForm extends BaseExcursionLugarInteresForm
{
  public function configure()
  {
      
                          //Eliminar los campos del formularios  created_at y updated_at
        unset(
                $this['created_at'], $this['updated_at']
        );

        $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser()->getAttribute('agente_user')));
        $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));


        $this->widgetSchema['nombre'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Nombre del lugar de interés', 'class' => 'form-control'));
        $this->widgetSchema['imagen'] = new sfWidgetFormInputText(array(), array('class' => 'form-control'));

        $this->widgetSchema['descripcion'] = new sfWidgetFormTextarea(array(), array('placeholder' => 'Descripción breve', 'class' => 'form-control textarea'));
        //Cambiar a lista y su validador de los status Activo e Inativo 0/1
        $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
            'choices' => Categoria::$status,
            'expanded' => false,
            'multiple' => false
                ), array('class' => 'form-control'));
    }
}
