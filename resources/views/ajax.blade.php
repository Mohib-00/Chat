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
    function showStatus(name, imageUrl, date, statusImageUrl, statusVideoUrl, fileType) {
        let statusDisplayArea = document.getElementById('statusDisplay');
        statusDisplayArea.innerHTML = `
            <div class="row">
                <div class="col-2" style="position: absolute">
                    ${fileType.match(/jpg|jpeg|png|gif|jfif/i) ? `<img style="width: 325%;height:921px" src="${statusImageUrl}">` : ''}
                    ${fileType.match(/mp4|webm|ogg/i) ? `<video controls class="vdo" style="height:917.4px"><source src="${statusVideoUrl}" type="video/mp4"></video>` : ''}
                </div>
                <div class="col-7" style="position:relative">
                    <div class="row">

                        <div class="col-3">
                            <img class="icn" src="${imageUrl}" style="width:60px;height: 60px;border-radius: 50%;">
                            </div>

                            <div class="col-8">
                                  <h4 class="i" style="color:#d0d7db">${name}</h4><br>
                                  <h5 class="i" style="margin-top:-17px;color:#8797a1">${date}</h5>
                                </div>

                        </div
                </div>
            </div>
        `;
    }
    </script>
    

   <script>
    $(document).ready(function() {
        $('.plus').on('click', function() {
            $('#statusUploadInput').click();
        });

        $('#statusUploadInput').on('change', function() {
            var formData = new FormData();
            formData.append('status', $(this)[0].files[0]);

            $.ajax({
                url: '{{ route('addStatus') }}',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                   
                },
                error: function(response) {
                    
                }
            });
        });
    });
</script>

 


   <script>
    $(document).ready(function() {

        $("#svgi").click(function() {
        $("#statusContainer").show();
        $("#sidebar").hide();
        $("#group").hide();
      
    });

    $("#newgrp").click(function() {
        $("#group").show();
        $("#sidebar").hide();
      
    });

    $("#new").click(function() {
        $("#group").show();
        $("#sidebar").hide();
      
    });

    $("#bckgrp").click(function() {
        $("#group").hide();
        $("#sidebar").show();
      
    });

    $("#backicn").click(function() { 
        $("#statusContainer").hide();
        $("#sidebar").show();
        
    });

    $("#clk").click(function() {
        $("#status").show();
        $("#chat-container").hide();
      
    });

    $(".glk").click(function() {
        $("#ostatus").show();
        $("#chat-container").hide();
        
    });

    $("#crs").click(function() {
        $("#status").hide();
        $("#chat-container").show();
       
    });

    $("#cr").click(function() {
        $("#ostatus").hide();
        $("#chat-container").show();
        
    });

    $("#nme").click(function() {
        $("#status").show();
        $("#chat-container").hide();
       
    });

  

});
 </script>

 
<script>

var currentVisibleButtonId = null;
 
function showButtonForGroupChat(groupId) {
    
    if (currentVisibleButtonId !== null) {
        $("#submitgrpMessage" + currentVisibleButtonId).hide();
    }
 
    $("#submitgrpMessage" + groupId).show();
    $(".send").hide();

    currentVisibleButtonId = groupId;
}

 
$(".group-chat-link").click(function() {
 
    var groupId = $(this).data('group-id');

    showButtonForGroupChat(groupId);
});

$(".user-chat-link").click(function() {       
        $(".send").show();
        $(".sendgrp").hide(); 
    });


    $(".group-chat-link").click(function() {        
        $(".usr").hide();
        $(".groupp").show(); 
        $(".userimage").hide();
        $(".groupimage").show();
    });

    $(".user-chat-link").click(function() {        
        $(".groupp").hide(); 
        $(".usr").show();
        $(".groupimage").hide();
        $(".userimage").show();
    });



    $(".group-chat-link").click(function() {        
        $("#chat-content").hide();
        $("#chat-grpcontent").show(); 
    });

    $(".user-chat-link").click(function() {        
        $("#chat-content").show();
        $("#chat-grpcontent").hide(); 
    });

  

   $(document).on('click', '.usersgrp .sideBar-body', function() {
    
    $(this).toggleClass('selected');  
    $('#grpnone').empty();

   
    $('.usersgrp .sideBar-body.selected').each(function() {
        var userName = $(this).find('.name-meta').data('user-name');
        var userImage = $(this).find('.name-meta').data('user-image');

        
        var userDiv = $('<div class="col-1 avatar">');
        var userImg = $('<img>').attr('src', userImage);
        var userNameDiv = $('<div class="col-1 nme">');
        var userNameP = $('<p style="margin-left:25px;margin-top:3px">').text(userName);

       
        userDiv.append(userImg);
        userNameDiv.append(userNameP);
        $('#grpnone').append(userDiv).append(userNameDiv);
    }); 
});

$(document).on('click', '.mmbr', function() {
    var userNames = [];
    $('.usersgrp .sideBar-body.selected').each(function() {
        userNames.push($(this).find('.name-meta').data('user-name'));
    });

    

    if (userNames.length > 0) {
        $.ajax({
            url: '/create-group',
            method: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                names: userNames
            },
            success: function(response) {
                if (response.success) {
                     
                }
            },
            error: function(xhr) {
                alert('An error occurred: ' + xhr.responseText);
                
            }
        });
    } else {
        alert('Please select users before creating a group.');
    }
});

