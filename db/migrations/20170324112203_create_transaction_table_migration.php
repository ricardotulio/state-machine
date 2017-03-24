<?php

use Phinx\Migration\AbstractMigration;

class CreateTransactionTableMigration extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('transaction', array('id' => false, 'primary_key' => 'transaction_id'));
        $table->addColumn('transaction_id', 'string')
            ->addColumn('type', 'string')
            ->addColumn('status', 'string')
            ->addColumn('created', 'datetime')
            ->addColumn('updated', 'datetime', ['null' => true])
            ->create();
    }

    public function down()
    {
        $this->dropTable('transaction');
    }
}
