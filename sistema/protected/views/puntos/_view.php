<?php
/* @var $this PuntosController */
/* @var $data Puntos */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaDesde')); ?>:</b>
	<?php echo CHtml::encode($data->fechaDesde); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaHasta')); ?>:</b>
	<?php echo CHtml::encode($data->fechaHasta); ?>
	<br />


</div>