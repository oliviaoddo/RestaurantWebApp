/*checkout form validation*/

/*first name*/
var fNameInput = document.getElementById('firstName');
var errorFName  = document.getElementById('errorFName');

var fname = document.createElement('div');
fname.id = 'notify';
fname.style.display = 'none';

errorFName.before(fname);

fNameInput.addEventListener('invalid', function(event){
    event.preventDefault();
    if ( ! event.target.validity.valid ) {
        fname.textContent   = 'First name should only contain letters';
        fname.className     = 'error';
        fname.style.display = 'block';
    }
});

fNameInput.addEventListener('input', function(event){
    if ( 'block' === fname.style.display ) {
        fNameInput.className = '';
        fname.style.display = 'none';
    }
});

/*last name*/
var lNameInput = document.getElementById('lastName');
var errorLName  = document.getElementById('errorLName');

var lname = document.createElement('div');
lname.id = 'notify';
lname.style.display = 'none';
errorLName.before(lname);

lNameInput.addEventListener('invalid', function(event){
    event.preventDefault();
    if ( ! event.target.validity.valid ) {
        lname.textContent   = 'Last name should only contain letters';
        lname.className     = 'error';
        lname.style.display = 'block';
    }
});

lNameInput.addEventListener('input', function(event){
    if ( 'block' === lname.style.display ) {
        lNameInput.className = '';
        lname.style.display = 'none';
    }
});

/*email*/
var emailInput = document.getElementById('mail');
var errorEmail  = document.getElementById('errorEmail');

var email = document.createElement('div');
email.id = 'notify';
email.style.display = 'none';
errorEmail.before(email);

emailInput.addEventListener('invalid', function(event){
    event.preventDefault();
    if ( ! event.target.validity.valid ) {
        email.textContent   = 'Invalid email ex. example@lotsoffood.com';
        email.className     = 'error';
        email.style.display = 'block';
    }
});

emailInput.addEventListener('input', function(event){
    if ( 'block' === lname.style.display ) {
        emailInput.className = '';
        email.style.display = 'none';
    }
});

/*phone*/
var phoneInput = document.getElementById('phone');
var errorPhone  = document.getElementById('errorPhone');

var phone = document.createElement('div');
phone.id = 'notify';
phone.style.display = 'none';
errorPhone.before(phone);

phoneInput.addEventListener('invalid', function(event){
    event.preventDefault();
    if ( ! event.target.validity.valid ) {
        phone.textContent   = 'Invalid phone, follow the pattern "xxx-xxx-xxxx"';
        phone.className     = 'error';
        phone.style.display = 'block';
    }
});

phoneInput.addEventListener('input', function(event){
    if ( 'block' === lname.style.display ) {
        phoneInput.className = '';
        phone.style.display = 'none';
    }
});

/*delivery or pickup radio button*/
var radioInput = document.getElementById('pickup');
var errorRadio  = document.getElementById('errorRadio');

var radio = document.createElement('div');
radio.id = 'notify';
radio.style.display = 'none';
errorRadio.before(radio);

radioInput.addEventListener('invalid', function(event){
    event.preventDefault();
    if ( ! event.target.validity.valid ) {
        radio.textContent   = 'Pickup or delivery must be selected';
        radio.className     = 'error';
        radio.style.display = 'block';
    }
});

radioInput.addEventListener('input', function(event){
    if ( 'block' === lname.style.display ) {
        radioInput.className = '';
        radio.style.display = 'none';
    }
});

/*card number*/
var cardInput = document.getElementById('cardNumber');
var errorCard  = document.getElementById('errorCard');

var card = document.createElement('div');
card.id = 'notify';
card.style.display = 'none';
errorCard.before(card);

cardInput.addEventListener('invalid', function(event){
    event.preventDefault();
    if ( ! event.target.validity.valid ) {
        card.textContent   = 'Invalid card number, must be between 13 and 16 numbers';
        card.className     = 'error';
        card.style.display = 'block';
    }
});

cardInput.addEventListener('input', function(event){
    if ( 'block' === lname.style.display ) {
        cardInput.className = '';
        card.style.display = 'none';
    }
});

/*expiration date*/
var expirationMonth = document.getElementByClass('card_month');
var monthError  = document.getElementById('expirationError');

var month = document.createElement('div');
month.id = 'notify';
month.style.display = 'none';
monthError.before(month);

expirationMonth.addEventListener('invalid', function(event){
    event.preventDefault();
    if ( ! event.target.validity.valid ) {
        month.textContent   = 'Invalid card number, must be between 13 and 16 numbers';
        month.className     = 'error';
        month.style.display = 'block';
    }
});

expirationMonth.addEventListener('input', function(event){
    if ( 'block' === lname.style.display ) {
        expirationMonth.className = '';
        month.style.display = 'none';
    }
});

