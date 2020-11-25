<?php

if ($user['battle'] > 0) {
    
	echo "Не в бою...";
    
} else {

    ////////////// эффекты зачарования ////////////////////////////////////////////

    $charmsEff=array(
        "gsila"         => "Сила",
        "ginta"         => "Интуиция",
        "glovk"         => "Ловкость",
        "gintel"        => "Интеллект",
        "ghp"           => "Уровень жизни (HP)",
        "mfuvorot"      => "Мф. увёртливости", 
        "mfauvorot"     => "Мф. против увёртливости", 
        "mfkrit"        => "Мф. критических ударов", 
        "mfakrit"       => "Мф. против крит. ударов", 
        "mfparir"       => "Мф. парирования", 
        "mfcontr"       => "Мф. контрудара", 
        "mfproboj"      => "Мф. пробоя брони",
        "mfkritpow"     => "Мф. мощности крит. удара (%)",
        "mfhitp"        => "Мф. мощности урона",
        "mfdhit"        => "Защита от урона",
        "mfdmag"        => "Защита от магии",
        "bron1"         => "Броня головы",
        "bron2"         => "Броня корпуса",
        "bron3"         => "Броня пояса",
        "bron4"         => "Броня ног",
        "mfshieldblock" => "Мф. блока щитом",
        "mfmagp"        => "Мф. мощности магии стихий"
    );

    /////////// Зачаровать Оружие ///////////////////////////////////////////////////////

    $charms['Зачаровать Оружие [1]'] = array(
        '3' => array( // все виды оружия
            array('var' => 'gsila',    'value'  => 1),  // Сила +1 
            array('var' => 'ginta',    'value'  => 1),  // Интуиция +1 
            array('var' => 'glovk',    'value'  => 1),  // Ловкость +1 
            array('var' => 'gintel',   'value'  => 1),  // Интеллект +1 
            array('var' => 'ghp',      'value'  => 10), // Уровень жизни (HP) +10 
            array('var' => 'mfhitp',   'value'  => 1),  // Мф. мощности урона (%) +1 
            array('var' => 'mfproboj',  'value' => 6),  // Мф. удара сквозь броню (%) +6 
            array('var' => 'mfproboj',  'value' => 10), // Мф. удара сквозь броню (%) +10 
            array('var' => 'mfkritpow', 'value' => 1),  // Мф. мощности крит. удара (%) +1 
            array('var' => 'mfkrit',    'value' => 15), // Мф. критического удара (%) +15 
            array('var' => 'mfuvorot',  'value' => 15), // Мф. увертывания (%) +15 
            array('var' => 'mfauvorot', 'value' => 10), // Мф. против увертывания (%) +10
        )
    );

    $charms['Зачаровать Оружие [2]'] = array(
        '3' => array( // все виды оружия
            array('var' => 'gsila',     'value' => 2),  // Сила +2 
            array('var' => 'ginta',     'value' => 2),  // Интуиция +2 
            array('var' => 'glovk',     'value' => 2),  // Ловкость +2
            array('var' => 'gintel',    'value' => 2),  // Интеллект +2 
            array('var' => 'ghp',       'value' => 25), // Уровень жизни (HP) +25
            array('var' => 'mfhitp',    'value' => 3),  // Мф. мощности урона (%) +3 
            array('var' => 'mfproboj',  'value' => 15), // Мф. удара сквозь броню (%) +15 
            array('var' => 'mfproboj',  'value' => 25), // Мф. Мф. удара сквозь броню (%) +25 
            array('var' => 'mfkritpow', 'value' => 3),  // Мф. мощности крит. удара (%) +3 
            array('var' => 'mfkrit',    'value' => 25), // Мф. критического удара (%) +25
            array('var' => 'mfuvorot',  'value' => 35), // Мф. увертывания (%) +35 
            array('var' => 'mfauvorot', 'value' => 25), // Мф. против увертывания (%) +25 
            array('var' => 'mfcontr',   'value' => 4),  // Мф. контрудара (%) +4 
            array('var' => 'mfakrit',   'value' => 25), // Мф. против критического удара (%) +25 
            array('var' => 'mfparir',   'value' => 2),  // Мф. парирования (%): +2
        )
    );

    $charms['Зачаровать Оружие [3]'] = array(
        '3' => array( // все виды оружия
            array('var' => 'gsila',     'value' => 3),  // Сила +3 
            array('var' => 'ginta',     'value' => 3),  // Интуиция +3 
            array('var' => 'glovk',     'value' => 3),  // Ловкость +3 
            array('var' => 'gintel',    'value' => 3),  // Интеллект +3 
            array('var' => 'mfhitp',    'value' => 5),  // Мф. мощности урона (%) +5 
            array('var' => 'mfproboj',  'value' => 25), // Мф. удара сквозь броню (%) +25 
            array('var' => 'mfkritpow', 'value' => 5),  // Мф. мощности крит. удара (%) +5 
            array('var' => 'mfkrit',    'value' => 50), // Мф. критического удара (%) +50
            array('var' => 'mfuvorot',  'value' => 50), // Мф. увертывания (%) +50 
            array('var' => 'mfauvorot', 'value' => 35), // Мф. против увертывания (%) +35
            array('var' => 'mfcontr',   'value' => 7),  // Мф. контрудара (%): +7 
            array('var' => 'mfakrit',   'value' => 35), // Мф. против критического удара (%) +35 
            array('var' => 'mfparir',   'value' => 3),  // Мф. парирования (%) +3 
        )
    );
    
    /////////// Зачаровать Оружие (двуручное) ///////////////////////////////////////////////////////
    
    $charms1['Зачаровать Оружие [1]'] = array(
        '3' => array( // все виды оружия
            array('var' => 'gsila',     'value' => 2),  // Сила +2
            array('var' => 'ginta',     'value' => 2),  // Интуиция +2 
            array('var' => 'glovk',     'value' => 2),  // Ловкость +2 
            array('var' => 'gintel',    'value' => 2),  // Интеллект +2 
            array('var' => 'ghp',       'value' => 20), // Уровень жизни (HP) +20 
            array('var' => 'mfhitp',    'value' => 2),  // Мф. мощности урона (%) +2 
            array('var' => 'mfkrit',    'value' => 30), // Мф. критического удара (%) +30 
            array('var' => 'mfauvorot', 'value' => 50), // Мф. против увертывания (%) +50 
            array('var' => 'mfparir',   'value' => 2),  // Мф. парирования (%): +2
            array('var' => 'mfmagp',    'value' => 2),  // Мф. мощности магии стихий +2
        )
    );

    $charms1['Зачаровать Оружие [2]'] = array(
        '3' => array( // все виды оружия
            array('var' => 'gsila',     'value' => 4),  // Сила +4
            array('var' => 'ginta',     'value' => 4),  // Интуиция +4
            array('var' => 'glovk',     'value' => 4),  // Ловкость +4
            array('var' => 'gintel',    'value' => 4),  // Интеллект +4
            array('var' => 'mfkrit',    'value' => 70), // Мф. критического удара (%) +70 
            array('var' => 'mfuvorot',  'value' => 30), // Мф. увертывания (%) +30
            array('var' => 'mfuvorot',  'value' => 70), // Мф. увертывания (%) +70
            array('var' => 'mfauvorot', 'value' => 50), // Мф. против увертывания (%) +50 
            array('var' => 'mfakrit',   'value' => 50), // Мф. против критического удара (%) +50 
            array('var' => 'mfmagp',    'value' => 6),  // Мф. мощности магии стихий +6
        )
    );

    $charms1['Зачаровать Оружие [3]'] = array(
        '3' => array( // все виды оружия
            array('var' => 'gsila',    'value' => 6),  // Сила +6
            array('var' => 'ginta',    'value' => 6),  // Интуиция +6
            array('var' => 'glovk',    'value' => 6),  // Ловкость +6
            array('var' => 'gintel',   'value' => 6),  // Интеллект +6
            array('var' => 'mfproboj', 'value' => 50), // Мф. удара сквозь броню (%) +50
            array('var' => 'mfmagp',   'value' => 10), // Мф. мощности магии стихий +10
            array('var' => 'mfdmag',   'value' => 32), // Защита от магии +32
        )
    );

    /////////// Зачаровать Броню ///////////////////////////////////////////////////////

    $charms['Зачаровать Броню [1]'] = array(
        '4' => array( // броня
            array('var' => 'gsila',     'value' => 1),  // Сила +1 
            array('var' => 'ginta',     'value' => 1),  // Интуиция +1 
            array('var' => 'glovk',     'value' => 1),  // Ловкость +1 
            array('var' => 'gintel',    'value' => 1),  // Интеллект +1 
            array('var' => 'ghp',       'value' => 10), // Уровень жизни (HP) +10 
            array('var' => 'mfkritpow', 'value' => 1),  // Мф. мощности крит. удара (%) +1 
            array('var' => 'mfakrit',   'value' => 10), // Мф. против критического удара (%) +10 
            array('var' => 'mfdhit',    'value' => 5),  // Защита от урона +5 
            array('var' => 'mfdmag',    'value' => 5),  // Защита от магии +5 
            array('var' => 'bron2',     'value'  => 7), // Броня корпуса +7
        ),
        '10' => array( // щиты
            array('var' => 'gsila',         'value' => 1),  // Сила +1 
            array('var' => 'ginta',         'value' => 1),  // Интуиция +1
            array('var' => 'glovk',         'value' => 1),  // Ловкость +1 
            array('var' => 'gintel',        'value' => 1),  // Интеллект +1 
            array('var' => 'ghp',           'value' => 10), // Уровень жизни (HP) +10 
            array('var' => 'mfdmag',        'value' => 5),  // Защита от магии +5 
            array('var' => 'bron2',         'value' => 7),  // Броня корпуса +7
            array('var' => 'mfshieldblock', 'value' => 1),  // Мф. блока щитом (%) +1 
            array('var' => 'bron3',         'value' => 7),  // Броня пояса +7 
        )
    );

    $charms['Зачаровать Броню [2]'] = array(
        '4' => array( // броня
            array('var' => 'gsila',     'value' => 2),  // Сила +2 
            array('var' => 'ginta',     'value' => 2),  // Интуиция +2 
            array('var' => 'glovk',     'value' => 2),  // Ловкость +2 
            array('var' => 'glovk',     'value' => 3),  // Ловкость +3 
            array('var' => 'gintel',    'value' => 2),  // Интеллект +2 
            array('var' => 'ghp',       'value' => 25), // Уровень жизни (HP) +25 
            array('var' => 'mfakrit',   'value' => 25), // Мф. против критического удара (%) +25 
            array('var' => 'mfdhit',    'value' => 11), // Защита от урона +11 
            array('var' => 'mfdmag',    'value' => 11), // Защита от магии +11 
            array('var' => 'bron2',     'value' => 15), // Броня корпуса +15
        ),
        '10' => array( // щиты
            array('var' => 'gsila',         'value' => 2),  // Сила +2 
            array('var' => 'ginta',         'value' => 2),  // Интуиция +2 
            array('var' => 'glovk',         'value' => 2),  // Ловкость +2 
            array('var' => 'gintel',        'value' => 2),  // Интеллект +2 
            array('var' => 'mfdmag',        'value' => 11), // Защита от магии +11 
            array('var' => 'mfdhit',        'value' => 11), // Защита от урона +11 
            array('var' => 'bron2',         'value' => 15), // Броня корпуса +15 
            array('var' => 'bron4',         'value' => 15), // Броня ног +15
            array('var' => 'mfshieldblock', 'value' => 3),  // Мф. блока щитом (%) +3 
        )
    );

    $charms['Зачаровать Броню [3]'] = array(
        '4' => array( // броня
            array('var' => 'gsila',  'value' => 3),  // Сила +3 
            array('var' => 'ginta',  'value' => 3),  // Интуиция +3 
            array('var' => 'glovk',  'value' => 3),  // Ловкость +3 
            array('var' => 'gintel', 'value' => 3),  // Интеллект +3 
            array('var' => 'ghp',    'value' => 35), // Уровень жизни (HP) +35 
            array('var' => 'mfdhit', 'value' => 16), // Защита от урона +16
            array('var' => 'mfdmag', 'value' => 16), // Защита от магии +16 
            array('var' => 'bron2',  'value' => 22), // Броня корпуса +22 
        ),
        '10' => array( // щиты
            array('var' => 'gsila',         'value' => 2),  // Сила +2 
            array('var' => 'ginta',         'value' => 2),  // Интуиция +2 
            array('var' => 'glovk',         'value' => 2),  // Ловкость +2 
            array('var' => 'gintel',        'value' => 3),  // Интеллект +3 
            array('var' => 'ghp',           'value' => 99), // Уровень жизни (HP) +99 
            array('var' => 'mfdmag',        'value' => 16), // Защита от магии +16 
            array('var' => 'mfshieldblock', 'value' => 5),  // Мф. блока щитом (%) +5
        )
    );

    /////////// Зачаровать Шлем ///////////////////////////////////////////////////////

    $charms['Зачаровать Шлем [1]'] = array(
        '8' => array( // шлем
            array('var' => 'gsila',   'value' => 1),  // Сила +1 
            array('var' => 'ginta',   'value' => 1),  // Интуиция +1 
            array('var' => 'glovk',   'value' => 1),  // Ловкость +1 
            array('var' => 'gintel',  'value' => 1),  // Интеллект +1 
            array('var' => 'ghp',     'value' => 10), // Уровень жизни (HP) +10 
            array('var' => 'mfdhit',  'value' => 5),  // Защита от урона +5 
            array('var' => 'mfdmag',  'value' => 5),  // Защита от магии +5 
            array('var' => 'mfcontr', 'value' => 2),  // Мф. контрудара (%) +2 
            array('var' => 'mfakrit', 'value' => 10), // Мф. против критического удара (%) +10 
            array('var' => 'bron1',   'value' => 7),  // Броня головы +7
        ),
        '11' => array( // ботинки
            array('var' => 'gsila',    'value' => 1),  // Сила +1 
            array('var' => 'ginta',    'value' => 1),  // Интуиция +1
            array('var' => 'glovk',    'value' => 1),  // Ловкость +1 
            array('var' => 'gintel',   'value' => 1),  // Интеллект +1 
            array('var' => 'ghp',      'value' => 10), // Уровень жизни (HP) +10 
            array('var' => 'mfdmag',   'value' => 5),  // Защита от магии +5 
            array('var' => 'bron4',    'value' => 7),  // Броня ног +7
            array('var' => 'mfdhit',   'value' => 5),  // Защита от урона +5 
            array('var' => 'mfuvorot', 'value' => 15), // Мф. увертывания (%) +15 
        )
    );

    $charms['Зачаровать Шлем [2]'] = array(
        '8' => array( // шлем
            array('var' => 'gsila',   'value' => 2),  // Сила +2 
            array('var' => 'ginta',   'value' => 2),  // Интуиция +2 
            array('var' => 'glovk',   'value' => 2),  // Ловкость +2 
            array('var' => 'gintel',  'value' => 2),  // Интеллект +2 
            array('var' => 'ghp',     'value' => 25), // Уровень жизни (HP) +25 
            array('var' => 'mfdhit',  'value' => 11), // Защита от урона +11 
            array('var' => 'mfdmag',  'value' => 11), // Защита от магии +11 
            array('var' => 'bron1',   'value' => 15), // Броня головы +15
            array('var' => 'mfakrit', 'value' => 25), // Мф. против критического удара (%) +25 
        ),
        '11' => array( // ботинки
            array('var' => 'gsila',    'value' => 2),  // Сила +2 
            array('var' => 'ginta',    'value' => 2),  // Интуиция +2 
            array('var' => 'glovk',    'value' => 2),  // Ловкость +2 
            array('var' => 'gintel',   'value' => 2),  // Интеллект +2 
            array('var' => 'ghp',      'value' => 25), // Уровень жизни (HP) +25 
            array('var' => 'mfdmag',   'value' => 11), // Защита от магии +11 
            array('var' => 'bron4',    'value' => 15), // Броня ног +15
            array('var' => 'mfdhit',   'value' => 11), // Защита от урона +11 
            array('var' => 'mfuvorot', 'value' => 35), // Мф. увертывания (%) +35 
        )
    );

    $charms['Зачаровать Шлем [3]'] = array(
        '8' => array( // шлем
            array('var' => 'gsila',   'value' => 2),  // Сила +2 
            array('var' => 'ginta',   'value' => 3),  // Интуиция +3 
            array('var' => 'glovk',   'value' => 3),  // Ловкость +3 
            array('var' => 'gintel',  'value' => 3),  // Интеллект +3 
            array('var' => 'mfdhit',  'value' => 16), // Защита от урона +16 
            array('var' => 'mfdmag',  'value' => 16), // Защита от магии +16 
            array('var' => 'bron1',   'value' => 22),  // Броня головы +22
        ),
        '11' => array( // ботинки
            array('var' => 'gsila',  'value' => 2),  // Сила +2 
            array('var' => 'gsila',  'value' => 3),  // Сила +3
            array('var' => 'ginta',  'value' => 3),  // Интуиция +3 
            array('var' => 'glovk',  'value' => 3),  // Ловкость +3 
            array('var' => 'gintel', 'value' => 3),  // Интеллект +3 
            array('var' => 'ghp',    'value' => 35), // Уровень жизни (HP) +35 
            array('var' => 'bron4',  'value' => 22), // Броня ног +22
        )
    );

    /////////// Зачаровать Перчатки ///////////////////////////////////////////////////////

    $charms['Зачаровать Перчатки [1]'] = array(
        '9' => array( // перчатки
            array('var' => 'gsila',     'value' => 1),  // Сила +1 
            array('var' => 'ginta',     'value' => 1),  // Интуиция +1 
            array('var' => 'glovk',     'value' => 1),  // Ловкость +1 
            array('var' => 'gintel',    'value' => 1),  // Интеллект +1 
            array('var' => 'mfcontr',   'value' => 2),  // Мф. контрудара (%) +2 
            array('var' => 'mfhitp',    'value' => 1),  // Мф. мощности урона (%) +1 
            array('var' => 'mfparir',   'value' => 1),  // Мф. парирования (%) +1
            array('var' => 'mfkritpow', 'value' => 1),  // Мф. мощности крит. удара (%) +1 
            array('var' => 'mfkrit',    'value' => 10), // Мф. критического удара (%) +10
        ),
        '22' => array( // наручи
            array('var' => 'gsila',   'value' => 1),  // Сила +1 
            array('var' => 'ginta',   'value' => 1),  // Интуиция +1 
            array('var' => 'glovk',   'value' => 1),  // Ловкость +1 
            array('var' => 'gintel',  'value' => 1),  // Интеллект +1 
            array('var' => 'mfhitp',  'value' => 1),  // Мф. мощности урона (%) +1 
            array('var' => 'mfparir', 'value' => 1),  // Мф. парирования (%) +1
        ),
        '23' => array( // пояса
            array('var' => 'gsila',   'value' => 1),  // Сила +1 
            array('var' => 'ginta',   'value' => 1),  // Интуиция +1 
            array('var' => 'glovk',   'value' => 1),  // Ловкость +1 
            array('var' => 'gintel',  'value' => 1),  // Интеллект +1 
            array('var' => 'ghp',     'value' => 10), // Уровень жизни (HP) +10 
            array('var' => 'mfdhit',  'value' => 5),  // Защита от урона +5 
            array('var' => 'mfdmag',  'value' => 5),  // Защита от магии +5 
            array('var' => 'bron3',   'value' => 7),  // Броня пояса +7 
        )
    );

    $charms['Зачаровать Перчатки [2]'] = array(
        '9' => array( // перчатки
            array('var' => 'gsila',     'value' => 2),  // Сила +2 
            array('var' => 'ginta',     'value' => 2),  // Интуиция +2 
            array('var' => 'glovk',     'value' => 2),  // Ловкость +2 
            array('var' => 'gintel',    'value' => 2),  // Интеллект +2 
            array('var' => 'mfhitp',    'value' => 2),  // Мф. мощности урона (%) +2 
            array('var' => 'mfparir',   'value' => 2),  // Мф. парирования (%) +2 
            array('var' => 'mfkritpow', 'value' => 2),  // Мф. мощности крит. удара (%) +2 
            array('var' => 'mfkrit',    'value' => 25), // Мф. критического удара (%) +25 
            array('var' => 'bron3',     'value' => 15),  // Броня пояса +15
        ),
        '22' => array( // наручи
            array('var' => 'gsila',         'value' => 2),  // Сила +2 
            array('var' => 'ginta',         'value' => 2),  // Интуиция +2 
            array('var' => 'glovk',         'value' => 2),  // Ловкость +2 
            array('var' => 'gintel',        'value' => 2),  // Интеллект +2 
            array('var' => 'mfhitp',        'value' => 2),  // Мф. мощности урона (%) +2 
            array('var' => 'mfparir',       'value' => 2),  // Мф. парирования (%) +2
            array('var' => 'mfauvorot',     'value' => 25), // Мф. против увертывания (%) +25 
            array('var' => 'mfshieldblock', 'value' => 3),  // Мф. блока щитом (%) +3 
        ),
        '23' => array( // пояса
            array('var' => 'gsila',  'value' => 2),  // Сила +2 
            array('var' => 'ginta',  'value' => 2),  // Интуиция +2 
            array('var' => 'glovk',  'value' => 2),  // Ловкость +2 
            array('var' => 'gintel', 'value' => 2),  // Интеллект +2 
            array('var' => 'ghp',    'value' => 25), // Уровень жизни (HP) +25 
            array('var' => 'mfdhit', 'value' => 11), // Защита от урона +11 
            array('var' => 'mfdmag', 'value' => 11), // Защита от магии +11
        )
    );

    $charms['Зачаровать Перчатки [3]'] = array(
        '9' => array( // перчатки
            array('var' => 'gsila',   'value' => 3),  // Сила +3 
            array('var' => 'ginta',   'value' => 3),  // Интуиция +3 
            array('var' => 'glovk',   'value' => 3),  // Ловкость +3 
            array('var' => 'gintel',  'value' => 3),  // Интеллект +3 
            array('var' => 'mfhitp',  'value' => 3),  // Мф. мощности урона (%) +3 
            array('var' => 'mfparir', 'value' => 3),  // Мф. парирования (%) +3
        ),
        '22' => array( // наручи
            array('var' => 'gsila',   'value' => 3),  // Сила +3 
            array('var' => 'ginta',   'value' => 3),  // Интуиция +3 
            array('var' => 'glovk',   'value' => 3),  // Ловкость +3 
            array('var' => 'gintel',  'value' => 3),  // Интеллект +3 
            array('var' => 'mfparir', 'value' => 3),  // Мф. парирования (%) +3
        ),
        '23' => array( // пояса
            array('var' => 'gsila',  'value' => 3),  // Сила +3 
            array('var' => 'ginta',  'value' => 3),  // Интуиция +3 
            array('var' => 'glovk',  'value' => 3),  // Ловкость +3 
            array('var' => 'gintel', 'value' => 3),  // Интеллект +3 
            array('var' => 'mfdhit', 'value' => 16), // Защита от урона +16 
            array('var' => 'mfdmag', 'value' => 16), // Защита от магии +16 
            array('var' => 'bron3',  'value' => 22), // Броня пояса +22
        )
    );

    /////////// Зачаровать Украшение ///////////////////////////////////////////////////////

    $charms['Зачаровать Украшение [1]'] = array(
        '1' => array( // серьги
            array('var' => 'gsila',     'value' => 1),  // Сила +1 
            array('var' => 'ginta',     'value' => 1),  // Интуиция +1 
            array('var' => 'glovk',     'value' => 1),  // Ловкость +1 
            array('var' => 'gintel',    'value' => 1),  // Интеллект +1 
            array('var' => 'ghp',       'value' => 10), // Уровень жизни (HP) +10  
            array('var' => 'mfdhit',    'value' => 5),  // Защита от урона +5 
            array('var' => 'mfdmag',    'value' => 5),  // Защита от магии +5
            array('var' => 'mfcontr',   'value' => 2),  // Мф. контрудара (%) +2 
            array('var' => 'mfhitp',    'value' => 1),  // Мф. мощности урона (%) +1 
            array('var' => 'mfuvorot',  'value' => 15), // Мф. увертывания (%) +15 
            array('var' => 'mfauvorot', 'value' => 15), // Мф. против увертывания (%) +15
        ),
        '2' => array( // ожерелья
            array('var' => 'gsila',     'value' => 1),  // Сила +1 
            array('var' => 'ginta',     'value' => 1),  // Интуиция +1
            array('var' => 'glovk',     'value' => 1),  // Ловкость +1
            array('var' => 'gintel',    'value' => 1),  // Интеллект +1
            array('var' => 'ghp',       'value' => 10), // Уровень жизни (HP) +10
            array('var' => 'mfdhit',    'value' => 5),  // Защита от урона +5 
            array('var' => 'mfdmag',    'value' => 5),  // Защита от магии +5
            array('var' => 'mfcontr',   'value' => 2),  // Мф. контрудара (%) +2
            array('var' => 'mfhitp',    'value' => 1),  // Мф. мощности урона (%) +1
            array('var' => 'mfauvorot', 'value' => 10), // Мф. против увертывания (%) +10 
            array('var' => 'mfparir',   'value' => 1),  // Мф. парирования (%) +1 
        )
    );

    $charms['Зачаровать Украшение [2]'] = array(
        '1' => array( // серьги
            array('var' => 'gsila',         'value' => 2),  // Сила +2 
            array('var' => 'ginta',         'value' => 2),  // Интуиция +2 
            array('var' => 'glovk',         'value' => 2),  // Ловкость +2 
            array('var' => 'gintel',        'value' => 2),  // Интеллект +2 
            array('var' => 'ghp',           'value' => 25), // Уровень жизни (HP) +25 
            array('var' => 'mfdhit',        'value' => 11),  // Защита от урона +11
            array('var' => 'mfdmag',        'value' => 11),  // Защита от магии +11 
            array('var' => 'mfhitp',        'value' => 2),  // Мф. мощности урона (%) +2 
            array('var' => 'mfparir',       'value' => 2),  // Мф. парирования (%) +2 
            array('var' => 'mfshieldblock', 'value' => 3),  // Мф. блока щитом (%) +3 
        ),
        '2' => array( // ожерелья
            array('var' => 'gsila',     'value' => 2),  // Сила +2
            array('var' => 'ginta',     'value' => 2),  // Интуиция +2
            array('var' => 'glovk',     'value' => 2),  // Ловкость +2
            array('var' => 'gintel',    'value' => 2),  // Интеллект +2
            array('var' => 'ghp',       'value' => 25), // Уровень жизни (HP) +25
            array('var' => 'mfdhit',    'value' => 11), // Защита от урона +11
            array('var' => 'mfdmag',    'value' => 11), // Защита от магии +11
            array('var' => 'mfcontr',   'value' => 2),  // Мф. контрудара (%) +2
            array('var' => 'mfhitp',    'value' => 2),  // Мф. мощности урона (%) +2
            array('var' => 'mfparir',   'value' => 2),  // Мф. парирования (%) +2
            array('var' => 'mfkritpow', 'value' => 2),  // Мф. мощности крит. удара (%) +2
        ),
        '5' => array( // кольца
            array('var' => 'gsila',     'value' => 1),  // Сила +1
            array('var' => 'ginta',     'value' => 1),  // Интуиция +1
            array('var' => 'glovk',     'value' => 1),  // Ловкость +1
            array('var' => 'gintel',    'value' => 1),  // Интеллект +1
            array('var' => 'ghp',       'value' => 10), // Уровень жизни (HP) +10
            array('var' => 'mfdhit',    'value' => 5),  // Защита от урона +5
            array('var' => 'mfdmag',    'value' => 5),  // Защита от магии +5
            array('var' => 'mfhitp',    'value' => 1),  // Мф. мощности урона (%) +1
            array('var' => 'mfparir',   'value' => 1),  // Мф. парирования (%) +1
        )
    );

    $charms['Зачаровать Украшение [3]'] = array(
        '1' => array( // серьги
            array('var' => 'gsila',     'value' => 3),  // Сила +3
            array('var' => 'ginta',     'value' => 3),  // Интуиция +3
            array('var' => 'glovk',     'value' => 3),  // Ловкость +3
            array('var' => 'gintel',    'value' => 3),  // Интеллект +3
            array('var' => 'mfdhit',    'value' => 16), // Защита от урона +16
            array('var' => 'mfdmag',    'value' => 16), // Защита от магии +16
            array('var' => 'mfhitp',    'value' => 3),  // Мф. мощности урона (%) +3
            array('var' => 'mfparir',   'value' => 3),  // Мф. парирования (%) +3
        ),
        '2' => array( // ожерелья
            array('var' => 'gsila',     'value' => 3),  // Сила +3
            array('var' => 'ginta',     'value' => 3),  // Интуиция +3
            array('var' => 'glovk',     'value' => 3),  // Ловкость +3
            array('var' => 'gintel',    'value' => 3),  // Интеллект +3
            array('var' => 'mfdhit',    'value' => 16), // Защита от урона +16
            array('var' => 'mfdmag',    'value' => 16), // Защита от магии +16
            array('var' => 'mfhitp',    'value' => 3),  // Мф. мощности урона (%) +3
            array('var' => 'mfparir',   'value' => 3),  // Мф. парирования (%) +3
            array('var' => 'mfakrit',   'value' => 35), // Мф. против критического удара (%) +35
        ),
        '5' => array( // кольца
            array('var' => 'gsila',     'value' => 2),  // Сила +2
            array('var' => 'ginta',     'value' => 2),  // Интуиция +2
            array('var' => 'glovk',     'value' => 2),  // Ловкость +2
            array('var' => 'gintel',    'value' => 2),  // Интеллект +2
            array('var' => 'ghp',       'value' => 25), // Уровень жизни (HP) +25
            array('var' => 'mfdhit',    'value' => 11), // Защита от урона +11
            array('var' => 'mfdmag',    'value' => 11), // Защита от магии +11
            array('var' => 'mfhitp',    'value' => 2),  // Мф. мощности урона (%) +2
            array('var' => 'mfparir',   'value' => 2),  // Мф. парирования (%) +2
        )
    );

    ////////////////////////////////// зачарование ////////////////////////////////////////////////////////


    // выбираем свиток
    $charm = mysqli_fetch_assoc(db_query("SELECT id, name FROM `inventory` WHERE `id` = '{$_GET['use']}' AND `owner` = '$user[id]' LIMIT 1;"));
    // выбираем предмет
    $item  = mysqli_fetch_array(db_query("
            SELECT id, name, type, destinyinv, opisan, artefact, dvur
            FROM `inventory` 
            WHERE 
                owner    = '{$user['id']}' AND 
                name     = '" . db_escape_string($_POST['target']) . "' AND
                dressed  = 0 AND
                artefact = 0 AND
                (type = 3 OR type = 9 OR type = 4 OR type = 10 OR type = 5 OR type = 2 OR type = 1 OR type = 8 OR type = 11 OR type = 22 OR type = 23)
            LIMIT 1
        ")
    );
    
    if (!isset($charms[$charm['name']]) || !isset($item['id']) || !isset($charms[$charm['name']][$item['type']])) { // проверяем свиток, проверяем предмет, проверяем соответствие предмета свитку
        echo 'Неправильное имя предмета или неправильный свиток.';
    } elseif (mt_rand(1, 100) > $magic['chanse']) { // если не сработал шанс
        echo 'Свиток рассыпался в Ваших руках.';
        $bet=1;
    } else { // зачарование
        // если двуручное оружие, то меняем изначальные данные
        if ($item['dvur'] && $item["type"] == 3) {
            $charms[$charm['name']][$item['type']] = $charms1[$charm['name']][$item['type']];
        }
        // выбираем эффект случайным образом
        $rnd = mt_rand(0, count($charms[$charm['name']][$item['type']]) - 1);
        $set = $charms[$charm['name']][$item['type']][$rnd];
        // удаляем предыдущий эффект, если был
        $oldChEff = mysqli_fetch_assoc(db_query("SELECT * FROM charmed_items WHERE id = $item[id]"));
        if ($oldChEff) {
            db_query("UPDATE inventory SET $oldChEff[variable]  = ($oldChEff[variable] - $oldChEff[value]) WHERE id = $item[id] AND owner = $user[id]");
        }
        // запоминаем новый эффект зачарования
        db_query("REPLACE INTO charmed_items SET id = $item[id], variable = '$set[var]', value = '$set[value]'");
        // вносим изменения в предмет
        db_query("
            UPDATE inventory 
            SET 
                $set[var]  = ($set[var] + $set[value]), 
                opisan     = '" . db_escape_string("<b>Усиление:</b> $charm[name] (" . $charmsEff[$set['var']] . " +$set[value])") . "',
                destinyinv = " . (($item['destinyinv'] == 2) ? 2 : 1) . " 
            WHERE id = $item[id] AND owner = $user[id]
        ");
        echo 'Все прошло успешно.';
        // удаляем свиток
        $bet=1;
    }

}

?>
