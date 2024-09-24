<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class LaminimMetadata00000101000008 extends AbstractMigration
{
    public function change()
    {
        $this
            ->table('lmm_metadata', ['collation' => 'utf8_general_ci'])
            ->addColumn('created_at', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('created_by', 'integer', ['default' => 0])

            ->addColumn('item_id', 'integer', ['default' => 0])
            ->addColumn('item_type', 'string', ['limit' => 100, 'default' => ''])

            ->addColumn('title', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('url', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('generated_url', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('description', 'text', ['null' => true, 'default' => null])
            ->addColumn('keywords', 'text', ['null' => true, 'default' => null])
            ->create();
    }
}
