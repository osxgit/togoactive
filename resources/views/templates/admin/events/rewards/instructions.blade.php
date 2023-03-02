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
                                    {{$reward_instructions->meta_value}}
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
                                    {{$addon_instructions->meta_value}}
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
            selector: '#reward_instructions',
            height: 300,
            plugins: 'lists code emoticons',
            toolbar: 'undo redo | styleselect | bold italic | ' +
                'alignleft aligncenter alignright alignjustify | ' +
                'outdent indent | numlist bullist | emoticons',
            menubar: false,
            emoticons_append: {
                custom_mind_explode: {
                    keywords: ['brain', 'mind', 'explode', 'blown'],
                    char: '🤯'
                }
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
            setup: function(editor) {
                editor.on('Paste Change input Undo Redo', function () {
                    formchanged=1;
                    console.log(formchanged);
                });
            }
        });
        tinymce.init({
            selector: '#addon_instructions',
            height: 300,
            plugins: 'lists code emoticons',
            toolbar: 'undo redo | styleselect | bold italic | ' +
                'alignleft aligncenter alignright alignjustify | ' +
                'outdent indent | numlist bullist | emoticons',
            menubar: false,
            emoticons_append: {
                custom_mind_explode: {
                    keywords: ['brain', 'mind', 'explode', 'blown'],
                    char: '🤯'
                }
            },
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
            setup: function(editor) {
                editor.on('Paste Change input Undo Redo', function () {
                    formchanged=1;
                    console.log(formchanged);
                });
            }
        });



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
