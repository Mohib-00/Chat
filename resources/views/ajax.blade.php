 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
 </head>
 <body>
    

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 
        
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const sidebar = document.getElementById('sidebar');
            const chatContent = document.querySelector('.conversation');
            const userChatLinks = document.querySelectorAll('.user-chat-link');
            const goBackIcon = document.getElementById('goBackIcon');

            const isSidebarOpen = localStorage.getItem('sidebarOpen') === 'true';
        
            userChatLinks.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    if (window.innerWidth <= 768) {
                        sidebar.style.display = 'none';
                        chatContent.style.display = 'block';
                        if (goBackIcon) {
                            goBackIcon.style.display = 'block';
                        }
                    } else {
                        chatContent.style.display = 'block';  
                    }
                });
            });
        
            if (goBackIcon) {
                goBackIcon.addEventListener('click', () => {
                    if (window.innerWidth <= 768) {
                        sidebar.style.display = 'block';
                        chatContent.style.display = 'none';
                    }
                });
            }
        
            function handleResize() {
                if (window.innerWidth > 768) {
                    sidebar.style.display = 'block';
                    chatContent.style.display = 'block';
                    if (goBackIcon) {
                        goBackIcon.style.display = 'none';
                    }
                } else {
                    sidebar.style.display = 'block';
                    chatContent.style.display = 'none';
                    if (goBackIcon) {
                        goBackIcon.style.display = 'block';
                    }
                }
            }
        
            window.addEventListener('resize', handleResize);
    
            handleResize();
        });
    </script>
    
<script>
    $(document).ready(function(){
    $('.icon').click(function(event){
    event.preventDefault();                              
    $.ajax({
    url: "{{ route('open.new.page') }}",
    type: 'GET',
    success: function(response) {
    console.log(response.message);
    window.location.href = "/profile";
    },
    error: function(xhr, status, error) {
    console.error(xhr.responseText);
    }
  });
 });
});
</script>
           
<script>                
       document.getElementById('searchText').addEventListener('input', function () {
       var searchText = this.value.toLowerCase();
       var sideBar = document.querySelector('.sideBar');
       var sideBarItems = sideBar.querySelectorAll('.sideBar-body');                                       
       sideBarItems.forEach(function (item) {
       var userName = item.querySelector('.name-meta').innerText.toLowerCase();
       if (userName.indexOf(searchText) !== -1) {
       item.style.display = 'block';
       } else {
       item.style.display = 'none';
       }
       });
       });
</script>
          
