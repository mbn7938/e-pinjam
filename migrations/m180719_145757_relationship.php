<?php

use yii\db\Migration;

/**
 * Class m180719_145757_relationship
 */
class m180719_145757_relationship extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('idx_bahagian_id_seksyen','seksyen','id_bahagian',0);

        $this->addForeignKey('fk_bahagian_id_seksyen','{{%seksyen}}', 'id_bahagian', '{{%bahagian}}', 'id', 'CASCADE', 'CASCADE' );

        $this->createIndex('idx_seksyen_id_unit','unit','id_seksyen',0);

        $this->addForeignKey('fk_seksyen_id_unit','{{%unit}}', 'id_seksyen', '{{%seksyen}}', 'id', 'CASCADE', 'CASCADE' );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180719_145757_relationship cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180719_145757_relationship cannot be reverted.\n";

        return false;
    }
    */
}
