<?php

    $mails = array('costoso.bz@yandex.ru', 'ooo-bki@yandex.ru');
    define('MAIL_SUBJECT', 'Новая заявка с сайта БКИ');

    $headers   = array();
    $headers[] = "MIME-Version: 1.0";
    $headers[] = "Content-type: text/plain; charset=utf-8";
    $headers[] = "X-Mailer: PHP/".phpversion();



    (isset($_POST['obj_address'])) ? $obj_address = 'Адрес объекта: ' . htmlspecialchars($_POST['obj_address']) . "\n": $obj_address = '';
    (isset($_POST['obj_area'])) ? $obj_area = 'Площадь объекта в кв.м.: ' . htmlspecialchars($_POST['obj_area']) . "\n": $obj_area = '';
    (isset($_POST['obj_pay'])) ? $obj_pay = 'Удобный способ оплаты: ' . htmlspecialchars($_POST['obj_pay']) . "\n": $obj_pay = '';
    (isset($_POST['obj_delivery'])) ? $obj_delivery = 'Удобный способ получения документов: ' . htmlspecialchars($_POST['obj_delivery']) . "\n": $obj_delivery = '';
    (isset($_POST['del_address'])) ? $del_address = 'Адрес доставки: ' . htmlspecialchars($_POST['del_address']) . "\n": $del_address = '';
    (isset($_POST['del_address_poch'])) ? $del_address_poch = 'Адрес почтовой доставки: ' . htmlspecialchars($_POST['del_address_poch']) . "\n": $del_address_poch = '';
    (isset($_POST['obj_time'])) ? $obj_time = 'Желаемый срок выполнения работ: ' . htmlspecialchars($_POST['obj_time']) . "\n": $obj_time = '';
    (isset($_POST['obj_owner'])) ? $obj_owner = 'Собственник: ' . htmlspecialchars($_POST['obj_owner']) . "\n": $obj_owner = '';


    if($_POST['obj_vl_name'] != ''){
        $obj_vl_name = 'ФИО: ' . htmlspecialchars($_POST['obj_vl_name']) . "\n";
    }else{
        $obj_vl_name = '';
    }

    if($_POST['obj_vl_birth'] != ''){
        $obj_vl_birth = 'Дата рождения: ' . htmlspecialchars($_POST['obj_vl_birth']) . "\n";
    }else{
        $obj_vl_birth = '';
    }

    if($_POST['obj_vl_pass_numb'] != ''){
        $obj_vl_pass_numb = 'Паспорт (серия, номер): ' . htmlspecialchars($_POST['obj_vl_pass_numb']) . "\n";
    }else{
        $obj_vl_pass_numb = '';
    }

    if($_POST['obj_vl_pass_date'] != ''){
        $obj_vl_pass_date = 'Дата выдачи паспорта: ' . htmlspecialchars($_POST['obj_vl_pass_date']) . "\n";
    }else{
        $obj_vl_pass_date = '';
    }

    if($_POST['obj_vl_pass_vud'] != ''){
        $obj_vl_pass_vud = 'Кем выдан паспорт: ' . htmlspecialchars($_POST['obj_vl_pass_vud']) . "\n";
    }else{
        $obj_vl_pass_vud = '';
    }

    if($_POST['obj_vl_address'] != ''){
        $obj_vl_address = 'Адрес проживания: ' . htmlspecialchars($_POST['obj_vl_address']) . "\n";
    }else{
        $obj_vl_address = '';
    }

    if($_POST['obj_vl_phone'] != ''){
        $obj_vl_phone = 'Телефон: ' . htmlspecialchars($_POST['obj_vl_phone']) . "\n";
    }else{
        $obj_vl_phone = '';
    }

    if($_POST['obj_vl_email'] != ''){
        $obj_vl_email = 'Электронная почта: ' . htmlspecialchars($_POST['obj_vl_email']) . "\n";
    }else{
        $obj_vl_email = '';
    }

    if($_POST['obj_vl_ur_date'] != ''){
        $obj_vl_ur_date = 'Дата регистрации юридического лица: ' . htmlspecialchars($_POST['obj_vl_ur_date']) . "\n";
    }else{
        $obj_vl_ur_date = '';
    }

    if($_POST['obj_vl_ur_name'] != ''){
        $obj_vl_ur_name = 'Название юр.лица: ' . htmlspecialchars($_POST['obj_vl_ur_name']) . "\n";
    }else{
        $obj_vl_ur_name = '';
    }

    if($_POST['obj_vl_ur_form'] != ''){
        $obj_vl_ur_form = 'Форма собственности: ' . htmlspecialchars($_POST['obj_vl_ur_form']) . "\n";
    }else{
        $obj_vl_ur_form = '';
    }

    if($_POST['obj_vl_ur_address'] != ''){
        $obj_vl_ur_address = 'Юридический адрес: ' . htmlspecialchars($_POST['obj_vl_ur_address']) . "\n";
    }else{
        $obj_vl_ur_address = '';
    }

    if($_POST['obj_vl_ur_post'] != ''){
        $obj_vl_ur_post = 'Почтовый адрес: ' . htmlspecialchars($_POST['obj_vl_ur_post']) . "\n";
    }else{
        $obj_vl_ur_post = '';
    }

    if($_POST['obj_vl_ur_ogrn'] != ''){
        $obj_vl_ur_ogrn = 'ОГРН: ' . htmlspecialchars($_POST['obj_vl_ur_ogrn']) . "\n";
    }else{
        $obj_vl_ur_ogrn = '';
    }

    if($_POST['obj_vl_ur_inn'] != ''){
        $obj_vl_ur_inn = 'ИНН: ' . htmlspecialchars($_POST['obj_vl_ur_inn']) . "\n";
    }else{
        $obj_vl_ur_inn = '';
    }

    if($_POST['obj_vl_ur_kpp'] != ''){
        $obj_vl_ur_kpp = 'КПП: ' . htmlspecialchars($_POST['obj_vl_ur_kpp']) . "\n";
    }else{
        $obj_vl_ur_kpp = '';
    }

    if($_POST['obj_vl_ur_r_sch'] != ''){
        $obj_vl_ur_r_sch = 'Р/с: ' . htmlspecialchars($_POST['obj_vl_ur_r_sch']) . "\n";
    }else{
        $obj_vl_ur_r_sch = '';
    }

    if($_POST['obj_vl_ur_bank'] != ''){
        $obj_vl_ur_bank = 'Банк: ' . htmlspecialchars($_POST['obj_vl_ur_bank']) . "\n";
    }else{
        $obj_vl_ur_bank = '';
    }

    if($_POST['obj_vl_ur_k_sch'] != ''){
        $obj_vl_ur_k_sch = 'К/с: ' . htmlspecialchars($_POST['obj_vl_ur_k_sch']) . "\n";
    }else{
        $obj_vl_ur_k_sch = '';
    }

    if($_POST['obj_vl_ur_k_bank_buk'] != ''){
        $obj_vl_ur_k_bank_buk = 'БИК: ' . htmlspecialchars($_POST['obj_vl_ur_k_bank_buk']) . "\n";
    }else{
        $obj_vl_ur_k_bank_buk = '';
    }

    if($_POST['obj_vl_ur_ruk_pos'] != ''){
        $obj_vl_ur_ruk_pos = 'Должность руководителя: ' . htmlspecialchars($_POST['obj_vl_ur_ruk_pos']) . "\n";
    }else{
        $obj_vl_ur_ruk_pos = '';
    }

    if($_POST['obj_vl_ur_ruk_fio'] != ''){
        $obj_vl_ur_ruk_fio = 'ФИО руководителя: ' . htmlspecialchars($_POST['obj_vl_ur_ruk_fio']) . "\n";
    }else{
        $obj_vl_ur_ruk_fio = '';
    }

    if($_POST['obj_vl_ur_osn'] != ''){
        $obj_vl_ur_osn = 'На основании чего действует: ' . htmlspecialchars($_POST['obj_vl_ur_osn']) . "\n";
    }else{
        $obj_vl_ur_osn = '';
    }

    if($_POST['obj_vl_ur_kont'] != ''){
        $obj_vl_ur_kont = 'Контактное лицо (ФИО): ' . htmlspecialchars($_POST['obj_vl_ur_kont']) . "\n";
    }else{
        $obj_vl_ur_kont = '';
    }

    if($_POST['obj_vl_ur_phone'] != ''){
        $obj_vl_ur_phone = 'Телефон: ' . htmlspecialchars($_POST['obj_vl_ur_phone']) . "\n";
    }else{
        $obj_vl_ur_phone = '';
    }

    if($_POST['obj_vl_ur_email'] != ''){
        $obj_vl_ur_email = 'Электронная почта: ' . htmlspecialchars($_POST['obj_vl_ur_email']) . "\n";
    }else{
        $obj_vl_ur_email = '';
    }

    if($_POST['obj_plan'] != ''){
        $obj_plan = 'Наличие перепланировок: ' . htmlspecialchars($_POST['obj_plan']) . "\n";
    }else{
        $obj_plan = '';
    }

    if($_POST['obj_floor'] != ''){
        $obj_floor = 'Этаж: ' . htmlspecialchars($_POST['obj_floor']) . "\n";
    }else{
        $obj_floor = '';
    }

    if($_POST['obj_kad_uch'] != ''){
        $obj_kad_uch = 'Кадастровый учет учет дома/здания/сооружения осуществлен: ' . htmlspecialchars($_POST['obj_kad_uch']) . "\n";
    }else{
        $obj_kad_uch = '';
    }

    if($_POST['obj_teh_kom'] != ''){
        $obj_teh_kom = 'Техкомната: ' . htmlspecialchars($_POST['obj_teh_kom']) . "\n";
    }else{
        $obj_teh_kom = '';
    }

    if($_POST['obj_podval'] != ''){
        $obj_podval = 'Подвал: ' . htmlspecialchars($_POST['obj_podval']) . "\n";
    }else{
        $obj_podval = '';
    }

    if($_POST['obj_etaz'] != ''){
        $obj_etaz = 'Этажность гаража: ' . htmlspecialchars($_POST['obj_etaz']) . "\n";
    }else{
        $obj_etaz = '';
    }

    if($_POST['obj_zav'] != ''){
        $obj_zav = 'Объект незавершенного строительства: Да' . "\n";
    }else{
        $obj_zav = '';
    }

    if($_POST['obj_doc_prep'] != ''){
        $obj_doc_prep = 'Документы готовятся для суда или ввода в эксплуатацию: Да' . "\n";
    }else{
        $obj_doc_prep = '';
    }

    if($_POST['obj_in_dom'] != ''){
        $obj_in_dom = 'В многоэтажном жилом доме/в индивидуальном жилом доме: ' . htmlspecialchars($_POST['obj_in_dom']) . "\n";
    }else{
        $obj_in_dom = '';
    }

    if($_POST['obj_new'] != ''){
        $obj_new = 'Вторичка/новостройка: ' . htmlspecialchars($_POST['obj_new']) . "\n";
    }else{
        $obj_new = '';
    }

    if($_POST['obj_etaz_vvod'] != ''){
        $obj_etaz_vvod = 'Этажность: ' . htmlspecialchars($_POST['obj_etaz_vvod']) . "\n";
    }else{
        $obj_etaz_vvod= '';
    }

    if($_POST['obj_kad_numb'] != ''){
        $obj_kad_numb = 'Кадастровый номер земельного участка: ' . htmlspecialchars($_POST['obj_kad_numb']) . "\n";
    }else{
        $obj_kad_numb= '';
    }

    if($_POST['kad_numb_vvod'] != ''){
        $kad_numb_vvod = 'Кадастровый номер земельного участка: ' . htmlspecialchars($_POST['kad_numb_vvod']) . "\n";
    }else{
        $kad_numb_vvod= '';
    }

    if($_POST['obj_od_mn'] != ''){
        $obj_od_mn = 'Одноквартирный/многоквартирный: ' . htmlspecialchars($_POST['obj_od_mn']) . "\n";
    }else{
        $obj_od_mn= '';
    }

    if($_POST['obj_mn_uchet'] != ''){
        $obj_mn_uchet = 'Требуется ли осуществление кадастрового учета квартир: ' . htmlspecialchars($_POST['obj_mn_uchet']) . "\n";
    }else{
        $obj_mn_uchet= '';
    }

    if($_POST['obj_in_obm'] != ''){
        $obj_in_obm = 'Произвести внутренние обмеры: ' . htmlspecialchars($_POST['obj_in_obm']) . "\n";
    }else{
        $obj_in_obm= '';
    }

    if($_POST['obj_kad_uch'] != ''){
        $obj_kad_uch = 'Тип объекта: ' . htmlspecialchars($_POST['obj_kad_uch']) . "\n";
    }else{
        $obj_kad_uch= '';
    }

    if($_POST['obj_name_service'] != ''){
        $obj_name_service = 'Требуемый вид работ: ' . htmlspecialchars($_POST['obj_name_service']) . "\n";
    }else{
        $obj_name_service= '';
    }

    if($_POST['obj_name_obj'] != ''){
        $obj_name_obj = 'Укажите наименование объекта: ' . htmlspecialchars($_POST['obj_name_obj']) . "\n";
    }else{
        $obj_name_obj= '';
    }

    if($_POST['obj_name_obj_add'] != ''){
        $obj_name_obj_add = 'Наименование объекта: ' . htmlspecialchars($_POST['obj_name_obj_add']) . "\n";
    }else{
        $obj_name_obj_add= '';
    }

    if($_POST['cause_change'] != ''){
        $cause_change = 'Причина изменения адреса объекта: ' . htmlspecialchars($_POST['cause_change']) . "\n";
    }else{
        $cause_change= '';
    }

    if($_POST['cause_anul'] != ''){
        $cause_anul = 'Причина аннулирования адреса объекта: ' . htmlspecialchars($_POST['cause_anul']) . "\n";
    }else{
        $cause_anul= '';
    }


    $result = true;

    foreach ($mails as $val) {
        if (!mail($val, MAIL_SUBJECT, $obj_address .
            $obj_area . $obj_pay . $del_address . $obj_time . $obj_owner .$obj_vl_name . $obj_vl_birth .
            $obj_vl_pass_numb . $obj_vl_pass_date . $obj_vl_pass_vud . $obj_vl_address . $obj_vl_phone .
            $obj_vl_email . $obj_vl_ur_date . $obj_vl_ur_name . $obj_vl_ur_address . $obj_vl_ur_post .
            $obj_vl_ur_ogrn . $obj_vl_ur_inn . $obj_vl_ur_kpp . $obj_vl_ur_r_sch . $obj_vl_ur_bank . $obj_vl_ur_k_sch .
            $obj_vl_ur_k_bank_buk . $obj_vl_ur_ruk_pos . $obj_vl_ur_ruk_fio . $obj_vl_ur_phone . $obj_vl_ur_email .
            $obj_plan . $obj_floor . $obj_kad_uch . $obj_teh_kom . $obj_podval . $obj_etaz . $obj_zav . $obj_doc_prep . $obj_in_dom .
            $obj_new . $obj_etaz_vvod . $obj_kad_numb . $kad_numb_vvod . $obj_od_mn . $obj_mn_uchet . $obj_in_obm . $obj_kad_uch . $obj_name_service .
            $obj_name_obj . $obj_name_obj_add . $cause_change . $cause_anul, implode("\r\n", $headers))) {
            $result = false;
            break;
        }
    }

    if ($result) {
        echo 'OK';
    }
