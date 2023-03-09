<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
{{--    <script src='https://cdn.tiny.cloud/1/no-api-key/tinymce/4/tinymce.min.js'></script>--}}
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js?apiKey=4rcnfqnlzfiuwfia3kjfez410ye1smutxh8kj2i126izgth4/tinymce"></script>
{{--    <script src="https://cdn.tiny.cloud/1/4rcnfqnlzfiuwfia3kjfez410ye1smutxh8kj2i126izgth4/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>--}}

    <style>

        .tox-tinymce{
            width:100%;
        }
        .mce-notification-warning, .tox-notifications-container{
            display: none;
        }
        .mce-statusbar, .tox-statusbar{
            display: none !important;

        }
        .bg-primary {
            --tw-bg-opacity: 1;
            background-color: rgb(126 31 246 / var(--tw-bg-opacity)) !important;
        }
        .border-primary {
            --tw-border-opacity: 1;
            border-color: rgb(126 31 246 / var(--tw-border-opacity))!important;
        }
        button.bg-primary:hover:hover {
            background-color:  rgb(255 255 255 / var(--tw-border-opacity))!important;
            color: #7e1ff6 !important;
        }
        #div_reward_instructions{
            border:none !important;
        }
        #div_addon_instructions{
            border:none !important;
        }

    </style>
    @include('layouts.admin.events.subheader')
    <div class="w-full flex flex-col sm:flex-row flex-grow overflow-hidden bg-light-gray-bg">
        @include('layouts.admin.events.sidebar')
        <main role="main" class="w-full h-full flex-grow p-3 overflow-auto">
            <div class="float-left w-full max-w-screen-xl">
                <x-admin.breadcrumb>
                    <x-slot name="header">Rewards Introduction</x-slot>
                    <x-slot name="breadcrumb">
                        <a class="text-primary font-poppins-semibold text-sm" href="">Events</a> >
                        <a class="text-nav-gray font-poppins text-sm" href="{{route('admin.events.info.essentials',$id)}}">{{$event->name ?? "Untitled"}}</a> >
                        <span class="text-nav-gray font-poppins text-sm">Rewards</span> >
                        <span class="text-nav-gray font-poppins text-sm">{{$active_page}}</span>

                    </x-slot>
                </x-admin.breadcrumb>

                @if(session()->has('message'))
                    <x-infoboxes.success class="mt-4">
                        <x-slot name="heading">{{session()->get('message')}}</x-slot>
                    </x-infoboxes.success>
                @endif
                @if(session()->has('warining'))
                    <x-infoboxes.error class="mt-4">
                        <x-slot name="heading">{{session()->get('warining')}}</x-slot>
                    </x-infoboxes.error>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger"  style="color:red">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" id="create-event-reward_instruction_010" name="create-event-f_010" action="{{route('admin.events.rewards.instructions.store',array($id))}}" class="w-full float-left" autocomplete="false" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="challengeId" id="challengeId" value="{{$id}}">


                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Rewards Introduction*
                        </x-slot>
                        <x-slot name="section_button">

                        </x-slot>
                        <x-slot name="section_heading_description_status">hidden</x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">


                                <x-forms.textarea id="reward_instructions" name="reward_instructions" placeholder="" class="h-32 accepted_domains ">
                                    <x-slot name="field_id">reward_instructions</x-slot>
                                    <x-slot name="label_text"></x-slot>
                                    <x-slot name="label_description_status">hidden</x-slot>
                                    <x-slot name="label_description"></x-slot>
                                    {{$reward_instructions->meta_value??''}}
                                </x-forms.textarea>


                        </x-slot>
                        <x-forms.validationerror>
                            <x-slot name="field_id">reward_instructions</x-slot>
                            <x-slot name="error_text">reward_instructions_error</x-slot>
                        </x-forms.validationerror>
                    </x-forms.section>

                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Add-On Introduction*
                        </x-slot>

                        <x-slot name="section_button">

                        </x-slot>
                        <x-slot name="section_heading_description_status">hidden</x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">


                                <x-forms.textarea id="addon_instructions" name="addon_instructions" placeholder="" class="h-32 accepted_domains ">
                                    <x-slot name="field_id">addon_instructions</x-slot>
                                    <x-slot name="label_text"></x-slot>
                                    <x-slot name="label_description_status">hidden</x-slot>
                                    <x-slot name="label_description"></x-slot>
                                    {{$addon_instructions->meta_value ??''}}
                                </x-forms.textarea>

                        </x-slot>
                        <x-forms.validationerror>
                            <x-slot name="field_id">addon_instructions</x-slot>
                            <x-slot name="error_text">addon_instructions_error</x-slot>
                        </x-forms.validationerror>
                    </x-forms.section>



            </div>
        </main>
    </div>
    <div class="float-left w-full text-right" style="position: sticky;bottom: 0;background: white;    padding: 20px;">
        <x-forms.submit value="Save" name="event_images_save" id="event_images_save">
            Save
        </x-forms.submit>
    </div>

    </form>



    <script>
        $("#create-event-reward_instruction_010").validate({
            rules: {
                reward_instructions:{
                    required: true,
                },
                addon_instructions:{
                    required: true,
                },
            },
            submitHandler : function (form) {
                return true;
            }
        });
        formchanged=0;
        tinymce.init({
            selector: 'textarea#reward_instructions',

            plugins: 'lists code emoticons table codesample image imagetools link textcolor',
            table_toolbar: 'tableprops tabledelete | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',

            toolbar: 'undo redo | styleselect | bold italic |  fontsize |' +
                'alignleft aligncenter alignright alignjustify | ' +
                'outdent indent | numlist bullist | emoticons  | link image | custom_button | forecolor backcolor',
            menubar: 'table insert',
            table_sizing_mode: 'responsive' ,
            automatic_uploads: true,
            file_picker_types: 'image',
            table_use_colgroups: true,
            table_default_attributes: {
                border: '0'
            },
            table_row_class_list: [
                {title: 'None', value: ''},
                {title: 'No Border', value: 'table_row_no_border'},
                {title: 'Red border', value: 'table_row_red_border'},
                {title: 'Blue border', value: 'table_row_blue_border'},
                {title: 'Green border', value: 'table_row_green_border'}
            ],
            table_advtab: true,
            table_cell_advtab: true,
            table_row_advtab: true,
            emoticons_append: {
                custom_mind_explode: {
                    keywords: ['brain', 'mind', 'explode', 'blown'],
                    char: '🤯'
                }
            },
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                /*
                  Note: In modern browsers input[type="file"] is functional without
                  even adding it to the DOM, but that might not be the case in some older
                  or quirky browsers like IE, so you might want to add it to the DOM
                  just in case, and visually hide it. And do not forget do remove it
                  once you do not need it anymore.
                */

                input.onchange = function () {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.onload = function () {
                        /*
                          Note: Now we need to register the blob in TinyMCEs image blob
                          registry. In the next release this part hopefully won't be
                          necessary, as we are looking to handle it internally.
                        */
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },
            // plugins: [
            //     "advlist autolink lists link image charmap print preview anchor",
            //     "searchreplace visualblocks code fullscreen",
            //     "insertdatetime media table paste codesample emoticons"
            // ],
            // toolbar: 'undo redo | styleselect | bold italic | ' +
            //     'alignleft aligncenter alignright alignjustify | ' +
            //     'outdent indent | numlist bullist | emoticons | custom_button',
            // emoticons_append: {
            //     custom_mind_explode: {
            //         keywords: ['brain', 'mind', 'explode', 'blown'],
            //         char: '🤯'
            //     }
            // },
            content_css: ["/css/custom_css_tinymce.css"],
            font_formats:"Segoe UI=Segoe UI;",
            fontsize_formats: "8px 9px 10px 11px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px 50px 52px 54px 56px 58px 60px 62px 64px 66px 68px 70px 72px 74px 76px 78px 80px 82px 84px 86px 88px 90px 92px 94px 94px 96px",
            codesample_languages: [
                {text: 'HTML/XML', value: 'markup'},
                {text: 'JavaScript', value: 'javascript'},
                {text: 'CSS', value: 'css'},
                {text: 'PHP', value: 'php'},
                {text: 'Ruby', value: 'ruby'},
                {text: 'Python', value: 'python'},
                {text: 'Java', value: 'java'},
                {text: 'C', value: 'c'},
                {text: 'C#', value: 'csharp'},
                {text: 'C++', value: 'cpp'}
            ],
            height: 600,
            setup: function (editor) {
                editor.on('Paste Change input Undo Redo', function () {
                    formchanged=1;
                    console.log(formchanged);
                });
                editor.ui.registry.addButton('custom_button', {
                    text: 'Add Button',
                    onAction: function() {
                        // Open a Dialog
                        editor.windowManager.open({
                            title: 'Add custom button',
                            body: {
                                type: 'panel',
                                items: [{
                                    type: 'input',
                                    name: 'button_label',
                                    label: 'Button label',
                                    flex: true
                                },{
                                    type: 'input',
                                    name: 'button_href',
                                    label: 'Button href',
                                    flex: true
                                },{
                                    type: 'selectbox',
                                    name: 'button_target',
                                    label: 'Target',
                                    items: [
                                        {text: 'None', value: ''},
                                        {text: 'New window', value: '_blank'},
                                        {text: 'Self', value: '_self'},
                                        {text: 'Parent', value: '_parent'}
                                    ],
                                    flex: true
                                },{
                                    type: 'selectbox',
                                    name: 'button_rel',
                                    label: 'Rel',
                                    items: [
                                        {text: 'No value', value: ''},
                                        {text: 'Alternate', value: 'alternate'},
                                        {text: 'Help', value: 'help'},
                                        {text: 'Manifest', value: 'manifest'},
                                        {text: 'No follow', value: 'nofollow'},
                                        {text: 'No opener', value: 'noopener'},
                                        {text: 'No referrer', value: 'noreferrer'},
                                        {text: 'Opener', value: 'opener'}
                                    ],
                                    flex: true
                                },{
                                    type: 'selectbox',
                                    name: 'button_style',
                                    label: 'Style',
                                    items: [
                                        {text: 'Success', value: 'success'},
                                        {text: 'Info', value: 'info'},
                                        {text: 'Warning', value: 'warning'},
                                        {text: 'Error', value: 'error'}
                                    ],
                                    flex: true
                                }]
                            },
                            onSubmit: function (api) {

                                var html = '<a href="'+api.getData().button_href+'" class="btn btn-'+api.getData().button_style+'" rel="'+api.getData().button_rel+'" target="'+api.getData().button_target+'">'+api.getData().button_label+'</a>';

                                // insert markup
                                editor.insertContent(html);

                                // close the dialog
                                api.close();
                            },
                            buttons: [
                                {
                                    text: 'Close',
                                    type: 'cancel',
                                    onclick: 'close'
                                },
                                {
                                    text: 'Insert',
                                    type: 'submit',
                                    primary: true,
                                    enabled: true
                                }
                            ]
                        });
                    }
                });
            }
        });
        // tinymce.init({
        //     selector: '#reward_instructions',
        //     height: 300,
        //     plugins: 'lists code emoticons',
        //     toolbar: 'undo redo | styleselect | bold italic | ' +
        //         'alignleft aligncenter alignright alignjustify | ' +
        //         'outdent indent | numlist bullist | emoticons',
        //     menubar: false,
        //     emoticons_append: {
        //         custom_mind_explode: {
        //             keywords: ['brain', 'mind', 'explode', 'blown'],
        //             char: '🤯'
        //         }
        //     },
        //     content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
        //     setup: function(editor) {
        //         editor.on('Paste Change input Undo Redo', function () {
        //             formchanged=1;
        //             console.log(formchanged);
        //         });
        //     }
        // });
        tinymce.init({
            selector: 'textarea#addon_instructions',

            plugins: 'lists code emoticons table codesample image imagetools link textcolor',
            table_toolbar: 'tableprops tabledelete | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',

            toolbar: 'undo redo | styleselect | bold italic |  fontsize |' +
                'alignleft aligncenter alignright alignjustify | ' +
                'outdent indent | numlist bullist | emoticons  | link image | custom_button | forecolor backcolor',
            menubar: 'table insert',
            table_sizing_mode: 'responsive' ,
            automatic_uploads: true,
            file_picker_types: 'image',
            table_use_colgroups: true,
            table_default_attributes: {
                border: '0'
            },
            table_row_class_list: [
                {title: 'None', value: ''},
                {title: 'No Border', value: 'table_row_no_border'},
                {title: 'Red border', value: 'table_row_red_border'},
                {title: 'Blue border', value: 'table_row_blue_border'},
                {title: 'Green border', value: 'table_row_green_border'}
            ],
            table_advtab: true,
            table_cell_advtab: true,
            table_row_advtab: true,
            emoticons_append: {
                custom_mind_explode: {
                    keywords: ['brain', 'mind', 'explode', 'blown'],
                    char: '🤯'
                }
            },
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                /*
                  Note: In modern browsers input[type="file"] is functional without
                  even adding it to the DOM, but that might not be the case in some older
                  or quirky browsers like IE, so you might want to add it to the DOM
                  just in case, and visually hide it. And do not forget do remove it
                  once you do not need it anymore.
                */

                input.onchange = function () {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.onload = function () {
                        /*
                          Note: Now we need to register the blob in TinyMCEs image blob
                          registry. In the next release this part hopefully won't be
                          necessary, as we are looking to handle it internally.
                        */
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },
            // plugins: [
            //     "advlist autolink lists link image charmap print preview anchor",
            //     "searchreplace visualblocks code fullscreen",
            //     "insertdatetime media table paste codesample emoticons"
            // ],
            // toolbar: 'undo redo | styleselect | bold italic | ' +
            //     'alignleft aligncenter alignright alignjustify | ' +
            //     'outdent indent | numlist bullist | emoticons | custom_button',
            // emoticons_append: {
            //     custom_mind_explode: {
            //         keywords: ['brain', 'mind', 'explode', 'blown'],
            //         char: '🤯'
            //     }
            // },
            content_css: ["/css/custom_css_tinymce.css"],
            font_formats:"Segoe UI=Segoe UI;",
            fontsize_formats: "8px 9px 10px 11px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px 50px 52px 54px 56px 58px 60px 62px 64px 66px 68px 70px 72px 74px 76px 78px 80px 82px 84px 86px 88px 90px 92px 94px 94px 96px",
            codesample_languages: [
                {text: 'HTML/XML', value: 'markup'},
                {text: 'JavaScript', value: 'javascript'},
                {text: 'CSS', value: 'css'},
                {text: 'PHP', value: 'php'},
                {text: 'Ruby', value: 'ruby'},
                {text: 'Python', value: 'python'},
                {text: 'Java', value: 'java'},
                {text: 'C', value: 'c'},
                {text: 'C#', value: 'csharp'},
                {text: 'C++', value: 'cpp'}
            ],
            height: 600,
            setup: function (editor) {
                editor.on('Paste Change input Undo Redo', function () {
                    formchanged=1;
                    console.log(formchanged);
                });
                editor.ui.registry.addButton('custom_button', {
                    text: 'Add Button',
                    onAction: function() {
                        // Open a Dialog
                        editor.windowManager.open({
                            title: 'Add custom button',
                            body: {
                                type: 'panel',
                                items: [{
                                    type: 'input',
                                    name: 'button_label',
                                    label: 'Button label',
                                    flex: true
                                },{
                                    type: 'input',
                                    name: 'button_href',
                                    label: 'Button href',
                                    flex: true
                                },{
                                    type: 'selectbox',
                                    name: 'button_target',
                                    label: 'Target',
                                    items: [
                                        {text: 'None', value: ''},
                                        {text: 'New window', value: '_blank'},
                                        {text: 'Self', value: '_self'},
                                        {text: 'Parent', value: '_parent'}
                                    ],
                                    flex: true
                                },{
                                    type: 'selectbox',
                                    name: 'button_rel',
                                    label: 'Rel',
                                    items: [
                                        {text: 'No value', value: ''},
                                        {text: 'Alternate', value: 'alternate'},
                                        {text: 'Help', value: 'help'},
                                        {text: 'Manifest', value: 'manifest'},
                                        {text: 'No follow', value: 'nofollow'},
                                        {text: 'No opener', value: 'noopener'},
                                        {text: 'No referrer', value: 'noreferrer'},
                                        {text: 'Opener', value: 'opener'}
                                    ],
                                    flex: true
                                },{
                                    type: 'selectbox',
                                    name: 'button_style',
                                    label: 'Style',
                                    items: [
                                        {text: 'Success', value: 'success'},
                                        {text: 'Info', value: 'info'},
                                        {text: 'Warning', value: 'warning'},
                                        {text: 'Error', value: 'error'}
                                    ],
                                    flex: true
                                }]
                            },
                            onSubmit: function (api) {

                                var html = '<a href="'+api.getData().button_href+'" class="btn btn-'+api.getData().button_style+'" rel="'+api.getData().button_rel+'" target="'+api.getData().button_target+'">'+api.getData().button_label+'</a>';

                                // insert markup
                                editor.insertContent(html);

                                // close the dialog
                                api.close();
                            },
                            buttons: [
                                {
                                    text: 'Close',
                                    type: 'cancel',
                                    onclick: 'close'
                                },
                                {
                                    text: 'Insert',
                                    type: 'submit',
                                    primary: true,
                                    enabled: true
                                }
                            ]
                        });
                    }
                });
            }
        });
        // tinymce.init({
        //     selector: '#addon_instructions',
        //     height: 300,
        //     plugins: 'lists code emoticons',
        //     toolbar: 'undo redo | styleselect | bold italic | ' +
        //         'alignleft aligncenter alignright alignjustify | ' +
        //         'outdent indent | numlist bullist | emoticons',
        //     menubar: false,
        //     emoticons_append: {
        //         custom_mind_explode: {
        //             keywords: ['brain', 'mind', 'explode', 'blown'],
        //             char: '🤯'
        //         }
        //     },
        //     content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
        //     setup: function(editor) {
        //         editor.on('Paste Change input Undo Redo', function () {
        //             formchanged=1;
        //             console.log(formchanged);
        //         });
        //     }
        // });



        var isadd= '{{$isadd}}';

        var $form = $('form'),
            origForm = $form.serialize();

        $('div#admin-sidebar a').click(function(){
 
            console.log(formchanged);
            var response=false;
            if(formchanged){
                var answer =Swal.fire({
                    title: '',
                    icon: 'warning',
                    html:isadd?'Are you sure you want to leave this page  without saving?':"You have unsaved changes on this page. If you leave now, your changes will not be saved.",
                    showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText:
                        'Yes, Leave',
                    confirmButtonAriaLabel: 'Yes, Leave',
                    cancelButtonText:
                        'No, cancel',
                    cancelButtonAriaLabel: 'No, cancel'
                }).then((result) => {
                    if (result.isConfirmed) {

                        window.location.href = this.href;

                    }
                });

                return response;
            }

        });
    </script>
</x-app-layout>
