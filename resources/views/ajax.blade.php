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

$(".pluss").click(function() {
        $("#document").fadeIn();
        $(".pluss").hide();
        $(".bckdocument").show();
         
      
    });


    $(".bckdocument").click(function() {
        $("#document").fadeOut();
        $(".pluss").show();
        $(".bckdocument").hide();
         
      
    });


    $("#pollopen").click(function() {
        $("#poll").fadeIn(200);   
        $("#document").fadeOut(); 
        $(".pluss").show();
        $(".bckdocument").hide();

    });

    $(".closepoll").click(function() {
        $("#poll").fadeOut(200);     
    });


    </script>


   <script>
    
    function setupEmojiListeners() {
      
        const emojis = document.querySelectorAll('.showemojis');
 
        emojis.forEach(emoji => {
            emoji.addEventListener('click', function() {
              
                const selectedEmoji = this.textContent;
 
                const inputField = document.getElementById('editMessageInput');

               
                inputField.value += selectedEmoji;
            });
        });
    }

 
    setupEmojiListeners();
</script>

   <script>
$(".microphone").click(function() {
    $(".emojis").fadeIn(200);    
    $(".smily1").fadeOut(200);   
    $("#bcksmily").fadeIn(200);  
});

$("#bcksmily").click(function() {
    $(".emojis").fadeOut(200);   
    $(".smily1").fadeIn(200);    
    $("#bcksmily").fadeOut(200);  
});

document.addEventListener('DOMContentLoaded', function () {
    const recentEmojis = document.getElementById('emoji1');
    const peopleEmojis = document.getElementById('emoji2');
    const animalEmojis = document.getElementById('emojii3');
    const foodEmojis = document.getElementById('emoji4');
    const activityEmojis = document.getElementById('emoji5');
    const travelEmojis = document.getElementById('emoji6');
    const objectsEmojis = document.getElementById('emoji7');
    const flagsEmojis = document.getElementById('emoji8');

    const recentContainer = document.getElementById('recent');
    const peopleContainer = document.getElementById('smileyy');
    const animalContainer = document.getElementById('animalll');
    const foodContainer = document.getElementById('food');
    const activityContainer = document.getElementById('activity');
    const travelContainer = document.getElementById('travel');
    const objectsContainer = document.getElementById('objects');
    const flagsContainer = document.getElementById('flags');

    function scrollToContainer(container) {
        container.scrollIntoView({ behavior: 'smooth' });
        document.querySelectorAll('.emoji-category').forEach(c => c.classList.remove('active'));
        container.classList.add('active');
    }

    recentEmojis.addEventListener('click', function () {
        console.log('Recent clicked');
        scrollToContainer(recentContainer);
    });

   
        peopleEmojis.addEventListener('click', function () {
            console.log('People clicked');
            scrollToContainer(peopleContainer);
        });
     

    animalEmojis.addEventListener('click', function () {
        console.log('Animal clicked');
        scrollToContainer(animalContainer);
    });

    foodEmojis.addEventListener('click', function () {
        console.log('Food clicked');
        scrollToContainer(foodContainer);
    });

    activityEmojis.addEventListener('click', function () {
        console.log('Activity clicked');
        scrollToContainer(activityContainer);
    });

    travelEmojis.addEventListener('click', function () {
        console.log('Travel clicked');
        scrollToContainer(travelContainer);
    });

    objectsEmojis.addEventListener('click', function () {
        console.log('Objects clicked');
        scrollToContainer(objectsContainer);
    });

    flagsEmojis.addEventListener('click', function () {
        console.log('Flags clicked');
        scrollToContainer(flagsContainer);
    });
});



    </script>


   <script>
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('searchmessages').addEventListener('input', function() {
        var searchText = this.value.toLowerCase();
        console.log('Search Text:', searchText);

        var chatContent = document.getElementById('chat-content');
        var messages = chatContent.querySelectorAll('.message-content');
        var resultsContainer = document.getElementById('search-results');

        resultsContainer.innerHTML = '';

        if (searchText === '') {
            resultsContainer.style.display = 'none';
            return;
        }

        var foundMessages = 0;
        messages.forEach(function(message, index) {
            if (message.textContent.toLowerCase().includes(searchText)) {
                var resultDiv = document.createElement('div');
                resultDiv.className = 'message-content';
                resultDiv.textContent = message.textContent;
                resultDiv.dataset.index = index;  
                resultsContainer.appendChild(resultDiv);
                foundMessages++;
            }
        });

        if (foundMessages > 0) {
            resultsContainer.style.display = 'block';
        } else {
            resultsContainer.style.display = 'none';
        }
    });

    
    document.getElementById('search-results').addEventListener('click', function(event) {
        if (event.target.classList.contains('message-content')) {
            var index = event.target.dataset.index;
            scrollToMessage(index);
        }
    });
});

