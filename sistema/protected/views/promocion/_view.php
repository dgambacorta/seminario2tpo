<?php
/* @var $this PromocionController */
/* @var $data Promocion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaDesde')); ?>:</b>
	<?php echo CHtml::encode($data->fechaDesde); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaHasta')); ?>:</b>
	<?php echo CHtml::encode($data->fechaHasta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidadPuntos')); ?>:</b>
	<?php echo CHtml::encode($data->cantidadPuntos); ?>
	<br />


</div>