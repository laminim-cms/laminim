<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Instances\ModularOption;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\StringField;
use Lkt\Factory\Schemas\InstanceSettings;
use Lkt\Factory\Schemas\Schema;
use Lkt\Factory\Schemas\Views\FieldViewConfig;

return Schema::table('lmm_modular_options', ModularOption::COMPONENT)
    ->setInstanceSettings(
        InstanceSettings::define(ModularOption::class)
            ->setNamespaceForGeneratedClass('LaminimCMS\Generated')
            ->setWhereStoreGeneratedClass(__DIR__ . '/../Generated')
    )
    ->setCountableField('id')
    ->setItemsPerPage(20)
    ->setFieldsForRelatedMode('', '', ['id', 'name', 'itemId', 'valueEn', 'valueEs'])
    ->addField(IdField::define('id'))
    ->addField(
        StringField::define('name')
            ->setLabel('__:lmm.name')
            ->configureView(FieldViewConfig::editMode('create', 'text'))
            ->configureView(FieldViewConfig::editMode('edit', 'text'))
    )
    ->addField(
        StringField::define('value')
            ->setIsI18nJson()
            ->setLabel('__:lmm.value')
            ->configureView(FieldViewConfig::readMode('index', 'text'))
    )
    ->addField(
        StringField::define('valueEn', 'value')
            ->setIsI18nJson()
            ->setFixedLangKey('en')
            ->setLabel('__:lmm.valueEn')
            ->configureView(FieldViewConfig::editMode('create', 'text'))
            ->configureView(FieldViewConfig::editMode('edit', 'text'))
    )
    ->addField(
        StringField::define('valueEs', 'value')
            ->setIsI18nJson()
            ->setFixedLangKey('es')
            ->setLabel('__:lmm.valueEs')
            ->configureView(FieldViewConfig::editMode('create', 'text'))
            ->configureView(FieldViewConfig::editMode('edit', 'text'))
    )
    ->addField(StringField::define('type'))
    ->addField(StringField::define('itemId', 'item_id'))
    ->addField(DateTimeField::define('createdAt', 'created_at')
        ->setCurrentTimeStampAsDefaultValue()
    );