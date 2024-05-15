// Event handler for searching projects
$('#searchInput').on('input', function() {
    var searchTerm = $(this).val().trim(); // Get the search term
    if (searchTerm !== '') {
        fetchFilteredProjects(projectLeaderID, searchTerm); // Fetch filtered projects
    } else {
        fetchRelationships(projectLeaderID); // Fetch all projects if search term is empty
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

            // Populate projects dropdown with filtered projects
            $('#projetSummary').empty();
            $.each(response.projects, function(index, project) {
                $('#projetSummary').append('<option value="' + project.id + '">' + project.name + '</option>');
            });
        },
        error: function(xhr, status, error) {
            console.error("Error fetching filtered projects:", error);
        }
    });
}
