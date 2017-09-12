<?php
/* @var $this ItemProductoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Item Productos',
);

$this->menu=array(
	array('label'=>'Create ItemProducto', 'url'=>array('create')),
	array('label'=>'Manage ItemProducto', 'url'=>array('admin')),
);
?>

<h1>Item Productos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