function sendGroupMessage(groupId) {
    var formData = new FormData();
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var messageInput = $('[name="message"]').val().trim();  

    formData.append('group_chat_id', groupId);
    formData.append('message', messageInput || 'No message');

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

    if (replyMessage !== '') {
        formData.append('reply_message_content', replyMessage);  
    }

    $.ajax({
        url: '/save-group-message',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {
            if (response.success) {
                var groupConversations = [response.message];  
                var chatHtml = HtmlGroupChat(groupConversations, groupId);
                $('#chat-grpcontent').append(chatHtml);
                $('[name="message"]').val('');
                $('#image-upload').val('');
                $('#video-upload').val('');
                scrollToBottom();
            } else {
                alert('Failed to save message');
            }
        },
        error: function(xhr) {
            alert('An error occurred: ' + xhr.responseText);
        }
    });
}

var lastgrpCheckedTimestamp = null;
getLastgrpCheckedTimestamp(false);

function scrollToBottom() {
    var chatContainer = $('#chat-grpcontent');
    chatContainer.scrollTop(chatContainer[0].scrollHeight);
}

function getLastgrpCheckedTimestamp(keep_last_stamp = true) {
    if (keep_last_stamp) {
        const timestamp = localStorage.getItem('lastCheckedgrpTimestamp');
         
        return timestamp;
    } else {
        localStorage.setItem('lastCheckedgrpTimestamp', 0);
         
        return 0;
    }
}

function fetchGroupConversations() {
    var lastCheckedTimestamp = getLastgrpCheckedTimestamp() || 0;
    var groupId = $('#chatGroupId').val();

    if (!groupId) {
        console.error('Group ID is not set');
        return;
    }

    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "{{ route('getGroupConversations') }}",
        method: "get",
        data: {
            lastCheckedgrpUniqueTimestamp: lastCheckedTimestamp,
            chat_group_id: groupId,
            _token: csrfToken,
        },
        success: function(response) {
            if (response && Array.isArray(response.groupConversations)) {
                var groupConversations = response.groupConversations;
                var updatedgroupConversations = response.updatedgroupConversations;

                if (lastCheckedTimestamp === 0) {
                    $('#chat-grpcontent').empty();
                }

                if (groupConversations.length > 0 || updatedgroupConversations.length > 0) {
                    groupConversations.forEach(function(conversation) {
                        var chatHtml = HtmlGroupChat(groupConversations, groupId);
                        $('#chat-grpcontent').append(chatHtml);

                        if (conversation.groupUnixTimestamp) {
                            lastCheckedTimestamp = conversation.groupUnixTimestamp;
                        }
                    });

                    if (updatedgroupConversations.length > 0) {
                        var newGroupUpdatedTimestamp = lastCheckedTimestamp;

                        updatedgroupConversations.forEach(function(updatedConversation) {
                            var messageHtml = HtmlGroupChat([updatedConversation], groupId);
                            $('#chat-grpcontent > #message-' + updatedConversation.id).replaceWith(messageHtml);

                            if (newGroupUpdatedTimestamp < updatedConversation.groupUpdatedTimestamp) {
                                newGroupUpdatedTimestamp = updatedConversation.groupUpdatedTimestamp;
                            }
                        });

                        if (newGroupUpdatedTimestamp > lastCheckedTimestamp) {
                            lastCheckedTimestamp = newGroupUpdatedTimestamp;
                        }
                    }

                    localStorage.setItem('lastCheckedgrpTimestamp', lastCheckedTimestamp);
                    scrollToBottom();
                }
            }
        },
        error: function(xhr, status, error) {
            console.error('Error fetching group conversations:', error);
        }
    });
}

 
fetchGroupConversations();
setInterval(function() {
    fetchGroupConversations();
}, 2000);



$(document).on('click', '.sendgrp', function(e) {
    e.preventDefault();
    var groupId = $(this).data('group-id');
    sendGroupMessage(groupId);
});


