<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"></div>
	</div><!-- header -->

	<div>

		
<?php

	$admin = false;
	$atencion = false;
	$cliente = false;
	
	switch(Yii::app()->session['nivelAcceso']){
			
		case 1: $admin = true;		
		break;
		
		case 2: $atencion=true;		
		break;
			
		case 3: $cliente = true;		
		break;			
	}



?>

<?php  $this->widget('bootstrap.widgets.TbNavbar',array(
		'items'=>array(
			array(
				'class'=>'bootstrap.widgets.TbMenu',
				'items'=>array(
				// ADMIN 
				array('label'=>'Sabores',  'items'=>array(
							array('label'=>'Lista de Sabores', 'url'=>array('/sabores/admin'),'visible'=>$admin),
							array('label'=>'Crear Sabor', 'url'=>array('/sabores/create'),'visible'=>$admin),							
							),'visible'=>!Yii::app()->user->isGuest),
				
		
				array('label'=>'Productos', 'items'=>array(
							array('label'=>'Lista de Productos', 'url'=>array('/envase/admin'),'visible'=>$admin),
							array('label'=>'Crear Producto', 'url'=>array('/envase/create'),'visible'=>$admin),
							), 'visible'=>!Yii::app()->user->isGuest),
				/*
				array('label'=>'Promociones', 'items'=>array(
							array('label'=>'Lista de Promociones', 'url'=>array('/promocion/admin'),'visible'=>$admin),
							array('label'=>'Crear Promocion', 'url'=>array('/promocion/create'),'visible'=>$admin),
							), 'visible'=>!Yii::app()->user->isGuest),
							*/
							
				array('label'=>'Usuarios', 'items'=>array(
							array('label'=>'Lista de Usuarios', 'url'=>array('/usuario/admin'),'visible'=>$admin),
							array('label'=>'Crear Usuario', 'url'=>array('/usuario/create'),'visible'=>$admin),
							), 'visible'=>!Yii::app()->user->isGuest),

				// Atencion 

				array('label'=>'Clientes', 'items'=>array(
							array('label'=>'Lista de Clientes', 'url'=>array('/cliente/admin'),'visible'=>$admin),
							//array('label'=>'Crear Cliente', 'url'=>array('/cliente/create'),'visible'=>$admin),
							), 'visible'=>!Yii::app()->user->isGuest),
							
				
				array('label'=>'Despachos', 'items'=>array(
							array('label'=>'Lista de Deliverys', 'url'=>array('/delivery/admin'),'visible'=>$admin),
							
							), 'visible'=>!Yii::app()->user->isGuest),
				
				array('label'=>'Puntos', 'items'=>array(
						
							array('label'=>'Canjear Puntos', 'url'=>array('/pedido/ccanjearpuntos'),'visible'=>$admin||$atencion),
							), 'visible'=>!Yii::app()->user->isGuest),
						
				array('label'=>'Pedido', 'items'=>array(
							array('label'=>'Lista de Pedidos', 'url'=>array('/pedido/admin'),'visible'=>$admin),
							array('label'=>'Crear Pedido', 'url'=>array('/pedido/create'),'visible'=>$admin||$atencion),
							), 'visible'=>!Yii::app()->user->isGuest),
							
				//Cliente 
				/*
				array('label'=>'Pedido', 'items'=>array(
							array('label'=>'Realizar un Pedido', 'url'=>array('/pedido/create')),				
							),'visible'=>$cliente || Yii::app()->user->isGuest ),
							* */
				
				//Generales
						
						
						array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),

						),),),));

				
		 ?>
		
	</div>

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>



	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
