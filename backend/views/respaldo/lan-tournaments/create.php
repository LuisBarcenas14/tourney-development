<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\LanTournaments */

$this->title = 'Create Lan Tournaments';
$this->params['breadcrumbs'][] = ['label' => 'Lan Tournaments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lan-tournaments-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
