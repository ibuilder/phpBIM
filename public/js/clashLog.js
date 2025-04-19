// clashLog.js
document.addEventListener('DOMContentLoaded', function() {
    const clashTableBody = document.getElementById('clashTableBody');
    const clashForm = document.getElementById('clashForm');
    const clashIdInput = document.getElementById('clashId');
    
    // Fetch and display clashes
    function fetchClashes() {
        fetch('/api/clashes')
            .then(response => response.json())
            .then(data => {
                clashTableBody.innerHTML = '';
                data.forEach(clash => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${clash.id}</td>
                        <td>${clash.coordinates}</td>
                        <td>${clash.companies.join(', ')}</td>
                        <td>${clash.comments.length}</td>
                        <td>
                            <button class="btn btn-info" onclick="viewClash(${clash.id})">View</button>
                            <button class="btn btn-warning" onclick="editClash(${clash.id})">Edit</button>
                            <button class="btn btn-danger" onclick="deleteClash(${clash.id})">Delete</button>
                        </td>
                    `;
                    clashTableBody.appendChild(row);
                });
            });
    }

    // Handle form submission for adding/editing clashes
    clashForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(clashForm);
        const clashId = clashIdInput.value;

        const method = clashId ? 'PUT' : 'POST';
        const url = clashId ? `/api/clashes/${clashId}` : '/api/clashes';

        fetch(url, {
            method: method,
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            fetchClashes();
            clashForm.reset();
            clashIdInput.value = '';
        });
    });

    // View clash details
    window.viewClash = function(id) {
        fetch(`/api/clashes/${id}`)
            .then(response => response.json())
            .then(clash => {
                // Populate the form with clash details for viewing
                // Implement viewing logic here
            });
    };

    // Edit clash
    window.editClash = function(id) {
        fetch(`/api/clashes/${id}`)
            .then(response => response.json())
            .then(clash => {
                // Populate the form with clash details for editing
                // Implement editing logic here
            });
    };

    // Delete clash
    window.deleteClash = function(id) {
        fetch(`/api/clashes/${id}`, {
            method: 'DELETE'
        })
        .then(response => {
            if (response.ok) {
                fetchClashes();
            }
        });
    };

    // Initial fetch of clashes
    fetchClashes();
});