<?php

class m140513_033143_createLetters extends CDbMigration
{
    public function safeUp()
    {
        $this->createTable('letters', array(
            'id' => 'pk',
            'sender' => 'string',
            'reciver' => 'string',
            'subject' => 'text',
            'message' => 'text',

        ));
    }

    public function safeDown()
    {
        $this->dropTable('letters');
    }
}