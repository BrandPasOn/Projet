document.addEventListener("DOMContentLoaded", function () {
    // select nav element
    const navElements = [
        { nav: document.querySelector("#nav-1"), dropdown: document.querySelector("#nav-1-dropdown"), isVisible: false },
        { nav: document.querySelector("#nav-2"), dropdown: document.querySelector("#nav-2-dropdown"), isVisible: false },
        { nav: document.querySelector("#nav-3"), dropdown: document.querySelector("#nav-3-dropdown"), isVisible: false }
    ];

    if (navElements.some(element => element.nav === null )) {
        return;
    }
    // show/hide element
    function toggleDropdown(nav, dropdown, isVisible) {
        if (!isVisible) {
            dropdown.style.removeProperty("display");
        } else {
            dropdown.style.display = "none";
        }
        return !isVisible;
    }


    // hide element exept selected nav
    function hideAllNavElementsExcept(index) {
        navElements.forEach((element, i) => {
            if (i !== index) {
                element.isVisible = false;
                element.dropdown.style.display = "none";
            }
        });
    }

    // Hide nav element
    function hideNavElement(element) {
        element.isVisible = false;
        element.dropdown.style.display = "none";
    }

    // show dropdown on click
    navElements.forEach((element, index) => {
        element.nav.addEventListener('click', () => {
            hideAllNavElementsExcept(index);
            element.isVisible = toggleDropdown(element.nav, element.dropdown, element.isVisible);
        });
    });

    // show seachvalue
    function showSearchValue(e) {
        console.log(e.target.value)
        if (e.target.value.length >= 2) {
            searchValue.style.removeProperty("display");
        }
    }

    // Hide search value
    function hideSearchValue() {
        if (searchValue) {
            searchValue.style.display = "none";
        }
    }

    // select search input
    const searchInput = document.querySelector("#search");
    const searchValue = document.querySelector("#search-value");

    if (searchInput) {
        searchInput.addEventListener("input", showSearchValue);
        searchInput.addEventListener("click", showSearchValue);
        searchInput.addEventListener("input", function (event) {
            if (event.target.value.length === 0) {
                hideSearchValue();
            }

        });
    }

    // hide element when clic outside
    document.addEventListener("click", function (event) {
        const clickedOutsideNavElements = navElements.every((element) => {
            return event.target !== element.nav && event.target !== element.dropdown;
        });

        if (clickedOutsideNavElements) {
            navElements.forEach((element) => {
                hideNavElement(element);
            });
        }

        if (event.target !== searchInput && event.target !== searchValue) {
            hideSearchValue();
        }
        
    });
});