<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\SelectBuilder; class PageSelectBuilder extends SelectBuilder { const COMPONENT = 'lmm-pages'; const columnId = 'id'; public function andId(?string $as = null): static { return $this->andDatum('id', $as); } public static function id(?string $as = null): static { return static::datum('id', $as); } public function andCountId(?string $as = null): static { return $this->andCountDatum('id', $as); } public static function countId(?string $as = null): static { return static::countDatum('id', $as); } const columnName = 'name'; public function andName(?string $as = null): static { return $this->andDatum('name', $as); } public static function name(?string $as = null): static { return static::datum('name', $as); } public function andCountName(?string $as = null): static { return $this->andCountDatum('name', $as); } public static function countName(?string $as = null): static { return static::countDatum('name', $as); } const columnCreatedAt = 'created_at'; public function andCreatedAt(?string $as = null): static { return $this->andDatum('created_at', $as); } public static function createdAt(?string $as = null): static { return static::datum('created_at', $as); } public function andCountCreatedAt(?string $as = null): static { return $this->andCountDatum('created_at', $as); } public static function countCreatedAt(?string $as = null): static { return static::countDatum('created_at', $as); } public function andYearCreatedAt(?string $as = null): static { return $this->andYearDatum('created_at', $as); } public static function yearCreatedAt(?string $as = null): static { return static::yearDatum('created_at', $as); } public function andMonthCreatedAt(?string $as = null): static { return $this->andMonthDatum('created_at', $as); } public static function monthCreatedAt(?string $as = null): static { return static::monthDatum('created_at', $as); } }