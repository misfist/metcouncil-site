/**
 * BLOCK: gutenberg
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

import classnames from 'classnames';

//  Import CSS.
import './style.scss';
import './editor.scss';

const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks
const { Fragment } = wp.element;
const {
    AlignmentToolbar,
    BlockAlignmentToolbar,
    BlockControls,
	RichText, 
    MediaUpload,
    MediaPlaceholder,
    URLInput,
	InspectorControls,
	MediaUploadCheck,
	PanelColorSettings,
	getColorClassName,
	withColors,
} = wp.editor;
const {
	Button,
	TextControl,
	TextareaControl,
    IconButton,
    Dashicon,
    PanelBody,
	RangeControl,
	Toolbar,
} = wp.components;

const blockAttributes = {
    title: {
        type: 'string',
        source: 'html',
        selector: '.hero-title'
    },
    subtitle: {
        type: 'string',
        source: 'html',
        selector: '.hero-subtitle'
    },
    content: {
        type: 'array',
        source: 'children',
        selector: '.hero-content'
    },
    imgURL: {
        type: 'string',
    },
    imgID: {
        type: 'number',
    },
    linkText: {
        type: 'string',
        source: 'text',
        selector: 'a',
    },
    url: {
        type: 'string',
        source: 'attribute',
        attribute: 'href',
        selector: 'a',
    },
    blockAlignment: {
        type: 'string',
    },
    overlayColor: {
        type: 'string',
    },
    dimRatio: {
		type: 'number',
		default: 50,
	},
};

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
registerBlockType( 'corefunctionality/hero-element', {
	title: __( 'Hero Block', 'core-functionality' ),
    icon: {
		background: "#0092d9",
		foreground: '#fff',
		src: 'format-image',
	},
    category: 'content',
    align: true,
	keywords: [
		__( 'hero image content' ),
	],
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
        const { attributes: { title, subtitle, content, linkText, url, imgID, imgURL, blockAlignment, overlayColor, dimRatio }, className, setAttributes, setOverlayColor, isSelected } = props;
                
        const overlayColorClass = getColorClassName( 'background-color', overlayColor );
        const style = backgroundImageStyles( imgURL );

        const classes = classnames(
            className,
            dimRatioToClass( dimRatio ),
            overlayColorClass,
            {
                'has-background-dim': dimRatio !== 0,
                [ `has-${ blockAlignment }-content` ]: blockAlignment !== 'center',
            }
        );

        let blockControls = 
            <BlockControls>
                <AlignmentToolbar
                    value={ blockAlignment }
                    onChange={ value => setAttributes( { blockAlignment: value } ) }
                />
                <MediaUploadCheck>
                    <Toolbar>
                        <MediaUpload
                            onSelect={ media => { setAttributes( { imgURL: media.url, imgID: media.id } ) } }
                            allowedTypes={ [ 'image' ] }
                            value={ imgID }
                            render={ ( { open } ) => (
                                <IconButton
                                    className="components-toolbar__control"
                                    label={ __( 'Edit Media', 'core-functionality' ) }
                                    icon="edit"
                                    onClick={ open }
                                />
                            ) }
                        />
                    </Toolbar>
                </MediaUploadCheck>
            </BlockControls>;

        let inspectorControls = 
            <InspectorControls>
                <PanelBody title={ __( 'Hero Settings', 'core-functinality' ) }>
                    <PanelColorSettings
                        title={ __( 'Overlay', 'core-functionality' ) }
                        initialOpen={ true }
                        colorSettings={ [ {
                            value: overlayColor,
                            onChange: value => {
                                setAttributes( { overlayColor: value } );
                            },
                            label: __( 'Overlay Color', 'core-functionality' ),
                        } ] }
                    >
                        <RangeControl
                            label={ __( 'Background Opacity', 'core-functionality' ) }
                            value={ dimRatio }
                            onChange={ value => {
                                setAttributes( { dimRatio: value } )
                            } }
                            min={ 0 }
                            max={ 100 }
                            step={ 10 }
                        />
                    </PanelColorSettings>
                </PanelBody>
            </InspectorControls>;

        let button;
        
        if( isSelected ) {
            button = 
            <TextControl
                id="button-text"
                label={ ( linkText ) ? linkText : __( 'Button Text', 'core-functionality' ) }
                value={ linkText }
                className={ 'wp-block-button__link btn btn-danger' }
                onChange={ ( value ) => setAttributes( { linkText: value } ) }
            />;
        }
        else {
            button = <a className={'wp-block-button__link btn btn-danger'} href={url}>{ ( linkText ) ? linkText : __( 'Button Text', 'core-functionality' ) }</a>;
        }

		return (
			<div className={ classes } style={ style }>

                { blockControls }
                
                { inspectorControls }

                <div className="hero-body container">
                
                    <RichText
                        tagName="h3"
                        className={ 'hero-subtitle' }
                        placeholder={ __( 'Enter Subtitle' ) }
                        value={ subtitle }
                        onChange={ value => setAttributes( { subtitle: value } ) }
                    />
                    <RichText
                        tagName="h2"
                        className={ 'hero-title' }
                        placeholder = { __( 'Enter Heading' ) }
                        value={ title }
                        onChange={ value => setAttributes( { title: value } ) }
                    />
                    <RichText
                        tagName="div"
                        multiline="p"
                        placeholder={ __( 'Enter Content', 'core-functionality' ) }
                        className={ 'hero-content' }
                        value={ content }
                        onChange={ ( value ) => setAttributes( { content: value } ) }
                    />

                    { isSelected && (
                        <form
                            className="block-library-button__inline-link"
                            onSubmit={ ( event ) => event.preventDefault() }>
                            <Dashicon icon="admin-links" />
                            <URLInput
                                value={ url }
                                onChange={ ( value ) => setAttributes( { url: value } ) }
                            />
                            <IconButton 
                                icon="editor-break" 
                                label={ __( 'Apply', 'core-functionality' ) } 
                                type="submit" 
                                />
                        </form>
                    ) }

                    { button }

                    { isSelected && (
                        <MediaPlaceholder
                            onSelect={ media => { setAttributes( { imgURL: media.url, imgID: media.id } ) } }
                            allowedTypes = { [ 'image' ] }
                            multiple = { false }
                            labels = { { title: 'The Image' } }
                            value={ imgURL }
                        />
                    ) }

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
		const { attributes: { title, subtitle, content, linkText, url, imgID, imgURL, blockAlignment, overlayColor, dimRatio }, className } = props;
        
        const overlayColorClass = getColorClassName( 'background-color', overlayColor );
        const style = backgroundImageStyles( imgURL );

        const classes = classnames(
            className,
            dimRatioToClass( dimRatio ),
            overlayColorClass,
            {
                'has-background-dim': dimRatio !== 0,
                [ `has-${ blockAlignment }-content` ]: blockAlignment !== 'center',
            }
        );

        return (
			<section className={ classes } style={ style } >
                <div className="hero-body container">
                    <RichText.Content
                        tagName="h3"
                        className={ 'hero-subtitle' }
                        value={ subtitle }
                    />
                    <RichText.Content
                        tagName="h2"
                        className={ 'hero-title' }
                        value={ title }
                    />
                    <div className="hero-content-wrap">
                        <RichText.Content
                            tagName="div"
                            className={ 'hero-content' }
                            value={ content }
                        />
                        { url && (
                            <a href={ url } className="btn btn-danger">{ linkText }</a>
                        ) }
                    </div>
                </div>
			</section>
		);
	},

} );

function dimRatioToClass( ratio ) {
	return ( ratio === 0 || ratio === 50 ) ?
		null :
		'has-background-dim-' + ( 10 * Math.round( ratio / 10 ) );
}

/**
 * Function to get  background image
 */
function backgroundImageStyles( url ) {
	return url ?
		{ backgroundImage: `url(${ url })` } :
		{};
}