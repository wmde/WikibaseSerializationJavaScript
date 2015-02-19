/**
 * @licence GNU GPL v2+
 * @author H. Snater < mediawiki@snater.com >
 */
( function( $, wb, QUnit ) {
'use strict';

QUnit.module( 'wikibase.serialization.EntitySerializer' );

/**
 * @extends wikibase.serialization.Serializer
 *
 * @constructor
 */
var MockEntitySerializer = util.inherit(
	'WbMockEntitySerializer',
	wb.serialization.Serializer,
{
	/**
	 * @inheritdoc
	 *
	 * @param {MockEntity} mockEntity
	 * @return {Object}
	 */
	serialize: function( mockEntity ) {
		if( !( mockEntity instanceof wb.serialization.tests.MockEntity ) ) {
			throw new Error( 'Not an instance of wikibase.datamodel.MockEntity' );
		}

		var entityTermsSerializer = new wb.serialization.EntityTermsSerializer();

		return $.extend( true, {
			id: mockEntity.getId(),
			type: 'mock'
		}, entityTermsSerializer.serialize( mockEntity.getEntityTerms() ) );
	}
} );

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
	], [
		new wb.datamodel.Item(
			'Q1',
			defaults[0].entityTerms,
			defaults[0].statementGroupSet,
			new wb.datamodel.SiteLinkSet( [new wb.datamodel.SiteLink( 'someSite', 'page' )] )
		),
		$.extend( true, {}, defaults[1].entityTerms, {
			id: 'Q1',
			type: 'item',
			claims: defaults[1].statementGroupSet,
			sitelinks: {
				someSite: {
					site: 'someSite',
					title: 'page',
					badges: []
				}
			}
		} )
	]
];

QUnit.test( 'serialize()', function( assert ) {
	var entitySerializer = new wb.serialization.EntitySerializer();

	for( var i = 0; i < testSets.length; i++ ) {
		assert.deepEqual(
			entitySerializer.serialize( testSets[i][0] ),
			testSets[i][1],
			'Test set #' + i + ': Serializing successful.'
		);
	}
} );

QUnit.test( 'registerStrategy()', function( assert ) {
	var entitySerializer = new wb.serialization.EntitySerializer(),
		mockEntity = new wb.serialization.tests.MockEntity( 'i am an id', defaults[0].entityTerms );

	assert.throws(
		function() {
			entitySerializer.serialize( mockEntity );
		},
		'Throwing an error when trying to serialize an Entity no Serializer is registered for.'
	);

	entitySerializer.registerStrategy(
		new MockEntitySerializer(),
		wb.serialization.tests.MockEntity.TYPE
	);

	assert.deepEqual(
		entitySerializer.serialize( mockEntity ),
		( new MockEntitySerializer() ).serialize( mockEntity ),
		'Serialized Entity after registering a proper Serializer.'
	);
} );

}( jQuery, wikibase, QUnit ) );
