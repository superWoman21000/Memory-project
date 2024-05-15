$(document).ready(function() {
    console.log("Fetching options...");

    // Send AJAX request to get options from the PHP file
    $.ajax({
        url: 'get_optionsBE.php',
        type: 'GET',
        dataType: 'json', // Specify that the expected response is JSON
        success: function(data) {
            console.log("Options received:", data);

            // Handle the JSON data here
            // For example, populate dropdowns or perform other actions based on the received data
            // Example:
            $.each(data.entrepreneurs, function(index, entrepreneur) {
                // Do something with each entrepreneur, such as adding an option to a dropdown
            });

            $.each(data.projets, function(index, projet) {
                // Do something with each project, such as adding an option to a dropdown
            });
        },
        error: function(xhr, status, error) {
            console.error("Error fetching options:", error);
            // Handle errors here, such as displaying an error message to the user
        }
    });
});
