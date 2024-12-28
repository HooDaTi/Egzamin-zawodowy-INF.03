function pszczola(){
    var blur = document.getElementById('blur');
    var sepia = document.getElementById('sepia');
    var negatyw = document.getElementById('negatyw');
    const pszczola = document.getElementById('pszczola');
    if (blur.checked) {
        pszczola.style.filter = 'blur(5px)';
    }
    else if (sepia.checked) {
        pszczola.style.filter = 'sepia(100%)';
    }
    else if (negatyw.checked) {
        pszczola.style.filter = 'invert(100%)';
    }
}

function kolory(){
    const orange = document.getElementById('pomarancza');
    orange.style.filter = 'grayscale(0%)';
}

function szarosc(){
    const orange = document.getElementById('pomarancza');
    orange.style.filter = 'grayscale(100%)';
}

function przezroczystosc(){
    const obrazek = document.getElementById('owoce');
    var suwak = document.getElementById('suwak1');
    obrazek.style.filter = `opacity(${suwak.value}%)`;
}

function zmiana(){
    const obrazek = document.getElementById('zolw');
    var suwak = document.getElementById('suwak2');
    obrazek.style.filter = `brightness(${suwak.value}%)`;
}