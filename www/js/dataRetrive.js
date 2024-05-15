document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent form submissionx

    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    // AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "authenticate.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Handle response from the server
            try {
                var response = JSON.parse(xhr.responseText);
                if (response.success) {
                    window.location.href = response.redirect; // Redirect to interface page
                } else {
                    alert(response.message); // Display error message
                }
            }
            catch (error) {
                console.log('Error parsing JSON:', error, xhr.responseText);
            }
        }
    };
    var data = "username=" + encodeURIComponent(username) + "&password=" + encodeURIComponent(password);
    xhr.send(data);
});
