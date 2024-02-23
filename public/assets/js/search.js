let input = document.querySelector('input');

function search() {
    let id = input.value;
    fetch('/api/GetAllInfoAboutHeroById/?hero_id=' + id)
        .then(response => response.json())
        .then(data => {
            console.log(data);
        })
}