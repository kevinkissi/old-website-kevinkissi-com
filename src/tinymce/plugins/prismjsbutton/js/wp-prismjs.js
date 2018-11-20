function htmlEscape(str) {
    return str
//            .replace(/&/g, '&amp;') // Removing )
//            .replace(/"/g, '&quot;') // Removing "
//            .replace(/'/g, '&#39;') // Removing '
//            .replace(/</g, '&lt;') // Removing <
//            .replace(/>/g, '&gt;') // Removing >
//            .replace(/\[/g, '&#91;') // Removing [
//            .replace(/\]/g, '&#93;') // Removing ]
//            .replace(/\n/g, '<br />') // Replacing \n to <br />
//            .replace(/\t/g, '&nbsp;‌‌‌‌‌‌‌‌ &nbsp;‌‌‌‌‌‌‌‌ &nbsp;‌‌‌‌‌‌‌‌ &nbsp;‌‌‌‌‌‌‌‌ '); // A little Wordpress hack to display white spaces without being removed (note the space between each &nbsp;)
}

(function() {
	tinymce.PluginManager.add('prismjsbutton', function( editor, url ) {
		editor.addButton( 'prismjsbutton', {
			icon: 'codesample',
//            text: 'Code',
			title: 'Insert Code',
			onclick: function() {
				editor.windowManager.open( {
					title: 'Code Insert',
//                    data: data,
//                    width: window.innerWidth,
//						minWidth: 700,
//                       height: window.innerHeight,
			bodyType: 'tabpanel',
					body: [
					{
						title: 'General',
						type: 'form',
//                        onShowTab: function() {
//						data = htmlToData(this.next().find('#embed').value());
//						this.fromJSON(data);
//					},
						items: 
                                [
                            {
						type: 'listbox',
						name: 'languagesName',
//                                minWidth: 700,
//                       width: window.innerWidth,
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
						name: 'codeInput',
						label: 'Code Input',
						value: '',
						multiline: true,
//                          width: window.innerWidth,
						minWidth: 700,
//                       height: window.innerHeight-250,              
//                       maxWidth: 700,
//						minWidth: 700,
//                       maxHeight: 350,
						minHeight: 300,
//                            onclick: function (e) {
//                                jQuery(e.target).css('border', '13px solid #000');
//                            }
					},
                               ]
					},

					{
						title: 'Advanced',
                        type: 'form',
//						type: "container",
					layout: 'flex',
//					direction: 'column',
////					align: 'stretch',
					padding: 10,
					spacing: 10,
//					onShowTab: function() {
//						this.find('#embed').value(dataToHtml(this.parent().toJSON()));
//					},
						items: [
							 {
                            type: 'checkbox',
                            name: 'linenumbers',
                            label: 'Show Line numbers:',
                            checked: true,
                             },
                            {
                            type: 'textbox',
                            name: 'linenumstart',
                            label: 'Start Line Number From:',
//                            value: '',
                            },
                            {
                            type: 'textbox',
                            name: 'highlight',
                            label: 'Lines to Highlight:',
//                            value: '',
                            },
						      ]
					}
                    ],
                        onsubmit: function ( e ) {
                           
                        var linenumbers = '';
                        var linenumstart = '';
                        var highlight = '';
//                 
                        if (e.data.linenumbers != false) {
//                            linenumbers = 'line-numbers';
                            linenumbers = 'line-numbers';
                        }
//                            ==============================
                        if (e.data.linenumstart) {
                            linenumstart = e.data.linenumstart ;
                        }
                        if (e.data.highlight) {
                            highlight = e.data.highlight;
                        }
//                            ==============================

                        
                         editor.insertContent( '[Start ' +'*' + e.data.languagesName + '*'+ ']'  + '<pre ' + 'class="' + linenumbers + '" ' +  ' data-start="' + linenumstart + '" ' + ' data-line="' + highlight + '" ' + '><code class="language-' + e.data.languagesName  + '">' + htmlEscape(e.data.codeInput) + '</code></pre>' + '[End ' + '*'+ e.data.languagesName + '*' + ' ] ');
//     editor.insertContent( '<pre' + 'class="'line_num'" ' + ' data-line="' + highLight + '" '+' data-start="'line_num_start'"  '+' >' + '<code class="language- '+' e.data.languagesName  + '">' + htmlEscape(e.data.codeInput) + '</code></pre>');
					}
				});
			}
		});
	});
})();