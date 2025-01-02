let produkty = ['ilosc1', 'ilosc2','ilosc3', 'ilosc4'];
let id_zamowienia = 0;
function braki(){
    for (i = 0; i < produkty.length; i += 1) {
        let ilosc = document.getElementById(produkty[i]);
        if (ilosc.innerText == 0) {
            ilosc.style.backgroundColor = 'red';
        }
        else if (ilosc.innerText >= 1 && ilosc.innerText <= 5){
            ilosc.style.backgroundColor = 'yellow';
        }
        else {
            ilosc.style.backgroundColor = 'Honeydew';
        }
    }

}
braki()

function aktualizujaca(nr){
    let wartosc = prompt("Podaj nową ilość:");
    let wybrana = nr - 1;
    document.getElementById(produkty[wybrana]).innerText = wartosc;
    braki()
}

function zamowienie(nr){
    id_zamowienia += 1;
    let wybrana = nr - 1;
    let nazwy = ['nazwa1', 'nazwa2', 'nazwa3', 'nazwa4'];
    alert("Zamówienie nr: " + id_zamowienia + " Produkt: " + document.getElementById(nazwy[wybrana]).innerText);
}