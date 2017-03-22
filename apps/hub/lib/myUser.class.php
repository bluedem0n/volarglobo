<?php

class myUser extends sfGuardSecurityUser
{
    public function isFirstRequest($boolean = null)
    {
        if (is_null($boolean)){
            
            
            
            
            $this->setAttribute('agente_user', $this->getGuardUser()->getId());
            $this->setAttribute('agente_user_nombre', $this->getGuardUser()->getLastName().' '.$this->getGuardUser()->getFirstName());
            $this->setAttribute('agente_alertas', $this->getGuardUser()->getAlerta());
            $this->setAttribute('agente_user_fecha_ultima',$this->getGuardUser()->getLastLogin());
            $this->setAttribute('agente_user_empresa_id',$this->getGuardUser()->getEmpresaId());
            $this->setAttribute('agente_user_empresa',$this->getGuardUser()->getEmpresa());
            
            //Datos dinamicos de la tabla empresa 
            $this->setAttribute('select_titulo',$this->getGuardUser()->getEmpresa()->getTitulo());
            $this->setAttribute('select_nacionalidad',$this->getGuardUser()->getEmpresa()->getNacionalidad());
            $this->setAttribute('select_edo_civil',$this->getGuardUser()->getEmpresa()->getEdoCivil());
            $this->setAttribute('select_ocupacion',$this->getGuardUser()->getEmpresa()->getOcupacion());
            $this->setAttribute('select_grado_instruccion',$this->getGuardUser()->getEmpresa()->getGradoInstruccion());
           
           $rede = new Rede();
           $redes = $rede->getRedesSelect()->execute();
           foreach ($redes as $red){
               $this->setAttribute('red'.$red->getId(),$red->getNombre());
               $this->setAttribute('red_imagen'.$red->getId(),$red->getLogo());
           }
           
           $pago = new Pago();
           $pagos = $pago->getPagosSelect()->execute();
           foreach ($pagos as $pago){
               $this->setAttribute('pago'.$pago->getId(),$pago->getNombre());
               $this->setAttribute('pago_imagen'.$pago->getId(),$pago->getImagen());
           }
           
           
           $rango_edades = new RangoEdad();
           $rango_edades = $rango_edades->getRangoEdades();
           foreach ($rango_edades as $rango_edad){
               $this->setAttribute('rango_edad'.$rango_edad->getId(),$rango_edad->getNombre().' ( '.$rango_edad->getRangoDesde().' - '.$rango_edad->getRangoHasta().' )');
           }
           
           $tipo_restriciones = new TipoRestriciones();
           $tipo_restriciones = $tipo_restriciones->getTipoRestriciones()->execute();
           foreach ($tipo_restriciones as $tipo_restricion){
               $this->setAttribute('restriciones'.$tipo_restricion->getId(),$tipo_restricion->getNombre());
           }
           
           
           $tipo_recomendaciones = new TipoRecomendaciones();
           $tipo_recomendaciones = $tipo_recomendaciones->getTipoRecomendaciones()->execute();
           foreach ($tipo_recomendaciones as $tipo_restricion){
               $this->setAttribute('recomendaciones'.$tipo_restricion->getId(),$tipo_restricion->getNombre());
           }
           
           
           $vehiculo_politicas = new VehiculoPolitica();
           $vehiculo_politicas = $vehiculo_politicas->getVehiculoPoliticas();
           foreach ($vehiculo_politicas as $vehiculo_politica){
               $this->setAttribute('vehiculos_politicas'.$vehiculo_politica->getId(),$vehiculo_politica->getNombre());
           }
           
           $vehiculo_adicionales = new VehiculoAdicional();
           $vehiculo_adicionales = $vehiculo_adicionales->getVehiculoAdicionales();
           foreach ($vehiculo_adicionales as $vehiculo_adicional){
               $this->setAttribute('vehiculos_adicionales'.$vehiculo_adicional->getId(),$vehiculo_adicional->getNombre());
           }
           
            $vehiculo_seguros = new VehiculoSeguro();
            $vehiculo_seguros = $vehiculo_seguros->getVehiculoSeguros();
            foreach ($vehiculo_seguros as $vehiculo_seguro) {
                $this->setAttribute('vehiculos_seguros' . $vehiculo_seguro->getId(), $vehiculo_seguro->getNombre());
            }
            
            $seguro_beneficios = new SeguroBeneficio();
            $seguro_beneficios = $seguro_beneficios->getSeguroBeneficios();
            foreach ($seguro_beneficios as $seguro_beneficio) {
                $this->setAttribute('seguros_beneficios' . $seguro_beneficio->getId(), $seguro_beneficio->getNombre());
            }
            
            $excursion_requisitos = new ExcursionRequisito();
            $excursion_requisitos = $excursion_requisitos->getExcursionRequisitos();
            foreach ($excursion_requisitos as $excursion_requisito) {
                $this->setAttribute('excursiones_requisitos' . $excursion_requisito->getId(), $excursion_requisito->getNombre());
            }
            
            $excursion_politicas = new ExcursionPolitica();
            $excursion_politicas = $excursion_politicas->getExcursionPoliticas();
            foreach ($excursion_politicas as $excursion_politica) {
                $this->setAttribute('excursiones_politicas' . $excursion_politica->getId(), $excursion_politica->getNombre());
            }
            
            $excursion_adicionales = new ExcursionAdicional();
            $excursion_adicionales = $excursion_adicionales->getExcursionAdicionales();
            foreach ($excursion_adicionales as $excursion_adicional) {
                $this->setAttribute('excursiones_adicionales' . $excursion_adicional->getId(), $excursion_adicional->getNombre());
            }

            $excursion_lugar_intereses = new ExcursionLugarInteres();
            $excursion_lugar_intereses = $excursion_lugar_intereses->getExcursionLugarIntereses();
            foreach ($excursion_lugar_intereses as $excursion_lugar_interes) {
                $this->setAttribute('excursiones_lugar_intereses' . $excursion_lugar_interes->getId(), $excursion_lugar_interes->getNombre());
            }
            
            $excursion_inclusiones = new ExcursionInclusion();
            $excursion_inclusiones = $excursion_inclusiones->getExcursionInclusiones();
            foreach ($excursion_inclusiones as $excursion_inclusion) {
                $this->setAttribute('$excursiones_inclusiones' . $excursion_inclusion->getId(), $excursion_inclusion->getNombre());
            }

            $proveedor_descuento = new ProveedorDescuento();
           $proveedor_descuento = $proveedor_descuento->getProveedorDescuentosPager()->execute();
           foreach ($proveedor_descuento as $tipo_restricion){
               $this->setAttribute('proveedor_descuento_categoria'.$tipo_restricion->getId(),$tipo_restricion->getCategoria());
               $this->setAttribute('proveedor_descuento_nombre'.$tipo_restricion->getId(),$tipo_restricion->getProveedor());
               $this->setAttribute('proveedor_descuento'.$tipo_restricion->getId(),$tipo_restricion->getNombre());
               $this->setAttribute('proveedor_descuento_precio'.$tipo_restricion->getId(),$tipo_restricion->getPrecio());
           }
           
           
            return $this->getAttribute('first_request', true);
            
            
        }  else  {
            
            $this->setAttribute('first_request', $boolean);
            
        }
    }
}
