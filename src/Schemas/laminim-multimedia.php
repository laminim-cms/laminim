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
            ->setDefaultValue(function () {
                return User::getLoggedId();
            })
    )
    ->addField(
        StringField::define('name')
            ->setLabel('__:lmm.name')
            ->configureView(FieldViewConfig::readMode('index', 'text'))
            ->configureView(FieldViewConfig::editMode('filters', 'text'))
            ->configureView(FieldViewConfig::editMode('create', 'text'))
            ->configureView(FieldViewConfig::editMode('edit', 'text'))
    )
    ->addField(
        StringField::define('url')
            ->setLabel('__:lmm.url')
            ->configureView(FieldViewConfig::dataMode('create', 'text'))
            ->configureView(FieldViewConfig::dataMode('edit', 'text'))
    )
    ->addField(
        FileField::define('src')
            ->setLabel('__:lmm.src')
            ->setDefaultValue('')
            ->setPublicPath('/laminim/open/:component/:field/:id')
            ->setStorePath(APP_DIR . '/private/multimedia')
            ->setHttpCacheDurationInSecondsToOneMonth()
            ->configureView(FieldViewConfig::readMode('index', 'file'))
            ->configureView(FieldViewConfig::editMode('create', 'file'))
            ->configureView(FieldViewConfig::editMode('edit', 'file'))
    )
    ->addField(
        FileField::define('posterSrc', 'poster_src')
            ->setLabel('__:lmm.posterSrc')
            ->setPublicPath('/laminim/open/:component/:field/:id')
            ->setStorePath(__DIR__ . '/../../uploads')
            ->setHttpCacheDurationInSecondsToOneMonth()
            ->configureView(FieldViewConfig::dataMode('create', 'file'))
            ->configureView(FieldViewConfig::dataMode('edit', 'file'))
    )
    ->addField(
        StringChoiceField::choice(MultimediaItem::TYPES, 'type')
            ->setDefaultValue(MultimediaItem::TYPE_IMAGE)
            ->setLabel('__:lmm.type')
            ->configureView(FieldViewConfig::readMode('index', 'i18n-choice'))
            ->configureView(FieldViewConfig::editMode('filters', 'i18n-choice'))
            ->configureView(FieldViewConfig::editMode('create', 'i18n-choice'))
            ->configureView(FieldViewConfig::editMode('edit', 'i18n-choice'))
            ->setI18nViewOptions('lmm.multimediaTypeChoices')
    )
    ->addField(
        StringField::define('mime')
            ->setLabel('__:lmm.mime')
            ->configureView(FieldViewConfig::hideMode('create', 'text'))
            ->configureView(FieldViewConfig::readMode('edit', 'text'))
    )
    ->setLayout(
        GridLayout::define('create', 1, [
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
        ), ['edit']
    )
    ->setLayout(
        GridLayout::define('filters', 2, [
                'name', 'type'
            ]
        )
    );