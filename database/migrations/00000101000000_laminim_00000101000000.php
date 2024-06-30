<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class Laminim00000101000000 extends AbstractMigration
{
    public function change()
    {
        $this
            ->table('laminim_pages', ['collation' => 'utf8_general_ci'])
            ->addColumn('created_at', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('name', 'string', ['limit' => 255, 'default' => ''])
            ->create();
    }
}
