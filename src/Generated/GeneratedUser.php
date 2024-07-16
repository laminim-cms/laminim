<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\Where; use Lkt\QueryBuilding\Query; use Lkt\Factory\Instantiator\Instantiator; class GeneratedUser extends \Lkt\Factory\Instantiator\Instances\AbstractInstance { const GENERATED_TYPE = 'lmm-user'; const COMPONENT = 'lmm-user'; public function getId() :int { return $this->_getIntegerVal('id'); } public function hasId() :bool { return $this->_hasIntegerVal('id'); } /** @return \LaminimCMS\Instances\User */ public function setId(int $id) { $this->_setIntegerVal('id', $id); return $this; } public function getCreatedAt(): ?\Carbon\Carbon { return $this->_getDateTimeVal('createdAt'); } public function getCreatedAtFormatted(string $format = null) :string { return $this->_getDateTimeFormattedVal('createdAt', $format); } public function getCreatedAtIntlFormatted(string $format = null) :string { return $this->_getDateTimeFormattedIntlVal('createdAt', $format); } public function hasCreatedAt() :bool { return $this->_hasDateTimeVal('createdAt'); } /** @return \LaminimCMS\Instances\User*/ public function setCreatedAt($createdAt) { $this->_setDateTimeVal('createdAt', $createdAt); return $this; } public function getName() :string { return $this->_getStringVal('name'); } public function hasName() :bool { return $this->_hasStringVal('name'); } /** @return \LaminimCMS\Instances\User */ public function setName(string $name) { $this->_setStringVal('name', $name); return $this; } public function getLastName() :string { return $this->_getStringVal('lastName'); } public function hasLastName() :bool { return $this->_hasStringVal('lastName'); } /** @return \LaminimCMS\Instances\User */ public function setLastName(string $lastName) { $this->_setStringVal('lastName', $lastName); return $this; } public function getEmail() :string { return $this->_getEmailVal('email'); } public function hasEmail() :bool { return $this->_hasEmailVal('email'); } /** @return \LaminimCMS\Instances\User */ public function setEmail(string $email) { $this->_setEmailVal('email', $email); return $this; } public function getPassword() :string { return $this->_getStringVal('password'); } public function hasPassword() :bool { return $this->_hasStringVal('password'); } /** @return \LaminimCMS\Instances\User */ public function setPassword(string $password) { $this->_setStringVal('password', $password); return $this; } public function hasCustomPermissionsEnabled() :bool { return $this->_getBooleanVal('hasCustomPermissionsEnabled'); } /** @return \LaminimCMS\Instances\User */ public function setHasCustomPermissionsEnabled(bool $hasCustomPermissionsEnabled) { $this->_setBooleanVal('hasCustomPermissionsEnabled', $hasCustomPermissionsEnabled); return $this; } public function getCustomPermissions() :?array { return $this->_getJsonVal('customPermissions'); } /** @return \LaminimCMS\Instances\User*/ public function setCustomPermissions(array $customPermissions) { $this->_setJsonVal('customPermissions', $customPermissions); return $this; } public function hasCustomPermissions() :bool { return $this->_hasJsonVal('customPermissions'); } public function getAssignedRoles(): string { return $this->_getForeignListVal('assignedRoles'); } public function hasAssignedRoles() :bool { return $this->_hasForeignListVal('assignedRoles'); } /** @return \LaminimCMS\Instances\User*/ public function setAssignedRoles($assignedRoles) { $this->_setForeignListVal('assignedRoles', $assignedRoles); return $this; } /** @return \LaminimCMS\Instances\User*/ public function removeAssignedRolesIds(array $ids) { $this->_removeForeignListIds('assignedRoles', $ids); return $this; } /** @return \LaminimCMS\Instances\UserRole[]*/ public function getAssignedRolesData() :array { return $this->_getForeignListData('assignedRoles'); } public function getAssignedRolesIds() :array { return $this->_getForeignListIds('assignedRoles'); } /** * @return \LaminimCMS\Instances\User[] */ public static function getMany(Query $builder = null): array { /** @var \LaminimCMS\Instances\User[] */ $r = parent::getMany($builder); return $r; } /** * @return \LaminimCMS\Instances\User|null */ public static function getOne(Query $builder = null) { /** @var \LaminimCMS\Instances\User */ $r = parent::getOne($builder); return $r; } /** @return \LaminimCMS\Generated\UserQueryBuilder */ public static function getQueryCaller() { /** * @var \LaminimCMS\Generated\UserQueryBuilder $builder */ list($builder) = Instantiator::getCustomQueryCaller(static::GENERATED_TYPE); return $builder; } /** @return \LaminimCMS\Generated\UserQueryBuilder */ public static function getFilteredQueryCaller(array $data, array $processRules = null, array $filterRules = null) { /** * @var \LaminimCMS\Generated\UserQueryBuilder $caller */ list($builder) = Instantiator::getCustomQueryCaller(static::GENERATED_TYPE, $data, $processRules, $filterRules); return $builder; } /** * @return \LaminimCMS\Instances\User[] */ public static function getPage(int $page, Query $builder = null): array { /** @var \LaminimCMS\Instances\User[] */ $r = parent::getPage($page, $builder); return $r; } }