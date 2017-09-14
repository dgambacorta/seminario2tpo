<?php
/* @var $this SiteController */

$this->pageTitle='Tienda de Helados';


if(Yii::app()->user->isGuest){

$this->redirect(array('login'));

$foo =1;


}


?>


