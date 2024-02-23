let heroname = document.querySelector("#hero_nickname");
let heroimage = document.querySelector("#hero_image");
let hero_id = document.querySelector("#hero_id").textContent;
let infocontainer = document.querySelector("#infocontainer");
fetch('/api/GetHerobyId/?hero_id=' + hero_id)
    .then(response => response.json())
    .then(data => {
        heroname.textContent = data.name;
        document.body.style.backgroundImage = `url(${data.backgroundimage})`;
        heroimage.src = data.image;
    })

fetch('/api/GetPowerbyid/?hero_id=' + hero_id)
    .then(response => response.json())
    .then(powerdata => {
        for (const dataKey in powerdata) {
            let powername = document.createElement('h1')
            powername.className = "text-center";
            powername.textContent = powerdata[dataKey].powername;
            infocontainer.appendChild(powername);
        }
    })
const ctx = document.getElementById('radarChart').getContext('2d');
fetch('/api/GetHeroPhysicalbyid/?hero_id=' + hero_id)
    .then(response => response.json())
    .then(data => {
        const myChart = new Chart(ctx, {
            type: 'radar',
            options: {
                elements: {
                    line: {
                        borderWidth: 3
                    }
                }, scales: {
                    r: {
                        angleLines: {
                            color: 'rgba(255, 99, 132, 0.5)',
                            lineWidth: 2 // Width of the radial lines
                        },
                        grid: {
                            color: 'rgba(255, 99, 132, 0.5)', // Color of the grid lines
                            lineWidth: 1, // Width of the grid lines
                            circular: true // Circular grid lines
                        },
                        ticks: {
                            color: 'rgb(255,255,255)', // Color of the scale ticks
                            backdropColor: 'rgba(255, 99, 132, 0.5)' // Background color of the scale ticks
                        }
                    }
                }
            },
            data: {
                labels: [
                    'Power',
                    'Agility',
                    'Armor',
                    'Control',
                    'Mana'
                ],
                datasets: [{
                    label: 'Physical',
                    data: [data.power, data.agility, data.armor, data.control, data.mana],
                    fill: true,
                    backgroundColor: 'rgba(0,58,206,0.2)',
                    borderColor: 'rgb(255,0,55)',
                    pointBackgroundColor: 'rgb(255, 99, 132)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgb(255, 99, 132)'
                }]
            },
        });
    })