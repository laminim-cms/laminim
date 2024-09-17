<?php

namespace LaminimCMS\Http;

use chillerlan\Filereader\File;
use LaminimCMS\Config\LaminimMenuEntry;
use LaminimCMS\Config\LaminimModule;
use LaminimCMS\Instances\Metadata;
use LaminimCMS\Instances\User;
use LaminimCMS\Laminim;
use Lkt\Factory\Instantiator\Instantiator;
use Lkt\Factory\Schemas\Exceptions\DuplicatedValueException;
use Lkt\Factory\Schemas\Exceptions\MissedMandatoryValueException;
use Lkt\Factory\Schemas\Fields\AbstractField;
use Lkt\Factory\Schemas\Fields\FileField;
use Lkt\Factory\Schemas\Fields\ForeignKeyField;
use Lkt\Factory\Schemas\Fields\IntegerField;
use Lkt\Factory\Schemas\Fields\PivotField;
use Lkt\Factory\Schemas\Fields\RelatedField;
use Lkt\Factory\Schemas\Fields\StringChoiceField;
use Lkt\Factory\Schemas\Fields\StringField;
use Lkt\Factory\Schemas\Schema;
use Lkt\Http\Response;
use Lkt\Locale\Locale;
use Lkt\Templates\Template;
use Lkt\Translations\Translations;
use function Lkt\Tools\Parse\clearInput;

class CmsHttp
{
    public static function indexHTML(): Response
    {
        return Response::ok(Template::file(__DIR__ . '/../../resources/phtml/index.phtml')->setData([
            'lang' => Locale::getLangCode(),
        ]));
    }

    public static function publicAppJs(): Response
    {
        $user = User::getLogged();
        if ($user->isAnonymous()) {
            return Response::ok(Template::file(__DIR__ . '/../../interface-public/dist/assets/index.js'))
                ->setContentTypeByFileExtension('js');
        }
        return Response::ok(Template::file(__DIR__ . '/../../interface/dist/assets/index.js'))
            ->setContentTypeByFileExtension('js');
    }

    public static function publicAppCss(): Response
    {
        $user = User::getLogged();
        if ($user->isAnonymous()) {
            return Response::ok(Template::file(__DIR__ . '/../../interface-public/dist/assets/index.css'))
                ->setContentTypeByFileExtension('css');
        }
        return Response::ok(Template::file(__DIR__ . '/../../interface/dist/assets/index.css'))
            ->setContentTypeByFileExtension('css');
    }

    public static function loadI18n($params = []): Response
    {
        Laminim::loadI18n();
        $response = Translations::getLangTranslations(Locale::getLangCode());
        return Response::ok([
            'data' => $response
        ]);
    }

    public static function loadModules($params = []): Response
    {
        return Response::ok([
            'data' => LaminimModule::getMappedModules()
        ]);
    }

    public static function loadMenu($params = []): Response
    {
        return Response::ok([
            'data' => LaminimMenuEntry::getMappedEntries()
        ]);
    }

    public static function singUp($params = []): Response
    {
        $user = clearInput($params['user']);
        $password = clearInput($params['password']);

        $query = User::getQueryCaller()
            ->andEmailEqual($user)
            ->andPasswordEqual($password);

        $ins = User::getOne($query);

        if ($ins instanceof User) {
            return Response::forbidden([]);
        }
        $ins = User::getInstance();
        $ins::feedInstance($ins, [
            'email' => $user,
            'password' => $password,
            'status' => User::STATUS_ACTIVE,
        ]);
        $ins->save();
        $ins->logIn();
        return Response::ok([
            'redirect' => '/laminim'
        ]);
    }

    public static function login($params = []): Response
    {
        $user = clearInput($params['user']);
        $password = clearInput($params['password']);

        $query = User::getQueryCaller()
            ->andStatusIsActive()
            ->andEmailEqual($user)
            ->andPasswordEqual($password);

        $ins = User::getOne($query);

        if ($ins instanceof User) {
            $ins->logIn();
            return Response::ok([
                'redirect' => '/laminim'
            ]);
        }

        return Response::forbidden([]);
    }

