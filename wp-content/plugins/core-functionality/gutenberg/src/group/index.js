/**
 * BLOCK: group block
 *
 */

//  Import CSS.
import './style.scss';
import './editor.scss';

const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks
const { 
	InnerBlocks
} = wp.editor;

const blockAttributes = {};

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
registerBlockType( 'corefunctionality/group', {
	// Block name.
	title: __( 'Group', 'core-functionality' ), 
	icon: {
		background: "#0092d9",
		foreground: '#fff',
		src: 'layout',
	},
	category: 'content',
	keywords: [
		__( 'section group content', 'core-functionality' ),
	],
	supports: {
		align: [ 'left', 'center', 'right', 'full', 'wide' ],
		alignWide: true
	},
	attributes: blockAttributes,
	
	/**
	 * The edit function describes the structure of your block in the context of the editor.
	 * This represents what the editor will render when the block is used.
	 *
	 * The "edit" property must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 */
	edit: props => {
		const { attributes: {}, className } = props;

		return (
			<div 
				className={className}
			>
				<InnerBlocks />
			</div>
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
		const { attributes: {} } = props;

		return (
			<div>

				<InnerBlocks.Content />

			</div>
		);
	  },
} );
