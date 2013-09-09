// JavaScript Document
(function() {
    tinymce.create('tinymce.plugins.likedmce', {
        init : function(ed, url) {
            ed.addButton('likedmce', {
                title : '"Liked" Reveal Content (highlight text first!)',
                image : url+'/thumbs/liked_mce.png',
                onclick : function() {
                     ed.selection.setContent('[efpd-liked]' + ed.selection.getContent() + '[/efpd-liked]');
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
    });
    tinymce.PluginManager.add('likedmce', tinymce.plugins.likedmce);
})();