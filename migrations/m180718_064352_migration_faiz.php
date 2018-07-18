<?php

use yii\db\Migration;

/**
 * Class m180718_064352_migration_faiz
 */
class m180718_064352_migration_faiz extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->createTable('bahagian',
           [
              'id'=>$this->primaryKey(),
              'name'=> $this->string(150)->notNull(),
              'short_term'=>$this->string(150)->notNull(),
              'created_at'=>$this->dateTime()->notNull(),
              'updated_at'=>$this->dateTime()->notNull()
           ]);

       $this->insert('bahagian',[
           'name'=> 'Bahagian Pengurusan Maklumat',
           'short_term'=>'BPM',
           'created_at'=> Yii::$app->formatter->asDatetime(date('d-m-Y H:i:s')),
           'updated_at'=> Yii::$app->formatter->asDatetime(date('d-m-Y H:i:s')),
       ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180718_064352_migration_faiz cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180718_064352_migration_faiz cannot be reverted.\n";

        return false;
    }
    */
}
