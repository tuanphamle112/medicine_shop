function showTinyWithFileManager(paramSelector)
{
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
        external_filemanager_path:"/bower_components/responsive-filemanager/filemanager/",
        external_plugins: { "filemanager" : "/bower_components/responsive-filemanager/filemanager/plugin.min.js"},

        image_advtab: true,
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
        toolbar2: " | image | media | link unlink anchor | print preview"
    });
}

function showSimpleTinyWithFileManager(paramSelector)
{
    tinymce.init({
        theme: "modern",
        selector: paramSelector,
        plugins: [
            "advlist autolink link image lists charmap preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking spellchecker",
            "table contextmenu directionality emoticons paste textcolor"
        ],
        relative_urls: false,

        filemanager_title:"Responsive Filemanager",
        external_filemanager_path:"/bower_components/responsive-filemanager/filemanager/",
        external_plugins: { "filemanager" : "/bower_components/responsive-filemanager/filemanager/plugin.min.js"},
    });
}

function confirmBeforeSubmit(selectorID, element) {
    swal({
        title: $(element).attr('data-text'),
        type: 'info',
        showCancelButton: true,
        confirmButtonClass: 'btn-danger',
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
        closeOnConfirm: true,
        closeOnCancel: true
    },
    function(isConfirm) {
        if (isConfirm) {
            $(selectorID).submit();
        } else {
            swal('Cancelled', '', 'error');
            return false;
        }
    });
}
