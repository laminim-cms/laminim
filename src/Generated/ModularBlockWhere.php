<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\Where; use Lkt\QueryBuilding\DateIntervals\AbstractInterval; class ModularBlockWhere extends Where { const COMPONENT = 'lmm-modular-block'; /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function getEmpty() { /** @var \LaminimCMS\Generated\ModularBlockWhere $r */ $r = parent::getEmpty(); return $r; } public function andIdEqual(int $value) { return $this->andIntegerEqual('id', $value); } public function andIdNot(int $value) { return $this->andIntegerNot('id', $value); } public function andIdGreaterThan(int $value) { return $this->andIntegerGreaterThan('id', $value); } public function andIdGreaterOrEqualThan(int $value) { return $this->andIntegerGreaterOrEqualThan('id', $value); } public function andIdLowerThan(int $value) { return $this->andIntegerLowerThan('id', $value); } public function andIdLowerOrEqualThan(int $value) { return $this->andIntegerLowerOrEqualThan('id', $value); } public function andIdBetween(int $from, int $to) { return $this->andIntegerBetween('id', $from, $to); } public function andIdIn(array $values) { return $this->andIntegerIn('id', $values); } public function andIdNotIn(array $values) { return $this->andIntegerNotIn('id', $values); } public function andIdEqualToField(string $component, string $field ) { return $this->andFieldEqualToField('id', $component, $field); } public function orIdEqual(int $value) { return $this->orIntegerEqual('id', $value); } public function orIdNot(int $value) { return $this->orIntegerNot('id', $value); } public function orIdGreaterThan(int $value) { return $this->orIntegerGreaterThan('id', $value); } public function orIdGreaterOrEqualThan(int $value) { return $this->orIntegerGreaterOrEqualThan('id', $value); } public function orIdLowerThan(int $value) { return $this->orIntegerLowerThan('id', $value); } public function orIdLowerOrEqualThan(int $value) { return $this->orIntegerLowerOrEqualThan('id', $value); } public function orIdBetween(int $from, int $to) { return $this->orIntegerBetween('id', $from, $to); } public function orIdIn(array $values) { return $this->orIntegerIn('id', $values); } public function orIdNotIn(array $values) { return $this->orIntegerNotIn('id', $values); } public function orIdEqualToField(string $component, string $field ) { return $this->orFieldEqualToField('id', $component, $field); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function idEqual(int $value) { return static::integerEqual('id', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function idNot(int $value) { return static::integerNot('id', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function idGreaterThan(int $value) { return static::integerGreaterThan('id', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function idGreaterOrEqualThan(int $value) { return static::integerGreaterOrEqualThan('id', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function idLowerThan(int $value) { return static::integerLowerThan('id', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function idLowerOrEqualThan(int $value) { return static::integerLowerOrEqualThan('id', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function idBetween(int $from, int $to) { return static::integerBetween('id', $from, $to); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function idIn(array $values) { return static::integerIn('id', $values); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function idNotIn(array $values) { return static::integerNotIn('id', $values); } public function andNameEqual(string $value) { return $this->andStringEqual('name', $value); } public function andNameNot(string $value) { return $this->andStringNot('name', $value); } public function andNameLike(string $value) { return $this->andStringLike('name', $value); } public function andNameNotLike(string $value) { return $this->andStringNotLike('name', $value); } public function andNameBeginsLike(string $value) { return $this->andStringBeginsLike('name', $value); } public function andNameNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('name', $value); } public function andNameEndsLike(string $value) { return $this->andStringEndsLike('name', $value); } public function andNameNotEndsLike(string $value) { return $this->andStringNotEndsLike('name', $value); } public function andNameIn(array $values) { return $this->andStringIn('name', $values); } public function andNameNotIn(array $values) { return $this->andStringNotIn('name', $values); } public function orNameEqual(string $value) { return $this->orStringEqual('name', $value); } public function orNameNot(string $value) { return $this->orStringNot('name', $value); } public function orNameLike(string $value) { return $this->orStringLike('name', $value); } public function orNameNotLike(string $value) { return $this->orStringNotLike('name', $value); } public function orNameBeginsLike(string $value) { return $this->orStringBeginsLike('name', $value); } public function orNameNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('name', $value); } public function orNameEndsLike(string $value) { return $this->orStringEndsLike('name', $value); } public function orNameNotEndsLike(string $value) { return $this->orStringNotEndsLike('name', $value); } public function orNameIn(array $values) { return $this->orStringIn('name', $values); } public function orNameNotIn(array $values) { return $this->orStringNotIn('name', $values); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function nameEqual(string $value) { return static::stringEqual('name', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function nameNot(string $value) { return static::stringNot('name', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function nameLike(string $value) { return static::stringLike('name', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function nameNotLike(string $value) { return static::stringNotLike('name', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function nameBeginsLike(string $value) { return static::stringBeginsLike('name', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function nameNotBeginsLike(string $value) { return static::stringNotBeginsLike('name', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function nameEndsLike(string $value) { return static::stringEndsLike('name', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function nameNotEndsLike(string $value) { return static::stringNotEndsLike('name', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function nameIn(array $values) { return static::stringIn('name', $values); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function nameNotIn(array $values) { return static::stringNotIn('name', $values); } public function andTypeEqual(string $value) { return $this->andStringEqual('type', $value); } public function andTypeNot(string $value) { return $this->andStringNot('type', $value); } public function andTypeLike(string $value) { return $this->andStringLike('type', $value); } public function andTypeNotLike(string $value) { return $this->andStringNotLike('type', $value); } public function andTypeBeginsLike(string $value) { return $this->andStringBeginsLike('type', $value); } public function andTypeNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('type', $value); } public function andTypeEndsLike(string $value) { return $this->andStringEndsLike('type', $value); } public function andTypeNotEndsLike(string $value) { return $this->andStringNotEndsLike('type', $value); } public function andTypeIn(array $values) { return $this->andStringIn('type', $values); } public function andTypeNotIn(array $values) { return $this->andStringNotIn('type', $values); } public function orTypeEqual(string $value) { return $this->orStringEqual('type', $value); } public function orTypeNot(string $value) { return $this->orStringNot('type', $value); } public function orTypeLike(string $value) { return $this->orStringLike('type', $value); } public function orTypeNotLike(string $value) { return $this->orStringNotLike('type', $value); } public function orTypeBeginsLike(string $value) { return $this->orStringBeginsLike('type', $value); } public function orTypeNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('type', $value); } public function orTypeEndsLike(string $value) { return $this->orStringEndsLike('type', $value); } public function orTypeNotEndsLike(string $value) { return $this->orStringNotEndsLike('type', $value); } public function orTypeIn(array $values) { return $this->orStringIn('type', $values); } public function orTypeNotIn(array $values) { return $this->orStringNotIn('type', $values); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function typeEqual(string $value) { return static::stringEqual('type', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function typeNot(string $value) { return static::stringNot('type', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function typeLike(string $value) { return static::stringLike('type', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function typeNotLike(string $value) { return static::stringNotLike('type', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function typeBeginsLike(string $value) { return static::stringBeginsLike('type', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function typeNotBeginsLike(string $value) { return static::stringNotBeginsLike('type', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function typeEndsLike(string $value) { return static::stringEndsLike('type', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function typeNotEndsLike(string $value) { return static::stringNotEndsLike('type', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function typeIn(array $values) { return static::stringIn('type', $values); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function typeNotIn(array $values) { return static::stringNotIn('type', $values); } public function andItemIdEqual(string $value) { return $this->andStringEqual('item_id', $value); } public function andItemIdNot(string $value) { return $this->andStringNot('item_id', $value); } public function andItemIdLike(string $value) { return $this->andStringLike('item_id', $value); } public function andItemIdNotLike(string $value) { return $this->andStringNotLike('item_id', $value); } public function andItemIdBeginsLike(string $value) { return $this->andStringBeginsLike('item_id', $value); } public function andItemIdNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('item_id', $value); } public function andItemIdEndsLike(string $value) { return $this->andStringEndsLike('item_id', $value); } public function andItemIdNotEndsLike(string $value) { return $this->andStringNotEndsLike('item_id', $value); } public function andItemIdIn(array $values) { return $this->andStringIn('item_id', $values); } public function andItemIdNotIn(array $values) { return $this->andStringNotIn('item_id', $values); } public function orItemIdEqual(string $value) { return $this->orStringEqual('item_id', $value); } public function orItemIdNot(string $value) { return $this->orStringNot('item_id', $value); } public function orItemIdLike(string $value) { return $this->orStringLike('item_id', $value); } public function orItemIdNotLike(string $value) { return $this->orStringNotLike('item_id', $value); } public function orItemIdBeginsLike(string $value) { return $this->orStringBeginsLike('item_id', $value); } public function orItemIdNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('item_id', $value); } public function orItemIdEndsLike(string $value) { return $this->orStringEndsLike('item_id', $value); } public function orItemIdNotEndsLike(string $value) { return $this->orStringNotEndsLike('item_id', $value); } public function orItemIdIn(array $values) { return $this->orStringIn('item_id', $values); } public function orItemIdNotIn(array $values) { return $this->orStringNotIn('item_id', $values); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function itemIdEqual(string $value) { return static::stringEqual('item_id', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function itemIdNot(string $value) { return static::stringNot('item_id', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function itemIdLike(string $value) { return static::stringLike('item_id', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function itemIdNotLike(string $value) { return static::stringNotLike('item_id', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function itemIdBeginsLike(string $value) { return static::stringBeginsLike('item_id', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function itemIdNotBeginsLike(string $value) { return static::stringNotBeginsLike('item_id', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function itemIdEndsLike(string $value) { return static::stringEndsLike('item_id', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function itemIdNotEndsLike(string $value) { return static::stringNotEndsLike('item_id', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function itemIdIn(array $values) { return static::stringIn('item_id', $values); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function itemIdNotIn(array $values) { return static::stringNotIn('item_id', $values); } public function andCreatedAtBetween(string $from, string $to) { return $this->andDatetimeBetween('created_at', $from, $to); } public function andCreatedAtEqual(string $value) { return $this->andDatetimeEqual('created_at', $value); } public function andCreatedAtNot(string $value) { return $this->andDatetimeNot('created_at', $value); } public function andCreatedAtGreaterOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeGreaterOrEqualThan('created_at', $value, $interval); } public function andCreatedAtGreaterOrEqualThanNow(AbstractInterval $interval = null) { return $this->andDatetimeGreaterOrEqualThanNow('created_at', $interval); } public function andCreatedAtGreaterThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeGreaterThan('created_at', $value, $interval); } public function andCreatedAtGreaterThanNow(AbstractInterval $interval = null) { return $this->andDatetimeGreaterThanNow('created_at', $interval); } public function andCreatedAtLowerOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeLowerOrEqualThan('created_at', $value, $interval); } public function andCreatedAtLowerOrEqualThanNow(AbstractInterval $interval = null) { return $this->andDatetimeLowerOrEqualThanNow('created_at', $interval); } public function andCreatedAtLowerThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeLowerThan('created_at', $value, $interval); } public function andCreatedAtLowerThanNow(AbstractInterval $interval = null) { return $this->andDatetimeLowerThanNow('created_at', $interval); } public function andCreatedAtLike(string $value) { return $this->andDatetimeLike('created_at', $value); } public function andCreatedAtNotLike(string $value) { return $this->andDatetimeNotLike('created_at', $value); } public function andCreatedAtBeginsLike(string $value) { return $this->andDatetimeBeginsLike('created_at', $value); } public function andCreatedAtNotBeginsLike(string $value) { return $this->andDatetimeNotBeginsLike('created_at', $value); } public function andCreatedAtEndsLike(string $value) { return $this->andDatetimeEndsLike('created_at', $value); } public function andCreatedAtNotEndsLike(string $value) { return $this->andDatetimeNotEndsLike('created_at', $value); } public function orCreatedAtBetween(string $from, string $to) { return $this->orDatetimeBetween('created_at', $from, $to); } public function orCreatedAtEqual(string $value) { return $this->orDatetimeEqual('created_at', $value); } public function orCreatedAtNot(string $value) { return $this->orDatetimeNot('created_at', $value); } public function orCreatedAtGreaterOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeGreaterOrEqualThan('created_at', $value, $interval); } public function orCreatedAtGreaterOrEqualThanNow(AbstractInterval $interval = null) { return $this->orDatetimeGreaterOrEqualThanNow('created_at', $interval); } public function orCreatedAtGreaterThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeGreaterThan('created_at', $value, $interval); } public function orCreatedAtGreaterThanNow(AbstractInterval $interval = null) { return $this->orDatetimeGreaterThanNow('created_at', $interval); } public function orCreatedAtLowerOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeLowerOrEqualThan('created_at', $value, $interval); } public function orCreatedAtLowerOrEqualThanNow(AbstractInterval $interval = null) { return $this->orDatetimeLowerOrEqualThanNow('created_at', $interval); } public function orCreatedAtLowerThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeLowerThan('created_at', $value, $interval); } public function orCreatedAtLowerThanNow(AbstractInterval $interval = null) { return $this->orDatetimeLowerThanNow('created_at', $interval); } public function orCreatedAtLike(string $value) { return $this->orDatetimeLike('created_at', $value); } public function orCreatedAtNotLike(string $value) { return $this->orDatetimeNotLike('created_at', $value); } public function orCreatedAtBeginsLike(string $value) { return $this->orDatetimeBeginsLike('created_at', $value); } public function orCreatedAtNotBeginsLike(string $value) { return $this->orDatetimeNotBeginsLike('created_at', $value); } public function orCreatedAtEndsLike(string $value) { return $this->orDatetimeEndsLike('created_at', $value); } public function orCreatedAtNotEndsLike(string $value) { return $this->orDatetimeNotEndsLike('created_at', $value); } /** @return \LaminimCMS\Generated\ModularBlockWhere */ public static function createdAtBetween(string $from, string $to) { return static::datetimeBetween('created_at', $from, $to); } public static function createdAtEqual(string $value) { return static::datetimeEqual('created_at', $value); } public static function createdAtNot(string $value) { return static::datetimeNot('created_at', $value); } public static function createdAtGreaterOrEqualThan(string $value, AbstractInterval $interval = null) { return static::datetimeGreaterOrEqualThan('created_at', $value, $interval); } public static function createdAtGreaterOrEqualThanNow(AbstractInterval $interval = null) { return static::datetimeGreaterOrEqualThanNow('created_at', $interval); } public static function createdAtGreaterThan(string $value, AbstractInterval $interval = null) { return static::datetimeGreaterThan('created_at', $value, $interval); } public static function createdAtGreaterThanNow(AbstractInterval $interval = null) { return static::datetimeGreaterThanNow('created_at', $interval); } public static function createdAtLowerOrEqualThan(string $value, AbstractInterval $interval = null) { return static::datetimeLowerOrEqualThan('created_at', $value, $interval); } public static function createdAtLowerOrEqualThanNow(AbstractInterval $interval = null) { return static::datetimeLowerOrEqualThanNow('created_at', $interval); } public static function createdAtLowerThan(string $value, AbstractInterval $interval = null) { return static::datetimeLowerThan('created_at', $value, $interval); } public static function createdAtLowerThanNow(AbstractInterval $interval = null) { return static::datetimeLowerThanNow('created_at', $interval); } public static function createdAtLike(string $value) { return static::datetimeLike('created_at', $value); } public static function createdAtNotLike(string $value) { return static::datetimeNotLike('created_at', $value); } public static function createdAtBeginsLike(string $value) { return static::datetimeBeginsLike('created_at', $value); } public static function createdAtNotBeginsLike(string $value) { return static::datetimeNotBeginsLike('created_at', $value); } public static function createdAtEndsLike(string $value) { return static::datetimeEndsLike('created_at', $value); } public static function createdAtNotEndsLike(string $value) { return static::datetimeNotEndsLike('created_at', $value); } public function andModularContentContains($value) { return $this->andForeignKeysContains('modular_content', $value); } public function orModularContentContains($value) { return $this->orForeignKeysContains('modular_content', $value); } }