<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    
       


    @include('css')
</head>
<body>
 
    <div class="col-lg-12">
        <div class="card chat-app">
            <div id="plist" class="people-list">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search...">
                </div>
                <ul class="list-unstyled chat-list mt-2 mb-0">
                    <li class="clearfix">
                       
                        <div class="about">
                            <div class="name">
                                @if(count($user_messages) > 0)
                                @foreach ($user_messages as $single_message) 
                                    <div class="message-container">
                                        <div class="heading-avatar-icon">
                                            <img style="height:100px" src="https://bootdey.com/img/Content/avatar/avatar6.png">
                                          </div>
                                        <div class="message {{ $single_message->receiver_id == Auth::user()->id ? 'receiver' : 'sender' }}">
                                            <h2 class=""><a style="text-decoration: none; color:black" href="/messages/{{$single_message->id}}">        
                                                {{$single_message->name}}
                                            </a></h2>
                                        </div>
                                    </div>
                                @endforeach
                            @else 
                                <p>No conversation so far...</p>
                            @endif
                            </div>
                                                                    
                        </div>
                    </li>                                                       
                </ul>
            </div>
    
    
</body>
</html>




 