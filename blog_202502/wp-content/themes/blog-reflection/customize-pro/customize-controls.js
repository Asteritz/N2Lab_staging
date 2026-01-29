( function( api ) {
	// Extends our custom "blogreflection" section.
	api.sectionConstructor['blogreflection-upsell'] = api.Section.extend( {
		// No events for this type of section.
		attachEvents: function () {},
		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );
} )( wp.customize );