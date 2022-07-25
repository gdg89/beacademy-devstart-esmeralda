import { Cart } from "./Cart";

const addToCartButton = document.getElementById("add-to-cart-button");

addToCartButton.addEventListener("click", function () {
    if (!addToCartButton.classList.contains("disabled")) {
        Cart.addProduct(product);
    }
});
