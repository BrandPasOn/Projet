document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.querySelector("#search");
    const searchValue = document.querySelector("#search-value");

    function showSearchValue() {
        if (searchInput.value.length >= 2) {
            searchValue.style.removeProperty("display");
        }
    }

    function hideSearchValue() {
        if(searchValue){
            searchValue.style.display = "none";
        }
    }

    if(searchInput){
        searchInput.addEventListener("input", showSearchValue);
        searchInput.addEventListener("click", showSearchValue);
        searchInput.addEventListener("input", function (event) {
            if (event.target.value.length === 0) {
                hideSearchValue();
            }
        });
    }
    

    document.addEventListener("click", function (event) {
        if (event.target !== searchInput && event.target !== searchValue) {
            hideSearchValue();
        }
    });
});
