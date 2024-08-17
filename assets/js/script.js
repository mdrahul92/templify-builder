jQuery(document).ready(function($) {
// Hide all tab content except the first one by default
$('.tab-content').hide();
$('.tab-content:first').show();

// Add click event listener to tab links
$('.tab-link').click(function(e) {
    e.preventDefault(); // Prevent default link behavior

    // Remove active class from all tabs
    $('.tab-link').removeClass('active');

    // Add active class to the clicked tab
    $(this).addClass('active');

    // Hide all tab content
    $('.tab-content').hide();

    // Show the selected tab content
    var tabID = $(this).data('tab');
    $('#' + tabID).show();
});

    // Check URL and Key inputs and update button text
    function checkInputs() {
        var url = $('#templify-core-url').val();
        var key = $('#templify-core-key').val();

        if (url && key) {
            $('#templify-core-button').text('Unlink With Templify Core');
        } else {
            $('#templify-core-button').text('Link With Templify Core');
        }
    }


    // Initial check on page load
    checkInputs();

    // Check inputs on keyup event
    $('#templify-core-url, #templify-core-key').on('keyup', function() {
        checkInputs();
    });


    $('#templify-form').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        var url = $('#templify-core-url').val();
        var key = $('#templify-core-key').val();

        // Check if both fields are filled
        if (url === '' || key === '') {
            alert('Please fill in both fields.');
            return;
        }

        $.ajax({
            url: wpApiSettings.root + 'templify/v1/link', // Use the WordPress API root URL
            type: 'POST',
            headers: {
                'X-WP-Nonce': wpApiSettings.nonce // Include the nonce for security
            },
            data: {
                url: url,
                key: key
            },
            success: function(response) {
                if (response.status === 200) { // Check for success response
                    alert('Success: ' + response.message);
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                alert('An error occurred: ' + error);
            }
        });
    });
});
