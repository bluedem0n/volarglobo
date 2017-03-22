<?php

/**
 * Seguro form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SeguroForm extends BaseSeguroForm
{
  public function configure()
  {
      //Eliminar los campos del formularios  created_at y updated_at
        unset(
                $this['created_at'], $this['updated_at'], $this['expires_at']
        );

        $this->widgetSchema['empresa_id'] = new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')));
        $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser()->getAttribute('agente_user')));
        $this->widgetSchema['user_name'] = new sfWidgetFormInputHidden(array(), array('value' => sfContext::getInstance()->getUser()->getAttribute('agente_user_nombre')));

        $seguro_tipo = new SeguroTipo();
        $this->widgetSchema['seguro_tipo_id'] = new sfWidgetFormDoctrineChoice(array(
            'model' => 'SeguroTipo',
            'key_method' => 'getId',
            'query' => $seguro_tipo->getSeguroTipoSelectFront(),
                ), array('class' => 'form-control'));
        
        $seguro_plan = new SeguroPlan();
        $this->widgetSchema['seguro_plan_id'] = new sfWidgetFormDoctrineChoice(array(
            'model' => 'SeguroPlan',
            'key_method' => 'getId',
            'query' => $seguro_plan->getSeguroPlanSelectFront(),
                ), array('class' => 'form-control'));
        
        $this->widgetSchema['nombre'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Nombre del seguro', 'class' => 'form-control'));
        $this->widgetSchema['dia'] = new sfWidgetFormInputText(array(), array('placeholder' => '7', 'class' => 'form-control'));
        $this->widgetSchema['descripcion'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Descripción del seguro', 'class' => 'form-control'));
    
        //------//Formulario de beneficios  
        $beneficios = $this->getObject()->getSeguroHasBeneficio();

        //Se verifica si el arreglo tiene algun valor
        if (!count($beneficios)) {
            $beneficios = array();
        }

        //llamada a el listado de valores de politicas
        $beneficiosSQ = new SeguroBeneficio();
        $beneficiosSQ = $beneficiosSQ->getSeguroBeneficios();


        if ($this->isNew()) {// Cuando el formulario es nuevo
            foreach ($beneficiosSQ as $beneficio) {

                //Se selcciona la tabla Has many to many donde se guardara la informacion
                $beneficioSave = new SeguroHasBeneficio();
                $beneficioSave->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                //Se coloco el nombre del Moledo que se va a ingresar
                $beneficioSave->setSeguro($this->getObject());
                $beneficioSave->setSeguroBeneficioId($beneficio->getId());
                //Se anexa el arreglo a el arreglo inicial
                array_push($beneficios, $beneficioSave);
            }
        }// FIN Cuando el formulario es nuevo
        //recorro los valores para ver si falta alguno de los nuevos
        foreach ($beneficios as $beneficio)
            ${'beneficio' . $beneficio->getSeguroBeneficioId()} = $beneficio->getSeguroBeneficioId();

        //Creo los formularios embebidos  
        $beneficios_form = new sfForm();
        $count = 0;

        //Recorro nuevamente para definir los valores faltante
        foreach ($beneficiosSQ as $beneficio) {

            if (${'beneficio' . $beneficio->getId()} <> $beneficio->getId()) {

                $beneficioSave = new SeguroHasBeneficio();
                $beneficioSave->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                $beneficioSave->setSeguro($this->getObject());
                $beneficioSave->setSeguroBeneficioId($beneficio->getId());
                $beneficioSave->save();

                $beneficioSave_form = new SeguroHasBeneficioForm($beneficioSave);
                $beneficios_form->embedForm($count, $beneficioSave_form);
                $count++;
            }
        }


        //Finalizacion de la activacion de los formularios
        foreach ($beneficios as $beneficio) {

            if ($beneficio->getEmpresaId() == sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')) {

                $beneficio_form = new SeguroHasBeneficioForm($beneficio);
                $beneficios_form->embedForm($count, $beneficio_form);
                $count++;
            }
        }

        $this->embedForm('beneficios', $beneficios_form);




//------//FIN - Formulario de beneficios 
    }
}
