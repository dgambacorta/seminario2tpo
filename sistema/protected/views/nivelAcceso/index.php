<?php
/* @var $this NivelAccesoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Nivel Accesos',
);

$this->menu=array(
	array('label'=>'Create NivelAcceso', 'url'=>array('create')),
	array('label'=>'Manage NivelAcceso', 'url'=>array('admin')),
);
?>

<h1>Nivel Accesos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
