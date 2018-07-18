<?php

use yii\db\Migration;

/**
 * Class m180718_074017_suhanatahir
 */
class m180718_074017_suhanatahir extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('unit', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%unit}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(255) NOT NULL',
                    'short_term' => 'VARCHAR(255) NOT NULL',
                    'created_at' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ',
                    'updates_at' => 'TIMESTAMP NOT NULL DEFAULT \'0000-00-00 00:00:00\'',
                    'id_seksyen' => 'INT(11) NOT NULL',
                ], $tableOptions_mysql);
            }
        }


        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%unit}}',['id'=>'1','name'=>'Unit Pengurusan Aset','short_term'=>'UPA','created_at'=>'2018-07-18 15:37:43','updates_at'=>'0000-00-00 00:00:00','id_seksyen'=>'1']);
        $this->insert('{{%unit}}',['id'=>'2','name'=>'Unit Sokongan Teknikal','short_term'=>'UTK','created_at'=>'2018-07-18 15:37:43','updates_at'=>'0000-00-00 00:00:00','id_seksyen'=>'2']);
        $this->execute('SET foreign_key_checks = 1;');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180718_074017_suhanatahir cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180718_074017_suhanatahir cannot be reverted.\n";

        return false;
    }
    */
}
