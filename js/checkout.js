document.addEventListener('DOMContentLoaded', function () {
  // Retrieve the cart items and totals from localStorage
  const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
  const cartSubtotal = localStorage.getItem('cartSubtotal') || '0.00';
  const cartShipping = localStorage.getItem('cartShipping') || '0.00';
  const cartTotal = localStorage.getItem('cartTotal') || '0.00';

  // Get the order table body element
  const orderTableBody = document.querySelector('.order-table tbody');
  const orderShipping = document.querySelector('.order-table tfoot tr:nth-child(1) td:nth-child(2)');
  const orderTotal = document.querySelector('.order-table tfoot tr:nth-child(2) td:nth-child(2)');

  // Function to update the order table with cart items
  function updateOrderTable() {
    // Clear the existing order items in the HTML
    orderTableBody.innerHTML = '';

    // Loop through each cart item and create a new row for the order table
    cartItems.forEach(item => {
      const newRow = document.createElement('tr');

      // Construct the HTML content for the new row using the cart item details
      newRow.innerHTML = `
        <td class="text-left">${item.name}</td>
        <td>${item.price}</td>
        <td>${item.size}</td>
        <td>${item.quantity}</td>
        <td>$${(parseFloat(item.price.replace('$', '')) * parseInt(item.quantity)).toFixed(2)}</td>
      `;

      // Append the new row to the order table body
      orderTableBody.appendChild(newRow);
    });

    // Update the shipping and total values in the HTML
    orderShipping.textContent = `$${parseFloat(cartShipping).toFixed(2)}`;
    orderTotal.textContent = `$${parseFloat(cartTotal).toFixed(2)}`;
  }

  // Check if there are cart items
  if (cartItems.length > 0) {
    // Update the order table with the cart items
    updateOrderTable();
  }

  // Handle the place order button click event
  const placeOrderButton = document.querySelector('.order-button-payment button');
  placeOrderButton.addEventListener('click', (event) => {
    event.preventDefault(); // Prevent default form submission

    // 1. Validate input fields
    let isValid = true;
    const requiredFields = document.querySelectorAll('.required input, .required select');
    requiredFields.forEach(field => {
      if (field.value === '') {
        isValid = false;
        field.classList.add('error'); // Add error class for styling
      } else {
        field.classList.remove('error');
      }
    });

    // 2. Gather order data
    const orderData = {
      fullName: document.getElementById('input-firstname').value,
      email: document.getElementById('input-email').value,
      telephone: document.getElementById('input-telephone').value,
      address: document.getElementById('input-address-1').value,
      city: document.getElementById('input-city').value,
      postcode: document.getElementById('input-postcode').value,
      country: document.getElementById('input-country').value,
      orderNotes: document.querySelector('textarea').value,
      // Add cart items and totals to the order data
      cartItems: cartItems,
      cartSubtotal: cartSubtotal,
      cartShipping: cartShipping,
      cartTotal: cartTotal
    };

    // 3. Check if validation passed
    if (isValid) {
      // 4. Send order data to server (using AJAX or Fetch API)
      // ... (Replace with your actual server-side logic)
      console.log('Order data:', orderData);
      alert('Order placed successfully!'); // Replace with a more user-friendly confirmation message
    } else {
      alert('Please fill in all required fields.');
    }
  });
});
