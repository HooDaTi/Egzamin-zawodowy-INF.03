function wysylanie() {
    const wpisana_wiad = document.getElementById('wiadomosc');
    const nowydiv = document.createElement('div');
    
    nowydiv.classList.add("jolka");
    
    document.getElementById('chat').appendChild(nowydiv);

    nowydiv.innerHTML = `<img src="Jolka.jpg"> <p>${wpisana_wiad.value}</p>`;

    nowydiv.scrollIntoView();
    wpisana_wiad.value = '';
}


function losowa() {
    const wypowiedzi_krzys = ["Świetnie!",
"Kto gra główną rolę?",
"Lubisz filmy Tego reżysera?",
"Będę 10 minut wcześniej",
"Może kupimy sobie popcorn?",
"Ja wolę Colę",
"Zaproszę jeszcze Grześka",
"Tydzień temu też byłem w kinie na Diunie",
"Ja funduję bilety"];

    let x = (Math.floor(Math.random()*9));

    const rand_krzys = wypowiedzi_krzys[x];

    const nowydiv = document.createElement('div');
    nowydiv.classList.add('krzysiek');
    document.getElementById('chat').appendChild(nowydiv);

    nowydiv.innerHTML = ` <img src="Krzysiek.jpg"> <p> ${rand_krzys} </p>`

    nowydiv.scrollIntoView();


}
