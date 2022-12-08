const addOrderForm = document.getElementById('add-order-form');
const addOrderSubmitButton = document.getElementById('add-order-submit-button');

console.log('hola')
console.log({addOrderForm})
console.log({addOrderSubmitButton})

addOrderForm?.addEventListener('submit', () => {
    if (addOrderForm?.checkValidity()) {
        addOrderSubmitButton?.setAttribute('disabled', true);
    }
})