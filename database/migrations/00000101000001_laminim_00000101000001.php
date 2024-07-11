<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class Laminim00000101000001 extends AbstractMigration
{
    public function change()
    {
        $this
            ->table('lmm_modular_blocks', ['collation' => 'utf8_general_ci'])
            ->addColumn('created_at', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('name', 'json')
            ->addColumn('type', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('item_id', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('breakpoints', 'text', ['null' => true, 'default' => null])
            ->addColumn('modular_content', 'text', ['null' => true, 'default' => null])
            ->create();
    }
}
