$(document).ready(function() {
    $('#loginForm').submit(function(e) {
        e.preventDefault(); // Prevent default form submission
        
        // Get form data
        var role = $('#role').val();
        var username = $('#username').val();
        var password = $('#password').val();
        
        // Debugging: Print form data
        console.log("Role:", role);
        console.log("Username:", username);
        console.log("Password:", password);

        // Send AJAX request to login.php
        $.ajax({
            type: 'POST',
            url: 'login.php',
            data: {
                role: role,
                username: username,
                password: password
            },
            success: function(response) {
                console.log("Response:", response); // Debugging: Print response from server
                
                // Parse JSON response
                var jsonResponse = JSON.parse(response);
                
                // Check status
                if (jsonResponse.status === 'success') {
                    // Redirect to the interface
                    window.location.href = jsonResponse.interface;
                } else {
                    // Display error message
                    alert('Une erreur s\'est produite. Veuillez réessayer.');
                }
            },
            error: function(xhr, status, error) {
                // Display error message if AJAX request fails
                console.log("AJAX Error:", error);
                alert('Une erreur s\'est produite. Veuillez réessayer.');
            }
        });
    });
});
