<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\GroupBy; class ModularBlockGroupBy extends GroupBy { const COMPONENT = 'lmm-modular-block'; /** @return \LaminimCMS\Generated\ModularBlockGroupBy */ public static function define(string $field): static { /** @var \LaminimCMS\Generated\ModularBlockGroupBy $r */ $r = parent::define($field); return $r; } public function andGroupById() { return $this->andGroup('id'); } public static function id() { return static::DEFINE('id'); } public function andGroupByType() { return $this->andGroup('type'); } public static function type() { return static::DEFINE('type'); } public function andGroupByItemId() { return $this->andGroup('item_id'); } public static function itemId() { return static::DEFINE('item_id'); } public function andGroupByCreatedAt() { return $this->andGroup('created_at'); } public static function createdAt() { return static::DEFINE('created_at'); } public function andGroupByModularContent() { return $this->andGroup('modular_content'); } public static function modularContent() { return static::DEFINE('modular_content'); }}