( function( wb, util ) {
	'use strict';

var MODULE = wb.serialization,
	PARENT = MODULE.Deserializer;

/**
 * @class wikibase.serialization.EntityTermsDeserializer
 * @extends wikibase.serialization.Deserializer
 * @since 2.0
 * @licence GNU GPL v2+
 * @author H. Snater < mediawiki@snater.com >
 *
 * @constructor
 */
MODULE.EntityTermsDeserializer = util.inherit( 'WbEntityTermsDeserializer', PARENT, {
	/**
	 * @inheritdoc
	 *
	 * @return {wikibase.datamodel.EntityTerms}
	 */
	deserialize: function( serialization ) {
		var termMapDeserializer = new MODULE.TermMapDeserializer(),
			multiTermMapDeserializer = new MODULE.MultiTermMapDeserializer();

		return new wb.datamodel.EntityTerms(
			termMapDeserializer.deserialize( serialization.labels ),
			termMapDeserializer.deserialize( serialization.descriptions ),
			multiTermMapDeserializer.deserialize( serialization.aliases )
		);
	}
} );

}( wikibase, util ) );
