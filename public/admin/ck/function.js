function ckeditor(name){
  var editor = CKEDITOR.replace(name,{
    uiColor : '#0AB8F3',
    language:'vi',
    filebrowserImageBrowseUrl : baseURL+'/admin/ck/ckfinder/ckfinder.html?Type=Images',
		filebrowserFlashBrowseUrl : baseURL+'/admin/ck/ckfinder/ckfinder.html?Type=Flash',
		filebrowserImageUploadUrl : baseURL+'/admin/ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
		filebrowserFlashUploadUrl : baseURL+'/admin/ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    toolbar:[
        ['Source','Preview','Templates'],
       ['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
       ['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
       '/',
       ['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
       ['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
       ['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
       ['BidiLtr', 'BidiRtl' ],
       ['Link','Unlink','Anchor'],
       ['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe'],
       '/',
       ['Styles','Format','Font','FontSize'],
       ['TextColor','BGColor'],
       ['Maximize','ShowBlocks','Syntaxhighlight']
    ]
  });
}
