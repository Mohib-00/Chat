<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat-App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('css')   
     
</head>
<body>
    
    <div class="container-fluid" id="chat-container" style="border: 13px solid #0c1317; background-image: url('{{ asset('images/' . $user->background_image) }}')">
        <div class="row">
            <div style="background-color:#202c33;width:4%" class="col-lg-1 one">
                <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 ">                     
                        <svg class="mt-5 vi" style="color:#8b989e" xmlns="http://www.w3.org/2000/svg" width="50" height="30" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                            <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                          </svg>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                          <svg class="mt-5 vi" style="color:#8b989e" xmlns="http://www.w3.org/2000/svg" width="50" height="30" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                          </svg>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 ">                      
                        <svg id="svgi" class="mt-5 vi" style="color:#8b989e" viewBox="0 0 24 24" height="30" width="50" preserveAspectRatio="xMidYMid meet" fill="none">
                            <title>status-unread-outline</title>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.71672 8.34119C3.23926 8.06362 3.07722 7.45154 3.35479 6.97407C4.33646 5.28548 5.79114 3.92134 7.53925 3.05006C9.28736 2.17878 11.2524 1.83851 13.1916 2.07126C13.74 2.13707 14.1312 2.63494 14.0654 3.18329C13.9995 3.73164 13.5017 4.12282 12.9533 4.05701C11.4019 3.87081 9.82989 4.14303 8.43141 4.84005C7.03292 5.53708 5.86917 6.62839 5.08384 7.97926C4.80626 8.45672 4.19419 8.61876 3.71672 8.34119Z" fill="currentColor"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8569 10.115C21.4065 10.0604 21.8963 10.4616 21.9509 11.0112C22.144 12.9548 21.7638 14.9125 20.857 16.6424C19.9503 18.3724 18.5567 19.799 16.8485 20.746C16.3655 21.0138 15.7568 20.8393 15.489 20.3563C15.2213 19.8732 15.3957 19.2646 15.8788 18.9968C17.2454 18.2392 18.3602 17.0979 19.0856 15.714C19.811 14.33 20.1152 12.7639 19.9607 11.209C19.9061 10.6594 20.3073 10.1696 20.8569 10.115Z" fill="currentColor"></path>
                            <path d="M6.34315 17.6568C7.89977 19.2135 9.93829 19.9945 11.9785 20C12.4928 20.0013 12.9654 20.3306 13.0791 20.8322C13.2105 21.4123 12.8147 21.9846 12.22 21.9976C9.58797 22.0552 6.93751 21.0796 4.92893 19.0711C2.90126 17.0434 1.92639 14.3616 2.00433 11.7049C2.02177 11.1104 2.59704 10.7188 3.17612 10.8546C3.67682 10.9721 4.00256 11.4471 4.00009 11.9614C3.99021 14.0216 4.77123 16.0849 6.34315 17.6568Z" fill="currentColor"></path>
                            <circle cx="19.95" cy="4.05005" r="3" fill="#009588"></circle>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12 16C14.2091 16 16 14.2091 16 12C16 9.79086 14.2091 8 12 8C9.79086 8 8 9.79086 8 12C8 14.2091 9.79086 16 12 16ZM12 18C15.3137 18 18 15.3137 18 12C18 8.68629 15.3137 6 12 6C8.68629 6 6 8.68629 6 12C6 15.3137 8.68629 18 12 18Z" fill="currentColor"></path>
                        </svg>                     
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <svg  class="mt-5 vi" style="color:#8b989e" xmlns="http://www.w3.org/2000/svg" width="50" height="30" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                            <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                          </svg>                    
                    </div>

                    <div style="color:white" class="col-lg-12 col-md-12 col-sm-12 mt-3">
                        <hr>
                    </div>

                    <div style="height:480px" class="col-lg-12 col-md-12 col-sm-12">
                        <svg class="mt-3 vi" style="color:#8b989e" xmlns="http://www.w3.org/2000/svg" width="50" height="30" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                            <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                        </svg>                      
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <svg class="mt-3 vi" style="color:#8b989e" xmlns="http://www.w3.org/2000/svg" width="50" height="30" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/>
                          </svg>                    
                    </div>

                    <div style="padding:0px 0px 15px 20px" class="col-lg-12 col-md-12 col-sm-12 mt-5 ">
                        <img class="icon vi" src="{{ asset('images/' . auth()->user()->image) }}">
                    </div>
                    
                </div>                
            </div>

            


            <div id="statusContainer" style="background-color: #111b21;" class="col-lg-4">
                <div class="row" style="background-color: #202c33;">

                    <div id="backicn" class="col-1" style="margin-top:80px;margin-left:5px;color:#dadee0">
                        <svg  id="backicn" viewBox="0 0 24 24" height="34" width="34" preserveAspectRatio="xMidYMid meet" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24">
                            <title>back</title>
                            <path fill="currentColor" d="M12,4l1.4,1.4L7.8,11H20v2H7.8l5.6,5.6L12,20l-8-8L12,4z"></path>
                        </svg>
                    </div>

                    <div class="col-9" style="margin-top:65px;margin-left:5px;color:#dadee0">
                        <h3>Status</h3>
                    </div>

                </div>

                @foreach($users as $user)
                @if($user->id == auth()->id())
                    <div class="row my-5" id="clk">
                        <div class="col-2 avatar-icon mx-3">
                            @if($user->user_status)
                                @if(preg_match('/\.(jpg|jpeg|png|gif|jfif)$/i', $user->user_status))
                                    <img src="{{ asset('images/' . basename($user->user_status)) }}" style="max-width: 100%; max-height: 100%;">
                                @elseif(preg_match('/\.(mp4|webm|ogg)$/i', $user->user_status))
                                    <video controls class="video">
                                        <source src="{{ asset('videos/' . basename($user->user_status)) }}" type="video/mp4">
                                    </video>
                                @endif
                            @endif
                        </div>
                        <div class="col-7">
                            <h4 class="my" style="color:#d0d7db">My Status</h4><br>
                            <h5 class="my" style="margin-top:-17px;color:#8797a1">{{ $user->status_date }}</h5>
                        </div>
                        <div class="col-1">
                            <svg class="plus" style="color:#005c4b;font-weight:bolder" xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-bookmark-plus" viewBox="0 0 16 16">
                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4"/>
                            </svg>
                        </div>
                    </div>
                @endif
            @endforeach
            
                <h3 style="margin-top:50px;color:#008068;font-weight:lighter;margin-left:5px">Updates</h3>
                <hr style="width:85%;margin-left:18%">


        @foreach($otherUsers as $otherUser)
        @if(!empty($otherUser->user_status))
            <div class="row my-5 glk"   onclick="showStatus('{{ $otherUser->name }}', '{{ asset('images/' . basename($otherUser->image)) }}', '{{ $otherUser->status_date }}', '{{ asset('images/' . basename($otherUser->user_status)) }}', '{{ asset('videos/' . basename($otherUser->user_status)) }}', '{{ pathinfo($otherUser->user_status, PATHINFO_EXTENSION) }}')">
                <div class="col-2 avatar-icon mx-3">
                    @if(preg_match('/\.(jpg|jpeg|png|gif|jfif)$/i', $otherUser->user_status))
                        <img src="{{ asset('images/' . basename($otherUser->user_status)) }}" style="max-width: 100%; max-height: 100%;">
                    @elseif(preg_match('/\.(mp4|webm|ogg)$/i', $otherUser->user_status))
                        <video controls class="video" >
                            <source src="{{ asset('videos/' . basename($otherUser->user_status)) }}" type="video/mp4">
                        </video>
                    @endif
                </div>
                <div class="col-7">
                    <h4 class="my" style="color:#d0d7db">{{ $otherUser->name }}</h4><br>
                    <h5 class="my" style="margin-top:-17px;color:#8797a1">{{ $otherUser->status_date }}</h5>
                </div>
            </div>
            <hr style="width:85%;margin-left:18%">
        @endif
         
    @endforeach

            </div>

            <div style="background-color: #111b21; " class="col-lg-4 text-white " id="group">              
                <div class="row">

                            <div class="col-3 mt-4">
                                <svg id="bckgrp" class="x" style="color:#7d8d96" viewBox="0 0 24 24" height="30" width="30" preserveAspectRatio="xMidYMid meet" fill="currentColor" enable-background="new 0 0 24 24">
                                    <title>x</title>
                                    <path d="M19.6004 17.2L14.3004 11.9L19.6004 6.60005L17.8004 4.80005L12.5004 10.2L7.20039 4.90005L5.40039 6.60005L10.7004 11.9L5.40039 17.2L7.20039 19L12.5004 13.7L17.8004 19L19.6004 17.2Z"></path>
                                </svg>
                                
                            </div>

                            <div class="col-9 mt-4 mmbrs">
                                <p style="color:#ddeef0;font-size:20px;">Add Group Members</p>
                            </div>  
                            
                            
                            <div class="col-12" style="margin-top:12%;">
                                <div class="col-lg-2 col-sm-2 col-md-2">
                                    <span style="color:#8b989e" data-icon="search" class="cz">
                                        <svg  viewBox="0 0 24 24" height="40" width="40" preserveAspectRatio="xMidYMid meet" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24">
                                            <title>search</title>
                                            <path fill="currentColor" d="M15.009,13.805h-0.636l-0.22-0.219c0.781-0.911,1.256-2.092,1.256-3.386 c0-2.876-2.332-5.207-5.207-5.207c-2.876,0-5.208,2.331-5.208,5.207s2.331,5.208,5.208,5.208c1.293,0,2.474-0.474,3.385-1.255 l0.221,0.22v0.635l4.004,3.999l1.194-1.195L15.009,13.805z M10.201,13.805c-1.991,0-3.605-1.614-3.605-3.605 s1.614-3.605,3.605-3.605s3.605,1.614,3.605,3.605S12.192,13.805,10.201,13.805z"></path>
                                        </svg>
                                    </span>
                                    
                                </div>
                                <div style="padding:5px 0px 5px 0px;" class="col-lg-10 col-sm-10 col-md-10">
                                    <input style="color:white; border:none;background-color:#202c33" id="searchText" type="text" class="form-control grpsrch" name="searchText" placeholder="Search">
                                </div>
                                <hr class="hr">
                            </div>

                            <div class="col-12">

                                <div class="col-1" id="hash">
                                    <h4 class="mmbr" style="color:green">#</h4>
                                </div>
                                <div class="row d-flex flex-wrap" id="grpnone"> 

                                     <div id="user-avatar" class="col-1 avatar" >
                                     
                                     </div>

                                     <div class="col-1 nme">
                                        <p id="user-name"  style="margin-left:25px;margin-top:3px"></p>
                                     </div>

                                      

                                </div>
                            
                             <hr class="hr">
                            </div>


                            <div class="col-lg-12 mt-5">
                                <div class="row sideBar usersgrp" style="background-color: #111b21;height:550px;">
                                    @foreach ($user_messages as $single_message)
                                    <div class="row sideBar-body" data-message-id="{{ $single_message->id }}">
                                        <div style="margin-left:-22px" class="col-sm-2 col-xs-2">
                                            <div class="avatar-icon mt-4" data-user-id="{{ $single_message->id }}">
                                                @if ($single_message->image)
                                                <img src="{{ asset('images/' . $single_message->image) }}">
                                                @else
                                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-9 col-xs-9">
                                            <div class="row">
                                                <a href="#" style="text-decoration: none; color:white;">
                                                    <div class="col-sm-8 col-xs-8 sideBar-name">
                                                        <span class="name-meta v"
                                                            data-user-id="{{ $single_message->id }}"
                                                            data-user-name="{{ $single_message->name }}"
                                                            data-user-image="{{ asset('images/' . $single_message->image) }}"
                                                            data-user-backimage="{{ asset('images/' . $single_message->background_image) }}">{{ $single_message->name }}
                                                        </span>
                                                        <br>
                                                        <span class="v" style="color:#8797a1;font-size:15px;">{{ $single_message->about}}</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                              </div>

                </div>
            </div>

            <div style="background-color: #111b21; " class="col-lg-4 text-white " id="sidebar">              
                <div class="row">

                    <div class="col-lg-10 col-md-10 col-sm-10 ">
                        <h3 class="mt-5 mx-3 chat-title" style="color:#e9edf0;font-weight:bold">Chats</h3>
                        <h3 class="mt-5 mx-3 whatsapp-title" style="color:#e9edf0;font-weight:bold; display: none;">WhatsApp</h3>
                    </div>
                
                    <div class="col-lg-1 col-sm-1 col-md-1">
                        <span data-icon="new-chat-outline" class="">
                            <svg id="new" class="mt-5" style="color:#8b989e" viewBox="0 0 24 24" height="30" width="30" preserveAspectRatio="xMidYMid meet" class="" fill="none">
                                <title>new-chat-outline</title>
                                <path d="M9.53277 12.9911H11.5086V14.9671C11.5086 15.3999 11.7634 15.8175 12.1762 15.9488C12.8608 16.1661 13.4909 15.6613 13.4909 15.009V12.9911H15.4672C15.9005 12.9911 16.3181 12.7358 16.449 12.3226C16.6659 11.6381 16.1606 11.0089 15.5086 11.0089H13.4909V9.03332C13.4909 8.60007 13.2361 8.18252 12.8233 8.05119C12.1391 7.83391 11.5086 8.33872 11.5086 8.991V11.0089H9.49088C8.83941 11.0089 8.33411 11.6381 8.55097 12.3226C8.68144 12.7358 9.09947 12.9911 9.53277 12.9911Z" fill="currentColor"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M0.944298 5.52617L2.99998 8.84848V17.3333C2.99998 18.8061 4.19389 20 5.66665 20H19.3333C20.8061 20 22 18.8061 22 17.3333V6.66667C22 5.19391 20.8061 4 19.3333 4H1.79468C1.01126 4 0.532088 4.85997 0.944298 5.52617ZM4.99998 8.27977V17.3333C4.99998 17.7015 5.29845 18 5.66665 18H19.3333C19.7015 18 20 17.7015 20 17.3333V6.66667C20 6.29848 19.7015 6 19.3333 6H3.58937L4.99998 8.27977Z" fill="currentColor"></path>
                            </svg>
                        </span>                    
                    </div>

                    <div class="col-lg-1 col-sm-1 col-md-1">
                        <div class="dropdown">

                            <span  data-icon="menu" data-bs-toggle="dropdown" aria-expanded="false ">
                                <svg class="mt-5"   style="color:#8b989e" viewBox="0 0 24 24" height="30" width="30" preserveAspectRatio="xMidYMid meet" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24">
                                    <title>menu</title>
                                    <path fill="currentColor" d="M12,7c1.104,0,2-0.896,2-2c0-1.105-0.895-2-2-2c-1.104,0-2,0.894-2,2C10,6.105,10.895,7,12,7z M12,9c-1.104,0-2,0.894-2,2c0,1.104,0.895,2,2,2c1.104,0,2-0.896,2-2C13.999,9.895,13.104,9,12,9z M12,15c-1.104,0-2,0.894-2,2c0,1.104,0.895,2,2,2c1.104,0,2-0.896,2-2C13.999,15.894,13.104,15,12,15z"></path>
                                </svg>
                            </span>                           
                            <ul class="dropdown-menu ">
                                <li><a id="newgrp" class="dropdown-item mt-3  text-white " href="#">New Group</a></li>
                                <li><a class="dropdown-item my-3 text-white " href="#">Archived</a></li>
                                <li><a class="dropdown-item  text-white " href="#">Select Chats</a></li>
                                <li><a class="dropdown-item my-3 text-white " href="#">Logout</a></li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
                    <div class="row">

                        <div style="background-color:#202c33;border-radius:10px;padding:5px 0px 5px 0px" class="col-lg-11 col-md-11 col-sm-11 ">
                            <div class="row">

                                <div class="col-lg-2 col-sm-2 col-md-2">
                                    <span style="color:#8b989e" data-icon="search" class="">
                                        <svg viewBox="0 0 24 24" height="40" width="40" preserveAspectRatio="xMidYMid meet" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24">
                                            <title>search</title>
                                            <path fill="currentColor" d="M15.009,13.805h-0.636l-0.22-0.219c0.781-0.911,1.256-2.092,1.256-3.386 c0-2.876-2.332-5.207-5.207-5.207c-2.876,0-5.208,2.331-5.208,5.207s2.331,5.208,5.208,5.208c1.293,0,2.474-0.474,3.385-1.255 l0.221,0.22v0.635l4.004,3.999l1.194-1.195L15.009,13.805z M10.201,13.805c-1.991,0-3.605-1.614-3.605-3.605 s1.614-3.605,3.605-3.605s3.605,1.614,3.605,3.605S12.192,13.805,10.201,13.805z"></path>
                                        </svg>
                                    </span>
                                    
                                </div>
                                <div style="padding:5px 0px 5px 0px;margin-left:-20px" class="col-lg-10 col-sm-10 col-md-10">
                                    <input style="color:white; border:none;background-color:#202c33" id="searchText" type="text" class="form-control" name="searchText" placeholder="Search">
                                </div>

                            </div> 
                        </div>

                        <div class="col-lg-1 col-md-1 col-sm-1">
                            <span data-icon="filter" class="">
                                <svg class="mt-3" style="color:#8b989e" viewBox="0 0 24 24" height="30" width="30" preserveAspectRatio="xMidYMid meet" fill="none">
                                    <title>filter</title>
                                    <path d="M11 18C10.7167 18 10.4792 17.9042 10.2875 17.7125C10.0958 17.5208 10 17.2833 10 17C10 16.7167 10.0958 16.4792 10.2875 16.2875C10.4792 16.0958 10.7167 16 11 16H13C13.2833 16 13.5208 16.0958 13.7125 16.2875C13.9042 16.4792 14 16.7167 14 17C14 17.2833 13.9042 17.5208 13.7125 17.7125C13.5208 17.9042 13.2833 18 13 18H11ZM7 13C6.71667 13 6.47917 12.9042 6.2875 12.7125C6.09583 12.5208 6 12.2833 6 12C6 11.7167 6.09583 11.4792 6.2875 11.2875C6.47917 11.0958 6.71667 11 7 11H17C17.2833 11 17.5208 11.0958 17.7125 11.2875C17.9042 11.4792 18 11.7167 18 12C18 12.2833 17.9042 12.5208 17.7125 12.7125C17.5208 12.9042 17.2833 13 17 13H7ZM4 8C3.71667 8 3.47917 7.90417 3.2875 7.7125C3.09583 7.52083 3 7.28333 3 7C3 6.71667 3.09583 6.47917 3.2875 6.2875C3.47917 6.09583 3.71667 6 4 6H20C20.2833 6 20.5208 6.09583 20.7125 6.2875C20.9042 6.47917 21 6.71667 21 7C21 7.28333 20.9042 7.52083 20.7125 7.7125C20.5208 7.90417 20.2833 8 20 8H4Z" fill="currentColor"></path>
                                </svg>
                            </span>                           
                        </div>

                        <div class="col-lg-12 mt-3">
                        <div class="row sideBar" style="background-color: #111b21;height:730px; ">

                            @foreach ($groupChats as $group_chat)
    <div class="row sideBar-body" data-group-id="{{ $group_chat->id }}">
        <div style="margin-left:-22px" class="col-sm-2 col-xs-2">
            <div class="avatar-icon mt-4" data-user-id="{{ $group_chat->id }}">
                @if ($group_chat->group_image)
                <img  src="{{ asset('images/' . $group_chat->group_image) }}">
                @else
               <img src="https://bootdey.com/img/Content/avatar/avatar6.png">
                @endif
            </div>
        </div>
        <div class="col-sm-10 col-xs-10">
            <div class="row">
                <a href="#" style="text-decoration: none; color:white;">
                    <div class="col-sm-8 col-xs-8 sideBar-name">
                        <span class="name-meta group-chat-link v"  
                            data-user-image="{{ asset('images/' . $group_chat->group_image) }}" 
                            data-group-id="{{ $group_chat->id }}"
                            data-group-name="{{ $group_chat->group_name }}">
                            
                            {{ $group_chat->group_name }}
                        </span>
                        <br>
                        <span class="v" id="message" style="color:#8797a1;font-size:15px;">
                            {{ $group_chat->lastMessageComments->message ?? '' }}
                        </span>
                    </div>
                    <div class="col-sm-4 col-xs-4 mt-5 sideBar-time pull-right">
                        <span class="time-meta text-white pull-right">
                            {{ $group_chat->lastMessageComments ? $group_chat->lastMessageComments->created_at->diffForHumans() : '' }}
                        </span>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endforeach

                            @foreach ($user_messages as $single_message)
                            <div   class="row sideBar-body " data-message-id="{{ $single_message->id }}">
                                <div style="margin-left:-22px" class="col-sm-2 col-xs-2">
                                    <div class="avatar-icon mt-4" data-user-id="{{ $single_message->id }}">
                                        @if ($single_message->image)
                                        <img  src="{{ asset('images/' . $single_message->image) }}">
                                        @else
                                       <img src="https://bootdey.com/img/Content/avatar/avatar6.png">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-10 col-xs-10">
                                    <div class="row">
                                        <a href="#" style="text-decoration: none; color:white;">
                                            <div class="col-sm-8 col-xs-8 sideBar-name">
                                                
                                <span class="name-meta user-chat-link v" 
                                 data-user-id="{{ $single_message->id }}" data-user-name="{{ $single_message->name }}" 
                                 data-user-image="{{ asset('images/' . $single_message->image) }}" 
                                 data-user-backimage="{{ asset('images/' . $single_message->background_image) }}">{{ $single_message->name }}
                                </span>
                                 <br>

                                <span class="v" id="message" style="color:#8797a1;font-size:15px;">{{ $single_message->lastMessageComments->message ?? '' }}</span>
                                </div>
                                            <div class="col-sm-4 col-xs-4 mt-5 sideBar-time pull-right">
                                                <span class="time-meta text-white pull-right ">{{ $single_message->lastMessageComments ? $single_message->lastMessageComments->created_at->diffForHumans() : '' }}</span>
                                            </div>
                                        </a>
                                </div>
                              </div> 
                            </div>
                           @endforeach   
                           
                           
                        </div>
                      </div>
                   </div>              
                 </div>                   
               </div>

            
    
            <div id="div3" class="col-lg-7   conversation   text-white three ">

                <div class="row b" style="width:107.3%;margin-left:1px">
                                            
                    <div class="col-lg-12 col-md-12 col-sm-12" style="background-color: #202c33;padding:5px 10px 5px 0px">
                        <div class="row">

                            @if (count($user_messages) > 0)
                            <div class="col-lg-1 col-md-1 col-sm-1 userimage">
                                <img id="selected-user-image" class="icon1 mx-4" src="{{ asset('images/' . $user_messages[0]->image) }}" alt="User Image">
                            </div>

                            @if (count($groupChatss) > 0)
                            <div class="col-lg-1 col-md-1 col-sm-1 groupimage" style="display: none"  >
                                <img id="selected-group-image" class="icon1 mx-4" src="{{ asset('images/' . $groupChatss[0]->image) }}" alt="Group Image">
                            </div>
                            @else
                            
                            @endif
                            
                            <div class="col-lg-8 col-md-8 col-sm-8 mt-2">
                                <a class="heading-name-meta v  usr" id="selected-user-name" data-user-id="{{ $user_messages[0]->id }}" style="color:#dfe3e6; margin-top:1%;font-size:20px;text-decoration:none;">
                                    {{ $user_messages[0]->name }}
                                    <br>
                                </a>

                                @if (count($groupChatss) > 0)
                                <a class="group-name-meta v groupp" id="selected-group-name" data-user-id="{{ $groupChatss[0]->id }}" style="color:#dfe3e6; margin-top:1%;font-size:20px;text-decoration:none;display:none">
                                    {{ $groupChatss[0]->name }}
                                    <br>
                                </a>
                                @else
                                
                                @endif

                                <div class="v" id="typing" style="display: none;color:white;font-weight:bolder">typing...</div>
                                <div class="last v" id="last-seen" style="font-size: 0.9em; color: grey;"></div>
                                
                                <i class="fa fa-arrow-left  d-sm-block d-md-none" aria-hidden="true" id="goBackIcon" style="color:#aebbc2; cursor: pointer;"></i>
                            </div> 

                            @else
                             
                            @endif
                            
                            <div class="col-lg-1 col-md-1 col-sm-1" >
                                <div class="row">

                                    <div class="col-lg-6 col-md-6 col-sm-6 svg1">
                                <span data-icon="video-call" class="x1w0mnb">
                                    <svg id="svg1" class="s1" style="color:#4d5d66"  viewBox="0 0 24 24" height="30" width="40" preserveAspectRatio="xMidYMid meet" fill="none">
                                        <title>video-call</title>
                                        <path d="M3.27096 7.31042C3 7.82381 3 8.49587 3 9.84V14.16C3 15.5041 3 16.1762 3.27096 16.6896C3.5093 17.1412 3.88961 17.5083 4.35738 17.7384C4.88916 18 5.58531 18 6.9776 18H13.1097C14.502 18 15.1982 18 15.7299 17.7384C16.1977 17.5083 16.578 17.1412 16.8164 16.6896C17.0873 16.1762 17.0873 15.5041 17.0873 14.16V9.84C17.0873 8.49587 17.0873 7.82381 16.8164 7.31042C16.578 6.85883 16.1977 6.49168 15.7299 6.26158C15.1982 6 14.502 6 13.1097 6H6.9776C5.58531 6 4.88916 6 4.35738 6.26158C3.88961 6.49168 3.5093 6.85883 3.27096 7.31042Z" fill="currentColor"></path>
                                        <path d="M18.7308 9.60844C18.5601 9.75994 18.4629 9.97355 18.4629 10.1974V13.8026C18.4629 14.0264 18.5601 14.2401 18.7308 14.3916L20.9567 16.3669C21.4879 16.8384 22.3462 16.4746 22.3462 15.778V8.22203C22.3462 7.52542 21.4879 7.16163 20.9567 7.63306L18.7308 9.60844Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 svg2">
                                <span data-icon="chevron-down-alt" class="">
                                    <svg class="mx-5" id="SVG2"  style="color:#4d5d66;margin-top:22px" viewBox="0 0 17 13" height="15" preserveAspectRatio="xMidYMid meet" version="1.1" x="0px" y="0px" enable-background="new 0 0 17 13">
                                        <title>chevron-down-alt</title>
                                        <path fill="currentColor" d="M3.202,2.5l5.2,5.2l5.2-5.2l1.5,1.5l-6.7,6.5l-6.6-6.6L3.202,2.5z"></path>
                                    </svg>
                                </span>
                                    </div>
                                
                                </div>                               
                            </div>

                            <div class="col-lg-1 col-md-1 col-sm-1 mt-4 svg3">
                                <span style="color:#8b989e;" data-icon="search-alt">
                                    <svg class="s2" id="searchSvg" viewBox="0 0 24 24" height="30" width="30" preserveAspectRatio="xMidYMid meet" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24">
                                        <title>search-alt</title>
                                        <path fill="currentColor" d="M15.9,14.3H15L14.7,14c1-1.1,1.6-2.7,1.6-4.3c0-3.7-3-6.7-6.7-6.7S3,6,3,9.7 s3,6.7,6.7,6.7c1.6,0,3.2-0.6,4.3-1.6l0.3,0.3v0.8l5.1,5.1l1.5-1.5L15.9,14.3z M9.7,14.3c-2.6,0-4.6-2.1-4.6-4.6s2.1-4.6,4.6-4.6 s4.6,2.1,4.6,4.6S12.3,14.3,9.7,14.3z"></path>
                                    </svg>
                                </span>
                                
                            </div>

                            <div class="col-lg-1 col-md-1 col-sm-1 mt-4">
                            <span data-icon="menu" class="xr9ek0c" data-icon="menu" data-bs-toggle="dropdown" aria-expanded="false ">
                                <svg class="svg4" id="menu"  style="color:#8b989e;" viewBox="0 0 24 24" height="30" width="30" preserveAspectRatio="xMidYMid meet" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24">
                                    <title>menu</title>
                                    <path fill="currentColor" d="M12,7c1.104,0,2-0.896,2-2c0-1.105-0.895-2-2-2c-1.104,0-2,0.894-2,2 C10,6.105,10.895,7,12,7z M12,9c-1.104,0-2,0.894-2,2c0,1.104,0.895,2,2,2c1.104,0,2-0.896,2-2C13.999,9.895,13.104,9,12,9z M12,15 c-1.104,0-2,0.894-2,2c0,1.104,0.895,2,2,2c1.104,0,2-0.896,2-2C13.999,15.894,13.104,15,12,15z"></path>
                                </svg>
                            </span>
                            <ul class="dropdown-menu">
                               <li><a  class="dropdown-item mt-3 text-white wallpaper" href="#">Wallpaper</a></li>
                                <li><a class="dropdown-item my-3 text-white" href="#">Archived</a></li>
                                <li><a class="dropdown-item  text-white" href="#">Select Chats</a></li>
                                <li><a class="dropdown-item my-3 text-white" href="#">Logout</a></li>
                            </ul>
                            </div>
                            

                            
                            
                        </div>
                    </div>

                   
                    
                    <div id="message" class="row message" style="height:510px;width:100%">
                        <div class="col-lg-12 col-sm-12 conversation">
                            <div id="chat-content" style=" height: calc(160% - 120px); overflow-y: auto; width: 102%">

                               
                        
                            </div>

                            <div class="container-fluid emojis" style="position: absolute;background-color:#202c33;height:440px;display:none ">
                                <div class="row">

                                    <div class="col-12" style="background-color:">
                                        <div class="row">

                                            <div class="col-1">
                                                <svg id="emoji1" class="tmesvg" style="color:#8797a1" viewBox="0 0 24 24" height="30" width="30" preserveAspectRatio="xMidYMid meet" class="" version="1.1"><title>panel-recent</title><path d="M20.5378905,11.9748276 C20.5378905,7.24555819 16.704097,3.41176471 11.9748276,3.41176471 C7.24555819,3.41176471 3.41176471,7.24555819 3.41176471,11.9748276 C3.41176471,16.704097 7.24555819,20.5378905 11.9748276,20.5378905 C16.704097,20.5378905 20.5378905,16.704097 20.5378905,11.9748276 Z M21.9496552,11.9748276 C21.9496552,17.4837931 17.4837931,21.9496552 11.9748276,21.9496552 C6.46586207,21.9496552 2,17.4837931 2,11.9748276 C2,6.46586207 6.46586207,2 11.9748276,2 C17.4837931,2 21.9496552,6.46586207 21.9496552,11.9748276 Z M12.1176471,6.70588235 L12.1176471,12.396898 L16.5044771,15.0244548 C16.8389217,15.2247753 16.9476508,15.6582881 16.7473302,15.9927327 C16.5470097,16.3271773 16.1134969,16.4359063 15.7790523,16.2355858 L10.7058824,13.1969356 L10.7058824,6.70588235 C10.7058824,6.31603429 11.0219166,6 11.4117647,6 C11.8016128,6 12.1176471,6.31603429 12.1176471,6.70588235 Z" fill="currentColor" fill-rule="nonzero"></path></svg>
                                                
                                            </div>

                                            <div class="col-1" >
                                                <svg id="emoji2" class="tmesvg2" style="color:#8797a1" viewBox="0 0 24 24" height="30" width="30" preserveAspectRatio="xMidYMid meet" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24">
                                                    <title>panel-emoji-people</title>
                                                    <path fill="currentColor" d="M12,22.1C6.4,22.1,1.9,17.6,1.9,12S6.4,1.9,12,1.9S22.1,6.4,22.1,12S17.6,22.1,12,22.1z M12,3.5 c-4.7,0-8.5,3.8-8.5,8.5s3.8,8.5,8.5,8.5s8.5-3.8,8.5-8.5S16.7,3.5,12,3.5z"></path>
                                                    <path fill="currentColor" d="M8.9,11.6c0.7,0,1.3-0.7,1.3-1.5S9.6,8.6,8.9,8.6s-1.3,0.7-1.3,1.5C7.6,10.9,8.2,11.6,8.9,11.6z"></path>
                                                    <path fill="currentColor" d="M17.1,13.6c-1.1,0.1-3,0.4-5,0.4s-4-0.3-5-0.4c-0.4,0-0.6,0.3-0.4,0.7c1.1,2,3.1,3.5,5.5,3.5 c2.3,0,4.4-1.5,5.5-3.5C17.8,14,17.5,13.6,17.1,13.6z M12.3,16c-2.6,0-4.1-1-4.2-1.6c0,0,4.4,0.9,8,0C16.1,14.4,15.6,16,12.3,16z"></path>
                                                    <path fill="currentColor" d="M15.1,11.6c0.7,0,1.3-0.7,1.3-1.5s-0.6-1.5-1.3-1.5s-1.3,0.7-1.3,1.5C13.8,10.9,14.4,11.6,15.1,11.6z"></path>
                                                </svg>
                                                
                                            </div>


                                            <div class="col-1" id="emojii3">
                                                <svg id="emojii3" class="tmesvg3" style="color:#8797a1" viewBox="0 0 24 24" height="30" width="30" preserveAspectRatio="xMidYMid meet" class="" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24"><title>panel-emoji-nature</title><path fill="currentColor" d="M7.2,12.2c0.608,0,1.1,0.627,1.1,1.4S7.808,15,7.2,15s-1.1-0.627-1.1-1.4S6.592,12.2,7.2,12.2z M16.9,12.2 c0.608,0,1.1,0.627,1.1,1.4S17.508,15,16.9,15s-1.1-0.627-1.1-1.4S16.292,12.2,16.9,12.2z M21.5,11.1c-0.3-0.6-0.7-1.4-1.2-2.4 c0.9-0.4,1.7-1.3,2-2.2c0.3-0.7,0.4-2.1-1-3.5l0,0c-1-0.9-2-1.2-2.9-1c-1.1,0.3-1.9,1.2-2.3,1.9c-1.4-0.7-2.9-0.8-4.1-0.8 c-1.5,0-2.8,0.3-4,0.9C7.5,3.1,6.8,2.2,5.7,1.9c-1-0.2-2,0.1-2.9,1l0,0c-1,1-1.4,2.2-1,3.4c0.4,1.1,1.2,1.9,2,2.3 c-0.2,0.5-0.4,1-0.6,1.6L3,10.4c-0.3,0.7-0.5,1.3-0.8,1.9c-0.4,1-0.9,1.9-0.9,3.1c0,1.6,0.8,6.7,10.5,6.7c3.8,0,6.6-0.7,8.5-2.2 s2.2-3.4,2.2-4.3C22.7,13.5,22.3,12.7,21.5,11.1z M18.8,3.5c0.4-0.1,0.9,0.1,1.5,0.6c0.6,0.6,0.8,1.2,0.6,1.8 c-0.2,0.6-0.7,1.1-1.2,1.3c-0.6-1.2-1.3-2-2.1-2.6C17.8,4.2,18.2,3.6,18.8,3.5z M3.3,5.9c-0.2-0.6,0-1.2,0.6-1.8 C4.4,3.6,5,3.4,5.4,3.5c0.5,0.1,1.1,0.7,1.3,1.2C5.8,5.4,5.1,6.2,4.5,7.3C4,7,3.4,6.5,3.3,5.9z M21.1,15.6c0,0.7-0.2,2-1.6,3.1 c-1.5,1.2-4.1,1.8-7.5,1.8c-8.3,0-8.9-3.9-8.9-5.1c0-0.8,0.3-1.5,0.7-2.4c0.3-0.6,0.6-1.2,0.8-2.1l0.1-0.2c0.5-1.5,2-6.2,7.3-6.2 c1.2,0,2.5,0.2,3.7,0.9c0.1,0.1,0.5,0.3,0.5,0.3c0.9,0.7,1.7,1.7,2.4,3.2c0.6,1.3,1,2.2,1.4,2.9C20.8,13.4,21.1,13.9,21.1,15.6z  M14.6,17c-0.1,0.1-0.6,0.4-1.2,0.3c-0.4-0.1-0.7-0.3-0.9-0.8c0-0.1-0.1-0.1-0.1-0.2c0.8-0.1,1.3-0.6,1.3-1.3S13,15,12,15 c-0.9,0-1.7-0.7-1.7,0c0,0.6,0.6,1.2,1.4,1.3l-0.1,0.1c-0.3,0.4-0.5,0.7-0.9,0.8c-0.5,0.1-1.1-0.1-1.3-0.3c-0.2-0.2-0.5-0.1-0.7,0.1 s-0.1,0.5,0.1,0.7c0.1,0.1,0.8,0.5,1.6,0.5c0.2,0,0.4,0,0.5-0.1c0.4-0.1,0.8-0.3,1.1-0.7c0.4,0.4,0.9,0.6,1.2,0.7 c0.8,0.2,1.7-0.2,2-0.5c0.2-0.2,0.2-0.5,0-0.7C15.1,16.9,14.8,16.8,14.6,17z"></path></svg>
                                                
                                            </div>


                                            <div class="col-1">
                                                <svg id="emoji4" class="tmesvg4" style="color:#8797a1" viewBox="0 0 24 24" height="30" width="30" preserveAspectRatio="xMidYMid meet" class="" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24"><title>panel-emoji-food</title><path fill="currentColor" d="M7.4,11.4L7.4,11.4c-0.4,0-0.8,0.4-0.8,0.8V14c0,0.4,0.4,0.8,0.8,0.8l0,0c0.4,0,0.8-0.4,0.6-0.8v-1.8 C8,11.6,7.8,11.4,7.4,11.4z"></path><path fill="currentColor" d="M4.6,10.4c-0.4,0-0.8,0.4-0.8,0.8V15c0,0.4,0.4,0.8,0.8,0.8s0.8-0.4,0.8-0.8v-3.8C5.4,10.6,5,10.4,4.6,10.4z "></path><path fill="currentColor" d="M23,7.2c-0.6-0.6-1.6-0.8-2.8-0.6c-0.2,0-0.4,0.2-0.6,0.2V4.2C19.6,3.6,19,3,18.4,3h-17 C0.8,3,0.2,3.6,0.2,4.2v7.4c0,5.4,3.2,9.6,8.4,9.6h2.2c4.2,0,7-2.6,8-6H19h0.2c2.2-0.4,4-2.6,4.4-4.8C24,9,23.8,8,23,7.2z M18.2,4.4 v3H1.6v-3H18.2z M11,19.8H8.8c-5.2,0-7-4.4-7-8.2V8.8h16.6v2.8C18.2,15.6,16,19.8,11,19.8z M19.4,13.6c0.2-0.6,0.2-1.4,0.2-2V8.4 C20,8.2,20.2,8,20.6,8c0.6-0.2,1.2,0,1.4,0.4c0.4,0.4,0.6,1,0.4,1.8C22.2,11.6,20.8,13.2,19.4,13.6z"></path></svg>
                                                
                                            </div>

                                            <div class="col-1">
                                            <svg id="emoji5" class="tmesvg5" style="color:#8797a1" viewBox="0 0 24 24" height="30" width="30" preserveAspectRatio="xMidYMid meet" class="" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24"><title>panel-emoji-activity</title><path fill="currentColor" d="M14.8,15.3l1.3-3.8c0.1-0.2,0-0.5-0.2-0.6l-3.3-2.4c-0.2-0.1-0.5-0.1-0.6,0l-3.3,2.4 c-0.2,0.1-0.3,0.4-0.2,0.6l1.3,3.8c0.1,0.2,0.3,0.4,0.5,0.4h4C14.5,15.7,14.7,15.5,14.8,15.3z"></path><path fill="currentColor" d="M12,1.9C6.4,1.9,1.9,6.4,1.9,12S6.4,22.1,12,22.1S22.1,17.6,22.1,12S17.6,1.9,12,1.9z M9.8,20.3 c0.1-0.2,0.1-0.4,0-0.6l-1.4-2.3c-0.1-0.1-0.2-0.2-0.4-0.3l-2.5-0.6c-0.2-0.1-0.5,0.1-0.6,0.2c-0.9-1.3-1.4-2.9-1.5-4.5 c0.2,0,0.4,0,0.5-0.2l1.7-2c0.1,0,0.2-0.2,0.2-0.3L5.5,7.1c0-0.2-0.1-0.3-0.3-0.4C6.2,5.4,7.5,4.5,9,4c0,0.1,0.2,0.3,0.3,0.3 l2.5,1.1c0.1,0.1,0.3,0.1,0.4,0l2.5-1.1C14.8,4.2,14.9,4.1,15,4c1.5,0.6,2.7,1.5,3.7,2.7c-0.1,0.1-0.2,0.2-0.2,0.4l-0.2,2.6 c0,0.2,0,0.3,0.1,0.4l1.7,2c0.1,0.1,0.3,0.2,0.4,0.2c0,1.6-0.5,3.1-1.3,4.4c-0.1-0.1-0.2-0.1-0.4-0.1l-2.5,0.6 c-0.1,0-0.3,0.1-0.4,0.3l-1.4,2.3c-0.1,0.2-0.1,0.3,0,0.5c-0.8,0.2-1.6,0.4-2.5,0.4C11.3,20.6,10.5,20.5,9.8,20.3z"></path></svg>
                                            </div>


                                            <div class="col-1">
                                                <svg id="emoji6"  class="tmesvg6" style="color:#8797a1" viewBox="0 0 24 24" height="30" width="30" preserveAspectRatio="xMidYMid meet" class="" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24"><title>panel-emoji-travel</title><path fill="currentColor" d="M21.5,11.5c0-0.7-0.1-1.4-0.3-2l-1.5-4.3C19.2,3.9,18,3,16.6,3H7.3C5.9,3,4.7,3.9,4.2,5.2L2.6,9.9 c-0.1,0.4-0.2,0.7-0.2,1.1v1.2l0,0v7.4c0,0.6,0.5,1.1,1.1,1.1h1.1c0.6,0,1.1-0.5,1.1-1.1v-1.1h12.7v1.1c0,0.6,0.5,1.1,1.1,1.1h1.1 c0.6,0,1.1-0.5,1.1-1.1v-7.4l0,0L21.5,11.5L21.5,11.5z M4.1,10.4l1.6-4.7C5.9,5,6.6,4.5,7.4,4.5h9.2c0.7,0,1.4,0.5,1.6,1.2l1.5,4.3 c0.1,0.3,0.2,0.6,0.2,0.8H4C3.9,10.7,4,10.5,4.1,10.4z M5.5,16.1c-0.8,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5S7,13.8,7,14.6 C6.9,15.4,6.3,16.1,5.5,16.1z M14.9,15.5H9.3c-0.5,0-1-0.4-1-1c0-0.5,0.4-1,1-1h5.6c0.5,0,1,0.4,1,1C15.8,15.1,15.4,15.5,14.9,15.5z  M18.6,16.1c-0.8,0-1.5-0.7-1.5-1.5s0.7-1.5,1.5-1.5s1.5,0.7,1.5,1.5C20.1,15.4,19.4,16.1,18.6,16.1z"></path></svg>
                                            </div>


                                            <div class="col-1">
                                            <svg id="emoji7" class="tmesvg7" style="color:#8797a1" viewBox="0 0 24 24" height="30" width="30" preserveAspectRatio="xMidYMid meet" class="" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24"><title>panel-emoji-objects</title><path fill="currentColor" d="M18.8,6.7c-0.9-2.6-3.2-4.6-6-4.9c-0.3,0-0.5,0-0.8,0h0c-0.3,0-0.5,0-0.8,0C8.4,2.1,6.1,4,5.2,6.7 c-1,3,0.1,6.2,2.7,8H8c0.2,0.1,0.3,0.4,0.3,0.6v2c0,0.8,0.6,1.4,1.4,1.4h4.5h0.1c0.8,0,1.4-0.6,1.4-1.4v-2c0-0.2,0.1-0.5,0.3-0.6 l0.1-0.1C18.6,12.8,19.7,9.6,18.8,6.7z M15.3,13.6l-0.1,0.1c-0.5,0.4-0.9,1-0.9,1.7v2c0,0,0,0.1-0.1,0.1c0,0,0,0-0.1,0H9.8 c0,0-0.1,0-0.1-0.1v-2c0-0.7-0.3-1.3-0.9-1.7l-0.1-0.1c-2-1.4-3-4-2.2-6.5C7.2,5,9.1,3.4,11.4,3.2c0.2,0,0.4,0,0.6,0h0.1 c0.2,0,0.4,0,0.6,0c2.2,0.2,4.2,1.8,4.9,3.9C18.3,9.5,17.4,12.1,15.3,13.6z"></path><path fill="currentColor" d="M9.2,21.2c0,0.6,0.5,1,1,1h3.7c0.6,0,1-0.5,1-1v-1H9.2V21.2L9.2,21.2z"></path><path fill="currentColor" d="M13.6,10.5c-0.4,0-0.8,0.3-0.8,0.8c0,0.1,0,0.2,0.1,0.3c-0.2,0.3-0.5,0.5-0.8,0.5s-0.6-0.2-0.8-0.5 c0-0.1,0.1-0.2,0.1-0.3c0-0.4-0.3-0.8-0.8-0.8c-0.4,0-0.8,0.3-0.8,0.8c0,0.4,0.3,0.7,0.7,0.8c0.3,0.4,0.7,0.7,1.1,0.8V15 c0,0.2,0.2,0.4,0.4,0.4s0.4-0.2,0.4-0.4v-2.1c0.4-0.1,0.8-0.4,1.1-0.8l0,0c0.4,0,0.8-0.3,0.8-0.8C14.3,10.8,14,10.5,13.6,10.5z"></path></svg>
                                             
                                            </div>


                                            <div class="col-1">
                                                <svg id="emoji8"  class="tmesvg8" style="color:#8797a1" viewBox="0 0 24 24" height="30" width="30" preserveAspectRatio="xMidYMid meet" class="" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24"><title>panel-emoji-flags</title><path fill="currentColor" d="M5.5,3.8V3.6c0-0.3-0.2-0.5-0.5-0.5H4.5C4.2,3.1,4,3.3,4,3.6V21c0,0.3,0.2,0.5,0.5,0.5H5 c0.3,0,0.5-0.2,0.5-0.5v-6.2c5,1.8,9.3-2.7,14.5,0.6c0-5.6,0-5.6,0-11.3C14.9,1,10.3,5.6,5.5,3.8z M15.8,12.6 c-1.4,0-2.8,0.3-4.1,0.6c-1.2,0.3-2.4,0.5-3.5,0.5c-0.9,0-1.8-0.2-2.6-0.5V5.4c0.8,0.2,1.5,0.3,2.3,0.3c1.5,0,2.9-0.4,4.3-0.7 c1.3-0.3,2.5-0.6,3.8-0.6c0.9,0,1.7,0.2,2.5,0.5V13C17.6,12.8,16.7,12.6,15.8,12.6z"></path></svg>

                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-12 my-5">

                                        <input   style="background-color: #222e36; margin-top:5px; border:none; border-radius:10px; width:100%; color:white; padding:30px 0px 30px 10px;" type="text"   autocomplete="off" chat-box class="form-control" placeholder="Search Emoji">
                                        
                                    </div>


                                    <div class="container-fluid mt-2 emojiscrollbar" style="height: 250px; overflow-y: auto;">
                                        <div class="row">



                                            <div class="col-12">
                                                <p style="color:#677882;font-size:15px" >Recent</p>                                            
                                            </div>

                                            <div class="col-12">
                                                 <div class="row">

                                                    <div class="col-1">
                                                        <img id="recent" class="showemojis my-2 no-bg" src="{{ asset('emoji1.jfif') }}" alt="Emoji 1">
                                                    </div>
                                                                                                

                                                 </div>                                            
                                            </div>




                                            <div class="col-12 mt-5">
                                                <p style="color:#677882;font-size:15px" >Smileys & People</p>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                   @foreach($emojis as $emoji)

                                                   <div class="col-1">
                                                    <img id="smileyy" class="showemojis my-2" src="{{ asset('emojis/smileys/' . basename($emoji->smileys)) }}"/>
                                                </div>
                                                @endforeach
                                                

                                                     
                                                    
                                                </div>
                                            </div>



                                            <div class="col-12 mt-5">
                                                <p style="color:#677882;font-size:15px" >Animals & Nature</p>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">

                                                    @foreach($emojis as $emoji)
                                                    <div class="col-1" id="animalll">
                                                        <img id="animalll" class="showemojis my-2" src="{{ asset('emojis/animals/' . basename($emoji->animals)) }}" >
                                                    </div>
                                                    @endforeach
                                                   
                                                  

                                                </div>
                                            </div>


                                            <div class="col-12 mt-5">
                                                <p style="color:#677882;font-size:15px" >Food & Drink</p>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">

                                                    @foreach($emojis as $emoji)
                                                    <div class="col-1">
                                                        <img id="food" class="showemojis my-2" src="{{ asset('emojis/food/' . basename($emoji->food)) }}" >
                                                    </div>
                                                    @endforeach


                                                    
                                                    

                                                </div>
                                            </div>



                                            <div class="col-12 mt-5">
                                                <p style="color:#677882;font-size:15px" >Activity</p>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">

                                                    @foreach($emojis as $emoji)
                                                    <div class="col-1">
                                                        <img id="activity" class="showemojis my-2" src="{{ asset('emojis/activity/' . basename($emoji->activity)) }}" >
                                                    </div>
                                                    @endforeach
                                                    
                                                     
                                                  

                                                </div>
                                            </div>

                                            <div class="col-12 mt-5">
                                                <p style="color:#677882;font-size:15px" >Travel & Places</p>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">

                                                    @foreach($emojis as $emoji)
                                                    <div class="col-1">
                                                        <img id="travel" class="showemojis my-2" src="{{ asset('emojis/travel/' . basename($emoji->travel)) }}" >
                                                    </div>
                                                    @endforeach
                                                    
                                                  

                                                </div>
                                            </div>


                                            <div class="col-12 mt-5">
                                                <p style="color:#677882;font-size:15px" >Objects</p>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">

                                                    @foreach($emojis as $emoji)
                                                    <div class="col-1">
                                                        <img id="objects" class="showemojis my-2" src="{{ asset('emojis/objects/' . basename($emoji->objects)) }}" >
                                                    </div>
                                                    @endforeach
                                                   
                                                  

                                                </div>
                                            </div>




                                            <div class="col-12 mt-5">
                                                <p style="color:#677882;font-size:15px" >Flags</p>
                                            </div>

                                            <div class="col-12">
                                                <div class="row">
                                                    @foreach($emojis as $emoji)

                                                    <div class="col-1">
                                                        <img id="flags" class="showemojis my-2" src="{{ asset('emojis/flags/' . basename($emoji->flags)) }}" >
                                                    </div>
                                                    @endforeach
                                                   
                                                  
                                                  
 
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                             
                    

                            <div id="chat-grpcontent"  style="display:none; height: calc(150% - 120px); overflow-y: auto;width:102%">          
                               
                            </div>

                            <div id="pdf" style="margin-top: -740px;margin-left:5%">
                                
                                     
                            </div>

                           

                            <form id="myForm" class="form-group">
                                <div id="reply" class="container-fluid" style="margin-top:-21px;margin-left:5px;background-color:#202c33;width:102%">
                                    <div class="row">
                                        <div class="col-1" style="background-color:#52bdeb;width:1%;border-radius:5px 0px 0px 5px;">
                                            <p style="display: none">nn</p>
                                        </div>
                                        <div class="col-10 co" style="background-color: #111b21; height:110px;padding:15px 0px 0px 20px;border-radius:0px 10px 10px 0px;width:90%">
                                            @if (count($user_messages) > 0)
                                            <h5><i style="color: #52bdde"> {{ $user_messages[0]->name }}</i></h5>
                                            @endif
                                            <p class="replygrpmsg" id="reply-message" style="color:#9fa4a6"></p>
                                        </div>
                                        <div class="col-1">
                                            <svg id="hideReply" style="color: #8797a1;margin-top:30px;margin-left:20px" viewBox="0 0 24 24" height="40" width="40" preserveAspectRatio="xMidYMid meet" class="" fill="currentColor" enable-background="new 0 0 24 24">
                                                <title>x</title>
                                                <path d="M19.6004 17.2L14.3004 11.9L19.6004 6.60005L17.8004 4.80005L12.5004 10.2L7.20039 4.90005L5.40039 6.60005L10.7004 11.9L5.40039 17.2L7.20039 19L12.5004 13.7L17.8004 19L19.6004 17.2Z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>

                    <div style="margin-top:224px; background-color:#202c33;" class="col-lg-12">

                            <input type="hidden" id="message_id" name="message_id" value="{{$message_info->id}}">

                            <input type="hidden" name="reply_message_content" id="replyMessage">

                             

                            <input id="image-upload" type="file" style="display: none;" multiple>
                            <input id="image" type="hidden" name="image">

                            <input id="video-upload" type="file" style="display: none;" accept="video/*">
                            <input id="video" type="hidden" name="video">

                            <input style="display: none" type="file" id="pdf-upload" name="pdf" accept="application/pdf">
                            <input id="pdfupload" type="hidden" name="pdf">


                            <input type="hidden" id="uniqueTimestamp" name="uniquetimestamp" value="">
                            <input type="hidden" id="groupUnixTimestamp" name="groupUnixTimestamp" value="">

                            

                            <input type="file" id="file-input" style="display: none;">

                            <input type="file" id="statusUploadInput" style="display: none;">

                            @if(isset($grps[0]))
                            <input type="hidden" id="chatGroupId" value="{{ $grps[0]->id }}">
                            @endif
                        

                             
                            <input type="hidden" id="userId" value="{{ auth()->user()->id }}">  
 
 

                           
                            <input type="hidden" id="currentUserId" value="{{ Auth::user()->id }}">
                    
                            <div class="input-group" >
                                <div class="row reply" style="padding:4px 0px 5px 0px;height:85px">

                                    <div style="width:6%" class="col-1 reply-emojis video-upload-icon" id="image-upload-icon">

                                         

                                        <svg class="smily1" id="smily" style="color:#8b989e " viewBox="0 0 24 24" height="35" width="35" preserveAspectRatio="xMidYMid meet" version="1.1" xmlns="http://www.w3.org/2000/svg"><title>smiley</title><path fill="currentColor" d="M9.153,11.603c0.795,0,1.439-0.879,1.439-1.962S9.948,7.679,9.153,7.679 S7.714,8.558,7.714,9.641S8.358,11.603,9.153,11.603z M5.949,12.965c-0.026-0.307-0.131,5.218,6.063,5.551 c6.066-0.25,6.066-5.551,6.066-5.551C12,14.381,5.949,12.965,5.949,12.965z M17.312,14.073c0,0-0.669,1.959-5.051,1.959 c-3.505,0-5.388-1.164-5.607-1.959C6.654,14.073,12.566,15.128,17.312,14.073z M11.804,1.011c-6.195,0-10.826,5.022-10.826,11.217 s4.826,10.761,11.021,10.761S23.02,18.423,23.02,12.228C23.021,6.033,17.999,1.011,11.804,1.011z M12,21.354 c-5.273,0-9.381-3.886-9.381-9.159s3.942-9.548,9.215-9.548s9.548,4.275,9.548,9.548C21.381,17.467,17.273,21.354,12,21.354z  M15.108,11.603c0.795,0,1.439-0.879,1.439-1.962s-0.644-1.962-1.439-1.962s-1.439,0.879-1.439,1.962S14.313,11.603,15.108,11.603z"></path></svg>
                                    </div>

                                    <div id="bcksmily" style="display:none" class="col-1 "   >

                                        <svg  class="x" style="color:#7d8d96" viewBox="0 0 24 24" height="40" width="40" preserveAspectRatio="xMidYMid meet" fill="currentColor" enable-background="new 0 0 24 24">
                                            <title>x</title>
                                            <path d="M19.6004 17.2L14.3004 11.9L19.6004 6.60005L17.8004 4.80005L12.5004 10.2L7.20039 4.90005L5.40039 6.60005L10.7004 11.9L5.40039 17.2L7.20039 19L12.5004 13.7L17.8004 19L19.6004 17.2Z"></path>
                                        </svg>

                                         
                                    </div>

                                    <div class="col-1" id="pdf-upload-icon"  style="width:5%">
                                        <span><svg class="plus"  style="color:#8b989e " viewBox="0 0 24 24" height="35" width="35" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" fill="none"><title>attach-menu-plus</title><path fill-rule="evenodd" clip-rule="evenodd" d="M20.5 13.2501L20.5 10.7501L13.25 10.7501L13.25 3.5L10.75 3.5L10.75 10.7501L3.5 10.7501L3.5 13.2501L10.75 13.2501L10.75 20.5L13.25 20.5L13.25 13.2501L20.5 13.2501Z" fill="currentColor"></path></svg></span>
                                    </div>

                                    <div class="col-9 reply-main ">
                                        <input id="editMessageInput" style="background-color: #2a3942; margin-top:5px; border:none; border-radius:10px; width:100%; color:white; padding:30px 0px 30px 10px;" type="text" name="message" autocomplete="off" chat-box class="form-control" placeholder="Type a message">
                                    </div>

                                    <div class="col-1">
                                        <div class="row">

                                            <div class="col-6 d-none d-md-block microphone">
                                                <svg class="microphone" style="color:#8b989e" viewBox="0 0 24 24" height="40" width="40" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24"><title>ptt</title><path fill="currentColor" d="M11.999,14.942c2.001,0,3.531-1.53,3.531-3.531V4.35c0-2.001-1.53-3.531-3.531-3.531 S8.469,2.35,8.469,4.35v7.061C8.469,13.412,9.999,14.942,11.999,14.942z M18.237,11.412c0,3.531-2.942,6.002-6.237,6.002 s-6.237-2.471-6.237-6.002H3.761c0,4.001,3.178,7.297,7.061,7.885v3.884h2.354v-3.884c3.884-0.588,7.061-3.884,7.061-7.885 L18.237,11.412z"></path></svg>
                                            </div>
                                            

                                            <div class="col-6">
                                                <button  style="border-radius: 20px; background-color: green; border: 1px solid green;" class="send input-group-text p-3" id="submitMessage">
                                                    <svg  viewBox="0 0 24 24" height="25" width="30" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24">
                                                        <title>send</title>
                                                        <path fill="currentColor" d="M1.101,21.757L23.8,12.028L1.101,2.3l0.011,7.912l13.623,1.816L1.112,13.845 L1.101,21.757z"></path>
                                                    </svg>
                                                    
                                                </button>

                                                @foreach($groupChatss as $group)
                                                <input type="hidden" id="groupChatId{{ $group->id }}" value="{{ $group->id }}">
                                                <button data-group-id="{{ $group->id }}" type="button" style="border-radius: 20px; background-color: white; border: 1px solid green;" class="sendgrp input-group-text p-3" id="submitgrpMessage{{ $group->id }}" style="display: none;">
                                                    <svg viewBox="0 0 24 24" height="25" width="30" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24">
                                                        <title>send</title>
                                                        <path fill="currentColor" d="M1.101,21.757L23.8,12.028L1.101,2.3l0.011,7.912l13.623,1.816L1.112,13.845 L1.101,21.757z"></path>
                                                    </svg>
                                                </button>
                                            @endforeach
                                            
                                            

                                            </div>

                                        </div>
                                    </div>                                   
                                </div>
                            </div>                           
                        
                    </div> 
                    <div id="show" class="col-lg-8" style="background-color:#111b21;display: none;margin-left:680px;margin-top:-892px;width:75%">
                         <div class="row">

                            <div class="col-3">
                                <svg id="end" class="x mt-4" style="color:#7d8d96" viewBox="0 0 24 24" height="35" width="35" preserveAspectRatio="xMidYMid meet" fill="currentColor" enable-background="new 0 0 24 24">
                                    <title>x</title>
                                    <path d="M19.6004 17.2L14.3004 11.9L19.6004 6.60005L17.8004 4.80005L12.5004 10.2L7.20039 4.90005L5.40039 6.60005L10.7004 11.9L5.40039 17.2L7.20039 19L12.5004 13.7L17.8004 19L19.6004 17.2Z"></path>
                                </svg>
                            </div>

                            <div class="col-9">
                                <h4 style="font-weight: lighter;font-size:25px;margin-top:20px">Search Messages</h4>
                            </div>

                            <div class="col-12 mt-5 p-3" style="background-color:#202c33;border-radius:15px">

                                <div class="col-lg-2 col-sm-2 col-md-2">
                                    <span style="color:#8b989e" data-icon="search" class="">
                                        <svg viewBox="0 0 24 24" height="40" width="40" preserveAspectRatio="xMidYMid meet" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24">
                                            <title>search</title>
                                            <path fill="currentColor" d="M15.009,13.805h-0.636l-0.22-0.219c0.781-0.911,1.256-2.092,1.256-3.386 c0-2.876-2.332-5.207-5.207-5.207c-2.876,0-5.208,2.331-5.208,5.207s2.331,5.208,5.208,5.208c1.293,0,2.474-0.474,3.385-1.255 l0.221,0.22v0.635l4.004,3.999l1.194-1.195L15.009,13.805z M10.201,13.805c-1.991,0-3.605-1.614-3.605-3.605 s1.614-3.605,3.605-3.605s3.605,1.614,3.605,3.605S12.192,13.805,10.201,13.805z"></path>
                                        </svg>
                                    </span>
                                    
                                </div>

                                 <div style="padding: 5px 0px 5px 0px; margin-left: -20px" class="col-lg-10 col-sm-10 col-md-10">
                                 <input style="color: white; border: none; background-color: #202c33" id="searchmessages" type="text" class="form-control" name="searchText" placeholder="Search">
                                  </div>
                                 <div id="search-results" style="display: none;"></div>

                            </div>

                         </div>
                    </div>     

                </div>


                 

            </div>
        </div>
    </div>      
    
    
                 
    <div id="status" class="container-fluid" style="display: none">
        <div class="row">

            <div class="col-4" style="background-color: #182118;height:922px">
                
            </div>

            <div class="col-4">
                @foreach($users as $user)
                @if($user->id == auth()->id())
                    <div class="row" id="clk">
                        <div class="col-2" style="position: absolute">
                            @if($user->user_status)
                                @if(preg_match('/\.(jpg|jpeg|png|gif|jfif)$/i', $user->user_status))
                                    <img src="{{ asset('images/' . basename($user->user_status)) }}" style="width: 215%;height:921px">
                                @elseif(preg_match('/\.(mp4|webm|ogg)$/i', $user->user_status))
                                    <video controls style="width: 215%;height:917.4px">
                                        <source   src="{{ asset('videos/' . basename($user->user_status)) }}" type="video/mp4">
                                    </video>
                                @endif
                            @endif
                        </div>
                        <div class="col-7" style="position:relative">
                            <div class="row">
                                <div class="col-4 icn">
                                    <img class="iconnn" src="{{ asset('images/' . auth()->user()->image) }}">
                            
                                </div>

                                <div class="col-6">
                                    <h4 class="my e" style="color:#d0d7db">My Status</h4><br>
                                    <h5 class="my" style="margin-top:-17px;color:#8797a1">{{ $user->status_date }}</h5>
                                </div>
                            </div>
                        </div>         
                    </div>
                @endif
            @endforeach
            
            </div>

            <div class="col-4"  style="background-color: #182118;height:922px">
                <svg id="crs" class="cross" style="color:white" viewBox="0 0 24 24" height="34" width="34" preserveAspectRatio="xMidYMid meet" class="" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24"><title>x-viewer</title><path fill="currentColor" d="M19.8,5.8l-1.6-1.6L12,10.4L5.8,4.2L4.2,5.8l6.2,6.2l-6.2,6.2l1.6,1.6l6.2-6.2l6.2,6.2l1.6-1.6L13.6,12 L19.8,5.8z"></path></svg>
            </div>

        </div>
    </div>

   
    <div id="ostatus" class="container-fluid" style="display: none">
        <div class="row">

            <div class="col-3" style="background-color: #182118;height:922px">
                <svg id="cr" style="color:white" viewBox="0 0 24 24" height="34" width="34" preserveAspectRatio="xMidYMid meet" class="" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24"><title>x-viewer</title><path fill="currentColor" d="M19.8,5.8l-1.6-1.6L12,10.4L5.8,4.2L4.2,5.8l6.2,6.2l-6.2,6.2l1.6,1.6l6.2-6.2l6.2,6.2l1.6-1.6L13.6,12 L19.8,5.8z"></path></svg>
            </div>

            <div class="col-6" id="statusDisplay">
                  
            </div>

            <div class="col-3"  style="background-color: #182118;height:922px;position:relative">
                <input type="hidden" id="statusUserId" value="2">  
                <input class="inp" style="background-color: #202c33; border:none; position:absolute; border-radius:10px; color:white; padding:20px 0px 20px 10px;" type="text" name="message" autocomplete="off" class="form-control" placeholder="Type a reply">

                <button  style="  background-color: green; border: 1px solid green;margin-top:860px;" class="sendd input-group-text p-3" id="replyMessage">
                    <svg class="mx-2"  viewBox="0 0 24 24" height="25" width="30" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24">
                        <title>send</title>
                        <path fill="currentColor" d="M1.101,21.757L23.8,12.028L1.101,2.3l0.011,7.912l13.623,1.816L1.112,13.845 L1.101,21.757z"></path>
                    </svg>
                    
                </button>
            </div>

        </div>
    </div>