    public static function logout($params = []): Response
    {
        $ins = User::getLogged();

        if ($ins instanceof User) {
            $ins->logOut();
            return Response::ok([
                'redirect' => '/laminim'
            ]);
        }

        return Response::forbidden([]);
    }

    public static function getContentConfig($params = []): Response
    {
        $type = clearInput($params['_lmm_type']);
        $parentId = (int)clearInput($params['_lmm_parent_id']);
        $parentComponent = clearInput($params['_lmm_parent_component']);
        $decodedType = Laminim::getModuleByAlias($type);
        $schema = Schema::get($decodedType);

        $instance = Instantiator::make($decodedType, 0);

        if ($parentId > 0 && $parentComponent !== '') {
            $decodedParentComponent = Laminim::getModuleByAlias($parentComponent);
            $foreignField = array_filter($schema->getFields(), function (AbstractField $field) use ($decodedParentComponent) {
                return $field instanceof ForeignKeyField
                    && $field->getComponent() === $decodedParentComponent;
            });

            $foreignField = reset($foreignField);

            if ($foreignField) {
                $setter = $foreignField->getSetterForPrimitiveValue();
                $instance->$setter($parentId);
            }
        }
        $r = $instance->readViewFields('lmm-create');
        $fields = $schema->getViewConfigForFields('lmm-create');
        $layout = $schema->getViewLayout('lmm-create', true);
        $slugPattern = $schema->getSlugPattern();

        return Response::ok([
            'layout' => $layout,
            'fields' => $fields,
            'item' => $r,
            'maxPage' => 0,
            'perms' => ['create', 'update', 'read', 'drop'],
            'slugPattern' => $slugPattern,
        ]);
    }

    public static function indexItems(array $params): Response
    {
        $itemsPerPage = (int)clearInput($params['_lmm_items_per_page']);
        $type = clearInput($params['_lmm_type']);
        $view = clearInput($params['_lmm_view']);
        if ($view === '') $view = 'lmm-index';
        $viewFilters = clearInput($params['_lmm_view_filters']);
        if ($viewFilters === '') $viewFilters = 'lmm-filters';
        $filters = $params['_lmm_filters'];
        if (is_string($filters)) {
            $filters = json_decode($filters, true);
        }
        if (!$filters) $filters = [];
        $page = (int)clearInput($params['page']);
        $decodedType = Laminim::getModuleByAlias($type);
        $schema = Schema::get($decodedType);

        $anonymous = Instantiator::make($decodedType, 0);
        $query = $anonymous::getQueryCaller();


        $filtersFieldsObjs = $schema->getViewFields($viewFilters);
        foreach ($filters as $filter => $value) {
            $field = $filtersFieldsObjs[$filter];
            if (!is_object($field)) $field = $schema->getField($filter);
            if (!is_object($field)) continue;

            if ($field instanceof StringChoiceField) {
                if (is_array($value)) {
                    $query->andStringIn($field->getColumn(), $value);
                } else {
                    $query->andStringEqual($field->getColumn(), clearInput($value));
                }
            } elseif ($field instanceof StringField) {
                if (is_array($value)) {
                    $query->andStringIn($field->getColumn(), $value);
                } else {
                    $query->andStringLike($field->getColumn(), clearInput($value));
                }

            } elseif ($field instanceof IntegerField) {
                if (is_array($value)) {
                    $query->andIntegerIn($field->getColumn(), $value);
                } else {
                    $query->andIntegerEqual($field->getColumn(), (int)clearInput($value));
                }
            }
        }

        if ($itemsPerPage > 0) {
            $query->pagination($page, $itemsPerPage);
        }

        $results = $anonymous::getPage($page, $query);
        $maxPage = $anonymous::getAmountOfPages($query);

        $r = [];
        foreach ($results as $result) $r[] = $result->readViewFields($view);

        $fields = $schema->getViewConfigForFields($view);
        $layout = $schema->getViewLayout($viewFilters, true);
        $filtersFields = $schema->getViewConfigForFields($viewFilters);

        return Response::ok([
            'filtersLayout' => $layout,
            'filtersFields' => $filtersFields,
            'fields' => $fields,
            'results' => $r,
            'maxPage' => $maxPage,
            'perms' => ['create', 'update', 'read', 'drop']
        ]);
    }

