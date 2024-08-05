<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\Where; use Lkt\QueryBuilding\DateIntervals\AbstractInterval; class MetadataWhere extends Where { const COMPONENT = 'lmm-metadata'; /** @return \LaminimCMS\Generated\MetadataWhere */ public static function getEmpty() { /** @var \LaminimCMS\Generated\MetadataWhere $r */ $r = parent::getEmpty(); return $r; } public function andIdEqual(int $value) { return $this->andIntegerEqual('id', $value); } public function andIdNot(int $value) { return $this->andIntegerNot('id', $value); } public function andIdGreaterThan(int $value) { return $this->andIntegerGreaterThan('id', $value); } public function andIdGreaterOrEqualThan(int $value) { return $this->andIntegerGreaterOrEqualThan('id', $value); } public function andIdLowerThan(int $value) { return $this->andIntegerLowerThan('id', $value); } public function andIdLowerOrEqualThan(int $value) { return $this->andIntegerLowerOrEqualThan('id', $value); } public function andIdBetween(int $from, int $to) { return $this->andIntegerBetween('id', $from, $to); } public function andIdIn(array $values) { return $this->andIntegerIn('id', $values); } public function andIdNotIn(array $values) { return $this->andIntegerNotIn('id', $values); } public function andIdEqualToField(string $component, string $field ) { return $this->andFieldEqualToField('id', $component, $field); } public function orIdEqual(int $value) { return $this->orIntegerEqual('id', $value); } public function orIdNot(int $value) { return $this->orIntegerNot('id', $value); } public function orIdGreaterThan(int $value) { return $this->orIntegerGreaterThan('id', $value); } public function orIdGreaterOrEqualThan(int $value) { return $this->orIntegerGreaterOrEqualThan('id', $value); } public function orIdLowerThan(int $value) { return $this->orIntegerLowerThan('id', $value); } public function orIdLowerOrEqualThan(int $value) { return $this->orIntegerLowerOrEqualThan('id', $value); } public function orIdBetween(int $from, int $to) { return $this->orIntegerBetween('id', $from, $to); } public function orIdIn(array $values) { return $this->orIntegerIn('id', $values); } public function orIdNotIn(array $values) { return $this->orIntegerNotIn('id', $values); } public function orIdEqualToField(string $component, string $field ) { return $this->orFieldEqualToField('id', $component, $field); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function idEqual(int $value) { return static::integerEqual('id', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function idNot(int $value) { return static::integerNot('id', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function idGreaterThan(int $value) { return static::integerGreaterThan('id', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function idGreaterOrEqualThan(int $value) { return static::integerGreaterOrEqualThan('id', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function idLowerThan(int $value) { return static::integerLowerThan('id', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function idLowerOrEqualThan(int $value) { return static::integerLowerOrEqualThan('id', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function idBetween(int $from, int $to) { return static::integerBetween('id', $from, $to); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function idIn(array $values) { return static::integerIn('id', $values); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function idNotIn(array $values) { return static::integerNotIn('id', $values); } public function andCreatedAtBetween(string $from, string $to) { return $this->andDatetimeBetween('created_at', $from, $to); } public function andCreatedAtEqual(string $value) { return $this->andDatetimeEqual('created_at', $value); } public function andCreatedAtNot(string $value) { return $this->andDatetimeNot('created_at', $value); } public function andCreatedAtGreaterOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeGreaterOrEqualThan('created_at', $value, $interval); } public function andCreatedAtGreaterOrEqualThanNow(AbstractInterval $interval = null) { return $this->andDatetimeGreaterOrEqualThanNow('created_at', $interval); } public function andCreatedAtGreaterThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeGreaterThan('created_at', $value, $interval); } public function andCreatedAtGreaterThanNow(AbstractInterval $interval = null) { return $this->andDatetimeGreaterThanNow('created_at', $interval); } public function andCreatedAtLowerOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeLowerOrEqualThan('created_at', $value, $interval); } public function andCreatedAtLowerOrEqualThanNow(AbstractInterval $interval = null) { return $this->andDatetimeLowerOrEqualThanNow('created_at', $interval); } public function andCreatedAtLowerThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeLowerThan('created_at', $value, $interval); } public function andCreatedAtLowerThanNow(AbstractInterval $interval = null) { return $this->andDatetimeLowerThanNow('created_at', $interval); } public function andCreatedAtLike(string $value) { return $this->andDatetimeLike('created_at', $value); } public function andCreatedAtNotLike(string $value) { return $this->andDatetimeNotLike('created_at', $value); } public function andCreatedAtBeginsLike(string $value) { return $this->andDatetimeBeginsLike('created_at', $value); } public function andCreatedAtNotBeginsLike(string $value) { return $this->andDatetimeNotBeginsLike('created_at', $value); } public function andCreatedAtEndsLike(string $value) { return $this->andDatetimeEndsLike('created_at', $value); } public function andCreatedAtNotEndsLike(string $value) { return $this->andDatetimeNotEndsLike('created_at', $value); } public function orCreatedAtBetween(string $from, string $to) { return $this->orDatetimeBetween('created_at', $from, $to); } public function orCreatedAtEqual(string $value) { return $this->orDatetimeEqual('created_at', $value); } public function orCreatedAtNot(string $value) { return $this->orDatetimeNot('created_at', $value); } public function orCreatedAtGreaterOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeGreaterOrEqualThan('created_at', $value, $interval); } public function orCreatedAtGreaterOrEqualThanNow(AbstractInterval $interval = null) { return $this->orDatetimeGreaterOrEqualThanNow('created_at', $interval); } public function orCreatedAtGreaterThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeGreaterThan('created_at', $value, $interval); } public function orCreatedAtGreaterThanNow(AbstractInterval $interval = null) { return $this->orDatetimeGreaterThanNow('created_at', $interval); } public function orCreatedAtLowerOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeLowerOrEqualThan('created_at', $value, $interval); } public function orCreatedAtLowerOrEqualThanNow(AbstractInterval $interval = null) { return $this->orDatetimeLowerOrEqualThanNow('created_at', $interval); } public function orCreatedAtLowerThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeLowerThan('created_at', $value, $interval); } public function orCreatedAtLowerThanNow(AbstractInterval $interval = null) { return $this->orDatetimeLowerThanNow('created_at', $interval); } public function orCreatedAtLike(string $value) { return $this->orDatetimeLike('created_at', $value); } public function orCreatedAtNotLike(string $value) { return $this->orDatetimeNotLike('created_at', $value); } public function orCreatedAtBeginsLike(string $value) { return $this->orDatetimeBeginsLike('created_at', $value); } public function orCreatedAtNotBeginsLike(string $value) { return $this->orDatetimeNotBeginsLike('created_at', $value); } public function orCreatedAtEndsLike(string $value) { return $this->orDatetimeEndsLike('created_at', $value); } public function orCreatedAtNotEndsLike(string $value) { return $this->orDatetimeNotEndsLike('created_at', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function createdAtBetween(string $from, string $to) { return static::datetimeBetween('created_at', $from, $to); } public static function createdAtEqual(string $value) { return static::datetimeEqual('created_at', $value); } public static function createdAtNot(string $value) { return static::datetimeNot('created_at', $value); } public static function createdAtGreaterOrEqualThan(string $value, AbstractInterval $interval = null) { return static::datetimeGreaterOrEqualThan('created_at', $value, $interval); } public static function createdAtGreaterOrEqualThanNow(AbstractInterval $interval = null) { return static::datetimeGreaterOrEqualThanNow('created_at', $interval); } public static function createdAtGreaterThan(string $value, AbstractInterval $interval = null) { return static::datetimeGreaterThan('created_at', $value, $interval); } public static function createdAtGreaterThanNow(AbstractInterval $interval = null) { return static::datetimeGreaterThanNow('created_at', $interval); } public static function createdAtLowerOrEqualThan(string $value, AbstractInterval $interval = null) { return static::datetimeLowerOrEqualThan('created_at', $value, $interval); } public static function createdAtLowerOrEqualThanNow(AbstractInterval $interval = null) { return static::datetimeLowerOrEqualThanNow('created_at', $interval); } public static function createdAtLowerThan(string $value, AbstractInterval $interval = null) { return static::datetimeLowerThan('created_at', $value, $interval); } public static function createdAtLowerThanNow(AbstractInterval $interval = null) { return static::datetimeLowerThanNow('created_at', $interval); } public static function createdAtLike(string $value) { return static::datetimeLike('created_at', $value); } public static function createdAtNotLike(string $value) { return static::datetimeNotLike('created_at', $value); } public static function createdAtBeginsLike(string $value) { return static::datetimeBeginsLike('created_at', $value); } public static function createdAtNotBeginsLike(string $value) { return static::datetimeNotBeginsLike('created_at', $value); } public static function createdAtEndsLike(string $value) { return static::datetimeEndsLike('created_at', $value); } public static function createdAtNotEndsLike(string $value) { return static::datetimeNotEndsLike('created_at', $value); } public function andItemTypeEqual(string $value) { return $this->andStringEqual('item_type', $value); } public function andItemTypeNot(string $value) { return $this->andStringNot('item_type', $value); } public function andItemTypeLike(string $value) { return $this->andStringLike('item_type', $value); } public function andItemTypeNotLike(string $value) { return $this->andStringNotLike('item_type', $value); } public function andItemTypeBeginsLike(string $value) { return $this->andStringBeginsLike('item_type', $value); } public function andItemTypeNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('item_type', $value); } public function andItemTypeEndsLike(string $value) { return $this->andStringEndsLike('item_type', $value); } public function andItemTypeNotEndsLike(string $value) { return $this->andStringNotEndsLike('item_type', $value); } public function andItemTypeIn(array $values) { return $this->andStringIn('item_type', $values); } public function andItemTypeNotIn(array $values) { return $this->andStringNotIn('item_type', $values); } public function orItemTypeEqual(string $value) { return $this->orStringEqual('item_type', $value); } public function orItemTypeNot(string $value) { return $this->orStringNot('item_type', $value); } public function orItemTypeLike(string $value) { return $this->orStringLike('item_type', $value); } public function orItemTypeNotLike(string $value) { return $this->orStringNotLike('item_type', $value); } public function orItemTypeBeginsLike(string $value) { return $this->orStringBeginsLike('item_type', $value); } public function orItemTypeNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('item_type', $value); } public function orItemTypeEndsLike(string $value) { return $this->orStringEndsLike('item_type', $value); } public function orItemTypeNotEndsLike(string $value) { return $this->orStringNotEndsLike('item_type', $value); } public function orItemTypeIn(array $values) { return $this->orStringIn('item_type', $values); } public function orItemTypeNotIn(array $values) { return $this->orStringNotIn('item_type', $values); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function itemTypeEqual(string $value) { return static::stringEqual('item_type', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function itemTypeNot(string $value) { return static::stringNot('item_type', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function itemTypeLike(string $value) { return static::stringLike('item_type', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function itemTypeNotLike(string $value) { return static::stringNotLike('item_type', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function itemTypeBeginsLike(string $value) { return static::stringBeginsLike('item_type', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function itemTypeNotBeginsLike(string $value) { return static::stringNotBeginsLike('item_type', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function itemTypeEndsLike(string $value) { return static::stringEndsLike('item_type', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function itemTypeNotEndsLike(string $value) { return static::stringNotEndsLike('item_type', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function itemTypeIn(array $values) { return static::stringIn('item_type', $values); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function itemTypeNotIn(array $values) { return static::stringNotIn('item_type', $values); } public function andItemEqual(int $value) { return $this->andIntegerEqual('item_id', $value); } public function andItemNot(int $value) { return $this->andIntegerNot('item_id', $value); } public function andItemGreaterThan(int $value) { return $this->andIntegerGreaterThan('item_id', $value); } public function andItemGreaterOrEqualThan(int $value) { return $this->andIntegerGreaterOrEqualThan('item_id', $value); } public function andItemLowerThan(int $value) { return $this->andIntegerLowerThan('item_id', $value); } public function andItemLowerOrEqualThan(int $value) { return $this->andIntegerLowerOrEqualThan('item_id', $value); } public function andItemBetween(int $from, int $to) { return $this->andIntegerBetween('item_id', $from, $to); } public function andItemIn(array $values) { return $this->andIntegerIn('item_id', $values); } public function andItemNotIn(array $values) { return $this->andIntegerNotIn('item_id', $values); } public function andItemEqualToField(string $component, string $field ) { return $this->andFieldEqualToField('item_id', $component, $field); } public function orItemEqual(int $value) { return $this->orIntegerEqual('item_id', $value); } public function orItemNot(int $value) { return $this->orIntegerNot('item_id', $value); } public function orItemGreaterThan(int $value) { return $this->orIntegerGreaterThan('item_id', $value); } public function orItemGreaterOrEqualThan(int $value) { return $this->orIntegerGreaterOrEqualThan('item_id', $value); } public function orItemLowerThan(int $value) { return $this->orIntegerLowerThan('item_id', $value); } public function orItemLowerOrEqualThan(int $value) { return $this->orIntegerLowerOrEqualThan('item_id', $value); } public function orItemBetween(int $from, int $to) { return $this->orIntegerBetween('item_id', $from, $to); } public function orItemIn(array $values) { return $this->orIntegerIn('item_id', $values); } public function orItemNotIn(array $values) { return $this->orIntegerNotIn('item_id', $values); } public function orItemEqualToField(string $component, string $field ) { return $this->orFieldEqualToField('item_id', $component, $field); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function itemEqual(int $value) { return static::integerEqual('item_id', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function itemNot(int $value) { return static::integerNot('item_id', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function itemGreaterThan(int $value) { return static::integerGreaterThan('item_id', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function itemGreaterOrEqualThan(int $value) { return static::integerGreaterOrEqualThan('item_id', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function itemLowerThan(int $value) { return static::integerLowerThan('item_id', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function itemLowerOrEqualThan(int $value) { return static::integerLowerOrEqualThan('item_id', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function itemBetween(int $from, int $to) { return static::integerBetween('item_id', $from, $to); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function itemIn(array $values) { return static::integerIn('item_id', $values); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function itemNotIn(array $values) { return static::integerNotIn('item_id', $values); } public function andTitleEqual(string $value) { return $this->andStringEqual('title', $value); } public function andTitleNot(string $value) { return $this->andStringNot('title', $value); } public function andTitleLike(string $value) { return $this->andStringLike('title', $value); } public function andTitleNotLike(string $value) { return $this->andStringNotLike('title', $value); } public function andTitleBeginsLike(string $value) { return $this->andStringBeginsLike('title', $value); } public function andTitleNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('title', $value); } public function andTitleEndsLike(string $value) { return $this->andStringEndsLike('title', $value); } public function andTitleNotEndsLike(string $value) { return $this->andStringNotEndsLike('title', $value); } public function andTitleIn(array $values) { return $this->andStringIn('title', $values); } public function andTitleNotIn(array $values) { return $this->andStringNotIn('title', $values); } public function orTitleEqual(string $value) { return $this->orStringEqual('title', $value); } public function orTitleNot(string $value) { return $this->orStringNot('title', $value); } public function orTitleLike(string $value) { return $this->orStringLike('title', $value); } public function orTitleNotLike(string $value) { return $this->orStringNotLike('title', $value); } public function orTitleBeginsLike(string $value) { return $this->orStringBeginsLike('title', $value); } public function orTitleNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('title', $value); } public function orTitleEndsLike(string $value) { return $this->orStringEndsLike('title', $value); } public function orTitleNotEndsLike(string $value) { return $this->orStringNotEndsLike('title', $value); } public function orTitleIn(array $values) { return $this->orStringIn('title', $values); } public function orTitleNotIn(array $values) { return $this->orStringNotIn('title', $values); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function titleEqual(string $value) { return static::stringEqual('title', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function titleNot(string $value) { return static::stringNot('title', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function titleLike(string $value) { return static::stringLike('title', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function titleNotLike(string $value) { return static::stringNotLike('title', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function titleBeginsLike(string $value) { return static::stringBeginsLike('title', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function titleNotBeginsLike(string $value) { return static::stringNotBeginsLike('title', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function titleEndsLike(string $value) { return static::stringEndsLike('title', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function titleNotEndsLike(string $value) { return static::stringNotEndsLike('title', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function titleIn(array $values) { return static::stringIn('title', $values); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function titleNotIn(array $values) { return static::stringNotIn('title', $values); } public function andDescriptionEqual(string $value) { return $this->andStringEqual('description', $value); } public function andDescriptionNot(string $value) { return $this->andStringNot('description', $value); } public function andDescriptionLike(string $value) { return $this->andStringLike('description', $value); } public function andDescriptionNotLike(string $value) { return $this->andStringNotLike('description', $value); } public function andDescriptionBeginsLike(string $value) { return $this->andStringBeginsLike('description', $value); } public function andDescriptionNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('description', $value); } public function andDescriptionEndsLike(string $value) { return $this->andStringEndsLike('description', $value); } public function andDescriptionNotEndsLike(string $value) { return $this->andStringNotEndsLike('description', $value); } public function andDescriptionIn(array $values) { return $this->andStringIn('description', $values); } public function andDescriptionNotIn(array $values) { return $this->andStringNotIn('description', $values); } public function orDescriptionEqual(string $value) { return $this->orStringEqual('description', $value); } public function orDescriptionNot(string $value) { return $this->orStringNot('description', $value); } public function orDescriptionLike(string $value) { return $this->orStringLike('description', $value); } public function orDescriptionNotLike(string $value) { return $this->orStringNotLike('description', $value); } public function orDescriptionBeginsLike(string $value) { return $this->orStringBeginsLike('description', $value); } public function orDescriptionNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('description', $value); } public function orDescriptionEndsLike(string $value) { return $this->orStringEndsLike('description', $value); } public function orDescriptionNotEndsLike(string $value) { return $this->orStringNotEndsLike('description', $value); } public function orDescriptionIn(array $values) { return $this->orStringIn('description', $values); } public function orDescriptionNotIn(array $values) { return $this->orStringNotIn('description', $values); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function descriptionEqual(string $value) { return static::stringEqual('description', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function descriptionNot(string $value) { return static::stringNot('description', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function descriptionLike(string $value) { return static::stringLike('description', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function descriptionNotLike(string $value) { return static::stringNotLike('description', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function descriptionBeginsLike(string $value) { return static::stringBeginsLike('description', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function descriptionNotBeginsLike(string $value) { return static::stringNotBeginsLike('description', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function descriptionEndsLike(string $value) { return static::stringEndsLike('description', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function descriptionNotEndsLike(string $value) { return static::stringNotEndsLike('description', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function descriptionIn(array $values) { return static::stringIn('description', $values); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function descriptionNotIn(array $values) { return static::stringNotIn('description', $values); } public function andKeywordsEqual(string $value) { return $this->andStringEqual('keywords', $value); } public function andKeywordsNot(string $value) { return $this->andStringNot('keywords', $value); } public function andKeywordsLike(string $value) { return $this->andStringLike('keywords', $value); } public function andKeywordsNotLike(string $value) { return $this->andStringNotLike('keywords', $value); } public function andKeywordsBeginsLike(string $value) { return $this->andStringBeginsLike('keywords', $value); } public function andKeywordsNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('keywords', $value); } public function andKeywordsEndsLike(string $value) { return $this->andStringEndsLike('keywords', $value); } public function andKeywordsNotEndsLike(string $value) { return $this->andStringNotEndsLike('keywords', $value); } public function andKeywordsIn(array $values) { return $this->andStringIn('keywords', $values); } public function andKeywordsNotIn(array $values) { return $this->andStringNotIn('keywords', $values); } public function orKeywordsEqual(string $value) { return $this->orStringEqual('keywords', $value); } public function orKeywordsNot(string $value) { return $this->orStringNot('keywords', $value); } public function orKeywordsLike(string $value) { return $this->orStringLike('keywords', $value); } public function orKeywordsNotLike(string $value) { return $this->orStringNotLike('keywords', $value); } public function orKeywordsBeginsLike(string $value) { return $this->orStringBeginsLike('keywords', $value); } public function orKeywordsNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('keywords', $value); } public function orKeywordsEndsLike(string $value) { return $this->orStringEndsLike('keywords', $value); } public function orKeywordsNotEndsLike(string $value) { return $this->orStringNotEndsLike('keywords', $value); } public function orKeywordsIn(array $values) { return $this->orStringIn('keywords', $values); } public function orKeywordsNotIn(array $values) { return $this->orStringNotIn('keywords', $values); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function keywordsEqual(string $value) { return static::stringEqual('keywords', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function keywordsNot(string $value) { return static::stringNot('keywords', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function keywordsLike(string $value) { return static::stringLike('keywords', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function keywordsNotLike(string $value) { return static::stringNotLike('keywords', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function keywordsBeginsLike(string $value) { return static::stringBeginsLike('keywords', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function keywordsNotBeginsLike(string $value) { return static::stringNotBeginsLike('keywords', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function keywordsEndsLike(string $value) { return static::stringEndsLike('keywords', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function keywordsNotEndsLike(string $value) { return static::stringNotEndsLike('keywords', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function keywordsIn(array $values) { return static::stringIn('keywords', $values); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function keywordsNotIn(array $values) { return static::stringNotIn('keywords', $values); } public function andUrlEqual(string $value) { return $this->andStringEqual('url', $value); } public function andUrlNot(string $value) { return $this->andStringNot('url', $value); } public function andUrlLike(string $value) { return $this->andStringLike('url', $value); } public function andUrlNotLike(string $value) { return $this->andStringNotLike('url', $value); } public function andUrlBeginsLike(string $value) { return $this->andStringBeginsLike('url', $value); } public function andUrlNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('url', $value); } public function andUrlEndsLike(string $value) { return $this->andStringEndsLike('url', $value); } public function andUrlNotEndsLike(string $value) { return $this->andStringNotEndsLike('url', $value); } public function andUrlIn(array $values) { return $this->andStringIn('url', $values); } public function andUrlNotIn(array $values) { return $this->andStringNotIn('url', $values); } public function orUrlEqual(string $value) { return $this->orStringEqual('url', $value); } public function orUrlNot(string $value) { return $this->orStringNot('url', $value); } public function orUrlLike(string $value) { return $this->orStringLike('url', $value); } public function orUrlNotLike(string $value) { return $this->orStringNotLike('url', $value); } public function orUrlBeginsLike(string $value) { return $this->orStringBeginsLike('url', $value); } public function orUrlNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('url', $value); } public function orUrlEndsLike(string $value) { return $this->orStringEndsLike('url', $value); } public function orUrlNotEndsLike(string $value) { return $this->orStringNotEndsLike('url', $value); } public function orUrlIn(array $values) { return $this->orStringIn('url', $values); } public function orUrlNotIn(array $values) { return $this->orStringNotIn('url', $values); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function urlEqual(string $value) { return static::stringEqual('url', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function urlNot(string $value) { return static::stringNot('url', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function urlLike(string $value) { return static::stringLike('url', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function urlNotLike(string $value) { return static::stringNotLike('url', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function urlBeginsLike(string $value) { return static::stringBeginsLike('url', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function urlNotBeginsLike(string $value) { return static::stringNotBeginsLike('url', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function urlEndsLike(string $value) { return static::stringEndsLike('url', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function urlNotEndsLike(string $value) { return static::stringNotEndsLike('url', $value); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function urlIn(array $values) { return static::stringIn('url', $values); } /** @return \LaminimCMS\Generated\MetadataWhere */ public static function urlNotIn(array $values) { return static::stringNotIn('url', $values); } }