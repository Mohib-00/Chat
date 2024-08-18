<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @include('profilecss')
</head>
<body>
    <div class="container-fluid" style="background-color:#222e36"  >
        <div class="row" >
            <div class="col-lg-4">
                
             
                <div class="card">
                  
                    <img src="{{ asset('images/' . auth()->user()->image) }}" class="card__image">
 
                    <p class="card__name">{{ auth()->user()->name }}</p>
                    <p class="card__name">{{ auth()->user()->email }}</p>

                  <div class="grid-container">
              
                    
              
                  </div>
                  <ul class="social-icons">
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-codepen"></i></a></li>
                  </ul>
                  <button class="btn draw-border">Follow</button>
                  <button class="btn draw-border">Message</button>
              
                </div>

                
              

        </div>

        <div class="col-lg-8">
            <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <label class="mt-5 ti">Name:</label>
                        <input style="background-color: #222e36; color: white; border-radius: 5px" type="text" name="name" value="{{ auth()->user()->name }}" class="form-control" required />
                    </div>

                    <div class="col-lg-6 col-sm-12">
                        <label class="mt-5 ti">About:</label>
                        <input style="background-color: #222e36; color: white; border-radius: 5px" type="text" name="about" value="{{ auth()->user()->about }}" class="form-control" required />
                    </div>
            
                    <div class="col-lg-6 col-sm-12">
                        <label class="mt-5 ti">Image:</label>
                        <input style="background-color: #222e36; color: white; border-radius: 5px" type="file" name="image" class="form-control"  />
                    </div>
            
                    <div class="col-lg-12">
                        <input style="background-color: black;margin-left:-1px" type="submit"  value="Update Profile" class="btn btn-primary " />
                    </div>
                </div>
            </form>


            <h1 style="color:white;margin-top:40px">Add Emojis</h1>
             
             


            <form id="myForm" class="form-group">
              

<div class="row">
                <div class="col-lg-6 col-sm-12">
                    <label class="mt-5 ti">Smileys:</label>
                    <input id="smileys" type="hidden" name="smileys">
                    <input id="smileys-upload" style="background-color: #222e36; color: white; border-radius: 5px" type="file" name="smileys" class="form-control"  />
                </div>

                <div class="col-lg-6 col-sm-12">
                    <label class="mt-5 ti">Animals:</label>
                    <input id="animals" type="hidden" name="animals">
                    <input id="animals-upload" style="background-color: #222e36; color: white; border-radius: 5px" type="file" name="animals" class="form-control"  />
                </div>

                <div class="col-lg-6 col-sm-12">
                    <label class="mt-5 ti">Food:</label>
                    <input id="food" type="hidden" name="food">
                    <input id="food-upload" style="background-color: #222e36; color: white; border-radius: 5px" type="file" name="food" class="form-control"  />
                </div>

                <div class="col-lg-6 col-sm-12">
                    <label class="mt-5 ti">Activity:</label>
                    <input id="activity" type="hidden" name="activity">
                    <input id="activity-upload" style="background-color: #222e36; color: white; border-radius: 5px" type="file" name="activity" class="form-control"  />
                </div>

                <div class="col-lg-6 col-sm-12">
                    <label class="mt-5 ti">Travel:</label>
                    <input id="travel" type="hidden" name="travel">
                    <input id="travel-upload" style="background-color: #222e36; color: white; border-radius: 5px" type="file" name="travel" class="form-control"  />
                </div>

                <div class="col-lg-6 col-sm-12">
                    <label class="mt-5 ti">Objects:</label>
                    <input id="objects" type="hidden" name="objects">
                    <input id="objects-upload" style="background-color: #222e36; color: white; border-radius: 5px" type="file" name="objects" class="form-control"  />
                </div>

                <div class="col-lg-6 col-sm-12">
                    <label class="mt-5 ti">Flags:</label>
                    <input id="flags" type="hidden" name="flags">
                    <input id="flags-upload" style="background-color: #222e36; color: white; border-radius: 5px" type="file" name="flags" class="form-control"  />
                </div>


                <div class="col-lg-12">
                    <button  style="border-radius: 10px; background-color:black;  border: 1px solid black;margin-top:10px" class="send input-group-text p-2" id="submitemoji">
                        <h4 style="color:white">Add Emojis</h4>
                        
                    </button>
                </div>

</div>
            </form>
             
            
        </div>

       

        
    </div>

    

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>


$('#submitemoji').click(function(e) {
    e.preventDefault();
    sendemoji();  
   })

$('#smileys-upload').change(function() {
       var file = this.files[0];
       $('#smileys').val(file.name);  
   });

   $('#animals-upload').change(function() {
       var file = this.files[0];
       $('#animals').val(file.name);  
   });  
   
   $('#food-upload').change(function() {
       var file = this.files[0];
       $('#food').val(file.name);  
   }); 
   
   $('#activity-upload').change(function() {
       var file = this.files[0];
       $('#activity').val(file.name);  
   }); 

   $('#travel-upload').change(function() {
       var file = this.files[0];
       $('#travel').val(file.name);  
   }); 

   $('#objects-upload').change(function() {
       var file = this.files[0];
       $('#objects').val(file.name);  
   }); 

   $('#flags-upload').change(function() {
       var file = this.files[0];
       $('#flags').val(file.name);  
   }); 

function sendemoji() {
    var formData = new FormData();
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

     

    if ($('#smileys-upload')[0].files.length > 0) {
        var smileys = $('#smileys-upload')[0].files[0];
        formData.append('smileys', smileys);
    }

    if ($('#animals-upload')[0].files.length > 0) {
        var animals = $('#animals-upload')[0].files[0];
        formData.append('animals', animals);
    }

    if ($('#food-upload')[0].files.length > 0) {
        var food = $('#food-upload')[0].files[0];
        formData.append('food', food);
    }

    if ($('#activity-upload')[0].files.length > 0) {
        var activity = $('#activity-upload')[0].files[0];
        formData.append('activity', activity);
    }

    if ($('#travel-upload')[0].files.length > 0) {
        var travel = $('#travel-upload')[0].files[0];
        formData.append('travel', travel);
    }

    if ($('#objects-upload')[0].files.length > 0) {
        var objects = $('#objects-upload')[0].files[0];
        formData.append('objects', objects);
    }

    if ($('#flags-upload')[0].files.length > 0) {
        var flags = $('#flags-upload')[0].files[0];
        formData.append('flags', flags);
    }

     
    $.ajax({
        url: "{{ route('emojis.store') }}",
        method: 'post',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function(result) {
          
            $('#smileys-upload').val('');
            $('#animals-upload').val('');
            $('#food-upload').val('');
            $('#activity-upload').val('');
            $('#travel-upload').val('');
            $('#objects-upload').val('');
            $('#flags-upload').val('');
             
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
        }
    });
}
</script>

 
    
</body>
</html>
 