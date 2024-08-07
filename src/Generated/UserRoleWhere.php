<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\Where; use Lkt\QueryBuilding\DateIntervals\AbstractInterval; class UserRoleWhere extends Where { const COMPONENT = 'lmm-user-role'; /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function getEmpty() { /** @var \LaminimCMS\Generated\UserRoleWhere $r */ $r = parent::getEmpty(); return $r; } public function andIdEqual(int $value) { return $this->andIntegerEqual('id', $value); } public function andIdNot(int $value) { return $this->andIntegerNot('id', $value); } public function andIdGreaterThan(int $value) { return $this->andIntegerGreaterThan('id', $value); } public function andIdGreaterOrEqualThan(int $value) { return $this->andIntegerGreaterOrEqualThan('id', $value); } public function andIdLowerThan(int $value) { return $this->andIntegerLowerThan('id', $value); } public function andIdLowerOrEqualThan(int $value) { return $this->andIntegerLowerOrEqualThan('id', $value); } public function andIdBetween(int $from, int $to) { return $this->andIntegerBetween('id', $from, $to); } public function andIdIn(array $values) { return $this->andIntegerIn('id', $values); } public function andIdNotIn(array $values) { return $this->andIntegerNotIn('id', $values); } public function andIdEqualToField(string $component, string $field ) { return $this->andFieldEqualToField('id', $component, $field); } public function orIdEqual(int $value) { return $this->orIntegerEqual('id', $value); } public function orIdNot(int $value) { return $this->orIntegerNot('id', $value); } public function orIdGreaterThan(int $value) { return $this->orIntegerGreaterThan('id', $value); } public function orIdGreaterOrEqualThan(int $value) { return $this->orIntegerGreaterOrEqualThan('id', $value); } public function orIdLowerThan(int $value) { return $this->orIntegerLowerThan('id', $value); } public function orIdLowerOrEqualThan(int $value) { return $this->orIntegerLowerOrEqualThan('id', $value); } public function orIdBetween(int $from, int $to) { return $this->orIntegerBetween('id', $from, $to); } public function orIdIn(array $values) { return $this->orIntegerIn('id', $values); } public function orIdNotIn(array $values) { return $this->orIntegerNotIn('id', $values); } public function orIdEqualToField(string $component, string $field ) { return $this->orFieldEqualToField('id', $component, $field); } /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function idEqual(int $value) { return static::integerEqual('id', $value); } /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function idNot(int $value) { return static::integerNot('id', $value); } /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function idGreaterThan(int $value) { return static::integerGreaterThan('id', $value); } /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function idGreaterOrEqualThan(int $value) { return static::integerGreaterOrEqualThan('id', $value); } /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function idLowerThan(int $value) { return static::integerLowerThan('id', $value); } /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function idLowerOrEqualThan(int $value) { return static::integerLowerOrEqualThan('id', $value); } /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function idBetween(int $from, int $to) { return static::integerBetween('id', $from, $to); } /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function idIn(array $values) { return static::integerIn('id', $values); } /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function idNotIn(array $values) { return static::integerNotIn('id', $values); } public function andCreatedAtBetween(string $from, string $to) { return $this->andDatetimeBetween('created_at', $from, $to); } public function andCreatedAtEqual(string $value) { return $this->andDatetimeEqual('created_at', $value); } public function andCreatedAtNot(string $value) { return $this->andDatetimeNot('created_at', $value); } public function andCreatedAtGreaterOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeGreaterOrEqualThan('created_at', $value, $interval); } public function andCreatedAtGreaterOrEqualThanNow(AbstractInterval $interval = null) { return $this->andDatetimeGreaterOrEqualThanNow('created_at', $interval); } public function andCreatedAtGreaterThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeGreaterThan('created_at', $value, $interval); } public function andCreatedAtGreaterThanNow(AbstractInterval $interval = null) { return $this->andDatetimeGreaterThanNow('created_at', $interval); } public function andCreatedAtLowerOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeLowerOrEqualThan('created_at', $value, $interval); } public function andCreatedAtLowerOrEqualThanNow(AbstractInterval $interval = null) { return $this->andDatetimeLowerOrEqualThanNow('created_at', $interval); } public function andCreatedAtLowerThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeLowerThan('created_at', $value, $interval); } public function andCreatedAtLowerThanNow(AbstractInterval $interval = null) { return $this->andDatetimeLowerThanNow('created_at', $interval); } public function andCreatedAtLike(string $value) { return $this->andDatetimeLike('created_at', $value); } public function andCreatedAtNotLike(string $value) { return $this->andDatetimeNotLike('created_at', $value); } public function andCreatedAtBeginsLike(string $value) { return $this->andDatetimeBeginsLike('created_at', $value); } public function andCreatedAtNotBeginsLike(string $value) { return $this->andDatetimeNotBeginsLike('created_at', $value); } public function andCreatedAtEndsLike(string $value) { return $this->andDatetimeEndsLike('created_at', $value); } public function andCreatedAtNotEndsLike(string $value) { return $this->andDatetimeNotEndsLike('created_at', $value); } public function orCreatedAtBetween(string $from, string $to) { return $this->orDatetimeBetween('created_at', $from, $to); } public function orCreatedAtEqual(string $value) { return $this->orDatetimeEqual('created_at', $value); } public function orCreatedAtNot(string $value) { return $this->orDatetimeNot('created_at', $value); } public function orCreatedAtGreaterOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeGreaterOrEqualThan('created_at', $value, $interval); } public function orCreatedAtGreaterOrEqualThanNow(AbstractInterval $interval = null) { return $this->orDatetimeGreaterOrEqualThanNow('created_at', $interval); } public function orCreatedAtGreaterThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeGreaterThan('created_at', $value, $interval); } public function orCreatedAtGreaterThanNow(AbstractInterval $interval = null) { return $this->orDatetimeGreaterThanNow('created_at', $interval); } public function orCreatedAtLowerOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeLowerOrEqualThan('created_at', $value, $interval); } public function orCreatedAtLowerOrEqualThanNow(AbstractInterval $interval = null) { return $this->orDatetimeLowerOrEqualThanNow('created_at', $interval); } public function orCreatedAtLowerThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeLowerThan('created_at', $value, $interval); } public function orCreatedAtLowerThanNow(AbstractInterval $interval = null) { return $this->orDatetimeLowerThanNow('created_at', $interval); } public function orCreatedAtLike(string $value) { return $this->orDatetimeLike('created_at', $value); } public function orCreatedAtNotLike(string $value) { return $this->orDatetimeNotLike('created_at', $value); } public function orCreatedAtBeginsLike(string $value) { return $this->orDatetimeBeginsLike('created_at', $value); } public function orCreatedAtNotBeginsLike(string $value) { return $this->orDatetimeNotBeginsLike('created_at', $value); } public function orCreatedAtEndsLike(string $value) { return $this->orDatetimeEndsLike('created_at', $value); } public function orCreatedAtNotEndsLike(string $value) { return $this->orDatetimeNotEndsLike('created_at', $value); } /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function createdAtBetween(string $from, string $to) { return static::datetimeBetween('created_at', $from, $to); } public static function createdAtEqual(string $value) { return static::datetimeEqual('created_at', $value); } public static function createdAtNot(string $value) { return static::datetimeNot('created_at', $value); } public static function createdAtGreaterOrEqualThan(string $value, AbstractInterval $interval = null) { return static::datetimeGreaterOrEqualThan('created_at', $value, $interval); } public static function createdAtGreaterOrEqualThanNow(AbstractInterval $interval = null) { return static::datetimeGreaterOrEqualThanNow('created_at', $interval); } public static function createdAtGreaterThan(string $value, AbstractInterval $interval = null) { return static::datetimeGreaterThan('created_at', $value, $interval); } public static function createdAtGreaterThanNow(AbstractInterval $interval = null) { return static::datetimeGreaterThanNow('created_at', $interval); } public static function createdAtLowerOrEqualThan(string $value, AbstractInterval $interval = null) { return static::datetimeLowerOrEqualThan('created_at', $value, $interval); } public static function createdAtLowerOrEqualThanNow(AbstractInterval $interval = null) { return static::datetimeLowerOrEqualThanNow('created_at', $interval); } public static function createdAtLowerThan(string $value, AbstractInterval $interval = null) { return static::datetimeLowerThan('created_at', $value, $interval); } public static function createdAtLowerThanNow(AbstractInterval $interval = null) { return static::datetimeLowerThanNow('created_at', $interval); } public static function createdAtLike(string $value) { return static::datetimeLike('created_at', $value); } public static function createdAtNotLike(string $value) { return static::datetimeNotLike('created_at', $value); } public static function createdAtBeginsLike(string $value) { return static::datetimeBeginsLike('created_at', $value); } public static function createdAtNotBeginsLike(string $value) { return static::datetimeNotBeginsLike('created_at', $value); } public static function createdAtEndsLike(string $value) { return static::datetimeEndsLike('created_at', $value); } public static function createdAtNotEndsLike(string $value) { return static::datetimeNotEndsLike('created_at', $value); } public function andNameEqual(string $value) { return $this->andi18nStringEqual('name', $value); } public function andNameNot(string $value) { return $this->andi18nStringNot('name', $value); } public function andNameLike(string $value) { return $this->andi18nStringLike('name', $value); } public function andNameNotLike(string $value) { return $this->andi18nStringNotLike('name', $value); } public function andNameBeginsLike(string $value) { return $this->andi18nStringBeginsLike('name', $value); } public function andNameNotBeginsLike(string $value) { return $this->andi18nStringNotBeginsLike('name', $value); } public function andNameEndsLike(string $value) { return $this->andi18nStringEndsLike('name', $value); } public function andNameNotEndsLike(string $value) { return $this->andi18nStringNotEndsLike('name', $value); } public function andNameIn(array $values) { return $this->andi18nStringIn('name', $values); } public function andNameNotIn(array $values) { return $this->andi18nStringNotIn('name', $values); } public function orNameEqual(string $value) { return $this->ori18nStringEqual('name', $value); } public function orNameNot(string $value) { return $this->ori18nStringNot('name', $value); } public function orNameLike(string $value) { return $this->ori18nStringLike('name', $value); } public function orNameNotLike(string $value) { return $this->ori18nStringNotLike('name', $value); } public function orNameBeginsLike(string $value) { return $this->ori18nStringBeginsLike('name', $value); } public function orNameNotBeginsLike(string $value) { return $this->ori18nStringNotBeginsLike('name', $value); } public function orNameEndsLike(string $value) { return $this->ori18nStringEndsLike('name', $value); } public function orNameNotEndsLike(string $value) { return $this->ori18nStringNotEndsLike('name', $value); } public function orNameIn(array $values) { return $this->ori18nStringIn('name', $values); } public function orNameNotIn(array $values) { return $this->ori18nStringNotIn('name', $values); } /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function nameEqual(string $value) { return static::i18nStringEqual('name', $value); } /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function nameNot(string $value) { return static::i18nStringNot('name', $value); } /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function nameLike(string $value) { return static::i18nStringLike('name', $value); } /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function nameNotLike(string $value) { return static::i18nStringNotLike('name', $value); } /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function nameBeginsLike(string $value) { return static::i18nStringBeginsLike('name', $value); } /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function nameNotBeginsLike(string $value) { return static::i18nStringNotBeginsLike('name', $value); } /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function nameEndsLike(string $value) { return static::i18nStringEndsLike('name', $value); } /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function nameNotEndsLike(string $value) { return static::i18nStringNotEndsLike('name', $value); } /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function nameIn(array $values) { return static::i18nStringIn('name', $values); } /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function nameNotIn(array $values) { return static::i18nStringNotIn('name', $values); } public function andHasCmsAccessIsTrue() { return $this->andBooleanTrue('has_cms_access'); } public function andHasCmsAccessIsFalse() { return $this->andBooleanFalse('has_cms_access'); } public function orHasCmsAccessIsTrue() { return $this->orBooleanTrue('has_cms_access'); } public function orHasCmsAccessIsFalse() { return $this->orBooleanFalse('has_cms_access'); } /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function hasCmsAccessIsTrue() { return static::booleanTrue('has_cms_access'); } /** @return \LaminimCMS\Generated\UserRoleWhere */ public static function hasCmsAccessIsFalse() { return static::booleanFalse('has_cms_access'); } }