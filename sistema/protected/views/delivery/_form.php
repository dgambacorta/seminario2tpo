<?php
/* @var $this DeliveryController */
/* @var $model Delivery */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'delivery-form',
	'enableAjaxValidation'=>false,
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idEmpleadoDelivery'); ?>
		<?php echo $form->dropDownList( $model, 'idEmpleadoDelivery',
              array('1' => '--Seleccione--', '2' => 'Inactivo'));?>
		<?php echo $form->error($model,'idEmpleadoDelivery'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idPedido'); ?>
		<?php echo $form->dropDownList( $model, 'idPedido',
              array('1' => '--Seleccione--', '2' => 'Inactivo'));?>
		<?php echo $form->error($model,'idPedido'); ?>
	</div>

	<div class="row buttons">
	<?php echo CHtml::submitButton('Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
