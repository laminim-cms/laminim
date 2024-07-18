<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\SelectBuilder; class TranslationStackSelectBuilder extends SelectBuilder { const COMPONENT = 'lmm-i18n-stack'; const columnId = 'id'; public function andId(?string $as = null): static { return $this->andDatum('id', $as); } public static function id(?string $as = null): static { return static::datum('id', $as); } public function andCountId(?string $as = null): static { return $this->andCountDatum('id', $as); } public static function countId(?string $as = null): static { return static::countDatum('id', $as); } const columnName = 'name'; public function andName(?string $as = null): static { return $this->andDatum('name', $as); } public static function name(?string $as = null): static { return static::datum('name', $as); } public function andCountName(?string $as = null): static { return $this->andCountDatum('name', $as); } public static function countName(?string $as = null): static { return static::countDatum('name', $as); } const columnProperty = 'property'; public function andProperty(?string $as = null): static { return $this->andDatum('property', $as); } public static function property(?string $as = null): static { return static::datum('property', $as); } public function andCountProperty(?string $as = null): static { return $this->andCountDatum('property', $as); } public static function countProperty(?string $as = null): static { return static::countDatum('property', $as); } const columnRequiredAdminPerms = 'required_admin_perms'; public function andRequiredAdminPerms(?string $as = null): static { return $this->andDatum('required_admin_perms', $as); } public static function requiredAdminPerms(?string $as = null): static { return static::datum('required_admin_perms', $as); } public function andCountRequiredAdminPerms(?string $as = null): static { return $this->andCountDatum('required_admin_perms', $as); } public static function countRequiredAdminPerms(?string $as = null): static { return static::countDatum('required_admin_perms', $as); } const columnOnlyForCms = 'only_for_cms'; public function andOnlyForCms(?string $as = null): static { return $this->andDatum('only_for_cms', $as); } public static function onlyForCms(?string $as = null): static { return static::datum('only_for_cms', $as); } public function andCountOnlyForCms(?string $as = null): static { return $this->andCountDatum('only_for_cms', $as); } public static function countOnlyForCms(?string $as = null): static { return static::countDatum('only_for_cms', $as); } }