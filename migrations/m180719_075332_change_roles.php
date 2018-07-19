<?php

use yii\db\Migration;

/**
 * Class m180719_075332_change_roles
 */
class m180719_075332_change_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addColumn('user','unit_id',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180719_075332_change_roles cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180719_075332_change_roles cannot be reverted.\n";

        return false;
    }
    */
}
