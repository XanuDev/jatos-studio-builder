import './bootstrap';

// AdminKit (required)
//import './modules/bootstrap';
import './modules/sidebar';
import './modules/theme';
import './modules/feather';

// Charts
//import './modules/chartjs';

// Forms
import './modules/flatpickr';

// Maps
//import './modules/vector-maps';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// FormBuilder
import formBuilder from 'formBuilder';
window.formBuilder = formBuilder;

// Ckeditor
import ClassicEditor from '@ckeditor/ckeditor5-build-classic/build/ckeditor';
window.ClassicEditor = ClassicEditor;

// ref: https://tobiasahlin.com/blog/move-from-jquery-to-vanilla-javascript/#document-ready

var ready = (callback) => {
  if (document.readyState != "loading") callback();
  else document.addEventListener("DOMContentLoaded", callback);
}

// jquery-ui
import 'jquery-ui/ui/widgets/sortable';

$(function () {
    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Modals
    window.livewire.on('toggleAddComponentModal', () =>
        $('#addComponentModal').modal('toggle')
    );
    
    window.livewire.on('toggleDeleteModal', () => 
        $('#deleteModal').modal('toggle')
    );
});
