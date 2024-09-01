<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\SelectBuilder; class ModularOptionSelectBuilder extends SelectBuilder { const COMPONENT = 'lmm-modular-option'; const columnId = 'id'; public function andId(?string $as = null): static { return $this->andDatum('id', $as); } public static function id(?string $as = null): static { return static::datum('id', $as); } public function andCountId(?string $as = null): static { return $this->andCountDatum('id', $as); } public static function countId(?string $as = null): static { return static::countDatum('id', $as); } const columnName = 'name'; public function andName(?string $as = null): static { return $this->andDatum('name', $as); } public static function name(?string $as = null): static { return static::datum('name', $as); } public function andCountName(?string $as = null): static { return $this->andCountDatum('name', $as); } public static function countName(?string $as = null): static { return static::countDatum('name', $as); } const columnValue = 'value'; public function andValue(?string $as = null): static { return $this->andDatum('value', $as); } public static function value(?string $as = null): static { return static::datum('value', $as); } public function andCountValue(?string $as = null): static { return $this->andCountDatum('value', $as); } public static function countValue(?string $as = null): static { return static::countDatum('value', $as); } const columnValueEn = 'value'; public function andValueEn(?string $as = null): static { return $this->andDatum('value', $as); } public static function valueEn(?string $as = null): static { return static::datum('value', $as); } public function andCountValueEn(?string $as = null): static { return $this->andCountDatum('value', $as); } public static function countValueEn(?string $as = null): static { return static::countDatum('value', $as); } const columnValueEs = 'value'; public function andValueEs(?string $as = null): static { return $this->andDatum('value', $as); } public static function valueEs(?string $as = null): static { return static::datum('value', $as); } public function andCountValueEs(?string $as = null): static { return $this->andCountDatum('value', $as); } public static function countValueEs(?string $as = null): static { return static::countDatum('value', $as); } const columnType = 'type'; public function andType(?string $as = null): static { return $this->andDatum('type', $as); } public static function type(?string $as = null): static { return static::datum('type', $as); } public function andCountType(?string $as = null): static { return $this->andCountDatum('type', $as); } public static function countType(?string $as = null): static { return static::countDatum('type', $as); } const columnItemId = 'item_id'; public function andItemId(?string $as = null): static { return $this->andDatum('item_id', $as); } public static function itemId(?string $as = null): static { return static::datum('item_id', $as); } public function andCountItemId(?string $as = null): static { return $this->andCountDatum('item_id', $as); } public static function countItemId(?string $as = null): static { return static::countDatum('item_id', $as); } const columnCreatedAt = 'created_at'; public function andCreatedAt(?string $as = null): static { return $this->andDatum('created_at', $as); } public static function createdAt(?string $as = null): static { return static::datum('created_at', $as); } public function andCountCreatedAt(?string $as = null): static { return $this->andCountDatum('created_at', $as); } public static function countCreatedAt(?string $as = null): static { return static::countDatum('created_at', $as); } public function andYearCreatedAt(?string $as = null): static { return $this->andYearDatum('created_at', $as); } public static function yearCreatedAt(?string $as = null): static { return static::yearDatum('created_at', $as); } public function andMonthCreatedAt(?string $as = null): static { return $this->andMonthDatum('created_at', $as); } public static function monthCreatedAt(?string $as = null): static { return static::monthDatum('created_at', $as); } const columnCreatedBy = 'created_by'; public function andCreatedBy(?string $as = null): static { return $this->andDatum('created_by', $as); } public static function createdBy(?string $as = null): static { return static::datum('created_by', $as); } public function andCountCreatedBy(?string $as = null): static { return $this->andCountDatum('created_by', $as); } public static function countCreatedBy(?string $as = null): static { return static::countDatum('created_by', $as); } }