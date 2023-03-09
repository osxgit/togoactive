<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://unpkg.com/@yaireo/dragsort@1.3.1/dist/dragsort.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-sortable/0.9.13/jquery-sortable-min.js" integrity="sha512-9pm50HHbDIEyz2RV/g2tn1ZbBdiTlgV7FwcQhIhvykX6qbQitydd6rF19iLmOqmJVUYq90VL2HiIUHjUMQA5fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js?apiKey=4rcnfqnlzfiuwfia3kjfez410ye1smutxh8kj2i126izgth4/tinymce"></script>

    <style>
        .tox-tinymce{
            width:100%;
        }
        .mce-notification-warning, .tox-notifications-container{
            display: none;
        }
        .mce-statusbar, .tox-statusbar{
            display: none !important;

        }
        #div_description{
            border:none !important;
        }
        .tagify {
            border:none !important;
            height: 130px;
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
                            <a href="#" class="flex justify-center items-center py-3 no-underline" style="text-decoration: none;color:#7E1FF6 !important;width:48%; background:#EEE1FF; color:"><div ><i class="fa fa-info-circle mr-2" aria-hidden="true"></i>Basic details*</div></a>
                            <div  class="flex justify-center items-center py-3" style="width:4%"> > </div>
                            <a href="{{route('admin.events.rewardsPrice.add',array($id,"-"))}}" class="flex justify-center  items-center py-3 no-underline"  style="text-decoration: none;width:48%"><div ><i class="fa fa-cog mr-2" aria-hidden="true"></i>Pricing</div></a>

                        </div>




                    <form method="POST" id="create-event-reward-f_010" name="create-event-reward-f_010" action="{{route('admin.events.rewards.store',array($id))}}" class="w-full float-left" autocomplete="false" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="challengeId" id="challengeId" value="{{$id}}">
                        <x-forms.section class="mt-8 rounded-xl">
                            <x-slot name="section_heading">
                                Images*
                            </x-slot>

                            <x-slot name="section_button">

                            </x-slot>
                            <x-slot name="section_heading_description_status"></x-slot>
                            <x-slot name="section_heading_description_text">upload min 1080x1080 px. Images will be stored as 1080x1080px, 500x500px, 70x70px. You will be able to crop the image after uploading. Max 9 images.</x-slot>
                            <x-slot name="section_content">
                                <span class="error w-full float-left" style="color:#F53F14; display:none;" id="imgerror-profile_icon" >! Image could not be uploaded since it is not as per the mentioned dimensions.</span>
                                <div class="flex flex-row w-full">
                                    <div id="images_1-label" class="float-left pr-2 mt-4"  ondrop="drop(event, this)" ondragover="allowDrop(event)">
                                        <x-forms.image_uploader style="height: 300px;width:300px;border-color: lightgray;">
                                            <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                            <x-slot name="uploder_description">SVG, PNG, JPG (1:1 ratio)</x-slot>
                                            <x-slot name="field_id">images_1</x-slot>
                                        </x-forms.image_uploader>

                                        <x-forms.file_input>
                                            <x-slot name="width">1080</x-slot>
                                            <x-slot name="height">1080</x-slot>
                                            <x-slot name="field_id">images_1</x-slot>
                                        </x-forms.file_input>
                                        </label>
                                    </div>
                                    <div class="flex flex-col w-full">
                                        <div class="flex flex-row justify-evenly w-full">
                                            <div id="images_2-label" class="float-left pr-2 mt-4 hidden"  ondrop="drop(event, this)" ondragover="allowDrop(event)">
                                                <x-forms.image_uploader_small style="height: 135px;width:135px;border-color: lightgray;">
                                                    <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                                    <x-slot name="uploder_description">SVG, PNG, JPG (1:1 ratio)</x-slot>
                                                    <x-slot name="field_id">images_2</x-slot>
                                                </x-forms.image_uploader_small>

                                                <x-forms.file_input>
                                                    <x-slot name="width">1080</x-slot>
                                                    <x-slot name="height">1080</x-slot>
                                                    <x-slot name="field_id">images_2</x-slot>
                                                </x-forms.file_input>
                                                </label>
                                            </div>
                                            <div id="images_3-label" class="float-left pr-2 mt-4 hidden"  ondrop="drop(event, this)" ondragover="allowDrop(event)">
                                                <x-forms.image_uploader_small style="height: 135px;width:135px;border-color: lightgray;">
                                                    <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                                    <x-slot name="uploder_description">SVG, PNG, JPG (1:1 ratio)</x-slot>
                                                    <x-slot name="field_id">images_3</x-slot>
                                                </x-forms.image_uploader_small>

                                                <x-forms.file_input>
                                                    <x-slot name="width">1080</x-slot>
                                                    <x-slot name="height">1080</x-slot>
                                                    <x-slot name="field_id">images_3</x-slot>
                                                </x-forms.file_input>
                                                </label>
                                            </div>
                                            <div id="images_4-label" class="float-left pr-2 mt-4 hidden"  ondrop="drop(event, this)" ondragover="allowDrop(event)">
                                                <x-forms.image_uploader_small style="height: 135px;width:135px;border-color: lightgray;">
                                                    <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                                    <x-slot name="uploder_description">SVG, PNG, JPG (1:1 ratio)</x-slot>
                                                    <x-slot name="field_id">images_4</x-slot>
                                                </x-forms.image_uploader_small>

                                                <x-forms.file_input>
                                                    <x-slot name="width">1080</x-slot>
                                                    <x-slot name="height">1080</x-slot>
                                                    <x-slot name="field_id">images_4</x-slot>
                                                </x-forms.file_input>
                                                </label>
                                            </div>
                                            <div id="images_5-label" class="float-left pr-2 mt-4 hidden"  ondrop="drop(event, this)" ondragover="allowDrop(event)">
                                                <x-forms.image_uploader_small style="height: 135px;width:135px;border-color: lightgray;">
                                                    <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                                    <x-slot name="uploder_description">SVG, PNG, JPG (1:1 ratio)</x-slot>
                                                    <x-slot name="field_id">images_5</x-slot>
                                                </x-forms.image_uploader_small>

                                                <x-forms.file_input>
                                                    <x-slot name="width">1080</x-slot>
                                                    <x-slot name="height">1080</x-slot>
                                                    <x-slot name="field_id">images_5</x-slot>
                                                </x-forms.file_input>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="flex flex-row justify-evenly w-full">
                                            <div id="images_6-label" class="float-left pr-2 mt-4 hidden"  ondrop="drop(event, this)" ondragover="allowDrop(event)">
                                                <x-forms.image_uploader_small style="height: 135px;width:135px;border-color: lightgray;">
                                                    <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                                    <x-slot name="uploder_description">SVG, PNG, JPG (1:1 ratio)</x-slot>
                                                    <x-slot name="field_id">images_6</x-slot>
                                                </x-forms.image_uploader_small>

                                                <x-forms.file_input>
                                                    <x-slot name="width">1080</x-slot>
                                                    <x-slot name="height">1080</x-slot>
                                                    <x-slot name="field_id">images_6</x-slot>
                                                </x-forms.file_input>
                                                </label>
                                            </div>
                                            <div id="images_7-label" class="float-left pr-2 mt-4 hidden"  ondrop="drop(event, this)" ondragover="allowDrop(event)">
                                                <x-forms.image_uploader_small style="height: 135px;width:135px;border-color: lightgray;">
                                                    <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                                    <x-slot name="uploder_description">SVG, PNG, JPG (1:1 ratio)</x-slot>
                                                    <x-slot name="field_id">images_7</x-slot>
                                                </x-forms.image_uploader_small>

                                                <x-forms.file_input>
                                                    <x-slot name="width">1080</x-slot>
                                                    <x-slot name="height">1080</x-slot>
                                                    <x-slot name="field_id">images_7</x-slot>
                                                </x-forms.file_input>
                                                </label>
                                            </div>
                                            <div id="images_8-label" class="float-left pr-2 mt-4 hidden"  ondrop="drop(event, this)" ondragover="allowDrop(event)">
                                                <x-forms.image_uploader_small style="height: 135px;width:135px;border-color: lightgray;">
                                                    <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                                    <x-slot name="uploder_description">SVG, PNG, JPG (1:1 ratio)</x-slot>
                                                    <x-slot name="field_id">images_8</x-slot>
                                                </x-forms.image_uploader_small>

                                                <x-forms.file_input>
                                                    <x-slot name="width">1080</x-slot>
                                                    <x-slot name="height">1080</x-slot>
                                                    <x-slot name="field_id">images_8</x-slot>
                                                </x-forms.file_input>
                                                </label>
                                            </div>
                                            <div id="images_9-label" class="float-left pr-2 mt-4 hidden"  ondrop="drop(event, this)" ondragover="allowDrop(event)">
                                                <x-forms.image_uploader_small style="height: 135px;width:135px;border-color: lightgray;">
                                                    <x-slot name="uploder_title"  class="text-base"><b>Click to upload</b> or drag and drop </x-slot>
                                                    <x-slot name="uploder_description" class="text-base">SVG, PNG, JPG (1:1 ratio)</x-slot>
                                                    <x-slot name="field_id">images_9</x-slot>
                                                </x-forms.image_uploader_small>

                                                <x-forms.file_input>
                                                    <x-slot name="width">1080</x-slot>
                                                    <x-slot name="height">1080</x-slot>
                                                    <x-slot name="field_id">images_9</x-slot>
                                                </x-forms.file_input>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                        </div>


                            </x-slot>
                            <x-forms.validationerror>
                                <x-slot name="field_id">event_profile_icon</x-slot>
                                <x-slot name="error_text">event_profile_icon_error</x-slot>
                            </x-forms.validationerror>
                        </x-forms.section>

                        <x-forms.section class="mt-8 rounded-xl">
                            <x-slot name="section_heading">
                                Info
                            </x-slot>
                            <x-slot name="section_button">

                            </x-slot>
                            <x-slot name="section_heading_description_status">hidden</x-slot>
                            <x-slot name="section_heading_description_text"></x-slot>
                            <x-slot name="section_content">
                                <div class="float-left w-1/2">
                                    <x-forms.toggle id="is_core_item" name="is_core_item" value="1">
                                        <x-slot name="field_id">is_core_item</x-slot>
                                        <x-slot name="label_text">Showing as core Sku</x-slot>
                                        <x-slot name="label_description">Enabling upgrade will allow your team to buy rewards during this period.</x-slot>
                                    </x-forms.toggle>
                                </div>
                                <div class="float-left w-full">
                                    <x-forms.textfield id="name" name="name" placeholder="eg- Event Tee / Event Jersey / Finisher Jersey">
                                        <x-slot name="field_id">name</x-slot>
                                        <x-slot name="label_text">Name*</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">The reward name will be shown along with the event name in some cases. eg - #goMAD22 Event Tee</x-slot>
                                    </x-forms.textfield>
                                    <x-forms.validationerror>
                                        <x-slot name="field_id">name</x-slot>
                                        <x-slot name="error_text">name_error</x-slot>
                                    </x-forms.validationerror>

                                </div>

                                <div class="float-left w-full">
                                    <x-forms.textfield id="sku" name="sku" placeholder="eg. Event-Tee">
                                        <x-slot name="field_id">sku</x-slot>
                                        <x-slot name="label_text">SKU*</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">SKUs must be name uniquely. This is for internal reference.</x-slot>
                                    </x-forms.textfield>
                                    <x-forms.validationerror>
                                        <x-slot name="field_id">sku</x-slot>
                                        <x-slot name="error_text">sku_error</x-slot>
                                    </x-forms.validationerror>

                                </div>

                                    <div class="float-left w-full ">
                                        <x-forms.textarea id="description" name="description" placeholder="Describe the rewards highlights" class="h-32 description ">
                                            <x-slot name="field_id">description</x-slot>
                                            <x-slot name="label_text">Description</x-slot>
                                            <x-slot name="label_description_status"></x-slot>
                                            <x-slot name="label_description"></x-slot>

                                        </x-forms.textarea>
                                        <x-forms.validationerror>
                                            <x-slot name="field_id">description	</x-slot>
                                            <x-slot name="error_text">description_error</x-slot>
                                        </x-forms.validationerror>
                                        <span class="float-right" id="title_count"><span id="desccount">0/</span>300 characters.</span>

                                    </div>

                                    <div class="float-left w-full md:w-1/2">
                                        <x-forms.number id="max_quantity" name="max_quantity" placeholder="Select how many quantities to be purchased">
                                            <x-slot name="field_id">max_quantity</x-slot>
                                            <x-slot name="label_text">Max quantity per participant*</x-slot>
                                            <x-slot name="label_description_status"></x-slot>
                                            <x-slot name="label_description">The max quantity a reward can be bought of the same size</x-slot>
                                        </x-forms.number>
                                        <x-forms.validationerror>
                                            <x-slot name="field_id">max_quantity	</x-slot>
                                            <x-slot name="error_text">max_quantity_error</x-slot>
                                        </x-forms.validationerror>
                                    </div>

                            </x-slot>
                        </x-forms.section>

                        <x-forms.section class="mt-8 rounded-xl">
                            <x-slot name="section_heading">
                                Sizing*
                            </x-slot>
                            <x-slot name="section_button">

                            </x-slot>
                            <x-slot name="section_heading_description_status">hidden</x-slot>
                            <x-slot name="section_heading_description_text"></x-slot>
                            <x-slot name="section_content">
                                <div class="float-left w-1/2">
                                    <x-forms.toggle id="enable_sizing" name="enable_sizing" value="0">
                                        <x-slot name="field_id">enable_sizing</x-slot>
                                        <x-slot name="label_text">Enable Sizing</x-slot>
                                        <x-slot name="label_description">Enable this to allow participants to select a size while purchasing the reward. </x-slot>
                                    </x-forms.toggle>
                                </div>

<div id="event_reward_sizing_section" class="hidden">
    <div class="float-left w-full ">
        <x-forms.textfield id="size" name="size" placeholder="Add reward sizes" class="h-32 size ">
            <x-slot name="field_id">size</x-slot>
            <x-slot name="label_text">Values for selection*</x-slot>
            <x-slot name="label_description_status"></x-slot>
            <x-slot name="label_description">These values will appear in the dropdown. To add sizes, simply type in and do a tab. To  order, drag the pills from left to right. The value of the left most item will be sorted first.</x-slot>
        </x-forms.textfield>
{{--        <x-forms.textarea id="size" name="size" placeholder="Add reward sizes" class="h-32 size ">--}}
{{--            <x-slot name="field_id">size</x-slot>--}}
{{--            <x-slot name="label_text">Values for selection*</x-slot>--}}
{{--            <x-slot name="label_description_status"></x-slot>--}}
{{--            <x-slot name="label_description">These values will appear in the dropdown. To add sizes, simply type in and do a tab. To  order, drag the pills from left to right. The value of the left most item will be sorted first.</x-slot>--}}

{{--        </x-forms.textarea>--}}
    </div>


    <div id="sizing_images-label"  class="" style="width:60%" ondrop="drop(event, this)" ondragover="allowDrop(event)">
        <label class="float-left w-full mt-4 text-lg text-placeholder font-poppins-bold">Sizing chart  </label>
        <p class="float-left w-full text-gray text-sm mt-2 ">Upload min 580 x 800px dimension. You will be able to crop the image after uploading. <br>This sizing chart will be shown on the landing page, registration page and upgrade page. </p>
        <span class="error w-full float-left" style="color:#F53F14; display:none;" id="imgerror-slider_foreground" >! Image could not be uploaded since it is not as per the mentioned dimensions.</span>

        <x-forms.image_uploader style="height: 500px;width: 420px;border-color: lightgray;" >
            <x-slot name="uploder_title"><b>Upload image</x-slot>
            <x-slot name="uploder_description"> </x-slot>
            <x-slot name="field_id">sizing_images</x-slot>
        </x-forms.image_uploader>

        <x-forms.file_input>
            <x-slot name="width">580</x-slot>
            <x-slot name="height">800</x-slot>
            <x-slot name="field_id">sizing_images</x-slot>
        </x-forms.file_input>
        <x-forms.validationerror>
            <x-slot name="field_id">sizing_images</x-slot>
            <x-slot name="error_text">sizing_images_error</x-slot>
        </x-forms.validationerror>
        </label>

    </div>

</div>


                            </x-slot>
                        </x-forms.section>

















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
        $('#description').keyup(function() {
            $('#desccount').html(this.value.length+'/');
            if(this.value.length > 300){
                $("#title_count").css('color','red');
            } else{
                $("#title_count").css('color','black');

            }
            console.log(this.value.length);
        });
        $("#create-event-reward-f_010").validate({
            rules: {
                images_1:{
                    required: true,
                },
                name:{
                    required: true,
                },
                sku: {
                    required: true,
                },
                description: {
                    required: true,
                },
                max_quantity: {
                    required: true,
                },

            },
            submitHandler : function (form) {
                return true;
            }
        });
        formchanged=0;
        $('#page_title').keyup(function() {
            if(this.value.length > 60){

                $('#titlecount').html(this.value.length);
            }
            console.log(this.value.length);
        });

        $('#share_description').keyup(function() {
            $('#desccount').html(this.value.length+'/');

            console.log(this.value.length);
        });
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
            formchanged =1;
            var imgtype= $(this).attr('id');
            console.log(imgtype);
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
                    currentelement= $('#imgtype').val();
                    const myArray = currentelement.split("_");
                    if( $('#imgtype').val() == 'sizing_images'){
                        iddname='sizing_image';
                    } else{
                        iddname='rewards_image-'+myArray[1];

                    }
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{route('ajax.upload-file')}}",
                        data: {'_token':  $('input[name="_token"]').val(), 'image': base64data,'eventId':$('#challengeId').val(),'rewardId':0,'idd':iddname},
                        success: function(data){
                            console.log(data);

                            nextElement = parseInt(myArray[1])+1;
                            console.log('#images_'+nextElement+'-label');
                            $('#images_'+nextElement+'-label').removeClass('hidden');
                            $modal.modal('hide');
                            uploadFileResponse(data,$('#imgtype').val());

                            //alert("Crop image successfully uploaded");
                        }
                    });
                }
            });
        })

        function uploadFileResponse(response,idd){
console.log(response);
console.log(idd);
            $("#label-"+idd).removeClass('opacity-30');
            if(response.err == 1){
                showErrorModal("Upload was failed. Please try again!");
                return false;
            }
            $("#path-"+response.data.idd).val(response.data.path);

            if(idd){
                $("#label-"+idd).css('background-image','url('+response.data.fullpath+')');
                $("#label-"+idd).css('border','none');
                $("#label-"+idd).css('background-size','contain');
                $("#label-"+idd).css('justify-content','flex-start');
                $("#span-"+idd+"-add").css('visibility','hidden');
                $("#span-"+idd+"-edit").css('visibility','visible');
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
        var input = document.querySelector('input[name=size]');

        // initialize Tagify on the above input node reference
        var tagify = new Tagify(input)

        // bind "DragSort" to Tagify's main element and tell
        // it that all the items with the below "selector" are "draggable"
        var dragsort = new DragSort(tagify.DOM.scope, {
            selector: '.'+tagify.settings.classNames.tag,
            callbacks: {
                dragEnd: onDragEnd
            }
        })

        // must update Tagify's value according to the re-ordered nodes in the DOM
        function onDragEnd(elm){
            tagify.updateValueByDOMTags()
        }

        // listen to tagify "change" event and print updated value
        tagify.on('change', e => console.log(e.detail.value))

        tinymce.init({
            selector: '#description',
            height: 300,
            plugins: 'lists code emoticons',
            toolbar: 'undo redo | styleselect | bold italic | fontsize |' +
                'alignleft aligncenter alignright alignjustify | ' +
                'outdent indent | numlist bullist | emoticons',
            menubar: false,
            emoticons_append: {
                custom_mind_explode: {
                    keywords: ['brain', 'mind', 'explode', 'blown'],
                    char: '🤯'
                }
            },
            font_size_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
            setup: function(editor) {
                editor.on('Paste Change input Undo Redo', function () {
                    formchanged=1;
                    var length = editor.contentDocument.body.innerText.length;
                    $('#desccount').html(length+'/');
                    if(length > 300){
                            $("#title_count").css('color','red');
                        } else{
                            $("#title_count").css('color','black');

                        }
                    
                });
            }
        });

    </script>
</x-app-layout>
