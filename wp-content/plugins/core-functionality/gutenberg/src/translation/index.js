/**
 * BLOCK: gutenberg
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import './style.scss';
import './editor.scss';

/**
 * Internal block libraries
 */
const { __ } = wp.i18n;
const { Fragment } = wp.element;
const { registerBlockType } = wp.blocks;
const { InspectorControls } = wp.editor;
const { TextControl, PanelBody } = wp.components;

/**
 * Register: aa Gutenberg Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made editor as an option to any
 * editor interface where blocks are implemented.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */
registerBlockType( 'corefunctionality/translation-title', {
	title: __( 'Translation Title', 'core-functionality' ),
	icon: {
		background: "#0092d9",
		foreground: '#fff',
		src: 'translation'
	},
	category: 'content',
	keywords: [
		__( 'translation title' ),
		__( 'custom field' ),
	],
	attributes: {
		text: {
			type: 'string',
			source: 'meta',
			meta: 'translated_title'
		}
	},

	/**
	 * The edit function describes the structure of your block in the context of the editor.
	 * This represents what the editor will render when the block is used.
	 *
	 * The "edit" property must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 */
	edit: props => {
		const { attributes: { text }, className, setAttributes, isSelected } = props;
		return (
			<TextControl
				label={ __( 'Translation Title', 'core-functionality' ) }
				value={ text }
				description={ __( 'If this post is a translation, please enter the non-English title.', 'core-functionality' ) }
				onChange={ text => setAttributes( { text } ) }
			/>
		);
	},

	/**
	 * The save function defines the way in which the different attributes should be combined
	 * into the final markup, which is then serialized by Gutenberg into post_content.
	 *
	 * The "save" property must be specified and must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 */
	save: props => {
		return null;
	},
} );
