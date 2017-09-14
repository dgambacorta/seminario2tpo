<?php
/* @var $this PuntosClienteController */
/* @var $model PuntosCliente */

$this->breadcrumbs=array(
	'Puntos Clientes'=>array('index'),
	$model->idcliente=>array('view','id'=>$model->idcliente),
	'Update',
);

$this->menu=array(
	array('label'=>'List PuntosCliente', 'url'=>array('index')),
	array('label'=>'Create PuntosCliente', 'url'=>array('create')),
	array('label'=>'View PuntosCliente', 'url'=>array('view', 'id'=>$model->idcliente)),
	array('label'=>'Manage PuntosCliente', 'url'=>array('admin')),
);
?>

<h1>Update PuntosCliente <?php echo $model->idcliente; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>