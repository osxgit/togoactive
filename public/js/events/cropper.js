formchanged = 0;

var $modal = $('#modal');
var image = document.getElementById('image');
var cropper;
var $previewModal = $('#previewModal');
imgwidth = '';
imgheight = '';

function handleFiles(files, elementid) {
    console.log(elementid);
    var imgtype = elementid;
    var _URL = window.URL || window.webkitURL;
    var file, img;
    if ((file = files[0])) {
        img = new Image();
        var objectUrl = _URL.createObjectURL(file);
        img.onload = function () {
            $('#imgtype').val(imgtype);
            var height = $('#' + imgtype).data("height");
            var width = $('#' + imgtype).data("width");
            imgwidth = this.width;
            imgheight = this.height;
            console.log(imgwidth);
            if (this.width < width || this.height < height) {
                $("#imgerror-" + imgtype).css('display', 'block')
                if ($('#modal').is(':visible')) {
                    $("#modal").modal('hide');
                }
            } else {
                $("#imgerror-" + imgtype).css('display', 'none');

            }
            _URL.revokeObjectURL(objectUrl);
        };
        img.src = objectUrl;
    }

    // var files = e.target.files;
    var imgtype = elementid;

    $('#imgtype').val(imgtype);
    height = $('#' + imgtype).data("height");
    width = $('#' + imgtype).data("width");
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

$("body").on("change", ".image", function (e) {
    formchanged = 1;
    var imgtype = $(this).attr('id');
    var _URL = window.URL || window.webkitURL;
    var file, img;
    if ((file = this.files[0])) {
        img = new Image();
        var objectUrl = _URL.createObjectURL(file);
        img.onload = function () {
            $('#imgtype').val(imgtype);
            var height = $('#' + imgtype).data("height");
            var width = $('#' + imgtype).data("width");
            imgwidth = this.width;
            imgheight = this.height;
            console.log(imgwidth);
            if (this.width < width || this.height < height) {
                $("#imgerror-" + imgtype).css('display', 'block')
                if ($('#modal').is(':visible')) {
                    $("#modal").modal('hide');
                }
            } else {
                $("#imgerror-" + imgtype).css('display', 'none');

            }
            _URL.revokeObjectURL(objectUrl);
        };
        img.src = objectUrl;
    }

    var files = e.target.files;
    var imgtype = $(this).attr('id');

    $('#imgtype').val(imgtype);
    height = $('#' + imgtype).data("height");
    width = $('#' + imgtype).data("width");
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

    if (imgwidth < width || imgheight < height) {
        $modal.modal("hide");
    }
    cropper = new Cropper(image, {
        aspectRatio: $('#width').val() / $('#height').val(),
        viewMode: 0,
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
$(document).on('click', '#crop', function(){
    var width = $('#width').val();
    var height = $('#height').val();

    canvas = cropper.getCroppedCanvas({
        width: width,
        height: height,
    });
    canvas.toBlob(function (blob) {
        url = URL.createObjectURL(blob);
        var reader = new FileReader();
        reader.readAsDataURL(blob);
        reader.onloadend = function () {
            var base64data = reader.result;

            $.ajax({
                type: "POST",
                dataType: "json",
                url: uploadFileRoute,
                data: { '_token': $('input[name="_token"]').val(), 'image': base64data, 'eventId': $('#challengeId').val(), 'idd': $('#imgtype').val() },
                success: function (data) {
                    console.log(data);
                    $modal.modal('hide');
                    uploadFileResponse(data, $('#imgtype').val())
                    //alert("Crop image successfully uploaded");
                }
            });
        }
    });
})

function uploadFileResponse(response, idd) {

    let iddToField = {
        'achievement_icon': 'icon',
        'achcievement_more_info_image': 'more_info_image',
        'hero_image': 'notification_hero_image',
        'sponsor-content-image': 'sponsor_content_image'
    };
    jQuery('#' + iddToField[idd]).val(response.data.fullpath);

    $("#label-" + idd).removeClass('opacity-30');
    if (response.err == 1) {
        showErrorModal("Upload was failed. Please try again!");
        return false;
    }
    $("#path-" + response.data.idd).val(response.data.path);

    const arr = ['cover', 'icon', 'profile_icon', 'ebib', 'certificate', 'notification'];
    if (idd) {
        $("#label-" + response.data.idd).css('background-image', 'url(' + response.data.fullpath + ')');
        $("#label-" + response.data.idd).css('border', 'none');

        $("#span-" + response.data.idd + "-add").css('visibility', 'hidden');
        $("#span-" + response.data.idd + "-edit").css('visibility', 'visible');
    } else if (idd == 'list_upload' || idd == 'geojson_upload') {
        $("#label-" + idd + " input[type='text']").val(response.data.path);
    }

}

var $form = $('form'),
origForm = $form.serialize();

$('form :input').on('change input', function () {
    if ($form.serialize() !== origForm) {
        formchanged = 1;
        console.log(formchanged);
    }
});


