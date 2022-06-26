// $(document).ready(function(){
//     $('.city').change(function(){
//         var city = $(this).find(":selected").val();
//         var data = {city: city};
//         console.log(data);
//         $.ajax({
//             url: 'http://longhoang-intern.loc/select_district',
//             method: 'POST',
//             data: data,
//             dataType: 'json',
//             success: function(data){
//                 $('.district').html(data);
//             },
//             error: function (xhr, ajaxoptions, thrownError){
//                 alert(xhr.status);
//                 alert(thrownError);
//             },
//         });
//     });
// });


  // $(document).ready(function(){
  //     var maxField = 10; //Input fields increment limitation
  //     var addButton = $('.add_button'); //Add button selector
  //     var wrapper = $('.field_wrapper'); //Input field wrapper
  //     var fieldHTML = `<div class="field_wrapper">
  //                                   <div>
  //                                     <div class="row">
  //                                       <div class="col-md-2">
  //                                         <input type="text" name="color[]" placeholder="color" class="form-control">
                                          
  //                                       </div>
  //                                       <div class="col-md-3">
  //                                         <input type="text" name="size[]" placeholder="size" class="form-control">
  //                                       </div>
  //                                       <div class="col-md-2">
  //                                         <input type="text" name="quantity[]" placeholder="quantity" class="form-control">
  //                                       </div>
  //                                       <div class="col-md-3">
  //                                         <input type="text" name="prire[]" placeholder="prire" class="form-control">
  //                                       </div>
  //                                       <div class="col-md-2">
  //                                         <a href="javascript:void(0);" class="add_button" title="Add field">
  //                                           <img style="height: 30px;weight:30px" src="{{ asset('public/icon-add.jpeg') }}" alt="">
  //                                         </a>
  //                                       </div>
  //                                     </div>
  //                                   </div>
  //                                 </div> `;
      
  //     //Once add button is clicked
  //     $(addButton).click(function(){
  //         //Check maximum number of input fields
  //         //if(x < maxField){ 
  //             //x++; //Increment field counter
  //             alert("You Clicked....");
  //             //$(wrapper).append(fieldHTML); //Add field html
  //        // }
  //     });
      
  //     //Once remove button is clicked
  //     // $(wrapper).on('click', '.remove_button', function(e){
  //     //     e.preventDefault();
  //     //     $(this).parent('div').remove(); //Remove field html
  //     //     x--; //Decrement field counter
  //     // });
  // });
