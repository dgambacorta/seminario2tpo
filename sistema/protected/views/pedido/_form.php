<?php
/* @var $this PedidoController */
/* @var $model Pedido */
/* @var $form CActiveForm */

//$mp = new MP ("1037224406390824", "J2XkbfqvaSRXzjtWxL9K7pd0fy0BRUSx");

if(Yii::app()->session['nivelAcceso']==1){
?>

	<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'pedido-form',
		'enableAjaxValidation'=>true,
	)); ?>	

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_pedido'); ?>
		<?php 
			$readonly = false;			
			echo $form->dropDownList( $model, 'tipo_pedido',
	              array('empty' => '--Seleccione--', '1' => 'No Recurrente','2' => 'Recurrente'),
	   
	              array( 'onChange' => 'javascript:pedido()', 
					'ajax'=>array(
					'type'=>'POST',
					
					'url'=>CController::createUrl('pedido/showuserinfo'),
					'update'=>'#usuario',
				))); 
		?>
		<?php echo $form->error($model,'tipo_pedido'); ?>
	</div>
	
	<?php if($model->tipo_pedido == 1){ ?>
		<div class="row">
			<?php echo $form->labelEx($model,'direccion'); ?>

			<?php echo CHtml::textField('direccion', $model->direccion); ?>
			<?php echo $form->error($model,'direccion'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model,'telefono'); ?>
			<?php echo CHtml::textField('telefono', $model->telefono); ?>
			<?php echo $form->error($model,'telefono'); ?>
		</div>		
		
	<?php  } ?>
		
	<?php if($model->id){			
		if($model->tipo_pedido == 2){
			
			$dni = Cliente::model()->findBySql("select * from Cliente where nroCliente=".$model->idCliente)->dni;			
			echo "<b>Dni Cliente</b><br>" ; 
			echo CHtml::textField("dnicliente", $dni,array('maxlength'=>8)) ;
		}
	}
	?>
	
	<div class="row" id="usuario"></div>
	
	<?php if($model->id){ ?>
		<hr>

		<div class="row">
			<?php echo $form->labelEx($model,'producto'); ?>
			<?php 		
				$foo = CHtml::listData(Envase::model()->findAll(" disponible = 1",(array('order' => 'nombre'))), 'id', 'nombre');
				$res = array('0'=>'--Seleccione--');		
				foreach ($foo as $k=>$v)
					$res[$k] = $v;
				
				echo $form->dropdownList($model,'producto',  
				$res,   
				array( 'onChange' => 'javascript:producto()', 
						'ajax'=>array(
						'type'=>'POST',
						'url'=>CController::createUrl('pedido/addsabores'),
						'update'=>'#sabores',
				)));
					
			
				
				
			?>		
			<?php echo $form->error($model,'producto'); ?>
		</div>

		<div id="sabores"></div>


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
			     
			     //   array('name'=>'estado', 'header'=>'Estado','value'=>'$data->getEstado($data->estado)', 'filter'=>array(CHtml::listData(estado::model()->findAll(), 'idestado', 'estado'))),
			        array(
			            'class'=>'bootstrap.widgets.TbButtonColumn',
			            'template'=>'{delete}',
			            'afterDelete'=>'function(link,success,data){
			    if(success) { // if ajax call was successful !!!
			            window.location.reload();
			        } 
			    }',
			            'htmlOptions'=>array('style'=>'width: 50px'),
			            'buttons'=>array(
			            'delete'=>array('url'=>'Yii::app()->createUrl("itemProducto/delete", array("id"=>$data->id))','imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png','options'=>array('class'=>'delete')),
			            ),
			        ),
			    ),
				));		
			}
	
		if($model->precioTotal){ ?>
	
			<div class="row">
				<?php echo $form->labelEx($model,'precioTotal'); ?>
					<?php echo $form->textField($model,'precioTotal',array('size'=>6,'maxlength'=>6,'readonly'=>true)); ?>
			
			</div>

		<?php } ?>
	
		<div class="row buttons">
			<?php echo CHtml::submitButton('Cargar Productos'); ?>
		</div>	
	</div>

	<hr>
	
	<div class="row">
		<?php echo $form->labelEx($model,'delivery'); ?>
		<?php echo $form->dropDownList( $model, 'delivery',
              array('0' => 'No', '1' => 'Si'));?>
		<?php echo $form->error($model,'delivery'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'pagaCon'); ?>
		<?php echo $form->textField($model,'pagaCon',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'pagaCon'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'horaEntrega'); ?>
		<?php echo $form->textField($model,'horaEntrega',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'horaEntrega'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comentarios'); ?>
		<?php echo $form->textArea($model,'comentarios',array('size'=>60,'maxlength'=>240)); ?>
		<?php echo $form->error($model,'comentarios'); ?>
	</div>
	
<?php } ?>


<?php if(strpos($_SERVER['REQUEST_URI'],"create")!== FALSE){ ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Continuar',array('name' => 'crearpedido')); ?> 
	</div>
		
	<?php }else{ ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Finalizar Pedido', array('name' => 'finalizar')); ?> 
	</div>
	<?php } ?>

