<?php

if ($user['battle'] > 0) {
    
	echo "�� � ���...";
    
} else {

    ////////////// ������� ����������� ////////////////////////////////////////////

    $charmsEff=array(
        "gsila"         => "����",
        "ginta"         => "��������",
        "glovk"         => "��������",
        "gintel"        => "���������",
        "ghp"           => "������� ����� (HP)",
        "mfuvorot"      => "��. �����������", 
        "mfauvorot"     => "��. ������ �����������", 
        "mfkrit"        => "��. ����������� ������", 
        "mfakrit"       => "��. ������ ����. ������", 
        "mfparir"       => "��. �����������", 
        "mfcontr"       => "��. ����������", 
        "mfproboj"      => "��. ������ �����",
        "mfkritpow"     => "��. �������� ����. ����� (%)",
        "mfhitp"        => "��. �������� �����",
        "mfdhit"        => "������ �� �����",
        "mfdmag"        => "������ �� �����",
        "bron1"         => "����� ������",
        "bron2"         => "����� �������",
        "bron3"         => "����� �����",
        "bron4"         => "����� ���",
        "mfshieldblock" => "��. ����� �����",
        "mfmagp"        => "��. �������� ����� ������"
    );

    /////////// ���������� ������ ///////////////////////////////////////////////////////

    $charms['���������� ������ [1]'] = array(
        '3' => array( // ��� ���� ������
            array('var' => 'gsila',    'value'  => 1),  // ���� +1 
            array('var' => 'ginta',    'value'  => 1),  // �������� +1 
            array('var' => 'glovk',    'value'  => 1),  // �������� +1 
            array('var' => 'gintel',   'value'  => 1),  // ��������� +1 
            array('var' => 'ghp',      'value'  => 10), // ������� ����� (HP) +10 
            array('var' => 'mfhitp',   'value'  => 1),  // ��. �������� ����� (%) +1 
            array('var' => 'mfproboj',  'value' => 6),  // ��. ����� ������ ����� (%) +6 
            array('var' => 'mfproboj',  'value' => 10), // ��. ����� ������ ����� (%) +10 
            array('var' => 'mfkritpow', 'value' => 1),  // ��. �������� ����. ����� (%) +1 
            array('var' => 'mfkrit',    'value' => 15), // ��. ������������ ����� (%) +15 
            array('var' => 'mfuvorot',  'value' => 15), // ��. ����������� (%) +15 
            array('var' => 'mfauvorot', 'value' => 10), // ��. ������ ����������� (%) +10
        )
    );

    $charms['���������� ������ [2]'] = array(
        '3' => array( // ��� ���� ������
            array('var' => 'gsila',     'value' => 2),  // ���� +2 
            array('var' => 'ginta',     'value' => 2),  // �������� +2 
            array('var' => 'glovk',     'value' => 2),  // �������� +2
            array('var' => 'gintel',    'value' => 2),  // ��������� +2 
            array('var' => 'ghp',       'value' => 25), // ������� ����� (HP) +25
            array('var' => 'mfhitp',    'value' => 3),  // ��. �������� ����� (%) +3 
            array('var' => 'mfproboj',  'value' => 15), // ��. ����� ������ ����� (%) +15 
            array('var' => 'mfproboj',  'value' => 25), // ��. ��. ����� ������ ����� (%) +25 
            array('var' => 'mfkritpow', 'value' => 3),  // ��. �������� ����. ����� (%) +3 
            array('var' => 'mfkrit',    'value' => 25), // ��. ������������ ����� (%) +25
            array('var' => 'mfuvorot',  'value' => 35), // ��. ����������� (%) +35 
            array('var' => 'mfauvorot', 'value' => 25), // ��. ������ ����������� (%) +25 
            array('var' => 'mfcontr',   'value' => 4),  // ��. ���������� (%) +4 
            array('var' => 'mfakrit',   'value' => 25), // ��. ������ ������������ ����� (%) +25 
            array('var' => 'mfparir',   'value' => 2),  // ��. ����������� (%): +2
        )
    );

    $charms['���������� ������ [3]'] = array(
        '3' => array( // ��� ���� ������
            array('var' => 'gsila',     'value' => 3),  // ���� +3 
            array('var' => 'ginta',     'value' => 3),  // �������� +3 
            array('var' => 'glovk',     'value' => 3),  // �������� +3 
            array('var' => 'gintel',    'value' => 3),  // ��������� +3 
            array('var' => 'mfhitp',    'value' => 5),  // ��. �������� ����� (%) +5 
            array('var' => 'mfproboj',  'value' => 25), // ��. ����� ������ ����� (%) +25 
            array('var' => 'mfkritpow', 'value' => 5),  // ��. �������� ����. ����� (%) +5 
            array('var' => 'mfkrit',    'value' => 50), // ��. ������������ ����� (%) +50
            array('var' => 'mfuvorot',  'value' => 50), // ��. ����������� (%) +50 
            array('var' => 'mfauvorot', 'value' => 35), // ��. ������ ����������� (%) +35
            array('var' => 'mfcontr',   'value' => 7),  // ��. ���������� (%): +7 
            array('var' => 'mfakrit',   'value' => 35), // ��. ������ ������������ ����� (%) +35 
            array('var' => 'mfparir',   'value' => 3),  // ��. ����������� (%) +3 
        )
    );
    
    /////////// ���������� ������ (���������) ///////////////////////////////////////////////////////
    
    $charms1['���������� ������ [1]'] = array(
        '3' => array( // ��� ���� ������
            array('var' => 'gsila',     'value' => 2),  // ���� +2
            array('var' => 'ginta',     'value' => 2),  // �������� +2 
            array('var' => 'glovk',     'value' => 2),  // �������� +2 
            array('var' => 'gintel',    'value' => 2),  // ��������� +2 
            array('var' => 'ghp',       'value' => 20), // ������� ����� (HP) +20 
            array('var' => 'mfhitp',    'value' => 2),  // ��. �������� ����� (%) +2 
            array('var' => 'mfkrit',    'value' => 30), // ��. ������������ ����� (%) +30 
            array('var' => 'mfauvorot', 'value' => 50), // ��. ������ ����������� (%) +50 
            array('var' => 'mfparir',   'value' => 2),  // ��. ����������� (%): +2
            array('var' => 'mfmagp',    'value' => 2),  // ��. �������� ����� ������ +2
        )
    );

    $charms1['���������� ������ [2]'] = array(
        '3' => array( // ��� ���� ������
            array('var' => 'gsila',     'value' => 4),  // ���� +4
            array('var' => 'ginta',     'value' => 4),  // �������� +4
            array('var' => 'glovk',     'value' => 4),  // �������� +4
            array('var' => 'gintel',    'value' => 4),  // ��������� +4
            array('var' => 'mfkrit',    'value' => 70), // ��. ������������ ����� (%) +70 
            array('var' => 'mfuvorot',  'value' => 30), // ��. ����������� (%) +30
            array('var' => 'mfuvorot',  'value' => 70), // ��. ����������� (%) +70
            array('var' => 'mfauvorot', 'value' => 50), // ��. ������ ����������� (%) +50 
            array('var' => 'mfakrit',   'value' => 50), // ��. ������ ������������ ����� (%) +50 
            array('var' => 'mfmagp',    'value' => 6),  // ��. �������� ����� ������ +6
        )
    );

    $charms1['���������� ������ [3]'] = array(
        '3' => array( // ��� ���� ������
            array('var' => 'gsila',    'value' => 6),  // ���� +6
            array('var' => 'ginta',    'value' => 6),  // �������� +6
            array('var' => 'glovk',    'value' => 6),  // �������� +6
            array('var' => 'gintel',   'value' => 6),  // ��������� +6
            array('var' => 'mfproboj', 'value' => 50), // ��. ����� ������ ����� (%) +50
            array('var' => 'mfmagp',   'value' => 10), // ��. �������� ����� ������ +10
            array('var' => 'mfdmag',   'value' => 32), // ������ �� ����� +32
        )
    );

    /////////// ���������� ����� ///////////////////////////////////////////////////////

    $charms['���������� ����� [1]'] = array(
        '4' => array( // �����
            array('var' => 'gsila',     'value' => 1),  // ���� +1 
            array('var' => 'ginta',     'value' => 1),  // �������� +1 
            array('var' => 'glovk',     'value' => 1),  // �������� +1 
            array('var' => 'gintel',    'value' => 1),  // ��������� +1 
            array('var' => 'ghp',       'value' => 10), // ������� ����� (HP) +10 
            array('var' => 'mfkritpow', 'value' => 1),  // ��. �������� ����. ����� (%) +1 
            array('var' => 'mfakrit',   'value' => 10), // ��. ������ ������������ ����� (%) +10 
            array('var' => 'mfdhit',    'value' => 5),  // ������ �� ����� +5 
            array('var' => 'mfdmag',    'value' => 5),  // ������ �� ����� +5 
            array('var' => 'bron2',     'value'  => 7), // ����� ������� +7
        ),
        '10' => array( // ����
            array('var' => 'gsila',         'value' => 1),  // ���� +1 
            array('var' => 'ginta',         'value' => 1),  // �������� +1
            array('var' => 'glovk',         'value' => 1),  // �������� +1 
            array('var' => 'gintel',        'value' => 1),  // ��������� +1 
            array('var' => 'ghp',           'value' => 10), // ������� ����� (HP) +10 
            array('var' => 'mfdmag',        'value' => 5),  // ������ �� ����� +5 
            array('var' => 'bron2',         'value' => 7),  // ����� ������� +7
            array('var' => 'mfshieldblock', 'value' => 1),  // ��. ����� ����� (%) +1 
            array('var' => 'bron3',         'value' => 7),  // ����� ����� +7 
        )
    );

    $charms['���������� ����� [2]'] = array(
        '4' => array( // �����
            array('var' => 'gsila',     'value' => 2),  // ���� +2 
            array('var' => 'ginta',     'value' => 2),  // �������� +2 
            array('var' => 'glovk',     'value' => 2),  // �������� +2 
            array('var' => 'glovk',     'value' => 3),  // �������� +3 
            array('var' => 'gintel',    'value' => 2),  // ��������� +2 
            array('var' => 'ghp',       'value' => 25), // ������� ����� (HP) +25 
            array('var' => 'mfakrit',   'value' => 25), // ��. ������ ������������ ����� (%) +25 
            array('var' => 'mfdhit',    'value' => 11), // ������ �� ����� +11 
            array('var' => 'mfdmag',    'value' => 11), // ������ �� ����� +11 
            array('var' => 'bron2',     'value' => 15), // ����� ������� +15
        ),
        '10' => array( // ����
            array('var' => 'gsila',         'value' => 2),  // ���� +2 
            array('var' => 'ginta',         'value' => 2),  // �������� +2 
            array('var' => 'glovk',         'value' => 2),  // �������� +2 
            array('var' => 'gintel',        'value' => 2),  // ��������� +2 
            array('var' => 'mfdmag',        'value' => 11), // ������ �� ����� +11 
            array('var' => 'mfdhit',        'value' => 11), // ������ �� ����� +11 
            array('var' => 'bron2',         'value' => 15), // ����� ������� +15 
            array('var' => 'bron4',         'value' => 15), // ����� ��� +15
            array('var' => 'mfshieldblock', 'value' => 3),  // ��. ����� ����� (%) +3 
        )
    );

    $charms['���������� ����� [3]'] = array(
        '4' => array( // �����
            array('var' => 'gsila',  'value' => 3),  // ���� +3 
            array('var' => 'ginta',  'value' => 3),  // �������� +3 
            array('var' => 'glovk',  'value' => 3),  // �������� +3 
            array('var' => 'gintel', 'value' => 3),  // ��������� +3 
            array('var' => 'ghp',    'value' => 35), // ������� ����� (HP) +35 
            array('var' => 'mfdhit', 'value' => 16), // ������ �� ����� +16
            array('var' => 'mfdmag', 'value' => 16), // ������ �� ����� +16 
            array('var' => 'bron2',  'value' => 22), // ����� ������� +22 
        ),
        '10' => array( // ����
            array('var' => 'gsila',         'value' => 2),  // ���� +2 
            array('var' => 'ginta',         'value' => 2),  // �������� +2 
            array('var' => 'glovk',         'value' => 2),  // �������� +2 
            array('var' => 'gintel',        'value' => 3),  // ��������� +3 
            array('var' => 'ghp',           'value' => 99), // ������� ����� (HP) +99 
            array('var' => 'mfdmag',        'value' => 16), // ������ �� ����� +16 
            array('var' => 'mfshieldblock', 'value' => 5),  // ��. ����� ����� (%) +5
        )
    );

    /////////// ���������� ���� ///////////////////////////////////////////////////////

    $charms['���������� ���� [1]'] = array(
        '8' => array( // ����
            array('var' => 'gsila',   'value' => 1),  // ���� +1 
            array('var' => 'ginta',   'value' => 1),  // �������� +1 
            array('var' => 'glovk',   'value' => 1),  // �������� +1 
            array('var' => 'gintel',  'value' => 1),  // ��������� +1 
            array('var' => 'ghp',     'value' => 10), // ������� ����� (HP) +10 
            array('var' => 'mfdhit',  'value' => 5),  // ������ �� ����� +5 
            array('var' => 'mfdmag',  'value' => 5),  // ������ �� ����� +5 
            array('var' => 'mfcontr', 'value' => 2),  // ��. ���������� (%) +2 
            array('var' => 'mfakrit', 'value' => 10), // ��. ������ ������������ ����� (%) +10 
            array('var' => 'bron1',   'value' => 7),  // ����� ������ +7
        ),
        '11' => array( // �������
            array('var' => 'gsila',    'value' => 1),  // ���� +1 
            array('var' => 'ginta',    'value' => 1),  // �������� +1
            array('var' => 'glovk',    'value' => 1),  // �������� +1 
            array('var' => 'gintel',   'value' => 1),  // ��������� +1 
            array('var' => 'ghp',      'value' => 10), // ������� ����� (HP) +10 
            array('var' => 'mfdmag',   'value' => 5),  // ������ �� ����� +5 
            array('var' => 'bron4',    'value' => 7),  // ����� ��� +7
            array('var' => 'mfdhit',   'value' => 5),  // ������ �� ����� +5 
            array('var' => 'mfuvorot', 'value' => 15), // ��. ����������� (%) +15 
        )
    );

    $charms['���������� ���� [2]'] = array(
        '8' => array( // ����
            array('var' => 'gsila',   'value' => 2),  // ���� +2 
            array('var' => 'ginta',   'value' => 2),  // �������� +2 
            array('var' => 'glovk',   'value' => 2),  // �������� +2 
            array('var' => 'gintel',  'value' => 2),  // ��������� +2 
            array('var' => 'ghp',     'value' => 25), // ������� ����� (HP) +25 
            array('var' => 'mfdhit',  'value' => 11), // ������ �� ����� +11 
            array('var' => 'mfdmag',  'value' => 11), // ������ �� ����� +11 
            array('var' => 'bron1',   'value' => 15), // ����� ������ +15
            array('var' => 'mfakrit', 'value' => 25), // ��. ������ ������������ ����� (%) +25 
        ),
        '11' => array( // �������
            array('var' => 'gsila',    'value' => 2),  // ���� +2 
            array('var' => 'ginta',    'value' => 2),  // �������� +2 
            array('var' => 'glovk',    'value' => 2),  // �������� +2 
            array('var' => 'gintel',   'value' => 2),  // ��������� +2 
            array('var' => 'ghp',      'value' => 25), // ������� ����� (HP) +25 
            array('var' => 'mfdmag',   'value' => 11), // ������ �� ����� +11 
            array('var' => 'bron4',    'value' => 15), // ����� ��� +15
            array('var' => 'mfdhit',   'value' => 11), // ������ �� ����� +11 
            array('var' => 'mfuvorot', 'value' => 35), // ��. ����������� (%) +35 
        )
    );

    $charms['���������� ���� [3]'] = array(
        '8' => array( // ����
            array('var' => 'gsila',   'value' => 2),  // ���� +2 
            array('var' => 'ginta',   'value' => 3),  // �������� +3 
            array('var' => 'glovk',   'value' => 3),  // �������� +3 
            array('var' => 'gintel',  'value' => 3),  // ��������� +3 
            array('var' => 'mfdhit',  'value' => 16), // ������ �� ����� +16 
            array('var' => 'mfdmag',  'value' => 16), // ������ �� ����� +16 
            array('var' => 'bron1',   'value' => 22),  // ����� ������ +22
        ),
        '11' => array( // �������
            array('var' => 'gsila',  'value' => 2),  // ���� +2 
            array('var' => 'gsila',  'value' => 3),  // ���� +3
            array('var' => 'ginta',  'value' => 3),  // �������� +3 
            array('var' => 'glovk',  'value' => 3),  // �������� +3 
            array('var' => 'gintel', 'value' => 3),  // ��������� +3 
            array('var' => 'ghp',    'value' => 35), // ������� ����� (HP) +35 
            array('var' => 'bron4',  'value' => 22), // ����� ��� +22
        )
    );

    /////////// ���������� �������� ///////////////////////////////////////////////////////

    $charms['���������� �������� [1]'] = array(
        '9' => array( // ��������
            array('var' => 'gsila',     'value' => 1),  // ���� +1 
            array('var' => 'ginta',     'value' => 1),  // �������� +1 
            array('var' => 'glovk',     'value' => 1),  // �������� +1 
            array('var' => 'gintel',    'value' => 1),  // ��������� +1 
            array('var' => 'mfcontr',   'value' => 2),  // ��. ���������� (%) +2 
            array('var' => 'mfhitp',    'value' => 1),  // ��. �������� ����� (%) +1 
            array('var' => 'mfparir',   'value' => 1),  // ��. ����������� (%) +1
            array('var' => 'mfkritpow', 'value' => 1),  // ��. �������� ����. ����� (%) +1 
            array('var' => 'mfkrit',    'value' => 10), // ��. ������������ ����� (%) +10
        ),
        '22' => array( // ������
            array('var' => 'gsila',   'value' => 1),  // ���� +1 
            array('var' => 'ginta',   'value' => 1),  // �������� +1 
            array('var' => 'glovk',   'value' => 1),  // �������� +1 
            array('var' => 'gintel',  'value' => 1),  // ��������� +1 
            array('var' => 'mfhitp',  'value' => 1),  // ��. �������� ����� (%) +1 
            array('var' => 'mfparir', 'value' => 1),  // ��. ����������� (%) +1
        ),
        '23' => array( // �����
            array('var' => 'gsila',   'value' => 1),  // ���� +1 
            array('var' => 'ginta',   'value' => 1),  // �������� +1 
            array('var' => 'glovk',   'value' => 1),  // �������� +1 
            array('var' => 'gintel',  'value' => 1),  // ��������� +1 
            array('var' => 'ghp',     'value' => 10), // ������� ����� (HP) +10 
            array('var' => 'mfdhit',  'value' => 5),  // ������ �� ����� +5 
            array('var' => 'mfdmag',  'value' => 5),  // ������ �� ����� +5 
            array('var' => 'bron3',   'value' => 7),  // ����� ����� +7 
        )
    );

    $charms['���������� �������� [2]'] = array(
        '9' => array( // ��������
            array('var' => 'gsila',     'value' => 2),  // ���� +2 
            array('var' => 'ginta',     'value' => 2),  // �������� +2 
            array('var' => 'glovk',     'value' => 2),  // �������� +2 
            array('var' => 'gintel',    'value' => 2),  // ��������� +2 
            array('var' => 'mfhitp',    'value' => 2),  // ��. �������� ����� (%) +2 
            array('var' => 'mfparir',   'value' => 2),  // ��. ����������� (%) +2 
            array('var' => 'mfkritpow', 'value' => 2),  // ��. �������� ����. ����� (%) +2 
            array('var' => 'mfkrit',    'value' => 25), // ��. ������������ ����� (%) +25 
            array('var' => 'bron3',     'value' => 15),  // ����� ����� +15
        ),
        '22' => array( // ������
            array('var' => 'gsila',         'value' => 2),  // ���� +2 
            array('var' => 'ginta',         'value' => 2),  // �������� +2 
            array('var' => 'glovk',         'value' => 2),  // �������� +2 
            array('var' => 'gintel',        'value' => 2),  // ��������� +2 
            array('var' => 'mfhitp',        'value' => 2),  // ��. �������� ����� (%) +2 
            array('var' => 'mfparir',       'value' => 2),  // ��. ����������� (%) +2
            array('var' => 'mfauvorot',     'value' => 25), // ��. ������ ����������� (%) +25 
            array('var' => 'mfshieldblock', 'value' => 3),  // ��. ����� ����� (%) +3 
        ),
        '23' => array( // �����
            array('var' => 'gsila',  'value' => 2),  // ���� +2 
            array('var' => 'ginta',  'value' => 2),  // �������� +2 
            array('var' => 'glovk',  'value' => 2),  // �������� +2 
            array('var' => 'gintel', 'value' => 2),  // ��������� +2 
            array('var' => 'ghp',    'value' => 25), // ������� ����� (HP) +25 
            array('var' => 'mfdhit', 'value' => 11), // ������ �� ����� +11 
            array('var' => 'mfdmag', 'value' => 11), // ������ �� ����� +11
        )
    );

    $charms['���������� �������� [3]'] = array(
        '9' => array( // ��������
            array('var' => 'gsila',   'value' => 3),  // ���� +3 
            array('var' => 'ginta',   'value' => 3),  // �������� +3 
            array('var' => 'glovk',   'value' => 3),  // �������� +3 
            array('var' => 'gintel',  'value' => 3),  // ��������� +3 
            array('var' => 'mfhitp',  'value' => 3),  // ��. �������� ����� (%) +3 
            array('var' => 'mfparir', 'value' => 3),  // ��. ����������� (%) +3
        ),
        '22' => array( // ������
            array('var' => 'gsila',   'value' => 3),  // ���� +3 
            array('var' => 'ginta',   'value' => 3),  // �������� +3 
            array('var' => 'glovk',   'value' => 3),  // �������� +3 
            array('var' => 'gintel',  'value' => 3),  // ��������� +3 
            array('var' => 'mfparir', 'value' => 3),  // ��. ����������� (%) +3
        ),
        '23' => array( // �����
            array('var' => 'gsila',  'value' => 3),  // ���� +3 
            array('var' => 'ginta',  'value' => 3),  // �������� +3 
            array('var' => 'glovk',  'value' => 3),  // �������� +3 
            array('var' => 'gintel', 'value' => 3),  // ��������� +3 
            array('var' => 'mfdhit', 'value' => 16), // ������ �� ����� +16 
            array('var' => 'mfdmag', 'value' => 16), // ������ �� ����� +16 
            array('var' => 'bron3',  'value' => 22), // ����� ����� +22
        )
    );

    /////////// ���������� ��������� ///////////////////////////////////////////////////////

    $charms['���������� ��������� [1]'] = array(
        '1' => array( // ������
            array('var' => 'gsila',     'value' => 1),  // ���� +1 
            array('var' => 'ginta',     'value' => 1),  // �������� +1 
            array('var' => 'glovk',     'value' => 1),  // �������� +1 
            array('var' => 'gintel',    'value' => 1),  // ��������� +1 
            array('var' => 'ghp',       'value' => 10), // ������� ����� (HP) +10  
            array('var' => 'mfdhit',    'value' => 5),  // ������ �� ����� +5 
            array('var' => 'mfdmag',    'value' => 5),  // ������ �� ����� +5
            array('var' => 'mfcontr',   'value' => 2),  // ��. ���������� (%) +2 
            array('var' => 'mfhitp',    'value' => 1),  // ��. �������� ����� (%) +1 
            array('var' => 'mfuvorot',  'value' => 15), // ��. ����������� (%) +15 
            array('var' => 'mfauvorot', 'value' => 15), // ��. ������ ����������� (%) +15
        ),
        '2' => array( // ��������
            array('var' => 'gsila',     'value' => 1),  // ���� +1 
            array('var' => 'ginta',     'value' => 1),  // �������� +1
            array('var' => 'glovk',     'value' => 1),  // �������� +1
            array('var' => 'gintel',    'value' => 1),  // ��������� +1
            array('var' => 'ghp',       'value' => 10), // ������� ����� (HP) +10
            array('var' => 'mfdhit',    'value' => 5),  // ������ �� ����� +5 
            array('var' => 'mfdmag',    'value' => 5),  // ������ �� ����� +5
            array('var' => 'mfcontr',   'value' => 2),  // ��. ���������� (%) +2
            array('var' => 'mfhitp',    'value' => 1),  // ��. �������� ����� (%) +1
            array('var' => 'mfauvorot', 'value' => 10), // ��. ������ ����������� (%) +10 
            array('var' => 'mfparir',   'value' => 1),  // ��. ����������� (%) +1 
        )
    );

    $charms['���������� ��������� [2]'] = array(
        '1' => array( // ������
            array('var' => 'gsila',         'value' => 2),  // ���� +2 
            array('var' => 'ginta',         'value' => 2),  // �������� +2 
            array('var' => 'glovk',         'value' => 2),  // �������� +2 
            array('var' => 'gintel',        'value' => 2),  // ��������� +2 
            array('var' => 'ghp',           'value' => 25), // ������� ����� (HP) +25 
            array('var' => 'mfdhit',        'value' => 11),  // ������ �� ����� +11
            array('var' => 'mfdmag',        'value' => 11),  // ������ �� ����� +11 
            array('var' => 'mfhitp',        'value' => 2),  // ��. �������� ����� (%) +2 
            array('var' => 'mfparir',       'value' => 2),  // ��. ����������� (%) +2 
            array('var' => 'mfshieldblock', 'value' => 3),  // ��. ����� ����� (%) +3 
        ),
        '2' => array( // ��������
            array('var' => 'gsila',     'value' => 2),  // ���� +2
            array('var' => 'ginta',     'value' => 2),  // �������� +2
            array('var' => 'glovk',     'value' => 2),  // �������� +2
            array('var' => 'gintel',    'value' => 2),  // ��������� +2
            array('var' => 'ghp',       'value' => 25), // ������� ����� (HP) +25
            array('var' => 'mfdhit',    'value' => 11), // ������ �� ����� +11
            array('var' => 'mfdmag',    'value' => 11), // ������ �� ����� +11
            array('var' => 'mfcontr',   'value' => 2),  // ��. ���������� (%) +2
            array('var' => 'mfhitp',    'value' => 2),  // ��. �������� ����� (%) +2
            array('var' => 'mfparir',   'value' => 2),  // ��. ����������� (%) +2
            array('var' => 'mfkritpow', 'value' => 2),  // ��. �������� ����. ����� (%) +2
        ),
        '5' => array( // ������
            array('var' => 'gsila',     'value' => 1),  // ���� +1
            array('var' => 'ginta',     'value' => 1),  // �������� +1
            array('var' => 'glovk',     'value' => 1),  // �������� +1
            array('var' => 'gintel',    'value' => 1),  // ��������� +1
            array('var' => 'ghp',       'value' => 10), // ������� ����� (HP) +10
            array('var' => 'mfdhit',    'value' => 5),  // ������ �� ����� +5
            array('var' => 'mfdmag',    'value' => 5),  // ������ �� ����� +5
            array('var' => 'mfhitp',    'value' => 1),  // ��. �������� ����� (%) +1
            array('var' => 'mfparir',   'value' => 1),  // ��. ����������� (%) +1
        )
    );

    $charms['���������� ��������� [3]'] = array(
        '1' => array( // ������
            array('var' => 'gsila',     'value' => 3),  // ���� +3
            array('var' => 'ginta',     'value' => 3),  // �������� +3
            array('var' => 'glovk',     'value' => 3),  // �������� +3
            array('var' => 'gintel',    'value' => 3),  // ��������� +3
            array('var' => 'mfdhit',    'value' => 16), // ������ �� ����� +16
            array('var' => 'mfdmag',    'value' => 16), // ������ �� ����� +16
            array('var' => 'mfhitp',    'value' => 3),  // ��. �������� ����� (%) +3
            array('var' => 'mfparir',   'value' => 3),  // ��. ����������� (%) +3
        ),
        '2' => array( // ��������
            array('var' => 'gsila',     'value' => 3),  // ���� +3
            array('var' => 'ginta',     'value' => 3),  // �������� +3
            array('var' => 'glovk',     'value' => 3),  // �������� +3
            array('var' => 'gintel',    'value' => 3),  // ��������� +3
            array('var' => 'mfdhit',    'value' => 16), // ������ �� ����� +16
            array('var' => 'mfdmag',    'value' => 16), // ������ �� ����� +16
            array('var' => 'mfhitp',    'value' => 3),  // ��. �������� ����� (%) +3
            array('var' => 'mfparir',   'value' => 3),  // ��. ����������� (%) +3
            array('var' => 'mfakrit',   'value' => 35), // ��. ������ ������������ ����� (%) +35
        ),
        '5' => array( // ������
            array('var' => 'gsila',     'value' => 2),  // ���� +2
            array('var' => 'ginta',     'value' => 2),  // �������� +2
            array('var' => 'glovk',     'value' => 2),  // �������� +2
            array('var' => 'gintel',    'value' => 2),  // ��������� +2
            array('var' => 'ghp',       'value' => 25), // ������� ����� (HP) +25
            array('var' => 'mfdhit',    'value' => 11), // ������ �� ����� +11
            array('var' => 'mfdmag',    'value' => 11), // ������ �� ����� +11
            array('var' => 'mfhitp',    'value' => 2),  // ��. �������� ����� (%) +2
            array('var' => 'mfparir',   'value' => 2),  // ��. ����������� (%) +2
        )
    );

    ////////////////////////////////// ����������� ////////////////////////////////////////////////////////


    // �������� ������
    $charm = mysql_fetch_assoc(mysql_query("SELECT id, name FROM `inventory` WHERE `id` = '{$_GET['use']}' AND `owner` = '$user[id]' LIMIT 1;"));
    // �������� �������
    $item  = mysql_fetch_array(mysql_query("
            SELECT id, name, type, destinyinv, opisan, artefact, dvur
            FROM `inventory` 
            WHERE 
                owner    = '{$user['id']}' AND 
                name     = '" . mysql_real_escape_string($_POST['target']) . "' AND
                dressed  = 0 AND
                artefact = 0 AND
                (type = 3 OR type = 9 OR type = 4 OR type = 10 OR type = 5 OR type = 2 OR type = 1 OR type = 8 OR type = 11 OR type = 22 OR type = 23)
            LIMIT 1
        ")
    );
    
    if (!isset($charms[$charm['name']]) || !isset($item['id']) || !isset($charms[$charm['name']][$item['type']])) { // ��������� ������, ��������� �������, ��������� ������������ �������� ������
        echo '������������ ��� �������� ��� ������������ ������.';
    } elseif (mt_rand(1, 100) > $magic['chanse']) { // ���� �� �������� ����
        echo '������ ���������� � ����� �����.';
        $bet=1;
    } else { // �����������
        // ���� ��������� ������, �� ������ ����������� ������
        if ($item['dvur'] && $item["type"] == 3) {
            $charms[$charm['name']][$item['type']] = $charms1[$charm['name']][$item['type']];
        }
        // �������� ������ ��������� �������
        $rnd = mt_rand(0, count($charms[$charm['name']][$item['type']]) - 1);
        $set = $charms[$charm['name']][$item['type']][$rnd];
        // ������� ���������� ������, ���� ���
        $oldChEff = mysql_fetch_assoc(mysql_query("SELECT * FROM charmed_items WHERE id = $item[id]"));
        if ($oldChEff) {
            mysql_query("UPDATE inventory SET $oldChEff[variable]  = ($oldChEff[variable] - $oldChEff[value]) WHERE id = $item[id] AND owner = $user[id]");
        }
        // ���������� ����� ������ �����������
        mysql_query("REPLACE INTO charmed_items SET id = $item[id], variable = '$set[var]', value = '$set[value]'");
        // ������ ��������� � �������
        mysql_query("
            UPDATE inventory 
            SET 
                $set[var]  = ($set[var] + $set[value]), 
                opisan     = '" . mysql_real_escape_string("<b>��������:</b> $charm[name] (" . $charmsEff[$set['var']] . " +$set[value])") . "',
                destinyinv = " . (($item['destinyinv'] == 2) ? 2 : 1) . " 
            WHERE id = $item[id] AND owner = $user[id]
        ");
        echo '��� ������ �������.';
        // ������� ������
        $bet=1;
    }

}

?>
