<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\Query; use Lkt\QueryBuilding\DateIntervals\AbstractInterval; use Lkt\Factory\Instantiator\Instantiator; use Lkt\Factory\Schemas\Schema; class TranslationQueryBuilder extends Query { const COMPONENT = 'lmm-i18n'; /** @return \LaminimCMS\Generated\TranslationQueryBuilder */ public static function getCaller() { $schema = Schema::get(static::COMPONENT); /** @var \LaminimCMS\Generated\TranslationQueryBuilder $r */ $r = static::table($schema->getTable()); Instantiator::prepareQueryCaller(static::COMPONENT, $r); return $r; } public function andIdEqual(int $value) { return $this->andIntegerEqual('id', $value); } public function andIdNot(int $value) { return $this->andIntegerNot('id', $value); } public function andIdGreaterThan(int $value) { return $this->andIntegerGreaterThan('id', $value); } public function andIdGreaterOrEqualThan(int $value) { return $this->andIntegerGreaterOrEqualThan('id', $value); } public function andIdLowerThan(int $value) { return $this->andIntegerLowerThan('id', $value); } public function andIdLowerOrEqualThan(int $value) { return $this->andIntegerLowerOrEqualThan('id', $value); } public function andIdBetween(int $from, int $to) { return $this->andIntegerBetween('id', $from, $to); } public function andIdIn(array $values) { return $this->andIntegerIn('id', $values); } public function andIdNotIn(array $values) { return $this->andIntegerNotIn('id', $values); } public function andIdEqualToField(string $component, string $field ) { return $this->andFieldEqualToField('id', $component, $field); } public function orIdEqual(int $value) { return $this->orIntegerEqual('id', $value); } public function orIdNot(int $value) { return $this->orIntegerNot('id', $value); } public function orIdGreaterThan(int $value) { return $this->orIntegerGreaterThan('id', $value); } public function orIdGreaterOrEqualThan(int $value) { return $this->orIntegerGreaterOrEqualThan('id', $value); } public function orIdLowerThan(int $value) { return $this->orIntegerLowerThan('id', $value); } public function orIdLowerOrEqualThan(int $value) { return $this->orIntegerLowerOrEqualThan('id', $value); } public function orIdBetween(int $from, int $to) { return $this->orIntegerBetween('id', $from, $to); } public function orIdIn(array $values) { return $this->orIntegerIn('id', $values); } public function orIdNotIn(array $values) { return $this->orIntegerNotIn('id', $values); } public function orIdEqualToField(string $component, string $field ) { return $this->orFieldEqualToField('id', $component, $field); } public function andStackEqual(int $value) { return $this->andIntegerEqual('lmm_stack_id', $value); } public function andStackNot(int $value) { return $this->andIntegerNot('lmm_stack_id', $value); } public function andStackGreaterThan(int $value) { return $this->andIntegerGreaterThan('lmm_stack_id', $value); } public function andStackGreaterOrEqualThan(int $value) { return $this->andIntegerGreaterOrEqualThan('lmm_stack_id', $value); } public function andStackLowerThan(int $value) { return $this->andIntegerLowerThan('lmm_stack_id', $value); } public function andStackLowerOrEqualThan(int $value) { return $this->andIntegerLowerOrEqualThan('lmm_stack_id', $value); } public function andStackBetween(int $from, int $to) { return $this->andIntegerBetween('lmm_stack_id', $from, $to); } public function andStackIn(array $values) { return $this->andIntegerIn('lmm_stack_id', $values); } public function andStackNotIn(array $values) { return $this->andIntegerNotIn('lmm_stack_id', $values); } public function andStackEqualToField(string $component, string $field ) { return $this->andFieldEqualToField('lmm_stack_id', $component, $field); } public function orStackEqual(int $value) { return $this->orIntegerEqual('lmm_stack_id', $value); } public function orStackNot(int $value) { return $this->orIntegerNot('lmm_stack_id', $value); } public function orStackGreaterThan(int $value) { return $this->orIntegerGreaterThan('lmm_stack_id', $value); } public function orStackGreaterOrEqualThan(int $value) { return $this->orIntegerGreaterOrEqualThan('lmm_stack_id', $value); } public function orStackLowerThan(int $value) { return $this->orIntegerLowerThan('lmm_stack_id', $value); } public function orStackLowerOrEqualThan(int $value) { return $this->orIntegerLowerOrEqualThan('lmm_stack_id', $value); } public function orStackBetween(int $from, int $to) { return $this->orIntegerBetween('lmm_stack_id', $from, $to); } public function orStackIn(array $values) { return $this->orIntegerIn('lmm_stack_id', $values); } public function orStackNotIn(array $values) { return $this->orIntegerNotIn('lmm_stack_id', $values); } public function orStackEqualToField(string $component, string $field ) { return $this->orFieldEqualToField('lmm_stack_id', $component, $field); } public function andTypeEqual(string $value) { return $this->andStringEqual('type', $value); } public function andTypeNot(string $value) { return $this->andStringNot('type', $value); } public function andTypeLike(string $value) { return $this->andStringLike('type', $value); } public function andTypeNotLike(string $value) { return $this->andStringNotLike('type', $value); } public function andTypeBeginsLike(string $value) { return $this->andStringBeginsLike('type', $value); } public function andTypeNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('type', $value); } public function andTypeEndsLike(string $value) { return $this->andStringEndsLike('type', $value); } public function andTypeNotEndsLike(string $value) { return $this->andStringNotEndsLike('type', $value); } public function andTypeIn(array $values) { return $this->andStringIn('type', $values); } public function andTypeNotIn(array $values) { return $this->andStringNotIn('type', $values); } public function andTypeIsText() { return $this->andStringEqual('type', 'text'); } public function andTypeIsNotText() { return $this->andStringNot('type', 'text'); } public function andTypeIsTextarea() { return $this->andStringEqual('type', 'textarea'); } public function andTypeIsNotTextarea() { return $this->andStringNot('type', 'textarea'); } public function andTypeIsEditor() { return $this->andStringEqual('type', 'editor'); } public function andTypeIsNotEditor() { return $this->andStringNot('type', 'editor'); } public function andTypeIsChoice() { return $this->andStringEqual('type', 'choice'); } public function andTypeIsNotChoice() { return $this->andStringNot('type', 'choice'); } public function orTypeEqual(string $value) { return $this->orStringEqual('type', $value); } public function orTypeNot(string $value) { return $this->orStringNot('type', $value); } public function orTypeLike(string $value) { return $this->orStringLike('type', $value); } public function orTypeNotLike(string $value) { return $this->orStringNotLike('type', $value); } public function orTypeBeginsLike(string $value) { return $this->orStringBeginsLike('type', $value); } public function orTypeNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('type', $value); } public function orTypeEndsLike(string $value) { return $this->orStringEndsLike('type', $value); } public function orTypeNotEndsLike(string $value) { return $this->orStringNotEndsLike('type', $value); } public function orTypeIn(array $values) { return $this->orStringIn('type', $values); } public function orTypeNotIn(array $values) { return $this->orStringNotIn('type', $values); } public function orTypeIsText() { return $this->orStringEqual('type', 'text'); } public function orTypeIsNotText() { return $this->orStringNot('type', 'text'); } public function orTypeIsTextarea() { return $this->orStringEqual('type', 'textarea'); } public function orTypeIsNotTextarea() { return $this->orStringNot('type', 'textarea'); } public function orTypeIsEditor() { return $this->orStringEqual('type', 'editor'); } public function orTypeIsNotEditor() { return $this->orStringNot('type', 'editor'); } public function orTypeIsChoice() { return $this->orStringEqual('type', 'choice'); } public function orTypeIsNotChoice() { return $this->orStringNot('type', 'choice'); } public function andPropertyEqual(string $value) { return $this->andStringEqual('property', $value); } public function andPropertyNot(string $value) { return $this->andStringNot('property', $value); } public function andPropertyLike(string $value) { return $this->andStringLike('property', $value); } public function andPropertyNotLike(string $value) { return $this->andStringNotLike('property', $value); } public function andPropertyBeginsLike(string $value) { return $this->andStringBeginsLike('property', $value); } public function andPropertyNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('property', $value); } public function andPropertyEndsLike(string $value) { return $this->andStringEndsLike('property', $value); } public function andPropertyNotEndsLike(string $value) { return $this->andStringNotEndsLike('property', $value); } public function andPropertyIn(array $values) { return $this->andStringIn('property', $values); } public function andPropertyNotIn(array $values) { return $this->andStringNotIn('property', $values); } public function orPropertyEqual(string $value) { return $this->orStringEqual('property', $value); } public function orPropertyNot(string $value) { return $this->orStringNot('property', $value); } public function orPropertyLike(string $value) { return $this->orStringLike('property', $value); } public function orPropertyNotLike(string $value) { return $this->orStringNotLike('property', $value); } public function orPropertyBeginsLike(string $value) { return $this->orStringBeginsLike('property', $value); } public function orPropertyNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('property', $value); } public function orPropertyEndsLike(string $value) { return $this->orStringEndsLike('property', $value); } public function orPropertyNotEndsLike(string $value) { return $this->orStringNotEndsLike('property', $value); } public function orPropertyIn(array $values) { return $this->orStringIn('property', $values); } public function orPropertyNotIn(array $values) { return $this->orStringNotIn('property', $values); } public function andValueEqual(string $value) { return $this->andStringEqual('value', $value); } public function andValueNot(string $value) { return $this->andStringNot('value', $value); } public function andValueLike(string $value) { return $this->andStringLike('value', $value); } public function andValueNotLike(string $value) { return $this->andStringNotLike('value', $value); } public function andValueBeginsLike(string $value) { return $this->andStringBeginsLike('value', $value); } public function andValueNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('value', $value); } public function andValueEndsLike(string $value) { return $this->andStringEndsLike('value', $value); } public function andValueNotEndsLike(string $value) { return $this->andStringNotEndsLike('value', $value); } public function andValueIn(array $values) { return $this->andStringIn('value', $values); } public function andValueNotIn(array $values) { return $this->andStringNotIn('value', $values); } public function orValueEqual(string $value) { return $this->orStringEqual('value', $value); } public function orValueNot(string $value) { return $this->orStringNot('value', $value); } public function orValueLike(string $value) { return $this->orStringLike('value', $value); } public function orValueNotLike(string $value) { return $this->orStringNotLike('value', $value); } public function orValueBeginsLike(string $value) { return $this->orStringBeginsLike('value', $value); } public function orValueNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('value', $value); } public function orValueEndsLike(string $value) { return $this->orStringEndsLike('value', $value); } public function orValueNotEndsLike(string $value) { return $this->orStringNotEndsLike('value', $value); } public function orValueIn(array $values) { return $this->orStringIn('value', $values); } public function orValueNotIn(array $values) { return $this->orStringNotIn('value', $values); } public function andValueEnEqual(string $value) { return $this->andStringEqual('value', $value); } public function andValueEnNot(string $value) { return $this->andStringNot('value', $value); } public function andValueEnLike(string $value) { return $this->andStringLike('value', $value); } public function andValueEnNotLike(string $value) { return $this->andStringNotLike('value', $value); } public function andValueEnBeginsLike(string $value) { return $this->andStringBeginsLike('value', $value); } public function andValueEnNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('value', $value); } public function andValueEnEndsLike(string $value) { return $this->andStringEndsLike('value', $value); } public function andValueEnNotEndsLike(string $value) { return $this->andStringNotEndsLike('value', $value); } public function andValueEnIn(array $values) { return $this->andStringIn('value', $values); } public function andValueEnNotIn(array $values) { return $this->andStringNotIn('value', $values); } public function orValueEnEqual(string $value) { return $this->orStringEqual('value', $value); } public function orValueEnNot(string $value) { return $this->orStringNot('value', $value); } public function orValueEnLike(string $value) { return $this->orStringLike('value', $value); } public function orValueEnNotLike(string $value) { return $this->orStringNotLike('value', $value); } public function orValueEnBeginsLike(string $value) { return $this->orStringBeginsLike('value', $value); } public function orValueEnNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('value', $value); } public function orValueEnEndsLike(string $value) { return $this->orStringEndsLike('value', $value); } public function orValueEnNotEndsLike(string $value) { return $this->orStringNotEndsLike('value', $value); } public function orValueEnIn(array $values) { return $this->orStringIn('value', $values); } public function orValueEnNotIn(array $values) { return $this->orStringNotIn('value', $values); } public function andValueEsEqual(string $value) { return $this->andStringEqual('value', $value); } public function andValueEsNot(string $value) { return $this->andStringNot('value', $value); } public function andValueEsLike(string $value) { return $this->andStringLike('value', $value); } public function andValueEsNotLike(string $value) { return $this->andStringNotLike('value', $value); } public function andValueEsBeginsLike(string $value) { return $this->andStringBeginsLike('value', $value); } public function andValueEsNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('value', $value); } public function andValueEsEndsLike(string $value) { return $this->andStringEndsLike('value', $value); } public function andValueEsNotEndsLike(string $value) { return $this->andStringNotEndsLike('value', $value); } public function andValueEsIn(array $values) { return $this->andStringIn('value', $values); } public function andValueEsNotIn(array $values) { return $this->andStringNotIn('value', $values); } public function orValueEsEqual(string $value) { return $this->orStringEqual('value', $value); } public function orValueEsNot(string $value) { return $this->orStringNot('value', $value); } public function orValueEsLike(string $value) { return $this->orStringLike('value', $value); } public function orValueEsNotLike(string $value) { return $this->orStringNotLike('value', $value); } public function orValueEsBeginsLike(string $value) { return $this->orStringBeginsLike('value', $value); } public function orValueEsNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('value', $value); } public function orValueEsEndsLike(string $value) { return $this->orStringEndsLike('value', $value); } public function orValueEsNotEndsLike(string $value) { return $this->orStringNotEndsLike('value', $value); } public function orValueEsIn(array $values) { return $this->orStringIn('value', $values); } public function orValueEsNotIn(array $values) { return $this->orStringNotIn('value', $values); } public function andCreatedAtBetween(string $from, string $to) { return $this->andDatetimeBetween('created_at', $from, $to); } public function andCreatedAtEqual(string $value) { return $this->andDatetimeEqual('created_at', $value); } public function andCreatedAtNot(string $value) { return $this->andDatetimeNot('created_at', $value); } public function andCreatedAtGreaterOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeGreaterOrEqualThan('created_at', $value, $interval); } public function andCreatedAtGreaterOrEqualThanNow(AbstractInterval $interval = null) { return $this->andDatetimeGreaterOrEqualThanNow('created_at', $interval); } public function andCreatedAtGreaterThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeGreaterThan('created_at', $value, $interval); } public function andCreatedAtGreaterThanNow(AbstractInterval $interval = null) { return $this->andDatetimeGreaterThanNow('created_at', $interval); } public function andCreatedAtLowerOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeLowerOrEqualThan('created_at', $value, $interval); } public function andCreatedAtLowerOrEqualThanNow(AbstractInterval $interval = null) { return $this->andDatetimeLowerOrEqualThanNow('created_at', $interval); } public function andCreatedAtLowerThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeLowerThan('created_at', $value, $interval); } public function andCreatedAtLowerThanNow(AbstractInterval $interval = null) { return $this->andDatetimeLowerThanNow('created_at', $interval); } public function andCreatedAtLike(string $value) { return $this->andDatetimeLike('created_at', $value); } public function andCreatedAtNotLike(string $value) { return $this->andDatetimeNotLike('created_at', $value); } public function andCreatedAtBeginsLike(string $value) { return $this->andDatetimeBeginsLike('created_at', $value); } public function andCreatedAtNotBeginsLike(string $value) { return $this->andDatetimeNotBeginsLike('created_at', $value); } public function andCreatedAtEndsLike(string $value) { return $this->andDatetimeEndsLike('created_at', $value); } public function andCreatedAtNotEndsLike(string $value) { return $this->andDatetimeNotEndsLike('created_at', $value); } public function orCreatedAtBetween(string $from, string $to) { return $this->orDatetimeBetween('created_at', $from, $to); } public function orCreatedAtEqual(string $value) { return $this->orDatetimeEqual('created_at', $value); } public function orCreatedAtNot(string $value) { return $this->orDatetimeNot('created_at', $value); } public function orCreatedAtGreaterOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeGreaterOrEqualThan('created_at', $value, $interval); } public function orCreatedAtGreaterOrEqualThanNow(AbstractInterval $interval = null) { return $this->orDatetimeGreaterOrEqualThanNow('created_at', $interval); } public function orCreatedAtGreaterThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeGreaterThan('created_at', $value, $interval); } public function orCreatedAtGreaterThanNow(AbstractInterval $interval = null) { return $this->orDatetimeGreaterThanNow('created_at', $interval); } public function orCreatedAtLowerOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeLowerOrEqualThan('created_at', $value, $interval); } public function orCreatedAtLowerOrEqualThanNow(AbstractInterval $interval = null) { return $this->orDatetimeLowerOrEqualThanNow('created_at', $interval); } public function orCreatedAtLowerThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeLowerThan('created_at', $value, $interval); } public function orCreatedAtLowerThanNow(AbstractInterval $interval = null) { return $this->orDatetimeLowerThanNow('created_at', $interval); } public function orCreatedAtLike(string $value) { return $this->orDatetimeLike('created_at', $value); } public function orCreatedAtNotLike(string $value) { return $this->orDatetimeNotLike('created_at', $value); } public function orCreatedAtBeginsLike(string $value) { return $this->orDatetimeBeginsLike('created_at', $value); } public function orCreatedAtNotBeginsLike(string $value) { return $this->orDatetimeNotBeginsLike('created_at', $value); } public function orCreatedAtEndsLike(string $value) { return $this->orDatetimeEndsLike('created_at', $value); } public function orCreatedAtNotEndsLike(string $value) { return $this->orDatetimeNotEndsLike('created_at', $value); } }