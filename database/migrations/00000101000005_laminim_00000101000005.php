<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class Laminim00000101000005 extends AbstractMigration
{
    public function change()
    {
        $this
            ->table('lmm_i18n', ['collation' => 'utf8_general_ci'])
            ->addColumn('created_at', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('stack', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('type', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('property', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('value', 'text', ['null' => true, 'default' => null])
            ->create();
    }
}
