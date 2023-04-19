import './bootstrap';
import bootstrap from 'bootstrap/dist/js/bootstrap.bundle.min';
import $ from 'jquery';

window.bootstrap = bootstrap;
let editModal = document.getElementById('editModal');
if (editModal) {
    var myModal = new bootstrap.Modal(document.getElementById('editModal'));
}
Livewire.on('closeModal', () => {
    myModal.hide();
})
