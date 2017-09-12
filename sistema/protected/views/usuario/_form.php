<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>false,
)); ?>



	<div class="row">
		<?php echo $form->labelEx($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellido'); ?>
		<?php echo $form->textField($model,'apellido',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'apellido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nivelAcceso'); ?>
	<?php echo $form->dropdownList($model,'nivelAcceso',  CHtml::listData(NivelAcceso::model()->findAll("",(array('order' => 'nombre'))), 'id', 'nombre'),    array('empty'=>'--Seleccione--')); ?>
	
		<?php echo $form->error($model,'nivelAcceso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estado'); ?>		
		<?php echo $form->dropDownList( $model, 'estado',
              array('1' => 'Activo', '2' => 'Inactivo'));?>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
