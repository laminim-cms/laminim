<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\SelectBuilder; class ModularBlockSelectBuilder extends SelectBuilder { const COMPONENT = 'lmm-modular-block'; const columnId = 'id'; public function andId(?string $as = null): static { return $this->andDatum('id', $as); } public static function id(?string $as = null): static { return static::datum('id', $as); } public function andCountId(?string $as = null): static { return $this->andCountDatum('id', $as); } public static function countId(?string $as = null): static { return static::countDatum('id', $as); } const columnType = 'type'; public function andType(?string $as = null): static { return $this->andDatum('type', $as); } public static function type(?string $as = null): static { return static::datum('type', $as); } public function andCountType(?string $as = null): static { return $this->andCountDatum('type', $as); } public static function countType(?string $as = null): static { return static::countDatum('type', $as); } const columnItemId = 'item_id'; public function andItemId(?string $as = null): static { return $this->andDatum('item_id', $as); } public static function itemId(?string $as = null): static { return static::datum('item_id', $as); } public function andCountItemId(?string $as = null): static { return $this->andCountDatum('item_id', $as); } public static function countItemId(?string $as = null): static { return static::countDatum('item_id', $as); } const columnCreatedAt = 'created_at'; public function andCreatedAt(?string $as = null): static { return $this->andDatum('created_at', $as); } public static function createdAt(?string $as = null): static { return static::datum('created_at', $as); } public function andCountCreatedAt(?string $as = null): static { return $this->andCountDatum('created_at', $as); } public static function countCreatedAt(?string $as = null): static { return static::countDatum('created_at', $as); } public function andYearCreatedAt(?string $as = null): static { return $this->andYearDatum('created_at', $as); } public static function yearCreatedAt(?string $as = null): static { return static::yearDatum('created_at', $as); } public function andMonthCreatedAt(?string $as = null): static { return $this->andMonthDatum('created_at', $as); } public static function monthCreatedAt(?string $as = null): static { return static::monthDatum('created_at', $as); } const columnModularContent = 'modular_content'; public function andModularContent(?string $as = null): static { return $this->andDatum('modular_content', $as); } public static function modularContent(?string $as = null): static { return static::datum('modular_content', $as); } public function andCountModularContent(?string $as = null): static { return $this->andCountDatum('modular_content', $as); } public static function countModularContent(?string $as = null): static { return static::countDatum('modular_content', $as); } }