function convertToUpperCase() {
    var searchInput = document.getElementById('search-input');
    searchInput.value = searchInput.value.toUpperCase();
}


function redirectToCollege(collegeId) {
    window.location.href = "/college/" + collegeId;
}