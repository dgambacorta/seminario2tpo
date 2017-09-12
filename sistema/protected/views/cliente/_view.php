<?php
/* @var $this ClienteController */
/* @var $data Cliente */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nroCliente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nroCliente), array('view', 'id'=>$data->nroCliente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dni')); ?>:</b>
	<?php echo CHtml::encode($data->dni); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telefono')); ?>:</b>
	<?php echo CHtml::encode($data->telefono); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('domicilio')); ?>:</b>
	<?php echo CHtml::encode($data->domicilio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaNacimiento')); ?>:</b>
	<?php echo CHtml::encode($data->fechaNacimiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fechaAlta')); ?>:</b>
	<?php echo CHtml::encode($data->fechaAlta); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('idUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->idUsuario); ?>
	<br />

	*/ ?>

</div>