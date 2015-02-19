/**
 * @licence GNU GPL v2+
 * @author H. Snater < mediawiki@snater.com >
 */
( function( $, wb, QUnit ) {
'use strict';

QUnit.module( 'wikibase.serialization.EntitySerializer' );

var defaults = [
	{
		entityTerms: new wb.datamodel.EntityTerms(
			new wb.datamodel.TermMap( { en: new wb.datamodel.Term( 'en', 'label' ) } ),
			new wb.datamodel.TermMap( { en: new wb.datamodel.Term( 'en', 'description' ) } ),
			new wb.datamodel.MultiTermMap( { en: new wb.datamodel.MultiTerm( 'en', ['alias'] ) } )
		),
		statementGroupSet: new wb.datamodel.StatementGroupSet( [
			new wb.datamodel.StatementGroup( 'P1', new wb.datamodel.StatementList( [
				new wb.datamodel.Statement(
					new wb.datamodel.Claim(
						new wb.datamodel.PropertyNoValueSnak( 'P1' ), null, 'Q1$1'
					)
				)
			] ) )
		] )
	}, {
		entityTerms: {
			labels: { en: { language: 'en', value: 'label' } },
			descriptions: { en: { language: 'en', value: 'description' } },
			aliases: { en: [{ language: 'en', value: 'alias' }] }
		},
		statementGroupSet: {
			P1: [ {
				id: 'Q1$1',
				mainsnak: {
					snaktype: 'novalue',
					property: 'P1'
				},
				type: 'statement',
				rank: 'normal'
			} ]
		}
	}
];

var testSets = [
	[
		new wb.datamodel.Property(
			'P1',
			'string',
			defaults[0].entityTerms,
			defaults[0].statementGroupSet
		),
		$.extend( true, {}, defaults[1].entityTerms, {
			id: 'P1',
			type: 'property',
			datatype: 'string',
			claims: defaults[1].statementGroupSet
		} )
	]
];

QUnit.test( 'serialize()', function( assert ) {
	var propertySerializer = new wb.serialization.PropertySerializer();

	for( var i = 0; i < testSets.length; i++ ) {
		assert.deepEqual(
			propertySerializer.serialize( testSets[i][0] ),
			testSets[i][1],
			'Test set #' + i + ': Serializing successful.'
		);
	}

	assert.throws(
		function() {
			propertySerializer.serialize(
				new wb.datamodel.Item(
					'Q1',
					defaults[0].entityTerms,
					defaults[0].statementGroupSet
				)
			);
		},
		'Throwing an error when trying to serialize an Entity not of type "property".'
	);
} );

}( jQuery, wikibase, QUnit ) );
