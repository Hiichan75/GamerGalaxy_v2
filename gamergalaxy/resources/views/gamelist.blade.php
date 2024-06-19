@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <body class="gamelist">
        <style>
            .gamelist {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #000;
            margin: 0;
            padding: 0;
            background-size: cover;
            background-position: center;
            color: #fff;
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

        header {
            background-color: rgba(255, 255, 255, 0.1);

        }

        #hoofd {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
        }

        header img {
            display: flex;
            width: 120px;
            height: auto;
        }

        header h1 {
            flex-grow: 1;
            text-align: center;
            padding-left: 7vw;
        }

        #form {
            margin-left: auto;
        }

        .search {
            width: 15vw;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid #fff;
            border-radius: 6px;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }

        #links {
            display: flex;
            justify-content: center;
            padding-bottom: 20px;
            margin-top: -10px;
        }

        #links a {
            padding-left: 5px;
            padding-right: 5px;
            color: white;
            text-decoration: none;
        }

        #game-list{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            flex-grow:1;
            margin-top: 20px;
            padding: 5px 20px;
            
        }

        .game{
            display: inline-block;
            min-width: 300px;
            background-color: rgba(255, 255, 255, 0.15);
            text-align: center;
            box-sizing: border-box;
            margin: 10px 10px;
        }

        #savebutton {
            background-color: #1821c2;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-left: 25vw;
            margin-top: 50px;
            font-size: 1.3rem;
            width: 30%;
        }

        button:hover {
            background-color: #192f91;
        }
        </style>
        <header class="header">
            <div id="hoofd">
                <a href="home.html"><img src="../Home/logo-removebg.png" alt="Home" id="btnhome"></a>
                <h1>Search for games to add!</h1>
                <form id="form">
                    <input type="text" id="search" class="search" placeholder="search">
                </form>
            </div>

            <div id="links">
                <a href="../Home/home.html">Home</a>
                <a href="gamelist.html">Gamelist</a>
                <a href="../support/support.html">Support</a>
            </div>
        </header>
        <main class="main">
            <div id="game-list">

            </div>

            <button id="savebutton">Save</button>
        </main>
        <footer>

        </footer>

        <script>
            function generateStars() {
            const numStars = 1000;
            const container = document.querySelector('.gamelist');

            function createStar() {
                var star = document.createElement('div');
                star.classList.add('star');
                star.style.left = Math.random() * 100 + 'vw';
                star.style.top = Math.random() * 100 + 'vh';
                star.style.animationDuration = Math.random() * 2 + 1 + 's';
                return star;
            }

            for (let i = 0; i < numStars; i++) {
                var star = createStar();
                container.appendChild(star);
            }
        }
        window.addEventListener('load', generateStars);

        const API_URL = 'http://10.3.50.5:5000/games';

        let games = [];

        fetch(API_URL)
            .then(response => response.json())
            .then(data => {
                games = data;
                displayGames(games);
            })
            .catch(error => console.error('Error fetching data:', error));

        const searchInput = document.getElementById('search');
        searchInput.addEventListener('input', () => {
            const searchString = searchInput.value.toLowerCase();
            const filteredGames = games.filter(game => game.title.toLowerCase().includes(searchString));
            displayGames(filteredGames);
        });

        function displayGames(games) {
            const gameList = document.getElementById('game-list');
            gameList.innerHTML = '';
            games.forEach(game => {
                const listItem = document.createElement('div');
                listItem.classList.add('game');
                listItem.innerHTML = `
                    <img src="${game.image}" alt="game foto"/>
                    <p>${game.id}. ${game.title}<br> 
                    Genre: ${game.genre}<br> 
                    Platforms: (${game.platform.join(', ')})</p>
                    Add: <input type="checkbox">
                `;
                gameList.appendChild(listItem);
            });
        }
        </script>
    </body>
</div>
@endsection