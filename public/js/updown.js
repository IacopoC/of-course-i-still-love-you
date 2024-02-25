
document.addEventListener('DOMContentLoaded',function() {

    let messageId = document.querySelectorAll('[data-id]');

    let allId;
    messageId.forEach((singleId) => {
      allId = singleId.dataset.id;
    });

     document.getElementById("up-vote").addEventListener("click", upVote);

function upVote() {
    let urlUp = `/messages-list/${allId}/up`;

    fetch(urlUp, { method:'GET',
    })
        .then(response => {
            console.log("Up vote");
        })
        .catch(error => console.log("Error in vote"));
}
});



