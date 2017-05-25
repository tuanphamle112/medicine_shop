function showTinyWithFileManager(paramSelector) {
    tinymce.init({
        theme: "modern",
        selector: paramSelector,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
            "table contextmenu directionality emoticons paste textcolor"
        ],
        relative_urls: false,

        filemanager_title:"Responsive Filemanager",
        // filemanager_crossdomain: true,
        external_filemanager_path:"/bower_components/responsive-filemanager/filemanager/",
        external_plugins: { "filemanager" : "/bower_components/responsive-filemanager/filemanager/plugin.min.js"},

        image_advtab: true,
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        toolbar2: " | image | media | link unlink anchor | print preview"
    });
}
