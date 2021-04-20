/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
config.toolbar = 'Full';
 
config.toolbar_Full =
[
    ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
    ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
    ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
    ['Link','Unlink','Anchor','Source'],
    ['Image','Table','HorizontalRule','SpecialChar'],
    ['Format','FontSize','TextColor','BGColor']
];
 
config.toolbar_Basic =
[
    ['Bold','Italic','Underline','Strike','TextColor','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','Source']
];

};
