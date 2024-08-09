// Get the "Add to Cart" button element
const addToCartButton = document.querySelector('.add-to-cart');

// Add click event listener to the "Add to Cart" button
addToCartButton.addEventListener('click', addToCart);

// Function to handle the "Add to Cart" button click event
function addToCart(event) {
  event.preventDefault();

  // Remove the click event listener from the "Add to Cart" button
  addToCartButton.removeEventListener('click', addToCart);

  // Get the product details from the product details page
  const productImage = document.querySelector('#main-product-image').getAttribute('src');
  const productName = document.querySelector('.product-title').textContent;
  const productPrice = document.querySelector('.sale-price').textContent;
  const productQuantity = document.querySelector('#quantity').value;

  // Create an object to store the product details
  const product = {
    image: productImage,
    name: productName,
    price: productPrice,
    quantity: productQuantity
  };

  // Get the existing cart items from localStorage
  let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

  // Check if the product is already in the cart
  const existingProductIndex = cartItems.findIndex(item => item.name === product.name);
  if (existingProductIndex !== -1) {
    // Update the quantity if the product is already in the cart
    cartItems[existingProductIndex].quantity += parseInt(productQuantity);
  } else {
    // Add the product to the cart
    cartItems.push(product);
  }

  // Save the updated cart items in localStorage
  localStorage.setItem('cartItems', JSON.stringify(cartItems));

  // Redirect to the cart page
  window.location.href = 'cart.html';
}