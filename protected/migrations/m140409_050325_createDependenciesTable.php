<?php

class m140409_050325_createDependenciesTable extends CDbMigration
{
    public function safeUp()
    {
        $this->createTable('dependencies', array(
            'id' => 'pk',
            'name' => 'string',
            'description' => 'string',
            'parts' => 'string',
            'user' => 'string',
            ));
    }

    public function safeDown()
    {
        $this->dropTable('dependencies');
    }
}