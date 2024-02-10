import './bootstrap';

function toggleModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.classList.toggle('hidden');
}


document.getElementById('addTripButton').addEventListener('click', () => toggleModal('addTripModal'));
document.getElementById('closeModalButton').addEventListener('click', () => toggleModal('addTripModal'));