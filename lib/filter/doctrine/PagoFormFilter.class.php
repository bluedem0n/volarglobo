<?php

/**
 * Pago filter form.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PagoFormFilter extends BasePagoFormFilter
{
  public function configure()
  {
//       //Personalizado el calendario en los filtros y toda la funcion esta en la Clase Calendario
//        $cal = new Calendario();
//        $this->widgetSchema['created_at'] = new sfWidgetFormFilterDate(array(
//                'from_date' => new sfWidgetFormJQueryDate($cal->getCalendario()),
//                 'to_date' =>new sfWidgetFormJQueryDate($cal->getCalendario()),
//                 'with_empty' => false    ));
//
//
//      $this->widgetSchema['updated_at'] = new sfWidgetFormFilterDate(array(
//                'from_date' => new sfWidgetFormJQueryDate($cal->getCalendario()),
//                 'to_date' =>new sfWidgetFormJQueryDate($cal->getCalendario()),
//                 'with_empty' => false    ));
//
//      $this->widgetSchema['empresa_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
//      $this->widgetSchema['empresa_list']->setLabel('Listar Empresa');
      //Eliminar los campos del formularios  created_at y updated_at
      unset (
        $this['created_at'],
        $this['updated_at'],
        $this['orden'],
        $this['descripcion'],
        $this['imagen'],
        $this['empresa_list']

      );

      //Cambiar a lista y su validador de los status Activo e Inativo 0/1
      $this->widgetSchema['status'] = new sfWidgetFormChoice(array(
         'choices' => Pago::$status,
         'expanded' => false,
         'multiple' => false,

      ));

      $this->validatorSchema['status'] = new sfValidatorChoice(array(
          'choices' => array_keys(Pago::$status),

      ));
  }
  
  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'nombre'       => 'Text',
      'descripcion'  => 'Text',
      'orden'        => 'Text',
      'imagen'       => 'Text',
      'status'       => 'ForeignKey',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
      'empresa_list' => 'ManyKey',
    );
  }
}
