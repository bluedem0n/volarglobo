<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ProveedorVuelo', 'doctrine');

/**
 * BaseProveedorVuelo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $empresa_id
 * @property integer $codigo
 * @property integer $globo_id
 * @property integer $tipo_vuelo_id
 * @property integer $tipo_tarifa_id
 * @property integer $tipo_motivo_id
 * @property integer $tipo_lona_id
 * @property integer $status
 * @property string $horario
 * @property string $observacion
 * @property string $condiciones
 * @property date $fecha_limite
 * @property date $fecha_activacion
 * @property date $fecha_finalizacion
 * @property float $precio
 * @property float $precio_oferta
 * @property integer $user_id
 * @property string $user_name
 * @property Empresa $Empresa
 * @property TipoVuelo $TipoVuelo
 * @property TipoMotivo $TipoMotivo
 * @property TipoTarifa $TipoTarifa
 * @property sfGuardUser $sfGuardUser
 * @property Doctrine_Collection $VueloRestriciones
 * @property Doctrine_Collection $VueloRecomendaciones
 * @property Doctrine_Collection $VueloServicio
 * @property Doctrine_Collection $VueloHospedaje
 * @property Doctrine_Collection $VueloCliente
 * 
 * @method integer             getId()                   Returns the current record's "id" value
 * @method integer             getEmpresaId()            Returns the current record's "empresa_id" value
 * @method integer             getCodigo()               Returns the current record's "codigo" value
 * @method integer             getGloboId()              Returns the current record's "globo_id" value
 * @method integer             getTipoVueloId()          Returns the current record's "tipo_vuelo_id" value
 * @method integer             getTipoTarifaId()         Returns the current record's "tipo_tarifa_id" value
 * @method integer             getTipoMotivoId()         Returns the current record's "tipo_motivo_id" value
 * @method integer             getTipoLonaId()           Returns the current record's "tipo_lona_id" value
 * @method integer             getStatus()               Returns the current record's "status" value
 * @method string              getHorario()              Returns the current record's "horario" value
 * @method string              getObservacion()          Returns the current record's "observacion" value
 * @method string              getCondiciones()          Returns the current record's "condiciones" value
 * @method date                getFechaLimite()          Returns the current record's "fecha_limite" value
 * @method date                getFechaActivacion()      Returns the current record's "fecha_activacion" value
 * @method date                getFechaFinalizacion()    Returns the current record's "fecha_finalizacion" value
 * @method float               getPrecio()               Returns the current record's "precio" value
 * @method float               getPrecioOferta()         Returns the current record's "precio_oferta" value
 * @method integer             getUserId()               Returns the current record's "user_id" value
 * @method string              getUserName()             Returns the current record's "user_name" value
 * @method Empresa             getEmpresa()              Returns the current record's "Empresa" value
 * @method TipoVuelo           getTipoVuelo()            Returns the current record's "TipoVuelo" value
 * @method TipoMotivo          getTipoMotivo()           Returns the current record's "TipoMotivo" value
 * @method TipoTarifa          getTipoTarifa()           Returns the current record's "TipoTarifa" value
 * @method sfGuardUser         getSfGuardUser()          Returns the current record's "sfGuardUser" value
 * @method Doctrine_Collection getVueloRestriciones()    Returns the current record's "VueloRestriciones" collection
 * @method Doctrine_Collection getVueloRecomendaciones() Returns the current record's "VueloRecomendaciones" collection
 * @method Doctrine_Collection getVueloServicio()        Returns the current record's "VueloServicio" collection
 * @method Doctrine_Collection getVueloHospedaje()       Returns the current record's "VueloHospedaje" collection
 * @method Doctrine_Collection getVueloCliente()         Returns the current record's "VueloCliente" collection
 * @method ProveedorVuelo      setId()                   Sets the current record's "id" value
 * @method ProveedorVuelo      setEmpresaId()            Sets the current record's "empresa_id" value
 * @method ProveedorVuelo      setCodigo()               Sets the current record's "codigo" value
 * @method ProveedorVuelo      setGloboId()              Sets the current record's "globo_id" value
 * @method ProveedorVuelo      setTipoVueloId()          Sets the current record's "tipo_vuelo_id" value
 * @method ProveedorVuelo      setTipoTarifaId()         Sets the current record's "tipo_tarifa_id" value
 * @method ProveedorVuelo      setTipoMotivoId()         Sets the current record's "tipo_motivo_id" value
 * @method ProveedorVuelo      setTipoLonaId()           Sets the current record's "tipo_lona_id" value
 * @method ProveedorVuelo      setStatus()               Sets the current record's "status" value
 * @method ProveedorVuelo      setHorario()              Sets the current record's "horario" value
 * @method ProveedorVuelo      setObservacion()          Sets the current record's "observacion" value
 * @method ProveedorVuelo      setCondiciones()          Sets the current record's "condiciones" value
 * @method ProveedorVuelo      setFechaLimite()          Sets the current record's "fecha_limite" value
 * @method ProveedorVuelo      setFechaActivacion()      Sets the current record's "fecha_activacion" value
 * @method ProveedorVuelo      setFechaFinalizacion()    Sets the current record's "fecha_finalizacion" value
 * @method ProveedorVuelo      setPrecio()               Sets the current record's "precio" value
 * @method ProveedorVuelo      setPrecioOferta()         Sets the current record's "precio_oferta" value
 * @method ProveedorVuelo      setUserId()               Sets the current record's "user_id" value
 * @method ProveedorVuelo      setUserName()             Sets the current record's "user_name" value
 * @method ProveedorVuelo      setEmpresa()              Sets the current record's "Empresa" value
 * @method ProveedorVuelo      setTipoVuelo()            Sets the current record's "TipoVuelo" value
 * @method ProveedorVuelo      setTipoMotivo()           Sets the current record's "TipoMotivo" value
 * @method ProveedorVuelo      setTipoTarifa()           Sets the current record's "TipoTarifa" value
 * @method ProveedorVuelo      setSfGuardUser()          Sets the current record's "sfGuardUser" value
 * @method ProveedorVuelo      setVueloRestriciones()    Sets the current record's "VueloRestriciones" collection
 * @method ProveedorVuelo      setVueloRecomendaciones() Sets the current record's "VueloRecomendaciones" collection
 * @method ProveedorVuelo      setVueloServicio()        Sets the current record's "VueloServicio" collection
 * @method ProveedorVuelo      setVueloHospedaje()       Sets the current record's "VueloHospedaje" collection
 * @method ProveedorVuelo      setVueloCliente()         Sets the current record's "VueloCliente" collection
 * 
 * @package    hub-usmjesus
 * @subpackage model
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProveedorVuelo extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('proveedor_vuelo');
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
        $this->hasColumn('codigo', 'integer', null, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('globo_id', 'integer', null, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('tipo_vuelo_id', 'integer', null, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('tipo_tarifa_id', 'integer', null, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('tipo_motivo_id', 'integer', null, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('tipo_lona_id', 'integer', null, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('status', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'default' => 1,
             'length' => 1,
             ));
        $this->hasColumn('horario', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('observacion', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('condiciones', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('fecha_limite', 'date', null, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('fecha_activacion', 'date', null, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('fecha_finalizacion', 'date', null, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('precio', 'float', 18, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 18,
             'scale' => '2',
             ));
        $this->hasColumn('precio_oferta', 'float', 18, array(
             'type' => 'float',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 18,
             'scale' => '2',
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

        $this->hasOne('TipoVuelo', array(
             'local' => 'tipo_vuelo_id',
             'foreign' => 'id'));

        $this->hasOne('TipoMotivo', array(
             'local' => 'tipo_motivo_id',
             'foreign' => 'id'));

        $this->hasOne('TipoTarifa', array(
             'local' => 'tipo_tarifa_id',
             'foreign' => 'id'));

        $this->hasOne('sfGuardUser', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $this->hasMany('VueloRestriciones', array(
             'local' => 'id',
             'foreign' => 'proveedor_vuelo_id'));

        $this->hasMany('VueloRecomendaciones', array(
             'local' => 'id',
             'foreign' => 'proveedor_vuelo_id'));

        $this->hasMany('VueloServicio', array(
             'local' => 'id',
             'foreign' => 'proveedor_vuelo_id'));

        $this->hasMany('VueloHospedaje', array(
             'local' => 'id',
             'foreign' => 'proveedor_vuelo_id'));

        $this->hasMany('VueloCliente', array(
             'local' => 'id',
             'foreign' => 'proveedor_vuelo_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}