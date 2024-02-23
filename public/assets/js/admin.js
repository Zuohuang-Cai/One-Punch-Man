function editaction() {
    let form = document.querySelector("form");

    // 设置表单的 action 属性为你想要的 URL
    form.action = "/api/UpdateHeroById";
    form.submit();
}

function deleteaction() {
    let form = document.querySelector("form");

    form.action = "/api/DeleteHeroByid";
    form.method = "get";
    form.submit();
}

function addpoweraction() {
    let form = document.querySelector("form");

    form.action = "/api/AddPowerById";
    form.method = "get";
    form.submit();
}
