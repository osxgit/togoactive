<x-app-layout>
    @include('layouts.admin.events.subheader')
    <div class="w-full flex flex-col sm:flex-row flex-grow overflow-hidden bg-light-gray-bg">
        @include('layouts.admin.events.sidebar')
        <main role="main" class="w-full h-full flex-grow p-3 overflow-auto">
            <div class="float-left w-full max-w-screen-xl">
                <x-admin.breadcrumb>
                    <x-slot name="header">Event Information</x-slot>
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
                @if ($errors->any())
                    <div class="alert alert-danger">
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

                    @if($errors->any())
                        <x-infoboxes.error class="mt-4" :value="$errors"></x-infoboxes.error>
                    @endif

                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            What would you like to name your Event?*
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
                        <x-slot name="section_heading_description_status"></x-slot>
                        <x-slot name="section_heading_description_text">Follow hashtag rules. No special characters are accepted</x-slot>
                        <x-slot name="section_content">
                            <div class="float-left w-full flex justify-start mt-4 items-center">
                                <span class="font-bold font-poppins text-placeholder text-3xl">#</span>
                                <x-forms.bigtextfield name="event_hashtag" id="event_hashtag" type="text" class="uppercase" placeholder="UNTITLEDEVENT" :value="old('event_hashtag',$event->hashtag ?? '' )"></x-forms.bigtextfield>
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
                        <x-slot name="section_heading_description_status">hidden</x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">
                            <x-forms.textarea id="description" name="description" placeholder="What's so special about the event? Describe why it's important for someone to participate. Keep it simple." class="h-32">
                                <x-slot name="field_id">description</x-slot>
                                <x-slot name="label_text">Share details about the event*</x-slot>
                                <x-slot name="label_description_status"></x-slot>
                                <x-slot name="label_description">This description will be shown on the event card which will be displayed on the events page.</x-slot>
                                {{old('description',$event->description ?? '')}}
                            </x-forms.textarea>
                            <x-forms.validationerror>
                                <x-slot name="field_id">description</x-slot>
                                <x-slot name="error_text">description_error</x-slot>
                            </x-forms.validationerror>
                        </x-slot>
                    </x-forms.section>

                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Basic Info
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
                                    <x-forms.textarea id="accepted_domains" name="accepted_domains" placeholder="" class="h-32">
                                        <x-slot name="field_id">accepted_domains</x-slot>
                                        <x-slot name="label_text">Accepted domains</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">Type the domain and click the spacebar or comma.</x-slot>
                                        {{old('description',$accepted_domains ?? '')}}
                                    </x-forms.textarea>
                                </div>
                                <div class="float-left w-full">
                                    <x-forms.textarea id="accepted_emails" name="accepted_emails" placeholder="" class="h-32">
                                        <x-slot name="field_id">accepted_emails</x-slot>
                                        <x-slot name="label_text">Accepted emails</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">Type the email and click the spacebar or comma.</x-slot>
                                        {{old('description',$accepted_emails ?? '')}}
                                    </x-forms.textarea>
                                </div>
                            </div>
                            <div class="float-left w-full mt-8 text-right">
                                <x-forms.submit value="Save" name="event_essentials_save" id="event_essentials_save">
                                    Save
                                </x-forms.submit>
                            </div>
                        </x-slot>
                    </x-forms.section>
                </form>
            </div>
        </main>
    </div>
<script>

    $("#create-event-f_010").validate({
        rules: {
            event_name:{
                required: true,
            },
            event_hashtag:{
                required: true,
            },
            domain: {
                required: true,
            },
            event_name: {
                required: true,
            },
            slug: {
                required: true,
            },
            description: {
                required: true,
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
</script>
</x-app-layout>
