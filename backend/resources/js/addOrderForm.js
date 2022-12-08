const addOrderForm = document.getElementById("add-order-form");
const addOrderSubmitButton = document.getElementById("add-order-submit-button");

addOrderForm?.addEventListener("submit", () => {
    if (addOrderForm?.checkValidity()) {
        addOrderSubmitButton?.setAttribute("disabled", true);
    }
});
