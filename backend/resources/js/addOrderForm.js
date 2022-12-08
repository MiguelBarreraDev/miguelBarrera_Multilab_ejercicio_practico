const addOrderForm = $("#add-order-form");
const addOrderSubmitButton = $("#add-order-submit-button");

addOrderForm?.addEventListener("submit", () => {
    if (addOrderForm?.checkValidity()) {
        addOrderSubmitButton?.setAttribute("disabled", true);
    }
});

// Multiples tests
const updatePrice = () => {
    const priceField = $("#price");
    const testsCollection = $("#tests-collection");
    const selects = Array.from(testsCollection?.querySelectorAll("select"));
    const selectedTestsId = selects
        .filter((node) => node.dataset.display !== "none")
        .map((node) => node.value);

    const price = selectedTestsId.reduce((ac, id) => {
        return ac + medicalTests.find((test) => test.id == id).price;
    }, 0);

    console.log(price);
    priceField.textContent = price?.toFixed(3).toString();
};

const addTestButton = $("#add-test-button");
const modelInputTest = $("#model-input-test-0");
const testsCollection = $("#tests-collection");
const firstSelectChild = testsCollection.lastElementChild;

firstSelectChild.addEventListener('change', updatePrice)

addTestButton.addEventListener("click", () => {
    const newInputBase = modelInputTest.cloneNode(true);
    const removeButton = newInputBase.querySelector("button");
    const selectInput = newInputBase.querySelector("select");
    const index = +testsCollection.lastElementChild.dataset.index + 1;
    const idInputGroup = `model-input-test-${index}`;
    const idFormSelect = `medicalTestInput-${index}`;

    newInputBase.dataset.index = index;
    selectInput.setAttribute("id", idFormSelect);
    selectInput.removeAttribute("required");
    removeButton.dataset.idRemove = idInputGroup;
    removeButton.removeAttribute("disabled");
    newInputBase.setAttribute("id", idInputGroup);

    removeButton.addEventListener("click", () => {
        newInputBase.style.display = "none";
        newInputBase.dataset.display = "none";
        selectInput.dataset.display = "none";
    });

    selectInput.addEventListener("change", updatePrice);

    testsCollection.insertAdjacentElement("beforeend", newInputBase);
});

