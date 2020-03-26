/**
 * BLOCK: gutenberg
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import './style.scss';
import './editor.scss';

const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks
const { RichText } = wp.editor;

/**
 * Register: Gutenberg Blocks.
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
  * Intro Block
  */
 registerBlockType( 'corefunctionality/subhead', {
	title: __( 'Subhead Block', 'core-functionality' ),
	icon: {
		background: "#0092d9",
		foreground: '#fff',
		src: 'admin-comments',
	},
	category: 'content',
	keywords: [
		__( 'subhead subtitle title content' ),
	],
	attributes: {
		content: {
			type: 'array',
			source: 'children',
			selector: '.block-content'
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
		const { attributes: { content }, className, setAttributes } = props;
		const onChangeContent = content => { setAttributes( { content } ) };
		return [
			<div className={ className }>
			<RichText
				tagName="div"
				multiline="p"
				placeholder={ __( 'Add summary content', 'core-functionality' ) }
				className={ 'block-content' }
				value={ content }
				onChange={ onChangeContent }
			/>
			</div>
		];
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
		const { attributes: { content } } = props;
		return (
			<div>
				<div class="block-content">
					{ content }
				</div>
			</div>
		);
	},

} );