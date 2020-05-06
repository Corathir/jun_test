<?php


namespace app\controllers;

use yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Users;

class UsersController extends Controller
{
    public function actionIndex()
    {

        $users = new Users;

        if (!($users->load(Yii::$app->request->post()) && $users->validate()))
        {
            //если данные не отправлены или есть ошибка
            $users->filter = 0;
        }
        $rows = $users->getUsers();

        $pagination = new Pagination([
            'defaultPageSize' => 40,
            'totalCount' => $rows->count(),
        ]);

        $rows = $rows
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'rows' => $rows,
            'pagination' => $pagination,
            'users' => $users,
        ]);
    }
}