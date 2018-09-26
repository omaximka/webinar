<?

$url = $_GET['reg'];

if ( empty($url) ) { header('Location: /brokerige/'); }

?>
<!DOCTYPE html>
<html lang="ru">
<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="keywords" content="Онлайн обучение, бизнес школа, брокеридж">
    <meta name="description" content="Онлайн обучение, бизнес школа, брокеридж">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="format-detection" content="telephone=no">

    <title>THANK YOU</title>

    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

    <link href="style/bootstrap/bootstrap.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="import-style.css">
    <link rel="stylesheet" type="text/css" href="style/media/media-screen.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="scripts/jquery-3.3.1.js"></script>

    <script src="scripts/media/jquery.smoothscroll.js"></script>

</head>

<body>

<div class="full-width v-preloader-container"><div class="thank-text">Спасибо</div></div>

<section>

    <div class="full-width thankyou-container">

        <div class="t-container">
            <div class="t-cell">



                <div class="full-width thank-content">

                    <div class="full-width top-text">
                        <p>Благодарим Вас за регистрацию на бесплатном вебинаре «Как зарабатывать от 300 000 рублей на торговой недвижимости без инвестиций»</p>
                        <p>Письмо с Вашим бонусом уже направленно на Вашу почту, оно придет в течении 5 минут.</p>
                    </div>

                    <div class="full-width middle-content">

                        <div class="video-block">
                            <iframe width="560" height="315" src="https://www.youtube.com/embed/Jg6NOTpfPFY?rel=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>

                        <div class="video-r-block">

                            <div class="full-width rs-container">

                                <div class="full-width title-rasp">
                                    Расписание
                                </div>

                                <div class="full-width rs-item">
                                    <div class="rs-item-icon">
                                        <img src="images/content/rasp.png" alt="" draggable="false">
                                    </div>
                                    <div class="rs-name">
                                        Дата 10 октября 19.00(мск)
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <div class="full-width title-speaker">
                                    Спикер
                                </div>

                                <div class="full-width rs-item">
                                    <div class="rs-item-icon">
                                        <img src="images/content/speaker.png" alt="" draggable="false">
                                    </div>
                                    <div class="rs-name">
                                        Иван Чернышов
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="full-width content-phone">

                        <div class="cp-block">

                            <form class="thank-form" action="callback.php" method="post">

                                <div class="full-width item-phone">
                                    <input type="tel" placeholder="Телефон" name="phone" class="full-width it-in-phone">
                                </div>

                                <div class="full-width btn-phone-container">
                                    <button class="btn-phone transit-300">Отправить</button>
                                </div>

                            </form>

                        </div>

                    </div>

                    <div class="full-width bottom-text">
                        <p>Хотите Смс напоминание, чтобы точно не забыть о мастер - классе?</p>
                        <p>Оставьте номер телефона, мы пришлем Вам СМС - уведомление с ссылкой за 5 минут до начала.</p>
                    </div>

                </div>



            </div>
        </div>

    </div>

</section>

<div class="full-wh goodwin transit-600">
    <div class="goodwin-block">
        <div class="goodwin-cell">
            <div class="max-width" style="font-size: 18px;">
                Мы пришлем Вам СМС уведомление с ссылкой за 5 минут до начала!
            </div>
            <div class="full-width" style="margin-top: 30px;">
                <div class="btn btn-primary goodwin-close">Хорошо</div>
            </div>
        </div>
    </div>
</div>

<!-- js-form -->
<script src="scripts/js-form/jquery.form.min.js"></script>
<script src="scripts/js-form/jquery.maskedinput.js"></script>
<script src="scripts/js-form/sender.js"></script>
<!--/js-form/-->

<script src="scripts/bootstrap/bootstrap.js"></script>

<script src="scripts/config.js"></script>

</body>
</html>