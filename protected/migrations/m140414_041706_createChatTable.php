<?php

class m140414_041706_createChatTable extends CDbMigration
{
    public function safeUp()
    {
        $this->createTable('chat', array(
            'id' => 'pk',
            'message' => 'text',
            'user_id' => 'string',
            'created'=> 'datetime NOT NULL',
        ));
    }

    public function safeDown()
    {
        $this->dropTable('chat');
    }
}