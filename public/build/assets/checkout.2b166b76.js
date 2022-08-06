import{C as e}from"./Cart.f6b664de.js";e.getProducts();const c=e.products,r=document.getElementById("checkout-cart-tbody"),i=document.getElementById("cart-total"),s=document.getElementById("transaction_amount");s.value=e.getTotalPrice();const a=document.getElementById("transaction_type");route==="order.create.card"&&(a.value="card");route==="order.create.ticket"&&(a.value="ticket");const l=document.getElementById("transaction_installments");for(let t=1;t<=12;t++){const n=t,o=e.formatPriceToString(e.getTotalPrice()/t);l.innerHTML+=`
    <option class="py-4" value="${n}">${t} x ${o}</option>
    `}const d=e.formatPriceToString(e.getTotalPrice());i.innerHTML=`Total R$ ${d}`;c.forEach(t=>{const n=e.formatPriceToString(t.price),o=e.formatPriceToString(t.quantity*t.price);r.innerHTML+=`
    <tr class="table-tr">
        <td class="px-4 py-3">
            <img alt="${t.name}" class="object-cover object-center w-full h-[80px] block"
                src="${t.cover}" style="width: 150px; min-width: 150px;" />
        </td>
        <td class="px-4 py-3 text-center">${t.name}</td>
        <td class="px-4 py-3 text-center">${t.quantity}</td>
        <td class="px-4 py-3 text-center">R$${n}</td>
        <td class="px-4 py-3 text-center">R$${o}</td>
    </tr>`});c.forEach(t=>{for(let n=0;n<t.quantity;n++){const o=`<input type="hidden" name="products[]" value="${t.id}" />`;document.getElementById("checkout-form").insertAdjacentHTML("beforeend",o)}});
