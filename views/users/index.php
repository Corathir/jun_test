<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<style>
    table th {
        border: 1px solid black; padding: 2px;
    }

    .number {
        text-align: right;
    }
    input {
        max-width: 300px;
    }
</style>
    <h1>Users</h1>
    <table>
        <tr>
            <th>id</th>
            <th>full name</th>
            <th>date of birth</th>
            <th>amount of billings</th>
        </tr>
        <?php foreach ($rows as $row): ?>
            <tr class="usersData">
                <th><?= $row['id_user'] ?></th>
                <th><?= $row['full_name'] ?></th>
                <th class="number"><?= $row['date_of_birth'] ?></th>
                <th class="number"><?= $row['SUM(t2.sum)'] ?></th>
            </tr>
        <?php endforeach; ?>
    </table>

<?= LinkPager::widget(['pagination' => $pagination]) ?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($users, 'filter')->label('Минимальная сумма платежа')->textInput(['type' => 'number']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>