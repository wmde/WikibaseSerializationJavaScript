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

		'wikibase.serialization.ClaimGroupSetDeserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'ClaimGroupSetDeserializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Claim',
				'wikibase.datamodel.ClaimGroup',
				'wikibase.datamodel.ClaimGroupSet',
				'wikibase.datamodel.ClaimList',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.serialization.ClaimGroupSetDeserializer',
			),
		),

		'wikibase.serialization.ClaimGroupDeserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'ClaimGroupDeserializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Claim',
				'wikibase.datamodel.ClaimGroup',
				'wikibase.datamodel.ClaimList',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.serialization.ClaimGroupDeserializer',
			),
		),

		'wikibase.serialization.ClaimListDeserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'ClaimListDeserializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Claim',
				'wikibase.datamodel.ClaimList',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.serialization.ClaimListDeserializer',
			),
		),

		'wikibase.serialization.ClaimDeserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'ClaimDeserializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Claim',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.datamodel.SnakList',
				'wikibase.serialization.ClaimDeserializer',
			),
		),

		'wikibase.serialization.Deserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'Deserializer.tests.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.serialization.Deserializer',
			),
		),

		'wikibase.serialization.EntityDeserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'EntityDeserializer.tests.js',
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
				'wikibase.serialization.EntityDeserializer',
				'wikibase.serialization.tests.MockEntity',
			),
		),

		'wikibase.serialization.EntityTermsDeserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'EntityTermsDeserializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.EntityTerms',
				'wikibase.datamodel.Term',
				'wikibase.datamodel.MultiTerm',
				'wikibase.datamodel.MultiTermMap',
				'wikibase.datamodel.TermMap',
				'wikibase.serialization.EntityTermsDeserializer',
			),
		),

		'wikibase.serialization.ItemDeserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'ItemDeserializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Claim',
				'wikibase.datamodel.EntityTerms',
				'wikibase.datamodel.Item',
				'wikibase.datamodel.MultiTerm',
				'wikibase.datamodel.MultiTermMap',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.datamodel.SiteLink',
				'wikibase.datamodel.SiteLinkSet',
				'wikibase.datamodel.Statement',
				'wikibase.datamodel.StatementGroup',
				'wikibase.datamodel.StatementGroupSet',
				'wikibase.datamodel.StatementList',
				'wikibase.datamodel.Term',
				'wikibase.datamodel.TermMap',
				'wikibase.serialization.ItemDeserializer',
			),
		),

		'wikibase.serialization.MultiTermMapDeserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'MultiTermMapDeserializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.MultiTerm',
				'wikibase.datamodel.MultiTermMap',
				'wikibase.serialization.MultiTermMapDeserializer',
			),
		),

		'wikibase.serialization.MultiTermDeserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'MultiTermDeserializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.MultiTerm',
				'wikibase.serialization.MultiTermDeserializer',
			),
		),

		'wikibase.serialization.PropertyDeserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'PropertyDeserializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Claim',
				'wikibase.datamodel.EntityTerms',
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
				'wikibase.serialization.PropertyDeserializer',
			),
		),

		'wikibase.serialization.ReferenceListDeserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'ReferenceListDeserializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Reference',
				'wikibase.datamodel.ReferenceList',
				'wikibase.serialization.ReferenceListDeserializer',
			),
		),

		'wikibase.serialization.ReferenceDeserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'ReferenceDeserializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel',
				'wikibase.serialization.ReferenceDeserializer',
			),
		),

		'wikibase.serialization.SiteLinkSetDeserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'SiteLinkSetDeserializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.SiteLink',
				'wikibase.datamodel.SiteLinkSet',
				'wikibase.serialization.SiteLinkSetDeserializer',
			),
		),

		'wikibase.serialization.SiteLinkDeserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'SiteLinkDeserializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel',
				'wikibase.serialization.SiteLinkDeserializer',
			),
		),

		'wikibase.serialization.SnakListDeserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'SnakListDeserializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel',
				'wikibase.serialization.SnakListDeserializer',
			),
		),

		'wikibase.serialization.SnakDeserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'SnakDeserializer.tests.js',
			),
			'dependencies' => array(
				'dataValues.values',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.datamodel.PropertySomeValueSnak',
				'wikibase.datamodel.PropertyValueSnak',
				'wikibase.serialization.SnakDeserializer',
			),
		),

		'wikibase.serialization.StatementGroupSetDeserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'StatementGroupSetDeserializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Claim',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.datamodel.Statement',
				'wikibase.datamodel.StatementGroup',
				'wikibase.datamodel.StatementGroupSet',
				'wikibase.datamodel.StatementList',
				'wikibase.serialization.StatementGroupSetDeserializer',
			),
		),

		'wikibase.serialization.StatementGroupDeserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'StatementGroupDeserializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Claim',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.datamodel.Statement',
				'wikibase.datamodel.StatementGroup',
				'wikibase.datamodel.StatementList',
				'wikibase.serialization.StatementGroupDeserializer',
			),
		),

		'wikibase.serialization.StatementListDeserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'StatementListDeserializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Claim',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.datamodel.Statement',
				'wikibase.datamodel.StatementList',
				'wikibase.serialization.StatementListDeserializer',
			),
		),

		'wikibase.serialization.StatementDeserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'StatementDeserializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Claim',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.datamodel.Reference',
				'wikibase.datamodel.ReferenceList',
				'wikibase.datamodel.SnakList',
				'wikibase.datamodel.Statement',
				'wikibase.serialization.StatementDeserializer',
			),
		),

		'wikibase.serialization.TermDeserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'TermDeserializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Term',
				'wikibase.serialization.TermDeserializer',
			),
		),

		'wikibase.serialization.TermMapDeserializer.tests' => $moduleTemplate + array(
			'scripts' => array(
				'TermMapDeserializer.tests.js',
			),
			'dependencies' => array(
				'wikibase.datamodel.Term',
				'wikibase.datamodel.TermMap',
				'wikibase.serialization.TermMapDeserializer',
			),
		),

	);

	return $modules;
} );
