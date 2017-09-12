<?php
/* @var $this EnvaseController */
/* @var $model Envase */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'envase-form',

	'enableAjaxValidation'=>false,
)); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'precio'); ?>
		<?php echo $form->textField($model,'precio',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'precio'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'puntosNec'); ?>
		<?php echo $form->textField($model,'puntosNec',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'puntosNec'); ?>
	</div>
	
		
	<div class="row">
		<?php echo $form->labelEx($model,'puntosOtorga'); ?>
		<?php echo $form->textField($model,'puntosOtorga',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'puntosOtorga'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'cantidadSabores'); ?>
		<?php echo $form->dropDownList( $model, 'cantidadSabores',
              array('empty'=>'--Seleccione--','1' => '1', '2' => '2','3' => '3','4' => '4','5' => '5','6' => '6','7' => '7','8' => '8'));?>
		<?php echo $form->error($model,'cantidadSabores'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disponible'); ?>
			<?php echo $form->dropDownList( $model, 'disponible',
              array('1' => 'Activo', '2' => 'Inactivo'));?>
		<?php echo $form->error($model,'disponible'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
