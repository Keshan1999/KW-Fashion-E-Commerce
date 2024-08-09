      // Get order details from local storage
      var order = JSON.parse(localStorage.getItem("order"));

      // Check if order details exist
      if (order !== null) {
        // Calculate total price
        var totalPrice = xx.xx; // Calculate total price based on item price, quantity, and shipping cost

        // Get current date and time
        var now = new Date();
        var orderDate = now.toLocaleDateString() + " " + now.toLocaleTimeString();

        // Create order row HTML
        var orderRow = "<tr><td>123456789</td><td>" + orderDate + "</td><td>Item Name (Color: " + order.color + ", Storage: " + order.storage + ", RAM: " + order.ram + ", Shipping: " + order.shipping + ")</td><td>" + order.quantity + "</td><td>$" + totalPrice + "</td><td>Processing</td></tr>";

        // Add order row to table
        document.querySelector("tbody").innerHTML = orderRow;
      }