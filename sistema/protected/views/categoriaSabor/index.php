<?php
/* @var $this CategoriaSaborController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Categoria Sabors',
);

$this->menu=array(
	array('label'=>'Create CategoriaSabor', 'url'=>array('create')),
	array('label'=>'Manage CategoriaSabor', 'url'=>array('admin')),
);
?>

<h1>Categoria Sabors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
