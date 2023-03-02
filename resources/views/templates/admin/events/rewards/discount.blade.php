<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>--}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>


    <style>


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

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            padding: 12px 16px;
            z-index: 1;
        }

        /*.dropdown:hover .dropdown-content {*/
        /*    display: block;*/
        /*}*/
        .dropdown-toggle::after {
            display: none;
        }
    </style>
    @include('layouts.admin.events.subheader')
    <div class="w-full flex flex-col sm:flex-row flex-grow overflow-hidden bg-light-gray-bg">
        @include('layouts.admin.events.sidebar')
        <main role="main" class="w-full h-full flex-grow p-3 overflow-auto">
            <div class="float-left w-full max-w-screen-xl">
                <x-admin.breadcrumb>
                    <x-slot name="header">Multi-item Discount</x-slot>
                    <x-slot name="breadcrumb">
                        <a class="text-primary font-poppins-semibold text-sm" href="">Events</a> >
                        <a class="text-nav-gray font-poppins text-sm" href="{{route('admin.events.info.essentials',$id)}}">{{$event->name ?? "Untitled"}}</a> >
                        <a class="text-nav-gray font-poppins text-sm" href="{{route('admin.events.rewards',$id)}}">Rewards</a> >

                        <span class="text-nav-gray font-poppins text-sm">{{$active_page}}</span>
                    </x-slot>
                </x-admin.breadcrumb>
                @if (isset($discount) && count($discount) > 0)
                    <div style="position: absolute;float: right;top: 160px;right: 20px;">
                     <button onclick="previewModal();" class="font-bold block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" style="color: #ffffff !important;background-color: #7E1FF6;border: 1px solid #7E1FF6;">
                            <i class="fa fa-plus mr-2" aria-hidden="true"></i>New Discount
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
                @if (!isset($discount) || count($discount) == 0)
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
                                    <span class="font-semibold p-8 text-xl font-poppins-bold ">No Multi-item Discount added for this event</span>
                                    <button id="open-btn" onclick="previewModal();" class=" font-bold block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" style="color: #ffffff !important;background-color: #7E1FF6;border: 1px solid #7E1FF6;">
                                        <i class="fa fa-plus mr-2" aria-hidden="true"></i>New Discount
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
                                    <th style="width:20%">Condition</th>
                                    <th  style="width:20%">Discount</th>
                                    <th  style="width:40%">Type</th>
                                    <th  style="width:20%">Action</th>

                                </tr>



                            </table>
                        </x-slot>
                    </x-forms.section>



    @foreach($discount as $disc)
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

            <td  class="px-2" style="width:20%"> {{$disc->condition .' '. $disc->quantity.' unique items'}}</td>
            <td class="px-2" style="width:20%"> {{$disc->discount}}%</td>
            <td class="px-2 " style="width:40%">Based on number of unique items</td>
            <td style="width:20%" class="flex items-center">
                <div id="mobile-dropdown" class="nav2 w" data-spy="affix" data-offset-top="350">
                    <div class="container">

                        <div class="pull-left">
                            <div class="btn-group mob-fl">
                                                                <span class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>

                                                                </span>
                                <ul class="dropdown-menu pl-2" role="menu">
                                    <li><a href="#" style="color:black !important;" onclick="previewModalEdit({{$disc->id}},'{{$disc->condition}}',{{$disc->discount}},{{$disc->quantity}})">Edit</a></li>
                                    <li><form method="post" id="discountDeleteForm" action="{{route('admin.events.multiQuantityDiscount.delete', array($id, $disc->id))}}">
                                            @method('delete')
                                            @csrf
                                            <button type="button" onclick="confirmDelete()" style="color:black !important;" >Delete</button>
                                        </form></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr></table>
            </x-slot>
        </x-forms.section>
    @endforeach



            </div>
        </main>
    </div>



    </form>
    @endif


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-body">
                    <form method="POST" id="create-event-discount-f_010" name="create-event-seo-f_010" action="{{route('admin.events.multiQuantityDiscount.store',array($id))}}" class="w-full float-left" autocomplete="false" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="challengeId" id="challengeId" value="{{$id}}">
                        <input type="hidden" name="discountId" id="discountId" value="0">

                        <h1 class="float-left w-full mt-4 text-lg font-poppins-bold text-2xl ">New Discount Setting</h1>
                        <h1 class="float-left w-full mt-4 text-lg text-placeholder font-poppins-bold">Number of rewards and/or QTY to be selected*</h1>
                    <div class=" float-left w-full flex">
                        <div class="w-5/12 mr-4" >
                            <x-forms.select id="condition" name="condition">
                                <x-slot name="field_id">condition</x-slot>
                                <x-slot name="label_text"></x-slot>
                                <x-slot name="label_description_status">hidden</x-slot>
                                <x-slot name="label_description"></x-slot>
                                <x-slot name="options">

                                    <option value="Equal to" selected>Equal to</option>
                                    <option value="More than">More than</option>
                                </x-slot>
                            </x-forms.select>
                            <x-forms.validationerror>
                                <x-slot name="field_id">condition</x-slot>
                                <x-slot name="error_text">condition_error</x-slot>
                            </x-forms.validationerror>
                        </div>
                        <div class="w-7/12">
                            <x-forms.number id="quantity" name="quantity" placeholder="Number of unique SKU or QTY " >
                                <x-slot name="field_id">quantity</x-slot>
                                <x-slot name="label_text"></x-slot>
                                <x-slot name="label_description_status">hidden</x-slot>
                                <x-slot name="label_description"></x-slot>
                            </x-forms.number>
                            <x-forms.validationerror>
                                <x-slot name="field_id">quantity</x-slot>
                                <x-slot name="error_text">quantity_error</x-slot>
                            </x-forms.validationerror>
                        </div>
                    </div>
                    <x-forms.textfield id="discount" name="discount" placeholder="How much discount would you like to give?">
                        <x-slot name="field_id">discount</x-slot>
                        <x-slot name="label_text">Discount percentage*</x-slot>
                        <x-slot name="label_description_status">hidden</x-slot>
                        <x-slot name="label_description"></x-slot>
                    </x-forms.textfield>
                        <x-forms.validationerror>
                            <x-slot name="field_id">discount</x-slot>
                            <x-slot name="error_text">discount_error</x-slot>
                        </x-forms.validationerror>
                </div>
                <div class=" mb-8 mt-8 text-center justify-evenly float-left w-full flex">
                    <button type="button" class="btn btn-secondary w-5/12" style="color: #7E1FF6 !important;background-color: #FFFFFF;border: 1px solid #7E1FF6;"   onclick="closeModal()">Close</button>
                    <button type="submit" class="btn btn-primary w-5/12 text-white" style="color: #ffffff !important;background-color: #7E1FF6;border: 1px solid #7E1FF6;">Save changes</button>
                </div>
            </form>

            </div>
        </div>
    </div>
<script>

    $("#create-event-discount-f_010").validate({
        rules: {
            discount:{
                required: true,
            },
            quantity:{
                required: true,
            }

        },
        submitHandler : function (form) {
            return true;
        }
    });
    var $previewModal = $('#exampleModal');
    function previewModal(){

        $previewModal.modal('show');
    }

    function previewModalEdit( discountid, condition, discount, quantity){

        $('#discountId').val(discountid);
        $('#condition').val(condition);
        $('#discount').val(discount);
        $('#quantity').val(quantity);
        $previewModal.modal('show');
    }

    function closeModal(){
        $('#discountId').val(0);
        $('#condition').val('Equal to');
        $('#discount').val('');
        $('#quantity').val('');
        $previewModal.modal('hide');

    }


    function confirmDelete(){

        var answer =Swal.fire({
            title: 'Delete Multi-item discount',
            icon: '',
            html:'Are you sure you want to delete this multi-item discount ?',
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
                $('#discountDeleteForm').submit();
                return true;

            } else{
                return false;
            }
        });

    };
</script>
</x-app-layout>
