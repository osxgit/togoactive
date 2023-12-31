<x-app-layout>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" defer rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" deferrel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" defer integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js" defer></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" defer>

    <style>
        a{
            color:inherit !important;
        }
        label.error{

            color:red;
        }
        .tagify {
            border:none !important;;
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
        div#DataTables_Table_0_paginate {
            float: right;
        }
        div#DataTables_Table_0_filter {
            float: right;
        }
        div#DataTables_Table_0_wrapper {
            float: left;
        }
        div#DataTables_Table_0_length {
            display: none;
        }
        .dataTables_filter , .dataTables_filter label {
            width: 100%;
        }
        .row {
            --bs-gutter-x: 0;
        }
        .dropdown-menu.show {
            transform: translate3d(760px, 95px, 0px) !important;
            display:contents;
        }
    </style>
    @include('layouts.admin.events.subheader')

    <div class="w-full flex flex-col sm:flex-row flex-grow overflow-hidden bg-light-gray-bg">
        @include('layouts.admin.events.sidebar')
        <main role="main" class="w-full h-full flex-grow p-3 overflow-auto">
            <div class="float-left w-full max-w-screen-xl">
                <x-admin.breadcrumb>
                    <x-slot name="header">Manage Events</x-slot>
                    <x-slot name="breadcrumb">
                        <a class="text-primary font-poppins-semibold text-sm" href="">Admin</a> >
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
                @if(session()->has('error'))
                    <x-infoboxes.error class="mt-4">
                        <x-slot name="heading">{{session()->get('error')}}</x-slot>
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
                <div style="position: absolute;float: right;top: 160px;right: 20px;">
                    <x-buttons.button >
                        <x-slot name="page_url">{{route('admin.events.info.essentials',array('-'))}}</x-slot>
                        <x-slot name="button_text"><i class="fa fa-plus" aria-hidden="true"></i> New Event</x-slot>
                    </x-buttons.button>
                </div>
                <x-forms.section class="mt-8 rounded-xl">
                    <x-slot name="section_heading">

                    </x-slot>
                    <x-slot name="section_button">


                    </x-slot>
                    <x-slot name="section_heading_description_status">hidden</x-slot>
                    <x-slot name="section_heading_description_text"></x-slot>
                    <x-slot name="section_content">
                <table class="table  data-table">
                    <thead class="text-center">
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Event Name</th>
                        <th >Event Dates<br><span class="text-xs"> Date, time are shown in Timezone set </span></th>
                        <th>Status</th>
                        <th width="100px">Action</th>
                    </tr>
                    </thead>
                    <tbody class="font-poppins text-sm text-center">
                    </tbody>
                </table>
                    </x-slot>
                </x-forms.section>
</div>
        </main>
    </div>
    <script>

       function getdatatable(){

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                pageLength: 20,
                lengthChange: false,
                language: { search: '', searchPlaceholder: " Search by event name" },

                ajax: "{{ route('events.list') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'image', name: 'image'},
                    {data: 'name', name: 'name'},
                    {data: 'dates', name: 'dates'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

        };
        $(document).ready(function () {
            getdatatable();
            $('.dropdown-toggle').dropdown();
            $(".dataTables_filter").parents('div').css("width", "100%");

        });

        function publishEvent(id, eventname){

            var answer =Swal.fire({
                title: 'Publish '+ eventname,
                icon: '',
                html:"Are you sure you want to publish this event "+ eventname+" ?",
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText:
                    'Yes, publish',
                confirmButtonAriaLabel: 'Yes, publish',
                cancelButtonText:
                    'No, cancel',
                cancelButtonAriaLabel: 'No, cancel'
            }).then((result) => {
                if (result.isConfirmed) {

                     $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{route('events.publish')}}",
                        data: {'_token':  $('input[name="_token"]').val(), 'eventId': id},
                        success: function(data){
                            console.log(data);
                            $('.data-table').dataTable().fnClearTable();
                            $('.data-table').dataTable().fnDestroy();

                            getdatatable();

                        }
                    });

                }
            });


        }

        function hideEvent(id, eventname){
            var answer =Swal.fire({
                title: 'Hide '+ eventname,
                icon: '',
                html:"Are you sure you want to hide this event "+ eventname+" ?",
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText:
                    'Yes, hide',
                confirmButtonAriaLabel: 'Yes, hide',
                cancelButtonText:
                    'No, cancel',
                cancelButtonAriaLabel: 'No, cancel'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{route('events.hide')}}",
                        data: {'_token':  $('input[name="_token"]').val(), 'eventId': id},
                        success: function(data){
                            console.log(data);
                            $('.data-table').dataTable().fnClearTable();
                            $('.data-table').dataTable().fnDestroy();
                            getdatatable();
                        }
                    });

                }
            });

        }
    </script>
</x-app-layout>
