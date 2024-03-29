export const Cart = {
    products: [],
    cartList: document.getElementById("cart-list"),
    cartCount: document.getElementById("cart-count"),
    cartTotal: document.getElementById("cart-total"),
    cartCheckoutButton: document.getElementById("cart-checkout-button"),

    toggleSidebar: () => {
        const cartContainer = document.getElementById("cart-container");

        cartContainer.classList.toggle("opacity-0");
        cartContainer.classList.toggle("opacity-100");

        cartContainer.classList.toggle("translate-x-0");
        cartContainer.classList.toggle("translate-x-full");
    },

    clear: () => {
        localStorage.removeItem("EstanteDev:cart");
    },

    openSidebar: () => {
        const cartContainer = document.getElementById("cart-container");

        cartContainer.classList.add("opacity-100");
        cartContainer.classList.remove("opacity-0");

        cartContainer.classList.add("translate-x-0");
        cartContainer.classList.remove("translate-x-full");
    },

    getProducts: function () {
        if (localStorage.getItem("EstanteDev:cart")) {
            this.products = JSON.parse(localStorage.getItem("EstanteDev:cart"));
        }
    },

    saveProducts: function () {
        localStorage.setItem("EstanteDev:cart", JSON.stringify(this.products));
    },

    setEmptySidebar: function () {
        this.cartTotal.innerHTML = "";
        this.cartCount.innerHTML = "";
        this.cartCount.classList.add("hidden");
        this.cartList.innerHTML = `<p class="text-center mt-4">Você não tem produtos no carrinho 🥲.</p>`;
    },

    getAddToCartButtons: function () {
        const addToCartButtons = document.querySelectorAll(
            ".add-to-cart-button"
        );

        addToCartButtons.forEach((addToCartButton) => {
            addToCartButton.addEventListener("click", function () {
                if (!addToCartButton.classList.contains("disabled")) {
                    const product = JSON.parse(addToCartButton.dataset.product);

                    Cart.addProduct(product);
                }
            });
        });
    },

    disableCheckoutButton: function () {
        this.cartCheckoutButton.classList.add("disabled");
        this.cartCheckoutButton.classList.add("cursor-not-allowed");
        this.cartCheckoutButton.href = "#";
    },

    enableCheckoutButton: function () {
        this.cartCheckoutButton.classList.remove("disabled");
        this.cartCheckoutButton.classList.remove("cursor-not-allowed");
        this.cartCheckoutButton.href = "/pedido/checkout/cartao";
    },

    updateSidebar: function () {
        this.cartList.innerHTML = "";

        if (this.products.length === 0) {
            this.setEmptySidebar();
            this.disableCheckoutButton();

            return;
        } else {
            this.enableCheckoutButton();
        }

        this.cartCount.classList.remove("hidden");
        this.cartCount.innerHTML = this.getTotalCount();

        const cartTotal = this.formatPriceToString(this.getTotalPrice());
        this.cartTotal.innerHTML = `R$ ${cartTotal}`;

        this.products.forEach((product) => {
            this.cartList.insertAdjacentHTML(
                "beforeend",
                this.createCartItem(product)
            );
        });

        const cartRemoveButtons = document.querySelectorAll(
            ".cart-remove-button"
        );

        cartRemoveButtons.forEach((cartRemoveButton) => {
            cartRemoveButton.addEventListener("click", function () {
                const productId = cartRemoveButton.dataset.productId;

                Cart.removeProduct(productId);
            });
        });
    },

    addProduct: function (product) {
        const { id, name, cover, price_sell, description } = product;
        const productExists = this.products.find((p) => p.id === id);
        let quantity = 1;

        if (productExists) {
            productExists.quantity += 1;
        }

        if (!productExists) {
            this.products.push({
                id,
                name,
                cover,
                price: this.formatPriceFromString(price_sell),
                description,
                quantity,
            });

            this.openSidebar();
        }

        this.saveProducts();
        this.updateSidebar();
    },

    removeProduct: function (productId) {
        this.products = this.products.filter(
            (product) => product.id !== +productId
        );

        this.saveProducts();
        this.updateSidebar();
    },

    getTotalPrice: function () {
        return this.products.reduce((total, product) => {
            return total + product.price * product.quantity;
        }, 0);
    },

    getTotalCount: function () {
        return this.products.reduce((total, product) => {
            return total + product.quantity;
        }, 0);
    },

    createCartItem: function (product) {
        const productTotal = this.formatPriceToString(
            product.price * product.quantity
        );

        const cartItem = `
        <li class="flex py-6">
            <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                <img src="${product.cover}" class="h-full w-full object-cover object-center">
            </div>

            <div class="ml-4 flex flex-1 flex-col">
                <div>
                    <div class="flex justify-between text-base font-medium text-gray-900">
                        <h3>
                            <a href="/produto/${product.id}">
                                ${product.name}
                            </a>
                        </h3>
                        <p class="ml-4 whitespace-nowrap">
                            R$ ${productTotal}
                        </p>
                    </div>

                    <p class="max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis mt-1 text-sm text-gray-500 ">
                        ${product.description}
                    </p>
                </div>
                <div class="flex flex-1 items-end justify-between text-sm">
                    <p class="text-gray-500">Qtd ${product.quantity}</p>

                    <div class="cart-remove-button flex" data-product-id="${product.id}">
                        <button type="button"
                            class="font-medium text-emerald-600 hover:text-emerald-500">
                            Remover
                        </button>
                    </div>
                </div>
            </div>
        </li>
        `;

        return cartItem;
    },

    formatPriceToString: function (price) {
        return price.toFixed(2).toString().replace(".", ",");
    },

    formatPriceFromString: function (price) {
        return Number(price.replace(",", "."));
    },
};
