<?php
/* @var $this SaboresController */
/* @var $model Sabores */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sabores-form',
	'enableAjaxValidation'=>false,
)); ?>




	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disponible'); ?>
		<?php echo $form->dropDownList( $model, 'disponible',
              array('1' => 'Activo', '2' => 'Inactivo'));?>
		<?php echo $form->error($model,'disponible'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'categoria'); ?>
		<?php echo $form->dropdownList($model,'categoria',  CHtml::listData(CategoriaSabor::model()->findAll("",(array('order' => 'nombre'))), 'id', 'nombre'),    array('empty'=>'--Seleccione--')); ?>
	
		<?php echo $form->error($model,'categoria'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
