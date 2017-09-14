<?php
/* @var $this EmpleadoDeliveryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Empleado Deliveries',
);

$this->menu=array(
	array('label'=>'Create EmpleadoDelivery', 'url'=>array('create')),
	array('label'=>'Manage EmpleadoDelivery', 'url'=>array('admin')),
);
?>

<h1>Empleado Deliveries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
