<x-app-layout>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
{{--    <script src="https://unpkg.com/@yaireo/dragsort"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
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
    </style>
    @include('layouts.admin.events.subheader')

    <div class="w-full flex flex-col sm:flex-row flex-grow overflow-hidden bg-light-gray-bg">
        @include('layouts.admin.events.sidebar')
        <main role="main" class="w-full h-full flex-grow p-3 overflow-auto">
            <div class="float-left w-full max-w-screen-xl">
                <x-admin.breadcrumb>
                    <x-slot name="header">Essentials</x-slot>
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
                <form method="POST" id="create-event-f_010" name="create-event-f_010" action="{{route('admin.events.info.essentials.store',array($id))}}" class="w-full float-left" autocomplete="false" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="challengeId" value="{{$id}}">

{{--                    @if($errors->any())--}}
{{--                        <x-infoboxes.error class="mt-4" :value="$errors"></x-infoboxes.error>--}}
{{--                    @endif--}}

                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            What would you like to name your Event?*
                        </x-slot>
                        <x-slot name="section_button">

                        </x-slot>
                        <x-slot name="section_heading_description_status"></x-slot>
                        <x-slot name="section_heading_description_text">Example: Togoparts Year-End Celebration Challenge. Togoparts Year-End Celebration Challenge</x-slot>
                        <x-slot name="section_content">
                            <div class="float-left w-full mt-4">
                                <x-forms.bigtextfield  name="event_name" id="event_name" type="text" placeholder="Untitled Event" :value="old('event_name',$event->name ?? '' )">
                                </x-forms.bigtextfield>
                            </div>
                        </x-slot>
                        <x-forms.validationerror>
                            <x-slot name="field_id">event_name</x-slot>
                            <x-slot name="error_text">event_name_error</x-slot>
                        </x-forms.validationerror>
                    </x-forms.section>

                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Give your event a short name.
                        </x-slot>
                        <x-slot name="section_button">

                        </x-slot>
                        <x-slot name="section_heading_description_status"></x-slot>
                        <x-slot name="section_heading_description_text">Follow hashtag rules. No special characters are accepted</x-slot>
                        <x-slot name="section_content">
                            <div class="float-left w-full flex justify-start mt-4 items-center">
                                <span class="font-bold font-poppins text-placeholder text-3xl">#</span>
                                <x-forms.bigtextfield name="event_hashtag" id="event_hashtag" type="text" class="uppercase" placeholder="UNTITLED EVENT" :value="old('event_hashtag',$event->hashtag ?? '' )"></x-forms.bigtextfield>
                            </div>
                        </x-slot>
                        <x-forms.validationerror>
                            <x-slot name="field_id">event_hashtag</x-slot>
                            <x-slot name="error_text">event_hashtag_error</x-slot>
                        </x-forms.validationerror>
                    </x-forms.section>

                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            URL
                        </x-slot>
                        <x-slot name="section_button">

                        </x-slot>
                        <x-slot name="section_heading_description_status">hidden</x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">
                            <div class="float-left w-full flex gap-x-6 justify-center items-end">
                                <div class="float-left w-auto">
                                    <x-forms.select id="domain" name="domain">
                                        <x-slot name="field_id">domain</x-slot>
                                        <x-slot name="label_text">Domain*</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">Select the domain that is appropriate for your event.</x-slot>
                                        <x-slot name="options">
                                            <option value="" >--Select Domain--</option>
                                            <option value="1" {{isset($event) && $event->domain == 1 ? "selected" : ""}}>events.togoparts.com</option>
                                        </x-slot>
                                    </x-forms.select>
                                </div>
                                <div class="float-left w-auto text-4xl font-poppins-semibold text-dark-gray">
                                    /
                                </div>
                                <div class="float-left w-auto">
                                    <x-forms.textfield id="slug" name="slug" placeholder="event-name" :value="old('slug',$event->slug ?? '' )">
                                        <x-slot name="field_id">slug</x-slot>
                                        <x-slot name="label_text">Unique Event Name*</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">This unique name will appear after the domain name in the URL</x-slot>
                                    </x-forms.textfield>

                                </div>
                            </div>
                            <div class="float-left w-full flex gap-x-12">
                                <div class="w-5/12" >
                                    <x-forms.validationerror>
                                        <x-slot name="field_id">domain</x-slot>
                                        <x-slot name="error_text">domain_error</x-slot>
                                    </x-forms.validationerror>
                                </div>

                                <div class="w-5/12"  >
                                    <x-forms.validationerror>
                                        <x-slot name="field_id">slug</x-slot>
                                        <x-slot name="error_text">slug_error</x-slot>
                                    </x-forms.validationerror>
                                </div>
                            </div>
                        </x-slot>
                    </x-forms.section>

                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Description
                        </x-slot>
                        <x-slot name="section_button">

                        </x-slot>
                        <x-slot name="section_heading_description_status">hidden</x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">
                            <x-forms.textarea id="description" name="description" rows="4"  placeholder="What's so special about the event? Describe why it's important for someone to participate. Keep it simple." class="h-32">
                                <x-slot name="field_id">description</x-slot>
                                <x-slot name="label_text">Share details about the event*</x-slot>
                                <x-slot name="label_description_status"></x-slot>
                                <x-slot name="label_description">This description will be shown on the event card which will be displayed on the events page.</x-slot>
                                {{old('description',$event->description ?? '')}}
                            </x-forms.textarea>
                            <div>
                                <x-forms.validationerror>
                                    <x-slot name="field_id">description</x-slot>
                                    <x-slot name="error_text">description_error</x-slot>
                                </x-forms.validationerror>
                                <span class="float-right" id="title_count"><span id="desccount">{{$event!= null ?strlen($event->description) : '' }}/</span>200 characters.</span>
                            </div>

                        </x-slot>
                    </x-forms.section>

                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Basic Info
                        </x-slot>
                        <x-slot name="section_button">

                        </x-slot>
                        <x-slot name="section_heading_description_status">hidden</x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">
                            <div class="float-left w-1/2">
                                <x-forms.select id="timezone" name="timezone">
                                    <x-slot name="field_id">timezone</x-slot>
                                    <x-slot name="label_text">Timezone*</x-slot>
                                    <x-slot name="label_description_status"></x-slot>
                                    <x-slot name="label_description">The event schedule will happen according to this timezone.</x-slot>
                                    <x-slot name="options">
                                        <option value="">--Select Timezone--</option>
                                        <option value="+8" {{isset($event) && $event->timezone == "+8" ? "selected" : ""}}>GMT +8(Singapore, Malaysia)</option>
                                    </x-slot>

                                </x-forms.select>
                                <x-forms.validationerror>
                                    <x-slot name="field_id">timezone</x-slot>
                                    <x-slot name="error_text">timezone_error</x-slot>
                                </x-forms.validationerror>
                            </div>
                            <div class="float-left w-full flex justify-center items-center gap-x-4">
                                <div class="float-left w-1/2">
                                    <x-forms.textfield id="email" name="email" placeholder="eventname@togoparts.com" :value="old('email',$event->email ?? '' )">
                                        <x-slot name="field_id">email</x-slot>
                                        <x-slot name="label_text">Event email*</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">People will reply to this email. </x-slot>
                                    </x-forms.textfield>
                                    <x-forms.validationerror>
                                        <x-slot name="field_id">email</x-slot>
                                        <x-slot name="error_text">email_error</x-slot>
                                    </x-forms.validationerror>
                                </div>

                                <div class="float-left w-1/2">
                                    <div class="float-left w-full">
                                        <label for="email_forward" class="float-left w-full mt-4 text-lg text-placeholder font-poppins-bold">
                                            Email forward
                                        </label>
                                        <p class="float-left w-full text-gray text-sm mt-1">
                                            By default, forward is set to the email, alerts@togoparts.com. By checking this box, your custom email will be used if already set.
                                        </p>
                                        <div class="float-left w-full flex items-center rounded-sm mt-2">
                                            <input type="checkbox" id="email_forward" name="email_forward" class="mr-2 border border-gray">
                                            <span class="text-sm text-gray">Email forward has been created</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </x-slot>
                    </x-forms.section>

                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Type
                        </x-slot>
                        <x-slot name="section_button">

                        </x-slot>
                        <x-slot name="section_heading_description_status">hidden</x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">
                            <div class="float-left w-1/2">
                                <x-forms.select id="accessibility" name="event_type">
                                    <x-slot name="field_id">accessibility</x-slot>
                                    <x-slot name="label_text">Event Type*</x-slot>
                                    <x-slot name="label_description_status"></x-slot>
                                    <x-slot name="label_description">This will decide to whom the event should be shown. Once the event is published, the event type cannot be changed. </x-slot>
                                    <x-slot name="options">
                                        <option value="public" {{isset($event) && $event->accessibility == "public" ? "selected" : ""}}>Public</option>
                                        <option value="private" {{isset($event) && $event->accessibility == "private" ? "selected" : ""}}>Private</option>
                                    </x-slot>
                                </x-forms.select>
                            </div>

                            <div class="float-left w-full {{isset($event) && $event->accessibility == "private"? 'hidden' :'' }}" id="public_event_section">
                                <div class="float-left w-1/2">
                                    <x-forms.select id="visibility" name="visibility">
                                        <x-slot name="field_id">visibility</x-slot>
                                        <x-slot name="label_text">Visibility*</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">This will decide how the event should be shown to the users. </x-slot>
                                        <x-slot name="options">
                                            <option value="1" {{isset($event) && $event->visibility == "1" ? "selected" : ""}}>Show on Togoparts event listing page & homepage.</option>
                                            <option value="0" {{isset($event) && $event->visibility == "0" ? "selected" : ""}}><i class="fa fa-eye"></i> Don’t show on Togoparts event listing page & homepage</option>
                                        </x-slot>
                                    </x-forms.select>
                                </div>
                            </div>

                            <div class="float-left w-full {{isset($event) && $event->accessibility == "public"? 'hidden' :'' }}" id="private_event_section">
                                <div class="float-left w-full ">
                                    <x-forms.textarea id="accepted_domains" name="accepted_domains" placeholder="" class="h-32 accepted_domains ">
                                        <x-slot name="field_id">accepted_domains</x-slot>
                                        <x-slot name="label_text">Accepted domains</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">Type the domain and click the tab or enter.</x-slot>
                                        {{old('description',$accepted_domains ?? '')}}
                                    </x-forms.textarea>
                                </div>
                                <div class="float-left w-full">
                                    <x-forms.textarea id="accepted_emails" name="accepted_emails" placeholder=""  class="h-32 accepted_emails">
                                        <x-slot name="field_id">accepted_emails</x-slot>
                                        <x-slot name="label_text">Accepted emails</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">Type the email and click the tab or enter.</x-slot>
                                        {{old('description',$accepted_emails ?? '')}}
                                    </x-forms.textarea>
                                </div>
                            </div>

                        </x-slot>
                    </x-forms.section>

            </div>
        </main>
    </div>
    <div class="float-left w-full text-right" style="position: sticky;
    bottom: 0;background: white;    padding: 20px;">
        <x-forms.submit value="Save" name="event_essentials_save" id="event_essentials_save">
            Save
        </x-forms.submit>
    </div>

    </form>
    <script>

        $('#description').keyup(function() {
            $('#desccount').html(this.value.length+'/');
            if(this.value.length > 200){
                $("#title_count").css('color','red');
            } else{
                $("#title_count").css('color','black');

            }
            console.log(this.value.length);
        });
        $("#create-event-f_010").validate({
            rules: {
                event_name:{
                    required: true,
                },
                event_hashtag:{
                    required: true,
                    alphanumeric: true
                },
                domain: {
                    required: true,
                },
                event_name: {
                    required: true,
                },
                slug: {
                    required: true,

                    lettersonly: true
                },
                description: {
                    required: true,
                    maxlength:200
                },
                timezone: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true
                }
            },
            submitHandler : function (form) {
                return true;
            }
        });
        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z0-9]+$/i.test(value);
        }, "Letters and numbers only please");

        var isadd= '{{$isadd}}';

        $(window).on('load', function () {

             $form = $('form');
            origForm = $form.serialize();
            formchanged=0;
            console.log(origForm);

            $('form :input').on('change input', function() {
                console.log($form.serialize());
                if($form.serialize() !== origForm){
                    formchanged=1;
                    console.log(formchanged);
                }
            });

            $('div#admin-sidebar a').click(function(){
                console.log(formchanged);
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
        });



        // The DOM element you wish to replace with Tagify
        var accepted_domain = document.querySelector('textarea[name=accepted_domains]');
        var accepted_email = document.querySelector('textarea[name=accepted_emails]');
        // initialize Tagify on the above input node reference
        // var tagify = new Tagify(accepted_domain)
        // var tagify = new Tagify(accepted_email)
        var tagify = new Tagify(accepted_domain, {
            originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
        })

        var tagify1 = new Tagify(accepted_email, {
            originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(',')
        })
        // bind "DragSort" to Tagify's main element and tell
        // it that all the items with the below "selector" are "draggable"
        // var dragsort = new DragSort(tagify.DOM.scope, {
        //     selector: '.'+tagify.settings.classNames.accepted_domains,
        //     callbacks: {
        //         dragEnd: onDragEnd
        //     }
        // })

        // must update Tagify's value according to the re-ordered nodes in the DOM
        // function onDragEnd(elm){
        //     tagify.updateValueByDOMTags()
        // }

        // listen to tagify "change" event and print updated value
        // tagify.on('change', e => console.log(e.detail.value))


    </script>
</x-app-layout>