    public static function validateMetadataSlug(array $params): Response
    {
        $type = clearInput($params['_lmm_type']);
        $id = (int)clearInput($params['_lmm_id']);
        $slug = clearInput($params['value']);
        $decodedType = Laminim::getModuleByAlias($type);

//        $query = Metadata::getQueryCaller()
//            ->andItemTypeEqual($decodedType)
//            ->andWhere(
//                MetadataWhere::getEmpty()
//                    ->andWhere(MetadataWhere::itemEqual($id)->andUrlEqual($slug))
//                    ->orWhere(MetadataWhere::itemNot($id)->andUrlEqual($slug))
//            )
//        ;

        $query = Metadata::getQueryCaller()
            ->andItemTypeEqual($decodedType)
            ->andUrlEqual($slug)
        ;

        $results = Metadata::getMany($query);

        // Not in use
        if (!$results) return Response::ok();

        // Same slug for this item
        if (count($results) === 1 && $results[0]->getItemId() === $id)  {
            return Response::ok();
        }

        // Increment slug
        $query = Metadata::getQueryCaller()
            ->andItemTypeEqual($decodedType)
            ->andUrlBeginsLike($slug)
        ;
        $results = Metadata::getMany($query);

        $map = array_map(function (Metadata $item) { return $item->getUrl();}, $results);

        return Response::ok([
            'data' => [
                'available' => $slug . '-' . count($map),
            ]
        ]);
    }

    public static function indexForField(array $params): Response
    {
        $type = clearInput($params['_lmm_type']);
        $ownType = clearInput($params['_lmm_own_type']);
        $fieldName = clearInput($params['_lmm_field']);
        $filters = json_decode($params['_lmm_filters'], true);
        if (!$filters) $filters = [];
        $page = (int)clearInput($params['page']);
        $decodedType = Laminim::getModuleByAlias($type);
        $decodedOwnType = Laminim::getModuleByAlias($ownType);
        $schema = Schema::get($decodedType);
        $ownSchema = Schema::get($decodedOwnType);

        $anonymous = Instantiator::make($decodedType, 0);
        $query = $anonymous::getQueryCaller();

        $field = $ownSchema->getField($fieldName);

        if (method_exists($field, 'getAvailableOptionsFilter')) {
            $where = $field->getAvailableOptionsFilter();
            $query->andRaw(implode(' AND ', $where));
        }

        $filtersFieldsObjs = $schema->getViewFields('lmm-filters');
        foreach ($filters as $filter => $value) {
            $field = $filtersFieldsObjs[$filter];
            if (!is_object($field)) $field = $schema->getField($filter);
            if (!is_object($field)) continue;

            if ($field instanceof StringChoiceField) {
                $query->andStringEqual($field->getColumn(), clearInput($value));
            } elseif ($field instanceof StringField) {
                $query->andStringLike($field->getColumn(), clearInput($value));

            } elseif ($field instanceof IntegerField) {
                $query->andIntegerEqual($field->getColumn(), clearInput($value));
            }
        }
        $results = $anonymous::getPage($page, $query);
        $maxPage = $anonymous::getAmountOfPages($query);

        $r = [];
        foreach ($results as $result) $r[] = $result->readViewFields('lmm-index');

        $fields = $schema->getViewConfigForFields('lmm-index');
        $layout = $schema->getViewLayout('lmm-filters', true);
        $filtersFields = $schema->getViewConfigForFields('lmm-filters');

        return Response::ok([
            'filtersLayout' => $layout,
            'filtersFields' => $filtersFields,
            'fields' => $fields,
            'results' => $r,
            'maxPage' => $maxPage,
            'perms' => ['create', 'update', 'read', 'drop']
        ]);
    }

