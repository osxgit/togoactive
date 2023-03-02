<x-app-layout>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    @include('layouts.admin.events.subheader')
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
    <div class="w-full flex flex-col sm:flex-row flex-grow overflow-hidden bg-light-gray-bg">
        @include('layouts.admin.events.sidebar')
        <main role="main" class="w-full h-full flex-grow p-3 overflow-auto">
            <div class="float-left w-full max-w-screen-xl">
                <x-admin.breadcrumb>
                    <x-slot name="header">Dates</x-slot>
                    <x-slot name="breadcrumb">
                        <a class="text-primary font-poppins-semibold text-sm" href="">Events</a> >
                        <a class="text-nav-gray font-poppins text-sm" href="{{route('admin.events.info.essentials',$id)}}">{{$event->name ?? "Untitled"}}</a> >
                        <span class="text-nav-gray font-poppins text-sm">Event Information</span> >
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

                <form method="POST" id="create-event-date_010" name="create-event-date_010" action="{{route('admin.events.info.essentials.storeDate',array($id))}}" class="w-full float-left" autocomplete="false" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="challengeId" value="{{$id}}">

                    @if($errors->any())
                        <div class="alert alert-danger"  style="color:red">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Registration Dates
                        </x-slot>
                        <x-slot name="section_button">
                        </x-slot>
                        <x-slot name="section_heading_description_status">hidden</x-slot>
                        <x-slot name="section_heading_description_text">Registration end date, free registration end date and update info end date can only be after registration start date. </x-slot>
                        <x-slot name="section_content">
                            <div class="float-left w-full flex justify-center items-center gap-x-4">
                                <div class="float-left w-1/2">
                                    <x-forms.textfield type="datetime-local"  id="reg_start_date" name="reg_start_date"  :value="old('reg_start_date',$eventDates->registration_start_date ?? '' )" >
                                        <x-slot name="field_id">reg_start_date</x-slot>
                                        <x-slot name="label_text">Registration start date*</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">Participants can register for the event from this date </x-slot>
                                    </x-forms.textfield>


                                </div>
                                <div class="float-left w-1/2">
                                    <x-forms.textfield type="datetime-local" id="reg_end_date" name="reg_end_date"  :value="old('reg_end_date',$eventDates->registration_end_date ?? '' )" >
                                        <x-slot name="field_id">reg_end_date</x-slot>
                                        <x-slot name="label_text">Registration end date*</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">Participants cannot register for the event after this date </x-slot>
                                    </x-forms.textfield>


                                </div>
                            </div>
                            <div class="float-left w-full flex justify-center items-center gap-x-4">
                                <div class="float-left w-1/2">
                                    <x-forms.validationerror>
                                        <x-slot name="field_id">reg_start_date</x-slot>
                                        <x-slot name="error_text">reg_start_date_error</x-slot>
                                    </x-forms.validationerror>
                                </div>
                                <div class="float-left w-1/2">
                                    <x-forms.validationerror>
                                        <x-slot name="field_id">reg_end_date</x-slot>
                                        <x-slot name="error_text">reg_end_date_error</x-slot>
                                    </x-forms.validationerror>
                                </div>
                            </div>
                            <div class="float-left w-full flex justify-center items-center gap-x-4">
                                <div class="float-left w-1/2">
                                    <x-forms.textfield type="datetime-local" id="free_reg_end_date" name="free_reg_end_date"  :value="old('free_reg_end_date',$eventDates->free_registration_end_date ?? '' )" >
                                        <x-slot name="field_id">free_reg_end_date</x-slot>
                                        <x-slot name="label_text">Free registration end date</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">Participants cannot register for free after this date</x-slot>
                                    </x-forms.textfield>


                                </div>
                                <div class="float-left w-1/2">
                                    <x-forms.textfield type="datetime-local" id="upd_info_end_date" name="upd_info_end_date"  :value="old('upd_info_end_date',$eventDates->update_info_end_date ?? '' )" >
                                        <x-slot name="field_id">upd_info_end_date</x-slot>
                                        <x-slot name="label_text">Update info end date*</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">Participants cannot update their address or reward size after this date</x-slot>
                                    </x-forms.textfield>


                                </div>
                            </div>
                            <div class="float-left w-full flex justify-center items-center gap-x-4">
                                <div class="float-left w-1/2">
                                    <x-forms.validationerror>
                                        <x-slot name="field_id">free_reg_end_date</x-slot>
                                        <x-slot name="error_text">free_reg_end_date_error</x-slot>
                                    </x-forms.validationerror>
                                </div>
                                <div class="float-left w-1/2">
                                    <x-forms.validationerror>
                                        <x-slot name="field_id">upd_info_end_date</x-slot>
                                        <x-slot name="error_text">upd_info_end_date_error</x-slot>
                                    </x-forms.validationerror>
                                </div>
                            </div>
                        </x-slot>
                    </x-forms.section>
                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Leaderboard Dates
                        </x-slot>
                        <x-slot name="section_button">
                        </x-slot>
                        <x-slot name="section_heading_description_status">hidden</x-slot>
                        <x-slot name="section_heading_description_text">Event end date, results date and finisher certificate date can only be after event start date. </x-slot>
                        <x-slot name="section_content">
                            <div class="float-left w-full flex justify-center items-center gap-x-4">
                                <div class="float-left w-1/2">
                                    <x-forms.textfield type="datetime-local" id="leaderboard_start_date" name="leaderboard_start_date"  :value="old('leaderboard_start_date',$eventDates->leaderboard_start_date ?? '' )" >
                                        <x-slot name="field_id">leaderboard_start_date</x-slot>
                                        <x-slot name="label_text">Leaderboard start date*</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">The leaderboard will go live on this date and participants can sync activities.</x-slot>
                                    </x-forms.textfield>


                                </div>
                                <div class="float-left w-1/2">
                                    <x-forms.textfield type="datetime-local" id="leaderboard_end_date" name="leaderboard_end_date"  :value="old('leaderboard_end_date',$eventDates->leaderboard_end_date ?? '' )" >
                                        <x-slot name="field_id">leaderboard_end_date</x-slot>
                                        <x-slot name="label_text">Leaderboard end date*</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">The leaderboard will stop syncing activities after this date. The results have to be finalized after this date.</x-slot>
                                    </x-forms.textfield>


                                </div>
                            </div>
                            <div class="float-left w-full flex justify-center items-center gap-x-4">
                                <div class="float-left w-1/2">
                                    <x-forms.validationerror>
                                        <x-slot name="field_id">leaderboard_start_date</x-slot>
                                        <x-slot name="error_text">leaderboard_start_date_error</x-slot>
                                    </x-forms.validationerror>
                                </div>
                                <div class="float-left w-1/2">
                                    <x-forms.validationerror>
                                        <x-slot name="field_id">leaderboard_end_date</x-slot>
                                        <x-slot name="error_text">leaderboard_end_date_error</x-slot>
                                    </x-forms.validationerror>
                                </div>
                            </div>
                            <div class="float-left w-full flex justify-center items-center gap-x-4">
                                <div class="float-left w-1/2">
                                    <x-forms.textfield type="datetime-local" id="results_date" name="results_date"  :value="old('results_date',$eventDates->results_date ?? '' )" >
                                        <x-slot name="field_id">results_date</x-slot>
                                        <x-slot name="label_text">Results date and Finisher Certificate Date*</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">All activities have to be verified before this date. Participants can download the certificate from this day.</x-slot>
                                    </x-forms.textfield>

                                    <x-forms.validationerror>
                                        <x-slot name="field_id">results_date</x-slot>
                                        <x-slot name="error_text">results_date_error</x-slot>
                                    </x-forms.validationerror>
                                </div>
                                <div class="float-left w-1/2">
                                    <x-infoboxes.infobox class="mt-4">
                                        <x-slot name="heading">Verification period is between dd/mm/yy hh:mm and dd/mm/yy hh:mm</x-slot>
                                        <x-slot name="sub_heading">Ensure that all event activities are verified during this period.</x-slot>
                                    </x-infoboxes.infobox>
                                </div>
                            </div>

                        </x-slot>
                    </x-forms.section>
                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Upgrade
                        </x-slot>
                        <x-slot name="section_button">
                        </x-slot>
                        <x-slot name="section_heading_description_status">hidden</x-slot>
                        <x-slot name="section_heading_description_text"> </x-slot>
                        <x-slot name="section_content">
                            <div class="float-left w-full flex  flex-col">
                                <div class="float-left w-1/2 mt-4">
                                    <x-forms.toggle id="upgrade" name="upgrade"  value="{{ $eventDates != NULL && $eventDates->upgrade_start_date != Null ? 1:0 }}" >
                                        <x-slot name="field_id">upgrade</x-slot>
                                        <x-slot name="label_text">Enable Upgrade</x-slot>
                                        <x-slot name="label_description">Enabling upgrade will allow your team to buy rewards during this period.</x-slot>
                                    </x-forms.toggle>
                                </div>
                                <div class="float-left w-full flex justify-center items-center gap-x-4 hidden" id="event_dates_upgrade_section">
                                    <div class="float-left w-1/2">
                                        <x-forms.textfield type="datetime-local" id="upgrade_start_date" name="upgrade_start_date"  :value="old('upgrade_start_date',$eventDates->upgrade_start_date ?? '' )" >
                                            <x-slot name="field_id">upgrade_start_date</x-slot>
                                            <x-slot name="label_text">Upgrade start date*</x-slot>
                                            <x-slot name="label_description_status"></x-slot>
                                            <x-slot name="label_description">Participants can start buying rewards from this date.</x-slot>
                                        </x-forms.textfield>


                                    </div>
                                    <div class="float-left w-1/2">
                                        <x-forms.textfield type="datetime-local" id="upgrade_end_date" name="upgrade_end_date"  :value="old('upgrade_end_date',$eventDates->upgrade_end_date ?? '' )">
                                            <x-slot name="field_id">upgrade_end_date</x-slot>
                                            <x-slot name="label_text">Upgrade end date*</x-slot>
                                            <x-slot name="label_description_status"></x-slot>
                                            <x-slot name="label_description">Participants cannot buy rewards after this date.</x-slot>
                                        </x-forms.textfield>


                                    </div>
                                </div>
                                <div class="float-left w-full flex justify-center items-center gap-x-4">
                                    <div class="float-left w-1/2">
                                        <x-forms.validationerror>
                                            <x-slot name="field_id">upgrade_start_date</x-slot>
                                            <x-slot name="error_text">upgrade_start_date_error</x-slot>
                                        </x-forms.validationerror>
                                    </div>
                                    <div class="float-left w-1/2">
                                        <x-forms.validationerror>
                                            <x-slot name="field_id">upgrade_end_date</x-slot>
                                            <x-slot name="error_text">upgrade_end_date_error</x-slot>
                                        </x-forms.validationerror>
                                    </div>
                                </div>
                            </div>


                        </x-slot>
                    </x-forms.section>

            </div>
        </main>
    </div>
    <div class="float-left w-full text-right" style="position: sticky;bottom: 0;background: white;    padding: 20px;">
        <x-forms.submit value="Save" name="event_essentials_save" id="event_essentials_save">
            Save
        </x-forms.submit>
    </div>

    </form>
    <script>

        // var today = new Date().toISOString().slice(0, 16);
        //
        // document.getElementsByName("reg_end_date")[0].min = today;

        // $.validator.addMethod("greaterThan", function(value, element){
        //     var startdatevalue = $('#reg_start_date').val();
        //     return Date.parse(startdatevalue) &lt;= Date.parse(value);
        // }, 'End Date should be greater than equal to Start Date.');

        jQuery.validator.addMethod("greaterThan",
            function(value, element, params) {

                if (!/Invalid|NaN/.test(new Date(value))) {
                    return new Date(value) > new Date($(params).val());
                }

                return isNaN(value) && isNaN($(params).val())
                    || (Number(value) > Number($(params).val()));
            },'Must be greater than {0}.');

        jQuery.validator.addMethod("greaterThanEqualTo",
            function(value, element, params) {

                if (!/Invalid|NaN/.test(new Date(value))) {
                    return new Date(value) >= new Date($(params).val());
                }

                return isNaN(value) && isNaN($(params).val())
                    || (Number(value) >= Number($(params).val()));
            },'Must be greater than or equal to {0}.');

        $("#create-event-date_010").validate({
            rules: {
                reg_start_date:{
                    required: true

                },
                reg_end_date:{
                    required: true,
                    greaterThan: "#reg_start_date"
                },
                free_reg_end_date:{
                    greaterThan: "#reg_start_date"
                },
                upd_info_end_date:{
                    required: true,
                    greaterThan: "#reg_start_date"
                },
                leaderboard_start_date:{
                    required: true,
                    greaterThanEqualTo: "#reg_start_date"
                },
                leaderboard_end_date:{
                    required: true,
                    greaterThan: "#leaderboard_start_date"
                },
                results_date:{
                    required: true,
                    greaterThan: "#reg_start_date",
                    greaterThan: "#leaderboard_start_date",
                    greaterThanEqualTo: "#leaderboard_end_date"
                },
                upgrade_start_date:{
                    required : function(){
                        if($("#upgrade").val()== 1 == 1){
                            return true;
                        }
                        else
                        {
                            return false;
                        }
                    },
                    greaterThanEqualTo: "#reg_start_date"

                },
                upgrade_end_date:{
                    required : function(){
                        if($("#upgrade").val()== 1 == 1){
                            return true;
                        }
                        else
                        {
                            return false;
                        }
                    },
                    greaterThan: "#upgrade_start_date"

                },

            }
        });
        var isadd= '{{$isadd}}';
        console.log(isadd);
        var $form = $('form'),
            origForm = $form.serialize();
        formchanged=0;
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
    </script>

</x-app-layout>

