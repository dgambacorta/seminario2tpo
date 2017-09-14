<?php
/* @var $this ItemProductoController */
/* @var $model ItemProducto */

$this->breadcrumbs=array(
	'Item Productos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ItemProducto', 'url'=>array('index')),
	array('label'=>'Manage ItemProducto', 'url'=>array('admin')),
);
?>

<h1>Create ItemProducto</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>