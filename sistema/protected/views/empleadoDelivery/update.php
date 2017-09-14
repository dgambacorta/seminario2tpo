<?php
/* @var $this EmpleadoDeliveryController */
/* @var $model EmpleadoDelivery */

$this->breadcrumbs=array(
	'Empleado Deliveries'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EmpleadoDelivery', 'url'=>array('index')),
	array('label'=>'Create EmpleadoDelivery', 'url'=>array('create')),
	array('label'=>'View EmpleadoDelivery', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EmpleadoDelivery', 'url'=>array('admin')),
);
?>

<h1>Update EmpleadoDelivery <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>