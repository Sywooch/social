<?php
    use yii\widgets\Breadcrumbs;
    use yii\helpers\Url;
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
?>
<div class="breadcrumbs-block clearfix">
    <ul>
        <?php echo Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], 'homeLink' => false]);?>
    </ul>
</div>
<div class="content-container clearfix">
    <?= $this->render('//cabinet/block/leftNavBar', []); ?>
    <div class="responsive-container left">
        <h3>
            Личные данные
        </h3>
        <?php if (!empty($this->params['user']->code)):?>
        <div class="activate-email-block">
            <p>
                Ой, как же так, Вы не подтвердили свой E-mail:
            </p>
            <p class="confirm-email">
                <?php echo $this->params['user']->email?>
            </p>

            <div>
                <button>
                    Подтвердить
                </button>
            </div>
        </div>
        <?php endif;?>
        <div class="discount-info">
            <p>
                        <span class="title">
                            Ваша скидка:
                        </span>
                <span>
                            <?php echo $this->params['user']->group->groupDiscount?>%
                        </span>
                <a href="#">
                    Узнать подробнее о системе скидок!
                </a>
            </p>
            <p>
                        <span class="title">
                            Общая сумма ваших заказов по программе
                        </span>
                <span>
                            (накопительная скидка): {order_sum} грн.
                        </span>
            </p>
        </div>
        <div class="user-info">
            <p>
                        <span class="title">
                            Имя:
                        </span>
                <span>
                             <?php echo $this->params['user']->address->fullName ?>
                        </span>
            </p>
            <p>
                        <span class="title">
                            E-mail:
                        </span>
                <span>
                             <?php echo $this->params['user']->email?>
                        </span>
            </p>
            <p>
                        <span class="title">
                            Телефоны:
                        </span>
                        <span>
                             <?php echo $this->params['user']->address->phone1?><?php
                                echo (!empty($this->params['user']->address->phone2)) ? ', ' . $this->params['user']->address->phone2 : '';
                             ?>
                        </span>
            </p>
            <p>
                        <span class="title">
                            Адрес доставки:
                        </span>
                <span>
                             <?php echo $this->params['user']->address->address?>
                        </span>
            </p>
        </div>
        <a href="<?= Url::to('/'. Yii::$app->controller->id .'/change')?>" class="edit">
            РЕДАКТИРОВАТЬ
        </a>
        <div class="help-block">
            <p>
                Помогите сделать наш сервис лучше!
            </p>
            <span>
                        Оставьте отзыв о купленных товарах
                    </span>
        </div>
        <div class="random-product ">
            <div class="product">
                <a href="#"><img src="img/ran-item1.png" alt=""></a>
            </div>
            <div class="product">
                <a href="#"><img src="img/ran-item2.png" alt=""></a>
            </div>
            <div class="product">
                <a href="#"><img src="img/ran-item3.png" alt=""></a>
            </div>
            <div class="product">
                <a href="#"><img src="img/ran-item5.png" alt=""></a>
            </div>
            <div class="product">
                <a href="#"><img src="img/ran-item2.png" alt=""></a>
            </div>
            <div class="product">
                <a href="#"><img src="img/ran-item1.png" alt=""></a>
            </div>
            <div class="product">
                <a href="#"><img src="img/ran-item3.png" alt=""></a>
            </div>
            <div class="product">
                <a href="#"><img src="img/ran-item1.png" alt=""></a>
            </div>
            <div class="product">
                <a href="#"><img src="img/ran-item2.png" alt=""></a>
            </div>
            <div class="product">
                <a href="#"><img src="img/ran-item3.png" alt=""></a>
            </div>
        </div>
    </div>
</div>