$('.group-chat-link').click(function(e) {
    e.preventDefault();
    var groupId = $(this).data('group-id');
    var groupName = $(this).data('group-name');
    var groupImage = $(this).data('user-image');

    $('#selected-group-name').text(groupName);
    $('#selected-group-image').attr('src', groupImage);
 
    $('#chatGroupId').val(groupId);
    
    
    fetchGroupConversations();
    
 
    window.history.pushState({}, '', '/group-chat/' + groupId);
    
    loadGroupMessage(groupId, groupName);
});


   
function HtmlGroupChat(messages, groupId) {
    if (!Array.isArray(messages)) {
        return '';
    }

    var chatContent = '';

    messages.forEach(message => {
        if (!message || typeof message !== 'object') return;

        

        var createdAt = new Date(message.created_at);
        var user_id = @json(auth()->user()->id);
        var formattedDate = createdAt.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric' });
        var messageStyle = (message.user_id == user_id) ? 'text-right' : '';    
        messageStyle += (message.user_id == user_id) ? ' ml-50' : '';
        var seenStatusSvg = (message.seen_status == 1) ? 
            `<svg style="color:#4fb9e3" viewBox="0 0 16 11" height="11" width="16" preserveAspectRatio="xMidYMid meet" fill="none">
                <title>msg-dblcheck</title>
                <path d="M11.0714 0.652832C10.991 0.585124 10.8894 0.55127 10.7667 0.55127C10.6186 0.55127 10.4916 0.610514 10.3858 0.729004L4.19688 8.36523L1.79112 6.09277C1.7488 6.04622 1.69802 6.01025 1.63877 5.98486C1.57953 5.95947 1.51817 5.94678 1.45469 5.94678C1.32351 5.94678 1.20925 5.99544 1.11192 6.09277L0.800883 6.40381C0.707784 6.49268 0.661235 6.60482 0.661235 6.74023C0.661235 6.87565 0.707784 6.98991 0.800883 7.08301L3.79698 10.0791C3.94509 10.2145 4.11224 10.2822 4.29844 10.2822C4.40424 10.2822 4.5058 10.259 4.60313 10.2124C4.70046 10.1659 4.78086 10.1003 4.84434 10.0156L11.4903 1.59863C11.5623 1.5013 11.5982 1.40186 11.5982 1.30029C11.5982 1.14372 11.5348 1.01888 11.4078 0.925781L11.0714 0.652832ZM8.6212 8.32715C8.43077 8.20866 8.2488 8.09017 8.0753 7.97168C7.99489 7.89128 7.8891 7.85107 7.75791 7.85107C7.6098 7.85107 7.4892 7.90397 7.3961 8.00977L7.10411 8.33984C7.01947 8.43717 6.97715 8.54508 6.97715 8.66357C6.97715 8.79476 7.0237 8.90902 7.1168 9.00635L8.1959 10.0791C8.33132 10.2145 8.49636 10.2822 8.69102 10.2822C8.79681 10.2822 8.89838 10.259 8.99571 10.2124C9.09304 10.1659 9.17556 10.1003 9.24327 10.0156L15.8639 1.62402C15.9358 1.53939 15.9718 1.43994 15.9718 1.32568C15.9718 1.1818 15.9125 1.05697 15.794 0.951172L15.4386 0.678223C15.3582 0.610514 15.2587 0.57666 15.1402 0.57666C14.9964 0.57666 14.8715 0.635905 14.7657 0.754395L8.6212 8.32715Z" fill="currentColor"></path>
            </svg>` : 
            `<svg viewBox="0 0 12 11" height="11" width="16" preserveAspectRatio="xMidYMid meet" fill="none">
                <title>msg-check</title>
                <path d="M11.1549 0.652832C11.0745 0.585124 10.9729 0.55127 10.8502 0.55127C10.7021 0.55127 10.5751 0.610514 10.4693 0.729004L4.28038 8.36523L1.87461 6.09277C1.8323 6.04622 1.78151 6.01025 1.72227 5.98486C1.66303 5.95947 1.60166 5.94678 1.53819 5.94678C1.407 5.94678 1.29275 5.99544 1.19541 6.09277L0.884379 6.40381C0.79128 6.49268 0.744731 6.60482 0.744731 6.74023C0.744731 6.87565 0.79128 6.98991 0.884379 7.08301L3.88047 10.0791C4.02859 10.2145 4.19574 10.2822 4.38193 10.2822C4.48773 10.2822 4.58929 10.259 4.68662 10.2124C4.78395 10.1659 4.86436 10.1003 4.92784 10.0156L11.5738 1.59863C11.6458 1.5013 11.6817 1.40186 11.6817 1.30029C11.6817 1.14372 11.6183 1.01888 11.4913 0.925781L11.1549 0.652832Z" fill="currentColor"></path>
            </svg>`;
                        
        chatContent += `
                            <div id="message-${message.id}" class="card position-relative" style="border:none;background:none;">
    <div style="font-weight:bolder; font-size:20px;" class="card-body text-white ${messageStyle}">
        <div style="position: relative;">

${message.reply_message_content ? `
    <div class="container-fluid vo" style="margin-top:-21px; ${message.user_id == user_id ? 'margin-left:650px; background-color:#005c4b;' : 'margin-left:-1px; background-color:#202c33;'} width:13%">
                    <div class="row">
                        <div class="col-2" style="background-color:#52bdeb;border-radius:5px 0px 0px 5px;">
                            <p style="display: none">nn</p>
                        </div>
                         <div class="col-10" style="${message.user_id == user_id ? 'background-color:#025244;' : 'background-color:#111b21;'} height:80px;padding:15px 0px 0px 20px;border-radius:0px 10px 10px 0px;width:95%;margin:4px 4px 4px 4px">  
                            <p style="font-size:17px; color: #dfe3e6; ${message.user_id == user_id ? 'margin-left:-25%; max-width: 80%;' : 'max-width: 80%;'}; letter-spacing: 1px;">${message.reply_message_content}</p>
                        </div>
                    </div>
                </div>
` : message.reply_status ? `
    <div class="container-fluid voO" style="margin-top:-21px; ${message.user_id == user_id ? 'margin-left:588px; background-color:#005c4b;' : 'margin-left:-1px; background-color:#202c33;'} width:13%">
        <div class="row">
            <div class="col-2" style="background-color:#52bdeb;border-radius:5px 0px 0px 5px;">
                <p style="display: none">nn</p>
            </div>
            <div class="col-10" style="${message.user_id == user_id ? 'background-color:#025244;' : 'background-color:#111b21;'} height:80px;padding:15px 0px 0px 20px;border-radius:0px 10px 10px 0px;width:95%;margin:4px 4px 4px;">  
                 ${(() => {
                    const replyStatus = message.reply_status;
                    const fileType = replyStatus.split('.').pop();
                    if (fileType.match(/jpg|jpeg|png|gif|jfif/i)) {
                        return `<img style="width:110%;height:75px;margin-top:-9%;margin-left:-20%" src="/${replyStatus}">`;
                    } else if (fileType.match(/mp4|webm|ogg/i)) {
                        return `<video controls class="vdoo" style=" "><source src="/${replyStatus}" type="video/mp4"></video>`;
                    } else {
                        return '';
                    }
                })()}
            </div>
        </div>
    </div>
` : ''}

             <div id="react-${message.id}" class="col-4" style="display: none; background-color:#222e36; height:70px; border-radius:20px;">
                <div class="row">
                    <div class="col-2 mt-1 mx-4">
                        <img style="width:130%;height:45px;border-radius:45%;" src="{{ asset('emoji.jfif') }}" alt="Emoji 1" onclick="savegrpReact(${message.id}, 'emoji.jfif')">
                    </div>
                    <div class="col-2 mt-1">
                        <img style="width:130%;height:45px;border-radius:45%;" src="{{ asset('emoji1.jfif') }}" alt="Emoji 2" onclick="savegrpReact(${message.id}, 'emoji1.jfif')">
                    </div>
                    <div class="col-2 mt-1 mx-4">
                        <img style="width:130%;height:45px;border-radius:45%;" src="{{ asset('emoji2.jfif') }}" alt="Emoji 3" onclick="savegrpReact(${message.id}, 'emoji2.jfif')">
                    </div>
                    <div class="col-2 mt-1">
                        <img style="width:130%;height:45px;border-radius:45%;" src="{{ asset('emoji3.jfif') }}" alt="Emoji 4" onclick="savegrpReact(${message.id}, 'emoji3.jfif')">
                    </div>
                </div>
            </div>

            <div class="message-content" style="font-size:17px;background:${message.user_id == user_id ? '#005c4b' : '#202c33'} !important; display:inline-block; padding:5px 5px 0px 10px; border-radius:${message.user_id == user_id ? '10px 0px 10px 10px' : '10px 10px 10px 0px'}; color: #dfe3e6; ${message.user_id == user_id ? 'margin-left: auto; max-width: 80%;' : 'max-width: 80%;'}; letter-spacing: 1px;">
              ${message.user_id != user_id ? `  <p><strong style="color:green">${message.user && message.user.name ? message.user.name : 'Unknown User'}<br></strong> ${message.message}</p> ` : `<p>${message.message}</p>`}

                ${message.edit_status === 'Edited' ? '<span style="color:#8b989e;font-size:12px">Edited</span>' : ''}
                <p style="font-size:15px;color:#a6abad;display:inline;">${formattedDate}</p>
                ${message.user_id == user_id ? seenStatusSvg : ''}
            </div>

             ${message.react_message ? `
                <div style="margin-top: 10px;">
                    <p><img style="width: 30px; height: 30px; border-radius: 50%;" src="{{ asset('${message.react_message}') }}" alt="React Emoji"></p>
                </div>
            ` : ''}
            
            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink${message.id}" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:transparent; border:none; position: absolute; margin-top: 20; ${message.user_id == user_id ? 'right: 90px;' : 'left: 70px;'} margin-top:35px; ${message.user_id != user_id ? 'color:black;' : 'color:green;'}" data-message-id="${message.id}">
            </a>
            <ul id="drop" class="dropdown-menu" aria-labelledby="dropdownMenuLink${message.id}" style="background-color: #233138;">
                <li><a class="dropdown-item text-white reply-message" href="#" data-message-content="${message.message}">Reply</a></li>
                <li><a class="dropdown-item text-white react-message" href="#" onclick="toggleReact(${message.id})">React</a></li>
                ${message.user_id == user_id ? `
                    <li><a id="delete" class="dropdown-item text-white delete-grpmessage" href="#" data-message-id="${message.id}">Delete</a></li>
                    <li><a class="dropdown-item text-white edit-message" href="#" data-message-id="${message.id}">Edit</a></li>
                    ${message.status === 'deleted' ? `
                        <li><a class="dropdown-item text-white remove-message" href="#" data-message-id="${message.id}">Remove</a></li>
                    ` : ''}
                ` : ''}
            </ul>         
        </div>
    </div>
</div>
        `;
    });

    return chatContent;
}

 
function loadGroupMessage(groupId, groupName) {
    var user_id = @json(auth()->user()->id);

    $.ajax({
        url: '/group-chat/' + groupId,
        method: 'GET',
        success: function(response) {
            if (response.success && response.messages) {
                var messages = response.messages;
                var chatContent = HtmlGroupChat(messages, user_id);
                $('#chat-grpcontent').empty();
                $('#chat-grpcontent').append(chatContent);
            } else {
              
            }
        },
        error: function(xhr) {
            alert('An error occurred: ' + xhr.responseText);
             
        }
    });
}