    public static function relatedItems(array $params): Response
    {
        $type = clearInput($params['_lmm_type']);
        $id = (int)clearInput($params['_lmm_id']);
        $fieldName = clearInput($params['_lmm_field']);

        $filters = json_decode($params['_lmm_filters'], true);
        if (!$filters) $filters = [];
        $page = (int)clearInput($params['page']);
        $decodedType = Laminim::getModuleByAlias($type);
        $fromSchema = Schema::get($decodedType);

        $relatedField = $fromSchema->getRelatedField($fieldName);
        if (!$relatedField instanceof RelatedField) return Response::notFound();

        $schema = Schema::get($relatedField->getComponent());

        $fromAnonymous = Instantiator::make($decodedType, $id);
        $getter = $relatedField->getQueryBuilderGetter();
        $query = $fromAnonymous->{$getter}();



        $filtersFieldsObjs = $schema->getViewFields('lmm-filters');
        foreach ($filters as $filter => $value) {
            $field = $filtersFieldsObjs[$filter];
            if (!is_object($field)) continue;

            if ($field instanceof StringChoiceField) {
                $query->andStringEqual($field->getColumn(), clearInput($value));
            } elseif ($field instanceof StringField) {
                $query->andStringLike($field->getColumn(), clearInput($value));
            }
        }

        $anonymous = Instantiator::make($relatedField->getComponent(), 0);
        $results = $anonymous::getPage($page, $query);
        $maxPage = $anonymous::getAmountOfPages($query);

        $r = [];
        foreach ($results as $result) $r[] = $result->readViewFields('lmm-index');

        $fields = $schema->getViewConfigForFields('lmm-index');
        $layout = $schema->getViewLayout('lmm-filters', true);
        $filtersFields = $schema->getViewConfigForFields('lmm-filters');

        return Response::ok([
            'filtersLayout' => $layout,
            'filtersFields' => $filtersFields,
            'fields' => $fields,
            'results' => $r,
            'maxPage' => $maxPage,
            'perms' => ['create', 'update', 'read', 'drop']
        ]);
    }

    public static function pivotItems(array $params): Response
    {
        $type = clearInput($params['_lmm_type']);
        $id = (int)clearInput($params['_lmm_id']);
        $fieldName = clearInput($params['_lmm_field']);

        $filters = json_decode($params['_lmm_filters'], true);
        if (!$filters) $filters = [];
        $page = (int)clearInput($params['page']);
        $decodedType = Laminim::getModuleByAlias($type);
        $fromSchema = Schema::get($decodedType);

        $relatedField = $fromSchema->getPivotField($fieldName);
        if (!$relatedField instanceof PivotField) return Response::notFound();

        $schema = Schema::get($relatedField->getComponent());

        $fromAnonymous = Instantiator::make($decodedType, $id);
//        $getter = $relatedField->getQueryBuilderGetter();
//        $query = $fromAnonymous->{$getter}();
        $query = $fromAnonymous->_getPivotQueryBuilder($fieldName);



        $filtersFieldsObjs = $schema->getViewFields('lmm-filters');
        foreach ($filters as $filter => $value) {
            $field = $filtersFieldsObjs[$filter];
            if (!is_object($field)) continue;

            if ($field instanceof StringChoiceField) {
                $query->andStringEqual($field->getColumn(), clearInput($value));
            } elseif ($field instanceof StringField) {
                $query->andStringLike($field->getColumn(), clearInput($value));
            }
        }

        $anonymous = Instantiator::make($relatedField->getComponent(), 0);
        $results = $anonymous::getPage($page, $query);
        $maxPage = $anonymous::getAmountOfPages($query);

        $r = [];
        foreach ($results as $result) $r[] = $result->readViewFields('lmm-related');

        $fields = $schema->getViewConfigForFields('lmm-related');
        $layout = $schema->getViewLayout('lmm-filters', true);
        $filtersFields = $schema->getViewConfigForFields('lmm-filters');

        return Response::ok([
            'filtersLayout' => $layout,
            'filtersFields' => $filtersFields,
            'fields' => $fields,
            'results' => $r,
            'maxPage' => $maxPage,
            'perms' => ['create', 'update', 'read', 'drop']
        ]);
    }

