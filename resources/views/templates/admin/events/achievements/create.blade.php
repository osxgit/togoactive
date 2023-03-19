<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <style>
        #div_faq{
            border:none !important;
        }
        .btn {
            display: inline-block;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }
        @media (prefers-reduced-motion: reduce) {
            .btn {
                transition: none;
            }
        }
        .btn:hover {
            color: #212529;
        }
        .btn-check:focus + .btn, .btn:focus {
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        .btn:disabled, .btn.disabled, fieldset:disabled .btn {
            pointer-events: none;
            opacity: 0.65;
        }

        .btn-primary {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .btn-primary:hover {
            color: #fff;
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }
        .btn-check:focus + .btn-primary, .btn-primary:focus {
            color: #fff;
            background-color: #0b5ed7;
            border-color: #0a58ca;
            box-shadow: 0 0 0 0.25rem rgba(49, 132, 253, 0.5);
        }
        .btn-check:checked + .btn-primary, .btn-check:active + .btn-primary, .btn-primary:active, .btn-primary.active, .show > .btn-primary.dropdown-toggle {
            color: #fff;
            background-color: #0a58ca;
            border-color: #0a53be;
        }
        .btn-check:checked + .btn-primary:focus, .btn-check:active + .btn-primary:focus, .btn-primary:active:focus, .btn-primary.active:focus, .show > .btn-primary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.25rem rgba(49, 132, 253, 0.5);
        }
        .btn-primary:disabled, .btn-primary.disabled {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-secondary {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            color: #fff;
            background-color: #5c636a;
            border-color: #565e64;
        }
        .btn-check:focus + .btn-secondary, .btn-secondary:focus {
            color: #fff;
            background-color: #5c636a;
            border-color: #565e64;
            box-shadow: 0 0 0 0.25rem rgba(130, 138, 145, 0.5);
        }
        .btn-check:checked + .btn-secondary, .btn-check:active + .btn-secondary, .btn-secondary:active, .btn-secondary.active, .show > .btn-secondary.dropdown-toggle {
            color: #fff;
            background-color: #565e64;
            border-color: #51585e;
        }
        .btn-check:checked + .btn-secondary:focus, .btn-check:active + .btn-secondary:focus, .btn-secondary:active:focus, .btn-secondary.active:focus, .show > .btn-secondary.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.25rem rgba(130, 138, 145, 0.5);
        }
        .btn-secondary:disabled, .btn-secondary.disabled {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-success {
            color: #fff;
            background-color: #198754;
            border-color: #198754;
        }
        .btn-success:hover {
            color: #fff;
            background-color: #157347;
            border-color: #146c43;
        }
        .btn-check:focus + .btn-success, .btn-success:focus {
            color: #fff;
            background-color: #157347;
            border-color: #146c43;
            box-shadow: 0 0 0 0.25rem rgba(60, 153, 110, 0.5);
        }
        .btn-check:checked + .btn-success, .btn-check:active + .btn-success, .btn-success:active, .btn-success.active, .show > .btn-success.dropdown-toggle {
            color: #fff;
            background-color: #146c43;
            border-color: #13653f;
        }
        .btn-check:checked + .btn-success:focus, .btn-check:active + .btn-success:focus, .btn-success:active:focus, .btn-success.active:focus, .show > .btn-success.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.25rem rgba(60, 153, 110, 0.5);
        }
        .btn-success:disabled, .btn-success.disabled {
            color: #fff;
            background-color: #198754;
            border-color: #198754;
        }

        .btn-info {
            color: #000;
            background-color: #0dcaf0;
            border-color: #0dcaf0;
        }
        .btn-info:hover {
            color: #000;
            background-color: #31d2f2;
            border-color: #25cff2;
        }
        .btn-check:focus + .btn-info, .btn-info:focus {
            color: #000;
            background-color: #31d2f2;
            border-color: #25cff2;
            box-shadow: 0 0 0 0.25rem rgba(11, 172, 204, 0.5);
        }
        .btn-check:checked + .btn-info, .btn-check:active + .btn-info, .btn-info:active, .btn-info.active, .show > .btn-info.dropdown-toggle {
            color: #000;
            background-color: #3dd5f3;
            border-color: #25cff2;
        }
        .btn-check:checked + .btn-info:focus, .btn-check:active + .btn-info:focus, .btn-info:active:focus, .btn-info.active:focus, .show > .btn-info.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.25rem rgba(11, 172, 204, 0.5);
        }
        .btn-info:disabled, .btn-info.disabled {
            color: #000;
            background-color: #0dcaf0;
            border-color: #0dcaf0;
        }

        .btn-warning {
            color: #000;
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .btn-warning:hover {
            color: #000;
            background-color: #ffca2c;
            border-color: #ffc720;
        }
        .btn-check:focus + .btn-warning, .btn-warning:focus {
            color: #000;
            background-color: #ffca2c;
            border-color: #ffc720;
            box-shadow: 0 0 0 0.25rem rgba(217, 164, 6, 0.5);
        }
        .btn-check:checked + .btn-warning, .btn-check:active + .btn-warning, .btn-warning:active, .btn-warning.active, .show > .btn-warning.dropdown-toggle {
            color: #000;
            background-color: #ffcd39;
            border-color: #ffc720;
        }
        .btn-check:checked + .btn-warning:focus, .btn-check:active + .btn-warning:focus, .btn-warning:active:focus, .btn-warning.active:focus, .show > .btn-warning.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.25rem rgba(217, 164, 6, 0.5);
        }
        .btn-warning:disabled, .btn-warning.disabled {
            color: #000;
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            color: #fff;
            background-color: #bb2d3b;
            border-color: #b02a37;
        }
        .btn-check:focus + .btn-danger, .btn-danger:focus {
            color: #fff;
            background-color: #bb2d3b;
            border-color: #b02a37;
            box-shadow: 0 0 0 0.25rem rgba(225, 83, 97, 0.5);
        }
        .btn-check:checked + .btn-danger, .btn-check:active + .btn-danger, .btn-danger:active, .btn-danger.active, .show > .btn-danger.dropdown-toggle {
            color: #fff;
            background-color: #b02a37;
            border-color: #a52834;
        }
        .btn-check:checked + .btn-danger:focus, .btn-check:active + .btn-danger:focus, .btn-danger:active:focus, .btn-danger.active:focus, .show > .btn-danger.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.25rem rgba(225, 83, 97, 0.5);
        }
        .btn-danger:disabled, .btn-danger.disabled {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-light {
            color: #000;
            background-color: #f8f9fa;
            border-color: #f8f9fa;
        }
        .btn-light:hover {
            color: #000;
            background-color: #f9fafb;
            border-color: #f9fafb;
        }
        .btn-check:focus + .btn-light, .btn-light:focus {
            color: #000;
            background-color: #f9fafb;
            border-color: #f9fafb;
            box-shadow: 0 0 0 0.25rem rgba(211, 212, 213, 0.5);
        }
        .btn-check:checked + .btn-light, .btn-check:active + .btn-light, .btn-light:active, .btn-light.active, .show > .btn-light.dropdown-toggle {
            color: #000;
            background-color: #f9fafb;
            border-color: #f9fafb;
        }
        .btn-check:checked + .btn-light:focus, .btn-check:active + .btn-light:focus, .btn-light:active:focus, .btn-light.active:focus, .show > .btn-light.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.25rem rgba(211, 212, 213, 0.5);
        }
        .btn-light:disabled, .btn-light.disabled {
            color: #000;
            background-color: #f8f9fa;
            border-color: #f8f9fa;
        }

        .btn-dark {
            color: #fff;
            background-color: #212529;
            border-color: #212529;
        }
        .btn-dark:hover {
            color: #fff;
            background-color: #1c1f23;
            border-color: #1a1e21;
        }
        .btn-check:focus + .btn-dark, .btn-dark:focus {
            color: #fff;
            background-color: #1c1f23;
            border-color: #1a1e21;
            box-shadow: 0 0 0 0.25rem rgba(66, 70, 73, 0.5);
        }
        .btn-check:checked + .btn-dark, .btn-check:active + .btn-dark, .btn-dark:active, .btn-dark.active, .show > .btn-dark.dropdown-toggle {
            color: #fff;
            background-color: #1a1e21;
            border-color: #191c1f;
        }
        .btn-check:checked + .btn-dark:focus, .btn-check:active + .btn-dark:focus, .btn-dark:active:focus, .btn-dark.active:focus, .show > .btn-dark.dropdown-toggle:focus {
            box-shadow: 0 0 0 0.25rem rgba(66, 70, 73, 0.5);
        }
        .btn-dark:disabled, .btn-dark.disabled {
            color: #fff;
            background-color: #212529;
            border-color: #212529;
        }
        .tox-tinymce{
            width:100%;
        }
        .mce-notification-warning, .tox-notifications-container{
            display: none;
        }
        .mce-statusbar, .tox-statusbar{
            display: none !important;

        }
        #div_description{
            border:none !important;
        }
        .tagify {
            border:none !important;
            height: 130px;
        }
        .peer:checked~.peer-checked\:bg-purple-600 {
            --tw-bg-opacity: 1;
            background-color: rgb(147 51 234 / var(--tw-bg-opacity)) !important;
        }
        label.error{

            color:red;
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
        }

        #div_event_detail{
            border:none !important;
        }
        #sponsor_detail{
            border:none !important;
        }
    </style>
    @include('layouts.admin.events.subheader')
    <div class="w-full flex flex-col sm:flex-row flex-grow overflow-hidden bg-light-gray-bg">
        @include('layouts.admin.events.sidebar')
        <main role="main" class="w-full h-full flex-grow p-3 overflow-auto">
            <div class="float-left w-full max-w-screen-xl">
                <x-admin.breadcrumb>
                    <x-slot name="header">
                        @if ($achievement === null) New Achievement  @else Edit Achievement @endif
                    </x-slot>
                    <x-slot name="breadcrumb">
                        <a class="text-primary font-poppins-semibold text-sm" href="">Events</a> >
                        <a class="text-nav-gray font-poppins text-sm" href="{{route('admin.events.info.essentials',$id)}}">
                            {{$event->name ?? "Untitled"}}
                        </a> >
                        <a class="text-nav-gray font-poppins text-sm" href="{{route('admin.events.achievements.list',$id)}}">
                            Achievements Manager
                        </a> >
                        <span class="text-nav-gray font-poppins text-sm">
                            @if ($achievement === null) New Achievement  @else Edit Achievement @endif
                        </span>
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

                <form method="POST" id="create-events-achievement" name="create-event-achievement" action="{{route('admin.events.achievements.store', array($id))}}" class="w-full float-left" autocomplete="false" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="challengeId" id="challengeId" value="{{$id}}">

                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Achievement Info*
                        </x-slot>
                        <x-slot name="section_button"></x-slot>
                        <x-slot name="section_heading_description_status"></x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">
                            <div class="float-left w-full ">
                                <div id="icon-label" class="float-left pr-2 mt-4">
                                    <label for="icon" class="float-left w-full mt-4 text-lg text-placeholder font-poppins-bold">
                                        Icon*
                                        <span class="font-poppins">(1:1 ratio)</span>
                                    </label>
                                    <x-forms.image_uploader>
                                        <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                        <x-slot name="uploder_description">  SVG, PNG, JPG (MIN: 150x150px)</x-slot>
                                        <x-slot name="field_id">icon_uploader</x-slot>
                                        <x-slot name="uploaded_img"></x-slot>
                                    </x-forms.image_uploader>

                                    <x-forms.file_input name="icon">
                                        <x-slot name="width">150</x-slot>
                                        <x-slot name="height">150</x-slot>
                                        <x-slot name="field_id">icon</x-slot>
                                    </x-forms.file_input>
                                </div>
                                <div id="title-label" class="w-full">
                                    <x-forms.textfield name="title">
                                        <x-slot name="field_id">title</x-slot>
                                        <x-slot name="label_text">Title*</x-slot>
                                        <x-slot name="label_description"></x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                    </x-text-input>
                                </div>
                                <div id="achievement-description-label" class="w-full">
                                    <x-forms.textarea name="description">
                                        <x-slot name="field_id">achievement-description</x-slot>
                                        <x-slot name="label_text">Description*</x-slot>
                                        <x-slot name="label_description"></x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                    </x-text-input>
                                </div>
                            </div>
                        </x-slot>
                    </x-forms.section>
                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Category*
                        </x-slot>
                        <x-slot name="section_button"></x-slot>
                        <x-slot name="section_heading_description_status"></x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">
                            <div class="float-left w-full ">
                                <x-forms.select id="achievement_type" name="type[]" multiple>
                                    <x-slot name="field_id">achievement_type</x-slot>
                                    <x-slot name="label_text">Achievement type*</x-slot>
                                    <x-slot name="label_description_status"></x-slot>
                                    <x-slot name="label_description"></x-slot>
                                    <x-slot name="options">
                                        <option value="" >--Select Type--</option>
                                        <option value="Individual">
                                            Individual
                                        </option>
                                        <option value="Team'">
                                            Team
                                        </option>
                                        <option value="Indoor">
                                            Indoor
                                        </option>
                                        <option value="Outdoor">
                                            Outdoor
                                        </option>
                                    </x-slot>
                                </x-forms.select>
                                <x-forms.select id="achievement_level" name="level">
                                    <x-slot name="field_id">achievement_level</x-slot>
                                    <x-slot name="label_text">Achievement level*</x-slot>
                                    <x-slot name="label_description_status"></x-slot>
                                    <x-slot name="label_description"></x-slot>
                                    <x-slot name="options">
                                        <option value="" >--Select Level--</option>
                                        <option value="Easy">
                                            Easy
                                        </option>
                                        <option value="Intermediate'">
                                            Intermediate
                                        </option>
                                        <option value="Difficult">
                                            Difficult
                                        </option>
                                        <option value="Insane">
                                            Insane
                                        </option>
                                    </x-slot>
                                </x-forms.select>
                            </div>
                        </x-slot>
                    </x-forms.section>
                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            "More Info" Modal Pop-up
                        </x-slot>
                        <x-slot name="section_button"></x-slot>
                        <x-slot name="section_heading_description_status"></x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">
                            <div class="float-left w-full">
                                <div class="float-left mt-4">
                                    <x-forms.toggle id="more_info_toggle" name="is_more_info_enabled"  value="0" >
                                        <x-slot name="field_id">more_info_toggle</x-slot>
                                        <x-slot name="label_text">Enable More Info” Modal Pop-up  </x-slot>
                                        <x-slot name="label_description">
                                            By enabling this, you'll be able to display additional information about this achievement
                                        </x-slot>
                                    </x-forms.toggle>
                                </div>
                                <div id="more-info-content" class="float-left mt-4 hidden w-full">
                                    <div class="w-1/2">
                                        <h1 class="float-left w-full font-poppins-bold text-2xl">
                                            <span>“More Info” Modal Pop-up</span>
                                        </h1>
                                        <label for="more_info_image_uploader" class="float-left w-full mt-4 text-lg text-placeholder font-poppins-bold">
                                            Image*
                                            <span class="font-poppins">(1280 x 640 px)</span>
                                        </label>
                                        <x-forms.image_uploader>
                                            <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                            <x-slot name="uploder_description">  SVG, PNG, JPG (MIN: 1280x640px)</x-slot>
                                            <x-slot name="field_id">more_info_image_uploader</x-slot>
                                            <x-slot name="uploaded_img"></x-slot>
                                        </x-forms.image_uploader>

                                        <x-forms.file_input name="more_info_image">
                                            <x-slot name="width">1280</x-slot>
                                            <x-slot name="height">640</x-slot>
                                            <x-slot name="field_id">more_info_image</x-slot>
                                        </x-forms.file_input>
                                    </div>
                                    <div id="more-info-description-label" class="w-full">
                                        <x-forms.textarea name="more_info_description">
                                            <x-slot name="field_id">more_info_description</x-slot>
                                            <x-slot name="label_text">Description*</x-slot>
                                            <x-slot name="label_description"></x-slot>
                                            <x-slot name="label_description_status"></x-slot>
                                        </x-text-input>
                                    </div>
                                </div>
                            </div>
                        </x-slot>
                    </x-forms.section>
                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Communication - Email*
                        </x-slot>
                        <x-slot name="section_button">
                            <button
                                type="button"
                                style="color: #7E1FF6 !important;border: 1px solid #7E1FF6;
                                padding: 0px 5px; border-radius: 5px;
                                font-weight: bold; font-size: 14px; float: right;  width: max-content;"
                                onclick=""
                            >
                                Send test email
                            </button>
                        </x-slot>
                        <x-slot name="section_heading_description_status"></x-slot>
                        <x-slot name="section_heading_description_text">The following communication will be triggered when the achievement is unlocked</x-slot>
                        <x-slot name="section_content">
                            <div class="float-left w-full">
                                <div id="email-subject-label" class="w-full">
                                    <x-forms.textfield name="email_subject">
                                        <x-slot name="field_id">email_subject</x-slot>
                                        <x-slot name="label_text">Email Subject</x-slot>
                                        <x-slot name="label_description"></x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                    </x-text-input>
                                </div>
                                <div id="email-text-label" class="w-full">
                                    <x-forms.textarea name="email_text">
                                        <x-slot name="field_id">email_text</x-slot>
                                        <x-slot name="label_text">Body</x-slot>
                                        <x-slot name="label_description"></x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                    </x-text-input>
                                </div>
                            </div>
                        </x-slot>
                    </x-forms.section>
                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Communication - Notification*
                        </x-slot>
                        <x-slot name="section_button">
                            <button onclick="showNotificationPreview()"
                                type="button" id="notification_preview_button"
                                style="color: #7E1FF6 !important;border: 1px solid #7E1FF6;
                                padding: 0px 5px; border-radius: 5px;
                                font-weight: bold; font-size: 14px; float: right;  width: max-content;"
                            >
                                Preview notification
                            </button>
                        </x-slot>
                        <x-slot name="section_heading_description_status"></x-slot>
                        <x-slot name="section_heading_description_text">The following communication will be triggered when the achievement is unlocked</x-slot>
                        <x-slot name="section_content">
                            <div class="float-left w-full">
                                <div id="notification-title-label" class="w-full">
                                    <x-forms.textfield name="notification_title">
                                        <x-slot name="field_id">notification_title</x-slot>
                                        <x-slot name="label_text">Notification Title</x-slot>
                                        <x-slot name="label_description"></x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                    </x-text-input>
                                </div>
                                <div id="notification-description-label" class="w-full">
                                    <x-forms.textarea name="notification_description">
                                        <x-slot name="field_id">notification_description</x-slot>
                                        <x-slot name="label_text">Text</x-slot>
                                        <x-slot name="label_description"></x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                    </x-text-input>
                                </div>
                                <div id="notification-type-label" class="w-full">
                                    <label for="notification-type-options" class="float-left w-full mt-4 text-lg text-placeholder font-poppins-bold">
                                        Select the type of notification*
                                    </label>
                                    <div id="notification-type-options">
                                        <input type="radio" name="notification_type" id="notification_type_a" value="Type A" class="w-4 h-4 text-purple-700	 bg-gray-100 border-gray-300 focus:ring-0 focus:ring-offset-0 dark:bg-gray-700 dark:border-gray-600" />
                                        <label for="notification_type_a" class="mt-4 text-placeholder font-poppins">
                                            Type A
                                        </label>
                                        <input type="radio" name="notification_type" id="notification_type_b" value="Type B" class="w-4 h-4 ml-4 text-purple-700	 bg-gray-100 border-gray-300 focus:ring-0 focus:ring-offset-0 dark:bg-gray-700 dark:border-gray-600" />
                                        <label for="notification_type_b" class="mt-4 text-placeholder font-poppins">
                                            Type B
                                        </label>
                                    </div>
                                </div>
                                <div id="notification-type-a-label" class="float-left hidden w-full">
                                    <div id="destination-url-label" class="w-full">
                                        <x-forms.textfield name="notification_destination_url">
                                            <x-slot name="field_id">notification_destination_url</x-slot>
                                            <x-slot name="label_text">Destination URL*</x-slot>
                                            <x-slot name="label_description"></x-slot>
                                            <x-slot name="label_description_status"></x-slot>
                                        </x-text-input>
                                    </div>
                                </div>
                                <div id="notification-type-b-label" class="float-left hidden w-full mt-4">
                                    <div class="w-1/2">
                                        <h1 class="float-left w-full font-poppins-bold text-2xl">
                                            <span>Type B notifications*</span>
                                        </h1>
                                        <label for="notification_type_b_image_uploader" class="float-left w-full mt-4 text-lg text-placeholder font-poppins-bold">
                                            Hero Image*
                                            <span class="font-poppins">(1280 x 600 px)</span>
                                            <p class="font-poppins">This image will be shown on all notifications</p>
                                        </label>
                                        <x-forms.image_uploader>
                                            <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                            <x-slot name="uploder_description">  SVG, PNG, JPG (MIN: 1280x600px)</x-slot>
                                            <x-slot name="field_id">notification_type_b_image_uploader</x-slot>
                                            <x-slot name="uploaded_img"></x-slot>
                                        </x-forms.image_uploader>

                                        <x-forms.file_input name="notification_hero_image">
                                            <x-slot name="width">1280</x-slot>
                                            <x-slot name="height">600</x-slot>
                                            <x-slot name="field_id">notification_hero_image</x-slot>
                                        </x-forms.file_input>
                                    </div>
                                    <div id="enable-primary-cta-button-label" class="float-left mt-4 w-full">
                                        <x-forms.toggle id="primary_cta_toggle" name="is_primary_cta_enabled"  value="0" >
                                            <x-slot name="field_id">primary_cta_toggle</x-slot>
                                            <x-slot name="label_text">Enable primary CTA button</x-slot>
                                            <x-slot name="label_description"></x-slot>
                                        </x-forms.toggle>
                                    </div>
                                    <div id="primary-cta-button-label" class="float-left ml-5 pl-1 w-1/2">
                                        <div id="primary_cta_button_text" class="w-full">
                                            <x-forms.textfield name="primary_cta_button_text">
                                                <x-slot name="field_id">primary-cta-button-text</x-slot>
                                                <x-slot name="label_text">CTA button text*</x-slot>
                                                <x-slot name="label_description"></x-slot>
                                                <x-slot name="label_description_status"></x-slot>
                                            </x-text-input>
                                        </div>
                                        <div id="primary_cta_link" class="w-full">
                                            <x-forms.textfield name="primary_cta_link">
                                                <x-slot name="field_id">primary_cta_link</x-slot>
                                                <x-slot name="label_text">Link*</x-slot>
                                                <x-slot name="label_description"></x-slot>
                                                <x-slot name="label_description_status"></x-slot>
                                            </x-text-input>
                                        </div>
                                        <div id="secondary_cta_button_enable" class="float-left w-full mt-4">
                                            <a href="#" id="enable_secondary_cta_button" class="text-primary font-poppins-semibold text-sm mt-4">
                                                <i class="fa-plus"></i>
                                                <span>secondary CTA button</span>
                                            </a>
                                        </div>
                                        <div class="float-left w-full hidden">
                                            <div id="secondary-cta-button-text-label" class="float-left w-full">
                                                <div id="secondary_cta_button_text" class="w-full">
                                                    <x-forms.textfield name="secondary_cta_button_text">
                                                        <x-slot name="field_id">secondary-cta-button-text</x-slot>
                                                        <x-slot name="label_text">CTA button text*</x-slot>
                                                        <x-slot name="label_description"></x-slot>
                                                        <x-slot name="label_description_status"></x-slot>
                                                    </x-text-input>
                                                </div>
                                            </div>
                                            <div id="secondary-cta-link-label" class="float-left w-full">
                                                <div id="secondary_cta_link" class="w-full">
                                                    <x-forms.textfield name="secondary_cta_link">
                                                        <x-slot name="field_id">secondary_cta_link</x-slot>
                                                        <x-slot name="label_text">Link*</x-slot>
                                                        <x-slot name="label_description"></x-slot>
                                                        <x-slot name="label_description_status"></x-slot>
                                                    </x-text-input>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="enable-share-option-label" class="float-left mt-4 w-full">
                                        <x-forms.toggle id="share_option_toggle" name="is_share_option_enabled"  value="0" >
                                            <x-slot name="field_id">share_option_toggle</x-slot>
                                            <x-slot name="label_text">Enable share option</x-slot>
                                            <x-slot name="label_description">This will allow you to create an share option for the notification </x-slot>
                                        </x-forms.toggle>
                                    </div>
                                    <div id="share-option-link-label" class="float-left ml-5 pl-1 w-1/2 hidden">
                                        <div id="secondary-cta-link-label" class="float-left w-full">
                                            <div id="secondary_cta_link" class="w-full">
                                                <x-forms.textfield name="enable_share_option_link">
                                                    <x-slot name="field_id">enable_share_option_link</x-slot>
                                                    <x-slot name="label_text">Link*</x-slot>
                                                    <x-slot name="label_description"></x-slot>
                                                    <x-slot name="label_description_status"></x-slot>
                                                </x-text-input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </x-slot>
                    </x-forms.section>
                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Sponsored content
                        </x-slot>
                        <x-slot name="section_button"></x-slot>
                        <x-slot name="section_heading_description_status"></x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">
                            <div class="float-left w-full">
                                <div id="enable-sponsor-content-label" class="float-left mt-4 w-full">
                                    <x-forms.toggle id="sponsor_content_toggle" name="is_sponsor_content_enabled"  value="0" >
                                        <x-slot name="field_id">sponsor_content_toggle</x-slot>
                                        <x-slot name="label_text">Enable sponsor content</x-slot>
                                        <x-slot name="label_description">By enabling this, you'll be able to display information about sponsor content</x-slot>
                                    </x-forms.toggle>
                                </div>
                                <div id="sponsor-content-label" class="float-left ml-5 pl-1 w-full hidden">
                                    <div id="sponsor-content-image-label" class="float-left w-1/2">
                                        <label for="notification_type_b_image_uploader" class="float-left w-full mt-4 text-lg text-placeholder font-poppins-bold">
                                            Image*
                                            <span class="font-poppins">(300 x 150 px)</span>
                                        </label>
                                        <x-forms.image_uploader>
                                            <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                            <x-slot name="uploder_description">  SVG, PNG, JPG (MIN: 300x150px)</x-slot>
                                            <x-slot name="field_id">sponsored_content_image_uploader</x-slot>
                                            <x-slot name="uploaded_img"></x-slot>
                                        </x-forms.image_uploader>

                                        <x-forms.file_input name="sponsor_content_image">
                                            <x-slot name="width">300</x-slot>
                                            <x-slot name="height">150</x-slot>
                                            <x-slot name="field_id">sponsor_content_image</x-slot>
                                        </x-forms.file_input>
                                    </div>
                                    <div id="sponsor-content-text-label" class="float-left w-full">
                                        <x-forms.textarea name="sponsor_content_text">
                                            <x-slot name="field_id">sponsor_content_text</x-slot>
                                            <x-slot name="label_text">Text*</x-slot>
                                            <x-slot name="label_description"></x-slot>
                                            <x-slot name="label_description_status"></x-slot>
                                        </x-text-input>
                                    </div>
                                </div>
                            </div>
                        </x-slot>
                    </x-forms.section>
            </div>
        </main>
    </div>
    <div class="float-left w-full text-right" style="position: sticky;
    bottom: 0;background: white;    padding: 20px;">
        <x-forms.submit type="button" value="Save" name="event_achievement_save" id="event_achievement_save">
            Save
        </x-forms.submit>
    </div>

    </form>

    <div class="modal fade" id="notification_type_a_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div id="notification_a_time">
                    Just now
                </div>
                <div id="notification_a_body" class="flex">
                    <div class="w-40">
                        <img id="icon_image_modal" src="/images/dummy.png" />
                    </div>
                    <div id="notification_a_content">
                        <div id="notification_a_header">
                            Nice header here
                        </div>
                        <div id="notification_a_text">
                            Hey! Congrats! You ahieved a lot! Keep up and get more achievements!
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="notification_type_b_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <input type="hidden" id="imgtype" value=''>
                        <input type="hidden" id="height" value=''>
                        <input type="hidden" id="width" value=''>
                        <div class="row">
                            <div class="col-md-8">
                                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <input type="hidden" id="imgtype" value=''>
                        <input type="hidden" id="height" value=''>
                        <input type="hidden" id="width" value=''>
                        <div class="row">
                            <div class="col-md-8">
                                <img id="image" src="https://avatars0.githubusercontent.com/u/3456749" alt="No image">
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="crop">Crop</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        jQuery.noConflict();

        jQuery(document).ready(function() {
            var formchanged = 0;

            function drag(ev) {
                ev.dataTransfer.setData('Text/html', ev.target.id);
            }

            var $modal = jQuery('#modal');
            var $modalNotificationA = jQuery('#notification_type_a_modal');
            var $modalNotificationB = jQuery('#notification_type_b_modal');
            var image = document.getElementById('image');
            var cropper;
            var $previewModal = jQuery('#previewModal');
            imgwidth='';
            imgheight='';

            $modal.one('shown.bs.modal', function () {

                if(imgwidth < width  ||  imgheight < height){
                    $modal.modal("hide");
                }

                cropper = new Cropper(image, {
                    aspectRatio: jQuery('#width').val() / jQuery('#height').val(),
                    viewMode: 3,
                    preview: '.preview',
                    minCropBoxWidth: jQuery('#width').val(),
                    minCropBoxHeight: jQuery('#height').val(),

                    data: {
                        width: jQuery('#width').val(),
                        height: jQuery('#height').val(),
                    }
                });

            }).on('hidden.bs.modal', function () {
                cropper.destroy();
                cropper = null;
            });

            jQuery('#icon-label').on('drop', function(ev) {
                formchanged=1;
                ev.preventDefault();
                console.log(target.id, ev.target.id);
                element=target.id;
                const myArray = element.split("-");
                let elementid = myArray[0];
                console.log(elementid);
                var url = ev.dataTransfer.getData('text/plain');
                // for img elements, url is the img src so
                // create an Image Object & draw to canvas
                if(url){
                    var img = new Image();
                    img.onload = function(){ctx.drawImage(this,0,0);}
                    img.src = url;
                    // for img file(s), read the file & draw to canvas
                }else{
                    document.querySelector('#'+elementid).files = ev.dataTransfer.files;

                    handleFiles(ev.dataTransfer.files, elementid);
                }
            });

            jQuery('#icon-label').on('dragover', function(ev) {
                ev.preventDefault();
            });

            function showNotificationPreview() {
                console.log(jQuery('input[name=notification_type]').val());
                if (!jQuery('input[name=notification_type]:first').prop('checked') && !jQuery('input[name=notification_type]:last').prop('checked')) {
                    alert('Please select notification type.');
                    return;
                }

                $modalNotification = jQuery('input[name=notification_type]:first').prop('checked') === true
                    ? $modalNotificationA.modal('show') : $modalNotificationB.modal('show');
            };

            function handleFiles(files, elementid) {
                console.log('in handle files');
                var imgtype= elementid;
                var _URL = window.URL || window.webkitURL;
                var file, img;
                if ((file = files[0])) {
                    img = new Image();
                    var objectUrl = _URL.createObjectURL(file);
                    img.onload = function () {
                        jQuery('#imgtype').val(imgtype);
                        var height =  jQuery('#'+imgtype).data("height");
                        var width =  jQuery('#'+imgtype).data("width");
                        imgwidth=this.width;
                        imgheight=this.height;
                        console.log(imgwidth);
                        if(this.width < width  ||  this.height < height){
                            jQuery("#imgerror-"+imgtype).css('display','block')
                            if(jQuery('#modal').is(':visible')){
                                jQuery("#modal").modal('hide');
                            }
                        }  else{
                            jQuery("#imgerror-"+imgtype).css('display','none');

                        }
                        _URL.revokeObjectURL(objectUrl);
                    };
                    img.src = objectUrl;
                }

                // var files = e.target.files;
                var imgtype= elementid;

                jQuery('#imgtype').val(imgtype);
                height =  jQuery('#'+imgtype).data("height");
                width =  jQuery('#'+imgtype).data("width");
                jQuery('#height').val(height);
                jQuery('#width').val(width);

                var done = function (url) {
                    image.src = url;

                    $modal.modal('show');



                };
                var reader;
                var file;
                var url;
                if (files && files.length > 0) {
                    file = files[0];
                    if (URL) {
                        done(URL.createObjectURL(file));
                    } else if (FileReader) {
                        reader = new FileReader();
                        reader.onload = function (e) {
                            done(reader.result);
                        };
                        reader.readAsDataURL(file);
                    }

                }
            }

            jQuery("body").on("change", ".image", function(e){
                formchanged=1;

                var imgtype = jQuery(this).attr('id');
                var _URL = window.URL || window.webkitURL;
                var file, img;
                if ((file = this.files[0])) {
                    console.log(this.files);
                    img = new Image();
                    var objectUrl = _URL.createObjectURL(file);
                    console.log(img);
                    img.onload = function () {
                        jQuery('#imgtype').val(imgtype);
                        var height =  jQuery('#'+imgtype).data("height");
                        var width =  jQuery('#'+imgtype).data("width");
                        imgwidth = this.width;
                        imgheight = this.height;
                        console.log('image width:' + imgwidth);
                        if(this.width < width  ||  this.height < height){
                            jQuery("#imgerror-"+imgtype).css('display','block')
                            if(jQuery('#modal').is(':visible')){
                                jQuery("#modal").modal('hide');
                            }
                        }  else{
                            jQuery("#imgerror-"+imgtype).css('display','none');

                        }
                        _URL.revokeObjectURL(objectUrl);
                    };
                    img.src = objectUrl;
                }

                var files = e.target.files;
                var imgtype = jQuery(this).attr('id');

                jQuery('#imgtype').val(imgtype);
                height =  jQuery('#'+imgtype).data("height");
                width =  jQuery('#'+imgtype).data("width");
                jQuery('#height').val(height);
                jQuery('#width').val(width);

                var done = function (url) {
                    jQuery(image).prop('src', url);

                    console.log(image);

                    $modal.modal('show');
                };

                var reader;
                var file;
                var url;
                if (files && files.length > 0) {
                    file = files[0];
                    if (URL) {
                        done(URL.createObjectURL(file));
                    } else if (FileReader) {
                        reader = new FileReader();
                        reader.onload = function (e) {
                            done(reader.result);
                        };
                        reader.readAsDataURL(file);
                    }

                }

            });

            jQuery("#crop").click(function(){
                var width=jQuery('#width').val();
                var height=jQuery('#height').val();

                canvas = cropper.getCroppedCanvas({
                    width: width,
                    height: height,
                });
                canvas.toBlob(function(blob) {
                    url = URL.createObjectURL(blob);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function() {
                        var base64data = reader.result;

                        $.ajax({
                            type: "POST",
                            dataType: "json",
                            url: "{{route('ajax.upload-file')}}",
                            data: {'_token':  jQuery('input[name="_token"]').val(), 'image': base64data,'eventId':jQuery('#challengeId').val(),'idd':jQuery('#imgtype').val()},
                            success: function(data){
                                console.log(data);
                                $modal.modal('hide');
                                uploadFileResponse(data,jQuery('#imgtype').val())
                                //alert("Crop image successfully uploaded");
                            }
                        });
                    }
                });
            });

            function uploadFileResponse(response,idd){

                jQuery("#label-"+idd).removeClass('opacity-30');
                if(response.err == 1){
                    showErrorModal("Upload was failed. Please try again!");
                    return false;
                }
                jQuery("#path-"+response.data.idd).val(response.data.path);

                const arr = ['cover','icon','profile_icon','ebib','certificate','notification'];
                if(idd){
                    jQuery("#label-"+response.data.idd).css('background-image','url('+response.data.fullpath+')');
                    jQuery("#label-"+response.data.idd).css('border','none');

                    jQuery("#span-"+response.data.idd+"-add").css('visibility','hidden');
                    jQuery("#span-"+response.data.idd+"-edit").css('visibility','visible');
                }else if(idd == 'list_upload' || idd == 'geojson_upload'){
                    jQuery("#label-"+idd+" input[type='text']").val(response.data.path);
                }

            }

            function previewModal(imgname, title, description){
                console.log(imgname);
                console.log(title);
                console.log(description);
                jQuery('.preview-modal-title').html(title);
                jQuery('.preview-modal-desc').html(description);
                var img_url = "/images/"+imgname+".png";
                jQuery('.preview-img').prop('src', img_url);
                $previewModal.modal('show');
            }

            var $form = jQuery('form'),
            origForm = $form.serialize();

            jQuery('form :input').on('change input', function() {
                if($form.serialize() !== origForm){
                    formchanged=1;
                    console.log(formchanged);
                }
            });

            jQuery('div#admin-sidebar a').click(function(){
                var response=false;
                if(formchanged){
                    var answer =Swal.fire({
                        title: '',
                        icon: 'warning',
                        html: 'Are you sure you want to leave this page  without saving?',
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

            jQuery("#more_info_toggle").on('click', function() {
                if (jQuery("#more_info_toggle").is(':checked')) {
                    jQuery("#more-info-content").removeClass('hidden');
                    jQuery("#more_info_toggle").prop('checked', true);
                    jQuery("#more_info_toggle").prop('value', 1);
                } else {
                    jQuery("#more-info-content").addClass('hidden');
                    jQuery("#more_info_toggle").prop('checked', false);
                    jQuery("#more_info_toggle").prop('value', 0);
                }
            });

            jQuery('input[name=notification_type]').on('click', function() {
                jQuery(this).prop('checked', true);
                console.log(jQuery(this).val());
                console.log(jQuery('input[name=notification_type]:first').val());
                console.log(jQuery('input[name=notification_type]:last').val());

                if (jQuery(this).val() === 'Type A') {
                    if (!jQuery('#notification-type-b-label').hasClass('hidden')) {
                        jQuery('#notification-type-b-label').addClass('hidden');
                    }

                    jQuery('#notification-type-a-label').removeClass('hidden');
                } else {
                    if (!jQuery('#notification-type-a-label').hasClass('hidden')) {
                        jQuery('#notification-type-a-label').addClass('hidden');
                    }

                    jQuery('#notification-type-b-label').removeClass('hidden');
                }
            });
        });

        jQuery('#event_achievement_save').click(function(){
            jQuery('#create-event-achievement').submit();
        });
    </script>
</x-app-layout>
