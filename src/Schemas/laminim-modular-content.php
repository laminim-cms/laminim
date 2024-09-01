<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Instances\ModularContent;
use LaminimCMS\Instances\User;
use Lkt\Factory\Schemas\Fields\AssocJSONField;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\ForeignKeyField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\StringField;
use Lkt\Factory\Schemas\Fields\ValueListField;
use Lkt\Factory\Schemas\InstanceSettings;
use Lkt\Factory\Schemas\Schema;
use Lkt\Factory\Schemas\Views\FieldViewConfig;

return Schema::table('lmm_modular_content', ModularContent::COMPONENT)
    ->setInstanceSettings(
        InstanceSettings::define(ModularContent::class)
            ->setNamespaceForGeneratedClass('LaminimCMS\Generated')
            ->setWhereStoreGeneratedClass(__DIR__ . '/../Generated')
    )
    ->setCountableField('id')
    ->setItemsPerPage(20)
    ->setFieldsForRelatedMode('', '', ['id', 'type', 'items'])
    ->addField(
        IdField::define('id')
            ->configureView(FieldViewConfig::dataMode('lmm-related', 'text'))
    )
    ->addField(
        StringField::define('type')
            ->configureView(FieldViewConfig::readMode('lmm-related', 'text'))
    )
    ->addField(DateTimeField::define('createdAt', 'created_at')
        ->setCurrentTimeStampAsDefaultValue()
        ->setDefaultReadFormat('d/m/Y')
        ->setLangDefaultReadFormat('d/m/Y', 'es')
        ->setLangDefaultReadFormat('Y-m-d', 'en')
    )
    ->addField(
        ForeignKeyField::defineRelation(User::COMPONENT, 'createdBy', 'created_by')
            ->setLabel('__:lmm.createdBy')
            ->configureView(FieldViewConfig::readMode('lmm-edit', 'foreign-key'))
            ->setDefaultValue([User::class, 'getLoggedId'])
    )
    ->addField(
        AssocJSONField::define('breakpoints')
    )
    ->addField(
        AssocJSONField::define('config')
    )
    ->addField(
        ValueListField::define('items')
            ->setReadModeToArray()
            ->configureView(FieldViewConfig::editMode('lmm-related', 'text'))
    )
    ;