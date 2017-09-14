
<h1>Delivery</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
     'htmlOptions'=>array('style'=>'width: 1100px'),
    'filter'=>$model,
	'template'=>"{items}\n{pager}",
    'columns'=>array(

        array('name'=>'id', 'header'=>'Codigo'),
        array('name'=>'idEmpleadoDelivery', 'header'=>'Empleado','value'=>'$data->getEmpleado($data->idEmpleadoDelivery)'),
        array('name'=>'idPedido', 'header'=>'Pedido'),
		
        
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view}',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>


