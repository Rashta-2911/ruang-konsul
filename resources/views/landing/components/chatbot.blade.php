<!DOCTYPE html>
<html>
<head>
    <title>Chatbot RuangKonsul</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body{
            font-family: Arial;
            background:#f5f5f5;
        }

        .chat-container{
            width:400px;
            margin:50px auto;
            background:white;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
            display:flex;
            flex-direction:column;
            height:500px;
        }

        .chat-box{
            flex:1;
            padding:15px;
            overflow-y:auto;
        }

        .msg{
            margin:10px 0;
            padding:10px;
            border-radius:8px;
            max-width:80%;
        }

        .user{
            background:#223a66;
            color:white;
            margin-left:auto;
        }

        .bot{
            background:#eee;
        }

        .input-area{
            display:flex;
            border-top:1px solid #ddd;
        }

        input{
            flex:1;
            border:none;
            padding:10px;
        }

        button{
            background:#e12454;
            color:white;
            border:none;
            padding:10px 15px;
            cursor:pointer;
        }
    </style>
</head>
<body>

<div class="chat-container">

    <div class="chat-box" id="chatBox"></div>

    <div class="input-area">
        <input type="text" id="message" placeholder="Tulis pesan...">
        <button onclick="sendMessage()">Kirim</button>
    </div>

</div>

<script>
function addMessage(text, type){
    let div = document.createElement('div');
    div.className = 'msg ' + type;
    div.innerText = text;
    document.getElementById('chatBox').appendChild(div);
}

function sendMessage(){
    let msg = document.getElementById('message').value;
    if(!msg) return;

    addMessage(msg, 'user');
    document.getElementById('message').value='';

    fetch('/chatbot/send', {
        method:'POST',
        headers:{
            'Content-Type':'application/json',
            'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').content
        },
        body:JSON.stringify({ message: msg })
    })
    .then(res=>res.json())
    .then(data=>{
        addMessage(data.reply, 'bot');
    });
}
</script>

</body>
</html>
