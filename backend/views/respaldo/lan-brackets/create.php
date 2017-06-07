<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\LanBrackets */

$this->title = 'Create Lan Brackets';
$this->params['breadcrumbs'][] = ['label' => 'Lan Brackets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lan-brackets-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
