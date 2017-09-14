<?php

/**
 * This is the model class for table "Sabores".
 *
 * The followings are the available columns in table 'Sabores':
 * @property integer $id
 * @property string $nombre
 * @property integer $disponible
 * @property integer $categoria
 *
 * The followings are the available model relations:
 * @property CategoriaSabor $id0
 */
class Sabores extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Sabores the static model class
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
		return 'Sabores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, disponible, categoria', 'required'),
			array('disponible, categoria', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>60),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, disponible, categoria', 'safe', 'on'=>'search'),
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
			'id0' => array(self::BELONGS_TO, 'CategoriaSabor', 'id'),
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
		
	public function getCategoria($id){
		$cat = CategoriaSabor::model()->findBySql("select * from CategoriaSabor where id=".intval($id));
		$var = $cat->nombre;
		
		return $var;
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
			'categoria' => 'Categoria',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('disponible',$this->disponible);
		$criteria->compare('categoria',$this->categoria);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
