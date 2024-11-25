<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class Laminim00000101000006 extends AbstractMigration
{
    public function change()
    {
        $this
            ->table('lmm_modular_options', ['collation' => 'utf8_general_ci'])
            ->addColumn('created_at', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('created_by', 'integer', ['default' => 0])

            ->addColumn('type', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('item_id', 'string', ['limit' => 255, 'default' => ''])

            ->addColumn('name', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('value', 'text', ['null' => true, 'default' => null])
            ->create();
    }
}
