<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Instances\UserRole;
use Lkt\Factory\Schemas\Fields\AssocJSONField;
use Lkt\Factory\Schemas\Fields\BooleanField;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\MethodGetterField;
use Lkt\Factory\Schemas\Fields\StringField;
use Lkt\Factory\Schemas\InstanceSettings;
use Lkt\Factory\Schemas\Schema;
use Lkt\Factory\Schemas\Views\FieldViewConfig;

return Schema::table('lmm_user_roles', UserRole::COMPONENT)
    ->setInstanceSettings(
        InstanceSettings::define(UserRole::class)
            ->setClassNameForGeneratedClass('GeneratedUserRole')
            ->setQueryCallerClassName('UserRoleQueryBuilder')
            ->setWhereClassName('UserRoleWhere')
            ->setNamespaceForGeneratedClass('LaminimCMS\Generated')
            ->setWhereStoreGeneratedClass(__DIR__ . '/../Generated')
    )
    ->setCountableField('id')
    ->setItemsPerPage(20)
    ->setFieldsForRelatedMode('id', 'name', [])
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
            ->configureView(FieldViewConfig::readMode('edit', 'text'))
    )
    ->addField(
        StringField::define('name')
            ->setIsI18nJson()
            ->setLabel('__:lmm.name')
            ->configureView(FieldViewConfig::readMode('index', 'text'))
            ->configureView(FieldViewConfig::editMode('create', 'text'))
            ->configureView(FieldViewConfig::editMode('edit', 'text'))
    )
    ->addField(
        BooleanField::define('hasCmsAccess', 'has_cms_access')
            ->setLabel('__:lmm.hasCmsAccess')
            ->configureView(FieldViewConfig::readMode('index', 'switch'))
            ->configureView(FieldViewConfig::editMode('create', 'switch'))
            ->configureView(FieldViewConfig::editMode('edit', 'switch'))
    )
    ->addField(
        AssocJSONField::define('config')
    )
    ->addField(
        MethodGetterField::define('getPreparedConfig', 'config')
            ->setLabel('__:lmm.rolePermConfig')
            ->configureView(FieldViewConfig::editMode('create', 'lmm-modular-perms'))
            ->configureView(FieldViewConfig::editMode('edit', 'lmm-modular-perms'))
    );