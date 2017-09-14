<?php
/* @var $this PuntosController */
/* @var $model Puntos */

$this->breadcrumbs=array(
	'Puntoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Puntos', 'url'=>array('index')),
	array('label'=>'Create Puntos', 'url'=>array('create')),
	array('label'=>'Update Puntos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Puntos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Puntos', 'url'=>array('admin')),
);
?>

<h1>View Puntos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cantidad',
		'fechaDesde',
		'fechaHasta',
	),
)); ?>
