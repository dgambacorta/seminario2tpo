<?php

/**
 * This is the model class for table "Pedido".
 *
 * The followings are the available columns in table 'Pedido':
 * @property integer $id
 * @property integer $idCliente
 * @property string $fecha
 * @property string $pagaCon
 * @property string $precioTotal
 * @property string $horaEntrega
 * @property string $comentarios
 */
class Pedido extends CActiveRecord
{
	 public $dnicliente;
	 public $producto;
	 public $sabores;
	 public $delivery;
	 public $puntosCliente;


	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pedido the static model class
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
		return 'Pedido';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_pedido', 'required'),
			array('dnicliente', 'numerical', 'integerOnly'=>true),
			array('pagaCon, precioTotal', 'length', 'max'=>5),
			array('horaEntrega', 'length', 'max'=>6),
			array('comentarios', 'length', 'max'=>240),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fecha, pagaCon, precioTotal, puntosCliente, direccion, telefono, horaEntrega,dnicliente, comentarios, tipo_pedido', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	 
	public function getTotal($id){
		
		$total = 0;
		
		$productos = Yii::app()->db->createCommand()
		->select('idProducto')
		->from('ItemProducto')
		->where('idPedido='.intval($id))
		->queryAll();
			
		foreach($productos as $v){			
			$subtotal = ItemProducto::model()->getSubTotal($v['idProducto']);				
			$total = $total + $subtotal;			
		}		
		return $total;
	}
	
	
	public function getPuntos($id){
		
		$total = 0;			
		$productos = Yii::app()->db->createCommand()
		->select('idProducto')
		->from('ItemProducto')
		->where('idPedido='.intval($id))
		->queryAll();

			
		foreach($productos as $v){			
			$subtotal = ItemProducto::model()->getSubPuntos($v['idProducto']);				
			$total = $total + $subtotal;			
		}
	
	return $total;
	}
	
	public function getPuntosNecesarios($id){
		
		$total = 0;
		$productos = Yii::app()->db->createCommand()
		->select('idProducto')
		->from('ItemProducto')
		->where('idPedido='.intval($id))
		->queryAll();

			
		foreach($productos as $v){			
			$subtotal = ItemProducto::model()->getSubPuntosNecesarios($v['idProducto']);				
			$total = $total + $subtotal;			
		}
		
		return $total;
	}
	
	public function actualizarTotal($idpedido){
		
		$total = $this->getTotal($idpedido);
			
		$pedido = Pedido::model()->findByPk($idpedido);
		$pedido->precioTotal = $total;
		$pedido->update(array('precioTotal'));		
	}
	
	
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fecha' => 'Fecha',
			'pagaCon' => 'Paga Con',
			'precioTotal' => 'Precio Total',
			'horaEntrega' => 'Hora Entrega',
			'comentarios' => 'Comentarios',
			'tipo_pedido' => 'Tipo Pedido',
			'producto' => 'Producto',
			'sabores' => 'Sabores',
			'direccion'=>'Direccion',
			'telefono'=> 'Telefono',
			'delivery'=>'Delivery',
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

		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('pagaCon',$this->pagaCon,true);
		$criteria->compare('precioTotal',$this->precioTotal,true);
		$criteria->compare('horaEntrega',$this->horaEntrega,true);
		$criteria->compare('comentarios',$this->comentarios,true);
		$criteria->compare('tipo_pedido',$this->tipo_pedido,true);
		$criteria->compare('dnicliente',$this->dnicliente,true);
		$criteria->condition = "precioTotal > 0 && precioTotal is not null";

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
		
	}
}
