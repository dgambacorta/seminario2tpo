<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	

	const ERROR_USERNAME_INVALID=1;
	const ERROR_PASSWORD_INVALID=2;
	const ERROR_NONE=0;


	public function authenticate()
	{
	$username=strtolower($this->username);
		$user=Usuario::model()->find('LOWER(usuario)=?',array($username));
	
		    
		if($user===null)
		    $this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($user->password != $this->password)
		    $this->errorCode=self::ERROR_PASSWORD_INVALID;
		
		else
		{
			Yii::app()->session['usuario']= $user->usuario;
			Yii::app()->session['usuarioId']= $user->id;
			Yii::app()->session['nivelAcceso']= $user->nivelAcceso;
			
			if($user->nivelAcceso == 2){
			$cliente = Cliente::model()->findBySql("select * from Cliente where idUsuario=".Yii::app()->session['usuarioId']);
			Yii::app()->session['nroCliente']= $cliente->nroCliente;
			Yii::app()->session['direccion']= $cliente->domicilio;
			Yii::app()->session['telefono']= $cliente->telefono;
			}
                        
		    $this->username=$user->nombre." ".$user->apellido;
		    $this->errorCode=self::ERROR_NONE;
	
		}

		return $this->errorCode;
	    }
}
