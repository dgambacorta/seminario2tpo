<?php
/* @var $this PuntosController */
/* @var $model Puntos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'puntos-form',
	'enableAjaxValidation'=>false,
)); 

if(Yii::app()->session['nivelAcceso']==1){ //Presencial
?>


<?php }else{ //Web ?>
	
	
	
	
	
	
<?php } ?>

 




<?php $this->endWidget(); ?>

</div><!-- form -->
