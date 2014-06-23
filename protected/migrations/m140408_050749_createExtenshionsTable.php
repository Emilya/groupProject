<?php

class m140408_050749_createExtenshionsTable extends CDbMigration
{
    public function safeUp()
    {
        $this->createTable('extenshions', array(
            'id' => 'pk',
            'name' => 'string',
            'level' => 'int(2)',
            'content' => 'string',
        ));
        $this->insert('extenshions', array(
            "name" => "text",
            "level" => 1,
            "content" => "doc, docx",
        ));
        $this->insert('extenshions', array(
            "name" => "diagram",
            "level" => 2,
            "content" => "uml, zargo",
        ));
        $this->insert('extenshions', array(
            "name" => "code",
            "level" => 3,
            "content" => "php",
        ));
    }

    public function safeDown()
    {
        $this->dropTable('extenshions');
    }
}