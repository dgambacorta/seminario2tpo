<?php
/* @var $this CategoriaSaborController */
/* @var $model CategoriaSabor */

$this->breadcrumbs=array(
	'Categoria Sabors'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CategoriaSabor', 'url'=>array('index')),
	array('label'=>'Create CategoriaSabor', 'url'=>array('create')),
	array('label'=>'Update CategoriaSabor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CategoriaSabor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CategoriaSabor', 'url'=>array('admin')),
);
?>

<h1>View CategoriaSabor <?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
	),
)); ?>
