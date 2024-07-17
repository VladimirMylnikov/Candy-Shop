<?php
include "database.php";
$result = mysqli_query($link,"SELECT * FROM assortiment");

 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Roboto:wght@900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/section-top.css">
    <link rel="stylesheet" href="css/components.css">
    <link rel="stylesheet" href="css/header-page.css">
    <link rel="stylesheet" href="css/section-about.css">
    <link rel="stylesheet" href="css/section-contact.css">
    <link rel="stylesheet" href="css/footer-page.css">
    <link rel="stylesheet" href="css/popup.css">
    <title>Document</title>
</head>
<body>
    <!--heade-page-->
    <header class="header-page">
    <div class="container header-page__container">
        <div class="header-page__start">
            <div class="header-page__text2">Сладкая жизнь</div> <!--<img class="logo__img" src="../project/img/common/logo4.png" width="70" height="21" alt="">-->
        </div>
        <div class="header-page__end">
            <nav class="header-page__nav">
                <ul class="header-page__ul">
                    <li class="header-page__li">
                        <a class="header-page__link" href="#" data-scroll-to="section-catalog"><span class="header-page__text">Ассортимент</span></a>
                    </li>
                    <li class="header-page__li">
                        <a class="header-page__link" href="#" data-scroll-to="section-about"><span class="header-page__text"> О нас</span></a>
                    </li>
                    <li class="header-page__li">
                        <a class="header-page__link" href="#" data-scroll-to="section-contacts"><span class="header-page__text"> Контакты</span></a>
                    </li>
                </ul>
            </nav>
            <div class="phone">
                <a class="phone__item header-page__phone" href="tel:+78005553535">+7(800)555-35-35</a>
            </div>
            <div class="header-page__hanburger">
                <button class="btn-menu" type="button" data-popup="popup-menu">
                    <span class="btn-menu__box">
                        <span class="btn-menu__inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    </header>
    <!--header-page-->


    <!--section-top-->
    <section class="section-top">
        <div class="container section-top__container">
            <div class="section-top__info">магазин кондитерских товаров</div>
            <h1 class="section-top__title">Сладкая жизнь</h1>
            <div class="section-top__btn">
                <button class="btn" type="button" data-scroll-to="section-catalog">Выбрать</button>
            </div>
       </div>
    </section>
    <!--section-top-->

    <!--section-catalog-->
    <section class="section-catalog">
    <div class="section section-catalog">
        <div class="container">
            <header class="section__header">
                <h2 class="page-title page-title--accent">Ассортимент</h2>
                    <nav class="catalog-nav">
                        <ul class="catalog-nav__wrapper">
                            <li class="catalog-nav__item">
                                <button class="catalog-nav__btn is-active" type="button" data-filter="all">Все</button>
                            </li>
                            <li class="catalog-nav__item">
                                <button class="catalog-nav__btn" type="button" data-filter="muffin">Кексы</button>
                            </li>
                            <li class="catalog-nav__item">
                                <button class="catalog-nav__btn" type="button" data-filter="chocolate">Шоколад</button>
                            </li>
                            <li class="catalog-nav__item">
                                <button class="catalog-nav__btn" type="button" data-filter="cookie">Печенье</button>
                            </li>
                        </ul>
                    </nav>
            </header>

            <div class="catalog js-catalog">
              <?php

              while ($food = mysqli_fetch_assoc($result)) {
                ?>
                <div class="catalog__item" data-category="<?php echo $food['type'] ?>">
                    <div class="product catalog__product js-product" data-product-price="<?php echo $food['price_small'] ?>" data-product-name="<?php echo $food['name'] ?>" data-product-attribute="<?php echo $food['small'] ?>" data-product-src="<?php echo $food['image'] ?>">
                        <img  src="<?php echo $food['image'] ?>" alt="" class="product__img">
                        <div class="product__content">
                            <h3 class="product__title"><?php echo $food['name'] ?></h3>
                            <p class="product__discription"><?php echo $food['text'] ?></p>
                        </div>
                        <footer class="product__footer">
                            <div class="product__sizes">
                                <button data-product-attribute-price="<?php echo $food['price_small'] ?>" data-product-attribute-value="<?php echo $food['small'] ?>" class="product__size js-btn-product-attribute is-active"  type="button">  <?php echo $food['small'] ?> </button>
                                <button data-product-attribute-price="<?php echo $food['price_medium'] ?>" data-product-attribute-value="<?php echo $food['medium'] ?>" class="product__size js-btn-product-attribute" type="button">  <?php echo $food['medium'] ?> </button>
                                <button data-product-attribute-price="<?php echo $food['price_big'] ?>" data-product-attribute-value="<?php echo $food['big'] ?>" class="product__size js-btn-product-attribute" type="button">  <?php echo $food['big'] ?> </button>
                            </div>
                            <div class="product__bottom">
                                <div class="product__price">
                                    <span class="product__price-value js-product-price-value"><?php echo $food['price_small'] ?></span>
                                    <span class="product__currently">&#8381</span>
                                </div>
                                <button type="button" class="btn product__btn js-btn-add-to-cart">Заказать</button>
                            </div>
                        </footer>
                    </div>
                </div>
                <?php
              }

               ?>
               <!--
                <div class="catalog__item" data-category="meat">
                    <div class="product catalog__product js-product" data-product-price="900" data-product-name="А" data-product-attribute="35 см" data-product-src="../project/img/section-catalog/1.png">
                        <img  src="../project/img/section-catalog/1.png" alt="" class="product__img">
                        <div class="product__content">
                            <h3 class="product__title">А</h3>
                            <p class="product__discription">Салями, картофель, морковь, огурцы</p>
                        </div>
                        <footer class="product__footer">
                            <div class="product__sizes">
                                <button data-product-attribute-price="500" data-product-attribute-value="35 см" class="product__size js-btn-product-attribute is-active"  type="button">35 см</button>
                                <button data-product-attribute-price="700" data-product-attribute-value="30 см" class="product__size js-btn-product-attribute" type="button">30 см</button>
                                <button data-product-attribute-price="900" data-product-attribute-value="25 см" class="product__size js-btn-product-attribute" type="button">25 см</button>
                            </div>
                            <div class="product__bottom">
                                <div class="product__price">
                                    <span class="product__price-value js-product-price-value">500</span>
                                    <span class="product__currently">&#8381</span>
                                </div>
                                <button type="button" class="btn product__btn js-btn-add-to-cart">Заказать</button>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="catalog__item" data-category="cheese">
                    <div class="product catalog__product js-product" data-product-price="900" data-product-name="Б" data-product-attribute="35 см" data-product-src="../project/img/section-catalog/2.png">
                        <img  src="../project/img/section-catalog/2.png" alt="" class="product__img">
                        <div class="product__content">
                            <h3 class="product__title">Б</h3>
                            <p class="product__discription">Салями, картофель, морковь, огурцы</p>
                        </div>
                        <footer class="product__footer">
                            <div class="product__sizes">
                                <button data-product-attribute-price="500" data-product-attribute-value="35 см" class="product__size js-btn-product-attribute is-active"  type="button">35 см</button>
                                <button data-product-attribute-price="700" data-product-attribute-value="30 см" class="product__size js-btn-product-attribute" type="button">30 см</button>
                                <button data-product-attribute-price="900" data-product-attribute-value="25 см" class="product__size js-btn-product-attribute" type="button">25 см</button>
                            </div>
                            <div class="product__bottom">
                                <div class="product__price">
                                    <span class="product__price-value js-product-price-value">500</span>
                                    <span class="product__currently">&#8381</span>
                                </div>
                                <button type="button" class="btn product__btn js-btn-add-to-cart">Заказать</button>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="catalog__item" data-category="cheese">
                    <div class="product catalog__product js-product" data-product-price="900" data-product-name="В" data-product-attribute="35 см" data-product-src="../project/img/section-catalog/3.png">
                        <img  src="../project/img/section-catalog/3.png" alt="" class="product__img">
                        <div class="product__content">
                            <h3 class="product__title">В</h3>
                            <p class="product__discription">Салями, картофель, морковь, огурцы</p>
                        </div>
                        <footer class="product__footer">
                            <div class="product__sizes">
                                <button data-product-attribute-price="500" data-product-attribute-value="35 см" class="product__size js-btn-product-attribute is-active"  type="button">35 см</button>
                                <button data-product-attribute-price="700" data-product-attribute-value="30 см" class="product__size js-btn-product-attribute" type="button">30 см</button>
                                <button data-product-attribute-price="900" data-product-attribute-value="25 см" class="product__size js-btn-product-attribute" type="button">25 см</button>
                            </div>
                            <div class="product__bottom">
                                <div class="product__price">
                                    <span class="product__price-value js-product-price-value">500</span>
                                    <span class="product__currently">&#8381</span>
                                </div>
                                <button type="button" class="btn product__btn js-btn-add-to-cart">Заказать</button>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="catalog__item" data-category="meat">
                    <div class="product catalog__product js-product" data-product-price="900" data-product-name="Г" data-product-attribute="35 см" data-product-src="../project/img/section-catalog/4.png">
                        <img  src="../project/img/section-catalog/4.png" alt="" class="product__img">
                        <div class="product__content">
                            <h3 class="product__title">Г</h3>
                            <p class="product__discription">Салями, картофель, морковь, огурцы</p>
                        </div>
                        <footer class="product__footer">
                            <div class="product__sizes">
                                <button data-product-attribute-price="500" data-product-attribute-value="35 см" class="product__size js-btn-product-attribute is-active"  type="button">35 см</button>
                                <button data-product-attribute-price="700" data-product-attribute-value="30 см" class="product__size js-btn-product-attribute" type="button">30 см</button>
                                <button data-product-attribute-price="900" data-product-attribute-value="25 см" class="product__size js-btn-product-attribute" type="button">25 см</button>
                            </div>
                            <div class="product__bottom">
                                <div class="product__price">
                                    <span class="product__price-value js-product-price-value">500</span>
                                    <span class="product__currently">&#8381</span>
                                </div>
                                <button type="button" class="btn product__btn js-btn-add-to-cart">Заказать</button>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="catalog__item" data-category="mushrooms">
                    <div class="product catalog__product js-product" data-product-price="900" data-product-name="Д" data-product-attribute="35 см" data-product-src="../project/img/section-catalog/5.png">
                        <img  src="../project/img/section-catalog/5.png" alt="" class="product__img">
                        <div class="product__content">
                            <h3 class="product__title">Д</h3>
                            <p class="product__discription">Салями, картофель, морковь, огурцы</p>
                        </div>
                        <footer class="product__footer">
                            <div class="product__sizes">
                                <button data-product-attribute-price="500" data-product-attribute-value="35 см" class="product__size js-btn-product-attribute is-active"  type="button">35 см</button>
                                <button data-product-attribute-price="700" data-product-attribute-value="30 см" class="product__size js-btn-product-attribute" type="button">30 см</button>
                                <button data-product-attribute-price="900" data-product-attribute-value="25 см" class="product__size js-btn-product-attribute" type="button">25 см</button>
                            </div>
                            <div class="product__bottom">
                                <div class="product__price">
                                    <span class="product__price-value js-product-price-value">500</span>
                                    <span class="product__currently">&#8381</span>
                                </div>
                                <button type="button" class="btn product__btn js-btn-add-to-cart">Заказать</button>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="catalog__item" data-category="meat">
                    <div class="product catalog__product js-product" data-product-price="900" data-product-name="Е" data-product-attribute="35 см" data-product-src="../project/img/section-catalog/6.png">
                        <img  src="../project/img/section-catalog/6.png" alt="" class="product__img">
                        <div class="product__content">
                            <h3 class="product__title">Е</h3>
                            <p class="product__discription">Салями, картофель, морковь, огурцы</p>
                        </div>
                        <footer class="product__footer">
                            <div class="product__sizes">
                                <button data-product-attribute-price="500" data-product-attribute-value="35 см" class="product__size js-btn-product-attribute is-active"  type="button">35 см</button>
                                <button data-product-attribute-price="700" data-product-attribute-value="30 см" class="product__size js-btn-product-attribute" type="button">30 см</button>
                                <button data-product-attribute-price="900" data-product-attribute-value="25 см" class="product__size js-btn-product-attribute" type="button">25 см</button>
                            </div>
                            <div class="product__bottom">
                                <div class="product__price">
                                    <span class="product__price-value js-product-price-value">500</span>
                                    <span class="product__currently">&#8381</span>
                                </div>
                                <button type="button" class="btn product__btn js-btn-add-to-cart">Заказать</button>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="catalog__item" data-category="mushrooms">
                    <div class="product catalog__product js-product" data-product-price="900" data-product-name="Ё" data-product-attribute="35 см" data-product-src="../project/img/section-catalog/7.png">
                        <img  src="../project/img/section-catalog/7.png" alt="" class="product__img">
                        <div class="product__content">
                            <h3 class="product__title">Ё</h3>
                            <p class="product__discription">Салями, картофель, морковь, огурцы</p>
                        </div>
                        <footer class="product__footer">
                            <div class="product__sizes">
                                <button data-product-attribute-price="500" data-product-attribute-value="35 см" class="product__size js-btn-product-attribute is-active"  type="button">35 см</button>
                                <button data-product-attribute-price="700" data-product-attribute-value="30 см" class="product__size js-btn-product-attribute" type="button">30 см</button>
                                <button data-product-attribute-price="900" data-product-attribute-value="25 см" class="product__size js-btn-product-attribute" type="button">25 см</button>
                            </div>
                            <div class="product__bottom">
                                <div class="product__price">
                                    <span class="product__price-value js-product-price-value">500</span>
                                    <span class="product__currently">&#8381</span>
                                </div>
                                <button type="button" class="btn product__btn js-btn-add-to-cart">Заказать</button>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="catalog__item" data-category="cheese">
                    <div class="product catalog__product js-product" data-product-price="900" data-product-name="Ж" data-product-attribute="35 см" data-product-src="../project/img/section-catalog/8.png">
                        <img  src="../project/img/section-catalog/8.png" alt="" class="product__img">
                        <div class="product__content">
                            <h3 class="product__title">Ж</h3>
                            <p class="product__discription">Салями, картофель, морковь, огурцы</p>
                        </div>
                        <footer class="product__footer">
                            <div class="product__sizes">
                                <button data-product-attribute-price="500" data-product-attribute-value="35 см" class="product__size js-btn-product-attribute is-active"  type="button">35 см</button>
                                <button data-product-attribute-price="700" data-product-attribute-value="30 см" class="product__size js-btn-product-attribute" type="button">30 см</button>
                                <button data-product-attribute-price="900" data-product-attribute-value="25 см" class="product__size js-btn-product-attribute" type="button">25 см</button>
                            </div>
                            <div class="product__bottom">
                                <div class="product__price">
                                    <span class="product__price-value js-product-price-value">500</span>
                                    <span class="product__currently">&#8381</span>
                                </div>
                                <button type="button" class="btn product__btn js-btn-add-to-cart">Заказать</button>
                            </div>
                        </footer>
                    </div>
                </div>
                <div class="catalog__item" data-category="mushrooms">
                    <div class="product catalog__product js-product" data-product-price="900" data-product-name="З" data-product-attribute="35 см" data-product-src="../project/img/section-catalog/9.png">
                        <img  src="../project/img/section-catalog/9.png" alt="" class="product__img">
                        <div class="product__content">
                            <h3 class="product__title">З</h3>
                            <p class="product__discription">Салями, картофель, морковь, огурцы</p>
                        </div>
                        <footer class="product__footer">
                            <div class="product__sizes">
                                <button data-product-attribute-price="500" data-product-attribute-value="35 см" class="product__size js-btn-product-attribute is-active"  type="button">35 см</button>
                                <button data-product-attribute-price="700" data-product-attribute-value="30 см" class="product__size js-btn-product-attribute" type="button">30 см</button>
                                <button data-product-attribute-price="900" data-product-attribute-value="25 см" class="product__size js-btn-product-attribute" type="button">25 см</button>
                            </div>
                            <div class="product__bottom">
                                <div class="product__price">
                                    <span class="product__price-value js-product-price-value">500</span>
                                    <span class="product__currently">&#8381</span>
                                </div>
                                <button type="button" class="btn product__btn js-btn-add-to-cart">Заказать</button>
                            </div>
                        </footer>
                    </div>
                </div>
            -->
        </div>

        </div>
    </div>
            
    </section>
  
    <!--section-catalog-->

    <!--section-about-->
    <section class="section section-about">
        <img src="../project/img/section-about/4.jpg" alt="" class="section-about__img">
        <div class="container section-about__container">
            <div class="section-about__content">
                <h2 class="page-title section-about__title">О нас</h2>
                <p class="section-about__text">Мы с 2020 года являвляемся одним из крупнейших в Челябинской области производителем кондитерских изделий. Выбирая нас вы выбираете качество.</p>
            </div>
        </div>
    </section>
    <!--section-about-->


    <!--section-contact-->
    <section class="section section-contacts">
        <div class="container section-contacts__container">
            <header class="section__header">
                <h2 class="page-title section-contacts__title">Контакты</h2>
            </header>
            <div class="contacts">
                <div class="contacts__start">
                    <div class="contacts__map" id="ymap"></div>
                </div>
                <div class="contacts__end">
                    <div class="contacts__item">
                        <h3 class="contacts__title">Адрес</h3>
                        <p class="contacts__text">г. Златоуст ул. Тургенева д. 16</p>
                    </div>
                    <div class="contacts__item">
                        <h3 class="contacts__title">Телефон</h3>
                        <p class="contacts__phone" href="tel:+78005553535">+7(800)555-35-35</p>
                    </div>
                    <div class="contacts__item">
                        <h3 class="contacts__title">Социальные сети</h3>
                        <ul class="socials">
                            <li class="socials__item">
                                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="socials__link">
                                    <img class="socials__icon" src="../project/img/common/twitter.svg" width="35" height="35">
                                </a>
                            </li>
                            <li class="socials__item">
                                <a href="https://www.youtube.com/watch?v=cv6a81Ulx-g" class="socials__link">
                                    <img class="socials__icon" src="../project/img/common/vk.svg" width="35" height="35">
                                </a>
                            </li>
                            <li class="socials__item">
                                <a href="https://www.youtube.com/watch?v=_S7WEVLbQ-Y" class="socials__link">
                                    <img class="socials__icon" src="../project/img/common/inst.svg" width="35" height="35">
                                 </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!--section-contact-->

    <button class="cart-btn" data-popup="popup-order">
        <span class="cart-btn__counter js-cart-total-count-items">0</span>
        <svg class="cart-btn__icon" viewBox="0 -31 512.00026 512" xmlns="http://www.w3.org/2000/svg">
          <path d="m164.960938 300.003906h.023437c.019531 0 .039063-.003906.058594-.003906h271.957031c6.695312 0 12.582031-4.441406 14.421875-10.878906l60-210c1.292969-4.527344.386719-9.394532-2.445313-13.152344-2.835937-3.757812-7.269531-5.96875-11.976562-5.96875h-366.632812l-10.722657-48.253906c-1.527343-6.863282-7.613281-11.746094-14.644531-11.746094h-90c-8.285156 0-15 6.714844-15 15s6.714844 15 15 15h77.96875c1.898438 8.550781 51.3125 230.917969 54.15625 243.710938-15.941406 6.929687-27.125 22.824218-27.125 41.289062 0 24.8125 20.1875 45 45 45h272c8.285156 0 15-6.714844 15-15s-6.714844-15-15-15h-272c-8.269531 0-15-6.730469-15-15 0-8.257812 6.707031-14.976562 14.960938-14.996094zm312.152343-210.003906-51.429687 180h-248.652344l-40-180zm0 0" />
          <path d="m150 405c0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45-45 20.1875-45 45zm45-15c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0" />
          <path d="m362 405c0 24.8125 20.1875 45 45 45s45-20.1875 45-45-20.1875-45-45-45-45 20.1875-45 45zm45-15c8.269531 0 15 6.730469 15 15s-6.730469 15-15 15-15-6.730469-15-15 6.730469-15 15-15zm0 0" />
        </svg>
      </button>

    <!--footer-page-->
    <footer class="footer-page">
        <div class="conteiner">
            <div class="footer-page__text">Сладкая жизнь</div>
        </div>
    </footer>
    <!--footer-page-->


    <!--popup-menu-->
    <div class="popup  popup-menu">
        <div class="popup__wrapper">
            <div class="popup__inner">
                <div class="popup__content popup__content--fluid popup__content--centered">
                    <button class="btn-close popup__btn-close popup-close"></button>
                    <nav class="mobile-menu popup__mobile-menu">
                        <ul class="mobile-menu__ul">
                            <li class="mobile-menu__li">
                                <a class="mobile-menu__link popup-close" href="#" data-scroll-to="section-catalog">Ассортимент</a>
                            </li>
                            <li class="mobile-menu__li">
                                <a class="mobile-menu__link popup-close" href="#" data-scroll-to="section-about">О нас</a>
                            </li>
                            <li class="mobile-menu__li">
                                <a class="mobile-menu__link popup-close" href="#" data-scroll-to="section-contacts">Контакты</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="phone popup__phone">
                        <a class="phone__item phone__item--accent" href="tel:+78005553535">+7(800)555-35-35</a>
                    </div>
                    <ul class="socials">
                        <li class="socials__item">
                            <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="socials__link">
                                <img class="socials__icon" src="../project/img/common/twitter.svg" width="35" height="35">
                            </a>
                        </li>
                        <li class="socials__item">
                            <a href="https://www.youtube.com/watch?v=cv6a81Ulx-g" class="socials__link">
                                <img class="socials__icon" src="../project/img/common/vk.svg" width="35" height="35">
                            </a>
                        </li>
                        <li class="socials__item">
                            <a href="https://www.youtube.com/watch?v=_S7WEVLbQ-Y" class="socials__link">
                                <img class="socials__icon" src="../project/img/common/inst.svg" width="35" height="35">
                             </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<!--popup-menu-->

