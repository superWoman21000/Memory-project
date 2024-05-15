$(document).ready(function() {
    $('#addProjetButton').click(function() {
        $.ajax({
            url: 'fetch_projet_info.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log('AJAX Success:', response); // Debugging line
                if(response.error) {
                    console.error('Server Error: ' + response.error);
                    alert('Error fetching project information. Please try again.');
                    return;
                }
                $('#nomProjet').val(response.nomProjet);
                $('#lieu').val(response.lieu);
                $('#dateInitial').val(response.dateInitial);
                $('#pourcentage').val(response.pourcentage);
                $('#nomEntrepreneur').val(response.nomEntrepreneur);
                $('#nomBureauEtude').val(response.nomBureauEtude);
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + error);
                alert('Error fetching project information. Please try again.');
            }
        });
    });
});