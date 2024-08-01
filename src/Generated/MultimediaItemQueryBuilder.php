<?php  namespace LaminimCMS\Generated; use Lkt\QueryBuilding\Query; use Lkt\QueryBuilding\DateIntervals\AbstractInterval; use Lkt\Factory\Instantiator\Instantiator; use Lkt\Factory\Schemas\Schema; class MultimediaItemQueryBuilder extends Query { const COMPONENT = 'lmm-multimedia'; /** @return \LaminimCMS\Generated\MultimediaItemQueryBuilder */ public static function getCaller() { $schema = Schema::get(static::COMPONENT); /** @var \LaminimCMS\Generated\MultimediaItemQueryBuilder $r */ $r = static::table($schema->getTable()); Instantiator::prepareQueryCaller(static::COMPONENT, $r); return $r; } public function andIdEqual(int $value) { return $this->andIntegerEqual('id', $value); } public function andIdNot(int $value) { return $this->andIntegerNot('id', $value); } public function andIdGreaterThan(int $value) { return $this->andIntegerGreaterThan('id', $value); } public function andIdGreaterOrEqualThan(int $value) { return $this->andIntegerGreaterOrEqualThan('id', $value); } public function andIdLowerThan(int $value) { return $this->andIntegerLowerThan('id', $value); } public function andIdLowerOrEqualThan(int $value) { return $this->andIntegerLowerOrEqualThan('id', $value); } public function andIdBetween(int $from, int $to) { return $this->andIntegerBetween('id', $from, $to); } public function andIdIn(array $values) { return $this->andIntegerIn('id', $values); } public function andIdNotIn(array $values) { return $this->andIntegerNotIn('id', $values); } public function andIdEqualToField(string $component, string $field ) { return $this->andFieldEqualToField('id', $component, $field); } public function orIdEqual(int $value) { return $this->orIntegerEqual('id', $value); } public function orIdNot(int $value) { return $this->orIntegerNot('id', $value); } public function orIdGreaterThan(int $value) { return $this->orIntegerGreaterThan('id', $value); } public function orIdGreaterOrEqualThan(int $value) { return $this->orIntegerGreaterOrEqualThan('id', $value); } public function orIdLowerThan(int $value) { return $this->orIntegerLowerThan('id', $value); } public function orIdLowerOrEqualThan(int $value) { return $this->orIntegerLowerOrEqualThan('id', $value); } public function orIdBetween(int $from, int $to) { return $this->orIntegerBetween('id', $from, $to); } public function orIdIn(array $values) { return $this->orIntegerIn('id', $values); } public function orIdNotIn(array $values) { return $this->orIntegerNotIn('id', $values); } public function orIdEqualToField(string $component, string $field ) { return $this->orFieldEqualToField('id', $component, $field); } public function andCreatedAtBetween(string $from, string $to) { return $this->andDatetimeBetween('created_at', $from, $to); } public function andCreatedAtEqual(string $value) { return $this->andDatetimeEqual('created_at', $value); } public function andCreatedAtNot(string $value) { return $this->andDatetimeNot('created_at', $value); } public function andCreatedAtGreaterOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeGreaterOrEqualThan('created_at', $value, $interval); } public function andCreatedAtGreaterOrEqualThanNow(AbstractInterval $interval = null) { return $this->andDatetimeGreaterOrEqualThanNow('created_at', $interval); } public function andCreatedAtGreaterThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeGreaterThan('created_at', $value, $interval); } public function andCreatedAtGreaterThanNow(AbstractInterval $interval = null) { return $this->andDatetimeGreaterThanNow('created_at', $interval); } public function andCreatedAtLowerOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeLowerOrEqualThan('created_at', $value, $interval); } public function andCreatedAtLowerOrEqualThanNow(AbstractInterval $interval = null) { return $this->andDatetimeLowerOrEqualThanNow('created_at', $interval); } public function andCreatedAtLowerThan(string $value, AbstractInterval $interval = null) { return $this->andDatetimeLowerThan('created_at', $value, $interval); } public function andCreatedAtLowerThanNow(AbstractInterval $interval = null) { return $this->andDatetimeLowerThanNow('created_at', $interval); } public function andCreatedAtLike(string $value) { return $this->andDatetimeLike('created_at', $value); } public function andCreatedAtNotLike(string $value) { return $this->andDatetimeNotLike('created_at', $value); } public function andCreatedAtBeginsLike(string $value) { return $this->andDatetimeBeginsLike('created_at', $value); } public function andCreatedAtNotBeginsLike(string $value) { return $this->andDatetimeNotBeginsLike('created_at', $value); } public function andCreatedAtEndsLike(string $value) { return $this->andDatetimeEndsLike('created_at', $value); } public function andCreatedAtNotEndsLike(string $value) { return $this->andDatetimeNotEndsLike('created_at', $value); } public function orCreatedAtBetween(string $from, string $to) { return $this->orDatetimeBetween('created_at', $from, $to); } public function orCreatedAtEqual(string $value) { return $this->orDatetimeEqual('created_at', $value); } public function orCreatedAtNot(string $value) { return $this->orDatetimeNot('created_at', $value); } public function orCreatedAtGreaterOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeGreaterOrEqualThan('created_at', $value, $interval); } public function orCreatedAtGreaterOrEqualThanNow(AbstractInterval $interval = null) { return $this->orDatetimeGreaterOrEqualThanNow('created_at', $interval); } public function orCreatedAtGreaterThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeGreaterThan('created_at', $value, $interval); } public function orCreatedAtGreaterThanNow(AbstractInterval $interval = null) { return $this->orDatetimeGreaterThanNow('created_at', $interval); } public function orCreatedAtLowerOrEqualThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeLowerOrEqualThan('created_at', $value, $interval); } public function orCreatedAtLowerOrEqualThanNow(AbstractInterval $interval = null) { return $this->orDatetimeLowerOrEqualThanNow('created_at', $interval); } public function orCreatedAtLowerThan(string $value, AbstractInterval $interval = null) { return $this->orDatetimeLowerThan('created_at', $value, $interval); } public function orCreatedAtLowerThanNow(AbstractInterval $interval = null) { return $this->orDatetimeLowerThanNow('created_at', $interval); } public function orCreatedAtLike(string $value) { return $this->orDatetimeLike('created_at', $value); } public function orCreatedAtNotLike(string $value) { return $this->orDatetimeNotLike('created_at', $value); } public function orCreatedAtBeginsLike(string $value) { return $this->orDatetimeBeginsLike('created_at', $value); } public function orCreatedAtNotBeginsLike(string $value) { return $this->orDatetimeNotBeginsLike('created_at', $value); } public function orCreatedAtEndsLike(string $value) { return $this->orDatetimeEndsLike('created_at', $value); } public function orCreatedAtNotEndsLike(string $value) { return $this->orDatetimeNotEndsLike('created_at', $value); } public function andCreatedByEqual(int $value) { return $this->andIntegerEqual('created_by', $value); } public function andCreatedByNot(int $value) { return $this->andIntegerNot('created_by', $value); } public function andCreatedByGreaterThan(int $value) { return $this->andIntegerGreaterThan('created_by', $value); } public function andCreatedByGreaterOrEqualThan(int $value) { return $this->andIntegerGreaterOrEqualThan('created_by', $value); } public function andCreatedByLowerThan(int $value) { return $this->andIntegerLowerThan('created_by', $value); } public function andCreatedByLowerOrEqualThan(int $value) { return $this->andIntegerLowerOrEqualThan('created_by', $value); } public function andCreatedByBetween(int $from, int $to) { return $this->andIntegerBetween('created_by', $from, $to); } public function andCreatedByIn(array $values) { return $this->andIntegerIn('created_by', $values); } public function andCreatedByNotIn(array $values) { return $this->andIntegerNotIn('created_by', $values); } public function andCreatedByEqualToField(string $component, string $field ) { return $this->andFieldEqualToField('created_by', $component, $field); } public function orCreatedByEqual(int $value) { return $this->orIntegerEqual('created_by', $value); } public function orCreatedByNot(int $value) { return $this->orIntegerNot('created_by', $value); } public function orCreatedByGreaterThan(int $value) { return $this->orIntegerGreaterThan('created_by', $value); } public function orCreatedByGreaterOrEqualThan(int $value) { return $this->orIntegerGreaterOrEqualThan('created_by', $value); } public function orCreatedByLowerThan(int $value) { return $this->orIntegerLowerThan('created_by', $value); } public function orCreatedByLowerOrEqualThan(int $value) { return $this->orIntegerLowerOrEqualThan('created_by', $value); } public function orCreatedByBetween(int $from, int $to) { return $this->orIntegerBetween('created_by', $from, $to); } public function orCreatedByIn(array $values) { return $this->orIntegerIn('created_by', $values); } public function orCreatedByNotIn(array $values) { return $this->orIntegerNotIn('created_by', $values); } public function orCreatedByEqualToField(string $component, string $field ) { return $this->orFieldEqualToField('created_by', $component, $field); } public function andNameEqual(string $value) { return $this->andStringEqual('name', $value); } public function andNameNot(string $value) { return $this->andStringNot('name', $value); } public function andNameLike(string $value) { return $this->andStringLike('name', $value); } public function andNameNotLike(string $value) { return $this->andStringNotLike('name', $value); } public function andNameBeginsLike(string $value) { return $this->andStringBeginsLike('name', $value); } public function andNameNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('name', $value); } public function andNameEndsLike(string $value) { return $this->andStringEndsLike('name', $value); } public function andNameNotEndsLike(string $value) { return $this->andStringNotEndsLike('name', $value); } public function andNameIn(array $values) { return $this->andStringIn('name', $values); } public function andNameNotIn(array $values) { return $this->andStringNotIn('name', $values); } public function orNameEqual(string $value) { return $this->orStringEqual('name', $value); } public function orNameNot(string $value) { return $this->orStringNot('name', $value); } public function orNameLike(string $value) { return $this->orStringLike('name', $value); } public function orNameNotLike(string $value) { return $this->orStringNotLike('name', $value); } public function orNameBeginsLike(string $value) { return $this->orStringBeginsLike('name', $value); } public function orNameNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('name', $value); } public function orNameEndsLike(string $value) { return $this->orStringEndsLike('name', $value); } public function orNameNotEndsLike(string $value) { return $this->orStringNotEndsLike('name', $value); } public function orNameIn(array $values) { return $this->orStringIn('name', $values); } public function orNameNotIn(array $values) { return $this->orStringNotIn('name', $values); } public function andUrlEqual(string $value) { return $this->andStringEqual('url', $value); } public function andUrlNot(string $value) { return $this->andStringNot('url', $value); } public function andUrlLike(string $value) { return $this->andStringLike('url', $value); } public function andUrlNotLike(string $value) { return $this->andStringNotLike('url', $value); } public function andUrlBeginsLike(string $value) { return $this->andStringBeginsLike('url', $value); } public function andUrlNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('url', $value); } public function andUrlEndsLike(string $value) { return $this->andStringEndsLike('url', $value); } public function andUrlNotEndsLike(string $value) { return $this->andStringNotEndsLike('url', $value); } public function andUrlIn(array $values) { return $this->andStringIn('url', $values); } public function andUrlNotIn(array $values) { return $this->andStringNotIn('url', $values); } public function orUrlEqual(string $value) { return $this->orStringEqual('url', $value); } public function orUrlNot(string $value) { return $this->orStringNot('url', $value); } public function orUrlLike(string $value) { return $this->orStringLike('url', $value); } public function orUrlNotLike(string $value) { return $this->orStringNotLike('url', $value); } public function orUrlBeginsLike(string $value) { return $this->orStringBeginsLike('url', $value); } public function orUrlNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('url', $value); } public function orUrlEndsLike(string $value) { return $this->orStringEndsLike('url', $value); } public function orUrlNotEndsLike(string $value) { return $this->orStringNotEndsLike('url', $value); } public function orUrlIn(array $values) { return $this->orStringIn('url', $values); } public function orUrlNotIn(array $values) { return $this->orStringNotIn('url', $values); } public function andTypeEqual(string $value) { return $this->andStringEqual('type', $value); } public function andTypeNot(string $value) { return $this->andStringNot('type', $value); } public function andTypeLike(string $value) { return $this->andStringLike('type', $value); } public function andTypeNotLike(string $value) { return $this->andStringNotLike('type', $value); } public function andTypeBeginsLike(string $value) { return $this->andStringBeginsLike('type', $value); } public function andTypeNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('type', $value); } public function andTypeEndsLike(string $value) { return $this->andStringEndsLike('type', $value); } public function andTypeNotEndsLike(string $value) { return $this->andStringNotEndsLike('type', $value); } public function andTypeIn(array $values) { return $this->andStringIn('type', $values); } public function andTypeNotIn(array $values) { return $this->andStringNotIn('type', $values); } public function andTypeIsImage() { return $this->andStringEqual('type', 'image'); } public function andTypeIsNotImage() { return $this->andStringNot('type', 'image'); } public function andTypeIsVideo() { return $this->andStringEqual('type', 'video'); } public function andTypeIsNotVideo() { return $this->andStringNot('type', 'video'); } public function andTypeIsFile() { return $this->andStringEqual('type', 'file'); } public function andTypeIsNotFile() { return $this->andStringNot('type', 'file'); } public function andTypeIsOffice() { return $this->andStringEqual('type', 'office'); } public function andTypeIsNotOffice() { return $this->andStringNot('type', 'office'); } public function andTypeIsYoutube() { return $this->andStringEqual('type', 'youtube'); } public function andTypeIsNotYoutube() { return $this->andStringNot('type', 'youtube'); } public function andTypeIsVimeo() { return $this->andStringEqual('type', 'vimeo'); } public function andTypeIsNotVimeo() { return $this->andStringNot('type', 'vimeo'); } public function andTypeIsUrl() { return $this->andStringEqual('type', 'url'); } public function andTypeIsNotUrl() { return $this->andStringNot('type', 'url'); } public function orTypeEqual(string $value) { return $this->orStringEqual('type', $value); } public function orTypeNot(string $value) { return $this->orStringNot('type', $value); } public function orTypeLike(string $value) { return $this->orStringLike('type', $value); } public function orTypeNotLike(string $value) { return $this->orStringNotLike('type', $value); } public function orTypeBeginsLike(string $value) { return $this->orStringBeginsLike('type', $value); } public function orTypeNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('type', $value); } public function orTypeEndsLike(string $value) { return $this->orStringEndsLike('type', $value); } public function orTypeNotEndsLike(string $value) { return $this->orStringNotEndsLike('type', $value); } public function orTypeIn(array $values) { return $this->orStringIn('type', $values); } public function orTypeNotIn(array $values) { return $this->orStringNotIn('type', $values); } public function orTypeIsImage() { return $this->orStringEqual('type', 'image'); } public function orTypeIsNotImage() { return $this->orStringNot('type', 'image'); } public function orTypeIsVideo() { return $this->orStringEqual('type', 'video'); } public function orTypeIsNotVideo() { return $this->orStringNot('type', 'video'); } public function orTypeIsFile() { return $this->orStringEqual('type', 'file'); } public function orTypeIsNotFile() { return $this->orStringNot('type', 'file'); } public function orTypeIsOffice() { return $this->orStringEqual('type', 'office'); } public function orTypeIsNotOffice() { return $this->orStringNot('type', 'office'); } public function orTypeIsYoutube() { return $this->orStringEqual('type', 'youtube'); } public function orTypeIsNotYoutube() { return $this->orStringNot('type', 'youtube'); } public function orTypeIsVimeo() { return $this->orStringEqual('type', 'vimeo'); } public function orTypeIsNotVimeo() { return $this->orStringNot('type', 'vimeo'); } public function orTypeIsUrl() { return $this->orStringEqual('type', 'url'); } public function orTypeIsNotUrl() { return $this->orStringNot('type', 'url'); } public function andMimeEqual(string $value) { return $this->andStringEqual('mime', $value); } public function andMimeNot(string $value) { return $this->andStringNot('mime', $value); } public function andMimeLike(string $value) { return $this->andStringLike('mime', $value); } public function andMimeNotLike(string $value) { return $this->andStringNotLike('mime', $value); } public function andMimeBeginsLike(string $value) { return $this->andStringBeginsLike('mime', $value); } public function andMimeNotBeginsLike(string $value) { return $this->andStringNotBeginsLike('mime', $value); } public function andMimeEndsLike(string $value) { return $this->andStringEndsLike('mime', $value); } public function andMimeNotEndsLike(string $value) { return $this->andStringNotEndsLike('mime', $value); } public function andMimeIn(array $values) { return $this->andStringIn('mime', $values); } public function andMimeNotIn(array $values) { return $this->andStringNotIn('mime', $values); } public function orMimeEqual(string $value) { return $this->orStringEqual('mime', $value); } public function orMimeNot(string $value) { return $this->orStringNot('mime', $value); } public function orMimeLike(string $value) { return $this->orStringLike('mime', $value); } public function orMimeNotLike(string $value) { return $this->orStringNotLike('mime', $value); } public function orMimeBeginsLike(string $value) { return $this->orStringBeginsLike('mime', $value); } public function orMimeNotBeginsLike(string $value) { return $this->orStringNotBeginsLike('mime', $value); } public function orMimeEndsLike(string $value) { return $this->orStringEndsLike('mime', $value); } public function orMimeNotEndsLike(string $value) { return $this->orStringNotEndsLike('mime', $value); } public function orMimeIn(array $values) { return $this->orStringIn('mime', $values); } public function orMimeNotIn(array $values) { return $this->orStringNotIn('mime', $values); } }