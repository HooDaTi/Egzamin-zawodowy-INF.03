const klient = document.getElementById('blok1');
const adres = document.getElementById('blok2');
const kontakt = document.getElementById('blok3');
let wartosc = 4;

function aktywująca(guzik) {
    let wybrany = guzik;
    klient.style.display = 'none';
    adres.style.display = 'none';
    kontakt.style.display = 'none';
    if (wybrany == 'klient') {
        klient.style.display = 'block';
        adres.style.display = 'none';
        kontakt.style.display = 'none';
    }
    else if (wybrany == 'adres') {
        klient.style.display = 'none';
        adres.style.display = 'block';
        kontakt.style.display = 'none';
    }
    else {
        klient.style.display = 'none';
        adres.style.display = 'none';
        kontakt.style.display = 'block';
    }
}

function postep() {
    const pasek = document.querySelector('#pasek section');
    if (wartosc < 100) {
        wartosc += 12;
    }
    pasek.style.width = `${wartosc}%`;
}

function zatwierdz() {
    const imie = document.getElementById('imie').value;
    const nazwisko = document.getElementById('nazwisko').value;
    const dataur = document.getElementById('data-ur').value;
    const ulica = document.getElementById('ulica').value;
    const numer = document.getElementById('numer').value;
    const miasto = document.getElementById('miasto').value;
    const telefon = document.getElementById('telefon').value;
    const rodo = document.getElementById('rodo').checked;
    
    console.log(`${imie}, ${nazwisko}, ${dataur}, ${ulica}, ${numer}, ${miasto}, ${telefon}, ${rodo}`);
}