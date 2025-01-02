function zmianabloku(blok) {
    let blok1 = document.getElementById('blok1-glowny');
    let blok2 = document.getElementById('blok2-glowny');
    let blok3 = document.getElementById('blok3-glowny');
    let nrbloku = blok;
    if (nrbloku == 1){
        blok1.style.visibility = 'hidden';
        blok2.style.visibility = 'visible';
    }
    else if (nrbloku == 2){
        blok2.style.visibility = 'hidden';
        blok3.style.visibility = 'visible';
    }
}

function zatwierdzanie(){
    let imie = document.getElementById('imie').value;
    let nazwisko = document.getElementById('nazwisko').value;

    if (document.getElementById('haslo').value !== document.getElementById('powtorz-haslo').value) {
        alert("Podane hasła różnią się");
    }
    else {
        console.log("Witaj" + " " + imie + " " + nazwisko);
    }
}