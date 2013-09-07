// JavaScript Document
(function() {
    tinymce.create('tinymce.plugins.autorespondermce', {
        init : function(ed, url) {
			ed.addCommand('AR_Code', function() {
				ed.windowManager.open({
					url :  url+'/options.forms/autoresponder/autoresponder.php',
					width : 450,
					height : 220,
					inline : 1
				});
			});
            ed.addButton('autorespondermce', {
                title : 'Autoresponder Code',
                image : url+'/thumbs/autoresponder_mce.png',
                cmd : 'AR_Code'
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('autorespondermce', tinymce.plugins.autorespondermce);
})();