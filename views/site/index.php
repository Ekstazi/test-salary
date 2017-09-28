<?php
use yii\bootstrap\Html;
use yii\grid\GridView;
use app\models\ManagerSalarySearch;
/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ActiveDataProvider */
/* @var $searchModel \app\models\ManagerSalarySearch */
$this->title = 'My Yii Application';
?>
<div class="site-index">
    <form class="form-inline" method="get">
        <div class="form-group">
            <?= Html::activeLabel($searchModel, 'date_from');?>
            <?= Html::activeInput('date', $searchModel, 'date_from');?>
        </div>
        <div class="form-group">
            <?= Html::activeLabel($searchModel, 'date_to');?>
            <?= Html::activeInput('date', $searchModel, 'date_to');?>
        </div>
        <?= Html::submitButton('Показать', ['class' => 'btn-default btn']);?>
    </form>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns'      => [
            'id',
            'fullname',
            [
                'attribute' => 'salary',
                'format'    => 'currency',
            ],
            [
                'attribute' => 'salaryWithBonus',
                'format'    => 'currency',
            ],
            [
                'attribute' => 'callsPerMonth',
                'format'    => 'integer',
            ],
            [
                'label' => 'Бонус',
                'value' => function(ManagerSalarySearch $model){
                    return $model->salaryWithBonus-$model->salary;
                },
                'format' => 'currency',
            ]
        ]
    ]); ?>
</div>