    public static function availablePivotItems(array $params): Response
    {
        $type = clearInput($params['_lmm_type']);
        $id = (int)clearInput($params['_lmm_id']);
        $fieldName = clearInput($params['_lmm_field']);

        $filters = json_decode($params['_lmm_filters'], true);
        if (!$filters) $filters = [];
        $page = (int)clearInput($params['page']);
        $decodedType = Laminim::getModuleByAlias($type);
        $fromSchema = Schema::get($decodedType);

        $relatedField = $fromSchema->getPivotField($fieldName);
        if (!$relatedField instanceof PivotField) return Response::notFound();

        $schema = Schema::get($relatedField->getComponent());

        $fromAnonymous = Instantiator::make($decodedType, $id);
        $query = $fromAnonymous->_getAvailablePivotQueryBuilder($fieldName);


        $filtersFieldsObjs = $schema->getViewFields('lmm-filters');
        foreach ($filters as $filter => $value) {
            $field = $filtersFieldsObjs[$filter];
            if (!is_object($field)) continue;

            if ($field instanceof StringChoiceField) {
                $query->andStringEqual($field->getColumn(), clearInput($value));
            } elseif ($field instanceof StringField) {
                $query->andStringLike($field->getColumn(), clearInput($value));
            }
        }

        $anonymous = Instantiator::make($relatedField->getComponent(), 0);
        $results = $anonymous::getPage($page, $query);
        $maxPage = $anonymous::getAmountOfPages($query);

        $r = [];
        foreach ($results as $result) $r[] = $result->readViewFields('lmm-related');

        $fields = $schema->getViewConfigForFields('lmm-related');
        $layout = $schema->getViewLayout('lmm-filters', true);
        $filtersFields = $schema->getViewConfigForFields('lmm-filters');

        return Response::ok([
            'filtersLayout' => $layout,
            'filtersFields' => $filtersFields,
            'fields' => $fields,
            'results' => $r,
            'maxPage' => $maxPage,
            'perms' => ['create', 'update', 'read', 'drop']
        ]);
    }

    public static function storePivotItems(array $params): Response
    {
        $type = clearInput($params['_lmm_type']);
        $id = (int)clearInput($params['_lmm_id']);
        $fieldName = clearInput($params['_lmm_field']);
        $data = $params['_lmm_data'];
        if (!is_array($data)) $data = json_decode($data, true);
        if (!$data) $data = [];

        $decodedType = Laminim::getModuleByAlias($type);
        $fromSchema = Schema::get($decodedType);

        $relatedField = $fromSchema->getPivotField($fieldName);
        if (!$relatedField instanceof PivotField) return Response::notFound();

        $fromInstance = Instantiator::make($decodedType, $id);
        foreach ($data as $datum) {
            $fromInstance->linkPivot($relatedField->getPivotComponent(), $datum);
        }

        return Response::ok([]);
    }

    public static function optionItems(array $params): Response
    {
        $type = clearInput($params['_lmm_type']);
        $page = (int)clearInput($params['page']);
        $decodedType = Laminim::getModuleByAlias($type);
        $schema = Schema::get($decodedType);

        $anonymous = Instantiator::make($decodedType, 0);
        $query = $anonymous::getQueryCaller();



        $viewFilters = clearInput($params['_lmm_view_filters']);
        if ($viewFilters === '') $viewFilters = 'lmm-filters';
        $filters = $params['_lmm_filters'];
        if (is_string($filters)) {
            $filters = json_decode($filters, true);
        }
        if (!$filters) $filters = [];

        $filtersFieldsObjs = $schema->getViewFields($viewFilters);
        foreach ($filters as $filter => $value) {
            $field = $filtersFieldsObjs[$filter];
            if (!is_object($field)) $field = $schema->getField($filter);
            if (!is_object($field)) continue;

            if ($field instanceof StringChoiceField) {
                if (is_array($value)) {
                    $query->andStringIn($field->getColumn(), $value);
                } else {
                    $query->andStringEqual($field->getColumn(), clearInput($value));
                }
            } elseif ($field instanceof StringField) {
                if (is_array($value)) {
                    $query->andStringIn($field->getColumn(), $value);
                } else {
                    $query->andStringLike($field->getColumn(), clearInput($value));
                }

            } elseif ($field instanceof IntegerField) {
                if (is_array($value)) {
                    $query->andIntegerIn($field->getColumn(), $value);
                } else {
                    $query->andIntegerEqual($field->getColumn(), (int)clearInput($value));
                }
            }
        }

        $results = $anonymous::getPage($page, $query);
        $maxPage = $anonymous::getAmountOfPages($query);

        $r = [];
        foreach ($results as $result) $r[] = $result->readAsRelated();

        $fields = $schema->getViewConfigForFields('lmm-index');

        return Response::ok([
            'fields' => $fields,
            'results' => $r,
            'maxPage' => $maxPage,
            'perms' => ['create', 'update', 'read', 'drop']
        ]);
    }

