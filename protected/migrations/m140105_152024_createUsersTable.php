<?php

class m140105_152024_createUsersTable extends CDbMigration
{
    public function safeUp()
    {
        $this->createTable('users', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'surname' => 'string',
            'patronymic' => 'string',
            'role' => 'string NOT NULL',
            'password' => 'string NOT NULL',
            'email' => 'string NOT NULL',
            'phone' => 'string',
            'address' => 'string',
            'about' => 'text',
            'profession' => 'text',
            'photo' => 'string',
        ));
    }

    public function safeDown()
    {
        $this->dropTable('users');
    }
}
