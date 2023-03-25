<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.css"/>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js?apiKey=4rcnfqnlzfiuwfia3kjfez410ye1smutxh8kj2i126izgth4/tinymce"></script>

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

        .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
            width: 100%;
            position: relative;
            bottom: 3px;
        }

        .bootstrap-select.show-tick .dropdown-menu .selected span.check-mark {
            color: #7E1FF6D9;
        }

        #notification_a_content {
            width: 500px;
        }

        #notification_a_preview {
            background-color: #e6e6fa;
        }

        #notification_a_time {
            text-align: right;
        }

        .challenge-dates {
            background-color: #158B76;
            color: #ffffff;
            padding: 8px;
            font-size: 0.95rem;
        }
    </style>

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
                @php
                    $route = isset($achievement)
                        ? route('admin.events.achievements.update', [$id, $achievement->id])
                        : route('admin.events.achievements.store', [$id])
                @endphp
                <form method="POST" id="create-events-achievement" name="create-event-achievement" action="{{ $route }}" class="w-full float-left" autocomplete="false" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="challengeId" id="challengeId" value="{{$id}}">
                    <input type="hidden" name="event_id" id="event_id" value="{{$id}}">

                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Achievement Info*
                        </x-slot>
                        <x-slot name="section_button"></x-slot>
                        <x-slot name="section_heading_description_status"></x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">
                            <div class="float-left w-full ">
                                <div id="achievement_icon-label" class="float-left pr-2 mt-4">
                                    <label for="achievement_icon" class="float-left w-full mt-4 text-lg text-placeholder font-poppins-bold">
                                        Icon*
                                        <span class="font-poppins">(1:1 ratio)</span>
                                    </label>

                                    @if (!isset($achievement))
                                        <x-forms.image_uploader>
                                            <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                            <x-slot name="uploder_description">  SVG, PNG, JPG (MIN: 150x150px)</x-slot>
                                            <x-slot name="field_id">achievement_icon</x-slot>
                                            <x-slot name="uploaded_img"></x-slot>
                                        </x-forms.image_uploader_edit>
                                    @else
                                        <x-forms.image_uploader_edit>
                                            <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                            <x-slot name="uploder_description">  SVG, PNG, JPG (MIN: 150x150px)</x-slot>
                                            <x-slot name="field_id">achievement_icon</x-slot>
                                            <x-slot name="uploaded_img">{{ str_replace('https://static.togoactive.com/', '', $achievement->icon) }}</x-slot>
                                        </x-forms.image_uploader>
                                    @endif

                                    <x-forms.file_input name="icon_file">
                                        <x-slot name="width">1280</x-slot>
                                        <x-slot name="height">640</x-slot>
                                        <x-slot name="field_id">achievement_icon</x-slot>
                                    </x-forms.file_input>
                                    <input type="hidden" name="icon" id="icon" value="{{ isset($achievement) ? $achievement->icon : '' }}" />
                                </div>
                                <div id="title-label" class="w-full">
                                    <x-forms.textfield name="title" value="{{ isset($achievement) ? $achievement->title : '' }}">
                                        <x-slot name="field_id">title</x-slot>
                                        <x-slot name="label_text">Title*</x-slot>
                                        <x-slot name="label_description"></x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                    </x-forms.textfield>
                                </div>
                                <div id="achievement-description-label" class="w-full">
                                    <x-forms.textarea name="description">
                                        <x-slot name="field_id">achievement-description</x-slot>
                                        <x-slot name="label_text">Description*</x-slot>
                                        <x-slot name="label_description"></x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        {{ isset($achievement) ? $achievement->description : '' }}
                                    </x-forms.textarea>
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
                            <div class="float-left w-1/2 ">
                                @php $types = isset($achievement) ? explode(',', $achievement->type) : []; @endphp
                                <x-forms.select id="achievement_type" name="type[]" class="selectpicker" multiple>
                                    <x-slot name="field_id">achievement_type</x-slot>
                                    <x-slot name="label_text">Achievement type*</x-slot>
                                    <x-slot name="label_description_status"></x-slot>
                                    <x-slot name="label_description"></x-slot>
                                    <x-slot name="options">
                                        <option value="Individual" {{ in_array('Individual', $types) ? 'selected' : '' }}>
                                            Individual
                                        </option>
                                        <option value="Team" {{ in_array('Team', $types) ? 'selected' : '' }}>
                                            Team
                                        </option>
                                        <option value="Indoor" {{ in_array('Indoor', $types) ? 'selected' : '' }}>
                                            Indoor
                                        </option>
                                        <option value="Outdoor" {{ in_array('Outdoor', $types) ? 'selected' : '' }}>
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
                                        <option value="Easy" {{ isset($achievement) && $achievement->level === 'Easy' ? 'selected' : '' }}>
                                            Easy
                                        </option>
                                        <option value="Intermediate" {{ isset($achievement) && $achievement->level === 'Intermediate' ? 'selected' : '' }}>
                                            Intermediate
                                        </option>
                                        <option value="Difficult" {{ isset($achievement) && $achievement->level === 'Difficult' ? 'selected' : '' }}>
                                            Difficult
                                        </option>
                                        <option value="Insane" {{ isset($achievement) && $achievement->level === 'Insane' ? 'selected' : '' }}>
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
                                    <x-forms.toggle id="more_info_toggle" name="is_more_info_enabled"  value="{{ isset($achievement) && $achievement->is_more_info_enabled === 1 ? $achievement->is_more_info_enabled : 0 }}">
                                        <x-slot name="field_id">more_info_toggle</x-slot>
                                        <x-slot name="label_text">Enable More Info” Modal Pop-up  </x-slot>
                                        <x-slot name="label_description">
                                            By enabling this, you'll be able to display additional information about this achievement
                                        </x-slot>
                                    </x-forms.toggle>
                                </div>
                                <div id="more-info-content" class="float-left mt-4 hidden w-full">
                                    <div id="achcievement_more_info_image-label" class="w-1/2">
                                        <h1 class="float-left w-full font-poppins-bold text-2xl">
                                            <span>“More Info” Modal Pop-up</span>
                                        </h1>
                                        <label for="achcievement_more_info_image" class="float-left w-full mt-4 text-lg text-placeholder font-poppins-bold">
                                            Image*
                                            <span class="font-poppins">(1280 x 640 px)</span>
                                        </label>
                                        @if (!isset($achievement) || (isset($achievement) && $achievement->is_more_info_enabled === 0))
                                            <x-forms.image_uploader class="image-empty">
                                                <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                                <x-slot name="uploder_description">  SVG, PNG, JPG (MIN: 1280x640px)</x-slot>
                                                <x-slot name="field_id">achcievement_more_info_image</x-slot>
                                                <x-slot name="uploaded_img"></x-slot>
                                            </x-forms.image_uploader>
                                        @else
                                            <x-forms.image_uploader_edit class="more-info-image">
                                                <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                                <x-slot name="uploder_description">  SVG, PNG, JPG (MIN: 1280x640px)</x-slot>
                                                <x-slot name="field_id">achcievement_more_info_image</x-slot>
                                                <x-slot name="uploaded_img">{{ str_replace('https://static.togoactive.com/', '', $achievement->more_info_image) }}</x-slot>
                                            </x-forms.image_uploader_edit>
                                        @endif

                                        <x-forms.file_input name="more_info_image">
                                            <x-slot name="width">1280</x-slot>
                                            <x-slot name="height">640</x-slot>
                                            <x-slot name="field_id">achcievement_more_info_image</x-slot>
                                        </x-forms.file_input>
                                        <input type="hidden" name="more_info_image" id="more_info_image" value="{{ isset($achievment) || (isset($achievement) && $achievement->is_more_info_enabled === 1) ? $achievement->more_info_image : ''}}" />
                                    </div>
                                    <div id="more-info-description-label" class="w-full">
                                        <x-forms.textarea class="tinymceEditer" name="more_info_description">
                                            <x-slot name="field_id">more_info_description</x-slot>
                                            <x-slot name="label_text">Description*</x-slot>
                                            <x-slot name="label_description"></x-slot>
                                            <x-slot name="label_description_status"></x-slot>
                                            {{ isset($achievement) ? $achievement->more_info_description : '' }}
                                        </x-forms.textarea>
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
                                    <x-forms.textfield name="email_subject" value="{{ isset($achievement) ? $achievement->email_subject : '' }}">
                                        <x-slot name="field_id">email_subject</x-slot>
                                        <x-slot name="label_text">Email Subject</x-slot>
                                        <x-slot name="label_description"></x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                    </x-forms.textfield>
                                </div>
                                <div id="email-text-label" class="w-full">
                                    <x-forms.textarea name="email_text">
                                        <x-slot name="field_id">email_text</x-slot>
                                        <x-slot name="label_text">Body</x-slot>
                                        <x-slot name="label_description"></x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        {{ isset($achievement) ? $achievement->email_text : '' }}
                                    </x-forms.textarea>
                                </div>
                            </div>
                        </x-slot>
                    </x-forms.section>
                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Communication - Notification*
                        </x-slot>
                        <x-slot name="section_button">
                            <button
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
                                    <x-forms.textfield name="notification_title" value="{{ isset($achievement) ? $achievement->notification_title : '' }}">
                                        <x-slot name="field_id">notification_title</x-slot>
                                        <x-slot name="label_text">Notification Title</x-slot>
                                        <x-slot name="label_description"></x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                    </x-forms.textfield>
                                </div>
                                <div id="notification-description-label" class="w-full">
                                    <x-forms.textarea name="notification_description">
                                        <x-slot name="field_id">notification_description</x-slot>
                                        <x-slot name="label_text">Text</x-slot>
                                        <x-slot name="label_description"></x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        {{ isset($achievement) ? $achievement->notification_description : '' }}
                                    </x-forms.textarea>
                                </div>
                                <div id="notification-type-label" class="w-full">
                                    <label for="notification-type-options" class="float-left w-full mt-4 text-lg text-placeholder font-poppins-bold">
                                        Select the type of notification*
                                    </label>
                                    <div id="notification-type-options">
                                        <input type="radio" name="notification_type" id="notification_type_a" value="Type A" class="w-4 h-4 text-purple-700	 bg-gray-100 border-gray-300 focus:ring-0 focus:ring-offset-0 dark:bg-gray-700 dark:border-gray-600" {{ isset($achievement) && $achievement->notification_type === 'Type A' ? 'checked' : '' }} />
                                        <label for="notification_type_a" class="mt-4 text-placeholder font-poppins">
                                            Type A
                                        </label>
                                        <input type="radio" name="notification_type" id="notification_type_b" value="Type B" class="w-4 h-4 ml-4 text-purple-700	 bg-gray-100 border-gray-300 focus:ring-0 focus:ring-offset-0 dark:bg-gray-700 dark:border-gray-600" {{ isset($achievement) && $achievement->notification_type === 'Type B' ? 'checked' : '' }} />
                                        <label for="notification_type_b" class="mt-4 text-placeholder font-poppins">
                                            Type B
                                        </label>
                                    </div>
                                </div>
                                <div id="notification-type-a-label" class="float-left hidden w-full">
                                    <div id="destination-url-label" class="w-full">
                                        <x-forms.textfield name="notification_destination_url" value="{{ isset($achievement) ? $achievement->notification_destination_url : '' }}">
                                            <x-slot name="field_id">notification_destination_url</x-slot>
                                            <x-slot name="label_text">Destination URL*</x-slot>
                                            <x-slot name="label_description"></x-slot>
                                            <x-slot name="label_description_status"></x-slot>
                                        </x-forms.textfield>
                                    </div>
                                </div>
                                <div id="notification-type-b-label" class="float-left hidden w-full mt-4">
                                    <div id="hero_image-label" class="w-1/2">
                                        <h1 class="float-left w-full font-poppins-bold text-2xl">
                                            <span>Type B notifications*</span>
                                        </h1>
                                        <label for="notification_type_b_image_uploader" class="float-left w-full mt-4 text-lg text-placeholder font-poppins-bold">
                                            Hero Image*
                                            <span class="font-poppins">(1280 x 600 px)</span>
                                            <p class="font-poppins">This image will be shown on all notifications</p>
                                        </label>
                                        @if (!isset($achievement) || (isset($achievement) && $achievement->notification_type === 'Type A'))
                                            <x-forms.image_uploader>
                                                <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                                <x-slot name="uploder_description">  SVG, PNG, JPG (MIN: 1280x600px)</x-slot>
                                                <x-slot name="field_id">hero_image</x-slot>
                                                <x-slot name="uploaded_img"></x-slot>
                                            </x-forms.image_uploader>
                                        @else
                                            <x-forms.image_uploader_edit>
                                                <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                                <x-slot name="uploder_description">  SVG, PNG, JPG (MIN: 1280x600px)</x-slot>
                                                <x-slot name="field_id">hero_image</x-slot>
                                                <x-slot name="uploaded_img">{{ str_replace('https://static.togoactive.com/', '', $achievement->notification_hero_image) }}</x-slot>
                                            </x-forms.image_uploader_edit>
                                        @endif

                                        <x-forms.file_input name="notification_hero_image_file">
                                            <x-slot name="width">1280</x-slot>
                                            <x-slot name="height">600</x-slot>
                                            <x-slot name="field_id">hero_image</x-slot>
                                        </x-forms.file_input>

                                        <input type="hidden" name="notification_hero_image" id="notification_hero_image" value="{{ isset($achievement) && $achievement->notification_type === 'Type B' ? $achievement->notification_hero_image : '' }}" />
                                    </div>
                                    <div id="enable-primary-cta-button-label" class="float-left mt-4 w-full">
                                        <x-forms.toggle id="primary_cta_toggle" name="is_primary_cta_enabled"  value="{{ isset($achievement) ? $achievement->is_primary_cta_enabled : 0 }}">
                                            <x-slot name="field_id">primary_cta_toggle</x-slot>
                                            <x-slot name="label_text">Enable primary CTA button</x-slot>
                                            <x-slot name="label_description"></x-slot>
                                        </x-forms.toggle>
                                    </div>
                                    <div id="primary-cta-button-label" class="float-left ml-5 pl-1 w-1/2" value="{{ isset($achievement) ? $achievement->primary_cta_button_text : '' }}">
                                        <div id="primary_cta_button_text" class="w-full">
                                            <x-forms.textfield name="primary_cta_button_text" value="{{ isset($achievement) ? $achievement->primary_cta_button_text : '' }}">
                                                <x-slot name="field_id">primary-cta-button-text</x-slot>
                                                <x-slot name="label_text">CTA button text*</x-slot>
                                                <x-slot name="label_description"></x-slot>
                                                <x-slot name="label_description_status"></x-slot>
                                            </x-forms.textfield>
                                        </div>
                                        <div id="primary_cta_link" class="w-full">
                                            <x-forms.textfield name="primary_cta_link" value="{{ isset($achievement) ? $achievement->primary_cta_link : '' }}">
                                                <x-slot name="field_id">primary_cta_link</x-slot>
                                                <x-slot name="label_text">Link*</x-slot>
                                                <x-slot name="label_description"></x-slot>
                                                <x-slot name="label_description_status"></x-slot>
                                            </x-forms.textfield>
                                        </div>
                                        <div id="secondary_cta_button_enable" class="float-left w-full mt-4">
                                            <a href="#" id="enable_secondary_cta_button" class="text-primary font-poppins-semibold text-sm mt-4">
                                                <i class="fa-plus"></i>
                                                <span>secondary CTA button</span>
                                            </a>
                                            <input type="hidden" name="is_secondary_cta_enabled" id="enable_secondary_cta" value="{{ isset($achievement) ? $achievement->is_secondary_cta_enabled : '' }}" />
                                        </div>
                                        <div id="secondary_cta_button-label" class="float-left w-full hidden">
                                            <div id="secondary-cta-button-text-label" class="float-left w-full">
                                                <div id="secondary_cta_button_text" class="w-full">
                                                    <x-forms.textfield name="secondary_cta_button_text" value="{{ isset($achievement) ? $achievement->secondary_cta_button_text : '' }}">
                                                        <x-slot name="field_id">secondary-cta-button-text</x-slot>
                                                        <x-slot name="label_text">CTA button text*</x-slot>
                                                        <x-slot name="label_description"></x-slot>
                                                        <x-slot name="label_description_status"></x-slot>
                                                    </x-forms.textfield>
                                                </div>
                                            </div>
                                            <div id="secondary-cta-link-label" class="float-left w-full">
                                                <div id="secondary_cta_link" class="w-full">
                                                    <x-forms.textfield name="secondary_cta_link" value="{{ isset($achievement) ? $achievement->secondary_cta_button_text : '' }}">
                                                        <x-slot name="field_id">secondary_cta_link</x-slot>
                                                        <x-slot name="label_text">Link*</x-slot>
                                                        <x-slot name="label_description"></x-slot>
                                                        <x-slot name="label_description_status"></x-slot>
                                                    </x-forms.textfield>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="enable-share-option-label" class="float-left mt-4 w-full">
                                        <x-forms.toggle id="share_option_toggle" name="is_share_option_enabled"  value="{{ isset($achievement) && $achievement->is_share_option_enabled === 1 ? $achievement->is_share_option_enabled : 0 }}" >
                                            <x-slot name="field_id">share_option_toggle</x-slot>
                                            <x-slot name="label_text">Enable share option</x-slot>
                                            <x-slot name="label_description">This will allow you to create an share option for the notification </x-slot>
                                        </x-forms.toggle>
                                    </div>
                                    <div id="share-option-link-label" class="float-left ml-5 pl-1 w-1/2 hidden">
                                        <div id="share-option-link-label" class="float-left w-full">
                                            <div id="share_option_link" class="w-full">
                                                <x-forms.textfield name="enable_share_option_link" value="{{ isset($achievement) ? $achievement->enable_share_option_link : '' }}">
                                                    <x-slot name="field_id">enable_share_option_link</x-slot>
                                                    <x-slot name="label_text">Link*</x-slot>
                                                    <x-slot name="label_description"></x-slot>
                                                    <x-slot name="label_description_status"></x-slot>
                                                </x-forms.textfield>
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
                                    <x-forms.toggle id="sponsor_content_toggle" name="is_sponsor_content_enabled"  value="{{ isset($achievement) ? $achievement->is_sponsor_content_enabled : 0 }}">
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
                                        @if (!isset($achievement) || (isset($achievement) && $achievement->is_sponsor_content_enabled === 0))
                                            <x-forms.image_uploader>
                                                <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                                <x-slot name="uploder_description">  SVG, PNG, JPG (MIN: 300x150px)</x-slot>
                                                <x-slot name="field_id">sponsor-content-image</x-slot>
                                                <x-slot name="uploaded_img"></x-slot>
                                            </x-forms.image_uploader>
                                        @else
                                            <x-forms.image_uploader_edit>
                                                <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                                <x-slot name="uploder_description">  SVG, PNG, JPG (MIN: 300x150px)</x-slot>
                                                <x-slot name="field_id">sponsor-content-image</x-slot>
                                                <x-slot name="uploaded_img">{{ str_replace('https://static.togoactive.com/', '', $achievement->sponsor_content_image) }}</x-slot>
                                            </x-forms.image_uploader_edit>
                                        @endif

                                        <x-forms.file_input name="sponsor_content_image_file">
                                            <x-slot name="width">300</x-slot>
                                            <x-slot name="height">150</x-slot>
                                            <x-slot name="field_id">sponsor-content-image</x-slot>
                                        </x-forms.file_input>
                                        <input type="hidden" name="sponsor_content_image" id="sponsor_content_image" value="{{ isset($achievement) && $achievement->is_sponsor_content_enabled === 1 ? $achievement->sponsor_content_image : '' }}" />
                                    </div>
                                    <div id="sponsor-content-text-label" class="float-left w-full">
                                        <x-forms.textarea name="sponsor_content_text">
                                            <x-slot name="field_id">sponsor_content_text</x-slot>
                                            <x-slot name="label_text">Text*</x-slot>
                                            <x-slot name="label_description"></x-slot>
                                            <x-slot name="label_description_status"></x-slot>
                                            {{ isset($achievement) ? $achievement->sponsor_content_text : '' }}
                                        </x-forms.textarea>
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
        <div class="modal-dialog modal-md" role="document">
            <div id="notification_a_content" class="modal-content pt-4 pr-4 pb-4 pl-4">
                <a href="#" id="notification_a_destination_url" target="_blank">
                    <div id="notification_a_preview" class="w-full rounded font-poppins">
                        <div id="notification_a_time" class="text-sm pr-2 pt-2 text-gray">

                        </div>
                        <div id="notification_a_body" class="flex mt-1">
                            <div class="w-40 mb-3 pl-2">
                                <img id="icon_image_modal" src="/images/dummy.png" class="rounded-full" />
                            </div>
                            <div id="notification_a_content" class="pl-3">
                                <div id="notification_a_header" class="font-poppins-bold">

                                </div>
                                <div id="notification_a_text" class="font-poppins">

                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="modal fade" id="notification_type_b_modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div id="notification_b_content" class="modal-content pt-4 pr-4 pb-4 pl-4">
                <div id="notification_b_preview" class="w-full rounded font-poppins">
                    <div id="notification_b_image" class="w-full float-left">
                        <div class="w-full float-left" style="height: 100px">&nbsp;</div>
                        <div id="challenge_data">
                            <div id="challenge-period" class="rounded w-full float-left font-poppins">
                                <div class="w-full float-left">
                                    <p class="w-1/2 font-poppins-bold float-right text-center">Challenge Period</p>
                                </div>
                                <div class="w-full">
                                    <p class="w-1/2 text-center float-right challenge-dates rounded-md">
                                        {{ date('d M Y', strtotime($event->dates->leaderboard_start_date)) }} - {{ date('d M Y', strtotime($event->dates->leaderboard_end_date)) }}
                                    </p>
                                </div>
                            </div>
                            <div id="challenge-registration-period" class="rounded w-24">
                                <div class="w-full float-left">
                                    <p class="w-1/2 font-poppins-bold float-right text-center">Registration Period</p>
                                </div>
                                <div class="w-full">
                                    <p class="w-1/2 text-center float-right challenge-dates rounded-md">
                                        {{ date('d M Y', strtotime($event->dates->registration_start_date)) }} - {{ date('d M Y', strtotime($event->dates->registration_end_date)) }}
                                    </p>
                                </div>
                            </div>
                            <div class="w-full float-left" style="height: 50px">&nbsp;</div>
                            <div id="share-button" class="rounded w-24">
                                <div class="w-full float-left">
                                    <p class="w-1/2 float-right text-center">
                                        <div class="fb-share-button"
                                        data-href="https://www.togoactive.com"
                                        data-layout="button_count">
                                        </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="notification_b_body" class="w-full">
                        <div id="notification_b_title" class="w-full mb-3 mt-3 pl-2 font-poppins-bold text-lg text-center float-left">
                            Awesome title goes here
                        </div>
                        <div id="notification_b_text" class="pl-3 mb-3 w-full float-left">
                            Text goes here fsafdsafdas fsafsafsa fdsafdsafdsa
                            dsfdsafdsafdsafdsa fdsafdsa fdsafdsafdsa
                            fdsafdasfdsafdsa
                            afdsadfdasfdasfdsa fdsadfdasfdsa fdsafdasfdsafdsa
                            fsafasdfdsa
                            fdsafdasfdsafdsafdsafdsa
                            fdsafdsafdsafdasfs
                        </div>
                    </div>
                    <div id="notification-b-buttons" class="w-full flex float-left">
                        <div id="notification-b-secondary-button-preview" class="w-1/2 float-left">
                            <a href="#" class="font-poppins-bold bg-white items-center
                                px-4 py-2 border border-transparent rounded-md text-sm text-primary
                                cursor-pointer border-primary border-2 hover:bg-primary
                              hover:text-primary focus:bg-white focus:text-white
                              active:bg-primary active:text-white
                              focus:outline-none transition ease-in-out duration-500">
                                View achievement
                            </a>
                        </div>
                        <div id="notification-b-primary-button-preview" class="w-1/2 float-left text-center">
                            <a href="#" class="font-poppins-bold bg-primary items-center px-4 py-2
                                border border-transparent rounded-md text-sm
                                text-white cursor-pointer border-primary border-2
                                hover:bg-white hover:text-primary focus:bg-white
                                focus:text-primary active:bg-white
                                focus:outline-none transition ease-in-out duration-500">
                                View achievement
                            </a>
                        </div>
                    </div>
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
        const uploadFileRoute = "{{route('ajax.upload-file')}}";
    </script>
    <script src="/js/events/cropper.js" > </script>
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


            jQuery('#achievement_icon-label, #achcievement_more_info_image-label, #hero_image-label').on('drop', function(ev) {
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

            jQuery('#achievement_icon-label, #achcievement_more_info_image-label, #here_image-label').on('dragover', function(ev) {
                ev.preventDefault();
            });

            jQuery('#notification_preview_button').on('click', function() {
                if (!jQuery('input[name=notification_type]:first').prop('checked')
                        && !jQuery('input[name=notification_type]:last').prop('checked')) {
                    alert('Please select notification type.');
                    return;
                }

                if (!jQuery('input[name=notification_title]').val()
                        || !jQuery('textarea[name=notification_description]').val()) {
                    return Swal.fire({
                        title: '',
                        icon: 'error',
                        html: 'Notification title and text are required.',
                        showCloseButton: true
                    }).then((result) => {
                        return false;
                    });
                }

                if (jQuery('input[name=notification_type]:first').prop('checked')) {
                    jQuery('#notification_a_header').text(jQuery('input[name=notification_title]').val());
                    jQuery('#notification_a_text').text(jQuery('textarea[name=notification_description]').val());
                    let bgImg = jQuery('#label-achievement_icon').
                        css('background-image').replace(/^url\(['"](.+)['"]\)/, '$1');

                    if (bgImg !== 'none') {
                        jQuery('#icon_image_modal').prop('src', bgImg);
                    }

                    if (jQuery('input[name=notification_destination_url]')) {
                        jQuery('#notification_a_destination_url').prop(
                            'href', jQuery('input[name=notification_destination_url]').val()
                        );
                    }

                    $modalNotification = $modalNotificationA.modal('show');
                } else {
                    let bgImg = jQuery('#label-hero_image').
                        css('background-image').replace(/^url\(['"](.+)['"]\)/, '$1');

                    jQuery('#notification_b_image').css('background-image', 'url(' + bgImg + ')');

                    jQuery('#notification_b_title').text(jQuery('input[name=notification_title]').val());
                    jQuery('#notification_b_text').text(jQuery('textarea[name=notification_description]').val());

                    if (jQuery('#primary_cta_toggle').val() == 0) {
                        jQuery('#notification-b-primary-button-preview').addClass('hidden');
                        jQuery('#notification-b-secondary-button-preview').addClass('hidden');
                    }

                    if (jQuery('#enable_secondary_cta').val() == 0 && jQuery('#primary_cta_toggle').val() == 1) {
                        jQuery('#notification-b-primary-button-preview')
                            .removeClass('hidden')
                            .removeClass('w-1/2')
                            .addClass('w-full');

                        jQuery('#notification-b-secondary-button-preview').addClass('hidden');
                    }

                    if (jQuery('#enable_secondary_cta').val() == 0 && jQuery('#primary_cta_toggle').val() == 1) {
                        jQuery('#notification-b-primary-button-preview')
                            .removeClass('hidden')
                            .removeClass('w-full')
                            .addClass('w-1/2');

                        jQuery('#notification-b-secondary-button-preview').removeClass('hidden');
                    }

                    jQuery('#notification-b-primary-button-preview a').text(jQuery('input[name=primary_cta_button_text]').val());
                    jQuery('#notification-b-primary-button-preview a').prop('href', jQuery('input[name=primary_cta_link]').val());
                    jQuery('#notification-b-secondary-button-preview a').text(jQuery('input[name=secondary_cta_button_text]').val());
                    jQuery('#notification-b-secondary-button-preview a').prop(jQuery('input[name=secondary_cta_link]').val());

                    $modalNotification = $modalNotificationB.modal('show');
                }
            });


            jQuery("#more_info_toggle").on('click', function() {
                if (jQuery("#more_info_toggle").is(':checked')) {
                    jQuery("#more_info_toggle").prop('checked', true);
                    jQuery("#more_info_toggle").prop('value', 1);
                    jQuery("#more-info-content").removeClass('hidden');
                } else {
                    jQuery("#more-info-content").addClass('hidden');
                    jQuery("#more_info_toggle").prop('checked', false);
                    jQuery("#more_info_toggle").prop('value', 0);
                }
            });

            if (jQuery("#more_info_toggle").val() == 1) {
                jQuery("#more_info_toggle").trigger('click');
            }

            jQuery('input[name=notification_type]').on('click', function() {
                jQuery(this).prop('checked', true);

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

            if (jQuery("input[name=notification_type]:first").prop('checked') == true) {
                jQuery("input[name=notification_type]:first").trigger('click');
            }

            if (jQuery("input[name=notification_type]:last").prop('checked') == true) {
                jQuery("input[name=notification_type]:last").trigger('click');
            }

            jQuery('#primary_cta_toggle').on('click', function() {
                if (jQuery("#primary_cta_toggle").is(':checked')) {
                    jQuery("#primary_cta_toggle").prop('checked', true);
                    jQuery("#primary_cta_toggle").prop('value', 1);
                } else {
                    jQuery("#primary_cta_toggle").prop('checked', false);
                    jQuery("#primary_cta_toggle").prop('value', 0);
                }
            });

            if (jQuery('#primary_cta_toggle').val() == 1) {
                jQuery('#primary_cta_toggle').trigger('click');
            }

            jQuery('#enable_secondary_cta_button').on('click', function(e) {
                e.preventDefault();
                jQuery("#secondary_cta_button-label").removeClass('hidden');
                jQuery('#enable_secondary_cta').val('1');
            });

            if (jQuery('#enable_secondary_cta').val() == 1) {
                jQuery('#enable_secondary_cta_button').trigger('click');
            }

            jQuery('#share_option_toggle').on('click', function() {
                if (jQuery("#share_option_toggle").is(':checked')) {
                    jQuery("#share_option_toggle").prop('checked', true);
                    jQuery("#share_option_toggle").prop('value', 1);
                    jQuery("#share-option-link-label").removeClass('hidden');
                } else {
                    jQuery("#share_option_toggle").prop('checked', false);
                    jQuery("#share_option_toggle").prop('value', 0);
                    jQuery("#share-option-link-label").addClass('hidden');
                }
            });

            if (jQuery('#share_option_toggle').val() == 1) {
                jQuery('#share_option_toggle').trigger('click');
            }

            jQuery('#sponsor_content_toggle').on('click', function() {
                if (jQuery("#sponsor_content_toggle").is(':checked')) {
                    jQuery("#sponsor_content_toggle").prop('checked', true);
                    jQuery("#sponsor_content_toggle").prop('value', 1);
                    jQuery("#sponsor-content-label").removeClass('hidden');
                } else {
                    jQuery("#sponsor_content_toggle").prop('checked', false);
                    jQuery("#sponsor_content_toggle").prop('value', 0);
                    jQuery("#sponsor-content-label").addClass('hidden');
                }
            });

            if (jQuery('#sponsor_content_toggle').val() == 1) {
                jQuery('#sponsor_content_toggle').trigger('click');
            }

            jQuery('.selectpicker').selectpicker({title: '--Select Type--'});

            jQuery('.selectpicker').on('change', function() {
                console.log($(this).val());
            });
        });

        jQuery('#event_achievement_save').click(function(e) {
            e.preventDefault();

            jQuery('#create-events-achievement').submit();
        });
        tinymce.init({
            selector: 'textarea.tinymceEditer',

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
    </script>
</x-app-layout>