<?php $this->endWidget(); ?>

</div><!-- form Clienteeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee -->

<?php }else{ ?>
	

	
	<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'pedido-form',
		'enableAjaxValidation'=>true,
	)); ?>

	<?php if(!$model->id){ 	 ?>
		<div class="row">
			<?php echo $form->labelEx($model,'direccion'); ?>

			<?php echo CHtml::textField('direccion', Yii::app()->session['direccion']); ?>
			<?php echo $form->error($model,'direccion'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model,'telefono'); ?>
			<?php echo CHtml::textField('telefono', Yii::app()->session['telefono']); ?>
			<?php echo $form->error($model,'telefono'); ?>
		</div>
	<?php } ?>

	<?php if($model->id){ ?>
		<hr>

		<div class="row">
			<?php echo $form->labelEx($model,'producto'); ?>
			<?php 		
				$foo = CHtml::listData(Envase::model()->findAll(" disponible = 1",(array('order' => 'nombre'))), 'id', 'nombre');
				$res = array('0'=>'--Seleccione--');		
				foreach ($foo as $k=>$v)
						$res[$k] = $v;
				
				echo $form->dropdownList($model,'producto',  
				$res,   
				array( 'onChange' => 'javascript:producto()', 
						'ajax'=>array(
						'type'=>'POST',
						'url'=>CController::createUrl('pedido/addsabores'),
						'update'=>'#sabores',
					)));				
			?>
		
			<?php echo $form->error($model,'producto'); ?>
		</div>

		<div id="sabores"></div>		
	
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
			     //   array('name'=>'estado', 'header'=>'Estado','value'=>'$data->getEstado($data->estado)', 'filter'=>array(CHtml::listData(estado::model()->findAll(), 'idestado', 'estado'))),
			        array(
			            'class'=>'bootstrap.widgets.TbButtonColumn',
			            'template'=>'{delete}',
			                  'afterDelete'=>'function(link,success,data){
			    if(success) { // if ajax call was successful !!!
			            window.location.reload();
			        } 
			    }',
			            'htmlOptions'=>array('style'=>'width: 50px'),
			            'buttons'=>array(
			            'delete'=>array('url'=>'Yii::app()->createUrl("itemProducto/delete", array("id"=>$data->id))','imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png','options'=>array('class'=>'delete')),
			            ),
			            
			        ),
			    ),
			));			
			}
	
	
			if($model->precioTotal){ ?>
	
				<div class="row">
					<?php echo $form->labelEx($model,'precioTotal'); ?>
					<?php echo $form->textField($model,'precioTotal',array('size'=>6,'maxlength'=>6,'readonly'=>true)); ?>				
				</div>

			<?php }  ?>
	
			<div class="row buttons">
				<?php echo CHtml::submitButton('Cargar Productos'); ?>
			</div>	
		</div>
	<hr>	
	<div class="row">
		<?php echo $form->labelEx($model,'pagaCon'); ?>
		<?php echo $form->textField($model,'pagaCon',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'pagaCon'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'horaEntrega'); ?>
		<?php echo $form->textField($model,'horaEntrega',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'horaEntrega'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comentarios'); ?>
		<?php echo $form->textArea($model,'comentarios',array('size'=>60,'maxlength'=>240)); ?>
		<?php echo $form->error($model,'comentarios'); ?>
	</div>	
		<?php echo $form->hiddenField($model,'delivery',array('size'=>6,'maxlength'=>6,'value'=>'1')); ?>	
	<?php }  
	
	if(Yii::app()->session['nivelAcceso']==2 && strpos($_SERVER['REQUEST_URI'],"create")=== FALSE && $model->precioTotal != 0){
		
		
		
			$precio = intval($model->precioTotal); 
			
			/*
			$mp = new MP('1037224406390824', 'J2XkbfqvaSRXzjtWxL9K7pd0fy0BRUSx');

			$preference_data = array(
				"items" => array(
					array(
						"title" => "Helado",
						"quantity" => 1,
						"currency_id" => "ARS", // Available currencies at: https://api.mercadopago.com/currencies
						"unit_price" => $precio
					)
				)
			);

			$preference = $mp->create_preference($preference_data);
			*/

	?>	
	
	<div class="row buttons">
		<a  style ="background-color: #4CAF50; border: none; color: white; padding: 5px 15px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px;" href="#">Pagar</a>
	</div>
	<?php } ?>



	<?php 
		if(strpos($_SERVER['REQUEST_URI'],"create")!== FALSE){ ?>
			<div class="row buttons">
				<?php echo CHtml::submitButton('Continuar',array('name' => 'crearpedido')); ?> 
			</div>
			
		<?php }else{ ?>
			<div class="row buttons">
				<?php echo CHtml::submitButton('Finalizar Pedido', array('name' => 'finalizar')); ?> 
			</div>
		<?php } 
	?>

<?php $this->endWidget(); ?>

</div><!-- form -->
	
<?php } ?>
