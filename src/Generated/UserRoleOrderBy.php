<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\OrderBy; class UserRoleOrderBy extends OrderBy { const COMPONENT = 'lmm-user-role'; /** @return \LaminimCMS\Generated\UserRoleOrderBy */ public static function ASC(string $field): static { /** @var \LaminimCMS\Generated\UserRoleOrderBy $r */ $r = parent::ASC($field); return $r; } /** @return \LaminimCMS\Generated\UserRoleOrderBy */ public static function DESC(string $field): static { /** @var \LaminimCMS\Generated\UserRoleOrderBy $r */ $r = parent::DESC($field); return $r; } public function andIdASC() { return $this->andASC('id'); } public function andIdDESC() { return $this->andDESC('id'); } public static function idASC() { return static::ASC('id'); } public static function idDESC() { return static::DESC('id'); } public function andCreatedAtASC() { return $this->andASC('created_at'); } public function andCreatedAtDESC() { return $this->andDESC('created_at'); } public static function createdAtASC() { return static::ASC('created_at'); } public static function createdAtDESC() { return static::DESC('created_at'); } public function andNameASC() { return $this->andASC('name'); } public function andNameDESC() { return $this->andDESC('name'); } public static function nameASC() { return static::ASC('name'); } public static function nameDESC() { return static::DESC('name'); } public function andHasCmsAccessASC() { return $this->andASC('has_cms_access'); } public function andHasCmsAccessDESC() { return $this->andDESC('has_cms_access'); } public static function hasCmsAccessASC() { return static::ASC('has_cms_access'); } public static function hasCmsAccessDESC() { return static::DESC('has_cms_access'); }}