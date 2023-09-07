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
