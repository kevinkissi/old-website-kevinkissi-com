/**
 * plugin.js
 *
 * Released under LGPL License.
 * Copyright (c) 1999-2015 Ephox Corp. All rights reserved
 *
 * License: http://www.tinymce.com/license
 * Contributing: http://www.tinymce.com/contributing
 */

/*jshint unused:false */
/*global tinymce:true */

/**
 * Codespice plugin that adds a toolbar button and menu item.
 */
tinymce.PluginManager.add('codespice', function(editor) {
	function showDialog() {
		var selectedNode = editor.selection.getNode(), name = '';
		var isAnchor = selectedNode.tagName == 'A' && editor.dom.getAttrib(selectedNode, 'href') === '';

		if (isAnchor) {
			name = selectedNode.name || selectedNode.id || '';
		}

		editor.windowManager.open({
			title: 'codespice',
			body:
//            {
//                type: 'textbox',
//                name: 'name',
//                size: 40,
//                label: 'Name',
//                value: name
//            },
             [
					{
						type: 'listbox',
						name: 'languagesName',
//                         name: 'language',
						label: 'Language',
						'values': [
							{text: 'Markup (HTML)', value: 'markup'},
							{text: 'CSS', value: 'css'},
							{text: 'Javascript', value: 'javascript'},
							{text: 'PHP', value: 'php'},
							{text: 'SCSS', value: 'scss'},
							{text: 'Bash', value: 'bash'},
							{text: 'C', value: 'c'},
							{text: 'C++', value: 'cpp'},
							{text: 'Python', value: 'python'},
							{text: 'SQL', value: 'sql'},
							{text: 'Ruby', value: 'ruby'},
							{text: 'C#', value: 'csharp'},
							{text: 'Swift', value: 'swift'},
						]
					}, 
                        {
                            type: 'textbox',
                            name: 'lineNumStart',
                            label: 'Start Line Number From:'
                        },
					 {
                            type: 'textbox',
                            name: 'highLight',
                            label: 'Lines to Highlight:'
                        },
                        {
						type: 'textbox',
						name: 'codeInput',
						label: 'Code Input',
						value: '',
						multiline: true,
						minWidth: 700,
						minHeight: 350,
//                            onclick: function (e) {
//                                jQuery(e.target).css('border', '13px solid #000');
//                            }
					},
//		
					],
			onsubmit: function(e) {
				var id = e.data.codeInput;

				if (isAnchor) {
					selectedNode.id = id;
				} else {
					editor.selection.collapse(true);
					editor.execCommand('mceInsertContent', false, editor.dom.createHTML('a', {
						id: id
					}));
				}
			}
		});
	}

	editor.addCommand('mceAnchor', showDialog);

	editor.addButton('codespice', {
		text: 'codespice',
		tooltip: 'Anchor',
		onclick: showDialog,
		stateSelector: 'a:not([href])'
	});

	editor.addMenuItem('codespice', {
//		icon: 'codespice',
		text: 'Anchor',
		context: 'insert',
		onclick: showDialog
	});
});