<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contacts}}`.
 */
class m230731_203241_create_contacts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contacts}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(45),
            'phone' => $this->string(15),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->timestamp()->defaultValue(null)->append('ON UPDATE CURRENT_TIMESTAMP')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contacts}}');
    }
}
