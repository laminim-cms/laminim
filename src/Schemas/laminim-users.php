<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Instances\User;
use LaminimCMS\Instances\UserRole;
use Lkt\Factory\Schemas\Fields\AssocJSONField;
use Lkt\Factory\Schemas\Fields\BooleanField;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\EmailField;
use Lkt\Factory\Schemas\Fields\ForeignKeysField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\MethodGetterField;
use Lkt\Factory\Schemas\Fields\StringField;
use Lkt\Factory\Schemas\InstanceSettings;
use Lkt\Factory\Schemas\Schema;
use Lkt\Factory\Schemas\Views\FieldViewConfig;
use Lkt\Factory\Schemas\Views\Layouts\GridLayout;

return Schema::table('lmm_users', User::COMPONENT)
    ->setInstanceSettings(
        InstanceSettings::define(User::class)
            ->setNamespaceForGeneratedClass('LaminimCMS\Generated')
            ->setWhereStoreGeneratedClass(__DIR__ . '/../Generated')
    )
    ->setCountableField('id')
    ->setItemsPerPage(20)
    ->setFieldsForRelatedMode('id', 'name', [])
    ->setExcludedFieldsForViewFeed('create', ['assignedRoles'])
    ->setExcludedFieldsForViewFeed('edit', ['assignedRoles'])
    ->addField(
        IdField::define('id')
            ->setLabel('__:lmm.id')
            ->configureView(FieldViewConfig::dataMode('index'))
            ->configureView(FieldViewConfig::dataMode('edit'))
    )
    ->addField(
        DateTimeField::define('createdAt', 'created_at')
            ->setLabel('__:lmm.createdAt')
            ->setDefaultReadFormat('Y-m-d H:i:s')
            ->setCurrentTimeStampAsDefaultValue()
            ->configureView(FieldViewConfig::readMode('edit', 'date'))
    )
    ->addField(
        StringField::define('name')
            ->setLabel('__:lmm.name')
            ->configureView(FieldViewConfig::readMode('index', 'text'))
            ->configureView(FieldViewConfig::editMode('create', 'text'))
            ->configureView(FieldViewConfig::editMode('edit', 'text'))
    )
    ->addField(
        StringField::define('lastName', 'lastname')
            ->setLabel('__:lmm.lastname')
            ->configureView(FieldViewConfig::readMode('index', 'text'))
            ->configureView(FieldViewConfig::editMode('create', 'text'))
            ->configureView(FieldViewConfig::editMode('edit', 'text'))
    )
    ->addField(
        EmailField::define('email')
            ->setLabel('__:lmm.email')
            ->configureView(FieldViewConfig::readMode('index', 'email'))
            ->configureView(FieldViewConfig::editMode('create', 'email'))
            ->configureView(FieldViewConfig::editMode('edit', 'email'))
    )
    ->addField(
        StringField::define('password')
            ->setLabel('__:lmm.password')
            ->configureView(FieldViewConfig::editMode('create', 'password'))
            ->configureView(FieldViewConfig::editMode('edit', 'password'))
    )
    ->addField(
        BooleanField::define('hasCustomPermissionsEnabled', 'has_custom_permissions')
            ->setLabel('__:lmm.hasCustomPermissions')
            ->configureView(FieldViewConfig::editMode('create', 'switch'))
            ->configureView(FieldViewConfig::editMode('edit', 'switch'))
    )
    ->addField(
        AssocJSONField::define('customPermissions', 'custom_permissions')
    )
    ->addField(
        MethodGetterField::define('getPreparedCustomPermissions', 'customPermissions')
            ->setLabel('__:lmm.rolePermConfig')
            ->configureView(FieldViewConfig::hideMode('create', 'lmm-modular-perms'))
            ->configureView(FieldViewConfig::hideMode('edit', 'lmm-modular-perms'))
    )
    ->addField(
        ForeignKeysField::defineRelation(UserRole::COMPONENT, 'assignedRoles', 'assigned_roles')
            ->setLabel('__:lmm.asignedRoles')
            ->configureView(FieldViewConfig::editMode('create', 'foreign-keys'))
            ->configureView(FieldViewConfig::editMode('edit', 'foreign-keys'))
    )
    ->setLayout(
        GridLayout::define('create', 1, [
                GridLayout::define('main-data', 2, ['name', 'lastName', 'email', 'password']),
                'assignedRoles',
                'hasCustomPermissionsEnabled',
                'customPermissions',
            ]
        )->setConditionalModes('hasCustomPermissionsEnabled', true, [
            'customPermissions' => 'edit',
        ])
    )
    ->setLayout(
        GridLayout::define('edit', 1, [
                'createdAt',
                GridLayout::define('main-data', 2, ['name', 'lastName', 'email', 'password']),
                'assignedRoles',
                'hasCustomPermissionsEnabled',
                'customPermissions',
            ]
        )->setConditionalModes('hasCustomPermissionsEnabled', true, [
            'customPermissions' => 'edit',
        ])
    )
    ;