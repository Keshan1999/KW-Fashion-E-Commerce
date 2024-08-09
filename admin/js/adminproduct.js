// Checkbox Functionality (for selecting multiple products)
const checkboxes = document.querySelectorAll('.form-check-input');
const checkAllCheckbox = document.getElementById('datatableCheckAll');

checkAllCheckbox.addEventListener('change', (event) => {
  checkboxes.forEach(checkbox => {
    checkbox.checked = event.target.checked;
  });
});

checkboxes.forEach(checkbox => {
  checkbox.addEventListener('change', (event) => {
    if (!event.target.checked) {
      checkAllCheckbox.checked = false;
    } else {
      if (Array.from(checkboxes).every(checkbox => checkbox.checked)) {
        checkAllCheckbox.checked = true;
      }
    }
  });
});

// Edit and Delete Button Functionality
document.querySelectorAll('.edit-button').forEach(button => {
  button.addEventListener('click', (event) => {
    const productId = event.target.closest('tr').dataset.productId;
    editProduct(productId);
  });
});

document.querySelectorAll('.delete-button').forEach(button => {
  button.addEventListener('click', (event) => {
    const productId = event.target.closest('tr').dataset.productId;
    deleteProduct(productId);
  });
});

function editProduct(productId) {
  alert('Edit Product ID: ' + productId);
  // Add your edit product logic here
}

function deleteProduct(productId) {
  const confirmation = confirm('Are you sure you want to delete Product ID: ' + productId + '?');
  if (confirmation) {
    alert('Deleted Product ID: ' + productId);
    // Add your delete product logic here
    const productRow = document.querySelector(`tr[data-product-id="${productId}"]`);
    if (productRow) {
      productRow.remove();
    }
  }
}

document.addEventListener("DOMContentLoaded", function() {
  // Fetch product data from adminproduct.php
  fetch("adminproduct.php")
      .then(response => response.json())
      .then(products => {
          // Populate the table with product data
          products.forEach(product => {
              addProductToTable(product);
          });
      })
      .catch(error => {
          console.error("Error fetching product data:", error);
      });
});

function addProductToTable(product) {
  const productTableBody = document.getElementById("productTableBody");
  const row = `
      <tr>
          <td>${product.proname}</td>
          <td>${product.proCategory}</td>
          <td>${product.proprice}</td>
          <td>${product.proquantity}</td>
      </tr>`;
  productTableBody.insertAdjacentHTML('beforeend', row);
}

