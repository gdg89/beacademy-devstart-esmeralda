const cartButton = document.getElementById("cart-button");
const cartContainer = document.getElementById("cart-container");
const cartCloseButton = document.getElementById("cart-close-button");

cartButton.addEventListener("click", toggleCartSidebar);
cartCloseButton.addEventListener("click", toggleCartSidebar);

function toggleCartSidebar() {
    cartContainer.classList.toggle("opacity-0");
    cartContainer.classList.toggle("opacity-100");

    cartContainer.classList.toggle("translate-x-0");
    cartContainer.classList.toggle("translate-x-full");
}
