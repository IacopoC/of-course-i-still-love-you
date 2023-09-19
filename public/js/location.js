// script geocode //

document.addEventListener('DOMContentLoaded',function() {
    let long;
    let lat;

    let locationData = document.querySelector('.location-data');

    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
            long = position.coords.longitude;
            lat = position.coords.latitude

            const location_key =  window.google_api_key;
            const api_location = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${lat},${long}&key=${location_key}`;


            fetch(api_location)
                .then(response => {
                    return response.json();
                })

                .then(location_data => {

                    let {compound_code} = location_data.plus_code;
                    let compound_short = compound_code.slice(8);

                    locationData.innerHTML = compound_short;
                    document.getElementById('location').value = compound_short


                })

                .catch(error => console.log("Errore nel mostrare indizzo geolocalizzato"));

        })
    } else {
        alert('Non hai accesso alla geolocalizzazione');
    }
});
