<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\OrderBy; class MetadataOrderBy extends OrderBy { const COMPONENT = 'lmm-metadata'; /** @return \LaminimCMS\Generated\MetadataOrderBy */ public static function ASC(string $field): static { /** @var \LaminimCMS\Generated\MetadataOrderBy $r */ $r = parent::ASC($field); return $r; } /** @return \LaminimCMS\Generated\MetadataOrderBy */ public static function DESC(string $field): static { /** @var \LaminimCMS\Generated\MetadataOrderBy $r */ $r = parent::DESC($field); return $r; } public function andIdASC() { return $this->andASC('id'); } public function andIdDESC() { return $this->andDESC('id'); } public static function idASC() { return static::ASC('id'); } public static function idDESC() { return static::DESC('id'); } public function andCreatedAtASC() { return $this->andASC('created_at'); } public function andCreatedAtDESC() { return $this->andDESC('created_at'); } public static function createdAtASC() { return static::ASC('created_at'); } public static function createdAtDESC() { return static::DESC('created_at'); } public function andItemTypeASC() { return $this->andASC('item_type'); } public function andItemTypeDESC() { return $this->andDESC('item_type'); } public static function itemTypeASC() { return static::ASC('item_type'); } public static function itemTypeDESC() { return static::DESC('item_type'); } public function andItemASC() { return $this->andASC('item_id'); } public function andItemDESC() { return $this->andDESC('item_id'); } public static function itemASC() { return static::ASC('item_id'); } public static function itemDESC() { return static::DESC('item_id'); } public function andTitleASC() { return $this->andASC('title'); } public function andTitleDESC() { return $this->andDESC('title'); } public static function titleASC() { return static::ASC('title'); } public static function titleDESC() { return static::DESC('title'); } public function andDescriptionASC() { return $this->andASC('description'); } public function andDescriptionDESC() { return $this->andDESC('description'); } public static function descriptionASC() { return static::ASC('description'); } public static function descriptionDESC() { return static::DESC('description'); } public function andKeywordsASC() { return $this->andASC('keywords'); } public function andKeywordsDESC() { return $this->andDESC('keywords'); } public static function keywordsASC() { return static::ASC('keywords'); } public static function keywordsDESC() { return static::DESC('keywords'); } public function andUrlASC() { return $this->andASC('url'); } public function andUrlDESC() { return $this->andDESC('url'); } public static function urlASC() { return static::ASC('url'); } public static function urlDESC() { return static::DESC('url'); }}