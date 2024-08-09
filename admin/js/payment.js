function validateForm() {
    var cardNumber = document.getElementById("card-number").value;
    var cardHolder = document.getElementById("card-holder").value;
    var expDate = document.getElementById("exp-date").value;
    var cvc = document.getElementById("cvc").value;
  
    if (cardNumber === "" || cardHolder === "" || expDate === "" || cvc === "") {
      alert("Please fill all the required fields.");
      return false;
    }
  
    if (!/^[0-9]{16}$/.test(cardNumber)) {
      alert("Please enter a valid 16-digit card number.");
      return false;
    }
  
    if (!/^[a-zA-Z ]+$/.test(cardHolder)) {
      alert("Please enter a valid card holder name.");
      return false;
    }
  
    if (!/^(0[1-9]|1[0-2])\/[0-9]{2}$/.test(expDate)) {
      alert("Please enter a valid expiration date (MM/YY).");
      return false;
    }
  
    if (!/^[0-9]{3}$/.test(cvc)) {
      alert("Please enter a valid CVC number.");
      return false;
    }
    return alert("Payment Successfull");
    return true;
    
  }