( function( wb, util ) {
	'use strict';

var MODULE = wb.serialization,
	PARENT = MODULE.Serializer;

/**
 * @class wikibase.serialization.EntityTermsSerializer
 * @extends wikibase.serialization.Serializer
 * @since 2.0
 * @licence GNU GPL v2+
 * @author H. Snater < mediawiki@snater.com >
 *
 * @constructor
 */
MODULE.EntityTermsSerializer = util.inherit( 'WbEntityTermsSerializer', PARENT, {
	/**
	 * @inheritdoc
	 *
	 * @param {wikibase.datamodel.EntityTerms} entityTerms
	 * @return {Object}
	 *
	 * @throws {Error} if `entityTerms` is not a `EntityTerms` instance.
	 */
	serialize: function( entityTerms ) {
		if( !( entityTerms instanceof wb.datamodel.EntityTerms ) ) {
			throw new Error( 'Not an instance of wikibase.datamodel.EntityTerms' );
		}

		var termMapSerializer = new MODULE.TermMapSerializer(),
			multiTermMapSerializer = new MODULE.MultiTermMapSerializer();

		return {
			labels: termMapSerializer.serialize( entityTerms.getLabels() ),
			descriptions: termMapSerializer.serialize( entityTerms.getDescriptions() ),
			aliases: multiTermMapSerializer.serialize( entityTerms.getAliases() )
		};
	}
} );

}( wikibase, util ) );