$(document).on('click', '.remove-grpmessage', function(event) {
        event.preventDefault();
        let messageId = $(this).data('message-id');
          
            $.ajax({
                url: `/grpmessages/${messageId}`,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                     
                    $(`#message-${messageId}`).remove();
                   
                     
                },
                error: function(xhr) {
                    alert('Error deleting message');
                }
            });     
    });


     


    function toggleReact(conversationId) {
        var reactDiv = document.getElementById('react-' + conversationId);
        if (reactDiv.style.display === 'none' || reactDiv.style.display === '') {
            reactDiv.style.display = 'block';
        } else {
            reactDiv.style.display = 'none';
        }
    }

    function savegrpReact(conversationId, emojiSrc) {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/save-grpreact",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        data: {
            conversation_id: conversationId,
            emoji: emojiSrc
        },
        success: function(response) {
          
        },
        error: function(xhr, status, error) {
            
        }
    });
}

$(document).on('click', '.delete-grpmessage', function(e) {
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
               url: '/delete-grpmessage/' + messageId,
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
               
               }
           });
       } else {       
           swal.fire("Message is safe!", {
           icon: "info",
           });
       }
   });
});
 
</script>
 
 

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
   
   window.location.href = "/profile";
   },
   error: function(xhr, status, error) {
    
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
 
<script>
    function toggleReact(conversationId) {
        var reactDiv = document.getElementById('react-' + conversationId);
        if (reactDiv.style.display === 'none' || reactDiv.style.display === '') {
            reactDiv.style.display = 'block';
        } else {
            reactDiv.style.display = 'none';
        }
    }

    function saveReact(conversationId, emojiSrc) {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: "/save-react",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        data: {
            conversation_id: conversationId,
            emoji: emojiSrc
        },
        success: function(response) {
          
        },
        error: function(xhr, status, error) {
            
        }
    });
}

