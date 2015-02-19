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

		'wikibase.serialization.ClaimGroupSetDeserializer' => $moduleTemplate + array(
			'scripts' => array(
				'ClaimGroupSetDeserializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.ClaimGroupSet',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.ClaimGroupDeserializer',
				'wikibase.serialization.Deserializer',
			),
		),

		'wikibase.serialization.ClaimGroupDeserializer' => $moduleTemplate + array(
			'scripts' => array(
				'ClaimGroupDeserializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.ClaimGroup',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.ClaimListDeserializer',
				'wikibase.serialization.Deserializer',
			),
		),

		'wikibase.serialization.ClaimListDeserializer' => $moduleTemplate + array(
			'scripts' => array(
				'ClaimListDeserializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.ClaimList',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Deserializer',
				'wikibase.serialization.StatementDeserializer',
			),
		),

		'wikibase.serialization.ClaimDeserializer' => $moduleTemplate + array(
			'scripts' => array(
				'ClaimDeserializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.Claim',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Deserializer',
				'wikibase.serialization.SnakListDeserializer',
				'wikibase.serialization.SnakDeserializer',
			),
		),

		'wikibase.serialization.Deserializer' => $moduleTemplate + array(
			'scripts' => array(
				'Deserializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.serialization.__namespace',
			),
		),

		'wikibase.serialization.EntityDeserializer' => $moduleTemplate + array(
			'scripts' => array(
				'EntityDeserializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.Item',
				'wikibase.datamodel.Property',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Deserializer',
				'wikibase.serialization.ItemDeserializer',
				'wikibase.serialization.PropertyDeserializer',
				'wikibase.serialization.StrategyProvider',
			),
		),

		'wikibase.serialization.EntityTermsDeserializer' => $moduleTemplate + array(
			'scripts' => array(
				'EntityTermsDeserializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.EntityTerms',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Deserializer',
				'wikibase.serialization.MultiTermMapDeserializer',
				'wikibase.serialization.TermMapDeserializer',
			),
		),

		'wikibase.serialization.ItemDeserializer' => $moduleTemplate + array(
			'scripts' => array(
				'ItemDeserializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.Item',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Deserializer',
				'wikibase.serialization.EntityTermsDeserializer',
				'wikibase.serialization.SiteLinkSetDeserializer',
				'wikibase.serialization.StatementGroupSetDeserializer',
			),
		),

		'wikibase.serialization.MultiTermDeserializer' => $moduleTemplate + array(
			'scripts' => array(
				'MultiTermDeserializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.MultiTerm',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Deserializer',
			),
		),

		'wikibase.serialization.MultiTermMapDeserializer' => $moduleTemplate + array(
			'scripts' => array(
				'MultiTermMapDeserializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.MultiTermMap',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Deserializer',
				'wikibase.serialization.MultiTermDeserializer',
			),
		),

		'wikibase.serialization.PropertyDeserializer' => $moduleTemplate + array(
			'scripts' => array(
				'PropertyDeserializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.Property',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Deserializer',
				'wikibase.serialization.EntityTermsDeserializer',
				'wikibase.serialization.StatementGroupSetDeserializer',
			),
		),

		'wikibase.serialization.ReferenceListDeserializer' => $moduleTemplate + array(
			'scripts' => array(
				'ReferenceListDeserializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.ReferenceList',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Deserializer',
				'wikibase.serialization.ReferenceDeserializer',
			),
		),

		'wikibase.serialization.ReferenceDeserializer' => $moduleTemplate + array(
			'scripts' => array(
				'ReferenceDeserializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.Reference',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Deserializer',
				'wikibase.serialization.SnakListDeserializer',
			),
		),

		'wikibase.serialization.SiteLinkSetDeserializer' => $moduleTemplate + array(
			'scripts' => array(
				'SiteLinkSetDeserializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.SiteLinkSet',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Deserializer',
				'wikibase.serialization.SiteLinkDeserializer',
			),
		),

		'wikibase.serialization.SiteLinkDeserializer' => $moduleTemplate + array(
			'scripts' => array(
				'SiteLinkDeserializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.SiteLink',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Deserializer',
			),
		),

		'wikibase.serialization.SnakListDeserializer' => $moduleTemplate + array(
			'scripts' => array(
				'SnakListDeserializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.SnakList',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Deserializer',
				'wikibase.serialization.SnakDeserializer',
			),
		),

		'wikibase.serialization.SnakDeserializer' => $moduleTemplate + array(
			'scripts' => array(
				'SnakDeserializer.js',
			),
			'dependencies' => array(
				'dataValues',
				'dataValues.values',
				'util.inherit',
				'wikibase.datamodel.PropertyNoValueSnak',
				'wikibase.datamodel.PropertySomeValueSnak',
				'wikibase.datamodel.PropertyValueSnak',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Deserializer',
			),
		),

		'wikibase.serialization.StatementGroupSetDeserializer' => $moduleTemplate + array(
			'scripts' => array(
				'StatementGroupSetDeserializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.StatementGroupSet',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Deserializer',
				'wikibase.serialization.StatementGroupDeserializer',
			),
		),

		'wikibase.serialization.StatementGroupDeserializer' => $moduleTemplate + array(
			'scripts' => array(
				'StatementGroupDeserializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.StatementGroup',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Deserializer',
				'wikibase.serialization.StatementListDeserializer',
			),
		),

		'wikibase.serialization.StatementListDeserializer' => $moduleTemplate + array(
			'scripts' => array(
				'StatementListDeserializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.StatementList',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Deserializer',
				'wikibase.serialization.StatementDeserializer',
			),
		),

		'wikibase.serialization.StatementDeserializer' => $moduleTemplate + array(
			'scripts' => array(
				'StatementDeserializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.Statement',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.ClaimDeserializer',
				'wikibase.serialization.Deserializer',
				'wikibase.serialization.ReferenceListDeserializer',
			),
		),

		'wikibase.serialization.TermDeserializer' => $moduleTemplate + array(
			'scripts' => array(
				'TermDeserializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.Term',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Deserializer',
			),
		),

		'wikibase.serialization.TermMapDeserializer' => $moduleTemplate + array(
			'scripts' => array(
				'TermMapDeserializer.js',
			),
			'dependencies' => array(
				'util.inherit',
				'wikibase.datamodel.TermMap',
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Deserializer',
				'wikibase.serialization.TermDeserializer',
			),
		),

	);

	return $modules;
} );
