<?php

use yii\db\Migration;

/**
 * Class m200506_182031_create_jun_tables
 */
class m200506_182031_create_jun_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id_user' => $this->primaryKey(),
            'full_name' => $this->string()->notNull(),
            'date_of_birth' => $this->date()->notNull(),
        ]);

        $this->createTable('billing', [
            'id_billing' => $this->primaryKey(),
            'sum' => $this->double()->notNull(),
            'date' => $this->date()->notNull(),
            'id_user' => $this->integer()->notNull(),
        ]);

        // creates index for column `id_user`
        $this->createIndex(
            'id_user',
            'billing',
            'id_user'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('billing');
        $this->dropTable('users');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200506_182031_create_jun_tables cannot be reverted.\n";

        return false;
    }
    */
}
