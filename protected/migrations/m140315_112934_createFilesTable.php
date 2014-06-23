<?php

class m140315_112934_createFilesTable extends CDbMigration
{
    public function safeUp()
    {
        $this->createTable('files', array(
            'id' => 'pk',
            'name' => 'string',
            'extenshion' => 'string',
            'size' => 'string',
            'user_id' => 'string',
            'user_name' => 'string',
        ));
    }

    public function safeDown()
    {
        $this->dropTable('files');
    }
}