    public static function createItem($params = []): Response
    {
        $type = clearInput($params['_lmm_type']);
        $parentId = (int)clearInput($params['_lmm_parent_id']);
        $parentComponent = clearInput($params['_lmm_pivot_component']);
        $decodedType = Laminim::getModuleByAlias($type);

        $data = $params['data'];
        $item = Instantiator::make($decodedType, 0);

        try {
            $item::feedInstance($item, $data, 'lmm-create');
            $item->save();

        } catch (DuplicatedValueException|MissedMandatoryValueException $exception) {
            return Response::badRequest([
                'errorMessage' => $exception->getMessage(),
            ]);
        }

        if ($parentId > 0 && $parentComponent !== '') {
            $item->linkPivot($parentComponent, $parentId);
        }

        return Response::ok([
            'item' => ['id' => $item->getId()],
        ]);
    }

    public static function updateItem($params = []): Response
    {
        $type = clearInput($params['_lmm_type']);
        $id = clearInput($params['id']);
        $decodedType = Laminim::getModuleByAlias($type);

        $data = $params['data'];
        $item = Instantiator::make($decodedType, $id);

        try {
            $item::feedInstance($item, $data, 'lmm-edit');
            $item->save();

        } catch (DuplicatedValueException|MissedMandatoryValueException $exception) {
            return Response::badRequest([
                'errorMessage' => $exception->getMessage(),
            ]);
        }

        return Response::ok([
            'item' => ['id' => $item->getId()],
        ]);
    }

    public static function deleteItem($params = []): Response
    {
        $type = clearInput($params['_lmm_type']);
        $id = clearInput($params['id']);
        $decodedType = Laminim::getModuleByAlias($type);

        $item = Instantiator::make($decodedType, $id);

        // Assign same table fields
        $item->delete();

        return Response::ok([
            'item' => ['id' => $item->getId()],
        ]);
    }

    public static function readItem(array $params): Response
    {
        $type = clearInput($params['_lmm_type']);
        $identifier = clearInput($params['_lmm_id']);
        $decodedType = Laminim::getModuleByAlias($type);
        $view = clearInput($params['_lmm_view']);
        if ($view === '') $view = 'lmm-edit';
        $schema = Schema::get($decodedType);

        $instance = Instantiator::make($decodedType, $identifier);
        $r = $instance->readViewFields($view);
        $fields = $schema->getViewConfigForFields($view);
        $layout = $schema->getViewLayout($view, true);
        $slugPattern = $schema->getSlugPattern();

        return Response::ok([
            'layout' => $layout,
            'fields' => $fields,
            'item' => $r,
            'perms' => ['create', 'update', 'read', 'drop'],
            'slugPattern' => $slugPattern
        ]);
    }

    public static function openItemField(array $params = []): Response
    {
        $type = clearInput($params['_lmm_type']);
        $fieldName = clearInput($params['field']);
        $identifier = clearInput($params['id']);
        $decodedType = Laminim::getModuleByAlias($type);
        $schema = Schema::get($decodedType);
        $field = $schema->getField($fieldName);

        $instance = Instantiator::make($decodedType, $identifier);

        if (!$field instanceof FileField) {
            return Response::notFound();
        }

        $path = $field->getStorePath();

        /** @var File $file */
        $file = $instance->{$field->getGetterForPrimitiveValue()}();
        if (!$file instanceof File) return Response::notFound();
        $path = $file->path;
        $content = $file->content();

        if (!$content) return Response::notFound();

        $content = file_get_contents($path);

        $filename = basename($file->name);
        $extension = strtolower(substr(strrchr($filename, '.'), 1));

        $response = Response::ok($content)
            ->setContentTypeByFileExtension($extension)
            ->setLastModifiedHeader(filemtime($path));

        if ($field->hasHttpCacheDurationInSeconds()) {
            $httpExpiration = $field->getHttpCacheDurationInSeconds();
            $response
                ->setCacheControlMaxAgeHeader($httpExpiration)
                ->setExpiresHeader($httpExpiration)
            ;
        }

        return $response;
    }
}