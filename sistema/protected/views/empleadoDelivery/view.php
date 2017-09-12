<?php
/* @var $this EmpleadoDeliveryController */
/* @var $model EmpleadoDelivery */

$this->breadcrumbs=array(
	'Empleado Deliveries'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EmpleadoDelivery', 'url'=>array('index')),
	array('label'=>'Create EmpleadoDelivery', 'url'=>array('create')),
	array('label'=>'Update EmpleadoDelivery', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EmpleadoDelivery', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmpleadoDelivery', 'url'=>array('admin')),
);
?>

<h1>View EmpleadoDelivery #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'apellido',
		'telefono',
		'domicilio',
	),
)); ?>
