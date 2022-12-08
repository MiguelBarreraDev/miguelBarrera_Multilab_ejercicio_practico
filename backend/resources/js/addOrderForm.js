const addOrderForm = $("#add-order-form");
const addOrderSubmitButton = $("#add-order-submit-button");

addOrderForm?.addEventListener("submit", async (e) => {
    e.preventDefault();
    if (!addOrderForm?.checkValidity()) return;
    const values = new FormData(e.target);
    addOrderSubmitButton?.setAttribute("disabled", true);
    const testsCollection = $("#tests-collection");
    const selects = Array.from(testsCollection?.querySelectorAll("select"));
    const selectedTestsId = selects
        .filter((node) => node.dataset.display !== "none")
        .map((node) => node.value);

    const data = {
        doctor_id: values.get("doctor_id"),
        patient_id: values.get("patient_id"),
        medical_tests_ids: selectedTestsId,
    };
    console.log(data);

    const response = await axios.post("/orders", data);
    addOrderSubmitButton?.removeAttribute("disabled");
    window.location.href = '/home';
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

    priceField.textContent = price?.toFixed(3).toString();
};

const addTestButton = $("#add-test-button");
const modelInputTest = $("#model-input-test-0");
const testsCollection = $("#tests-collection");
const firstSelectChild = testsCollection?.lastElementChild;

firstSelectChild?.addEventListener("change", updatePrice);

addTestButton?.addEventListener("click", () => {
    const newInputBase = modelInputTest.cloneNode(true);
    const removeButton = newInputBase.querySelector("button");
    const selectInput = newInputBase.querySelector("select");
    const index = +testsCollection.lastElementChild.dataset.index + 1;
    const idInputGroup = `model-input-test-${index}`;
    const idFormSelect = `medicalTestInput-${index}`;
    const nameSelect = `medical_test_id_${index}`;

    newInputBase.dataset.index = index;
    selectInput.setAttribute("id", idFormSelect);
    selectInput.setAttribute("name", nameSelect);
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
