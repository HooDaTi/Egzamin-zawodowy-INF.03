var image_array = ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg'];
var indexing = 0;

function nextimg(){
    indexing = (indexing + 1) % image_array.length;
    change();
}

function lastimg(){
    if (indexing != 0){
    indexing = (indexing - 1) % image_array.length;
    }
    else{
        indexing = 4;
    }
    change();
}

function zamiana(nr){
    indexing = nr - 1;
    change();
}

function change(){
    var duze_zdj = document.getElementById('duzy');
    duze_zdj.src = image_array[indexing];
}