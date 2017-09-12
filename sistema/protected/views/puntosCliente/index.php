<?php
/* @var $this PuntosClienteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Puntos Clientes',
);

$this->menu=array(
	array('label'=>'Create PuntosCliente', 'url'=>array('create')),
	array('label'=>'Manage PuntosCliente', 'url'=>array('admin')),
);
?>

<h1>Puntos Clientes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
