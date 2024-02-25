
document.addEventListener('DOMContentLoaded',function() {

     document.getElementById("up-vote").addEventListener("click", upVote);

function upVote() {

    let dataId = document.querySelector('[data-id]');
    let singleId = dataId.getAttribute('data-id');

    let urlUp = `/messages-list/${singleId}/up`;

    fetch(urlUp, { method:'GET',
    })
        .then(response => {
            console.log("Up vote");
        })
        .catch(error => console.log("Error in vote"));
}
});



