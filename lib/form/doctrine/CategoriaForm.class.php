<?php

/**
 * Categoria form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CategoriaForm extends BaseCategoriaForm
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
      $this->widgetSchema['tipo_id'] = new sfWidgetFormInputHidden(array(),array('value'=> 1));
      $this->widgetSchema['nombre'] = new sfWidgetFormInputText(array(),array('placeholder'=>'Nombre de la categoria','class' => 'form-control'));
      $this->widgetSchema['descripcion_breve'] = new sfWidgetFormTextarea(array(),array('placeholder'=>'Descripción breve de la categoria','class' => 'form-control'));
      
      $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user')));
      $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(),array('value'=> sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));


        //Cambiar a lista y su validador de los status Activo e Inativo 0/1
      $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
         'choices' => Categoria::$status,
         'expanded' => false,
         'multiple' => false

      ),array('class' => 'form-control'));
      
      
     

      
      $categoria = new Categoria();
      $this->widgetSchema['padre'] = new sfWidgetFormDoctrineChoice(array(
                      'model'     => 'Categoria',
                      'key_method'=>'getId',
                      'add_empty'   => 'Principal',
                      'query'    => $categoria->getCategoriaSelect()
            ),array('class' => 'form-control'));
      
      
      
      
      
  }
}
