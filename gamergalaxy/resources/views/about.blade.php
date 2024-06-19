@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>About This Project</h1>
    <p>Welkom bij ons platform dat de wereld van gaming transformeert. We creëren een gemeenschap waar gamers kunnen ontmoeten, verbinden en samen spelen. Onze missie is om de sociale dimensie van gaming te versterken en een bloeiende gemeenschap te bouwen.</p>

    <h2>Doelgroep</h2>
    <p>Gamers van alle leeftijden die op zoek zijn naar vriendschappen en samen willen spelen. Of je nu een ervaren gamer bent of net begint, ons platform verwelkomt iedereen die waarde hecht aan sociale interactie binnen de gaming-community.</p>

    <h2>Behoeften</h2>
    <ul>
        <li><strong>Gemeenschap:</strong> Een plek om gelijkgestemde gamers te vinden.</li>
        <li><strong>Connectie:</strong> Vriendschappen sluiten en sociale kringen uitbreiden.</li>
        <li><strong>Matchmaking:</strong> Geavanceerd systeem om spelers te matchen.</li>
        <li><strong>Tools:</strong> Functies om de gaming-ervaring te verbeteren.</li>
    </ul>
<h2>Functionaliteiten voor Gebruikers</h2>
    <ul>
        <li><strong>Registratie:</strong> Eenvoudige aanmelding en profielbeheer.</li>
        <li><strong>Game toevoegen:</strong> Voeg favoriete games toe aan je profiel.</li>
        <li><strong>Matchmaking:</strong> Vind en speel met gelijkgestemde gamers.</li>
        <li><strong>Thema-opties:</strong> Kies tussen lichte en donkere modus.</li>
        <li><strong>Leaderboard en Delen:</strong> Vergelijk prestaties en deel momenten.</li>
    </ul>

    <h2>Functionaliteiten voor Beheerders</h2>
    <ul>
        <li><strong>Beheersysteem:</strong> Beheer gebruikers en inhoud.</li>
        <li><strong>Dashboard:</strong> Overzicht van gebruikersactiviteit.</li>
        <li><strong>Rapportagesysteem:</strong> Beheer en moderatie van inhoud.</li>
    </ul>

    <h2>Visualisatie</h2>
    <p>Ons platform visualiseert de gemeenschap als een groeiend universum, waarin elke gebruiker een ster is en vriendschappen stralen van licht zijn die hen verbinden.</p>

    <h2>Slot</h2>
    <p>We streven naar een levendige en vriendelijke gemeenschap voor gamers. Doe mee en help ons deze plek te creëren waar iedereen zich thuis voelt. Bedankt voor uw aandacht!</p>

    <h2>Citations and Sources</h2>
    <ul>
        <li><a href="https://laravel.com/docs">Laravel Documentation</a></li>
        <li><a href="https://startbootstrap.com">Start Bootstrap</a></li>
        <li><a href="https://github.com/Hiichan75/GamerGalaxy_v2.git">GitHub Repository/Sources linked</a></li>
        <li><a href="https://chatgpt.com/?model=gpt-4o">CHAT GPT 4o model</a></li>
    </ul>
</div>
<style>

    body{
        background-color: black;
        color: white;
        margin: 0;
        padding: 0;
    }
    .star {
        position: absolute;
        width: 2px;
        height: 2px;
        background: white;
        animation: twinkle 1s infinite alternate;
    }

    @keyframes twinkle {
        from {
            opacity: 1;
        }
        to {
            opacity: 0.5;
        }
    }

    .stars-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none; /* Zorgt ervoor dat de sterren niet de interactie met de rest van de pagina verstoren */
        overflow: hidden;
    }
</style>
<script>
    function generateStars() {
            const numStars = 1000;
            const container = document.querySelector('.container');

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
</script>
@endsection
