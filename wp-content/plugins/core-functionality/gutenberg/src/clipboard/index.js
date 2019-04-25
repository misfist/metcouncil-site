/**
 * BLOCK: clipboard
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import './style.scss';
import './editor.scss';

const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks
const { Component } = wp.element;
const { RichText, InnerBlocks } = wp.editor;

const copyButton = 
	<button
		className="clipboard-link"
		data-target="block-content"
		data-clipboard-target="block-content"
	>
		{ __( 'Copy text', 'core-functionality' ) }
	</button>;

/**
 * Register: Gutenberg Block.
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

/**
 * Summary Block
 */
registerBlockType( 'corefunctionality/clipboard', {
	title: __( 'Clipboard Block', 'core-functionality' ),
	icon: {
		background: "#0092d9",
		foreground: '#fff',
		src: 'editor-paste-text',
	},
	category: 'content',
	keywords: [
		__( 'clipboard copy paste letter content' ),
	],
	attributes: {},

	/**
	 * The edit function describes the structure of your block in the context of the editor.
	 * This represents what the editor will render when the block is used.
	 *
	 * The "edit" property must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 */
	edit: props => {
		const { attributes: {}, className, setAttributes } = props;

		return (
			<div className={ className }>
				{copyButton}
				<div className="block-content">
					<InnerBlocks />
				</div>
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
				{copyButton}
				<div className="block-content">
					<InnerBlocks.Content />
				</div>
			</div>
		);
	},

} );
