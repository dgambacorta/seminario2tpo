<?php
/* @var $this PuntosClienteController */
/* @var $data PuntosCliente */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idcliente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idcliente), array('view', 'id'=>$data->idcliente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idpuntos')); ?>:</b>
	<?php echo CHtml::encode($data->idpuntos); ?>
	<br />


</div>