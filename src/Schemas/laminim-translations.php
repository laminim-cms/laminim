<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Instances\Translation;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\StringField;
use Lkt\Factory\Schemas\InstanceSettings;
use Lkt\Factory\Schemas\Schema;
use Lkt\Factory\Schemas\Views\FieldViewConfig;
use Lkt\Factory\Schemas\Views\Layouts\GridLayout;

return Schema::table('lmm_i18n', Translation::COMPONENT)
    ->setInstanceSettings(
        InstanceSettings::define(Translation::class)
            ->setClassNameForGeneratedClass('GeneratedTranslation')
            ->setQueryCallerClassName('TranslationQueryBuilder')
            ->setWhereClassName('TranslationWhere')
            ->setNamespaceForGeneratedClass('LaminimCMS\Generated')
            ->setWhereStoreGeneratedClass(__DIR__ . '/../Generated')
    )
    ->setCountableField('id')
    ->setItemsPerPage(20)
    ->setFieldsForRelatedMode('id', 'name', ['createdAt'])
    ->setExcludedFieldsForViewFeed('create', ['valueEn', 'valueEs'])
    ->setExcludedFieldsForViewFeed('edit', ['createdAt', 'createdBy', 'valueEn', 'valueEs'])
    ->addField(
        IdField::define('id')
            ->setLabel('__:lmm.id')
            ->configureView(FieldViewConfig::dataMode('index'))
            ->configureView(FieldViewConfig::dataMode('edit'))
    )
    ->addField(
        StringField::define('stack')
            ->setLabel('__:lmm.stack')
            ->configureView(FieldViewConfig::editMode('create', 'text'))
            ->configureView(FieldViewConfig::editMode('edit', 'text'))
    )
    ->addField(
        StringField::define('type')
            ->setLabel('__:lmm.type')
            ->configureView(FieldViewConfig::readMode('index', 'text'))
            ->configureView(FieldViewConfig::editMode('create', 'text'))
            ->configureView(FieldViewConfig::editMode('edit', 'text'))
    )
    ->addField(
        StringField::define('value')
            ->setIsI18nJson()
            ->setLabel('__:lmm.value')
            ->configureView(FieldViewConfig::editMode('create', 'text'))
            ->configureView(FieldViewConfig::editMode('edit', 'text'))
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
    ->addField(
        DateTimeField::define('createdAt', 'created_at')
            ->setLabel('__:lmm.createdAt')
            ->setCurrentTimeStampAsDefaultValue()
            ->setDefaultReadFormat('Y-m-d H:i:s')
            ->configureView(FieldViewConfig::readMode('edit', 'date'))
    )
    ;