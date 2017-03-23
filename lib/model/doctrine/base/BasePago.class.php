<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Pago', 'doctrine');

/**
 * BasePago
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $empresa_id
 * @property string $nombre
 * @property string $descripcion
 * @property string $orden
 * @property string $imagen
 * @property integer $status
 * @property integer $user_id
 * @property string $user_name
 * @property Empresa $Empresa
 * @property sfGuardUser $sfGuardUser
 * @property Doctrine_Collection $ProveedorPago
 * @property Doctrine_Collection $HospedajePago
 * 
 * @method integer             getId()            Returns the current record's "id" value
 * @method integer             getEmpresaId()     Returns the current record's "empresa_id" value
 * @method string              getNombre()        Returns the current record's "nombre" value
 * @method string              getDescripcion()   Returns the current record's "descripcion" value
 * @method string              getOrden()         Returns the current record's "orden" value
 * @method string              getImagen()        Returns the current record's "imagen" value
 * @method integer             getStatus()        Returns the current record's "status" value
 * @method integer             getUserId()        Returns the current record's "user_id" value
 * @method string              getUserName()      Returns the current record's "user_name" value
 * @method Empresa             getEmpresa()       Returns the current record's "Empresa" value
 * @method sfGuardUser         getSfGuardUser()   Returns the current record's "sfGuardUser" value
 * @method Doctrine_Collection getProveedorPago() Returns the current record's "ProveedorPago" collection
 * @method Doctrine_Collection getHospedajePago() Returns the current record's "HospedajePago" collection
 * @method Pago                setId()            Sets the current record's "id" value
 * @method Pago                setEmpresaId()     Sets the current record's "empresa_id" value
 * @method Pago                setNombre()        Sets the current record's "nombre" value
 * @method Pago                setDescripcion()   Sets the current record's "descripcion" value
 * @method Pago                setOrden()         Sets the current record's "orden" value
 * @method Pago                setImagen()        Sets the current record's "imagen" value
 * @method Pago                setStatus()        Sets the current record's "status" value
 * @method Pago                setUserId()        Sets the current record's "user_id" value
 * @method Pago                setUserName()      Sets the current record's "user_name" value
 * @method Pago                setEmpresa()       Sets the current record's "Empresa" value
 * @method Pago                setSfGuardUser()   Sets the current record's "sfGuardUser" value
 * @method Pago                setProveedorPago() Sets the current record's "ProveedorPago" collection
 * @method Pago                setHospedajePago() Sets the current record's "HospedajePago" collection
 * 
 * @package    hub-usmjesus
 * @subpackage model
 * @author     Jesus Salazar - usmjesus@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePago extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('pago');
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
        $this->hasColumn('nombre', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('descripcion', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('orden', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('imagen', 'string', 255, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 255,
             ));
        $this->hasColumn('status', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
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

        $this->hasOne('sfGuardUser', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $this->hasMany('ProveedorPago', array(
             'local' => 'id',
             'foreign' => 'pago_id'));

        $this->hasMany('HospedajePago', array(
             'local' => 'id',
             'foreign' => 'pago_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}