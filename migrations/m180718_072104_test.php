<?php

use yii\db\Migration;

/**
 * Class m180718_072104_test
 */
class m180718_072104_test extends Migration
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
        if (!in_array('bahagian', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%bahagian}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(150) NOT NULL',
                    'short_term' => 'VARCHAR(150) NOT NULL',
                    'created_at' => 'DATETIME NOT NULL',
                    'updated_at' => 'DATETIME NOT NULL',
                ], $tableOptions_mysql);
            }
        }


        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%bahagian}}',['name'=>'Bahagian Pengurusan Maklumat','short_term'=>'BPM','created_at'=>'0000-00-00 00:00:00','updated_at'=>'0000-00-00 00:00:00']);
        $this->execute('SET foreign_key_checks = 1;');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180718_072104_test cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180718_072104_test cannot be reverted.\n";

        return false;
    }
    */
}
