<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        $this->insert('{{%user}}', [
            'username' => 'user1',
            'password_hash' => '$2y$13$zGL5v/pYaI9Y9dqjRS.FWOTyLV/A9PCeYJzc1NfsySPPfBD7eNe2e',
            'email' => 'user1@dev.com',
            'status' => '10',
            'auth_key' => '',
            'created_at' => '0',
            'updated_at' => '0'
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
