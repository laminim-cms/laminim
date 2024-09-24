<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Generated\MultimediaItemWhere;
use LaminimCMS\Instances\MultimediaItem;
use LaminimCMS\Instances\User;
use LaminimCMS\Instances\UserRole;
use Lkt\Factory\Schemas\Fields\AssocJSONField;
use Lkt\Factory\Schemas\Fields\BooleanField;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\EmailField;
use Lkt\Factory\Schemas\Fields\ForeignKeyField;
use Lkt\Factory\Schemas\Fields\ForeignKeysField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\MethodGetterField;
use Lkt\Factory\Schemas\Fields\StringChoiceField;
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
    ->setFieldsForRelatedMode('id', 'getFullName', [])
    ->setExcludedFieldsForViewFeed('lmm-create', ['assignedRoles', 'createdAt'])
    ->setExcludedFieldsForViewFeed('lmm-edit', ['assignedRoles', 'createdAt'])
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
            ->setLabel('__:lmm.name')
            ->configureView(FieldViewConfig::editMode('lmm-create', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'text'))
    )
    ->addField(
        StringField::define('lastName', 'lastname')
            ->setLabel('__:lmm.lastname')
            ->configureView(FieldViewConfig::editMode('lmm-create', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'text'))
    )
    ->addField(
        MethodGetterField::define('getFullName', 'fullName')
            ->setLabel('__:lmm.name')
            ->setCustomViewName('lmm-index', 'name')
            ->setCustomViewName('lmm-related', 'name')
            ->configureView(FieldViewConfig::readMode('lmm-index', 'text'))
    )
    ->addField(
        StringChoiceField::choice(User::STATUSES, 'status')
            ->setIsMandatory()
            ->setLabel('__:lmm.status')
            ->configureView(FieldViewConfig::readMode('lmm-index', 'i18n-choice'))
            ->configureView(FieldViewConfig::editMode('lmm-create', 'i18n-choice'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'i18n-choice'))
            ->setI18nViewOptions('lmm.userStatus')
    )
    ->addField(
        EmailField::define('email')
            ->setLabel('__:lmm.email')
            ->configureView(FieldViewConfig::readMode('lmm-index', 'email'))
            ->configureView(FieldViewConfig::editMode('lmm-create', 'email'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'email'))
    )
    ->addField(
        StringField::define('password')
            ->setLabel('__:lmm.password')
            ->configureView(FieldViewConfig::editMode('lmm-create', 'password'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'password'))
    )
    ->addField(
        BooleanField::define('hasCustomPermissionsEnabled', 'has_custom_permissions')
            ->setLabel('__:lmm.hasCustomPermissions')
            ->configureView(FieldViewConfig::editMode('lmm-create', 'switch'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'switch'))
    )
    ->addField(
        AssocJSONField::define('customPermissions', 'custom_permissions')
    )
    ->addField(
        MethodGetterField::define('getPreparedCustomPermissions', 'customPermissions')
            ->setLabel('__:lmm.rolePermConfig')
            ->configureView(FieldViewConfig::hideMode('lmm-create', 'lmm-modular-perms'))
            ->configureView(FieldViewConfig::hideMode('lmm-edit', 'lmm-modular-perms'))
    )
    ->addField(
        ForeignKeysField::defineRelation(UserRole::COMPONENT, 'assignedRoles', 'assigned_roles')
            ->setLabel('__:lmm.asignedRoles')
            ->configureView(FieldViewConfig::readMode('lmm-index', 'foreign-keys'))
            ->configureView(FieldViewConfig::editMode('lmm-create', 'foreign-keys'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'foreign-keys'))
    )
    ->addField(
        ForeignKeyField::defineRelation(MultimediaItem::COMPONENT, 'photo', 'photo_id')
            ->setAvailableOptionsFilter(MultimediaItemWhere::typeIsImage())
            ->setLabel('__:lmm.photo')
            ->setCustomViewName('lmm-index', 'image')
            ->configureView(FieldViewConfig::dataMode('lmm-index'))
            ->configureView(FieldViewConfig::editMode('lmm-create', 'lmm-multimedia-item'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'lmm-multimedia-item'))
    )
    ->setLayout(
        GridLayout::define('lmm-create', 1, [
                GridLayout::define('main-data', 2, [
                    'name', 'lastName', 'email', 'password',
                    'status',
                    'assignedRoles',
                ]),
                'photo',
                'hasCustomPermissionsEnabled',
                'customPermissions',
            ]
        )->setConditionalModes('hasCustomPermissionsEnabled', true, [
            'customPermissions' => 'edit',
        ])
    )
    ->setLayout(
        GridLayout::define('lmm-edit', 1, [
                'createdAt',
                GridLayout::define('main-data', 2, [
                    'name', 'lastName', 'email', 'password',
                    'status',
                    'assignedRoles',
                ]),
                'photo',
                'hasCustomPermissionsEnabled',
                'customPermissions',
            ]
        )->setConditionalModes('hasCustomPermissionsEnabled', true, [
            'customPermissions' => 'edit',
        ])
    )
    ;