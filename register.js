document.addEventListener("DOMContentLoaded", () => {

    const form = document.querySelector("form");
    const phone = document.getElementById("phno");

    // Allow only numbers in phone field
    phone.addEventListener("input", function () {
        this.value = this.value.replace(/\D/g, "");

        if (this.value.length > 10) {
            this.value = this.value.slice(0, 10);
        }
    });

    form.addEventListener("submit", function (e) {

        if (phone.value.length !== 10) {
            e.preventDefault();
            alert("Phone number must contain exactly 10 digits.");
            phone.focus();
            return;
        }

        // alert("Student Registered Successfully!");
    });

});