<!-- popup-order -->
<div class="popup popup-order">
    <div class="popup__wrapper">
      <div class="popup__inner">
        <div class="popup__content">
          <button class="btn-close popup__btn-close popup-close"></button>
          <h2 class="page-title">Корзина</h2>
          <div class="cart js-cart-wrapper">
            <form class="form cart__form form-send">
              <div class="cart__items js-cart">
              </div>
              <div class="cart__totals">
                <div>Итого: <span class="cart__bold"><span class="js-cart-total-price"></span> ₽</span></div>
              </div>
              <div class="order">
              <h3 class="order__title">Заполните форму</h3>
                <div class="form__main">
                  <input class="form__input" type="text" name="Имя" placeholder="Имя" required="">
                  <input class="form__input" type="text" name="Телефон" placeholder="Телефон" required="">
                  <input class="form__input" type="text" name="Адрес" placeholder="Адрес" required="">
                  <input class="js-cart-total-price-input" type="hidden" name="Общая сумма">
                  <select class="form__input" name="оплата">
                    <option value="Оплата наличными">Оплата наличными</option>
                    <option value="Оплата картой">Оплата картой</option>
                  </select>
                  <button class="btn form__btn" type="submit" data-popup="popup-thanks">Отправить</button>
                </div>
              </div>
            </form>
            <div class="cart__empty">
              <p class="cart__info">Нет товаров</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--popup-order -->



     <!--popup-thanks-->
     <div class="popup popup-thanks">
        <div class="popup__wrapper">
            <div class="popup__inner">
                <div class="popup__content">
                    <button class="btn-close popup__btn-close popup-close"></button>
                    <h2 class="page-title popup__title ">Заказ принят</h2>
                    <p class="popup__subtitle"></p>
                </div>
            </div>
        </div>
    </div>
    <!--popup-thanks-->

    <!--popup-error-->
    <div class="popup popup-error">
        <div class="popup__wrapper">
            <div class="popup__inner">
                <div class="popup__content">
                    <button class="btn-close popup__btn-close popup-close"></button>
                    <h2 class="page-title popup__title ">Произошла ошибка</h2>
                    <p class="popup__subtitle">Пожалуйста, сделайте заказ по номеру <a href="tel:+78005553535" class="popup__link"> +7(800)555-35-35</a></p>

                </div>
            </div>
        </div>
    </div>
    <!--popup-error-->

    <!--scripts-->
    <script src="js/myLib.js"></script>
    <script src="js/header.js"></script>
    <script src="js/popup.js"></script>
    <script src="js/srcollTo.js"></script>
    <script src="js/catalog.js"></script>
    <script src="js/product.js"></script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <script src="js/map.js"></script>
    <script src="js/cart.js"></script>
    <!--<script src="js/form.js"></script>-->
    <!--scripts-->
</body>
</html>
