<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
            
        </div>
    </div>

</div>
    
</body>
</html>
 