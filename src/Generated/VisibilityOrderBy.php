<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\OrderBy; class VisibilityOrderBy extends OrderBy { const COMPONENT = 'lmm-visibility'; /** @return \LaminimCMS\Generated\VisibilityOrderBy */ public static function ASC(string $field): static { /** @var \LaminimCMS\Generated\VisibilityOrderBy $r */ $r = parent::ASC($field); return $r; } /** @return \LaminimCMS\Generated\VisibilityOrderBy */ public static function DESC(string $field): static { /** @var \LaminimCMS\Generated\VisibilityOrderBy $r */ $r = parent::DESC($field); return $r; } public function andIdASC() { return $this->andASC('id'); } public function andIdDESC() { return $this->andDESC('id'); } public static function idASC() { return static::ASC('id'); } public static function idDESC() { return static::DESC('id'); } public function andCreatedAtASC() { return $this->andASC('created_at'); } public function andCreatedAtDESC() { return $this->andDESC('created_at'); } public static function createdAtASC() { return static::ASC('created_at'); } public static function createdAtDESC() { return static::DESC('created_at'); } public function andAutoPublishAtASC() { return $this->andASC('auto_publish_at'); } public function andAutoPublishAtDESC() { return $this->andDESC('auto_publish_at'); } public static function autoPublishAtASC() { return static::ASC('auto_publish_at'); } public static function autoPublishAtDESC() { return static::DESC('auto_publish_at'); } public function andItemTypeASC() { return $this->andASC('item_type'); } public function andItemTypeDESC() { return $this->andDESC('item_type'); } public static function itemTypeASC() { return static::ASC('item_type'); } public static function itemTypeDESC() { return static::DESC('item_type'); } public function andItemASC() { return $this->andASC('item_id'); } public function andItemDESC() { return $this->andDESC('item_id'); } public static function itemASC() { return static::ASC('item_id'); } public static function itemDESC() { return static::DESC('item_id'); } public function andStatusASC() { return $this->andASC('status'); } public function andStatusDESC() { return $this->andDESC('status'); } public static function statusASC() { return static::ASC('status'); } public static function statusDESC() { return static::DESC('status'); }}