<?php

use yii\db\Schema;

class m150626_000006_create_audit_mail extends \yii\db\Migration
{
    const TABLE = '{{%audit_mail}}';

    public function up()
    {
        $this->createTable(self::TABLE, [
            'id'         => Schema::TYPE_PK,
            'entry_id'   => Schema::TYPE_INTEGER . ' NOT NULL',
            'created'    => Schema::TYPE_DATETIME . ' NOT NULL',
            'successful' => Schema::TYPE_INTEGER . ' NOT NULL',
            'from'       => Schema::TYPE_STRING,
            'to'         => Schema::TYPE_STRING,
            'reply'      => Schema::TYPE_STRING,
            'cc'         => Schema::TYPE_STRING,
            'bcc'        => Schema::TYPE_STRING,
            'subject'    => Schema::TYPE_STRING,
            'text'       => 'BLOB NULL',
            'html'       => 'BLOB NULL',
            'data'       => 'MEDIUMBLOB NULL',
        ], $this->db->driverName === 'mysql' ? 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB' : null);

        $this->addForeignKey('fk_audit_mail_entry_id', self::TABLE, ['entry_id'], '{{%audit_entry}}', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('fk_audit_mail_entry_id', self::TABLE);
        $this->dropTable(self::TABLE);
    }
}
