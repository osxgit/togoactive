<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
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

        .bootstrap-select:not([class*="col-"]):not([class*="form-control"]):not(.input-group-btn) {
            width: 100%;
            position: relative;
            bottom: 3px;
        }

        .bootstrap-select.show-tick .dropdown-menu .selected span.check-mark {
            color: #7E1FF6D9;
        }
    </style>

    @include('layouts.admin.events.subheader')
    <div class="w-full flex flex-col sm:flex-row flex-grow overflow-hidden bg-light-gray-bg">
        @include('layouts.admin.events.sidebar')
        <main role="main" class="w-full h-full flex-grow p-3 overflow-auto">
            <div class="float-left w-full max-w-screen-xl">
                <x-admin.breadcrumb>
                    <x-slot name="header">
                        Achievements Manager
                    </x-slot>
                    <x-slot name="breadcrumb">
                        <a class="text-primary font-poppins-semibold text-sm" href="">Events</a> >
                        <a class="text-nav-gray font-poppins text-sm" href="{{route('admin.events.info.essentials',$id)}}">
                            {{$event->name ?? "Untitled"}}
                        </a> >
                        <a class="text-nav-gray font-poppins text-sm" href="{{route('admin.events.achievements.list',$id)}}">
                            Achievements Manager
                        </a>
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

                <table id="achievements" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Reorder</th>
                            <th>ID</th>
                            <th>Icon</th>
                            <th>Titile</th>
                            <th>Description</th>
                            <th>Type</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($achievements as $achievement)
                        <tr>
                            <td><i class="fa fa-bars"></td>
                            <td>{{ $achievement->id }}</td>
                            <td><i class="fa fa-file"></td>
                            <td>{{ $achievement->title }}</td>
                            <td>{{ $achievement->description }}</td>
                            <td>{{ $achievement->type }}</td>
                            <td>{{ $achievement->level }}</td>
                            <td><i class="fa fa-ellipsis-v"></td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <script>
        jQuery.noConflict();

        jQuery(document).ready(function() {
            jQuery('#achievements').DataTable();
        });
    </script>
</x-app-layout>
