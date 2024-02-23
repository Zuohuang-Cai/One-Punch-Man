let stop = document.querySelector('#stop')
let start = document.querySelector('#start')
let result = document.querySelector('#result')
let backgroundimg = document.querySelector('#herobackgroundimg')
let img = document.querySelector('#heroimg')
let intervalid;
let herocount;
fetch('/api/HowMuchHeros')
    .then(response => response.json())
    .then(data => {
        herocount = data
    })
start.addEventListener('click', () => {
    start.disabled = true
    intervalid = setInterval(() => {
        randomcombatpoint = Math.floor(Math.random() * 30000);
        randomhero = Math.floor(Math.random() * herocount) + 1;
        fetch('/api/GetAllInfoAboutHeroById/?hero_id=' + randomhero)
            .then(response => response.json())
            .then(data => {
                if (data.physical.cambatpoint > randomcombatpoint) {
                    let point = Math.round(data.physical.cambatpoint / randomcombatpoint * 10) + 300;
                    let resultaat = document.createElement('p')
                    resultaat.innerText = `${data.info.nickname} win tegen monster met ${randomcombatpoint} combatpoint + ${point} points`
                    resultaat.className = 'text-success';
                    img.style.backgroundImage = `url(${data.info.image})`;
                    img.style.backgroundSize = 'cover';
                    img.style.backgroundRepeat = 'no-repeat';
                    img.style.backgroundPosition = 'center';
                    backgroundimg.style.backgroundImage = `url(${data.info.backgroundimage})`;
                    backgroundimg.style.backgroundSize = 'cover';
                    backgroundimg.style.backgroundRepeat = 'no-repeat';
                    result.appendChild(resultaat);
                    fetch(`/api/HeroEloPlus/?hero_id=${data.info.id}&point=${point}`)
                } else {
                    let point = Math.round(data.physical.cambatpoint / randomcombatpoint * 10) + 300;
                    let resultaat = document.createElement('p');
                    img.style.backgroundImage = `url(${data.info.image})`;
                    img.style.backgroundSize = 'cover';
                    img.style.backgroundRepeat = 'no-repeat';
                    img.style.backgroundPosition = 'center';
                    backgroundimg.style.backgroundImage = `url(${data.info.backgroundimage})`;
                    backgroundimg.style.backgroundSize = 'cover';
                    backgroundimg.style.backgroundRepeat = 'no-repeat';
                    resultaat.innerText = `${data.info.nickname} verliest tegen monster met ${randomcombatpoint} combatpoint - ${point} points`
                    resultaat.className = 'text-danger'
                    result.appendChild(resultaat);
                    fetch(`/api/HeroEloDiminish/?hero_id=${data.info.id}&point=${point}`)
                }
            })
    }, 2000)
})
stop.addEventListener('click', () => {
    start.disabled = false
    clearInterval(intervalid)
})
