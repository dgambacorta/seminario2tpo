<?php

//require_once ('mercadopago.php');

class PedidoController extends Controller
{

	const PUNTOS = 3;

	const ERROR = 1;
	const NORECURRENTE = 1;
	const RECURRENTE = 2;
	const PUNTOS = 3;
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','showuserinfo','addsabores','additemproducto'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','ccanjearpuntos','ucanjearpuntos','viewcanje'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
		public function actionViewcanje($id)
	{
		$this->render('viewcanje',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pedido;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['crearpedido'])){
		
			if(isset($_POST['Pedido']['tipo_pedido'])) {
				$flag = 0;
				if($_POST['Pedido']['tipo_pedido'] == 'empty'){				
					$mensaje = "Debe indicar el tipo de pedido!";
					$flag = ERROR;			
				}
				
				if($_POST['Pedido']['tipo_pedido'] == '2' && $_POST['dnicliente']=='' ){
					$mensaje = "Debe indicar el DNI del cliente";
					$flag = ERROR;				
				}
		
				if($flag == ERROR){
					Yii::app()->user->setFlash('error', $mensaje);
					$this->redirect(array('create'));
				}		
			}	
		
			if(isset($_POST['Pedido']) || isset($_POST['direccion'])){			

				if(isset($_POST['Pedido'])){
					$model->attributes=$_POST['Pedido'];
				}
				
				$model->fecha = date("Y/m/d");
				
				if(isset($_POST['Pedido'])){
				
					if($_POST['Pedido']['tipo_pedido'] == NORECURRENTE){
						$model->tipo_pedido = mysqli_real_escape_string($_POST['Pedido']['tipo_pedido']);
						$model->direccion = mysqli_real_escape_string($_POST['direccion']);
						$model->telefono = mysqli_real_escape_string($_POST['telefono']);
					
					}
				}
			
				if(Yii::app()->session['nivelAcceso'] == RECURRENTE){
					
					$model->tipo_pedido = RECURRENTE;
					$model->direccion = mysqli_real_escape_string($_POST['direccion']);
					$model->telefono = mysqli_real_escape_string($_POST['telefono']);
					$model->idCliente = Yii::app()->session['nroCliente'];
					$existe = 1;	
				}	
			
				if($model->tipo_pedido == RECURRENTE && Yii::app()->session['nivelAcceso']==1){
					$dni = intval($_POST['dnicliente']);
					$existe = Cliente::model()->find('dni = '.$dni);
					$cliente = Cliente::model()->findBySql("select * from Cliente where dni=".$dni);
					if(isset($cliente)){
						$model->idCliente = $cliente->nroCliente;
					}
					
				}elseif($model->tipo_pedido == NORECURRENTE){
					$existe = 1;				
				}
			
				if($existe == null) {
					
					Yii::app()->user->setFlash('error', "El cliente no existe en el sistema. Verifique los datos ingresados.");
					$this->redirect(array('create'));
				}else{	
				
					if($model->save())
						$this->redirect(array('update','id'=>$model->id));
				}
			}
		}
		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	private function  tienePuntosCanje($id){
		
		
		$puntosDisponibles = Yii::app()->db->createCommand()
					->select('pc.idpuntos')
					->from('Puntos_Cliente pc')
					->join('Puntos p', 'pc.idpuntos=p.id')
					->where('pc.idcliente='.intval($id).' and p.estado=1')
					->order('p.cantidad ASC')
					->queryAll();
		
		$puntosMenorProducto = Yii::app()->db->createCommand()
					->select('min(puntosNec) as min')
					->from('Producto')
					->limit('1')		
					->queryAll();
					
		$total = 0;
		foreach($puntosDisponibles as $v){
			$subtotal = Puntos::model()->getPuntos($v['idpuntos']);
			$total = $total + $subtotal;
		}
			
		$puntosDisponibles = intval($total);	
		$puntosMenorProducto = intval($puntosMenorProducto[0]['min']);
	
		if($puntosDisponibles >= $puntosMenorProducto ){
			return true;
		}else{
			return false;
		}	
		
	}
	
