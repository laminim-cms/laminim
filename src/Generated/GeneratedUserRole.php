<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\Where; use Lkt\QueryBuilding\Query; use Lkt\Factory\Instantiator\Instantiator; class GeneratedUserRole extends \Lkt\Factory\Instantiator\Instances\AbstractInstance { const GENERATED_TYPE = 'lmm-user-role'; const COMPONENT = 'lmm-user-role'; public function getId() :int { return $this->_getIntegerVal('id'); } public function hasId() :bool { return $this->_hasIntegerVal('id'); } /** @return \LaminimCMS\Instances\UserRole */ public function setId(int $id) { $this->_setIntegerVal('id', $id); return $this; } public function getCreatedAt(): ?\Carbon\Carbon { return $this->_getDateTimeVal('createdAt'); } public function getCreatedAtFormatted(string $format = null) :string { return $this->_getDateTimeFormattedVal('createdAt', $format); } public function getCreatedAtIntlFormatted(string $format = null) :string { return $this->_getDateTimeFormattedIntlVal('createdAt', $format); } public function hasCreatedAt() :bool { return $this->_hasDateTimeVal('createdAt'); } /** @return \LaminimCMS\Instances\UserRole*/ public function setCreatedAt($createdAt) { $this->_setDateTimeVal('createdAt', $createdAt); return $this; } public function getName() :string { return $this->_getStringVal('name'); } public function hasName() :bool { return $this->_hasStringVal('name'); } /** @return \LaminimCMS\Instances\UserRole */ public function setName(string $name) { $this->_setStringVal('name', $name); return $this; } public function hasCmsAccess() :bool { return $this->_getBooleanVal('hasCmsAccess'); } /** @return \LaminimCMS\Instances\UserRole */ public function setHasCmsAccess(bool $hasCmsAccess) { $this->_setBooleanVal('hasCmsAccess', $hasCmsAccess); return $this; } public function getConfig() :?array { return $this->_getJsonVal('config'); } /** @return \LaminimCMS\Instances\UserRole*/ public function setConfig(array $config) { $this->_setJsonVal('config', $config); return $this; } public function hasConfig() :bool { return $this->_hasJsonVal('config'); } /** * @return \LaminimCMS\Instances\UserRole[] */ public static function getMany(Query $builder = null): array { /** @var \LaminimCMS\Instances\UserRole[] */ $r = parent::getMany($builder); return $r; } /** * @return \LaminimCMS\Instances\UserRole|null */ public static function getOne(Query $builder = null) { /** @var \LaminimCMS\Instances\UserRole */ $r = parent::getOne($builder); return $r; } /** @return \LaminimCMS\Generated\UserRoleQueryBuilder */ public static function getQueryCaller() { /** * @var \LaminimCMS\Generated\UserRoleQueryBuilder $builder */ list($builder) = Instantiator::getCustomQueryCaller(static::GENERATED_TYPE); return $builder; } /** @return \LaminimCMS\Generated\UserRoleQueryBuilder */ public static function getFilteredQueryCaller(array $data, array $processRules = null, array $filterRules = null) { /** * @var \LaminimCMS\Generated\UserRoleQueryBuilder $caller */ list($builder) = Instantiator::getCustomQueryCaller(static::GENERATED_TYPE, $data, $processRules, $filterRules); return $builder; } /** * @return \LaminimCMS\Instances\UserRole[] */ public static function getPage(int $page, Query $builder = null): array { /** @var \LaminimCMS\Instances\UserRole[] */ $r = parent::getPage($page, $builder); return $r; } }