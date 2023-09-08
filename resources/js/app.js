import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

window.confirmDelete = () => {
    return confirm('Vuoi davvero eliminare questo elemento?');
}

window.confirmEdit = () => {
    return confirm('Vuoi applicare le modifiche?');
}

// password validation in Registration form

// Aspetta che il documento sia completamente caricato prima di eseguire il codice JavaScript
document.addEventListener('DOMContentLoaded', function () {
    // Ottieni l'elemento di input della password
    var passwordInput = document.getElementById('password');
    // Ottieni l'elemento di input per la conferma della password
    var confirmPasswordInput = document.getElementById('password-confirm');

    // Aggiungi un ascoltatore di eventi per l'input sulla conferma della password
    confirmPasswordInput.addEventListener('input', function () {
        if (passwordInput.value.length < 8) {
            passwordInput.setCustomValidity('La password deve contenere almeno 8 caratteri.');
        } else {
            passwordInput.setCustomValidity('');
            // Controlla se il valore della conferma della password non corrisponde al valore della password principale
            if (confirmPasswordInput.value !== passwordInput.value) {
                // Imposta un messaggio di errore personalizzato
                confirmPasswordInput.setCustomValidity('Le password non corrispondono.');
            } else {
                // Se le password corrispondono, rimuovi il messaggio di errore personalizzato
                confirmPasswordInput.setCustomValidity('');
            }
        }
    });
});