</form>


   <div class="container-fluid" id="image-viewer" style="display:none;background-color:#111b21;height:921px">
    <div class="row">

        <div class="col-4">

            <div id="left-btn" class="col-12" style="background-color:#1d252b;width:10%;border-radius:40%;height:60px;margin-top:60%">
            <svg style="color:#484f54;margin-left:5px" viewBox="0 0 30 30" height="50" width="50" preserveAspectRatio="xMidYMid meet" class="" x="0px" y="0px"><title>chevron</title><path fill="currentColor" d="M11,21.212L17.35,15L11,8.65l1.932-1.932L21.215,15l-8.282,8.282L11,21.212z"></path></svg>
            </div>

        </div>

        <div class="col-4" id="image-column">
            
        </div>

        <div class="col-4">
           

        <div class="col-12">
            <svg id="bckimg" class="x" style="margin-left:95%;color:white" viewBox="0 0 24 24" height="30" width="30" preserveAspectRatio="xMidYMid meet" fill="currentColor" enable-background="new 0 0 24 24">
                <title>x</title>
                <path d="M19.6004 17.2L14.3004 11.9L19.6004 6.60005L17.8004 4.80005L12.5004 10.2L7.20039 4.90005L5.40039 6.60005L10.7004 11.9L5.40039 17.2L7.20039 19L12.5004 13.7L17.8004 19L19.6004 17.2Z"></path>
            </svg>
        </div>


        <div id="right-btn" class="col-12" style="background-color:#1d252b;width:10%;border-radius:40%;height:60px;margin-top:58%;margin-left:90%">
 
            <svg style="color:#484f54;margin-left:5px; " viewBox="0 0 30 30" height="50" width="50" preserveAspectRatio="xMidYMid meet" class="" x="0px" y="0px"><title>chevron</title><path fill="currentColor" d="M11,21.212L17.35,15L11,8.65l1.932-1.932L21.215,15l-8.282,8.282L11,21.212z"></path></svg>

        </div>

         

            
        </div>


    </div>
   </div>





   <div class="container-fluid" id="video-viewer" style="display:none;background-color:#111b21;height:921px">
    <div class="row">

        <div class="col-4">

            <div id="left-btn" class="col-12" style="background-color:#1d252b;width:10%;border-radius:40%;height:60px;margin-top:60%">
            <svg style="color:#484f54;margin-left:5px" viewBox="0 0 30 30" height="50" width="50" preserveAspectRatio="xMidYMid meet" class="" x="0px" y="0px"><title>chevron</title><path fill="currentColor" d="M11,21.212L17.35,15L11,8.65l1.932-1.932L21.215,15l-8.282,8.282L11,21.212z"></path></svg>
            </div>

        </div>

        <div class="col-4" id="video-column">
            
        </div>

        <div class="col-4">
           

        <div class="col-12">
            <svg id="bckimg" class="x" style="margin-left:95%;color:white" viewBox="0 0 24 24" height="30" width="30" preserveAspectRatio="xMidYMid meet" fill="currentColor" enable-background="new 0 0 24 24">
                <title>x</title>
                <path d="M19.6004 17.2L14.3004 11.9L19.6004 6.60005L17.8004 4.80005L12.5004 10.2L7.20039 4.90005L5.40039 6.60005L10.7004 11.9L5.40039 17.2L7.20039 19L12.5004 13.7L17.8004 19L19.6004 17.2Z"></path>
            </svg>
        </div>


        <div id="right-btn" class="col-12" style="background-color:#1d252b;width:10%;border-radius:40%;height:60px;margin-top:58%;margin-left:90%">
 
            <svg style="color:#484f54;margin-left:5px; " viewBox="0 0 30 30" height="50" width="50" preserveAspectRatio="xMidYMid meet" class="" x="0px" y="0px"><title>chevron</title><path fill="currentColor" d="M11,21.212L17.35,15L11,8.65l1.932-1.932L21.215,15l-8.282,8.282L11,21.212z"></path></svg>

        </div>

         

            
        </div>


    </div>
   </div>


    @include('ajax')

</body>
</html> 