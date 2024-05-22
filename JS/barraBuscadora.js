
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.getElementById("searchInput");
        const rows = document.querySelectorAll("tbody tr");

        searchInput.addEventListener("input", function() {
            const searchText = searchInput.value.trim().toLowerCase();

            rows.forEach(row => {
                const columns = row.querySelectorAll("td");
                let found = false;

                columns.forEach(column => {
                    if (column.textContent.toLowerCase().includes(searchText)) {
                        found = true;
                    }
                });

                if (found) {
                    row.style.display = ""; // Mostrar la fila si se encuentra el texto
                } else {
                    row.style.display = "none"; // Ocultar la fila si no se encuentra el texto
                }
            });
        });
    });
