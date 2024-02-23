fetch('/api/GetAllHeros/')
    .then(response => response.json())
    .then(data => {
        let rowA = document.querySelector('#A')
        let rowB = document.querySelector('#B')
        let rowC = document.querySelector('#C')

        generateleaderboard(rowA, 0, 8, data)
        generateleaderboard(rowB, 8, 16, data)
        generateleaderboard(rowC, 16, 24, data)

    })

function generateleaderboard(parend, start, end, data) {
    for (let dataKey = start; dataKey < end; dataKey++) {
        const originalTemplateA = document.getElementById('ArankHero');
        const clonedTemplateA = originalTemplateA.content.cloneNode(true);
        clonedTemplateA.querySelector('.card-text').textContent = data[dataKey].background;
        clonedTemplateA.querySelector('.card-img-top').src = data[dataKey].image;
        clonedTemplateA.querySelector('.card-img-top').style.maxHeight = "10rem";
        clonedTemplateA.querySelector('.card-img-top').style.Width = "18rem";
        clonedTemplateA.querySelector('.card-header').textContent = data[dataKey].nickname;
        clonedTemplateA.querySelector('a').href = "leaderbord/show/?hero_id=" + data[dataKey].id;
        parend.appendChild(clonedTemplateA);
    }
}
