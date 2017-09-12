<?php
/* @var $this ItemProductoController */
/* @var $model ItemProducto */

$this->breadcrumbs=array(
	'Item Productos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ItemProducto', 'url'=>array('index')),
	array('label'=>'Create ItemProducto', 'url'=>array('create')),
	array('label'=>'View ItemProducto', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ItemProducto', 'url'=>array('admin')),
);
?>

<h1>Update ItemProducto <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>