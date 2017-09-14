<h1>Puntos</h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
     'htmlOptions'=>array('style'=>'width: 1100px'),
    'filter'=>$model,
	'template'=>"{items}\n{pager}",
    'columns'=>array(

        array('name'=>'id', 'header'=>'Codigo'),
        array('name'=>'cantidad', 'header'=>'Puntos'),
        array('name'=>'fechaDesde', 'header'=>'Fecha Desde'),
        array('name'=>'fechaHasta', 'header'=>'Fecha Hasta'),


        
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{update}{delete}{view}',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>
