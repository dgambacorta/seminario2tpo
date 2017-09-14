
<h1>Usuarios</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
     'htmlOptions'=>array('style'=>'width: 1100px'),
    'filter'=>$model,
	'template'=>"{items}\n{pager}",
    'columns'=>array(

        array('name'=>'id', 'header'=>'Codigo'),
        array('name'=>'usuario', 'header'=>'Usuario'),
        array('name'=>'nombre', 'header'=>'Nombre'),
        array('name'=>'apellido', 'header'=>'Apellido'),
          array('name'=>'nivelAcceso', 'header'=>'Nivel Acceso'),

        
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{update}{delete}{view}',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>
