function zdjecie(foto){
    console.log(foto);
    document.querySelector('#glowny img').src = foto + ".jpg";
}

function ikona() {
    var icon = document.getElementById('icon');
    if (icon.src.includes('icon-off.png')){
        icon.src = 'icon-on.png';
    }
    else {
        icon.src = 'icon-off.png';
    }
}
