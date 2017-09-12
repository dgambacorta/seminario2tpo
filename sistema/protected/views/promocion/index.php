<?php
/* @var $this PromocionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Promocions',
);

$this->menu=array(
	array('label'=>'Create Promocion', 'url'=>array('create')),
	array('label'=>'Manage Promocion', 'url'=>array('admin')),
);
?>

<h1>Promocions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
