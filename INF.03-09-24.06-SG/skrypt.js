let index_zdj = 1;
const zdjecie = document.getElementById('glowne-zdj');

function poprzednie() {
    if (index_zdj == 1) {
        index_zdj = 7;
    }
    else {
        index_zdj -=1;
    }
    zdjecie.src = index_zdj + '.jpg';
}

function nastepne() {
    if (index_zdj == 7) {
        index_zdj = 1;
    }
    else {
        index_zdj +=1;
    }
    zdjecie.src = index_zdj + '.jpg';
}