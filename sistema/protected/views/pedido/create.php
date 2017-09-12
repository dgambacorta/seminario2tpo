<h1>Realizar Pedido</h1>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
