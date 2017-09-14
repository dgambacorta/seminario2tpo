<?php
/* @var $this PuntosClienteController */
/* @var $model PuntosCliente */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'puntos-cliente-form',
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idcliente'); ?>
		<?php echo $form->textField($model,'idcliente'); ?>
		<?php echo $form->error($model,'idcliente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idpuntos'); ?>
		<?php echo $form->textField($model,'idpuntos'); ?>
		<?php echo $form->error($model,'idpuntos'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