</script>

<script type="text/javascript">
  
   var lastCheckedTimestamp = null;
   //var latestMessageTimestamp = 0;

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

   $('#submitMessage').click(function(e) {
    e.preventDefault();
       sendMessage();  
   })

    
   $(document).on('click', '.user-chat-link', function(e) {
    e.preventDefault();
    
    var userId = $(this).data('user-id');
    var userName = $(this).data('user-name');
    var userImage = $(this).data('user-image');
    var backImage = $(this).data('user-backimage');  
    
    if (backImage) {
        $('#chat-container').css('background-image', 'url(' + backImage + ')');
    } else {
       
    }
    
    $('#selected-user-name').text(userName);
    $('#selected-user-image').attr('src', userImage);
    
    fetchConversations(userId);
    setupWallpaperChange(userId);

    window.history.pushState({}, '', '/messages/' + userId);
    loadUserChat(userId);
});

   function loadUserChat(userId) {
   
   var user_id = "{{ Auth::user()->id }}";
   $.ajax({
       url: "/load-chat/" + userId,
       method: "GET",
       success: function(response) {
        
           if (response && Array.isArray(response.conversations)) {
               $('#chat-content').empty();
               var conversations = response.conversations;
                           
               if (conversations.length > 0 || updatedConversations.length > 0) {
                   conversations.forEach(function(conversation) {
                       var messageHtml = Html(conversation, user_id);
                       $('#chat-content').append(messageHtml);
                       lastCheckedTimestamp = conversation.uniquetimestamp;
                   });
                  
               }
           } else {
               $('#chat-content').empty();    
           }
       },
       error: function(xhr, status, error) {
            
       }
   });
}
  
   $('[name="message"]').keypress(function(e) {
   if (e.which === 13) {
   e.preventDefault();  
   }
   }); 

