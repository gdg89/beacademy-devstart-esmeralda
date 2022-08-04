const c={products:[],cartList:document.getElementById("cart-list"),cartCount:document.getElementById("cart-count"),cartTotal:document.getElementById("cart-total"),cartCheckoutButton:document.getElementById("cart-checkout-button"),toggleSidebar:()=>{const t=document.getElementById("cart-container");t.classList.toggle("opacity-0"),t.classList.toggle("opacity-100"),t.classList.toggle("translate-x-0"),t.classList.toggle("translate-x-full")},clear:()=>{localStorage.removeItem("EstanteDev:cart")},openSidebar:()=>{const t=document.getElementById("cart-container");t.classList.add("opacity-100"),t.classList.remove("opacity-0"),t.classList.add("translate-x-0"),t.classList.remove("translate-x-full")},getProducts:function(){localStorage.getItem("EstanteDev:cart")&&(this.products=JSON.parse(localStorage.getItem("EstanteDev:cart")))},saveProducts:function(){localStorage.setItem("EstanteDev:cart",JSON.stringify(this.products))},setEmptySidebar:function(){this.cartTotal.innerHTML="",this.cartCount.innerHTML="",this.cartCount.classList.add("hidden"),this.cartList.innerHTML='<p class="text-center mt-4">Voc\xEA n\xE3o tem produtos no carrinho \u{1F972}.</p>'},getAddToCartButtons:function(){document.querySelectorAll(".add-to-cart-button").forEach(e=>{e.addEventListener("click",function(){if(!e.classList.contains("disabled")){const o=JSON.parse(e.dataset.product);c.addProduct(o)}})})},disableCheckoutButton:function(){this.cartCheckoutButton.classList.add("disabled"),this.cartCheckoutButton.classList.add("cursor-not-allowed"),this.cartCheckoutButton.href="#"},enableCheckoutButton:function(){this.cartCheckoutButton.classList.remove("disabled"),this.cartCheckoutButton.classList.remove("cursor-not-allowed"),this.cartCheckoutButton.href="/pedido/checkout/cartao"},updateSidebar:function(){if(this.cartList.innerHTML="",this.products.length===0){this.setEmptySidebar(),this.disableCheckoutButton();return}else this.enableCheckoutButton();this.cartCount.classList.remove("hidden"),this.cartCount.innerHTML=this.getTotalCount();const t=this.formatPriceToString(this.getTotalPrice());this.cartTotal.innerHTML=`R$ ${t}`,this.products.forEach(o=>{this.cartList.insertAdjacentHTML("beforeend",this.createCartItem(o))}),document.querySelectorAll(".cart-remove-button").forEach(o=>{o.addEventListener("click",function(){const r=o.dataset.productId;c.removeProduct(r)})})},addProduct:function(t){const{id:e,name:o,cover:r,price_sell:a,description:i}=t,s=this.products.find(d=>d.id===e);let n=1;s&&(s.quantity+=1),s||(this.products.push({id:e,name:o,cover:r,price:this.formatPriceFromString(a),description:i,quantity:n}),this.openSidebar()),this.saveProducts(),this.updateSidebar()},removeProduct:function(t){this.products=this.products.filter(e=>e.id!==+t),this.saveProducts(),this.updateSidebar()},getTotalPrice:function(){return this.products.reduce((t,e)=>t+e.price*e.quantity,0)},getTotalCount:function(){return this.products.reduce((t,e)=>t+e.quantity,0)},createCartItem:function(t){const e=this.formatPriceToString(t.price*t.quantity);return`
        <li class="flex py-6">
            <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                <img src="${t.cover}" class="h-full w-full object-cover object-center">
            </div>

            <div class="ml-4 flex flex-1 flex-col">
                <div>
                    <div class="flex justify-between text-base font-medium text-gray-900">
                        <h3>
                            <a href="/produto/${t.id}">
                                ${t.name}
                            </a>
                        </h3>
                        <p class="ml-4 whitespace-nowrap">
                            R$ ${e}
                        </p>
                    </div>

                    <p class="max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis mt-1 text-sm text-gray-500 ">
                        ${t.description}
                    </p>
                </div>
                <div class="flex flex-1 items-end justify-between text-sm">
                    <p class="text-gray-500">Qtd ${t.quantity}</p>

                    <div class="cart-remove-button flex" data-product-id="${t.id}">
                        <button type="button"
                            class="font-medium text-emerald-600 hover:text-emerald-500">
                            Remover
                        </button>
                    </div>
                </div>
            </div>
        </li>
        `},formatPriceToString:function(t){return t.toFixed(2).toString().replace(".",",")},formatPriceFromString:function(t){return Number(t.replace(",","."))}};
