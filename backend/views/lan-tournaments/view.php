<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\LanTournaments */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Lan Tournaments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lan-tournaments-view">

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
            'name',
            'description:ntext',
            'start_date',
            'end_date',
        ],
    ]) ?>

</div>

<?php   
echo '<script type="text/javascript">
    var autoCompleteData = {
    teams : [["Null", ""],["", ""]], results : []};
    generarBracket()
    
    console.log("que pedo");
    </script>';
?>

<div id="autoComplete">    
</div>
<?php 
if($_POST['data'])//&& $_GET['secretMode'] == "inlanadminmode")
{
  echo "enviado :)";
  $mysqli = new mysqli("localhost", "root", "vientos", "bracket_db");

  $tid = $_GET['tid'];
  $json = $_POST['data'];
  echo "modificado su json es: ".$json."<br>";

  $q = "SELECT * FROM lan_brackets WHERE tid = " . $tid;
  $r = $mysqli->query($q);

  echo 'antes de consulta ';
  if($r->num_rows == 0){
    echo 'insertar ';
    $q = "INSERT INTO lan_brackets (tid, json)
          VALUES ('".$tid."', '".$json."')";
  }
  else{
    echo 'actualizar ';
    $q = "UPDATE lan_brackets SET json = '".$json."' WHERE tid = " . $tid;
  }
  echo 'durante consulta ';
  $r = $mysqli->query($q);
  echo 'despues de consulta ';
}

?>
 ?>