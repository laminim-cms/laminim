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
            ->addColumn('lmm_stack_id', 'integer', ['limit' => MysqlAdapter::INT_REGULAR, 'default' => 0])
            ->addColumn('type', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('property', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('value', 'text', ['null' => true, 'default' => null])
            ->create();

        $this
            ->table('lmm_i18n_stacks', ['collation' => 'utf8_general_ci'])
            ->addColumn('created_at', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('name', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('property', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('required_admin_perms', 'boolean', ['default' => false])
            ->addColumn('only_for_cms', 'boolean', ['default' => false])
            ->create();
    }
}
