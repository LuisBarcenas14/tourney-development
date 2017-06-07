<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\LanTournaments */

$this->title = 'Update Lan Tournaments: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Lan Tournaments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lan-tournaments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
