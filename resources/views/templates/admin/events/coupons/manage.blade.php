<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    <style>.bg-primary {
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
    </style>
    @include('layouts.admin.events.subheader')
    <div class="w-full flex flex-col sm:flex-row flex-grow overflow-hidden bg-light-gray-bg">
        @include('layouts.admin.events.sidebar')
        <main role="main" class="w-full h-full flex-grow p-3 overflow-auto">
            <div class="float-left w-full max-w-screen-xl">
                <x-admin.breadcrumb>
                    <x-slot name="header">Coupon Manager</x-slot>
                    <x-slot name="breadcrumb">
                        <a class="text-primary font-poppins-semibold text-sm" href="">Events</a> >
                        <a class="text-nav-gray font-poppins text-sm" href="{{route('admin.events.info.essentials',$id)}}">{{$event->name ?? "Untitled"}}</a> >
                        <span class="text-nav-gray font-poppins text-sm">{{$active_page}}</span>
                    </x-slot>
                </x-admin.breadcrumb>
                @if (isset($coupons) && count($coupons) > 0)
                    <div style="position: absolute;float: right;top: 160px;right: 20px;">
                        <button onclick="getAddEditView({{$id}},0);" class="font-bold block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" style="color: #ffffff !important;background-color: #7E1FF6;border: 1px solid #7E1FF6;">
                            <i class="fa fa-plus mr-2" aria-hidden="true"></i>New Coupon
                        </button>

                    </div>

                @endif
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
                @csrf
                @if (!isset($coupons) || count($coupons) == 0)
                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">

                        </x-slot>
                        <x-slot name="section_button">


                        </x-slot>
                        <x-slot name="section_heading_description_status">hidden</x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">
                            <div class="float-left w-full flex  justify-center items-end">

                                <div class="float-left w-auto flex flex-col justify-center items-center py-10">
                                    <span class="font-semibold p-8 text-xl font-poppins-bold ">No Coupon added for this event</span>
                                    <button id="open-btn" onclick="getAddEditView({{$id}},0);" class=" font-bold block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" style="color: #ffffff !important;background-color: #7E1FF6;border: 1px solid #7E1FF6;">
                                        <i class="fa fa-plus mr-2" aria-hidden="true"></i>New Coupon
                                    </button>
                                </div>
                            </div>

                        </x-slot>

                    </x-forms.section>
                @else
                    <x-forms.section class="mt-3 rounded-xl" style="background-color: #BAE6FF !important;">
                        <x-slot name="section_heading">

                        </x-slot>
                        <x-slot name="section_button">

                        </x-slot>
                        <x-slot name="section_heading_description_status">hidden</x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">
                            <table class="w-full"><tr>
                                    <th style="width:10%">Sr No.</th>
                                    <th  style="width:15%">Name</th>
                                    <th  style="width:15%">Value</th>
                                    <th  class=" text-center" style="width:40%">Rewards</th>
                                    <th class=" text-center" style="width:20%">Expiry date</th>
                                    <th  style="width:20%">Actions</th>
                                </tr>



                            </table>
                        </x-slot>
                    </x-forms.section>



                    @foreach($coupons as $coupon)
                        <x-forms.section class="mt-3 rounded-xl" >
                            <x-slot name="section_heading">

                            </x-slot>
                            <x-slot name="section_button">

                            </x-slot>
                            <x-slot name="section_heading_description_status">hidden</x-slot>
                            <x-slot name="section_heading_description_text"></x-slot>
                            <x-slot name="section_content">
                                <table class="w-full">
                                    <tr >

                                        <td  class="px-2" style="width:10%"> {{$coupon->id}}</td>
                                        <td class="px-2" style="width:15%"> {{$coupon->name}}</td>
                                        <td class="px-2 " style="width:15%"> {{$coupon->discount}}%</td>
                                        <td class="px-2 text-center" style="width:40%">
                                            <?php $couponReward = json_decode($coupon->rewards, true);
                                            $rewardnames='';
                                              foreach($rewards as $reward){

                                                  if(in_array($reward->id,$couponReward)){

                                                      $rewardnames .=  $reward->name.' | ';

                                                  }

                                              }

                                            ?>

                                            {{substr($rewardnames, 0, -2)}}

                                        </td>
                                        <td class="px-2 text-center" style="width:20%"> {{$coupon->expiry_date}}</td>
                                        <td class="px-2 flex" style="width:20%">
                                            <a href="#" style="color:black !important;" onclick="getAddEditView({{$id}}, {{ $coupon->id}})"><i class="fa fa-pencil mr-2" aria-hidden="true"></i></a>
                                            <form method="post" id="deleteCouponForm_{{$coupon->name}}" data-coupon="{{$coupon->name}}" action="{{route('admin.events.coupon.delete', array($id, $coupon->id))}}">
                                                <input hidden name="coupinId" value="{{$coupon->id}}">
                                                @method('delete')
                                                @csrf
                                                <button type="button" onclick="confirmDelete('{{$coupon->name}}')" style="color:black !important;" ><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </form>

                                        </td>

                                    </tr></table>
                            </x-slot>
                        </x-forms.section>
                    @endforeach



            </div>
        </main>
    </div>



    @endif
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-body couponModal">


            </div>
        </div>
    </div>

    <script>
        var $previewModal = $('#exampleModal');
        // function previewModal(){
        //
        //     $previewModal.modal('show');
        // }
        function closeModal(){
            $('#discountId').val(0);
            $('#condition').val('Equal to');
            $('#discount').val('');
            $('#quantity').val('');
            $previewModal.modal('hide');

        }
        function getAddEditView(eventId, couponId){

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "/event/"+eventId+"/coupon/add_edit/"+couponId,
                data: {'_token':  $('input[name="_token"]').val(), 'eventId': eventId,'couponId':couponId},
                success: function(data){
                    console.log(data);

                    $('.couponModal').html(data.html);
                    $previewModal.modal('show');
                }
            });
        }

        function confirmDelete(coupon){

            var answer =Swal.fire({
                title: 'Delete Coupon',
                icon: '',
                html:'Are you sure you want to delete '+coupon+' coupon?',
                showCloseButton: true,
                showCancelButton: true,
                focusConfirm: false,
                confirmButtonText:
                    'Yes, Delete',
                confirmButtonAriaLabel: 'Yes, Delete',
                cancelButtonText:
                    'No, cancel',
                cancelButtonAriaLabel: 'No, cancel'
            }).then((result) => {
                console.log(result);
                if (result.isConfirmed == true) {
$('#deleteCouponForm_'+coupon).submit();
                   return true;

                } else{
return false;
                }
            });

        };
    </script>
</x-app-layout>
