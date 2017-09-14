<?php
/* @var $this PuntosClienteController */
/* @var $model PuntosCliente */

$this->breadcrumbs=array(
	'Puntos Clientes'=>array('index'),
	$model->idcliente,
);

$this->menu=array(
	array('label'=>'List PuntosCliente', 'url'=>array('index')),
	array('label'=>'Create PuntosCliente', 'url'=>array('create')),
	array('label'=>'Update PuntosCliente', 'url'=>array('update', 'id'=>$model->idcliente)),
	array('label'=>'Delete PuntosCliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcliente),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PuntosCliente', 'url'=>array('admin')),
);
?>

<h1>View PuntosCliente #<?php echo $model->idcliente; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idcliente',
		'idpuntos',
	),
)); ?>
