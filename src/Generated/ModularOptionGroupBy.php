<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\GroupBy; class ModularOptionGroupBy extends GroupBy { const COMPONENT = 'lmm-modular-option'; /** @return \LaminimCMS\Generated\ModularOptionGroupBy */ public static function define(string $field): static { /** @var \LaminimCMS\Generated\ModularOptionGroupBy $r */ $r = parent::define($field); return $r; } public function andGroupById() { return $this->andGroup('id'); } public static function id() { return static::DEFINE('id'); } public function andGroupByName() { return $this->andGroup('name'); } public static function name() { return static::DEFINE('name'); } public function andGroupByValue() { return $this->andGroup('value'); } public static function value() { return static::DEFINE('value'); } public function andGroupByValueEn() { return $this->andGroup('value'); } public static function valueEn() { return static::DEFINE('value'); } public function andGroupByValueEs() { return $this->andGroup('value'); } public static function valueEs() { return static::DEFINE('value'); } public function andGroupByType() { return $this->andGroup('type'); } public static function type() { return static::DEFINE('type'); } public function andGroupByItemId() { return $this->andGroup('item_id'); } public static function itemId() { return static::DEFINE('item_id'); } public function andGroupByCreatedAt() { return $this->andGroup('created_at'); } public static function createdAt() { return static::DEFINE('created_at'); }}