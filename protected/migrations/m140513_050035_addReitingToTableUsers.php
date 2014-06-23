<?php

class m140513_050035_addReitingToTableUsers extends CDbMigration
{
    public function safeUp()
    {
        $this->addColumn('users','reiting','int');

    }

    public function safeDown()

    {
        $this->dropColumn('users','reiting');

    }
}