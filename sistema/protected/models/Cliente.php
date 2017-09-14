<?php

/**
 * This is the model class for table "Cliente".
 *
 * The followings are the available columns in table 'Cliente':
 * @property integer $nroCliente
 * @property string $dni
 * @property string $telefono
 * @property string $email
 * @property string $domicilio
 * @property integer $fechaNacimiento
 * @property string $fechaAlta
 * @property integer $idUsuario
 *
 * The followings are the available model relations:
 * @property Puntos[] $puntoses
 */
class Cliente extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Cliente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Cliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	 
	 
	public function getPuntos($id){
		/* TODO: Ver si no hace falta validar que el id del pedido corresponda al cliente */
		$total = 0;
					
		 $productos = Yii::app()->db->createCommand()
		->select('idProducto')
		->from('ItemProducto')
		->where('idPedido='.$id)
		->queryAll();
		
		foreach($productos as $v){
			$subtotal = ItemProducto::model()->getSubPuntos($v['idProducto']);				
			$total = $total + $subtotal;
		}
	
	return $total;
	}
	 
	public function  calcularPuntosDisponibles($id){
	
		$total = 0;
		
		 $puntos = Yii::app()->db->createCommand()
		->select('idpuntos')
		->from('Puntos_Cliente')
		->where('idcliente='.intval($id))
		->queryAll();
			
		foreach($puntos as $v){
			$subtotal = Puntos::model()->getPuntos($v['idpuntos']);			
			$total = $total + $subtotal;
		}

	return $total;
	}
	
	 
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dni, telefono, domicilio,fechaNacimiento, fechaAlta,nombre,apellido', 'required'),
			array('idUsuario', 'numerical', 'integerOnly'=>true),
			array('dni', 'length', 'max'=>8),
			array('telefono', 'length', 'max'=>25),
			array('email', 'length', 'max'=>80),
			array('domicilio', 'length', 'max'=>120),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('nroCliente, dni, nombre, apellido, telefono, email, domicilio, fechaNacimiento, fechaAlta, idUsuario', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'puntoses' => array(self::MANY_MANY, 'Puntos', 'Puntos_Cliente(idcliente, idpuntos)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'nroCliente' => 'Nro Cliente',
			'dni' => 'Dni',
			'telefono' => 'Telefono',
			'email' => 'Email',
			'domicilio' => 'Domicilio',
			'fechaNacimiento' => 'Fecha Nacimiento',
			'fechaAlta' => 'Fecha Alta',
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
			'idUsuario' => 'Id Usuario',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('nroCliente',$this->nroCliente);
		$criteria->compare('dni',$this->dni,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('domicilio',$this->domicilio,true);
		$criteria->compare('fechaNacimiento',$this->fechaNacimiento);
		$criteria->compare('nombre',$this->nombre);
		$criteria->compare('apellido',$this->apellido);
		$criteria->compare('fechaAlta',$this->fechaAlta,true);
		$criteria->compare('idUsuario',$this->idUsuario);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
