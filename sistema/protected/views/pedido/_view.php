<?php
/* @var $this PedidoController */
/* @var $data Pedido */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCliente')); ?>:</b>
	<?php echo CHtml::encode($data->idCliente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pagaCon')); ?>:</b>
	<?php echo CHtml::encode($data->pagaCon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precioTotal')); ?>:</b>
	<?php echo CHtml::encode($data->precioTotal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horaEntrega')); ?>:</b>
	<?php echo CHtml::encode($data->horaEntrega); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comentarios')); ?>:</b>
	<?php echo CHtml::encode($data->comentarios); ?>
	<br />


</div>