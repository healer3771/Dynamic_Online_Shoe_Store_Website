const form = document.getElementById('shoeForm');
const resetBtn = document.getElementById('resetBtn');

resetBtn.addEventListener('click', function() {
  resetForm(); 
});

function resetForm() {
  // Reset all input values to empty string
  form.code.value = ""; 
  form.name.value = "";
  form.description.value = "";
  form.price.value = "";

  // Clear any error messages
  // ...
}