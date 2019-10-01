( function( wb, util ) {
	'use strict';

var MODULE = wb.serialization,
	PARENT = MODULE.Serializer,
	datamodel = require( 'wikibase.datamodel' );

/**
 * @class wikibase.serialization.ReferenceListSerializer
 * @extends wikibase.serialization.Serializer
 * @since 2.0
 * @license GPL-2.0+
 * @author H. Snater < mediawiki@snater.com >
 *
 * @constructor
 */
MODULE.ReferenceListSerializer = util.inherit( 'WbReferenceLisSerializer', PARENT, {
	/**
	 * @inheritdoc
	 *
	 * @param {datamodel.ReferenceList} referenceList
	 * @return {Object[]}
	 *
	 * @throws {Error} if referenceList is not a ReferenceList instance.
	 */
	serialize: function( referenceList ) {
		if( !( referenceList instanceof datamodel.ReferenceList ) ) {
			throw new Error( 'Not an instance of datamodel.ReferenceList' );
		}

		var serialization = [],
			referenceSerializer = new MODULE.ReferenceSerializer(),
			references = referenceList.toArray();

		for( var i = 0; i < references.length; i++ ) {
			serialization.push( referenceSerializer.serialize( references[i] ) );
		}

		return serialization;
	}
} );

module.exports = MODULE.ReferenceListSerializer;
}( wikibase, util ) );
