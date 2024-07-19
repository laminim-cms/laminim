<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Instances\MultimediaItem;
use LaminimCMS\Instances\User;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\FileField;
use Lkt\Factory\Schemas\Fields\ForeignKeyField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\StringField;
use Lkt\Factory\Schemas\InstanceSettings;
use Lkt\Factory\Schemas\Schema;
use Lkt\Factory\Schemas\Views\FieldViewConfig;
use Lkt\Factory\Schemas\Views\Layouts\GridLayout;

return Schema::table('lmm_multimedia', MultimediaItem::COMPONENT)
    ->setInstanceSettings(
        InstanceSettings::define(MultimediaItem::class)
            ->setClassNameForGeneratedClass('GeneratedMultimediaItem')
            ->setQueryCallerClassName('MultimediaItemQueryBuilder')
            ->setWhereClassName('MultimediaItemWhere')
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
        ForeignKeyField::defineRelation(User::COMPONENT, 'createdBy', 'created_by')
            ->setLabel('__:lmm.createdBy')
            ->configureView(FieldViewConfig::readMode('edit', 'foreign-key'))
            ->setDefaultValue(function() { return User::getLoggedId();})
    )
    ->addField(
        StringField::define('name')
            ->setLabel('__:lmm.name')
            ->configureView(FieldViewConfig::readMode('index', 'text'))
            ->configureView(FieldViewConfig::editMode('create', 'text'))
            ->configureView(FieldViewConfig::editMode('edit', 'text'))
    )
    ->addField(
        FileField::define('src')
            ->setLabel('__:lmm.src')
            ->setPublicPath('/laminim/open/:component')
//            ->setStorePath(__DIR__ . '/../../uploads')
            ->configureView(FieldViewConfig::readMode('index', 'file'))
            ->configureView(FieldViewConfig::editMode('create', 'file'))
            ->configureView(FieldViewConfig::editMode('edit', 'file'))
    )
    ->addField(
        FileField::define('posterSrc', 'poster_src')
            ->setLabel('__:lmm.posterSrc')
            ->configureView(FieldViewConfig::readMode('index', 'file'))
            ->configureView(FieldViewConfig::editMode('create', 'file'))
            ->configureView(FieldViewConfig::editMode('edit', 'file'))
    )
    ->addField(
        StringField::define('type')
            ->setLabel('__:lmm.type')
            ->configureView(FieldViewConfig::readMode('index', 'text'))
            ->configureView(FieldViewConfig::editMode('create', 'text'))
            ->configureView(FieldViewConfig::editMode('edit', 'text'))
    )
    ->addField(
        StringField::define('mime')
            ->setLabel('__:lmm.mime')
            ->configureView(FieldViewConfig::readMode('index', 'text'))
            ->configureView(FieldViewConfig::editMode('create', 'text'))
            ->configureView(FieldViewConfig::editMode('edit', 'text'))
    )
    ->setLayout(
        GridLayout::define('create', 1, [
                GridLayout::define('main-data', 2, [
                    GridLayout::define('main-data', 1, ['name', 'type']),
                    GridLayout::define('main-data', 2, ['src', 'posterSrc']),
                ]),
                'mime',
                'createdAt',
                'createdBy',
            ]
        )->setConditionalTypes('id', 0, [
            'createdAt' => 'data',
            'createdBy' => 'data',
        ]),
        ['edit']
    )
    ;