<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\Where; use Lkt\QueryBuilding\DateIntervals\AbstractInterval; class UserWhere extends Where { const COMPONENT = 'lmm-user'; /** @return \LaminimCMS\Generated\UserWhere */ public static function getEmpty() { /** @var \LaminimCMS\Generated\UserWhere $r */ $r = parent::getEmpty(); return $r; } public function andIdEqual(int $value) { return $this->andIntegerEqual('id', $value); } public function andIdNot(int $value) { return $this->andIntegerNot('id', $value); } public function andIdGreaterThan(int $value) { return $this->andIntegerGreaterThan('id', $value); } public function andIdGreaterOrEqualThan(int $value) { return $this->andIntegerGreaterOrEqualThan('id', $value); } public function andIdLowerThan(int $value) { return $this->andIntegerLowerThan('id', $value); } public function andIdLowerOrEqualThan(int $value) { return $this->andIntegerLowerOrEqualThan('id', $value); } public function andIdBetween(int $from, int $to) { return $this->andIntegerBetween('id', $from, $to); } public function andIdIn(array $values) { return $this->andIntegerIn('id', $values); } public function andIdNotIn(array $values) { return $this->andIntegerNotIn('id', $values); } public function andIdEqualToField(string $component, string $field ) { return $this->andFieldEqualToField('id', $component, $field); } public function orIdEqual(int $value) { return $this->orIntegerEqual('id', $value); } public function orIdNot(int $value) { return $this->orIntegerNot('id', $value); } public function orIdGreaterThan(int $value) { return $this->orIntegerGreaterThan('id', $value); } public function orIdGreaterOrEqualThan(int $value) { return $this->orIntegerGreaterOrEqualThan('id', $value); } public function orIdLowerThan(int $value) { return $this->orIntegerLowerThan('id', $value); } public function orIdLowerOrEqualThan(int $value) { return $this->orIntegerLowerOrEqualThan('id', $value); } public function orIdBetween(int $from, int $to) { return $this->orIntegerBetween('id', $from, $to); } public function orIdIn(array $values) { return $this->orIntegerIn('id', $values); } public function orIdNotIn(array $values) { return $this->orIntegerNotIn('id', $values); } public function orIdEqualToField(string $component, string $field ) { return $this->orFieldEqualToField('id', $component, $field); } /** @return \LaminimCMS\Generated\UserWhere */ public static function idEqual(int $value) { return static::integerEqual('id', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function idNot(int $value) { return static::integerNot('id', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function idGreaterThan(int $value) { return static::integerGreaterThan('id', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function idGreaterOrEqualThan(int $value) { return static::integerGreaterOrEqualThan('id', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function idLowerThan(int $value) { return static::integerLowerThan('id', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function idLowerOrEqualThan(int $value) { return static::integerLowerOrEqualThan('id', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function idBetween(int $from, int $to) { return static::integerBetween('id', $from, $to); } /** @return \LaminimCMS\Generated\UserWhere */ public static function idIn(array $values) { return static::integerIn('id', $values); } /** @return \LaminimCMS\Generated\UserWhere */ public static function idNotIn(array $values) { return static::integerNotIn('id', $values); } public function andCreatedAtBetween(string $from, string $to) { return $this->andDatetimeBetween('created_at', $from, $to); } public function andCreatedAtEqual(string $value) { return $this->andDatetimeEqual('created_at', $value); } public function andCreatedAtNot(string $value) { return $this->andDatetimeNot('created_at', $value); } public function andCreatedAtGreaterOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeGreaterOrEqualThan('created_at', $value, $interval); } public function andCreatedAtGreaterOrEqualThanNow(AbstractInterval $interval = null) { return $this->andDatetimeGreaterOrEqualThanNow('created_at', $interval); } public function andCreatedAtGreaterThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeGreaterThan('created_at', $value, $interval); } public function andCreatedAtGreaterThanNow(AbstractInterval $interval = null) { return $this->andDatetimeGreaterThanNow('created_at', $interval); } public function andCreatedAtLowerOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeLowerOrEqualThan('created_at', $value, $interval); } public function andCreatedAtLowerOrEqualThanNow(AbstractInterval $interval = null) { return $this->andDatetimeLowerOrEqualThanNow('created_at', $interval); } public function andCreatedAtLowerThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeLowerThan('created_at', $value, $interval); } public function andCreatedAtLowerThanNow(AbstractInterval $interval = null) { return $this->andDatetimeLowerThanNow('created_at', $interval); } public function andCreatedAtLike(string $value) { return $this->andDatetimeLike('created_at', $value); } public function andCreatedAtNotLike(string $value) { return $this->andDatetimeNotLike('created_at', $value); } public function andCreatedAtBeginsLike(string $value) { return $this->andDatetimeBeginsLike('created_at', $value); } public function andCreatedAtNotBeginsLike(string $value) { return $this->andDatetimeNotBeginsLike('created_at', $value); } public function andCreatedAtEndsLike(string $value) { return $this->andDatetimeEndsLike('created_at', $value); } public function andCreatedAtNotEndsLike(string $value) { return $this->andDatetimeNotEndsLike('created_at', $value); } public function orCreatedAtBetween(string $from, string $to) { return $this->orDatetimeBetween('created_at', $from, $to); } public function orCreatedAtEqual(string $value) { return $this->orDatetimeEqual('created_at', $value); } public function orCreatedAtNot(string $value) { return $this->orDatetimeNot('created_at', $value); } public function orCreatedAtGreaterOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeGreaterOrEqualThan('created_at', $value, $interval); } public function orCreatedAtGreaterOrEqualThanNow(AbstractInterval $interval = null) { return $this->orDatetimeGreaterOrEqualThanNow('created_at', $interval); } public function orCreatedAtGreaterThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeGreaterThan('created_at', $value, $interval); } public function orCreatedAtGreaterThanNow(AbstractInterval $interval = null) { return $this->orDatetimeGreaterThanNow('created_at', $interval); } public function orCreatedAtLowerOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeLowerOrEqualThan('created_at', $value, $interval); } public function orCreatedAtLowerOrEqualThanNow(AbstractInterval $interval = null) { return $this->orDatetimeLowerOrEqualThanNow('created_at', $interval); } public function orCreatedAtLowerThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeLowerThan('created_at', $value, $interval); } public function orCreatedAtLowerThanNow(AbstractInterval $interval = null) { return $this->orDatetimeLowerThanNow('created_at', $interval); } public function orCreatedAtLike(string $value) { return $this->orDatetimeLike('created_at', $value); } public function orCreatedAtNotLike(string $value) { return $this->orDatetimeNotLike('created_at', $value); } public function orCreatedAtBeginsLike(string $value) { return $this->orDatetimeBeginsLike('created_at', $value); } public function orCreatedAtNotBeginsLike(string $value) { return $this->orDatetimeNotBeginsLike('created_at', $value); } public function orCreatedAtEndsLike(string $value) { return $this->orDatetimeEndsLike('created_at', $value); } public function orCreatedAtNotEndsLike(string $value) { return $this->orDatetimeNotEndsLike('created_at', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function createdAtBetween(string $from, string $to) { return static::datetimeBetween('created_at', $from, $to); } public static function createdAtEqual(string $value) { return static::datetimeEqual('created_at', $value); } public static function createdAtNot(string $value) { return static::datetimeNot('created_at', $value); } public static function createdAtGreaterOrEqualThan(string $value, AbstractInterval $interval = null) { return static::datetimeGreaterOrEqualThan('created_at', $value, $interval); } public static function createdAtGreaterOrEqualThanNow(AbstractInterval $interval = null) { return static::datetimeGreaterOrEqualThanNow('created_at', $interval); } public static function createdAtGreaterThan(string $value, AbstractInterval $interval = null) { return static::datetimeGreaterThan('created_at', $value, $interval); } public static function createdAtGreaterThanNow(AbstractInterval $interval = null) { return static::datetimeGreaterThanNow('created_at', $interval); } public static function createdAtLowerOrEqualThan(string $value, AbstractInterval $interval = null) { return static::datetimeLowerOrEqualThan('created_at', $value, $interval); } public static function createdAtLowerOrEqualThanNow(AbstractInterval $interval = null) { return static::datetimeLowerOrEqualThanNow('created_at', $interval); } public static function createdAtLowerThan(string $value, AbstractInterval $interval = null) { return static::datetimeLowerThan('created_at', $value, $interval); } public static function createdAtLowerThanNow(AbstractInterval $interval = null) { return static::datetimeLowerThanNow('created_at', $interval); } public static function createdAtLike(string $value) { return static::datetimeLike('created_at', $value); } public static function createdAtNotLike(string $value) { return static::datetimeNotLike('created_at', $value); } public static function createdAtBeginsLike(string $value) { return static::datetimeBeginsLike('created_at', $value); } public static function createdAtNotBeginsLike(string $value) { return static::datetimeNotBeginsLike('created_at', $value); } public static function createdAtEndsLike(string $value) { return static::datetimeEndsLike('created_at', $value); } public static function createdAtNotEndsLike(string $value) { return static::datetimeNotEndsLike('created_at', $value); } public function andCreatedByEqual(int $value) { return $this->andIntegerEqual('created_by', $value); } public function andCreatedByNot(int $value) { return $this->andIntegerNot('created_by', $value); } public function andCreatedByGreaterThan(int $value) { return $this->andIntegerGreaterThan('created_by', $value); } public function andCreatedByGreaterOrEqualThan(int $value) { return $this->andIntegerGreaterOrEqualThan('created_by', $value); } public function andCreatedByLowerThan(int $value) { return $this->andIntegerLowerThan('created_by', $value); } public function andCreatedByLowerOrEqualThan(int $value) { return $this->andIntegerLowerOrEqualThan('created_by', $value); } public function andCreatedByBetween(int $from, int $to) { return $this->andIntegerBetween('created_by', $from, $to); } public function andCreatedByIn(array $values) { return $this->andIntegerIn('created_by', $values); } public function andCreatedByNotIn(array $values) { return $this->andIntegerNotIn('created_by', $values); } public function andCreatedByEqualToField(string $component, string $field ) { return $this->andFieldEqualToField('created_by', $component, $field); } public function orCreatedByEqual(int $value) { return $this->orIntegerEqual('created_by', $value); } public function orCreatedByNot(int $value) { return $this->orIntegerNot('created_by', $value); } public function orCreatedByGreaterThan(int $value) { return $this->orIntegerGreaterThan('created_by', $value); } public function orCreatedByGreaterOrEqualThan(int $value) { return $this->orIntegerGreaterOrEqualThan('created_by', $value); } public function orCreatedByLowerThan(int $value) { return $this->orIntegerLowerThan('created_by', $value); } public function orCreatedByLowerOrEqualThan(int $value) { return $this->orIntegerLowerOrEqualThan('created_by', $value); } public function orCreatedByBetween(int $from, int $to) { return $this->orIntegerBetween('created_by', $from, $to); } public function orCreatedByIn(array $values) { return $this->orIntegerIn('created_by', $values); } public function orCreatedByNotIn(array $values) { return $this->orIntegerNotIn('created_by', $values); } public function orCreatedByEqualToField(string $component, string $field ) { return $this->orFieldEqualToField('created_by', $component, $field); } /** @return \LaminimCMS\Generated\UserWhere */ public static function createdByEqual(int $value) { return static::integerEqual('created_by', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function createdByNot(int $value) { return static::integerNot('created_by', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function createdByGreaterThan(int $value) { return static::integerGreaterThan('created_by', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function createdByGreaterOrEqualThan(int $value) { return static::integerGreaterOrEqualThan('created_by', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function createdByLowerThan(int $value) { return static::integerLowerThan('created_by', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function createdByLowerOrEqualThan(int $value) { return static::integerLowerOrEqualThan('created_by', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function createdByBetween(int $from, int $to) { return static::integerBetween('created_by', $from, $to); } /** @return \LaminimCMS\Generated\UserWhere */ public static function createdByIn(array $values) { return static::integerIn('created_by', $values); } /** @return \LaminimCMS\Generated\UserWhere */ public static function createdByNotIn(array $values) { return static::integerNotIn('created_by', $values); } public function andNameEqual(string $value) { return $this->andStringEqual('name', $value); } public function andNameNot(string $value) { return $this->andStringNot('name', $value); } public function andNameLike(string $value) { return $this->andStringLike('name', $value); } public function andNameNotLike(string $value) { return $this->andStringNotLike('name', $value); } public function andNameBeginsLike(string $value) { return $this->andStringBeginsLike('name', $value); } public function andNameNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('name', $value); } public function andNameEndsLike(string $value) { return $this->andStringEndsLike('name', $value); } public function andNameNotEndsLike(string $value) { return $this->andStringNotEndsLike('name', $value); } public function andNameIn(array $values) { return $this->andStringIn('name', $values); } public function andNameNotIn(array $values) { return $this->andStringNotIn('name', $values); } public function orNameEqual(string $value) { return $this->orStringEqual('name', $value); } public function orNameNot(string $value) { return $this->orStringNot('name', $value); } public function orNameLike(string $value) { return $this->orStringLike('name', $value); } public function orNameNotLike(string $value) { return $this->orStringNotLike('name', $value); } public function orNameBeginsLike(string $value) { return $this->orStringBeginsLike('name', $value); } public function orNameNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('name', $value); } public function orNameEndsLike(string $value) { return $this->orStringEndsLike('name', $value); } public function orNameNotEndsLike(string $value) { return $this->orStringNotEndsLike('name', $value); } public function orNameIn(array $values) { return $this->orStringIn('name', $values); } public function orNameNotIn(array $values) { return $this->orStringNotIn('name', $values); } /** @return \LaminimCMS\Generated\UserWhere */ public static function nameEqual(string $value) { return static::stringEqual('name', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function nameNot(string $value) { return static::stringNot('name', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function nameLike(string $value) { return static::stringLike('name', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function nameNotLike(string $value) { return static::stringNotLike('name', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function nameBeginsLike(string $value) { return static::stringBeginsLike('name', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function nameNotBeginsLike(string $value) { return static::stringNotBeginsLike('name', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function nameEndsLike(string $value) { return static::stringEndsLike('name', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function nameNotEndsLike(string $value) { return static::stringNotEndsLike('name', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function nameIn(array $values) { return static::stringIn('name', $values); } /** @return \LaminimCMS\Generated\UserWhere */ public static function nameNotIn(array $values) { return static::stringNotIn('name', $values); } public function andLastNameEqual(string $value) { return $this->andStringEqual('lastname', $value); } public function andLastNameNot(string $value) { return $this->andStringNot('lastname', $value); } public function andLastNameLike(string $value) { return $this->andStringLike('lastname', $value); } public function andLastNameNotLike(string $value) { return $this->andStringNotLike('lastname', $value); } public function andLastNameBeginsLike(string $value) { return $this->andStringBeginsLike('lastname', $value); } public function andLastNameNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('lastname', $value); } public function andLastNameEndsLike(string $value) { return $this->andStringEndsLike('lastname', $value); } public function andLastNameNotEndsLike(string $value) { return $this->andStringNotEndsLike('lastname', $value); } public function andLastNameIn(array $values) { return $this->andStringIn('lastname', $values); } public function andLastNameNotIn(array $values) { return $this->andStringNotIn('lastname', $values); } public function orLastNameEqual(string $value) { return $this->orStringEqual('lastname', $value); } public function orLastNameNot(string $value) { return $this->orStringNot('lastname', $value); } public function orLastNameLike(string $value) { return $this->orStringLike('lastname', $value); } public function orLastNameNotLike(string $value) { return $this->orStringNotLike('lastname', $value); } public function orLastNameBeginsLike(string $value) { return $this->orStringBeginsLike('lastname', $value); } public function orLastNameNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('lastname', $value); } public function orLastNameEndsLike(string $value) { return $this->orStringEndsLike('lastname', $value); } public function orLastNameNotEndsLike(string $value) { return $this->orStringNotEndsLike('lastname', $value); } public function orLastNameIn(array $values) { return $this->orStringIn('lastname', $values); } public function orLastNameNotIn(array $values) { return $this->orStringNotIn('lastname', $values); } /** @return \LaminimCMS\Generated\UserWhere */ public static function lastNameEqual(string $value) { return static::stringEqual('lastname', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function lastNameNot(string $value) { return static::stringNot('lastname', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function lastNameLike(string $value) { return static::stringLike('lastname', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function lastNameNotLike(string $value) { return static::stringNotLike('lastname', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function lastNameBeginsLike(string $value) { return static::stringBeginsLike('lastname', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function lastNameNotBeginsLike(string $value) { return static::stringNotBeginsLike('lastname', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function lastNameEndsLike(string $value) { return static::stringEndsLike('lastname', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function lastNameNotEndsLike(string $value) { return static::stringNotEndsLike('lastname', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function lastNameIn(array $values) { return static::stringIn('lastname', $values); } /** @return \LaminimCMS\Generated\UserWhere */ public static function lastNameNotIn(array $values) { return static::stringNotIn('lastname', $values); } public function andEmailEqual(string $value) { return $this->andStringEqual('email', $value); } public function andEmailNot(string $value) { return $this->andStringNot('email', $value); } public function andEmailLike(string $value) { return $this->andStringLike('email', $value); } public function andEmailNotLike(string $value) { return $this->andStringNotLike('email', $value); } public function andEmailBeginsLike(string $value) { return $this->andStringBeginsLike('email', $value); } public function andEmailNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('email', $value); } public function andEmailEndsLike(string $value) { return $this->andStringEndsLike('email', $value); } public function andEmailNotEndsLike(string $value) { return $this->andStringNotEndsLike('email', $value); } public function andEmailIn(array $values) { return $this->andStringIn('email', $values); } public function andEmailNotIn(array $values) { return $this->andStringNotIn('email', $values); } public function orEmailEqual(string $value) { return $this->orStringEqual('email', $value); } public function orEmailNot(string $value) { return $this->orStringNot('email', $value); } public function orEmailLike(string $value) { return $this->orStringLike('email', $value); } public function orEmailNotLike(string $value) { return $this->orStringNotLike('email', $value); } public function orEmailBeginsLike(string $value) { return $this->orStringBeginsLike('email', $value); } public function orEmailNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('email', $value); } public function orEmailEndsLike(string $value) { return $this->orStringEndsLike('email', $value); } public function orEmailNotEndsLike(string $value) { return $this->orStringNotEndsLike('email', $value); } public function orEmailIn(array $values) { return $this->orStringIn('email', $values); } public function orEmailNotIn(array $values) { return $this->orStringNotIn('email', $values); } /** @return \LaminimCMS\Generated\UserWhere */ public static function emailEqual(string $value) { return static::stringEqual('email', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function emailNot(string $value) { return static::stringNot('email', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function emailLike(string $value) { return static::stringLike('email', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function emailNotLike(string $value) { return static::stringNotLike('email', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function emailBeginsLike(string $value) { return static::stringBeginsLike('email', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function emailNotBeginsLike(string $value) { return static::stringNotBeginsLike('email', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function emailEndsLike(string $value) { return static::stringEndsLike('email', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function emailNotEndsLike(string $value) { return static::stringNotEndsLike('email', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function emailIn(array $values) { return static::stringIn('email', $values); } /** @return \LaminimCMS\Generated\UserWhere */ public static function emailNotIn(array $values) { return static::stringNotIn('email', $values); } public function andPasswordEqual(string $value) { return $this->andStringEqual('password', $value); } public function andPasswordNot(string $value) { return $this->andStringNot('password', $value); } public function andPasswordLike(string $value) { return $this->andStringLike('password', $value); } public function andPasswordNotLike(string $value) { return $this->andStringNotLike('password', $value); } public function andPasswordBeginsLike(string $value) { return $this->andStringBeginsLike('password', $value); } public function andPasswordNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('password', $value); } public function andPasswordEndsLike(string $value) { return $this->andStringEndsLike('password', $value); } public function andPasswordNotEndsLike(string $value) { return $this->andStringNotEndsLike('password', $value); } public function andPasswordIn(array $values) { return $this->andStringIn('password', $values); } public function andPasswordNotIn(array $values) { return $this->andStringNotIn('password', $values); } public function orPasswordEqual(string $value) { return $this->orStringEqual('password', $value); } public function orPasswordNot(string $value) { return $this->orStringNot('password', $value); } public function orPasswordLike(string $value) { return $this->orStringLike('password', $value); } public function orPasswordNotLike(string $value) { return $this->orStringNotLike('password', $value); } public function orPasswordBeginsLike(string $value) { return $this->orStringBeginsLike('password', $value); } public function orPasswordNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('password', $value); } public function orPasswordEndsLike(string $value) { return $this->orStringEndsLike('password', $value); } public function orPasswordNotEndsLike(string $value) { return $this->orStringNotEndsLike('password', $value); } public function orPasswordIn(array $values) { return $this->orStringIn('password', $values); } public function orPasswordNotIn(array $values) { return $this->orStringNotIn('password', $values); } /** @return \LaminimCMS\Generated\UserWhere */ public static function passwordEqual(string $value) { return static::stringEqual('password', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function passwordNot(string $value) { return static::stringNot('password', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function passwordLike(string $value) { return static::stringLike('password', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function passwordNotLike(string $value) { return static::stringNotLike('password', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function passwordBeginsLike(string $value) { return static::stringBeginsLike('password', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function passwordNotBeginsLike(string $value) { return static::stringNotBeginsLike('password', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function passwordEndsLike(string $value) { return static::stringEndsLike('password', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function passwordNotEndsLike(string $value) { return static::stringNotEndsLike('password', $value); } /** @return \LaminimCMS\Generated\UserWhere */ public static function passwordIn(array $values) { return static::stringIn('password', $values); } /** @return \LaminimCMS\Generated\UserWhere */ public static function passwordNotIn(array $values) { return static::stringNotIn('password', $values); } public function andHasCustomPermissionsEnabledIsTrue() { return $this->andBooleanTrue('has_custom_permissions'); } public function andHasCustomPermissionsEnabledIsFalse() { return $this->andBooleanFalse('has_custom_permissions'); } public function orHasCustomPermissionsEnabledIsTrue() { return $this->orBooleanTrue('has_custom_permissions'); } public function orHasCustomPermissionsEnabledIsFalse() { return $this->orBooleanFalse('has_custom_permissions'); } /** @return \LaminimCMS\Generated\UserWhere */ public static function hasCustomPermissionsEnabledIsTrue() { return static::booleanTrue('has_custom_permissions'); } /** @return \LaminimCMS\Generated\UserWhere */ public static function hasCustomPermissionsEnabledIsFalse() { return static::booleanFalse('has_custom_permissions'); } public function andAssignedRolesContains($value) { return $this->andForeignKeysContains('assigned_roles', $value); } public function orAssignedRolesContains($value) { return $this->orForeignKeysContains('assigned_roles', $value); } }