function scrollToMessage(index) {
    var chatContent = document.getElementById('chat-content');
    var messages = chatContent.querySelectorAll('.message-content');

    if (messages[index]) {
        messages[index].scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
}

     


    document.getElementById('searchSvg').addEventListener('click', function() {
    var div = document.getElementById('div3');

    div.classList.remove('col-lg-7');
    div.classList.add('col-4');

    var anchor = document.getElementById('selected-user-name');
    anchor.style.marginLeft = '35px';

    var grpnme = document.getElementById('selected-group-name');
    grpnme.style.marginLeft = '35px';

    var lastSeen = document.getElementById('last-seen');
    lastSeen.style.marginLeft = '35px';

    var svg1 = document.getElementById('svg1');
    svg1.style.marginLeft = '-20px';

    var svg2 = document.getElementById('SVG2');
    svg2.style.marginTop = '-50px';

    var searchSvg = document.getElementById('searchSvg');
    searchSvg.style.marginLeft = '8px';

    var menu = document.getElementById('menu');
    menu.style.marginLeft = '5px';

    var smily = document.getElementById('smily');
    smily.style.marginLeft = '-5px';

    var submitMessage = document.getElementById('submitMessage');
    submitMessage.style.marginLeft = '5px';

    var submitgrpMessage = document.getElementById('submitgrpMessage');
    submitgrpMessage.style.marginLeft = '5px';
    submitgrpMessage.style.marginTop = '10px';
});

    </script>
 
 
 
    <script>
        document.getElementById('end').addEventListener('click', function() {
           
            var div3 = document.getElementById('div3');
            var show = document.getElementById('show');
 
            div3.classList.remove('col-lg-7');
            div3.classList.add('col-lg-7');

            var anchor = document.getElementById('selected-user-name');
            anchor.style.marginLeft = '-10px';
 
            var grpnme = document.getElementById('selected-group-name');
            grpnme.style.marginLeft = '-10px';

            var lastSeen = document.getElementById('last-seen');
            lastSeen.style.marginLeft = '-10px';

            var svg1 = document.getElementById('svg1');
            svg1.style.marginLeft = '32px';

            var menu = document.getElementById('menu');
            menu.style.marginLeft = '15px';

            var searchSvg = document.getElementById('searchSvg');
            searchSvg.style.marginLeft = '40px';

            var svg2 = document.getElementById('SVG2');
            svg2.style.marginTop = '22px';

            var smily = document.getElementById('smily');
            smily.style.marginLeft = '10px';
                 
            show.style.display = 'none';        
            div3.style.display = 'block';  
        });
        </script>
        

      



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

    $("#searchSvg").click(function() {
        $("#show").show();    
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
        $(".sendbrdcst").hide();

    });


    $(".broadcast-chat-link").click(function() {      

$(".usr").hide();
$(".brodcastgroupp").show(); 

$(".userimage").hide();
$(".broadcastimage").show();
});


    $(".group-chat-link").click(function() {      

        $(".usr").hide();
        $(".groupp").show(); 

        $(".userimage").hide();
        $(".groupimage").show();
        $(".brodcastgroupp").hide();
        $(".broadcastimage").hide();
        $(".sendbrdcst").hide();
    });

     
    $(".user-chat-link").click(function() {        
        $(".groupp").hide(); 
        $(".usr").show();

        $(".groupimage").hide();
        $(".userimage").show();
        $(".brodcastgroupp").hide();
        $(".broadcastimage").hide();
    });


    


    $(".group-chat-link").click(function() {        
        $("#chat-content").hide();
        $("#chat-grpcontent").show(); 
        $("#chat-broadcastcontent").hide(); 
    });


    $(".user-chat-link").click(function() {        
        $("#chat-content").show();
        $("#chat-grpcontent").hide(); 
        $("#chat-broadcastcontent").hide(); 
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
    var replyMessage = $('#replyMessage').val().trim(); 

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
                $('#reply').hide();

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

var fetchGroupConversationsPollingFlag = true;

function fetchGroupConversations() {

    fetchGroupConversationsPollingFlag = false;
    
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

            fetchGroupConversationsPollingFlag = true;
        },
        error: function(xhr, status, error) {
            console.error('Error fetching group conversations:', error);
            fetchGroupConversationsPollingFlag = true;
        }
    });
}

 
fetchGroupConversations();
setInterval(function() {

    if(fetchGroupConversationsPollingFlag){
        fetchGroupConversations();
    }
    
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
    <div id="fluidDiv" class="container-fluid zo" style="margin-top:-21px; ${message.user_id == user_id ? 'margin-left:590px; background-color:#005c4b;' : 'margin-left:-1px; background-color:#202c33;'}>
                    <div class="row">

                        <div class="col-2" style="background-color:#52bdeb;border-radius:5px 0px 0px 5px;">
                            <p style="display: none">nn</p>
                        </div>

                         <div class="col-10" style="${message.user_id == user_id ? 'background-color:#025244;' : 'background-color:#111b21;'} height:80px;padding:15px 0px 0px 20px;border-radius:0px 10px 10px 0px;width:95%;margin:4px 4px 4px 4px">  
                            <p style="font-size:17px; color: #dfe3e6; ${message.user_id == user_id ? 'margin-left:-20%; max-width: 80%;' : 'max-width: 80%;'}; letter-spacing: 1px;">${message.reply_message_content}</p>
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
                <li><a class="dropdown-item text-white react-grpmessage" href="#" onclick="toggleReact(${message.id})">React</a></li>
                ${message.user_id == user_id ? `
                    <li><a id="delete" class="dropdown-item text-white delete-grpmessage" href="#" data-message-id="${message.id}">Delete</a></li>
                    <li><a class="dropdown-item text-white edit-grpmessage" href="#" data-message-id="${message.id}">Edit</a></li>
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


$(document).on('click', '.reply-grpmessage', function(event) {

    event.preventDefault();
    var messageContent = $(this).data('message-content');

    $('.replygrpmsg').text(messageContent);  
    $('#replyMessage').val(messageContent);  

    $('#reply').show();  
});
 
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


let currentMessageId = null;

$(document).on('click', '.edit-grpmessage', function(event) {

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
                url: `/messagesgrp/${currentMessageId}`,
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
   

   $(document).ready(function() {

   getLastCheckedTimestamp(false);


   $('#pdf-upload-icon').click(function() {
       $('#pdf-upload').click();  
   });

   $('#pdf-upload').change(function() {
       var file = this.files[0];
       $('#pdfupload').val(file.name);  
   });



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

   $('#submitpollMessage').click(function(e) {
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
 <title></title>
 <path d="M11.0714 0.652832C10.991 0.585124 10.8894 0.55127 10.7667 0.55127C10.6186 0.55127 10.4916 0.610514 10.3858 0.729004L4.19688 8.36523L1.79112 6.09277C1.7488 6.04622 1.69802 6.01025 1.63877 5.98486C1.57953 5.95947 1.51817 5.94678 1.45469 5.94678C1.32351 5.94678 1.20925 5.99544 1.11192 6.09277L0.800883 6.40381C0.707784 6.49268 0.661235 6.60482 0.661235 6.74023C0.661235 6.87565 0.707784 6.98991 0.800883 7.08301L3.79698 10.0791C3.94509 10.2145 4.11224 10.2822 4.29844 10.2822C4.40424 10.2822 4.5058 10.259 4.60313 10.2124C4.70046 10.1659 4.78086 10.1003 4.84434 10.0156L11.4903 1.59863C11.5623 1.5013 11.5982 1.40186 11.5982 1.30029C11.5982 1.14372 11.5348 1.01888 11.4078 0.925781L11.0714 0.652832ZM8.6212 8.32715C8.43077 8.20866 8.2488 8.09017 8.0753 7.97168C7.99489 7.89128 7.8891 7.85107 7.75791 7.85107C7.6098 7.85107 7.4892 7.90397 7.3961 8.00977L7.10411 8.33984C7.01947 8.43717 6.97715 8.54508 6.97715 8.66357C6.97715 8.79476 7.0237 8.90902 7.1168 9.00635L8.1959 10.0791C8.33132 10.2145 8.49636 10.2822 8.69102 10.2822C8.79681 10.2822 8.89838 10.259 8.99571 10.2124C9.09304 10.1659 9.17556 10.1003 9.24327 10.0156L15.8639 1.62402C15.9358 1.53939 15.9718 1.43994 15.9718 1.32568C15.9718 1.1818 15.9125 1.05697 15.794 0.951172L15.4386 0.678223C15.3582 0.610514 15.2587 0.57666 15.1402 0.57666C14.9964 0.57666 14.8715 0.635905 14.7657 0.754395L8.6212 8.32715Z" fill="currentColor"></path>
</svg>
` : 
   `<svg viewBox="0 0 12 11" height="11" width="16" preserveAspectRatio="xMidYMid meet" fill="none">
 <title>msg-check</title>
 <path d="M11.1549 0.652832C11.0745 0.585124 10.9729 0.55127 10.8502 0.55127C10.7021 0.55127 10.5751 0.610514 10.4693 0.729004L4.28038 8.36523L1.87461 6.09277C1.8323 6.04622 1.78151 6.01025 1.72227 5.98486C1.66303 5.95947 1.60166 5.94678 1.53819 5.94678C1.407 5.94678 1.29275 5.99544 1.19541 6.09277L0.884379 6.40381C0.79128 6.49268 0.744731 6.60482 0.744731 6.74023C0.744731 6.87565 0.79128 6.98991 0.884379 7.08301L3.88047 10.0791C4.02859 10.2145 4.19574 10.2822 4.38194 10.2822C4.48773 10.2822 4.58929 10.259 4.68663 10.2124C4.78396 10.1659 4.86436 10.1003 4.92784 10.0156L11.5738 1.59863C11.6458 1.5013 11.6817 1.40186 11.6817 1.30029C11.6817 1.14372 11.6183 1.01888 11.4913 0.925781L11.1549 0.652832Z" fill="currentColor"></path>
</svg>
`;

if (conversation.video) {
    const isSender = conversation.user_id === user_id;

const replyContent = conversation.reply_message_content ? `
    <div class="container-fluid vo" style="margin-top:-21px; ${isSender ? 'margin-left:650px; background-color:#005c4b;' : 'margin-left:-1px; background-color:#202c33;'} width:13%">
        <div class="row">
            <div class="col-2" style="background-color:#52bdeb;border-radius:5px 0px 0px 5px;">
                <p style="display: none">nn</p>
            </div>
            <div class="col-10" style="${isSender ? 'background-color:#025244;' : 'background-color:#111b21;'} height:80px;padding:15px 0px 0px 20px;border-radius:0px 10px 10px 0px;width:95%;margin:4px 4px 4px 4px">  
                <p style="font-size:17px; color: #dfe3e6; ${isSender ? 'margin-left:-25%; max-width: 80%;' : 'max-width: 80%;'}; letter-spacing: 1px;">${conversation.reply_message_content}</p>
            </div>
        </div>
    </div>` : 
conversation.reply_status ? `
    <div class="container-fluid voO" style="margin-top:-21px; ${isSender ? 'margin-left:588px; background-color:#005c4b;' : 'margin-left:-1px; background-color:#202c33;'} width:13%">
        <div class="row">
            <div class="col-2" style="background-color:#52bdeb;border-radius:5px 0px 0px 5px;">
                <p style="display: none">nn</p>
            </div>
            <div class="col-10" style="${isSender ? 'background-color:#025244;' : 'background-color:#111b21;'} height:80px;padding:15px 0px 0px 20px;border-radius:0px 10px 10px 0px;width:95%;margin:4px 4px 4px;">
                ${(() => {
                    const replyStatus = conversation.reply_status;
                    const fileType = replyStatus.split('.').pop();
                    if (fileType.match(/jpg|jpeg|png|gif|jfif/i)) {
                        return `<img style="width:110%;height:75px;margin-top:-9%;margin-left:-20%" src="/${replyStatus}">`;
                    } else if (fileType.match(/mp4|webm|ogg/i)) {
                        return `<video controls class="vdoo" style="width:100%;height:100%;object-fit:cover;"><source src="/${replyStatus}" type="video/${fileType}"></video>`;
                    } else {
                        return '';
                    }
                })()}
            </div>
        </div>
    </div>` : '';

const dropdownMenu = `
    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink${conversation.id}" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:transparent; border:none; position: absolute; top:490px; ${isSender ? 'right: 90px;' : 'left: 70px;'} margin-top:25px; ${isSender ? 'color:green;' : 'color:black;'}" data-message-id="${conversation.id}">
    </a>
    <ul id="drop" class="dropdown-menu" aria-labelledby="dropdownMenuLink${conversation.id}" style="background-color: #233138;">
        <li><a class="dropdown-item text-white reply-message" href="#" data-message-content="${conversation.message}">Reply</a></li>
        <li><a class="dropdown-item text-white react-message" href="#" onclick="toggleReact(${conversation.id})">React</a></li>
        ${isSender ? `
            <li><a id="delete" class="dropdown-item text-white delete-message" href="#" data-message-id="${conversation.id}">Delete</a></li>
            <li><a class="dropdown-item text-white edit-message" href="#" data-message-id="${conversation.id}">Edit</a></li>
            ${conversation.status === 'deleted' ? `
                <li><a class="dropdown-item text-white remove-message" href="#" data-message-id="${conversation.id}">Remove</a></li>
            ` : ''}
        ` : ''}
    </ul>`;

messageHtml = `
    <div id="message-${conversation.id}" class="card position-relative" style="border:none;background:none;">
        <div style="font-weight:bolder; font-size:20px;" class="card-body text-white ${messageStyle}">
            <div style="position: relative;">
                ${replyContent}
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
                ${conversation.video ? `
                    <div class="imgcard card position-relative" style="background: ${isSender ? '#025244' : '#1c272e'}; ${isSender ? 'text-align: right; margin-left: auto;' : 'text-align: left; margin-right: auto;'} ">
                        <div class="card-body ${messageStyle}">
                            <div class="video-container" style="position: relative; width: 100%; height: 480px;">
                                <video class="clickable-video" controls style="width:100%; height:100%; object-fit: cover;" data-video-url="{{ asset('${conversation.video.trim()}') }}">
                                    <source src="{{ asset('${conversation.video.trim()}') }}">
                                </video>
                            </div>
                            <br>
                            <i style="color:white;font-size:15px">${formattedDate}</i>
                            ${isSender ? seenStatusSvg : ''}
                        </div>
                    </div>
                ` : ''}
                
                ${conversation.react_message ? `
                    <div style="margin-top: 10px;">
                        <p><img style="width: 30px; height: 30px; border-radius: 50%;" src="{{ asset('${conversation.react_message}') }}" alt="React Emoji"></p>
                    </div>
                ` : ''}
                ${dropdownMenu}
            </div>
        </div>
    </div>
`;



    $(document).on('click', '.clickable-video', function (e) {
    e.preventDefault();

    var videoUrl = $(this).data('video-url');
 
    $('#chat-container').fadeOut(200, function() {
        $('#video-viewer').fadeIn(200);
    });

    
    $('#video-column').html(`
        <video controls src="${videoUrl}" style="margin-top:60px;width:70%;height:750px;margin-left:40px"></video>
    `);
});

$(document).on('click', '#bckimg', function () {
    $('#video-viewer').fadeOut(200, function() {
        $('#chat-container').fadeIn(200);
    });
});




   } else if (conversation.image && !conversation.message) {
    const isSender = conversation.user_id === user_id;
    const replyContent = conversation.reply_message_content ? `
        <div class="container-fluid vo" style="margin-top:-21px; ${isSender ? 'margin-left:650px; background-color:#005c4b;' : 'margin-left:-1px; background-color:#202c33;'} width:13%">
            <div class="row">
                <div class="col-2" style="background-color:#52bdeb;border-radius:5px 0px 0px 5px;">
                    <p style="display: none">nn</p>
                </div>
                <div class="col-10" style="${isSender ? 'background-color:#025244;' : 'background-color:#111b21;'} height:80px;padding:15px 0px 0px 20px;border-radius:0px 10px 10px 0px;width:95%;margin:4px 4px 4px 4px">  
                    <p style="font-size:17px; color: #dfe3e6; ${isSender ? 'margin-left:-25%; max-width: 80%;' : 'max-width: 80%;'}; letter-spacing: 1px;">${conversation.reply_message_content}</p>
                </div>
            </div>
        </div>` : 
    conversation.reply_status ? `
        <div class="container-fluid voO" style="margin-top:-21px; ${isSender ? 'margin-left:588px; background-color:#005c4b;' : 'margin-left:-1px; background-color:#202c33;'} width:13%">
            <div class="row">
                <div class="col-2" style="background-color:#52bdeb;border-radius:5px 0px 0px 5px;">
                    <p style="display: none">nn</p>
                </div>
                <div class="col-10" style="${isSender ? 'background-color:#025244;' : 'background-color:#111b21;'} height:80px;padding:15px 0px 0px 20px;border-radius:0px 10px 10px 0px;width:95%;margin:4px 4px 4px;">
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
        </div>` : 
    '';

    const dropdownMenu = `
        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink${conversation.id}" data-bs-toggle="dropdown" aria-expanded="false" style="background-color:transparent; border:none; position: absolute; top:455px; ${isSender ? 'right: 90px;' : 'left: 70px;'} margin-top:25px; ${isSender ? 'color:green;' : 'color:black;'}" data-message-id="${conversation.id}">
        </a>
        <ul id="drop" class="dropdown-menu" aria-labelledby="dropdownMenuLink${conversation.id}" style="background-color: #233138;">
            <li><a class="dropdown-item text-white reply-message" href="#" data-message-content="${conversation.message}">Reply</a></li>
            <li><a class="dropdown-item text-white react-message" href="#" onclick="toggleReact(${conversation.id})">React</a></li>
            ${isSender ? `
                <li><a id="delete" class="dropdown-item text-white delete-message" href="#" data-message-id="${conversation.id}">Delete</a></li>
                <li><a class="dropdown-item text-white edit-message" href="#" data-message-id="${conversation.id}">Edit</a></li>
                ${conversation.status === 'deleted' ? `
                    <li><a class="dropdown-item text-white remove-message" href="#" data-message-id="${conversation.id}">Remove</a></li>
                ` : ''}
            ` : ''}
        </ul>`;

    messageHtml = `
        <div id="message-${conversation.id}" class="card position-relative" style="border:none;background:none;">
            <div style="font-weight:bolder; font-size:20px;" class="card-body text-white ${messageStyle}">
                <div style="position: relative;">
                    ${replyContent}
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

                    ${conversation.image && !conversation.message ? 
                        conversation.image.split(',').map(imageUrl => `
                            <div class="imgcard card position-relative" style="background: ${isSender ? '#025244' : '#1c272e'}; ${isSender ? 'text-align: right; margin-left: auto;' : 'text-align: left; margin-right: auto;'}">
                                <div class="card-body ${messageStyle}">
                                    <a id="imageopen" data-img-url="{{ asset('${imageUrl.trim()}') }}">
                                        <img src="{{ asset('${imageUrl.trim()}') }}" style="width:100%;height:470px">
                                    </a>
                                    <br>
                                    <i style="color:white;font-weight:lighter;font-size:15px">${formattedDate}</i>
                                    ${isSender ? seenStatusSvg : ''}
                                    
                                </div>
                            </div>
                        `).join('') : `
                        <div class="message-content" style="font-size:17px;background:${isSender ? '#005c4b' : '#202c33'} !important; display:inline-block; padding:5px 5px 0px 10px; border-radius:${isSender ? '10px 0px 10px 10px' : '10px 10px 10px 0px'}; color: #dfe3e6; ${isSender ? 'margin-left: auto; max-width: 80%;' : 'max-width: 80%;'}; letter-spacing: 1px;">
                            ${conversation.message}
                            <br>
                            ${conversation.edit_status === 'Edited' ? '<span style="color:#8b989e;font-size:12px">Edited</span>' : ''}
                            <p style="font-size:15px;color:#a6abad;display:inline;">${formattedDate}</p>
                            ${isSender ? seenStatusSvg : ''}
                        </div>
                    `}
                    ${conversation.react_message ? `
                        <div style="margin-top: 10px;">
                            <p><img style="width: 30px; height: 30px; border-radius: 50%;" src="{{ asset('${conversation.react_message}') }}" alt="React Emoji"></p>
                        </div>
                    ` : ''}
                    ${dropdownMenu}
                </div>
            </div>
        </div>
        `;


    $(document).on('click', '#imageopen', function (e) {
    e.preventDefault();

   
    var imageUrl = $(this).data('img-url');
    
   
    $('#chat-container').fadeOut(200, function() {
        $('#image-viewer').fadeIn(200);
    });
    
    
    $('#image-column').html(`<img src="${imageUrl}" style="margin-top:60px;width:70%;height:750px;margin-left:40px">`);
});


$(document).on('click', '#bckimg', function () {
    
    $('#image-viewer').fadeOut(200, function() {
        
        $('#chat-container').fadeIn(200);
    });
});





   }


   else if (conversation.questions) {
    var alignmentStyle = conversation.user_id == user_id ? 
        'text-align: ; margin-left: 770px;' : 
        'text-align: ; margin-right: 770px;';
    messageHtml = `
    
                <div id="message-${conversation.id}" class="col-4" style="border-radius:5px;background:${conversation.user_id == user_id ? '#005c4b' : '#202c33'} !important;height:300px;border-radius:5px ${alignmentStyle} ">
                    
                    <div class="col-12">
                        <h4 style="margin-left:20px;">${conversation.questions}</h4>
                    </div>

                    <div class="col-12">
                        <p style="margin-left:20px;color:#adb09e">Select one or more</p>
                    </div>

                    <div class="row" style="margin-top:30px">
                        <div class="col-2" style="margin-left:25px;">
                            <form>
                            <input type="checkbox" name="poll" id="circularCheckbox" style="display: none;">
                            <label  for="circularCheckbox" class="circular-label">
                                <svg  height="20" width="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M5 10L8 13L15 6" class="tick-mark" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </label>
                            </form>
                        </div>
                        
                        <div class="col-7">
                            <h4 style="margin-left:-20px;margin-top:3px">${conversation.option1}</h4>
                        </div>
                        
                        <div class="col-1">
                         <img style="width:20px;height:20px;border-radius:50%"  src="{{ asset('images/' . auth()->user()->image) }}">
                        </div>
                        
                      <div class="col-1">
                      <p id="pollValue" style="font-size:15px">${conversation.poll}</p>
                      </div>
${conversation.poll === 1
  ? '<hr style="width:70%; margin-left:20%; margin-top:-10px; height: 10px; background-color: #06cf9c; border: none; border-radius:10px; transition: background-color 0.3s ease;">'
  : conversation.poll === 0
    ? '<hr style="width:70%; margin-left:20%; margin-top:-10px; height: 10px; background-color: black; border: none; border-radius:10px; transition: background-color 0.3s ease;">'
    : '' 
}


                    </div>

                    <div class="row" style="margin-top:30px">
                        <div class="col-2" style="margin-left:25px;">

                            

                            <input type="checkbox" id="circularCheckbox2" style="display: none;">
                            <label for="circularCheckbox2" class="circular-label">
                                <svg height="20" width="20" viewBox="0 0 20 20" fill="none">
                                    <path d="M5 10L8 13L15 6" class="tick-mark22" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </label>
                        </div>
                        
                        <div class="col-7">
                            <h4 style="margin-left:-20px;margin-top:3px">${conversation.option2}</h4>
                        </div>
                        
                        <div class="col-1">
                          
                            <img style="width:20px;height:20px;border-radius:50%"  src="{{ asset('images/' . auth()->user()->image) }}">
                        </div>
                        
                        <div class="col-1">
                            <p style="font-size:15px">${conversation.poll2}</p>
                        </div>
                        
                       ${conversation.poll2 === 1
  ? '<hr style="width:70%; margin-left:20%; margin-top:-10px; height: 10px; background-color: #06cf9c; border: none; border-radius:10px; transition: background-color 0.3s ease;">'
  : conversation.poll2 === 0
    ? '<hr style="width:70%; margin-left:20%; margin-top:-10px; height: 10px; background-color: black; border: none; border-radius:10px; transition: background-color 0.3s ease;">'
    : '' 
}
                    </div>

                    <div class="row">
                        <div class="col-9">
                        </div>

                        <div class="col-3">
                            <span class="mx-4">${formattedDate}</span>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-4">
                        </div>

                        <div class="col-4">
                        <p id="polldetailsopen" data-poll-id="${conversation.id}" style="margin-left:15px">View Votes</p>

                        </div>
                        
                        <div class="col-4">
                        </div>
                    </div>
              
        
        </div>`;
 

        

       
$(document).on('click', '#polldetailsopen', function () {
    
    $('#polldetails').fadeIn(200, function() {
        
        
    });
});

 


$(document).on('click', '#polldetailsopen', function () {
    var pollId = $(this).data('poll-id');

    $.ajax({
        url: '/poll-details/' + pollId,
        method: 'GET',
        success: function(response) {
            if (response && response.id) {
                var pollHtml = Htmlpolldetails(response, @json(auth()->user()->id));
                $('#polldetails').html(pollHtml).show();
            } else {
                console.log('Error fetching poll details.');
            }
        },
        error: function(xhr) {
            console.log('AJAX error:', xhr.responseText);
        }
    });
});


    

   }

   
   else if (conversation.pdf) {
    var baseUrl = '{{ asset('') }}'; 
    var pdfUrl = baseUrl + conversation.pdf.trim(); 
    var pdfDiv = document.getElementById('pdf');   

    

    var filePath = conversation.pdf.trim();
    var fileName = filePath.split('/').pop();
    var fileNameWithoutExt = fileName.split('.').slice(0, -1).join('.');

    var fileSizeBytes = conversation.file_size || 0;
    var fileSizeKB = (fileSizeBytes / 1024).toFixed(2); 

    var pageCount = conversation.page_count || 1;  

    var alignmentStyle = conversation.user_id == user_id ? 
        'text-align: right; margin-left: auto;' : 
        'text-align: left; margin-right: auto;';

    var isSender = conversation.user_id === user_id; 

    var pdfHtml = `
        <div class="pdf-container" data-pdf-url="${pdfUrl}" id="pdfcontainer" style=" position: relative; padding: 10px; border-radius: 8px; background: ${isSender ? '#005c4b' : '#111b21'}; ${alignmentStyle}; overflow: hidden;">
            <embed src="${pdfUrl}" width="100%" height="150px" type="application/pdf" style="border-radius: 8px; display: block; margin: 0 auto;">
            <div style="background: ${isSender ? '#025244' : '#1c272e'}; display: flex; flex-direction: column; align-items: flex-start; padding-top: 10px;">
                <div style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
                    <p style="margin: 0; font-size: 16px; font-weight: bold; color: #fff; padding: 5px 10px; border-radius: 4px;">${fileNameWithoutExt}</p>
                    <a href="${pdfUrl}" download style="display: flex; align-items: center; color: #fff; text-decoration: none; font-weight: bold; padding: 5px 10px; border-radius: 4px; margin-left: 10px;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-cloud-download" viewBox="0 0 16 16">
                            <path d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383"/>
                            <path d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708z"/>
                        </svg>
                    </a>
                </div>
                <p style="margin-left: 10px ; font-size: 14px; color: #fff;">${pageCount} page${pageCount > 1 ? 's' : ''} .PDF .${fileSizeKB}kb</p>
            </div>
            <div style="color: #fff; padding: 5px; border-radius: 4px; text-align: center; margin-top: 10px; ${isSender ? 'margin-left: 280px;' : 'margin-left:-310px'}">
                <i>${formattedDate}</i>
                ${isSender ? seenStatusSvg : ''}
            </div>
        </div>
    `;

    var messageHtml = `
        <div class="card position-relative" style="border:none; background:none !important; ${alignmentStyle}">
            <div style="font-weight:bolder" class="card-body ${messageStyle}">
                ${pdfHtml}
                <br><br>
            </div>
        </div><br>
    `;
  
function renderPdf(pdfUrl) {
    var pdfDiv = document.getElementById('pdf');  

    
    if (!pdfDiv) {
        console.error('pdfDiv element not found');
        return;
    }

    pdfDiv.innerHTML = `
        <embed src="${pdfUrl}" width="150%" height="600px" type="application/pdf">
        <svg id="bckpdf" class="x" style="color:#7d8d96; cursor: pointer; position: absolute; top: 10px; margin-left:10px;" viewBox="0 0 24 24" height="30" width="30" preserveAspectRatio="xMidYMid meet" fill="currentColor" enable-background="new 0 0 24 24">
            <title>x</title>
            <path d="M19.6004 17.2L14.3004 11.9L19.6004 6.60005L17.8004 4.80005L12.5004 10.2L7.20039 4.90005L5.40039 6.60005L10.7004 11.9L5.40039 17.2L7.20039 19L12.5004 13.7L17.8004 19L19.6004 17.2Z"></path>
        </svg>
    `;
    pdfDiv.style.display = 'block';

    document.getElementById('bckpdf').addEventListener('click', function() {
        pdfDiv.style.display = 'none';
    });
}

 
document.querySelectorAll('.pdf-container').forEach(function(container) {
    container.addEventListener('click', function() {
        var pdfUrl = container.getAttribute('data-pdf-url');  
        renderPdf(pdfUrl);
    });
});

let isPdfOpen = false;  

document.addEventListener('click', function(event) {
    var pdfDiv = document.getElementById('pdf');
    var pdfContainer = document.getElementById('pdfcontainer');
    var bckpdf = document.getElementById('bckpdf');

     
    if (isPdfOpen) {
        if (event.target === bckpdf) {
            pdfDiv.style.display = 'none';
            isPdfOpen = false;  
        } else if (event.target !== pdfDiv && event.target !== pdfContainer) {
            
            pdfDiv.style.display = 'none';
            isPdfOpen = false;  
        }
    } else {
        if (event.target === pdfContainer) {         
            pdfDiv.style.display = 'block';
            isPdfOpen = true; 
        }
    }
});

}

    else{
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


 


function Htmlpolldetails(conversation, user_id) {
    var createdAt = new Date(conversation.created_at);
    var formattedDate = createdAt.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric' });

    var messageHtml = `
        <div class="col-12" style="background-color:#111b21;height:140px">
            <div class="row">
                <div class="col-1" style="margin-top:20px;margin-left:20px">
                    <svg id="closepoll" style="color:#7d8d96" viewBox="0 0 24 24" height="30" width="30" preserveAspectRatio="xMidYMid meet" fill="currentColor" enable-background="new 0 0 24 24">
                        <title>x</title>
                        <path d="M19.6004 17.2L14.3004 11.9L19.6004 6.60005L17.8004 4.80005L12.5004 10.2L7.20039 4.90005L5.40039 6.60005L10.7004 11.9L5.40039 17.2L7.20039 19L12.5004 13.7L17.8004 19L19.6004 17.2Z"></path>
                    </svg>
                </div>
                <div class="col-10">
                    <p style="font-size:20px;color:#dadee0;margin-top:22px;margin-left:10px;font-weight:bolder">Poll Details</p>
                </div>
                <div class="col-10">
                    <h3 style="font-size:25px;color:#dadee0;margin-top:30px;margin-left:30px;">${conversation.questions}</h3>
                </div>
            </div>
        </div>
        <div class="col-12 mt-4" style="background-color:#111b21;height:170px">
            <div class="row">
                <div class="col-10">
                    <h3 style="font-size:25px;color:#dadee0;margin-top:30px;margin-left:30px;">${conversation.option1}</h3>
                </div>
                <div class="col-2 mt-5">
                    <p>${conversation.poll} Votes</p>
                </div>
                <div class="col-3 mt-5 mx-5">
                    <img class="icon1" src="{{ asset('images/' . auth()->user()->image) }}">
                </div>
                <div class="col-6">
                    <h4 style="margin-left:-90px;margin-top:40px">You</h4><br>
                    <p style="margin-left:-90px;margin-top:-15px">Today at ${formattedDate}</p>
                </div>
            </div>
        </div>
        <div class="col-12 mt-4" style="background-color:#111b21;height:170px">
            <div class="row">
                <div class="col-10">
                    <h3 style="font-size:25px;color:#dadee0;margin-top:30px;margin-left:30px;">${conversation.option2}</h3>
                </div>
                <div class="col-2 mt-5">
                    <p>${conversation.poll2} Votes</p>
                </div>
                <div class="col-3 mt-5 mx-5">
                    <img class="icon1" src="{{ asset('images/' . auth()->user()->image) }}">
                </div>
                <div class="col-6">
                    <h4 style="margin-left:-90px;margin-top:40px">You</h4><br>
                    <p style="margin-left:-90px;margin-top:-15px">Today at ${formattedDate}</p>
                </div>
            </div>
        </div>
    `;

     
    $(document).ready(function() {
     
    $(document).on('click', '#closepoll', function() {
        $('#polldetails').fadeOut(200);  
    });
});


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

 
   
 
$(document).ready(function() {
  
  console.log('Document ready!');
  $('#circularCheckbox').change(function() {
      if ($(this).is(':checked')) {
          console.log("Checkbox checked. Sending message...");
          sendMessage();
      }
  });
});


 


function sendMessage() {
    var formData = new FormData();
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    
    formData.append('message_id', $('[name="message_id"]').val());
    var messageInput = $('[name="message"]').val().trim();
    var replyMessage = $('#replyMessage').val().trim();
    var emojis = $('#editMessageInput').val().trim();
    var questions = $('#questions').val().trim();
    var option1 = $('#option1').val().trim();
    var option2 = $('#option2').val().trim();
    
    var pollChecked = $('#circularCheckbox').is(':checked');
    formData.append('poll', pollChecked ? 'true' : 'false');
    
    if ($('#video-upload')[0].files.length > 0) {
        var videoFile = $('#video-upload')[0].files[0];
        formData.append('video', videoFile);
    }

    if ($('#pdf-upload')[0].files.length > 0) {
        var pdfFile = $('#pdf-upload')[0].files[0];
        formData.append('pdf', pdfFile);
    }

    if ($('#image-upload')[0].files.length > 0) {
        var files = $('#image-upload')[0].files;
        for (var i = 0; i < files.length; i++) {
            formData.append('images[]', files[i]);
        }
    }

    if (messageInput !== '') {
        formData.append('message', messageInput);
    }

    if (replyMessage !== '') {
        formData.append('reply_message_content', replyMessage);
    }

    if (emojis !== '') {
        formData.append('emojis', emojis);
    }

    if (questions !== '') {
        formData.append('questions', questions);
    }

    if (option1 !== '') {
        formData.append('option1', option1);
    }

    if (option2 !== '') {
        formData.append('option2', option2);
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
           
            var pollValue = result.poll;  
            
            if (pollValue === 'true') {
                $('#pollValue').text('1');
            } else {
                $('#pollValue').text('0');
            }

            
            $('[name="message"]').val('');
            $('#image-upload').val('');
            $('#video-upload').val('');
            $('#pdf-upload').val('');
            $('#replyMessage').val('');
            $('#editMessageInput').val('');
            $('#questions').val('');
            $('#option1').val('');
            $('#option2').val('');
            updateLastSeen();
            $('#reply').hide();
            $('.emojis').fadeOut();
            $(".smily1").fadeIn(200);
            $("#bcksmily").fadeOut(200);
            $("#document").fadeOut(200);
            $('.bckdocument').hide();
            $('.pluss').show();
            $('#poll').hide();
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
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


var fetchConversationsPollingFlag = true;

function fetchConversations(userId) {

   fetchConversationsPollingFlag = false;

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
           fetchConversationsPollingFlag = true;
       },
       error: function(xhr, status, error) {
           loadingMessages = false;
           fetchConversationsPollingFlag = true;
       }
   });
}

fetchConversations();
setInterval(function() {
    if(fetchConversationsPollingFlag){
        fetchConversations();
    }
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