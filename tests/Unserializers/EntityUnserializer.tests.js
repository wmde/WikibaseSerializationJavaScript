/**
 * @licence GNU GPL v2+
 * @author H. Snater < mediawiki@snater.com >
 */
( function( $, wb, QUnit ) {
'use strict';

QUnit.module( 'wikibase.serialization.EntityUnserializer' );

var defaults = [
	{
		fingerprint: {
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
	}, {
		fingerprint: new wb.datamodel.Fingerprint(
			new wb.datamodel.TermSet( [new wb.datamodel.Term( 'en', 'label' )] ),
			new wb.datamodel.TermSet( [new wb.datamodel.Term( 'en', 'description' )] ),
			new wb.datamodel.MultiTermSet( [new wb.datamodel.MultiTerm( 'en', ['alias'] )] )
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
	}
];

var testCases = [
	[
		$.extend( true, {}, defaults[0].fingerprint, {
			id: 'P1',
			type: 'property',
			datatype: 'string',
			claims: defaults[0].statementGroupSet
		} ),
		new wb.datamodel.Property(
			'P1',
			'string',
			defaults[1].fingerprint,
			defaults[1].statementGroupSet
		)
	], [
		$.extend( true, {}, defaults[0].fingerprint, {
			id: 'Q1',
			type: 'item',
			claims: defaults[0].statementGroupSet,
			sitelinks: {
				someSite: {
					site: 'someSite',
					title: 'page',
					badges: []
				}
			}
		} ),
		new wb.datamodel.Item(
			'Q1',
			defaults[1].fingerprint,
			defaults[1].statementGroupSet,
			new wb.datamodel.SiteLinkSet( [new wb.datamodel.SiteLink( 'someSite', 'page' )] )
		)
	]
];

QUnit.test( 'unserialize()', function( assert ) {
	var entityUnserializer = new wb.serialization.EntityUnserializer();

	for( var i = 0; i < testCases.length; i++ ) {
		assert.ok(
			entityUnserializer.unserialize( testCases[i][0] ).equals( testCases[i][1] ),
			'Test set #' + i + ': Unserializing successful.'
		);
	}
} );

}( jQuery, wikibase, QUnit ) );
