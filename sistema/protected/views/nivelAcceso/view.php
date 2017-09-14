<?php
/* @var $this NivelAccesoController */
/* @var $model NivelAcceso */

$this->breadcrumbs=array(
	'Nivel Accesos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List NivelAcceso', 'url'=>array('index')),
	array('label'=>'Create NivelAcceso', 'url'=>array('create')),
	array('label'=>'Update NivelAcceso', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete NivelAcceso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NivelAcceso', 'url'=>array('admin')),
);
?>

<h1>View NivelAcceso #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
	),
)); ?>
