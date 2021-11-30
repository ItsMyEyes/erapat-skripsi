"use strict";
$(document).ready(function(){
    $('.select2').select2();
    $('.data').DataTable();

    $('input').attr('autocomplete','off')

    var maxField = 5; //Input fields increment limitation
    var addButton = $('.add-category'); //Add button selector
    var addButton2 = $('.add-category-1'); //Add button selector
    var wrapper = $('.next-category'); //Input field wrapper
    var aku = "<div class='form-group' style='padding-top:  5px;'><div class='input-group'><input type='text' required name='nama_category[]' class='form-control'><span class='input-group-addon btn btn-danger btn-sm remove_button'><i class='fa fa-times'></i></span></div></div>";
    var html_2 = "<div class='form-group' style='padding-top:  5px;'><div class='input-group'><input type='text' name='question[]' placeholder='Pertayaan' class='form-control'><input type='number' min='1' max='10' name='star[]' placeholder='Jumlah Star Min: 1 & Max: 10' class='form-control'><span class='input-group-addon btn btn-danger btn-sm remove_button'><i class='fa fa-times'></i></span></div></div>";
    // var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(aku); //Add field html
    });

    $(addButton2).click(function () {
        x++;
        $(wrapper).append(html_2);
    })

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

    $(document).on('change', '.file-input', function(e) {
        
        e.preventDefault();
        
        var fileData = $(this).prop('files')[0];
        var formData = new FormData();
        
        formData.append('file', fileData);

        // var formData = new FormData($(this).parents('form'));
        $.ajax({
            url: "/api/category/upload/image",
            cache: false,
            contentType: false,
            processData: false,
            data: formData,
            method: 'POST',
            success: function(data){
                console.log(data);
            },
            error: function(data,jqXHR){
                if (jqXHR.status === 200) {
                    toastr.success('Berhasil Upload File')
                } else {
                    toastr.error('Mungkin Extension File Salah Atau File Terlalu Besar')
                }
            }
        }) 
    });

    $('.exit').click(function(){
        let html = '';
        $('#hello').html(html)
    })

});

function upload(id) {
    e.preventDefault();

    var formData = new FormData($(this).parents('form')[0]);
    $.ajax({
        url: '/api/category/upload/image',
        type: 'POST',
        xhr: function() {
            var myXhr = $.ajaxSettings.xhr();
            return myXhr;
        },
        success: function (data) {
        },
        error: function(jqXHR, textStatus, errorThrown) {
            if (jqXHR.status === 200) {
                toastr.success('Berhasil Upload File')
            } else {
                toastr.error('Mungkin Extension File Salah Atau File Terlalu Besar')
            }
        },
        data: formData,
        cache: false,
        contentType: false,
        processData: false
    });
    return false;
}

