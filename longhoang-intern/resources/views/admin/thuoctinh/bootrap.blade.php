<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!doctype html>
    <html lang="en">
      <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      </head>
      <body>
       <div class="container style-grid">
        <div class="row">
            {{-- <div class="col-md-12">
                <p class="text text-primary text-center">color</p>
                <p class="text text-danger text-justify">color1</p>
                <p class=" font-weight-bold"></p>
                <p class=" text-primary"></p>
                <p class=" text-primary text-center font-weight-bold">color</p>
                <p class=" text-uppercase">long</p>
                <p class=" text-lowercase">long</p>
                <p class=" text-capitalize">long</p>
                <p class=" text-decoration-none"></p>
                <div class=" bg-danger text-light img ">

                </div> --}}
              
               
            </div>
            
        </div>
       
       </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      </body>
    </html>
</head>
<body>
    
</body>
</html>


{{-- $('#mutiple_file').change(function() {
    var error_image = '';
    var form_data = new FormData();
    var files = $('#mutiple_file')[0].files;
    if (files.length > 10) {
        error_image += 'bạn không được up quá 10 hình ảnh';
    } else {
        for (var i = 0; i < files.length; i++) {
            var name = document.getElementById('mutiple_file').files[i].name;
            var ext = name.split('.').pop().toLowerCase();
            if (jQuery.inArray(ext, ['gif', 'png', 'jpeg', 'jpg']) == -1) {
                error_image += '<p>không có hiệu lực</p>';

            }
            var ofreader = new FileReader();
            ofreader.readAsDataURL(document.getElementById('mutiple_file').files[i]);
            var f = document.getElementById('mutiple_file').files[i];
            var fsize = f.size || f.fileSize;
            if (fsize > 20000000) {
                error_image += '<p>file ảnh quá lớn</p>';
            } else {
                form_data.append("file[]", document.getElementById('mutiple_file').files[i])
            }
            $('#error_mutiple_file').html(error_image);
        }
    }
    if (error_image == '') {
        $.ajax({
            url:"{{route('cateimg')}}",
            headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
            method: "POST",
            dataType: "json",
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
            var Arr2 = data.map(function(sv2, index2) {
                    return `
                    <img src="{{asset('asses/client/upload/${sv2[0]}')}}" width="150px" height="100px" alt="">
                    <img src="{{asset('asses/client/upload/${sv2[1]}')}}" width="150px" height="100px" alt="">
                    <img src="{{asset('asses/client/upload/${sv2[2]}')}}" width="150px" height="100px" alt="">
                       `;
           
            })
            $('.right').html( Arr2);
            }
        });

    }


});


<div class="inside" id="inside">

    <div class="left">
        <input type="file" name="mutiple_file[]" id="mutiple_file" multiple />
        <span id="error_mutiple_file"></span>
        <input type="text"  name="image5" id="image5">
    </div>

    
<div class="right">
    
</div>

</div>
</div>


public function uploadanh(){
    $hinh=array($_FILES['file']['name']);
    for($count = 0;$count<count($_FILES['file']['name']);$count++){
        $file_name=$_FILES['file']['name'][$count];
        $tmp_name=$_FILES['file']['tmp_name'][$count];
        
        $file_array=explode(".",$file_name);
        $file_ext=end($file_array);
     
        $location='asses/client/upload/'.$file_name;
        if(move_uploaded_file($tmp_name,$location)){
          
        }
    }
    
    echo json_encode($hinh);
  } --}}