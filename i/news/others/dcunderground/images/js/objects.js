 var imP1 = 'images/';
 var imP11 = 'images/obj/';
 var imP12 = 'images/mobs/';
 var imP2 = 'images/';
 var imP21 = 'images/objects/';
 var imP3 = 'images/items/';
 var imP4 = 'images/klan/';
 var imP50 = 'images/chars/0/';
 var imP51 = 'images/chars/1/';
 var imP41 = 'images/misc/icons/';
 var imP42 = 'images/misc/micro/';
 var d1 = 'filter: invert()';
 var d2 = 'images/destiny.gif';
 var d3 = '���� ������� ����� ������ ����� ������� � ������, ��� ������� ���.';
 var d4 = 'images/podarok.gif';
 var d5 = '�������. ������� ������ ��������.';
 var d6 = 'filter: gray()';
 var d7 = '���� ������� ����� ������ ����� ������� � ������, ��� ������ ���.';
//'+imP41+'

 	var features = {
//���
		oceanFountain: {
name: '������ ����������',icon: imP11 + 'fountain2.gif', src: imP21 + 'well03.png',
descr: '�� �������� "�������� �������"'
		},
		denyingFountain: {
name: '������ ���������',icon: imP11 + 'fountaindeny.gif', src: imP21 + 'well06.png',
descr: '����� ��������� ������ ������� "��������� ���������." �� �� ��� ��� ������...������� �������� � ������ <b>������� ����</b>. �������� �������� ���� ������ �������� �� �������.'
		},
		chest: {
name: '������',icon: imP11 + 'sunduk.gif',src: imP21 + 'smag_collect1.png',
descr: '� ������� ����� �����: <b>����� ���, ������ ������(��), ������� ������(��), ������ �������� �������,</b> ������ <b>����� ����������,</b> � ������ � ������ �� �����...������ ����� "�������" ���� ���� ������� �� �������.'
		},
		greatDenyingFountain: {
name: '������ ����������',icon: imP11 + 'fountaindeny.gif', src: imP21 + 'well06.png',
descr: '����� �������� <b>"������� ����� ���������".</b> ������ ������ �������, ���������� ����������� ������. ����� ������� ��� �������� �� �������...�� �� ��� ��� ������, ������� ������ ���� �������� � ������.'
		},
		plusFifteenFountain: {
name: '������ ������������ ���',icon: imP11 + 'fountain.gif', src: imP21 + 'fontan.png',
descr: '����� �������� <b>"�������� ����", "�������� ��������", "�������� ������������",</b> ��� <b>"�������� ������".</b> ������ ������ �������, ��������� ����������� ������. ����� ������� ��� ����� �������. ��� ������ ������� ���������� ����� ���� �������� � ������. '
		},
		lostMastersCupel: {
name: '����������� ���������� ������� ��������',icon: imP11 + 'lmc.gif',src: imP21 + 'well08.png',
descr: '��������� �����������, �������� � ������������ ����������� �� �����������, � ���� ���������� ����� ������� ��������� �������� �����. �������� ��������� ��������� � ������� ��������.<br>��, ���� ������, ��� ������ ��������� <b>��������� ���� �3.</b> ������� ��� �� ������ <b>E5.</b><br>����� �������:</br><b>������ �����</br>������� �����</br>������ ��������� �����</br>������ ���������� �����</br>������ ����������� ����</br>������ ���������� ����</br>������ ������� ���������<br>�������� ����������</b></br>'
		},
gritlab:{name:'����������� �����',icon: imP11 + 'gritlab.gif', src: imP21 + 'p1k_gritlab.png',
descr: '��� ������� ������� <img src="'+imP41+'p1k_summoner.gif" />"������ ������� �����" + 20 ��."���� �������������" � 20 ��. "������� ������" ����� �������� "�������� ��� ������� �������"<br /> ������������ ����� ������ ���� �� �������. '
		}, 
gralt:{name:'�����������',icon: imP11 + 'gralt.gif', src: imP21 + 'p1k_altar.png',
descr: '���� "�������� ��� ������� �������" ����� ������� ���������� ����� ������ �� ������ F17 4�� �����'
		},
grcrt:{name:'���������� �����',icon: imP11 + 'kart.gif',w:50, h:70,src: imP21 + 'p1k_holst.png',
descr: '���������, ���� ������ � ������ "�������" �����, ��������� ��� ������� ����� ���������� ����.<br /> ���� �� �������� ��� ��������� ������� <img src="'+imP41+'p1k_summon_killer.gif" />"�������� ����� ����", �� �� �������� � �� �������� ������ ���� ������.'
		}, 
		pottbl: {
name: '��������� ���������',icon: imP11 + 'sign1.gif',w:67, h:45, src: imP21 + '2/sign1.png',
descr: '�� ������... ������ ������� � ������ �����.'
		},
  //chestcap41: {
//name: '���������� ������ + ������ ������',icon: imP11 + 'chest24.gif',src: imP11 + 'chest24.png',
//descr: '� <b>"���������� �������"</b> ����� �����: ����� ��������� ���, ����������� �������, �������������� ������� 120HP. <BR />� <b>"������� ������"</b> �� ������ <BR /><b>������� ����� ����� �������</b> - <img src='+imP3+'key_amul_1.gif width="32" height="32">.'
	//	},
  chestcap42: {
name: '�������� �������� + ������ ������',icon: imP11 + 'chest24.gif',src: imP11 + 'chest24.png',
descr: '� <b>"�������� ��������"</b> ����� �����: ����� ��������� ���, ����������� �������, �������������� ������� 120HP. <BR />� <b>"������� ������"</b> �� ������ <BR /><b>������ ����� ����� �������</b> - <img src='+imP3+'key_amul_2.gif width="32" height="32">.'
		},
  chestcap43: {
name: '������ ������', icon: imP11 + 'chest04.gif',src: imP21 + 'chest04.png',
descr: '� <b>"������� ������"</b> �� ������ <b>����� ����� ����� �������</b> - <img src='+imP3+'key_amul_3.gif width="32" height="32">.'
		},
  chestcap5: {
//name: '���������� ������',icon: imP11 + 'chest02.gif',src: imP21 + 'chest02.png',
//descr: '� <b>"���������� �������"</b> ����� �����: ����� ��������� ���, ����������� �������, �������������� ������� 120HP'
		},
  chestcap51: {
name: '���������� ������',icon: imP11 + 'chest03.gif',src:  imP11 + 'chest03.png',
descr: '� �� ����� <b>���� �� ������������</b> - <img src='+imP3+'Key_0_TR.gif width="32" height="32">,<BR /> � ������� �������� ����������� ������� �� <b>N5</b>.'
		},
		chestcap52: {
name: '�������� ��������',icon: imP11 + 'smagcollect1.gif',src: imP21 + 'smag_collect1_1.png',
descr: '� �� ����� ����� ����� ��������� ���, ����������� �������, �������������� ������� 120HP. '
		},
  //chestcap531: {
//name: '���������� ������ + ������ ������',icon: imP11 + 'chest24.gif',src: imP11 + 'chest24.png',
//descr: '� <b>"���������� �������"</b> ����� �����: ����� ��������� ���, ����������� �������, �������������� ������� 120HP  <BR />� <b>"������� ������"</b> �� ������ <b>������ ����� ����</b> -<img src="'+imP3+'key_TR_1.gif" width="32" height="32"  /> '
	//	},
 // chestcap532: {
//name: '���������� ������ + ������ ������',icon: imP11 + 'chest24.gif',src: imP11 + 'chest24.png',
//descr: '� <b>"���������� �������"</b> ����� �����: ����� ��������� ���, ����������� �������, �������������� ������� 120HP <BR />� <b>"������� ������"</b> �� ������ <b>����� ����� ����</b> -<img src="'+imP3+'key_TR_5.gif" width="32" height="32"  /> '
		//},
  chestcap54: {
name: '������ ������', icon: imP11 + 'chest04.gif',src: imP21 + 'chest04.png',
descr: '� <b>"������� ������"</b> �� ������ <b>������ ����� ����</b> - <img src="'+imP3+'key_TR_2.gif" width="32" height="32"  /> '
		},
  chestcap541: {
name: '������ ������', icon: imP11 + 'chest04.gif',src: imP21 + 'chest04.png',
descr: '� <b>"������� ������"</b> �� ������ <b>������ ����� ����</b> - <img src="'+imP3+'key_TR_3.gif" width="32" height="32"  /> '
		},
  chestcap542: {
name: '������ ������', icon: imP11 + 'chest04.gif',src: imP21 + 'chest04.png',
descr: '� <b>"������� ������"</b> �� ������ <b>�������� ����� ����</b> - <img src="'+imP3+'key_TR_4.gif" width="32" height="32"  /> '
		},





//����

  doorsnd: {
name: '���� � �����������', icon: imP11 + 'door1.gif',w:126, h:87, src: imP21 + '1/door2.png',
descr: '��� ������� ����� "���� �� ���������������� �����������".'
		},
  outsd: {
name: '�����',icon: imP11 + 'enter1.gif', src: imP21 + 'les1up1.png',
descr: '����� �� 4� ���� � ������ G2.'
		},
		lastLadder2: {
name: '���������� ���������',icon: imP11 + 'sar2.gif',src: imP21 + '2/sar2.png',
descr: '����� �� 4� ���� � ������ G2.'
		},
		lastLadder22: {
name: '���������� ���������',icon: imP11 + 'sar2.gif',src: imP21 + '2/sar2.png',
descr: '����� �� �����������. <br><font color=red>��� ������ �������� �������� �� ��������� ������ - 90 ����� � ������� ������</font><br> ����� ��������� ���� �3'
		},
		sign1: {
name: '���������',icon: imP11 + 'sign1.gif',w:67, h:45, src: imP21 + '2/sign1.png',
descr: '�������� - �������, ����������� - ������, ���� �������� ���.'
		},
		sign2: {
name: '���������',icon: imP11 + 'sign1.gif',w:67, h:45, src: imP21 + '2/sign1.png',
descr: '�������� �� ������ �� ������� (��� ����� ������ �� ��������), ����� ���������. ����� �������.'
		},
		strslpr: {
name: '������ ���� � ��������� ����',icon: imP11 + 'strslpr.gif',w:80, h:80, src: imP11 + 'strslprbig.gif',
descr: '����� ����� ��������� ������ ������� '
		},
  fntsd: {
name: '������ �����������������',icon: imP11 + 'lmc.gif',src: imP21 + 'well08.png',
descr: '����� ���� �������� �� �� ��� ����, ������ ������� ������� �����.'
		},
		gardsand: {
name: '�������',icon: imP11 + 'gard.gif',src: imP21 + 'grate.png',
descr: '��� ������� ��������� "���� �������� �������" '
		},
		gardsand2: {
name: '�������',icon: imP11 + 'gard.gif',src: imP21 + 'grate.png',
descr: ''
		},
		gardsand3: {
name: '�������',icon: imP11 + 'gard.gif',src: imP21 + 'grate.png',
descr: '��� ������� ��������� "���� �� ������������ ���������" '
		},
		vagsd: {
name: '�������',icon: imP11 + 'vagon.gif',src: imP21 + 'lorry01.png',
descr: '�� ������ ����� �����: ������� �������, ��������� ������ �������, ������� ������.'
		},
		otxsd: {
name: '������',icon: imP11 + 'glmusweap.gif',w:95, h:50, src: imP21 + '1/mus_weap.png',
descr: '�� ������ ����� �����: ������� �������, ��������� ������ �������, ������� ������, ����� ������, ������� �����.'
		},

		sdkey1: {
name: '���� �������',icon: imP11 + 'keystand.gif', src: imP3 + 'pm_key.gif',
descr: '������ ��� ��������� ��������. '
		},
		sdkey2: {
name: '���� �������� �������',icon: imP11 + 'keystand.gif', src: imP3 + 'pm_key.gif',
descr: '������ ��� ��������� ��������� � �����.'
		},
		sdkey3: {
name: '���� �� ���������������� �����������',icon: imP11 + 'keystand.gif', src: imP3 + 'pm_key.gif',
descr: '����� ��� ������� � ��������� � �������.'
		},
		sdkey4: {
name: '���� �� ������������ ���������',icon: imP11 + 'keystand.gif', src: imP3 + 'pm_key.gif',
descr: '���� �� ������������ ��������� �� ��������� �����.'
		},


		chestsd1: {
name: '������ &mdash; �������',icon: imP11 + 'sunduk.gif',src: imP21 + 'smag_collect1.png',highlight:1,
descr: '� ������� ������ �������, � ��� ����� ���-�� �����, � ������ � ������ �� �����.'
		}, 

  chestsd3: {
name: '������',icon: imP11 + 'chest03.gif',src: imP21 + 'chest03.png',highlight:1,
descr: '� ������� ������ �������, � ��� ����� ���-�� �����, � ������ � ������ �� �����.'
		},

  nnsd: {
name: '���������� �����',icon: imP11 + 'nnsd.gif',src: imP21 + 'pm_wall_nn.png',
descr: '�� ����� ��� 3 ����� ��������������� ������, � � ��� ���� 1 ��������<br />�� ����� ��� 3 ����� ��������������� ������, � � ��� ���� 1 �������� ������� �����<br /> ����� ����� �������� ��������� ������ �� ������ ��� ������, �� 2 � 1.'
		},

		plavsd: {
name: '���������� �����',icon: imP11 + 'plavsd.gif',src: imP21 + 'pm_furnace.png',
descr: '�������� ����� ����� ��������: 3 ������� ������� + ������� ������ = 1 ��������� ������ �������<br />4 ������ c����� + ������� ������ = 1 ������ ���������� �������.<br />��������� - ����� ������������� - �� ������ ����� ������.'
		},

		secondFloorLadder: {
name: '����� �� ������ ����',icon: imP11 + 'ladder1.gif',src: imP21 + 'les1down1.png',
descr: '�������� �� ������ � �����������, �� ��������� �� ������� ����� <strong>H2</strong>'
		},
//


  input: {
name: '����',icon: imP11 + 'enter1.gif', src: imP21 + 'les1up1.png',
descr: ''
		},
		oneWayPass: {
name: '������������� ������',icon: imP11 + 'arrow0.gif', src: imP11 + 'arrow0.gif',
descr: ''
		},
		oneWayPass2: {
name: '������������� ������',icon: imP11 + 'arrow1.gif', src: imP11 + 'arrow1.gif',
descr: ''
		},
		oneWayPass3: {
name: '������������� ������',icon: imP11 + 'arrow1.gif', src: imP11 + 'arrow1.gif',
descr: ''
		},
		oneWayPass4: {
name: '������������� ������',icon: imP11 + 'arrow1.gif', src: imP11 + 'arrow1.gif',
descr: ''
		},
		oneWayPass5: {
name: '������������� ������-��������',icon: imP11 + 'arrow1.gif', src: imP11 + 'arrow1.gif',
descr: '��������� �� ������ <b>J6</b>. <br>��� ������������ ���������� ������ �� ������ � ����������� �� ��.'
		},
		Enterlabirint: {
name: '����',icon: imP11 + 'arrow1.gif', src: imP11 + 'arrow1.gif',
descr: '����� �� ��������� �� <b>K4</b>'
		},
		laddercap45: {
name: '������� �� ����� ����',icon: imP11 + 'arrow1.gif', src: imP11 + 'arrow1.gif',
descr: '������ �� ������ <b>H20</b> �� ��������� �� 5� �����, �� ������ <b>B11</b>. ����� ��������.'
		},
	laddercap5: {
name: '����� � ��������� �����',icon: imP11 + 'arrow1.gif', src: imP11 + 'arrow1.gif',
descr: '������ � ������ <b>H19</b> 4�� ����� �� ��������� �� 5� �����, �� ������ <b>B11</b>. ����� ��������.'
		},
		emmeraldEnter: {
name: '����',icon: imP11 + 'arrow1.gif', src: imP11 + 'arrow1.gif',
descr: ''
		},
		emmeraldRepare: {
name: '���� � ����������',icon: imP11 + 'door2.gif', src: imP21 + '1_front_door.png',
descr: '����� �� ������� ��������������� ���� ���������.'
		},
enterDem22: {
name: '����',icon: imP11 + 'arrow1.gif', src: imP11 + 'arrow1.gif',
descr: '����� �� ������� ������� �� ������ <b>J19</b> '
		},
		enterDem31: {
name: '�������� ����',icon: imP11 + 'arrow1.gif', src: imP11 + 'arrow1.gif',
descr: '� ������ ������������� � �������, �� ������� ������� ����������������, ������ � ���. ����� �� ������� ������� �� <b>K23</b> '
		},
		enterDem32: {
name: '��������� ����',icon: imP11 + 'arrow1.gif', src: imP11 + 'arrow1.gif',
descr: '����� �� ������� ������� ����� �� <b>K10</b> '
   		},
enterDem33: {
 name: '������������� ������',icon: imP11 + 'arrow1.gif', src: imP11 + 'arrow1.gif',
   descr: ''
		},
		enterDem41: {
	name: '����',icon: imP11 + 'arrow1.gif', src: imP11 + 'arrow1.gif',
descr: '����� �� ��������� ������������ � <b>����&nbsp;����������</b> (������ ����, ������ <b>�3</b>) '
		},
		teleport1: {
name: '������ � ���� �����',icon: imP11 + 'telport.gif', src: imP21 + 'teleport02.png',
descr: '������ ������������� � �������������� ��������� ���������, ���������������� �� ������ ����, �� ������ <strong>K4</strong>'
		},
		teleport124: {
name: '������',icon: imP11 + 'telportblue.gif', src: imP21 + 'teleport01.png',
descr: '���������� �� <b>4</b> ���� � ������ ���������.<br />��� ����������� ��������� ����� ��������� ���� �������.'
		},
		teleport2: {
name: '��������',icon: imP11 + 'telport.gif', src: imP21 + 'teleport02.png',
descr: '���������� �� ������ <strong>I3</strong>. <br>��� ����������� ���������� ��������� ������ H4-H6-F6-F4.'
		},
		teleport3: {
name: '��������',icon: imP11 + 'telportblue.gif', src: imP21 + 'teleport01.png',
descr: '���������� �� ������ <strong>I9</strong>. ������ ������ �� ��������� �� ������ <strong>H9</strong>, �������� ������ ���.'
		},
		teleport4: {
name: '��������',icon: imP11 + 'telport.gif', src: imP21 + 'teleport02.png',
descr: '��������� ����, ���������� �� ������ <strong>B6</strong>'
		},
		teleport5: {
name: '�������� &mdash; ������� ������',icon: imP11 + 'telport.gif', src: imP21 + 'teleport02.png',
descr: '�� �������, ��� ���� ������� ������� � ���� ��������� ������� ��� <strong>������� ��������� ������</strong>, ����� ��� ����.'
		}, 
		teleport32: {
name: '��������',icon: imP11 + 'telport.gif', src: imP21 + 'teleport02.png',
descr: '���������� � ������ <strong>F3</strong> ������� �����, ��� ������ ����� ��������� ������ ������'
		},
		teleport33: {
name: '��������',icon: imP11 + 'telport.gif', src: imP21 + 'teleport02.png',
descr: '���������� � ������ <strong>�2</strong> �������� �����, ��� ������ ����� ��������� ������� ������'
		},
		teleport41: {
name: '��������',icon: imP11 + 'telportblue.gif', src: imP21 + 'teleport01.png',
descr: '������ ���������� � �����������, ��������� <strong>���� �1</strong> � ������� �� <strong>L3</strong>. �������� ���� �� ������ <strong>S7</strong>'
		},
		teleport51: {
name: '�������� - ������ � �������',icon: imP11 + 'telportblue.gif', src: imP21 + 'teleport01.png',
descr: '��������� ��� �� ������ <strong>D9</strong>, ��� ������ ���� ��������� ������.'
		},
		teleport52: {
name: '����� �� ������ ����',icon: imP11 + 'ladder1.gif', src: imP21 + 'les1down1.png',
descr: '����� �� ������ ����, � ������ <strong>H2</strong>'
		},
		teleportdem31: {
name: '�������� �� ��������� ����',icon: imP11 + 'telportblue.gif', src: imP21 + 'teleport01.png',
descr: '�������� �� ��������� ����, � ������ <strong>B11</strong>'
		},
teleportdemshut: {
name: '������ ����',icon: imP11 + 'teleport07.gif', src: imP21 + 'teleport07.png',
descr: '� ������� ����� ������� ���� ����� ������� ����� �� 4 ����, � ������ <strong>D11</strong>'
		},
teleportdemchern: {
name: '������ �������������',icon: imP11 + 'teleport06.gif', src: imP21 + 'teleport06.png',
descr: '� ������� ����� ������� ������������� ����� ������� ����� �� 3 ���� (�� ������� �������������), � ������ <strong>�3</strong>'
		},
teleportdemepisk: {
name: '������ ��������',icon: imP11 + 'teleport05.gif', src: imP21 + 'teleport05.png',
descr: '� ������� ����� ������� �������� ����� ������� ����� �� 3 ���� (�� ������� ��������), � ������ <strong>U2</strong>'
		},
kkstoneshut: {
name: '������ ������� ����',icon: imP11 + 'kk_stone_3_4.gif', src: imP3 + 'kk_stone_3_4.gif',
descr: '� ������� ����� �����, ����� ������ ���� ����� ������� ����� �� 4 ����, � ������ <strong>D11</strong>.<BR /> ��� ����� � ������ ������ ��������.'
		},
kkstonechern: {
name: '������ ������� �������������',icon: imP11 + 'kk_stone_2_3ch.gif', src: imP3 + 'kk_stone_2_3ch.gif',
descr: '� ������� ����� ����� ����� ������ ������������� ����� ������� ����� �� 3 ���� (�� ������� �������������), � ������ <strong>B2</strong>.<BR /> ��� ����� � ������ ������ ��������.'
		},
kkstoneepisk: {
name: '������ ������� ��������',icon: imP11 + 'kk_stone_2_3e.gif', src: imP3 + 'kk_stone_2_3e.gif',
descr: '� ������� ����� ����� ����� ������ �������� ����� ������� ����� �� 3 ���� (�� ������� ��������), � ������ <strong>U2</strong>.<BR /> ��� ����� � ������ ������ ��������.'
		},
		teleportem21: {
name: '������ ����',icon: imP11 + 'telport.gif', src: imP21 + 'teleport03.png',
descr: '�������� � ������ <strong>H2</strong>'
		},
		teleportem22: {
name: '������������ �����',icon: imP11 + 'telport.gif', src: imP21 + 'teleport03.png',
descr: '��� ���������, ����� ��������� � ������ <strong>H10</strong>, � ������ � ������ <strong>H4</strong>'
		},
		teleportem23: {
name: '������������ �����',icon: imP11 + 'telport.gif', src: imP21 + 'teleport03.png',
descr: '��� ���������, ����� ��������� � ������ <strong>F6</strong>, � ������ � ������ <strong>H6</strong>'
		},
		teleportem24: {
name: '������������ ����',icon: imP11 + 'telport.gif', src: imP21 + 'teleport03.png',
descr: '��������, ��������� � ������ <strong>H8</strong>, �� ���� �� ������ ����� <strong>��������� ����</strong>'
		},
		teleportem25: {
name: '������ � �������',icon: imP11 + 'telportblue.gif', src: imP21 + 'teleport01.png',
descr: '�� ��������'
		},
		teleportem26: {
name: '������������ ����',icon: imP11 + 'telport.gif', src: imP21 + 'teleport03.png',
descr: '�������� � ������ <strong>C8</strong>'
		},
		teleportcap4: {
name: '��� � �������������',icon: imP11 + 'telportgreen.gif', src: imP21 + 'teleport04.png',
descr: '�� ��������� � ���������, ��  ������ <strong>H13</strong>'
		},
		teleportcap41: {
name: '��������',icon: imP11 + 'teleport06.gif', src: imP21 + 'teleport06.png',
descr: '���������� � ������ <strong>H19</strong>.'
		},
		teleportcap42: {
name: '��������',icon: imP11 + 'teleport06.gif', src: imP21 + 'teleport06.png',
descr: '���������� � ������ <strong>I8</strong>.'
		},


		intelFountain: {
name: '������ �������� ������',icon: imP11 + 'fountainintel.gif', src: imP21 + 'chalice01.png',
descr: ' ��� ������ ���������� ����� ����� �� ������� <b>H6,E6,G7<b>. ��� ������� �� �������.'
		},
		fountdem31: {
name: '������',icon: imP11 + 'fountainintel.gif', src: imP21 + 'chalice01.png',
descr: '����� �������� <strong>���������</strong>'
		},
		ghostFountain: {
name: '������ ����������� ���',icon: imP11 + 'fountainintel2.gif', src: imP21 + 'well02.png',
descr: ' � ���� ������� �� ������ ������������� ������ ������ �� ������������ ������ ������, <a href="http://www.darkclan.ru/cgi/lib.pl?p=altar" target="_blank" class="TLink"><font color="#0000FF">�����������</font></a>. '
		},
		ghostPowerFountain: {
name: '������ ���������� ����',icon: imP11 + 'fountainintel2.gif', src: imP21 + 'well02.png',                                                      
descr: ' � ���� ������� �� ������ ������������� ������ ������ �� ��������� ������ ������, <a href="http://www.darkclan.ru/cgi/lib.pl?p=altar" target="_blank" class="TLink"><font color="#0000FF">�����������</font></a>.'
		},
		antidotFountain: {
name: '������',icon: imP11 + 'fountainintel.gif', src: imP21 + 'chalice01.png',
descr: '����� �������� <strong>�������</strong>. ������� �� ���. '
		},

		fountainEm31: {
name: '������ ������� ��������',icon: imP11 + 'fountaindeny.gif', src: imP21 + 'well06.png',
descr: ''
 		},
 
		liteLiveFountain: {
name: '������ ������ �����',icon: imP11 + 'well04.gif', src: imP21 + 'well04.png',
descr: '����� �������� ������� <strong>������ ����� �����</strong>. ����� ����������������� ������� <strong>��</strong> (+600��). <br \> ����� ������� ����.'
		},
		liteLiveFountainem21: {
name: '������ ������ �����',icon: imP11 + 'well04.gif', src: imP21 + 'well04.png',
descr: '����� �������� ������� <b>������ ������ �����</b>. ����� ����������������� ������� <strong>��</strong> (+600��).<br \> ����� ������� ����. <br \>����� ��������� �������� �� ������ <strong>C10</strong>.'
		},
		memoryFountain: {
name: '������ ������������',icon: imP11 + 'well07.gif', src: imP21 + 'well07.png',
descr: '���� ����� ������� �������� �������� ������������...</i><br><img src="'+imP41+'standart_poison.gif" /> <br \>����� �������� - <strong>(�������������� HP (%): +80)</strong>, �� ������ �����, ����������� �� ������� �������, ������� ���: <br \><i><strong>"������� �����"</strong>�������������� HP(%):-80</i> <br \>������ ����� �� ����������, ����� ������ ���� - ��������: <br \><i><strong>"������� �����*5"</strong>�������������� HP(%)-400</i> <br \> ������ ������ 3 ����.'
		},
		emmeraldFountain1: {
name: '������ ���������� �������',icon: imP11 + 'fountain.gif', src: imP21 + 'well05.png',
descr: ' , ��� ������ ������� ���������� ����� ���� � ������ � ��������� �� ������ H11. ����� ������� ����. '
		},
		demFountain31: {
name: '������ ����� �����',icon: imP11 + 'fountain.gif', src: imP21 + 'well05.png',
descr: ' '
		},
		key1: {
name: '���� � ������� ������',icon: imP11 + 'key.gif', src: imP3 + 'Key1.gif',
descr: ' (������ �5).<br \>���� ������ �� ���� ����� ��������� ����, �� �� ��� ������� ��� ����� ������� ����. '
		},
		key2: {
name: '���� �� ����� �� ������ ����, ����� �������� �� D8',icon: imP11 + 'key21.gif', src: imP3 + 'Key2.gif',
descr: ''
		},
		key3: {
name: '����, ��������� ���������� �� J8',icon: imP11 + 'key3.gif', src: imP2 + 'items/Key3.gif',
descr: ''
		},

		key35: {
name: '��������� ���� �3',icon: imP11 + 'key3.gif', src: imP3 + 'Key3.gif',
descr: '��������� ��� ������� ����� ����� �� <strong>Q7</strong>'
		},
		firstFloorLadder: {
name: '�������� �� ������ ����',icon: imP11 + 'ladder1.gif', src: imP21 + 'les1down1.png',
descr: '������ ���� ��� ��������� ������� � �����, �� ����� ���������� ���� �� ������, �� ��������� ��� � ������ <strong>D2</strong>'
		},
		firstFloorLadder2: {
name: '����� �� ������ ����', icon: imP11 + 'ladder1.gif', src: imP21 + 'les1down1.png',
descr: '�������� ��������, �������������, ��� ������� ����� �������� �� <strong>F2</strong>'
		},
		firstFloorLadder31: {
name: '�������� �1',icon: imP11 + 'ladder1.gif',src: imP21 + 'les1down1.png',
descr: '����� �� 2� ����, �� ��������� �� ������ (<strong>J2</strong>)'
		},
		firstFloorLadder32: {
name: '�������� �2',icon: imP11 + 'ladder1.gif',src: imP21 + 'les1down1.png',
descr: '����� �� 2� ����, �� ��������� �� ������ <strong>B2</strong> ������� �����.'
		},

		secondFloorLadder2: {
name: '����� �� ������ ����',icon: imP11 + 'ladder1.gif',src: imP21 + 'les1down1.png',
descr: '�������� �� ������ � �����������, �� ��������� �� ������� ����� <strong>(G2)</strong>'
		},
		lastLadder: {
name: '�����',icon: imP11 + 'ladder1.gif',src: imP21 + 'les1down1.png',
descr: ''
		},
		ladderem21: {
name: '����� �� ������ ����',icon: imP11 + 'ladder1.gif',src: imP21 + 'les1down1.png',
descr: ''
		},
		ladderEm31: {
name: '����� �� ��������� ����', icon: imP11 + 'ladder1.gif',src: imP21 + 'les1down1.png',
descr: '���������������� ���� �������, �� ������� � ���������� ��� ������� ����������.'
		},

  chest1dem1: {
name: '������',icon: imP11 + 'sunduk.gif',highlight:1,src: imP21 + 'smag_collect1.png',
descr: '�� ������� ����� ����� �����������, ��������� "������� ������", "��������� � �����", ������������� �������, ������ �������, � ������ ������ �� ����� ��� ��������� �� �������.'
		},
		chest1ang1: {
name: '������',icon: imP11 + 'chest03.gif',src: imP21 + 'chest03.png',
descr: '����� �����: <b>"�������� �����"</b>.<br>����� ����� ���� �� �������.'
		},
		chest1ang: {
name: '������',icon: imP11 + 'chest02.gif',src: imP21 + 'chest02.png',
descr: '����� ����� <b>"���������� ������ �3"</b> - <img src='+imP3+'Key23.gif width="32" height="32">'
		},
		chest2ang1: {
name: '������',icon: imP11 + 'chest2.gif',src: imP21 + 'chest01.png',
descr: '� ��������� ������������ ����� �����: <b>��� �� 400 ��</b>.'
		},
		chest2ang2: {
name: '������',icon: imP11 + 'chest2.gif',src: imP21 + 'chest01.png',
descr: '����� �����: <b>��������� ������</b>.'
		},
		chest3ang: {
name: '������',icon: imP11 + 'chest2.gif',src: imP21 + 'chest01.png',
descr: '����� �����: ��������� ����, ��� �� 5 ��. ����� ����� 2� �� �������.'
		},
		chest2angdang: {
name: '������ &mdash; �������',icon: imP11 + 'chest03.gif',src: imP21 + 'chest03.png',highlight:1,
descr: '� ������� �������, �� ������ ������.'
		},
		chest2: {
name: '������ &mdash; �������',icon: imP11 + 'sunduk.gif',src: imP21 + 'smag_collect1.png',highlight:1,
descr: '� ������� �������, ������� �� ��� ��� ���� - ������, �� ���� �������.'
		},

		chest3: {
name: '������ &mdash; �������',icon: imP11 + 'sunduk.gif',src: imP21 + 'smag_collect1.png',highlight:1,
descr: '� ���� ������� �������.'
		},
			chest4: {
name: '������ &mdash; �������',icon: imP11 + 'sunduk.gif',src: imP21 + 'smag_collect1.png', highlight:1,
descr: '�� ������� ����� <b>���� �1</b> - <img src='+imP3+'Key1.gif width="32" height="32">. ����� ��� ������ ��������� �� ������ <strong>S6</strong>.  '
		},
		chestdem31: {
name: '������ &mdash; �������', icon: imP11 + 'chest04.gif',src: imP21 + 'chest04.png', highlight:1,
descr: '  �� � ������� �������'
		},
		chestdem32: {
name: '������', icon: imP11 + 'chest04.gif',src: imP21 + 'chest04.png',
descr: ' '
		},
		chestdem41: {
name: '������', icon: imP11 + 'smag_collect1_3.gif',src: imP21 + 'smag_collect1_3.png',
descr: '�� ������� ����� ����� <b>���������� ������ �4</b> - <img src='+imP3+'Key24.gif width="32" height="32">'
		},
		chestdem42: {
name: '������', icon: imP11 + 'smag_collect1_4.gif',src: imP21 + 'smag_collect1_4.png',
descr: '�� ������ ����� ����� ������ �����������.'
		},
		chestdem43: {
name: '������', icon: imP11 + 'smag_collect1_1.gif',src: imP21 + 'smag_collect1_1.png',
descr: '�������� ������ �� �����������. ��������, ���� ����� ���� �������� ������������ �������...<br>�� ������ ����� <b>��������� ���� �4</b> - <img src='+imP3+'Key4.gif width="32" height="32"> ����������� <b>����� � ����������</b>.</ br>����� ����� ���� �������� "��������". ������� ������� �������� ������ �� <b>�7</b>.'
		},
		chest5: {
name: '������', icon: imP11 + 'smagcollect1.gif',src: imP21 + 'smag_collect1_1.png',
descr: '�� ������� ����� <strong>������� �������������� �����</strong> - <img src='+imP3+'key_cube_1.gif width="32" height="32">.'
		},
		chest51: {
name: '������', icon: imP11 + 'smagcollect1.gif',src: imP21 + 'smag_collect1_1.png',
descr: '�� ������� ����� <strong>������� �������������� �����</strong> - <img src='+imP3+'key_cube_2.gif width="32" height="32">.'
		},
		chest12: {
name: '������',icon: imP11 + 'chest2.gif',  highlight:1,src: imP21 + 'chest01.png',
descr: '����� ���� �������, ����� ����� ����������.'
		},
  		chest121: {
name: '������',icon: imP11 + 'chest2.gif', highlight:1,src: imP21 + 'chest01.png',
descr: '����� ���� �������, ����� ����� ��� �� 10��. ��� �������������� ������� 60HP ��� ����������.'
		},
		chest22: {
name: '������',icon: imP11 + 'chest02.gif', highlight:1,src: imP21 + 'chest02.png',
descr: '� ��������, ������ ������� �������, ����� ������� ������������ ������ ����, �� ����� � �� �������, � ����� � ������� ����.'
		},
		chestenter: {
name: '������ - ��������',icon: imP11 + 'sunduk.gif',highlight:1,src: imP21 + 'smag_collect1.png',
descr: '�������� �� ���� ����������.'
		},
  chest02dem3: {
name: '������ &mdash; �������', icon: imP11 + 'chest02.gif',src: imP21 + 'chest02.png', highlight:1,
descr: '  �� � ������� �������, ��������� 1000��'
		},
		chestEm31: {
name: '�������� ��� �����',icon: imP11 + 'sunduk.gif',src: imP21 + 'smag_collect1.png',
descr: '�� ������� ����� ���: "�������� �����"'
		},


  gardang: {
name: '�������',icon: imP11 + 'gard.gif',src: imP21 + 'grate.png',
descr: '��� ������� ��������� "��������� ���� �3" '
		},
		gard1: {
name: '�������',icon: imP11 + 'grate01.gif',src: imP21 + 'grate01.png',
descr: '��� ������� ����� ���� �� ������������.'
		},
		doorcap5: {
name: '����', icon: imP11 + 'door1.gif',w:126, h:87, src: imP21 + '1/door2.png',
descr: '��� ������� ��������� <b>���������� ����</b>'
		},
		altar: {
name: '������',icon: imP11 + 'altar.gif',src: imP21 + 'altar01.png',
descr: '������, ������� �������� ��������� ������ - ���� � ������ �������. ��� ��������� �� ������ <b>J9</b>, �� ������������ ��������� ����������� ������. ������� �� �����, ����� � ������� ����.'
		},
		altar2: {
name: '������ &mdash; �������',icon: imP11 + 'altar.gif',src: imP21 + 'altar01.png',highlight:1,
descr: '������ ������������� ������� ��������� ��� ������������� �� ���� �� 3 �� 6 �����. <Br /><img src="'+imP41+'standart_curse.gif" /><br /><b>"�������������� ������:</b> <Br /><strong>&ndash; ������ �����"</strong> (����������� ��������� ����������� +25) 3�.<Br /><b>&ndash; �����"</b> (������� ����� (HP) +30), �� 6 �.<Br /><b>&ndash; �����������"</b> (�������������� HP (%): +50), �� 3 �. <Br /><b>&ndash; ����"</b> (����: +5), �� 6 �.<Br /> <b>&ndash; ��������"</b> (��������: +5), �� 6 �.<Br /><b>&ndash; ������������"</b> (��������: +5), �� 6 �. <br /><b>"��������� ������:</b><Br /> <strong>&ndash; ������ �����"</strong> (������������ ��������� �����������: +25, ����������� ��������� �����������: -25) �� 3 �. <Br /><b>&ndash; �����"</b> (������� ����� (HP) -30), �� 6 �.,<Br /><b>&ndash; �����������"</b> (�������������� HP (%): -50), �� 3 �. <Br /><b>&ndash; ����"</b> (����: -5), �� 6 �.<Br /><b>&ndash; ��������"</b> (��������: -5), �� 6 �.<Br /><b>&ndash; ������������"</b> (��������: -5), �� 6 �. <br /><b>����� �� ������ ����� �����:</b>  '
		},
		altar21: {
name: '������ &mdash; �������',icon: imP11 + 'altar.gif',src: imP21 + 'altar01.png',highlight:1,
descr: '������ ������������� ������� ���� �� ������� �� -700��  <br /><b>����� �� ������ ����� �����:</b>  '
		},
		altar4: {
name: '������ ��������',icon: imP11 + 'altar.gif',src: imP21 + 'altar01.png',
descr: '����� ������� <b>"������������� ����"</b> <br /><img src='+imP3+'key_cube_2.gif width="32" height="32">+<img src='+imP3+'key_cube_1.gif width="32" height="32">=<img src='+imP3+'key_cube_3.gif width="32" height="32">.<br> ��������� ��� ����� ������� ���������. '
		},
		altar5: {
name: '������ ��������',icon: imP11 + 'altar.gif',src: imP21 + 'altar01.png',
descr: '����� ������� <b>���� �������</b> ��� ������� ��� 3 ������ � <b>���������� ����</b> ��� ������� � 5 ������'
		},
		lab: {
name: '�����������',icon: imP11 + 'lab.gif',src: imP21 + 'lab01.png',
descr: '����� ������� ������ ������, �� �� ������ ��� 3 ������ �� �����, �� ������� ����� ������� � �� ����� 10 ������� �� �������.<Br />���� � ��� ���� ������������ ��������, �� ��������� �� ���������� ����� ���������� � �������� �������&nbsp;<img src='+imP3+'mater_shop7.gif width=30 height=30> .<Br /> ��������� ������� Angelscity ������ �������� �� ������ ��� ��������� �� ��������� �������.<Br /><strong>��������:</strong><font color=red>�������� �� ����������� ����� �������.</font>'
		},
		lab2: {
name: '�����������',icon: imP11 + 'lab.gif',src: imP21 + 'lab01.png',
descr: '����� ������� ������ <b>�����������</b>, ��������� <b>�������������&nbsp;����</b>. ��� ������ ���������� ��������� "��������".'
		},
		lab1: {
name: '������� ����������',icon: imP11 + 'lab.gif',src: imP21 + 'lab01.png',
descr: '����� �������: �������������� ������� +45HP, ����� ��������� ���, ������� ����� - ������ �������� 1-6 ��������� - ����� ������ �� ������ ���������.'
		},

		cavern: {
name: '�������',icon: imP11 + 'cavern.gif',src: imP21 + '2/duffer.png',
descr: '�� ������� ����� �����:  �����, ������, ������ ������� ��� ������ �� �����, � ����� �� ������ ���������� �� �������.<br>����� ����� ���� �� �������.'
		},
		cavern1: {
name: '�������',icon: imP11 + 'cavern.gif',src: imP21 + '2/duffer.png',
descr: '����� �� ������ � ������������� �� ������ �� ������� �������, ����� �� ��, ��� ������ <strong>����� �������</strong>, �� ������� � "�����" � �������� �����, ������ <strong>B9</strong>.'
		},
		cavern2: {
name: '�������',icon: imP11 + 'cavern.gif',src: imP21 + '2/duffer.png',
descr: '����� �� "������", ����� �� �� �� ��������� �� ������ - <strong>B10</strong>'
		},
		cavern3: {
name: '�������',icon: imP11 + 'cavern.gif',src: imP21 + '2/duffer.png',
descr: '����� �� "������", ����� �� �� �� ��������� �� ������ <strong>B8</strong>'
		},
		pot: {
name: '�����&ndash;�������', icon: imP11 + 'pot.gif',src: imP21 + 'boiler01.png', highlight:1,
descr: '����� �������� ����������� ����, ������������� � �����. <br /><b>����� ����� ����� �����</b>: '
		},
		kuzn: {
name: '����������',icon: imP11 + 'kuzn.gif',src: imP21 + 'forge01.png',
descr: '������ ����������� �������� ������� - �� ����� ������� 2. ������ ���� �������� � 1 ��� �� �����.  ������������� �������� �������� ����� �������.'
		},
		vagon: {
name: '�������',icon: imP11 + 'vagon.gif',src: imP21 + 'lorry01.png',
descr: '�� ������ ����� �����: ������� ��� �������� �������'
		},
		vagon1: {
name: '�������',icon: imP11 + 'vagon.gif',src: imP21 + 'lorry01.png',
descr: '������ �����.'
		},
		bed: {
name: '�������',icon: imP11 + 'bed.gif',src: imP21 + 'bed01.png',
descr: '����� ��������� ������� �������.'
		},
		bed1ang: {
name: '�������',icon: imP11 + 'bed.gif',src: imP21 + 'bed01.png',
descr: '����� ��������� ��������� ���� � ������� �������.'
		},


		brik: {
name: '������', icon: imP11 + 'brik.gif', highlight:2,w:60, h:30, src: imP21 + 'kamen1.png',
descr: '� ������ �� ������ �� ������� ����� ��� ���� ����������, �������� ���������, � ���� ������ �������� ������� �� +15, �� ���� ����� � ��� ���������� ������������� �������� ��� ������ �������, �� ��������������� ���.'
		},
		brik1: {
name: '������', icon: imP11 + 'kamen.gif',w:60, h:30, src: imP21 + 'kamen.png',
descr: '���� ���� ������ � �� ���������, �� �� �����: <strong>��������� ���������</strong>, ���� �������, �� �������� ������ ������ "������". ����� ���, ���� �� ����� ��� ���������� �������.'
		},
		proboina: {
name: '�������������� �������', icon: imP11 + 'proboina.gif',highlight:1, w:60, h:30, src: imP21 + 'proboina.png',
descr: '������ �� �� ��, �� ����� �������� ���� ������, ���������� � ����-�������� ������ � ����� <strong>������� (D14)</strong>'
		},
  proboina2: {
name: '�������������� �������', icon: imP11 + 'proboina2.gif',highlight:1, w:60, h:30, src: imP21 + 'proboina2.png',
descr: '������ �� �� �� � ������ �� �������, ��� ����������� �� ������ ���� � ������ <strong>B14</strong>'
		},
		proboina3: {
name: '�������������� �������', icon: imP11 + 'proboina.gif',highlight:1, w:60, h:30, src: imP21 + 'proboina.png',
descr: '���� �� ��� ����� ��������, �� ������ �� �� �� ����������� �� ������ <strong>U2</strong>'
		},
		proboina4: {
name: '�������������� �������', icon: imP11 + 'proboina2.gif',highlight:1, w:60, h:30, src: imP21 + 'proboina2.png',
descr: '������ �� �� ��, �� ������� ������ ����������� �� ������ ���� � ������ <strong>B2</strong>'
		},
		proboina5: {
name: '�������', icon: imP11 + 'proboina.gif',w:60, h:30, src: imP21 + 'proboina.png',
descr: '������ �� �����...'
		},
		probenter: {
name: '����', icon: imP11 + 'proboina.gif',w:60, h:30, src: imP21 + 'proboina.png',
descr: '����� <strong>�������������� �������</strong> �� ������ ����� (<strong>B9</strong>)'
		},
		probenter2: {
name: '����', icon: imP11 + 'proboina.gif',w:60, h:30, src: imP21 + 'proboina.png',
descr: '����� �������������� ������� � �������(<strong>J19</strong>)'
		},
		drainbottom1: {
name: '��������', icon: imP11 + 'drain_bottom.gif',w:60, h:30, src: imP21 + 'drain_bottom.png',
descr: '����� ��������� <strong>C�����&nbsp;��������</strong>(0/1), ����� ���������, ���� ��� ������� ����� ������� ���� ����� �������.'
		},
		drainbottom2: {
name: '��������', icon: imP11 + 'drain_bottom.gif',w:60, h:30, src: imP21 + 'drain_bottom.png',
descr: '�� ����������� ���������� ������ ����������, ������� ����������� ��� ���, � ������ ��� ���, �� ��� ������������� �������, ���, �� ����� ������ ������&#8230;'
		},
		drainbottom3: {
name: '��������&ndash;�������', icon: imP11 + 'drain_bottom.gif',highlight:1, w:60, h:30, src: imP21 + 'drain_bottom.png',
descr: '�� ������������� �� ����� �� ������ ����, �� ������ ���������, ����� ��� ������� ����� ����������� �������, ������� ������ �������� �����, �� ��� � ���������� ������, ������� �������� ��� �� ������ �6.'
		},
		drainbottom4: {
name: '������ ��������', icon: imP11 + 'drain_bottom.gif',w:60, h:30, src: imP21 + 'drain_bottom.png',
descr: '<strong>����� �� ������ ����</strong>. ��� ���� ����� ���������, ���� ������ �� ����.'
		},
		draintop: {
name: '��������', icon: imP11 + 'draintop.gif',w:60, h:27, src: imP21 + 'drain_top.png',
descr: ''
		},
		drainenter: {
name: '���� ����� ��������', icon: imP11 + 'drain_bottom.gif',w:60, h:27, src: imP21 + 'drain_bottom.png',
descr: '����������� �������� ��������� �����������, �� ���������� �� ������ ����.'
		},
		stat1: {
name: '������ ���������', icon: imP11 + 'stat1.gif',w:60, h:105, src: imP21 + 'stat1.png',
descr: '<em>������������� ������� ���� ����������� ������������ ����������, ���������� �� ��������������� ������� � ������-���� ���� �������</em> ��������� �� ���������� ����� ��������, ���������� ����� ������ �������� (�����������-������������� ������� ����������), ���� �� ������� ������&#8230;'
		},
		stat2: {
name: '������', icon: imP11 + 'stat2.gif',w:60, h:105, src: imP21 + 'stat2.png',
descr: '�� ������ ����������, ��� ��� ���������� ������������ ������ &laquo;������� �� ������&raquo;, �� ��� ��������� ������������, ����� ������� - ��������, � ������ ��� ��� ���������, ��� ��������� ��� ����, � �������...'
		},
		stat3: {
name: '������', icon: imP11 + 'stat3.gif',w:60, h:105, src: imP21 + 'stat3.png',
descr: '����� �������� ������, �� ������&ndash;�� ����� ��������� ������� ������ �� ������ � ���� �� ����, � ��� ��������, ���������� ������������� �����������.'
		},
		skelet1: {
name: '��������� ������', icon: imP11 + 'skelet1.gif', highlight:1,w:100, h:50, src: imP21 + 'skelet1.png',
descr: '�������, ���� �� -1000��, ���� ������ �� ����, �� ����� ����� ������������� ������ ����.'
		},
skelet12: {
name: '��������� ������', icon: imP11 + 'skelet1.gif',w:100, h:50, src: imP21 + 'skelet1.png',
descr: '���� ������ �� ����, �� ����� ���-������ �����, �������� ������ �������.'
		},
		skelet31: {
name: '��������� ������', icon: imP11 + 'skelet1.gif', highlight:1,w:100,h:50,src: imP21 + 'skelet1.png',
descr: '�������, ���� �� -1000��'
		},
		garbage: {
name: '���� ������', icon: imP11 + 'garbage.gif', highlight:1,w:102, h:49, src: imP21 + 'trash02.png',
descr: '������ ��������� ����������� �� ������� �������, ����� �������� �������: <img src="'+imP41+'standart_disease.gif" /> <br/><strong>� "���������� �����" </strong>(��������: -6) - �� 6�.<br/><strong>� "������� ������" </strong>(��������: -6) �� 6�.<br/><strong>� "���������� ����" </strong>(����: -6) �� 6�.<br/><strong>� "������� ��������" </strong>(����: -2, ��������: -2, ��������: -2) �� 3�.<br/><strong>� "���������" </strong>(������ �� �����: -10) �� 3�. <BR /><strong>� "������ ������"</strong> ��. ����� -20%, ��. ��������� -25%, ��. ������� -30%, ��. ����������� -25%  - �� 36 �.<br/>� ������ � ��� <img src="'+imP41+'standart_poison.gif" /> ��������:<br/><strong>� "������� �����"</strong>�������������� HP(%):-40<br/>  � ��� ���������� �� ������ ����� �����, ������� ���-�� �������� - ������ ������� ����� � ������. �� ���� ������, ����� ����� ������. '
		},
		barrikada: {
name: '���������', icon: imP11 + 'barrikada.gif',w:126, h:87, src: imP21 + 'barrikada.png',
descr: '�������, �� ��� �� �������������� ���� ���������� �����������, ���� � ��� ������������ ��������� ��������� ����� ���������������, �� ������������ ���������� �� ��������� ����.'
		},
		barrikada1: {
name: '���������', icon: imP11 + 'barrikada.gif',w:126, h:87, src: imP21 + 'barrikada.png',
descr: '������ ����������������...'
		},
		barrikadadem3: {
name: '�����', icon: imP11 + 'landslip01.gif',w:126, h:87, src: imP21 + '1/landslip01.png',
descr: '������ ���-�� ������� ������, ��� �� ������.'
		},
		door: {
name: '����', icon: imP11 + 'door1.gif',w:126, h:87, src: imP21 + '1/door2.png',
descr: ''
		},
		door1: {
name: '�����', icon: imP11 + 'door1.gif',w:126, h:87, src: imP21 + '1/door2.png',
descr: '��������� ���� �3.'
		},
		door2: {
name: '�����', icon: imP11 + 'door1.gif',w:126, h:87, src: imP21 + '1/door2.png',
descr: ''
		},
		door3: {
name: '���� � ����������', icon: imP11 + 'door1.gif',w:126, h:87, src: imP21 + '1/door2.png',
descr: '��� ����� ��������� <b>��������� ���� �4</b> ����������� � ������� �� <b>K8</b>'
		},
		gobelin01: {
name: '�������', icon: imP11 + 'gobelin01.gif',w:113, h:65, src: imP21 + '1/dec_gobelin02.png',
descr: '�� ������� ����������� �� ������� �������� ��������, �� �� �����������, ������� ��� ����� �����������. ��� �����, ��� �� ����������� ����������� �������������, �� �������� �������������� �������� �� ��������������. ������� �������� ������� �� �����, �� � ���� �� �������.'
		},
		gobelin02: {
name: '�������', icon: imP11 + 'gobelin02.gif',w:113, h:65, src: imP21 + '1/dec_gobelin01.png',
descr: '�������...'
		},
		gobelin03: {
name: '�������', icon: imP11 + 'gobelin01.gif',w:113, h:65, src: imP21 + '1/dec_gobelin02.png',
descr: '�������...'
		},
  		danger00: {
name: '��������� �������', icon: imP11 + 'danger.gif', highlight:1,src: imP11 + 'danger_big.gif',
descr: '1� ����������� ����� �������� �� -1000��, ������ ���������.'
		},
		danger01: {
name: '��������� �������', icon: imP11 + 'danger.gif', highlight:1,src: imP11 + 'danger_big.gif',
descr: '�� ������ �������� �� -1000��, ������ ���������. '
		},
		dangerdem3: {
name: '��������� �������', icon: imP11 + 'danger.gif', highlight:1,src: imP11 + 'danger_big.gif',
descr: '������� ���� � % �� ������������� ���������� ��, ������ ���������, �������� � ��� �������.'
		},
		danger011: {
name: '��������� �������', icon: imP11 + 'danger.gif', highlight:1,src: imP11 + 'danger_big.gif',
descr: '�������� �� ��� ������ �� ��� ������� "�����" � ������ <b>�19</b>'
		},
		danger02: {
name: '������� &mdash; ��������', icon: imP11 + 'danger2.gif', highlight:1,src: imP11 + 'danger2_big.gif',
descr: '����� � ��� �� ������������� ����������� � ������ <b>�8</b>'
		},
		danger021: {
name: '������� &mdash; ��������', icon: imP11 + 'danger2.gif', highlight:1,src: imP11 + 'danger2_big.gif',
descr: '����� � ��� �� ������������� ����������� � ������ <b>B18</b>'
		},
		danger022: {
name: '������� &mdash; ��������', icon: imP11 + 'danger2.gif', highlight:1,src: imP11 + 'danger2_big.gif',
descr: '����� � ��� �� ������������� ����������� � ������ <b>I19</b>'
		},
		danger03: {
name: '������� &mdash; ��������', icon: imP11 + 'danger2.gif', highlight:1,src: imP11 + 'danger2_big.gif',
descr: '����� � ��� �� ������������� ����������� � ������ <b>I18</b>'
		},
		danger04: {
name: '������� &mdash; ��������', icon: imP11 + 'danger2.gif', highlight:1,src: imP11 + 'danger2_big.gif',
descr: '����� � ��� �� ������������� ����������� � ������ <b>O5</b>, ������ ����� ������ ����� � ������ ���� "���� ����������".'
		},
		danger041: {
name: '������� &mdash; ��������', icon: imP11 + 'danger2.gif', highlight:1,src: imP11 + 'danger2_big.gif',
descr: '����� � ��� �� ������������� ����������� � ������ <b>�6</b>.'
		},
		danger042: {
name: '������� &mdash; ��������', icon: imP11 + 'danger2.gif', highlight:1,src: imP11 + 'danger2_big.gif',
descr: '����� � ��� �� ������������� ����������� � ������ <b>G17</b>.'
		},
	danger05: {
name: '��������� �������', icon: imP11 + 'danger.gif', highlight:1,src: imP11 + 'danger_big.gif',
descr: '��������� �������, -1000��.'
		},
	danger06: {
name: '������', icon: imP11 + 'danger.gif', highlight:1,src: imP11 + 'danger_big.gif',
descr: '�������� �� ��� ������, �� ��� ������� "������� ������" � ������ <b>K9</b>, <b>K11</b>, <b>I9</b>, <b>I11</b>.'
		},
	danger07: {
name: '������', icon: imP11 + 'danger.gif', highlight:1,src: imP11 + 'danger_big.gif',
descr: '�������� �� ��� ������, �� ��� ������ "����������".'
		},
		dangercap41: {
name: '������� &mdash; ��������', icon: imP11 + 'danger2.gif', highlight:1,src: imP11 + 'danger2_big.gif',
descr: '����� � ��� �� ������������� ����������� � ������ <b>H16</b>.'
		},
	danger08: {
name: '������', icon: imP11 + 'danger.gif', highlight:1,src: imP11 + 'danger_big.gif',
descr: '�������� �� ��� ������, �� ��� ������� "�����" � ������ <b>�13</b> � <b>�13</b>.'
		},
	danger09: {
name: '������', icon: imP11 + 'danger.gif', highlight:1,src: imP11 + 'danger_big.gif',
descr: '�������� �� ��� ������, �� ��� ������ "�������� �����".'
		},
		throne01: {
name: '���� ����������', icon: imP11 + 'throne01.gif',w:65, h:90, src: imP21 + 'throne01.png',
descr: '�� �����...'
		},
		vumpel01: {
name: '������', icon: imP11 + 'vumpel01.gif',w:92, h:82, src: imP21 + '2/polot.png',
descr: '�������...'
		},
  	zerkalocap: {
name: '�������', icon: imP11 + 'zer.gif',w:65, h:100, src: imP21 + '1/zer.png',
descr: '�������...'
   },
  	weap1: {
name: '���', icon: imP11 + 'weap1.gif',w:76, h:75, src: imP21 + '1/weap1.png',
descr: '�������...'
   },
  	weap2: {
name: '���', icon: imP11 + 'weap2.gif',w:79, h:77, src: imP21 + '1/weap2.png',
descr: '�������...'
   },
  	weap3: {
name: '���', icon: imP11 + 'weap3.gif',w:74, h:87, src: imP21 + '1/weap3.png',
descr: '�������...'
   },
		chestknlz1: {
name: '���������� ������',icon: imP11 + 'chest2.gif',src: imP21 + 'chest01.png',
descr: '����� �� ������ �����: 1-2<b>�����</b>.'
		},
		chestkey1: {
name: '���������� ������ � ���� �1',icon: imP11 + 'chestkey1.gif',src: imP21 + 'chest01.png',
descr: '����� �� ������ �����: <b>�����</b>. ���� �1 �� 2�� �������.'
		},
		chestkey2: {
name: '���������� ������ � ���� �4',icon: imP11 + 'chestkey1.gif',src: imP21 + 'chest01.png',
descr: '����� �� ������ �����: <b>�����</b>. ���� �4 �� ������ �������� 4�� �������.'
		},
		chestknlz2: {
name: '����������� ������',icon: imP11 + 'chest02.gif',src: imP21 + 'chest02.png',
descr: '����� �� ������ �����: <b>����</b>.'
		},
		chestknlz3: {
name: '������ ������',icon: imP11 + 'chest03.gif',src: imP21 + 'chest03.png',
descr: '����� �� ������ �����: <b>�������</b>.'
		},
		sliv: {
name: '����', icon: imP11 + 'proboina.gif',		 w:60, h:30, src: imP21 + 'proboina.png',
descr: '����� �� ���� �� ��������� �� ������ <strong>F3</strong>'
		},
  inputkan: {
name: '����',icon: imP11 + 'enter2.gif',src: imP21 + 'ladder02.png',
descr: ''
		},
  kamluki: {
name: '������� ����',icon: imP11 + 'door3.gif',src: imP21 + '1_front_door2.png',
descr: '���� � ������� ��� ����� ���������� ���� �� ������.'
		},
		gardkan1: {
name: '�������',icon: imP11 + 'grate01.gif',src: imP21 + 'grate01.png',
descr: '������ ����� ������� ����������� � 2� ��������, ��������� ���� �1.'
		},
		gardkan11: {
name: '�������',icon: imP11 + 'grate01.gif',src: imP21 + 'grate01.png',
descr: '������ ����� ������� ����������� � 3� ��������, ��������� ���� �2.'
		},
		gardkan2: {
name: '�������',icon: imP11 + 'grate02.gif',src: imP21 + 'grate02.png',
descr: '������ � ������ �������� 4�� �������, ��������� ���� �3.'
		},
		gardkan21: {
name: '�������',icon: imP11 + 'grate02.gif',src: imP21 + 'grate02.png',
descr: '������ �� ������ �������� 4�� �������, ��������� ���� �4.'
		},                                                 
		gardkan22: {
name: '�������',icon: imP11 + 'grate01.gif',src: imP21 + 'grate01.png',
descr: '������ � �����������������, �������� ���� �5'
		},
		keykan23: {
name: '���� �2 � �3',icon: imP11 + 'keykan23.gif',src: imP11 + 'keykan23.png',
descr: '���� �2 �� 3�� �������, ���� �3 �� ������ �������� 4�� �������. '
		},
		keykan5: {
name: '���� �5',icon: imP11 + 'key5.gif',src: imP21 + 'key5.png',
descr: '���� �5 �� �����������������. '
		},
		trpd: {
name: '�����������',
icon: imP11 + '1_front_walll_tr.gif',src: imP21 + '1_front_walll_tr.png',
descr: '�� ������ <b>����</b> �� ����� ��������� �����������, � ������� <b>���������</b> ����� ��������� <b>�������</b>. '
		},
		drainknlz1: {
name: '��������', icon: imP11 + 'drain_bottom.gif',w:60, h:30, src: imP21 + 'drain_bottom.png',
descr: '����������...'
		},
		drainknlz11: {
name: '��������', icon: imP11 + 'drain_bottom1.gif',w:60, h:30, src: imP21 + 'drain_bottom.png',
descr: '����������...'
		},
		drainknlz12: {
name: '��������', icon: imP11 + 'drain_bottom1.gif', highlight:2,w:60, h:30, src: imP21 + 'drain_bottom.png',
descr: '�� ������ ����� ��� <b>�����</b> '
		},
		drainknlz13: {
name: '��������', icon: imP11 + 'draintop1.gif', highlight:2,w:60, h:27, src: imP21 + 'drain_top.png',
descr: '��������� �� �������� �����. � �� ������ �����.'
		},
		drainknlz14: {
name: '����������� ��������', icon: imP11 + 'draintop1.gif', highlight:2,w:60, h:27, src: imP21 + 'drain_top.png',
descr: '��������� �� ����� �����. ��� ������� <b>"������ �������"</b> � ����� �� <b>"����������� ��������"</b> �� �������� <b>"������� � �������"</b>. ���������� ��� ������ � ���� ������. '
		},




  inputkan1: {
name: '�����',icon: imP11 + 'enter2.gif',src: imP21 + 'ladder02.png',
descr: '�� ��������� � ������ <b>N6</b> ������� �����'
		},
  inputkan2: {
name: '������',icon: imP11 + 'enter2.gif',src: imP21 + 'ladder02.png',
descr: '�� ��������� � ������ <b>D5</b> ������� �����'
		},
		keykan6: {
name: '���� �6',icon: imP11 + 'key6.gif',src: imP21 + 'Key6.png',
descr: '���� �6 �� �������������� ���������. '
		},
		keykan8: {
name: '���� �8',icon: imP11 + 'key8.gif',src: imP21 + 'Key8.png',
descr: '���� �8 �� ������� �������. '
		},
		keykan9: {
name: '���� �9',icon: imP11 + 'key9.gif',src: imP21 + 'Key9.png',
descr: '���� �9 �� ����������������� ���������. '
		},
		chestknlz4: {
name: '������� ������',icon: imP11 + 'chest03.gif',src: imP21 + 'chest03.png',
descr: '�� ������ ����� <b>"������ �������"</b>.'
		},
		chestknlz5: {
name: '���������� ��������',icon: imP11 + 'sunduk.gif',src: imP21 + 'smag_collect1.png',
descr: '� �� ����� ����� <b>������ ����</b>.'
		},
		chestknlz51: {
name: '���������� �������� + ���� �7',icon: imP11 + 'smag_collect1_key7.gif',src: imP11 + 'smag_collect1_key7.png',
descr: '� �������� ����� ����� <b>������ ����</b>, ���� �7 �� ������� ����.'
		},
		chestknlz6: {
name: '��������� ��������',icon: imP11 + 'smag_collect1_2.gif',src: imP21 + 'smag_collect1_2.png',
descr: '� �� ����� ����� <b>����� � �������</b>.'
		},
		chestknlz7: {
name: '������� ��������',icon: imP11 + 'smag_collect1_3.gif',src: imP21 + 'smag_collect1_3.png',
descr: '� �� ����� ����� <b>������� �������</b>.'
		},
		chestknlz8: {
name: '������� ������',icon: imP11 + 'chest03.gif',src: imP21 + 'chest03.png',
descr: '����� �� ������ �����: <b>������ �������</b>.'
		},
		sliv1: {
name: '����', icon: imP11 + 'proboina.gif',w:60, h:30, src: imP21 + 'proboina.png',
descr: '����� �� ���� ��, ��������� �� ������ <strong>N6</strong>'
		},
		potkan: {
name: '����',icon: imP11 + 'pot.gif',src: imP21 + 'boiler01.png',
descr: '"���".'
		},
		pech1: {
name: '�������������',icon: imP11 + 'w_pech2.gif',src: imP21 + '1/w_pech2.png',
descr: '����� �������: �������������� ������� +45HP, ����� ��������� ���, ������� ����� - ������ �������� 1-6 ��������� - ����� ������ �� ������ ���������.'
		},
	dangerkan1: {
name: '������', icon: imP11 + 'danger.gif', highlight:1,src: imP11 + 'danger_big.gif',
descr: '�������� �� ��� ������ �� ��� ������ "�������� ������" ������������ �� �����, ����� � �� ����... '
		},
	dangerkan2: {
name: '��������� �������', icon: imP11 + 'danger.gif', highlight:1,src: imP11 + 'danger_big.gif',
descr: '�������� �� ��� ������ �������� ���� �� -1000��.'
		},
	zkliuk1: {
name: '����� � ���������', icon: imP11 + 'zkliuk.gif',src: imP21 + 'zk_liuk_2.png',
descr: '���� ������ � ���������! - ����� ����� � ����. �������� �� ��� �� ������������� � "���������" (3� ����).'
		},
	zkliuk2: {
name: '����������� ���������� - �� ����� ��ܨ�!!!', icon: imP11 + 'zkliuk.gif',src: imP21 + 'zk_liuk_1.png',
descr: '���� �� � ���� ��� ���� ������� - ��������� �� ������ <b>k10</b> - �� ���� ������ ������� �� -1000, ������ ���.'
		},
		trash: {
name: '������������� ������',icon: imP11 + 'trash01.gif',w:102, h:49, src: imP21 + 'trash01.png',
descr: '� �� ����� ����� <b>������ �����</b>.'
		},
		trash1: {
name: '������� ����������',icon: imP11 + 'garbage.gif',w:102, h:49, src: imP21 + 'trash02.png',
descr: '� �� ����� ����� <b>������� ����</b>.'
		}, 
		gardkan3: {
name: '�������',icon: imP11 + 'grate01.gif',src: imP21 + 'grate01.png',
descr: '������ � ������������� ���������, �������� ���� �6'
		},
		gardkan31: {
name: '�������',icon: imP11 + 'grate01.gif',src: imP21 + 'grate01.png',
descr: '������ � ����� 1, �������� ���� �7'
		},                                                    
		gardkan32: {
name: '�������',icon: imP11 + 'grate01.gif',src: imP21 + 'grate01.png',
descr: '������ � ����� 2, �������� ���� �7'
		},                                                    
		gardkan33: {
name: '�������',icon: imP11 + 'grate01.gif',src: imP21 + 'grate01.png',
descr: '������ � ����� 3, �������� ���� �7'
		},                                                    
		gardkan34: {
name: '�������',icon: imP11 + 'grate01.gif',src: imP21 + 'grate01.png',
descr: '������ � ����� 4, �������� ���� �7'
		},                                                    
		gardkan4: {
name: '�������',icon: imP11 + 'grate02.gif',src: imP21 + 'grate02.png',
descr: '������ � ������ �������, ��������� ���� �8.'
		},                                                                   
		gardkan41: {
name: '�������',icon: imP11 + 'grate02.gif',src: imP21 + 'grate02.png',
descr: '������ � ���������������� ���������, ��������� ���� �9.'
		},
	dangerkan: {
name: '������', icon: imP11 + 'danger.gif', highlight:1,src: imP11 + 'danger_big.gif',
descr: '�������� �� ��� ������ �� ��� ������ <b>"������� ������"</b>, �� ������ � ��� ������, ���� �� ��������� �� �����!'
		},
		kuznang: {
name: '���������� ������� ��������',icon: imP11 + 'kuzn.gif',src: imP2 + 'objects/forge01.png',
descr: '�� ������� ��������������   '
		},
		kuznsnd: {
name: '���������� ������� ��������',icon: imP11 + 'kuzn.gif',src: imP2 + 'objects/forge01.png',
descr: '�� ������� ��������������  '
		},
		kuzndem: {
name: '���������� ������� ��������',icon: imP11 + 'kuzn.gif',src: imP2 + 'objects/forge01.png',
descr: '�� ������� ��������������  '
		},
		dangercap5: {
name: '��������� �������', icon: imP11 + 'danger.gif', highlight:1,src: imP11 + 'danger_big.gif',
descr: '��������� �������, �������� �� ��� ������ �� ��� ������� ���� � ������ <b>M16</b>'
		},
		dangercap51: {
name: '��������� �������', icon: imP11 + 'danger.gif', highlight:1,src: imP11 + 'danger_big.gif',
descr: '��������� �������, �������� �� ��� ������ �� ��� ������� ���� � ������ <b>I9</b> � <b>J10</b>'
		},
		enterGG: {
name: '����',icon: imP11 + 'arrow1.gif',src: imP11 + 'arrow1.gif',
descr: ''
		},
		gghole1: {
name: '���� � �����', highlight:2,icon: imP11 + 'gghole1.gif',src: imP21 + 'gghole1.png',
descr: '��������� �� ��������� �����. � ��� ��������� ���� <img src="'+imP3+'gg_key1.gif" width="32" height="32"/>"�������� �������" �� "��������� �������" �� F8 � G8. ����� ����� ���� ���� �������� � ������.'
		},
		gghole12: {
name: '���� � �����', highlight:2,icon: imP11 + 'gghole1.gif',src: imP21 + 'gghole1.png',
descr: '��������� �� ��������� �����. � ��� ��������� ���� <img src="'+imP3+'gg_key3.gif" width="32" height="32"/>"��������� ����" �� "��������� �������" �� K3 � K4. ����� ����� ���� ���� �������� � ������.'
		},
		ggholezoom11: {
name: '���� � �����', highlight:2,icon: imP11 + 'gghole1.gif',src: imP21 + '1/ggholezoom.gif',
descr: '����� �� ����������� � ���������, ������� ����� ���� �������� VF � EF ����� � ���� ������. ����������� �������� �������� �������� �� ������� "��������". '
		},
		gghole13: {
name: '���� � �����', highlight:2,icon: imP11 + 'gghole1.gif',src: imP21 + 'gghole1.png',
descr: '��������� �� ����� ����� ������ �11. � ��� ��������� "�������� ���� ����������" - <img src="'+imP3+'gg_key4.gif" width="32" height="32"/>  '
		},
		ggdoor22: {
name: '�������� ������',icon: imP11 + 'ggdoor2.gif',src: imP21 + 'ggdoor2.png',
descr: '��������� �� ��������� ����� ������ F8. ��� ������� <img src="'+imP3+'gg_key1.gif" width="32" height="32"/> "�������� �������"  ����� ������ �� F8 �� G8 � �������.'
		},
		ggdoor221: {
name: '�������� ������',icon: imP11 + 'ggdoor2.gif',src: imP21 + 'ggdoor2.png',
descr: '��������� �� �������� ����� ������ G8. ��� ������� <img src="'+imP3+'gg_key1.gif" width="32" height="32"/> "�������� �������"  ����� ������ �� F8 �� G8 � �������.'
		},
		ggdoor2: {
name: '�������� ������',icon: imP11 + 'ggdoor2.gif',src: imP21 + 'ggdoor2.png',
descr: '��������� �� �������� ����� ������ K4. ��� ������� <img src="'+imP3+'gg_key3.gif" width="32" height="32"/> "���������� �����"  ����� ������ �� �4 �� �3 � �������.'
		},
		ggdoor21: {
name: '�������� ������',icon: imP11 + 'ggdoor2.gif',src: imP21 + 'ggdoor2.png',
descr: '��������� �� ����� ����� ������ K3. ��� ������� <img src="'+imP3+'gg_key3.gif" width="32" height="32"/> "���������� �����"  ����� ������ �� �4 �� �3 � �������.'
		},
		 ggperehod1: {
name: '����� � ����',icon: imP11 + 'ggperehod1.gif',src: imP21 + 'ggperehod1.png',
descr: '��������� �� ��������� ����� ������ D7, ���������� �� D7 �� �8 � �������.'
		},
		 ggperehod12: {
name: '������',icon: imP11 + 'ggperehod2.gif',src: imP21 + 'ggperehod2.png',
descr: '��������� �� �������� ����� ������ �8, ���������� �� �8 �� D7 � �������.'
		},
		 ggdoor1: {
name: '��������� ���',icon: imP11 + 'ggdoor1.gif',w:46, h:64, src: imP21 + 'ggdoor1.png',
descr: '��������� �� �������� ����� ������ �5, ���������� �� �5 �� �4 � �������.'
		},
		 ggdownhole1: {
name: '�����',icon: imP11 + 'ggdownhole1.gif',w:60, h:26, src: imP21 + 'ggdownhole1.png',
descr: '����� �� 2� ����, ���������� �� �7, �������������.'
		},
		 gguphole1: {
name: '������',icon: imP11 + 'gguphole1.gif',src: imP21 + 'gguphole1.png',
descr: '��������� �� �������, ���������� �� F2 1�� �����, �������������.'
		},
		ggchest1: {
name: '�������� ������',highlight:1,icon: imP11 + 'ggchest1.gif',w:57, h:32, src: imP21 + 'ggchest1.png',
descr: '������, ������ ����� ���-�� �����, �������� "������ �������" ��� "������� �������", � ������ � "��������" �����. ����� ����� ���� ���� �������� � ������. ��� ���� ������ �������.<BR /> �������� �������.'
		},
		ggchest11: {
name: '�������� ������',highlight:1,icon: imP11 + 'ggchest1.gif',w:57, h:32, src: imP21 + 'ggchest1.png',
descr: '������, ������ ����� ���-�� �����, �������� "������ �������" ��� "������� �������", � ������ � "��������" �����. ����� ����� ���� ���� �������� � ������. ��� ������� ��������.<BR /> �������� �������.'
		},
		ggchest2: {
name: '�������� ������',highlight:1,icon: imP11 + 'ggchest2.gif',src: imP21 + 'ggchest2.png',
descr: '������, ������ ����� ���-�� �����, �������� "������ �������" ��� "������� �������", � ������ � "��������" �����. <BR /> �������� �������.'
		},
		ggchest21: {
name: '�������� ������',highlight:2,icon: imP11 + 'ggchest1.gif',w:57, h:32, src: imP21 + 'ggchest1.png',
descr: '���� � ��� ���� <BR /><img src="'+imP3+'gg_key4.gif" width="32" height="32"/> - "�������� ���� ����������" <BR />� <img src="'+imP3+'gg_key5.gif" width="32" height="32"/> - "�������� ���� ����"<BR /> �� �������� - <img src="'+imP3+'gg_key2.gif" width="32" height="32"/> - "��������� �����". <BR />�������� ������ � "�������� ��������"'
		},
		ggchest22: {
name: '�������� ������',highlight:1,icon: imP11 + 'ggchest2.gif',src: imP21 + 'ggchest2.png',
descr: '������, ������ �������� �� "��������". �������� �������.'
		},
	 ggdownhole12: {
name: '���� � ����',highlight:2,icon: imP11 + 'ggdownhole1.gif',w:60, h:26, src: imP21 + 'ggdownhole1.png',
descr: '��� �� ������� "�������� ���� ����" - <img src="'+imP3+'gg_key5.gif"  width="32" height="32"/>. ����� ����� ���� "����������� ����".'
		},
		ggmusor1: {
name: '��������� ���������� ������� �����������',highlight:1,icon: imP11 + 'ggmusor1.gif',w:80, h:30, src: imP21 + 'ggmusor1.png',
descr: '���� ������, ����� ���-�� �����, ��������: ������ ������� ������� �����, ������������� +45,60��, �������� �� ������. ����� �������� �������: <br><img src="'+imP41+'ggspeed.gif" /> <b>����� � �������</b> - �������� ����������� ���������. ����� ��������: 3 ����.<br><img src="'+imP41+'ggwater.gif" /> <b>�������� � ����</b> - ������ �� ����� ����: -100. ����� ��������: 3 ����.<br><img src="'+imP41+'ggfire.gif" /> <b>�������� � ����</b> - ������ �� ����� ����: -100. ����� ��������: 3 ����.<br><img src="'+imP41+'ggair.gif" /> <b>�������� � �������</b> - ������ �� ����� �������: -100. ����� ��������: 3 ����.<br><img src="'+imP41+'gghpreg.gif" /> <b>���������� ����������</b> - �������������� ���� � �� (%): +100. ����� ��������: 1 ���.'
		},
		ggmusor2: {
name: '������� �����, �� ��������� �������',highlight:1,icon: imP11 + 'ggmusor2.gif',w:80, h:30, src: imP21 + 'ggmusor2.png',
descr: '���� ������, ����� ���-�� �����, ��������: ������ ������� ������� �����, ������������� +45,60��, �������� �� ������. ����� �������� �������: <br><img src="'+imP41+'ggspeed.gif" /> <b>����� � �������</b> - �������� ����������� ���������. ����� ��������: 3 ����.<br><img src="'+imP41+'ggwater.gif" /> <b>�������� � ����</b> - ������ �� ����� ����: -100. ����� ��������: 3 ����.<br><img src="'+imP41+'ggfire.gif" /> <b>�������� � ����</b> - ������ �� ����� ����: -100. ����� ��������: 3 ����.<br><img src="'+imP41+'ggair.gif" /> <b>�������� � �������</b> - ������ �� ����� �������: -100. ����� ��������: 3 ����.<br><img src="'+imP41+'gghpreg.gif" /> <b>���������� ����������</b> - �������������� ���� � �� (%): +100. ����� ��������: 1 ���.'
		},
		ggwell1: {
name: '��������������� ����',highlight:2,icon: imP11 + 'ggwell1.gif',w:66, h:40, src: imP21 + 'ggwell1.png',
descr: '���� "�������� �� ������ F", ���� ������ �������.'
		},
		ggwell2: {
name: '��������� ��������',highlight:2,icon: imP11 + 'ggwell2.gif',w:66, h:40, src: imP21 + 'ggwell2.png',
descr: '������� ��������� ����: <img src="'+imP41+'gghpmax.gif" /> ������ "������� ��������" +20&#37; �� ������ ����������� ���������� ��. ����� ������ �� ������ ���������.'
		},
//��3
		ggmusor3: {
name: '��������� �������',icon: imP11 + 'ggmusor1.gif',w:80, h:30, src: imP21 + 'ggmusor1.png',
descr: '���������.. �������� ���� ������� �� ����� �������..'
		},
		ggmusor31: {
name: '���� ���������� ��������',icon: imP11 + 'ggmusor2.gif',w:80, h:30, src: imP21 + 'ggmusor2.png',
descr: '�������� ������ ���������...'
		},
		koch3gg: {
name: '�����', icon: imP11 + 'koch2.gif',w:83, h:28, src: imP21 + '1/tn_koch2.png',
descr: '���-�� ���������� ������...'
		},
		koch31gg: {
name: '�����', icon: imP11 + 'koch1.gif',w:83, h:28, src: imP21 + '1/tn_koch1.png',
descr: '�� ���� ����� ������� ������...'
		},
	 ggdownhole3: {
name: '�������',icon: imP11 + 'ggdownhole1.gif',w:60, h:26, src: imP21 + 'ggdownhole1.png',
descr: '��� ����� �����, ������� � �����-����� ����.'
		},
	 ggdownhole31: {
name: '����� �� 3�',icon: imP11 + 'ggdownhole1.gif',w:60, h:26, src: imP21 + 'ggdownhole1.png',
descr: '������ ����� � ��� �������'
		},
		ggchest31: {
name: '��������',icon: imP11 + 'ggchest1.gif',w:57, h:32, src: imP21 + 'ggchest1.png',
descr: '������ ����� �������� ������'
		},
		ggchest32: {
name: '�������������� ����',icon: imP11 + 'ggchest2.gif',src: imP21 + 'ggchest2.png',
descr: '� ���� ���-�� ���������'
		},
		ggwell3: {
name: '������ ��������',icon: imP11 + 'ggwell2.gif',w:66, h:40, src: imP21 + 'ggwell2.png',
descr: '��������? ��� �� ����� ��������� ������!'
		},
		ggwell31: {
name: '������ ��������',icon: imP11 + 'well.gif',w:66, h:40, src: imP21 + 'gg_qwell.png',
descr: '��������? ��� �� ����� ��������� ������!'
		},
		ggwell32: {
name: '�������� ����',icon: imP11 + 'lake.gif',w:66, h:40, src: imP21 + 'gg_qlake.png',
descr: '�������, ����� �� ������������� ������ ������� ��������. ��� ��� ��������������?'
		},
		ggdoor3: {
name: '������',icon: imP11 + 'ggdoor2.gif',src: imP21 + 'ggdoor2.png',
descr: '��������� ����...��� ������ �� ����...<br>������ ���������� ����� ����...'
		},
		ggtpt: {
name: '��������� ��������', icon: imP11 + 'danger2.gif', src: imP11 + 'danger2_big.gif',
descr: '�������� �� ��� ������ �� ������������ �� ������ <b>�8</b>'
		},
		ggtpt1: {
name: '�����', icon: imP11 + 'pasg.gif', src: imP21 + 'gg_passage_to_light1.png',
descr: '����� ������ �� ��������� �� ������ <b>�2</b>'
		},
  ggdanger: {
name: '��������� �������', icon: imP11 + 'danger.gif', src: imP11 + 'danger_big.gif',
descr: '��� ������� ��������� ������� <img  height=35 width=35 src="'+imP3+'gg3_shiz_crystal.gif" /> <b>������ ��������</b> ��� ����� "������". '
		},
ggsund: {
name: '������������ ������', icon: imP11 + 'ggsund.gif', src: imP21 + 'gg_sunduk.png',
descr: '������������ ������.������ � � ���� ��������������� ������, �� ���� ����������� ������� �������. ��� ��� �� ������ ������� � ��� ��� ������ ��� ����������, ����� ������ ������ �� ������. ������ �� �����������. ������ ��� ������. ������ - ����� �������� �����. ������ - ����� ���-��, ��� ����� �� ����� ��� ����� � ������� ���� ������.'
		},
wsvet: {
name: '����� �������', icon: imP11 + 'svbel.gif', src: imP21 + 'dec_torch02_b.png',
descr: '��� ������� ���������� ������ �� ����, ������� ��������, ��� ���������� �� �����. ��������� ����������� ������������� � ������ F3 � �������������.'
		},
wsvet2: {
name: '����� �������', icon: imP11 + 'svbel.gif', src: imP21 + 'dec_torch02_b.png',
descr: '�������� � ��� ������� � ������ F3 � �������.'
		},
svche: {
name: '������ �������', icon: imP11 + 'svche.gif', src: imP21 + 'dec_torch02w.png',
descr: '����. ��� �� �������� �� 3� ��� ������� "���������".'
		}, 
svkra: {
name: '������� �������', icon: imP11 + 'svkra.gif', src: imP21 + '2/dec_torch02r.png',
descr: ''
		}, 
svorj: {
name: '��������� �������', icon: imP11 + 'svorj.gif', src: imP21 + '2/dec_torch02.png',
descr: ''
		},
svzel: {
name: '������� �������', icon: imP11 + 'svzel.gif', src: imP21 + '2/dec_torch02g.png',
descr: ''
		},
svgol: {
name: '������� �������', icon: imP11 + 'svgol.gif', src: imP21 + '2/dec_torch02b.png',
descr: ''
		},
svfio: {
name: '���������� �������', icon: imP11 + 'svfio.gif', src: imP21 + '1/dec_torch02u.png',
descr: ''
		},
 dnggg: {
name: '��������� �������', icon: imP11 + 'danger.gif', highlight:1,src: imP11 + 'danger_big.gif',
descr: '��������, �� ��� ������� ������������.'
		},

//����
		icedoor: {
name: '�����',icon: imP11 + 'icedoor.gif',src: imP21 + '1/icedoor.png',
descr: '��������� <img src="'+imP3+'Key6.gif" /> - ���� �6 '
		},
		icedoor2: {
name: '�����',icon: imP11 + 'icedoor.gif',src: imP21 + '1/icedoor.png',
descr: '����� ����� �����, �������� �� ��������� 45 �����, ����� �� ����� ��������.'
		},
		icehole: {
name: '�������',highlight:2,icon: imP11 + 'icehole.gif',w:98, h:28, src: imP21 + 'icehole01.png',
descr: '��������� ����: <img src="'+imP41+'standart_effect.gif" > "�������" ���� 120�� �� �����.(� ��������� �� ��������������.)<br> ��� ������ ���������� ����� ���� <b>����������</b> ������ <b>�������</b>.'
		},
		icehole2: {
name: '�����',icon: imP11 + 'spusk.gif',src: imP21 + 'les1up2.png',
descr: '����� �� 2� ����'
		},
		enterab: {
name: '����',icon: imP11 + 'arrow1.gif',src: imP11 + 'arrow1.gif',
descr: ''
		},
		enterab1: {
name: '����',icon: imP11 + 'arrow1.gif',src: imP11 + 'arrow1.gif',
descr: ''
		},
		teleportab: {
name: '��������� (����)',icon: imP11 + 'telport.gif',src: imP21 + 'teleport02.png',
descr: '���������� � ������ <b>M10</b>'
		},
		teleportab1: {
name: '��������� (�����)',icon: imP11 + 'telportgreen.gif',src: imP21 + 'teleport04.png',
descr: '���������� � ������ <b>G2</b>'
		},
  teleportab2: {
name: '��������� (���������)',icon: imP11 + 'teleport06.gif',src: imP21 + 'teleport06.png',
descr: '���������� � ������ <b>I2</b>'
		},
  teleportab3: {
name: '���������',icon: imP11 + 'teleport06.gif',src: imP21 + 'teleport06.png',
descr: '���������� � �������� � ��������.'
		},
// devels
		dangertn: {
name: '��������� �������', icon: imP11 + 'danger.gif', highlight:1,src: imP11 + 'danger_big.gif',
descr: '<font color="red">������� �� ����������� ����������� �� ������ �����������!<br></font>����� �������� �������: <br><img src="'+imP41+'ggspeed.gif" /> "����� � �������" 15 ����� - ��������� �������� ������������, �� �5.<br><img src="'+imP41+'ggregen.gif" /> "���������� ����������" 30 ����� - �������������� ���� � �� (%): +100, �� �3.<br><img src="'+imP41+'tn_debuff_res.gif" /> "��������� ��������" 30 ����� - ������ �� ��������� �����: -25, �� �3. <br><img src="'+imP41+'tn_debuff.gif" /> "�������� ���������" 30 ����� -  ����, ��������, ��������, ���������: -5, �� �5.<br>"���� � �������" � "�������� ���������" �������� ���� �����.'
		},
		koch1: {
name: '�����', icon: imP11 + 'koch1.gif',w:83, h:28, src: imP21 + '1/tn_koch1.png',
descr: '�� ���� ����� ������� ������...'
		},
		koch2: {
name: '�����', icon: imP11 + 'koch2.gif',w:83, h:28, src: imP21 + '1/tn_koch2.png',
descr: '����� ����� � ��������� ���...'
		},
		koch3: {
name: '�����', icon: imP11 + 'koch3.gif',w:83, h:28, src: imP21 + '1/tn_koch3.png',
descr: '�� ���� ����� ������� ������...'
		},
		kust1: {
name: '����', icon: imP11 + 'kust1.gif',w:65, h:39, src: imP21 + '1/tn_kust1.png',
descr: '��������, ������� ��� ����� �� ���� �������� ��������...'
		},
		kust2: {
name: '����', icon: imP11 + 'kust2.gif',w:48, h:33, src: imP21 + '1/tn_kust2.png',
descr: '�� ����� �������� �� �������, ���������� �����...'
		},
		kust3: {
name: '����', icon: imP11 + 'kust3.gif',w:72, h:37, src: imP21 + '1/tn_kust3.png',
descr: '�������� ����� ����� ����������...'
		},
		kust4: {
name: '����', icon: imP11 + 'kust4.gif',w:51, h:35, src: imP21 + '1/tn_kust4.png',
descr: '�� ����� �������� �� �������, ���������� �����...'
		},
		luzh1d: {
name: '�������� ����', icon: imP11 + 'luzh1.gif',w:125, h:30, src: imP21 + '1/tn_luzh1.png',
descr: '� ������� �� ��� ������?!'
		},
		luzh1: {       //�������
name: '�������� ����', icon: imP11 + 'luzh1.gif', highlight:1,w:125, h:30, src: imP21 + '1/tn_luzh1.png',
descr: '���� ���� ����� 3 ��������. ����� �����: "���������� ���������", "��������� ��������", "����� ������� ��������", "����������� �����", � ����� � ������� ���������: <br><img src="'+imP41+'ggspeed.gif" /> "����� � �������" 15 ����� - ��������� �������� ������������, �� �5.<br><img src="'+imP41+'ggregen.gif" /> "���������� ����������" 30 ����� - �������������� ���� � �� (%): +100, �� �3 <br><img src="'+imP41+'tn_debuff_res.gif" /> "��������� ��������" 30 ����� - ������ �� ��������� �����: -25, �� �3. <br><img src="'+imP41+'tn_debuff.gif" /> "�������� ���������" 30 ����� -  ����, ��������, ��������, ���������: -5, �� �5.<br>"����� � �������" � "�������� ���������" �������� ���� �����.'
		},
		luzh2: {      //�������
name: '�������� ����', icon: imP11 + 'luzh2.gif',highlight:1,w:120, h:30, src: imP21 + '1/tn_luzh2.png',
descr: '���� ���� ����� 3 ��������. ����� �����: "���������� ���������", "��������� ��������", "����� ������� ��������", "����������� �����", � ����� � ������� ���������: <br><img src="'+imP41+'ggspeed.gif" /> "����� � �������" 15 ����� - ��������� �������� ������������, �� �5.<br><img src="'+imP41+'ggregen.gif" /> "���������� ����������" 30 ����� - �������������� ���� � �� (%): +100, �� �3 <br><img src="'+imP41+'tn_debuff_res.gif" /> "��������� ��������" 30 ����� - ������ �� ��������� �����: -25, �� �3. <br><img src="'+imP41+'tn_debuff.gif" /> "�������� ���������" 30 ����� -  ����, ��������, ��������, ���������: -5, �� �5.<br>"����� � �������" � "�������� ���������" �������� ���� �����.'
		},
		ozero: {
name: '����� �����', icon: imP11 + 'ozero.gif', highlight:1,w:85, h:80, src: imP11 + 'tn_ozero.png',
descr: '���� ���� ����� 5 ��������. ����� �����: "���������� ���������", "��������� ��������", "����������� �����", "����� ������� ��������", "������ �����", � ����� � ������� ���������: <br><img src="'+imP41+'ggspeed.gif" /> "����� � �������" 15 ����� - ��������� �������� ������������, �� �5.<br><img src="'+imP41+'ggregen.gif" /> "���������� ����������" 30 ����� - �������������� ���� � �� (%): +100, �� �3<br><img src="'+imP41+'tn_debuff_res.gif" /> "��������� ��������" 30 ����� - ������ �� ��������� �����: -25, �� �3. <br><img src="'+imP41+'tn_debuff.gif" /> "�������� ���������" 30 ����� -  ����, ��������, ��������, ���������: -5, �� �5.<br>"����� � �������" � "�������� ���������" �������� ���� �����.'
		},
		ogon1: {
name: '������', icon: imP11 + 'ogon1.gif', highlight:1,w:43, h:34, src: imP21 + '1/tn_ogon1.png',
descr: '������ �������� � ������, ���� ���-�� �� ��������� ��������� ����������. <br>���� ���� ����� 5 ���������. ����� �����: "������ �����", "����� ������� ��������", "����� �����", � ����� � ������� ���������: <br><img src="'+imP41+'ggspeed.gif" /> "����� � �������" 15 ����� - ��������� �������� ������������, �� �5.<br><img src="'+imP41+'ggregen.gif" /> "���������� ����������" 30 ����� - �������������� ���� � �� (%): +100, �� �3<br><img src="'+imP41+'tn_debuff_res.gif" /> "��������� ��������" 30 ����� - ������ �� ��������� �����: -25, �� �3. <br><img src="'+imP41+'tn_debuff.gif" /> "�������� ���������" 30 ����� -  ����, ��������, ��������, ���������: -5, �� �5.<br>"����� � �������" � "�������� ���������" �������� ���� �����.'
		},
		bulizh1: {
name: '������� �����', icon: imP11 + 'bulizh1.gif', highlight:1,w:56, h:35, src: imP21 + '1/tn_bulizh1.png',
descr: '���� ���� ����� 3 ��������. ����� �����: "��������� ���������� �������", � ����� � ������� ���������: <br><img src="'+imP41+'ggspeed.gif" /> "����� � �������" 15 ����� - ��������� �������� ������������, �� �5.<br><img src="'+imP41+'ggregen.gif" /> "���������� ����������" 30 ����� - �������������� ���� � �� (%): +100, �� �3<br><img src="'+imP41+'tn_debuff_res.gif" /> "��������� ��������" 30 ����� - ������ �� ��������� �����: -25, �� �3. <br><img src="'+imP41+'tn_debuff.gif" /> "�������� ���������" 30 ����� -  ����, ��������, ��������, ���������: -5, �� �5.<br>"����� � �������" � "�������� ���������" �������� ���� �����.'
		},
		bulizh2: {
name: '�������� �����', icon: imP11 + 'bulizh2.gif', highlight:1,w:56, h:31, src: imP21 + '1/tn_bulizh2.png',
descr: '���� ���� ����� 3 ��������. ����� �����: "��������� ���������� �������", � ����� � ������� ���������: <br><img src="'+imP41+'ggspeed.gif" /> "����� � �������" 15 ����� - ��������� �������� ������������, �� �5.<br><img src="'+imP41+'ggregen.gif" /> "���������� ����������" 30 ����� - �������������� ���� � �� (%): +100, �� �3<br><img src="'+imP41+'tn_debuff_res.gif" /> "��������� ��������" 30 ����� - ������ �� ��������� �����: -25, �� �3. <br><img src="'+imP41+'tn_debuff.gif" /> "�������� ���������" 30 ����� -  ����, ��������, ��������, ���������: -5, �� �5.<br>"����� � �������" � "�������� ���������" �������� ���� �����.'
		},
		pen1: {
name: '������� ����', icon: imP11 + 'pen1.gif', highlight:1,w:56, h:35, src: imP21 + '1/tn_pen1.png',
descr: '���� ���� ����� 3 ��������. ����� �����: "������� ���", � ����� � ������� ���������: <br><img src="'+imP41+'ggspeed.gif" /> "����� � �������" 15 ����� - ��������� �������� ������������, �� �5.<br><img src="'+imP41+'ggregen.gif" /> "���������� ����������" 30 ����� - �������������� ���� � �� (%): +100, �� �3<br><img src="'+imP41+'tn_debuff_res.gif" /> "��������� ��������" 30 ����� - ������ �� ��������� �����: -25, �� �3. <br><img src="'+imP41+'tn_debuff.gif" /> "�������� ���������" 30 ����� -  ����, ��������, ��������, ���������: -5, �� �5.<br>"����� � �������" � "�������� ���������" �������� ���� �����.'
		},
		pen2: {
name: '��������� ����', icon: imP11 + 'pen2.gif', highlight:1,w:56, h:31, src: imP21 + '1/tn_pen2.png',
descr: '���� ���� ����� 3 ��������. ����� �����: "������� ���", � ����� � ������� ���������: <br><img src="'+imP41+'ggspeed.gif" /> "����� � �������" 15 ����� - ��������� �������� ������������, �� �5.<br><img src="'+imP41+'ggregen.gif" /> "���������� ����������" 30 ����� - �������������� ���� � �� (%): +100, �� �3<br><img src="'+imP41+'tn_debuff_res.gif" /> "��������� ��������" 30 ����� - ������ �� ��������� �����: -25, �� �3. <br><img src="'+imP41+'tn_debuff.gif" /> "�������� ���������" 30 ����� -  ����, ��������, ��������, ���������: -5, �� �5.<br>"����� � �������" � "�������� ���������" �������� ���� �����.'
		},
		pen3: {
name: '������� ����', icon: imP11 + 'pen3.gif', highlight:1,w:56, h:51, src: imP21 + '1/tn_pen3.png',
descr: '���� ���� ����� 3 ��������. ����� �����: "������� ���", � ����� � ������� ���������: <br><img src="'+imP41+'ggspeed.gif" /> "����� � �������" 15 ����� - ��������� �������� ������������, �� �5.<br><img src="'+imP41+'ggregen.gif" /> "���������� ����������" 30 ����� - �������������� ���� � �� (%): +100, �� �3<br><img src="'+imP41+'tn_debuff_res.gif" /> "��������� ��������" 30 ����� - ������ �� ��������� �����: -25, �� �3. <br><img src="'+imP41+'tn_debuff.gif" /> "�������� ���������" 30 ����� -  ����, ��������, ��������, ���������: -5, �� �5.<br>"����� � �������" � "�������� ���������" �������� ���� �����.'
		},
		zarkuz: {
name: '�������� �������', icon: imP11 + 'zarkuz.gif',w:75, h:45, src: imP21 + '1/tn_anvil.png',
descr: ' '
		},
	 yama1: {
name: '�������� �������', icon: imP11 + 'yama1.gif',highlight:1,w:110, h:30, src: imP21 + '1/tn_yama1.png',
descr: '���� ���� ����� 4 ��������. ����� �����: "������ �����", � ����� � ������� ���������: <br><img src="'+imP41+'ggspeed.gif" /> "����� � �������" 15 ����� - ��������� �������� ������������, �� �5.<br><img src="'+imP41+'ggregen.gif" /> "���������� ����������" 30 ����� - �������������� ���� � �� (%): +100, �� �3<br><img src="'+imP41+'tn_debuff_res.gif" /> "��������� ��������" 30 ����� - ������ �� ��������� �����: -25, �� �3. <br><img src="'+imP41+'tn_debuff.gif" /> "�������� ���������" 30 ����� -  ����, ��������, ��������, ���������: -5, �� �5.<br>"����� � �������" � "�������� ���������" �������� ���� �����.'
		},
	 yama2: {
name: '��������� ���', icon: imP11 + 'yama2.gif',highlight:1,w:105, h:30, src: imP21 + '1/tn_yama2.png',
descr: '���� ���� ����� 4 ��������. ����� �����: "������ �����", � ����� � ������� ���������: <br><img src="'+imP41+'ggspeed.gif" /> "����� � �������" 15 ����� - ��������� �������� ������������, �� �5.<br><img src="'+imP41+'ggregen.gif" /> "���������� ����������" 30 ����� - �������������� ���� � �� (%): +100, �� �3<br><img src="'+imP41+'tn_debuff_res.gif" /> "��������� ��������" 30 ����� - ������ �� ��������� �����: -25, �� �3. <br><img src="'+imP41+'tn_debuff.gif" /> "�������� ���������" 30 ����� -  ����, ��������, ��������, ���������: -5, �� �5.<br>"����� � �������" � "�������� ���������" �������� ���� �����.'
		},
		grot: {
name: '������ � ����', icon: imP11 + 'grot.gif',w:120, h:60, src: imP21 + '1/tn_grot.png',
descr: '���� � �����... ���� �������� � ������ �����. �������� ������ �� ����������, ������ ������ �������.'
		},
		sklp: {
name: '������ � ������������� �����', icon: imP11 + 'sklp1.gif',w:49, h:60, src: imP21 + '1/tn_sklp.png',
descr: '�� ������� ������� ��������� �������������� ������������ � ��������. ���������� ���� ������ ������� ���������� �����, ������������ ������-�� ���������.'
		},



//��
 gldoor: {
			name: '������� - �����',
			icon: imP11 + 'gldoor.gif',
			src: imP21 + '1/door.png',
			descr: '��������� �������� �������! ������ ������ �� �������!<br>�� ������. '
		},
 gldoor1: {
			name: '������� - �����',
			icon: imP11 + 'gldoor.gif',
			src: imP21 + '1/door.png',
			descr: '��������� �������� �������! ������ ������ �� �������! '
		},
 gldoor11: {
			name: '������� - �����',
			icon: imP11 + 'gldoor.gif',
			src: imP21 + '1/door.png',
			descr: '��������� <img src="'+imP3+'ko_sign.gif" width="30" height="30" /></b> ������ ���� �� ���������� �������.'
		},
 gldoorz: {
			name: '������� - �����',
			icon: imP11 + 'gldoor.gif',
			src: imP21 + '1/door.png',
			descr: '��������� <img src="'+imP3+'gl_zombiekey.gif" /><b>���� �� ������</b>. ����� �������� � ����� ���������� ���� ����� �� ���� �����. <br>����� ������ � ��������� ������� ��� ��������� ��������. '
		},
 gldoorf: {
			name: '������� - �����',
			icon: imP11 + 'gldoor.gif',
			src: imP21 + '1/door.png',
			descr: '��������� <img src="'+imP3+'gl_farmerkey.gif" /><b>���� �� �����</b>. ���� ��������� �� ������� ������� ����� ��� ������� ������ �� �������� ������ �����. <br>����� ������ � �������� �����.'
		},
  glnish1: {
			name: '���� � �����',
			icon: imP11 + 'glnish1.gif',
			w:44, h:80, src: imP21 + '1/nish1.png',
			descr: '��! ������!'
		},
  glnish2: {
			name: '���� � �����',
			icon: imP11 + 'glnish2.gif',
			w:44, h:80, src: imP21 + '1/nish2.png',
			descr: '� ����� �����, ����� ������ ��� ������!'
		}, 
  glrych1: {
			name: '������������ �����',
			icon: imP11 + 'glrych1.gif',
			w:22, h:44, src: imP21 + '1/rych1.png',
			descr: '����������� ��� ������������� ������ ����: 750'
		}, 
  glluk: {
			name: '���',
			icon: imP11 + 'glluk.gif',
			w:50, h:20, src: imP21 + '1/lluk.png',
			descr: '��� ����� �� ������ ����� ���� �������.'
		}, 
  glluk2: {
			name: '���',
			icon: imP11 + 'glluk.gif',
			w:50, h:20, src: imP21 + '1/lluk.png',
			descr: '��� - ��������� ����, ���!'
		}, 
  glmuschep: {
			name: '������ � �����',
			icon: imP11 + 'glck.gif', highlight:1,
			w:95, h:50, src: imP21 + '1/mus_chep.png',
			descr: '����� ����� ������ ����. ����� ���� �������. '
		}, 
  glmusweap: {
			name: '����� ������� ������',
			icon: imP11 + 'glmusweap.gif',   highlight:1,
			w:95, h:50, src: imP21 + '1/mus_weap.png',
			descr: '����� ����� ������ ����. ����� ���� �������.'
		},  
  glmusr: {
			name: '�������',
			icon: imP11 + 'glmusr.gif',
			w:80, h:30,  src: imP21 + '1/musr.png',
			descr: '�����! ���! ��, ��� �����! <img src="'+imP2+'smile/ura.gif" />'
		},
  gltresh1: {
			name: '�������',
			icon: imP11 + 'gltresh1.gif',
			w:80, h:30, src: imP21 + '1/tresh1.png',
			descr: '���� �� � ��� ��������, � �� ���� ������� ����!'
		}, 
  gldur: {
			name: '����',
			icon: imP11 + 'gldur.gif',
			w:70, h:25, src: imP21 + '1/dur.png',
			descr: '��� ����� ����. ����� ��������� ������, ��������, ��������� ����.'
		},
  glaltar: {
			name: '�����������',
			icon: imP11 + 'glaltar.gif',
			src: imP21 + '1/item_gl_altar.png',
			descr: '�������� ����������� ����������, ���������� ������� �� �����������.'
		}, 
  glheart: {
			name: '������ ����',
			icon: imP11 + 'glheart.gif',
			src: imP21 + '1/item_gl_heart.png',
			descr: '������ ����� ��������: <BR /><img src="'+imP41+'gl_npc_heart_buff.gif" /> <b>����������� ������ ����</b> ������ - �������� ����������� ����������� ���������, �� 2 ����. <br>����� �� ������ ������ � �������� �����. <br>����� ��������� ��������� ���.'
		}, 
  gllab: {
			name: '����������� ���������',
			icon: imP11 + 'gllab.gif',
			src: imP21 + '1/item_gl_laboratory.png',
			descr: '� ��������� ������������ ����� �������� ���� �������: ������, ���, �����. <br>���������� ��������� ����� ���������� ������ �� ������ ������ �����. <br>����� ������ � �������� �����. '
		}, 
  glgirlbody: {
			name: '������� ����',
			icon: imP11 + 'glgirlbody.gif',
			w:80, h:30, src: imP21 + '1/item_gl_girlbody.png',
			descr: '���� �����. ���������� ��� ���������� ������ ��������� ������� ��� �������� ��������. '
		},
		gldanger: {
			name: '��������� �������', icon: imP11 + 'danger.gif', highlight:1,
			src: imP11 + 'danger_big.gif',
			descr: '��������� �������. �������� �� ��� ������ �� ��������� �� 20�� �� 300��'
		}, 
		gldanger2: {
			name: '��������� �������', icon: imP11 + 'danger.gif', highlight:1,
			src: imP11 + 'danger_big.gif',
			descr: '��������� �������, �������� �� ��� ������, ����� �������� �������: <BR /><img src="'+imP41+'gl_debuff_inst.gif" /><b>"�������� ������������"</b> - ��������: -15 �� 20 �����.<BR /><img src="'+imP41+'gl_debuff_str.gif" /><b>"�������� ����"</b> - ���� -15 �� 20 �����.<BR /><img src="'+imP41+'gl_debuff_agil.gif" /><b>"�������� ���������������"</b> - ��������: -15 �� 20 �����.<BR /><img src="'+imP41+'gl_debuff_rzha.gif" /><b>"�������� �� ��������"</b> - ������ �� ����� -50 �� 20 �����.<BR /><img src="'+imP41+'gl_debuff_paralize.gif" /><b>"������� �����������"</b> - �� ������������ ������ � �� ������ ��������� ��� ����� ��������� �����, ����� ���������� � ������ � ����. �� 5 �����.'
		},
		glreshsark: {
			name: '������� + ��������', icon: imP11 + 'coff.gif', 
			src: imP11 + 'coff.png',
			descr: '�� �������� ��������� ���-�� ��������...'
		},



//2�
		gldown: {
name: '�������� �� ������ ������',icon: imP11 + 'lesd.gif ', src: imP21 + 'les2down.png',
descr: '����� �� ������ ����, � ������ <strong>E1</strong> �������������.'
		},
		glup: {
name: '��������',icon: imP11 + 'lesup.gif', w:40, h:60, src: imP21 + 'les2up.png',
descr: '������ �� ������ ����, � ������ <strong>�12</strong> �������������.'
		},
		gldown3: {
name: '����� � �������� �������',icon: imP11 + 'lesd.gif ', src: imP21 + 'les2down.png',
descr: '����� �� ������ ����, � ������ <strong>�8</strong>, ������������� ������.'
		},
		glup3: {
name: '�������� �� ������� ������',icon: imP11 + 'lesup.gif', w:40, h:60, src: imP21 + 'les2up.png',
descr: '������ �� ������ ����, � ������ <strong>L13</strong>, ������������� ������.'
		},
		gldown4: {
name: '����� � �������� �������',icon: imP11 + 'lesd.gif ', src: imP21 + 'les2down.png',
descr: '����� �� ������ ����, � ������ <strong>�3</strong>, ������������� ������.'
		},
		glup4: {
name: '�������� �� ������� ������',icon: imP11 + 'lesup.gif', w:40, h:60, src: imP21 + 'les2up.png',
descr: '������ �� ������ ����, � ������ <strong>L7</strong>, ������������� ������.'
		},
  gldur1: {
			name: '������ ������',
			icon: imP11 + 'gldur.gif',
			w:70, h:25, src: imP21 + '1/dur.png',
			descr: '������������ �������� � ������ <b>V11</b>.'
		},

 gldoor2: {
			name: '������� - �����',
			icon: imP11 + 'gldoor.gif',
			src: imP21 + '1/door.png',
			descr: '��������� <img src="'+imP3+'gl_stonekey_green.gif" width="30" height="30"/> <b>������� ����-������</b> - 1. �������� ����� � "��������", ����� �� 4 ������� ��� ������� ��� ��������� ���� 2 ���� ��������� ��������<br /> - 2. � "���������", ����� �� 5 �������. ��� ������ ��������. <br />� ����� ���������, ���������� ���� ������ �������� ��������, ����� ���� ������������ �������������.'
		},
 gldoor3: {
			name: '������� - �����',
			icon: imP11 + 'gldoor.gif',
			src: imP21 + '1/door.png',
			descr: '��������� <img src="'+imP3+'gl_stonekey_yellow.gif" width="30" height="30"/> <b>������ ����-������</b> ����� �������� ������ � ���������� ������� ������ ��� ���������� ��������� 500.'
		},
 gldoor4: {
			name: '������� - �����',
			icon: imP11 + 'gldoor.gif',
			src: imP21 + '1/door.png',
			descr: '��������� <img src="'+imP3+'gl_stonekey_red.gif" width="30" height="30"/> <b>������� ����-������</b>������� � ���������� ��� ���������� ��������� 8000.'
		},
 gldoor5: {
			name: '������� - �����',
			icon: imP11 + 'gldoor.gif',
			src: imP21 + '1/door.png',
			descr: ''
		},
 gldoor6: {
			name: '������� - �����',
			icon: imP11 + 'gldoor.gif',
			src: imP21 + '1/door.png',
			descr: '��������� <img src="'+imP3+'gl_treasurekey.gif" width="30" height="30"/> <b>���� �� ������������</b>, ������� � ��� �����.'
		},
 gldoor7: {
			name: '������� - �����',
			icon: imP11 + 'gldoor.gif',
			src: imP21 + '1/door.png',
			descr: '��������� <img src="'+imP3+'gl_stonekey_blue.gif" width="30" height="30"/><b>����� ����-������</b> ������ ���� �� ���������� �������.'
		},

		glsar2: {
name: '���������� ����',icon: imP11 + 'sar2.gif',src: imP21 + '2/sar2.png',
descr: '�� ���, ������������� ������ ���������� ���?'
		},
  glmesh: {
  name: '������� �����',icon: imP11 + 'mesh.gif', w:80, h:40, src: imP21 + '1/gl_meshok.png',
  descr: '�� ��� ���� ��������.'
  },
  glmesh1: {
  name: '������� �����',icon: imP11 + 'mesh.gif', w:80, h:40, src: imP21 + '1/gl_meshok.png',
  descr: ''
  },
  glsokr: {
  name: '���������� ���������',icon: imP11 + 'sokr.gif',src: imP11 + 'sokr_big.gif',
  descr: '����� ����� ���������� ���������, ��� ������ ���������'
  },
  glsun: {
			name: '���������� ������',
			icon: imP11 + 'glsun.gif',
			w:60, h:40, src: imP21 + '1/gl_sunduk_1.png',
			descr: '����� ����� ����� ���������� �����.'
		}, 
  glsun1: {
			name: '���������������� ������',
			icon: imP11 + 'glsun.gif',
			w:60, h:40, src: imP21 + '1/gl_sunduk_1.png',
			descr: '����� ����� ����� ���������� �����.'
		},
  glsun2: {
			name: '������ ���������',
			icon: imP11 + 'glsun.gif',
			w:60, h:40, src: imP21 + '1/gl_sunduk_1.png',
			descr: '����� ����� ������� ����.'
		},
  glsun3: {
			name: '���������� ������',
			icon: imP11 + 'glsun.gif',
			w:60, h:40, src: imP21 + '1/gl_sunduk_1.png',
			descr: '����� ����� ������ ��������.'
		},
  glsun4: {
			name: '������ ���������� ������',
			icon: imP11 + 'glsun.gif',
			w:60, h:40, src: imP21 + '1/gl_sunduk_1.png',
			descr: '����� ����� '
		},
  glsun5: {
			name: '������ ����������',
			icon: imP11 + 'glsun.gif',
			w:60, h:40, src: imP21 + '1/gl_sunduk_1.png',
			descr: '����� ����� ������� ���� ��� ���� ����������.'
		},
  glsun6: {
			name: '������ ����������',
			icon: imP11 + 'glsun.gif',
			w:60, h:40, src: imP21 + '1/gl_sunduk_1.png',
			descr: '����� ����� ����� ���������� �����, ������ ��������.'
		},
  glsun7: {
			name: '������ ��� �����',
			icon: imP11 + 'glsun.gif',
			w:60, h:40, src: imP21 + '1/gl_sunduk_1.png',
			descr: '����� ����� ������ (������� ��� �����).'
		},
  glsun8: {
			name: '������� ������',
			icon: imP11 + 'glsun.gif',
			w:60, h:40, src: imP21 + '1/gl_sunduk_1.png',
			descr: '����� ����� ������� �������, ������ �������.'
		},
  glsun9: {
			name: '�������� ������ ��������',
			icon: imP11 + 'glsun.gif',
			w:60, h:40, src: imP21 + '1/gl_sunduk_1.png',
			descr: '����� ����� ...'
		},
  glsun10: {
			name: '������ � ���������',
			icon: imP11 + 'glsun.gif',
			w:60, h:40, src: imP21 + '1/gl_sunduk_1.png',
			descr: '����� ����� ���������� ����, ����� ���������� �����, ������ ��������.'
		},
  glshkaf: {
			name: '������ ����',
			icon: imP11 + 'shkaf.gif',
			w:40, h:60, src: imP21 + '1/gl_shkaf.png',
			descr: '�������� ������ ����� ���� ������ ������.'
		},
  glshkaf2: {
			name: '������ ����',
			icon: imP11 + 'shkaf.gif',
			w:40, h:60, src: imP21 + '1/gl_shkaf.png',
			descr: '������ ���-�� ���������..'
		},
  glban: {
			name: '������ ���������',
			icon: imP11 + 'glban.gif',
			src: imP21 + '1/gl_banner.png',
			descr: ''
		},

		gldoor21: {
name: '�������� ������',icon: imP11 + 'ggdoor2.gif', w:50, h:60,  src: imP21 + 'ggdoor2.png',
descr: '����� � ������ �������. ������������� ������.'
		} 



 	};


//

