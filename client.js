window.addEventListener('DOMContentLoaded', function() {
  const databaseDropdown = document.getElementById('database');

  // Fetch tables when the selected database changes
  databaseDropdown.addEventListener('change', function() {
    const selectedDatabase = databaseDropdown.value;
    fetch(`/tables?database=${selectedDatabase}`)
      .then((response) => response.json())
      .then((tables) => {
        // Clear previous options
        while (databaseDropdown.options.length > 0) {
          databaseDropdown.remove(0);
        }

        // Add new options for the retrieved tables
        tables.forEach((table) => {
          const option = document.createElement('option');
          option.value = table;
          option.text = table;
          databaseDropdown.add(option);
        });
      })
      .catch((error) => {
        console.error('Error fetching tables:', error);
      });
  });

  // Trigger change event to fetch initial tables when the page loads
  databaseDropdown.dispatchEvent(new Event('change'));
});
