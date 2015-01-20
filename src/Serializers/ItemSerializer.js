( function( wb, util, $ ) {
	'use strict';

var MODULE = wb.serialization,
	PARENT = MODULE.Serializer;

/**
 * @class wikibase.serialization.ItemSerializer
 * @extends wikibase.serialization.Serializer
 * @since 2.0
 * @licence GNU GPL v2+
 * @author H. Snater < mediawiki@snater.com >
 *
 * @constructor
 */
MODULE.ItemSerializer = util.inherit( 'WbItemSerializer', PARENT, {
	/**
	 * @inheritdoc
	 *
	 * @param {wikibase.datamodel.Item} item
	 * @return {Object}
	 *
	 * @throws {Error} if item is not an Item instance.
	 */
	serialize: function( item ) {
		if( !( item instanceof wb.datamodel.Item ) ) {
			throw new Error( 'Not an instance of wikibase.datamodel.Item' );
		}

		var entityTermsSerializer = new MODULE.EntityTermsSerializer(),
			statementGroupSetSerializer = new MODULE.StatementGroupSetSerializer(),
			siteLinkSetSerializer = new MODULE.SiteLinkSetSerializer();

		return $.extend( true,
			{
				type: item.getType(),
				id: item.getId(),
				claims: statementGroupSetSerializer.serialize( item.getStatements() ),
				sitelinks: siteLinkSetSerializer.serialize( item.getSiteLinks() )
			},
			entityTermsSerializer.serialize( item.getEntityTerms() )
		);
	}
} );

}( wikibase, util, jQuery ) );
