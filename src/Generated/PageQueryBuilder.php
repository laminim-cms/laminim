<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\Query; use Lkt\QueryBuilding\DateIntervals\AbstractInterval; use Lkt\Factory\Instantiator\Instantiator; use Lkt\Factory\Schemas\Schema; class PageQueryBuilder extends Query { const COMPONENT = 'lmm-pages'; /** @return \LaminimCMS\Generated\PageQueryBuilder */ public static function getCaller() { $schema = Schema::get(static::COMPONENT); /** @var \LaminimCMS\Generated\PageQueryBuilder $r */ $r = static::table($schema->getTable()); Instantiator::prepareQueryCaller(static::COMPONENT, $r); return $r; } public function andIdEqual(int $value) { return $this->andIntegerEqual('id', $value); } public function andIdNot(int $value) { return $this->andIntegerNot('id', $value); } public function andIdGreaterThan(int $value) { return $this->andIntegerGreaterThan('id', $value); } public function andIdGreaterOrEqualThan(int $value) { return $this->andIntegerGreaterOrEqualThan('id', $value); } public function andIdLowerThan(int $value) { return $this->andIntegerLowerThan('id', $value); } public function andIdLowerOrEqualThan(int $value) { return $this->andIntegerLowerOrEqualThan('id', $value); } public function andIdBetween(int $from, int $to) { return $this->andIntegerBetween('id', $from, $to); } public function andIdIn(array $values) { return $this->andIntegerIn('id', $values); } public function andIdNotIn(array $values) { return $this->andIntegerNotIn('id', $values); } public function andIdEqualToField(string $component, string $field ) { return $this->andFieldEqualToField('id', $component, $field); } public function orIdEqual(int $value) { return $this->orIntegerEqual('id', $value); } public function orIdNot(int $value) { return $this->orIntegerNot('id', $value); } public function orIdGreaterThan(int $value) { return $this->orIntegerGreaterThan('id', $value); } public function orIdGreaterOrEqualThan(int $value) { return $this->orIntegerGreaterOrEqualThan('id', $value); } public function orIdLowerThan(int $value) { return $this->orIntegerLowerThan('id', $value); } public function orIdLowerOrEqualThan(int $value) { return $this->orIntegerLowerOrEqualThan('id', $value); } public function orIdBetween(int $from, int $to) { return $this->orIntegerBetween('id', $from, $to); } public function orIdIn(array $values) { return $this->orIntegerIn('id', $values); } public function orIdNotIn(array $values) { return $this->orIntegerNotIn('id', $values); } public function orIdEqualToField(string $component, string $field ) { return $this->orFieldEqualToField('id', $component, $field); } public function andNameEqual(string $value) { return $this->andi18nStringEqual('name', $value); } public function andNameNot(string $value) { return $this->andi18nStringNot('name', $value); } public function andNameLike(string $value) { return $this->andi18nStringLike('name', $value); } public function andNameNotLike(string $value) { return $this->andi18nStringNotLike('name', $value); } public function andNameBeginsLike(string $value) { return $this->andi18nStringBeginsLike('name', $value); } public function andNameNotBeginsLike(string $value) { return $this->andi18nStringNotBeginsLike('name', $value); } public function andNameEndsLike(string $value) { return $this->andi18nStringEndsLike('name', $value); } public function andNameNotEndsLike(string $value) { return $this->andi18nStringNotEndsLike('name', $value); } public function andNameIn(array $values) { return $this->andi18nStringIn('name', $values); } public function andNameNotIn(array $values) { return $this->andi18nStringNotIn('name', $values); } public function orNameEqual(string $value) { return $this->ori18nStringEqual('name', $value); } public function orNameNot(string $value) { return $this->ori18nStringNot('name', $value); } public function orNameLike(string $value) { return $this->ori18nStringLike('name', $value); } public function orNameNotLike(string $value) { return $this->ori18nStringNotLike('name', $value); } public function orNameBeginsLike(string $value) { return $this->ori18nStringBeginsLike('name', $value); } public function orNameNotBeginsLike(string $value) { return $this->ori18nStringNotBeginsLike('name', $value); } public function orNameEndsLike(string $value) { return $this->ori18nStringEndsLike('name', $value); } public function orNameNotEndsLike(string $value) { return $this->ori18nStringNotEndsLike('name', $value); } public function orNameIn(array $values) { return $this->ori18nStringIn('name', $values); } public function orNameNotIn(array $values) { return $this->ori18nStringNotIn('name', $values); } public function andCreatedAtBetween(string $from, string $to) { return $this->andDatetimeBetween('created_at', $from, $to); } public function andCreatedAtEqual(string $value) { return $this->andDatetimeEqual('created_at', $value); } public function andCreatedAtNot(string $value) { return $this->andDatetimeNot('created_at', $value); } public function andCreatedAtGreaterOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeGreaterOrEqualThan('created_at', $value, $interval); } public function andCreatedAtGreaterOrEqualThanNow(AbstractInterval $interval = null) { return $this->andDatetimeGreaterOrEqualThanNow('created_at', $interval); } public function andCreatedAtGreaterThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeGreaterThan('created_at', $value, $interval); } public function andCreatedAtGreaterThanNow(AbstractInterval $interval = null) { return $this->andDatetimeGreaterThanNow('created_at', $interval); } public function andCreatedAtLowerOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeLowerOrEqualThan('created_at', $value, $interval); } public function andCreatedAtLowerOrEqualThanNow(AbstractInterval $interval = null) { return $this->andDatetimeLowerOrEqualThanNow('created_at', $interval); } public function andCreatedAtLowerThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeLowerThan('created_at', $value, $interval); } public function andCreatedAtLowerThanNow(AbstractInterval $interval = null) { return $this->andDatetimeLowerThanNow('created_at', $interval); } public function andCreatedAtLike(string $value) { return $this->andDatetimeLike('created_at', $value); } public function andCreatedAtNotLike(string $value) { return $this->andDatetimeNotLike('created_at', $value); } public function andCreatedAtBeginsLike(string $value) { return $this->andDatetimeBeginsLike('created_at', $value); } public function andCreatedAtNotBeginsLike(string $value) { return $this->andDatetimeNotBeginsLike('created_at', $value); } public function andCreatedAtEndsLike(string $value) { return $this->andDatetimeEndsLike('created_at', $value); } public function andCreatedAtNotEndsLike(string $value) { return $this->andDatetimeNotEndsLike('created_at', $value); } public function orCreatedAtBetween(string $from, string $to) { return $this->orDatetimeBetween('created_at', $from, $to); } public function orCreatedAtEqual(string $value) { return $this->orDatetimeEqual('created_at', $value); } public function orCreatedAtNot(string $value) { return $this->orDatetimeNot('created_at', $value); } public function orCreatedAtGreaterOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeGreaterOrEqualThan('created_at', $value, $interval); } public function orCreatedAtGreaterOrEqualThanNow(AbstractInterval $interval = null) { return $this->orDatetimeGreaterOrEqualThanNow('created_at', $interval); } public function orCreatedAtGreaterThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeGreaterThan('created_at', $value, $interval); } public function orCreatedAtGreaterThanNow(AbstractInterval $interval = null) { return $this->orDatetimeGreaterThanNow('created_at', $interval); } public function orCreatedAtLowerOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeLowerOrEqualThan('created_at', $value, $interval); } public function orCreatedAtLowerOrEqualThanNow(AbstractInterval $interval = null) { return $this->orDatetimeLowerOrEqualThanNow('created_at', $interval); } public function orCreatedAtLowerThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeLowerThan('created_at', $value, $interval); } public function orCreatedAtLowerThanNow(AbstractInterval $interval = null) { return $this->orDatetimeLowerThanNow('created_at', $interval); } public function orCreatedAtLike(string $value) { return $this->orDatetimeLike('created_at', $value); } public function orCreatedAtNotLike(string $value) { return $this->orDatetimeNotLike('created_at', $value); } public function orCreatedAtBeginsLike(string $value) { return $this->orDatetimeBeginsLike('created_at', $value); } public function orCreatedAtNotBeginsLike(string $value) { return $this->orDatetimeNotBeginsLike('created_at', $value); } public function orCreatedAtEndsLike(string $value) { return $this->orDatetimeEndsLike('created_at', $value); } public function orCreatedAtNotEndsLike(string $value) { return $this->orDatetimeNotEndsLike('created_at', $value); } public function andCreatedByEqual(int $value) { return $this->andIntegerEqual('created_by', $value); } public function andCreatedByNot(int $value) { return $this->andIntegerNot('created_by', $value); } public function andCreatedByGreaterThan(int $value) { return $this->andIntegerGreaterThan('created_by', $value); } public function andCreatedByGreaterOrEqualThan(int $value) { return $this->andIntegerGreaterOrEqualThan('created_by', $value); } public function andCreatedByLowerThan(int $value) { return $this->andIntegerLowerThan('created_by', $value); } public function andCreatedByLowerOrEqualThan(int $value) { return $this->andIntegerLowerOrEqualThan('created_by', $value); } public function andCreatedByBetween(int $from, int $to) { return $this->andIntegerBetween('created_by', $from, $to); } public function andCreatedByIn(array $values) { return $this->andIntegerIn('created_by', $values); } public function andCreatedByNotIn(array $values) { return $this->andIntegerNotIn('created_by', $values); } public function andCreatedByEqualToField(string $component, string $field ) { return $this->andFieldEqualToField('created_by', $component, $field); } public function orCreatedByEqual(int $value) { return $this->orIntegerEqual('created_by', $value); } public function orCreatedByNot(int $value) { return $this->orIntegerNot('created_by', $value); } public function orCreatedByGreaterThan(int $value) { return $this->orIntegerGreaterThan('created_by', $value); } public function orCreatedByGreaterOrEqualThan(int $value) { return $this->orIntegerGreaterOrEqualThan('created_by', $value); } public function orCreatedByLowerThan(int $value) { return $this->orIntegerLowerThan('created_by', $value); } public function orCreatedByLowerOrEqualThan(int $value) { return $this->orIntegerLowerOrEqualThan('created_by', $value); } public function orCreatedByBetween(int $from, int $to) { return $this->orIntegerBetween('created_by', $from, $to); } public function orCreatedByIn(array $values) { return $this->orIntegerIn('created_by', $values); } public function orCreatedByNotIn(array $values) { return $this->orIntegerNotIn('created_by', $values); } public function orCreatedByEqualToField(string $component, string $field ) { return $this->orFieldEqualToField('created_by', $component, $field); } public function andModularBlocksContains($value) { return $this->andForeignKeysContains('blocks', $value); } public function orModularBlocksContains($value) { return $this->orForeignKeysContains('blocks', $value); } }