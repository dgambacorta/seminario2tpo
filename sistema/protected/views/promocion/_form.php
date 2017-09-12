<?php
/* @var $this PromocionController */
/* @var $model Promocion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'promocion-form',
	'enableAjaxValidation'=>false,
)); ?>



	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaDesde'); ?>
		<?php echo $form->textField($model,'fechaDesde'); ?>
		<?php echo $form->error($model,'fechaDesde'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaHasta'); ?>
		<?php echo $form->textField($model,'fechaHasta'); ?>
		<?php echo $form->error($model,'fechaHasta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidadPuntos'); ?>
		<?php echo $form->textField($model,'cantidadPuntos'); ?>
		<?php echo $form->error($model,'cantidadPuntos'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
