document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("loginForm");

    if (loginForm) {
        loginForm.addEventListener("submit", function (e) {
            // Remove preventDefault() since Laravel will handle the POST
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;

            if (!email || !password) {
                e.preventDefault();
                alert("Please fill in all fields");
            }
        });
    }

    // Floating label effect
    document.querySelectorAll(".form-input").forEach((input) => {
        input.addEventListener("focus", () => {
            input.parentNode.classList.add("floating");
        });
        input.addEventListener("blur", () => {
            if (!input.value) {
                input.parentNode.classList.remove("floating");
            }
        });
    });
});

// Forgot password
function handleForgotPassword() {
    alert("Forgot password functionality would redirect to password reset page");
}

// Sign up
function handleSignUp() {
    alert("Sign up functionality would redirect to registration page");
}

// Language change
function handleLanguageChange(language) {
    console.log("Language changed to:", language);
    updateActiveLanguage(language);
}

function changeLanguage(language) {
    document.querySelector(".language-dropdown").value = language;
    handleLanguageChange(language);
}

function updateActiveLanguage(language) {
    document.querySelectorAll(".language-links a").forEach((link) => {
        link.classList.remove("active");
    });
    if (language !== "en") {
        const activeLink = document.getElementById("lang-" + language);
        if (activeLink) {
            activeLink.classList.add("active");
        }
    }
}

// Footer links
function handleFooterLink(section) {
    console.log("Footer link clicked:", section);
}
