function validateForm() {

    let name = document.getElementById("student_name").value.trim();
    let register = document.getElementById("register_no").value.trim();
    let course = document.getElementById("course").value.trim();
    let rating = document.getElementById("rating").value;
    let comments = document.getElementById("comments").value.trim();

    // Student name
    let namePattern = /^[A-Za-z ]+$/;

    if (name.length < 3 || name.length > 50) {
        alert("Student name must contain 3 to 50 characters.");
        return false;
    }

    if (!namePattern.test(name)) {
        alert("Student name must contain only letters and spaces.");
        return false;
    }

    // Register number
    let registerPattern = /^[A-Za-z0-9-]{5,20}$/;

    if (!registerPattern.test(register)) {
        alert("Enter a valid register number.");
        return false;
    }

    // Course
    if (course.length < 2 || course.length > 100) {
        alert("Course name must contain 2 to 100 characters.");
        return false;
    }

    // Rating
    if (rating < 1 || rating > 5 || rating == "") {
        alert("Please select a rating from 1 to 5.");
        return false;
    }

    // Comments
    if (comments.length < 10) {
        alert("Comments must contain at least 10 characters.");
        return false;
    }

    if (comments.length > 500) {
        alert("Comments cannot exceed 500 characters.");
        return false;
    }

    alert("Feedback validated successfully!");

    return true;
}