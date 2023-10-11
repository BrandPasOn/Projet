document.addEventListener("DOMContentLoaded", function () {
    const password = document.querySelector("#password");
    const validationElements = {
        length: document.querySelector("#validation-length"),
        letter: document.querySelector("#validation-letter"),
        capital: document.querySelector("#validation-capital-letter"),
        special: document.querySelector("#validation-special-character"),
        number: document.querySelector("#validation-number"),
    };

    const validators = {
        length: (value) => value.length >= 8,
        letter: (value) => /[A-Za-z]/.test(value),
        capital: (value) => /[A-Z]/.test(value),
        special: (value) => /[^a-zA-Z0-9]/.test(value),
        number: (value) => /[0-9]/.test(value),
    };

    password.addEventListener("input", function (event) {
        const passwordValue = event.target.value;

        for (const key in validators) {
            if (validators.hasOwnProperty(key)) {
                const isValid = validators[key](passwordValue);
                validationElements[key].style.color = isValid ? "green" : "red";
            }
        }
    });
});