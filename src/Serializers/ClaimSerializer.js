( function( wb, util ) {
	'use strict';

var MODULE = wb.serialization,
	PARENT = MODULE.Serializer,
	datamodel = require( 'wikibase.datamodel' );

/**
 * @class wikibase.serialization.ClaimSerializer
 * @extends wikibase.serialization.Serializer
 * @since 2.0
 * @license GPL-2.0+
 * @author H. Snater < mediawiki@snater.com >
 *
 * @constructor
 */
MODULE.ClaimSerializer = util.inherit( 'WbClaimSerializer', PARENT, {
	/**
	 * @inheritdoc
	 *
	 * @param {datamodel.Claim} claim
	 * @return {Object}
	 *
	 * @throws {Error} if claim is not a Claim instance.
	 */
	serialize: function( claim ) {
		if( !( claim instanceof datamodel.Claim ) ) {
			throw new Error( 'Not an instance of datamodel.Claim' );
		}

		var snakSerializer = new MODULE.SnakSerializer(),
			snakListSerializer = new MODULE.SnakListSerializer(),
			guid = claim.getGuid(),
			qualifiers = claim.getQualifiers();

		var serialization = {
			type: 'claim',
			mainsnak: snakSerializer.serialize( claim.getMainSnak() )
		};

		if( guid ) {
			serialization.id = guid;
		}

		if( qualifiers.length ) {
			serialization.qualifiers = snakListSerializer.serialize( qualifiers );
			serialization['qualifiers-order'] = qualifiers.getPropertyOrder();
		}

		return serialization;
	}
} );

module.exports = MODULE.ClaimSerializer;
}( wikibase, util ) );
