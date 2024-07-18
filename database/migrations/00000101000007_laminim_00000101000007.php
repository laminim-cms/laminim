<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class Laminim00000101000007 extends AbstractMigration
{
    public function change()
    {
        $this
            ->table('lmm_multimedia', ['collation' => 'utf8_general_ci'])
            ->addColumn('created_at', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('created_by', 'integer', ['default' => 0])

            ->addColumn('type', 'string', ['limit' => 20, 'default' => ''])
            ->addColumn('mime', 'string', ['limit' => 100, 'default' => ''])

            ->addColumn('name', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('src', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('poster_src', 'string', ['limit' => 255, 'default' => ''])

            ->addColumn('url', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('description', 'text', ['null' => true, 'default' => null])
            ->create();
    }
}
