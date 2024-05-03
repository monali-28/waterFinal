let text = document.getElementById('text');
let leaf = document.getElementById('leaf');
let hill1 = document.getElementById('hill1');
let hill4 = document.getElementById('hill4');
let hill5 = document.getElementById('hill5');

let isFrozen = false;
let freezePoint = 500; // Adjust this value to set the point where animation freezes

window.addEventListener('scroll', () => {
    let value = window.scrollY;

    if (!isFrozen && value >= freezePoint) {
        isFrozen = true;
        return; // Exit the function to freeze animation
    }

    if (isFrozen && value < freezePoint) {
        isFrozen = false;
    }

    if (!isFrozen) {
        text.style.marginTop = value * 2.5 + 'px';
        leaf.style.top = value * -1.5 + 'px';
        leaf.style.left = value * 1.5 + 'px';
        hill5.style.left = value * 1.5 + 'px';
        hill4.style.left = value * -1.5 + 'px';
        hill1.style.left = value * -1.5 + 'px';
    }
});
  
//donate Page

const donateButton = document.getElementById('donateButton');
const popup = document.getElementById('popup');
const closePopup = document.getElementById('closePopup');
const nextButton = document.getElementById('nextButton');
const formPay = document.getElementById('form-pay');
const infoForm = document.getElementById('infoForm');
const payButton = document.getElementById('pay-button');
const qrCodeSection = document.querySelector('.qrcode');
const submitQRButton = document.getElementById('submitQR');

// Function to reset form state
function resetFormState() {
  formPay.style.display = 'block';
  infoForm.style.display = 'none';
  nextButton.style.display = 'block';
  qrCodeSection.style.display = 'none';
}

// Function to validate form fields
function validateForm(form) {
  const inputs = form.querySelectorAll('input[required]');
  let isValid = true;
  inputs.forEach(input => {
    if (input.value.trim() === '') {
      isValid = false;
      return;
    }
    if (input.id === 'email') {
      const emailError = document.getElementById('emailError');
      if (!validateEmail(input.value)) {
        emailError.textContent = 'Invalid email format';
        isValid = false;
        return;
      } else {
        emailError.textContent = ''; // Clear the error message if email is valid
      }
    }
    if (input.id === 'phone') {
      const phoneError = document.getElementById('phoneError');
      if (!validateMobileNumber(input.value)) {
        phoneError.textContent = 'Mobile number must be 10 digits';
        isValid = false;
        return;
      } else {
        phoneError.textContent = ''; // Clear the error message if phone number is valid
      }
    }
  });
  return isValid;
}

// Email validation function
function validateEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

// Mobile number validation function
function validateMobileNumber(phone) {
  const phoneRegex = /^\d{10}$/;
  return phoneRegex.test(phone);
}

// Show the popup when clicking the "Donate Now" button
donateButton.addEventListener('click', function() {
  popup.style.display = 'block';
  resetFormState(); // Reset form state
});

// Close the popup when clicking the close button
closePopup.addEventListener('click', function() {
  popup.style.display = 'none';
});

// Close the popup when clicking outside of it
window.addEventListener('click', function(event) {
  if (event.target === popup) {
    popup.style.display = 'none';
  }
});

// Proceed to the next step when clicking the next button on the donation form
nextButton.addEventListener('click', function() {
  // Validate form fields
  if (validateForm(formPay)) {
    // Hide the donation form
    formPay.style.display = 'none';
    // Show the information form
    infoForm.style.display = 'block';
    nextButton.style.display = 'none';
  } else {
    alert('Please fill out all fields with valid values');
  }
});

// Process payment and display QR code when clicking the pay button
payButton.addEventListener('click', function (event) {
  event.preventDefault(); // Prevent form submission
  if (validateForm(infoForm)) {
    infoForm.style.display = 'none';
    qrCodeSection.style.display = 'block';
  } else {
    alert('Please fill out all fields with valid values');
  }
});

// Close the popup when the submit QR button is clicked
submitQRButton.addEventListener('click', function () {
  popup.style.display = 'none'; // Close the popup
  alert('Payment Successful!');
});
