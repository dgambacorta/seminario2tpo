<?php
/* @var $this CategoriaSaborController */
/* @var $model CategoriaSabor */

$this->breadcrumbs=array(
	'Categoria Sabors'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CategoriaSabor', 'url'=>array('index')),
	array('label'=>'Create CategoriaSabor', 'url'=>array('create')),
	array('label'=>'View CategoriaSabor', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CategoriaSabor', 'url'=>array('admin')),
);
?>

<h1>Update CategoriaSabor <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>