<script src="https://cdn.tiny.cloud/1/{{ env('TINY_KEY') }}/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'emoticons wordcount',
        skin: 'oxide-dark',
        content_css: 'dark',
        toolbar: 'undo redo | formatselect | bold italic | emoticons',
        setup: function(editor) {
            var max = 255;
            editor.on('submit', function(event) {
                var numChars = tinymce.activeEditor.plugins.wordcount.body.getCharacterCount();
                if (numChars > max) {
                    alert("Maximum " + max + " characters allowed.");
                    event.preventDefault();
                    return false;
                }
            });
        }
    });
</script>