	/*Canje de Puntos */
	public function actionCcanjearpuntos()
	{
		$model=new Pedido;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['crearcanje'])){
			if(isset($_POST['Pedido']) || isset($_POST['direccion'])){
				$model->fecha = date("Y/m/d");
				$model->pagaCon = 'Puntos';
				$model->precioTotal = 0;		
				$model->tipo_pedido = PUNTOS; 
				/* No tiene productos cargados */
				if(Yii::app()->session['nivelAcceso']==1){ //ADMIN /* TODO  - Sacar hardcore*/			
				
					$dni = intval($_POST['Pedido']['dnicliente']); /* TODO Porque es post y no session??? */				
					$existe = Cliente::model()->find('dni = '.$dni);	
					if($existe != null){			
						$cliente = Cliente::model()->findBySql("select * from Cliente where dni=".$dni);					
						$model->idCliente = $cliente->nroCliente;				
						$tiene = $this->tienePuntosCanje($model->idCliente);
												
						if(!$tiene){							
								Yii::app()->user->setFlash('error', "No tiene puntos disponibles para realizar un canje!");
								$this->redirect(array('ccanjearpuntos'));							
						}
						
						$model->direccion = $cliente->domicilio;
						$model->telefono = $cliente->telefono;				
					}
				}
						
				if(Yii::app()->session['nivelAcceso']==2){ //Cliente					

					$model->direccion = mysqli_real_escape_string($_POST['direccion']);
					$model->telefono = 	mysqli_real_escape_string($_POST['telefono']);
					$model->idCliente = Yii::app()->session['nroCliente'];					
					$tiene = $this->tienePuntosCanje($model->idCliente);	
							
					if(!$tiene){						
						Yii::app()->user->setFlash('error', "No tiene puntos disponibles para realizar un canje!");
						$this->redirect(array('ccanjearpuntos'));						
					}				
					
					$existe = 1;	
				}
			
				
				if($existe == null) {					
					Yii::app()->user->setFlash('error', "El cliente no existe en el sistema. Verifique los datos ingresados.");
					$this->redirect(array('ccanjearpuntos'));
				}else{	
				
					if($model->save()){		
						$this->redirect(array('ucanjearpuntos','id'=>$model->id));
					}
				}
			}
		}
		$this->render('ccanjearpuntos',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);	

		if(isset($_POST['finalizar'])){
			$model->attributes=$_POST['Pedido'];			
			
			//No tiene productos cargados			
			 $productos = Yii::app()->db->createCommand()
			->select('idProducto')
			->from('ItemProducto')
			->where('idPedido='.$model->id)
			->queryAll();
			
			if(empty($productos)){				
				Yii::app()->user->setFlash('error', 'Debe ingresar productos para finalizar el pedido');
				$this->redirect(array('update','id'=>$model->id));				
			}
			
			
			//Tiene DNI
			if($model->tipo_pedido == RECURRENTE && Yii::app()->session['nivelAcceso']==1){
				$dni = intval($_POST['dnicliente']);
				$existe = Cliente::model()->find('dni = '.$dni);
				$cliente = Cliente::model()->findBySql("select * from Cliente where dni=".$dni);
				if($existe == null) {				
					Yii::app()->user->setFlash('error', "El cliente no existe en el sistema. Verifique los datos ingresados.");
					$this->redirect(array('update','id'=>$model->id));
				}else{
					
					$model->idCliente = $cliente->nroCliente;
					$model->direccion =  $cliente->domicilio;
					$model->telefono =  $cliente->telefono;
					$totalPuntos = Pedido::model()->getPuntos($model->id);				
					$puntos = new Puntos();
					$puntos->cantidad = $totalPuntos;
					
					if($puntos->save()){
					
						$pc = new PuntosCliente;
						$pc->idcliente = $cliente->nroCliente;
						$pc->idpuntos = $puntos->id;
						$pc->save();					
					}
				}
			}
			
			if(Yii::app()->session['nivelAcceso']==2){
			
				$model->tipo_pedido = RECURRENTE;					
				$totalPuntos = Pedido::model()->getPuntos($model->id);				
				$puntos = new Puntos();
				$puntos->cantidad = $totalPuntos;
				$puntos->estado = 1;
				if($puntos->save()){
					
					$pc = new PuntosCliente;
					$pc->idcliente = Yii::app()->session['nroCliente'];
					$pc->idpuntos = $puntos->id;
					$pc->save();
						
				}
			}
			
			//No tiene DNI
			
			if($model->tipo_pedido == NORECURRENTE){			
				if($_POST['Pedido']['delivery'] == 1) {
					if($_POST['direccion']==''){
					Yii::app()->user->setFlash('error', 'Debe indicar un domicilio a donde enviar el delivery');
					$this->redirect(array('update','id'=>$model->id));				
					}
				}				
				$model->direccion = mysqli_real_escape_string($_POST['direccion']);
				$model->telefono = mysqli_real_escape_string($_POST['telefono']);
			}	
						
			
			//if delivery, crear orden de despacho
			if($_POST['Pedido']['delivery'] == 1 || Yii::app()->session['nivelAcceso']==2 ){			
				
				$despacho = new Delivery();
				$despacho->idPedido = $model->id;
				$despacho->idEmpleadoDelivery = $despacho->getEmpleadoDelivery();
						
				//if, usuario, asignar puntos y asigna cliente a despacho
				if($model->tipo_pedido == RECURRENTE && Yii::app()->session['nivelAcceso']==1 ){			
					$despacho->idCliente = $cliente->nroCliente;
				}elseif(Yii::app()->session['nivelAcceso']==2){
					$despacho->idCliente = Yii::app()->session['nroCliente'];
				}		
			
				$despacho->save();
			
			}
			
			//calcular total					
			$total = Pedido::model()->getTotal($model->id);			
			$model->precioTotal = $total;			
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id));
			}
			
		}else{

			if(isset($_POST['Pedido']))	{
				$total = 0;
		
				if(isset($_POST['Pedido']['producto'])){
					if($_POST['Pedido']['producto'] != 0){
						$existeSabores = false;
						foreach($_POST['sabores'] as $k=>$v){
							if($v != '' && $v != 0 )
							$existeSabores = true;							
						}							
			
						if($existeSabores){
							$itemProd = new ItemProducto();
							$itemProd->idProducto = mysqli_real_escape_string($_POST['Pedido']['producto']);
							$itemProd->sabores = json_encode($_POST['sabores']);
							$itemProd->idPedido = $model->id;
							$itemProd->save();							
		
						}else{
							Yii::app()->user->setFlash('error', "Debe Ingresar algún sabor para el producto elegido.");
							$this->redirect(array('update','id'=>$model->id));						
						}
					}
				}
		
				$model->attributes=$_POST['Pedido'];
				$total = Pedido::model()->getTotal($model->id);				
				$model->precioTotal = $total;
				if($model->save()){
					$this->redirect(array('update','id'=>$model->id));
				}
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	
	/* Canjear Puntos **/
	
	public function actionUcanjearpuntos($id)
	{
		$model=$this->loadModel($id);

		if(isset($_POST['finalizar'])){			
			
			/* No tiene productos cargados */
					
			$productos = Yii::app()->db->createCommand()
			->select('idProducto')
			->from('ItemProducto')
			->where('idPedido='.$model->id)
			->queryAll();
			
			if(empty($productos)){				
				Yii::app()->user->setFlash('error', 'Debe ingresar productos para finalizar el pedido');
				$this->redirect(array('ucanjearpuntos','id'=>$model->id));					
				
			}
			
			/* No tiene productos cargados */			
			
			$model->attributes=$_POST['Pedido'];
			if(Yii::app()->session['nivelAcceso']==1){
				$model->direccion =  mysqli_real_escape_string($_POST['direccion']);
				$model->telefono =  mysqli_real_escape_string($_POST['telefono']);
			}
										
			//if delivery, crear orden de despacho
			if($_POST['Pedido']['delivery'] == 1 || Yii::app()->session['nivelAcceso']==2 ){	
				
				$despacho = new Delivery();
				$despacho->idPedido = $model->id;
				$despacho->idEmpleadoDelivery = $despacho->getEmpleadoDelivery();
				$despacho->idCliente = $model->idCliente;			
				$despacho->save();
			
			}
			
			if($model->save()){				
				
				//descontarPuntos
			
				$puntosBaja = Pedido::model()->getPuntosNecesarios($model->id);				
				$puntos = Yii::app()->db->createCommand()
					->select('pc.idpuntos')
					->from('Puntos_Cliente pc')
					->join('Puntos p', 'pc.idpuntos=p.id')
					->where('pc.idcliente='.intval($model->idCliente).' and p.estado=1')
					->order('p.cantidad ASC')
					->queryAll();					
				foreach($puntos as $v){
					$subtotal = Puntos::model()->getPuntos($v['idpuntos']);					
					$f = 0;
			
					if($puntosBaja > 0 && $subtotal > 0 ){
						if($subtotal <= $puntosBaja ){
													
							$post=Puntos::model()->findByPk($v['idpuntos']);
							$post->estado=0;
							$post->save();							
							$puntosBaja = $puntosBaja - $subtotal;
							$f = 1; /* todo */
						}				
					
						if($subtotal > $puntosBaja && $f==0 ){				
						
							$res = $subtotal - $puntosBaja;							
							$post=Puntos::model()->findByPk($v['idpuntos']);
							$post->cantidad=$res;
							$post->save();
							
							$puntosBaja = 0;
						}						
					}		
				}								
				$this->redirect(array('viewcanje','id'=>$model->id));			
			}
		}else{

			if(isset($_POST['Pedido'])){
				$total = 0;		
				if(isset($_POST['Pedido']['producto'])){
					if($_POST['Pedido']['producto'] != 0){
						$existeSabores = false;
						foreach($_POST['sabores'] as $k=>$v){
							if($v != '' && $v != 0 )
							$existeSabores = true;							
						}				
			
						if($existeSabores){
							$itemProd = new ItemProducto();
							$itemProd->idProducto = $_POST['Pedido']['producto'];
							$itemProd->sabores = json_encode($_POST['sabores']);
							$itemProd->idPedido = $model->id;
							$itemProd->save();								
		
						}else{
							Yii::app()->user->setFlash('error', "Debe Ingresar algún sabor para el producto elegido.");
							$this->redirect(array('ucanjearpuntos','id'=>$model->id));						
						}
					}
				}
	
				$model->attributes=$_POST['Pedido'];
				$total = Pedido::model()->getTotal($model->id);			
				$model->precioTotal = $total;
				if($model->save()){
					$this->redirect(array('ucanjearpuntos','id'=>$model->id));
				}
			}
		}

		$this->render('ucanjearpuntos',array(
			'model'=>$model,
		));
	}
	

	
	  public function actionShowuserinfo(){
		  
	   if(isset($_POST['Pedido'])){	  
			if($_POST['Pedido']['tipo_pedido'] == RECURRENTE){ 
				echo "<b>Dni Cliente</b><br>" ; 
				echo CHtml::textField("dnicliente", '',array('maxlength'=>8)) ; 
			}elseif($_POST['Pedido']['tipo_pedido']==1){
				echo "<b>Direccion</b><br>" ; 
				echo CHtml::textField("direccion", '')."<br>" ; 
				echo "<b>Telefono</b><br>" ; 
				echo CHtml::textField("telefono", '') ; 				
			}
		}
	}
	
	
	 public function actionAddsabores(){	
		 
	   if(isset($_POST['Pedido'])){
		   
		   if(isset($_POST['Pedido']['producto'])){
				$idproducto = intval($_POST['Pedido']['producto']);		   
				$producto = new Envase();		   
				$cant = $producto->getCantidadSabores($idproducto);			
				$listaSAbores = CHtml::listData(Sabores::model()->findAll(" disponible = 1",(array('order' => 'nombre'))), 'id', 'nombre');
			
				for($i=1;$i<$cant+1;$i++){					
					echo "<b>Sabor Nro {$i}</b><br>" ;
					echo CHtml::dropDownList('sabores[]', $select=0, $listaSAbores ,    array('empty'=>'--Seleccione--'))."<br>";
					
				}		   
			}			
		}
	}
	
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Pedido');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pedido('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pedido']))
			$model->attributes=$_GET['Pedido'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Pedido the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Pedido::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Pedido $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pedido-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
