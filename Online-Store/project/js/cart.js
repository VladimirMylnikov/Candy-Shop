;(function() {
  const cartDOMElement = document.querySelector('.js-cart');

  if (!cartDOMElement) {
    return;
  }
  const cart = JSON.parse(localStorage.getItem('cart')) || {};
  const cartItemsCounterDOMElement = document.querySelector('.js-cart-total-count-items');
  const cartTotalPriceDOMElement = document.querySelector('.js-cart-total-price');
  const cartTotalPriceInputDOMElement = document.querySelector('.js-cart-total-price-input');
  const cartWrapperDOMElement = document.querySelector('.js-cart-wrapper');

  const renderCartItem = ({ id, name, attribute, src, price, quantity }) => {
    const cartItemDOMElement = document.createElement('div');

    const attributeTemplate = attribute
      ? `<p class="cart-item__attribute">${attribute}</p><input type="hidden" name="${id}-Аттрибут" value="${attribute}">`
      : '';

    const cartItemTemplate = `
      <div class="cart-item cart__item">
        <div class="cart-item__main">
          <div class="cart-item__start">
            <button class="cart-item__btn cart-item__btn--remove js-btn-cart-item-remove" type="button"></button>
          </div>
          <div class="cart-item__img-wrapper">
            <img class="cart-item__img" src="${src}" alt="">
          </div>
          <div class="cart-item__content">
            <h3 class="cart-item__title">${name}</h3>
            <input type="hidden" name="${id}-Товар" value="${name}">
            <input class="js-cart-input-quantity" type="hidden" name="${id}-Количество" value="${quantity}">
            <input class="js-cart-input-price" type="hidden" name="${id}-Цена" value="${price * quantity}">
            ${attributeTemplate}
          </div>
        </div>
        <div class="cart-item__end">
          <div class="cart-item__actions">
            <button class="cart-item__btn js-btn-product-decrease-quantity" type="button">-</button>
            <span class="cart-item__quantity js-cart-item-quantity">${quantity}</span>
            <button class="cart-item__btn js-btn-product-increase-quantity" type="button">+</button>
          </div>
          <p class="cart-item__price"><span class="js-cart-item-price">${price * quantity}</span> ₽</p>
        </div>
      </div>
      `;

    cartItemDOMElement.innerHTML = cartItemTemplate;
    cartItemDOMElement.setAttribute('data-product-id', id);
    cartItemDOMElement.classList.add('js-cart-item');

    cartDOMElement.appendChild(cartItemDOMElement);
  };

  const saveCart = () => {
    localStorage.setItem('cart', JSON.stringify(cart));
  };

  const updateCartTotalPrice = () => {
    const totalPrice = Object.keys(cart).reduce((acc, id) => {
      const { quantity, price } = cart[id];
      return acc + price * quantity;
    }, 0);

    if (cartTotalPriceDOMElement) {
      cartTotalPriceDOMElement.textContent = totalPrice;
    }

    if (cartTotalPriceInputDOMElement) {
      cartTotalPriceInputDOMElement.value = totalPrice;
    }
  };

  const updateCartTotalItemsCounter = () => {
    const totalQuantity = Object.keys(cart).reduce((acc, id) => {
      const { quantity } = cart[id];
      return acc + quantity;
    }, 0);

    if (cartItemsCounterDOMElement) {
      cartItemsCounterDOMElement.textContent = totalQuantity;
    }

    return totalQuantity;
  };

  const updateCart = () => {
    const totalQuantity = updateCartTotalItemsCounter();
    updateCartTotalPrice();
    saveCart();

    if (totalQuantity === 0) {
      cartWrapperDOMElement.classList.add('is-empty');
    } else {
      cartWrapperDOMElement.classList.remove('is-empty');
    }
  };

  const deleteCartItem = (id) => {
    const cartItemDOMElement = cartDOMElement.querySelector(`[data-product-id="${id}"]`);

    cartDOMElement.removeChild(cartItemDOMElement);
    delete cart[id];
    updateCart();
  };

  const addCartItem = (data) => {
    const { id } = data;

    if (cart[id]) {
      increaseQuantity(id);
      return;
    }

    cart[id] = data;
    renderCartItem(data);
    updateCart();
  };

  const updateQuantity = (id, quantity) => {
    const cartItemDOMElement = cartDOMElement.querySelector(`[data-product-id="${id}"]`);
    const cartItemQuantityDOMElement = cartItemDOMElement.querySelector('.js-cart-item-quantity');
    const cartItemPriceDOMElement = cartItemDOMElement.querySelector('.js-cart-item-price');
    const cartItemInputPriceDOMElement = cartItemDOMElement.querySelector('.js-cart-input-price');
    const cartItemInputQuantityDOMElement = cartItemDOMElement.querySelector('.js-cart-input-quantity');

    cart[id].quantity = quantity;
    cartItemQuantityDOMElement.textContent = quantity;
    cartItemPriceDOMElement.textContent = quantity * cart[id].price;
    cartItemInputPriceDOMElement.value = quantity * cart[id].price;
    cartItemInputQuantityDOMElement.value = quantity;

    updateCart();
  };

  const decreaseQuantity = (id) => {
    const newQuantity = cart[id].quantity - 1;
    if (newQuantity >= 1) {
      updateQuantity(id, newQuantity);
    }
  };

  const increaseQuantity = (id) => {
    const newQuantity = cart[id].quantity + 1;
    updateQuantity(id, newQuantity);
  };

  const generateID = (string1, string2) => {
    const secondParam = string2 ? `-${string2}` : '';
    return `${string1}${secondParam}`.replace(/ /g, '-');
  };

  const getProductData = (productDOMElement) => {
    const name = productDOMElement.getAttribute('data-product-name');
    const attribute = productDOMElement.getAttribute('data-product-attribute');
    const price = productDOMElement.getAttribute('data-product-price');
    const src = productDOMElement.getAttribute('data-product-src');
    const quantity = 1;
    const id = generateID(name, attribute);

    return { name, attribute, price, src, quantity, id };
  };

  const renderCart = () => {
    const ids = Object.keys(cart);
    ids.forEach((id) => renderCartItem(cart[id]));
  };

  const resetCart = () => {
    const ids = Object.keys(cart);
    ids.forEach((id) => deleteCartItem(cart[id].id));
  };

  const cartInit = () => {
    renderCart();
    updateCart();

    document.addEventListener('reset-cart', resetCart);

    document.querySelector('body').addEventListener('click', (e) => {
      const target = e.target;

      if (target.classList.contains('js-btn-add-to-cart')) {
        e.preventDefault();
        const productDOMElement = target.closest('.js-product');
        const data = getProductData(productDOMElement);
        addCartItem(data);
      }

      if (target.classList.contains('js-btn-cart-item-remove')) {
        e.preventDefault();
        const cartItemDOMElement = target.closest('.js-cart-item');
        const productID = cartItemDOMElement.getAttribute('data-product-id');
        deleteCartItem(productID);
      }

      if (target.classList.contains('js-btn-product-increase-quantity')) {
        e.preventDefault();
        const cartItemDOMElement = target.closest('.js-cart-item');
        const productID = cartItemDOMElement.getAttribute('data-product-id');
        increaseQuantity(productID);
      }

      if (target.classList.contains('js-btn-product-decrease-quantity')) {
        e.preventDefault();
        const cartItemDOMElement = target.closest('.js-cart-item');
        const productID = cartItemDOMElement.getAttribute('data-product-id');
        decreaseQuantity(productID);
      }

      if (target.classList.contains('js-btn-product-attribute')) {
        e.preventDefault();
        const attribute = target.getAttribute('data-product-attribute-value');
        const price = target.getAttribute('data-product-attribute-price');
        const productDOMElement = target.closest('.js-product');
        const activeAttributeDOMElement = productDOMElement.querySelector('.js-btn-product-attribute.is-active');
        const productPriceDOMElement = productDOMElement.querySelector('.js-product-price-value');

        productPriceDOMElement.textContent = price;
        productDOMElement.setAttribute('data-product-attribute', attribute);
        productDOMElement.setAttribute('data-product-price', price);
        activeAttributeDOMElement.classList.remove('is-active');
        target.classList.add('is-active');
      }
    });
  };

  cartInit();
})();