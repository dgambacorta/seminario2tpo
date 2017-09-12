<?php

/**
 * This is the model class for table "envase".
 *
 * The followings are the available columns in table 'envase':
 * @property integer $id
 * @property string $nombre
 * @property integer $disponible
 *
 * The followings are the available model relations:
 * @property Pedido[] $pedidos
 */
class Envase extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, disponible, precio, puntosNec, puntosOtorga, cantidadSabores', 'required'),
			array('disponible,puntosNec, puntosOtorga, cantidadSabores,precio', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, disponible, precio, puntosNec, puntosOtorga, cantidadSabores', 'safe', 'on'=>'search'),
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
			'pedidos' => array(self::HAS_MANY, 'Pedido', 'idProducto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'disponible' => 'Disponible',
			'precio' => 'Precio',
			'puntosNec' => 'Puntos Necesarios',
			'puntosOtorga' => 'Puntos a Otorgar',
			'cantidadSabores' => 'Cantidad de Sabores',
			
		);
	}
	
		 public function getEstado($estado){ 
				if($estado == 1){
					$var = 'Activo';
				}
				if($estado == 2){
					$var = 'Inactivo';
				}
			return $var;
			}
			
	
			
			public function existe($id){ /* TODO */
			
				$result = false;					
				$count = Envase::model()->findBySql("select * from Producto where id=".intval($id));
								
				if(isset($count->id)){					
					$result = true;
				}
				
				return $result;
			}

			public function getCantidadSabores($id){
			
				$default = 2;				
				$sabores = Envase::model()->findBySql("select * from Producto where id=".intval($id));
				
				if(isset($sabores->id)){
					$result = $sabores->cantidadSabores;
				}else{
					$result = $default;
				}
					
				return $result;
			}
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('disponible',$this->disponible);
		$criteria->compare('precio',$this->precio);
		$criteria->compare('puntosNec',$this->puntosNec);
		$criteria->compare('puntosOtorga',$this->puntosOtorga);
		$criteria->compare('cantidadSabores',$this->cantidadSabores);
		


		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Envase the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
