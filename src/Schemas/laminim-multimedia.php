<?php

namespace LaminimCMS\Schemas;

use LaminimCMS\Instances\MultimediaItem;
use LaminimCMS\Instances\User;
use Lkt\Factory\Schemas\Fields\DateTimeField;
use Lkt\Factory\Schemas\Fields\FileField;
use Lkt\Factory\Schemas\Fields\ForeignKeyField;
use Lkt\Factory\Schemas\Fields\IdField;
use Lkt\Factory\Schemas\Fields\StringChoiceField;
use Lkt\Factory\Schemas\Fields\StringField;
use Lkt\Factory\Schemas\InstanceSettings;
use Lkt\Factory\Schemas\Schema;
use Lkt\Factory\Schemas\Views\FieldViewConfig;
use Lkt\Factory\Schemas\Views\Layouts\GridLayout;

return Schema::table('lmm_multimedia', MultimediaItem::COMPONENT)
    ->setInstanceSettings(
        InstanceSettings::define(MultimediaItem::class)
            ->setNamespaceForGeneratedClass('LaminimCMS\Generated')
            ->setWhereStoreGeneratedClass(__DIR__ . '/../Generated')
    )
    ->setCountableField('id')
    ->setItemsPerPage(20)
    ->setFieldsForRelatedMode('id', 'name', ['id', 'name', 'src', 'type', 'posterSrc', 'mime'])
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
            ->configureView(FieldViewConfig::readMode('lmm-edit', 'date'))
    )
    ->addField(
        ForeignKeyField::defineRelation(User::COMPONENT, 'createdBy', 'created_by')
            ->setLabel('__:lmm.createdBy')
            ->configureView(FieldViewConfig::readMode('lmm-edit', 'foreign-key'))
            ->setDefaultValue([User::class, 'getLoggedId'])
    )
    ->addField(
        StringField::define('name')
            ->setLabel('__:lmm.name')
            ->configureView(FieldViewConfig::readMode('lmm-index', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-filters', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-create', 'text'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'text'))
    )
    ->addField(
        StringField::define('url')
            ->setLabel('__:lmm.url')
            ->configureView(FieldViewConfig::dataMode('lmm-create', 'text'))
            ->configureView(FieldViewConfig::dataMode('lmm-edit', 'text'))
    )
    ->addField(
        FileField::define('src')
            ->setLabel('__:lmm.file')
            ->setDefaultValue('')
            ->setPublicPath('/laminim/open/:component/:field/:id')
            ->setStorePath(APP_DIR . '/private/multimedia')
            ->setHttpCacheDurationInSecondsToOneMonth()
            ->configureView(FieldViewConfig::readMode('lmm-index', 'file'))
            ->configureView(FieldViewConfig::editMode('lmm-create', 'file'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'file'))
    )
    ->addField(
        FileField::define('posterSrc', 'poster_src')
            ->setLabel('__:lmm.posterSrc')
            ->setPublicPath('/laminim/open/:component/:field/:id')
            ->setStorePath(APP_DIR . '/private/multimedia')
            ->setHttpCacheDurationInSecondsToOneMonth()
            ->configureView(FieldViewConfig::dataMode('lmm-create', 'file'))
            ->configureView(FieldViewConfig::dataMode('lmm-edit', 'file'))
    )
    ->addField(
        StringChoiceField::choice(MultimediaItem::TYPES, 'type')
            ->setDefaultValue(MultimediaItem::TYPE_IMAGE)
            ->setLabel('__:lmm.type')
            ->configureView(FieldViewConfig::readMode('lmm-index', 'i18n-choice'))
            ->configureView(FieldViewConfig::editMode('lmm-filters', 'i18n-choice'))
            ->configureView(FieldViewConfig::editMode('lmm-create', 'i18n-choice'))
            ->configureView(FieldViewConfig::editMode('lmm-edit', 'i18n-choice'))
            ->setI18nViewOptions('lmm.multimediaTypeChoices')
    )
    ->addField(
        StringField::define('mime')
            ->setLabel('__:lmm.mime')
            ->configureView(FieldViewConfig::hideMode('lmm-create', 'text'))
            ->configureView(FieldViewConfig::readMode('lmm-edit', 'text'))
    )
    ->setLayout(
        GridLayout::define('lmm-create', 1, [
                GridLayout::define('main-data', 1, [
                    GridLayout::define('main-data', 2, ['name', 'type']),
                    GridLayout::define('main-data', 1, ['url', 'src', 'posterSrc'])
                        ->setConditionalModes('type', [
                            MultimediaItem::TYPE_VIDEO,
                            MultimediaItem::TYPE_VIMEO,
                            MultimediaItem::TYPE_YOUTUBE,
                            MultimediaItem::TYPE_URL,
                        ], ['posterSrc' => 'edit'])
                        ->setConditionalModes('type', [
                            MultimediaItem::TYPE_VIMEO,
                            MultimediaItem::TYPE_YOUTUBE,
                            MultimediaItem::TYPE_URL,
                        ], [
                            'src' => 'data',
                            'url' => 'edit',
                        ]),
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