<?php

/**
 * DetalleFaq form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DetalleFaqForm extends BaseDetalleFaqForm
{
  public function configure()
  {
      
       //Eliminar los campos del formularios  created_at y updated_at
      unset (
        $this['created_at'],
        $this['updated_at'],
        $this['orden'],
        $this['slug']
      );

      $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
      $this->widgetSchema['pregunta'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Pregunta a desarrollar','class' => 'form-control'));
      $this->widgetSchema['respuesta'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Respuesta en función de la pregunta','class' => 'form-control'));
      
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
      $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));

      $categoria_faq = new CategoriaFaq();
      $this->widgetSchema['categoria_faq_id'] = new sfWidgetFormDoctrineChoice(array(
                      'model'     => 'CategoriaFaq',
                      'key_method'=>'getId',
                      'add_empty'   => 'Seleccione categoría',
                      'query'    => $categoria_faq->getCategoriaFaqsSelect()
            ),array('class' => 'form-control'));
      
      
      
      
      
      
  }
}
