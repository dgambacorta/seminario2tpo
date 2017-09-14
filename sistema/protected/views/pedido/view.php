<?php 
if(Yii::app()->session['nivelAcceso']==1){ 
	
	if($model->pagaCon == 'punto'){
		$canje = ' - Canje';
	}else{
		$canje = '';
	}
		
?>
	<h1>Detalle del Pedido <?php echo $canje; ?></h1>
<?php }else{ ?>	
	<h1>Detalle del Pedido</h1>
<?php } ?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pedido-form',
	'enableAjaxValidation'=>true,
)); ?>	

	<?php 

	$delivery = $model->getDelivery();
	if(Yii::app()->session['nivelAcceso']==2){ ?>		
	<h4 style="color:#23AD37 !important;">Ha realizado el pedido en forma exitosa!</h4>		
	<?php } ?>
	
	<?php if($model->idCliente == 0 && $delivery != NULL ){ ?>
		<h3>Datos del Cliente</h3>
			<div class="row">
				<?php echo $form->labelEx($model,'direccion'); ?>
				<?php echo CHtml::textField('direccion', $model->direccion, array('readonly'=>true)); ?>		
			</div>
			<div class="row">
				<?php echo $form->labelEx($model,'telefono'); ?>
				<?php echo CHtml::textField('telefono', $model->telefono, array('readonly'=>true)); ?>
			
			</div>
	<?php  }elseif($model->idCliente != 0){
	echo "<h3>Datos del Cliente</h3>";

	$cliente = $model->getCliente();

	$puntos =  $model->calcularPuntosDisponibles();
		
		echo "<div class=\"row\"><b>Fecha:</b> ".$model->fecha."	</div>";	
		echo "<div class=\"row\"><b>Nombre:</b> ".$cliente->nombre."	</div>";
		echo "<div class=\"row\"><b>Apellido:</b> ".$cliente->apellido."	</div>";
		echo "<div class=\"row\"><b>Dirección:</b> ".$cliente->domicilio."	</div>";
		echo "<div class=\"row\"><b>Telefono:</b> ".$cliente->telefono."	</div>";			
	}
	?>

	

	<h3>Datos del Producto</h3>
	<div class="row">
	<?php
	
		$IP = new ItemProducto();
		$existeIP = $IP->existeIP($model->id);
		if($existeIP == true){
			
			$this->widget('bootstrap.widgets.TbGridView', array(
		    'type'=>'striped bordered condensed',
		    'dataProvider'=>$IP->search($model->id),
		    'htmlOptions'=>array('style'=>'width: 750px'),
		    'template'=>"{items}\n{pager}",
		    'columns'=>array(
		        array('name'=>'idProducto', 'header'=>'Producto','value'=>'$data->getProducto($data->idProducto)'),        
		        array('name'=>'sabores', 'header'=>'Sabores','value'=>'$data->getSabores($data->sabores)'),
				),
			));
			if($model->pagaCon != 'punto'){
	?>
	
				<div class="row">
					<?php echo "<b>Precio Total:</b> $".$model->precioTotal; }?>
				</div>
	
				<?php 
				

				if($delivery != NULL){
					
					echo "<h3>Datos del Envio</h3>";						
					echo "<div class=\"row\"><b>Dirección:</b> ".$model->direccion."	</div>";
					echo "<div class=\"row\"><b>Telefono:</b> ".$model->telefono."	</div>";						
					if($model->pagado == 1){
						echo "<div class=\"row\"><b>Forma de Pago:</b> Internet </div>";
					}else{
						echo "<div class=\"row\"><b>Forma de Pago:</b> En Domicilio </div>";
					}
				
					if($model->pagaCon!= 'punto' && $model->pagado ==0){
						echo "<div class=\"row\"><b>Paga con</b> ".$model->pagaCon."	</div>";
					}
					if($model->horaEntrega){
						echo "<div class=\"row\"><b>Horario de Entrega:</b> ".$model->horaEntrega."</div>";
					}
			
				}
				
				?>
				<div class="row">
					<?php echo $form->labelEx($model,'comentarios'); ?>
					<?php echo $form->textArea($model,'comentarios',array('size'=>60,'maxlength'=>240,'readonly'=>true)); ?>

				</div>
	
		<?php } ?>


<?php $this->endWidget(); ?>

</div><!-- form Clienteeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee -->




