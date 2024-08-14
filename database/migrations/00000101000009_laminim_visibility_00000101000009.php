<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class LaminimVisibility00000101000009 extends AbstractMigration
{
    public function change()
    {
        $this
            ->table('lmm_visibility', ['collation' => 'utf8_general_ci'])
            ->addColumn('created_at', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])

            ->addColumn('item_id', 'integer', ['default' => 0])
            ->addColumn('item_type', 'string', ['limit' => 100, 'default' => ''])

            ->addColumn('status', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('auto_publish_at', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
}
