<?php

class m140408_064322_addLevelTofilesTable extends CDbMigration
{
    public function safeUp()
    {
        $this->addColumn('files','level','int');

    }

    public function safeDown()

    {
        $this->dropColumn('files','level');

    }
}