<script type="text/javascript">
   
    var lastCheckedTimestamp = null;
    var latestMessageTimestamp = 0;

    $(document).ready(function() {

    getLastCheckedTimestamp(false);

    $('#image-upload-icon').click(function() {
        $('#image-upload, #video-upload').click();  
    });

    $('#image-upload').change(function() {
        var file = this.files[0];
        $('#image').val(file.name);  
    });
   
    $('#video-upload').change(function() {
        var file = this.files[0];
        $('#video').val(file.name);  
    });

    $('#submitMessage').click(function() {
        sendMessage();  
    })

     

    $(document).on('click', '.user-chat-link', function(e) {
    e.preventDefault();
    var userId = $(this).data('user-id');
    $('[name="message_id"]').val(userId);  
    var userName = $(this).data('user-name');  
    var userImage = $(this).data('user-image');  
    console.log("User Image:", userImage);
    $('#selected-user-name').text(userName); 
    $('#selected-user-image').attr('src', userImage);  
    window.history.pushState({}, '', '/messages/' + userId); 
    loadUserChat(userId); 
    });


    function loadUserChat(userId) {
    console.log("Loading chat for user:", userId);
    
    var user_id = "{{ Auth::user()->id }}";
    $.ajax({
        url: "/load-chat/" + userId,
        method: "GET",
        success: function(response) {
            console.log("Received response:", response);
            if (response && Array.isArray(response.conversations)) {
                $('#chat-content').empty();
                var conversations = response.conversations;
                            
                if (conversations.length > 0 || updatedConversations.length > 0) {
                    conversations.forEach(function(conversation) {
                        var messageHtml = Html(conversation, user_id);
                        $('#chat-content').append(messageHtml);
                        lastCheckedTimestamp = conversation.uniquetimestamp;
                    });
                  
                    checkLastSeen(userId);
                }
            } else {
                console.log("No conversations found for user:", userId);
                $('#chat-content').empty();
            }
        },
        error: function(xhr, status, error) {
            console.error("Error loading chat:", error);
        }
    });
}

    
    $('[name="message"]').keypress(function(e) {
    if (e.which === 13) {
    e.preventDefault();  
    sendMessage();
    }
    }); 

    function  Html(conversation, user_id) {
    var deleteButton = (conversation.user_id == user_id) ? `<a style="color:white" class="delete-message btn-sm  position-absolute  top-0 start-0 mt-1 ms-1" data-message-id="${conversation.id}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>` : '';
    var createdAt = new Date(conversation.created_at);
    var formattedDate = createdAt.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric',   });
    var messageStyle = (conversation.user_id == user_id) ? 'text-right' : '';    
    messageStyle += (conversation.user_id == user_id) ? ' ml-50' : '';
    var messageHtml = '';
    if (conversation.video) {

    var videoUrl = '{{ asset('') }}' + conversation.video.trim();
    var videoHtml = `
    <video controls style="width:50%">
         <source src="${videoUrl}" type="video/mp4">
    </video>
    `;

    messageHtml = `
    <div class="card position-relative"style="border:none; background:none !important">
    <div style="font-weight:bolder" class="card-body text-black ${messageStyle}">
            ${videoHtml}
            <br><br>
            <i style="color:white">${formattedDate}</i>
            ${deleteButton}
    </div>
    </div><br>
    `;

    } else if (conversation.image && !conversation.message) {
        var imageUrls = conversation.image.split(',');
        var baseUrl = '{{ asset('') }}';
        var imageHtml = '';
        $.each(imageUrls, function (index, imageUrl) {
        var fullImageUrl = baseUrl + imageUrl.trim();
        imageHtml += `
        <br>                          
            <a class="image-popup-vertical-fit" href="${fullImageUrl}">
              <img src="${fullImageUrl}" style="width:25%;height:150px">
            </a>
            `;
        });

        messageHtml = `
            <div class="card position-relative" style="border:none; background:none !important">
                <div style="font-weight:bolder;   " class="card-body  ${messageStyle}">
                    ${imageHtml}
                    <br><br>
                    <i style="color:white" >${formattedDate}</i>
                    ${deleteButton}
                </div>
            </div><br>
        `;
    } else {
       
        messageHtml = `
        <div id="message-${conversation.id}" class="card position-relative" style="border:none;background:none;">
        <div style="font-weight:bolder; font-size:20px;" class="card-body text-white ${messageStyle}">
            <div style="position: relative;">
                <div style="font-size:17px;background:${conversation.user_id == user_id ? '#005c4b' : '#202c33'} !important; display:inline-block; padding:5px 5px 0px 10px; border-radius:${conversation.user_id == user_id ? '10px 0px 10px 10px' : '10px 10px 10px 0px'}; color: #dfe3e6; ${conversation.user_id == user_id ? 'margin-left: auto; max-width: 80%;' : 'max-width: 80%;'}; letter-spacing: 1px;">
                    ${conversation.message}
                    <br>
                    <p style="font-size:15px;color:#a6abad;display:inline;">${formattedDate}</p>
                    ${conversation.user_id == user_id ? `
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-up" viewBox="0 0 16 16" style="vertical-align: middle; margin-left: 5px;">
                            <path fill-rule="evenodd" d="M7.646 2.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 3.707 2.354 9.354a.5.5 0 1 1-.708-.708z"/>
                            <path fill-rule="evenodd" d="M7.646 6.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 7.707l-5.646 5.647a.5.5 0 0 1-.708-.708z"/>
                        </svg>
                    ` : ''}
                </div>
                ${conversation.user_id == user_id ? `
                    <a class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:transparent; border:none; position: absolute; top: 0; right: 70px; margin-top:25px; color:green">
                    </a>
                ` : ''}
                <ul class="dropdown-menu" style="position: absolute; top: 100%; left: 0; background-color: #233138; display: none;">
                    <li><a class="dropdown-item text-white delete-message" href="#" data-message-id="${conversation.id}">Delete</a></li>
                </ul>
            </div>
        </div>
    </div>
    <br>`;



}
    return messageHtml;
}
  
    function sendMessage() {
        var formData = new FormData();  
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        formData.append('message_id', $('[name="message_id"]').val());
        var messageInput = $('[name="message"]').val().trim();         
   
        var uniqueTimestamp = Math.floor(Date.now() / 1000); 
        var formattedDate = new Date(uniqueTimestamp * 1000).toISOString().slice(0, 19).replace('T', ' '); 
          
        if ($('#video-upload')[0].files.length > 0) {
        var videoFile = $('#video-upload')[0].files[0];
        formData.append('video', videoFile); 
        }

        if ($('#image-upload')[0].files.length > 0) {
        var files = $('#image-upload')[0].files;
        for (var i = 0; i < files.length; i++) {
        formData.append('images[]', files[i]); 
        }
        }
        
        if (messageInput !== '') {
        formData.append('message', messageInput);
        } else {
        formData.append('message', 'No message');
        }

        $.ajax({
            url: "{{ route('storeConversations') }}",
            method: 'post',
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': csrfToken  
            },
            success: function(result) {
                $('[name="message"]').val('');
                $('#image-upload').val('');   
                updateLastSeen();           
            },

            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    var typingTimer;
var typingInterval = 2000;
var isTyping = false;

$('[name="message"]').on('input', function() {
    clearTimeout(typingTimer);
    sendTypingStatus(true);
});

 

$('[name="message"]').on('keyup', function() {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(function() {
        sendTypingStatus(false);
    }, typingInterval);
});

function sendTypingStatus(typing) {
    $.ajax({
        url: "/typing-status",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            typing: typing
        },
        success: function(response) {
            console.log("Typing status sent successfully for user ID:", response.user_id);
             
            if (!typing) {
                updateLastSeen();
            }
        },
        error: function(xhr, status, error) {
            console.error("Error sending typing status:", error);
        }
    });
}
function checkTypingStatus() {
    var chatUserId = $('#selected-user-name').data('user-id');
    $.ajax({
        url: "/check-typing-status",
        method: "GET",
        data: {
            chat_user_id: chatUserId
        },
        success: function(response) {
            if (response.typing) {
                $('#typing').show();
                
                $('#last-seen').hide();
            } else {
                $('#typing').hide();
                
                $('#last-seen').show();
                
                checkLastSeen(chatUserId);
            }
        },
        error: function(xhr, status, error) {
            console.error("Error checking typing status:", error);
        }
    });
}

setInterval(checkTypingStatus, 2000);


    function updateLastSeen() {
    $.ajax({
        url: "{{ route('update.last.seen') }}",
        method: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if (response.success) {
                console.log(response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error("Error updating last seen:", xhr.responseText);
        }
    });
}

function checkLastSeen(userId) {
    $.ajax({
        url: '/check-last-seen',
        method: 'GET',
        data: { user_id: userId },
        success: function(response) {
            if (response.success && response.last_seen) {
                $('#last-seen').text('Last seen: ' + new Date(response.last_seen).toLocaleString());
            } else {
                $('#last-seen').text('');  
            }
        },
        error: function(xhr, status, error) {
            console.error("Error checking last seen:", error);
        }
    });
}

 

    function scrollToBottom() {
        var chatContainer = $('#chat-content');
        chatContainer.scrollTop(chatContainer[0].scrollHeight);
    }

    function getLastCheckedTimestamp(keep_last_stamp = true) {

        if(keep_last_stamp){
        return localStorage.getItem('lastCheckedTimestamp');
        }
        else{
        localStorage.setItem('lastCheckedTimestamp', 0);
        }   
}
 
function fetchConversations(userId) {
    var lastCheckedTimestamp = getLastCheckedTimestamp() || 0;
    var message_id = $('[name="message_id"]').val();
    var user_id = "{{ Auth::user()->id }}";
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var isAtTop = $('#chat-content').scrollTop() === 0;
    var userId = $('#selected-user-name').data('user-id');

    $.ajax({
        url: "{{ route('getConversations') }}",
        method: "get",
        data: {
            lastCheckedUniqueTimestamp: lastCheckedTimestamp,
            id: message_id,
            _token: csrfToken,
        },
        success: function(response) {
            console.log(response);
            if (response && Array.isArray(response.conversations)) {
                var conversations = response.conversations;
                var updatedConversations = response.updatedConversations;

                if (lastCheckedTimestamp === 0) {
                    $('#chat-content').empty();
                }
                if (conversations.length > 0 || updatedConversations.length > 0) {
                    conversations.forEach(function(conversation) {
                        var messageHtml = Html(conversation, user_id);
                        $('#chat-content').append(messageHtml);

                        lastCheckedTimestamp = conversation.uniquetimestamp;
                    });

                    if (updatedConversations.length > 0) {
                        updatedConversations.forEach(function(updatedConversation) {
                            var messageHtml = Html(updatedConversation, user_id);
                            $('#chat-content > #message-' + updatedConversation.id).replaceWith(messageHtml);

                            if (lastCheckedTimestamp < updatedConversation.updatedtimestamp) {
                                lastCheckedTimestamp = updatedConversation.updatedtimestamp;
                            }
                        });
                    }
                    localStorage.setItem('lastCheckedTimestamp', lastCheckedTimestamp);
                    scrollToBottom();
                    loadingMessages = false;
                }

               
                checkLastSeen(userId); 
            } else {
                console.error('Invalid response format:', response);
                loadingMessages = false;
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            loadingMessages = false;
        }
    });
}

 
fetchConversations();
setInterval(function() {
    fetchConversations();
}, 2000);

    $(document).on('click', '.delete-message', function(e) {
    e.preventDefault();
    var messageId = $(this).data('message-id');
       
    swal.fire({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this message!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {       
                $.ajax({
                url: '/delete-message/' + messageId,
                method: 'get',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    message_id: messageId
                },
                success: function(result) {
                if (result.success) {                     
                swal.fire({
                title: "Success!",
                text: "Message deleted successfully.",
                icon: "success",
                button: "OK",
                });
                }            
                },
                error: function(xhr, status, error) {
                console.error(xhr.responseText);
                }
            });
        } else {       
            swal.fire("Message is safe!", {
            icon: "info",
            });
        }
    });
});
});

</script>
 </body>
 </html>