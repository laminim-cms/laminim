<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\GroupBy; class TranslationStackGroupBy extends GroupBy { const COMPONENT = 'lmm-i18n-stack'; /** @return \LaminimCMS\Generated\TranslationStackGroupBy */ public static function define(string $field): static { /** @var \LaminimCMS\Generated\TranslationStackGroupBy $r */ $r = parent::define($field); return $r; } public function andGroupById() { return $this->andGroup('id'); } public static function id() { return static::DEFINE('id'); } public function andGroupByName() { return $this->andGroup('name'); } public static function name() { return static::DEFINE('name'); } public function andGroupByProperty() { return $this->andGroup('property'); } public static function property() { return static::DEFINE('property'); } public function andGroupByRequiredAdminPerms() { return $this->andGroup('required_admin_perms'); } public static function requiredAdminPerms() { return static::DEFINE('required_admin_perms'); } public function andGroupByOnlyForCms() { return $this->andGroup('only_for_cms'); } public static function onlyForCms() { return static::DEFINE('only_for_cms'); }}