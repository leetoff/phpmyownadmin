<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DbTable */

$this->title = 'Update DbTable Table: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'DbTable Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="db-table-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
