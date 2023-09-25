
if(document.getElementById('trapMode1').checked = true) {
    let element1 = document.getElementById('circle-orbit-container');
    element1.classList.remove('visually-hidden');
    let element2 = document.getElementById('image-achab');
    element2.classList.add('visually-hidden');
}

if(document.getElementById('trapMode1').checked = false) {
    let element1 = document.getElementById('image-achab');
    element1.classList.remove('visually-hidden');
    let element2 = document.getElementById('circle-orbit-container');
    element2.classList.add('visually-hidden');

}
