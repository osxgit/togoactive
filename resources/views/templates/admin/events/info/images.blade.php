<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    <style>
        a{
            color:inherit !important;
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
        }</style>
    @include('layouts.admin.events.subheader')
    <div class="w-full flex flex-col sm:flex-row flex-grow overflow-hidden bg-light-gray-bg">
        @include('layouts.admin.events.sidebar')
        <main role="main" class="w-full h-full flex-grow p-3 overflow-auto">
            <div class="float-left w-full max-w-screen-xl">
                <x-admin.breadcrumb>
                    <x-slot name="header">Images
                    </x-slot>
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
                @if ($errors->any())
                    <div class="alert alert-danger"  style="color:red">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" id="create-event-f_010" name="create-event-f_010" action="{{route('admin.events.info.images.store',array($id))}}" class="w-full float-left" autocomplete="false" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="challengeId" id="challengeId" value="{{$id}}">
                    @if($errors->any())
                        <x-infoboxes.error class="mt-4" :value="$errors"></x-infoboxes.error>
                    @endif

                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Event Profile icon* ( saved as 300x100px )
                        </x-slot>

                        <x-slot name="section_button">
                            <x-forms.image_preview_button>
                                <x-slot name="modal_title">Profile icon</x-slot>
                                <x-slot name="modal_description">The profile icon will be shown on the profile page.</x-slot>
                                <x-slot name="field_id">profile-icon</x-slot>
                                <x-slot name="button_text">profile icon</x-slot>
                            </x-forms.image_preview_button>
                        </x-slot>
                        <x-slot name="section_heading_description_status"></x-slot>
                        <x-slot name="section_heading_description_text">The profile icon will be shown on the profile page. Small Rectangle one.<br> Please upload in PNG with transparency</x-slot>
                        <x-slot name="section_content">
                            <span class="error w-full float-left" style="color:#F53F14; display:none;" id="imgerror-profile_icon" >! Image could not be uploaded since it is not as per the mentioned dimensions.</span>

                            <div id="profile_icon-label" class="float-left w-1/2 mt-4"  ondrop="drop(event, this)" ondragover="allowDrop(event)">
                                @if($images == null || !isset($images->profile_icon) || $images->profile_icon == null)
                                    <x-forms.image_uploader>
                                        <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                        <x-slot name="uploder_description">  SVG, PNG, JPG (MIN. 300x100px)</x-slot>
                                        <x-slot name="field_id">profile_icon</x-slot>
                                    </x-forms.image_uploader>
                                @else
                                    <x-forms.image_uploader_edit>
                                        <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                        <x-slot name="uploder_description">  SVG, PNG, JPG (MIN. 300x100px)</x-slot>
                                        <x-slot name="field_id">profile_icon</x-slot>
                                        <x-slot name="uploaded_img">{{$images->profile_icon}}</x-slot>
                                    </x-forms.image_uploader_edit>
                                @endif
                                <x-forms.file_input>
                                    <x-slot name="width">300</x-slot>
                                    <x-slot name="height">100</x-slot>
                                    <x-slot name="field_id">profile_icon</x-slot>
                                </x-forms.file_input>
                                </label>
                            </div>
                        </x-slot>
                        <x-forms.validationerror>
                            <x-slot name="field_id">event_profile_icon</x-slot>
                            <x-slot name="error_text">event_profile_icon_error</x-slot>
                        </x-forms.validationerror>
                    </x-forms.section>

                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Event Logo* ( saved as 800x300px )
                        </x-slot>
                        <x-slot name="section_button">
                            <x-forms.image_preview_button>
                                <x-slot name="modal_title">Event Logo</x-slot>
                                <x-slot name="modal_description">The logo will be displayed on multiple pages - landing page, achievements page, emails etc.</x-slot>
                                <x-slot name="field_id">logo</x-slot>
                                <x-slot name="button_text">event logo</x-slot>
                            </x-forms.image_preview_button>
                        </x-slot>
                        <x-slot name="section_heading_description_status"></x-slot>
                        <x-slot name="section_heading_description_text">For eg. #TOGORIDE2023, #TOGOFESTIVE100. etc The logo will be displayed on multiple pages - landing page, achievements page, emails etc. <br>Please upload in PNG with transparency.</x-slot>
                        <x-slot name="section_content">
                            <span class="error w-full float-left" style="color:#F53F14; display:none;" id="imgerror-logo" >! Image could not be uploaded since it is not as per the mentioned dimensions.</span>


                            <div id="icon-label" class="float-left w-1/2 mt-4" ondrop="drop(event, this)" ondragover="allowDrop(event)">
                                @if($images == null || !isset($images->icon) || $images->icon == null)
                                    <x-forms.image_uploader>
                                        <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                        <x-slot name="uploder_description">  SVG, PNG, JPG (MIN. 800x300px)</x-slot>
                                        <x-slot name="field_id">icon</x-slot>
                                    </x-forms.image_uploader>
                                @else
                                    <x-forms.image_uploader_edit>
                                        <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                        <x-slot name="uploder_description">SVG, PNG, JPG (MIN. 800x300px)</x-slot>
                                        <x-slot name="field_id">icon</x-slot>
                                        <x-slot name="uploaded_img">{{$images->icon}}</x-slot>
                                    </x-forms.image_uploader_edit>
                                @endif
                                <x-forms.file_input>
                                    <x-slot name="width">800</x-slot>
                                    <x-slot name="height">300</x-slot>
                                    <x-slot name="field_id">icon</x-slot>
                                </x-forms.file_input>
                                </label>
                            </div>
                        </x-slot>
                        <x-forms.validationerror>
                            <x-slot name="field_id">event_icon</x-slot>
                            <x-slot name="error_text">event_icon_error</x-slot>
                        </x-forms.validationerror>
                    </x-forms.section>

                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Notification image* ( saved as 500x300px )
                        </x-slot>
                        <x-slot name="section_button">
                            <x-forms.image_preview_button>
                                <x-slot name="modal_title">Notification image</x-slot>
                                <x-slot name="modal_description">This image will be shown on all notifications.</x-slot>
                                <x-slot name="field_id">notification</x-slot>
                                <x-slot name="button_text">event notification</x-slot>
                            </x-forms.image_preview_button>
                        </x-slot>
                        <x-slot name="section_heading_description_status"></x-slot>
                        <x-slot name="section_heading_description_text">This is default image will be shown on all notifications modal pop-ups and Notifications Inbox. </x-slot>
                        <x-slot name="section_content">
                            <span class="error w-full float-left" style="color:#F53F14; display:none;" id="imgerror-notification" >! Image could not be uploaded since it is not as per the mentioned dimensions.</span>


                            <!-- <button  type="button" style="color: #7E1FF6;border: 1px solid #7E1FF6; padding: 5px; border-radius: 5px; font-weight: bold; font-size: 14px;    float: right; top: 0; margin-top: -85px; position: relative; width: max-content;" onclick="previewModal('Preview-notification','Notification image','This image will be shown on all notifications.');">Preview notification examples</button> -->
                            <div id="notification-label" class="float-left w-1/2 mt-4" ondrop="drop(event, this)" ondragover="allowDrop(event)">
                                @if($images == null || !isset($images->notification) || $images->notification == null)
                                    <x-forms.image_uploader>
                                        <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                        <x-slot name="uploder_description">  SVG, PNG, JPG (MIN. 500x300px)</x-slot>
                                        <x-slot name="field_id">notification</x-slot>
                                    </x-forms.image_uploader>
                                @else
                                    <x-forms.image_uploader_edit>
                                        <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                        <x-slot name="uploder_description">  SVG, PNG, JPG (MIN. 500x300px)</x-slot>
                                        <x-slot name="field_id">notification</x-slot>
                                        <x-slot name="uploaded_img">{{$images->notification}}</x-slot>
                                    </x-forms.image_uploader_edit>
                                @endif
                                <x-forms.file_input>
                                    <x-slot name="width">500</x-slot>
                                    <x-slot name="height">300</x-slot>
                                    <x-slot name="field_id">notification</x-slot>
                                </x-forms.file_input>
                                </label>
                            </div>
                        </x-slot>
                        <x-forms.validationerror>
                            <x-slot name="field_id">event_notification</x-slot>
                            <x-slot name="error_text">event_notification_error</x-slot>
                        </x-forms.validationerror>
                    </x-forms.section>

                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Rewards* ( saved as 350x250px)
                        </x-slot>
                        <x-slot name="section_button">
                            <x-forms.image_preview_button>
                                <x-slot name="modal_title">Rewards</x-slot>
                                <x-slot name="modal_description">Upload an image of all rewards together. This will be shown on the success page and emails.</x-slot>
                                <x-slot name="field_id">rewards</x-slot>
                                <x-slot name="button_text">rewards</x-slot>
                                <span class="error w-full float-left" style="color:#F53F14; display:none;" id="imgerror-rewards" >! Image could not be uploaded since it is not as per the mentioned dimensions.</span>
                            </x-forms.image_preview_button>
                        </x-slot>
                        <x-slot name="section_heading_description_status"></x-slot>
                        <x-slot name="section_heading_description_text">Upload an image of all rewards together. This will be shown on the success page and emails.<br>Please upload in PNG with transparency.</x-slot>
                        <x-slot name="section_content">

                            <!-- <button  type="button" style="color: #7E1FF6;border: 1px solid #7E1FF6; padding: 5px; border-radius: 5px; font-weight: bold; font-size: 14px;    float: right; top: 0; margin-top: -85px; position: relative; width: max-content;" onclick="previewModal('Preview-rewards','Rewards','ficationsUpload an image of all rewards together. This will be shown on the success page and emails.');">Preview Rewards exmaples</button> -->
                            <div id="rewards-label" class="float-left w-1/2 mt-4" ondrop="drop(event, this)" ondragover="allowDrop(event)">
                                @if($images == null || !isset($images->rewards) || $images->rewards == null)
                                    <x-forms.image_uploader>
                                        <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                        <x-slot name="uploder_description">  SVG, PNG, JPG (MIN. 350x200px)</x-slot>
                                        <x-slot name="field_id">rewards</x-slot>
                                    </x-forms.image_uploader>
                                @else
                                    <x-forms.image_uploader_edit>
                                        <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                        <x-slot name="uploder_description">  SVG, PNG, JPG (MIN. 350x200px)</x-slot>
                                        <x-slot name="field_id">rewards</x-slot>
                                        <x-slot name="uploaded_img">{{$images->rewards}}</x-slot>

                                    </x-forms.image_uploader_edit>

                                @endif
                                <x-forms.file_input>
                                    <x-slot name="width">350</x-slot>
                                    <x-slot name="height">250</x-slot>
                                    <x-slot name="field_id">rewards</x-slot>
                                </x-forms.file_input>
                                </label>
                            </div>
                        </x-slot>
                        <x-forms.validationerror>
                            <x-slot name="field_id">event_rewards</x-slot>
                            <x-slot name="error_text">event_rewards_error</x-slot>
                        </x-forms.validationerror>
                    </x-forms.section>

                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Cover Image* ( saved as 1920x800px)
                        </x-slot>
                        <x-slot name="section_button">
                            <x-forms.image_preview_button>
                                <x-slot name="modal_title">Cover Image</x-slot>
                                <x-slot name="modal_description">The cover image will be shown on the event landing page and events listings page.</x-slot>
                                <x-slot name="field_id">cover</x-slot>
                                <x-slot name="button_text">cover</x-slot>
                            </x-forms.image_preview_button>
                        </x-slot>
                        <x-slot name="section_heading_description_status"></x-slot>
                        <x-slot name="section_heading_description_text">The cover image will be shown on the Events Listings page. <br> Please upload in PNG with transparency.</x-slot>
                        <x-slot name="section_content">
                            <span class="error w-full float-left" style="color:#F53F14; display:none;" id="imgerror-cover" >! Image could not be uploaded since it is not as per the mentioned dimensions.</span>


                            <!-- <button  type="button" style="color: #7E1FF6;border: 1px solid #7E1FF6; padding: 5px; border-radius: 5px; font-weight: bold; font-size: 14px;    float: right; top: 0; margin-top: -85px; position: relative; width: max-content;" onclick="previewModal('Preview-cover','Cover image','The cover image will be shown on the event landing page and events listings page.');">Preview Cover examples</button> -->
                            <div id="cover-label" class="float-left w-full mt-4" ondrop="drop(event, this)" ondragover="allowDrop(event)">
                                @if($images == null || !isset( $images->cover ) || $images->cover == null)
                                    <x-forms.image_uploader>
                                        <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                        <x-slot name="uploder_description">  SVG, PNG, JPG (MIN. 1920x800px)</x-slot>
                                        <x-slot name="field_id">cover</x-slot>
                                    </x-forms.image_uploader>

                                @else
                                    <x-forms.image_uploader_edit>
                                        <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                        <x-slot name="uploder_description">  SVG, PNG, JPG (MIN. 1920x800px)</x-slot>
                                        <x-slot name="field_id">cover</x-slot>
                                        <x-slot name="uploaded_img">{{$images->cover}}</x-slot>
                                    </x-forms.image_uploader_edit>
                                @endif
                                <x-forms.file_input>
                                    <x-slot name="width">1920</x-slot>
                                    <x-slot name="height">800</x-slot>
                                    <x-slot name="field_id">cover</x-slot>
                                </x-forms.file_input>
                                </label>
                            </div>
                        </x-slot>
                        <x-forms.validationerror>
                            <x-slot name="field_id">event_cover</x-slot>
                            <x-slot name="error_text">event_cover_error</x-slot>
                        </x-forms.validationerror>
                    </x-forms.section>

                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Homepage & Event Landing Banner
                        </x-slot>
                        <x-slot name="section_button">
                            <x-forms.image_preview_button>
                                <x-slot name="modal_title">Homepage Slider Image</x-slot>
                                <x-slot name="modal_description">This image will be shown on the top of the homepage.</x-slot>
                                <x-slot name="field_id">slider</x-slot>
                                <x-slot name="button_text">homepage slider</x-slot>
                            </x-forms.image_preview_button>
                        </x-slot>
                        <x-slot name="section_heading_description_status"></x-slot>
                        <x-slot name="section_heading_description_text">This image will be shown on the top of the homepage.</x-slot>
                        <x-slot name="section_content">
                            <span class="error w-full float-left" style="color:#F53F14; display:none;" id="imgerror-slider" >! Image could not be uploaded since it is not as per the mentioned dimensions.</span>


                            <div id="event_name-label" class="float-left w-full mt-4" ondrop="drop(event, this)" ondragover="allowDrop(event)">
                                <div class="w-1/2">
                                    <label class="float-left w-full mt-4 text-lg text-placeholder font-poppins-bold">Event name image* ( saved as 700x300px)</label>
                                    <p class="float-left w-full text-gray text-sm mt-2 ">Please upload in PNG with transparency.</p>
                                    <span class="error w-full float-left" style="color:#F53F14; display:none;" id="imgerror-event_name" >! Image could not be uploaded since it is not as per the mentioned dimensions.</span>

                                    @if($images == null || !isset($images->event_name) ||  $images->event_name == null)
                                        <x-forms.image_uploader>
                                            <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                            <x-slot name="uploder_description">  SVG, PNG, JPG (MIN. 700x300px)</x-slot>
                                            <x-slot name="field_id">event_name</x-slot>
                                        </x-forms.image_uploader>
                                    @else
                                        <x-forms.image_uploader_edit>
                                            <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                            <x-slot name="uploder_description">  SVG, PNG, JPG (MIN. 700x300px)</x-slot>
                                            <x-slot name="field_id">event_name</x-slot>
                                            <x-slot name="uploaded_img">{{$images->event_name}}</x-slot>
                                        </x-forms.image_uploader_edit>
                                    @endif
                                    <x-forms.file_input>
                                        <x-slot name="width">700</x-slot>
                                        <x-slot name="height">300</x-slot>
                                        <x-slot name="field_id">event_name</x-slot>
                                    </x-forms.file_input>
                                    <x-forms.validationerror>
                                        <x-slot name="field_id">event_name</x-slot>
                                        <x-slot name="error_text">event_name_error</x-slot>
                                    </x-forms.validationerror>
                                    </label>
                                </div>

                                <div class="float-left w-1/2">
                                    <x-forms.textfield id="sub_title" name="sub_title" placeholder="eg-TOGOPARTS ANNUAL CYCLING CHALLENGE"  :value="old('sub_title',$slider_sub_title->meta_value ?? '' )" >
                                        <x-slot name="field_id">sub_title</x-slot>
                                        <x-slot name="label_text">Sub-title Text </x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">This will be displayed below the event name on the image. </x-slot>
                                    </x-forms.textfield>
                                    <x-forms.validationerror>
                                        <x-slot name="field_id">sub_title</x-slot>
                                        <x-slot name="error_text">sub_title_error</x-slot>
                                    </x-forms.validationerror>
                                </div>

                                <div class="w-full flex" style="    justify-content: space-between;">
                                    <div id="slider_background-label"  class="" style="width:48%" ondrop="drop(event, this)" ondragover="allowDrop(event)">
                                        <label class="float-left w-full mt-4 text-lg text-placeholder font-poppins-bold">Background image* (saved as 1120x550 px)</label>
                                        <p class="float-left w-full text-gray text-sm mt-2 ">Please upload in PNG with transparency.</p>
                                        <span class="error w-full float-left" style="color:#F53F14; display:none;" id="imgerror-slider_background" >! Image could not be uploaded since it is not as per the mentioned dimensions.</span>

                                        @if($images == null ||  !isset($images->slider_background) ||  $images->slider_background == null)
                                            <x-forms.image_uploader>
                                                <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                                <x-slot name="uploder_description">  SVG, PNG, JPG (MIN. 1120x550px)</x-slot>
                                                <x-slot name="field_id"></x-slot>
                                            </x-forms.image_uploader>
                                        @else
                                            <x-forms.image_uploader_edit>
                                                <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                                <x-slot name="uploder_description">  SVG, PNG, JPG (MIN. 1120x550px)</x-slot>
                                                <x-slot name="field_id">slider_background</x-slot>
                                                <x-slot name="uploaded_img">{{$images->slider_background}}</x-slot>
                                            </x-forms.image_uploader_edit>
                                        @endif
                                        <x-forms.file_input>
                                            <x-slot name="width">1120</x-slot>
                                            <x-slot name="height">550</x-slot>
                                            <x-slot name="field_id">slider_background</x-slot>
                                        </x-forms.file_input>
                                        <x-forms.validationerror>
                                            <x-slot name="field_id">slider_background</x-slot>
                                            <x-slot name="error_text">slider_background_error</x-slot>
                                        </x-forms.validationerror>
                                    </div>

                                    <div id="slider_foreground-label"  class="" style="width:48%" ondrop="drop(event, this)" ondragover="allowDrop(event)">
                                        <label class="float-left w-full mt-4 text-lg text-placeholder font-poppins-bold">Foreground Object / image* (saved as 460x370 px)</label>
                                        <p class="float-left w-full text-gray text-sm mt-2 ">Please upload in PNG with transparency.</p>
                                        <span class="error w-full float-left" style="color:#F53F14; display:none;" id="imgerror-slider_foreground" >! Image could not be uploaded since it is not as per the mentioned dimensions.</span>

                                        @if($images == null || !isset($images->slider_foreground ) ||  $images->slider_foreground == null)
                                            <x-forms.image_uploader>
                                                <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                                <x-slot name="uploder_description">  SVG, PNG, JPG (MIN. 460x370px)</x-slot>
                                                <x-slot name="field_id">slider_foreground</x-slot>
                                            </x-forms.image_uploader>
                                        @else
                                            <x-forms.image_uploader_edit>
                                                <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                                <x-slot name="uploder_description">  SVG, PNG, JPG (MIN. 460x370px)</x-slot>
                                                <x-slot name="field_id">slider_foreground</x-slot>
                                                <x-slot name="uploaded_img">{{$images->slider_foreground}}</x-slot>
                                            </x-forms.image_uploader_edit>
                                        @endif
                                        <x-forms.file_input>
                                            <x-slot name="width">460</x-slot>
                                            <x-slot name="height">370</x-slot>
                                            <x-slot name="field_id">slider_foreground</x-slot>
                                        </x-forms.file_input>
                                        <x-forms.validationerror>
                                            <x-slot name="field_id">slider_foreground</x-slot>
                                            <x-slot name="error_text">slider_foreground_error</x-slot>
                                        </x-forms.validationerror>
                                        </label>
                                        <div>
                                        </div>
                                    </div>
                        </x-slot>

                    </x-forms.section>

            </div>
        </main>
    </div>

    <div class="float-left w-full text-right" style="position: sticky;bottom: 0;background: white;    padding: 20px;">
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
                    <div class="preview-modal-img flex justify-center" style="    margin: 0 auto;"><img class="preview-img" src="" ></div>
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
        // document.body or window
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData('Text/html', ev.target.id);
        }

        function drop(ev, target) {
            formchanged=1;
            ev.preventDefault();
            console.log(target.id, ev.target.id);
            element=target.id;
            const myArray = element.split("-");
            let elementid = myArray[0];
            console.log(elementid);
            var url=ev.dataTransfer.getData('text/plain');
            // for img elements, url is the img src so
            // create an Image Object & draw to canvas
            if(url){
                var img=new Image();
                img.onload=function(){ctx.drawImage(this,0,0);}
                img.src=url;
                // for img file(s), read the file & draw to canvas
            }else{
                document.querySelector('#'+elementid).files = ev.dataTransfer.files;

                handleFiles(ev.dataTransfer.files, elementid);
            }
        }

        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;
        var $previewModal = $('#previewModal');
        imgwidth='';
        imgheight='';

        function handleFiles(files, elementid) {
            console.log(elementid);
            var imgtype= elementid;
            var _URL = window.URL || window.webkitURL;
            var file, img;
            if ((file = files[0])) {
                img = new Image();
                var objectUrl = _URL.createObjectURL(file);
                img.onload = function () {
                    $('#imgtype').val(imgtype);
                    var height =  $('#'+imgtype).data("height");
                    var width =  $('#'+imgtype).data("width");
                    imgwidth=this.width;
                    imgheight=this.height;
                    console.log(imgwidth);
                    if(this.width < width  ||  this.height < height){
                        $("#imgerror-"+imgtype).css('display','block')
                        if($('#modal').is(':visible')){
                            $("#modal").modal('hide');
                        }
                    }  else{
                        $("#imgerror-"+imgtype).css('display','none');

                    }
                    _URL.revokeObjectURL(objectUrl);
                };
                img.src = objectUrl;
            }

            // var files = e.target.files;
            var imgtype= elementid;

            $('#imgtype').val(imgtype);
            height =  $('#'+imgtype).data("height");
            width =  $('#'+imgtype).data("width");
            $('#height').val(height);
            $('#width').val(width);

            var done = function (url) {
                image.src = url;

                $modal.modal('show');



            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }

            }
        }
        $("body").on("change", ".image", function(e){
            formchanged=1;
            var imgtype= $(this).attr('id');
            var _URL = window.URL || window.webkitURL;
            var file, img;
            if ((file = this.files[0])) {
                img = new Image();
                var objectUrl = _URL.createObjectURL(file);
                img.onload = function () {
                    $('#imgtype').val(imgtype);
                    var height =  $('#'+imgtype).data("height");
                    var width =  $('#'+imgtype).data("width");
                    imgwidth=this.width;
                    imgheight=this.height;
                    console.log(imgwidth);
                    if(this.width < width  ||  this.height < height){
                        $("#imgerror-"+imgtype).css('display','block')
                        if($('#modal').is(':visible')){
                            $("#modal").modal('hide');
                        }
                    }  else{
                        $("#imgerror-"+imgtype).css('display','none');

                    }
                    _URL.revokeObjectURL(objectUrl);
                };
                img.src = objectUrl;
            }

            var files = e.target.files;
            var imgtype= $(this).attr('id');

            $('#imgtype').val(imgtype);
            height =  $('#'+imgtype).data("height");
            width =  $('#'+imgtype).data("width");
            $('#height').val(height);
            $('#width').val(width);

            var done = function (url) {
                image.src = url;
                //   console.log(imgwidth);
                //   if(imgwidth >= width  &&  imgheight >= height){

                $modal.modal('show');
                //    }


            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }

            }

        });
        $modal.on('shown.bs.modal', function () {

            if(imgwidth < width  ||  imgheight < height){
                $modal.modal("hide");
            }
            cropper = new Cropper(image, {
                aspectRatio: $('#width').val()/$('#height').val(),
                viewMode: 3,
                preview: '.preview',
                minCropBoxWidth: $('#width').val(),
                minCropBoxHeight: $('#height').val(),

                data: {
                    width: $('#width').val(),
                    height: $('#height').val(),
                }
            });

        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });
        $("#crop").click(function(){
            var width=$('#width').val();
            var height=$('#height').val();

            canvas = cropper.getCroppedCanvas({
                width: width,
                height: height,
            });
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;

                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{route('ajax.upload-file')}}",
                        data: {'_token':  $('input[name="_token"]').val(), 'image': base64data,'eventId':$('#challengeId').val(),'idd':$('#imgtype').val()},
                        success: function(data){
                            console.log(data);
                            $modal.modal('hide');
                            uploadFileResponse(data,$('#imgtype').val())
                            //alert("Crop image successfully uploaded");
                        }
                    });
                }
            });
        })

        function uploadFileResponse(response,idd){

            $("#label-"+idd).removeClass('opacity-30');
            if(response.err == 1){
                showErrorModal("Upload was failed. Please try again!");
                return false;
            }
            $("#path-"+response.data.idd).val(response.data.path);

            const arr = ['cover','icon','profile_icon','ebib','certificate','notification'];
            if(idd){
                $("#label-"+response.data.idd).css('background-image','url('+response.data.fullpath+')');
                $("#label-"+response.data.idd).css('border','none');

                $("#span-"+response.data.idd+"-add").css('visibility','hidden');
                $("#span-"+response.data.idd+"-edit").css('visibility','visible');
            }else if(idd == 'list_upload' || idd == 'geojson_upload'){
                $("#label-"+idd+" input[type='text']").val(response.data.path);
            }

        }

        function previewModal(imgname, title, description){
            console.log(imgname);
            console.log(title);
            console.log(description);
            $('.preview-modal-title').html(title);
            $('.preview-modal-desc').html(description);
            var img_url = "/images/"+imgname+".png";
            $('.preview-img').prop('src', img_url);
            $previewModal.modal('show');
        }
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
    </script>
</x-app-layout>
