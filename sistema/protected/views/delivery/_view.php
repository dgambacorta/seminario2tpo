<?php
/* @var $this DeliveryController */
/* @var $data Delivery */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idEmpleadoDelivery')); ?>:</b>
	<?php echo CHtml::encode($data->idEmpleadoDelivery); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idPedido')); ?>:</b>
	<?php echo CHtml::encode($data->idPedido); ?>
	<br />


</div>