function convertToUpperCase() {
    var searchInput = document.getElementById('search-input');
    searchInput.value = searchInput.value.toUpperCase();
}


function redirectToCollege(collegeId) {
    window.location.href = "/college/" + collegeId;
}

//modal data sample
document.addEventListener('DOMContentLoaded', function () {
    const modals = document.querySelectorAll('.modal');

    modals.forEach(modal => {
        modal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const facultyName = button.closest('.container').dataset.facultyName;
            const modalBody = modal.querySelector('.modal-body');
            modalBody.querySelector('#facultyNamePlaceholder').textContent = facultyName;
        });
    });
});