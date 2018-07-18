<?php

use yii\db\Migration;

/**
 * Class m180718_081006_hasnitambah
 */
class m180718_081006_hasnitambah extends Migration
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
        if (!in_array('role', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%role}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(255) NOT NULL',
                    'created_at' => 'TIMESTAMP NULL',
                    'updated_at' => 'TIMESTAMP NULL',
                    'can_admin' => 'SMALLINT(6) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180718_081006_hasnitambah cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180718_081006_hasnitambah cannot be reverted.\n";

        return false;
    }
    */
}
