<x-app-layout>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    {{--    <script src="https://unpkg.com/@yaireo/dragsort"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js?apiKey=4rcnfqnlzfiuwfia3kjfez410ye1smutxh8kj2i126izgth4/tinymce"></script>

    <style>

        #grouping_div label.float-left.w-full.mt-4.text-lg.text-placeholder.font-poppins-bold{

            color: #777777;
            font-size: 16px;
        }
        #grouping_div span.ml-3.text-lg.text-placeholder.font-poppins-bold{

            color: #777777;
            font-size: 16px;
        }
        .peer:checked~.peer-checked\:bg-purple-600 {
            --tw-bg-opacity: 1;
            background-color: rgb(147 51 234 / var(--tw-bg-opacity)) !important;
        }

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
        }  .tox-tinymce{
               width:100%;
           }
        .mce-notification-warning, .tox-notifications-container{
            display: none;
        }
        .mce-statusbar, .tox-statusbar{
            display: none !important;

        }

        #div_intro_message{
            border:none !important;
        }

    </style>
    @include('layouts.admin.events.subheader')

    <div class="w-full flex flex-col sm:flex-row flex-grow overflow-hidden bg-light-gray-bg">
        @include('layouts.admin.events.sidebar')
        <main role="main" class="w-full h-full flex-grow p-3 overflow-auto">
            <div class="float-left w-full max-w-screen-xl">
                <x-admin.breadcrumb>
                    <x-slot name="header">Registration Page Setup</x-slot>
                    <x-slot name="breadcrumb">
                        <a class="text-primary font-poppins-semibold text-sm" href="">Events</a> >
                        <a class="text-nav-gray font-poppins text-sm" href="{{route('admin.events.info.essentials',$id)}}">{{$event->name ?? "Untitled"}}</a> >
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
                <form method="POST" id="create-event-registration-f_010" name="create-event-registration-f_010" action="{{route('admin.events.registration.store',array($id))}}" class="w-full float-left" autocomplete="false" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="challengeId" value="{{$id}}">
                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Basic Info
                        </x-slot>
                        <x-slot name="section_button">

                        </x-slot>
                        <x-slot name="section_heading_description_status">hidden</x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">
                            <div class="float-left w-full mt-4">
                                <x-forms.textarea id="intro_message" name="intro_message" placeholder="" class="h-32 intro_message ">
                                    <x-slot name="field_id">intro_message</x-slot>
                                    <x-slot name="label_text"></x-slot>
                                    <x-slot name="label_description_status">hidden</x-slot>
                                    <x-slot name="label_description"></x-slot>
                                    {{$registrationSetup->intro_message ?? ''}}
                                </x-forms.textarea>
                            </div>
                        </x-slot>
                        <x-forms.validationerror>
                            <x-slot name="field_id">intro_message</x-slot>
                            <x-slot name="error_text">intro_message</x-slot>
                        </x-forms.validationerror>
                    </x-forms.section>

                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Additional Options
                        </x-slot>
                        <x-slot name="section_button">

                        </x-slot>
                        <x-slot name="section_heading_description_status">hidden</x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">
                            <div class=" py-2 float-left ">
                                <x-forms.toggle id="enable_teams" name="enable_teams" value="{{$registrationSetup->enable_teams??0 }}">
                                    <x-slot name="field_id">enable_teams</x-slot>
                                    <x-slot name="label_text">Enable Teams</x-slot>
                                    <x-slot name="label_description">Enabling teams will allow participants to join or create teams.</x-slot>
                                </x-forms.toggle>
                                <div>
                                    <div class=" float-left w-full flex team_mem_div hidden" id="team_mem_div">
                                        <div class="w-5/12 mr-4" >
                                            <x-forms.number id="min_members" name="min_members" placeholder="" :value="old('max_members',$registrationSetup->min_members ?? '' )">
                                                <x-slot name="field_id">min_members</x-slot>
                                                <x-slot name="label_text">Minimum number of team members</x-slot>
                                                <x-slot name="label_description_status">hidden</x-slot>
                                                <x-slot name="label_description"></x-slot>
                                            </x-forms.number>
                                            <x-forms.validationerror>
                                                <x-slot name="field_id">min_members</x-slot>
                                                <x-slot name="error_text">min_members_error</x-slot>
                                            </x-forms.validationerror>
                                        </div>
                                        <div class="w-7/12">
                                            <x-forms.number id="max_members" name="max_members" placeholder="" :value="old('max_members',$registrationSetup->max_members ?? '' )">
                                                <x-slot name="field_id">max_members</x-slot>
                                                <x-slot name="label_text">Maximum number of team members</x-slot>
                                                <x-slot name="label_description_status">hidden</x-slot>
                                                <x-slot name="label_description"></x-slot>
                                            </x-forms.number>
                                            <x-forms.validationerror>
                                                <x-slot name="field_id">max_members</x-slot>
                                                <x-slot name="error_text">max_members_error</x-slot>
                                            </x-forms.validationerror>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="py-2  float-left">
                            <x-forms.toggle id="enable_referral" name="enable_referral" value="{{$registrationSetup->enable_referral ?? 0 }}">
                                <x-slot name="field_id">enable_referral</x-slot>
                                <x-slot name="label_text">Enable Referral</x-slot>
                                <x-slot name="label_description">Enabling referral will allow participants to unlock achievements when their friends and family register with referral code.</x-slot>
                            </x-forms.toggle>
                            </div>
                            <div class=" py-2  float-left">
                            <x-forms.toggle id="enable_coupon" name="enable_coupon" value="{{$registrationSetup->enable_coupon ?? 0 }}">
                                <x-slot name="field_id">enable_coupon</x-slot>
                                <x-slot name="label_text">Enable Coupon</x-slot>
                                <x-slot name="label_description">This will allow participants to enter coupon code to get discount on merchandise.</x-slot>
                            </x-forms.toggle>
                            </div>
                            <div class="py-2  float-left">
                            <x-forms.toggle id="enable_delivery_address" name="enable_delivery_address" value="{{$registrationSetup->enable_delivery_address ?? 0 }}">
                                <x-slot name="field_id">enable_delivery_address</x-slot>
                                <x-slot name="label_text">Enable Delivery Address</x-slot>
                                <x-slot name="label_description">Collect delivery address if you want their address for records or to deliver rewards.</x-slot>
                            </x-forms.toggle>
                                <div id="address_reason_div" class="hidden">

                                    <x-forms.select id="reason_for_collecting_address" name="reason_for_collecting_address">
                                        <x-slot name="field_id">reason_for_collecting_address</x-slot>
                                        <x-slot name="label_text"></x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">Select the reason for collecting address</x-slot>
                                        <x-slot name="options">

                                            <option value="The rewards will be delivered to the address filled out below." {{!is_null($registrationSetup) && isset($registrationSetup->reason_for_collecting_address) && $registrationSetup->reason_for_collecting_address == 'The rewards will be delivered to the address filled out below.'?'selected':'' }}><i class="fa fa-truck mr-2" aria-hidden="true"></i>The rewards will be delivered to the address filled out below.</option>
                                            <option value="This is for our records to know the location of the participants." {{!is_null($registrationSetup) && isset($registrationSetup->reason_for_collecting_address) &&$registrationSetup->reason_for_collecting_address == 'This is for our records to know the location of the participants.'?'selected':'' }}><i class="fa fa-file mr-2" aria-hidden="true"></i>This is for our records to know the location of the participants.</option>
                                            <option value="Custom reason" {{!is_null($registrationSetup) && isset($registrationSetup->enable_delivery_address) &&$registrationSetup->reason_for_collecting_address != 'This is for our records to know the location of the participants.' && $registrationSetup->reason_for_collecting_address != 'The rewards will be delivered to the address filled out below.'?'selected':'' }}><i class="fa fa-plus mr-2" aria-hidden="true"></i>New custom reason</option>

                                        </x-slot>
                                    </x-forms.select>
                                </div>
                                <div id="custom_reason_div" class="{{!is_null($registrationSetup) && isset($registrationSetup->reason_for_collecting_address) && $registrationSetup->reason_for_collecting_address != 'This is for our records to know the location of the participants.' && $registrationSetup->reason_for_collecting_address != 'The rewards will be delivered to the address filled out below.'?'':'hidden' }}">

                                    <x-forms.textfield id="custom_reason" name="custom_reason" placeholder="Type your reason" value="{{$registrationSetup->reason_for_collecting_address ?? ''}}">
                                        <x-slot name="field_id">custom_reason</x-slot>
                                        <x-slot name="label_text"></x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">State reason for collecting address</x-slot>
                                    </x-forms.textfield>
                                    <div>
                                        <x-forms.validationerror>
                                            <x-slot name="field_id">custom_reason</x-slot>
                                            <x-slot name="error_text">custom_reason_error</x-slot>
                                        </x-forms.validationerror>
                                        <span class="float-right" id="title_count"><span id="desccount">{{$registrationSetup!= null ?strlen($registrationSetup->reason_for_collecting_address) : 0 }}/</span>70 characters.</span>
                                    </div>

                                </div>
                            </div>
                        </x-slot>

                    </x-forms.section>

                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            <x-infoboxes.warning>
                                <x-slot name="heading">This section is for Togoparts tech team.</x-slot>
                            </x-infoboxes.warning>
                            Grouping
                        </x-slot>
                        <x-slot name="section_button">

                        </x-slot>
                        <x-slot name="section_heading_description_status">hidden</x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">
                            <div class="py-2  float-left">
                            <x-forms.toggle id="enable_grouping" name="enable_grouping"  value="{{$registrationSetup->enable_grouping ?? 1 }}">
                                <x-slot name="field_id">enable_grouping</x-slot>
                                <x-slot name="label_text">Enable Grouping </x-slot>
                                <x-slot name="label_description">For multiple grouping, tech team would have to manually create groupings.</x-slot>
                            </x-forms.toggle>
                                <div class="float-left w-full md:w-7/12 ml-4 " id="grouping_div">

                                    <x-forms.textfield id="grouping_header" name="grouping_header" placeholder="Type your reason" :value="old('grouping_header',$registrationSetup->grouping_header ?? '' )" >
                                        <x-slot name="field_id">grouping_header</x-slot>
                                        <x-slot name="label_text">Grouping header name</x-slot>
                                        <x-slot name="label_description_status">hidden</x-slot>
                                        <x-slot name="label_description"></x-slot>
                                    </x-forms.textfield>
                                    <x-forms.validationerror>
                                        <x-slot name="field_id">grouping_header</x-slot>
                                        <x-slot name="error_text">grouping_header_error</x-slot>
                                    </x-forms.validationerror>
                                    <div class="float-left w-auto py-2">
                                        <x-forms.textfield id="field_value" name="field_value" placeholder="Event name or something similar" :value="old('field_value',$registrationSetup->field_value ?? '' )">
                                            <x-slot name="field_id">field_value</x-slot>
                                            <x-slot name="label_text">Field value</x-slot>
                                            <x-slot name="label_description_status"></x-slot>
                                            <x-slot name="label_description">Enter the values and each value should appear in a new line</x-slot>
                                        </x-forms.textfield>
                                        <div>
                                            <x-forms.validationerror>
                                                <x-slot name="field_id">field_value</x-slot>
                                                <x-slot name="error_text">field_value_error</x-slot>
                                            </x-forms.validationerror>
                                        </div>

                                    </div>
                                    <div class="py-2  float-left">
                                        <x-forms.toggle id="enable_random_allocation" name="enable_random_allocation"  value="{{$registrationSetup->enable_random_allocation ?? 0 }}">
                                            <x-slot name="field_id">enable_random_allocation</x-slot>
                                            <x-slot name="label_text">Enable random allocation</x-slot>
                                            <x-slot name="label_description">he user will be randomly assigned to the groups above if this is turned on</x-slot>
                                        </x-forms.toggle>
                                    </div>
                                    <div class="w-full ">

                                        <x-forms.file_upload>
                                            <x-slot name="field_id">geo_json</x-slot>
                                            <x-slot name="label_text">Regional GEOJson - (State/District/Province) Competition</x-slot>
                                            <x-slot name="label_description_status"></x-slot>
                                            <x-slot name="label_description">Upload GEOJson file for map view</x-slot>
                                            <x-slot name="field_text">{{$registrationSetup->geo_json ?? '' }}</x-slot>
                                        </x-forms.file_upload>

                                    </div>
                                    <div class="py-4  w-full float-left">
                                        <x-forms.toggle id="enable_map_view" name="enable_map_view"  value="{{$registrationSetup->enable_map_view ?? 0 }}">
                                            <x-slot name="field_id">enable_map_view</x-slot>
                                            <x-slot name="label_text">Enable map view</x-slot>
                                            <x-slot name="label_description"></x-slot>
                                        </x-forms.toggle>
                                    </div>

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

        $('#custom_reason ').keyup(function() {
            $('#desccount').html(this.value.length+'/');
            if(this.value.length > 70){

                $('#title_count').css('color','red');
            } else{
                $('#title_count').css('color','black');
            }
            console.log(this.value.length);
        });
        tinymce.init({
            selector: 'textarea#intro_message',

            plugins: 'lists code emoticons table codesample image imagetools link textcolor',
            table_toolbar: 'tableprops tabledelete | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol',

            toolbar: 'undo redo | styleselect | bold italic |  fontsize |' +
                'alignleft aligncenter alignright alignjustify | ' +
                'outdent indent | numlist bullist | emoticons  | link image | custom_button | forecolor backcolor',
            menubar: 'table insert',
            table_sizing_mode: 'responsive' ,
            automatic_uploads: true,
            file_picker_types: 'image',
            table_use_colgroups: true,
            table_default_attributes: {
                border: '0'
            },
            table_row_class_list: [
                {title: 'None', value: ''},
                {title: 'No Border', value: 'table_row_no_border'},
                {title: 'Red border', value: 'table_row_red_border'},
                {title: 'Blue border', value: 'table_row_blue_border'},
                {title: 'Green border', value: 'table_row_green_border'}
            ],
            table_advtab: true,
            table_cell_advtab: true,
            table_row_advtab: true,
            emoticons_append: {
                custom_mind_explode: {
                    keywords: ['brain', 'mind', 'explode', 'blown'],
                    char: '🤯'
                }
            },
            file_picker_callback: function (cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');

                /*
                  Note: In modern browsers input[type="file"] is functional without
                  even adding it to the DOM, but that might not be the case in some older
                  or quirky browsers like IE, so you might want to add it to the DOM
                  just in case, and visually hide it. And do not forget do remove it
                  once you do not need it anymore.
                */

                input.onchange = function () {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.onload = function () {
                        /*
                          Note: Now we need to register the blob in TinyMCEs image blob
                          registry. In the next release this part hopefully won't be
                          necessary, as we are looking to handle it internally.
                        */
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);

                        /* call the callback and populate the Title field with the file name */
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                    reader.readAsDataURL(file);
                };

                input.click();
            },
            // plugins: [
            //     "advlist autolink lists link image charmap print preview anchor",
            //     "searchreplace visualblocks code fullscreen",
            //     "insertdatetime media table paste codesample emoticons"
            // ],
            // toolbar: 'undo redo | styleselect | bold italic | ' +
            //     'alignleft aligncenter alignright alignjustify | ' +
            //     'outdent indent | numlist bullist | emoticons | custom_button',
            // emoticons_append: {
            //     custom_mind_explode: {
            //         keywords: ['brain', 'mind', 'explode', 'blown'],
            //         char: '🤯'
            //     }
            // },
            content_css: ["/css/custom_css_tinymce.css"],
            font_formats:"Segoe UI=Segoe UI;",
            fontsize_formats: "8px 9px 10px 11px 12px 14px 16px 18px 20px 22px 24px 26px 28px 30px 32px 34px 36px 38px 40px 42px 44px 46px 48px 50px 52px 54px 56px 58px 60px 62px 64px 66px 68px 70px 72px 74px 76px 78px 80px 82px 84px 86px 88px 90px 92px 94px 94px 96px",
            codesample_languages: [
                {text: 'HTML/XML', value: 'markup'},
                {text: 'JavaScript', value: 'javascript'},
                {text: 'CSS', value: 'css'},
                {text: 'PHP', value: 'php'},
                {text: 'Ruby', value: 'ruby'},
                {text: 'Python', value: 'python'},
                {text: 'Java', value: 'java'},
                {text: 'C', value: 'c'},
                {text: 'C#', value: 'csharp'},
                {text: 'C++', value: 'cpp'}
            ],
            height: 600,
            setup: function (editor) {
                editor.on('Paste Change input Undo Redo', function () {
                    formchanged=1;
                    console.log(formchanged);
                });
                editor.ui.registry.addButton('custom_button', {
                    text: 'Add Button',
                    onAction: function() {
                        // Open a Dialog
                        editor.windowManager.open({
                            title: 'Add custom button',
                            body: {
                                type: 'panel',
                                items: [{
                                    type: 'input',
                                    name: 'button_label',
                                    label: 'Button label',
                                    flex: true
                                },{
                                    type: 'input',
                                    name: 'button_href',
                                    label: 'Button href',
                                    flex: true
                                },{
                                    type: 'selectbox',
                                    name: 'button_target',
                                    label: 'Target',
                                    items: [
                                        {text: 'None', value: ''},
                                        {text: 'New window', value: '_blank'},
                                        {text: 'Self', value: '_self'},
                                        {text: 'Parent', value: '_parent'}
                                    ],
                                    flex: true
                                },{
                                    type: 'selectbox',
                                    name: 'button_rel',
                                    label: 'Rel',
                                    items: [
                                        {text: 'No value', value: ''},
                                        {text: 'Alternate', value: 'alternate'},
                                        {text: 'Help', value: 'help'},
                                        {text: 'Manifest', value: 'manifest'},
                                        {text: 'No follow', value: 'nofollow'},
                                        {text: 'No opener', value: 'noopener'},
                                        {text: 'No referrer', value: 'noreferrer'},
                                        {text: 'Opener', value: 'opener'}
                                    ],
                                    flex: true
                                },{
                                    type: 'selectbox',
                                    name: 'button_style',
                                    label: 'Style',
                                    items: [
                                        {text: 'Success', value: 'success'},
                                        {text: 'Info', value: 'info'},
                                        {text: 'Warning', value: 'warning'},
                                        {text: 'Error', value: 'error'}
                                    ],
                                    flex: true
                                }]
                            },
                            onSubmit: function (api) {

                                var html = '<a href="'+api.getData().button_href+'" class="btn btn-'+api.getData().button_style+'" rel="'+api.getData().button_rel+'" target="'+api.getData().button_target+'">'+api.getData().button_label+'</a>';

                                // insert markup
                                editor.insertContent(html);

                                // close the dialog
                                api.close();
                            },
                            buttons: [
                                {
                                    text: 'Close',
                                    type: 'cancel',
                                    onclick: 'close'
                                },
                                {
                                    text: 'Insert',
                                    type: 'submit',
                                    primary: true,
                                    enabled: true
                                }
                            ]
                        });
                    }
                });
            }
        });
        // tinymce.init({
        //     selector: '#intro_message',
        //     height: 300,
        //     plugins: 'lists code emoticons image',
        //     toolbar: 'undo redo | styleselect | bold italic | ' +
        //         'alignleft aligncenter alignright alignjustify | ' +
        //         'outdent indent | numlist bullist | emoticons | image',
        //     menubar: false,
        //     emoticons_append: {
        //         custom_mind_explode: {
        //             keywords: ['brain', 'mind', 'explode', 'blown'],
        //             char: '🤯'
        //         }
        //     },
        //     content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
        //     setup: function(editor) {
        //         editor.on('Paste Change input Undo Redo', function () {
        //             formchanged=1;
        //             console.log(formchanged);
        //         });
        //     }
        // });
        jQuery.validator.addMethod("greaterThan",
            function(value, element, params) {

            console.log(value);
            console.log(element);
            console.log(params);


                    return  value >= $(params).val();

            },'Maximum number of team members cannot be less than minimum number of team members.');

        $("#create-event-registration-f_010").validate({
            rules: {
                min_members:{
                    min: 1,
                },
                max_members:{
                    min: 1,
                    greaterThan: "#min_members"
                },
                custom_reason: {
                    maxlength:70
                },

            },
            submitHandler : function (form) {
                return true;
            }
        });

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


        $("#geo_json").on("change", function(e){
            formchanged=1;
           if(e.target.files.length){

               $(this).next('.custom-file-label').html(e.target.files[0].name);
           }

        });


    </script>
</x-app-layout>