function Html(conversation, user_id) {
    
   var deleteButton = (conversation.user_id == user_id) ? `<a style="color:white" class="delete-message btn-sm  position-absolute  top-0 start-0 mt-1 ms-1" data-message-id="${conversation.id}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>` : '';
   var createdAt = new Date(conversation.created_at);
   var formattedDate = createdAt.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric' });
   var user_id = @json(auth()->user()->id);
   var messageStyle = (conversation.user_id == user_id) ? 'text-right' : '';    
   messageStyle += (conversation.user_id == user_id) ? ' ml-50' : '';
   var messageHtml = '';

   

   var seenStatusSvg = (conversation.seen_status == 1) ? 
   `<svg style="color:#4fb9e3" viewBox="0 0 16 11" height="11" width="16" preserveAspectRatio="xMidYMid meet" fill="none">
 <title>msg-dblcheck</title>
 <path d="M11.0714 0.652832C10.991 0.585124 10.8894 0.55127 10.7667 0.55127C10.6186 0.55127 10.4916 0.610514 10.3858 0.729004L4.19688 8.36523L1.79112 6.09277C1.7488 6.04622 1.69802 6.01025 1.63877 5.98486C1.57953 5.95947 1.51817 5.94678 1.45469 5.94678C1.32351 5.94678 1.20925 5.99544 1.11192 6.09277L0.800883 6.40381C0.707784 6.49268 0.661235 6.60482 0.661235 6.74023C0.661235 6.87565 0.707784 6.98991 0.800883 7.08301L3.79698 10.0791C3.94509 10.2145 4.11224 10.2822 4.29844 10.2822C4.40424 10.2822 4.5058 10.259 4.60313 10.2124C4.70046 10.1659 4.78086 10.1003 4.84434 10.0156L11.4903 1.59863C11.5623 1.5013 11.5982 1.40186 11.5982 1.30029C11.5982 1.14372 11.5348 1.01888 11.4078 0.925781L11.0714 0.652832ZM8.6212 8.32715C8.43077 8.20866 8.2488 8.09017 8.0753 7.97168C7.99489 7.89128 7.8891 7.85107 7.75791 7.85107C7.6098 7.85107 7.4892 7.90397 7.3961 8.00977L7.10411 8.33984C7.01947 8.43717 6.97715 8.54508 6.97715 8.66357C6.97715 8.79476 7.0237 8.90902 7.1168 9.00635L8.1959 10.0791C8.33132 10.2145 8.49636 10.2822 8.69102 10.2822C8.79681 10.2822 8.89838 10.259 8.99571 10.2124C9.09304 10.1659 9.17556 10.1003 9.24327 10.0156L15.8639 1.62402C15.9358 1.53939 15.9718 1.43994 15.9718 1.32568C15.9718 1.1818 15.9125 1.05697 15.794 0.951172L15.4386 0.678223C15.3582 0.610514 15.2587 0.57666 15.1402 0.57666C14.9964 0.57666 14.8715 0.635905 14.7657 0.754395L8.6212 8.32715Z" fill="currentColor"></path>
</svg>
` : 
   `<svg viewBox="0 0 12 11" height="11" width="16" preserveAspectRatio="xMidYMid meet" fill="none">
 <title>msg-check</title>
 <path d="M11.1549 0.652832C11.0745 0.585124 10.9729 0.55127 10.8502 0.55127C10.7021 0.55127 10.5751 0.610514 10.4693 0.729004L4.28038 8.36523L1.87461 6.09277C1.8323 6.04622 1.78151 6.01025 1.72227 5.98486C1.66303 5.95947 1.60166 5.94678 1.53819 5.94678C1.407 5.94678 1.29275 5.99544 1.19541 6.09277L0.884379 6.40381C0.79128 6.49268 0.744731 6.60482 0.744731 6.74023C0.744731 6.87565 0.79128 6.98991 0.884379 7.08301L3.88047 10.0791C4.02859 10.2145 4.19574 10.2822 4.38194 10.2822C4.48773 10.2822 4.58929 10.259 4.68663 10.2124C4.78396 10.1659 4.86436 10.1003 4.92784 10.0156L11.5738 1.59863C11.6458 1.5013 11.6817 1.40186 11.6817 1.30029C11.6817 1.14372 11.6183 1.01888 11.4913 0.925781L11.1549 0.652832Z" fill="currentColor"></path>
</svg>
`;

   if (conversation.video) {
       var videoUrl = '{{ asset('') }}' + conversation.video.trim();
       var videoHtml = `
           <video controls style="width:50%">
               <source src="${videoUrl}" type="video/mp4">
           </video>
       `;

       messageHtml = `
           <div class="card position-relative" style="border:none; background:none !important">
               <div style="font-weight:bolder" class="card-body text-black ${messageStyle}">
                   ${videoHtml}
                   <br><br>
                   <i style="color:white">${formattedDate}</i>

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
               <div style="font-weight:bolder; " class="card-body ${messageStyle}">
                   ${imageHtml}
                   <br><br>
                   <i style="color:white">${formattedDate}</i>                  
               </div>
           </div><br>
       `;
   } else {
    messageHtml = `
 <div id="message-${conversation.id}" class="card position-relative" style="border:none;background:none;">
    <div style="font-weight:bolder; font-size:20px;" class="card-body text-white ${messageStyle}">
        <div style="position: relative;">

${conversation.reply_message_content ? `
    <div class="container-fluid vo" style="margin-top:-21px; ${conversation.user_id == user_id ? 'margin-left:650px; background-color:#005c4b;' : 'margin-left:-1px; background-color:#202c33;'} width:13%">
                    <div class="row">
                        <div class="col-2" style="background-color:#52bdeb;border-radius:5px 0px 0px 5px;">
                            <p style="display: none">nn</p>
                        </div>
                         <div class="col-10" style="${conversation.user_id == user_id ? 'background-color:#025244;' : 'background-color:#111b21;'} height:80px;padding:15px 0px 0px 20px;border-radius:0px 10px 10px 0px;width:95%;margin:4px 4px 4px 4px">  
                            <p style="font-size:17px; color: #dfe3e6; ${conversation.user_id == user_id ? 'margin-left:-25%; max-width: 80%;' : 'max-width: 80%;'}; letter-spacing: 1px;">${conversation.reply_message_content}</p>
                        </div>
                    </div>
                </div>
` : conversation.reply_status ? `
    <div class="container-fluid voO" style="margin-top:-21px; ${conversation.user_id == user_id ? 'margin-left:588px; background-color:#005c4b;' : 'margin-left:-1px; background-color:#202c33;'} width:13%">
        <div class="row">
            <div class="col-2" style="background-color:#52bdeb;border-radius:5px 0px 0px 5px;">
                <p style="display: none">nn</p>
            </div>
            <div class="col-10" style="${conversation.user_id == user_id ? 'background-color:#025244;' : 'background-color:#111b21;'} height:80px;padding:15px 0px 0px 20px;border-radius:0px 10px 10px 0px;width:95%;margin:4px 4px 4px;">  
                 ${(() => {
                    const replyStatus = conversation.reply_status;
                    const fileType = replyStatus.split('.').pop();
                    if (fileType.match(/jpg|jpeg|png|gif|jfif/i)) {
                        return `<img style="width:110%;height:75px;margin-top:-9%;margin-left:-20%" src="/${replyStatus}">`;
                    } else if (fileType.match(/mp4|webm|ogg/i)) {
                        return `<video controls class="vdoo" style=" "><source src="/${replyStatus}" type="video/mp4"></video>`;
                    } else {
                        return '';
                    }
                })()}
            </div>
        </div>
    </div>
` : ''}

             <div id="react-${conversation.id}" class="col-4" style="display: none; background-color:#222e36; height:70px; border-radius:20px;">
                <div class="row">
                    <div class="col-2 mt-1 mx-4">
                        <img style="width:130%;height:45px;border-radius:45%;" src="{{ asset('emoji.jfif') }}" alt="Emoji 1" onclick="saveReact(${conversation.id}, 'emoji.jfif')">
                    </div>
                    <div class="col-2 mt-1">
                        <img style="width:130%;height:45px;border-radius:45%;" src="{{ asset('emoji1.jfif') }}" alt="Emoji 2" onclick="saveReact(${conversation.id}, 'emoji1.jfif')">
                    </div>
                    <div class="col-2 mt-1 mx-4">
                        <img style="width:130%;height:45px;border-radius:45%;" src="{{ asset('emoji2.jfif') }}" alt="Emoji 3" onclick="saveReact(${conversation.id}, 'emoji2.jfif')">
                    </div>
                    <div class="col-2 mt-1">
                        <img style="width:130%;height:45px;border-radius:45%;" src="{{ asset('emoji3.jfif') }}" alt="Emoji 4" onclick="saveReact(${conversation.id}, 'emoji3.jfif')">
                    </div>
                </div>
            </div>

            <div class="message-content" style="font-size:17px;background:${conversation.user_id == user_id ? '#005c4b' : '#202c33'} !important; display:inline-block; padding:5px 5px 0px 10px; border-radius:${conversation.user_id == user_id ? '10px 0px 10px 10px' : '10px 10px 10px 0px'}; color: #dfe3e6; ${conversation.user_id == user_id ? 'margin-left: auto; max-width: 80%;' : 'max-width: 80%;'}; letter-spacing: 1px;">
             
                ${conversation.message}

                <br>
                ${conversation.edit_status === 'Edited' ? '<span style="color:#8b989e;font-size:12px">Edited</span>' : ''}
                <p style="font-size:15px;color:#a6abad;display:inline;">${formattedDate}</p>
                ${conversation.user_id == user_id ? seenStatusSvg : ''}
            </div>

             ${conversation.react_message ? `
                <div style="margin-top: 10px;">
                    <p><img style="width: 30px; height: 30px; border-radius: 50%;" src="{{ asset('${conversation.react_message}') }}" alt="React Emoji"></p>
                </div>
            ` : ''}
            
            <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink${conversation.id}" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:transparent; border:none; position: absolute; top: 0; ${conversation.user_id == user_id ? 'right: 90px;' : 'left: 70px;'} margin-top:25px; ${conversation.user_id != user_id ? 'color:black;' : 'color:green;'}" data-message-id="${conversation.id}">
            </a>
            <ul id="drop" class="dropdown-menu" aria-labelledby="dropdownMenuLink${conversation.id}" style="background-color: #233138;">
                <li><a class="dropdown-item text-white reply-message" href="#" data-message-content="${conversation.message}">Reply</a></li>
                <li><a class="dropdown-item text-white react-message" href="#" onclick="toggleReact(${conversation.id})">React</a></li>
                ${conversation.user_id == user_id ? `
                    <li><a id="delete" class="dropdown-item text-white delete-message" href="#" data-message-id="${conversation.id}">Delete</a></li>
                    <li><a class="dropdown-item text-white edit-message" href="#" data-message-id="${conversation.id}">Edit</a></li>
                    ${conversation.status === 'deleted' ? `
                        <li><a class="dropdown-item text-white remove-message" href="#" data-message-id="${conversation.id}">Remove</a></li>
                    ` : ''}
                ` : ''}
            </ul>         
        </div>
    </div>
</div>
<br>

`;
   }

   return messageHtml;
}

