<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel='stylesheet' type='text/css' />
    <!-- Styles -->
   
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
       
        <script src="{{ asset('js/jquery-3.5.0.min.js') }}"></script>


       



        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
        <script src="{{ asset('js/main.js') }}"></script>
       
        <script src="{{ asset('js/jquery-3.5.0.min.js') }}"></script>

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //  select district
            $('.city').change(function (e){
    
                e.preventDefault();
                
                var city = $(this).find(":selected").val();
                var data = {city: city};
                console.log(data);
                $.ajax({
                    url: 'http://longhoang-intern.loc/select_district',
                    method: 'POST',
                    data: data,
                    dataType: 'json',
                    success:function(data){
                        $('.district').html(data);
                        // alert(data);
                }
                });
            });
            //  select commune

            $('.district').change(function (e){

                e.preventDefault();

                var district = $(this).find(":selected").val();
                var data = {district: district};
                console.log(data);
                $.ajax({
                    url: 'http://longhoang-intern.loc/select_ward',
                    method: 'POST',
                    data: data,
                    dataType: 'json',
                    success:function(data){
                        $('.ward').html(data);
                        // alert(data);
                }
                });
                });





                $(document).ready(function(){
      var maxField = 10; //Input fields increment limitation
      var addButton = $('.add_button'); //Add button selector
      var wrapper = $('.field_wrapper'); //Input field wrapper
      var fieldHTML = `
      <div class="field_wrapper">
                            <div>
                                <div class="row">
                                    <div class="col-md-1">
                                        <input type="text" name="color[]" placeholder="color" class="form-control">
                                          
                                    </div>
                                    <div class="col-md-1">
                                        <input type="text" name="size[]" placeholder="size" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="quantity[]" placeholder="quantity" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="price[]" placeholder="prire" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="compare_at_price[]" placeholder="compare_at_price" class="form-control">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="file" class="form-control-file" name="image[]">
                                    </div>
                                    <div class="col-md-1">
                                        <a href="javascript:void(0);" class="remove_button" title="Remove field">
                                         <img style="height: 30px;weight:30px" src="{{ asset('public/icon-delete.png') }}" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            </div>
                                  `;
        var x=1;
      
      //Once add button is clicked
      $(addButton).click(function(){
          //Check maximum number of input fields
          if(x < maxField){ 
              x++; //Increment field counter
              //alert("You Clicked....");
              $(wrapper).append(fieldHTML); //Add field html
          }
      });
      
      //Once remove button is clicked
    //   $(wrapper).on('click', '.remove_button', (e) =>{
    //       e.preventDefault();
    //       //$(this).parent('div').remove(); //Remove field html
    //       $(this).parent().remove();
    //       x--; //Decrement field counter
    //       alert('remove');
    //   });

    $(document).on("click", ".remove_button", function(e) { //user click on remove text
        e.preventDefault();
        //$(this).parent().remove();
        $(this).parent().parent().remove();
        x--;
        alert('remove');
    })

   
    
  });
  $(document).ready(function(){
    $('#mutiple_file').change(function() {
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
            url:'http://longhoang-intern.loc/uploadanh',
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
                    <img src="{{asset('public/uploads/${sv2[0]}')}}" width="150px" height="100px" alt="">
                    <img src="{{asset('public/uploads/${sv2[1]}')}}" width="150px" height="100px" alt="">
                    <img src="{{asset('public/uploads/${sv2[2]}')}}" width="150px" height="100px" alt="">
                       `;
           
            })
            $('.right').html( Arr2);
            }
        });

    }


});

  });

            
    </script>

        
       
    </div>
</body>
</html>
