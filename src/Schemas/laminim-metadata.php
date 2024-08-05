<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Instances\Metadata;
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
    ->setFieldsForRelatedMode('id', 'title', ['id', 'title', 'url', 'description', 'keywords'])
    ->addField(
        IdField::define('id')
            ->setLabel('__:lmm.id')
            ->configureView(FieldViewConfig::dataMode('index'))
            ->configureView(FieldViewConfig::dataMode('related'))
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
        StringField::define('itemType', 'item_type')
            ->setLabel('__:lmm.itemType')
            ->configureView(FieldViewConfig::readMode('index', 'text'))
            ->configureView(FieldViewConfig::editMode('related', 'text'))
            ->configureView(FieldViewConfig::editMode('create', 'text'))
            ->configureView(FieldViewConfig::editMode('edit', 'text'))
    )
    ->addField(
        ForeignKeyField::define('item', 'item_id')
            ->setDynamicComponentField('itemType')
            ->setLabel('__:lmm.item')
            ->configureView(FieldViewConfig::editMode('create', 'foreign-key'))
            ->configureView(FieldViewConfig::editMode('edit', 'foreign-key'))
            ->configureView(FieldViewConfig::editMode('filters', 'foreign-key'))
    )
    ->addField(
        StringField::define('title')
            ->setLabel('__:lmm.title')
            ->configureView(FieldViewConfig::readMode('index', 'text'))
            ->configureView(FieldViewConfig::editMode('filters', 'text'))
            ->configureView(FieldViewConfig::editMode('related', 'text'))
            ->configureView(FieldViewConfig::editMode('create', 'text'))
            ->configureView(FieldViewConfig::editMode('edit', 'text'))
    )
    ->addField(
        StringField::define('description')
            ->setLabel('__:lmm.description')
            ->configureView(FieldViewConfig::readMode('index', 'text'))
            ->configureView(FieldViewConfig::editMode('related', 'text'))
            ->configureView(FieldViewConfig::editMode('filters', 'textarea'))
            ->configureView(FieldViewConfig::editMode('create', 'text'))
            ->configureView(FieldViewConfig::editMode('edit', 'text'))
    )
    ->addField(
        StringField::define('keywords')
            ->setLabel('__:lmm.keywords')
            ->configureView(FieldViewConfig::readMode('index', 'text'))
            ->configureView(FieldViewConfig::editMode('related', 'textarea'))
            ->configureView(FieldViewConfig::editMode('filters', 'text'))
            ->configureView(FieldViewConfig::editMode('create', 'text'))
            ->configureView(FieldViewConfig::editMode('edit', 'text'))
    )
    ->addField(
        StringField::define('url')
            ->setLabel('__:lmm.url')
            ->configureView(FieldViewConfig::editMode('related', 'text'))
            ->configureView(FieldViewConfig::dataMode('create', 'text'))
            ->configureView(FieldViewConfig::dataMode('edit', 'text'))
    )
    ->setLayout(
        GridLayout::define('create', 1, [
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
        ), ['edit']
    )
    ->setLayout(
        GridLayout::define('filters', 2, [
                'name', 'type'
            ]
        )
    );