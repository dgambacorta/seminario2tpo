<?php
/* @var $this PuntosClienteController */
/* @var $model PuntosCliente */

$this->breadcrumbs=array(
	'Puntos Clientes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PuntosCliente', 'url'=>array('index')),
	array('label'=>'Manage PuntosCliente', 'url'=>array('admin')),
);
?>

<h1>Create PuntosCliente</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>