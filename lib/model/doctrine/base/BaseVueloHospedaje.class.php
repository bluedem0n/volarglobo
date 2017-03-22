<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('VueloHospedaje', 'doctrine');

/**
 * BaseVueloHospedaje
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $empresa_id
 * @property integer $proveedor_vuelo_id
 * @property integer $hospedaje_id
 * @property integer $hospedaje_habitacion_id
 * @property string $cantidad
 * @property string $cantidad_personas
 * @property date $check_in
 * @property date $check_out
 * @property string $precio
 * @property integer $user_id
 * @property string $user_name
 * @property Empresa $Empresa
 * @property ProveedorVuelo $ProveedorVuelo
 * @property Hospedaje $Hospedaje
 * @property HospedajeHabitacion $HospedajeHabitacion
 * @property sfGuardUser $sfGuardUser
 * 
 * @method integer             getId()                      Returns the current record's "id" value
 * @method integer             getEmpresaId()               Returns the current record's "empresa_id" value
 * @method integer             getProveedorVueloId()        Returns the current record's "proveedor_vuelo_id" value
 * @method integer             getHospedajeId()             Returns the current record's "hospedaje_id" value
 * @method integer             getHospedajeHabitacionId()   Returns the current record's "hospedaje_habitacion_id" value
 * @method string              getCantidad()                Returns the current record's "cantidad" value
 * @method string              getCantidadPersonas()        Returns the current record's "cantidad_personas" value
 * @method date                getCheckIn()                 Returns the current record's "check_in" value
 * @method date                getCheckOut()                Returns the current record's "check_out" value
 * @method string              getPrecio()                  Returns the current record's "precio" value
 * @method integer             getUserId()                  Returns the current record's "user_id" value
 * @method string              getUserName()                Returns the current record's "user_name" value
 * @method Empresa             getEmpresa()                 Returns the current record's "Empresa" value
 * @method ProveedorVuelo      getProveedorVuelo()          Returns the current record's "ProveedorVuelo" value
 * @method Hospedaje           getHospedaje()               Returns the current record's "Hospedaje" value
 * @method HospedajeHabitacion getHospedajeHabitacion()     Returns the current record's "HospedajeHabitacion" value
 * @method sfGuardUser         getSfGuardUser()             Returns the current record's "sfGuardUser" value
 * @method VueloHospedaje      setId()                      Sets the current record's "id" value
 * @method VueloHospedaje      setEmpresaId()               Sets the current record's "empresa_id" value
 * @method VueloHospedaje      setProveedorVueloId()        Sets the current record's "proveedor_vuelo_id" value
 * @method VueloHospedaje      setHospedajeId()             Sets the current record's "hospedaje_id" value
 * @method VueloHospedaje      setHospedajeHabitacionId()   Sets the current record's "hospedaje_habitacion_id" value
 * @method VueloHospedaje      setCantidad()                Sets the current record's "cantidad" value
 * @method VueloHospedaje      setCantidadPersonas()        Sets the current record's "cantidad_personas" value
 * @method VueloHospedaje      setCheckIn()                 Sets the current record's "check_in" value
 * @method VueloHospedaje      setCheckOut()                Sets the current record's "check_out" value
 * @method VueloHospedaje      setPrecio()                  Sets the current record's "precio" value
 * @method VueloHospedaje      setUserId()                  Sets the current record's "user_id" value
 * @method VueloHospedaje      setUserName()                Sets the current record's "user_name" value
 * @method VueloHospedaje      setEmpresa()                 Sets the current record's "Empresa" value
 * @method VueloHospedaje      setProveedorVuelo()          Sets the current record's "ProveedorVuelo" value
 * @method VueloHospedaje      setHospedaje()               Sets the current record's "Hospedaje" value
 * @method VueloHospedaje      setHospedajeHabitacion()     Sets the current record's "HospedajeHabitacion" value
 * @method VueloHospedaje      setSfGuardUser()             Sets the current record's "sfGuardUser" value
 * 
 * @package    hub-usmjesus
 * @subpackage model
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseVueloHospedaje extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('vuelo_hospedaje');
        $this->hasColumn('id', 'integer', null, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('empresa_id', 'integer', null, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'default' => 1,
             ));
        $this->hasColumn('proveedor_vuelo_id', 'integer', null, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('hospedaje_id', 'integer', null, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('hospedaje_habitacion_id', 'integer', null, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('cantidad', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'default' => 1,
             'length' => '',
             ));
        $this->hasColumn('cantidad_personas', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'default' => 1,
             'length' => '',
             ));
        $this->hasColumn('check_in', 'date', null, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('check_out', 'date', null, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('precio', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'default' => 1,
             'length' => '',
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'default' => 1,
             ));
        $this->hasColumn('user_name', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'autoincrement' => false,
             'notnull' => false,
             'length' => 100,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Empresa', array(
             'local' => 'empresa_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('ProveedorVuelo', array(
             'local' => 'proveedor_vuelo_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE',
             'onUpdate' => 'CASCADE'));

        $this->hasOne('Hospedaje', array(
             'local' => 'hospedaje_id',
             'foreign' => 'id'));

        $this->hasOne('HospedajeHabitacion', array(
             'local' => 'hospedaje_habitacion_id',
             'foreign' => 'id'));

        $this->hasOne('sfGuardUser', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}