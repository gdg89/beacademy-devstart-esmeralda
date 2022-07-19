const products = document.querySelectorAll("[data-id]");

const removeProductIds = [];

products.forEach((product) => {
    product.addEventListener("click", () => {
        const productRow = document.querySelector(
            `#product-${product.dataset.id}`
        );

        const productCheckbox = document.querySelector(
            `#product-checkbox-${product.dataset.id}`
        );

        const productId = Number(product.dataset.id);

        if (removeProductIds.includes(productId)) {
            removeProductIds.splice(removeProductIds.indexOf(productId), 1);
        } else {
            removeProductIds.push(productId);
        }

        productRow.classList.toggle("tr-remove");
        product.classList.toggle("btn-remove");

        productCheckbox.checked = !productCheckbox.checked;
    });
});
