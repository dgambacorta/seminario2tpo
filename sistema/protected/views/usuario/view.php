

<h1>Ver Usuario</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'usuario',
		//'password',
		'nombre',
		'apellido',
		//'nivelAcceso',
		//'estado',
	),
)); ?>
