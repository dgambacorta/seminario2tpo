<?php
/* @var $this PromocionController */
/* @var $model Promocion */

$this->breadcrumbs=array(
	'Promocions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Promocion', 'url'=>array('index')),
	array('label'=>'Create Promocion', 'url'=>array('create')),
	array('label'=>'View Promocion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Promocion', 'url'=>array('admin')),
);
?>

<h1>Update Promocion <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>