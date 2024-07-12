<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Instances\User;
use LaminimCMS\Instances\UserRole;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\EmailField;
use Lkt\Factory\Schemas\Fields\ForeignKeysField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\StringField;
use Lkt\Factory\Schemas\InstanceSettings;
use Lkt\Factory\Schemas\Schema;
use Lkt\Factory\Schemas\Views\FieldViewConfig;

return Schema::table('lmm_users', User::COMPONENT)
    ->setInstanceSettings(
        InstanceSettings::define(User::class)
            ->setClassNameForGeneratedClass('GeneratedUser')
            ->setQueryCallerClassName('UserQueryBuilder')
            ->setWhereClassName('UserWhere')
            ->setNamespaceForGeneratedClass('LaminimCMS\Generated')
            ->setWhereStoreGeneratedClass(__DIR__ . '/../Generated')
    )
    ->setFieldsForView('index', ['id', 'name', 'createdAt'])
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
            ->configureView(FieldViewConfig::readMode('edit', 'text'))
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
            ->setCustomType('password')
            ->setLabel('__:lmm.password')
            ->configureView(FieldViewConfig::editMode('create', 'password'))
            ->configureView(FieldViewConfig::editMode('edit', 'password'))
    )
    ->addField(
        ForeignKeysField::defineRelation(UserRole::COMPONENT, 'assignedRoles', 'assigned_roles')
            ->setCustomType('password')
            ->setLabel('__:lmm.password')
            ->configureView(FieldViewConfig::editMode('create', 'foreign-keys'))
            ->configureView(FieldViewConfig::editMode('edit', 'foreign-keys'))
    );