$(document).on('click', '#replyMessage', function(e) {
    e.preventDefault();

    var message = $('.inp').val().trim();
    var statusUserId = $('#statusUserId').val();
    var messageId = $('#message_id').val();

    

    $.ajax({
        url: '{{ route('reply.status') }}',
        method: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            message: message,
            status_user_id: statusUserId,
            message_id: messageId,
        },
        success: function(response) {
          
            if (response.success) {
                $('.inp').val('');
                 
            }
        },
        error: function(response) {
            
        }
    });
});

$(document).on('click', '.reply-message', function(event) {
    event.preventDefault();
    var messageContent = $(this).data('message-content');
    $('#reply-message').text(messageContent);  
    $('#replyMessage').val(messageContent);  
    $('#reply').show();  
});

$('#reply').hide();    
$('#hideReply').click(function() {
    $('#reply').toggle();
});
 
$(document).on('click', '.remove-message', function(event) {
        event.preventDefault();
        let messageId = $(this).data('message-id');
          
            $.ajax({
                url: `/messages/${messageId}`,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                     
                    $(`#message-${messageId}`).remove();
                   
                     
                },
                error: function(xhr) {
                    alert('Error deleting message');
                }
            });     
    });

let currentMessageId = null;

$(document).on('click', '.edit-message', function(event) {
    event.preventDefault();
    currentMessageId = $(this).data('message-id');
    let currentMessage = $(this).closest('.card-body').find('.message-content').contents().filter(function() {
        return this.nodeType === 3;
    }).text().trim();
    $('#editMessageInput').val(currentMessage).data('message-id', currentMessageId).focus();
});

