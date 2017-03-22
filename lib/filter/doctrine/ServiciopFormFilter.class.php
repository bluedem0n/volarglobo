<?php

/**
 * Servicio filter form.
 *
 * @package    hub-usmjesus
 * @subpackage filter
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ServiciopFormFilter extends BaseProductoFormFilter
{
  public function configure()
  {
      unset(
            
            $this['created_at'],
            $this['updated_at'],
            $this['expires_at'],
            $this['empresa_id'],
            $this['orden'],
            $this['visita'],
            $this['marca_id'],  
            $this['mancheta'],
                $this['contenido'],
                $this['slug'],
                //$this['categoria_list'],
                $this['producto_list'],
                $this['producto_status_list']
              
              );
              
      //Personalizado el calendario en los filtros y toda la funcion esta en la Clase Calendario
  /*      $cal = new Calendario();
        $this->widgetSchema['created_at'] = new sfWidgetFormFilterDate(array(
                'from_date' => new sfWidgetFormJQueryDate($cal->getCalendario()),
                 'to_date' =>new sfWidgetFormJQueryDate($cal->getCalendario()),
                 'with_empty' => false    ));


      $this->widgetSchema['updated_at'] = new sfWidgetFormFilterDate(array(
                'from_date' => new sfWidgetFormJQueryDate($cal->getCalendario()),
                 'to_date' =>new sfWidgetFormJQueryDate($cal->getCalendario()),
                 'with_empty' => false    ));

      $this->widgetSchema['expires_at'] = new sfWidgetFormFilterDate(array(
                'from_date' => new sfWidgetFormJQueryDate($cal->getCalendario()),
                 'to_date' =>new sfWidgetFormJQueryDate($cal->getCalendario()),
                 'with_empty' => false    ));

      $this->widgetSchema['producto_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
      $this->widgetSchema['producto_list']->setLabel('Lista de Productos');
      */
//      $this->widgetSchema['categoria_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
//      $this->widgetSchema['categoria_list']->setLabel('Lista de Categorias');
      /*
      $this->widgetSchema['producto_status_list']->setOption('renderer_class', 'sfWidgetFormSelectDoubleList');
      $this->widgetSchema['producto_status_list']->setLabel('Lista de Categorias');
*/
      $categoria = new Categoria();
      $this->setWidget('negocio_list', new sfWidgetFormDoctrineChoice(array(
                      'model'     => 'Categoria',
                      'key_method'=>'getId',
                      'query'    => $categoria->getCategoriaPadre(),
                      'add_empty' => 'Tipo de Negocio',
            )));
      $this->widgetSchema['negocio_list']->setLabel('Negocio:');
      //$this->setValidator('negocio_list',new sfValidatorDoctrineChoice(array('multiple' => false, 'model' => 'Categoria', 'required' => false)));
     $this->validatorSchema['negocio_list'] = new sfValidatorPass();
      
      $this->widgetSchema['categoria_list'] = new sfWidgetFormDoctrineDependentSelect(array(
                          'model'     => 'Categoria',
                          'depends'   => 'negocio_list',
                          'table_method'    => getCategoriaPadreServicio,
                          'ajax'      => true, 
                          'ref_method'=> 'getId',
                          'add_empty' => 'Seleccione la Categoria',

            ));
      $this->widgetSchema['categoria_list']->setLabel('Lista de Categoria'); 
      $this->widgetSchema->setNameFormat('servicio_filters[%s]');
      
  }
}
