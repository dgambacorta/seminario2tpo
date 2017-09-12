<?php
/* @var $this ItemProductoController */
/* @var $model ItemProducto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'item-producto-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idProducto'); ?>
		<?php echo $form->textField($model,'idProducto'); ?>
		<?php echo $form->error($model,'idProducto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sabores'); ?>
		<?php echo $form->textField($model,'sabores',array('size'=>60,'maxlength'=>240)); ?>
		<?php echo $form->error($model,'sabores'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idPedido'); ?>
		<?php echo $form->textField($model,'idPedido'); ?>
		<?php echo $form->error($model,'idPedido'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->