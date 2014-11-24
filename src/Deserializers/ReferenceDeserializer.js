( function( wb, util ) {
	'use strict';

var MODULE = wb.serialization,
	PARENT = MODULE.Deserializer;

/**
 * @class wikibase.serialization.ReferenceDeserializer
 * @extends wikibase.serialization.Deserializer
 * @since 2.0
 * @licence GNU GPL v2+
 * @author H. Snater < mediawiki@snater.com >
 *
 * @constructor
 */
MODULE.ReferenceDeserializer = util.inherit( 'WbReferenceDeserializer', PARENT, {
	/**
	 * @see wikibase.serialization.Deserializer.deserialize
	 *
	 * @return {wikibase.datamodel.Reference}
	 */
	deserialize: function( serialization ) {
		return new wikibase.datamodel.Reference(
			( new MODULE.SnakListDeserializer() ).deserialize(
				serialization.snaks,
				serialization['snaks-order']
			),
			serialization.hash
		);
	}
} );

}( wikibase, util ) );
