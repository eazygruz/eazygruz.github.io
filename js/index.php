<?
$referer = $_SERVER['HTTP_REFERER'];
if (stristr($referer, 'yandex.ru')) { $search = 'text='; $crawler = 'Yandex'; }
if (stristr($referer, 'rambler.ru')) { $search = 'words='; $crawler = 'Rambler'; }
if (stristr($referer, 'google.ru')) { $search = 'q='; $crawler = 'Google'; }
if (stristr($referer, 'google.com')) { $search = 'q='; $crawler = 'Google'; }
if (stristr($referer, 'mail.ru')) { $search = 'q='; $crawler = 'Mail.Ru'; }
if (stristr($referer, 'bing.com')) { $search = 'q='; $crawler = 'Bing'; }
if (stristr($referer, 'qip.ru')) { $search = 'query='; $crawler = 'QIP'; }

if (isset($crawler))
{
    $phrase = urldecode($referer);
    eregi($search.'([^&]*)', $phrase.'&', $phrase2);
    $phrase = $phrase2[1];
    $referer = $crawler;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="favicon.ico">
    <link type="text/css" href="css/jquery.bxslider.css" rel="stylesheet">
    <link type="text/css" href="css/lightbox.css" rel="stylesheet">
    <link type="text/css" href="css/style.css" rel="stylesheet">
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/jquery.inputmask.js" type="text/javascript"></script>
    <script src="js/placeholder.js" type="text/javascript"></script>
    <!--<script src="js/timer.js" type="text/javascript"></script>-->
    <script type="text/javascript" src="js/lightbox.min.js"></script>
    <script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
    <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
    <script type="text/javascript" src="js/jquery.localscroll-1.2.7-min.js"></script>
    <script type="text/javascript" src="js/jquery.localscroll-1.2.7-min.js"></script>
    <script type="text/javascript" src="js/waypoints.min.js"></script>
    <script type="text/javascript" src="js/nicescroll.js"></script>
    <script type="text/javascript" src="js/jquery.mousewheel.js"></script>
    <script src="http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU" type="text/javascript"></script>
    <script src="js/main.js"></script>
	<link rel="shortcut icon" href="fav.png">
    <title>БКИ - получение кадастрового паспорта, технического плана и межевого плана </title>
    <script type="text/javascript">
        var myMap;
        ymaps.ready(function () {



            myMap = new ymaps.Map("myMap", {
                center: [56.03163542, 92.89122570],
                zoom: 16
            });
            myMap.controls.add(new ymaps.control.TypeSelector());
            myMap.controls.add('mapTools');
            myMap.controls.add('miniMap');
            var coords = [
                [56.03163542, 92.89122570]
            ]
            var myCollection = new ymaps.GeoObjectCollection();

            for (var i = 0; i<coords.length; i++) {
                myCollection.add(new ymaps.Placemark(coords[i], {style: "default#redSmallPoint"}
                ));
            }
            myMap.geoObjects.add(myCollection);
            myMap.controls.add('zoomControl', {left : '5px', top: '110px'});
            myMap.controls.add('scaleLine');
            myMap.controls.add('trafficControl');
        });
    </script>
</head>
<body>
<div class="image-preloader" style="display: none">
    <img src="images/service-icons-hover.png">
    <img src="images/bg/top-menu-left.png">
    <img src="images/bg/top-menu-right.png">
</div>
    <div class="header-wrapper">
        <div class="header-wrap">
            <div class="header">
                <div class="top-menu">
                    <ul>
                        <li><a href="#services">Услуги</a></li>
                        <li><a href="#faq">Вопросы</a></li>
                        <li><a href="#certificates">Сертификаты</a></li>
                        <li><a href="#myMap">Контакты</a></li>
                    </ul>
                </div>
                <div class="right">
                    <span>тел. 214-17-32, сот. 8-953-588-67-12</span>
                    <a href="javascript:void(0)" class="call-back">заказать звонок</a>
                </div>
            </div>
        </div>
    </div>
    <div class="top-block-wrap">
        <div class="top-block">
            <img class="logo" src="images/logo.png">
            <h2>ПОЛУЧЕНИЕ КАДАСТРОВОГО ПАСПОРТА,<br/>
                ТЕХНИЧЕСКОГО ПЛАНА И МЕЖЕВОГО ПЛАНА<br/>
                <span>в г. Красноярске и Красноярском крае</span>
            </h2>
            <a class="price" href="javascript:void(0)">Узнать стоимость услуг</a>
        </div>
    </div>
    <div id="services" class="services-wrap">
        <div class="services">
            <div class="top">
                <h2>Виды оказываемых услуг</h2>
                <ul>
                    <li data-appear-delay="200" data-appear="fade-in" data-appear-direction="top"><a href="javascript:void(0)"><span>Составление технического<br/>плана</span></a></li><li data-appear-delay="400" data-appear="fade-in" data-appear-direction="top">
                    <a href="javascript:void(0)"><span>Получение кадастрового<br/>паспорта</span></a></li><li data-appear-delay="600" data-appear="fade-in" data-appear-direction="top">
                    <a href="javascript:void(0)"><span>Получение справки<br/>о площади</span></a></li>
                </ul>
            </div>
            <div class="show0">
                <div class="more-top-wrap">
                    <div class="more-top clearfix">
                        <img src="images/services/1img.jpg">
                        <div class="top-right">
                            <h4>Составление технического плана</h4>
                            <div class="buttons">
                                <a class="to-know-price" href="javascript:void(0)">Узнать стоимость</a>
                                <a class="to-order-service" href="javascript:void(0)">Заказать услугу</a>
                            </div>
                        </div>
                        <p><b>Технический план</b> представляет собой документ, содержащий необходимые сведения о здании, сооружении, помещении или об объекте незавершенного строительства, необходимые для постановки на государственный кадастровый учет, либо внесения изменений в сведения ГКН, в случае изменения характеристик объекта недвижимого имущества.</p>
 <br>
<p><b>Технический план является обязательным документом, необходимым в следующих случаях:</b></p>
<p><b>•</b>для осуществления кадастрового учета вновь возведенных или не учтенных ранее объектов и получения кадастрового паспорта объекта;</p>
<p><b>•</b>внесения изменений в кадастр, в случае раздела объекта на самостоятельные части, его перепланировки или реконструкции, изменения других характеристик;</p>
<p><b>•</b>проведения адресации вновь возведенных объектов;</p>
<p><b>•</b>осуществления ввода объектов в эксплуатацию;</p>
<p><b>•</b>предоставления в суд в случае признания прав на объект в судебном порядке.</p>
 <p>В зависимости от вида объекта капитального строительства «БКИ» изготавливает различные виды технических планов: технический план здания, технический план сооружения, технический план помещения, технический план на объект незавершенного строительства.</p>
                    </div>
                </div>
            </div>
            <div class="show1">
                <div class="more-top-wrap">
                    <div class="more-top clearfix">
                        <img src="images/services/2img.jpg">
                        <div class="top-right">
                            <h4>Получение кадастрового паспорта</h4>
                            <div class="buttons">
                                <a class="to-know-price" href="javascript:void(0)">Узнать стоимость</a>
                                <a class="to-order-service" href="javascript:void(0)">Заказать услугу</a>
                            </div>
                        </div>
                        <p><b>Кадастровый паспорт</b> - это выписка из государственного кадастра недвижимости, содержащая необходимые для государственной регистрации прав на недвижимое имущество и сделок с ним сведения об объекте недвижимости.</p>
						<br>
						<br>
<p>Для осуществления любого рода сделок, при обращении в Регистрационную палату с 01.04.2012 года необходимо предъявить кадастровый паспорт объекта недвижимости (здания, сооружения, помещения, объекта незавершенного строительства).</p>
<br>
<p>Для оформления квартиры в новостройке, оформления вновь выстроенного дома, гаража, здания или сооружения, то есть в случае, если объект недвижимости является вновь вводимым или введен, но не учтен ранее, а также если была осуществлена перепланировка или реконструкция учтенного объекта недвижимости, то есть существует необходимость внесения соответствующих сведений в государственный кадастр недвижимости, данные сведения вносятся на основании технического плана, подготовленного «БКИ». По результату осуществления кадастрового учета выдается кадастровый паспорт объекта.</p>
<p>Если на объект недвижимого имущества имеется технический паспорт БКИ, полученный ранее, то такой объект, скорее всего, уже внесен в государственный кадастр недвижимости, то есть является ранее учтенным объектом, в этом случае для получения кадастрового паспорта, Вам необходимо обратиться в Кадастровую палату.</p>
<br>
<p>Срок действия кадастрового паспорта на сегодняшний день не ограничен.</p>
                    </div>
                </div>
            </div>
            <div class="show2">
                <div class="more-top-wrap">
                    <div class="more-top clearfix">
                        <img src="images/services/3img.jpg">
                        <div class="top-right">
                            <h4>Получение справки о площади</h4>
                            <div class="buttons">
                                <a class="to-know-price" href="javascript:void(0)">Узнать стоимость</a>
                                <a class="to-order-service" href="javascript:void(0)">Заказать услугу</a>
                            </div>
                        </div>
                        <p><b>Справка о площади объекта недвижимого имущества</b> отражает его фактическую площадь на момент обследования. Подготовка такой справки осуществляется по данным натурного обмера, произведенного техником на объекте работ.</p>
 <br>
 <br>
<p><b>Справка о площади содержит следующие сведения:</b></p>
<p><b>•</b>наименование объекта недвижимости;</p>
<p><b>•</b>точное местонахождение (адрес) объекта;</p>
<p><b>•</b>количество комнат и помещений;</p>
<p><b>•</b>виды и размеры площадей объекта (общая, жилая, производственная, торговая, вспомогательная  и др.);</p>
<p><b>•</b>дата последнего обследования;</p>
<p><b>•</b>наличие или отсутствие перепланировок на объекте, реконструкций, изменение статуса объекта недвижимости.</p>
<p>Как правило, справка о площади требуется для приватизации квартиры или комнаты, предоставления в органы государственной власти для участия в социальных программах связанных с улучшением жилищных условий, для предоставления в некоторые банки при заключении сделок с недвижимостью, предоставления в налоговые органы собственниками торговых помещений, а также в других случаях, когда необходимо провести текущее обследование объекта, зафиксировать отсутствие перепланировок, или отразить фактическую площадь объекта, в том числе и по результатам проведенной реконструкции или перепланировки.</p>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <ul>
                    <li data-appear-delay="800" data-appear="fade-in" data-appear-direction="bottom"><a href="javascript:void(0)"><span>Составление поэтажного<br/>плана</span></a></li><li data-appear-delay="1000" data-appear="fade-in" data-appear-direction="bottom">
                    <a href="javascript:void(0)"><span>Адресация и переадресация<br/>объектов</span></a></li><li data-appear-delay="1200" data-appear="fade-in" data-appear-direction="bottom">
                    <a href="javascript:void(0)"><span>Межевание земельных<br/>участков</span></a></li>
                </ul>
            </div>
            <div class="show3">
                <div class="more-bottom-wrap">
                    <div class="more-bottom">
                        <img src="images/services/4img.jpg">
                        <div class="top-right">
                            <h4>Составление поэтажного плана</h4>
                            <div class="buttons">
                                <a class="to-know-price" href="javascript:void(0)">Узнать стоимость</a>
                                <a class="to-order-service" href="javascript:void(0)">Заказать услугу</a>
                            </div>
                        </div>
                        <p><b>Поэтажный план</b>   – это информационно-справочный документ, который отражает фактическое состояние помещения (помещений).</p>
<br>
<p>Поэтажный план изготавливается отдельно на каждый этаж здания, либо на этаж или часть этажа, где расположено требуемое помещение.</p>
<br>
<p>Поэтажный план представляет собой чертеж этажа, на котором отражаются все присутствующие в помещении, либо во всех помещениях этажа стены, перегородки, оконные и дверные проемы, лоджии, антресоли и т.д.  Приложением к поэтажному плану является экспликация, в которой содержатся сведения о площади комнат, назначении помещений, общей и жилой площади, адрес помещения или здания, дата выдачи экспликации.</p>
<br>
<p>Поэтажный план необходим для совершения сделок: купли-продажи, аренды, ипотеки, залога, дарения, мены, для оформления наследства, перевода жилого помещения в нежилое, регистрации сделок с недвижимостью. В случае перепланировки квартиры, необходимо подготовить два поэтажных плана: один - до перепланировки, второй - после, с отмеченными на нем красными линиями незарегистрированными изменениями планировки.</p>
                    </div>
                </div>
            </div>
            <div class="show4">
                <div class="more-bottom-wrap">
                    <div class="more-bottom">
                        <img src="images/services/5img.jpg">
                        <div class="top-right">
                            <h4>Адресация и переадресация объектов</h4>
                            <div class="buttons">
                                <a class="to-know-price" href="javascript:void(0)">Узнать стоимость</a>
                                <a class="to-order-service" href="javascript:void(0)">Заказать услугу</a>
                            </div>
                        </div>
                        <p><b>Адресация объектов недвижимого имущества</b></p>
<br>
<p>Присвоение адресов осуществляется правовым актом органа местного самоуправления. На территории г. Красноярска адресация осуществляется на основании постановления администрации города Красноярска от 09.04.2010г №153.</p>
<br>
<p><b>Для осуществления адресации или переадресации объекта необходимо представить следующие документы:</b></p>
<p><b>•</b>копия документа, удостоверяющего личность заявителя (для физ. лиц), либо личность представителя физического или юридического лица;</p>
<p><b>•</b>копия свидетельства о государственной регистрации юридического лица (для юридических лиц);</p>
<p><b>•</b>копия документа, удостоверяющего права (полномочия) представителя физического или юридического лица, если с заявлением обращается представитель заявителя.</p>
                    </div>
                </div>
            </div>
            <div class="show5">
                <div class="more-bottom-wrap">
                    <div class="more-bottom">
                        <img src="images/services/6img.jpg">
                        <div class="top-right">
                            <h4>Межевание земельных участков</h4>
                            <div class="buttons">
                                <a class="to-know-price" href="javascript:void(0)">Узнать стоимость</a>
                                <a class="to-order-service" href="javascript:void(0)">Заказать услугу</a>
                            </div>
                        </div>
                        <p><b>Межевание земель</b> представляет собой комплекс работ по установлению, восстановлению и закреплению на местности границ земельного участка, определению его местоположения и площади.</p>
						<br>
<p>Правовую основу регулирования отношений, возникающих при проведении кадастровых работ, связанных с межеванием, составляют Конституция Российской Федерации, Гражданский, Земельный, Лесной, Водный, Градостроительный и Жилищный кодексы Российской Федерации, Федеральный закон № 221-ФЗ "О государственном кадастре недвижимости", другие федеральные законы и иные нормативные правовые акты Российской Федерации.</p>
<br>
<p>Межевание – это один из наиболее значительных процессов, входящих в землеустроительные и кадастровые работы, по оформлению земли. Он включает в себя работы, связанные с определением масштабов и границ земельного участка, обозначение границ участка на самой местности, осуществление планирования географического положения участка и его размеров, а также юридическое сопровождение всех документов в соответствующие инстанции.</p>
                    </div>
                </div>
            </div>
            <div class="service-foot"></div>
        </div>
    </div>
    <div class="price-list-wrap">
        <div class="price-list">
            <div data-appear-delay="800" data-appear="fade-in" data-appear-direction="left">
                <img src="images/get-price-list.png">
            </div>

            <div class="price-list-form" data-appear-delay="800" data-appear="fade-in" data-appear-direction="right">
                <form method="post" action="send.php">
                    <div class="form-text">
                        <div class="form-row">
                            <input type="text" name="name" data-placeholder="Ваше имя">
                        </div>
                        <div class="form-row">
                            <input type="text" name="phone" placeholder="Ваш телефон">
                        </div>
                    </div>
                    <input type="hidden" name="from" value="Получить прайс-лист наших услуг">
                    <input name="referer" type="hidden" value="<?=$referer?>">
                    <input name="phrase" type="hidden" value="<?=$phrase?>">
                    <input type="submit" class="send-form-button" value="Получить">
                </form>
                <div class="descr">
                    *нажимая на кнопку "Получить" вы соглашаетесь
                    с <a href="javascript:void(0)" class="condition">условиями</a> об обработке персональных данных
                </div>
            </div>
        </div>
    </div>
    <div id="certificates" class="certificates-wrap">
        <div class="certificates">
            <h2>Наши благодарственные письма</h2>
            <div class="certificates-slider">
                <ul>
                    <li>
                        <!--<div class="shadow"></div>-->
                        <a href="images/serf/10.jpg" data-lightbox="image-2">
                            <img src="images/serf/10.jpg" alt="1"/>
                        </a>
                    </li><li>
                        <!--<div class="shadow"></div>-->
                        <a href="images/serf/11.jpg" data-lightbox="image-2">
                            <img src="images/serf/11.jpg" alt="1"/>
                        </a>
                    </li><li>
                        <!--<div class="shadow"></div>-->
                        <a href="images/serf/12.jpg" data-lightbox="image-2">
                            <img src="images/serf/12.jpg" alt="1"/>
                        </a>
                    </li>
                </ul>
                <div class="controls">
                    <a href="javascript:void(0)" id="certificates-left-arrow"></a>
                    <a href="javascript:void(0)" id="certificates-right-arrow"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="clients-wrap">
        <div class="clients">
            <h2>Наши клиенты</h2>
            <div class="clients-slider">
                <ul>
                    <li>
                        <a href="#"><img src="images/clients/logo1.png"></a>
                    </li>
                    <li>
                        <a href="#"><img src="images/clients/logo2.png"></a>
                    </li>
                    <li>
                        <a href="#"><img src="images/clients/logo3.png"></a>
                    </li>
                    <li>
                        <a href="#"><img src="images/clients/logo4.png"></a>
                    </li>
                    <li>
                        <a href="#"><img src="images/clients/logo6.png"></a>
                    </li>
                </ul>
                <div class="controls">
                    <a href="javascript:void(0)" id="clients-left-arrow"></a>
                    <a href="javascript:void(0)" id="clients-right-arrow"></a>
                </div>
            </div>
        </div>
    </div>
    <div id="faq" class="faq-wrap">
        <div class="faq">
            <h2>Часто задаваемые вопросы и ответы на них</h2>
            <div class="quest">
                <div class="question">
                    <h5><span></span>Вопрос:</h5>
                    <p>Кадастровый паспорт, технический план, технический паспорт - что нужно?</p>
                </div>
                <div class="answer">
                    <h5><span></span>Ответ:</h5>
                    <p><b>Кадастровый паспорт</b> – обязательный документ для осуществления любых сделок с недвижимым имуществом, подлежащих государственной регистрации. С 01.04.2012 года при обращении в Регистрационную палату необходимо предъявить именно кадастровый паспорт объекта недвижимости (здания, строения, помещения, объекта незавершенного строительства).<span>...</span><div class="hidden"> <br><p><b>Технический план</b> – обязательный документ для осуществления кадастрового учета  и получения кадастрового паспорта на квартиры в новостройках, объекты незавершенного строительства, вновь возведенные жилые дома или нежилые здания и помещения в таких зданиях, на объекты недвижимости не учтенные ранее, а также для кадастрового учета изменений в случае раздела объекта на самостоятельные части, перепланировки квартир и нежилых помещений (а также для узаконивания), или реконструкции зданий и сооружений. Техпланы необходимы также для предоставления в суд в случае признания прав на объект. Для осуществления ввода объектов недвижимости в эксплуатацию или проведения адресации объектов также требуется технический план.</p>
 <br>
<p><b>Технический паспорт</b> – больше не является обязательным документом для регистрации сделок с недвижимым имуществом, не требуется для осуществления ввода объектов в эксплуатацию, адресации объектов, их перепланировки или реконструкции, осуществления расчета налога на недвижимое имущество.
Техпаспорт, при его наличии, на усмотрение кадастрового инженера «БКИ», может служить вспомогательным документом при подготовке технического плана.
Срок действия технического паспорта не ограничен.</div></p>
                    <a href="javascript:void(0)">Посмотреть ответ полностью...<span></span></a>
                </div>
            </div>
            <div class="quest">
                <div class="question">
                    <h5><span></span>Вопрос:</h5>
                    <p>Чем отличается технический план от технического паспорта?</p>
                </div>
                <div class="answer">
                    <h5><span></span>Ответ:</h5>
                    <p>На основании технического плана осуществляется кадастровый учет объектов недвижимости, адресация, узаконивание перепланировок и реконструкций, вносятся изменения в кадастр, а технический паспорт для этих целей не подходит...<span></p></span><div class="hidden"> <br><p>Технический план <b>здания, сооружения, объекта незавершенного строительства,</b> в отличие от технического паспорта, содержит сведения о местоположении такого объекта на местности в геодезических координатах, с точностью отображения внешнего контура здания, не превышающей ±10 см. на местности, однако в отличие от технического паспорта не содержит сведений о количестве, составе и характеристиках помещений в здании, не отображает элементов внутреннего устройства и планировки, конструктивные особенности, не описывает технические характеристики сооружений и не содержит сведений о техническом состоянии объекта.</p>
<br>
<p>Технический план <b>помещения,</b> как и технический паспорт помещения, отображает все, имеющиеся на момент выезда техника элементы планировки помещения, однако не отображает сведений о материалах строительных конструкций и проценте износа помещения.</div></p>
                    <a href="javascript:void(0)">Посмотреть ответ полностью...<span></span></a>
                </div>
            </div>
            <div class="quest">
                <div class="question">
                    <h5><span></span>Вопрос:</h5>
                    <p>Адреса офисов приема документов ФГБУ «Федеральная кадастровая палата Росреестра»</p>
                </div>
                <div class="answer">
                    <h5><span></span>Ответ:</h5>
                    <p>Самостоятельно обратиться с заявлением о государственном учете, запросить сведения государственного кадастра недвижимости, а также внести в кадастр сведения об объекте недвижимого имущества, как о ранее учтенном, в г. Красноярске можно в офисах приема документов ФГБУ «Федеральная кадастровая палата Росреестра» по Красноярскому краю по следующим адресам:<span>...</span><div class="hidden"><p><b><br>г. Красноярск, ул. Петра Подзолкова, 3</p></b>
<p>график и время работы и приема документов отдела приема ФГБУ «Федеральная кадастровая палата Росреестра» по Красноярскому краю:</p>
<p><b>•</b>Пн., Ср. -  9:00-17:00</p>
<p><b>•</b>Вт., Чт. -   9:00-20:00</p>
<p><b>•</b>Пт., Сб. -  8:00-16:00</p>
<p><b>•</b>Вс. – выходной</p>
<br>
<p><b>г. Красноярск, ул. 9 Мая, 12,</b> Тел. 8 (391) 217-18-23;</p>
<p>Предварительная запись по тел.: 8(391) 217-18-18, 8-800-200-39-12</p>
<p>график и время работы и приема документов отдела приема ФГБУ «Федеральная кадастровая палата Росреестра» по Красноярскому краю:</p>
<p><b>•</b>Пн., Ср. - 9:00-18:00</p>
<p><b>•</b>Вт., Чт. -  9:00-20:00</p>
<p><b>•</b>Пт. - 8:00-18:00</p>
<p><b>•</b>Сб. - 8:00-17:00</p>
<p><b>•</b>Вс. - выходной</p>
<br>
<p><b>г. Красноярск, ул. 52 Квартал, стр. 3</b></p>
<p>график и время работы и приема документов отдела приема ФГБУ «Федеральная кадастровая палата Росреестра» по Красноярскому краю:</p>
<p><b>•</b>Пн., Ср. -  9:00-17:00</p>
<p><b>•</b>Вт., Чт.  -  9:00-20:00</p>
<p><b>•</b>Пт., Сб. -  8:00-16:00</p>
<p><b>•</b>Вс. – выходной</p>
<br>
<p><b>г. Красноярск, ул. Попова, 8, </b>  Тел.: 8 (391) 247-55-30<p>
<p>график и время работы и приема документов отдела приема ФГБУ «Федеральная кадастровая палата Росреестра» по Красноярскому краю:</p>
<p><b>•</b>Пн., Вт. - 9.00-18.00</p>
<p><b>•</b>Вт., Чт. -  9.00-20.00</p>
<p><b>•</b>Пт. 9.00-18.00</p>
<p><b>•</b>Сб. 9.00-17.00</p>
<p><b>•</b>Вс.- выходной</p>
<br>
<p>Записаться на посещение офисов приёма-выдачи филиала ФГБУ «Федеральная кадастровая палата Росреестра» по Красноярскому краю (предварительная запись) также можно на Портале государственных услуг Росреестра https://portal.rosreestr.ru   – вкладка «Офисы и приемные», далее выбрать субъект, район, населенный пункт, далее из предложенного списка офисов выбрать необходимый вам. Далее выбрать вкладку «Предварительная запись на прием», где можно определить дату и время приема в любом из офисов приема и выдачи документов на территории Красноярского края.</p>
<br>
<p>Для записи необходимо обязательно заполнить поля:</p>
<p><b>•</b>фамилия, Имя;</p>
<p><b>•</b>адрес электронной почты (Email);</p>
<p><b>•</b>ваш контактный телефон;</p>
<p><b>•</b>цель обращения.</p></div></p>
                    <a href="javascript:void(0)">Посмотреть ответ полностью...<span></span></a>
                </div>
            </div>

        </div>
    </div>
    <div class="call-back-block-wrap">
        <div class="call-back-block">
            <h2 data-appear-delay="200" data-appear="fade-in" data-appear-direction="left">Не нашли ответа на свой вопрос?</h2>
            <p data-appear-delay="400" data-appear="fade-in" data-appear-direction="left">Заполните форму ниже<br/>
                мы ответим Вам на него в ближайшее время.</p>
            <div class="call-back-form" data-appear-delay="600" data-appear="fade-in" data-appear-direction="left">
                <form method="post" action="send.php">
                    <div class="left">
                        <div class="form-text">
                            <div class="form-row">
                                <input type="text" name="name" data-placeholder="Ваше имя">
                            </div>
                            <div class="form-row">
                                <input type="text" name="phone" placeholder="Ваш телефон">
                            </div>
                        </div>
                        <input type="submit" class="ask-question" value="Задать вопрос">
                        <div class="descr">
                            *нажимая на кнопку "Задать вопрос" вы соглашаететсь<br/>
                            с <a href="javascript:void(0)" class="condition">условиями</a> об обработки персональных данных
                        </div>
                    </div>
                    <div class="right">
                        <textarea name="question" placeholder="Ваш вопрос..."></textarea>
                        <input type="hidden" name="from" value="Задать вопрос">
                        <input name="referer" type="hidden" value="<?=$referer?>">
                        <input name="phrase" type="hidden" value="<?=$phrase?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="certificates" class="certificates-wrap">
        <div class="certificates">
            <h2>Наши грамоты и дипломы</h2>
            <div class="certificates-slider">
                <ul>
                    <li>
                        <!--<div class="shadow"></div>-->
                        <a href="images/serf/1.jpg" data-lightbox="image-1">
                            <img src="images/serf/1.jpg" alt="1"/>
                        </a>
                    </li><li>
                        <!--<div class="shadow"></div>-->
                        <a href="images/serf/2.jpg" data-lightbox="image-1">
                            <img src="images/serf/2.jpg" alt="1"/>
                        </a>
                    </li><li>
                        <!--<div class="shadow"></div>-->
                        <a href="images/serf/3.jpg" data-lightbox="image-1">
                            <img src="images/serf/3.jpg" alt="1"/>
                        </a>
                    </li><li>
                        <!--<div class="shadow"></div>-->
                        <a href="images/serf/4.jpg" data-lightbox="image-1">
                            <img src="images/serf/4.jpg" alt="1"/>
                        </a>
                    </li>
					<li>
                        <!--<div class="shadow"></div>-->
                        <a href="images/serf/5.jpg" data-lightbox="image-1">
                            <img src="images/serf/5.jpg" alt="1"/>
                        </a>
                    </li>
					<li>
                        <!--<div class="shadow"></div>-->
                        <a href="images/serf/6.jpg" data-lightbox="image-1">
                            <img src="images/serf/6.jpg" alt="1"/>
                        </a>
                    </li>
					<li>
                        <!--<div class="shadow"></div>-->
                        <a href="images/serf/7.jpg" data-lightbox="image-1">
                            <img src="images/serf/7.jpg" alt="1"/>
                        </a>
                    </li>
					<li>
                        <!--<div class="shadow"></div>-->
                        <a href="images/serf/8.jpg" data-lightbox="image-1">
                            <img src="images/serf/8.jpg" alt="1"/>
                        </a>
                    </li>
					<li>
                        <!--<div class="shadow"></div>-->
                        <a href="images/serf/9.jpg" data-lightbox="image-1">
                            <img src="images/serf/9.jpg" alt="1"/>
                        </a>
                    </li>
                </ul>
                <div class="controls">
                    <a href="javascript:void(0)" id="certificates-left-arrow"></a>
                    <a href="javascript:void(0)" id="certificates-right-arrow"></a>
                </div>
            </div>
        </div>
    </div>
    <div id="myMap" class="map-wrap">
        <div class="map-wrapper">
            <div class="map-text">
                <img src="images/logo-small.png">
                <P><strong>Адрес:</strong><br/>ул. Шахтеров 18а,<br>2 этаж, 7 кабинет</p>
                <P><strong>Телефон:</strong><br/>214-17-32, сот. 8-953-588-67-12</p>
                <a href="javascript:void(0)" class="call-back order-call">заказать звонок</a>
				<br>
				<p><strong>Сайт разработан: <a href="http://costoso.bz/sellsite.php" target="_blank">COSTOSO</a></p>
            </div>
        </div>
    </div>
    <div class="popup-form call-back-popup">
        <div class="popup-wrap-form">
            <a href="javascript:void(0)" class="close"></a>
            <div class="popup-area">
                <div class="popup-block">
                    <h2>
                        Заказать звонок
                    </h2>
                    <h4>
                        заполните форму ниже и мы<br/>
                        перезвоним Вам в ближайшее время
                    </h4>
                    <form method="post" action="send.php">
                        <div class="form-text">
                            <div class="form-row">
                                <input class="name" type="text" name="name" data-placeholder="Ваше имя">
                            </div>
                            <div class="form-row">
                                <input class="phone" type="text" name="phone" placeholder="Ваш телефон">
                            </div>
                            <!--<input type="email" name="email" data-placeholder="Введите e-mail">-->
                            <input name="referer" type="hidden" value="<?=$referer?>">
                            <input name="phrase" type="hidden" value="<?=$phrase?>">
                            <input type="hidden" name="from" value="Всплывающее окно. Заказ обратного звонка.">
                        </div>
                        <input type="submit" class="send-form-button" value="Заказать звонок">
                    </form>
                    <div class="warning"><img src="images/lock.png"></div><p>Нажимая на кнопку “Заказать звонок”,
                        Вы соглашаетесь с <a href="javascript:void(0)" class="condition">условиями</a> об обработке
                        персональных данных</p>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-form price-popup">
        <div class="popup-wrap-form">
            <a href="javascript:void(0)" class="close"></a>
            <div class="popup-area">
                <div class="popup-block">
                    <h2>
                        Узнать стоимость
                    </h2>
                    <h4>
                        заполните форму ниже и мы<br/>
                        перезвоним Вам в ближайшее время
                    </h4>
                    <form method="post" action="send.php">
                        <div class="form-text">
                            <div class="form-row">
                                <input class="name" type="text" name="name" data-placeholder="Ваше имя">
                            </div>
                            <div class="form-row">
                                <input class="phone" type="text" name="phone" placeholder="Ваш телефон">
                            </div>
                            <!--<input type="email" name="email" data-placeholder="Введите e-mail">-->
                            <input name="referer" type="hidden" value="<?=$referer?>">
                            <input name="phrase" type="hidden" value="<?=$phrase?>">
                            <input type="hidden" name="from" value="Всплывающее окно. Узнать стоимость услуги.">
                            <input type="hidden" name="service" value="">
                        </div>
                        <input type="submit" class="send-form-button" value="Узнать стоимость">
                    </form>
                    <div class="warning"><img src="images/lock.png"></div><p>Нажимая на кнопку “Узнать стоимость”,
                    Вы соглашаетесь с <a href="javascript:void(0)" class="condition">условиями</a> об обработке
                    персональных данных</p>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-form popup-order">
        <div class="popup-wrap-form popup-wrap-order">
            <a href="javascript:void(0)" class="close"></a>
            <div class="popup-area">
                <div class="popup-block">
                    <h2>
                        Заказать услугу
                    </h2>
                    <h4>
                        заполните форму ниже и мы<br/>
                        перезвоним Вам в ближайшее время
                    </h4>
                    <form enctype="multipart/form-data"  method="post" action="send.php">
                        <div class="form-text">
                            <div class="form-row">
                                <input class="name" type="text" name="name" data-placeholder="Ваше имя">
                            </div>
                            <div class="form-row">
                                <input class="phone" type="text" name="phone" placeholder="Ваш телефон">
                            </div>
                            <a id="file-button" href="javascript:void(0)"></a>
                            <div id="upl-files" class="add-file"></div>
                            <div id="file-inputs" class="form-row">
                                <input class="file" type="file" name="file">
                            </div>
                            <!--<input type="email" name="email" data-placeholder="Введите e-mail">-->
                            <input name="referer" type="hidden" value="<?=$referer?>">
                            <input name="phrase" type="hidden" value="<?=$phrase?>">
                            <input type="hidden" name="from" value="Всплывающее окно. Заказать услугу.">
                            <input type="hidden" name="service" value="">
                        </div>
                        <input type="submit" class="send-form-button" value="Заказать услугу">
                    </form>
                    <div class="warning"><img src="images/lock.png"></div><p>Нажимая на кнопку “Заказать услугу”,
                    Вы соглашаетесь с <a href="javascript:void(0)" class="condition">условиями</a> об обработке
                    персональных данных</p>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-form-thank">
        <div class="popup-wrap-thank">
            <a href="javascript:void(0)" class="close"></a>
            <div class="popup-area-thank">
                <div class="thank">
                    Спасибо за заявку!<br>
                    <span>Мы свяжемся с вами в ближайшее время.</span>
                    <a href="javascript:void(0)" class="thank-ok">ok</a>
                </div>
            </div>
        </div>
    </div>
    <div class="popup-conf">
        <div class="popup-wrap-conf">
            <a href="javascript:void(0)" class="close"></a>
            <div class="popup-area-conf">
                <div class="conf">
                    <h2>
                        Политика конфиденциальности
                    </h2>
                    <p>«Настоящим Пользователь услуг сайта 24bki.ru выражает согласие с нижеследующими положениями по обработке своих персональных данных:</p>
                    <p>1. Под обработкой персональных данных Пользователя (субъекта персональных данных) понимаются действия (операции) 24bki.ru по сбору, систематизации, накоплению, хранению, уточнению (обновление, изменение), использованию, уничтожению персональных данных.</p>
                    <p>2. Целью предоставления Пользователем персональных данных и последующей обработки их 24bki.ru является получение услуг в виде: - заказать обратный звонок; - заказать выезд замерщика; - пригласить дизайнера; - получить примеры работ.</p>
                    <p>3. Настоящее согласие Пользователя признается исполненным в простой письменной форме, на обработку следующих персональных данных: фамилии, имени, отчества; номерах телефонов, адреса электронной почты.</p>
                    <p>4. Стороны признают общедоступными персональными данными следующие данные: фамилия, имя отчество</p>
                    <p>5. Пользователь, предоставляет 24bki.ru право осуществлять следующие действия (операции) с персональными данными: сбор и накопление; хранение ; использование; уничтожение; передача по требованию суда, в т.ч., третьим лицам, с соблюдением мер, обеспечивающих защиту персональных данных от несанкционированного доступа.</p>
                    <p>6. Отзыв согласия на обработку персональных данных может быть осуществлен путем направления Пользователем соответствующего распоряжения в простой письменной форме на адрес электронной почты (E-mail). E-mail: ooo-bki@yandex.ru.</p>
                    <a href="javascript:void(0)" class="accept">Принимаю</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>