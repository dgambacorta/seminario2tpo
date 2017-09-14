<?php
/* @var $this DeliveryController */
/* @var $model Delivery */

$this->breadcrumbs=array(
	'Deliveries'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Delivery', 'url'=>array('index')),
	array('label'=>'Create Delivery', 'url'=>array('create')),
	array('label'=>'Update Delivery', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Delivery', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Delivery', 'url'=>array('admin')),
);
?>

<h1>View Delivery #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'idEmpleadoDelivery',
		'idPedido',
	),
)); ?>
