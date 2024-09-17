<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class LaminimModularBlocks00000101000001 extends AbstractMigration
{
    public function change()
    {
        $this
            ->table('lmm_modular_blocks', ['collation' => 'utf8_general_ci'])
            ->addColumn('created_at', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('created_by', 'integer', ['default' => 0])
            ->addColumn('component', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('content', 'json')
            ->addColumn('type', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('element_id', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('item_type', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('item_id', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('items_ids', 'text', ['null' => true, 'default' => null])
            ->addColumn('blocks', 'text', ['null' => true, 'default' => null])
            ->addColumn('title', 'json')
            ->addColumn('columns', 'integer', ['default' => 1])
            ->addColumn('class_name', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('config', 'text', ['null' => true, 'default' => null])
            ->create();
    }
}