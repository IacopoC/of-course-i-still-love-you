
document.addEventListener('DOMContentLoaded',function() {

    let messageAttribute = document.getElementById('up-vote');
    let messageId = messageAttribute.getAttribute('data-id');

     document.getElementById("up-vote").addEventListener("click", upVote);

function upVote() {
    let urlUp = `/messages-list/${messageId}/up`;

    fetch(urlUp, { method:'GET',
    })
        .then(response => {
            console.log("Up vote");
        })
        .catch(error => console.log("Error in vote"));
}
});



