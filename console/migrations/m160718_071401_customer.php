<?php

use yii\db\Migration;

class m160718_071401_customer extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%customer}}', [
            'CustomerId' => $this->primaryKey(),
            'CompanyName' => $this->string()->notNull()->unique(),
            'ContactName' => $this->string()->notNull()->unique(),
            'Phone' => $this->string()->notNull()->unique(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->insert('{{%customer}}', [
            'CompanyName' => 'CompanyOne',
            'ContactName' => 'ContactNameOne',
            'Phone' => '204-12345678',
            'created_at' => '0',
            'updated_at' => '0'
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%customer}}');
    }
}
