<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\OrderBy; class TranslationOrderBy extends OrderBy { const COMPONENT = 'lmm-i18n'; /** @return \LaminimCMS\Generated\TranslationOrderBy */ public static function ASC(string $field): static { /** @var \LaminimCMS\Generated\TranslationOrderBy $r */ $r = parent::ASC($field); return $r; } /** @return \LaminimCMS\Generated\TranslationOrderBy */ public static function DESC(string $field): static { /** @var \LaminimCMS\Generated\TranslationOrderBy $r */ $r = parent::DESC($field); return $r; } public function andIdASC() { return $this->andASC('id'); } public function andIdDESC() { return $this->andDESC('id'); } public static function idASC() { return static::ASC('id'); } public static function idDESC() { return static::DESC('id'); } public function andStackASC() { return $this->andASC('stack'); } public function andStackDESC() { return $this->andDESC('stack'); } public static function stackASC() { return static::ASC('stack'); } public static function stackDESC() { return static::DESC('stack'); } public function andTypeASC() { return $this->andASC('type'); } public function andTypeDESC() { return $this->andDESC('type'); } public static function typeASC() { return static::ASC('type'); } public static function typeDESC() { return static::DESC('type'); } public function andValueASC() { return $this->andASC('value'); } public function andValueDESC() { return $this->andDESC('value'); } public static function valueASC() { return static::ASC('value'); } public static function valueDESC() { return static::DESC('value'); } public function andValueEnASC() { return $this->andASC('value'); } public function andValueEnDESC() { return $this->andDESC('value'); } public static function valueEnASC() { return static::ASC('value'); } public static function valueEnDESC() { return static::DESC('value'); } public function andValueEsASC() { return $this->andASC('value'); } public function andValueEsDESC() { return $this->andDESC('value'); } public static function valueEsASC() { return static::ASC('value'); } public static function valueEsDESC() { return static::DESC('value'); } public function andCreatedAtASC() { return $this->andASC('created_at'); } public function andCreatedAtDESC() { return $this->andDESC('created_at'); } public static function createdAtASC() { return static::ASC('created_at'); } public static function createdAtDESC() { return static::DESC('created_at'); }}