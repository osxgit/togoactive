<x-app-layout>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" defer
        rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" deferrel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" defer
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js" defer></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" defer>

    <style>
        a {
            color: inherit !important;
        }

        label.error {

            color: red;
        }

        .tagify {
            border: none !important;
            ;
        }

        .bg-primary {
            --tw-bg-opacity: 1;
            background-color: rgb(126 31 246 / var(--tw-bg-opacity)) !important;
        }

        .border-primary {
            --tw-border-opacity: 1;
            border-color: rgb(126 31 246 / var(--tw-border-opacity)) !important;
        }

        button.bg-primary:hover:hover {
            background-color: rgb(255 255 255 / var(--tw-border-opacity)) !important;
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

        .dataTables_filter,
        .dataTables_filter label {
            width: 100%;
        }

        .row {
            --bs-gutter-x: 0;
        }

        .dropdown-menu.show {
            transform: translate3d(760px, 95px, 0px) !important;
            display: contents;
        }
    </style>
    @include('layouts.admin.events.subheader')

    <div class="w-full flex flex-col sm:flex-row flex-grow overflow-hidden bg-light-gray-bg">
        @include('layouts.admin.events.sidebar')
        <main role="main" class="w-full h-full flex-grow p-3 overflow-auto">
            <div class="float-left w-full max-w-full">
                <x-admin.breadcrumb>
                    <x-slot name="header">Participants</x-slot>
                    <x-slot name="breadcrumb">
                        <a class="text-primary font-poppins-semibold text-sm" href="">Admin</a> >
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
                @if (session()->has('error'))
                    <x-infoboxes.error class="mt-4">
                        <x-slot name="heading">{{ session()->get('error') }}</x-slot>
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

                <x-forms.section class="mt-8 rounded-xl">
                    <x-slot name="section_heading">

                    </x-slot>
                    <x-slot name="section_button">


                    </x-slot>
                    <x-slot name="section_heading_description_status">hidden</x-slot>
                    <x-slot name="section_heading_description_text"></x-slot>
                    <x-slot name="section_content" class="w-auto" style="width:auto !important">
                        <div class="table-responsive">
                            <table class="table responsive  data-table text-slate-500" style="width:100%"">
                                <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Date Joined</th>
                                    <th>Amount</th>
                                    <th>No of items</th>
                                    <th>User ID</th>
                                    <th>Username</th>
                                    <th>First & Last Name</th>
                                    <th>Date Of Birth</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>Address</th>
                                    <th>Team Name</th>
                                    <th>Strava ID</th>
                                    <th>Coupon Code</th>
                                    <th>Referral Code</th>
                                  {{--   <th>Remarks</th> --}}
                                    <th width="100px">Action</th>
                                </tr>
                                </thead>
                                <tbody class="font-poppins text-sm text-center">
                                </tbody>
                            </table>
                        </div>
                    </x-slot>
                </x-forms.section>
            </div>
        </main>
    </div>

    <div class="modal fade" id="purchaseHistory" style="z-index:99999999999;" tabindex="-1" role="dialog"
        aria-labelledby="purchaseHistoryLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width:500px !important" role="document">

            <div class="modal-content bgtransparent bordernone">
                <div class="modal-header">
                    <h5 class="modal-title fpoppins font-bold text-center" id="exampleModalLongTitle">
                        <span class="uppercase">#{{ $eventData->hashtag }}</span>
                        Purchase history
                    </h5>
                    <button type="button" class="close closePurchaseHistory" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body purchaseHistoryModal" style="font-family: 'poppins regular'; overflow:scroll;">

                </div>
            </div>
        </div>
    </div>
    <script>
        function openPurchaseHistory(eventId, userId) {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "/event/" + eventId + "/purchase_history/" + userId,
                success: function(data) {
                    console.log(data);
                    $('.purchaseHistoryModal').html('');
                    $('.purchaseHistoryModal').html(data.html);
                    $('#purchaseHistory').modal('show');
                }
            });

        }
        $('.closePurchaseHistory').click(function() {
            $('#purchaseHistory').modal('hide');
        });

        function getdatatable() {

            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                scrollX:        true,
                scrollCollapse: true,
                pageLength: 20,
                lengthChange: false,
                paging:true,
                language: {
                    search: '',
                    searchPlaceholder: " Search by username,  first name, last name, user id, team name, email, coupon/referral code, strava ID",
                    'processing': "<span class='fa-stack fa-lg'>\n\
                            <i class='fa fa-spinner fa-spin fa-stack-2x fa-fw'></i>\n\
                       </span>&emsp;Processing ..."
                },
                
                columnDefs: [ { type: 'date', 'targets': [0] } ],
                order: [[ 0, 'desc' ]],
                ajax: "{{ route('admin.events.participantsManager', $id) }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },

                    {
                        data: 'total_paid',
                        name: 'total_paid'
                    },
                    {
                        data: 'total_sku',
                        name: 'total_sku'
                    },
                    {
                        data: 'user_id',
                        name: 'user_id'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'fullname',
                        name: 'fullname'
                    },
                    {
                        data: 'dob',
                        name: 'dob'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'country',
                        name: 'country'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'team_name',
                        name: 'team_name'
                    },
                    {
                        data: 'strava',
                        name: 'strava'
                    },
                    {
                        data: 'coupon_code',
                        name: 'coupon_code'
                    },
                    {
                        data: 'referral_code',
                        name: 'referral_code'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                "fnRowCallback": function(nRow, aData, iDisplayIndex) {

                   $("td:first", nRow).html(aData.DT_RowIndex);
                    return nRow;
                },
                "sDom": '<"top"<"actions">lfi<"clear">><"clear">rt<"bottom" <"actions"> lip>',
            });
        };
        $(document).ready(function() {
            getdatatable();
            $('.dropdown-toggle').dropdown();
            $(".dataTables_filter").parents('div').css("width", "100%");
            $('.dataTables_scrollHead').css({
                'overflow-x':'scroll'
            }).on('scroll', function(e){
                var scrollBody = $(this).parent().find('.dataTables_scrollBody').get(0);
                scrollBody.scrollLeft = this.scrollLeft;
                $(scrollBody).trigger('scroll');
            });
        });

        function removeUser(userid, eventid) {

            var answer = Swal.fire({
                title: 'Remove User ',
                icon: '',
                html: "Are you sure you want to remove this user ?",
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText: 'Yes, remove',
                confirmButtonAriaLabel: 'Yes, remove',
                cancelButtonText: 'No, cancel',
                cancelButtonAriaLabel: 'No, cancel'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{ route('eventUser.remove') }}",
                        data: {
                            '_token': $('input[name="_token"]').val(),
                            'eventId': eventid,
                            'userId': userid
                        },
                        success: function(data) {
                            console.log(data);

                            setTimeout(() => {
                              //  getdatatable();
                              $('.data-table').DataTable().clear().draw();
                            }, 500);

                        }
                    });

                }
            })
        }
    </script>
</x-app-layout>
