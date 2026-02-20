function checkbox() {
    const checkbox = document.getElementById("favorite");
    const hiddenInput = document.getElementById("favorite_hidden");
    checkbox.addEventListener("change", () => {
        hiddenInput.value = checkbox.checked ? 1 : 0;
    });
}
