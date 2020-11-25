<?php

// Соединяемся с базой данных
$db = mysqli_connect($con_adr, $con_use, $con_pas, $con_bd);

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

function db_num_rows($sql) {
    return mysqli_num_rows(db_query($sql));
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