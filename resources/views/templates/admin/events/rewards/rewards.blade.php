<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sortable/0.9.13/jquery-sortable-min.js" integrity="sha512-9pm50HHbDIEyz2RV/g2tn1ZbBdiTlgV7FwcQhIhvykX6qbQitydd6rF19iLmOqmJVUYq90VL2HiIUHjUMQA5fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>
        .tooltip {
            position: absolute;
            z-index: 1070;
            display: block;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 12px;
            font-style: normal;
            font-weight: normal;
            line-height: 1.42857143;
            text-align: left;
            text-align: start;
            text-decoration: none;
            text-shadow: none;
            text-transform: none;
            letter-spacing: normal;
            word-break: normal;
            word-spacing: normal;
            word-wrap: normal;
            white-space: normal;
            filter: alpha(opacity=0);
            opacity: 0;

            line-break: auto;
        }
        .tooltip.in {
            filter: alpha(opacity=90);
            opacity: .9;
        }
        .tooltip.top {
            padding: 5px 0;
            margin-top: -3px;
        }
        .tooltip.right {
            padding: 0 5px;
            margin-left: 3px;
        }
        .tooltip.bottom {
            padding: 5px 0;
            margin-top: 3px;
        }
        .tooltip.left {
            padding: 0 5px;
            margin-left: -3px;
        }
        .tooltip-inner {
            max-width: 200px;
            padding: 3px 8px;
            color: #fff;
            text-align: center;
            background-color: #000;
            border-radius: 4px;
        }
        .tooltip-arrow {
            position: absolute;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid;
        }
        .tooltip.top .tooltip-arrow {
            bottom: 0;
            left: 50%;
            margin-left: -5px;
            border-width: 5px 5px 0;
            border-top-color: #000;
        }
        .tooltip.top-left .tooltip-arrow {
            right: 5px;
            bottom: 0;
            margin-bottom: -5px;
            border-width: 5px 5px 0;
            border-top-color: #000;
        }
        .tooltip.top-right .tooltip-arrow {
            bottom: 0;
            left: 5px;
            margin-bottom: -5px;
            border-width: 5px 5px 0;
            border-top-color: #000;
        }
        .tooltip.right .tooltip-arrow {
            top: 50%;
            left: 0;
            margin-top: -5px;
            border-width: 5px 5px 5px 0;
            border-right-color: #000;
        }
        .tooltip.left .tooltip-arrow {
            top: 50%;
            right: 0;
            margin-top: -5px;
            border-width: 5px 0 5px 5px;
            border-left-color: #000;
        }
        .tooltip.bottom .tooltip-arrow {
            top: 0;
            left: 50%;
            margin-left: -5px;
            border-width: 0 5px 5px;
            border-bottom-color: #000;
        }
        .tooltip.bottom-left .tooltip-arrow {
            top: 0;
            right: 5px;
            margin-top: -5px;
            border-width: 0 5px 5px;
            border-bottom-color: #000;
        }
        .tooltip.bottom-right .tooltip-arrow {
            top: 0;
            left: 5px;
            margin-top: -5px;
            border-width: 0 5px 5px;
            border-bottom-color: #000;
        }
        .tooltip-inner {
            background-color: #00acd6 !important;
            /*!important is not necessary if you place custom.css at the end of your css calls. For the purpose of this demo, it seems to be required in SO snippet*/
            color: #fff;
        }

        .tooltip.top .tooltip-arrow {
            border-top-color: #00acd6;
        }

        .tooltip.right .tooltip-arrow {
            border-right-color: #00acd6;
        }

        .tooltip.bottom .tooltip-arrow {
            border-bottom-color: #00acd6;
        }

        .tooltip.left .tooltip-arrow {
            border-left-color: #00acd6;
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
                    <x-slot name="header">Reward SKUs</x-slot>
                    <x-slot name="breadcrumb">
                        <a class="text-primary font-poppins-semibold text-sm" href="">Events</a> >
                        <a class="text-nav-gray font-poppins text-sm" href="{{route('admin.events.info.essentials',$id)}}">{{$event->name ?? "Untitled"}}</a> >

                        <span class="text-nav-gray font-poppins text-sm">{{$active_page}}</span>
                    </x-slot>
                </x-admin.breadcrumb>
                @if (count($eventRewards)>0)
                    <div style="position: absolute;float: right;top: 160px;right: 20px;">
                        <x-buttons.button >
                            <x-slot name="page_url">{{route('admin.events.rewards.add',array($id))}}</x-slot>
                            <x-slot name="button_text"><i class="fa fa-plus" aria-hidden="true"></i> New Reward</x-slot>
                        </x-buttons.button>
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
                @if (count($eventRewards) == 0)
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
                                    <span class="font-semibold p-8 text-xl font-poppins-bold ">No Reward SKU added for this event</span>
                                    <x-buttons.button>
                                        <x-slot name="page_url">{{route('admin.events.rewards.add',array($id))}}</x-slot>
                                        <x-slot name="button_text"><i class="fa fa-plus" aria-hidden="true"></i> New Reward</x-slot>
                                    </x-buttons.button>


                                </div>
                            </div>

                        </x-slot>

                    </x-forms.section>
                @else
                    <x-forms.section class="mt-3 rounded-xl" style="background-color: #BAE6FF !important;">
                        <x-slot name="section_heading">
                            Core SKUs
                        </x-slot>
                        <x-slot name="section_button">

                        </x-slot>
                        <x-slot name="section_heading_description_status">hidden</x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">
                            <table class="w-full"><tr>
                                    <th style="width:10%">Reorder</th>
                                    <th  class="px-2 text-center" style="width:20%">Image</th>
                                    <th class="px-2 text-center" style="width:20%">Name</th>
                                    <th  class="px-2 text-center" style="width:20%">Size</th>
                                    <th  class="px-2 text-center" style="width:20%">Price</th>
                                    <th  class="px-2 text-center" style="width:10%">Action</th>
                                </tr>

                            </table>
                        </x-slot>
                    </x-forms.section>
                    <div class="sortablecore">
                    @if(!is_null($coreRewards))
                        @foreach($coreRewards as $coreReward)
                            <x-forms.section class="mt-2 rounded-xl" data-id="{{$coreReward->id}}">
                                <x-slot name="section_heading">

                                </x-slot>
                                <x-slot name="section_button">

                                </x-slot>
                                <x-slot name="section_heading_description_status">hidden</x-slot>
                                <x-slot name="section_heading_description_text"></x-slot>
                                <x-slot name="section_content">

                                    <table class="w-full">
                                        <tr>
                                            <th style="width:10%"><i class="fa fa-bars" aria-hidden="true"></i></th>
                                            <th class="px-2 text-center"  style="width:20%"><img src="{{$coreReward->icon}}" style=" width: 80px;margin:0 auto;"></th>
                                            <th  class="px-2" style="width:20%"> {{$coreReward->name}}</th>
                                            <th class="px-2 text-center" style="width:20%"> {{$coreReward->size!== '' ?strtoupper(implode(', ',json_decode($coreReward->size))):''}}</th>
                                            <th class="px-2 text-center" style="width:20%">{{($coreReward->price)}}</th>
                                            <th class="flex justify-center items-center">
                                                <span class="toggleReward" onclick="toggleReward('{{$coreReward->id}}')">

                                                     <i class="fa fa-eye mr-2 rewardhideshow hidereward_{{$coreReward->id}} {{$coreReward->is_hidden == 1?'hidden':''}}" aria-hidden="true" rel="tooltip" title="Hide this reward" data-placement="top" ></i>
                                                    <i class="fa fa-eye-slash rewardhideshow showreward_{{$coreReward->id}} {{$coreReward->is_hidden == 0?'hidden':''}}" aria-hidden="true"  rel="tooltip" title="Show this reward" data-placement="top" ></i>
                                                </span>
                                                <div id="mobile-dropdown" class="nav2 w" data-spy="affix" data-offset-top="350">
                                                    <div class="container">

                                                        <div class="pull-left">
                                                            <div class="btn-group mob-fl">
                                                                <span class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>

                                                                </span>
                                                                <ul class="dropdown-menu pl-2" role="menu">
                                                                    <li><a href="{{route('admin.events.rewards.edit',array($id , $coreReward->id))}}" style="color:black !important;">Edit</a></li>
                                                                    <li><a href="#" style="color:black !important;">Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </th>
                                        </tr>
                                        <tr>
                                            <td colspan="6">
<hr>

                                                <x-forms.toggle  onclick="toggle_dependent_sku('{{$coreReward->id}}')" id="is_dependent_sku-{{$coreReward->id}}" name="is_dependent_sku-{{$coreReward->id}}" value="{{$coreReward->is_dependent_sku}}" class="is_dependent_toggle  rounded">
                                                    <x-slot name="field_id">is_dependent_sku-{{$coreReward->id}}</x-slot>
                                                    <x-slot name="label_text">Dependent SKU</x-slot>
                                                    <x-slot name="label_description"></x-slot>
                                                </x-forms.toggle>

                                                <div class="dependent_sku-{{$coreReward->id}} {{$coreReward->is_dependent_sku == 0 ? 'hidden':''}}">
                                                    <div>On which other SKU is this SKU dependent?*</div>
                                                    <select name="dependent_sku_selec-{{$coreReward->id}}" id="dependent_sku_select-{{$coreReward->id}}" onchange="update_dependent_sku('{{$coreReward->id}}')"  class=" rounded  float-left w-full border bg-white h-8 font-poppins text-sm text-placeholder placeholder-gray-200 px-2" style="width:325px;">
                                                        @foreach($eventRewards as $eventReward)
                                                            @if($eventReward->id !== $coreReward->id)
                                                                <option value="{{$eventReward->id}}">{{$eventReward->sku}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </td>
                                        </tr>
                                    </table>
                                </x-slot>
                            </x-forms.section>

                        @endforeach

                    @endif
                    </div>

                    <x-forms.section class="mt-3 rounded-xl" style="background-color: #BAE6FF !important;">
                        <x-slot name="section_heading">
                            Add-On SKUs
                        </x-slot>
                        <x-slot name="section_button">

                        </x-slot>
                        <x-slot name="section_heading_description_status">hidden</x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">
                            <table class="w-full"><tr>
                                    <th style="width:10%">Reorder</th>
                                    <th  class="px-2 text-center" style="width:20%">Image</th>
                                    <th  class="px-2 text-center" style="width:20%">Name</th>
                                    <th   class="px-2 text-center"style="width:20%">Size</th>
                                    <th   class="px-2 text-center"style="width:20%">Price</th>
                                    <th   class="px-2 text-center"style="width:10%">Action</th>
                                </tr>

                            </table>
                        </x-slot>
                    </x-forms.section>
                <div class="sortable">

                    @if(!is_null($addonRewards))
                        @foreach($addonRewards as $addonReward)
                            <x-forms.section class="mt-2 rounded-xl" data-id="{{$addonReward->id}}">
                                <x-slot name="section_heading">

                                </x-slot>
                                <x-slot name="section_button">

                                </x-slot>
                                <x-slot name="section_heading_description_status">hidden</x-slot>
                                <x-slot name="section_heading_description_text"></x-slot>
                                <x-slot name="section_content" >

                                    <table class="w-full ">
                                        <tr>
                                            <th style="width:10%"><i class="fa fa-bars" aria-hidden="true"></i></th>
                                            <th  class="px-2 text-center"style="width:20%"><img src="{{$addonReward->icon}}" style=" width: 80px; margin:0 auto;"></th>
                                            <th  class="px-2 text-center"  style="width:20%"> {{$addonReward->name}}</th>
                                            <th class="px-2 text-center" style="width:20%"> {{$addonReward->size!== '' ?strtoupper(implode(', ',json_decode($addonReward->size))):''}}</th>
                                            <th class="px-2 text-center" style="width:20%">{{($addonReward->price)}}</th>
                                            <th class="flex justify-center">
                                                <span class="toggleReward" onclick="toggleReward('{{$addonReward->id}}')">

                                                     <i class="fa fa-eye mr-2 hidereward_{{$addonReward->id}} {{$addonReward->is_hidden == 1?'hidden':''}}" aria-hidden="true"></i>
                                                    <i class="fa fa-eye-slash showreward_{{$addonReward->id}} {{$addonReward->is_hidden == 0?'hidden':''}}" aria-hidden="true"></i>
                                                </span>

                                                <div id="mobile-dropdown" class="nav2 w" data-spy="affix" data-offset-top="350">
                                                    <div class="container">

                                                        <div class="pull-left">
                                                            <div class="btn-group mob-fl">
                                                                <span class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>

                                                                </span>
                                                                <ul class="dropdown-menu pl-2" role="menu">
                                                                    <li><a  href="{{route('admin.events.rewards.edit',array($id , $addonReward->id))}}" style="color:black !important;">Edit</a></li>
                                                                    <li><a href="#" style="color:black !important;">Delete</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </th>
                                        </tr>
                                        <tr>
                                            <td colspan="6">
                                                <hr>
                                                <x-forms.toggle  onclick="toggle_dependent_sku('{{$addonReward->id}}')" id="is_dependent_sku-{{$addonReward->id}}" name="is_dependent_sku-{{$addonReward->id}}" value="{{$addonReward->is_dependent_sku}}" class="is_dependent_toggle  rounded">
                                                    <x-slot name="field_id">is_dependent_sku-{{$addonReward->id}}</x-slot>
                                                    <x-slot name="label_text">Dependent SKU</x-slot>
                                                    <x-slot name="label_description"></x-slot>
                                                </x-forms.toggle>

                                                <div class="dependent_sku-{{$addonReward->id}} {{$addonReward->is_dependent_sku == 0 ? 'hidden':''}}">
                                                    <div>On which other SKU is this SKU dependent?*</div>
                                                    <select name="dependent_sku_selec-{{$addonReward->id}}" id="dependent_sku_select-{{$addonReward->id}}" onchange="update_dependent_sku('{{$addonReward->id}}')"  class=" rounded  float-left w-full border bg-white h-8 font-poppins text-sm text-placeholder placeholder-gray-200 px-2" style="width:325px;">
                                                        @foreach($eventRewards as $eventReward)
                                                            @if($eventReward->id !== $addonReward->id)
                                                                <option value="{{$eventReward->id}}">{{$eventReward->sku}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </x-slot>
                            </x-forms.section>
                        @endforeach
                    @endif
                </div>









<script>

    $(document).ready(function() {
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })


        // $('.sortablecore').sortable();
        $('.sortablecore').sortable({
            update: function(event, ui) {
                var sortData = $('.sortablecore').sortable('toArray',{ attribute: 'data-id'})
                console.log(sortData)

                updateOrderToDatabase(sortData.join(','));
                // updateOrderOnServer(ui.item, '.ui-sortable-handle', 'list');
            }
        })

        function updateOrderToDatabase(data){

            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{route('admin.events.rewards.sort', array($id))}}",
                data: {'_token':  $('input[name="_token"]').val(), 'data': data},
                success: function(data){
                    console.log(data);
                    console.log(data.data);

                }
            });

        }
        // $('.sortable').sortable();
        $('.sortable').sortable({
            update: function(event, ui) {
                var sortData = $('.sortable').sortable('toArray',{ attribute: 'data-id'})
                console.log(sortData)

                updateOrderToDatabase(sortData.join(','));
                // updateOrderOnServer(ui.item, '.ui-sortable-handle', 'list');
            }
        })
        var list = document.getElementsByClassName('is_dependent_toggle');
        var n;
        for (n = 0; n < list.length; ++n) {

            if(list[n].value == 1){
                console.log( list[n].id);
                $( "#"+list[n].id).prop('checked', true);
            }
        }

    })
    $('.dropdown').click(function(){
        $('.dropdown-content').toggle();

    })
    $(function() {
        $('.dropdown-menu>li>a').click(function() {
            $(this).dropdown("toggle"); // this is the important part!


        });
    });

    function toggle_dependent_sku(id){
        console.log(id);
        console.log($('#is_dependent_sku-'+id).val());
        if($('#is_dependent_sku-'+id).val() == 0){
            $('#is_dependent_sku-'+id).val(1);
            $('.dependent_sku-'+id).removeClass('hidden');
            toggle_is_dependent(id);
            update_dependent_sku(id)
        } else{

            $('#is_dependent_sku-'+id).val(0);
            $('.dependent_sku-'+id).addClass('hidden');
            toggle_is_dependent(id);
            update_dependent_sku(id)
        }

    }

    function toggle_is_dependent(id){

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{route('rewards.toggle_is_dependent')}}",
            data: {'_token':  $('input[name="_token"]').val(), 'rewardId': id},
            success: function(data){
                console.log(data);
            }
        });
    }

    function update_dependent_sku(id){
        let dependentSku=$('#dependent_sku_select-'+id).val();

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{route('rewards.update_dependent_sku')}}",
            data: {'_token':  $('input[name="_token"]').val(), 'rewardId': id, 'dependent_sku':dependentSku},
            success: function(data){
                console.log(data);
            }
        });

    }

    function toggleReward(id){

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "{{route('rewards.toggle_reward_visibility')}}",
            data: {'_token':  $('input[name="_token"]').val(), 'rewardId': id},
            success: function(data){
                console.log(data);
                console.log(data.data);
                if(data.data == 1){
                    $('.hidereward_'+id).addClass('hidden');
                    $('.showreward_'+id).removeClass('hidden');
                } else{
                    $('.hidereward_'+id).removeClass('hidden');
                    $('.showreward_'+id).addClass('hidden');
                }
            }
        });
    }
</script>














            </div>
        </main>
    </div>


    </form>
@endif

</x-app-layout>
