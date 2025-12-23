
document.addEventListener("DOMContentLoaded", function () {
    const currentPage = window.location.pathname;

    const showAlert = (message) => {
        alert(message);
    };

    //Signup Page 
    if (currentPage.includes("Signup.html")) {
        const form = document.querySelector("form");

        form.addEventListener("submit", function (e) {
            e.preventDefault();

            const username = document.getElementById("username").value.trim();
            const email = document.getElementById("email").value.trim();
            const passwordFields = document.querySelectorAll('input[type="password"]');
            const password = passwordFields[0].value.trim();
            const confirmPassword = passwordFields[1].value.trim();

            if (!username || !email || !password || !confirmPassword) {
                showAlert("All fields are required.");
                return;
            }

            if (password !== confirmPassword) {
                showAlert("Password and Confirm Password do not match.");
                return;
            }

            const user = { username, email, password };
            localStorage.setItem("user", JSON.stringify(user));

            showAlert("Signup successful!");
            window.location.href = "1index.html";
        });
    }

    //  Login Page Validation 
    if (currentPage.includes("Login.html")) {
        const form = document.querySelector("form");

        form.addEventListener("submit", function (e) {
            e.preventDefault();

            const username = document.getElementById("username").value.trim();
            const password = document.getElementById("password").value.trim();

            if (!username || !password) {
                showAlert("Please enter both username and password.");
                return;
            }

            const storedUser = JSON.parse(localStorage.getItem("user"));

            if (!storedUser) {
                showAlert("No user registered yet. Please sign up first.");
                return;
            }

            if (storedUser.username !== username || storedUser.password !== password) {
                showAlert("Invalid username or password.");
                return;
            }

            showAlert("Login successful!");
            window.location.href = "1index.html";
        });
    }


    // Forget Password Page Validation 
    if (currentPage.includes("forgetpassword.html")) {
        const form = document.querySelector("form");

        form.addEventListener("submit", function (e) {
            e.preventDefault();

            const email = document.getElementById("email").value.trim();
            const otp = document.getElementById("otp").value.trim();
            const newPassword = document.getElementById("new-password").value.trim();
            const confirmPassword = document.getElementById("confirm-password").value.trim();

            if (!email ||  !newPassword || !confirmPassword) {
                showAlert("Please fill in all fields.");
                return;
            }

            if (newPassword !== confirmPassword) {
                showAlert("New Password and Confirm Password do not match.");
                return;
            }

            const confirmUpdate = confirm("Are you sure you want to update your password?");
            if (!confirmUpdate) {
                showAlert("Password update cancelled.");
                return;
            }

            const storedUser = JSON.parse(localStorage.getItem("user"));

            if (!storedUser || storedUser.email !== email) {
                showAlert("No user found with this email.");
                return;
            }

            storedUser.password = newPassword;
            localStorage.setItem("user", JSON.stringify(storedUser));

            showAlert("Password updated successfully.");
            window.location.href = "Login.html";
        });
    }





    //  FAQ Page Toggle Answers 
    if (currentPage.includes("FAQ.html")) {
        document.querySelectorAll(".question").forEach((question) => {
            question.addEventListener("click", () => {
                const answer = question.nextElementSibling;
                if (answer.style.display === "block") {
                    answer.style.display = "none";
                } else {
                    answer.style.display = "block";
                }
            });
        });
    }


});


// EMI CALCULATOR
function calculateEMI() {
    
    let loan = document.getElementById("loan").value;
    let rate = document.getElementById("rate").value;
    let tenure = document.getElementById("tenure").value;

    
    loan = parseFloat(loan);
    rate = parseFloat(rate);
    tenure = parseInt(tenure);

    
    if (isNaN(loan) || isNaN(rate) || isNaN(tenure) || loan <= 0 || rate <= 0 || tenure <= 0) {
        document.getElementById("result").innerHTML = `<p style="color:red;">⚠️ Please enter valid values!</p>`;
        return;
    }

    

    let monthlyRate = rate / 12 / 100;
    let months = tenure * 12;

    let emi = (loan * monthlyRate * Math.pow(1 + monthlyRate, months)) /
              (Math.pow(1 + monthlyRate, months) - 1);

    emi = emi.toFixed(2);

    
    let totalPayment = (emi * months).toFixed(2);
    let totalInterest = (totalPayment - loan).toFixed(2);

    
    document.getElementById("result").innerHTML = `
        <h3>📊 EMI Calculation Result</h3>
        <p><b>Monthly EMI:</b> ₹${emi}</p>
        <p><b>Total Payment (Principal + Interest):</b> ₹${totalPayment}</p>
        <p><b>Total Interest:</b> ₹${totalInterest}</p>
    `;
}
