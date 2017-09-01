module.exports = function ( config ) {
	config.set( {
		frameworks: [ 'qunit' ],

		files: [
			'node_modules/jquery/dist/jquery.js',

			// TODO: install JS dependencies using npm
			'vendor/data-values/javascript/lib/util/util.inherit.js',
			'vendor/data-values/javascript/src/dataValues.js',
			'vendor/data-values/javascript/src/DataValue.js',
			'vendor/data-values/javascript/src/values/StringValue.js',
			'vendor/data-values/javascript/src/values/UnDeserializableValue.js',
			'vendor/wikibase/data-model-javascript/src/__namespace.js',
			'vendor/wikibase/data-model-javascript/src/GroupableCollection.js',
			'vendor/wikibase/data-model-javascript/src/Group.js',
			'vendor/wikibase/data-model-javascript/src/Snak.js',
			'vendor/wikibase/data-model-javascript/src/Set.js',
			'vendor/wikibase/data-model-javascript/src/List.js',
			'vendor/wikibase/data-model-javascript/src/*.js',

			'src/__namespace.js',
			'src/Serializers/Serializer.js',
			'src/Serializers/*.js',
			'src/SerializerFactory.js',
			'src/StrategyProvider.js',
			'src/Deserializers/Deserializer.js',
			'src/Deserializers/*.js',
			'src/DeserializerFactory.js',
			'tests/MockEntity.js',
			'tests/MockEntity.tests.js',
			'tests/StrategyProvider.tests.js',
			'tests/SerializerFactory.tests.js',
			'tests/Serializers/*.js',
			'tests/Deserializers/*.js',
			'tests/DeserializerFactory.tests.js'
		],

		port: 9876,

		logLevel: config.LOG_INFO,
		browsers: [ 'PhantomJS' ]
	} );
};
