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
                        <svg class="mt-5 vi" style="color:#8b989e" viewBox="0 0 24 24" height="30" width="50" preserveAspectRatio="xMidYMid meet" fill="none">
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
    
            <div style="background-color: #111b21; " class="col-lg-4 text-white " id="sidebar">              
                <div class="row">

                    <div class="col-lg-10 col-md-10 col-sm-10 ">
                        <h3 class="mt-5 mx-3 chat-title" style="color:#e9edf0;font-weight:bold">Chats</h3>
                        <h3 class="mt-5 mx-3 whatsapp-title" style="color:#e9edf0;font-weight:bold; display: none;">WhatsApp</h3>
                    </div>
                    

                    <div class="col-lg-1 col-sm-1 col-md-1">
                        <span data-icon="new-chat-outline" class="">
                            <svg class="mt-5" style="color:#8b989e" viewBox="0 0 24 24" height="30" width="30" preserveAspectRatio="xMidYMid meet" class="" fill="none">
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
                                <li><a class="dropdown-item mt-3  text-white " href="#">New Group</a></li>
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
                                <div class="col-sm-9 col-xs-9">
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
    
            <div class="col-lg-7 col-md-12 col-sm-12 conversation   text-white three">
                <div class="row b" style="width:107.3%;margin-left:1px">
                                            
                    <div class="col-lg-12 col-md-12 col-sm-12" style="background-color: #202c33;padding:5px 10px 5px 0px">
                        <div class="row">

                            @if (count($user_messages) > 0)
                            <div class="col-lg-1 col-md-1 col-sm-1">
                                <img id="selected-user-image" class="icon1 mx-4" src="{{ asset('images/' . $user_messages[0]->image) }}" alt="User Image">
                            </div>
                            
                            <div class="col-lg-8 col-md-8 col-sm-8 mt-2">
                                <a class="heading-name-meta v" id="selected-user-name" data-user-id="{{ $user_messages[0]->id }}" style="color:#dfe3e6; margin-top:1%;font-size:20px;text-decoration:none;">
                                    {{ $user_messages[0]->name }}
                                    <br>
                                </a>
                                <div class="v" id="typing" style="display: none;color:white;font-weight:bolder">typing...</div>
                                <div class="last v" id="last-seen" style="font-size: 0.9em; color: grey;"></div>
                                
                                <i class="fa fa-arrow-left  d-sm-block d-md-none" aria-hidden="true" id="goBackIcon" style="color:#aebbc2; cursor: pointer;"></i>
                            </div> 
                            
                            <div class="col-lg-1 col-md-1 col-sm-1" >
                                <div class="row">

                                    <div class="col-lg-6 col-md-6 col-sm-6 svg1">
                                <span data-icon="video-call" class="x1w0mnb">
                                    <svg class="mt-4 mx-5" style="color:#4d5d66"  viewBox="0 0 24 24" height="30" width="40" preserveAspectRatio="xMidYMid meet" fill="none">
                                        <title>video-call</title>
                                        <path d="M3.27096 7.31042C3 7.82381 3 8.49587 3 9.84V14.16C3 15.5041 3 16.1762 3.27096 16.6896C3.5093 17.1412 3.88961 17.5083 4.35738 17.7384C4.88916 18 5.58531 18 6.9776 18H13.1097C14.502 18 15.1982 18 15.7299 17.7384C16.1977 17.5083 16.578 17.1412 16.8164 16.6896C17.0873 16.1762 17.0873 15.5041 17.0873 14.16V9.84C17.0873 8.49587 17.0873 7.82381 16.8164 7.31042C16.578 6.85883 16.1977 6.49168 15.7299 6.26158C15.1982 6 14.502 6 13.1097 6H6.9776C5.58531 6 4.88916 6 4.35738 6.26158C3.88961 6.49168 3.5093 6.85883 3.27096 7.31042Z" fill="currentColor"></path>
                                        <path d="M18.7308 9.60844C18.5601 9.75994 18.4629 9.97355 18.4629 10.1974V13.8026C18.4629 14.0264 18.5601 14.2401 18.7308 14.3916L20.9567 16.3669C21.4879 16.8384 22.3462 16.4746 22.3462 15.778V8.22203C22.3462 7.52542 21.4879 7.16163 20.9567 7.63306L18.7308 9.60844Z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 svg2">
                                <span data-icon="chevron-down-alt" class="">
                                    <svg class="mx-5"  style="color:#4d5d66;margin-top:22px" viewBox="0 0 17 13" height="15" preserveAspectRatio="xMidYMid meet" version="1.1" x="0px" y="0px" enable-background="new 0 0 17 13">
                                        <title>chevron-down-alt</title>
                                        <path fill="currentColor" d="M3.202,2.5l5.2,5.2l5.2-5.2l1.5,1.5l-6.7,6.5l-6.6-6.6L3.202,2.5z"></path>
                                    </svg>
                                </span>
                                    </div>
                                
                                </div>                               
                            </div>

                            <div class="col-lg-1 col-md-1 col-sm-1 mt-4 svg3">
                                <span class="mx-5"  style="color:#8b989e;" data-icon="search-alt" class="">
                                    <svg viewBox="0 0 24 24" height="30" width="30" preserveAspectRatio="xMidYMid meet" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24">
                                        <title>search-alt</title>
                                        <path fill="currentColor" d="M15.9,14.3H15L14.7,14c1-1.1,1.6-2.7,1.6-4.3c0-3.7-3-6.7-6.7-6.7S3,6,3,9.7 s3,6.7,6.7,6.7c1.6,0,3.2-0.6,4.3-1.6l0.3,0.3v0.8l5.1,5.1l1.5-1.5L15.9,14.3z M9.7,14.3c-2.6,0-4.6-2.1-4.6-4.6s2.1-4.6,4.6-4.6 s4.6,2.1,4.6,4.6S12.3,14.3,9.7,14.3z"></path>
                                    </svg>
                                </span>
                                
                            </div>

                            <div class="col-lg-1 col-md-1 col-sm-1 mt-4">
                            <span data-icon="menu" class="xr9ek0c" data-icon="menu" data-bs-toggle="dropdown" aria-expanded="false ">
                                <svg class="svg4"  style="color:#8b989e;" viewBox="0 0 24 24" height="30" width="30" preserveAspectRatio="xMidYMid meet" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24">
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
                            

                            @else
                            <p>No conversation so far...</p>
                            @endif
                            
                        </div>
                    </div>
                    
                    <div id="message" class="row message "style="height:690px;width:100% ">
                        <div class="col-lg-12 col-sm-12   conversation">
                            <div id="chat-content"  style=" height: calc(127% - 120px); overflow-y: auto;width:102%">          
                               
                            </div>
                        </div>
                    </div>


                    <div style="margin-top:45px;background-color:#202c33;" class="col-lg-12">
                        <form id="myForm" class="form-group"  >
                            <input type="hidden" name="message_id" value="{{$message_info->id}}">

                            <input id="image-upload" type="file" style="display: none;" multiple>
                            <input id="image" type="hidden" name="image">

                            <input id="video-upload" type="file" style="display: none;" accept="video/*">
                            <input id="video" type="hidden" name="video">

                            <input type="hidden" id="uniqueTimestamp" name="uniquetimestamp" value="">

                              <input type="file" id="file-input" style="display: none;">

                           
                            <input type="hidden" id="currentUserId" value="{{ Auth::user()->id }}">

                      
                            <div class="input-group" >
                                <div class="row reply" style="padding:4px 0px 5px 0px;height:70px">

                                    <div style="width:6%" class="col-1 reply-emojis video-upload-icon" id="image-upload-icon">
                                        <svg class="mx-4  " style="color:#8b989e;margin-top:35%" viewBox="0 0 24 24" height="35" width="35" preserveAspectRatio="xMidYMid meet" version="1.1" xmlns="http://www.w3.org/2000/svg"><title>smiley</title><path fill="currentColor" d="M9.153,11.603c0.795,0,1.439-0.879,1.439-1.962S9.948,7.679,9.153,7.679 S7.714,8.558,7.714,9.641S8.358,11.603,9.153,11.603z M5.949,12.965c-0.026-0.307-0.131,5.218,6.063,5.551 c6.066-0.25,6.066-5.551,6.066-5.551C12,14.381,5.949,12.965,5.949,12.965z M17.312,14.073c0,0-0.669,1.959-5.051,1.959 c-3.505,0-5.388-1.164-5.607-1.959C6.654,14.073,12.566,15.128,17.312,14.073z M11.804,1.011c-6.195,0-10.826,5.022-10.826,11.217 s4.826,10.761,11.021,10.761S23.02,18.423,23.02,12.228C23.021,6.033,17.999,1.011,11.804,1.011z M12,21.354 c-5.273,0-9.381-3.886-9.381-9.159s3.942-9.548,9.215-9.548s9.548,4.275,9.548,9.548C21.381,17.467,17.273,21.354,12,21.354z  M15.108,11.603c0.795,0,1.439-0.879,1.439-1.962s-0.644-1.962-1.439-1.962s-1.439,0.879-1.439,1.962S14.313,11.603,15.108,11.603z"></path></svg>
                                    </div>

                                    <div class="col-1" style="width:5%">
                                        <span><svg class="smily"  style="color:#8b989e;margin-top:19px" viewBox="0 0 24 24" height="35" width="35" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" fill="none"><title>attach-menu-plus</title><path fill-rule="evenodd" clip-rule="evenodd" d="M20.5 13.2501L20.5 10.7501L13.25 10.7501L13.25 3.5L10.75 3.5L10.75 10.7501L3.5 10.7501L3.5 13.2501L10.75 13.2501L10.75 20.5L13.25 20.5L13.25 13.2501L20.5 13.2501Z" fill="currentColor"></path></svg></span>
                                    </div>

                                    <div class="col-9 reply-main ">
                                        <input id="editMessageInput" style="background-color: #2a3942; margin-top:5px; border:none; border-radius:10px; width:100%; color:white; padding:30px 0px 30px 10px;" type="text" name="message" autocomplete="off" chat-box class="form-control" placeholder="Type a message">
                                    </div>

                                    <div class="col-1">
                                        <div class="row">

                                            <div class="col-6 d-none d-md-block microphone">
                                                <svg class="mt-4 mx-3" style="color:#8b989e" viewBox="0 0 24 24" height="40" width="40" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24"><title>ptt</title><path fill="currentColor" d="M11.999,14.942c2.001,0,3.531-1.53,3.531-3.531V4.35c0-2.001-1.53-3.531-3.531-3.531 S8.469,2.35,8.469,4.35v7.061C8.469,13.412,9.999,14.942,11.999,14.942z M18.237,11.412c0,3.531-2.942,6.002-6.237,6.002 s-6.237-2.471-6.237-6.002H3.761c0,4.001,3.178,7.297,7.061,7.885v3.884h2.354v-3.884c3.884-0.588,7.061-3.884,7.061-7.885 L18.237,11.412z"></path></svg>
                                            </div>
                                            

                                            <div class="col-6">
                                                <button style="border-radius: 20px; background-color: green; border: 1px solid green;" class="send input-group-text p-3 mt-4 mx-4" id="submitMessage">
                                                    <svg  viewBox="0 0 24 24" height="25" width="30" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" version="1.1" x="0px" y="0px" enable-background="new 0 0 24 24">
                                                        <title>send</title>
                                                        <path fill="currentColor" d="M1.101,21.757L23.8,12.028L1.101,2.3l0.011,7.912l13.623,1.816L1.112,13.845 L1.101,21.757z"></path>
                                                    </svg>
                                                    
                                                </button>
                                            </div>

                                        </div>
                                    </div>                                   
                                </div>
                            </div>                           
                        </form>
                    </div>                
                </div>
            </div>
        </div>
    </div>            
                 
    @include('ajax')

</body>
</html> 