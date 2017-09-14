<?php

/**
 * This is the model class for table "ItemProducto".
 *
 * The followings are the available columns in table 'ItemProducto':
 * @property integer $id
 * @property integer $idProducto
 * @property string $sabores
 * @property integer $idPedido
 *
 * The followings are the available model relations:
 * @property Pedido $idProducto0
 */
class ItemProducto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ItemProducto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idProducto, idPedido', 'required'),
			array('idProducto, idPedido', 'numerical', 'integerOnly'=>true),
			array('sabores', 'length', 'max'=>240),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idProducto, sabores, idPedido', 'safe', 'on'=>'search'),
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
			'idProducto0' => array(self::BELONGS_TO, 'Pedido', 'idProducto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idProducto' => 'Id Producto',
			'sabores' => 'Sabores',
			'idPedido' => 'Id Pedido',
		);
	}
	
	public function existeIP($id){
			
			$result = false;				
			$count = ItemProducto::model()->findBySql("select * from ItemProducto where idPedido=".intval($id));			
			if(isset($count->id)){
				$result = true;
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
	public function search($idPedido)
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('idProducto',$this->idProducto);
		$criteria->compare('sabores',$this->sabores,true);
		$criteria->compare('idPedido',$idPedido);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
		public function getSubTotal($id){
			
		$producto = Envase::model()->findBySql("select * from Producto where id=".intval($id));
	
		return $producto->precio;
			
		}
		
		
		public function getSubPuntos($id){
			
		$producto = Envase::model()->findBySql("select * from Producto where id=".intval($id));
	
		return $producto->puntosOtorga;
			
		}
		
		public function getSubPuntosNecesarios($id){
			
		$producto = Envase::model()->findBySql("select * from Producto where id=".intval($id));
		
		return $producto->puntosNec;
			
		}
	
		public function getProducto($id){
			
			$producto = Envase::model()->findBySql("select * from Producto where id=".intval($id));
			
	
				
			return $producto->nombre;
			}
			
		public function getSabores($sabores){
		
			$sabores = json_decode($sabores);
		
			$result = "";
			
			$sab = array();
				foreach ($sabores as $v){
				if($v != ''){
					$sab[] = $v;
				}
			}
			$cant = count($sab);
			$i = 1;
			foreach ($sab as $v){
				if($v != ''){
				$s = Sabores::model()->findBySql("select * from Sabores where id=".intval($v));
				
				if($cant == $i)
					$result.=' '.$s->nombre.' ';
				else
					$result.=' '.$s->nombre.' -';
			}
				$i = $i + 1 ;
			}

			return $result;
			}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ItemProducto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
