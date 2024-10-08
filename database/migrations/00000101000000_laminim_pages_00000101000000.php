<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class LaminimPages00000101000000 extends AbstractMigration
{
    public function change()
    {
        $this
            ->table('lmm_pages', ['collation' => 'utf8_general_ci'])
            ->addColumn('created_at', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('created_by', 'integer', ['default' => 0])
            ->addColumn('name', 'json')
            ->addColumn('status', 'string', ['limit' => 20, 'default' => ''])
            ->addColumn('blocks', 'text', ['null' => true, 'default' => null])
            ->create();
    }
}
