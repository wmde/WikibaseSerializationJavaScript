/**
 * @licence GNU GPL v2+
 * @author H. Snater < mediawiki@snater.com >
 */
( function( wb, util ) {
'use strict';

wb.serialization.tests = wb.serialization.tests || {};

/**
 * @extends wikibase.datamodel.Entity
 *
 * @constructor
 *
 * @param {string} id
 * @param {wikibase.datamodel.EntityTerms} entityTerms
 */
var SELF = wb.serialization.tests.MockEntity = util.inherit(
	'wbMockEntity',
	wb.datamodel.Entity,
	function WbMockEntity( id, entityTerms ) {
		this._id = id;
		this._entityTerms = entityTerms;
	},
{
	/**
	 * @inheritdoc
	 */
	isEmpty: function() {
		return this._entityTerms.isEmpty();
	},

	/**
	 * @inheritdoc
	 */
	equals: function( mock ) {
		return this._id === mock.getId() && this._entityTerms.equals( mock.getEntityTerms() );
	}
} );

SELF.TYPE = 'mock';

}( wikibase, util ) );
