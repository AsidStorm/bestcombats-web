
var maters = {
gg_token:{name: '��������',src: imP3 + 'gg_token.gif',recipes:  null,
 			descr: '�����: 0.1<BR />�������������: 0/1<BR /><b>��������:</b><BR />����� ���������� ���������...<BR />������� � Suncity<BR />  ��������� �� � ����������� ����������, ����� �������� �� � "��������" �� ������ ����.'
		},
gg_small_token:{name: '��������� ��������',src: imP3 + 'gg_small_token.gif',recipes:  null,
 			descr: '�����: 0.1<BR />�������������: 0/1<BR />������� � Suncity<BR />���� � ��� ��� ��������� � ������ Sun City, �� ��� ����, ��� �� ��� ����� �������� �������, ���������� ���������� � "������ �������" � �������� ��� 10 "��������� ���������".'
		},

/*
		mater1:{
				name: '����� ��������� �����',  cena: 0.1,
				src: imP3 + 'mater1.gif',
				recipes: null
		},
		mater2:{
				name: '������',  cena: 0.1,
				src: imP3 + 'mater2.gif',
				recipes: null
		},
		mater3:{
				name: '�������',  cena: 0.1,
				src: imP3 + 'mater3.gif',
    descr: '&nbsp;&nbsp;&nbsp;����� ����� � ������� �� <strong>F8</strong> �� 2� ����� "������".',
    recipes: null
		},
		mater4:{
				name: '�������� �������',  cena: 0.1,
				src: imP3 + 'mater4.gif',
    descr: '&nbsp;&nbsp;&nbsp;����� ����� � ������� �� <strong>F8</strong> �� 2� ����� "������".',
				recipes: {'spell_curseb': 1}
		},
		mater5:{
				name: '������',  cena: 0.1,
				src: imP3 + 'mater5.gif',
    descr: '&nbsp;&nbsp;&nbsp;����� ����� � �������� �� 2� ����� "������".',
				recipes: null
		},
		mater6:{
				name: '�������� ������',  cena: 0.1,
				src: imP3 + 'mater6.gif',
				recipes: null
		},
		mater7:{
				name: '������ ��������� ����',  cena: 0.1,
				src: imP3 + 'mater7.gif',
				recipes: {'sp_tacpts_HIT1': 3}
		},
		mater8:{
				name: '����������',  cena: 0.1,
				src: imP3 + 'mater8.gif',
				recipes: {'sp_tacpts_PRY1': 3}
		},
		mater9:{
				name: '������ �������� ������',  cena: 0.1,
				src: imP3 + 'mater9.gif',
				recipes: {'sp_tacpts_KRT1': 3}
		},
		mater10:{
				name: '���� �������� ������',  cena: 0.1,
				src: imP3 + 'mater10.gif',
				recipes: {'spell_ug_undam2c': 1,'sp_tacpts_CNTR1': 3}
		},
		mater11:{
				name: '���� ������ �����',  cena: 0.1,
				src: imP3 + 'mater11.gif',
				recipes: {'spell_ug_undam1c': 1,'spell_ug_undam1c': 1,'sp_tacpts_BLK1': 3}
		},
		mater12:{
				name: '�����',  cena: 0.1,
				src: imP3 + 'mater12.gif',
    descr: '&nbsp;&nbsp;&nbsp;����� ����� � �������� �� 2� ����� "������".',
				recipes: {'spell_ug_undam3c': 1,'spell_curse': 1}
		},
		mater13:{
				name: '�������� ������ �������',  cena: 0.3,
				src: imP3 + 'mater13.gif',
				recipes: null
		},
		mater14:{
				name: '������� �����',  cena: 0.3,
				src: imP3 + 'mater14.gif',
    descr: '&nbsp;&nbsp;&nbsp;����� ������ � ����� � ��� � ��������� "���"',
				recipes: {'spell_ug_undam1c': 1,'spell_curseb': 3}
		},
		mater15:{
				name: '������� �������',  cena: 0.3,
				src: imP3 + 'mater15.gif',
    descr: '&nbsp;&nbsp;&nbsp;����� ������ � ����� � ��� � ��������� "���"',
				recipes: {'spell_ug_undam3c': 1,'sp_tacpts_PRY2': 2}
		},
		mater16:{
				name: '��������� ������',  cena: 0.3,
				src: imP3 + 'mater16.gif',
    descr: '&nbsp;&nbsp;&nbsp;����� ����� � ������� �� <strong>D9</strong> �� 3� ����� "������".',
				recipes: {'spell_ug_undam2c': 1,'spell_curse': 1,'sp_tacpts_KRT2': 2}
		},
		mater17:{
				name: '���� �������� ������',  cena: 0.3,
				src: imP3 + 'mater17.gif',
				recipes: {'spell_ug_undam1c': 1,'spell_ug_undam3c': 1,'spell_curse': 1,'sp_tacpts_CNTR2': 2}
		},
		mater18:{
				name: '������������ ������',  cena: 0.3,
				src: imP3 + 'mater18.gif',
				recipes: {'spell_ug_undam1c': 1,'spell_ug_undam2c': 1,'spell_ug_undam3c': 1,'spell_curse': 1,'sp_tacpts_HIT2': 2}
		},
		mater19:{
				name: '�������� ������',  cena: 0.3,
				src: imP3 + 'mater19.gif',
				recipes: {'spell_ug_undam2c': 1,'sp_tacpts_BLK2': 2}
		},
		mater25:{
				name: '�������� ������ �������',  cena: 1,
				src: imP3 + 'mater25.gif',
    descr: '&nbsp;&nbsp;&nbsp;����� ����� � ������� �� <strong>�6</strong> �� 1� ����� "������ ����", ����� ������ ����� �������� "������ ��������".',
				recipes: {'spell_ug_undam4c': 1,'spell_curseb': 1}
		},                                                                                                                                               
		mater26:{                                                                                                                                        
				name: '�������� ������������',  cena: 1,
				src: imP3 + 'mater26.gif',
    descr: '&nbsp;&nbsp;&nbsp;����� ����� � ������� �� <strong>�4</strong> �� 2� ����� "������ ����".',
				recipes: {'pot_base_50_waterproof': 1,'spell_ug_undam4c': 1,'spell_ug_unp10c': 1,'spell_ug_unexprc': 1,'sp_tacpts_PRY3': 2,'booklearn_slot9': 3,'booklearn_spell7': 3}
		},                                                                                                                                               
		mater27:{                                                                                                                                        
				name: '������ ���������� ������',  cena: 1,
				src: imP3 + 'mater27.gif',
    descr: '&nbsp;&nbsp;&nbsp;����� ����� � ������� �� <strong>I8</strong> �� 2� ����� "������ ����".',
				recipes: {'spell_ug_undam2c': 1,'spell_curseb': 1,'sp_tacpts_KRT3': 2,'booklearn_slot9': 3,'booklearn_spell5': 3}
		},                                                                                                                                               
		mater28:{                                                                                                                                        
				name: '�������� �����',  cena: 1,
				src: imP3 + 'mater28.gif',
				recipes: {'spell_ug_unp10c': 1,'spell_ug_unexprc': 1,'spell_curse': 1,'sp_tacpts_CNTR3': 2,'booklearn_slot9': 3,'booklearn_8': 3}
		},                                                                                                                                               
		mater29:{                                                                                                                                        
				name: '�������� �����',  cena: 1,
				src: imP3 + 'mater29.gif',
    descr: '&nbsp;&nbsp;&nbsp;����� ����� � ������� �� <strong>�8</strong> �� 1� ����� "������".',
				recipes: {'spell_ug_undam1c': 1,'spell_curse': 1,'sp_tacpts_BLK3': 2,'booklearn_slot9': 3}
		},                                                                                                                                               
		mater30:{                                                                                                                                        
				name: '����� ���',  cena: 1,
				src: imP3 + 'mater30.gif',
    descr: '&nbsp;&nbsp;&nbsp;����� ����� � ������� �� <strong>�11</strong> �� 2� ����� "���".',
				recipes: {'spell_ug_undam3c': 1,'spell_curseb': 1,'sp_tacpts_HIT3': 2,'booklearn_slot9': 3,'booklearn_10': 3}
		},                                                                                                                                               
		mater20:{
				name: '�������� ������� �����',  cena: 3,
				src: imP3 + 'mater20.gif',
				recipes: {'sp_tacpts_CNTR4': 1,'sp_tacpts_CNTR5': 1,'enh_5_3': 1,'booklearn_slot10': 5}
		},
		mater21:{
				name: '�������� �������',  cena: 3,
				src: imP3 + 'mater21.gif',
				recipes: {'sp_tacpts_BLK4': 1,'sp_tacpts_BLK5': 1,'enh_4_3': 1,'booklearn_slot10': 5,'booklearn_6': 1,'booklearn_spell4': 1}
		},
		mater22:{
				name: '�������� �������',  cena: 3,
				src: imP3 + 'mater22.gif',
				recipes: {'sp_tacpts_HIT4': 1,'sp_tacpts_HIT5': 1,'enh_3_3': 1,'booklearn_slot10': 5,'booklearn_9': 1,'booklearn_spell2': 1}
		},
 		 mater31:{
				name: '�������� ���������� �����',  cena: 3,
				src: imP3 + 'mater31.gif',
				recipes: {'spell_curseb': 1,'sp_tacpts_KRT4': 1,'sp_tacpts_KRT5': 1,'enh_9_3': 1,'booklearn_slot10': 5,'booklearn_7': 1}
		},
		mater23:{
				name: '�������',
				src: imP3 + 'mater23.gif',  cena: 3,
				recipes: {'sp_tacpts_BLK5': 1,'sp_tacpts_HIT5': 1,'sp_tacpts_KRT5': 1,'sp_tacpts_CNTR5': 1,'sp_tacpts_PRY5': 1,'booklearn_slot10': 5,'booklearn_spell1': 1}
		},
		mater24:{
				name: '���������',
				src: imP3 + 'mater24.gif',  cena: 3,
				recipes: {'spell_ug_unp10c': 1,'spell_ug_unexprc': 1,'spell_curseb': 1,'sp_tacpts_PRY4': 1,'sp_tacpts_PRY5': 1,'enh_1_3': 1,'booklearn_slot10': 5,'booklearn_spell3': 1}
		},

		mater_shop7:{
				name: '�������� �������',
				src: imP3 + 'mater_shop7.gif',
				recipes:  null
		},



		mater267:{
				name: '������������ �����',  
				src: imP3 + 'mater267.gif',
				recipes:  null,
    descr: '����� ������ � ��������� �������� "��������".'
 		},
		mater261:{
				name: '������ �����',  
				src: imP3 + 'mater261.gif',
				recipes:  null,
    descr: '����� ������ � ��������� �������� "������".'
 		},
  mater262:{
				name: '������� ������',  
				src: imP3 + 'mater262.gif',
				recipes:  null,
    descr: '����� ������ � ��������� �������� "������".'
 		},
  		mater275:{
				name: '����� ��������',  
				src: imP3 + 'mater275.gif',
				recipes:  null,
    descr: '����� ������ � ��������� �������� "������ ����".'
 		},
		mater276:{
				name: '�������� ����',  
				src: imP3 + 'mater276.gif',
				recipes:  null,
    descr: '����� ������ � ��������� �������� "������ ����".'
 		},
		mater_izumrud:{
				name: '������ �������',
				src: imP3 + 'mater_izumrud.gif',
				recipes: null,
    descr: '�����: 1<br />�������������: 0/1<br />��������: 1 ��.<br />������� � Emeralds city<br /><font color=brown>������� �� �������� �������</font><br />  <b>���� ������ � ������:</b><br />1 ������� = ������� ������� �������� (35 �����)<br />1 ������� = 10 �������� �������<br />1 ������� = 5 ��������� �������<br />1 ������� = �������� ������<br />����� ������ �� ���� ������. ���� ����� ������ � ������� ��������� �����.'
 		},
		runetoken:{
				name: '�������� ������ ',
				src: imP3 + 'runetoken.gif',
				recipes: null,
    descr: '�����: 1<br />�������������: 0/1<br /><strong>��������:</strong><br />����� ���� ������������ �� ������ ����� ������ <br />(�������� � ������� 10 ��. ��������� ����� ������)<br />������� � Emeralds city<br /><font color=brown>������� �� �������� �������</font>'
 		},
//�����
		mater292:{
				name: '����������� �����',
				src: imP3 + 'mater292.gif',
				recipes:  null,
    descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />�������������: 0/1<br />����� ����� � "�������� ����", "����� �����", ����� ������ � "�������� ������".'
 		},
		mater293:{
				name: '��������� ��������',
				src: imP3 + 'mater293.gif',
				recipes:  null,
    descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />�������������: 0/1<br />����� ����� � "�������� ����", "����� �����", ����� ������ � "�������� ������".'
 		},
		mater294:{
				name: '����� ������� ��������',
				src: imP3 + 'mater294.gif',
				recipes:  null,
    descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />�������������: 0/1<br />����� ����� � "�������� ����", "������", "����� �����".'
 		},
		mater295:{
				name: '���������� �����',
				src: imP3 + 'mater295.gif',
				recipes:  null,
    descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />�������������: 0/1<br />����� ������ � "�������� ��������" "��������� �����".'
 		},
		mater296:{
				name: '��������� ���������� �������',
				src: imP3 + 'mater296.gif',
				recipes:  null,
    descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />�������������: 0/1<br />����� ����� � "������� �����" ��� "�������� �����".'
 		},
		mater297:{
				name: '���������� ���������',
				src: imP3 + 'mater297.gif',
				recipes:  null,
    descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />�������������: 0/1<br />����� ����� � "����� �����", "�������� ����", ����� ������ � "�������� ������".'
 		},
		mater298:{
				name: '������� ���',
				src: imP3 + 'mater298.gif',
				recipes:  null,
    descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />�������������: 0/1<br />����� ����� � "������� ����", "��������� ����" � "������� ����".'
 		},
		mater299:{
				name: '������ �����',
				src: imP3 + 'mater299.gif',
				recipes:  null,
    descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />�������������: 0/1<br />����� ����� � "������", "��������� ���", "����� �����", "�������� �������" ��� ������ � "������� ����������" � "������� ���������".'
 		},
		mater300:{
				name: '����� �����',
				src: imP3 + 'mater300.gif',
				recipes:  null,
    descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />�������������: 0/1<br />����� ����� � "������" ��� ������ � "������� ����������" � "������� ���������".'
 		},
		mater301:{
				name: '����� ��������� ������',
				src: imP3 + 'mater301.gif',
				recipes:  null,
    descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />�������������: 0/1<br />����� ������ � "�������� ������".'
 		},

//����
  mater_suv_drop:{
				name: '�������',
				src: imP3 + 'mater_suv_drop.gif',
				recipes: null,
				descr: '�����: 0.1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><BR>�������������: 0/1'
		},
  mater_suv_rew:{
				name: '��������� �������',
				src: imP3 + 'mater_suv_rew.gif',
				recipes: null,
				descr: '�����: 1  <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/> <BR>��������� �������: <B> [�������]x100 </B> <BR>�������������: 0/1'
		},
  shiph_token:{
				name: '����� ��������� �����',
				src: imP3 + 'shiph_token.gif',
				recipes: null,
				descr: '� ������ ������������ ������ � <B>��������� �����</B>, <br />�� ���� <B>�����</B> ���� ��� ������ <B>���������� �����: ���������</B>.'
		},
  lik_token:{
				name: '����� ���� �����',
				src: imP3 + 'lik_token.gif',
				recipes: null,
				descr: '� ������ ������������ ������ � <B>���� �����</B>, <br />�� ���� <B>�����</B> ���� ��� ������ <B>���������� ����: ���������</B>.'
		},
  ship_token:{
				name: '����� ���������',
				src: imP3 + 'ship_token.gif',
				recipes: null,
				descr: '� ������ ������������ ������ � <B>���������</B>, <br />�� ���� <B>�����</B> ���� ��� ������ <B>���������� ������: ���������</B>.'
		},
  valent_token:{
				name: '����� ������������� ��������',
				src: imP3 + 'valent_token.gif',
				recipes: null,
				descr: '� ������ ������������ ������ � <B>������������� ��������</B>, <br />�� ���� <B>�����</B> ���� ��� ������ <B>���������� ������: ���������</B>.'
		},
  fanatik_token:{
				name: '����� �������� �����',
				src: imP3 + 'fanatik_token.gif',
				recipes: null,
				descr: '� ������ ������������ ������ � <B>�������� �����</B>, <br />�� ���� <B>�����</B> ���� ��� ������ <B>���������� ������: ���������</B>.'
		},
*/
	 gg3_hishn_kolch:{
				name: '����� ������ ������ ��������',
				src: imP3 + 'gg3_hishn_kolch.gif', recipes: null,
				descr: '�����: 0.1 <img src="'+d4+'" alt="'+d5+'"/><br />�������������: 0/1<br /><strong>��������:</strong><br />������ �����, ����������������� ������. ��� ����� ���������� �� ����� "�����"?<br />�������� � "��������" �� ��������.<br /> - ������ � ����� 3�� ����� ��������, �� ����� �������� � � "�������".'
		},
	 gg3_hishn_dosp:{
				name: '������� �������',
				src: imP3 + 'gg3_hishn_dosp.gif',	recipes: null,
				descr: '�����: 0.1 <img src="'+d4+'" alt="'+d5+'"/><br />�������������: 0/1<br /><strong>��������:</strong><br />����� ������� ���������������� �����. ���� ��� ������ ������������ ������ �������, ��� ��� ��� �� ������.<br />�������� � "��������" �� ��������.<br /> - ������ � ����� 3�� ����� ��������, �� ����� �������� � � "�������".'
		},
	 gg3_hishn_sword:{
				name: '������� ����',
				src: imP3 + 'gg3_hishn_sword.gif',  recipes: null,
				descr: '�����: 0.1 <img src="'+d4+'" alt="'+d5+'"/><br />�������������: 0/1<br /><strong>��������:</strong><br />����� ���� � ��������. ������ �� �����, ������ �������� � �����.<br />�������� � "��������" �� ��������.<br /> - ������ � ����� 3�� ����� ��������, �� ����� �������� � � "�������".'
		},
	 gg3_hishn_finger:{
				name: '����� ������ ��������',
				src: imP3 + 'gg3_hishn_finger.gif', recipes: null,
				descr: '�����: 0.1 <img src="'+d4+'" alt="'+d5+'"/><br />�������������: 0/1<br /><strong>��������:</strong><br />����� �� ��������. ������, �������, ������� �������������. ������ ������ ����������.<br />�������� � "��������" �� ��������.<br /> - ������ � ����� 3�� ����� ��������, �� ����� �������� � � "�������".'
		} 

};
/*
// �����
var pots ={


		};



	var scrolls = {
		dispell2:{
				name: '����� ���������',
				src: imP3 + 'dispell1.gif',
				descr: '�����: 1<br />����: 10 ��. <br />�������������: 0/5<br />����������� ������������: 99%<br />�������� �������������: 5 ���.<br /><strong>"���������� ����"</strong> �� ����� � <strong>�������� ������</strong> ��������� ��� �������� <strong>"������� ���"�5</strong> � <strong>"����� ������� ��������"�1</strong> �� ���� ������.',
				recipes: null
		},
		spell_curse:{
				name: '������ �����',
				src: imP3 + 'spell_curse.gif',
				descr: '�������� ��������: ���������. ����������������� �������� �����: 1440 ���. ����������� ������������: 70 %.<br />����� ������� � ���������� ������� �������� �� ������� ����� <strong>������ ������ ���������</strong> � Capital City',
				recipes: {'mater12': 1,'mater16': 1,'mater17': 1,'mater18': 1,'mater28': 1,'mater29': 1}
		},
		spell_curseb:{
				name: '������� �����',
				src: imP3 + 'spell_curseb.gif',
				descr: '�������� ��������: ���������. ����������������� �������� �����: 1440 ���.<br />����� ������� � ���������� ������� �������� �� ������� ����� <strong>������ ������ ���������</strong> � Capital City',
				recipes: {'mater4': 1, 'mater14': 3, 'mater25': 1, 'mater27': 1, 'mater30': 1, 'mater31': 1, 'mater24': 1}
		},
		'd_blat-6':{
				name: '������� �������',
				src: imP3 + 'd_blat-6.gif',
				descr: '��������� ������ � ���������� �� 6 ����� ������. ����������� ������������: 99 %.<br />����� ���� � �������, ������� �� ����� � <strong>������ ������ ���������</strong> � Capital City ��� � �������� �������� ����� � <strong>������</strong> Angels City',
				recipes: null
		},
 
		dispell1:{
				name: '����� ���������',
				src: imP3 + 'dispell1.gif',
				descr: '����������� ������������: 99 %<br />����� ���� � ������� �� ������ ����� <strong>������ ������ ���������</strong> � Capital City',
				recipes: null
		},
		cureHP60:{
				name: '�������������� ������� 60HP',
				src: imP3 + 'cureHP60.gif',
				descr: '�����: 1 <br />����: 4 ��. <br />�������������: 0/1 <br />����������� ������������: 70% <br />��������� �����������: <br />� ���������: 8 <br />� �������: 4 <br />�������� ��������: ���������<br />����� ����� � <strong>����������</strong> � Demons City',
				recipes: null
		} 
 
	};
		


var charki ={
		enhp_6_revamp10:{
				name: '���������� ������: ����������� ���� [1]',
				src: imP3 + 'enhp_6_revamp10.gif',
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 1 ��. <br />�������������: 0/1 <br /><strong style="color:#880000">�������� ��������:</strong> <strong>����������� ����</strong> <br />"��� ��������� ����������� �������� � ���������� 10HP.<br />���� ������������: 2.5% ��� ��������� �����" <br />��������: <br />� ������������� ���� ������� ������ ���������� ���� ������� � ���������� 10 ������ �������� ��� ��������� �����������.<br />����� ������� � ���������� ������� �������� �� ������� ����� <strong>������ ������ ���������</strong> � Capital City<br />������:<br /><strong style="color:#006600">�������� ������ �������</strong> - 1 ��. <strong style="color:#006600">������� �����</strong> - 1 ��.<strong style="color:#006600">������� �������</strong> - 1 ��.',
				recipes: null
		},
		enhp_6_revamp10_2:{
				name: '���������� ������: ����������� ���� [2]',
				src: imP3 + 'enhp_6_revamp10_2.gif',
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 1 ��. <br />�������������: 0/1 <br /><strong style="color:#880000">�������� ��������:</strong> <strong>����������� ����</strong> <br />"��� ��������� ����������� �������� � ���������� 10HP.<br />���� ������������: 5% ��� ��������� �����" <br />��������: <br />� ������������� ���� ������� ������ ���������� ���� ������� � ���������� 10 ������ �������� ��� ��������� �����������.<br />����� ������� � ���������� ������� �������� �� ������� ����� <strong>������ ������ ���������</strong> � Capital City<br />������:<br /><strong style="color:#006600">���������� ������: ����������� ���� [1]</strong> - 1 ��.  ',
				recipes: null
		},

		enh_1_0:{
				name: '���������� ��������� [0]',
				src: imP3 + 'enh_1_0.gif',
				descr: '�����: 1 <br />����: 5 ��. <br />�������������: 0/1 <br />�������� ��������: �������� <br />��������: <br />��� - ������� ���������� � ��������. ���� ������ �������   ����...<br />����� ����� � <strong>����������</strong> � Demons City',
				recipes: null
		},
		enh_3_0:{
				name: '���������� ������ [0]',
				src: imP3 + 'enh_3_0.gif',
				descr: '�����: 1 <br />����: 5 ��. <br />�������������: 0/1 <br />�������� ��������: �������� <br />��������: <br />��� - ������� ���������� � ��������. ���� ������ �������   ����...<br />����� ����� � <strong>����������</strong> � Demons City',
				recipes: null
		},
		enh_4_0:{
				name: '���������� ����� [0]',
				src: imP3 + 'enh_4_0.gif',
				descr: '�����: 1 <br />����: 5 ��. <br />�������������: 0/1 <br />�������� ��������: �������� <br />��������: <br />��� - ������� ���������� � ��������. ���� ������ �������   ����...<br />����� ����� � <strong>����������</strong> � Demons City',
				recipes: null
		},
		enh_5_0:{
				name: '���������� �������� [0]',
				src: imP3 + 'enh_5_0.gif',
				descr: '�����: 1 <br />����: 5 ��. <br />�������������: 0/1 <br />�������� ��������: �������� <br />��������: <br />��� - ������� ���������� � ��������. ���� ������ �������   ����...<br />����� ����� � <strong>����������</strong> � Demons City',
				recipes: null
		},
		enh_9_0:{
				name: '���������� ���� [0]',
				src: imP3 + 'enh_9_0.gif',
				descr: '�����: 1 <br />����: 5 ��. <br />�������������: 0/1 <br />�������� ��������: �������� <br />��������: <br />��� - ������� ���������� � ��������. ���� ������ �������   ����...<br />����� ����� � <strong>����������</strong> � Demons City',
				recipes: null
		},
  		enh_1_1:{
				name: '���������� ��������� [1]',
				src: imP3 + 'enh_1_1.gif',
				descr: '�����: 1 <br />����: 15 ��. <br />�������������: 0/1 <br />����������� ������������:   99%<br />�������� ��������: �������� <br />��������: <br />��� - ������� ���������� � ��������. �������� � ��� ��������, ���������� � ��������.<br />����� ������� � <strong>����������</strong> � Demons City<br />������:<br /><strong style="color:#006600">���������� ��������� [0]</strong> - 3 ��. <strong style="color:#006600">������������� ����</strong> - 1 ��.',
				recipes: null
		},
		enh_3_1:{
				name: '���������� ������ [1]',
				src: imP3 + 'enh_3_1.gif',
				descr: '�����: 1 <br />����: 15 ��. <br />�������������: 0/1 <br />����������� ������������:   99%<br />�������� ��������: �������� <br />��������: <br />��� - ������� ���������� � ��������. �������� ��� ���� ����� ������.<br />����� ������� � <strong>����������</strong> � Demons City<br />������:<br /><strong style="color:#006600">���������� ������ [0]</strong> - 3 ��. <strong style="color:#006600">������������� ����</strong> - 1 ��.',
				recipes: null
		},
		enh_4_1:{
				name: '���������� ����� [1]',
				src: imP3 + 'enh_4_1.gif',
				descr: '�����: 1 <br />����: 15 ��. <br />�������������: 0/1 <br />����������� ������������:   99%<br />�������� ��������: �������� <br />��������: <br />��� - ������� ���������� � ��������. �������� ��� ���� ����� ����� � �����.<br />����� ������� � <strong>����������</strong> � Demons City<br />������:<br /><strong style="color:#006600">���������� ����� [0]</strong> - 3 ��. <strong style="color:#006600">������������� ����</strong> - 1 ��.',
				recipes: null
		},
		enh_5_1:{
				name: '���������� �������� [1]',
				src: imP3 + 'enh_5_1.gif',
				descr: '�����: 1 <br />����: 15 ��. <br />�������������: 0/1 <br />����������� ������������:   99%<br />�������� ��������: �������� <br />��������: <br />��� - ������� ���������� � ��������. �������� ��� ��������, ������� � ������.<br />����� ������� � <strong>����������</strong> � Demons City<br />������:<br /><strong style="color:#006600">���������� �������� [0]</strong> - 3 ��. <strong style="color:#006600">������������� ����</strong> - 1 ��.',
				recipes: null
		},
		enh_9_1:{
				name: '���������� ���� [1]',
				src: imP3 + 'enh_9_1.gif',
				descr: '�����: 1 <br />����: 15 ��. <br />�������������: 0/1 <br />����������� ������������:   99%<br />�������� ��������: �������� <br />��������: <br />��� - ������� ���������� � ��������. �������� ��� ������ � ���� ��� �����.<br />����� ������� � <strong>����������</strong> � Demons City<br />������:<br /><strong style="color:#006600">���������� ���� [0]</strong> - 3 ��. <strong style="color:#006600">������������� ����</strong> - 1 ��.',
				recipes: null
		},
		enh_1_2:{
				name: '���������� ��������� [2]',
				src: imP3 + 'enh_1_2.gif',
				descr: '�����: 1 <br />����: 50 ��. <br />�������������: 0/1 <br />����������� ������������:   99%<br />�������� ��������: �������� <br />��������: <br />��� - ������� ���������� � ��������. �������� � ��� ��������, ���������� � ��������.<br />����� ������� � <strong>����������</strong> � Demons City<br />������:<br /><strong style="color:#006600">���������� ��������� [1]</strong> - 3 ��. <strong style="color:#006600">������������� ����</strong> - 1 ��.',
				recipes: null
		},
		enh_3_2:{
				name: '���������� ������ [2]',
				src: imP3 + 'enh_3_2.gif',
				descr: '�����: 1 <br />����: 50 ��. <br />�������������: 0/1 <br />����������� ������������:   99%<br />�������� ��������: �������� <br />��������: <br />��� - ������� ���������� � ��������. �������� ��� ���� ����� ������.<br />����� ������� � <strong>����������</strong> � Demons City<br />������:<br /><strong style="color:#006600">���������� ������ [1]</strong> - 3 ��. <strong style="color:#006600">������������� ����</strong> - 1 ��.',
				recipes: null
		},
		enh_4_2:{
				name: '���������� ����� [2]',
				src: imP3 + 'enh_4_2.gif',
				descr: '�����: 1 <br />����: 50 ��. <br />�������������: 0/1 <br />����������� ������������:   99%<br />�������� ��������: �������� <br />��������: <br />��� - ������� ���������� � ��������. �������� ��� ���� ����� ����� � �����.<br />����� ������� � <strong>����������</strong> � Demons City<br />������:<br /><strong style="color:#006600">���������� ����� [1]</strong> - 3 ��. <strong style="color:#006600">������������� ����</strong> - 1 ��.',
				recipes: null
		},
		enh_5_2:{
				name: '���������� �������� [2]',
				src: imP3 + 'enh_5_2.gif',
				descr: '�����: 1 <br />����: 50 ��. <br />�������������: 0/1 <br />����������� ������������:   99%<br />�������� ��������: �������� <br />��������: <br />��� - ������� ���������� � ��������. �������� ��� ��������, ������� � ������.<br />����� ������� � <strong>����������</strong> � Demons City<br />������:<br /><strong style="color:#006600">���������� �������� [1]</strong> - 3 ��. <strong style="color:#006600">������������� ����</strong> - 1 ��.',
				recipes: null
		},
		enh_9_2:{
				name: '���������� ���� [2]',
				src: imP3 + 'enh_9_2.gif',
				descr: '�����: 1 <br />����: 50 ��. <br />�������������: 0/1 <br />����������� ������������:   99%<br />�������� ��������: �������� <br />��������: <br />��� - ������� ���������� � ��������. �������� ��� ������ � ���� ��� �����.<br />����� ������� � <strong>����������</strong> � Demons City<br />������:<br /><strong style="color:#006600">���������� ���� [1]</strong> - 3 ��. <strong style="color:#006600">������������� ����</strong> - 1 ��.',
				recipes: null
		},
		enh_1_3:{
				name: '���������� ��������� [3]',                                                                                                                                                                                                                                                                                                                                                                                                       
				src: imP3 + 'enh_1_3.gif',
				descr: '�����: 1 <br />����: 150 ��. <br /><img src="'+imP2+'align50.gif" />����: 100 ���. <br />�������������: 0/1 <br />����������� ������������:   99%<br />�������� ��������: �������� <br />��������: <br />�������� � ��� ��������, ���������� � ��������.<br />����� ������� � <strong>����������</strong> � Demons City<br />������:<br /><strong style="color:#006600">���������� ��������� [2]</strong> - 3 ��. <strong style="color:#006600">������������� ����</strong> - 1 ��.<strong style="color:#006600">"���������"</strong> - 1 ��.',
				recipes: null
		},
		enh_3_3:{
				name: '���������� ������ [3]',
				src: imP3 + 'enh_3_3.gif',
				descr: '�����: 1 <br />����: 150 ��. <br /><img src="'+imP2+'align50.gif" />����: 100 ���.<br />�������������: 0/1 <br />����������� ������������:   99%<br />�������� ��������: �������� <br />��������: <br />�������� ��� ���� ����� ������.<br />����� ������� � <strong>����������</strong> � Demons City<br />������:<br /><strong style="color:#006600">���������� ������ [2]</strong> - 3 ��. <strong style="color:#006600">������������� ����</strong> - 1 ��.<strong style="color:#006600">"�������� �������"</strong> - 1 ��.',
				recipes: null
		},
		enh_4_3:{
				name: '���������� ����� [3]',
				src: imP3 + 'enh_4_3.gif',
				descr: '�����: 1 <br />����: 150 ��. <br /><img src="'+imP2+'align50.gif" />����: 100 ���.<br />�������������: 0/1 <br />����������� ������������:   99%<br />�������� ��������: �������� <br />��������: <br />�������� ��� ���� ����� ����� � �����.<br />����� ������� � <strong>����������</strong> � Demons City<br />������:<br /><strong style="color:#006600">���������� ����� [2]</strong> - 3 ��. <strong style="color:#006600">������������� ����</strong> - 1 ��. <strong style="color:#006600">"�������� �������"</strong> - 1 ��.',
				recipes:  null
		},
		enh_5_3:{
				name: '���������� �������� [3]',
				src: imP3 + 'enh_5_3.gif',
				descr: '�����: 1 <br />����: 150 ��. <br /><img src="'+imP2+'align50.gif" />����: 100 ���.<br />�������������: 0/1 <br />����������� ������������:   99%<br />�������� ��������: �������� <br />��������: <br />�������� ��� ��������, ������� � ������.<br />����� ������� � <strong>����������</strong> � Demons City<br />������:<br /><strong style="color:#006600">���������� �������� [2]</strong> - 3 ��. <strong style="color:#006600">������������� ����</strong> - 1 ��.<strong style="color:#006600">"�������� ������� �����"</strong> - 1 ��.',
				recipes: null
		},
		enh_9_3:{
				name: '���������� ���� [3]',
				src: imP3 + 'enh_9_3.gif',
				descr: '�����: 1 <br />����: 150 ��.<br /><img src="'+imP2+'align50.gif" />����: 100 ���. <br />�������������: 0/1 <br />����������� ������������:   99%<br />�������� ��������: �������� <br />��������: <br />�������� ��� ������ � ���� ��� �����.<br />����� ������� � <strong>����������</strong> � Demons City<br />������:<br /><strong style="color:#006600">���������� ���� [2]</strong> - 3 ��. <strong style="color:#006600">������������� ����</strong> - 1 ��.<strong style="color:#006600">"�������� ���������� �����"</strong> - 1 ��.',
				recipes: null
		},
 
		enhp_5_dampen_all_1:{
				name: '���������� ���� ���� ��������� ������� 1', city: 1,
				src: imP3 + 'enhp_5_dampen_all_1.gif  ',
				descr: '����: 50 ��.  <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />��������� �������:<strong> <font color=red>�������� �������, [������]x3</font></strong><br />�������������: 0/1 �<br />���� ��������: 30 ��.<br />�������� ��������: ��������� ������� <br />��������:<br />������������ ���� ������� ���� ����� ���� �������� �������� �������������� ������������ ����������. <br />�������� � ���������� 5 ������������, 5 ����������, 5 ��������, 5 ���� � 5 �������� �� 5 ��������<br />���� ������������: 5% ��� ��������� ����� � ����.',
				recipes: null
		},
		enhp_5_defend_all_1:{
				name: '���������� ����: ���� ���� ������ 1', city: 2,
				src: imP3 + 'enhp_5_defend_all_1.gif',
				descr: '����: 50 ��.  <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />��������� �������:<strong> <font color=red>[���������] X 1, [������] X 3</font></strong><br />�������������: 0/1 �<br />���� ��������: 30 ��.<br />�������� ��������: ���� ������<br />��������:<br />������������ ���� ������� ���� ����� ���� ��������� 40% ����������� ��� �����. <br />���� ������������: 5% ��� ��������� ����� � ����.'
			},
		enhp_13_pm_revard:{
				name: '���������� ������: �������� +12', city: 3,
				src: imP3 + 'enhp_13_pm_revard.gif',
				descr: '����: 50 ��.  <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br /><strong>��������� �������:</strong> <strong> <font color=red>�������� ������� �����, [������ ��������� ����]x3</font></strong><br />�������������: 0/1 <br /><strong>��������� ��:</strong><br /> � ������� ����� (HP): +12 <br />��������:<br /> ��� ������������� �� ������, ����������� ������� �������� �� 12  '
			},
  enhp_19_2:{
				name: '���������� ������: ��������� F',
				src: imP3 + 'enhp_19_2.gif',
				recipes: null,
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/> <BR>����: 1 ��.<BR>��������� �������: <strong> [��������� �������]x3 </strong> <BR>�������������: 0/1 <BR>����������� ������������: 99%<BR><strong>��������� ��:</strong><BR>� ������� ����� (HP): +40<BR><SMALL><strong>��������:</strong><BR>��� ������������� �� ������ ����������� ������� �������� �� 40.</SMALL>'
		},
  enhp_19_3:{
				name: '���������� ������: ������ �� ����� F',
				src: imP3 + 'enhp_19_3.gif',
				recipes: null,
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/> <BR>����: 1 ��.<BR>��������� �������: <strong> [��������� �������]x3 </strong> <BR>�������������: 0/1 <BR>����������� ������������: 99%<BR><strong>��������� ��:</strong><BR>� ������ �� �����: +20<BR><SMALL><strong>��������:</strong><BR>��� ������������� �� ������ ����������� ������ �� ����� �� 20.</SMALL>'
		},
  enhp_19_1:{
				name: '���������� ������: ������ �� ����� F',
				src: imP3 + 'enhp_19_1.gif',
				recipes: null,
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/> <BR>����: 1 ��.<BR>��������� �������: <strong> [��������� �������]x3 </strong> <BR>�������������: 0/1 <BR>����������� ������������: 99%<BR><strong>��������� ��:</strong><BR>� ������ �� �����: +20<BR><SMALL><strong>��������:</strong><BR>��� ������������� �� ������ ����������� ������ �� ����� �� 20.</SMALL>'
		},
  enhp_9_5:{
				name: '���������� ����: ��������� F',
				src: imP3 + 'enhp_9_5.gif',
				recipes: null,
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/> <BR>����: 1 ��.<BR>�������������: 0/1<BR>����������� ������������: 99%<BR><STRONG>��������� ��:<BR></STRONG>� ���������� ����������: 2<BR>� ������ �� �����: +5<BR><SMALL>��� ������������� �� ���� ��������� 2 ��������� ���������. ��������� ����� ������� �� ������������� ������.</SMALL><BR> ������������ � ����� �� ����� ���� �����'
		},
  enhp_12_4:{
				name: '���������� ������: ��������� F',
				src: imP3 + 'enhp_12_4.gif',
				recipes: null,
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/> <BR>����: 1 ��. <BR>�������������: 0/1<BR>����������� ������������: 99%<BR><strong>��������� ��:</strong><BR>� ���������� ����������: 2<BR>� ��. ������ ������������ ����� (%): +10<BR><SMALL>��� ������������� �� ������ ��������� 2 ��������� ���������. ��������� ����� ������� �� ������������� ������.</SMALL><BR> ������������ � ����� �� ����� ���������'
		},
   enhp_4_4:{
				name: '���������� �����: ��������� F',
				src: imP3 + 'enhp_4_4.gif',
				recipes: null,
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/> <BR>����: 1 ��. <BR>�������������: 0/1<BR>����������� ������������: 99%<BR><strong>��������� ��:</strong><BR>� ���������� ����������: 2<BR>� ��. ������ ����������� (%): +10<BR><SMALL>��� ������������� �� ����� ��������� 2 ��������� ���������. ��������� ����� ������� �� ������������� ������.</SMALL><BR> ������������ � ����� �� ����� ��������� �����'
		},
  enhp_2_4:{
				name: '���������� ������: ��������� F',
				src: imP3 + 'enhp_2_4.gif',
				recipes: null,
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/> <BR>����: 1 ��.  <BR>�������������: 0/1<BR>����������� ������������: 99%<BR><strong>��������� ��:</strong><BR>� ���������� ����������: 2<BR>� ������ �� �����: +5<BR><SMALL>��� ������������� �� ������ ��������� 2 ��������� ���������. ��������� ����� ������� �� ������������� ������.</SMALL><BR> ������������ � ����� �� ����� ������������� ��������'
		},
 enhp_19_4:{
				name: '���������� ������: ��������� F',
				src: imP3 + 'enhp_19_4.gif',
				recipes: null,
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><BR>����: 1 ��.<BR>�������������: 0/1<BR>����������� ������������: 99%<BR><strong>��������� ��:</strong><BR>� ���������� ����������: 3<BR><SMALL>��� ������������� �� ������ ��������� 3 ��������� ���������. ��������� ����� ������� �� ������������� ������.</SMALL><BR> ������������ � ����� �� ����� �������� �����'
		} 
};

var taktiks ={
		sp_tacpts_HIT1:{
				name: '������� ���: 1 F',
				src: imP3 + 'sp_tacpts_HIT1.gif',
				descr:  '�����: 1 <br />����: 10 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 1 ����� ����� - <img src="'+imP42+'hit.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater7': 3}
		},
		sp_tacpts_HIT2:{
				name: '������� ���: 2 F',
				src: imP3 + 'sp_tacpts_HIT2.gif',
				descr: '�����: 1 <br />����: 20 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 2 ������ ����� - <img src="'+imP42+'hit.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater18': 2}
		},
		sp_tacpts_HIT3:{
				name: '������� ���: 3 F',
				src: imP3 + 'sp_tacpts_HIT3.gif',
				descr: '�����: 1 <br />����: 30 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 3 ������ ����� - <img src="'+imP42+'hit.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater30': 2}
		},
		sp_tacpts_HIT4:{
				name: '������� ���: 4 F',
				src: imP3 + 'sp_tacpts_HIT4.gif',
				descr: '�����: 1 <br />����: 40 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 4 ������ ����� - <img src="'+imP42+'hit.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater22': 1}
		},
		sp_tacpts_HIT5:{
				name: '������� ���: 5 F',
				src: imP3 + 'sp_tacpts_HIT5.gif',
				descr: '�����: 1 <br />����: 50 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 5 ������� ����� - <img src="'+imP42+'hit.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater22': 1,'mater23': 1}
		},
		sp_tacpts_BLK1:{
				name: '������� ������: 1 F',
				src: imP3 + 'sp_tacpts_BLK1.gif',
				descr: '�����: 1 <br />����: 10 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 1 ����� ����� - <img src="'+imP42+'block.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater11': 3}
		},
		sp_tacpts_BLK2:{
				name: '������� ������: 2 F',
				src: imP3 + 'sp_tacpts_BLK2.gif',
				descr: '�����: 1 <br />����: 20 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 2 ������ ����� - <img src="'+imP42+'block.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater19': 2}
		},
		sp_tacpts_BLK3:{
				name: '������� ������: 3 F',
				src: imP3 + 'sp_tacpts_BLK3.gif',
				descr: '�����: 1 <br />����: 30 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 3 ������ ����� - <img src="'+imP42+'block.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater29': 2}
		},
		sp_tacpts_BLK4:{
				name: '������� ������: 4 F',
				src: imP3 + 'sp_tacpts_BLK4.gif',
				descr: '�����: 1 <br />����: 40 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 4 ������ ����� - <img src="'+imP42+'block.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater21': 1}
		},
		sp_tacpts_BLK5:{
				name: '������� ������: 5 F',
				src: imP3 + 'sp_tacpts_BLK5.gif',
				descr: '�����: 1 <br />����: 50 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 5 ������� ����� - <img src="'+imP42+'block.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater21': 1,'mater23': 1}
		},
		sp_tacpts_KRT1:{
				name: '������� �����: 1 F',
				src: imP3 + 'sp_tacpts_KRT1.gif',
				descr: '�����: 1 <br />����: 10 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 1 ����� ����� - <img src="'+imP42+'krit.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater9': 3}
		},
		sp_tacpts_KRT2:{
				name: '������� �����: 2 F',
				src: imP3 + 'sp_tacpts_KRT2.gif',
				descr: '�����: 1 <br />����: 20 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 2 ������ ����� - <img src="'+imP42+'krit.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater16': 2}
		},
		sp_tacpts_KRT3:{
				name: '������� �����: 3 F',
				src: imP3 + 'sp_tacpts_KRT3.gif',
				descr: '�����: 1 <br />����: 30 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 3 ������ ����� - <img src="'+imP42+'krit.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater27': 2}
		},
		sp_tacpts_KRT4:{
				name: '������� �����: 4 F',
				src: imP3 + 'sp_tacpts_KRT4.gif',
				descr: '�����: 1 <br />����: 40 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 4 ������ ����� - <img src="'+imP42+'krit.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater31': 1}
		},
		sp_tacpts_KRT5:{
				name: '������� �����: 5 F',
				src: imP3 + 'sp_tacpts_KRT5.gif',
				descr: '�����: 1 <br />����: 50 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 5 ������� ����� - <img src="'+imP42+'krit.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater31': 1,'mater23': 1}
		},
		sp_tacpts_CNTR1:{
				name: '������� ������: 1 F',
				src: imP3 + 'sp_tacpts_CNTR1.gif',
				descr: '�����: 1 <br />����: 10 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 1 ����� ������� - <img src="'+imP42+'counter.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater10': 3}
		},
		sp_tacpts_CNTR2:{
				name: '������� ������: 2 F',
				src: imP3 + 'sp_tacpts_CNTR2.gif',
				descr: '�����: 1 <br />����: 20 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 2 ������ ������� - <img src="'+imP42+'counter.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater17': 2}
		},
		sp_tacpts_CNTR3:{
				name: '������� ������: 3 F',
				src: imP3 + 'sp_tacpts_CNTR3.gif',
				descr: '�����: 1 <br />����: 30 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 3 ������ ������� - <img src="'+imP42+'counter.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater28': 2}
		},
		sp_tacpts_CNTR4:{
				name: '������� ������: 4 F',
				src: imP3 + 'sp_tacpts_CNTR4.gif',
				descr: '�����: 1 <br />����: 40 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 4 ������ ������� - <img src="'+imP42+'counter.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater20': 1}
		},
		sp_tacpts_CNTR5:{
				name: '������� ������: 5 F',
				src: imP3 + 'sp_tacpts_CNTR5.gif',
				descr: '�����: 1 <br />����: 50 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 5 ������� ������� - <img src="'+imP42+'counter.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater20': 1,'mater23': 1}
		},
		sp_tacpts_PRY1:{
				name: '������� ���������: 1 F',
				src: imP3 + 'sp_tacpts_PRY1.gif',
				descr: '�����: 1 <br />����: 10 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 1 ����� ����������� - <img src="'+imP42+'parry.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater8': 3}
		},
		sp_tacpts_PRY2:{
				name: '������� ���������: 2 F',
				src: imP3 + 'sp_tacpts_PRY2.gif',
				descr: '�����: 1 <br />����: 20 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 2 ������ ����������� - <img src="'+imP42+'parry.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater15': 2}
		},
		sp_tacpts_PRY3:{
				name: '������� ���������: 3 F',
				src: imP3 + 'sp_tacpts_PRY3.gif',
				descr: '�����: 1 <br />����: 30 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 3 ������ ����������� - <img src="'+imP42+'parry.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater26': 2}
		},
		sp_tacpts_PRY4:{
				name: '������� ���������: 4 F',
				src: imP3 + 'sp_tacpts_PRY4.gif',
				descr: '�����: 1 <br />����: 40 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 4 ������ ����������� - <img src="'+imP42+'parry.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater24': 1}
		},
		sp_tacpts_PRY5:{
				name: '������� ���������: 5 F',
				src: imP3 + 'sp_tacpts_PRY5.gif',
				descr: '�����: 1 <br />����: 50 ��. <br />�������������: 0/1 <br /> �������� �������������: 3 ���.<br />&nbsp;� ���������� ����������<br /><strong>��������� �����������:</strong><br />&nbsp;� �������: 5<br /><font color=#990000>�������� ��������:</font> �������<br /><i>������� � Angels city</i><br /><font color=#990000>������� �� �������� �������</font><br />��������:<br />���� 5 ������� ����������� - <img src="'+imP42+'parry.gif"> <br />���������� � ����������� �� ������ ����� <strong>������</strong> � Angels City',
				recipes: {'mater24': 1,'mater23': 1}
		}

};

var pochin ={
 	spell_repare_1:{
				name: '������ ������� 1',          //3,5,7,10.
				src: imP3 + 'spell_repare_1.gif',
				descr: '�����: 1<br />�������������: 0/1<br />����: 1 ��. <br />������ �������� �� ��������, ��������� ������ ������ (����� ������ ������� �� ��������� ������������ � �� ����������), ����� �������� ����������� �������� �������� � ���������� ������� �������� <strong>���������� ���������</strong> � Emerald City',
				recipes: null

		}
  
};

	var rares = { 
};
*/

