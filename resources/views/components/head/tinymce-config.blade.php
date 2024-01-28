<script src="https://cdn.tiny.cloud/1/03e7xi0a3y5gm3nvfez42fu8tug7tozokpmta1fnqww1vovk/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'emoticons wordcount',
        skin: 'oxide-dark',
        content_css: 'dark',
        toolbar: 'undo redo | formatselect| bold italic | emoticons',
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
