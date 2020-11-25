<?php

// Соединяемся с базой данных
$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if( !$db ) {
    die("Нарушена связь с базой данных");
}

// Выполнение запроса в базу данных
function db_query( $query ) {
    global $db;
    return mysqli_query( $db, $query );
}

// Извлечить указанную строку запись из базы данных
function db_fetch_row( $query, $position = -1 ) {
    if (strpos($query,"show fields")===false && strpos($query," limit ")===false) {
        $query .= " limit 1";
    }

    $result = mysqli_fetch_row(db_query($query));

    if( $position < 0 ) {
        return $result;
    }

    return $result[$position];
}

// Получение строчки в виде ассоциативного массива из базы данных
function db_fetch_assoc($query) {
    if (strpos($query,"show fields")===false && strpos($query," limit ")===false) {
        $query .= " limit 1";
    }

    return mysqli_fetch_assoc(db_query($query));
}

// Иззвлекает из базы данных массив строк
function db_fetch_array($query) {
    $result = db_query($query);
    $rows = [];

    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }

    return $rows;
}

// Считает число строк в запросе
function db_num_rows($sql) {
    return mysqli_num_rows(db_query($sql));
}

// Экранирует спец. символы в запросе
function db_escape_string($in) {
    global $db;
    return mysqli_real_escape_string($db, $in);
}

// Возвращает последнюю ошибку mysql
function db_error() {
    global $db;
    return mysqli_error($db);
}

// Возвращает вставленный id из последнего запроса
function db_insert_id() {
    global $db;
    return mysqli_insert_id($db);
}

// Возвращает указанную строку и поле после запроса mysql
function db_result($result, $number, $field=0) {
    mysqli_data_seek($result, $number);
    $row = mysqli_fetch_array($result);
    return $row[$field];
}

// Закрывает соединение с базой данных
function db_close() {
    global $db;
    mysqli_close($db);
}

// Число затронутых запросом строк
function db_affected_rows() {
    global $db;
    return mysqli_affected_rows($db);
}

function mqfa1($sql, $pos = 0) {
    return db_fetch_row($sql, $pos);
}

function mqfa($sql) {
    return db_fetch_assoc($sql);
}

function mqfaa($sql) {
    return db_fetch_array($sql);
}

function mqfr($sql) {
    return db_fetch_row($sql);
}

function mq($sql) {
    return db_query($sql);
}

function mnr($sql) {
    return db_num_rows($sql);
}