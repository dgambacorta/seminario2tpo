

<h1>Promocion #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'fechaDesde',
		'fechaHasta',
		'cantidadPuntos',
	),
)); ?>
