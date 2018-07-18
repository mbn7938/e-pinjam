<?php

use yii\db\Migration;

/**
 * Class m180718_033111_table_init
 */
class m180718_033111_table_init extends Migration
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
        if (!in_array('asset_logistic', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%asset_logistic}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(255) NOT NULL',
                    'description' => 'VARCHAR(255) NOT NULL',
                    'type_id' => 'INT(11) NOT NULL',
                    'status_id' => 'INT(11) NOT NULL',
                    'created_at' => 'DATETIME NOT NULL',
                    'updated_at' => 'DATETIME NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('asset_type', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%asset_type}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(255) NOT NULL',
                    'description' => 'VARCHAR(255) NOT NULL',
                    'status_id' => 'INT(11) NOT NULL',
                    'created_at' => 'DATETIME NOT NULL',
                    'updated_at' => 'DATETIME NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('profile', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%profile}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'user_id' => 'INT(11) NOT NULL',
                    'created_at' => 'TIMESTAMP NULL',
                    'updated_at' => 'TIMESTAMP NULL',
                    'full_name' => 'VARCHAR(255) NULL',
                    'timezone' => 'VARCHAR(255) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('rent_transaction', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%rent_transaction}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'user_id' => 'INT(11) NOT NULL',
                    'asset_id' => 'INT(11) NOT NULL',
                    'status_id' => 'INT(11) NOT NULL',
                    'created_at' => 'DATETIME NOT NULL',
                    'updated_at' => 'DATETIME NOT NULL',
                ], $tableOptions_mysql);
            }
        }

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

        /* MYSQL */
        if (!in_array('status', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%status}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(125) NOT NULL',
                    'class' => 'VARCHAR(125) NOT NULL',
                    'created_at' => 'DATETIME NOT NULL',
                    'updated_at' => 'DATETIME NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('user', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%user}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'role_id' => 'INT(11) NOT NULL',
                    'status' => 'SMALLINT(6) NOT NULL',
                    'email' => 'VARCHAR(255) NULL',
                    'username' => 'VARCHAR(255) NULL',
                    'password' => 'VARCHAR(255) NULL',
                    'auth_key' => 'VARCHAR(255) NULL',
                    'access_token' => 'VARCHAR(255) NULL',
                    'logged_in_ip' => 'VARCHAR(255) NULL',
                    'logged_in_at' => 'TIMESTAMP NULL',
                    'created_ip' => 'VARCHAR(255) NULL',
                    'created_at' => 'TIMESTAMP NULL',
                    'updated_at' => 'TIMESTAMP NULL',
                    'banned_at' => 'TIMESTAMP NULL',
                    'banned_reason' => 'VARCHAR(255) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('user_auth', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%user_auth}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'user_id' => 'INT(11) NOT NULL',
                    'provider' => 'VARCHAR(255) NOT NULL',
                    'provider_id' => 'VARCHAR(255) NOT NULL',
                    'provider_attributes' => 'TEXT NOT NULL',
                    'created_at' => 'TIMESTAMP NULL',
                    'updated_at' => 'TIMESTAMP NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('user_token', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%user_token}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'user_id' => 'INT(11) NULL',
                    'type' => 'SMALLINT(6) NOT NULL',
                    'token' => 'VARCHAR(255) NOT NULL',
                    'data' => 'VARCHAR(255) NULL',
                    'created_at' => 'TIMESTAMP NULL',
                    'expired_at' => 'TIMESTAMP NULL',
                ], $tableOptions_mysql);
            }
        }


        $this->createIndex('idx_status_id_9327_00','asset_logistic','status_id',0);
        $this->createIndex('idx_type_id_9328_01','asset_logistic','type_id',0);
        $this->createIndex('idx_status_id_957_02','asset_type','status_id',0);
        $this->createIndex('idx_user_id_0169_03','profile','user_id',0);
        $this->createIndex('idx_user_id_067_04','rent_transaction','user_id',0);
        $this->createIndex('idx_asset_id_067_05','rent_transaction','asset_id',0);
        $this->createIndex('idx_status_id_0671_06','rent_transaction','status_id',0);
        $this->createIndex('idx_UNIQUE_email_1617_07','user','email',1);
        $this->createIndex('idx_UNIQUE_username_1617_08','user','username',1);
        $this->createIndex('idx_role_id_1617_09','user','role_id',0);
        $this->createIndex('idx_provider_id_1865_10','user_auth','provider_id',0);
        $this->createIndex('idx_user_id_1866_11','user_auth','user_id',0);
        $this->createIndex('idx_UNIQUE_token_2113_12','user_token','token',1);
        $this->createIndex('idx_user_id_2113_13','user_token','user_id',0);

        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_asset_type_9318_00','{{%asset_logistic}}', 'type_id', '{{%asset_type}}', 'id', 'CASCADE', 'CASCADE' );
        $this->addForeignKey('fk_status_9318_01','{{%asset_logistic}}', 'status_id', '{{%status}}', 'id', 'CASCADE', 'CASCADE' );
        $this->addForeignKey('fk_status_9562_02','{{%asset_type}}', 'status_id', '{{%status}}', 'id', 'CASCADE', 'CASCADE' );
        $this->addForeignKey('fk_user_0151_03','{{%profile}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE' );
        $this->addForeignKey('fk_user_0657_04','{{%rent_transaction}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE' );
        $this->addForeignKey('fk_asset_logistic_0658_05','{{%rent_transaction}}', 'asset_id', '{{%asset_logistic}}', 'id', 'CASCADE', 'CASCADE' );
        $this->addForeignKey('fk_status_0658_06','{{%rent_transaction}}', 'status_id', '{{%status}}', 'id', 'CASCADE', 'CASCADE' );
        $this->addForeignKey('fk_role_1608_07','{{%user}}', 'role_id', '{{%role}}', 'id', 'CASCADE', 'CASCADE' );
        $this->addForeignKey('fk_user_1856_08','{{%user_auth}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE' );
        $this->addForeignKey('fk_user_2105_09','{{%user_token}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE' );
        $this->execute('SET foreign_key_checks = 1;');

        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%asset_logistic}}',['id'=>'1','name'=>'Laptop Dell Inspiron','description'=>'Laptop Dell Inspiron milik unit BPM','type_id'=>'2','status_id'=>'1','created_at'=>'2018-07-11 00:03:48','updated_at'=>'2018-07-11 00:03:48']);
        $this->insert('{{%asset_type}}',['id'=>'1','name'=>'Laptop','description'=>'Laptop Acer','status_id'=>'4','created_at'=>'2018-07-10 20:10:37','updated_at'=>'2018-07-10 20:10:38']);
        $this->insert('{{%asset_type}}',['id'=>'2','name'=>'Komputer','description'=>'Komputer Deskstop pegawai','status_id'=>'1','created_at'=>'2018-07-10 20:13:21','updated_at'=>'2018-07-10 20:13:21']);
        $this->insert('{{%profile}}',['id'=>'1','user_id'=>'1','created_at'=>'2018-07-09 07:43:48','updated_at'=>'','full_name'=>'the one','timezone'=>'']);
        $this->insert('{{%profile}}',['id'=>'2','user_id'=>'2','created_at'=>'2018-07-09 07:50:53','updated_at'=>'2018-07-09 07:50:53','full_name'=>'Khairul Faiz','timezone'=>'']);
        $this->insert('{{%rent_transaction}}',['id'=>'1','user_id'=>'1','asset_id'=>'1','status_id'=>'3','created_at'=>'2018-07-11 00:27:14','updated_at'=>'2018-07-11 00:27:14']);
        $this->insert('{{%role}}',['id'=>'1','name'=>'Admin','created_at'=>'2018-07-09 07:43:47','updated_at'=>'','can_admin'=>'1']);
        $this->insert('{{%role}}',['id'=>'2','name'=>'User','created_at'=>'2018-07-09 07:43:47','updated_at'=>'','can_admin'=>'0']);
        $this->insert('{{%status}}',['id'=>'1','name'=>'Aktiff','class'=>'success','created_at'=>'2018-07-10 03:39:02','updated_at'=>'2018-07-10 19:54:26']);
        $this->insert('{{%status}}',['id'=>'2','name'=>'Tidak Aktif','class'=>'danger','created_at'=>'2018-07-10 19:49:54','updated_at'=>'2018-07-10 19:49:54']);
        $this->insert('{{%status}}',['id'=>'3','name'=>'Menunggu','class'=>'warning','created_at'=>'2018-07-10 19:53:34','updated_at'=>'2018-07-10 19:53:34']);
        $this->insert('{{%status}}',['id'=>'4','name'=>'Arkib','class'=>'warning','created_at'=>'2018-07-10 20:07:02','updated_at'=>'2018-07-10 20:32:06']);
        $this->insert('{{%user}}',['id'=>'1','role_id'=>'1','status'=>'1','email'=>'neo@neo.com','username'=>'neo','password'=>'$2y$13$dyVw4WkZGkABf2UrGWrhHO4ZmVBv.K4puhOL59Y9jQhIdj63TlV.O','auth_key'=>'aulrqtHIKRPn4OuTQEWB53TsxkUbWja3','access_token'=>'XGYDVJx-HbQdIe-eP706-yeJcBX9R5UT','logged_in_ip'=>'::1','logged_in_at'=>'2018-07-10 08:23:34','created_ip'=>'','created_at'=>'2018-07-09 07:43:48','updated_at'=>'','banned_at'=>'','banned_reason'=>'']);
        $this->insert('{{%user}}',['id'=>'2','role_id'=>'1','status'=>'1','email'=>'faizhensem@gmail.com','username'=>'faizhensem','password'=>'$2y$13$hPpFYnwl2vkUXSyRBGsOSuu6RGyV9VWrXl8DjUl09cSwnRdUjvIsi','auth_key'=>'','access_token'=>'','logged_in_ip'=>'','logged_in_at'=>'','created_ip'=>'','created_at'=>'2018-07-09 07:50:53','updated_at'=>'2018-07-09 07:50:53','banned_at'=>'','banned_reason'=>'']);
        $this->execute('SET foreign_key_checks = 1;');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180718_033111_table_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180718_033111_table_init cannot be reverted.\n";

        return false;
    }
    */
}
