<?php
/* @var $this EnvaseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Envases',
);

$this->menu=array(
	array('label'=>'Create Envase', 'url'=>array('create')),
	array('label'=>'Manage Envase', 'url'=>array('admin')),
);
?>

<h1>Envases</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
