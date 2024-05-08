//convert search input to upper case
function convertToUpperCase() {
    var searchInput = document.getElementById('search-input');
    searchInput.value = searchInput.value.toUpperCase();
}

//college page redirect with college id
function redirectToCollege(collegeId) {
    window.location.href = "/college/" + collegeId;
}

//login redirect
function login() {
    window.location.href = "https://faculty.msugensan.edu.ph";
}

//colege page modal
document.addEventListener('DOMContentLoaded', function () {
    const modals = document.querySelectorAll('.modal');

    modals.forEach(modal => {
        modal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const facultyInfo = JSON.parse(button.closest('.container').dataset.facultyInfo);
            const modalBody = modal.querySelector('.modal-body');
            const facultyName = facultyInfo.name || 'Unknown Name';

            const facultyPhoto = facultyInfo.photo;
            const noPhoto = facultyInfo.no_photo;

            const departmentNewName = facultyInfo.department || 'Unknown Department';
            const NewSpecializations = facultyInfo.specializations || 'No Data';
            const id = facultyInfo.id;
            const rank = facultyInfo.rank || 'Unkown Rank';
            modalBody.innerHTML = `
                <div class="position-relative mb-3">
                    <div class="row">
                        <div class="col col-5 col-md-7"></div>
                        <div class="col col-6 col-md-4">
                            <i class="fa fa-user"></i>
                            <a href="/profile/${id}" style="text-decoration: none;">
                                <span class="text-black">View Full Profile</span>
                            </a>
                        </div>
                        <div class="col col-1 col-md-1"><button type="button" class="btn-close position-absolute end-0" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col col-8 col-md-6 custom-column">
                            <div class="container-fluid mb-2">
                                <img src="${facultyPhoto}" class="modal_photo rounded" alt=" No Photo">                 
                            </div>
                        </div>
                        <div class="col custom-column">
                            <div class="container-custom">
                                <h3 class="maroontext"><strong>${facultyName}</strong></h3>
                                <h5 class="mt-0"><span class="modaltext-two"><strong>${rank}</strong></span><span class="fw-lighter modaltext-two">, ${departmentNewName}</span></h5>
                                <hr>

                                <!-- change data when cleansing done (data separate with ;) -->

                                <h5 class="modaltext-two mt-0"><strong>Highest Educational Attainment:</strong> ${NewSpecializations}<span class="modalspan"></span></h5>
                                <h5 class="modaltext-two mt-0"><strong>Specializations:</strong><span class="modalspan"> ${NewSpecializations}</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });
    });
});

//search result modal
document.addEventListener('DOMContentLoaded', function () {
    const modals = document.querySelectorAll('.modal');

    modals.forEach(modal => {
        modal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const facultyInfo = JSON.parse(button.closest('.col').dataset.facultyInfo);
            const modalBody = modal.querySelector('.modal-body');
            const facultyName = facultyInfo.name || 'Unknown Name';
            const facultyPhoto = facultyInfo.photo;
            const rankFullName = facultyInfo.rank || 'Unknown Rank';
            const departmentNewName = facultyInfo.department || 'Unknown Department';
            const NewSpecializations = facultyInfo.specializations || 'No Data';
            const id = facultyInfo.id;

            modalBody.innerHTML = `
                <div class="position-relative mb-3">
                    <div class="row">
                        <div class="col col-5 col-md-7"></div>
                        <div class="col col-6 col-md-4">
                            <i class="fa fa-user"></i>
                            <a href="/profile/${id}" style="text-decoration: none;">
                                <span class="text-black">View Full Profile</span>
                            </a>
                        </div>
                        <div class="col col-1 col-md-1"><button type="button" class="btn-close position-absolute end-0" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="col col-8 col-md-6 custom-column">
                            <div class="container-fluid mb-2">
                                <img src="${facultyPhoto}" class="modal_photo rounded" alt="No Photo">
                            </div>
                        </div>
                        <div class="col custom-column">
                            <div class="container-custom">
                                <h3 class="maroontext"><strong>${facultyName}</strong></h3>
                                <h5 class="mt-0"><span class="modaltext-two">${rankFullName}</span><span class="fw-lighter modaltext-two">, ${departmentNewName}</span></h5>
                                <hr>
                                <h5 class="modaltext-two mt-0"><strong>Highest Educational Attainment:</strong> ${NewSpecializations}<span class="modalspan"></span></h5>
                                <h5 class="modaltext-two mt-0"><strong>Specializations:</strong><span class="modalspan"> ${NewSpecializations}</span></h5>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });
    });
});
