document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('open-profile-popup').addEventListener('click', function(event) {
        event.preventDefault();
        document.getElementById('profile-popup').style.display = 'flex';
    });

    document.getElementById('close-profile-popup').addEventListener('click', function() {
        document.getElementById('profile-popup').style.display = 'none';
    });

    window.addEventListener('click', function(event) {
        if (event.target == document.getElementById('profile-popup')) {
            document.getElementById('profile-popup').style.display = 'none';
        }
    });
});
