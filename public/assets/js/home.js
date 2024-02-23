let heroData = []; // Bewaar de opgehaalde data in een variabele voor toegang

// Haal de gegevens op van de API en verwerk deze
function fetchHeroData() {
    fetch('/api/GetAllHeros/')
        .then(response => response.json())
        .then(data => {
            console.log('Data fetched successfully:', data);
            heroData = data; // Bewaar de opgehaalde data in de variabele

            // Toon standaard afbeeldingen bij het laden van de pagina
            showHeroImages();
        })
        .catch(error => console.error('Error fetching hero data:', error));
}

// Toon de afbeeldingen in de respectievelijke vierkanten
function showHeroImages() {
    const squares = ['vierkant1', 'vierkant2', 'vierkant3']; // Array met de id's van de vierkanten

    squares.forEach((squareId, index) => {
        const square = document.getElementById(squareId);
        square.innerHTML = ''; // Wis inhoud van het vierkant voordat je nieuwe afbeeldingen toevoegt

        const dataKey = index % heroData.length; // Bereken de index van de afbeelding in de data array
        const link = document.createElement('a');
        link.href = `/leaderbord/show/?hero_id=${heroData[dataKey].id}`;
        const userImage = document.createElement('img');
        userImage.src = heroData[dataKey].image;
        userImage.alt = 'Hero Image';
        userImage.style.height = "100px"
        userImage.style.width = "100px"
        userImage.style.borderRadius = "100%";
        userImage.classList.add('hero-image'); // Voeg de hero-image klasse toe aan de afbeelding

        link.append(userImage)
        square.appendChild(link);
    });
}

// Functie om naar de volgende afbeeldingen te gaan
function goToNextImages() {
    heroData.push(heroData.shift()); // Verplaats de eerste afbeelding naar het einde van de array
    showHeroImages(); // Toon de bijgewerkte afbeeldingen
}

// Functie om terug te gaan naar de vorige afbeeldingen
function goToPreviousImages() {
    heroData.unshift(heroData.pop()); // Verplaats de laatste afbeelding naar het begin van de array
    showHeroImages(); // Toon de bijgewerkte afbeeldingen
}

document.getElementById('knop_volgende').addEventListener('click', goToNextImages);
document.getElementById('knop_terug').addEventListener('click', goToPreviousImages);

fetchHeroData();

const gifImage = document.getElementById('water');
const nextButton = document.getElementById('knop_volgende');

let gifMoving = true;

function toggleGifMovement() {
    gifMoving = !gifMoving;
    if (gifMoving) {
        gifImage.style.animationPlayState = 'running';
    } else {
        gifImage.style.animationPlayState = 'paused';
    }
}

nextButton.addEventListener('click', toggleGifMovement);
