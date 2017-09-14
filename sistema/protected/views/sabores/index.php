<?php
/* @var $this SaboresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sabores',
);

$this->menu=array(
	array('label'=>'Create Sabores', 'url'=>array('create')),
	array('label'=>'Manage Sabores', 'url'=>array('admin')),
);
?>

<h1>Sabores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
