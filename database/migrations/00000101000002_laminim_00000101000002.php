<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class Laminim00000101000002 extends AbstractMigration
{
    public function change()
    {
        return;
        $this
            ->table('lmm_modular_content', ['collation' => 'utf8_general_ci'])
            ->addColumn('created_at', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('created_by', 'integer', ['default' => 0])
            ->addColumn('type', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('visible', 'boolean', ['default' => true])
            ->addColumn('breakpoints', 'text', ['null' => true, 'default' => null])
            ->addColumn('items', 'text', ['null' => true, 'default' => null])
            ->addColumn('config', 'text', ['null' => true, 'default' => null])
            ->create();
    }
}