var ptp ={
cureHP120:{name: '������ �������� ������� (��)',src: imP3 + 'ring2.gif',
	descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br /><b>����: 1 ��. </b><br />�������������: 0/20 <br /><b>��������� �����������: </b><br>� ����: 15<br>� ������������: 10<br />� �������: 4 <br />�������� ��������: <b>����</b><br><b>��������� ��:</b><br>� ��. �����������: +25%<br/><b>� ������� �����: +10</b><font size=1px>������� � Capital city<b>������� �� �������� �������</b><b>������� �� ����������</b></font> ����� ����� � ������� ������� �����, �� ������ <b>��.</b> '
		},
invoke_maxhp:{name: '������ �������� ������� (��)',src: imP3 + 'ring2.gif',
	descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br /><b>����: 1 ��. </b><br />�������������: 0/20 <br /><b>��������� �����������: </b><br>� ����: 15<br>� ������������: 10<br />� �������: 4 <br />�������� ��������: <b>����</b><br><b>��������� ��:</b><br>� ��. �����������: +25%<br/><b>� ���������: +1</b><font size=1px>������� � Capital city<b>������� �� �������� �������</b><b>������� �� ����������</b></font> ����� ����� � ������� ������� �����, �� ������ <b>��.</b> '
		},  
pot_cureHP150_0:{ name: '������ �������� ������� (��)',city: 7, src: imP3 + 'ring2.gif',
 descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/> <br /><b>����: 1 ��. </b><br />�������������: 0/20 <br /><b>��������� �����������: </b><br>� ����: 15<br>� ������������: 10<br />� �������: 4 <br />�������� ��������: <b>����</b><br><b>��������� ��:</b><br>� ��. �����������: +25%<br/><b>� ���������: +2</b><font size=1px>������� � Capital city<b>������� �� �������� �������</b><b>������� �� ����������</b></font> ����� ����� � ������� ������� �����, �� ������ <b>��.</b> '
		}, 
pot_cureHP300_0:{ name: '������ ������ (��)',city: 7, src: imP3 + 'ring73.gif',
 descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/> <br /><b>����: 1 ��. </b><br />�������������: 0/20 <br /><b>��������� �����������: </b><br>� ����: 15<br>� ������������: 10<br />� �������: 4 <br />�������� ��������: <b>�����������</b><br><b>��������� ��:</b><br>� ��. �����������: +25%<br/><b>� ������� �����: +10</b><font size=1px>������� � Capital city<b>������� �� �������� �������</b><b>������� �� ����������</b></font> ����� ����� � ������� ������� �����, �� ������ <b>��.</b> '
		},
pot_curemana250_0:{name:'������ ������ (��)',src: imP3 + 'ring73.gif',
				descr:'�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/> <br /><b>����: 1 ��. </b><br />�������������: 0/20 <br /><b>��������� �����������: </b><br>� ����: 15<br>� ������������: 10<br />� �������: 4 <br />�������� ��������: <b>�����������</b><br><b>��������� ��:</b><br>� ��. �����������: +25%<br/><b>� ���������: +1</b><font size=1px>������� � Capital city<b>������� �� �������� �������</b><b>������� �� ����������</b></font> ����� ����� � ������� ������� �����, �� ������ <b>��.</b> '
		}, 
pot_curemana500_0:{name:'������ ������ (��)',src: imP3 + 'ring73.gif',
				descr:'�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/> <br /><b>����: 1 ��. </b><br />�������������: 0/20 <br /><b>��������� �����������: </b><br>� ����: 15<br>� ������������: 10<br />� �������: 4 <br />�������� ��������: <b>�����������</b><br><b>��������� ��:</b><br>� ��. �����������: +25%<br/><b>� ���������: +2</b><font size=1px>������� � Capital city<b>������� �� �������� �������</b><b>������� �� ����������</b></font> ����� ����� � ������� ������� �����, �� ������ <b>��.</b> '
		},
mater333:{ name: '������� ������ (��)',city: 1, src: imP3 + 'ring66.gif',recipes:null,
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/> <br /><b>����: 1 ��. </b><br />�������������: 0/20 <br /><b>��������� �����������: </b><br>� ����: 15<br>� ������������: 10<br />� �������: 4 <br />�������� ��������: <b>������</b><br><b>��������� ��:</b><br>� ��. �����������: +25%<br/><b>� ������� �����: +10</b><font size=1px>������� � Capital city<b>������� �� �������� �������</b><b>������� �� ����������</b></font> ����� ����� � ������� ������� �����, �� ������ <b>��.</b> '
		}, 
mater334:{ name: '������� ������ (��)',city: 1, src: imP3 + 'ring66.gif',recipes:null,
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/> <br /><b>����: 1 ��. </b><br />�������������: 0/20 <br /><b>��������� �����������: </b><br>� ����: 15<br>� ������������: 10<br />� �������: 4 <br />�������� ��������: <b>������</b><br><b>��������� ��:</b><br>� ��. �����������: +25%<br/><b>� ���������: +1</b><font size=1px>������� � Capital city<b>������� �� �������� �������</b><b>������� �� ����������</b></font> ����� ����� � ������� ������� �����, �� ������ <b>��.</b> '
		},
mater335:{ name: '������� ������ (��)',city: 1, src: imP3 + 'ring66.gif',recipes:null,
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/> <br /><b>����: 1 ��. </b><br />�������������: 0/20 <br /><b>��������� �����������: </b><br>� ����: 15<br>� ������������: 10<br />� �������: 4 <br />�������� ��������: <b>������</b><br><b>��������� ��:</b><br>� ��. �����������: +25%<br/><b>� ���������: +2</b><font size=1px>������� � Capital city<b>������� �� �������� �������</b><b>������� �� ����������</b></font> ����� ����� � ������� ������� �����, �� ������ <b>��.</b> '
		}, 
mater337:{ name: '������� ������ �������� (��)',city: 1, src: imP3 + 'ring71.gif',recipes:null,
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/> <br /><b>����: 1 ��. </b><br />�������������: 0/50 <br /><b>��������� �����������: </b><br>� ����: 20<br>� ������������: 20<br />� �������: 6 <br /><b>��������� ��:</b><br>� ����: +2</b><br>�������� ��������:<br/>� ������ �� �����: +2<br><font size=1px>������� � Capital city<b>������� �� �������� �������</b><b>������� �� ����������</b></font> ����� ������� �� <b>������� ����</b> ����� �� ������..</b> '
		},
p1k_gritscroll_1:{name: '������ �������� ����� (��)',src: imP3 + 'ring80.gif',
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/> <br /><b>����: 1 ��. </b><br />�������������: 0/60 <br /><b>��������� �����������: </b><br>� ����: 40<br>� ������������: 40<br />� �������: 8 <br /><b>��������� ��:</b><br>� <b>����: +5</b><br/>� ����� �������: 1-12 (d12)</b><br>� ����� ������: 1-12 (d12)<br>� ����� �����: 1-12 (d12)<br>� ����� ���: 1-12 (d12)<br>� ��. ������ �����������: +10 %<br>� ��. ������ ������������ �����: +20 %<br>� ������� ����� (HP): +33<br>�������� ��������:<br/>� ������ �� �����: +15<br><font size=1px>������� � Capital city<b>������� �� �������� �������</b><b>������� �� ����������</b></font>����� ������� �� <b>�������� ��������� ������</b> ����� ��� ������.</b> '
		},
p1k_gritscroll_2:{name: '������ �������� ����� (��)',src: imP3 + 'ring80.gif',
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/> <br /><b>����: 1 ��. </b><br />�������������: 0/60 <br /><b>��������� �����������: </b><br>� ����: 30<br>� ������������: 30<br />� �������: 8 <br /><b>��������� ��:</b><br/>� ����� �������: 1-12 (d12)</b><br>� ����� ������: 1-12 (d12)<br>� ����� �����: 1-12 (d12)<br>� ����� ���: 1-12 (d12)<br>� ��. ������ �����������: +10 %<br>� ��. ������ ������������ �����: +20 %<br><b>� ������� ����� (HP): +66</b><br>�������� ��������:<br/>� ������ �� �����: +15<br><font size=1px>������� � Capital city<b>������� �� �������� �������</b><b>������� �� ����������</b></font>����� ������� �� <b>������� ����</b> ����� �� ������..</b> '
		},
p1k_gritscroll_3:{name: '������ ������ (��)',src: imP3 + 'ring93.gif',
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/> <br /><b>����: 1 ��. </b><br />�������������: 0/50 <br /><b>��������� �����������: </b><br>� ��������: 25<br>� ��������: 15<br />� �������: 8 <br /><b>��������� ��:</b><br/>� ��������: +2<br>� ������� ����� (��): +6 <br>� ��. ������ ������������ �����: +20 %<br>� ��. �����������: +45 %<br>� ��. ����������: +5 %<br>� ��. �����������: +2 %<br>� ����� ���������: �������� ������ [0/6]<br/><br><font size=1px>������� � Capital city<b>������� �� �������� �������</b><b>������� �� ����������</b></font>����� ������� �� <b>������ ��������</b> ����� ��� ������.</b> '
/*mater336:{ name: '������ ���� ������ EF',city: 7, src: imP3 + 'mater336.gif',recipes:null,
				descr: '�����: 0.1<br />�������������: 0/1<br /><strong>��������:</strong><br />���������� ������� � ������� ������ � ������� ���������� ����.<br />'
		},
mater500:{ name: '������� ��������� ����� VF',city: 1, src: imP3 + 'mater500.gif',recipes:null,
				descr: '�����: 1<br />�������������: 0/1<br /><strong>��������:</strong><br />�������� ��� ����-�� ��� ������������ ��������� ��������.<br /> ����� �������� �� ����� � ������� � ���� �������.'
		},
	clanexp_500:{ name: '����� �� ������ [500] F',src: imP3 + 'clanexp_500.gif',
				descr: '�����: 1<br />�������������: 0/1<br />���� ��������: 30 ��.<br /><strong>��������� �����������:</strong><br />� ����: �������� � ����� ������ 0-5<br /><strong>��������:</strong><br />�������� ��� �� �������� ���� ����� �� 500.<br />���������� ����� ����� ��������� �� �����, � ������ �������� �����.<br />��������! ����� ���� ����������� ������ ��� ���������� ����� ����� �� 6 ������.<br /> ����� ������ � �����.'
		}, 
	clanexp_1000:{ name: '����� �� ������ [1000] F',src: imP3 + 'clanexp_1000.gif',
				descr: '�����: 1<br />�������������: 0/1<br />���� ��������: 60 ��.<br /><strong>��������� �����������:</strong><br />� ����: �������� � ����� ������ 0-5<br /><strong>��������:</strong><br />�������� ��� �� �������� ���� ����� �� 1000.<br />���������� ����� ����� ��������� �� �����, � ������ �������� �����.<br />��������! ����� ���� ����������� ������ ��� ���������� ����� ����� �� 6 ������.<br /> ����� ������ � �����.'
		},
	sword0831:{ name: '������ ����� VF', src: imP3 + '3/2/sword0831.gif',
	  descr: '�����: 10 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 195 ��.<br />�������������: 0/34<br />������� ��� �����<br /><strong>��������� �����������:</strong><br />� ��������: 48<br />� �������: 8<br />� ���������� �������� ������: 5<br />� ������������: 20<br /><strong>��������� ��:</strong><br />� ��. ������ ����������� (%): +55<br />� ��. ����������� (%): +55<br />� ��. ���������� (%): +5<br />� ��. �������� �������� �����: +5<br /><strong>�������� ��������:</strong><br /> ����: 10 - 30<br /> ���� ������������: +<br /><strong>�����������:</strong> <br /> ������� �����: ���������<br /> ������� �����: ����<br /><strong>��������:</strong><br />������� ����������� � ������� �������, �� ���� �������������, ���������� �������, ��� ���� ������ ��������� ��� �����.<br />����� ������ � ����� � ���.'
		 },
	belt0831:{ name: '���� ������������� ������� VF',src: imP3 + '5/belt0831.gif',
   descr: '�����: 5 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 135 ��. <br />�������������: 0/34<br />������� ��� �����<br /><strong>��������� �����������:</strong><br />� �������: 8<br />� ������������: 48<br />� ����: 24<br /><strong>��������� ��:</strong><br />� ��. ������ ����������� (%): +50<br />� ��. �������� ��������� �����: +5<br />� ������ �� �����: +10<br />� ������� ����� (HP): +65<br />� ����: +2<br />� ����� �����: 8-29 (7+d22)'
   },
	belt0832:{ name: '���� ������� ������� VF',src: imP3 + '5/belt0832.gif',
		 descr: '�����: 3 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 135 ��.<br />�������������: 0/34<br /><strong>��������� �����������:</strong><br />� ��������: 48<br />� �������: 8<br />� ������������: 24<br /><strong>��������� ��:</strong><br />� ��. ������ ����������� (%): +50<br />� ��. ����������� (%): +50<br />� ��. �������� �������� �����: +5<br />� ������ �� �����: +20<br />� ������� ����� (HP): +37<br />� ����� �����: 5-15 (4+d11)<br />����� ������ � ����� � ���.'
   },
	belt0833:{ name: '���� ��������� ������� VF', src: imP3 + '5/belt0833.gif',
   descr: '�����: 3 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 135 ��.<br />�������������: 0/34<br /><strong>��������� �����������:</strong><br />� �������: 8<br />� ������������: 25<br />� ����: 25<br /><strong>��������� ��:</strong><br />� ��. �������� ����. ����� (%): +5<br />� ��. ������ ����������� (%): +50<br />� ��. ������������ ����� (%): +50<br />� ������ �� �����: +10<br />� ������� ����� (HP): +45<br />� ����� �����: 7-22 (6+d16)<br />����� ������ � ����� � ���.'
		 },
 belt0834:{ name: '���� ������� ������� VF', src: imP3 + '5/belt0834.gif',
   descr: '�����: 5 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 135 ��.<br />�������������: 0/34<br />������� ��� �����<br /><strong>��������� �����������:</strong><br />� �������: 8<br />� ������������: 24<br />� ����: 48<br /><strong>��������� ��:</strong><br />� ��. ������ ������������ ����� (%): +25<br />� ��. ������ ����������� (%): +50<br />� ��. �������� �������� �����: +5<br />� ������ �� �����: +15<br />� ������� ����� (HP): +50<br />� ����� �����: 8-29 (7+d22)<br />����� ������ � ����� � ���.'
		 },
 belt0835:{ name: '���� ������� ������� VF',src: imP3 + '5/belt0835.gif',
		 descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 135 ��.<br />�������������: 0/34<br />������� ��� ����<br /><strong>��������� �����������:</strong><br />� ���������: 24<br />� �������: 8<br />� ��������: 56<br /><strong>��������� ��:</strong><br />� ��. ������ ������������ ����� (%): +25<br />� ��. �������� ����� ������: +5<br />� ������ �� �����: +10<br />� ������� ����� (HP): +36<br />� ������� ����: +70<br />� ����� �����: 4-11 (3+d8)<br />����� ������ � ����� � ���.'
   },
	boots0931:{ name: '������� �������� ������ VF',src: imP3 + '12/boots0931.gif',
		 descr: '�����: 10 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 185 ��.<br />�������������: 0/55<br />������� ��� �����<br /><strong>��������� �����������:</strong><br />� �������: 9<br />� ������������: 27<br />� ����: 54<br /><strong>��������� ��:</strong><br />� ��. ������ ������������ ����� (%): +25<br />� ��. ������ ����������� (%): +70<br />� ��. �������� �������� �����: +7<br />� ������ �� �����: +20<br />� ������� ����� (HP): +75<br />� ����: +1<br />� ����� ���: 8-28 (7+d21)<br />����� ������ � ����� � ���.'
   }, 
 boots0933:{name: '������� ������ ������ VF',src: imP3 + '12/boots0933.gif',
	  descr: '�����: 5 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 185 ��. <br />�������������: 0/55<br /><strong>��������� �����������:</strong><br />� �������: 9<br />� ������������: 30<br />� ����: 25<br /><strong>��������� ��:</strong><br />� ��. �������� ����. ����� (: +7<br />� ��. ������ ����������� (: +70<br />� ��. ������������ ����� (: +70<br />� ������ �� �����: +20<br />� ������� ����� (HP): +50<br />� ����� ���: 7-22 (6+D16)<br />����� ������ � ����� � ���.'
	 	}, 
 boots0934:{ name: '������ �������� ����� VF',src: imP3 + '12/boots0934.gif',
		 descr: '�����: 10 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 185 ��.<br />�������������: 0/55<br />������� ��� �����<br /><strong>��������� �����������:</strong><br />� �������: 9<br />� ������������: 54<br />� ����: 27<br /><strong>��������� ��:</strong><br />� ��. ������ �������� ����. ����� (: +5<br />� ��. ������ ����������� (%): +50<br />� ��. �������� ��������� �����: +7<br />� ������ �� �����: +20<br />� ������� ����� (HP): +85<br />� ����: +1<br />� ����� ���: 12-43 (11+d32)<br />����� ������ � ����� � ���.'
	 	}, 
	boots0935:{ name: '������� ������ ������ VF',src: imP3 + '12/boots0935.gif',
	  descr: '�����: 2 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 185 ��.<br />�������������: 0/55<br />������� ��� ����<br /><strong>��������� �����������:</strong><br />� ���������: 27<br />� �������: 9<br />� ��������: 63<br /><strong>��������� ��:</strong><br />� ��. ������ ������������ ����� (%): +50<br />� ��. �������� ����� ������: +8<br />� ������ �� �����: +15<br />� ������� ����� (HP): +40<br />� ������� ����: +80<br />� ����� ���: 3-9 (2+d7)<br />����� ������ � ����� � ���.'*/
  	} 

};

