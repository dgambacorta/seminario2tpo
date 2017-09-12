<?php
/* @var $this NivelAccesoController */
/* @var $model NivelAcceso */

$this->breadcrumbs=array(
	'Nivel Accesos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List NivelAcceso', 'url'=>array('index')),
	array('label'=>'Create NivelAcceso', 'url'=>array('create')),
	array('label'=>'View NivelAcceso', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage NivelAcceso', 'url'=>array('admin')),
);
?>

<h1>Update NivelAcceso <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>