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
        fname.innerHTML   = '<i style = "color: red;" class="fa fa-exclamation-circle" aria-hidden="true"></i> Required: First name should only contain letters';
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
        lname.innerHTML   = '<i style = "color: red;" class="fa fa-exclamation-circle" aria-hidden="true"></i> Required: Last name should only contain letters';
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
        email.innerHTML   = '<i style = "color: red;" class="fa fa-exclamation-circle" aria-hidden="true"></i> Required: Invalid email ex. example@lotsoffood.com';
        email.className     = 'error';
        email.style.display = 'block';
    }
});

emailInput.addEventListener('input', function(event){
    if ( 'block' === email.style.display ) {
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
        phone.innerHTML   = '<i style = "color: red;" class="fa fa-exclamation-circle" aria-hidden="true"></i> Required: Invalid phone, follow the pattern "xxx-xxx-xxxx"';
        phone.className     = 'error';
        phone.style.display = 'block';
    }
});

phoneInput.addEventListener('input', function(event){
    if ( 'block' === phone.style.display ) {
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
        radio.innerHTML   = '<i style = "color: red;" class="fa fa-exclamation-circle" aria-hidden="true"></i> Required: Pickup or delivery must be selected';
        radio.className     = 'error';
        radio.style.display = 'block';
    }
});

radioInput.addEventListener('input', function(event){
    if ( 'block' === radio.style.display ) {
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
        card.innerHTML   = '<i style = "color: red;" class="fa fa-exclamation-circle" aria-hidden="true"></i> Required: Invalid card number, must be between 13 and 16 numbers';
        card.className     = 'error';
        card.style.display = 'block';
    }
});

cardInput.addEventListener('input', function(event){
    if ( 'block' === card.style.display ) {
        cardInput.className = '';
        card.style.display = 'none';
    }
});

/*expiration date*/
/*
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
});*/

/*card code*/
var codeInput = document.getElementById('cardCode');
var errorCode  = document.getElementById('errorCode');

var code = document.createElement('div');
code.id = 'notify';
code.style.display = 'none';
errorCode.before(code);

codeInput.addEventListener('invalid', function(event){
    event.preventDefault();
    if ( ! event.target.validity.valid ) {
        code.innerHTML   = '<i style = "color: red;" class="fa fa-exclamation-circle" aria-hidden="true"></i> Required: Invalid CSC, must be 3 numbers';
        code.className     = 'error';
        code.style.display = 'block';
    }
});

codeInput.addEventListener('input', function(event){
    if ( 'block' === code.style.display ) {
        codeInput.className = '';
        code.style.display = 'none';
    }
});

/*billing fname*/
var billingFName = document.getElementById('billingFName');
var errorBillFName  = document.getElementById('errorBillFName');

var billF = document.createElement('div');
billF.id = 'notify';
billF.style.display = 'none';
errorBillFName.before(billF);

billingFName.addEventListener('invalid', function(event){
    event.preventDefault();
    if ( ! event.target.validity.valid ) {
        billF.innerHTML   = '<i style = "color: red;" class="fa fa-exclamation-circle" aria-hidden="true"></i> Required: First name should only contain letters';
        billF.className     = 'error';
        billF.style.display = 'block';
    }
});

billingFName.addEventListener('input', function(event){
    if ( 'block' === billF.style.display ) {
        billingFName.className = '';
        billF.style.display = 'none';
    }
});

/*billing lname*/
var billingLName = document.getElementById('billingLName');
var errorBillLName  = document.getElementById('errorBillLName');

var billL = document.createElement('div');
billL.id = 'notify';
billL.style.display = 'none';
errorBillLName.before(billL);

billingLName.addEventListener('invalid', function(event){
    event.preventDefault();
    if ( ! event.target.validity.valid ) {
        billL.innerHTML   = '<i style = "color: red;" class="fa fa-exclamation-circle" aria-hidden="true"></i> Required: Last name should only contain letters';
        billL.className     = 'error';
        billL.style.display = 'block';
    }
});

billingLName.addEventListener('input', function(event){
    if ( 'block' === billL.style.display ) {
        billingLName.className = '';
        billL.style.display = 'none';
    }
});

