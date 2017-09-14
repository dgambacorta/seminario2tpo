<?php $this->pageTitle=Yii::app()->name . ' - Login'; ?>


<div style="margin-top: 150px;
  margin-bottom: 80px;">
	<div class="container" style="margin: auto; width: 400px; margin-left: auto; margin-right: auto; background: #FFF;     padding: 15px 35px 45px; box-shadow: 2px 2px 4px 2px rgba(0,0,0,0.3);  ">
		<h1 style="margin-left: 2.3em;">Login</h1>

		<?php
		    foreach(Yii::app()->user->getFlashes() as $key => $message) {
		        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
		    }
		?>
			<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'login-form',
				'enableClientValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
			)); ?>


			<div class="row" style="text-align: center;">				
				<?php echo $form->textField($model,'username',array('placeholder'=>'Usuario')); ?>
				<?php echo $form->error($model,'username'); ?>
			</div>
			<div class="row" style="text-align: center;">			
				<?php echo $form->passwordField($model,'password',array('placeholder'=>'Clave')); ?>
				<?php echo $form->error($model,'password'); ?>				
			</div>
			<div class="row buttons ingresar">
				<?php echo CHtml::submitButton('Ingresar',array('class' => 'btn btn-lg btn-primary btn-block','style'=>'margin: auto !important; width: 55% !important; margin-botom:5px !important;  ')); ?>
			</div>

			<div class="row" style="text-align: center; padding-top: 1.5em;">
				<?php echo CHtml::link('¿Olvidaste tu Contraseña?',array('site/password')); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<br><br><br><br><br><br><br><br><br><br><br>
<div  style=" position: absolute; text-align: center;
    bottom: 0;
    width: 100%;
    height: 55px;    
    /*border-top: 1px solid black;*/
    color: white;    
    /*font-weight: bold;*/
    font-size: 12px;
    background-color: rgba(0, 0, 0, 0.15);
    padding-top: 5px;
    padding-bottom: 5px; padding-right: 0px !important;">

	
		Copyright &copy; <?php echo date('Y'); ?> by G4.<br/>
		All Rights Reserved.<br/>
	<div>
