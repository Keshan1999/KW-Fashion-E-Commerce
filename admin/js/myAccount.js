// Customer account page JavaScript code
const uploadProfilePictureButton = document.getElementById('upload-profile-picture');
const profilePictureFileInput = document.getElementById('profile-picture-file');
const nameEditButton = document.getElementById('edit-name');
const emailEditButton = document.getElementById('edit-email');
const phoneNumberEditButton = document.getElementById('edit-phone-number');
const addressEditButton = document.getElementById('edit-address');

uploadProfilePictureButton.addEventListener('click', function() {
  profilePictureFileInput.click();
});

nameEditButton.addEventListener('click', function() {
  const nameParagraph = document.querySelector('.name p');
  const nameInput = document.createElement('input');
  nameInput.type = 'text';
  nameInput.value = nameParagraph.textContent;
  nameInput.className = 'name-input';
  nameParagraph.replaceWith(nameInput);
  nameEditButton.textContent = 'Save';
  nameEditButton.removeEventListener('click', nameEditButtonClickListener);
  nameEditButton.addEventListener('click', saveNameButtonClickListener);
});

emailEditButton.addEventListener('click', function() {
  const emailParagraph = document.querySelector('.email p');
  const emailInput = document.createElement('input');
  emailInput.type = 'email';
  emailInput.value = emailParagraph.textContent;
  emailInput.className = 'email-input';
  emailParagraph.replaceWith(emailInput);
  emailEditButton.textContent = 'Save';
  emailEditButton.removeEventListener('click', emailEditButtonClickListener);
  emailEditButton.addEventListener('click', saveEmailButtonClickListener);
});

phoneNumberEditButton.addEventListener('click', function() {
  const phoneNumberParagraph = document.querySelector('.phone-number p');
  const phoneNumberInput = document.createElement('input');
  phoneNumberInput.type = 'tel';
  phoneNumberInput.value = phoneNumberParagraph.textContent;
  phoneNumberInput.className = 'phone-number-input';
  phoneNumberParagraph.replaceWith(phoneNumberInput);
  phoneNumberEditButton.textContent = 'Save';
  phoneNumberEditButton.removeEventListener('click', phoneNumberEditButtonClickListener);
  phoneNumberEditButton.addEventListener('click', savePhoneNumberButtonClickListener);
});

addressEditButton.addEventListener('click', function() {
  const addressParagraph = document.querySelector('.address p');
  const addressInput = document.createElement('input');
  addressInput.type = 'text';
  addressInput.value = addressParagraph.textContent;
  addressInput.className = 'address-input';
  addressParagraph.replaceWith(addressInput);
  addressEditButton.textContent = 'Save';
  addressEditButton.removeEventListener('click', addressEditButtonClickListener);
  addressEditButton.addEventListener('click', saveAddressButtonClickListener);
});

const nameEditButtonClickListener = function() {
  alert('Name edit button clicked');
};

const saveNameButtonClickListener = function() {
  const nameInput = document.querySelector('.name-input');
  const nameParagraph = document.createElement('p');
  nameParagraph.textContent = nameInput.value;
  nameInput.replaceWith(nameParagraph);
  nameEditButton.textContent = 'Edit';
  nameEditButton.removeEventListener('click', saveNameButtonClickListener);
  nameEditButton.addEventListener('click', nameEditButtonClickListener);
};

const emailEditButtonClickListener = function() {
  alert('Email edit button clicked');
};

const saveEmailButtonClickListener = function() {
  const emailInput = document.querySelector('.email-input');
  const emailParagraph = document.createElement('p');
  emailParagraph.textContent = emailInput.value;
  emailInput.replaceWith(emailParagraph);
  emailEditButton.textContent = 'Edit';
  emailEditButton.removeEventListener('click', saveEmailButtonClickListener);
  emailEditButton.addEventListener('click', emailEditButtonClickListener);
};

const phoneNumberEditButtonClickListener = function() {
  alert('Phone number edit button clicked');
};

const savePhoneNumberButtonClickListener = function() {
  const phoneNumberInput = document.querySelector('.phone-number-input');
  const phoneNumberParagraph = document.createElement('p');
  phoneNumberParagraph.textContent = phoneNumberInput.value;
  phoneNumberInput.replaceWith(phoneNumberParagraph);
  phoneNumberEditButton.textContent = 'Edit';
  phoneNumberEditButton.removeEventListener('click', savePhoneNumberButtonClickListener);
  phoneNumberEditButton.addEventListener('click', phoneNumberEditButtonClickListener);
};

const addressEditButtonClickListener = function() {
  alert('Address edit button clicked');
};

const saveAddressButtonClickListener = function() {
  const addressInput = document.querySelector('.address-input');
  const addressParagraph = document.createElement('p');
  addressParagraph.textContent = addressInput.value;
  addressInput.replaceWith(addressParagraph);
  addressEditButton.textContent = 'Edit';
  addressEditButton.removeEventListener('click', saveAddressButtonClickListener);
  addressEditButton.addEventListener('click', addressEditButtonClickListener);
};