/*billing city*/
var billingCity = document.getElementById('billingCity');
var errorBillCity  = document.getElementById('errorBillCity');

var billCity = document.createElement('div');
billCity.id = 'notify';
billCity.style.display = 'none';
errorBillCity.before(billCity);

billingCity.addEventListener('invalid', function(event){
    event.preventDefault();
    if ( ! event.target.validity.valid ) {
        billCity.innerHTML   = '<i style = "color: red;" class="fa fa-exclamation-circle" aria-hidden="true"></i> Required: City must only contain letters';
        billCity.className     = 'error';
        billCity.style.display = 'block';
    }
});

billingCity.addEventListener('input', function(event){
    if ( 'block' === billCity.style.display ) {
        billingCity.className = '';
        billCity.style.display = 'none';
    }
});

/*billing state*/
var billingState = document.getElementById('billingState');
var errorBillState  = document.getElementById('errorBillState');

var billState = document.createElement('div');
billState.id = 'notify';
billState.style.display = 'none';
errorBillState.before(billState);

billingState.addEventListener('invalid', function(event){
    event.preventDefault();
    if ( ! event.target.validity.valid ) {
        billState.innerHTML   = '<i style = "color: red;" class="fa fa-exclamation-circle" aria-hidden="true"></i> Required: State must only contain letters';
        billState.className     = 'error';
        billState.style.display = 'block';
    }
});

billingState.addEventListener('input', function(event){
    if ( 'block' === billState.style.display ) {
        billingState.className = '';
        billState.style.display = 'none';
    }
});

/*billing zip*/
var billingZip = document.getElementById('billingZip');
var errorBillZip  = document.getElementById('errorBillZip');

var billZip = document.createElement('div');
billZip.id = 'notify';
billZip.style.display = 'none';
errorBillZip.before(billZip);

billingZip.addEventListener('invalid', function(event){
    event.preventDefault();
    if ( ! event.target.validity.valid ) {
        billZip.innerHTML   = '<i style = "color: red;" class="fa fa-exclamation-circle" aria-hidden="true"></i> Required: Invalid zip code, ex. 92677 or 92677-0008';
        billZip.className     = 'error';
        billZip.style.display = 'block';
    }
});

billingZip.addEventListener('input', function(event){
    if ( 'block' === billZip.style.display ) {
        billingZip.className = '';
        billZip.style.display = 'none';
    }
});

/*billing country*/
var billingCountry = document.getElementById('billingCountry');
var errorBillCountry  = document.getElementById('errorBillCountry');

var billCoun = document.createElement('div');
billCoun.id = 'notify';
billCoun.style.display = 'none';
errorBillCountry.before(billCoun);

billingCountry.addEventListener('invalid', function(event){
    event.preventDefault();
    if ( ! event.target.validity.valid ) {
        billCoun.innerHTML   = '<i style = "color: red;" class="fa fa-exclamation-circle" aria-hidden="true"></i> Required: Country must only contain letters';
        billCoun.className     = 'error';
        billCoun.style.display = 'block';
    }
});

billingCountry.addEventListener('input', function(event){
    if ( 'block' === billCoun.style.display ) {
        billingCountry.className = '';
        billCoun.style.display = 'none';
    }
});

/*billing country*/
var billingStreet = document.getElementById('billingStreet');
var errorBillStreet  = document.getElementById('errorBillStreet');

var billStreet = document.createElement('div');
billStreet.id = 'notify';
billStreet.style.display = 'none';
errorBillStreet.before(billStreet);

billingStreet.addEventListener('invalid', function(event){
    event.preventDefault();
    if ( ! event.target.validity.valid ) {
        billStreet.innerHTML   = '<i style = "color: red;" class="fa fa-exclamation-circle" aria-hidden="true"></i> Required';
        billStreet.className     = 'error';
        billStreet.style.display = 'block';
    }
});

billingStreet.addEventListener('input', function(event){
    if ( 'block' === billStreet.style.display ) {
        billingCountry.className = '';
        billStreet.style.display = 'none';
    }
});
