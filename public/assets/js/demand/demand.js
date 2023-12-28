document.getElementById('demandForm').addEventListener('submit', function (event) {
  event.preventDefault();

  const title = document.getElementById('title').value;
  const description = document.getElementById('description').value;

  // You can send an AJAX request to Symfony controller to create a new demand
  // For simplicity, I'm using a placeholder function here
  createdemand(title, description);
});

function deletedemand(demandId) {
  // You can send an AJAX request to Symfony controller to delete the demand
  // For simplicity, I'm using a placeholder function here
  deletedemandById(demandId);
}

// Placeholder functions for AJAX requests
function createdemand(title, description) {
  // Perform AJAX request to Symfony controller
  console.log(`Creating demand with title: ${title}, description: ${description}`);
}

function deletedemandById(demandId) {
  // Perform AJAX request to Symfony controller
  console.log(`Deleting demand with ID: ${demandId}`);
}
