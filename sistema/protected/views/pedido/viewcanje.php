<h1>Detalle del Pedido - Canje de Puntos</h1>

<?php
/* @var $this PedidoController */
/* @var $model Pedido */
/* @var $form CActiveForm */

$delivery = Delivery::model()->findBySql("select * from Despacho where idPedido = ".intval($model->id));
$cliente = Cliente::model()->findBySql("select * from Cliente where nroCliente=".intval($model->idCliente));
$puntos = Cliente::model()->calcularPuntosDisponibles($cliente->nroCliente);
?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pedido-form',
	'enableAjaxValidation'=>true,
)); ?>	

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
	
		if($puntos > 0){
			echo "<div class=\"row\"><b>Puntos Acumulados:</b> ".$puntos."	</div>";
		}
	?>
	<?php 	

		if($delivery != NULL){			
			echo "<h3>Datos del Envio</h3>";		
			echo "<div class=\"row\"><b>Dirección:</b> ".$model->direccion."	</div>";
			echo "<div class=\"row\"><b>Telefono:</b> ".$model->telefono."	</div>";
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




