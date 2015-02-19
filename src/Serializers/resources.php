<?php
/**
 * @licence GNU GPL v2+
 * @author H. Snater < mediawiki@snater.com >
 *
 * @codeCoverageIgnoreStart
 */
return call_user_func( function() {

	preg_match( '+' . preg_quote( DIRECTORY_SEPARATOR ) . '(?:vendor|extensions)'
		. preg_quote( DIRECTORY_SEPARATOR ) . '.*+', __DIR__, $remoteExtPath );

	$moduleTemplate = array(
		'localBasePath' => __DIR__,
		'remoteExtPath' => '..' . $remoteExtPath[0],
	);

	$modules = array(

		'wikibase.serialization.ClaimGroupSerializer' => $moduleTemplate + array(
			'scripts' => array(
				'ClaimGroupSerializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.ClaimGroup',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.ClaimListSerializer',
				'wikibase.serialization.Serializer',
			),
		),

		'wikibase.serialization.ClaimGroupSetSerializer' => $moduleTemplate + array(
			'scripts' => array(
				'ClaimGroupSetSerializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.ClaimGroupSet',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.ClaimGroupSerializer',
				'wikibase.serialization.Serializer',
			),
		),

		'wikibase.serialization.ClaimListSerializer' => $moduleTemplate + array(
			'scripts' => array(
				'ClaimListSerializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.ClaimList',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.ClaimSerializer',
				'wikibase.serialization.Serializer',
			),
		),

		'wikibase.serialization.ClaimSerializer' => $moduleTemplate + array(
			'scripts' => array(
				'ClaimSerializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.Claim',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Serializer',
				'wikibase.serialization.SnakListSerializer',
				'wikibase.serialization.SnakSerializer',
			),
		),

		'wikibase.serialization.EntitySerializer' => $moduleTemplate + array(
			'scripts' => array(
				'EntitySerializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.Entity',
				'wikibase.datamodel.Item',
				'wikibase.datamodel.Property',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.ItemSerializer',
				'wikibase.serialization.PropertySerializer',
				'wikibase.serialization.Serializer',
				'wikibase.serialization.StrategyProvider',
			),
		),

		'wikibase.serialization.EntityTermsSerializer' => $moduleTemplate + array(
			'scripts' => array(
				'EntityTermsSerializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.EntityTerms',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.MultiTermMapSerializer',
				'wikibase.serialization.Serializer',
				'wikibase.serialization.TermMapSerializer',
			),
		),

		'wikibase.serialization.ItemSerializer' => $moduleTemplate + array(
			'scripts' => array(
				'ItemSerializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.Item',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.EntityTermsSerializer',
				'wikibase.serialization.Serializer',
				'wikibase.serialization.SiteLinkSetSerializer',
				'wikibase.serialization.StatementGroupSetSerializer',
			),
		),

		'wikibase.serialization.MultiTermMapSerializer' => $moduleTemplate + array(
			'scripts' => array(
				'MultiTermMapSerializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.MultiTermMap',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.MultiTermSerializer',
				'wikibase.serialization.Serializer',
			),
		),

		'wikibase.serialization.MultiTermSerializer' => $moduleTemplate + array(
			'scripts' => array(
				'MultiTermSerializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.MultiTerm',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Serializer',
			),
		),

		'wikibase.serialization.PropertySerializer' => $moduleTemplate + array(
			'scripts' => array(
				'PropertySerializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.Item',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.EntityTermsSerializer',
				'wikibase.serialization.Serializer',
				'wikibase.serialization.StatementGroupSetSerializer',
			),
		),

		'wikibase.serialization.ReferenceListSerializer' => $moduleTemplate + array(
			'scripts' => array(
				'ReferenceListSerializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.ReferenceList',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.ReferenceSerializer',
				'wikibase.serialization.Serializer',
			),
		),

		'wikibase.serialization.ReferenceSerializer' => $moduleTemplate + array(
			'scripts' => array(
				'ReferenceSerializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.Reference',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Serializer',
				'wikibase.serialization.SnakListSerializer',
			),
		),

		'wikibase.serialization.Serializer' => $moduleTemplate + array(
			'scripts' => array(
				'Serializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.serialization.__namespace',
			),
		),

		'wikibase.serialization.SiteLinkSerializer' => $moduleTemplate + array(
			'scripts' => array(
				'SiteLinkSerializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.SiteLink',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Serializer',
			),
		),

		'wikibase.serialization.SiteLinkSetSerializer' => $moduleTemplate + array(
			'scripts' => array(
				'SiteLinkSetSerializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.SiteLinkSet',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Serializer',
				'wikibase.serialization.SiteLinkSerializer',
			),
		),

		'wikibase.serialization.SnakListSerializer' => $moduleTemplate + array(
			'scripts' => array(
				'SnakListSerializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.SnakList',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Serializer',
				'wikibase.serialization.SnakSerializer',
			),
		),

		'wikibase.serialization.SnakSerializer' => $moduleTemplate + array(
			'scripts' => array(
				'SnakSerializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.Snak',
				'wikibase.datamodel.PropertyValueSnak',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Serializer',
			),
		),

		'wikibase.serialization.StatementGroupSerializer' => $moduleTemplate + array(
			'scripts' => array(
				'StatementGroupSerializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.StatementGroup',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Serializer',
				'wikibase.serialization.StatementListSerializer',
			),
		),

		'wikibase.serialization.StatementGroupSetSerializer' => $moduleTemplate + array(
			'scripts' => array(
				'StatementGroupSetSerializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.StatementGroupSet',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Serializer',
				'wikibase.serialization.StatementGroupSerializer',
			),
		),

		'wikibase.serialization.StatementListSerializer' => $moduleTemplate + array(
			'scripts' => array(
				'StatementListSerializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.StatementList',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Serializer',
				'wikibase.serialization.StatementSerializer',
			),
		),

		'wikibase.serialization.StatementSerializer' => $moduleTemplate + array(
			'scripts' => array(
				'StatementSerializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.Statement',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.ClaimSerializer',
				'wikibase.serialization.ReferenceListSerializer',
				'wikibase.serialization.Serializer',
			),
		),

		'wikibase.serialization.TermMapSerializer' => $moduleTemplate + array(
			'scripts' => array(
				'TermMapSerializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.TermMap',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Serializer',
				'wikibase.serialization.TermSerializer',
			),
		),

		'wikibase.serialization.TermSerializer' => $moduleTemplate + array(
			'scripts' => array(
				'TermSerializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.Term',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Serializer',
			),
		),

	);

	return $modules;
} );
