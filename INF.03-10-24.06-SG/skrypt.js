const cyt1 = document.getElementById('cytat1');
const cyt2 = document.getElementById('cytat2');
const cyt3 = document.getElementById('cytat3');


function cytat1() {
    cyt1.style.display = "none";
    cyt2.style.display = "block";
}

function cytat2() {
    cyt2.style.display = "none";
    cyt3.style.display = "block";
}

function cytat3() {
    cyt3.style.display = "none";
    cyt1.style.display = "block";
}