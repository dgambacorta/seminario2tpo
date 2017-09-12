<?php
/* @var $this DeliveryController */
/* @var $model Delivery */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idEmpleadoDelivery'); ?>
		<?php echo $form->textField($model,'idEmpleadoDelivery'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idPedido'); ?>
		<?php echo $form->textField($model,'idPedido'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->