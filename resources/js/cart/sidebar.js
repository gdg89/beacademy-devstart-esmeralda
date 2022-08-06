import { Cart } from "./Cart";

Cart.getProducts();
Cart.updateSidebar();
Cart.getAddToCartButtons();

const cartButton = document.getElementById("cart-button");
const cartCloseButton = document.getElementById("cart-close-button");

cartButton.addEventListener("click", Cart.toggleSidebar);
cartCloseButton.addEventListener("click", Cart.toggleSidebar);
