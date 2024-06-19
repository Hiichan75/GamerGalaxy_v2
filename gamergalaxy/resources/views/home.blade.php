@extends('layouts.app')

@section('content')
<div class="container">
        <style>
            .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100px;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgb(8, 29, 52);
            z-index: 1;
        }


        .header img {
            width: 120px;
            height: auto;
        }

        .header nav {
            display: flex;
            gap: 20px;
            margin-right: 5%;
        }

        .header nav a {
            text-decoration: none;
        }

        .header button {
            font-size: large;
            background-color: transparent;
            border: none;
            color: white;
        }

        #btnprofiel {
            justify-content: end;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 40px;
        }

        .container {
            max-width: 400px;
            margin: 150px auto 0;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .homepage {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #000;
            margin: 0;
            padding: 0;
            background-size: cover;
            background-position: center;
            color: #fff;
        }

        .Home {
            margin-top: 110px;
            display: flex;
        }

        .vrienden {
            width: 20%;
        }

        .chats {
            width: 20%;
            position: relative;
            z-index: 0;
        }

        .community {
            width: 60%;

        }

        h3 {
            text-align: center;
        }

        h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 30px;
        }

        label {
            color: #fff;
        }

        #error {
            color: red;
            margin-top: 10px;
            text-align: center;
            font-weight: bold;
        }

        .star {
            position: fixed;
            background: silver;
            width: 2px;
            height: 2px;
            border-radius: 50%;
            pointer-events: none;
            animation: twinkle 3s infinite alternate;
        }

        @keyframes twinkle {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .bericht {
            height: 550px;
            border: 1px solid white;
            border-top-right-radius: 10px;
        }

        .user-button {
            background-color: transparent;
            color: white;
            border: 1px solid white;
            border-radius: 0;
            padding: 10px;
            height: 50px;
            width: 100%;
        }

        .user-button:not(.top-border) {
            border-radius: 0;
        }

        .user-button.top-border {
            border-top-right-radius: 10px;
        }

        .message-input {
            padding: 10px;
            width: 65%;
            color: #fff;
            background-color: #000;
            border: 1px solid white;
            border-radius: 10px;
        }

        .send-button {
            width: 20%;
            padding: 10px;
            color: #fff;
            background-color: #000;
            border: 1px solid white;
            border-radius: 10px;
        }

        .close-chat {
            width: 15%;
            padding: 10px;
            color: #fff;
            background-color: #000;
            border: 1px solid black;
            border-radius: 10px;
        }

        .chat-messages {
            border: 1px solid white;
            border-radius: 10px;
            height: 400px;
            padding: 10px;
        }

        .message {
            padding: 5px;
            margin-bottom: 5px;
            border-radius: 5px;
        }

        .message.sent {
            text-align: left;
        }

        .chat-header {
            display: flex;
        }

        .chat-header h3 {
            justify-content: center;
        }


        .chat-header button {
            margin-left: 0px;
        }

        #postForm {
            margin-top: 1%;
        }

        .posts {
            position: sticky;
            height: 550px;
            border: 1px solid white;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .form {
            margin-left: 5px;
        }

        #postForm {
            width: 100%;
            position: absolute;
            bottom: 0;
            left: 0;
            border-top: 1px solid white;
        }

        .custom-file-upload {
            font-size: 15px;
            border: 1px solid black;
            background-color: #000;
            color: white;
            padding: 5px;
            cursor: pointer;
            border-radius: 10px;
            display: inline-block;
        }

        .custom-file-upload:hover {
            background-color: #333;
        }

        input[type="file"] {
            display: none;
        }

        #postContentText {
            resize: none;
            height: 12px;
            color: white;
            background-color: #000;
            border-radius: 10px;
            width: 30%;
        }

        #submit {
            font-size: 15px;
            padding: 5px;
            color: white;
            background-color: #000;
            border: 1px solid black;
            border-radius: 10px;
        }

        #submit:hover {
            background-color: #333;
        }

        .friends {
            height: 550px;
            border: 1px solid white;
            border-top-left-radius: 10px;
            display: flex;
            flex-direction: column;
            display: flex;
            flex-direction: column;
        }


        .friends a {
            margin: 1%;
            display: block;
            color: white;
            font-size: medium;
            text-decoration: none;
        }

        .friend {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .friend-link {
            text-decoration: none;
            color: white;
            margin: 5px;
        }

        .friend-status {
            margin-left: 5px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .friend-status.online {
            background-color: green;
        }

        .friend-status.offline {
            background-color: red;
        }

        footer {
            height: 100px;
            background-color: #000;
            color: white;
            font-size: medium;
        }

        .vrienden {
            background-image: linear-gradient(rgb(8, 29, 52), black);
        }

        .chats {
            background-image: linear-gradient(rgb(8, 29, 52), black);
        }

        .community {
            background-image: linear-gradient(rgb(8, 29, 52), black);

        }

        .voet {
            display: flex;
            justify-content: space-around;
        }

        .links,
        .info {
            display: flex;
            flex-direction: column;
        }

        .links a,
        .info a {
            margin-bottom: 5px;
        }

        .voet button {
            background-color: transparent;
            color: silver;
            border: transparent;
            font-size: medium
        }

        .logo img {
            width: 120px;
            height: auto;
        }
        </style>

    <body class="homepage">
        <div class="Home">
            <div class="vrienden">
                <h3>Vrienden</h3>
                <div class="friends">
                    <div class="friend">
                        <span class="friend-status online"></span>
                        <a href="profile.html" class="friend-link" data-status="online">Alice</a>
                    </div>
                    <div class="friend">
                        <span class="friend-status offline"></span>
                        <a href="profile.html" class="friend-link" data-status="offline">Bob</a>
                    </div>
                    <div class="friend">
                        <span class="friend-status online"></span>
                        <a href="profile.html" class="friend-link" data-status="online">Charlie</a>
                    </div>
                </div>
            </div>

            <div class="community">
                <h3>Hier komen berichten van alle gamers</h3>
                <div class="posts">
                    <form id="postForm" enctype="multipart/form-data">
                        <div class="form">
                            <label for="postContent">Tekst toevoegen:</label>
                            <textarea id="postContentText" name="postContentText" rows="4" cols="50"></textarea>
                            <label for="foto" class="custom-file-upload">Foto</label>
                            <input type="file" id="foto" name="postContent" accept="image/*">
                            <button id="submit" type="submit">Plaats</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="chats">
                <h3>Chats</h3>
                <div class="bericht">
                    <div id="user-buttons">
                        <button class="user-button top-border" data-chat="Alice">Alice</button>
                        <button class="user-button" data-chat="Bob">Bob</button>
                        <button class="user-button" data-chat="Charlie">Charlie</button>
                    </div>
                    <div id="chat-box-container">

                    </div>
                </div>

            </div>
        </div>

        <script src="script.js">
            function generateStars() {
            const numStars = 1000;
            const headers = document.getElementsByClassName('header');

            function createStar() {
                var star = document.createElement('div');
                star.classList.add('star');
                const headerHeight = headers[0].offsetHeight;
                star.style.left = Math.random() * 100 + 'vw';
                star.style.top = Math.random() * headerHeight + 'px';
                star.style.animationDuration = Math.random() * 2 + 1 + 's';
                return star;
            }

            for (let j = 0; j < headers.length; j++) {
                const header = headers[j];
                for (let i = 0; i < numStars; i++) {
                    var starHeader = createStar();
                    header.appendChild(starHeader);
                }
            }
        }

        window.addEventListener('load', function () {
            if (document.querySelector('header')) {
                generateStars();
            }
        });

        document.addEventListener("DOMContentLoaded", function () {
            const userButtonsContainer = document.getElementById('user-buttons');
            const chatBoxContainer = document.getElementById('chat-box-container');
            let chatMessages = {};

            function openChat(chatName) {
                userButtonsContainer.style.display = 'none';

                const chatBox = document.createElement('div');
                chatBox.classList.add('chat-box');
                chatBox.innerHTML = `
                    <div class="chat-header">
                    <button class="close-chat">\u2B05</button>
                        <h3>${chatName}</h3>
                    </div>
                    <div class="chat-messages" id="chat-messages-${chatName}"></div>
                    <div class="input-box">
                        <input type="text" class="message-input" placeholder="Type your message...">
                        <button class="send-button">Send</button>
                    </div>
                `;

                chatBoxContainer.appendChild(chatBox);

                const chatMessagesDiv = chatBox.querySelector(`#chat-messages-${chatName}`);

                if (chatMessages[chatName]) {
                    chatMessages[chatName].forEach(message => {
                        addMessageToChat(chatName, message);
                    });
                }

                const closeButton = chatBox.querySelector('.close-chat');
                closeButton.addEventListener('click', function () {
                    userButtonsContainer.style.display = 'block';
                    chatBoxContainer.removeChild(chatBox);
                });

                const sendButton = chatBox.querySelector('.send-button');
                const messageInput = chatBox.querySelector('.message-input');
                sendButton.addEventListener('click', function () {
                    const message = messageInput.value.trim();
                    if (message !== "") {
                        addMessageToChat("Me", message, chatName);
                        if (!chatMessages[chatName]) {
                            chatMessages[chatName] = [];
                        }
                        chatMessages[chatName].push(message);
                        messageInput.value = "";
                    }
                });
            }

            function addMessageToChat(sender, message, chatName) {
                const chatMessagesDiv = document.getElementById(`chat-messages-${chatName}`);
                const messageElement = document.createElement('div');
                messageElement.classList.add('message');
                if (sender === 'Me') {
                    messageElement.classList.add('sent');
                }
                messageElement.textContent = `${sender}: ${message}`;
                chatMessagesDiv.appendChild(messageElement);
            }

            const userButtons = document.querySelectorAll('.user-button');
            userButtons.forEach(function (button) {
                button.addEventListener('click', function () {
                    const chatName = button.getAttribute('data-chat');
                    openChat(chatName);
                });
            });
        });
        document.addEventListener("DOMContentLoaded", function () {
            const header = document.querySelector('.header');

            window.addEventListener('scroll', function () {
                if (window.scrollY > 0) {
                    header.classList.add('fixed-header');
                } else {
                    header.classList.remove('fixed-header');
                }
            });
        });
        </script>
    </body>

</html>
</div>
@endsection
