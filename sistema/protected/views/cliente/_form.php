<?php
/* @var $this ClienteController */
/* @var $model Cliente */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cliente-form',
	'enableAjaxValidation'=>false,
)); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'dni'); ?>
		<?php echo $form->textField($model,'dni',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'dni'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'apellido'); ?>
		<?php echo $form->textField($model,'apellido',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'apellido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'domicilio'); ?>
		<?php echo $form->textField($model,'domicilio',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'domicilio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaNacimiento'); ?>
		<?php		
			$this->widget('bootstrap.widgets.TbDatePicker', array(
		    'model' => $model,
		    'attribute' => 'fechaNacimiento',
		    'options' => array(
		    'autoclose' => true,
		    'format' => 'yyyy-mm-dd', )
			));
		 ?>
		<?php echo $form->error($model,'fechaNacimiento'); ?>
	</div>

	<div class="row">

		<?php echo $form->hiddenField($model,'fechaAlta'); ?>
		<?php echo $form->error($model,'fechaAlta'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'idUsuario'); ?>
		<?php //echo $form->textField($model,'idUsuario'); ?>
		<?php //echo $form->error($model,'idUsuario'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
