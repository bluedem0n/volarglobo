<?php

/**
 * Excursion form.
 *
 * @package    hub-usmjesus
 * @subpackage form
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ExcursionForm extends BaseExcursionForm
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

        $this->widgetSchema['nombre'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Nombre de la excursión', 'class' => 'form-control'));
        $this->widgetSchema['imagen'] = new sfWidgetFormInputText(array(), array('class' => 'form-control'));
        $this->widgetSchema['descripcion'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Descripción de la excursión', 'class' => 'form-control'));
        $this->widgetSchema['ubicacion'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Ciudad, Estado, País', 'class' => 'form-control'));
        $this->widgetSchema['fecha'] = new sfWidgetFormInputText(array(), array('placeholder' => 'MM/DD/AAAA', 'class' => 'form-control'));
        $this->widgetSchema['tipo_publico'] = new sfWidgetFormInputText(array(), array('placeholder' => 'Adulto Joven (18+)', 'class' => 'form-control'));
        $this->widgetSchema['capacidad_persona'] = new sfWidgetFormInputText(array(), array('placeholder' => '30', 'class' => 'form-control'));
        
        //------//Formulario de requisitos  
        $requisitos = $this->getObject()->getExcursionHasRequisito();

        //Se verifica si el arreglo tiene algun valor
        if (!count($requisitos)) {
            $requisitos = array();
        }

        //llamada a el listado de valores de politicas
        $requisitosSQ = new ExcursionRequisito();
        $requisitosSQ = $requisitosSQ->getExcursionRequisitos();


        if ($this->isNew()) {// Cuando el formulario es nuevo
            foreach ($requisitosSQ as $requisito) {

                //Se selcciona la tabla Has many to many donde se guardara la informacion
                $requisitoSave = new ExcursionHasRequisito();
                $requisitoSave->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                //Se coloco el nombre del Moledo que se va a ingresar
                $requisitoSave->setExcursion($this->getObject());
                $requisitoSave->setExcursionRequisitoId($requisito->getId());
                //Se anexa el arreglo a el arreglo inicial
                array_push($requisitos, $requisitoSave);
            }
        }// FIN Cuando el formulario es nuevo
        //recorro los valores para ver si falta alguno de los nuevos
        foreach ($requisitos as $requisito)
            ${'requisito' . $requisito->getExcursionRequisitoId()} = $requisito->getExcursionRequisitoId();

        //Creo los formularios embebidos  
        $requisitos_form = new sfForm();
        $count = 0;

        //Recorro nuevamente para definir los valores faltante
        foreach ($requisitosSQ as $requisito) {

            if (${'requisito' . $requisito->getId()} <> $requisito->getId()) {

                $requisitoSave = new ExcursionHasRequisito();
                $requisitoSave->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                $requisitoSave->setExcursion($this->getObject());
                $requisitoSave->setExcursionRequisitoId($requisito->getId());
                $requisitoSave->save();

                $requisitoSave_form = new ExcursionHasRequisitoForm($requisitoSave);
                $requisitos_form->embedForm($count, $requisitoSave_form);
                $count++;
            }
        }


        //Finalizacion de la activacion de los formularios
        foreach ($requisitos as $requisito) {

            if ($requisito->getEmpresaId() == sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')) {

                $requisito_form = new ExcursionHasRequisitoForm($requisito);
                $requisitos_form->embedForm($count, $requisito_form);
                $count++;
            }
        }

        $this->embedForm('requisitos', $requisitos_form);
//------//FIN - Formulario de requisitos
        
        //------//Formulario de politicas  
        $politicas = $this->getObject()->getExcursionHasPolitica();

        //Se verifica si el arreglo tiene algun valor
        if (!count($politicas)) {
            $politicas = array();
        }

        //llamada a el listado de valores de politicas
        $politicasSQ = new ExcursionPolitica();
        $politicasSQ = $politicasSQ->getExcursionPoliticas();


        if ($this->isNew()) {// Cuando el formulario es nuevo
            foreach ($politicasSQ as $politica) {

                //Se selcciona la tabla Has many to many donde se guardara la informacion
                $politicaSave = new ExcursionHasPolitica();
                $politicaSave->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                //Se coloco el nombre del Moledo que se va a ingresar
                $politicaSave->setExcursion($this->getObject());
                $politicaSave->setExcursionPoliticaId($politica->getId());
                //Se anexa el arreglo a el arreglo inicial
                array_push($politicas, $politicaSave);
            }
        }// FIN Cuando el formulario es nuevo
        //recorro los valores para ver si falta alguno de los nuevos
        foreach ($politicas as $politica)
            ${'politica' . $politica->getExcursionPoliticaId()} = $politica->getExcursionPoliticaId();

        //Creo los formularios embebidos  
        $politicas_form = new sfForm();
        $count = 0;

        //Recorro nuevamente para definir los valores faltante
        foreach ($politicasSQ as $politica) {

            if (${'politica' . $politica->getId()} <> $politica->getId()) {

                $politicaSave = new ExcursionHasPolitica();
                $politicaSave->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                $politicaSave->setExcursion($this->getObject());
                $politicaSave->setExcursionPoliticaId($politica->getId());
                $politicaSave->save();

                $politicaSave_form = new ExcursionHasPoliticaForm($politicaSave);
                $politicas_form->embedForm($count, $politicaSave_form);
                $count++;
            }
        }


        //Finalizacion de la activacion de los formularios
        foreach ($politicas as $politica) {

            if ($politica->getEmpresaId() == sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')) {

                $politica_form = new ExcursionHasPoliticaForm($politica);
                $politicas_form->embedForm($count, $politica_form);
                $count++;
            }
        }

        $this->embedForm('politicas', $politicas_form);
//------//FIN - Formulario de politicas
        
        //------//Formulario de adicionales  
        $adicionales = $this->getObject()->getExcursionHasAdicional();

        //Se verifica si el arreglo tiene algun valor
        if (!count($adicionales)) {
            $adicionales = array();
        }

        //llamada a el listado de valores de adicionales
        $adicionalesSQ = new ExcursionAdicional();
        $adicionalesSQ = $adicionalesSQ->getExcursionAdicionales();


        if ($this->isNew()) {// Cuando el formulario es nuevo
            foreach ($adicionalesSQ as $adicional) {

                //Se selcciona la tabla Has many to many donde se guardara la informacion
                $adicionalSave = new ExcursionHasAdicional();
                $adicionalSave->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                //Se coloco el nombre del Moledo que se va a ingresar
                $adicionalSave->setExcursion($this->getObject());
                $adicionalSave->setExcursionAdicionalId($adicional->getId());
                //Se anexa el arreglo a el arreglo inicial
                array_push($adicionales, $adicionalSave);
            }
        }// FIN Cuando el formulario es nuevo
        //recorro los valores para ver si falta alguno de los nuevos
        foreach ($adicionales as $adicional)
            ${'adicional' . $adicional->getExcursionAdicionalId()} = $adicional->getExcursionAdicionalId();

        //Creo los formularios embebidos  
        $adicionales_form = new sfForm();
        $count = 0;

        //Recorro nuevamente para definir los valores faltante
        foreach ($adicionalesSQ as $adicional) {

            if (${'adicional' . $adicional->getId()} <> $adicional->getId()) {

                $adicionalSave = new ExcursionHasAdicional();
                $adicionalSave->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                $adicionalSave->setExcursion($this->getObject());
                $adicionalSave->setExcursionAdicionalId($adicional->getId());
                $adicionalSave->save();

                $adicionalSave_form = new ExcursionHasAdicionalForm($adicionalSave);
                $adicionales_form->embedForm($count, $adicionalSave_form);
                $count++;
            }
        }


        //Finalizacion de la activacion de los formularios
        foreach ($adicionales as $adicional) {

            if ($adicional->getEmpresaId() == sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')) {

                $adicional_form = new ExcursionHasAdicionalForm($adicional);
                $adicionales_form->embedForm($count, $adicional_form);
                $count++;
            }
        }

        $this->embedForm('adicionales', $adicionales_form);
//------//FIN - Formulario de adicionales
        
        //------//Formulario de lugar_intereses  
        $lugar_intereses = $this->getObject()->getExcursionHasLugarInteres();

        //Se verifica si el arreglo tiene algun valor
        if (!count($lugar_intereses)) {
            $lugar_intereses = array();
        }

        //llamada a el listado de valores de lugar_intereses
        $lugar_interesesSQ = new ExcursionLugarInteres();
        $lugar_interesesSQ = $lugar_interesesSQ->getExcursionLugarIntereses();


        if ($this->isNew()) {// Cuando el formulario es nuevo
            foreach ($lugar_interesesSQ as $lugar_interes) {

                //Se selcciona la tabla Has many to many donde se guardara la informacion
                $lugar_interesSave = new ExcursionHasLugarInteres();
                $lugar_interesSave->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                //Se coloco el nombre del Moledo que se va a ingresar
                $lugar_interesSave->setExcursion($this->getObject());
                $lugar_interesSave->setExcursionLugarInteresId($lugar_interes->getId());
                //Se anexa el arreglo a el arreglo inicial
                array_push($lugar_intereses, $lugar_interesSave);
            }
        }// FIN Cuando el formulario es nuevo
        //recorro los valores para ver si falta alguno de los nuevos
        foreach ($lugar_intereses as $lugar_interes)
            ${'lugar_interes' . $lugar_interes->getExcursionLugarInteresId()} = $lugar_interes->getExcursionLugarInteresId();

        //Creo los formularios embebidos  
        $lugar_intereses_form = new sfForm();
        $count = 0;

        //Recorro nuevamente para definir los valores faltante
        foreach ($lugar_interesesSQ as $lugar_interes) {

            if (${'lugar_interes' . $lugar_interes->getId()} <> $lugar_interes->getId()) {

                $lugar_interesSave = new ExcursionHasLugarInteres();
                $lugar_interesSave->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                $lugar_interesSave->setExcursion($this->getObject());
                $lugar_interesSave->setExcursionLugarInteresId($lugar_interes->getId());
                $lugar_interesSave->save();

                $lugar_interesSave_form = new ExcursionHasLugarInteresForm($lugar_interesSave);
                $lugar_intereses_form->embedForm($count, $lugar_interesSave_form);
                $count++;
            }
        }


        //Finalizacion de la activacion de los formularios
        foreach ($lugar_intereses as $lugar_interes) {

            if ($lugar_interes->getEmpresaId() == sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')) {

                $lugar_interes_form = new ExcursionHasLugarInteresForm($lugar_interes);
                $lugar_intereses_form->embedForm($count, $lugar_interes_form);
                $count++;
            }
        }

        $this->embedForm('lugar_intereses', $lugar_intereses_form);
//------//FIN - Formulario de lugar_intereses
        
        //------//Formulario de inclusiones  
        $inclusiones = $this->getObject()->getExcursionHasInclusion();

        //Se verifica si el arreglo tiene algun valor
        if (!count($inclusiones)) {
            $inclusiones = array();
        }

        //llamada a el listado de valores de inclusiones
        $inclusionesSQ = new ExcursionInclusion();
        $inclusionesSQ = $inclusionesSQ->getExcursionInclusiones();


        if ($this->isNew()) {// Cuando el formulario es nuevo
            foreach ($inclusionesSQ as $inclusion) {

                //Se selcciona la tabla Has many to many donde se guardara la informacion
                $inclusionSave = new ExcursionHasInclusion();
                $inclusionSave->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                //Se coloco el nombre del Moledo que se va a ingresar
                $inclusionSave->setExcursion($this->getObject());
                $inclusionSave->setExcursionInclusionId($inclusion->getId());
                //Se anexa el arreglo a el arreglo inicial
                array_push($inclusiones, $inclusionSave);
            }
        }// FIN Cuando el formulario es nuevo
        //recorro los valores para ver si falta alguno de los nuevos
        foreach ($inclusiones as $inclusion)
            ${'inclusion' . $inclusion->getExcursionInclusionId()} = $inclusion->getExcursionInclusionId();

        //Creo los formularios embebidos  
        $inclusiones_form = new sfForm();
        $count = 0;

        //Recorro nuevamente para definir los valores faltante
        foreach ($inclusionesSQ as $inclusion) {

            if (${'inclusion' . $inclusion->getId()} <> $inclusion->getId()) {

                $inclusionSave = new ExcursionHasInclusion();
                $inclusionSave->setEmpresaId(sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id'));
                $inclusionSave->setExcursion($this->getObject());
                $inclusionSave->setExcursionInclusionId($inclusion->getId());
                $inclusionSave->save();

                $inclusionSave_form = new ExcursionHasInclusionForm($inclusionSave);
                $inclusiones_form->embedForm($count, $inclusionSave_form);
                $count++;
            }
        }


        //Finalizacion de la activacion de los formularios
        foreach ($inclusiones as $inclusion) {

            if ($inclusion->getEmpresaId() == sfContext::getInstance()->getUser()->getAttribute('agente_user_empresa_id')) {

                $inclusion_form = new ExcursionHasInclusionForm($inclusion);
                $inclusiones_form->embedForm($count, $inclusion_form);
                $count++;
            }
        }

        $this->embedForm('inclusiones', $inclusiones_form);
//------//FIN - Formulario de inclusiones
    }
}
