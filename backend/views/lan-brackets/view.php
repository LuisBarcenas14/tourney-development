<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\LanBrackets */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lan Brackets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<?php 
//echo '<script type="text/javascript">var autoCompleteData = '."".'</script>'; 

?>

<div class="lan-brackets-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'tid',
            'json:ntext',
        ],
    ]) ?>

</div>

<?php   
echo '<script type="text/javascript">
    /*var autoCompleteData = {
    teams : [["Null", ""],["", ""]], results : []};
    */
    var autoCompleteData = '.$model->json.';
    //generarBracket()

    
    console.log("que pedo");
    </script>';
?>

<div id="autoComplete">    
</div>
