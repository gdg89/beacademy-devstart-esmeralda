import { Cart } from "./Cart";

Cart.getProducts();
Cart.update();

const cartButton = document.getElementById("cart-button");
const cartCloseButton = document.getElementById("cart-close-button");

cartButton.addEventListener("click", Cart.toggleCartSidebar);
cartCloseButton.addEventListener("click", Cart.toggleCartSidebar);
