<?php

// Переходим на директорию выше, что бы оказаться в корне проекта
chdir("..");

// Инициализируем рекурсивный итератор для обхода по всем файлам проекта
$directory = new \RecursiveDirectoryIterator(".");
$iterator = new \RecursiveIteratorIterator($directory);

// Проходим по всем файлам
foreach ($iterator as $info) {
    /** @var $info SplFileInfo */

    // Игнорируем файлы, которые называются . или .., это системные файлы для перехода в текущую директорию или директорию выше
    if( $info->getFilename() === "." || $info->getFileName() === ".." ) {
        continue;
    }

    // Игнорируем директории
    if( $info->isDir() ) {
        continue;
    }

    // Игнорируем файлы в директориях .git и .idea
    if( strpos($info->getPathname(), ".git") !== false || strpos($info->getPathname(), ".idea") !== false ) {
        continue;
    }

    // Игнорируем нашу новую папку
    if( strpos($info->getPathname(), "convert") !== false ) {
        continue;
    }

    // Пропускаем файлы с расширениями, которые не нужно конвертировать
    if( in_array(strtolower($info->getExtension()), ["gif", "png", "jpg", "ttf", "bmp", "jpeg", "swf", "ico", "", "psd"]) ) {
        continue;
    }

    // Сожержимое файла
    $content = file_get_contents($info->getPathname());

    // Перекодированное из Windows-1251 в UTF-8 содержимое файла
    $converted_content = mb_convert_encoding($content, "UTF-8", "Windows-1251");

    // Сохраняем файл
    file_put_contents($info->getPathname(), $converted_content);

    print $info->getPathname() . " : OK<br />";
}