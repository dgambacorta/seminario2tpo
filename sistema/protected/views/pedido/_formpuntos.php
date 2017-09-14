<?php
/* @var $this PedidoController */
/* @var $model Pedido */
/* @var $form CActiveForm */

if(Yii::app()->session['nivelAcceso']==1){
?>



<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'pedido-form',
		'enableAjaxValidation'=>true,
	)); ?>

	<?php if(!$model->id){ ?>
		<div class="row">
			<?php echo $form->labelEx($model,'DNI de Cliente'); ?>
			<?php echo $form->textField($model,'dnicliente',array('size'=>5,'maxlength'=>8)); ?>
			<?php echo $form->error($model,'dnicliente'); ?>
		</div>
	<?php } ?>		
	
	<?php 
		if($model->id){ 			
			$ptosUsados = 0;			
			$ptosDisp = Cliente::model()->calcularPuntosDisponibles($model->idCliente); 			
			$ptosUsados = Pedido::model()->getPuntosNecesarios($model->id);			
			$ptosDisp = $ptosDisp - $ptosUsados;		
		?>
		
		<div class="row">
			<?php echo $form->labelEx($model,'Puntos Disponibles'); ?>
			<?php echo CHtml::textField('puntosCliente', $ptosDisp,array('readonly'=>true)); ?>		
		</div>		
		<hr>
		<div class="row">
			<?php echo $form->labelEx($model,'producto'); ?>
			<?php 		
				$foo = CHtml::listData(Envase::model()->findAll(" disponible = 1 and puntosNec <= {$ptosDisp} ",(array('order' => 'nombre'))), 'id', 'nombre');
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
	
	?>
		
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
		<?php echo $form->labelEx($model,'horaEntrega'); ?>
		<?php echo $form->textField($model,'horaEntrega',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'horaEntrega'); ?>
	</div>
	
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

	<div class="row">
		<?php echo $form->labelEx($model,'comentarios'); ?>
		<?php echo $form->textArea($model,'comentarios',array('size'=>60,'maxlength'=>240)); ?>
		<?php echo $form->error($model,'comentarios'); ?>
	</div>
	
	<?php } ?>


	<?php if(strpos($_SERVER['REQUEST_URI'],"ccanjearpuntos")!== FALSE){ ?>
		<div class="row buttons">
			<?php echo CHtml::submitButton('Continuar',array('name' => 'crearcanje')); ?> 
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

	<?php if($model->id){ 				
		$ptosUsados = 0;		
		$ptosDisp = Cliente::model()->calcularPuntosDisponibles($model->idCliente);		
		$ptosUsados = Pedido::model()->getPuntosNecesarios($model->id);		
		$ptosDisp = $ptosDisp - $ptosUsados;		
	?>		
		
	<div class="row">
		<?php echo $form->labelEx($model,'Puntos Disponibles'); ?>
		<?php echo CHtml::textField('puntosCliente', $ptosDisp,array('readonly'=>true)); ?>	
	</div>
	<hr>

	<div class="row">
		<?php echo $form->labelEx($model,'producto'); ?>
		<?php 		
			$foo = CHtml::listData(Envase::model()->findAll(" disponible = 1 and puntosNec <= {$ptosDisp} ",(array('order' => 'nombre'))), 'id', 'nombre');
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
	
	 ?>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Cargar Productos'); ?>
	</div>	
	</div>
	<hr>
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
	
	<?php }  ?>

	<?php if(strpos($_SERVER['REQUEST_URI'],"ccanjearpuntos")!== FALSE){ ?>
		<div class="row buttons">
			<?php echo CHtml::submitButton('Continuar',array('name' => 'crearcanje')); ?> 
		</div>
			
	<?php }else{ ?>
		<div class="row buttons">
			<?php echo CHtml::submitButton('Finalizar Pedido', array('name' => 'finalizar')); ?> 
		</div>
	<?php } ?>

<?php $this->endWidget(); ?>

</div><!-- form -->
	
<?php } ?>
