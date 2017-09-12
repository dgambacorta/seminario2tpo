<h1>Pedidos</h1>



<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
     'htmlOptions'=>array('style'=>'width: 1100px'),
    'filter'=>$model,
	'template'=>"{items}\n{pager}",
    'columns'=>array(

        array('name'=>'id', 'header'=>'Codigo'),
        array('name'=>'idCliente', 'header'=>'Nro Cliente'),
        array('name'=>'fecha', 'header'=>'Fecha'),
     //   array('name'=>'pagaCon', 'header'=>'Paga Con'),
        array('name'=>'precioTotal', 'header'=>'Precio Total'),
		//array('name'=>'horaEntrega', 'header'=>'Hora Entrega'),
      
        
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view}',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>
