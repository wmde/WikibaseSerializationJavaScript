( function( wb, util, $ ) {
	'use strict';

var MODULE = wb.serialization,
	PARENT = MODULE.Serializer;

/**
 * @class wikibase.serialization.PropertySerializer
 * @extends wikibase.serialization.Serializer
 * @since 2.0
 * @licence GNU GPL v2+
 * @author H. Snater < mediawiki@snater.com >
 *
 * @constructor
 */
MODULE.PropertySerializer = util.inherit( 'WbPropertySerializer', PARENT, {
	/**
	 * @inheritdoc
	 *
	 * @param {wikibase.datamodel.Property} property
	 * @return {Object}
	 *
	 * @throws {Error} if property is not a Property instance.
	 */
	serialize: function( property ) {
		if( !( property instanceof wb.datamodel.Property ) ) {
			throw new Error( 'Not an instance of wikibase.datamodel.Property' );
		}

		var entityTermsSerializer = new MODULE.EntityTermsSerializer(),
			statementGroupSetSerializer = new MODULE.StatementGroupSetSerializer();

		return $.extend( true,
			{
				type: property.getType(),
				id: property.getId(),
				claims: statementGroupSetSerializer.serialize( property.getStatements() ),
				datatype: property.getDataTypeId()
			},
			entityTermsSerializer.serialize( property.getEntityTerms() )
		);
	}
} );

}( wikibase, util, jQuery ) );
