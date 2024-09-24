<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\GroupBy; class MetadataGroupBy extends GroupBy { const COMPONENT = 'lmm-metadata'; /** @return \LaminimCMS\Generated\MetadataGroupBy */ public static function define(string $field): static { /** @var \LaminimCMS\Generated\MetadataGroupBy $r */ $r = parent::define($field); return $r; } public function andGroupById() { return $this->andGroup('id'); } public static function id() { return static::DEFINE('id'); } public function andGroupByCreatedAt() { return $this->andGroup('created_at'); } public static function createdAt() { return static::DEFINE('created_at'); } public function andGroupByCreatedBy() { return $this->andGroup('created_by'); } public static function createdBy() { return static::DEFINE('created_by'); } public function andGroupByItemType() { return $this->andGroup('item_type'); } public static function itemType() { return static::DEFINE('item_type'); } public function andGroupByItem() { return $this->andGroup('item_id'); } public static function item() { return static::DEFINE('item_id'); } public function andGroupByTitle() { return $this->andGroup('title'); } public static function title() { return static::DEFINE('title'); } public function andGroupByDescription() { return $this->andGroup('description'); } public static function description() { return static::DEFINE('description'); } public function andGroupByKeywords() { return $this->andGroup('keywords'); } public static function keywords() { return static::DEFINE('keywords'); } public function andGroupByUrl() { return $this->andGroup('url'); } public static function url() { return static::DEFINE('url'); } public function andGroupByGeneratedUrl() { return $this->andGroup('generated_url'); } public static function generatedUrl() { return static::DEFINE('generated_url'); }}