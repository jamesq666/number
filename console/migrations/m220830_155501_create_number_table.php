<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%number}}`.
 */
class m220830_155501_create_number_table extends Migration
{
    public function up()
    {
        $this->createTable('number', [
            'id' => $this->primaryKey(),
            'value' => $this->integer(11)->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable('number');
    }
}
