<!DOCTYPE html>
<html>
<head>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({
  init_instance_callback : function(editor) {
    var freeTiny = document.querySelector('.tox .tox-notification--in');
   freeTiny.style.display = 'none';
  },
  directionality : 'rtl',

    selector: 'textarea#full-featured-non-premium',
    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code fullscreen image link media codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable quickbars',
    imagetools_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format table',
    toolbar: 'undo redo | bold italic underline strikethrough | fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | fullscreen  preview save print | insertfile image media link | ltr rtl',
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: "30s",
    autosave_prefix: "{path}{query}-{id}-",
    autosave_restore_when_empty: false,
    autosave_retention: "2m",
    image_advtab: true,
    content_css: [
      '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
      '//www.tiny.cloud/css/codepen.min.css'
    ],
    link_list: [
      { title: 'My page 1', value: 'http://www.tinymce.com' },
      { title: 'My page 2', value: 'http://www.moxiecode.com' }
    ],
    image_list: [
      { title: 'My page 1', value: 'https://upload.wikimedia.org/wikipedia/ar/1/18/Egyptian_General_Authority_For_Investment.jpg' },
      { title: 'My page 2', value: 'http://www.moxiecode.com' }
    ],
    image_class_list: [
      { title: 'None', value: '' },
      { title: 'Some class', value: 'class-name' }
    ],
    importcss_append: true,
    height: 400,
    file_picker_callback: function (callback, value, meta) {
      /* Provide file and text for the link dialog */
      if (meta.filetype === 'file') {
        callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
      }

      /* Provide image and alt text for the image dialog */
      if (meta.filetype === 'image') {
        callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
      }

      /* Provide alternative source and posted for the media dialog */
      if (meta.filetype === 'media') {
        callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
      }
    },
    height: 600,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_noneditable_class: "mceNonEditable",
    toolbar_drawer: 'sliding',
    contextmenu: "link image imagetools table",
   });

  </script>
</head>
<body>
    <form action="/test" method="post">
    @csrf
    <textarea id="full-featured-non-premium" name="text"><p style="text-align: center; font-size: 15px;"><img title="TinyMCE Logo" src="//www.tiny.cloud/images/glyph-tinymce@2x.png" alt="TinyMCE Logo" width="110" height="97" />
    </p>
    <h2 style="text-align: center;">Welcome to the TinyMCE Cloud demo!</h2>
    <p>Please try out the features provided in this full featured example (excluding <a href="https://www.tiny.cloud/apps/">Premium Plugins</a> ).</p>

    <h2>Got questions or need help?</h2>
    <ul>
      <li>Our <a class="mceNonEditable" href="//www.tiny.cloud/docs/">documentation</a> is a great resource for learning how to configure TinyMCE.</li>
      <li>Have a specific question? Visit the <a class="mceNonEditable" href="https://community.tiny.cloud/forum/">Community Forum</a>.</li>
      <li>We also offer enterprise grade support as part of <a href="https://www.tiny.cloud/pricing">TinyMCE premium subscriptions</a>.</li>
    </ul>

    <h2>A simple table to play with</h2>
    <table style="text-align: center;border-collapse: collapse; width: 100%;">
      <thead>
        <tr>
          <th>Product</th>
          <th>Cost</th>
          <th>Really?</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>TinyMCE Cloud</td>
          <td>Get started for free</td>
          <td>YES!</td>
        </tr>
        <tr>
          <td>Plupload</td>
          <td>Free</td>
          <td>YES!</td>
        </tr>
      </tbody>
    </table>

    <h2>Found a bug?</h2>
    <p>If you think you have found a bug please create an issue on the <a href="https://github.com/tinymce/tinymce/issues">GitHub repo</a> to report it to the developers.</p>

    <h2>Finally ...</h2>
    <p>Don't forget to check out our other product <a href="http://www.plupload.com" target="_blank">Plupload</a>, your ultimate upload solution featuring HTML5 upload support.</p>
    <p>Thanks for supporting TinyMCE! We hope it helps you and your users create great content.<br>All the best from the TinyMCE team.</p>
  </textarea>
<button type="submit">Save</button>
</form>
        </body>
</html>
