<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Instances\TranslationStack;
use Lkt\Factory\Schemas\Fields\BooleanField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\StringField;
use Lkt\Factory\Schemas\InstanceSettings;
use Lkt\Factory\Schemas\Schema;
use Lkt\Factory\Schemas\Views\FieldViewConfig;
use Lkt\Factory\Schemas\Views\Layouts\GridLayout;

return Schema::table('lmm_i18n_stacks', TranslationStack::COMPONENT)
    ->setInstanceSettings(
        InstanceSettings::define(TranslationStack::class)
            ->setNamespaceForGeneratedClass('LaminimCMS\Generated')
            ->setWhereStoreGeneratedClass(__DIR__ . '/../Generated')
    )
    ->setCountableField('id')
    ->setItemsPerPage(20)
    ->setFieldsForRelatedMode('id', 'name', [])
    ->setExcludedFieldsForViewFeed('lmm-create', [])
    ->setExcludedFieldsForViewFeed('lmm-edit', ['createdAt', 'createdBy'])
    ->addField(
        IdField::define('id')
            ->setLabel('__:lmm.id')
            ->configureView(FieldViewConfig::dataMode('lmm-index'))
            ->configureView(FieldViewConfig::dataMode('lmm-edit'))
    )
    ->addField(
        StringField::define('name')
            ->setLabel('__:lmm.name')
            ->configureView(FieldViewConfig::readMode('lmm-index'))
            ->configureView(FieldViewConfig::editMode('lmm-create', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'text'))
    )
    ->addField(
        StringField::define('property')
            ->setLabel('__:lmm.property')
            ->configureView(FieldViewConfig::editMode('lmm-create', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'text'))
    )
    ->addField(
        BooleanField::define('requiredAdminPerms', 'required_admin_perms')
            ->setLabel('__:lmm.requiredAdminPerms')
            ->configureView(FieldViewConfig::editMode('lmm-create', 'switch'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'switch'))
    )
    ->addField(
        BooleanField::define('onlyForCms', 'only_for_cms')
            ->setLabel('__:lmm.onlyForCms')
            ->configureView(FieldViewConfig::editMode('lmm-create', 'switch'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'switch'))
    )
    ->setLayout(
        GridLayout::define('lmm-create', 1, [
                GridLayout::define('main-data', 2, ['name', 'property', 'requiredAdminPerms', 'onlyForCms']),
            ]
        )
        ,
        ['lmm-edit']
    );