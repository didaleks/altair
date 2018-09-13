<div class="item-product item-product4 text-center border">
    <div class="product-thumb">
        <a href="#" class="product-thumb-link zoom-thumb"><img src="images/photos/jewelry/dark-light-jewelry-02.jpg" alt=""></a>
        <a href="quick-view.html" class="quickview-link fancybox.iframe title12 round white"><i class="fa fa-search"></i></a>
    </div>
    <div class="product-info">
        <h3 class="title14 product-title"><a href="{{$model->url}}" class="black">{{$model->title}}</a></h3>
        <div class="product-price title14 play-font">
            <del class="silver">$601.00</del>
            <ins class="black title18">$400.67</ins>
        </div>
        <ul class="wrap-rating list-inline-block">
            <li>
                <div class="product-rate">
                    <div class="product-rating" style="width:100%"></div>
                </div>
            </li>
            <li>
                <span class="rate-number silver">(5.0)</span>
            </li>
        </ul>
        <div class="product-extra-link4 title18">
            <a href="#" class="addcart-link black inline-block"><i class="icon ion-bag"></i><span class="title10 white text-uppercase">Добавить в корзину</span></a>
            <a href="#" class="wishlist-link black inline-block"><i class="icon {{ $model->isLiked() ? 'ion-android-favorite' : 'ion-android-favorite-outline' }}" data-slug="{{$model->slug}}"></i><span class="title10 white text-uppercase">Добавить в избранное</span></a>
        </div>
    </div>
</div>