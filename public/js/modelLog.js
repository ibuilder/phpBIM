// This file manages the display and interaction with the model log.

document.addEventListener('DOMContentLoaded', function() {
    const modelLogTable = document.getElementById('modelLogTable');
    const filterInput = document.getElementById('filterInput');
    const sortSelect = document.getElementById('sortSelect');

    // Fetch and display model log data
    function fetchModelLog() {
        fetch('/api/models')
            .then(response => response.json())
            .then(data => {
                displayModelLog(data);
            })
            .catch(error => console.error('Error fetching model log:', error));
    }

    // Display model log data in the table
    function displayModelLog(models) {
        modelLogTable.innerHTML = '';
        models.forEach(model => {
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${model.id}</td>
                <td>${model.name}</td>
                <td>${model.uploaded_at}</td>
                <td>${model.user}</td>
                <td>
                    <button class="btn btn-info" onclick="viewModel(${model.id})">View</button>
                    <button class="btn btn-danger" onclick="deleteModel(${model.id})">Delete</button>
                </td>
            `;
            modelLogTable.appendChild(row);
        });
    }

    // Filter models based on input
    filterInput.addEventListener('input', function() {
        const filterValue = filterInput.value.toLowerCase();
        const rows = modelLogTable.getElementsByTagName('tr');
        Array.from(rows).forEach(row => {
            const cells = row.getElementsByTagName('td');
            const match = Array.from(cells).some(cell => cell.textContent.toLowerCase().includes(filterValue));
            row.style.display = match ? '' : 'none';
        });
    });

    // Sort models based on selected criteria
    sortSelect.addEventListener('change', function() {
        const sortValue = sortSelect.value;
        const rows = Array.from(modelLogTable.getElementsByTagName('tr'));
        rows.sort((a, b) => {
            const aValue = a.cells[sortValue].textContent;
            const bValue = b.cells[sortValue].textContent;
            return aValue.localeCompare(bValue);
        });
        rows.forEach(row => modelLogTable.appendChild(row));
    });

    // Initial fetch of model log data
    fetchModelLog();
});