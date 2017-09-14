
<h1>Canjear Puntos</h1>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
    }
?>
<?php echo $this->renderPartial('_formpuntos', array('model'=>$model)); ?>
