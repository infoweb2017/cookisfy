import './bootstrap';

document.addEventListener("DOMContentLoaded", function () {
    const cookieContainer = document.getElementById('cookieContainer');
    const aceptarButton = document.getElementById('aceptarCookies');
    const cancelarButton = document.getElementById('cancelarCookies');

    const sendCookieConsent = (consent) => {
        fetch('/cookie-consent', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ consent: consent })
        }).then(response => {
            if (response.ok) {
                cookieContainer.style.display = 'none';
            }
        });
    };

    if (aceptarButton) {
        aceptarButton.addEventListener('click', function () {
            sendCookieConsent(true);
        });
    }

    if (cancelarButton) {
        cancelarButton.addEventListener('click', function () {
            sendCookieConsent(false);
        });
    }
});


