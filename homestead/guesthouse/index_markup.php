<?
define("HOMESTEAD_SUBPAGE", "Y");
define("NO_MAIN_WRAPPER", "Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Гостевой дом");
?>

<div class="section_wrap">
    <nav class="top_menu">
        <a href="#">Усадьба</a>
        <span>Дары природы</span>
        <a href="#">Багетная мастерская</a>
    </nav>
    <div class="sub_menu_line">
        <nav class="sub_menu">
            <a href="#">Гостевой дом</a>
            <span>Главный корпус</span>
            <a href="#">Административный корпус</a>
            <a href="#">Спорт и отдых</a>
        </nav>
        <nav class="rooms">
            <a href="#">
                <img alt="Каминный зал" src="/tmp/homestead/01.png" />
                <span><span>Каминный зал</span></span>
            </a>
            <span>
                <img alt="Номер «Стандарт»" src="/tmp/homestead/02.png" />
                <span><span>Номер «Стандарт»</span></span>
            </span>
            <a href="#">
                <img alt="Номер «Стандарт Плюс»" src="/tmp/homestead/03.png" />
                <span><span>Номер «Стандарт Плюс»</span></span>
            </a>
            <a href="#">
                <img alt="Балкон" src="/tmp/homestead/02.png" />
                <span><span>Балкон</span></span>
            </a>
            <a href="#">
                <img alt="Бильярд" src="/tmp/homestead/04.png" />
                <span><span>Бильярд</span></span>
            </a>
            <a href="#">
                <img alt="Баня с бассейном" src="/tmp/homestead/05.png" />
                <span><span>Баня с бассейном</span></span>
            </a>
            <a href="#">
                <img alt="Беседка" src="/tmp/homestead/02.png" />
                <span><span>Беседка</span></span>
            </a>
        </nav>
    </div>
    <div class="head">
        <h1>Номер «Стандарт»</h1>
    </div>
    <main>
        <div class="panorama"></div>
        <div class="notation_block">
            <p>Интерьер номеров продуман до мельчайших деталей. Каждый из номеров
            оснащён современным LCD-телевизором и DVD, спутниковой антенной,
            холодильником с прохладительными напитками, кондиционером. В ванных
            комнатах сантехника и душевые кабины европейского качества, фен,
            косметические средства для личной гигиены, махровые халаты и тапочки.</p>
        </div>
        <ul class="photos">
            <li><img alt="" src="/tmp/homestead/pic.png" /></li>
            <li><img alt="" src="/tmp/homestead/pic.png" /></li>
            <li><img alt="" src="/tmp/homestead/pic.png" /></li>
        </ul>
        <div class="prices">
            <dl>
                <dt>Одноместное проживание</dt>
                <dd>
                    <span class="quantity">
                        <span class="unit"></span>
                        <span class="fill"></span>
                    </span>
                    <span class="price_block">
                        <span class="price">3 200</span>
                        <span class="currency">
                            <span>руб.</span>
                            <span>/</span>
                            <span>сутки</span>
                        </span>
                    </span>
                </dd>
            </dl>
            <dl>
                <dt>Двухместное проживание</dt>
                <dd>
                    <span class="quantity">
                        <span class="unit"></span>
                        <span class="unit"></span>
                        <span class="fill"></span>
                    </span>
                    <span class="price_block">
                        <span class="price">3 500</span>
                        <span class="currency">
                            <span>руб.</span>
                            <span>/</span>
                            <span>сутки</span>
                        </span>
                    </span>
                </dd>
            </dl>
        </div><!--.prices-->
    </main>
</div><!--.section_wrap-->

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
