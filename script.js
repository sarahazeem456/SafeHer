

/* 🚨 SOS FUNCTION (LIVE LOCATION) */
function triggerSOS() {

    if (navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(
            function (position) {

                const lat = position.coords.latitude;
                const lon = position.coords.longitude;

                alert(
                    "🚨 SOS ALERT SENT!\n\n" +
                    "Your live location:\n" +
                    "Latitude: " + lat + "\n" +
                    "Longitude: " + lon + "\n\n" +
                    "Emergency contacts will be notified (simulation)."
                );
            },

            function () {
                alert("❌ Location access denied. Please enable GPS.");
            }
        );

    } else {
        alert("❌ Geolocation not supported by your browser.");
    }
}


/* 🧾 REGISTER VALIDATION */
function validateRegister(e) {

    e.preventDefault();

    let name = document.getElementById("name")?.value.trim();
    let email = document.getElementById("email")?.value.trim();
    let phone = document.getElementById("phone")?.value.trim();

    if (!name || !email || !phone) {
        alert("⚠️ Please fill all fields");
        return;
    }
} 