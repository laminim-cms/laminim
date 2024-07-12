<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\GroupBy; class UserGroupBy extends GroupBy { const COMPONENT = 'lmm-user'; /** @return \LaminimCMS\Generated\UserGroupBy */ public static function define(string $field): static { /** @var \LaminimCMS\Generated\UserGroupBy $r */ $r = parent::define($field); return $r; } public function andGroupById() { return $this->andGroup('id'); } public static function id() { return static::DEFINE('id'); } public function andGroupByCreatedAt() { return $this->andGroup('created_at'); } public static function createdAt() { return static::DEFINE('created_at'); } public function andGroupByName() { return $this->andGroup('name'); } public static function name() { return static::DEFINE('name'); } public function andGroupByLastName() { return $this->andGroup('lastname'); } public static function lastName() { return static::DEFINE('lastname'); } public function andGroupByEmail() { return $this->andGroup('email'); } public static function email() { return static::DEFINE('email'); } public function andGroupByPassword() { return $this->andGroup('password'); } public static function password() { return static::DEFINE('password'); } public function andGroupByAssignedRoles() { return $this->andGroup('assigned_roles'); } public static function assignedRoles() { return static::DEFINE('assigned_roles'); }}