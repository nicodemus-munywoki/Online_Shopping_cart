
let carts = document.querySelectorAll('.add-cart');
for (let i = 0; i < carts.length; i++) {
    carts[i].addEventListener('click', () => {
        cartNumbers(products[i]);
        totalCost(products[i]);
    })
}


function onLoadCartNumbers() {
    let productNumbers = localStorage.getItem('cartNumbers');
    if (productNumbers) {
        document.querySelector('.cart span').textContent = productNumbers;
    }
}

function cartNumbers(product) {
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);
    if (productNumbers) {
        localStorage.setItem('cartNumbers', productNumbers + 1);
        document.querySelector('.cart span').textContent = productNumbers + 1;
    } else {
        localStorage.setItem('cartNumbers', 1);
        document.querySelector('.cart span').textContent = 1;
    }
    setItems(product);
}

function setItems(product) {
    let cartItems = localStorage.getItem('productsIncart');
    cartItems = JSON.parse(cartItems);
    product.incart=parseInt(product.incart);
    //console.log("my cart items are", cartItems);
    if (cartItems != null) {
        if (cartItems[product.image] == undefined) {
            cartItems = {
                ...cartItems,
                [product.image]: product
            }
        }
        cartItems[product.image].incart += 1;
    } else {
        product.incart = 1;
        cartItems = {
            [product.image]: product
        }
    }

    localStorage.setItem("productsIncart", JSON.stringify(cartItems));
}

function totalCost(product) {
    let cartCost = localStorage.getItem('totalCost');
    product.P_price=parseInt(product.P_price);
    if (cartCost != null) {
        cartCost = parseInt(cartCost);
        localStorage.setItem("totalCost", cartCost + product.P_price);
    } else {
        localStorage.setItem("totalCost", product.P_price);
    }

}

function displayCarts() {
    let cartCost = localStorage.getItem('totalCost');
    let cartItems = localStorage.getItem('productsIncart');
    cartItems = JSON.parse(cartItems);
    let productContainer = document.querySelector(".products");
    if (cartItems && productContainer) {
        productContainer.innerHTML = ' ';
        Object.values(cartItems).map(item => {
            productContainer.innerHTML += `
            <div class="products">
			<div class="product">
            <img src="items/${item.image}">
                <span>${item.P_name}</span>
            </div>
            <div class="price">Ksh. ${item.P_price}.00</div>
            <div Class="Quantity">
                <span>${item.incart}</span>
            </div>
            <div class="total">Ksh. ${item.incart * item.P_price}.00</div>
			<div class="remove"><button>Remove</button></div></div>
			
            `;
        });
        productContainer.innerHTML += `
        <div class="basketTotalContainer">
        <h4 class="basketTotalTitle">
        Basket Total: &#160;&#160;
        </h4>
        <h4 class="basketTotal">
        Ksh. ${cartCost}.00
        </h4>
		<div class="purchase"><button>purchase</button>
		</div>
        `;
    }
}

onLoadCartNumbers();
displayCarts();