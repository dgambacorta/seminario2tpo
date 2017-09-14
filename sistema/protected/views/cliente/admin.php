
<h1>Clientes</h1>


<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
     'htmlOptions'=>array('style'=>'width: 1100px'),
    'filter'=>$model,
	'template'=>"{items}\n{pager}",
    'columns'=>array(

        array('name'=>'nroCliente', 'header'=>'Nro Cliente'),
        array('name'=>'dni', 'header'=>'DNI'),
        array('name'=>'telefono', 'header'=>'Telefono'),
        array('name'=>'email', 'header'=>'Email'),
        array('name'=>'domicilio', 'header'=>'Domicilio'),
               array('name'=>'fechaNacimiento', 'header'=>'Fecha de Nacimiento'),
        
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{update}{delete}{view}',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>

