import { Cart } from "./Cart";

Cart.getProducts();

console.log("CART PRODUCTS: ", Cart.products);

const cartProducts = Cart.products;

const table = document.getElementById("checkout-cart-tbody");
const cartTotal = document.getElementById("cart-total");
console.log("🚀 ~ table", table);

const cartTotalPrice = Cart.formatPriceToString(Cart.getTotalPrice());

cartTotal.innerHTML = `Total R$ ${cartTotalPrice}`;

cartProducts.forEach((cartProduct) => {
    const productPrice = Cart.formatPriceToString(cartProduct.price);
    const productSubtotal = Cart.formatPriceToString(
        cartProduct.quantity * cartProduct.price
    );

    table.innerHTML += `
    <tr class="table-tr">
        <td class="px-4 py-3">
            <img alt="${cartProduct.name}" class="object-cover object-center w-full h-[80px] block"
                src="${cartProduct.cover}" style="width: 150px; min-width: 150px;" />
        </td>
        <td class="px-4 py-3 text-center">${cartProduct.name}</td>
        <td class="px-4 py-3 text-center">${cartProduct.quantity}</td>
        <td class="px-4 py-3 text-center">R$${productPrice}</td>
        <td class="px-4 py-3 text-center">R$${productSubtotal}</td>
    </tr>`;
});
