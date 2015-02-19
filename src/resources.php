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

		'wikibase.serialization' => $moduleTemplate + array(
			'dependencies' => array(
				'wikibase.serialization.__namespace',
				'wikibase.serialization.DeserializerFactory',
				'wikibase.serialization.SerializerFactory',
			),
		),

		'wikibase.serialization.__namespace' => $moduleTemplate + array(
			'scripts' => array(
				'__namespace.js',
			),
			'dependencies' => array(
				'wikibase',
			),
		),

		'wikibase.serialization.DeserializerFactory' => $moduleTemplate + array(
			'scripts' => array(
				'DeserializerFactory.js',
			),
			'dependencies' => array(
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Deserializer',
				'wikibase.serialization.StrategyProvider',

				'wikibase.serialization.ClaimDeserializer',
				'wikibase.serialization.ClaimGroupDeserializer',
				'wikibase.serialization.ClaimGroupSetDeserializer',
				'wikibase.serialization.ClaimListDeserializer',
				'wikibase.serialization.EntityDeserializer',
				'wikibase.serialization.EntityTermsDeserializer',
				'wikibase.serialization.MultiTermDeserializer',
				'wikibase.serialization.MultiTermMapDeserializer',
				'wikibase.serialization.ReferenceDeserializer',
				'wikibase.serialization.ReferenceListDeserializer',
				'wikibase.serialization.SiteLinkDeserializer',
				'wikibase.serialization.SiteLinkSetDeserializer',
				'wikibase.serialization.SnakDeserializer',
				'wikibase.serialization.SnakListDeserializer',
				'wikibase.serialization.StatementDeserializer',
				'wikibase.serialization.StatementGroupDeserializer',
				'wikibase.serialization.StatementGroupSetDeserializer',
				'wikibase.serialization.StatementListDeserializer',
				'wikibase.serialization.TermDeserializer',
				'wikibase.serialization.TermMapDeserializer',
			),
		),

		'wikibase.serialization.SerializerFactory' => $moduleTemplate + array(
			'scripts' => array(
				'SerializerFactory.js',
			),
			'dependencies' => array(
				'wikibase.serialization.__namespace',
				'wikibase.serialization.Serializer',
				'wikibase.serialization.StrategyProvider',

				'wikibase.serialization.ClaimGroupSerializer',
				'wikibase.serialization.ClaimGroupSetSerializer',
				'wikibase.serialization.ClaimListSerializer',
				'wikibase.serialization.ClaimSerializer',
				'wikibase.serialization.EntitySerializer',
				'wikibase.serialization.EntityTermsSerializer',
				'wikibase.serialization.MultiTermMapSerializer',
				'wikibase.serialization.MultiTermSerializer',
				'wikibase.serialization.ReferenceListSerializer',
				'wikibase.serialization.ReferenceSerializer',
				'wikibase.serialization.SiteLinkSerializer',
				'wikibase.serialization.SiteLinkSetSerializer',
				'wikibase.serialization.SnakListSerializer',
				'wikibase.serialization.SnakSerializer',
				'wikibase.serialization.StatementGroupSerializer',
				'wikibase.serialization.StatementGroupSetSerializer',
				'wikibase.serialization.StatementListSerializer',
				'wikibase.serialization.StatementSerializer',
				'wikibase.serialization.TermMapSerializer',
				'wikibase.serialization.TermSerializer',
			),
		),

		'wikibase.serialization.StrategyProvider' => $moduleTemplate + array(
			'scripts' => array(
				'StrategyProvider.js',
			),
			'dependencies' => array(
				'wikibase.serialization.__namespace',
			),
		),

	);

	return array_merge(
		$modules,
		include( __DIR__ . '/Serializers/resources.php' ),
		include( __DIR__ . '/Deserializers/resources.php' )
	);
} );