var pm ={
 cure3_7:{ name: '����� ���������', src: imP3 + 'dispell1.gif',
				descr: '�����: 1<br />����: 10 ��.<br />�������������: 0/1<br /> ����������� ������������: 99% <br />��������:<br>������� ���������� ���������<br /><font size=1px>������� � Capital city<br><b>������� �� �������� �������</b><br><b>������� �� ����������</b></font><br><br>����� ����� � ������� �� ������ �����, ������ <b>K3.</b><br/>'
		},  
pot_cureHP150_0:{ name: '�������������',city: 7, src: imP3 + 'd_blat24.gif',
				descr: '�����: 1<br />����: 1 ��.<br />�������������: 0/1<br /> ����������� ������������: 99% <br />��������:<br>����������� ����� ������ �� ���������� �� 24 ����.<br /><font size=1px>������� � Capital city<br><b>������� �� �������� �������</b><br><b>������� �� ����������</b></font><br><br>����� ������� �� <b>���������� ����</b> ����� ��� ������.</b><br/>'
		}, 
pot_cureHP300_0:{ name: '������� �������',city: 7, src: imP3 + 'd_blat-6.gif',
				descr: '�����: 1<br />����: 1 ��.<br />�������������: 0/1<br /> ����������� ������������: 99% <br />�������� ������������� 5 ���.<br>��������:<br>��������� �������� ���������� �� 6 ����� ������.<br /><font size=1px>������� � Capital city<br><b>������� �� �������� �������</b><br><b>������� �� ����������</b></font><br><br>����� ������� �� <b>����� ������������</b> ����� ��� ������.</b><br/>'
		},
pot_curemana250_0:{name:'��������� ����������� ����',src: imP3 + 'spell_ug_undam2c.gif',
				descr: '�����: 1<br />����: 10 ��.<br />�������������: 0/1<br /> ����������������� �������� �����: 6 �. 0 ���.<br /><b>�������� ��������:</b> ���������<br><b>��������� ��:</b><br>� ��. �������� ����� ����: -20<br/><font size=1px>������� � Capital city<br><b>������� �� �������� �������</b><br><b>������� �� ����������</b></font><br><br>����� ������� �� �������� ������������ � <b>���������� ������� ��������</b> �� ������� ����� ����������.</b><br/>'
		}, 
pot_curemana500_0:{name:'��������� ������� ��������',src: imP3 + 'spell_ug_unexprc.gif',
				descr: '�����: 1<br />����: 10 ��.<br />�������������: 0/1<br /> ����������������� �������� �����: 6 �. 0 ���.<br /><b>�������� ��������:</b> ���������<br><b>��������� ��:</b><br>� ���������� ������� ���� (%): -10<br/><font size=1px>������� � Capital city<br><b>������� �� �������� �������</b><br><b>������� �� ����������</b></font><br><br>����� ������� �� �������� ������������ � <b>���������� ������� ��������</b> �� ������� ����� ����������.</b><br/>'
		}, 
	clanexp_500:{ name: '��������� ���������� �����',src: imP3 + 'spell_ug_undam3c.gif',
				descr: '�����: 1<br />����: 10 ��.<br />�������������: 0/1<br /> ����������������� �������� �����: 6 �. 0 ���.<br /><b>�������� ��������:</b> ���������<br><b>��������� ��:</b><br>� ��. �������� ����� �������: -20<br/><font size=1px>������� � Capital city<br><b>������� �� �������� �������</b><br><b>������� �� ����������</b></font><br><br>����� ������� �� �������� ������������ � <b>���������� ������� ��������</b> �� ������� ����� ����������.</b><br/>'
		}, 
	clanexp_1000:{ name: '��������� ���������� ����',src: imP3 + 'spell_ug_undam1c.gif',
				descr: '�����: 1<br />����: 10 ��.<br />�������������: 0/1<br /> ����������������� �������� �����: 6 �. 0 ���.<br /><b>�������� ��������:</b> ���������<br><b>��������� ��:</b><br>� ��. �������� ����� ����: -20<br/><font size=1px>������� � Capital city<br><b>������� �� �������� �������</b><br><b>������� �� ����������</b></font><br><br>����� ������� �� �������� ������������ � <b>���������� ������� ��������</b> �� ������� ����� ����������.</b><br/>'
		},
	pm_bones:{ name: '��������� ��������� �����',city: 3, src: imP3 + 'spell_ug_undam4c.gif',
				descr: '�����: 1<br />����: 10 ��.<br />�������������: 0/1<br /> ����������������� �������� �����: 6 �. 0 ���.<br /><b>�������� ��������:</b> ���������<br><b>��������� ��:</b><br>� ��. �������� ����� �����: -20<br/><font size=1px>������� � Capital city<br><b>������� �� �������� �������</b><br><b>������� �� ����������</b></font><br><br>����� ������� �� �������� ������������ � <b>���������� ������� ��������</b> �� ������� ����� ����������.</b><br/>'
		}, 
	pm_skin:{ name: '��������� ����������',city: 3, src: imP3 + 'spell_ug_unp10c.gif',
				descr: '�����: 1<br />����: 10 ��.<br />�������������: 0/1<br /> ����������������� �������� �����: 6 �. 0 ���.<br /><b>�������� ��������:</b> ���������<br><b>��������� ��:</b><br>� ��. �������� �����: -100<br/><font size=1px>������� � Capital city<br><b>������� �� �������� �������</b><br><b>������� �� ����������</b></font><br><br>����� ������� �� �������� ������������ � <b>���������� ������� ��������</b> �� ������� ����� ����������.</b><br/>'
		}, 
	pm_coal:{ name: '������� �����',city: 3, src: imP3 + 'spell_curseb.gif',
				descr: '�����: 1<br />����: 1 ��.<br />�������������: 0/1<br />����������� ������������: 70%<br />����������������� �������� �����: 1440 ���.<br><b>��������� �����������:</b><br/>� ���������: 10<br>� �������: 8<br/><b>�������� ��������:</b> ���������<br><font size=1px>������� � Capital city<br><b>������� �� �������� �������</b><br><b>������� �� ����������</b></font><br><br>����� ������� �� �������� ������������ � <b>���������� ������� ��������</b> �� ������� ����� ����������.</b><br/>'
		},  
	pm_gold1:{ name: '������ �����',city: 3, src: imP3 + 'spell_curse.gif',
				descr: '�����: 1<br />����: 1 ��.<br />�������������: 0/1<br />����������� ������������: 70%<br />����������������� �������� �����: 1440 ���.<br><b>��������� �����������:</b><br/>� ���������: 10<br>� �������: 8<br/><b>�������� ��������:</b> ���������<br><font size=1px>������� � Capital city<br><b>������� �� �������� �������</b><br><b>������� �� ����������</b></font><br><br>����� ������� �� �������� ������������ � <b>���������� ������� ��������</b> �� ������� ����� ����������.</b>'
		/*}, 
	pm_gold2:{ name: '��������� ������ ������ P',city: 3, src: imP3 + 'pm_gold2.gif',
				descr: '�����: 2 <br />�������������: 0/1<br /><strong>��������:</strong><br />����� �������� ������ ������. �� ����� ����������, �� ���������.'
		},  
	pm_lead1:{ name: '������� ������ VP',city: 3, src: imP3 + 'pm_lead1.gif',
				descr: '�����: 0.1 <br />�������������: 0/1<br /><strong>��������:</strong><br />������ �������� ������ ������������ � �����, ������, ������-�� �������� � �������. ����� � ���� ����� �����������.'
		},  
	pm_lead2:{ name: '��������� ������ ������ P',city: 3, src: imP3 + 'pm_lead2.gif',
				descr: '�����: 2 <br />�������������: 0/1<br /><strong>��������:</strong><br />����� �������� ������ ������. �� ����� ����������, �� ���������.'
		}, 
	pm_silver1:{ name: '������� ������� VP',city: 3, src: imP3 + 'pm_silver1.gif',
				descr: '�����: 0.1<br />�������������: 0/1<br /><strong>��������:</strong><br />������ �������� ������� ������������ � �����, ������, ������-�� �������� � �������. ����� � ���� ����� �����������.'
		},   
	pm_silver2:{ name: '��������� ������ ������� P',city: 3, src: imP3 + 'pm_silver2.gif',
				descr: '�����: 2<br />�������������: 0/1<br /><strong>��������:</strong><br />����� �������� ������ �������. �� ����� ����������, �� ���������.'
		},  
	pm_cooper1:{ name: '������� ���� VP',city: 3, src: imP3 + 'pm_cooper1.gif',
				descr: '�����: 0.1<br />�������������: 0/1<br /><strong>��������:</strong><br />������ �������� ���� ������������ � �����, ������, ������-�� �������� � �������. ����� � ���� ����� �����������.'
		},
	pm_cooper2:{ name: '��������� ������ ���� P',city: 3, src: imP3 + 'pm_cooper2.gif',
				descr: '�����: 2<br />�������������: 0/1<br /><strong>��������:</strong><br />����� �������� ������ ����. �� ����� ����������, �� ���������.'
		},   
	pm_metal3:{ name: '������ ������� F',city: 3, src: imP3 + 'pm_metal3.gif',
				descr: '�����: 4<br />�������������: 0/1<br /><strong>��������:</strong><br />������� ������ �������, ����� � ������������ � ��������� �������������� � ������������ �����.<br /> �� �� ������ ���������� �������.'
		}, 
	pm_metal4:{ name: '��������� VF',city: 3, src: imP3 + 'pm_metal4.gif',
				descr: '�����: 8<br />�������������: 0/1<br /><strong>��������:</strong><br />����� �������, ������� � ����� ������� ������ �������. ����������� � ������� ������������� � ��������� ��������������. ������ ����. '
		},
inc_hpm5	:{ name: '����-���� F',city: 3, src: imP3 + 'inc_hpm5.gif',
				descr: '�����: 4 <br />�������������: 0/1<br /><strong>��������:</strong><br />����-���� - �������� ��������� ������������� �������� ���������� �� 5.<br />����� �������� � ������� ������ ���������� + 5 ������� ������'
		}, 
pm_token:{ name: '���� ��������������� ������ VF',city: 3, src: imP3 + 'pm_token.gif',
				descr: '�����: 1<br />�������������: 0/1<br /><strong>��������:</strong><br />��������� ��� ���������, �����������, �� ��� �������� - ������ �� ���������������.<br /> ������� ������ ������ ���������� �������, �� ���� ��� 10 ������ ���������������.'
		},
	head06310:{ name: '���� �������� ������� VF',city: 3, src: imP3 + '9/head06310.gif',
				descr: '�����: 1 <br />����: 10 ��.<br />�������������: 0/40<br /><strong>��������:</strong><br />����������� ������ �������� ����� �������. ��� ����������� ������ ���������� ������ �������� ����� �������.<br />���� �������� � ����� �������, �� ���� ���������� ����������� �� 1 ���.'
		},
	pm_rank1_reward:{ name: '������� ����� VF',city: 3, src: imP3 + 'pm_rank1_reward.gif',
				descr: '�����: 0.1 <br />����: 1 ��.<br />�������������: 0/1<br /><strong>��������:</strong><br />������� ������-�� ����� �������� �����. ����� ���� ���-������ �� ��� ������ ������� ���-�� ��������?'
		},
hood07410:{ name: '������� �������� ��������� EF',city: 3, src: imP3 + '18/hood07410.gif',
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 10 ��.<br />�������������: 0/50<br /><strong>��������� �����������:</strong><br />� �������: 7<br />��������������: ������<br />��������: 1 ��.<br />�������� �������� 1 ��. � ����� (������������: 0)<br /><strong>��������:</strong><br />����������������� ������ ��������, ��������� ��������. ��� ����������� ������ ��������� �����.'
  },
	invoke_pm_food_3:{ name: '��������� ������� VP',city: 3, src: imP3 + 'invoke_pm_food_3.gif',
				descr: '�����: 0.1 <br />�������������: 0/1<br />��������� �����������:<br />� ��������������: ������<br />�������� ��������: ������ �� ��������<br /><strong>��������:</strong><br />���������� � ��, ��� �����-�� ���� ������������ ������, ��� ����� �������� ���������� ���������� �����������. ���� ���� ���������� � ����� ���-������ �����. �� ������������� ������ ��� ������?<br />'
		},
	invoke_pm_food_2:{ name: '��������� ������� P',city: 3, src: imP3 + 'invoke_pm_food_2.gif',
				descr: '�����: 0.1 <br />�������������: 0/1<br />��������� �����������:<br />� ��������������: ������<br />�������� ��������: ������ �� ��������<br /><strong>��������:</strong><br />���������� � ������������ �����, ��� ��������� ���������� ���������� ������������� �����������. ���� �� ������ ������, ����������� �� ��� ��������� �������. ������ � �� ������������� ��������� �������?<br />'
		},
	invoke_pm_food_1:{ name: '����������� ������� F',city: 3, src: imP3 + 'invoke_pm_food_1.gif',
				descr: '�����: 0.1 <br />�������������: 0/1<br />�������� ��������: ������ �� ��������<br /><strong>��������:</strong><br />���������� � ������ ������� � �������� ����, ��� ���� ��������� �������. � ������� �������� �������� ������ ����� �������� � ���������. ��� ��� � ������ �� �� ������ � ��� �����.<br />'
		},
	invoke_pm_food_0:{ name: '����������� ������� VF',city: 3, src: imP3 + 'invoke_pm_food_0.gif',
				descr: '�����: 0.1 <br />�������������: 0/1<br />�������� ��������: ������ �� ��������<br /><strong>��������:</strong><br />������� �� ������� ��������� ������������ ����� ���� ������� ����� ������ ��� �� ������ �� ���������� ������, �� � ������� ��� ��� ����� ����, �������� ���� ������� � ������ ������� �����.<br />���� ���������� �����������, ����� �� ���������, ������� ���������� �������, ��������� ��������� ������.'
		}, 
mater500:{ name: '������� ��������� ����� VF',city: 1, src: imP3 + 'mater500.gif',recipes:null,
				descr: '�����: 1<br />�������������: 0/1<br /><strong>��������:</strong><br />�������� ��� ����-�� ��� ������������ ��������� ��������.<br /> ����� �������� �� ����� � ������� � ���� �������.'
		},
 pm_bonePG:{ name: '��������� �� F',city: 3, src: imP3 + 'pm_bonePG.gif',
				descr: '�����: 1 <br />�������������: 0/1<br />��������: 1 ��.<br /><strong>��������:</strong><br />���������� � ��������� �� ����������� ����� �� ��� ��������� �������� �������������� �������.'
		},  
 invoke_pm_digger_candle:{ name: '������� �� �������� F',city: 3, src: imP3 + 'invoke_pm_digger_candle.gif',
				descr: '�����: 0.1 <br />�������������: 0/10<br />�������� ��������: ���������<br /><strong>��������:</strong><br />����� ��� ������������� � ����� �������. �� ������, �� ������������ ������ ��������� ����, �� ������ �����, �� ���������.<br />'*/
		} 



};

 var kanaliz ={ 
 cure3_7:{
				name: '�������� �������',
				src: imP3 + 'pot_base_150_waterproof.gif',
				descr: '�����: 5<br />����: 1 ��.<br />�������������: 0/1<br /> ���� ��������: 20 ��.<br />����������������� �������� �����: 3 �. 0 ���. <br><b>��������� �����������:</b><br />� �������: 4 <br><b>��������� ��:</b><br>� ������ �� ����� ����: +75<br><font size=1px>������� � Capital city<br><b>������� �� �������� �������</b><br><b>������� �� ����������</b></font><br><br>����� �������� � <b>������� �������</b> �� ������ �����, ������ <b>B7.</b><br/>'
		},  
		cureHP45:{
				name: '�������� ��������',
				src: imP3 + 'pot_base_200_bot3.gif',
				descr: '�����: 1 <br />����: 1 ��. <br />�������������: 0/1 <br />���� ��������: 30 ��. <br />���������e������� �������� �����: 3 �. 0 ���. <br /><b>�������e� ��:</b><br>� ����: +15 <br /><font size=1px>������� � Capital city<br><b>������� �� �������� �������</b><br><b>������� �� ����������</b></font><br><br>����� �������� � <b>������� ������������ ���</b> �� ������� �����, ������ <b>H6.</b></br>',
				recipes: null
		},
 invoke_maxhp:{
				name: '�������� ���� ',
				src: imP3 + 'pot_base_200_bot2.gif',
				descr: '�����: 1 <br />����: 1 ��. <br />�������������: 0/1 <br />���� ��������: 30 ��. <br />���������e������� �������� �����: 3 �. 0 ���. <br /><b>�������e� ��:</b><br>� ��������: +15 <br /><font size=1px>������� � Capital city<br><b>������� �� �������� �������</b><br><b>������� �� ����������</b></font><br><br>����� �������� � <b>������� ������������ ���</b> �� ������� �����, ������ <b>H6.</b></br>',
		}, 
 amulet0431:{
				name: '�������� ������������',
				src: imP3 + 'pot_base_200_bot1.gif',
				descr: '�����: 1 <br />����: 1 ��. <br />�������������: 0/1 <br />���� ��������: 30 ��. <br />���������e������� �������� �����: 3 �. 0 ���. <br /><b>�������e� ��:</b><br>� ��������: +15 <br /><font size=1px>������� � Capital city<br><b>������� �� �������� �������</b><br><b>������� �� ����������</b></font><br><br>����� �������� � <b>������� ������������ ���</b> �� ������� �����, ������ <b>H6.</b></br>',
				recipes: null
		},
 amulet0432:{
				name: '�������� ������ ',
				src: imP3 + 'pot_base_200_bot4.gif',
				descr: '�����: 1 <br />����: 1 ��. <br />�������������: 0/1 <br />���� ��������: 30 ��. <br />���������e������� �������� �����: 3 �. 0 ���. <br /><b>�������e� ��:</b><br>� ���������: +15 <br /><font size=1px>������� � Capital city<br><b>������� �� �������� �������</b><br><b>������� �� ����������</b></font><br><br>����� �������� � <b>������� ������������ ���</b> �� ������� �����, ������ <b>H6.</b></br>',
				recipes: null
		},

	sword0531:{
				name: '�������� ���������',city: 6,
				src: imP3 + 'pot_base_200_alldmg2.gif',
				descr: '�����: 5<br />����: 1 ��.<br />�������������: 0/1<br /> ���� ��������: 20 ��.<br />����������������� �������� �����: 3 �. 0 ���. <br><b>��������� �����������:</b><br />� �������: 7 <br><b>��������� ��:</b><br>� ������ �� �����: +75<br><font size=1px>������� � Capital city<br><b>������� �� �������� �������</b><br><b>������� �� ����������</b></font><br><br>����� �������� � <b>������� ���������</b> �� ������ �����, ������ <b>F9.</b><br/>'
		},
 bow0531:{
				name: '����� �������� ���������',city: 6,
				src: imP3 + 'pot_base_200_allmag2.gif',
				descr: '�����: 5<br />����: 1 ��.<br />�������������: 0/1<br /> ���� ��������: 20 ��.<br />����������������� �������� �����: 3 �. 0 ���. <br><b>��������� �����������:</b><br />� �������: 7 <br><b>��������� ��:</b><br>� ������ �� �����: +75<br><font size=1px>������� � Capital city<br><b>������� �� �������� �������</b><br><b>������� �� ����������</b></font><br><br>����� �������� � <b>������� ���������</b> �� ������� �����, ������ <b>G2.</b><br/>'
		},
 /*staff0531:{    /////////////////////////////����� �������� ��� ��� 5 �����///////////////////////////////
				name: '������� ��� �������',city: 6,
				src: imP3 + 'pot_base_1000_str.gif',
				descr: '�����: 10 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 130 ��. <br />�������������: 0/20<br />������� ��� ����<br /><strong>��������� �����������:</strong><br />� ���������: 15<br />� �������: 5<br />� ���������� �������� ����������� ��������: 1<br /><strong>��������� ��:</strong><br />� ��. ������ ������������ ����� (%): +20<br />� ��. �������� ����� ������: +5<br />� ���������: +3<br />� ������� ����� (HP): +20<br />� ������� ����: +45<br /><strong>�������� ��������:</strong><br />� ����: 1 - 16<br />� ��������� ������<br />� ���� ������������: +<br /><strong>�����������:</strong><br />� �������� �����: ����<br />� �������� �����: ����<br />� ������� �����: ����<br />� ������������� �����: ����<br />� �������� �����: ����<br />����� ������ � ����� � �����������'
		},
	head0631:{
				name: '������ ��� �������',city: 6,
				src: imP3 + 'pot_base_1000_dex.gif',
				descr: '�����: 10 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 103 ��.  <br />�������������: 0/35<br /><strong>��������� �����������:</strong><br />� �������: 6<br />� ������������: 20<br /><strong>��������� ��:</strong><br />� ���������� ����������: +2<br />� �������� �������: +1<br />� ������� ����� (HP): +34<br />� ��. ������ ������������ ����� (%): +30<br />� ��. ������ ����������� (%): +30<br />� ����� ������: 7-25 <br />����� ������ � ����� � �����������'
		},
	head0632:{
				name: '���������� ��� ������',city: 6,
				src: imP3 + 'pot_base_1000_inst.gif',
				descr: '�����: 5 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 103 ��. <br />�������������: 0/35<br />������� ��� �������<br /><strong>��������� �����������:</strong><br />� ��������: 36<br />� �������: 6<br />� ������������: 18<br /><strong>��������� ��:</strong><br />� ��. ������ ����������� (%): +20<br />� ��. ����������� (%): +30<br />� ��. �������� �������� �����: +5<br />� ��������: +2<br />� ���������� �������� �����: +1<br />� ������� ����� (HP): +35<br />� ������� ����: +20<br />� ����� ������: 4-12 (3+d9)<br />����� ������ � ����� � �����������'
		},  
 head0633:{
				name: '����� �������� ���������',city: 6,
				src: imP3 + 'pot_base_200_alldmg2_p1k.gif',
				descr: '�����: 2 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 106 ��.  <br />�������������: 0/35<br /><strong>��������� �����������:</strong><br />� �������: 6<br />� ���������: 18<br /><strong>��������� ��:</strong><br />� ���������: +2<br />� ������� ����: +50<br />� ������� ����� (HP): +30<br />� ��. ������ ������������ ����� (%): +10<br />� ��. �������� ����� ������: +5<br />� ����� ������: 3-9<br />����� ������ � ����� � �����������'
		}, 
	body0431:{
				name: '����� ������ �����',city: 6,
				src: imP3 + 'pot_base_200_allmag2_p1k.gif',
				descr: '�����: 12 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 99 ��. <br />�������������: 0/25<br />������� ��� ����<br /><strong>��������� �����������:</strong><br />� ���������: 12<br />� �������: 4<br /><strong>��������� ��:</strong><br />� ��. ������ ������������ ����� (%): +30<br />� ��. �������� ����� ������: +5<br />� ���������: +2<br />� ������� ����� (HP): +20<br />� ������� ����: +35<br />� ����� �������: 2-4 (1+d3)<br />����� ������ � ����� � �����������'
		},
	/*body0432:{ name: '������ ������� ������� VF',city: 6, src: imP3 + '4/body0432.gif',
				descr: '�����: 25<img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 99 ��. <br />�������������: 0/25<br />������� ��� �������<br /><strong>��������� �����������:</strong><br />&bull; ��������: 24<br />&bull; �������: 4<br />&bull; ������������: 12<br /><strong>��������� ��:</strong><br />&bull; ��. ������ ����������� (%): +35<br />&bull; ��. ����������� (%): +50<br />&bull; ��. �������� �������� �����: +5<br />&bull; ��������: +2<br />&bull; ������� ����� (HP): +40<br />&bull; ����� �������: 2-4 (1+d3)<br />����� ������ � ����� � �����������'
		},   
 body0433:{
				name: '������� ��������� VF',city: 6,
				src: imP3 + '4/body0433.gif',
				descr: '�����: 50 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 99 ��.  <br />�������������: 0/25<br /><strong>��������� �����������:</strong><br />� �������: 4<br />� ������������: 15<br /><strong>��������� ��:</strong><br />� ���������� ����������: +2<br />� ������� ����� (HP): +51<br />� ��. ������ ������������ ����� (%): +30<br />� ��. ������ ����������� (%): +50<br />� ����� �������: 3-8<br />����� ������ � ����� � �����������'
		},

	 zk_vantuz_1:{
				name: '������ P',
				src: imP3 + 'zk_vantuz_1.gif',
				recipes: null,
				descr: '�����: 1 <Br />�������������: 0/1<Br />��������: 1 ��.<Br /><strong>��������:</strong><Br />������������� �������.<Br />���� ��� � ����, � ��� ����� ������� � "���������" � �������� � ��� ������� "������". <Br />������� � "�������" �������� 3 ������� ������.'
		},
	 zk_zasor_1:{
				name: '����� VP',
				src: imP3 + 'zk_zasor_1.gif',
				recipes: null,
				descr: '�����: 1 <Br />�������������: 0/1<Br /><strong>��������:</strong><Br />��� ������� ���... ��� �����!<Br />���������� � "���������" � ������� "�������"<Br />������� � "�������" �������� 3 ������� ������ �� 33 "������".'
		},
	 mater_small_lvl4_reward:{
				name: '����� VP',
				src: imP3 + 'mater_small_lvl4_reward.gif',
				recipes: null,
				descr: '����� ������� ��: �����, �������� �����, ���������������� ����, ���������� �����, ��������� ��������; <Br />����� ����� �: ���������� �������, ��������� �� ������ <b>H13</b>, � ��������� �� ������ <b>K10</b> (� �������� �����). <Br />1�� ����� <strong>�����������</strong>.'
		},
	 mater_small_lvl5_reward:{
				name: '������ ����� VP',
				src: imP3 + 'mater_small_lvl5_reward.gif',
				recipes: null,
				descr: '����� ������� ��: ���������������� �����, �������� ����� <Br />����� ����� � ������������� ������.<Br />2�� ����� <strong>�����������</strong>.'
		},
	 mater_small_lvl6_reward:{
				name: '����� � ������� VP',
				src: imP3 + 'mater_small_lvl6_reward.gif',
				recipes: null,
				descr: '����� ������� �� ������� ������, �������� ���������; <Br />����� ����� � ��������� ��������.<Br />2�� ����� <strong>�����������</strong>.'
		},
	 mater_med_lvl4_reward:{
				name: '���� P',
				src: imP3 + 'mater_med_lvl4_reward.gif',
				recipes: null,
				descr: '����� ������� �� ��������� ��������; <Br />����� ����� � ����������� �������.<Br />1�� ����� <strong>�����������</strong>.'
		},
	 mater_med_lvl5_reward:{
				name: '������� ���� P',
				src: imP3 + 'mater_med_lvl5_reward.gif',
				recipes: null,
				descr: '����� ������� �� ����������� ����������; <Br />����� ����� � �������� ����������.<Br />2�� ����� <strong>�����������</strong>.'
		},
	 mater_med_lvl6_reward:{
				name: '������ ���� P',
				src: imP3 + 'mater_med_lvl6_reward.gif',
				recipes: null,
				descr: '����� ������� �� ������ �����������, ������� - �����, ������� �������; <Br />����� ����� � ���������� ��������.<Br />2�� ����� <strong>�����������</strong>'
		},
	 mater_big_lvl4_reward:{
				name: '������� F',
				src: imP3 + 'mater_big_lvl4_reward.gif',
				recipes: null,
				descr: '����� ������� �� ���������� ���� � ������ ��������; <Br />����� ����� � ������ �������.<Br />1�� ����� <strong>�����������</strong>.'
		},
	 mater_big_lvl5_reward:{
				name: '������ ������� F',
				src: imP3 + 'mater_big_lvl5_reward.gif',
				recipes: null,
				descr: '����� ������� �� ���������; <Br />����� ����� � ������� �������.<Br />2�� ����� <strong>�����������</strong>.'
		},
	 mater_big_lvl6_reward:{
				name: '������� ������� F',
				src: imP3 + 'mater_big_lvl6_reward.gif',
				recipes: null,
				descr: '����� ������� �� �������� �������; <Br />����� ����� � ������� ��������.<Br />2�� ����� <strong>�����������</strong>.'
		},
	 mater247:{
				name: '�������� F',
				src: imP3 + 'mater247.gif',
				recipes: null,
				descr: '�������� �� <strong>������� ��������������</strong> � <strong>�����������</strong>.<Br /> ����� ��� ���������� �������, ��� � ������� ���� ����� ��������� ������� �� ������������ �� �����.'
		},
	 mater_coin_lvl4_reward:{
				name: '����� VP',
				src: imP3 + 'mater_coin_lvl4_reward.gif',
				recipes: null,
				descr: '<strong>����� ������� ��� 5-6�� ������:</strong> <Br />1 ����� �� 3 ����� ��� 1 ����, ��� 3 ������ �� 1 �������<Br /><strong>��� 7 ������:</strong><Br />1 ����� ��  9 ���� ��� 3 �����, ��� �� 1 ������� <Br /><strong>��� 8�� � ������ ������:</strong><Br />1 ����� ��  15 ���� ��� 5 ������, ��� 3 ������ �� 5 �������� <Br />����� ��� ������� ����� � �������� <strong>�����������</strong>.'
		},
	 mater_coin_lvl5_reward:{
				name: '���������� ����� P',
				src: imP3 + 'mater_coin_lvl5_reward.gif',
				recipes: null,
				descr: '<strong>����� ������� ��� 5-6�� ������:</strong> <Br />1 ���������� ����� �� 3 ������ �����  ��� 1 ������� ����, <Br />��� 3 ���������� ������ �� 1 ������ �������<Br /><strong>��� 7 ������:</strong><Br />1 ���������� ����� ��  9 ������ ���� ��� 3 ������� �����, ��� �� 1 ������ ������� <Br /><strong>��� 8�� � ������ ������:</strong><Br />1 ���������� ����� �� 15 ������ �����  ��� 5 ������� ������, <Br />��� 3 ���������� ������ �� 5 ������ ��������<Br />����� ��� ������� ����� � �������� <strong>�����������</strong>.'
		},
	 mater_coin_lvl6_reward:{
				name: '������� ����� F',
				src: imP3 + 'mater_coin_lvl6_reward.gif',
				recipes: null,
				descr: '<strong>����� ������� ��� 5-6�� ������:</strong> <Br />1 ������� ����� �� 3 ����� � �������  ��� 1 ���� ������, <Br />��� 3 ������� ������ �� 1 ������� �������<Br /><strong>��� 7 ������:</strong><Br />1 ������� ����� ��  9 ���� � ������� ��� 3 ������ �����, ��� �� 1 ������� ������� <Br /><strong>��� 8�� � ������ ������:</strong><Br />1 ������� ����� �� 15 ���� � �������  ���  5 ������  ������, <Br />���  3 ������� ������ �� 5 �������� �������<Br />���  3 ������� ������ �� ������<Br />���  3 ������� ������ �� 33 ������<Br />����� ��� ������� ����� � �������� <strong>�����������</strong>.'
		} 
 };



 var gg ={
 cure3_7:{
				name: '����� ���������',
				src: imP3 + 'cure3_7.gif',
				descr: '�����: 1<br />����: 10 ��.<br />�������������: 0/1<br /> ����������� ������������: 99% <br />������� ���������� ���������<br /><font size=1px>������� � Capital city<br><b>������� �� �������� �������</b><br><b>������� �� ����������</b></font><br><br>����� ����� � ������� �� ������ �����, ������ <b>K3.</b><br/>'
		},  
		cureHP45:{
				name: '�������������� ������� +45HP F',
				src: imP3 + 'cureHP45.gif',
				descr: '�����: 1 <br />����: 4 ��. <br />�������������: 0/1<br />��������� �����������: <br />� �������: 4<br />����� ����� � <strong>����� ������</strong> ',
				recipes: null
		},
		cureHP60:{
				name: '�������������� ������� +60HP F',
				src: imP3 + 'cureHP60.gif',
				descr: '�����: 1 <br />����: 4 ��. <br />�������������: 0/1<br />��������� �����������: <br />� �������: 4<br />����� ����� � <strong>����� ������</strong> ',
				recipes: null
		},
pot_cureHP150_0:{ name: '����������� �������� F',city: 7, src: imP3 + 'pot_cureHP150_0.gif',
  descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 2 ��.<br />�������������: 0/10<br />���� ��������: 30 ��. <br /><strong>��������� �����������:</strong><br />&bull; �������: 7<br />&bull; ��������������: ������<br /><strong>��������:</strong><br />�����, ��������� �� ���, ��������� � ������, ������ ����������. ��������������� 150 ��������, ������������ ����� ������ � ������� ����������. <br />����� ������ � �������� ��� ������ � �����'
		}, 
pot_cureHP300_0:{ name: '����������� ������� F',city: 7, src: imP3 + 'pot_cureHP300_0.gif',
  descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 5 ��.<br />�������������: 0/10<br />���� ��������: 30 ��. <br /><strong>��������� �����������:</strong><br />&bull; �������: 8<br />&bull; ��������������: ������<br /><strong>��������:</strong><br />�����, ��������� �� ����, ���, ��������� � ������, ������ ���������� � ����������. ��������������� 300 ��������, ������������ ����� ������ � ������� ����������. <br />����� ������ � �������� ��� ������ � �����'
		}, 
invoke_maxhp_gg:{ name: '�������� �� ������ F',city: 7, src: imP3 + 'invoke_maxhp_gg.gif',
  descr: '�����: 1<img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 1 ��.<br />�������������: 0/5<br />���� ��������: 3 ��.<br /><strong>�������� ��������:</strong> �������������� ��������� ���<br /><strong>��������:</strong><br />�������� ����, �������� �����, ��������������� ��������� ����.<br />����� ����� � ����� ������, ��������������� ����'
  },
invoke_gg_fastmove:{ name: '����� �������� F',city: 3, src: imP3 + 'invoke_gg_fastmove.gif',
	 descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 1 ��. <br />�������������: 4/5<br />���� ��������: 30 ��. <br /><strong>��������� �����������:</strong><br />� �������: 7<br />� ��������������: ��������<br />�������� ��������: ���������<br /><strong>��������:</strong><br />����� � ������, ������������� �������. �� ���������, ������ �������� ������������ �� ��������'
		},
gg_3rd_key:{ name: '�������� - ������� �� ������ ���� �������� F',city: 7, src: imP3 + 'gg_3rd_key.gif',
	 descr: '�����: 0.1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><img src="'+d4+'" alt="'+d5+'"/><br />�������������: 0/1<br />���� ��������: 7 ��.<br /><strong>��������:</strong><br />��������� �������� ���, ��� ����� ������� ���������� ������ ���������. �������� ������ ���������� ��� ������.<br />���� ��������� ������������� ����� �� ����� ����� ������� ����� (������ �� ������� ��������), �� ������.<br />���� ����� ���������� �� �������� � ��������.'
		},
pot_anti_poison_3:{ name: '����� ��������� F',city: 7, src: imP3 + 'pot_anti_poison_3.gif',
	 descr: '�����: 1 <br />����: 1 ��.<br />�������������: 0/4<br />���� ��������: 20 ��.<br /><strong>��������� �����������:</strong><br />��������������: ������<br /><strong>��������:</strong><br />������ ���������, �� ��� ����� �������<br />������ � ����������'
		}, 
	pot_anti_disease_3:{ name: '������ �������� F',city: 7, src: imP3 + 'pot_anti_disease_3.gif',
	 descr: '�����: 1<br />����: 1 ��.<br />�������������: 0/4<br />���� ��������: 20 ��.<br /><strong>��������� �����������:</strong><br />��������������: ������<br /><strong>��������:</strong><br />�� ��� �� �����, �� ������ ����� �������.<br />������ � �������'
		},        
pot_curemana250_0:{name:'��������� ���� F',src: imP3 + 'pot_curemana250_0.gif',
	 descr:'�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 2 ��.<br />�������������: 0/10<br />���� ��������: 30 ��. <br /><strong>��������� �����������:</strong><br />� �������: 4<br />� ��������������: ������<br /><strong>��������:</strong><br />��������� �������� ��������� ����������� �����. ��������������� 250 ���������� �������, ������������ ����� ������ � ������� ����������.<br />������ � �����'
		}, 
pot_curemana500_0_gg:{name:'������� ����������� ���� F',src: imP3 + 'pot_curemana500_0_gg.gif',
	 descr:'�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 1 ��.<br />�������������: 0/1<br />���� ��������: 3 ��.  <strong>��������:</strong><br />�������� �������� �� ��������, ����������������� 500 ������ ����. ������� ������� � ����� �������� �� ������� ��� ������������.<br />������ � �����'
		}, 
gg_order_half:{ name: '����������� ���������� �������� F',city: 7, src: imP3 + 'gg_order_half.gif',
	 descr: '�����: 0.1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />�������������: 0/1<br /><strong>��������:</strong><br />����� ����, ��� ����� ��� ���������?<br />� ������� ���������� ������� ������������� � "�������" � ���������� ��������.'
		},
gg3_magic_box:{ name: '���������� ������� EF', src: imP3 + 'gg3_magic_box.gif',
	 descr: '�����: 0.1 <img src="'+d4+'" alt="'+d5+'"/><br />�������������: 0/1<br /><strong>��������:</strong><br />������ ���� ������� ��������� ����������� �������� ������� �����. �� ������� �� � �� ������, ��� �� ���������.<br />��� ������� ���� ������� � ������������ ���������� ��������, "������" ���� ��� ���������� ��������.'
		},
gg_order_full:{ name: '���������� �������� EF',city: 7, src: imP3 + 'gg_order_full.gif',
	 descr: '�����: 0.1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />�������������: 0/1<br /><strong>��������:</strong><br />...<br />���������� ��� ������� ����� � ��������.'
		}, 
gg_right_key:{ name: '��������� ����� VF',city: 7, src: imP3 + 'gg_right_key.gif',
	 descr: '<br />�����: 0.1<br />�������������: 0/1<br /><strong>��������:</strong><br />������� �����. �����-�� ��� ������������� ���������� �����.<br />������ � �����.'
		},
gg_left_key:{ name: '��������� ����� VF',city: 7, src: imP3 + 'gg_left_key.gif',
	 descr: '<br />�����: 0.1<br />�������������: 0/1<br /><strong>��������:</strong><br />������� �����. �����-�� ��� ������������� ���������� �����.<br />������ � ���������.'
		},
gg_full_key:{ name: '������-���� EF',city: 7, src: imP3 + 'gg_full_key.gif',
	 descr: '<br />�����: 0.1<br />�������������: 0/1<br /><strong>��������:</strong><br />�� ������, ��������� ������. ����� - ����������. '
		},
gg_reward1:{ name: '������ ���� F', src: imP3 + 'gg_reward1.gif', recipes: null,
	 descr: '<br />����: 0,1 ��.<br />�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />�������������: 3/7<br />����������� ������������: 70%<br /><strong>��������� �����������:</strong><br />� �������: 8<br />� ������������: 15<br />�������� �������� <img src="'+imP3+'cureHP600.gif" alt="������� �������������� �������"/> 2 ��. � ����� <br /><strong>��������:</strong><br />�� ����� ������ ������� ��������<br />������� �� ���������� ���������� ������� � ��������.'
		},
ring0931:{ name: '������ ������ VF',city: 7, src: imP3 + '6/ring0931.gif',
	 descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 121 ��.<br />�������������: 0/43<br />������� ��� �����<br /><strong>��������� �����������:</strong><br />� �������: 9<br />� ������������: 25<br /><strong>��������� ��:</strong><br />� ��. �������� �����: +5<br />� ������� ����� (HP): +80<br />� ����: +5<br />������� � ��������<br />  ����� �������� � ��� � �������.'
		},
ring0932:{ name: '������ ������ VF',city: 7, src: imP3 + '6/ring0932.gif',
	 descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 121 ��.<br />�������������: 0/43<br />������� ��� �������<br /><strong>��������� �����������:</strong><br />� �������: 9<br />� ������������: 25<br /><strong>��������� ��:</strong><br />� ��. �������� �����: +5<br />� ��������: +5<br />� ������� ����� (HP): +40<br />� ������� ����: +40<br />������� � ��������<br />  ����� �������� � ��� � �������.'
		},
ring0933:{ name: '������ ���� VF',city: 7, src: imP3 + '6/ring0933.gif',
	 descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 121 ��.<br />�������������: 0/43<br /><strong>��������� �����������:</strong><br />� �������: 9<br />� ������������: 25<br /><strong>��������� ��:</strong><br />� ������ �� �����: +19<br />� ������ �� �����: +19<br />� ������� ����� (HP): +80<br />������� � ��������<br />  ����� �������� � ��� � �������.'
		},
ring0934:{ name: '������ ��� VF',city: 7, src: imP3 + '6/ring0934.gif',
	 descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 121 ��.<br />�������������: 0/43<br /><br />������� ��� ����<br /><strong>��������� �����������:</strong><br />� �������: 9<br />� ������������: 25<br /><strong>��������� ��:</strong><br />� ��. �������� ����� ������: +5<br />� ���������: +5<br />� ������� ����� (HP): +40<br />� ������� ����: +40<br />������� � ��������<br />  ����� �������� � ��� � �������.'
		},
ring0941:{ name: '������� ������ ������ EF',city: 7, src: imP3 + '6/ring0941.gif',
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 121 ��.<br />�������������: 0/45<br />������� ��� �������<br /><strong>��������� �����������:</strong><br />� �������: 9<br />� ������������: 25<br /><strong>��������� ��:</strong><br />� ��. �������� �����: +6<br />� ����: +6<br />� ������� ����� (HP): +80<br />������� � ��������<br />  ��� ��������� ����������: ������ ������+���������� ������� ��������� � �������.'
		}, 
	ring0942:{ name: '������� ������ ������ EF',city: 7, src: imP3 + '6/ring0942.gif',
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 121 ��.<br />�������������: 0/45<br />������� ��� �������<br /><strong>��������� �����������:</strong><br />� �������: 9<br />� ������������: 25<br /><strong>��������� ��:</strong><br />� ��. �������� �����: +6<br />� ��������: +6<br />� ������� ����� (HP): +40<br />� ������� ����: +40<br />������� � ��������<br />  ��� ��������� ����������: ������ ������+���������� ������� ��������� � �������.'
		}, 
	ring0943:{ name: '������� ������ ���� VF',city: 7, src: imP3 + '6/ring0943.gif',
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 121 ��.<br />�������������: 0/43<br /><strong>��������� �����������:</strong><br />� �������: 9<br />� ������������: 25<br /><strong>��������� ��:</strong><br />� ������ �� �����: +19<br />� ������ �� �����: +19<br />� ������� ����� (HP): +100<br />������� � ��������<br />  ����� �������� � ��� � �������.'
		},
	ring0944:{ name: '������� ������ ���� VF',city: 7, src: imP3 + '6/ring0944.gif',
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 121 ��.<br />�������������: 0/43<br /><strong>��������� �����������:</strong><br />� �������: 9<br />� ������������: 25<br /><strong>��������� ��:</strong><br />������� � ��������<br />  ����� �������� � ��� � �������.'
		},

	 gg3_suv_grib1:{
				name: '���������� ����',
				src: imP3 + 'gg3_suv_grib1.gif', recipes: {'gg3_hishn_kolch': 2},
				descr: '�����: 0.1 <br />�������������: 0/1<br /><strong>��������:</strong><br />���� ������ �����, ��� ��� ����� ����� ���� ������. ��������� ���������, �������� ��� ��������.<br /> - ������ �������, ����� ������ ����� ���.���. ������������� ������� 180 ��. '
		},
	 gg3_suv_grib2:{
				name: '���������� ����',
				src: imP3 + 'gg3_suv_grib2.gif', recipes: {'gg3_hishn_kolch': 2},
				descr: '�����: 0.1 <br />�������������: 0/1<br /><strong>��������:</strong><br />���� ������ �����, ��� ��� ����� ����� ���� ������. ��������� ���������, �������� ��� ��������.<br /> - ������ �������, ����� ������ ����� ���.���. ������������� ������� 180 ��. '
		},
	 gg3_suv_grib3:{
				name: '���������� ����',
				src: imP3 + 'gg3_suv_grib3.gif', recipes: {'gg3_hishn_kolch': 2},
				descr: '�����: 0.1 <br />�������������: 0/1<br /><strong>��������:</strong><br />���� ������ �����, ��� ��� ����� ����� ���� ������. ��������� ���������, �������� ��� ��������.<br /> - ������ �������, ����� ������ ����� ���.���. ������������� ������� 180 ��. '
		},
	 gg3_suv_insect_f:{
				name: '��������� � �����',
				src: imP3 + 'gg3_suv_insect_f.gif', recipes: {'gg3_hishn_dosp': 2},
				descr: '�����: 0.1 <br />�������������: 0/1<br /><strong>��������:</strong><br />������� �����, � �������, �����-��, ������-�����, �������� ���������.<br /> - ������ �������, ����� ������ ����� ���.���. ������������� ������� 180 ��.<br /><strong>���������:<img src="'+imP3+'gg3_hishn_dosp.gif" alt="������� �������"/> �2</strong>'
		},
	 gg3_suv_insect_m:{
				name: '��������� � �����',
				src: imP3 + 'gg3_suv_insect_m.gif',  recipes: {'gg3_hishn_sword': 2},
				descr: '�����: 0.1 <br />�������������: 0/1<br /><strong>��������:</strong><br /><br /> - ������ �������, ����� ������ ����� ���.���. ������������� ������� 180 ��. '
		},
	 gg3_suv_civiar:{
				name: '��� � ���������� ����������',
				src: imP3 + 'gg3_suv_civiar.gif', recipes: {'gg3_hishn_finger': 2},
				descr: '�����: 0.1 <br />�������������: 0/1<br /><strong>��������:</strong><br />������� ���������� ���, ������ �������� ���-�� ������������ ����� ������� ������.<br /> - ������ �������, ����� ������ ����� ���.���. ������������� ������� 180 ��. '
		},
	 gg3_suv_orchid:{
				name: '��������� ������',
				src: imP3 + 'gg3_suv_orchid.gif', recipes: {'gg3_hishn_kolch': 2,'gg3_hishn_dosp': 2},
				descr: '�����: 0.1 <br />�������������: 0/1<br /><strong>��������:</strong><br /><br /> - ������ �������, ����� ������ ����� ���.���. ������������� ������� 180 ��. '
		},
  gg3_suv_horn1:{
   	name: '�����',
   	src: imP3 + 'gg3_suv_horn1.gif', recipes: {'gg3_hishn_sword': 2,'gg3_hishn_finger': 2},
    descr: '�����: 0.1 <br />�������������: 0/1<br /><strong>��������:</strong><br /><br /> - ������ �������, ����� ������ ����� ���.���. ������������� ������� 180 ��.'
  },
  gg3_suv_horn2:{
   	name: '�����',
   	src: imP3 + 'gg3_suv_horn2.gif', recipes: {'gg3_hishn_sword': 2,'gg3_hishn_finger': 2},
    descr: '�����: 0.1 <br />�������������: 0/1<br /><strong>��������:</strong><br /><br /> - ������ �������, ����� ������ ����� ���.���. ������������� ������� 180 ��.'
  },
  gg3_hishn_bone:{
				name: '�����',
				src: imP3 + 'gg3_hishn_bone.gif',
				descr: '�����: 0.1 <img src="'+d4+'" alt="'+d5+'"/><br />�������������: 0/1<br /><strong>��������:</strong><br />��� ���� ����� ������ �������� ��� ����������� �����, ��� ��� ����� �� ������������.<br />������� � �������, ����� ����� - �� ))'
		},  

  gg3_mak_grib:{
				name: '������� �����',
				src: imP3 + 'gg3_mak_grib.gif',
				descr: '�����: 0.1 <img src="'+d4+'" alt="'+d5+'"/><br />�������������: 0/1<br /><strong>��������:</strong><br />������� �����, ������� ��� ���������.<br />  - ��������� �������, �������� ������� <A href="http://www.darkclan.ru/cgi/lib.pl?p=mushrooms" TARGET="_blank"><U>������ ���</U></A>.'
		}, 
gg3_mak_bottle_empty:{name: '������ ������ F',src: imP3 + 'gg3_mak_bottle_empty.gif',
				descr:'�����: 0.1 <img src="'+d4+'" alt="'+d5+'"/><br />�������������: 0/1<br /><strong>��������:</strong><br />������� ������ �������. ������ ����������� ���. ������-������.<br />��������� �������, �������� ������� <A href="http://www.darkclan.ru/cgi/lib.pl?p=mushrooms" TARGET="_blank"><U>������ ���</U></A>'
		},
	 gg3_mak_bottle:{
				name: '������� � ������������� ���������',
				src: imP3 + 'gg3_mak_bottle.gif',
				descr: '�����: 0.1 <img src="'+d4+'" alt="'+d5+'"/><br />�������������: 0/1<br />���� ��������: 0.006 ��.(10 �����)<br /><strong>��������:</strong><br />������� � ���������, ������� �� ������� � �������.<br /> - ��������� �������, �������� ������� <A href="http://www.darkclan.ru/cgi/lib.pl?p=mushrooms" TARGET="_blank"><U>������ ���</U></A>'
		},
	 gg3_mak_shtuk:{
				name: '���������� ���������',
				src: imP3 + 'gg3_mak_shtuk.gif',
				descr: '�����: 0.1 <img src="'+d4+'" alt="'+d5+'"/><br />�������������: 0/1<br /> - ��������� �������, �������� ������� <A href="http://www.darkclan.ru/cgi/lib.pl?p=mushrooms" TARGET="_blank"><U>������ ���</U></A>'
		},
	 invoke_gg3_mak_ferom:{
				name: '������� ��������',
				src: imP3 + 'invoke_gg3_mak_ferom.gif',
				descr: '�����: 0.1 <img src="'+d4+'" alt="'+d5+'"/><br />�������������: 0/1<br />�������� ��������: ����� ����������<br /> - ��������� �������, �������� ������� <A href="http://www.darkclan.ru/cgi/lib.pl?p=mushrooms" TARGET="_blank"><U>������ ���</U></A>'
		},
	 gg3_shiz_crystal:{
				name: '������ ��������',
				src: imP3 + 'gg3_shiz_crystal.gif',
				descr: '�����: 0.1 <img src="'+d4+'" alt="'+d5+'"/><br />�������������: 0/1<br /><strong>��������:</strong><br />����� ����������� ���������� ��������.<br />�� ������ ��������, � ��� ����� ������ ���� ���������.<br /> - ��������� �������, �������� ������� <A href="http://www.darkclan.ru/cgi/lib.pl?p=mushrooms" TARGET="_blank"><U>������ ���</U></A>'
		}  
};

var stb ={
		token23soldier:{
				name: '����� �������� ����� ������ �����',
				src: imP3 + 'token23soldier.gif',
				descr: '<BR />�����: 0.1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><BR />�������������: 0/1<BR />������� � ������ ������ �����<BR />������������ � "��������".',
    recipes: null
		},
		token23command:{
				name: '����� ��������� ����� ������ �����',
				src: imP3 + 'token23command.gif',
				descr: '<BR />�����: 0.1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><BR />�������������: 0/1<BR />������� � ������ ������ �����<BR />������������ � "��������".',
    recipes: null
		},
		ring0431:{
				name: '����������� ������',
				src: imP3 + '6/ring0431.gif',
				descr: '�����: 1 <img src="'+d4+'" alt="'+d5+'"/><br />����: 62 ��. <br />�������������: 0/50 <br /><strong>��������� �����������:</strong><br />� �������: 4 <br /><strong>��������� ��:</strong><br />� ������� ����� (HP): +100 <br />��������: 1 ��. <br />������� � Abandoned Plain<br />����� �������� � "��������" � "���������� �����" �� 3 ������ ���������� � 20 ������� �������. ',
    recipes: null
		},
		cloak0831:{
				name: '����������� ����',
				src: imP3 + '17/cloak0831.gif',
				descr: '�����: 1 <img src="'+d4+'" alt="'+d5+'"/><br />����: 100 ��. <br />�������������: 0/60<br /><strong>��������� �����������:</strong><br />� �������: 8<br /><strong>��������� ��:</strong><br />� ������� ����� (HP): +6<br />��������: 1 ��.<br />������� � Abandoned Plain<br />����� �������� � "��������" � "���������� �����" �� 5 ������� ���������� � 30 ������� �������. ',
    recipes: null
		},
	 cloak1031:{
				name: '����� ����������� ����',
				src: imP3 + '17/cloak1031.gif',
				descr: '�����: 1 <img src="'+d4+'" alt="'+d5+'"/><br />����: 300 ��.<br />�������������: 0/60<br /><strong>��������� �����������:</strong><br />� �������: 10<br /><strong>��������� ��:</strong><br />� ��������: +1<br />� ��������: +1<br />� ���������: +1<br />� ������� ����� (HP): +6<br />� ����: +1<br />��������: 1 ��. <br />������� � Abandoned Plain<br />����� �������� � "��������" � "���������� �����" �� 10 ������� ���������� � 45 ������� �������. ',
    recipes: null
		}
};

/*
var tn ={
 
};
 
var izl ={
}; 

var gl ={ 
		pot_anti_disease_5_1:{
				name: '��������� [5]',
				src: imP3 + 'pot_anti_disease_5.gif',
				descr: '�����: 1<br />�������������: 0/5 (0/4, 0/3) <br />����: 1 ��. <br /><strong>�������� ��������:</strong><br />� ��������� <br /><strong>��������:</strong><br />� ������� ��� �� ������ ��������. <br /> - ����� ������ � �����'
			},
		food_l8_2:{
				name: '��������� -������� ������- �������',
				src: imP3 + 'food_l8.gif',
				descr: '�����: 1 <br />����: 4 ��. <br />�������������: 0/4<br />���� ��������: 15 ��. <br />����������������� �������� �����: 3 �. <br /><strong>��������� �����������:</strong><br />� �������: 8<br />� ���������� ������������ ���������<br /><strong>��������� ��:</strong><br />� ������� ����� (HP): +180<br /> .'
			},

  gl_token:{
				name: '������� ����',
				src: imP3 + 'gl_token.gif',
				recipes: null,
				descr: '�����: 0.1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><BR>�������������: 0/1<BR>������ ��. ����� ������ � ������ ����, �������� �� ���������� �������, ��������� ��� ������ ��������� ����� �� �������.'
		},
  gl_golem:{
				name: '�������� �� ������',
				src: imP3 + 'gl_golem.gif',
				recipes: null,
				descr: '�����: 0.1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><BR>�������������: 0/1<BR> ��������� �������. ������ � ������� �������, ����� ������� �����.'
		},
  gl_meat:{
				name: '���� �������',
				src: imP3 + 'gl_meat.gif',
				recipes: null,
				descr: '�����: 0.1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><BR>�������������: 0/1<BR>��������� �������, ������� � ������� �����, ��� �������.'
		},
  pot_gl_smazka:{
				name: '����� �� �������',
				src: imP3 + 'pot_gl_smazka.gif',
				recipes: null,
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><BR>����: 4 ��.<BR>�������������: 0/1<BR>���� ��������: 30 ��.<BR>����������������� �������� �����: 20 ���.<BR><strong>��������:</strong><BR>������������� ������ ��� ������ ����������.������ �� ���������!!!<BR>��������� �������, ������� � �������� ����� ��� ������ ������ ����.'
		},
  food_gl_samogon:{
				name: '�������� �� ������ �������',
				src: imP3 + 'food_gl_samogon.gif',
				recipes: null,
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><BR>����: 1.5 ��.<BR>�������������: 0/1<BR>���� ��������: 30 ��.<BR>����������������� �������� �����: 1 �. 0 ���.<BR><strong>��������� �����������:</strong><BR>� �������: 8<BR>� ������������: 25<BR><strong>��������� ��:</strong><BR>� ��. �������� ����� ������: +10<BR>� ��. �������� �����: +10<BR>� ��������: -3<BR>� ���������: -3<BR>������� � ������� ����� + ����� ������ � �����.'
		},
   gl_matkahead:{
				name: '������ ������ �����',
				src: imP3 + 'gl_matkahead.gif',
				recipes: null,
				descr: '�����: 0.1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><BR>�������������: 0/1<BR><strong>��������:</strong><BR>������� ���� ����� �������� ��������, ������ ��� ������!<BR>��������� �������, ������ ����� ������ ������ �����, ���� ������� �������� �����.'
		},
   gl_zomb_kusok:{
				name: '����� ���������� �����',
				src: imP3 + 'gl_zomb_kusok.gif',
				recipes: null,
				descr: '�����: 0.1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><BR>�������������: 0/1<BR><strong>��������:</strong><BR> ����� � ���������� �����, ������ � ���������.<BR>��������� �� ������� �� ���������� ������� ������.�� 15 ������ - 15��. ���������.<BR> - ����� ������� �� ��������� � 10000'
		},
   gl_gusa_meat:{
				name: '������ ��������',
				src: imP3 + 'gl_gusa_meat.gif',
				recipes: null,
				descr: '�����: 0.1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><BR>�������������: 0/1<BR><strong>��������:</strong><BR>������ �������� "����� ����������� ���������� ��������"<BR> ����� � ���������� ��������.<BR>��������� �� ������� �� �������. �� 30 ������ - 45��. ���������.<BR> - ����� ������� �� ��������� � 10000'
		},

	 gl_mara_docs:{
				name: '���������� �������',
				src: imP3 + 'gl_mara_docs.gif',
				descr: '�����: 0.1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />�������������: 0/1<br /><strong>��������:</strong><br />������� ��������� ������ ������ � ����� ���������� � ����������� ���������� ������.<br />���������� ����, ������������� �������.<br />��������� ��� ���������� �������: "��������� �������� � ������ �� ������. 0/1"<br />��� ������������ ���������� "������ 200" � 25 ��, � ��� �� �������� ��������, ����� ���� �� ����� �������� �� ����.'
		},
	 gl_mara_ley_history:{
				name: '������� ����������',
				src: imP3 + 'gl_mara_ley_history.gif',
				descr: '<br />�����: 0.1 <br />�������������: 0/1 <br /><strong>��������:</strong><br />���������, ������������ ����� �������� �� ����� ���� �� ��� �� �������� ��������� ������ ����.'
		},
	 gl_seymos:{
				name: '������ �������',
				src: imP3 + 'gl_seymos.gif',
				descr: '�����: 0.1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />�������������: 0/1<br />������� �� �������, ������� � �������.'
		},
	 rune_super_500:{
				name: '������� �������',
				src: imP3 + 'rune_super_500.gif',
				descr: '�����: 1 <br />����: 25 ��.<br />�������������: 0/1<br /><strong>��������� �����������:</strong><br />� �������: 7<br /><strong>��������� ��:</strong><br />� ������� ����� (HP): +100<br /><strong>��������:</strong><br />���� ����� ����� �������� �������<br />������ ���� � ������� �� ���������� ������� �� ������ �������.'
		},
	 gl_stonekey_green:{
				name: '������� ����-������',
				src: imP3 + 'gl_stonekey_green.gif',
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />�������������: 0/1<br /> - 1. �������� ����� � "��������", ����� �� 4 ������� ��� ������� ��� ��������� ���� 2 ���� ��������� ��������<br /> - 2. � "���������", ����� �� 5 �������. ��� ������ ��������.'
		},
	 gl_stonekey_yellow:{
				name: '������ ����-������',
				src: imP3 + 'gl_stonekey_yellow.gif',
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />�������������: 0/1<br />�������� ����� � "��������� ������� ������", ��� ������� 2 ����� ��������� �������� � ���� ��������� ������ ���������. ��� ������ ��������.'
		},
	 gl_stonekey_red:{
				name: '������� ����-������',
				src: imP3 + 'gl_stonekey_red.gif',
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />�������������: 0/1<br />��� ������ ��������. ������� � ���������� ��� ��������� � 8000.'
		},
	 gl_stonekey_blue:{
				name: '����� ����-������',
				src: imP3 + 'gl_stonekey_blue.gif',
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />�������������: 0/1<br />������ ���� � ������� �� ���������� ������� �� ������ �������, �� ���������.'
		},
	 ko_sign:{
				name: '���� ��������� ������',
				src: imP3 + 'ko_sign.gif',
				descr: '�����: 0.1<br />�������������: 0/1<br />������ ���� � ������� �� ���������� ������� �� ������ �������, �� ���������.<br />��������� ������ �� ������� (� ����� �� 1� �����) � ����������� ����� � ������ <b>V11</b>.'
		},
	 gl_mara_hood:{
				name: '���� ��������',
				src: imP3 + 'gl_mara_hood.gif',
				descr: '�����: 2 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 3 ��.<br />�������������: 0/50<br /><strong>��������� ��:</strong><br />���. ����������� (%): +25<br />����������� �������� ������, ���������: +1<br />� ����� ���������: ������������� �������� �������� [0/2]<br /><font color=#990000>������� �� �������� �������</font><br />�������� ��������� ��� ������� � "�����" �� 2� �����, ������ � ��������� ������ � �����.'
		},
  gl_mara_cloak:{
				name: '������������� ���� ��������',
				src: imP3 + 'gl_mara_cloak.gif',
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 20 ��.<br />�������������: 0/50<br /><strong>��������� ��:</strong><br />� ��. ������ ������������ ����� (%): +25<br />� ��. ����������� (%): +50<br />� ����: -5<br />� ����� ���������: ������������� �������� �������� [0/2]<br /><font color=#990000>������� �� �������� �������</font><br />�������� ��������� ��� ������� � "�����" �� 2� �����, ������ � ��������� ������ � �����.'
		},
  gl_mara_leycloak:{
				name: '���� ���������� ���������',
				src: imP3 + 'gl_mara_leycloak.gif',
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 40 ��.<br />�������������: 0/50<br /><strong>��������� �����������:</strong><br />� �������: 10<br /><strong>��������� ��:</strong><br />� ��. ������ ������������ ����� (%): +15<br />� ��. ����������� (%): +15<br />� ������� ����� (HP): +10 <br />����� � ������� �� �����������.'
		},
 
	 gl_werewolf:{
				name: '����� �����',
				src: imP3 + 'gl_werewolf.gif',
				descr: '�����: 1 <img style="'+d1+'" src="'+d2+'" alt="'+d3+'"/><br />����: 49 ��.<br />�������������: 0/50<br /><strong>��������� �����������:</strong><br />� �������: 10<br /><strong>��������� ��:</strong><br />� ��. �������� ����. ����� (%): +3<br />� ��. �������� ����� (%): +3<br /><strong>��������:</strong> <br />���, ��� �������� �� ��������� ��������.<br /><font color=#990000>������� �� �������� �������.</font>'
		},

	 invoke_plain_gl_dogcall:{
				name: '�������� ���������� ������',
				src: imP3 + 'invoke_plain_gl_dogcall.gif',
				descr: '�������������: 0/1<br />� ���������� ����������<br /><strong>�������� ��������:</strong> ������� ������<br />����� ������ � ������� �����������. "���� ����� ������������ ������ � ���".'
		},
	 invoke_gl_sosiska:{
				name: '������ �������',
				src: imP3 + 'invoke_gl_sosiska.gif',
				descr: '�����: 1<br />�������������: 0/1<br />� ���������� ����������<br />�������� ��������: <strong>����������</strong> (����� ������ (�����) - �������� � ������������� ����� ���� ��������. ����� � ���������, ��� ������� ������� ������.) <br /><strong>��������:</strong><br />������, ������. ������������ ��� ���������� ���������� ������.<br />������� � ������ �����<br />  - ������������ �� �������, �� ��������� ������ ��� �����.'
		},
	 cure3:{
				name: '������� ������� �����',
				src: imP3 + 'cure3.gif',
				descr: '�����: 1<br />����: 4 ��. <br />�������������: 0/2<br />����������� ������������: 50%<br /><strong>��������� �����������:</strong><br />� ���������: 12<br />� �������: 6<br /> - ������� ����� ���� � ����� �� �������� ������'
		}, 
	 note:{
				name: '������� ������������',
				src: imP3 + 'note.gif',
				descr: '�����: 1<br />����: 2 ��. <br />�������������: 0/10<br />����������� ������������: 99%<br /><strong>��������� �����������:</strong><br />� ���������: 5<br />� �������: 6<br /> - ������� ����� ���� � ����� �� �������� ������'
		},
		'd_blat-6_1':{
				name: '������� �������',
				src: imP3 + 'd_blat-6.gif',
				descr: '��������� ������ � ���������� �� 6 ����� ������. ����������� ������������: 99 %.<br />����� ������ �� �����, �������',
				recipes: null
		},
	 invoke_tactics5:{
				name: '��������� �������',
				src: imP3 + 'invoke_tactics5.gif',
				descr: '�����: 1<br />�������������: 0/1<br />����� ������ �� ����� ��������� ������� 1-3, ����� �������.'
		},
   gl_knife_01:{
				name: '������ ���������� ������',
				src: imP3 + 'gl_knife_01.gif',
				recipes: null,
				descr: '�����:<br />�������������: 0/<br /><strong>��������� �����������:</strong><br />� �������: 15<br /><strong>��������:</strong><br />���� �� � �������� ����� ���� �� ���� ����� �����������, �� ��-�������� �� ������ ������������ ���. ������ ���� �����������, ������� ��� ���� ���� �������, ���������� � ������� �����.<br />� ��������� ������������ ����� �������� � ������� ��� ������� ��������.'
		},
  gl_sword_01:{
				name: '������ ���������� ���',
				src: imP3 + 'gl_sword_01.gif',
				recipes: null,
				descr: '�����:<br />�������������: 0/<br /><strong>��������� �����������:</strong><br />� �������: 15<br /><strong>��������:</strong><br />���� �� � �������� ����� ���� �� ���� ����� �����������, �� ��-�������� �� ������ ������������ ���. ������ ���� �����������, ������� ��� ���� ���� �������, ���������� � ������� �����.<br />� ��������� ������������ ����� �������� � ������� ��� ������� ��������.'
		},
  gl_2h_sword_01:{
				name: '������ ���������� ��������� ���',
				src: imP3 + 'gl_2h_sword_01.gif',
				recipes: null,
				descr: '�����:<br />�������������: 0/<br /><strong>��������� �����������:</strong><br />� �������: 15<br /><strong>��������:</strong><br />���� �� � �������� ����� ���� �� ���� ����� �����������, �� ��-�������� �� ������ ������������ ���. ������ ���� �����������, ������� ��� ���� ���� �������, ���������� � ������� �����.<br />� ��������� ������������ ����� �������� � ������� ��� ������� ��������.'
		},
  gl_topor_01:{
				name: '������ ���������� �������� �����',
				src: imP3 + 'gl_topor_01.gif',
				recipes: null,
				descr: '�����:<br />�������������: 0/<br /><strong>��������� �����������:</strong><br />� �������: 15<br /><strong>��������:</strong><br />���� �� � �������� ����� ���� �� ���� ����� �����������, �� ��-�������� �� ������ ������������ ���. ������ ���� �����������, ������� ��� ���� ���� �������, ���������� � ������� �����.<br />� ��������� ������������ ����� �������� � ������� ��� ������� ��������.'
		},
  gl_bulava_01:{
				name: '������ ���������� ������',
				src: imP3 + 'gl_bulava_01.gif',
				recipes: null,
				descr: '�����:<br />�������������: 0/<br /><strong>��������� �����������:</strong><br />� �������: 15<br /><strong>��������:</strong><br />���� �� � �������� ����� ���� �� ���� ����� �����������, �� ��-�������� �� ������ ������������ ���. ������ ���� �����������, ������� ��� ���� ���� �������, ���������� � ������� �����.<br />� ��������� ������������ ����� �������� � ������� ��� ������� ��������.'
		},
  gl_molot_01:{
				name: '������ ���������� �����',
				src: imP3 + 'gl_molot_01.gif',
				recipes: null,
				descr: '�����:<br />�������������: 0/<br /><strong>��������� �����������:</strong><br />� �������: 15<br /><strong>��������:</strong><br />���� �� � �������� ����� ���� �� ���� ����� �����������, �� ��-�������� �� ������ ������������ ���. ������ ���� �����������, ������� ��� ���� ���� �������, ���������� � ������� �����.<br />� ��������� ������������ ����� �������� � ������� ��� ������� ��������.'
		},
  gl_shield_01:{
				name: '������ ���������� ������� ���',
				src: imP3 + 'gl_shield_01.gif',
				recipes: null,
				descr: '�����:<br />�������������: 0/<br /><strong>��������� �����������:</strong><br />� �������: 15<br /><strong>��������:</strong><br />���� �� � �������� ����� ���� �� ���� ����� �����������, �� ��-�������� �� ������ ������������ ���. ������ ���� �����������, ������� ��� ���� ���� �������, ���������� � ������� �����.<br />� ��������� ������������ ����� �������� � ������� ��� ������� ��������.'
		},
  gl_staff_01:{
				name: '������ ���������� ������� �����',
				src: imP3 + 'gl_staff_01.gif',
				recipes: null,
				descr: '�����:5 <br />�������������: 0/<br /><strong>��������� �����������:</strong><br />� �������: 15<br /><strong>��������:</strong><br />���� �� � �������� ����� ���� �� ���� ����� �����������, �� ��-�������� �� ������ ������������ ���. ������ ���� �����������, ������� ��� ���� ���� �������, ���������� � ������� �����.<br />� ��������� ������������ ����� �������� � ������� ��� ������� ��������.'
		},
  gl_clearing_01:{
				name: '�������� ������',
				src: imP3 + 'gl_clearing_01.gif',
				recipes: null,
				descr: '�����: 0.1 <BR>�������������: 0/1<BR>� ��������� ������������ ����� �������� � ������� ��� ������� ��������.<BR>���� �������� �� "�������", �� �������� "������� �����������" ��� ������ ������� ������� �����<br />� ��� ����� �������� ����� ���. ���. ��� �������.'
		},
  gl_clearing_02:{
				name: '�������� �����',
				src: imP3 + 'gl_clearing_02.gif',
				recipes: null,
				descr: '�����: 0.1 <BR>�������������: 0/1<BR>� ��������� ������������ ����� �������� � ������� ��� ������� ��������.'
		},
  gl_clearing_03:{
				name: '������ �����',
				src: imP3 + 'gl_clearing_03.gif',
				recipes: null,
				descr: '�����: 0.1 <BR>�������������: 0/1<BR>� ��������� ������������ ����� �������� � ������� ��� ������� ��������.'
		},
  gl_clearing_04:{
				name: '������� ����',
				src: imP3 + 'gl_clearing_04.gif',
				recipes: null,
				descr: '�����: 0.1 <BR>�������������: 0/1<BR>� ��������� ������������ ����� �������� � ������� ��� ������� ��������.'
		},
  gl_clearing_05:{
				name: '�������� ������� 2 ��.',
				src: imP3 + 'gl_clearing_05.gif',
				recipes: null,
				descr: '�����: 0.1 <BR>�������������: 0/1<BR>� ��������� ������������ ����� �������� � ������� ��� ������� ��������.'
		},
  gl_clearing_06:{
				name: '��������� ���������',
				src: imP3 + 'gl_clearing_06.gif',
				recipes: null,
				descr: '�����: 0.1 <BR>�������������: 0/1<BR>� ��������� ������������ ����� �������� � ������� ��� ������� ��������.<br />����� �������� ����� ���.���. ��� �������.'
		},
	 gl_clearing_07:{
				name: '������ ������',
				src: imP3 + 'gl_clearing_07.gif',
				descr: '�����: 0.1<br />�������������: 0/1<br />� ��������� ������������ ����� �������� � ������� ��� ������� ��������.'
		},
   gl_mara_treasures:{
				name: '���������� ���������',
				src: imP3 + 'gl_mara_treasures.gif',
				descr: '�����: 0.1 <BR>�������������: 0/1<BR>��������� �������. ��������� ��� ������.'
		},
	 suven28:{
				name: '������� �� ��� ����',
				src: imP3 + 'suven28.gif',
				descr: '�����: 1<br />����: 15 ��.<br />�������������: 0/1<br /><strong>��������:</strong><br />���������� ������� � �������� ������� �������. ������������� ���������. �������! ���������� ���� ����������!�<br />����� �������� ��� ����� � ���'
		},

	 cards_apr1:{
				name: '�������� -�� ����-',
				src: imP3 + 'cards_apr1.gif',
				descr: '�����: 1 <br />����: 10 ��. <br />�������������: 0/1<br />���� ��������: 30 ��.  <br /><strong>��������:</strong><br />��� ����������� ������������ � �������������� � ������ ������<br /> ��������� � ������� ������ �� ���� ))'
		},
	 suven23_7_5:{
				name: '��������',
				src: imP3 + 'suven23_7_5.gif',
				descr: '�����: 1<BR> ����: 5 ��.  <BR>�������������: 0/1'
		}*/
 
};


var items = {
//"�����������": maters,
//"��������":pots,
//"������":scrolls,
//"������ ������": taktiks,
//"������ �����������": charki,
//"������ �������": pochin,
//"���������� ����":rares,
"������":ptp,
"������":pm,
"��������":kanaliz,
//"�� ��������":gg,
//"�� ���������� �����":stb 
//"�� �������� �����":tn,
//"�� ���� �������": gl,
//"�� ������ �����":izl
};
