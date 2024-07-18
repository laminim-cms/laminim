<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\Where; use Lkt\QueryBuilding\Query; use Lkt\Factory\Instantiator\Instantiator; class GeneratedModularOption extends \Lkt\Factory\Instantiator\Instances\AbstractInstance { const GENERATED_TYPE = 'lmm-modular-option'; const COMPONENT = 'lmm-modular-option'; public function getId() :int { return $this->_getIntegerVal('id'); } public function hasId() :bool { return $this->_hasIntegerVal('id'); } /** @return \LaminimCMS\Instances\ModularOption */ public function setId(int $id) { $this->_setIntegerVal('id', $id); return $this; } public function getName() :string { return $this->_getStringVal('name'); } public function hasName() :bool { return $this->_hasStringVal('name'); } /** @return \LaminimCMS\Instances\ModularOption */ public function setName(string $name) { $this->_setStringVal('name', $name); return $this; } public function getValue() :string { return $this->_getStringVal('value'); } public function hasValue() :bool { return $this->_hasStringVal('value'); } /** @return \LaminimCMS\Instances\ModularOption */ public function setValue(string $value) { $this->_setStringVal('value', $value); return $this; } public function getValueEn() :string { return $this->_getStringVal('valueEn'); } public function hasValueEn() :bool { return $this->_hasStringVal('valueEn'); } /** @return \LaminimCMS\Instances\ModularOption */ public function setValueEn(string $valueEn) { $this->_setStringVal('valueEn', $valueEn); return $this; } public function getValueEs() :string { return $this->_getStringVal('valueEs'); } public function hasValueEs() :bool { return $this->_hasStringVal('valueEs'); } /** @return \LaminimCMS\Instances\ModularOption */ public function setValueEs(string $valueEs) { $this->_setStringVal('valueEs', $valueEs); return $this; } public function getType() :string { return $this->_getStringVal('type'); } public function hasType() :bool { return $this->_hasStringVal('type'); } /** @return \LaminimCMS\Instances\ModularOption */ public function setType(string $type) { $this->_setStringVal('type', $type); return $this; } public function getItemId() :string { return $this->_getStringVal('itemId'); } public function hasItemId() :bool { return $this->_hasStringVal('itemId'); } /** @return \LaminimCMS\Instances\ModularOption */ public function setItemId(string $itemId) { $this->_setStringVal('itemId', $itemId); return $this; } public function getCreatedAt(): ?\Carbon\Carbon { return $this->_getDateTimeVal('createdAt'); } public function getCreatedAtFormatted(string $format = null) :string { return $this->_getDateTimeFormattedVal('createdAt', $format); } public function getCreatedAtIntlFormatted(string $format = null) :string { return $this->_getDateTimeFormattedIntlVal('createdAt', $format); } public function hasCreatedAt() :bool { return $this->_hasDateTimeVal('createdAt'); } /** @return \LaminimCMS\Instances\ModularOption*/ public function setCreatedAt($createdAt) { $this->_setDateTimeVal('createdAt', $createdAt); return $this; } /** * @return \LaminimCMS\Instances\ModularOption[] */ public static function getMany(Query $builder = null): array { /** @var \LaminimCMS\Instances\ModularOption[] */ $r = parent::getMany($builder); return $r; } /** * @return \LaminimCMS\Instances\ModularOption|null */ public static function getOne(Query $builder = null) { /** @var \LaminimCMS\Instances\ModularOption */ $r = parent::getOne($builder); return $r; } /** @return \LaminimCMS\Generated\ModularOptionQueryBuilder */ public static function getQueryCaller() { /** * @var \LaminimCMS\Generated\ModularOptionQueryBuilder $builder */ list($builder) = Instantiator::getCustomQueryCaller(static::GENERATED_TYPE); return $builder; } /** @return \LaminimCMS\Generated\ModularOptionQueryBuilder */ public static function getFilteredQueryCaller(array $data, array $processRules = null, array $filterRules = null) { /** * @var \LaminimCMS\Generated\ModularOptionQueryBuilder $caller */ list($builder) = Instantiator::getCustomQueryCaller(static::GENERATED_TYPE, $data, $processRules, $filterRules); return $builder; } /** * @return \LaminimCMS\Instances\ModularOption[] */ public static function getPage(int $page, Query $builder = null): array { /** @var \LaminimCMS\Instances\ModularOption[] */ $r = parent::getPage($page, $builder); return $r; } }