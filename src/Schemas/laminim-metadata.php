<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Instances\Metadata;
use LaminimCMS\Instances\User;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\ForeignKeyField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\StringField;
use Lkt\Factory\Schemas\InstanceSettings;
use Lkt\Factory\Schemas\Schema;
use Lkt\Factory\Schemas\Views\FieldViewConfig;
use Lkt\Factory\Schemas\Views\Layouts\GridLayout;

return Schema::table('lmm_metadata', Metadata::COMPONENT)
    ->setInstanceSettings(
        InstanceSettings::define(Metadata::class)
            ->setNamespaceForGeneratedClass('LaminimCMS\Generated')
            ->setWhereStoreGeneratedClass(__DIR__ . '/../Generated')
    )
    ->setCountableField('id')
    ->setItemsPerPage(20)
    ->setFieldsForRelatedMode('id', 'title', ['id', 'title', 'url', 'description', 'keywords', 'generatedUrl'])
    ->addField(
        IdField::define('id')
            ->setLabel('__:lmm.id')
            ->configureView(FieldViewConfig::dataMode('lmm-index'))
            ->configureView(FieldViewConfig::dataMode('lmm-related'))
            ->configureView(FieldViewConfig::dataMode('lmm-edit'))
    )
    ->addField(
        DateTimeField::define('createdAt', 'created_at')
            ->setLabel('__:lmm.createdAt')
            ->setCurrentTimeStampAsDefaultValue()
            ->setDefaultReadFormat('d/m/Y')
            ->setLangDefaultReadFormat('d/m/Y', 'es')
            ->setLangDefaultReadFormat('Y-m-d', 'en')
            ->configureView(FieldViewConfig::readMode('lmm-edit', 'date'))
    )
    ->addField(
        ForeignKeyField::defineRelation(User::COMPONENT, 'createdBy', 'created_by')
            ->setLabel('__:lmm.createdBy')
            ->configureView(FieldViewConfig::readMode('lmm-edit', 'foreign-key'))
            ->setDefaultValue([User::class, 'getLoggedId'])
    )
    ->addField(
        StringField::define('itemType', 'item_type')
            ->setLabel('__:lmm.itemType')
            ->configureView(FieldViewConfig::readMode('lmm-index', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-related', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-create', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'text'))
    )
    ->addField(
        ForeignKeyField::define('item', 'item_id')
            ->setDynamicComponentField('itemType')
            ->setLabel('__:lmm.item')
            ->configureView(FieldViewConfig::editMode('lmm-create', 'foreign-key'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'foreign-key'))
            ->configureView(FieldViewConfig::editMode('lmm-filters', 'foreign-key'))
    )
    ->addField(
        StringField::define('title')
            ->setLabel('__:lmm.title')
            ->configureView(FieldViewConfig::readMode('lmm-index', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-filters', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-related', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-create', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'text'))
    )
    ->addField(
        StringField::define('description')
            ->setLabel('__:lmm.description')
            ->configureView(FieldViewConfig::readMode('lmm-index', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-related', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-filters', 'textarea'))
            ->configureView(FieldViewConfig::editMode('lmm-create', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'text'))
    )
    ->addField(
        StringField::define('keywords')
            ->setLabel('__:lmm.keywords')
            ->configureView(FieldViewConfig::readMode('lmm-index', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-related', 'textarea'))
            ->configureView(FieldViewConfig::editMode('lmm-filters', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-create', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'text'))
    )
    ->addField(
        StringField::define('url')
            ->setLabel('__:lmm.url')
            ->configureView(FieldViewConfig::editMode('lmm-related', 'text'))
            ->configureView(FieldViewConfig::dataMode('lmm-create', 'text'))
            ->configureView(FieldViewConfig::dataMode('lmm-edit', 'text'))
    )
    ->addField(
        StringField::define('generatedUrl', 'generated_url')
            ->setLabel('__:lmm.generatedUrl')
            ->configureView(FieldViewConfig::editMode('lmm-related', 'text'))
            ->configureView(FieldViewConfig::dataMode('lmm-create', 'text'))
            ->configureView(FieldViewConfig::dataMode('lmm-edit', 'text'))
    )
    ->setLayout(
        GridLayout::define('lmm-create', 1, [
                GridLayout::define('main-data', 1, [
                    GridLayout::define('main-data', 2, ['name', 'type']),
                ]),
                'mime',
                GridLayout::define('main-data', 2, [
                    'createdAt',
                    'createdBy',
                ])->setConditionalModes('id', 0, [
                    'createdAt' => 'data',
                    'createdBy' => 'data',
                ]),
            ]
        ), ['lmm-edit']
    )
    ->setLayout(
        GridLayout::define('lmm-filters', 2, [
                'name', 'type'
            ]
        )
    );