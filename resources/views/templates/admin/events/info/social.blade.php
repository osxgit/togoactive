<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <link href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    <style>
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
                    <x-slot name="header">Social & SEO</x-slot>
                    <x-slot name="breadcrumb">
                        <a class="text-primary font-poppins-semibold text-sm" href="">Social & SEO</a> >
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
                @if ($errors->any())
                    <div class="alert alert-danger"  style="color:red">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" id="create-event-seo-f_010" name="create-event-seo-f_010" action="{{route('admin.events.info.socialSeo.store',array($id))}}" class="w-full float-left" autocomplete="false" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="challengeId" id="challengeId" value="{{$id}}">

                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Meta Details
                        </x-slot>
                        <x-slot name="section_button">

                        </x-slot>
                        <x-slot name="section_heading_description_status">hidden</x-slot>
                        <x-slot name="section_heading_description_text"></x-slot>
                        <x-slot name="section_content">
                            <div class="float-left w-full flex  justify-center items-end">

                                <div class="float-left w-auto">
                                    <x-forms.textfield id="page_title" name="page_title" placeholder="Event name or something similar" :value="old('page_title',$eventsocials->page_title ?? $event->name )">
                                        <x-slot name="field_id">page_title</x-slot>
                                        <x-slot name="label_text">Page title*</x-slot>
                                        <x-slot name="label_description_status"></x-slot>
                                        <x-slot name="label_description">The text that is displayed on search engine result pages and browser tabs to indicate the topic of a webpage. Usually this is the event name.</x-slot>
                                    </x-forms.textfield>
                                    <div>
                                        <x-forms.validationerror>
                                            <x-slot name="field_id">page_title</x-slot>
                                            <x-slot name="error_text">page_title_error</x-slot>
                                        </x-forms.validationerror>
                                        <span class="float-right" id="title_count"><span id="titlecount">{{$eventsocials!= null ?strlen($eventsocials->page_title) : strlen($event->name) }}</span>/60 characters</span>
                                    </div>

                                </div>
                            </div>

                        </x-slot>

                    </x-forms.section>



                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Default Social Share
                        </x-slot>
                        <x-slot name="section_button">

                        </x-slot>
                        <x-slot name="section_heading_description_status"></x-slot>
                        <x-slot name="section_heading_description_text">The image, title description uploaded here will be displayed when you share the event link on social media depending on the platform.</x-slot>
                        <x-slot name="section_content">

                            <span class="error w-full float-left" style="color:#F53F14; display:none;" id="imgerror-certificate" >! Image could not be uploaded since it is not as per the mentioned dimensions.</span>

                            <label   class="float-left w-full mt-4 text-lg text-placeholder font-poppins-bold">Image* (1200 x 630 px)</label>

                            <div id="share_image-label" class="float-left w-1/2 mt-4" ondrop="drop(event, this)" ondragover="allowDrop(event)" >
                                @if($eventsocials == null || !isset($eventsocials->share_image) || $eventsocials->share_image == null)
                                    <x-forms.image_uploader>
                                        <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                        <x-slot name="uploder_description">  SVG, PNG, JPG (MIN. 1200x630px)</x-slot>
                                        <x-slot name="field_id">share_image</x-slot>
                                    </x-forms.image_uploader>
                                @else
                                    <x-forms.image_uploader_edit>
                                        <x-slot name="uploder_title"><b>Click to upload</b> or drag and drop </x-slot>
                                        <x-slot name="uploder_description">SVG, PNG, JPG (MIN. 1200x630px)</x-slot>
                                        <x-slot name="field_id">share_image</x-slot>
                                        <x-slot name="uploaded_img">{{$eventsocials->share_image}}</x-slot>
                                    </x-forms.image_uploader_edit>
                                @endif
                                <x-forms.file_input >
                                    <x-slot name="width">1200</x-slot>
                                    <x-slot name="height">630</x-slot>
                                    <x-slot name="field_id">share_image</x-slot>
                                </x-forms.file_input>
                                </label>



                                <div>
                                    <x-forms.validationerror>
                                        <x-slot name="field_id">share_image</x-slot>
                                        <x-slot name="error_text">share_image_error</x-slot>
                                    </x-forms.validationerror>
                                </div>
                            </div>


                            <div class="float-left w-full flex  justify-center items-end">

                                <div class="float-left w-full">
                                    <x-forms.textfield id="share_title" name="share_title" placeholder="Event name or something similar" :value="old('share_title',$eventsocials->share_title ?? '' )">
                                        <x-slot name="field_id">share_title</x-slot>
                                        <x-slot name="label_text">Title*</x-slot>
                                        <x-slot name="label_description_status">hidden</x-slot>
                                        <x-slot name="label_description"></x-slot>
                                    </x-forms.textfield>
                                    <div>
                                        <x-forms.validationerror>
                                            <x-slot name="field_id">share_title</x-slot>
                                            <x-slot name="error_text">share_title_error</x-slot>
                                        </x-forms.validationerror>
                                    </div>
                                </div>

                            </div>

                            <div class="float-left w-full">
                                <x-forms.textarea id="share_description" name="share_description" placeholder="Include all releavant keywords to make it easier to find the event" class="h-32">
                                    <x-slot name="field_id">share_description</x-slot>
                                    <x-slot name="label_text">Description*</x-slot>
                                    <x-slot name="label_description_status">hidden</x-slot>
                                    <x-slot name="label_description"></x-slot>
                                    {{old('share_description',$eventsocials->share_description ?? '')}}
                                </x-forms.textarea>
                                <div>
                                    <x-forms.validationerror>
                                        <x-slot name="field_id">share_description</x-slot>
                                        <x-slot name="error_text">share_description_error</x-slot>
                                    </x-forms.validationerror>
                                    <span class="float-right" id="title_count"><span id="desccount">{{$eventsocials!= null ?strlen($eventsocials->share_description) : 0 }}/</span>120-158 characters.</span>
                                </div>
                            </div>

                        </x-slot>






                    </x-forms.section>
                    <x-forms.section class="mt-8 rounded-xl">
                        <x-slot name="section_heading">
                            Tracking
                        </x-slot>
                        <x-slot name="section_button">

                        </x-slot>
                        <x-slot name="section_heading_description_status"></x-slot>
                        <x-slot name="section_heading_description_text">If the following fields are left blank, the event would get tracked automatically. For customization, add the ids.</x-slot>
                        <x-slot name="section_content">
                            <div class="float-left w-full flex  justify-start items-end">

                                <div class="float-left w-1/2">
                                    <x-forms.textfield id="fb_pixel_id" name="fb_pixel_id" placeholder="This is default facebook pixel ID" :value="old('fb_pixel_id',$eventsocials->fb_pixel_id ?? '' )">
                                        <x-slot name="field_id">fb_pixel_id</x-slot>
                                        <x-slot name="label_text">Facebook Pixel ID*</x-slot>
                                        <x-slot name="label_description_status">hidden</x-slot>
                                        <x-slot name="label_description"></x-slot>
                                    </x-forms.textfield>

                                </div>

                            </div>
                            <div>
                                <x-forms.validationerror>
                                    <x-slot name="field_id">fb_pixel_id</x-slot>
                                    <x-slot name="error_text">fb_pixel_id_error</x-slot>
                                </x-forms.validationerror>

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


        $("#create-event-seo-f_010").validate({
            rules: {
                page_title:{
                    required: true,
                    maxlength: 60
                },
                share_image:{
                    required: true,
                    extension: "jpg|jpeg|png|svg"
                },
                share_title: {
                    required: true,
                },
                share_description: {
                    required: true,
                    minlength: 120,
                    maxlength: 158
                },
                fb_pixel_id: {
                    required:true,
                    minlength: 15,
                    maxlength: 15
                }
            },
            messages: {
                page_title:{
                    required: 'Page title is required',
                    maxlength: 'Number of characters is more than 60. Reduce character count.'
                },
                share_image:{
                    required: 'Share image is required',
                    extension: 'Plaese add an image with a valid format',
                },
                share_title: {
                    required: 'Share title is required',
                },
                share_description: {
                    required: 'Share description is required',
                    minlength: 'Number of characters is less than 120. Write more for better SEO optimization.',
                    maxlength: 'Number of characters is more than 158. Reduce character count for better SEO optimization.'
                },
                fb_pixel_id: {
                    required:'Fb pixel id is required',
                    minlength: 'ID should have 15 digits. Check and enter again.',
                    maxlength: 'ID should have 15 digits. Check and enter again.'
                }
            },
            submitHandler : function (form) {
                return true;
            }
        });
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
