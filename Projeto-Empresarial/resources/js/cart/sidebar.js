import { Cart } from "./Cart";

Cart.getProducts();
Cart.updateSidebar();

const cartButton = document.getElementById("cart-button");
const cartCloseButton = document.getElementById("cart-close-button");
const cartCheckoutButton = document.getElementById("cart-checkout-button");
console.log("🚀 ~ cartCheckoutButton", cartCheckoutButton);

cartButton.addEventListener("click", Cart.toggleSidebar);
cartCloseButton.addEventListener("click", Cart.toggleSidebar);

cartCheckoutButton.addEventListener("click", function () {
    console.log("CART PRODUCTS: ", Cart.products);
});
