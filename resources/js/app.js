import './bootstrap';

// AdminKit (required)
//import './modules/bootstrap';
import './modules/sidebar';
import './modules/theme';
import './modules/feather';

// Charts
import './modules/chartjs';

// Forms
import './modules/flatpickr';

// Maps
import './modules/vector-maps';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

$(function () {
    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Modals
    window.livewire.on('toggleNewComponentModal', () =>
        $('#newComponentModal').modal('toggle')
    );
});
