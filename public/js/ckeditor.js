document.addEventListener("DOMContentLoaded", function(event) {
    // Get the upload URL and CSRF token from meta tags
    const uploadUrl = document.querySelector('meta[name="upload-url"]').getAttribute("content");
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

    // Initialize CKEditor with the obtained upload URL and CSRF token
    ClassicEditor
        .create(document.querySelector('#contentEditor'), {
            allowedContent: true,
            allowedContent: {
                elements: {
                    $: true, // Izinkan semua elemen
                    // Atur aturan khusus untuk elemen tertentu jika diperlukan
                    // Misalnya, untuk mengizinkan elemen h1, h2, h3, dan p:
                    h1: true,
                    h2: true,
                    h3: true,
                    p: true
                },
                attributes: true, // Izinkan semua atribut
                classes: true,    // Izinkan semua kelas
                styles: true      // Izinkan semua gaya
            },
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'underline',
                    'strikethrough',
                    '|',
                    'alignment',
                    '|',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'indent',
                    'outdent',
                    '|',
                    'imageInsert',
                    'mediaEmbed',
                    'table',
                    '|',
                    'link',
                    'blockQuote',
                    'codeBlock',
                    '|',
                    'undo',
                    'redo'
                ],
                shouldNotGroupWhenFull: true
            },
            alignment: {
                options: [ 'left', 'center', 'right', 'justify' ]
            },
            table: {
                contentToolbar: [
                    'tableColumn',
                    'tableRow',
                    'mergeTableCells'
                ]
            },
            htmlSupport: {
                allow: [
                    {
                        name: /.*/,
                        attributes: true,
                        classes: true,
                        styles: true
                    }
                ]
            },
            htmlEmbed: {
                showPreviews: true
            },
            ckfinder: {
                uploadUrl: uploadUrl + '?_token=' + csrfToken
            }
        })
        .then(editor => {
            window.editor = editor;
        })
        .catch(err => {
            console.error(err.stack);
        });
});
