$(document).ready(function() {
    console.log("chefServiceOption.js loaded");

    // Function to fetch relationships and populate dropdowns
    function fetchRelationships(projectLeaderID) {
        console.log("Fetching relationships for project leader ID:", projectLeaderID); // Debug statement

        $.ajax({
            url: 'fetch_options.php',
            method: 'POST',
            dataType: 'json',
            data: { projectLeaderID: projectLeaderID },
            success: function(response) {
                console.log("Response received:", response); // Debug statement

                // Populate entrepreneurs dropdown
                $('#entrepreneurSummary').empty();
                $.each(response.entrepreneurs, function(index, entrepreneur) {
                    $('#entrepreneurSummary').append('<option value="' + entrepreneur.id + '">' + entrepreneur.name + '</option>');
                });

                // Populate projects dropdown
                $('#projetSummary').empty();
                $.each(response.projets, function(index, projet) {
                    $('#projetSummary').append('<option value="' + projet.id + '">' + projet.name + '</option>');
                });

                // Populate bureaux d'étude dropdown
                $('#bureau_etudeSummary').empty();
                $.each(response.bureau_etude, function(index, bureau_etude) {
                    $('#bureau_etudeSummary').append('<option value="' + bureau_etude.id + '">' + bureau_etude.name + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error("Error fetching relationships:", error);
            }
        });
    }

    // Call fetchRelationships function here or wherever appropriate in your code
    fetchRelationships(projectLeaderID);

    // Event handler for searching projects
    $('#searchInput').on('input', function() {
        var searchTerm = $(this).val().trim(); // Get the search term
        if (searchTerm !== '') {
            fetchFilteredProjects(projectLeaderID, searchTerm); // Fetch filtered projects
        } else {
            fetchAllProjects(projectLeaderID); // Fetch all projects if search term is empty
        }
    });

    // Function to fetch filtered projects based on search term
    function fetchFilteredProjects(projectLeaderID, searchTerm) {
        $.ajax({
            url: 'fetch_filtered_projects.php',
            method: 'POST',
            dataType: 'json',
            data: {
                projectLeaderID: projectLeaderID,
                searchTerm: searchTerm
            },
            success: function(response) {
                console.log("Filtered projects received:", response); // Debug statement

                // Clear previous suggestions
                $('#suggestionsList').empty();

                // Populate suggestions list with filtered project names
                $.each(response.projects, function(index, project) {
                    $('#suggestionsList').append('<li>' + project.name + '</li>');
                });
            },
            error: function(xhr, status, error) {
                console.error("Error fetching filtered projects:", error);
            }
        });
    }

    // Event delegation for handling click on suggestions
    $('#suggestionsList').on('click', 'li', function() {
        var selectedProject = $(this).text();
        $('#modalProjectName').text(selectedProject); // Set modal project name
        $('#projectModal').modal('show'); // Show modal window using Bootstrap modal method
    });

    // Event handler for clicking the delete button
    $(document).ready(function() {
        console.log("chefServiceOption.js loaded");
    
        // Function to fetch relationships and populate dropdowns
        function fetchRelationships(projectLeaderID) {
            console.log("Fetching relationships for project leader ID:", projectLeaderID); // Debug statement
    
            $.ajax({
                url: 'fetch_options.php',
                method: 'POST',
                dataType: 'json',
                data: { projectLeaderID: projectLeaderID },
                success: function(response) {
                    console.log("Response received:", response); // Debug statement
    
                    // Populate entrepreneurs dropdown
                    $('#entrepreneurSummary').empty();
                    $.each(response.entrepreneurs, function(index, entrepreneur) {
                        $('#entrepreneurSummary').append('<option value="' + entrepreneur.id + '">' + entrepreneur.name + '</option>');
                    });
    
                    // Populate projects dropdown
                    $('#projetSummary').empty();
                    $.each(response.projets, function(index, projet) {
                        $('#projetSummary').append('<option value="' + projet.id + '">' + projet.name + '</option>');
                    });
    
                    // Populate bureaux d'étude dropdown
                    $('#bureau_etudeSummary').empty();
                    $.each(response.bureau_etude, function(index, bureau_etude) {
                        $('#bureau_etudeSummary').append('<option value="' + bureau_etude.id + '">' + bureau_etude.name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching relationships:", error);
                }
            });
        }
    
        // Call fetchRelationships function here or wherever appropriate in your code
        fetchRelationships(projectLeaderID);
    
        // Event handler for searching projects
        $('#searchInput').on('input', function() {
            var searchTerm = $(this).val().trim(); // Get the search term
            if (searchTerm !== '') {
                fetchFilteredProjects(projectLeaderID, searchTerm); // Fetch filtered projects
            } else {
                fetchAllProjects(projectLeaderID); // Fetch all projects if search term is empty
            }
        });
    
        // Function to fetch filtered projects based on search term
        function fetchFilteredProjects(projectLeaderID, searchTerm) {
            $.ajax({
                url: 'fetch_filtered_projects.php',
                method: 'POST',
                dataType: 'json',
                data: {
                    projectLeaderID: projectLeaderID,
                    searchTerm: searchTerm
                },
                success: function(response) {
                    console.log("Filtered projects received:", response); // Debug statement
    
                    // Clear previous suggestions
                    $('#suggestionsList').empty();
    
                    // Populate suggestions list with filtered project names
                    $.each(response.projects, function(index, project) {
                        $('#suggestionsList').append('<li>' + project.name + '</li>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching filtered projects:", error);
                }
            });
        }
    
        // Event delegation for handling click on suggestions
        $('#suggestionsList').on('click', 'li', function() {
            var selectedProject = $(this).text();
            $('#modalProjectName').text(selectedProject); // Set modal project name
            $('#projectModal').modal('show'); // Show modal window using Bootstrap modal method
        });
        $(document).ready(function() {
            // Event handler for clicking on the "Clear" button
            $('#clearButton').click(function() {
                if (confirm("Are you sure you want to clear the relationship?")) {
                    // User clicked OK, proceed with deletion
                    var projectID = $('#projetSummary').val(); // Get the ID of the selected project
        
                    // Send AJAX request to delete the relationship
                    $.ajax({
                        url: 'deletProjet.php',
                        method: 'POST',
                        data: {
                            projectID: projectID
                        },
                        success: function(response) {
                            // Handle success response
                            console.log("Relationship deleted successfully");
                            // Optionally, you can perform additional actions here, such as updating the UI
                        },
                        error: function(xhr, status, error) {
                            // Handle error response
                            console.error("Error deleting relationship:", error);
                        }
                    });
                }
            });
        });
        

    });
    
});
