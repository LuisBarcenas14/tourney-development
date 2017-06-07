<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

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
            //'json:ntext',
        ],
    ]) ?>

</div>

<?php   
echo '
	<script type="text/javascript">
    	var autoCompleteData = '.$model->json.';
    </script>';
?>
<button id="reset-bracket">Reset</button>
<div id="autoComplete" name="admin">    
</div>

<?php 
//Pjax::begin();
if(Yii::$app->request->post('data'))
{
  $mysqli = new mysqli("localhost", "root", "vientos", "yii2advanced");

  echo 'vas bien';
  
  $id = Yii::$app->request->get('id');
  $json = Yii::$app->request->post('data');
  echo "modificado su json es: ".$json."<br>";

  $q = "SELECT * FROM lan_brackets WHERE id = " . $id;
  $r = $mysqli->query($q);

  echo 'antes de consulta ';
  if($r->num_rows == 0){
    echo 'insertar ';
    $q = "INSERT INTO lan_brackets (tid, json)
          VALUES ('".$tid."', '".$json."')";
  }
  else{
    echo 'actualizar ';
    $q = "UPDATE lan_brackets SET json = '".$json."' WHERE id = " . $id;
  }
  echo 'durante consulta ';
  $r = $mysqli->query($q);
  echo 'despues de consulta ';

  //*/
}
//Pjax::end();
?>


