<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Generated\ModularOptionWhere;
use LaminimCMS\Instances\ModularOption;
use LaminimCMS\Instances\Translation;
use LaminimCMS\Instances\TranslationStack;
use LaminimCMS\Instances\User;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\ForeignKeyField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\MethodGetterField;
use Lkt\Factory\Schemas\Fields\RelatedField;
use Lkt\Factory\Schemas\Fields\StringChoiceField;
use Lkt\Factory\Schemas\Fields\StringField;
use Lkt\Factory\Schemas\InstanceSettings;
use Lkt\Factory\Schemas\Schema;
use Lkt\Factory\Schemas\Views\FieldViewConfig;
use Lkt\Factory\Schemas\Views\Layouts\GridLayout;

return Schema::table('lmm_i18n', Translation::COMPONENT)
    ->setInstanceSettings(
        InstanceSettings::define(Translation::class)
            ->setNamespaceForGeneratedClass('LaminimCMS\Generated')
            ->setWhereStoreGeneratedClass(__DIR__ . '/../Generated')
    )
    ->setCountableField('id')
    ->setItemsPerPage(20)
    ->setFieldsForRelatedMode('id', 'name', ['createdAt'])
    ->setExcludedFieldsForViewFeed('create', [])
    ->setExcludedFieldsForViewFeed('edit', ['createdAt', 'createdBy'])
    ->addField(
        IdField::define('id')
            ->setLabel('__:lmm.id')
            ->configureView(FieldViewConfig::dataMode('lmm-index'))
            ->configureView(FieldViewConfig::dataMode('lmm-edit'))
    )
    ->addField(
        ForeignKeyField::defineRelation(TranslationStack::COMPONENT, 'stack', 'lmm_stack_id')
            ->setLabel('__:lmm.stack')
            ->configureView(FieldViewConfig::editMode('lmm-create', 'foreign-key'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'foreign-key'))
            ->configureView(FieldViewConfig::editMode('lmm-filters', 'foreign-key'))
    )
    ->addField(
        StringChoiceField::choice(Translation::TYPES, 'type')
            ->setLabel('__:lmm.type')
            ->configureView(FieldViewConfig::readMode('lmm-index', 'i18n-choice'))
            ->configureView(FieldViewConfig::editMode('lmm-create', 'i18n-choice'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'i18n-choice'))
            ->configureView(FieldViewConfig::editMode('lmm-filters', 'i18n-choice'))
            ->setI18nViewOptions('lmm.i18nChoices')
    )
    ->addField(
        StringField::define('property')
            ->setLabel('__:lmm.property')
            ->configureView(FieldViewConfig::readMode('lmm-index'))
            ->configureView(FieldViewConfig::editMode('lmm-create', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-filters', 'text'))
    )
    ->addField(
        MethodGetterField::define('getDisplayName', 'name')
            ->setLabel('__:lmm.name')
            ->configureView(FieldViewConfig::readMode('lmm-index', 'text'))
    )
    ->addField(
        StringField::define('value')
            ->setIsI18nJson()
            ->setCustomViewName('lmm-index', 'description')
            ->setLabel('__:lmm.value')
            ->configureView(FieldViewConfig::readMode('lmm-index', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-filters', 'text'))
    )
    ->addField(
        StringField::define('valueEn', 'value')
            ->setIsI18nJson()
            ->setFixedLangKey('en')
            ->setLabel('__:lmm.valueEn')
            ->configureView(FieldViewConfig::editMode('lmm-create', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'text'))
    )
    ->addField(
        StringField::define('valueEs', 'value')
            ->setIsI18nJson()
            ->setFixedLangKey('es')
            ->setLabel('__:lmm.valueEs')
            ->configureView(FieldViewConfig::editMode('lmm-create', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'text'))
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
        RelatedField::defineRelation(ModularOption::COMPONENT, 'modularOptions', 'itemId')
            ->addRelatedComponentFeed('type', 'lmm-i18n')
            ->setWhere(ModularOptionWhere::typeEqual('lmm-i18n'))
            ->setLabel('__:lmm.modularOptions')
            ->configureView(FieldViewConfig::hideMode('lmm-create', 'lmm-modular-options'))
            ->configureView(FieldViewConfig::hideMode('lmm-edit', 'lmm-modular-options'))
            ->setAutoRemoveUnlinked()
    )
    ->setLayout(
        GridLayout::define('lmm-create', 1, [
                GridLayout::define('main-data', 3, ['stack', 'property', 'type']),
                'valueEn',
                'valueEs',
                'modularOptions',
            ]
        )
            ->setConditionalModes('type', 'choice', [
                'modularOptions' => 'edit',
                'valueEn' => 'hide',
                'valueEs' => 'hide',
            ])
            ->setConditionalTypes('type', 'textarea', [
                'valueEn' => 'textarea',
                'valueEs' => 'textarea',
            ])
            ->setConditionalTypes('type', 'editor', [
                'valueEn' => 'editor',
                'valueEs' => 'editor',
            ])
        ,
        ['lmm-edit']
    )
    ->setLayout(
        GridLayout::define('lmm-filters', 1, [
                GridLayout::define('main-data', 3, ['stack']),
                GridLayout::define('main-data', 3, ['property', 'type', 'value']),
            ]
        )
    );