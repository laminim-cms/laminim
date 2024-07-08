<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\Query; use Lkt\QueryBuilding\DateIntervals\AbstractInterval; use Lkt\Factory\Instantiator\Instantiator; use Lkt\Factory\Schemas\Schema; class ModularBlockQueryBuilder extends Query { const COMPONENT = 'lmm-modular-block'; /** @return \LaminimCMS\Generated\ModularBlockQueryBuilder */ public static function getCaller() { $schema = Schema::get(static::COMPONENT); /** @var \LaminimCMS\Generated\ModularBlockQueryBuilder $r */ $r = static::table($schema->getTable()); Instantiator::prepareQueryCaller(static::COMPONENT, $r); return $r; } public function andIdEqual(int $value) { return $this->andIntegerEqual('id', $value); } public function andIdNot(int $value) { return $this->andIntegerNot('id', $value); } public function andIdGreaterThan(int $value) { return $this->andIntegerGreaterThan('id', $value); } public function andIdGreaterOrEqualThan(int $value) { return $this->andIntegerGreaterOrEqualThan('id', $value); } public function andIdLowerThan(int $value) { return $this->andIntegerLowerThan('id', $value); } public function andIdLowerOrEqualThan(int $value) { return $this->andIntegerLowerOrEqualThan('id', $value); } public function andIdBetween(int $from, int $to) { return $this->andIntegerBetween('id', $from, $to); } public function andIdIn(array $values) { return $this->andIntegerIn('id', $values); } public function andIdNotIn(array $values) { return $this->andIntegerNotIn('id', $values); } public function andIdEqualToField(string $component, string $field ) { return $this->andFieldEqualToField('id', $component, $field); } public function orIdEqual(int $value) { return $this->orIntegerEqual('id', $value); } public function orIdNot(int $value) { return $this->orIntegerNot('id', $value); } public function orIdGreaterThan(int $value) { return $this->orIntegerGreaterThan('id', $value); } public function orIdGreaterOrEqualThan(int $value) { return $this->orIntegerGreaterOrEqualThan('id', $value); } public function orIdLowerThan(int $value) { return $this->orIntegerLowerThan('id', $value); } public function orIdLowerOrEqualThan(int $value) { return $this->orIntegerLowerOrEqualThan('id', $value); } public function orIdBetween(int $from, int $to) { return $this->orIntegerBetween('id', $from, $to); } public function orIdIn(array $values) { return $this->orIntegerIn('id', $values); } public function orIdNotIn(array $values) { return $this->orIntegerNotIn('id', $values); } public function orIdEqualToField(string $component, string $field ) { return $this->orFieldEqualToField('id', $component, $field); } public function andTypeEqual(string $value) { return $this->andStringEqual('type', $value); } public function andTypeNot(string $value) { return $this->andStringNot('type', $value); } public function andTypeLike(string $value) { return $this->andStringLike('type', $value); } public function andTypeNotLike(string $value) { return $this->andStringNotLike('type', $value); } public function andTypeBeginsLike(string $value) { return $this->andStringBeginsLike('type', $value); } public function andTypeNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('type', $value); } public function andTypeEndsLike(string $value) { return $this->andStringEndsLike('type', $value); } public function andTypeNotEndsLike(string $value) { return $this->andStringNotEndsLike('type', $value); } public function andTypeIn(array $values) { return $this->andStringIn('type', $values); } public function andTypeNotIn(array $values) { return $this->andStringNotIn('type', $values); } public function orTypeEqual(string $value) { return $this->orStringEqual('type', $value); } public function orTypeNot(string $value) { return $this->orStringNot('type', $value); } public function orTypeLike(string $value) { return $this->orStringLike('type', $value); } public function orTypeNotLike(string $value) { return $this->orStringNotLike('type', $value); } public function orTypeBeginsLike(string $value) { return $this->orStringBeginsLike('type', $value); } public function orTypeNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('type', $value); } public function orTypeEndsLike(string $value) { return $this->orStringEndsLike('type', $value); } public function orTypeNotEndsLike(string $value) { return $this->orStringNotEndsLike('type', $value); } public function orTypeIn(array $values) { return $this->orStringIn('type', $values); } public function orTypeNotIn(array $values) { return $this->orStringNotIn('type', $values); } public function andItemIdEqual(string $value) { return $this->andStringEqual('item_id', $value); } public function andItemIdNot(string $value) { return $this->andStringNot('item_id', $value); } public function andItemIdLike(string $value) { return $this->andStringLike('item_id', $value); } public function andItemIdNotLike(string $value) { return $this->andStringNotLike('item_id', $value); } public function andItemIdBeginsLike(string $value) { return $this->andStringBeginsLike('item_id', $value); } public function andItemIdNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('item_id', $value); } public function andItemIdEndsLike(string $value) { return $this->andStringEndsLike('item_id', $value); } public function andItemIdNotEndsLike(string $value) { return $this->andStringNotEndsLike('item_id', $value); } public function andItemIdIn(array $values) { return $this->andStringIn('item_id', $values); } public function andItemIdNotIn(array $values) { return $this->andStringNotIn('item_id', $values); } public function orItemIdEqual(string $value) { return $this->orStringEqual('item_id', $value); } public function orItemIdNot(string $value) { return $this->orStringNot('item_id', $value); } public function orItemIdLike(string $value) { return $this->orStringLike('item_id', $value); } public function orItemIdNotLike(string $value) { return $this->orStringNotLike('item_id', $value); } public function orItemIdBeginsLike(string $value) { return $this->orStringBeginsLike('item_id', $value); } public function orItemIdNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('item_id', $value); } public function orItemIdEndsLike(string $value) { return $this->orStringEndsLike('item_id', $value); } public function orItemIdNotEndsLike(string $value) { return $this->orStringNotEndsLike('item_id', $value); } public function orItemIdIn(array $values) { return $this->orStringIn('item_id', $values); } public function orItemIdNotIn(array $values) { return $this->orStringNotIn('item_id', $values); } public function andCreatedAtBetween(string $from, string $to) { return $this->andDatetimeBetween('created_at', $from, $to); } public function andCreatedAtEqual(string $value) { return $this->andDatetimeEqual('created_at', $value); } public function andCreatedAtNot(string $value) { return $this->andDatetimeNot('created_at', $value); } public function andCreatedAtGreaterOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeGreaterOrEqualThan('created_at', $value, $interval); } public function andCreatedAtGreaterOrEqualThanNow(AbstractInterval $interval = null) { return $this->andDatetimeGreaterOrEqualThanNow('created_at', $interval); } public function andCreatedAtGreaterThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeGreaterThan('created_at', $value, $interval); } public function andCreatedAtGreaterThanNow(AbstractInterval $interval = null) { return $this->andDatetimeGreaterThanNow('created_at', $interval); } public function andCreatedAtLowerOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeLowerOrEqualThan('created_at', $value, $interval); } public function andCreatedAtLowerOrEqualThanNow(AbstractInterval $interval = null) { return $this->andDatetimeLowerOrEqualThanNow('created_at', $interval); } public function andCreatedAtLowerThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeLowerThan('created_at', $value, $interval); } public function andCreatedAtLowerThanNow(AbstractInterval $interval = null) { return $this->andDatetimeLowerThanNow('created_at', $interval); } public function andCreatedAtLike(string $value) { return $this->andDatetimeLike('created_at', $value); } public function andCreatedAtNotLike(string $value) { return $this->andDatetimeNotLike('created_at', $value); } public function andCreatedAtBeginsLike(string $value) { return $this->andDatetimeBeginsLike('created_at', $value); } public function andCreatedAtNotBeginsLike(string $value) { return $this->andDatetimeNotBeginsLike('created_at', $value); } public function andCreatedAtEndsLike(string $value) { return $this->andDatetimeEndsLike('created_at', $value); } public function andCreatedAtNotEndsLike(string $value) { return $this->andDatetimeNotEndsLike('created_at', $value); } public function orCreatedAtBetween(string $from, string $to) { return $this->orDatetimeBetween('created_at', $from, $to); } public function orCreatedAtEqual(string $value) { return $this->orDatetimeEqual('created_at', $value); } public function orCreatedAtNot(string $value) { return $this->orDatetimeNot('created_at', $value); } public function orCreatedAtGreaterOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeGreaterOrEqualThan('created_at', $value, $interval); } public function orCreatedAtGreaterOrEqualThanNow(AbstractInterval $interval = null) { return $this->orDatetimeGreaterOrEqualThanNow('created_at', $interval); } public function orCreatedAtGreaterThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeGreaterThan('created_at', $value, $interval); } public function orCreatedAtGreaterThanNow(AbstractInterval $interval = null) { return $this->orDatetimeGreaterThanNow('created_at', $interval); } public function orCreatedAtLowerOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeLowerOrEqualThan('created_at', $value, $interval); } public function orCreatedAtLowerOrEqualThanNow(AbstractInterval $interval = null) { return $this->orDatetimeLowerOrEqualThanNow('created_at', $interval); } public function orCreatedAtLowerThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeLowerThan('created_at', $value, $interval); } public function orCreatedAtLowerThanNow(AbstractInterval $interval = null) { return $this->orDatetimeLowerThanNow('created_at', $interval); } public function orCreatedAtLike(string $value) { return $this->orDatetimeLike('created_at', $value); } public function orCreatedAtNotLike(string $value) { return $this->orDatetimeNotLike('created_at', $value); } public function orCreatedAtBeginsLike(string $value) { return $this->orDatetimeBeginsLike('created_at', $value); } public function orCreatedAtNotBeginsLike(string $value) { return $this->orDatetimeNotBeginsLike('created_at', $value); } public function orCreatedAtEndsLike(string $value) { return $this->orDatetimeEndsLike('created_at', $value); } public function orCreatedAtNotEndsLike(string $value) { return $this->orDatetimeNotEndsLike('created_at', $value); } public function andModularContentContains($value) { return $this->andForeignKeysContains('modular_content', $value); } public function orModularContentContains($value) { return $this->orForeignKeysContains('modular_content', $value); } }