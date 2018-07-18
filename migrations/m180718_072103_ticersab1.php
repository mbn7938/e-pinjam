<?php

use yii\db\Migration;

/**
 * Class m180718_072103_ticersab1
 */
class m180718_072103_ticersab1 extends Migration
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
        if (!in_array('seksyen', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%seksyen}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(250) NOT NULL',
                    'short_term' => 'VARCHAR(100) NOT NULL',
                    'created_at' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ',
                    'updated_at' => 'TIMESTAMP NOT NULL DEFAULT \'0000-00-00 00:00:00\'',
                    'id_bahagian' => 'INT(11) NOT NULL',
                ], $tableOptions_mysql);
            }
        }


        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%seksyen}}',['id'=>'1','name'=>'Seksyen Aplikasi 2','short_term'=>'PRIMER','created_at'=>'2018-07-18 15:17:58','updated_at'=>'0000-00-00 00:00:00','id_bahagian'=>'1']);
        $this->insert('{{%seksyen}}',['id'=>'2','name'=>'Seksyen Aplikasi 1','short_term'=>'NEWSS','created_at'=>'2018-07-18 15:17:58','updated_at'=>'0000-00-00 00:00:00','id_bahagian'=>'1']);
        $this->execute('SET foreign_key_checks = 1;');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180718_072103_ticersab1 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180718_072103_ticersab1 cannot be reverted.\n";

        return false;
    }
    */
}
