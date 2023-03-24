<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>

    <style>
        .ts-wrapper{
            position: absolute;
            height: auto;
            width: 50%;
        }
#countrylist .border-ultralightgray{

    border:none !important;
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
</style>
    @include('layouts.admin.events.subheader')
    <div class="w-full flex flex-col sm:flex-row flex-grow overflow-hidden bg-light-gray-bg">
        @include('layouts.admin.events.sidebar')
        <main role="main" class="w-full h-full flex-grow p-3 overflow-auto">
            <div class="float-left w-full max-w-screen-xl">
                <x-admin.breadcrumb>
                    <x-slot name="header">New Reward</x-slot>
                    <x-slot name="breadcrumb">
                        <a class="text-primary font-poppins-semibold text-sm" href="">Events</a> >
                        <a class="text-nav-gray font-poppins text-sm" href="{{route('admin.events.info.essentials',$id)}}">{{$event->name ?? "Untitled"}}</a> >
                        <a class="text-nav-gray font-poppins text-sm" href="{{route('admin.events.rewards',$id)}}">Rewards </a> >
                        <a class="text-nav-gray font-poppins text-sm" href="{{route('admin.events.rewards.add',$id)}}">New Reward </a> >

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

                        <div class="flex w-full bg-white p-2">
                            @if($rewardId > 0)
                                <a href="{{route('admin.events.rewards.edit',array($id,$rewardId))}}" class="flex justify-center items-center py-3 no-underline" style="text-decoration: none;width:48%;"><div ><i class="fa fa-info-circle mr-2" aria-hidden="true"></i>Basic details*</div></a>

                            @else
                                <a href="{{route('admin.events.rewards.add',array($id))}}" class="flex justify-center items-center py-3 no-underline" style="text-decoration: none;width:48%;"><div ><i class="fa fa-info-circle mr-2" aria-hidden="true"></i>Basic details*</div></a>

                            @endif

                            <div  class="flex justify-center items-center py-3" style="width:4%"> > </div>
                            <a href="#" class="flex justify-center  items-center py-3 no-underline"  style="text-decoration: none;color:#7E1FF6 !important;width:48%; background:#EEE1FF;"><div ><i class="fa fa-cog mr-2" aria-hidden="true"></i>Pricing</div></a>

                        </div>




                    <form method="POST" id="create-event-seo-f_010" name="create-event-seo-f_010" action="{{route('admin.events.rewardsPrice.store',array($id,$rewardId))}}" class="w-full float-left" autocomplete="false" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="challengeId" id="challengeId" value="{{$id}}">
                        <x-forms.section class="mt-8 rounded-xl">
                            <x-slot name="section_heading">
                                Countrywise availability*
                            </x-slot>

                            <x-slot name="section_button">

                            </x-slot>
                            <x-slot name="section_heading_description_status"></x-slot>
                            <x-slot name="section_heading_description_text"></x-slot>
                            <x-slot name="section_content">
                                <div class="flex flex-row w-full">

                                    <x-forms.toggle id="restrict_to_country" name="restrict_to_country" data-reward="{{$rewardId}}" value="{{$rewards->restrict_to_country }}">
                                        <x-slot name="field_id">restrict_to_country</x-slot>
                                        <x-slot name="label_text">Restrict to specific countries</x-slot>
                                        <x-slot name="label_description">Reward will only be available to the following countries selected.  Once you select these countries, only these countries will appear below for you to specify the price. If we deliver anywhere to the world, switch this off.</x-slot>
                                    </x-forms.toggle>
                                </div>

                                <div class="float-left w-1/2 hidden" id="countrylist">
                                    <x-forms.select  id="countries_allowed" name="countries_allowed[]" multiple="multiple" value="{{$rewards->countries_allowed}}">
                                        <x-slot name="field_id">countries_allowed</x-slot>
                                        <x-slot name="label_text">Countries allowed*</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description"></x-slot>
                                        <x-slot name="options">
                                            <option value="">Select country</option>
                                            @foreach($countryCurrency as $country_currency)
                                                @if($rewards->countries_allowed =='')
                                                    <option  id="{{$country_currency['country']}}" data_currencycode="{{$country_currency['currency_code']}}" value="{{$country_currency['country']}}">{{$country_currency['country']}}</option>
                                                @else
                                                    @if(in_array($country_currency['country'],$event_countries_array ))
                                                        <option  id="{{$country_currency['country']}}" data_currencycode="{{$country_currency['currency_code']}}" value="{{$country_currency['country']}}" selected>{{$country_currency['country']}}</option>
                                                    @else
                                                        <option  id="{{$country_currency['country']}}" data_currencycode="{{$country_currency['currency_code']}}" value="{{$country_currency['country']}}">{{$country_currency['country']}}</option>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </x-slot>
                                    </x-forms.select>
                                    <x-forms.validationerror>
                                        <x-slot name="field_id">countries_allowed</x-slot>
                                        <x-slot name="error_text">countries_allowed_error</x-slot>
                                    </x-forms.validationerror>
                                </div>
                            </x-slot>

                        </x-forms.section>
                        @if($rewards->price == '')
                            <x-forms.section class="mt-8 rounded-xl">
                                <x-slot name="section_heading">
                                    Pricing*
                                </x-slot>
                                <x-slot name="section_button">

                                </x-slot>
                                <x-slot name="section_heading_description_status">hidden</x-slot>
                                <x-slot name="section_heading_description_text"></x-slot>
                                <x-slot name="section_content">
                                    <div class="float-left w-10/12">
                                        <div class="header flex justify-evenly">
                                            <div class="w-1/2 flex justify-center items-center"><i class="fa fa-map mr-2" aria-hidden="true"></i>Country*</div>
                                            <div class="w-1/2 flex justify-center items-center"><svg class="mr-2" width="23" height="14" viewBox="0 0 23 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M21.875 0.5H1.625C0.992188 0.5 0.5 1.02734 0.5 1.625V12.875C0.5 13.5078 0.992188 14 1.625 14H21.875C22.4727 14 23 13.5078 23 12.875V1.625C23 1.02734 22.4727 0.5 21.875 0.5ZM2.1875 12.3125V10.0625C3.41797 10.0625 4.4375 11.082 4.4375 12.3125H2.1875ZM2.1875 4.4375V2.1875H4.4375C4.4375 3.45312 3.41797 4.4375 2.1875 4.4375ZM11.75 10.625C10.168 10.625 8.9375 9.14844 8.9375 7.25C8.9375 5.38672 10.168 3.875 11.75 3.875C13.2969 3.875 14.5625 5.38672 14.5625 7.25C14.5625 9.14844 13.2969 10.625 11.75 10.625ZM21.3125 12.3125H19.0625C19.0625 11.082 20.0469 10.0625 21.3125 10.0625V12.3125ZM21.3125 4.4375C20.0469 4.4375 19.0625 3.45312 19.0625 2.1875H21.3125V4.4375Z" fill="#34353C" fill-opacity="0.8"/>
                                                </svg>
                                                Price*
                                            </div>
                                        </div>
                                        <div class="globalprice flex justify-evenly mt-2">
                                            <div class="w-1/2 flex justify-center items-center">
                                                <input type="text" id="global" class="rounded rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="Global/All other countries">

                                            </div>
                                            <div class="w-1/2 flex justify-center items-center">
                                                <div class="flex" style="    width: 90%;">
                                                <span class="inline-flex justify-center items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600" style="min-width: 65px;">
                                                    USD
                                                </span>
                                                    <input type="text" id="global_currency" name="global_currency"class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">
                                                </div>
                                                <i class="fa fa-times ml-2 invisible" aria-hidden="true"></i>
                                            </div>

                                        </div>
                                        <span class="globalprice">The price for Global / All other countries will be applied to countries not specified below.</span>

                                        <div class="price flex justify-evenly mt-2">

                                            <div class="w-1/2 flex justify-center items-center">
                                                <select onchange="getval(this);" id="country_1" name="country_1" class="w-full rounded border border-ultralightgray">
                                                    <option value="Singapore" selected>Singapore</option>
                                                </select>

                                            </div>
                                            <div class="w-1/2 flex justify-center items-center">
                                                <div class="flex" style="    width: 90%;">
                                                <span style="min-width: 65px;" class="inline-flex justify-center items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                                    SGD
                                                </span>
                                                    <input type="text" id="price_1" name="price_1" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">
                                                </div>
                                                <i class="fa fa-times ml-2 invisible" id="removecountry_1" aria-hidden="true"></i>
                                            </div>

                                        </div>
                                        <div id="country_2" class="price flex justify-evenly mt-2">

                                            <div class="w-1/2 flex justify-center items-center">
                                                <select onchange="getval(this);" id="country_2" name="country_2" class="w-full rounded border border-ultralightgray">
                                                    <option value="Malaysia" selected>Malaysia</option>
                                                </select>

                                            </div>
                                            <div class="w-1/2 flex justify-center items-center">
                                                <div class="flex" style="    width: 90%;">
                                                <span style="min-width: 65px;" class="inline-flex justify-center items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                                    RM
                                                </span>
                                                    <input type="text" id="price_2" name="price_2" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">
                                                </div>
                                                <i class="fa fa-times ml-2 removecountry"  onclick="removediv(this.id);"  id="removecountry_2" aria-hidden="true"></i>
                                            </div>

                                        </div>


                                        <div id="country_3" class="price flex justify-evenly mt-2">

                                            <div class="w-1/2 flex justify-center items-center">
                                                <select onchange="getval(this);" id="country_3" name="country_3" class="w-full rounded border border-ultralightgray">
                                                    <option value="Indonesia" selected>Indonesia</option>
                                                </select>

                                            </div>
                                            <div class="w-1/2 flex justify-center items-center">
                                                <div class="flex" style="    width: 90%;">
                                                <span style="min-width: 65px;" class="inline-flex justify-center items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                                    IDR
                                                </span>
                                                    <input type="text" id="price_3" name="price_3" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">
                                                </div>
                                                <i class="fa fa-times ml-2 removecountry"  onclick="removediv(this.id);" id="removecountry_3" aria-hidden="true"></i>
                                            </div>

                                        </div>
                                        <div id="country_4" class="price flex justify-evenly mt-2">

                                            <div class="w-1/2 flex justify-center items-center">
                                                <select onchange="getval(this);" id="country_4" name="country_4" class="w-full rounded border border-ultralightgray">
                                                    <option value="Philippines" selected>Philippines</option>
                                                </select>

                                            </div>
                                            <div class="w-1/2 flex justify-center items-center">
                                                <div class="flex" style="    width: 90%;">
                                                <span style="min-width: 65px;" class="inline-flex justify-center items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                                    P
                                                </span>
                                                    <input type="text" id="price_4" name="price_4"class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">
                                                </div>
                                                <i class="fa fa-times ml-2 removecountry"   onclick="removediv(this.id);" id="removecountry_4" aria-hidden="true"></i>
                                            </div>

                                        </div>
                                        <div id="additional_price" class="additional_price"></div>
                                        <div id='priceclone' class="priceclone flex justify-evenly mt-2  hidden">

                                            <div class="w-1/2 flex justify-center items-center">
                                                <select onchange="getval(this);" id="country_5" name="country_5" class="w-full rounded border border-ultralightgray">
                                                    <option value="" >Select Country</option>
                                                    @foreach($countryCurrency as $country_currency)
                                                        <option id="{{$country_currency['country']}}" data_currencycode="{{$country_currency['currency_code']}}" value="{{$country_currency['country']}}">{{$country_currency['country']}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                            <div class="w-1/2 flex justify-center items-center">
                                                <div class="flex" style="    width: 90%;">
                                                <span style="min-width: 65px;" id="currency_5" class=" inline-flex justify-center justify-center items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                                    <svg width="11" height="15" viewBox="0 0 11 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.5625 2.0625H10.6719C10.8359 2.0625 11 1.92578 11 1.73438V1.07812C11 0.914062 10.8359 0.75 10.6719 0.75H0.828125C0.636719 0.75 0.5 0.914062 0.5 1.07812V1.73438C0.5 1.92578 0.636719 2.0625 0.828125 2.0625H0.9375C0.9375 4.27734 1.8125 6.60156 3.58984 7.75C1.78516 8.92578 0.9375 11.25 0.9375 13.4375H0.828125C0.636719 13.4375 0.5 13.6016 0.5 13.7656V14.4219C0.5 14.6133 0.636719 14.75 0.828125 14.75H10.6719C10.8359 14.75 11 14.6133 11 14.4219V13.7656C11 13.6016 10.8359 13.4375 10.6719 13.4375H10.5625C10.5625 11.25 9.66016 8.92578 7.88281 7.75C9.6875 6.60156 10.5625 4.27734 10.5625 2.0625ZM2.25 2.0625H9.25C9.25 4.85156 7.66406 7.09375 5.75 7.09375C3.80859 7.09375 2.25 4.85156 2.25 2.0625ZM9.25 13.4375H2.25C2.25 10.6758 3.80859 8.40625 5.75 8.40625C7.66406 8.40625 9.25 10.6758 9.25 13.4375Z" fill="#979797"/>
                                                    </svg>
                                                </span>
                                                    <input type="text" id="price_5" name="price_5" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">
                                                </div>
                                                <i class="fa fa-times ml-2 removecountry"  onclick="removediv(this.id);" id="removecountry_5" aria-hidden="true"></i>
                                            </div>

                                        </div>

                                        <div class="font-poppins-bold text-sm mt-4" style="color: #7E1FF6;" id="clonediv"><i class="fa fa-plus mr-2" aria-hidden="true"></i> New Country</div>

                                    </div>

                                </x-slot>
                            </x-forms.section>
                        @else
                            <x-forms.section class="mt-8 rounded-xl">
                                <x-slot name="section_heading">
                                        Pricing*
                                </x-slot>
                                <x-slot name="section_button">

                                </x-slot>
                                <x-slot name="section_heading_description_status">hidden</x-slot>
                                <x-slot name="section_heading_description_text"></x-slot>
                                <x-slot name="section_content">
                                    <div class="float-left w-10/12">
                                        <div class="header flex justify-evenly">
                                            <div class="w-1/2 flex justify-center items-center"><i class="fa fa-map mr-2" aria-hidden="true"></i>Country*</div>
                                            <div class="w-1/2 flex justify-center items-center"><svg class="mr-2" width="23" height="14" viewBox="0 0 23 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M21.875 0.5H1.625C0.992188 0.5 0.5 1.02734 0.5 1.625V12.875C0.5 13.5078 0.992188 14 1.625 14H21.875C22.4727 14 23 13.5078 23 12.875V1.625C23 1.02734 22.4727 0.5 21.875 0.5ZM2.1875 12.3125V10.0625C3.41797 10.0625 4.4375 11.082 4.4375 12.3125H2.1875ZM2.1875 4.4375V2.1875H4.4375C4.4375 3.45312 3.41797 4.4375 2.1875 4.4375ZM11.75 10.625C10.168 10.625 8.9375 9.14844 8.9375 7.25C8.9375 5.38672 10.168 3.875 11.75 3.875C13.2969 3.875 14.5625 5.38672 14.5625 7.25C14.5625 9.14844 13.2969 10.625 11.75 10.625ZM21.3125 12.3125H19.0625C19.0625 11.082 20.0469 10.0625 21.3125 10.0625V12.3125ZM21.3125 4.4375C20.0469 4.4375 19.0625 3.45312 19.0625 2.1875H21.3125V4.4375Z" fill="#34353C" fill-opacity="0.8"/>
                                                </svg>
                                                Price*
                                            </div>
                                        </div>


                                            <div class="globalprice flex justify-evenly mt-2 {{$rewards->restrict_to_country == 1?'hidden':''}}">
                                                <div class="w-1/2 flex justify-center items-center">
                                                    <input type="text" id="global" class="rounded rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="Global/All other countries">

                                                </div>


                                                <div class="w-1/2 flex justify-center items-center">
                                                    <div class="flex" style="    width: 90%;">
                                                                        <span class="inline-flex justify-center items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600" style="min-width: 65px;">
                                                                            USD
                                                                        </span>
                                                        <input type="text" id="global_currency" name="global_currency"class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" value="{{isset($global['price']) ?$global['price']:''}}">
                                                    </div>
                                                    <i class="fa fa-times ml-2 invisible" aria-hidden="true"></i>
                                                </div>




                                            </div>

                                            <span class="globalprice {{$rewards->restrict_to_country == 1?'hidden':''}}">The price for Global / All other countries will be applied to countries not specified below.</span>



                                        @foreach(json_decode($rewards->price) as $key=> $price)


                                            <div id="country_{{$key}}"  class="price flex justify-evenly mt-2">

                                                <div class="w-1/2 flex justify-center items-center">
                                                    <select onchange="getval(this);" id="country_{{$key}}" name="country_{{$key}}" class="w-full rounded border border-ultralightgray">
                                                        <option value="" >Select Country</option>
                                                        @foreach($countryCurrency as $country_currency)
                                                            @if($price->country ==$country_currency['country'] )
                                                                <option id="{{$country_currency['country']}}" data_currencycode="{{$country_currency['currency_code']}}" value="{{$country_currency['country']}}" selected>{{$country_currency['country']}}</option>
                                                            @else
                                                                <option id="{{$country_currency['country']}}" data_currencycode="{{$country_currency['currency_code']}}" value="{{$country_currency['country']}}">{{$country_currency['country']}}</option>
                                                            @endif

                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="w-1/2 flex justify-center items-center">
                                                    <div class="flex" style="    width: 90%;">
                                                <span style="min-width: 65px;" class="inline-flex justify-center items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                                    {{$price->currency}}
                                                </span>
                                                        <input type="text" id="price_{{$key}}" name="price_{{$key}}" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" value=" {{$price->price}}">
                                                    </div>
                                                    <i class="fa fa-times ml-2 " onclick="removediv(this.id);" id="removecountry_{{$key}}" aria-hidden="true"></i>
                                                </div>

                                            </div>


                                        @endforeach

<?php $result = json_decode($rewards->price, true);
                                        $max = max(array_keys($result));
                                        $max=$max+1;
                                       ?>

                                            <div id="additional_price" class="additional_price"></div>
                                            <div id='priceclone' class="priceclone flex justify-evenly mt-2  hidden">

                                                <div class="w-1/2 flex justify-center items-center">
                                                    <select onchange="getval(this);" id="country_{{$max}}" name="country_{{$max}}" class="w-full rounded border border-ultralightgray">
                                                        <option value="" >Select Country</option>
                                                        @foreach($countryCurrency as $country_currency)
                                                            <option id="{{$country_currency['country']}}" data_currencycode="{{$country_currency['currency_code']}}" value="{{$country_currency['country']}}">{{$country_currency['country']}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="w-1/2 flex justify-center items-center">
                                                    <div class="flex" style="    width: 90%;">
                                                <span style="min-width: 65px;" id="currency_5" class=" inline-flex justify-center justify-center items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                                    <svg width="11" height="15" viewBox="0 0 11 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.5625 2.0625H10.6719C10.8359 2.0625 11 1.92578 11 1.73438V1.07812C11 0.914062 10.8359 0.75 10.6719 0.75H0.828125C0.636719 0.75 0.5 0.914062 0.5 1.07812V1.73438C0.5 1.92578 0.636719 2.0625 0.828125 2.0625H0.9375C0.9375 4.27734 1.8125 6.60156 3.58984 7.75C1.78516 8.92578 0.9375 11.25 0.9375 13.4375H0.828125C0.636719 13.4375 0.5 13.6016 0.5 13.7656V14.4219C0.5 14.6133 0.636719 14.75 0.828125 14.75H10.6719C10.8359 14.75 11 14.6133 11 14.4219V13.7656C11 13.6016 10.8359 13.4375 10.6719 13.4375H10.5625C10.5625 11.25 9.66016 8.92578 7.88281 7.75C9.6875 6.60156 10.5625 4.27734 10.5625 2.0625ZM2.25 2.0625H9.25C9.25 4.85156 7.66406 7.09375 5.75 7.09375C3.80859 7.09375 2.25 4.85156 2.25 2.0625ZM9.25 13.4375H2.25C2.25 10.6758 3.80859 8.40625 5.75 8.40625C7.66406 8.40625 9.25 10.6758 9.25 13.4375Z" fill="#979797"/>
                                                    </svg>
                                                </span>
                                                        <input type="text" id="price_{{$max}}" name="price_{{$max}}" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="">
                                                    </div>
                                                    <i class="fa fa-times ml-2 removecountry"  onclick="removediv(this.id);" id="removecountry_{{$max}}" aria-hidden="true"></i>
                                                </div>

                                            </div>

                                            <div class="font-poppins-bold text-sm mt-4" style="color: #7E1FF6;" id="clonediv"><i class="fa fa-plus mr-2" aria-hidden="true"></i> New Country</div>

                                        </div>

                                    </x-slot>
                                </x-forms.section>


                        @endif



            </div>
        </main>
    </div>
    <div class="float-left w-full text-right" style="position: sticky;
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
    <script>
        formchanged=0;
        var isadd= '{{$isadd}}';
        console.log(isadd);
        var $form = $('form'),
            origForm = $form.serialize();

        $('form :input').on('change input', function() {
            if($form.serialize() !== origForm){
                formchanged=1;
                console.log(formchanged);
            }
        });
        $('div#admin-sidebar a').click(function(){
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

        $('#clonediv').click(function(){
            var lastid = $("select:last").attr('id');

            console.log(lastid);
            var n = lastid.split('_');
            lastcount= n[1];
            elementid =parseInt(lastcount)+1;
            document.getElementById(lastid).id = "country_"+(parseInt(lastcount)+1);
            document.getElementById('country_'+elementid).setAttribute('name', 'country_'+elementid);
            document.getElementById('price_'+lastcount).id = "price_"+elementid;
            document.getElementById('price_'+elementid).setAttribute('name', 'price_'+elementid);

            const node = document.getElementById("priceclone");
            let clone = node.cloneNode(true);
            clone.id= 'country_'+lastcount;
            clone.getElementsByTagName('span')[0].id ="currency_" + lastcount;
            clone.getElementsByTagName('input')[0].id ="price_" + lastcount;
            clone.getElementsByTagName('input')[0].name ="price_" + lastcount;
            clone.getElementsByTagName('select')[0].id ="country_" + lastcount;
            clone.getElementsByTagName('select')[0].name ="country_" + lastcount;
            clone.getElementsByTagName('i')[0].id ="removecountry_" + lastcount;
            // clone.removeClass("hidden");
            document.getElementById("additional_price").appendChild(clone);
            $('#additional_price>.priceclone ').removeClass("hidden");
            // $("select:last").attr('id')= "country_"+(parseInt(lastcount)+1);
        })


function removediv(id){

    var n = id.split('_');
    clickedid= n[1];
     $('div > #country_'+clickedid).remove();
}

function getval(element){
    elementid=element.id;
    var n = elementid.split('_');
    clickedid= n[1];
    console.log(clickedid);
    var optVal= $('select#'+elementid).find(":selected").text();
    var currency= $('#'+elementid+' #'+optVal).attr('data_currencycode');
    $('span#currency_'+clickedid).html(currency);
    console.log(currency);
}
        var settings = {};

        new TomSelect("#countries_allowed",{
            plugins: ['remove_button','clear_button'],
            create: true,
            maxOptions: 300,
            onItemAdd:function(value, item, option){
                console.log(value);

                this.setTextboxValue('');
                this.refreshOptions();

                var rh=$('.ts-control').height()+'px';
                $('#countrylist .border-ultralightgray').css('height',rh);

                var lastid = $("select:last").attr('id');

                console.log(lastid);
                var n = lastid.split('_');
                lastcount= n[1];
                elementid=parseInt(lastcount)+1;
                document.getElementById(lastid).id = "country_"+elementid;
                document.getElementById('country_'+elementid).setAttribute('name', 'country_'+elementid);
                document.getElementById('price_'+lastcount).id = "price_"+elementid;
                document.getElementById('price_'+elementid).setAttribute('name', 'price_'+elementid);

                const node = document.getElementById("priceclone");
                let clone = node.cloneNode(true);
                clone.id= 'country_'+lastcount;
                clone.getElementsByTagName('span')[0].id ="currency_" + lastcount;
                clone.getElementsByTagName('input')[0].id ="price_" + lastcount;
                clone.getElementsByTagName('input')[0].name ="price_" + lastcount;
                clone.getElementsByTagName('select')[0].id ="country_" + lastcount;
                clone.getElementsByTagName('select')[0].value =value;
                clone.getElementsByTagName('select')[0].name ="country_" + lastcount;
                clone.getElementsByTagName('i')[0].id ="removecountry_" + lastcount;
                // clone.removeClass("hidden");
                document.getElementById("additional_price").appendChild(clone);
                $('#additional_price>.priceclone ').removeClass("hidden");

                // var optVal= $('select#'+lastcount).find(":selected").text();
                //
                // var currency= $('#country_'+lastcount+' #'+optVal).attr('data_currencycode');
                //
                // $('span#currency_'+lastcount).html(currency);

                getval(clone)
            },
            onItemRemove(value){
                console.log(value);
                var allInputs = document.getElementsByTagName("select");
                var results = [];
                for(var x=0;x<allInputs.length;x++){
                    if(allInputs[x].value == value){
                        removediv(allInputs[x].id)
                    }
                }
            }

        });
    </script>
</x-app-layout>
