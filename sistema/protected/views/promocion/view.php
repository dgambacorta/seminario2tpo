<?php
/* @var $this PromocionController */
/* @var $model Promocion */

$this->breadcrumbs=array(
	'Promocions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Promocion', 'url'=>array('index')),
	array('label'=>'Create Promocion', 'url'=>array('create')),
	array('label'=>'Update Promocion', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Promocion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Promocion', 'url'=>array('admin')),
);
?>

<h1>View Promocion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'fechaDesde',
		'fechaHasta',
		'cantidadPuntos',
	),
)); ?>
