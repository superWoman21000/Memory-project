document.addEventListener("DOMContentLoaded", function() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "testCode.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById("annonce-container").innerHTML = xhr.responseText;
        }
    };
    xhr.send();
});

function redirectToAnotherPage() {
    // Redirect the user to another page
    window.location.href = 'postulerEntrepreneur.php';
}