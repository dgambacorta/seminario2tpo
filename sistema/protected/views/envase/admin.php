<?php
/* @var $this EnvaseController */
/* @var $model Envase */


?>

<h1>Administrar Envases</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
     'htmlOptions'=>array('style'=>'width: 1100px'),
    'filter'=>$model,
    'template'=>"{items}\n{pager}",
    'columns'=>array(
        array('name'=>'id', 'header'=>'Codigo'),
        array('name'=>'nombre', 'header'=>'Nombre'),
      	array('name'=>'disponible', 'header'=>'Estado', 'value'=>'$data->getEstado($data->disponible)'),
        
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{update}',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>

