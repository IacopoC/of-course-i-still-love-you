// script geocode //

document.addEventListener('DOMContentLoaded',function() {
    let long;
    let lat;

    let locationData = document.querySelector('.location-data');

    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(position => {
            long = position.coords.longitude;
            lat = position.coords.latitude;

            const location_key =  window.google_api_key;
            const api_location = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${lat},${long}&key=${location_key}`;


            fetch(api_location)
                .then(response => {
                    return response.json();
                })

                .then(location_data => {

                    let {compound_code} = location_data.plus_code;
                    let coordinates = `Latitude: ${lat}°, Longitude: ${long}°`;

                    locationData.textContent = 'Location Plus Code and Address: ' + compound_code + ' - ' + coordinates;
                    document.getElementById('location').value = compound_code;


                })

                .catch(error => console.log("Error in address location", error));

        }, errorCallback)
    }
    function errorCallback(error) {
        if (error.code === error.PERMISSION_DENIED) {
            const locationString = document.querySelector("#location-data-string");
            locationString.style.display = "none";
        }
    }
});