$('.delete').click(function() {
    const url = $(this).data('url');
    const id = $(this).data('id');
    const check = $(this).data('check');
    var csrf_token = $('meta[name="csrf_token"]').attr('content');
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this item!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
        $.ajax({
            'url' : url,
            'method' : 'DELETE',
            'data' : {"_token": csrf_token},
            success: function() {
                $('#remove-item-'+id).remove();
                swal("Poof! Your item has been deleted!", {
                    icon: "success",
                });
            }
        })
        } else {
          swal({
            text: "Once deleted, you will not be able to recover this item!",
            icon: "success",
          });
        }
      });
    
      $(".knob").knob({
        /*change : function (value) {
         //console.log("change : " + value);
         },
         release : function (value) {
         console.log("release : " + value);
         },
         cancel : function () {
         console.log("cancel : " + this.value);
         },*/
        draw: function () {
  
          // "tron" case
          if (this.$.data('skin') == 'tron') {
  
            var a = this.angle(this.cv)  // Angle
                , sa = this.startAngle          // Previous start angle
                , sat = this.startAngle         // Start angle
                , ea                            // Previous end angle
                , eat = sat + a                 // End angle
                , r = true;
  
            this.g.lineWidth = this.lineWidth;
  
            this.o.cursor
            && (sat = eat - 0.3)
            && (eat = eat + 0.3);
  
            if (this.o.displayPrevious) {
              ea = this.startAngle + this.angle(this.value);
              this.o.cursor
              && (sa = ea - 0.3)
              && (ea = ea + 0.3);
              this.g.beginPath();
              this.g.strokeStyle = this.previousColor;
              this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
              this.g.stroke();
            }
  
            this.g.beginPath();
            this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
            this.g.stroke();
  
            this.g.lineWidth = 2;
            this.g.beginPath();
            this.g.strokeStyle = this.o.fgColor;
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
            this.g.stroke();
  
            return false;
          }
        }
      });
});


    (function($) {
  
    function createPreview(file, fileContents) {

        var $previewElement = '';
        switch (file.type) {
        case 'image/png':
        case 'image/jpeg':
        case 'image/gif':
            $previewElement = $('<img src="' + fileContents + '" />');
            break;
        case 'video/mp4':
        case 'video/webm':
        case 'video/ogg':
            $previewElement = $('<video autoplay muted width="100%" height="100%"><source src="' + fileContents + '" type="' + file.type + '"></video>');
            break;
        case 'application/pdf':
            $previewElement = $('<canvas id="" width="100%" height="100%"></canvas>');
            break;
        default:
            break;
        }
        var $displayElement = $('<div class="preview">\
                                <div class="preview__thumb"></div>\
                                <span class="preview__name" title="' + file.name + '">' + file.name + '</span>\
                                <span class="preview__type" title="' + file.type + '">' + file.type + '</span>\
                                </div>');
        $displayElement.find('.preview__thumb').append($previewElement);
        $('.upload__files').append($displayElement);
    }
  
    function fileInputChangeHandler(e) {
        var URL = window.URL || window.webkitURL;
        var fileList = e.target.files;
        
        if (fileList.length > 0) {
        $('.upload__files').html('');
        
        for (var i = 0; i < fileList.length; i++) {
            var file = fileList[i];
            var fileUrl = URL.createObjectURL(file);
            createPreview(file, fileUrl);
        }
        }
    }
  
  
  
  
  
  $(document).ready(function() {
    $(".file-upload").change(function(){
        var id = $(this).data('id')
        var image = $(this).prop('files')[0];

        var formData = new FormData();
        var t = image.type.split('/').pop().toLowerCase();
        if (t != "jpeg" && t != "jpg" && t != "png" && t != "bmp" && t != "gif") {
            toastr.error('Please select a valid image file');
            $(this).val("")
            $(".upload__files-"+id).css("display",'none')
            return false;
        }else {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function (e) {
                    var $previewElement = '<img src="' + e.target.result + '" />'
                    var j = id - 1;
                    var $displayElement = $('<div class="preview">\
                        <div class="preview__thumb"></div>\
                        <span class="preview__name" title="' + image.name + '">' + image.name + '</span>\
                        <span class="preview__type" title="' + image.type + '">' + image.type + '</span>\
                        </div>');
                    $displayElement.find('.preview__thumb').append($previewElement);
                    $('.upload__files-'+j).html($displayElement);
                }
                reader.readAsDataURL(this.files[0]);
            }
            var j = id - 1;
            $(".upload__files-"+j).css("display",'block')
            formData.append('file',image)
        }

        $.ajax({
            url: '/api/apiProductImage',
            type: 'POST',
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = (evt.loaded / evt.total) * 100;
                        var html = `| Uploaded : ${percentComplete.toFixed(0)}% / 100%`
                        toastr.success(html)
                    }
                }, false);
                return xhr;
            },
            success: function (jqXHR,data) {
                toastr.success('Berhasil Upload File')
                console.log(jqXHR)
                $('#image_'+id).val(jqXHR.name_file)
            },
            error: function(jqXHR, textStatus, errorThrown,data) {
                console.log(errorThrown)
            },
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        });
        return false;
        
    });
  });

   //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    $.ajax({
        method: "POST",
        url: "/api/apiProduct",
        success: function(data) {
            console.log(data)
        }
    })
})(jQuery);
