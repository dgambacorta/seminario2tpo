<?php

/**
 * This is the model class for table "Delivery".
 *
 * The followings are the available columns in table 'Delivery':
 * @property integer $id
 * @property integer $idEmpleadoDelivery
 * @property integer $idPedido
 */
class Delivery extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Delivery the static model class
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
		return 'Despacho';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idEmpleadoDelivery, idPedido', 'required'),
			array('idEmpleadoDelivery, idPedido', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, idEmpleadoDelivery, idPedido, direccion, telefono', 'safe', 'on'=>'search'),
		);
	}
	
	
	public function getEmpleado($id){
		
		$c = EmpleadoDelivery::model()->findBySql("SELECT * FROM EmpleadoDelivery where id=".intval($id));		
		return $c->nombre." ".$c->apellido;
		
	}

	public function getEmpleadoDelivery(){

		$c = EmpleadoDelivery::model()->findAllBySql("SELECT * FROM Despacho");
		$cantidad = count($c);
		
		/*TODO - Revisar esto, hecho para solo dos delivery guys */
		if($cantidad == 0){
			return 1;
		}elseif($cantidad == 1){
			return 2;
		}elseif($cantidad >= 2){
			
			$empleados = Yii::app()->db->createCommand()
			->select('count(*) as cant,idEmpleadoDelivery')
			->from('Despacho')
			->group('idEmpleadoDelivery')
			->order('cant ASC')
			->limit(1)	
			->queryAll();			
				
			foreach($empleados as $k=>$v)
				return $v['idEmpleadoDelivery'];				
			}
		}
	

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'pedido' => array(self::HAS_ONE, 'Pedido', 'id'),
			'cliente' => array(self::HAS_ONE, 'Cliente', 'id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idEmpleadoDelivery' => 'Empleado Delivery',
			'idPedido' => 'Id Pedido',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('idEmpleadoDelivery',$this->idEmpleadoDelivery);
		$criteria->compare('idPedido',$this->idPedido);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
