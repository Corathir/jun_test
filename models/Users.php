<?php


namespace app\models;

use yii\db\ActiveRecord;
use yii\db\Query;

class Users extends ActiveRecord
{
    public $filter;

    public function rules()
    {
        return [
            ['filter', 'number'],
        ];
    }

    public function getUsers()
    {
        return (new Query())
           ->select('t1.*, SUM(t2.sum)')
           ->from('users AS t1')
           ->innerJoin('billing AS t2', 't1.id_user = t2.id_user')
           ->groupBy('t1.id_user')
           ->having('SUM(t2.sum) >= ' . $this->filter)
           ->orderBy('SUM(t2.sum) DESC');
    }
}