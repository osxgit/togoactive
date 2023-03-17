<x-app-layout>

    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js?apiKey=4rcnfqnlzfiuwfia3kjfez410ye1smutxh8kj2i126izgth4/tinymce"></script>


    <style>

         .peer:checked~.peer-checked\:bg-purple-600 {
            --tw-bg-opacity: 1;
            background-color: rgb(147 51 234 / var(--tw-bg-opacity)) !important;
        }

        a{
            color:inherit !important;
        }
        label.error{

            color:red;
        }

        .tagify {
            border:none !important;
            height: 130px;
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
        }
        .swal2-styled.swal2-confirm {
            border: 0;
            border-radius: 0.25em;
            background: initial;
            background-color: #F53F14;
            color: #fff;
            font-size: 1em;
        }

        .swal2-styled.swal2-cancel {
            border: 1px solid #D7DEDD;
            border-radius: 0.25em;
            background: initial;
            background-color: #ffffff;
            color: #000;
            font-size: 1em;
        }
        .swal2-icon.swal2-warning {
            border-color: #9ca3af;
            color: #9ca3af;
        }
        .swal2-close:focus {
            outline: 0;
            box-shadow: none;
        }  .tox-tinymce{
               width:100%;
           }
        .mce-notification-warning, .tox-notifications-container{
            display: none;
        }
        .mce-statusbar, .tox-statusbar{
            display: none !important;

        }

        .tox-tinymce{
               width:100%;
           }
        .tinyEditor, #div_no_purchase_made, #div_partial_purchase_made, #div_all_purchase_made, #div_email_body{
            border: none !important;
        }
    </style>
    @include('layouts.admin.events.subheader')
    <div class="w-full flex flex-col sm:flex-row flex-grow overflow-hidden bg-light-gray-bg">
        @include('layouts.admin.events.sidebar')
        <main role="main" class="w-full h-full flex-grow p-3 overflow-auto">
            <div class="float-left w-full max-w-screen-xl">
                <x-admin.breadcrumb>
                    <x-slot name="header">Success Page</x-slot>
                    <x-slot name="breadcrumb">
                        <a class="text-primary font-poppins-semibold text-sm" href="">Events</a> >
                        <a class="text-nav-gray font-poppins text-sm"
                            href="{{ route('admin.events.info.essentials', $id) }}">{{ $event->name ?? 'Untitled' }}</a>
                        >
                        <a class="text-primary font-poppins-semibold text-sm" href="">Page Setup</a> >
                        <span class="text-nav-gray font-poppins text-sm">{{ $active_page }}</span>
                    </x-slot>
                </x-admin.breadcrumb>

                @if (session()->has('message'))
                    <x-infoboxes.success class="mt-4">
                        <x-slot name="heading">{{ session()->get('message') }}</x-slot>
                    </x-infoboxes.success>
                @endif
                @if (session()->has('warining'))
                    <x-infoboxes.error class="mt-4">
                        <x-slot name="heading">{{ session()->get('warining') }}</x-slot>
                    </x-infoboxes.error>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger" style="color:red">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" id="create-event-success-page-f_010" name="create-event-success-page-f_010"
                    action="{{ route('admin.events.success.store', [$id]) }}" class="w-full float-left"
                    autocomplete="false" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="challengeId" id="challengeId" value="{{ $id }}">

                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Rewards Grouping
                        </x-slot>
                        <x-slot name="section_button">

                        </x-slot>
                        <x-slot name="section_heading_description_status">hidden</x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>

                        <x-slot name="section_content">
                            <div class="float-left w-full flex  justify-center items-end">

                                <div class="float-left w-auto">

                                    <x-forms.textarea id="no_purchase_made" name="no_purchase_made" placeholder=""
                                        class="h-32 no_purchase_made tinyEditor">
                                        <x-slot name="field_id">no_purchase_made</x-slot>
                                        <x-slot name="label_text">Customize section - when no purchase made*</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">This section will be shown to participants who
                                            does not buy any rewards.</x-slot>
                                        {{ $eventsuccess->no_purchase_made ?? '' }}
                                    </x-forms.textarea>
                                    <div>
                                        <x-forms.validationerror>
                                            <x-slot name="field_id">no_purchase_made</x-slot>
                                            <x-slot name="error_text">no_purchase_made</x-slot>
                                        </x-forms.validationerror>
                                    </div>

                                </div>
                            </div>

                            <div class="float-left w-full flex  justify-center items-end">

                                <div class="float-left w-auto">

                                    <x-forms.textarea id="partial_purchase_made" name="partial_purchase_made"
                                        placeholder="" class="h-32 partial_purchase_made tinyEditor">
                                        <x-slot name="field_id">partial_purchase_made</x-slot>
                                        <x-slot name="label_text">Customize section - when partial purchase made*
                                        </x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">This section will be shown to participants who
                                            buy certain rewards. </x-slot>
                                        {{ $eventsuccess->partial_purchase_made ?? '' }}
                                    </x-forms.textarea>
                                    <div>
                                        <x-forms.validationerror>
                                            <x-slot name="field_id">partial_purchase_made</x-slot>
                                            <x-slot name="error_text">partial_purchase_made</x-slot>
                                        </x-forms.validationerror>
                                    </div>

                                </div>
                            </div>


                            <div class="float-left w-full flex  justify-center items-end">

                                <div class="float-left w-auto">

                                    <x-forms.textarea id="all_purchase_made" name="all_purchase_made" placeholder=""
                                        class="h-32 all_purchase_made tinyEditor">
                                        <x-slot name="field_id">all_purchase_made</x-slot>
                                        <x-slot name="label_text">Customize section - when all purchase made*</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">This section will be shown to participants who
                                            buy all the rewards. </x-slot>
                                        {{ $eventsuccess->all_purchase_made ?? '' }}
                                    </x-forms.textarea>
                                    <div>
                                        <x-forms.validationerror>
                                            <x-slot name="field_id">all_purchase_made</x-slot>
                                            <x-slot name="error_text">all_purchase_made</x-slot>
                                        </x-forms.validationerror>
                                    </div>

                                </div>
                            </div>


                        </x-slot>

                    </x-forms.section>


                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Additional Info
                        </x-slot>
                        <x-slot name="section_button">

                        </x-slot>
                        <x-slot name="section_heading_description_status">hidden</x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">
                            <div class="py-2  float-left">

                                <x-forms.toggle id="active_custom_message" name="active_custom_message" value="{{ $eventsuccess->active_custom_message ?? 0 }}">
                                    <x-slot name="field_id">active_custom_message</x-slot>
                                    <x-slot name="label_text">Enable custom message section</x-slot>
                                    <x-slot name="label_description">This will allow you to show customized message for
                                        participants.</x-slot>
                                </x-forms.toggle>
                            </div>

                            <div class="float-left w-full flex  justify-center items-end">

                                <div class="float-left w-auto">

                                    <x-forms.textarea id="invite_friend" name="invite_friend" placeholder=""
                                        class="h-32 invite_friend tinyEditor">
                                        <x-slot name="field_id">no_purchase_made</x-slot>
                                        <x-slot name="label_text">Invite Friends section*</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">This section will be shown to participants for
                                            sharing their referral.</x-slot>
                                        {{ $eventsuccess->invite_friend ?? '' }}
                                    </x-forms.textarea>
                                    <div>
                                        <x-forms.validationerror>
                                            <x-slot name="field_id">invite_friend</x-slot>
                                            <x-slot name="error_text">invite_friend</x-slot>
                                        </x-forms.validationerror>
                                    </div>

                                </div>
                            </div>
                        </x-slot>

                    </x-forms.section>

                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Success email setup*

                        </x-slot>
                        <x-slot name="section_button">

                        </x-slot>
                        <x-slot name="section_heading_description_status">hidden</x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">
                            <div class="float-left w-full">
                                <div class="float-left w-1/2">
                                    <x-forms.textfield id="email_subject" name="email_subject" placeholder="Thank you for registering for #goMAD22" value="{{$eventsuccess->email_subject ?? ''}}" maxlength="255">
                                        <x-slot name="field_id">email_subject</x-slot>
                                        <x-slot name="label_text">Subject*</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description"></x-slot>
                                    </x-forms.textfield>
                                </div>
                                <div class="float-left text-right w-1/2">
                                    <button type='button' id="send_test_email" class='bg-primary inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150'>
                                        <i class="fa fa-envelope" aria-hidden="true"></i>  Send Test Email
                                    </button>
                                </div>
                            </div>

                            <div class="float-left w-full flex items-end">

                                <div class="float-left w-auto">

                                    <x-forms.textarea id="email_body" name="email_body" placeholder=""
                                        class="h-32 invite_friend tinyEditor">
                                        <x-slot name="field_id">email_body</x-slot>
                                        <x-slot name="label_text">Body</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description"></x-slot>
                                        {{ $eventsuccess->email_body ?? '' }}
                                    </x-forms.textarea>
                                    <div>
                                        <x-forms.validationerror>
                                            <x-slot name="field_id">invite_friend</x-slot>
                                            <x-slot name="error_text">invite_friend</x-slot>
                                        </x-forms.validationerror>
                                    </div>

                                </div>
                            </div>
                        </x-slot>

                    </x-forms.section>

            </div>
        </main>
    </div>
    <div class="float-left w-full text-right"
        style="position: sticky;
    bottom: 0;background: white;    padding: 20px;">
        <x-forms.submit value="Save" name="event_images_save" id="event_images_save">
            Save
        </x-forms.submit>
    </div>

    </form>

    <div class="modal fade" id="previewModal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" style="padding-bottom:0px;border:none;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body text-center items-center" style="padding-top:0px;">
                    <h4 class="preview-modal-title font-poppins-bold"></h4>
                    <div class="preview-modal-desc  mb-2"></div>
                    <div class="preview-modal-img"><img class="preview-img" src=""></div>
                </div>

                <!-- Modal footer -->
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            if($("#active_custom_message").val() == 1){
                $("#active_custom_message").prop('checked', true);
            }
            $("#active_custom_message").on('change',function(){
                let vall = $(this).val();
                if(vall == 0){
                    $(this).val(1);
                    $("#active_custom_message").prop('checked', true);
                }else{
                    $(this).val(0);
                    $("#active_custom_message").prop('checked', false);
                }
            })
        });
        formchanged = 0;

        tinymce.init({
            selector: 'textarea.tinyEditor',

            plugins: 'lists code emoticons table codesample image imagetools link textcolor',
            table_toolbar: 'tableprops tabledelete | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',

            toolbar: 'undo redo | styleselect | bold italic |  fontsize |' +
                'alignleft aligncenter alignright alignjustify | ' +
                'outdent indent | numlist bullist | emoticons  | link image | custom_button | forecolor backcolor',
            menubar: 'table insert',
            table_sizing_mode: 'responsive',
            automatic_uploads: true,
            file_picker_types: 'image',
            table_use_colgroups: true,
            table_default_attributes: {
                border: '0'
            },
            table_row_class_list: [{
                    title: 'None',
                    value: ''
                },
                {
                    title: 'No Border',
                    value: 'table_row_no_border'
                },
                {
                    title: 'Red border',
                    value: 'table_row_red_border'
                },
                {
                    title: 'Blue border',
                    value: 'table_row_blue_border'
                },
                {
                    title: 'Green border',
                    value: 'table_row_green_border'
                }
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
            file_picker_callback: function(cb, value, meta) {
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

                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.onload = function() {
                        /*
                          Note: Now we need to register the blob in TinyMCEs image blob
                          registry. In the next release this part hopefully won't be
                          necessary, as we are looking to handle it internally.
                        */
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), {
                            title: file.name
                        });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },

            content_css: ["/css/custom_css_tinymce.css"],
            font_formats: "Segoe UI=Segoe UI;",
            fontsize_formats: "8px 9px 10px 11px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px 50px 52px 54px 56px 58px 60px 62px 64px 66px 68px 70px 72px 74px 76px 78px 80px 82px 84px 86px 88px 90px 92px 94px 94px 96px",
            codesample_languages: [{
                    text: 'HTML/XML',
                    value: 'markup'
                },
                {
                    text: 'JavaScript',
                    value: 'javascript'
                },
                {
                    text: 'CSS',
                    value: 'css'
                },
                {
                    text: 'PHP',
                    value: 'php'
                },
                {
                    text: 'Ruby',
                    value: 'ruby'
                },
                {
                    text: 'Python',
                    value: 'python'
                },
                {
                    text: 'Java',
                    value: 'java'
                },
                {
                    text: 'C',
                    value: 'c'
                },
                {
                    text: 'C#',
                    value: 'csharp'
                },
                {
                    text: 'C++',
                    value: 'cpp'
                }
            ],
            height: 600,
            setup: function(editor) {
                editor.on('Paste Change input Undo Redo', function() {
                    formchanged = 1;
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
                                }, {
                                    type: 'input',
                                    name: 'button_href',
                                    label: 'Button href',
                                    flex: true
                                }, {
                                    type: 'selectbox',
                                    name: 'button_target',
                                    label: 'Target',
                                    items: [{
                                            text: 'None',
                                            value: ''
                                        },
                                        {
                                            text: 'New window',
                                            value: '_blank'
                                        },
                                        {
                                            text: 'Self',
                                            value: '_self'
                                        },
                                        {
                                            text: 'Parent',
                                            value: '_parent'
                                        }
                                    ],
                                    flex: true
                                }, {
                                    type: 'selectbox',
                                    name: 'button_rel',
                                    label: 'Rel',
                                    items: [{
                                            text: 'No value',
                                            value: ''
                                        },
                                        {
                                            text: 'Alternate',
                                            value: 'alternate'
                                        },
                                        {
                                            text: 'Help',
                                            value: 'help'
                                        },
                                        {
                                            text: 'Manifest',
                                            value: 'manifest'
                                        },
                                        {
                                            text: 'No follow',
                                            value: 'nofollow'
                                        },
                                        {
                                            text: 'No opener',
                                            value: 'noopener'
                                        },
                                        {
                                            text: 'No referrer',
                                            value: 'noreferrer'
                                        },
                                        {
                                            text: 'Opener',
                                            value: 'opener'
                                        }
                                    ],
                                    flex: true
                                }, {
                                    type: 'selectbox',
                                    name: 'button_style',
                                    label: 'Style',
                                    items: [{
                                            text: 'Success',
                                            value: 'success'
                                        },
                                        {
                                            text: 'Info',
                                            value: 'info'
                                        },
                                        {
                                            text: 'Warning',
                                            value: 'warning'
                                        },
                                        {
                                            text: 'Error',
                                            value: 'error'
                                        }
                                    ],
                                    flex: true
                                }]
                            },
                            onSubmit: function(api) {

                                var html = '<a href="' + api.getData().button_href +
                                    '" class="btn btn-' + api.getData().button_style +
                                    '" rel="' + api.getData().button_rel +
                                    '" target="' + api.getData().button_target + '">' +
                                    api.getData().button_label + '</a>';

                                // insert markup
                                editor.insertContent(html);

                                // close the dialog
                                api.close();
                            },
                            buttons: [{
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

        $("#create-event-success-page-f_010").validate({
            rules: {
                no_purchase_made: {
                    required: true,
                },
                partial_purchase_made: {
                    required: true,
                },
                all_purchase_made: {
                    required: true,
                },
                invite_friend: {
                    required: true,
                }

            },
            messages: {
                no_purchase_made: {
                    required: 'Page title is required',
                    maxlength: 'Number of characters is more than 60. Reduce character count.'
                },
                partial_purchase_made: {
                    required: 'Share image is required',
                },
                all_purchase_made: {
                    required: 'Share title is required',
                },
                invite_friend: {
                    required: 'Share description is required',
                }
            },
            submitHandler: function(form) {
                return true;
            }
        });
        var isadd = '{{ $isadd }}';
        console.log(isadd);

        var $form = $('form'),
            origForm = $form.serialize();

        $('form :input').on('change input', function() {
            if ($form.serialize() !== origForm) {
                formchanged = 1;
                console.log(formchanged);
            }
        });
        $('div#admin-sidebar a').click(function() {
            var response = false;
            if (formchanged) {
                var answer = Swal.fire({
                    title: '',
                    icon: 'warning',
                    html: isadd ? 'Are you sure you want to leave this page  without saving?' :
                        "You have unsaved changes on this page. If you leave now, your changes will not be saved.",
                    showCloseButton: true,
                    showCancelButton: true,
                    focusConfirm: false,
                    confirmButtonText: 'Yes, Leave',
                    confirmButtonAriaLabel: 'Yes, Leave',
                    cancelButtonText: 'No, cancel',
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
