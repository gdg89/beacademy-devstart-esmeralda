import { Cart } from "./Cart";

Cart.getProducts();

const cartProducts = Cart.products;
console.log("🚀 ~ cartProducts", cartProducts);

const table = document.getElementById("checkout-cart-tbody");
const cartTotal = document.getElementById("cart-total");

const transactionAmountInput = document.getElementById("transaction_amount");
transactionAmountInput.value = Cart.getTotalPrice();

/* TIPO DE TRANSAÇÃO */
const transactionTypeInput = document.getElementById("transaction_type");

if (route === "order.create.card") {
    transactionTypeInput.value = "card";
}

if (route === "order.create.ticket") {
    transactionTypeInput.value = "ticket";
}

/* PARCELAS */
const transactionInstallments = document.getElementById(
    "transaction_installments"
);

for (let i = 1; i <= 12; i++) {
    const value = i;

    const option = Cart.formatPriceToString(Cart.getTotalPrice() / i);

    transactionInstallments.innerHTML += `
    <option class="py-4" value="${value}">${i} x ${option}</option>
    `;
}

/* CART */
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

/* PRODUTOS PARA PEDIDO */
cartProducts.forEach((cartProduct) => {
    for (let i = 0; i < cartProduct.quantity; i++) {
        const productItem = `<input type="hidden" name="products[]" value="${cartProduct.id}" />`;
        document
            .getElementById("checkout-form")
            .insertAdjacentHTML("beforeend", productItem);
    }
});
