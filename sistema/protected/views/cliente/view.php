
<h1>Ver Cliente </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nroCliente',
		'dni',
		'telefono',
		'email',
		'domicilio',
		//'fechaNacimiento',
		//'fechaAlta',
		//'idUsuario',
	),
)); ?>
