;(function() {
   tinymce.create('tinymce.plugins.BantiAlbumProofing', {
      init : function(ed, url) {
         ed.addButton('bantialbumproofing', {
            title : 'Banti Album Proofing',
            image : url+'/images/icon-16.png',
            onclick : function() {
               ed.execCommand('mceInsertContent', false, '[banti-album-proofing]');
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "Banti Album Proofing",
            author : 'Banti Album Proofing',
            authorurl : 'http://www.bantialbumproofing.com',
            infourl : 'http://www.bantialbumproofing.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('bantialbumproofing', tinymce.plugins.BantiAlbumProofing);
})();