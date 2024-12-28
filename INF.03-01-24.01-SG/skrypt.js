var imie = document.getElementById('imie');
var nazwisko = document.getElementById('nazwisko');
var email = document.getElementById('email');
var zgloszenie = document.getElementById('zgloszenie');
var regulamin = document.getElementById('regulamin');

function reset() {
    imie.value = '';
    nazwisko.value = '';
    email.value = '';
    zgloszenie.value = '';
    regulamin.checked = false;
}

function przesyl() {
    const main = document.querySelector('main');
    let paragraf = document.createElement('p');
    main.appendChild(paragraf);
    if (regulamin.checked) {
        paragraf.style.color = 'navy';
        paragraf.innerHTML = `${imie.value.toUpperCase()} ${nazwisko.value.toUpperCase()}<br>Treść Twojej sprawy: ${zgloszenie.value}`;
    }
    else {
        paragraf.style.color = 'red';
        paragraf.innerHTML = `Musisz zapoznać się z regulaminem`
    }
}