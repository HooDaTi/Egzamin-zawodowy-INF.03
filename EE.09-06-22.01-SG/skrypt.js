const prawy = document.getElementById('prawy')

function tlo(kolor){
    prawy.style.backgroundColor = kolor
}

function czcionka(){
    let kolor = document.getElementById('wybor').value;
    prawy.style.color = kolor;
}

function rozmiar_czcionki(){
    let rozmiar = document.getElementById('rozmiar-czcionki').value;
    prawy.style.fontSize = rozmiar;
}

function ramka_obrazu(){
    let ramka = document.getElementById('ramka');
    let obraz = document.getElementsByTagName('img');
    if (ramka.checked){
        obraz[0].style.border = '1px solid white';
    }
    else {
        obraz[0].style.border = 'none';
    }
}

function punktory(typ){
    let lista = document.getElementById('lista');
    lista.style.listStyleType = typ;
}