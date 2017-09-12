<?php
/* @var $this ItemProductoController */
/* @var $data ItemProducto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idProducto')); ?>:</b>
	<?php echo CHtml::encode($data->idProducto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sabores')); ?>:</b>
	<?php echo CHtml::encode($data->sabores); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPedido')); ?>:</b>
	<?php echo CHtml::encode($data->idPedido); ?>
	<br />


</div>