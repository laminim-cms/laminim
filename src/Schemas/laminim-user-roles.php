<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Instances\User;
use LaminimCMS\Instances\UserRole;
use Lkt\Factory\Schemas\Fields\AssocJSONField;
use Lkt\Factory\Schemas\Fields\BooleanField;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\ForeignKeyField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\MethodGetterField;
use Lkt\Factory\Schemas\Fields\StringField;
use Lkt\Factory\Schemas\InstanceSettings;
use Lkt\Factory\Schemas\Schema;
use Lkt\Factory\Schemas\Views\FieldViewConfig;
use Lkt\Factory\Schemas\Views\Layouts\GridLayout;

return Schema::table('lmm_user_roles', UserRole::COMPONENT)
    ->setInstanceSettings(
        InstanceSettings::define(UserRole::class)
            ->setNamespaceForGeneratedClass('LaminimCMS\Generated')
            ->setWhereStoreGeneratedClass(__DIR__ . '/../Generated')
    )
    ->setCountableField('id')
    ->setItemsPerPage(20)
    ->setFieldsForRelatedMode('id', 'name', [])
    ->addField(
        IdField::define('id')
            ->setLabel('__:lmm.id')
            ->configureView(FieldViewConfig::dataMode('lmm-index'))
            ->configureView(FieldViewConfig::dataMode('lmm-edit'))
    )
    ->addField(
        DateTimeField::define('createdAt', 'created_at')
            ->setLabel('__:lmm.createdAt')
            ->setCurrentTimeStampAsDefaultValue()
            ->setDefaultReadFormat('d/m/Y')
            ->setLangDefaultReadFormat('d/m/Y', 'es')
            ->setLangDefaultReadFormat('Y-m-d', 'en')
            ->configureView(FieldViewConfig::readMode('lmm-index', 'date'))
            ->configureView(FieldViewConfig::readMode('lmm-edit', 'date'))
    )
    ->addField(
        ForeignKeyField::defineRelation(User::COMPONENT, 'createdBy', 'created_by')
            ->setLabel('__:lmm.createdBy')
            ->configureView(FieldViewConfig::readMode('lmm-index', 'foreign-key'))
            ->configureView(FieldViewConfig::readMode('lmm-edit', 'foreign-key'))
            ->setDefaultValue([User::class, 'getLoggedId'])
    )
    ->addField(
        StringField::define('name')
            ->setIsI18nJson()
            ->setLabel('__:lmm.name')
            ->configureView(FieldViewConfig::readMode('lmm-index', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-create', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'text'))
    )
    ->addField(
        BooleanField::define('hasCmsAccess', 'has_cms_access')
            ->setLabel('__:lmm.hasCmsAccess')
            ->configureView(FieldViewConfig::readMode('lmm-index', 'switch'))
            ->configureView(FieldViewConfig::editMode('lmm-create', 'switch'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'switch'))
    )
    ->addField(
        AssocJSONField::define('config')
    )
    ->addField(
        MethodGetterField::define('getPreparedConfig', 'config')
            ->setLabel('__:lmm.rolePermConfig')
            ->configureView(FieldViewConfig::editMode('lmm-create', 'lmm-modular-perms'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'lmm-modular-perms'))
    )
    ->setLayout(GridLayout::define('lmm-create', 1, [
            GridLayout::define('main-data', 2, ['name', 'hasCmsAccess']),
            'config'
        ]
    ))
    ->setLayout(GridLayout::define('lmm-edit', 1, [
            'createdAt',
            GridLayout::define('main-data', 2, ['name', 'hasCmsAccess']),
            'config'
        ]
    ))
    ;