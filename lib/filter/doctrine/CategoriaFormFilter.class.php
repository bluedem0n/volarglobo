<?php

/**
 * Categoria filter form.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CategoriaFormFilter extends BaseCategoriaFormFilter
{
  public function configure()
  {
      //Eliminar los campos del formularios  created_at y updated_at
      unset (
        $this['created_at'],
        $this['updated_at'],
        $this['padre'],      
        $this['orden'],
        $this['imagen'],
        $this['slug'],
        $this['llamada_programada_list'],
        $this['producto_list']
      );

     // $this->setWidgetSchema(new CategoriaTranslationForm($this->getWidgetSchema()));
        $this->widgetSchema['camioneta_list']->setLabel('Unidades');
      //Cambiar a lista y su validador de los status Activo e Inativo 0/1
      $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
         'choices' => Categoria::$status,
         'expanded' => false,
         'multiple' => false,

      ));

      $this->validatorSchema['status'] = new sfValidatorChoice(array(
          'choices' => array_keys(Categoria::$status),

      ));

//      //Cambiar a lista de padres
//      $this->widgetSchema['padre'] = new sfWidgetFormDoctrineChoice(array(
//          'model' => 'Categoria',
//          'add_empty' => 'Principal',
//          'method' => 'getNombre',
//          //'order_by' => array('nombre', 'asc'),
//          'expanded' => false,
//          'multiple' => false,
//      ));

  }
  
  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'tipo_id'                 => 'ForeignKey',
      'padre'                   => 'Number',
      'orden'                   => 'Number',
      'mancheta'                => 'Text',
      'imagen'                  => 'Text',
      'status'                  => 'ForeignKey',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
      'producto_list'           => 'ManyKey',
      'llamada_programada_list' => 'ManyKey',
    );
  }
  
}
