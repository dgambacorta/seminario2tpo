<?php
/* @var $this PuntosController */
/* @var $model Puntos */

$this->breadcrumbs=array(
	'Puntoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Puntos', 'url'=>array('index')),
	array('label'=>'Create Puntos', 'url'=>array('create')),
	array('label'=>'View Puntos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Puntos', 'url'=>array('admin')),
);
?>

<h1>Update Puntos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>