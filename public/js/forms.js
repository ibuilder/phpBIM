document.addEventListener('DOMContentLoaded', function() {
    const clashForm = document.getElementById('clashForm');
    const modelForm = document.getElementById('modelForm');

    if (clashForm) {
        clashForm.addEventListener('submit', function(event) {
            event.preventDefault();
            // Validate and submit clash form
            const formData = new FormData(clashForm);
            submitForm('/api/clashes', formData);
        });
    }

    if (modelForm) {
        modelForm.addEventListener('submit', function(event) {
            event.preventDefault();
            // Validate and submit model form
            const formData = new FormData(modelForm);
            submitForm('/api/models', formData);
        });
    }

    function submitForm(apiEndpoint, formData) {
        fetch(apiEndpoint, {
            method: 'POST',
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Form submitted successfully!');
                // Optionally, redirect or update the UI
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while submitting the form.');
        });
    }
});