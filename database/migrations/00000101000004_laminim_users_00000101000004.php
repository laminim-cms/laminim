<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class LaminimUsers00000101000004 extends AbstractMigration
{
    public function change()
    {
        $this
            ->table('lmm_user_roles', ['collation' => 'utf8_general_ci'])
            ->addColumn('created_at', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('created_by', 'integer', ['default' => 0])
            ->addColumn('name', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('has_cms_access', 'boolean', ['default' => false])
            ->addColumn('has_admin_access', 'boolean', ['default' => false])
            ->addColumn('config', 'text', ['null' => true, 'default' => null])
            ->create();

        $this
            ->table('lmm_users', ['collation' => 'utf8_general_ci'])
            ->addColumn('created_at', 'datetime', ['null' => true, 'default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('created_by', 'integer', ['default' => 0])
            ->addColumn('photo_id', 'integer', ['default' => 0])
            ->addColumn('name', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('lastname', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('email', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('password', 'string', ['limit' => 255, 'default' => ''])
            ->addColumn('status', 'string', ['limit' => 20, 'default' => ''])
            ->addColumn('assigned_roles', 'text', ['null' => true, 'default' => null])
            ->addColumn('has_custom_permissions', 'boolean', ['default' => false])
            ->addColumn('custom_permissions', 'text', ['null' => true, 'default' => null])
            ->create();
    }
}
