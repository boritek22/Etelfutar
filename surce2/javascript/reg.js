document.querySelector("input[name=username]")
    .addEventListener("input", onInput);

function onInput(e) {

    const name = e.target.value;

    ajax({
        mod: "get",
        url: "ajax/reg.php",
        getadat: `name=${name}`,
        siker: onSuccess
    });
}
function onSuccess(xhr, responseText) {

    console.log(responseText);

    const { success } = JSON.parse(responseText);
    const span = document.querySelector("input[name=username]+span");
    span.innerHTML = success ? "pipa" : "X";
}