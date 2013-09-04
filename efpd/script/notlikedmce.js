// JavaScript Document
(function() {
    tinymce.create('tinymce.plugins.notlikedmce', {
        init : function(ed, url) {
            ed.addButton('notlikedmce', {
                title : '"Not Liked" Reveal Content (highlight text first!)',
                image : url+'/thumbs/notliked_mce.png',
                onclick : function() {
                     ed.selection.setContent('[efpd-notliked]' + ed.selection.getContent() + '[/efpd-notliked]');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('notlikedmce', tinymce.plugins.notlikedmce);
})();