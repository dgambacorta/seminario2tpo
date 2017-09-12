<?php
/* @var $this ItemProductoController */
/* @var $model ItemProducto */

$this->breadcrumbs=array(
	'Item Productos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ItemProducto', 'url'=>array('index')),
	array('label'=>'Create ItemProducto', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#item-producto-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Item Productos</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'item-producto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'idProducto',
		'sabores',
		'idPedido',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
