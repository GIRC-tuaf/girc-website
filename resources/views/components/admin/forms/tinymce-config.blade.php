<div>
    <script src="{{ asset('/vendor/tinymce/tinymce.js') }}"></script>
    <script>
        tinymce.init({
            language: '{{ app()->getLocale() === 'vi' ? 'vi_VN' : 'en_US' }}',
            selector: 'textarea#{{ $column }}',
            images_file_types: 'jpg,svg,webp',
            file_picker_types: 'file image media',
            plugins: 'image code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright alignjustify | indent outdent | bullist numlist | code | table | link image',
            /* enable title field in the Image dialog*/
            image_title: true,
            /* enable automatic uploads of images represented by blob or data URIs*/
            automatic_uploads: true,
            /*
              URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
              images_upload_url: 'postAcceptor.php',
              here we add custom filepicker only to Image dialog
            */
            image_advtab: true,
            image_caption: true,
            content_css: [],
            image_dimensions: false,
            image_class_list: [{
                title: 'Responsive',
                value: 'md:w-2/3 m-auto w-full'
            }],
            file_picker_callback: (cb, value, meta) => {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                input.addEventListener('change', (e) => {
                    const file = e.target.files[0];

                    const reader = new FileReader();
                    reader.addEventListener('load', () => {
                        /*
                          Note: Now we need to register the blob in TinyMCEs image blob
                          registry. In the next release this part hopefully won't be
                          necessary, as we are looking to handle it internally.
                        */
                        const id = 'blobid' + (new Date()).getTime();
                        const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        const base64 = reader.result.split(',')[1];
                        const blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    });
                    reader.readAsDataURL(file);
                });

                input.click();
            },
        });
    </script>
</div>
