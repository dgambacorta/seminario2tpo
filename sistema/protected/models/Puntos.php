<?php

/**
 * This is the model class for table "Puntos".
 *
 * The followings are the available columns in table 'Puntos':
 * @property integer $id
 * @property integer $cantidad
 * @property string $fechaDesde
 * @property string $fechaHasta
 *
 * The followings are the available model relations:
 * @property Cliente[] $clientes
 */
class Puntos extends CActiveRecord
{
	
	public $dnicliente;
	public $direccion;
	public $telefono;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Puntos the static model class
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
		return 'Puntos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cantidad', 'required'),
			array('cantidad', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cantidad', 'safe', 'on'=>'search'),
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
			'clientes' => array(self::MANY_MANY, 'Cliente', 'Puntos_Cliente(idpuntos, idcliente)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cantidad' => 'Cantidad',
		
		);
	}
	
	public function getPuntos($id){
			
		$puntos = Puntos::model()->findBySql("select * from Puntos where estado = 1 and id=".intval($id));
		
		if($puntos == null){
			$puntosres = 0;
		else		
			$puntosres = $puntos->cantidad;
			
		return $puntosres;
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

		$criteria->compare('id',$this->id);
		$criteria->compare('cantidad',$this->cantidad);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
