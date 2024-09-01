<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class Laminim00000101000003 extends AbstractMigration
{
    public function change()
    {
        $this
            ->table('lmm_modular_config', ['collation' => 'utf8_general_ci'])
            ->addColumn('created_at', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('created_by', 'integer', ['default' => 0])
            ->addColumn('type', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('lang', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('property', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('value', 'text', ['null' => true, 'default' => null])
            ->create();
    }
}
