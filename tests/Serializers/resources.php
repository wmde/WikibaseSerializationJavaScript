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

		'wikibase.serialization.ClaimGroupSerializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'ClaimGroupSerializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Claim',
				'wikibase.datamodel.ClaimGroup',
				'wikibase.datamodel.ClaimList',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.serialization.ClaimGroupSerializer',
			),
		),

		'wikibase.serialization.ClaimGroupSetSerializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'ClaimGroupSetSerializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Claim',
				'wikibase.datamodel.ClaimGroup',
				'wikibase.datamodel.ClaimGroupSet',
				'wikibase.datamodel.ClaimList',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.serialization.ClaimGroupSetSerializer',
			),
		),

		'wikibase.serialization.ClaimListSerializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'ClaimListSerializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Claim',
				'wikibase.datamodel.ClaimList',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.serialization.ClaimListSerializer',
			),
		),

		'wikibase.serialization.ClaimSerializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'ClaimSerializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Claim',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.datamodel.SnakList',
				'wikibase.serialization.ClaimSerializer',
			),
		),

		'wikibase.serialization.EntitySerializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'EntitySerializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Claim',
				'wikibase.datamodel.EntityTerms',
				'wikibase.datamodel.Item',
				'wikibase.datamodel.MultiTerm',
				'wikibase.datamodel.MultiTermMap',
				'wikibase.datamodel.Property',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.datamodel.SiteLink',
				'wikibase.datamodel.SiteLinkSet',
				'wikibase.datamodel.Statement',
				'wikibase.datamodel.StatementGroup',
				'wikibase.datamodel.StatementGroupSet',
				'wikibase.datamodel.StatementList',
				'wikibase.datamodel.Term',
				'wikibase.datamodel.TermMap',
				'wikibase.serialization.EntitySerializer',
				'wikibase.serialization.tests.MockEntity',
			),
		),

		'wikibase.serialization.EntityTermsSerializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'EntityTermsSerializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.EntityTerms',
				'wikibase.datamodel.Term',
				'wikibase.datamodel.MultiTerm',
				'wikibase.datamodel.MultiTermMap',
				'wikibase.datamodel.TermMap',
				'wikibase.serialization.EntityTermsSerializer',
			),
		),

		'wikibase.serialization.ItemSerializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'ItemSerializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Claim',
				'wikibase.datamodel.EntityTerms',
				'wikibase.datamodel.Item',
				'wikibase.datamodel.MultiTerm',
				'wikibase.datamodel.MultiTermMap',
				'wikibase.datamodel.Property',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.datamodel.SiteLink',
				'wikibase.datamodel.SiteLinkSet',
				'wikibase.datamodel.Statement',
				'wikibase.datamodel.StatementGroup',
				'wikibase.datamodel.StatementGroupSet',
				'wikibase.datamodel.StatementList',
				'wikibase.datamodel.Term',
				'wikibase.datamodel.TermMap',
				'wikibase.serialization.ItemSerializer',
			),
		),

		'wikibase.serialization.MultiTermMapSerializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'MultiTermMapSerializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Term',
				'wikibase.datamodel.MultiTermMap',
				'wikibase.serialization.MultiTermMapSerializer',
			),
		),

		'wikibase.serialization.MultiTermSerializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'MultiTermSerializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.MultiTerm',
				'wikibase.serialization.MultiTermSerializer',
			),
		),

		'wikibase.serialization.PropertySerializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'PropertySerializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Claim',
				'wikibase.datamodel.EntityTerms',
				'wikibase.datamodel.Item',
				'wikibase.datamodel.MultiTerm',
				'wikibase.datamodel.MultiTermMap',
				'wikibase.datamodel.Property',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.datamodel.Statement',
				'wikibase.datamodel.StatementGroup',
				'wikibase.datamodel.StatementGroupSet',
				'wikibase.datamodel.StatementList',
				'wikibase.datamodel.Term',
				'wikibase.datamodel.TermMap',
				'wikibase.serialization.PropertySerializer',
			),
		),

		'wikibase.serialization.ReferenceListSerializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'ReferenceListSerializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Reference',
				'wikibase.datamodel.ReferenceList',
				'wikibase.serialization.ReferenceListSerializer',
			),
		),

		'wikibase.serialization.ReferenceSerializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'ReferenceSerializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel',
				'wikibase.serialization.ReferenceSerializer',
			),
		),

		'wikibase.serialization.SiteLinkSerializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'SiteLinkSerializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel',
				'wikibase.serialization.SiteLinkSerializer',
			),
		),

		'wikibase.serialization.SiteLinkSetSerializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'SiteLinkSetSerializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.SiteLink',
				'wikibase.datamodel.SiteLinkSet',
				'wikibase.serialization.SiteLinkSetSerializer',
			),
		),

		'wikibase.serialization.Serializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'Serializer.tests.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.serialization.Serializer',
			),
		),

		'wikibase.serialization.SnakListSerializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'SnakListSerializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel',
				'wikibase.serialization.SnakListSerializer',
			),
		),

		'wikibase.serialization.SnakSerializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'SnakSerializer.tests.js',
			),
			'dependencies' => array(
				'dataValues.values',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.datamodel.PropertySomeValueSnak',
				'wikibase.datamodel.PropertyValueSnak',
				'wikibase.serialization.SnakSerializer',
			),
		),

		'wikibase.serialization.StatementGroupSerializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'StatementGroupSerializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Claim',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.datamodel.Statement',
				'wikibase.datamodel.StatementGroup',
				'wikibase.datamodel.StatementList',
				'wikibase.serialization.StatementGroupSerializer',
			),
		),

		'wikibase.serialization.StatementGroupSetSerializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'StatementGroupSetSerializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Claim',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.datamodel.Statement',
				'wikibase.datamodel.StatementGroup',
				'wikibase.datamodel.StatementGroupSet',
				'wikibase.datamodel.StatementList',
				'wikibase.serialization.StatementGroupSetSerializer',
			),
		),

		'wikibase.serialization.StatementListSerializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'StatementListSerializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Claim',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.datamodel.Statement',
				'wikibase.datamodel.StatementList',
				'wikibase.serialization.StatementListSerializer',
			),
		),

		'wikibase.serialization.StatementSerializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'StatementSerializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Claim',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.datamodel.Reference',
				'wikibase.datamodel.ReferenceList',
				'wikibase.datamodel.Statement',
				'wikibase.serialization.StatementSerializer',
			),
		),

		'wikibase.serialization.TermSerializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'TermSerializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Term',
				'wikibase.serialization.TermSerializer',
			),
		),

		'wikibase.serialization.TermMapSerializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'TermMapSerializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Term',
				'wikibase.datamodel.TermMap',
				'wikibase.serialization.TermMapSerializer',
			),
		),

	);

	return $modules;
} );
