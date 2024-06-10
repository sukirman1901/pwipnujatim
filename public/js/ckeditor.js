document.addEventListener("DOMContentLoaded", function(event) {
    // Get the upload URL and CSRF token from meta tags
    const uploadUrl = document.querySelector('meta[name="upload-url"]').getAttribute("content");
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

    // Initialize CKEditor with the obtained upload URL and CSRF token
    ClassicEditor
        .create(document.querySelector('#contentEditor'), {
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