$('#editMessageInput').on('keypress', function(event) {
    if (event.which == 13 && currentMessageId) {  
        event.preventDefault();  
        let updatedMessage = $(this).val().trim();
        let inputField = $(this);  

        if (currentMessageId && updatedMessage) {
            $.ajax({
                url: `/messages/${currentMessageId}`,
                type: 'PUT',
                data: {
                    message: updatedMessage,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        inputField.val('').focus(); 
                        currentMessageId = null;
                    }
                },
                error: function(xhr) {
                    alert('Error updating message');
                }
            });
        }
    }
});

$(document).on('keydown', function(e) {
    if (e.which === 38) {   
        e.preventDefault();
        getLastMessage();
    }
});

function getLastMessage() {
    $.ajax({
        url: "{{ route('getLastMessage') }}",
        method: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if (response.success) {
                var lastMessage = response.lastMessage;
                $('#editMessageInput').val(lastMessage.message).focus();
                currentMessageId = lastMessage.id;
            }
        },
        error: function(xhr, status, error) {
            
        }
    });
}

function sendMessage() {
    var formData = new FormData();
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    formData.append('message_id', $('[name="message_id"]').val());
    var messageInput = $('[name="message"]').val().trim();
    var replyMessage = $('#replyMessage').val().trim(); 
     

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

    if (replyMessage !== '') {
        formData.append('reply_message_content', replyMessage);  
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
            $('#video-upload').val('');
            $('#replyMessage').val('');  
            updateLastSeen();   
            $('#reply').hide();   
        },
        error: function(xhr, status, error) {
             
        }
    });
}

/*var typingTimer;
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

setInterval(checkTypingStatus, 2000);*/

   function updateLastSeen() {
   $.ajax({
       url: "{{ route('update.last.seen') }}",
       method: 'post',
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       },
       success: function(response) {
           if (response.success) {
               
           }
       },
       error: function(xhr, status, error) {
         
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
               loadingMessages = false;
           }
       },
       error: function(xhr, status, error) {
        
           loadingMessages = false;
       }
   });
}

fetchConversations();
setInterval(function() {
   fetchConversations();
}, 2000);

document.getElementById('searchText').addEventListener('input', function () {
    var searchText = this.value.toLowerCase();
    var sideBar = document.querySelector('.sideBar');
    var sideBarItems = sideBar.querySelectorAll('.sideBar-body');

    sideBarItems.forEach(function (item) {
        var messageElement = item.querySelector('#message');
        if (messageElement) {
            var message = messageElement.innerText.toLowerCase();
            if (message.indexOf(searchText) !== -1) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        }
    });
});

function setupWallpaperChange(userId) {
                               
               $('.wallpaper').off('click').on('click', function(e) {
                   e.preventDefault();
                  
                   $('#file-input').click();
               });
             
               $('#file-input').off('change').on('change', function(event) {
                   

                   var file = event.target.files[0];
                   if (!file) {
                      
                       return;
                   }

                   var formData = new FormData();
                   formData.append('background_image', file);

                   $.ajax({
                       url: '/update-background-image/' + userId,
                       method: 'post',
                       data: formData,
                       contentType: false,
                       processData: false,
                       headers: {
                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       },
                       success: function(response) {
                           if (response.success) {
                              
                               var imageUrl = URL.createObjectURL(file);
                               $('#chat-container').css('background-image', 'url(' + imageUrl + ')');
                           } else {
                              
                           }
                       },
                       error: function(xhr, status, error) {
                            
                       }
                   });
               });
           }
          
           var UserId = $('#selected-user-name').data('user-id');
           if (UserId) {
               setupWallpaperChange(UserId);
           }
       });


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
               
               }
           });
       } else {       
           swal.fire("Message is safe!", {
           icon: "info",
           });
       }
   });
});

</script>
</body>
</html>