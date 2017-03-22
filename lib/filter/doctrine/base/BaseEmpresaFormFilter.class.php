<?php

/**
 * Empresa filter form base class.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEmpresaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'rif'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dni'               => new sfWidgetFormFilterInput(),
      'nombre'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nickname'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'direccion_fiscal'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono1'         => new sfWidgetFormFilterInput(),
      'telefono2'         => new sfWidgetFormFilterInput(),
      'email'             => new sfWidgetFormFilterInput(),
      'contacto_nombre'   => new sfWidgetFormFilterInput(),
      'contacto_puesto'   => new sfWidgetFormFilterInput(),
      'contacto_telefono' => new sfWidgetFormFilterInput(),
      'status'            => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'idioma_id'         => new sfWidgetFormFilterInput(),
      'sitio_web'         => new sfWidgetFormFilterInput(),
      'observacion'       => new sfWidgetFormFilterInput(),
      'politicas'         => new sfWidgetFormFilterInput(),
      'privacidad'        => new sfWidgetFormFilterInput(),
      'faq_titulo'        => new sfWidgetFormFilterInput(),
      'faq_contenido'     => new sfWidgetFormFilterInput(),
      'quienes_titulo'    => new sfWidgetFormFilterInput(),
      'quienes_contenido' => new sfWidgetFormFilterInput(),
      'quienes_imagen'    => new sfWidgetFormFilterInput(),
      'user_id'           => new sfWidgetFormFilterInput(),
      'user_name'         => new sfWidgetFormFilterInput(),
      'titulo'            => new sfWidgetFormFilterInput(),
      'nacionalidad'      => new sfWidgetFormFilterInput(),
      'edo_civil'         => new sfWidgetFormFilterInput(),
      'ocupacion'         => new sfWidgetFormFilterInput(),
      'grado_instruccion' => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'rif'               => new sfValidatorPass(array('required' => false)),
      'dni'               => new sfValidatorPass(array('required' => false)),
      'nombre'            => new sfValidatorPass(array('required' => false)),
      'nickname'          => new sfValidatorPass(array('required' => false)),
      'direccion_fiscal'  => new sfValidatorPass(array('required' => false)),
      'telefono1'         => new sfValidatorPass(array('required' => false)),
      'telefono2'         => new sfValidatorPass(array('required' => false)),
      'email'             => new sfValidatorPass(array('required' => false)),
      'contacto_nombre'   => new sfValidatorPass(array('required' => false)),
      'contacto_puesto'   => new sfValidatorPass(array('required' => false)),
      'contacto_telefono' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'status'            => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'idioma_id'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sitio_web'         => new sfValidatorPass(array('required' => false)),
      'observacion'       => new sfValidatorPass(array('required' => false)),
      'politicas'         => new sfValidatorPass(array('required' => false)),
      'privacidad'        => new sfValidatorPass(array('required' => false)),
      'faq_titulo'        => new sfValidatorPass(array('required' => false)),
      'faq_contenido'     => new sfValidatorPass(array('required' => false)),
      'quienes_titulo'    => new sfValidatorPass(array('required' => false)),
      'quienes_contenido' => new sfValidatorPass(array('required' => false)),
      'quienes_imagen'    => new sfValidatorPass(array('required' => false)),
      'user_id'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'user_name'         => new sfValidatorPass(array('required' => false)),
      'titulo'            => new sfValidatorPass(array('required' => false)),
      'nacionalidad'      => new sfValidatorPass(array('required' => false)),
      'edo_civil'         => new sfValidatorPass(array('required' => false)),
      'ocupacion'         => new sfValidatorPass(array('required' => false)),
      'grado_instruccion' => new sfValidatorPass(array('required' => false)),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('empresa_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Empresa';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'rif'               => 'Text',
      'dni'               => 'Text',
      'nombre'            => 'Text',
      'nickname'          => 'Text',
      'direccion_fiscal'  => 'Text',
      'telefono1'         => 'Text',
      'telefono2'         => 'Text',
      'email'             => 'Text',
      'contacto_nombre'   => 'Text',
      'contacto_puesto'   => 'Text',
      'contacto_telefono' => 'Number',
      'status'            => 'Number',
      'idioma_id'         => 'Number',
      'sitio_web'         => 'Text',
      'observacion'       => 'Text',
      'politicas'         => 'Text',
      'privacidad'        => 'Text',
      'faq_titulo'        => 'Text',
      'faq_contenido'     => 'Text',
      'quienes_titulo'    => 'Text',
      'quienes_contenido' => 'Text',
      'quienes_imagen'    => 'Text',
      'user_id'           => 'Number',
      'user_name'         => 'Text',
      'titulo'            => 'Text',
      'nacionalidad'      => 'Text',
      'edo_civil'         => 'Text',
      'ocupacion'         => 'Text',
      'grado_instruccion' => 'Text',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
