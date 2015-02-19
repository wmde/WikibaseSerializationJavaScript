/**
 * @licence GNU GPL v2+
 * @author H. Snater < mediawiki@snater.com >
 */
( function( wb, QUnit ) {
'use strict';

QUnit.module( 'wikibase.serialization.EntityTermsSerializer' );

var testSets = [
	[
		new wb.datamodel.EntityTerms(),
		{
			labels: {},
			descriptions: {},
			aliases: {}
		}
	], [
		new wb.datamodel.EntityTerms(
			new wb.datamodel.TermMap( { en: new wb.datamodel.Term( 'en', 'label' ) } ),
			new wb.datamodel.TermMap( { en: new wb.datamodel.Term( 'en', 'description' ) } ),
			new wb.datamodel.MultiTermMap( { en: new wb.datamodel.MultiTerm( 'en', ['alias'] ) } )
		),
		{
			labels: { en: { language: 'en', value: 'label' } },
			descriptions: { en: { language: 'en', value: 'description' } },
			aliases: { en: [{ language: 'en', value: 'alias' }] }
		}
	]
];

QUnit.test( 'serialize()', function( assert ) {
	var entityTermsSerializer = new wb.serialization.EntityTermsSerializer();

	for( var i = 0; i < testSets.length; i++ ) {
		assert.deepEqual(
			entityTermsSerializer.serialize( testSets[i][0] ),
			testSets[i][1],
			'Test set #' + i + ': Serializing successful.'
		);
	}
} );

}( wikibase, QUnit ) );
