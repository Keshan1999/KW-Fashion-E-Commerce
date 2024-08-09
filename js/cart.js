document.addEventListener('DOMContentLoaded', function () {
  // Retrieve the cart items from localStorage
  let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

  // Get the cart table body element
  const cartTableBody = document.querySelector('.wishlist-table tbody');

  // Function to update the cart items in the localStorage and HTML
  function updateCartItems() {
    // Clear the existing cart items in the HTML
    cartTableBody.innerHTML = '';

    // Loop through each cart item
    cartItems.forEach((item, index) => {
      // Create a new row for the cart table
      const newRow = document.createElement('tr');

      // Construct the HTML content for the new row using the cart item details
      newRow.innerHTML = `
        <td class="product-thumbnail text-center">
          <a href="#"><img src="${item.image}" alt="Product Image" /></a>
        </td>
        <td class="product-name">
          <h6 class="no-margin"><a href="#">${item.name}</a></h6>
        </td>
        <td class="product-price text-center"><span class="amount">${item.price}</span></td>
        <td class="product-size text-center"><span class="amount">${item.size}</span></td>
        <td class="product-quantity text-center">
          <input type="number" class="quantity-input" value="${item.quantity}" min="1">
        </td>
        <td class="product-remove text-center">
          <button type="button" class="btn btn-small">Remove</button>
        </td>
      `;

      // Append the new row to the cart table body
      cartTableBody.appendChild(newRow);

      // Add event listeners to the quantity input and remove button
      const quantityInput = newRow.querySelector('.product-quantity .quantity-input');
      const removeButton = newRow.querySelector('.product-remove .btn');

      // Update subtotal and grand total when the quantity input value changes
      quantityInput.addEventListener('change', () => {
        item.quantity = quantityInput.value;
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
        updateCartItems();
        calculateCartTotal();
      });

      // Remove the corresponding cart item from the cart items array and update subtotal and grand total
      removeButton.addEventListener('click', () => {
        cartItems.splice(index, 1);
        localStorage.setItem('cartItems', JSON.stringify(cartItems));
        updateCartItems();
        calculateCartTotal();
      });
    });
  }

  // Function to calculate the subtotal for a cart item
  function calculateSubtotal(item) {
    const price = parseFloat(item.price.replace('$', ''));
    const quantity = parseInt(item.quantity);
    const subtotal = price * quantity;
    return subtotal.toFixed(2);
  }

  // Function to calculate the cart total
  function calculateCartTotal() {
    let subtotal = 0;

    // Loop through each cart item and calculate the subtotal
    cartItems.forEach(item => {
      subtotal += parseFloat(calculateSubtotal(item));
    });

    // Calculate the shipping
    const shipping = 15.0;

    // Calculate the grand total
    const total = subtotal + shipping;

    // Update the cart totals in the HTML
    document.getElementById('cart-subtotal').textContent = subtotal.toFixed(2);
    document.getElementById('cart-shipping').textContent = shipping.toFixed(2);
    document.getElementById('cart-total').textContent = total.toFixed(2);
  }

  // Check if there are cart items
  if (cartItems.length > 0) {
    // Update the cart items in the HTML
    updateCartItems();
  }

  // Calculate the cart total initially
  calculateCartTotal();

  // Handle the checkout button click event
  const checkoutButton = document.querySelector('.checkout');
  checkoutButton.addEventListener('click', () => {
    // Save the cart totals and items to localStorage
    localStorage.setItem('cartSubtotal', document.getElementById('cart-subtotal').textContent);
    localStorage.setItem('cartShipping', document.getElementById('cart-shipping').textContent);
    localStorage.setItem('cartTotal', document.getElementById('cart-total').textContent);
    
    // Redirect to the checkout page
    window.location.href = 'checkout.html';
  });
});
