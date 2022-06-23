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


(function($) {
    // $ works fine in here
    // ...

    // Uncaught TypeError: $(...).summernote is not a function
    $('#summernote').summernote();

})(window.jQuery);

$(function () {
    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Modals
    window.livewire.on('toggleAddComponentModal', () =>
        $('#addComponentModal').modal('toggle')
    );
});
