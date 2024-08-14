<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог новостроек в Орле</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.numeric.js"></script>
    <link rel="icon" href="favicon.ico">
    <script src="https://unpkg.com/imask"></script>
</head>
<body>
<?php 
// require_once($_SERVER[DOCUMENT_ROOT]."/cfg/core.php");
require('db.php');
// $query = "INSERT zayavki(phone, sendAppart, sendArea, sendTime, sendOtdelka, sendPrice) VALUES (1, 2, 3, 4, 5, 6);";
// print_r($conn);
// $sql =  "INSERT zayavki(phone, sendAppart, sendArea, sendTime, sendOtdelka, sendPrice) VALUES (1, 2, 3, 4, 5, 6);";
// mysqli_query($conn, $sql)
// $query = "select * from zayavki";
//     if (mysqli_query($conn, $sql)) {
// 		echo "<center><h3>New record created successfully!<br/>Click here to <a href='login.php'>Login</a></h3></center>";
// 	} else {
// 		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// 	}
// phpinfo();
?>
    <section class="main">
        <div class="container step-1" >
            <h1>Новостройки в&nbsp;Орле</h1>
            <div class="descript">
                <p>Квартиры от застройщиков без комиссий</p>
                <p>Компании проверенные временем</p>
            </div>
            <form class="opros-container">
                <div>
                    <div class="appartament">
                        <button type="button">Студия</button>
                        <button type="button">1</button>
                        <button type="button">2</button>
                        <button type="button">3</button>
                    </div>
                    <div class="price">
                        <div>
                            <input type="text" placeholder="Цена от" id="priceFrom" name="priceFrom" class="numeric" >
                            <img src="img/delite.png" alt="" class="delFrom">
                        </div>
                        <span style="padding-right: 11px;">-</span>
                        <div>
                            <input type="text" id="priceTo" name="priceTo" placeholder="до" class="numeric" >
                            <img src="img/delite.png" alt=""  class="delTo" >
                        </div>
                        <span> ₽</span>
                    </div>
                    <div class="area">
                        <div class="title">
                           <span> Район</span>
                            <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.46824 7.33309L11.8083 1.99294C11.9319 1.86943 12 1.70455 12 1.52875C12 1.35294 11.9319 1.18807 11.8083 1.06456L11.4151 0.671291C11.1589 0.41539 10.7425 0.41539 10.4867 0.671291L6.00249 5.15555L1.51326 0.666315C1.38965 0.542803 1.22487 0.474609 1.04916 0.474609C0.873262 0.474609 0.708483 0.542803 0.584776 0.666315L0.191706 1.05958C0.0680976 1.18319 9.59367e-07 1.34797 9.51682e-07 1.52377C9.43998e-07 1.69957 0.0680976 1.86445 0.191706 1.98796L5.53664 7.33309C5.66064 7.45689 5.8262 7.52489 6.0022 7.5245C6.17888 7.52489 6.34434 7.45689 6.46824 7.33309Z" fill="#CDCDCD"/>
                            </svg>
                        </div>
                        <div class="option-list">
                            <div class="option-item">Заводской</div>
                            <div class="option-item">Советский</div>
                            <div class="option-item">Северный</div>
                        </div>
                    </div>
                    <div class="time">
                        <div class="title">
                            <span>Срок сдачи</span>
                            <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M6.46824 7.33309L11.8083 1.99294C11.9319 1.86943 12 1.70455 12 1.52875C12 1.35294 11.9319 1.18807 11.8083 1.06456L11.4151 0.671291C11.1589 0.41539 10.7425 0.41539 10.4867 0.671291L6.00249 5.15555L1.51326 0.666315C1.38965 0.542803 1.22487 0.474609 1.04916 0.474609C0.873262 0.474609 0.708483 0.542803 0.584776 0.666315L0.191706 1.05958C0.0680976 1.18319 9.59367e-07 1.34797 9.51682e-07 1.52377C9.43998e-07 1.69957 0.0680976 1.86445 0.191706 1.98796L5.53664 7.33309C5.66064 7.45689 5.8262 7.52489 6.0022 7.5245C6.17888 7.52489 6.34434 7.45689 6.46824 7.33309Z" fill="#CDCDCD"/>
                            </svg>
                        </div>
                        <div class="option-list">
                            <div class="option-item">Уже сдан</div>
                            <div class="option-item">1-2 квартал 2024 года</div>
                            <div class="option-item">3-4 квартал 2024 года</div>
                            <div class="option-item">1-4 квартал 2025 года</div>
                        </div>
                    </div>
                    <div class="otdelka">
                        <input type="checkbox" id="otdelka" name="otdelka">
                        <label for="otdelka">Квартира с отделкой</label>
                    </div>
                </div>
                <button type="submit">Узнать результат</button>
            </form>
        </div>


        <div class="container step-2">
            <div class="success-form">
                <p class="back">назад</p>
                <p class="success-text">Готово!<br>Есть подходящие варианты</p>
                <p class="success-text-descr">Оставьте свои контактные данные для получения результата</p>
                <form  action="sender.php" method="post"
                enctype="multipart/form-data" id="form" onsubmit="submitForm(event)">
                    <input type="tel" id="phone" name="phone" placeholder="Телефон *" required>
                    <div class="d-none">
                        <input type="text" id="sendAppart" name="sendAppart"><input type="text" id="sendArea"  name="sendArea"><input  name="sendTime" type="text" id="sendTime"><input  name="sendOtdelka" type="text" id="sendOtdelka"><input  name="sendPrice" type="text" id="sendPrice">
                    </div>
                    <button type="submit">Узнать результат</button> 
                    <div class="politic">
                        <input type="checkbox" name="politic" id="politic" checked required>
                        <label for="politic"><p>Соглашаюсь с условиями <a href="https://microdistrict.ru/privacy">  Политики конфиденциальности</a></p></label>
                    </div>
                </form>

                <p class="no-reclame">Никаких рекламных звонков и сообщений</p>
            </div>
        </div>

        <div class="container step-3">
            <div class="success-result">
                <div class="success-result-name">Спасибо!</div>
                <div class="success-result-descr">Наш менеджер свяжется с вами и озвучит подходящие варианты. Если вас что-то заинтересует, он нарпавит вам информацию  в мессенджер или на почту</div>
            </div>
        </div>
    </section>

    <script src="js/script.js"></script>
</body>
</html>