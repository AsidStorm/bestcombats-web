<?
// 1- ����    1 - ����. �����     1 - ������ �����
// 2- �����   2 - ����. �����     2 - ������ ����
// 3- ���     3 - ����. �����     3 - ������ �������
// �������� 121 = 2 ����� � 1 �����
if($rt["n$loc4"]=='1'){$ob = "pauk"; $b_n = "����";}
else if($rt["n$loc4"]=='2'){$ob = "zombi"; $b_n = "�����";}
else if($rt["n$loc4"]=='3'){$ob = "zuk"; $b_n = "���";}

else if($rt["n$loc4"]=='4'){$ob = "merz"; $b_n = "��������";}
else if($rt["n$loc4"]=='5'){$ob = "obit"; $b_n = "���������";}
else if($rt["n$loc4"]=='6'){$ob = "zud"; $b_n = "������";}
else if($rt["n$loc4"]=='7'){$ob = "mart"; $b_n = "������";}
else if($rt["n$loc4"]=='8'){$ob = "luka"; $b_n = "����";}

////////////////2 ����////////////////////////
else if($rt["n$loc4"]=='9'){$ob = "krisa"; $b_n = "�����";}
else if($rt["n$loc4"]=='10'){$ob = "bez_san"; $b_n = "����������";}
else if($rt["n$loc4"]=='11'){$ob = "stal"; $b_n = "��������";}
else if($rt["n$loc4"]=='12'){$ob = "krov"; $b_n = "��������";}
else if($rt["n$loc4"]=='13'){$ob = "mis"; $b_n = "����";}
else if($rt["n$loc4"]=='14'){$ob = "prorab"; $b_n = "������";}
else if($rt["n$loc4"]=='15'){$ob = "slesar"; $b_n = "�������";}
else if($rt["n$loc4"]=='16'){$ob = "sliz"; $b_n = "�����";}
else if($rt["n$loc4"]=='17'){$ob = "star"; $b_n = "��������";}
else if($rt["n$loc4"]=='18'){$ob = "xoz"; $b_n = "������";}
else if($rt["n$loc4"]>=29 && $rt["n$loc4"]<=31){
  list($b_n,$ob)=botname($rt["n$loc4"]);
}


else if($rt["n$loc4"]=='1.1'){$ob = "pauk"; $b_n = "����"; $ob2 = "pauk"; $b_n2 = "����";}
else if($rt["n$loc4"]=='1.2'){$ob = "pauk"; $b_n = "����"; $ob2 = "zombi"; $b_n2 = "�����";}
else if($rt["n$loc4"]=='1.3'){$ob = "pauk"; $b_n = "����"; $ob2 = "zuk"; $b_n2 = "���";}
else if($rt["n$loc4"]=='2.2'){$ob = "zombi"; $b_n = "�����"; $ob2 = "zombi"; $b_n2 = "�����";}
else if($rt["n$loc4"]=='2.3'){$ob = "zombi"; $b_n = "�����"; $ob2 = "zuk"; $b_n2 = "���";}
else if($rt["n$loc4"]=='3.3'){$ob = "zuk"; $b_n = "���"; $ob2 = "zuk"; $b_n2 = "���";}

//////////////////////2 etaz ////////////////////////
else if($rt["n$loc4"]=='9.9'){$ob = "krisa"; $b_n = "�����"; $ob2 = "krisa"; $b_n2 = "�����";}
else if($rt["n$loc4"]=='10.10'){$ob = "bez_san"; $b_n = "����������"; $ob2 = "bez_san"; $b_n2 = "����������";}
else if($rt["n$loc4"]=='11.11'){$ob = "stal"; $b_n = "��������"; $ob2 = "stal"; $b_n2 = "��������";}
else if($rt["n$loc4"]=='12.12'){$ob = "krov"; $b_n = "��������"; $ob2 = "krov"; $b_n2 = "��������";}
else if($rt["n$loc4"]=='13.13'){$ob = "mis"; $b_n = "����"; $ob2 = "mis"; $b_n2 = "����";}
else if($rt["n$loc4"]=='14.14'){$ob = "prorab"; $b_n = "������"; $ob2 = "prorab"; $b_n2 = "������";}
else if($rt["n$loc4"]=='15.15'){$ob = "slesar"; $b_n = "�������"; $ob2 = "slesar"; $b_n2 = "�������";}
else if($rt["n$loc4"]=='16.16'){$ob = "sliz"; $b_n = "�����"; $ob2 = "sliz"; $b_n2 = "�����";}
else if($rt["n$loc4"]=='17.17'){$ob = "star"; $b_n = "��������"; $ob2 = "star"; $b_n2 = "��������";}
else if($rt["n$loc4"]=='18.18'){$ob = "xoz"; $b_n = "������"; $ob2 = "xoz"; $b_n2 = "������";}


else if($rt["n$loc4"]=='1.1.1'){$ob = "pauk"; $b_n = "����"; $ob2 = "pauk"; $b_n2 = "����"; $ob3 = "pauk"; $b_n3 = "����";}
else if($rt["n$loc4"]=='1.1.2'){$ob = "pauk"; $b_n = "����"; $ob2 = "pauk"; $b_n2 = "����"; $ob3 = "zombi"; $b_n3 = "�����";}
else if($rt["n$loc4"]=='1.1.3'){$ob = "pauk"; $b_n = "����"; $ob2 = "pauk"; $b_n2 = "����"; $ob3 = "zuk"; $b_n3 = "���";}
else if($rt["n$loc4"]=='1.2.2'){$ob = "pauk"; $b_n = "����"; $ob2 = "zombi"; $b_n2 = "�����"; $ob3 = "zombi"; $b_n3 = "�����";}
else if($rt["n$loc4"]=='1.3.2'){$ob = "pauk"; $b_n = "����"; $ob2 = "zuk"; $b_n2 = "���"; $ob3 = "zombi"; $b_n3 = "�����";}
else if($rt["n$loc4"]=='1.3.3'){$ob = "pauk"; $b_n = "����"; $ob2 = "zuk"; $b_n2 = "���"; $ob3 = "zuk"; $b_n3 = "���";}
else if($rt["n$loc4"]=='2.2.2'){$ob = "zombi"; $b_n = "�����"; $ob2 = "zombi"; $b_n2 = "�����"; $ob3 = "zombi"; $b_n3 = "�����";}
else if($rt["n$loc4"]=='2.2.3'){$ob = "zombi"; $b_n = "�����"; $ob2 = "zombi"; $b_n2 = "�����"; $ob3 = "zuk"; $b_n3 = "���";}
else if($rt["n$loc4"]=='2.3.3'){$ob = "zombi"; $b_n = "�����"; $ob2 = "zuk"; $b_n2 = "���"; $ob3 = "zuk"; $b_n3 = "���";}
else if($rt["n$loc4"]=='3.3.3'){$ob = "zuk"; $b_n = "���"; $ob2 = "zuk"; $b_n2 = "���"; $ob3 = "zuk"; $b_n3 = "���";}
else if($rt["n$loc4"]=='1.2.3'){$ob = "pauk"; $b_n = "����"; $ob2 = "zombi"; $b_n2 = "�����"; $ob3 = "zuk"; $b_n3 = "���";}


////////////////2 ����////////////////////////
else if($rt["n$loc4"]=='9.9.9'){$ob = "krisa"; $b_n = "�����"; $ob2 = "krisa"; $b_n2 = "�����"; $ob3 = "krisa"; $b_n3 = "�����";}
else if($rt["n$loc4"]=='10.10.10'){$ob = "bez_san"; $b_n = "����������"; $ob2 = "bez_san"; $b_n2 = "����������"; $ob3 = "bez_san"; $b_n3 = "����������";}
else if($rt["n$loc4"]=='11.11.11'){$ob = "stal"; $b_n = "��������"; $ob2 = "stal"; $b_n2 = "��������"; $ob3 = "stal"; $b_n3 = "��������";}
else if($rt["n$loc4"]=='12.12.12'){$ob = "krov"; $b_n = "��������"; $ob2 = "krov"; $b_n2 = "��������"; $ob3 = "krov"; $b_n3 = "��������";}
else if($rt["n$loc4"]=='13.13.13'){$ob = "mis"; $b_n = "����"; $ob2 = "mis"; $b_n2 = "����"; $ob3 = "mis"; $b_n3 = "����";}
else if($rt["n$loc4"]=='14.14.14'){$ob = "prorab"; $b_n = "������"; $ob2 = "prorab"; $b_n2 = "������"; $ob3 = "prorab"; $b_n3 = "������";}
else if($rt["n$loc4"]=='15.15.15'){$ob = "slesar"; $b_n = "�������"; $ob2 = "slesar"; $b_n2 = "�������"; $ob3 = "slesar"; $b_n3 = "�������";}
else if($rt["n$loc4"]=='16.16.16'){$ob = "sliz"; $b_n = "�����"; $ob2 = "sliz"; $b_n2 = "�����"; $ob3 = "sliz"; $b_n3 = "�����";}
else if($rt["n$loc4"]=='17.17.17'){$ob = "star"; $b_n = "��������"; $ob2 = "star"; $b_n2 = "��������"; $ob3 = "star"; $b_n3 = "��������";}
else if($rt["n$loc4"]=='18.18.18'){$ob = "xoz"; $b_n = "������"; $ob2 = "xoz"; $b_n2 = "������"; $ob3 = "xoz"; $b_n3 = "������";}


if($rt["n$loc4"]=='1' or $rt["n$loc4"]=='2' or $rt["n$loc4"]=='3' or $rt["n$loc4"]=='4' or $rt["n$loc4"]=='5' or $rt["n$loc4"]=='6' or $rt["n$loc4"]=='7' or $rt["n$loc4"]=='8' or $rt["n$loc4"]=='9' or $rt["n$loc4"]=='10' or $rt["n$loc4"]=='11' or $rt["n$loc4"]=='12' or $rt["n$loc4"]=='13' or $rt["n$loc4"]=='14' or $rt["n$loc4"]=='15' or $rt["n$loc4"]=='16' or $rt["n$loc4"]=='17' or $rt["n$loc4"]=='18' or $rt["n$loc4"]=='19' or $rt["n$loc4"]=='20' or $rt["n$loc4"]=='21' or $rt["n$loc4"]=='22' or $rt["n$loc4"]=='23' or $rt["n$loc4"]=='24' or $rt["n$loc4"]=='25' or $rt["n$loc4"]=='26' or $rt["n$loc4"]=='27' or $rt["n$loc4"]=='28' or $rt["n$loc4"]=='29' or $rt["n$loc4"]=='30' or $rt["n$loc4"]=='31'){$k_b = 1;}
else if($rt["n$loc4"]=='1.1' or $rt["n$loc4"]=='1.2' or $rt["n$loc4"]=='1.3' or $rt["n$loc4"]=='2.2' or $rt["n$loc4"]=='2.3' or $rt["n$loc4"]=='3.3' or $rt["n$loc4"]=='9.9' or $rt["n$loc4"]=='10.10' or $rt["n$loc4"]=='11.11' or $rt["n$loc4"]=='12.12' or $rt["n$loc4"]=='13.13' or $rt["n$loc4"]=='14.14' or $rt["n$loc4"]=='15.15' or $rt["n$loc4"]=='16.16' or $rt["n$loc4"]=='17.17' or $rt["n$loc4"]=='18.18' or $rt["n$loc4"]=='19.19' or $rt["n$loc4"]=='20.20' or $rt["n$loc4"]=='21.21' or $rt["n$loc4"]=='22.22' or $rt["n$loc4"]=='23.23' or $rt["n$loc4"]=='24.24' or $rt["n$loc4"]=='25.25' or $rt["n$loc4"]=='26.26' or $rt["n$loc4"]=='27.27' or $rt["n$loc4"]=='28.28'){$k_b = 2;}
else if($rt["n$loc4"]=='1.1.1' or $rt["n$loc4"]=='1.1.2' or $rt["n$loc4"]=='1.1.3' or $rt["n$loc4"]=='1.2.2' or $rt["n$loc4"]=='1.3.2' or $rt["n$loc4"]=='1.3.3' or $rt["n$loc4"]=='2.2.2' or $rt["n$loc4"]=='2.2.3' or $rt["n$loc4"]=='2.3.3' or $rt["n$loc4"]=='3.3.3' or $rt["n$loc4"]=='1.2.3' or $rt["n$loc4"]=='9.9.9' or $rt["n$loc4"]=='10.10.10' or $rt["n$loc4"]=='11.11.11' or $rt["n$loc4"]=='12.12.12' or $rt["n$loc4"]=='13.13.13' or $rt["n$loc4"]=='14.14.14' or $rt["n$loc4"]=='15.15.15' or $rt["n$loc4"]=='16.16.16' or $rt["n$loc4"]=='17.17.17' or $rt["n$loc4"]=='18.18.18' or $rt["n$loc4"]=='19.19.19' or $rt["n$loc4"]=='20.20.20' or $rt["n$loc4"]=='21.21.21' or $rt["n$loc4"]=='22.22.22' or $rt["n$loc4"]=='23.23.23' or $rt["n$loc4"]=='24.24.24' or $rt["n$loc4"]=='25.25.25' or $rt["n$loc4"]=='26.26.26' or $rt["n$loc4"]=='27.27.27' or $rt["n$loc4"]=='28.28.28'){$k_b = 3;}

/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////

if($rt["n$loc3"]=='1'){$ob3 = "pauk"; $b_n3 = "����";}
else if($rt["n$loc3"]=='2'){$ob3 = "zombi"; $b_n3 = "�����";}
else if($rt["n$loc3"]=='3'){$ob3 = "zuk"; $b_n3 = "���";}

else if($rt["n$loc3"]=='4'){$ob3 = "merz"; $b_n3 = "��������";}
else if($rt["n$loc3"]=='5'){$ob3 = "obit"; $b_n3 = "���������";}
else if($rt["n$loc3"]=='6'){$ob3 = "zud"; $b_n3 = "������";}
else if($rt["n$loc3"]=='7'){$ob3 = "mart"; $b_n3 = "������";}
else if($rt["n$loc3"]=='8'){$ob3 = "luka"; $b_n3 = "����";}

////////////////2 ����////////////////////////
else if($rt["n$loc3"]=='9'){$ob3 = "krisa"; $b_n3 = "�����";}
else if($rt["n$loc3"]=='10'){$ob3 = "bez_san"; $b_n3 = "����������";}
else if($rt["n$loc3"]=='11'){$ob3 = "stal"; $b_n3 = "��������";}
else if($rt["n$loc3"]=='12'){$ob3 = "krov"; $b_n3 = "��������";}
else if($rt["n$loc3"]=='13'){$ob3 = "mis"; $b_n3 = "����";}
else if($rt["n$loc3"]=='14'){$ob3 = "prorab"; $b_n3 = "������";}
else if($rt["n$loc3"]=='15'){$ob3 = "slesar"; $b_n3 = "�������";}
else if($rt["n$loc3"]=='16'){$ob3 = "sliz"; $b_n3 = "�����";}
else if($rt["n$loc3"]=='17'){$ob3 = "star"; $b_n3 = "��������";}
else if($rt["n$loc3"]=='18'){$ob3 = "xoz"; $b_n3 = "������";}
else if($rt["n$loc3"]>=29 && $rt["n$loc3"]<=31){
  list($b_n3,$ob3)=botname($rt["n$loc3"]);
}

else if($rt["n$loc3"]=='1.1'){$ob3 = "pauk"; $b_n3 = "����"; $ob32 = "pauk"; $b_n32 = "����";}
else if($rt["n$loc3"]=='1.2'){$ob3 = "pauk"; $b_n3 = "����"; $ob32 = "zombi"; $b_n32 = "�����";}
else if($rt["n$loc3"]=='1.3'){$ob3 = "pauk"; $b_n3 = "����"; $ob32 = "zuk"; $b_n32 = "����";}
else if($rt["n$loc3"]=='2.2'){$ob3 = "zombi"; $b_n3 = "�����"; $ob32 = "zombi"; $b_n32 = "�����";}
else if($rt["n$loc3"]=='2.3'){$ob3 = "zombi"; $b_n3 = "�����"; $ob32 = "zuk"; $b_n32 = "���";}
else if($rt["n$loc3"]=='3.3'){$ob3 = "zuk"; $b_n3 = "���"; $ob32 = "zuk"; $b_n32 = "���";}

//////////////////////2 etaz ////////////////////////
else if($rt["n$loc3"]=='9.9'){$ob3 = "krisa"; $b_n3 = "�����"; $ob32 = "krisa"; $b_n32 = "�����";}
else if($rt["n$loc3"]=='10.10'){$ob3 = "bez_san"; $b_n3 = "����������"; $ob32 = "bez_san"; $b_n32 = "����������";}
else if($rt["n$loc3"]=='11.11'){$ob3 = "stal"; $b_n3 = "��������"; $ob32 = "stal"; $b_n32 = "��������";}
else if($rt["n$loc3"]=='12.12'){$ob3 = "krov"; $b_n3 = "��������"; $ob32 = "krov"; $b_n32 = "��������";}
else if($rt["n$loc3"]=='13.13'){$ob3 = "mis"; $b_n3 = "����"; $ob32 = "mis"; $b_n32 = "����";}
else if($rt["n$loc3"]=='14.14'){$ob3 = "prorab"; $b_n3 = "������"; $ob32 = "prorab"; $b_n32 = "������";}
else if($rt["n$loc3"]=='15.15'){$ob3 = "slesar"; $b_n3 = "�������"; $ob32 = "slesar"; $b_n32 = "�������";}
else if($rt["n$loc3"]=='16.16'){$ob3 = "sliz"; $b_n3 = "�����"; $ob32 = "sliz"; $b_n32 = "�����";}
else if($rt["n$loc3"]=='17.17'){$ob3 = "star"; $b_n3 = "��������"; $ob32 = "star"; $b_n32 = "��������";}
else if($rt["n$loc3"]=='18.18'){$ob3 = "xoz"; $b_n3 = "������"; $ob32 = "xoz"; $b_n32 = "������";}
/////////////////////////////////////////////////////////////////////////////////////////////////////
else if($rt["n$loc3"]=='1.1.1'){$ob3 = "pauk"; $b_n3 = "����"; $ob32 = "pauk"; $b_n32 = "����"; $ob33 = "pauk"; $b_n33 = "����";}
else if($rt["n$loc3"]=='1.1.2'){$ob3 = "pauk"; $b_n3 = "����"; $ob32 = "pauk"; $b_n32 = "����"; $ob33 = "zombi"; $b_n33 = "�����";}
else if($rt["n$loc3"]=='1.1.3'){$ob3 = "pauk"; $b_n3 = "����"; $ob32 = "pauk"; $b_n32 = "����"; $ob33 = "zuk"; $b_n33 = "���";}
else if($rt["n$loc3"]=='1.2.2'){$ob3 = "pauk"; $b_n3 = "����"; $ob32 = "zombi"; $b_n32 = "�����"; $ob33 = "zombi"; $b_n33 = "�����";}
else if($rt["n$loc3"]=='1.3.2'){$ob3 = "pauk"; $b_n3 = "����"; $ob32 = "zuk"; $b_n32 = "���"; $ob33 = "zombi"; $b_n33 = "�����";}
else if($rt["n$loc3"]=='1.3.3'){$ob3 = "pauk"; $b_n3 = "����"; $ob32 = "zuk"; $b_n32 = "���"; $ob33 = "zuk"; $b_n33 = "���";}
else if($rt["n$loc3"]=='2.2.2'){$ob3 = "zombi";$b_n3 = "�����"; $ob32 = "zombi"; $b_n32 = "�����"; $ob33 = "zombi"; $b_n33 = "�����";}
else if($rt["n$loc3"]=='2.2.3'){$ob3 = "zombi"; $b_n3 = "�����"; $ob32 = "zombi"; $b_n32 = "�����"; $ob33 = "zuk"; $b_n33 = "���";}
else if($rt["n$loc3"]=='2.3.3'){$ob3 = "zombi"; $b_n3 = "�����"; $ob32 = "zuk"; $b_n32 = "���"; $ob33 = "zuk"; $b_n33 = "���";}
else if($rt["n$loc3"]=='3.3.3'){$ob3 = "zuk"; $b_n3 = "���"; $ob32 = "zuk"; $b_n32 = "���"; $ob33 = "zuk"; $b_n33 = "���";}
else if($rt["n$loc3"]=='1.2.3'){$ob3 = "pauk"; $b_n3 = "����"; $ob32 = "zombi"; $b_n32 = "�����"; $ob33 = "zuk"; $b_n33 = "���";}
////////////////2 ����////////////////////////
else if($rt["n$loc3"]=='9.9.9'){$ob3 = "krisa"; $b_n3 = "�����"; $ob32 = "krisa"; $b_n32 = "�����"; $ob33 = "krisa"; $b_n33 = "�����";}
else if($rt["n$loc3"]=='10.10.10'){$ob3 = "bez_san"; $b_n3 = "����������"; $ob32 = "bez_san"; $b_n32 = "����������"; $ob33 = "bez_san"; $b_n33 = "����������";}
else if($rt["n$loc3"]=='11.11.11'){$ob3 = "stal"; $b_n3 = "��������"; $ob32 = "stal"; $b_n32 = "��������"; $ob33 = "stal"; $b_n33 = "��������";}
else if($rt["n$loc3"]=='12.12.12'){$ob3 = "krov"; $b_n3 = "��������"; $ob32 = "krov"; $b_n32 = "��������"; $ob33 = "krov"; $b_n33 = "��������";}
else if($rt["n$loc3"]=='13.13.13'){$ob3 = "mis"; $b_n3 = "����"; $ob32 = "mis"; $b_n32 = "����"; $ob33 = "mis"; $b_n33 = "����";}
else if($rt["n$loc3"]=='14.14.14'){$ob3 = "prorab"; $b_n3 = "������"; $ob32 = "prorab"; $b_n32 = "������"; $ob33 = "prorab"; $b_n33 = "������";}
else if($rt["n$loc3"]=='15.15.15'){$ob3 = "slesar"; $b_n3 = "�������"; $ob32 = "slesar"; $b_n32 = "�������"; $ob33 = "slesar"; $b_n33 = "�������";}
else if($rt["n$loc3"]=='16.16.16'){$ob3 = "sliz"; $b_n3 = "�����"; $ob32 = "sliz"; $b_n32 = "�����"; $ob33 = "sliz"; $b_n33 = "�����";}
else if($rt["n$loc3"]=='17.17.17'){$ob3 = "star"; $b_n3 = "��������"; $ob32 = "star"; $b_n32 = "��������"; $ob33 = "star"; $b_n33 = "��������";}
else if($rt["n$loc3"]=='18.18.18'){$ob3 = "xoz"; $b_n3 = "������"; $ob32 = "xoz"; $b_n32 = "������"; $ob33 = "xoz"; $b_n33 = "������";}

if($rt["n$loc3"]=='1' or $rt["n$loc3"]=='2' or $rt["n$loc3"]=='3' or $rt["n$loc3"]=='4' or $rt["n$loc3"]=='5' or $rt["n$loc3"]=='6' or $rt["n$loc3"]=='7' or $rt["n$loc3"]=='8' or $rt["n$loc3"]=='9' or $rt["n$loc3"]=='10' or $rt["n$loc3"]=='11' or $rt["n$loc3"]=='12' or $rt["n$loc3"]=='13' or $rt["n$loc3"]=='14' or $rt["n$loc3"]=='15' or $rt["n$loc3"]=='16' or $rt["n$loc3"]=='17' or $rt["n$loc3"]=='18' or $rt["n$loc3"]=='19' or $rt["n$loc3"]=='19' or $rt["n$loc3"]=='20' or $rt["n$loc3"]=='21' or $rt["n$loc3"]=='22' or $rt["n$loc3"]=='23' or $rt["n$loc3"]=='24' or $rt["n$loc3"]=='25' or $rt["n$loc3"]=='26' or $rt["n$loc3"]=='27' or $rt["n$loc3"]=='28' or $rt["n$loc3"]=='29' or $rt["n$loc3"]=='30' or $rt["n$loc3"]=='31'){$k_b3 = 1;}
else if($rt["n$loc3"]=='1.1' or $rt["n$loc3"]=='1.2' or $rt["n$loc3"]=='1.3' or $rt["n$loc3"]=='2.2' or $rt["n$loc3"]=='2.3' or $rt["n$loc3"]=='3.3' or $rt["n$loc3"]=='9.9' or $rt["n$loc3"]=='10.10' or $rt["n$loc3"]=='11.11' or $rt["n$loc3"]=='12.12' or $rt["n$loc3"]=='13.13' or $rt["n$loc3"]=='14.14' or $rt["n$loc3"]=='15.15' or $rt["n$loc3"]=='16.16' or $rt["n$loc3"]=='17.17' or $rt["n$loc3"]=='18.18' or $rt["n$loc3"]=='19.19' or $rt["n$loc3"]=='20.20' or $rt["n$loc3"]=='21.21' or $rt["n$loc3"]=='22.22' or $rt["n$loc3"]=='23.23' or $rt["n$loc3"]=='24.24' or $rt["n$loc3"]=='25.25' or $rt["n$loc3"]=='26.26' or $rt["n$loc3"]=='27.27' or $rt["n$loc3"]=='28.28'){$k_b3 = 2;}
else if($rt["n$loc3"]=='1.1.1' or $rt["n$loc3"]=='1.1.2' or $rt["n$loc3"]=='1.1.3' or $rt["n$loc3"]=='1.2.2' or $rt["n$loc3"]=='1.3.2' or $rt["n$loc3"]=='1.3.3' or $rt["n$loc3"]=='2.2.2' or $rt["n$loc3"]=='2.2.3' or $rt["n$loc3"]=='2.3.3' or $rt["n$loc3"]=='3.3.3' or $rt["n$loc3"]=='1.2.3' or $rt["n$loc3"]=='9.9.9' or $rt["n$loc3"]=='10.10.10' or $rt["n$loc3"]=='11.11.11' or $rt["n$loc3"]=='12.12.12' or $rt["n$loc3"]=='13.13.13' or $rt["n$loc3"]=='14.14.14' or $rt["n$loc3"]=='15.15.15' or $rt["n$loc3"]=='16.16.16' or $rt["n$loc3"]=='17.17.17' or $rt["n$loc3"]=='18.18.18' or $rt["n$loc3"]=='19.19.19' or $rt["n$loc3"]=='20.20.20' or $rt["n$loc3"]=='21.21.21' or $rt["n$loc3"]=='22.22.22' or $rt["n$loc3"]=='23.23.23' or $rt["n$loc3"]=='24.24.24' or $rt["n$loc3"]=='25.25.25' or $rt["n$loc3"]=='26.26.26' or $rt["n$loc3"]=='27.27.27' or $rt["n$loc3"]=='28.28.28'){$k_b3 = 3;}

/////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////

if($rt["n$loc2"]=='1'){$ob2 = "pauk"; $b_n2 = "����";}
else if($rt["n$loc2"]=='2'){$ob2 = "zombi"; $b_n2 = "�����";}
else if($rt["n$loc2"]=='3'){$ob2 = "zuk"; $b_n2 = "���";}

else if($rt["n$loc2"]=='4'){$ob2 = "merz"; $b_n2 = "��������";}
else if($rt["n$loc2"]=='5'){$ob2 = "obit"; $b_n2 = "���������";}
else if($rt["n$loc2"]=='6'){$ob2 = "zud"; $b_n2 = "������";}
else if($rt["n$loc2"]=='7'){$ob2 = "mart"; $b_n2 = "������";}
else if($rt["n$loc2"]=='8'){$ob2 = "luka"; $b_n2 = "����";}

////////////////2 ����////////////////////////
else if($rt["n$loc2"]=='9'){$ob2 = "krisa"; $b_n2 = "�����";}
else if($rt["n$loc2"]=='10'){$ob2 = "bez_san"; $b_n2 = "����������";}
else if($rt["n$loc2"]=='11'){$ob2 = "stal"; $b_n2 = "��������";}
else if($rt["n$loc2"]=='12'){$ob2 = "krov"; $b_n2 = "��������";}
else if($rt["n$loc2"]=='13'){$ob2 = "mis"; $b_n2 = "����";}
else if($rt["n$loc2"]=='14'){$ob2 = "prorab"; $b_n2 = "������";}
else if($rt["n$loc2"]=='15'){$ob2 = "slesar"; $b_n2 = "�������";}
else if($rt["n$loc2"]=='16'){$ob2 = "sliz"; $b_n2 = "�����";}
else if($rt["n$loc2"]=='17'){$ob2 = "star"; $b_n2 = "��������";}
else if($rt["n$loc2"]=='18'){$ob2 = "xoz"; $b_n2 = "������";}
else if($rt["n$loc2"]>=29 && $rt["n$loc2"]<=31){
  list($b_n2,$ob2)=botname($rt["n$loc2"]);
}
/////////////////////////////////////////////

else if($rt["n$loc2"]=='1.1'){$ob2 = "pauk"; $b_n2 = "����"; $ob22 = "pauk"; $b_n22 = "����";}
else if($rt["n$loc2"]=='1.2'){$ob2 = "pauk"; $b_n2 = "����"; $ob22 = "zombi"; $b_n22 = "�����";}
else if($rt["n$loc2"]=='1.3'){$ob2 = "pauk"; $b_n2 = "����"; $ob22 = "zuk"; $b_n22 = "����";}
else if($rt["n$loc2"]=='2.2'){$ob2 = "zombi"; $b_n2 = "�����"; $ob22 = "zombi"; $b_n22 = "�����";}
else if($rt["n$loc2"]=='2.3'){$ob2 = "zombi"; $b_n2 = "�����"; $ob22 = "zuk"; $b_n22 = "���";}
else if($rt["n$loc2"]=='3.3'){$ob2 = "zuk"; $b_n2 = "���"; $ob22 = "zuk"; $b_n22 = "���";}

//////////////////////2 etaz ////////////////////////
else if($rt["n$loc2"]=='9.9'){$ob2 = "krisa"; $b_n2 = "�����"; $ob22 = "krisa"; $b_n22 = "�����";}
else if($rt["n$loc2"]=='10.10'){$ob2 = "bez_san"; $b_n2 = "����������"; $ob22 = "bez_san"; $b_n22 = "����������";}
else if($rt["n$loc2"]=='11.11'){$ob2 = "stal"; $b_n2 = "��������"; $ob22 = "stal"; $b_n22 = "��������";}
else if($rt["n$loc2"]=='12.12'){$ob2 = "krov"; $b_n2 = "��������"; $ob22 = "krov"; $b_n22 = "��������";}
else if($rt["n$loc2"]=='13.13'){$ob2 = "mis"; $b_n2 = "����"; $ob22 = "mis"; $b_n22 = "����";}
else if($rt["n$loc2"]=='14.14'){$ob2 = "prorab"; $b_n2 = "������"; $ob22 = "prorab"; $b_n22 = "������";}
else if($rt["n$loc2"]=='15.15'){$ob2 = "slesar"; $b_n2 = "�������"; $ob22 = "slesar"; $b_n22 = "�������";}
else if($rt["n$loc2"]=='16.16'){$ob2 = "sliz"; $b_n2 = "�����"; $ob22 = "sliz"; $b_n22 = "�����";}
else if($rt["n$loc2"]=='17.17'){$ob2 = "star"; $b_n2 = "��������"; $ob22 = "star"; $b_n22 = "��������";}
else if($rt["n$loc2"]=='18.18'){$ob2 = "xoz"; $b_n2 = "������"; $ob22 = "xoz"; $b_n22 = "������";}
/////////////////////////////////////////////////////

else if($rt["n$loc2"]=='1.1.1'){$ob2 = "pauk"; $b_n2 = "����"; $ob22 = "pauk"; $b_n22 = "����"; $ob23 = "pauk"; $b_n23 = "����";}
else if($rt["n$loc2"]=='1.1.2'){$ob2 = "pauk"; $b_n2 = "����"; $ob22 = "pauk"; $b_n22 = "����"; $ob23 = "zombi"; $b_n23 = "�����";}
else if($rt["n$loc2"]=='1.1.3'){$ob2 = "pauk"; $b_n2 = "����"; $ob22 = "pauk"; $b_n22 = "����"; $ob23 = "zuk"; $b_n23 = "���";}
else if($rt["n$loc2"]=='1.2.2'){$ob2 = "pauk"; $b_n2 = "����"; $ob22 = "zombi"; $b_n22 = "�����"; $ob23 = "zombi"; $b_n23 = "�����";}
else if($rt["n$loc2"]=='1.3.2'){$ob2 = "pauk"; $b_n2 = "����"; $ob22 = "zuk"; $b_n22 = "���"; $ob23 = "zombi"; $b_n23 = "�����";}
else if($rt["n$loc2"]=='1.3.3'){$ob2 = "pauk"; $b_n2 = "����"; $ob22 = "zuk"; $b_n22 = "���"; $ob23 = "zuk"; $b_n23 = "���";}
else if($rt["n$loc2"]=='2.2.2'){$ob2 = "zombi";$b_n2 = "�����"; $ob22 = "zombi"; $b_n22 = "�����"; $ob23 = "zombi"; $b_n23 = "�����";}
else if($rt["n$loc2"]=='2.2.3'){$ob2 = "zombi"; $b_n2 = "�����"; $ob22 = "zombi"; $b_n22 = "�����"; $ob23 = "zuk"; $b_n23 = "���";}
else if($rt["n$loc2"]=='2.3.3'){$ob2 = "zombi"; $b_n2 = "�����"; $ob22 = "zuk"; $b_n22 = "���"; $ob23 = "zuk"; $b_n23 = "���";}
else if($rt["n$loc2"]=='3.3.3'){$ob2 = "zuk"; $b_n2 = "���"; $ob22 = "zuk"; $b_n22 = "���"; $ob23 = "zuk"; $b_n23 = "���";}
else if($rt["n$loc2"]=='1.2.3'){$ob2 = "pauk"; $b_n2 = "����"; $ob22 = "zombi"; $b_n22 = "�����"; $ob23 = "zuk"; $b_n23 = "���";}

////////////////2 ����////////////////////////
else if($rt["n$loc2"]=='9.9.9'){$ob2 = "krisa"; $b_n2 = "�����"; $ob22 = "krisa"; $b_n22 = "�����"; $ob23 = "krisa"; $b_n23 = "�����";}
else if($rt["n$loc2"]=='10.10.10'){$ob2 = "bez_san"; $b_n2 = "����������"; $ob22 = "bez_san"; $b_n22 = "����������"; $ob23 = "bez_san"; $b_n23 = "����������";}
else if($rt["n$loc2"]=='11.11.11'){$ob2 = "stal"; $b_n2 = "��������"; $ob22 = "stal"; $b_n22 = "��������"; $ob23 = "stal"; $b_n23 = "��������";}
else if($rt["n$loc2"]=='12.12.12'){$ob2 = "krov"; $b_n2 = "��������"; $ob22 = "krov"; $b_n22 = "��������"; $ob23 = "krov"; $b_n23 = "��������";}
else if($rt["n$loc2"]=='13.13.13'){$ob2 = "mis"; $b_n2 = "����"; $ob22 = "mis"; $b_n22 = "����"; $ob23 = "mis"; $b_n23 = "����";}
else if($rt["n$loc2"]=='14.14.14'){$ob2 = "prorab"; $b_n2 = "������"; $ob22 = "prorab"; $b_n22 = "������"; $ob23 = "prorab"; $b_n23 = "������";}
else if($rt["n$loc2"]=='15.15.15'){$ob2 = "slesar"; $b_n2 = "�������"; $ob22 = "slesar"; $b_n22 = "�������"; $ob23 = "slesar"; $b_n23 = "�������";}
else if($rt["n$loc2"]=='16.16.16'){$ob2 = "sliz"; $b_n2 = "�����"; $ob22 = "sliz"; $b_n22 = "�����"; $ob23 = "sliz"; $b_n23 = "�����";}
else if($rt["n$loc2"]=='17.17.17'){$ob2 = "star"; $b_n2 = "��������"; $ob22 = "star"; $b_n22 = "��������"; $ob23 = "star"; $b_n23 = "��������";}
else if($rt["n$loc2"]=='18.18.18'){$ob2 = "xoz"; $b_n2 = "������"; $ob22 = "xoz"; $b_n22 = "������"; $ob23 = "xoz"; $b_n23 = "������";}
///////////////////////////////////////////////

if($rt["n$loc4"]=='19'){$ob = "trup"; $b_n = "��������&nbsp����";}
else if($rt["n$loc4"]=='20'){$ob = "izi"; $b_n = "���";}
else if($rt["n$loc4"]=='21'){$ob = "kosmar"; $b_n = "������&nbsp������";}
else if($rt["n$loc4"]=='22'){$ob = "prok"; $b_n = "���������&nbsp������";}
else if($rt["n$loc4"]=='23'){$ob = "uzas"; $b_n = "����&nbsp������";}
///////////////////////////////////////////////////////////////////
else if($rt["n$loc4"]=='24'){$ob = "bes"; $b_n = "���";}
else if($rt["n$loc4"]=='25'){$ob = "zelen"; $b_n = "�������&nbsp�����";}
else if($rt["n$loc4"]=='26'){$ob = "demon"; $b_n = "��������&nbsp�����";}
else if($rt["n$loc4"]=='27'){$ob = "skelet"; $b_n = "������";}
else if($rt["n$loc4"]=='28'){$ob = "straz"; $b_n = "�����";}
else if($rt["n$loc4"]=='19.19'){$ob = "trup"; $b_n = "��������&nbsp����"; $ob2 = "trup"; $b_n2 = "��������&nbsp����";}
else if($rt["n$loc4"]=='20.20'){$ob = "izi"; $b_n = "���"; $ob2 = "izi"; $b_n2 = "���";}
else if($rt["n$loc4"]=='21.21'){$ob = "kosmar"; $b_n = "������&nbsp������"; $ob2 = "kosmar"; $b_n2 = "������&nbsp������";}
else if($rt["n$loc4"]=='22.22'){$ob = "prok"; $b_n = "���������&nbsp������"; $ob2 = "prok"; $b_n2 = "���������&nbsp������";}
else if($rt["n$loc4"]=='23.23'){$ob = "uzas"; $b_n = "����&nbsp������"; $ob2 = "uzas"; $b_n2 = "����&nbsp������";}
///////////////////////////////////////////////////////////////////
else if($rt["n$loc4"]=='24.24'){$ob = "bes"; $b_n = "���"; $ob2 = "bes"; $b_n2 = "���";}
else if($rt["n$loc4"]=='25.25'){$ob = "zelen"; $b_n = "�������&nbsp�����"; $ob2 = "zelen"; $b_n2 = "�������&nbsp�����";}
else if($rt["n$loc4"]=='26.26'){$ob = "demon"; $b_n = "��������&nbsp�����"; $ob2 = "demon"; $b_n2 = "��������&nbsp�����";}
else if($rt["n$loc4"]=='27.27'){$ob = "skelet"; $b_n = "������"; $ob2 = "skelet"; $b_n2 = "������";}
else if($rt["n$loc4"]=='28.28'){$ob = "straz"; $b_n = "�����"; $ob2 = "straz"; $b_n2 = "�����";}

else if($rt["n$loc4"]=='19.19.19'){$ob = "trup"; $b_n = "��������&nbsp����"; $ob2 = "trup"; $b_n2 = "��������&nbsp����"; $ob3 = "trup"; $b_n3 = "��������&nbsp����";}
else if($rt["n$loc4"]=='20.20.20'){$ob = "izi"; $b_n = "���"; $ob2 = "izi"; $b_n2 = "���"; $ob3 = "izi"; $b_n3 = "���";}
else if($rt["n$loc4"]=='21.21.21'){$ob = "kosmar"; $b_n = "������&nbsp������"; $ob2 = "kosmar"; $b_n2 = "������&nbsp������"; $ob3 = "kosmar"; $b_n3 = "������&nbsp������";}
else if($rt["n$loc4"]=='22.22.22'){$ob = "prok"; $b_n = "���������&nbsp������"; $ob2 = "prok"; $b_n2 = "���������&nbsp������"; $ob3 = "prok"; $b_n3 = "���������&nbsp������";}
else if($rt["n$loc4"]=='23.23.23'){$ob = "uzas"; $b_n = "����&nbsp������"; $ob2 = "uzas"; $b_n2 = "����&nbsp������"; $ob3 = "uzas"; $b_n3 = "����&nbsp������";}
///////////////////////////////////////////////////////////////////
else if($rt["n$loc4"]=='24.24.24'){$ob = "bes"; $b_n = "���"; $ob2 = "bes"; $b_n2 = "���"; $ob3 = "bes"; $b_n3 = "���";}
else if($rt["n$loc4"]=='25.25.25'){$ob = "zelen"; $b_n = "�������&nbsp�����"; $ob2 = "zelen"; $b_n2 = "�������&nbsp�����"; $ob3 = "zelen"; $b_n3 = "�������&nbsp�����";}
else if($rt["n$loc4"]=='26.26.26'){$ob = "demon"; $b_n = "��������&nbsp�����"; $ob2 = "demon"; $b_n2 = "��������&nbsp�����"; $ob3 = "demon"; $b_n3 = "��������&nbsp�����";}
else if($rt["n$loc4"]=='27.27.27'){$ob = "skelet"; $b_n = "������"; $ob2 = "skelet"; $b_n2 = "������"; $ob3 = "skelet"; $b_n3 = "������";}
else if($rt["n$loc4"]=='28.28.28'){$ob = "straz"; $b_n = "�����"; $ob2 = "straz"; $b_n2 = "�����"; $ob3 = "straz"; $b_n3 = "�����";}

if ($rt["n$loc3"]=='19'){$ob3 = "trup"; $b_n3 = "��������&nbsp����";}
else if($rt["n$loc3"]=='20'){$ob3 = "izi"; $b_n3 = "���";}
else if($rt["n$loc3"]=='21'){$ob3 = "kosmar"; $b_n3 = "������&nbsp������";}
else if($rt["n$loc3"]=='22'){$ob3 = "prok"; $b_n3 = "���������&nbsp������";}
else if($rt["n$loc3"]=='23'){$ob3 = "uzas"; $b_n3 = "����&nbsp������";}
///////////////////////////////////////////////////////////////////
else if($rt["n$loc3"]=='24'){$ob3 = "bes"; $b_n3 = "���";}
else if($rt["n$loc3"]=='25'){$ob3 = "zelen"; $b_n3 = "�������&nbsp�����";}
else if($rt["n$loc3"]=='26'){$ob3 = "demon"; $b_n3 = "��������&nbsp�����";}
else if($rt["n$loc3"]=='27'){$ob3 = "skelet"; $b_n3 = "������";}
else if($rt["n$loc3"]=='28'){$ob3 = "straz"; $b_n3 = "�����";}
else if($rt["n$loc3"]=='19.19'){$ob3 = "trup"; $b_n3 = "��������&nbsp����"; $ob32 = "trup"; $b_n32 = "�������� ����";}
else if($rt["n$loc3"]=='20.20'){$ob3 = "izi"; $b_n3 = "���"; $ob32 = "izi"; $b_n32 = "���";}
else if($rt["n$loc3"]=='21.21'){$ob3 = "kosmar"; $b_n3 = "������&nbsp������"; $ob32 = "kosmar"; $b_n32 = "������&nbsp������";}
else if($rt["n$loc3"]=='22.22'){$ob3 = "prok"; $b_n3 = "���������&nbsp������"; $ob32 = "prok"; $b_n32 = "���������&nbsp������";}
else if($rt["n$loc3"]=='23.23'){$ob3 = "uzas"; $b_n3 = "����&nbsp������"; $ob32 = "uzas"; $b_n32 = "����&nbsp������";}
///////////////////////////////////////////////////////////////////
else if($rt["n$loc3"]=='24.24'){$ob3 = "bes"; $b_n3 = "���"; $ob32 = "bes"; $b_n32 = "���";}
else if($rt["n$loc3"]=='25.25'){$ob3 = "zelen"; $b_n3 = "�������&nbsp�����"; $ob32 = "zelen"; $b_n32 = "�������&nbsp�����";}
else if($rt["n$loc3"]=='26.26'){$ob3 = "demon"; $b_n3 = "��������&nbsp�����"; $ob32 = "demon"; $b_n32 = "��������&nbsp�����";}
else if($rt["n$loc3"]=='27.27'){$ob3 = "skelet"; $b_n3 = "������"; $ob32 = "skelet"; $b_n32 = "������";}
else if($rt["n$loc3"]=='28.28'){$ob3 = "straz"; $b_n3 = "�����"; $ob32 = "straz"; $b_n32 = "�����";}

else if($rt["n$loc3"]=='19.19.19'){$ob3 = "trup"; $b_n3 = "�������� ����"; $ob32 = "trup"; $b_n32 = "�������� ����"; $ob33 = "trup"; $b_n33 = "�������� ����";}
else if($rt["n$loc3"]=='20.20.20'){$ob3 = "izi"; $b_n3 = "���"; $ob32 = "izi"; $b_n32 = "���"; $ob33 = "izi"; $b_n33 = "���";}
else if($rt["n$loc3"]=='21.21.21'){$ob3 = "kosmar"; $b_n3 = "������ ������"; $ob32 = "kosmar"; $b_n32 = "������ ������"; $ob33 = "kosmar"; $b_n33 = "������ ������";}
else if($rt["n$loc3"]=='22.22.22'){$ob3 = "prok"; $b_n3 = "��������� ������"; $ob32 = "prok"; $b_n32 = "��������� ������"; $ob33 = "prok"; $b_n33 = "��������� ������";}
else if($rt["n$loc3"]=='23.23.23'){$ob3 = "uzas"; $b_n3 = "���� ������"; $ob32 = "uzas"; $b_n32 = "���� ������"; $ob33 = "uzas"; $b_n33 = "���� ������";}
///////////////////////////////////////////////////////////////////
else if($rt["n$loc3"]=='24.24.24'){$ob3 = "bes"; $b_n3 = "���"; $ob32 = "bes"; $b_n32 = "���"; $ob33 = "bes"; $b_n33 = "���";}
else if($rt["n$loc3"]=='25.25.25'){$ob3 = "zelen"; $b_n3 = "�������&nbsp�����"; $ob32 = "zelen"; $b_n32 = "�������&nbsp�����"; $ob33 = "zelen"; $b_n33 = "�������&nbsp�����";}
else if($rt["n$loc3"]=='26.26.26'){$ob3 = "demon"; $b_n3 = "��������&nbsp�����"; $ob32 = "demon"; $b_n32 = "��������&nbsp�����"; $ob33 = "demon"; $b_n33 = "��������&nbsp�����";}
else if($rt["n$loc3"]=='27.27.27'){$ob3 = "skelet"; $b_n3 = "������"; $ob32 = "skelet"; $b_n32 = "������"; $ob33 = "skelet"; $b_n33 = "������";}
else if($rt["n$loc3"]=='28.28.28'){$ob3 = "straz"; $b_n3 = "�����"; $ob32 = "straz"; $b_n32 = "�����"; $ob33 = "straz"; $b_n33 = "�����";}

if($rt["n$loc2"]=='19'){$ob2 = "trup"; $b_n2 = "��������&nbsp����";}
else if($rt["n$loc2"]=='20'){$ob2 = "izi"; $b_n2 = "���";}
else if($rt["n$loc2"]=='21'){$ob2 = "kosmar"; $b_n2 = "������&nbsp������";}
else if($rt["n$loc2"]=='22'){$ob2 = "prok"; $b_n2 = "���������&nbsp������";}
else if($rt["n$loc2"]=='23'){$ob2 = "uzas"; $b_n2 = "����&nbsp������";}
///////////////////////////////////////////////////////////////////
else if($rt["n$loc2"]=='24'){$ob2 = "bes"; $b_n2 = "���";}
else if($rt["n$loc2"]=='25'){$ob2 = "zelen"; $b_n2 = "�������&nbsp�����";}
else if($rt["n$loc2"]=='26'){$ob2 = "demon"; $b_n2 = "��������&nbsp�����";}
else if($rt["n$loc2"]=='27'){$ob2 = "skelet"; $b_n2 = "������";}
else if($rt["n$loc2"]=='28'){$ob2 = "straz"; $b_n2 = "�����";}

else if($rt["n$loc2"]=='19.19'){$ob2 = "trup"; $b_n2 = "��������&nbsp����"; $ob22 = "trup"; $b_n22 = "��������&nbsp����";}
else if($rt["n$loc2"]=='20.20'){$ob2 = "izi"; $b_n2 = "���"; $ob22 = "izi"; $b_n22 = "���";}
else if($rt["n$loc2"]=='21.21'){$ob2 = "kosmar"; $b_n2 = "������&nbsp������"; $ob22 = "kosmar"; $b_n22 = "������&nbsp������";}
else if($rt["n$loc2"]=='22.22'){$ob2 = "prok"; $b_n2 = "���������&nbsp������"; $ob22 = "prok"; $b_n22 = "���������&nbsp������";}
else if($rt["n$loc2"]=='23.23'){$ob2 = "uzas"; $b_n2 = "����&nbsp������"; $ob22 = "uzas"; $b_n22 = "����&nbsp������";}
///////////////////////////////////////////////////////////////////
else if($rt["n$loc2"]=='24.24'){$ob2 = "bes"; $b_n2 = "���"; $ob22 = "bes"; $b_n22 = "���";}
else if($rt["n$loc2"]=='25.25'){$ob2 = "zelen"; $b_n2 = "�������&nbsp�����"; $ob22 = "zelen"; $b_n22 = "�������&nbsp�����";}
else if($rt["n$loc2"]=='26.26'){$ob2 = "demon"; $b_n2 = "��������&nbsp�����"; $ob22 = "demon"; $b_n22 = "��������&nbsp�����";}
else if($rt["n$loc2"]=='27.27'){$ob2 = "skelet"; $b_n2 = "������"; $ob22 = "skelet"; $b_n22 = "������";}
else if($rt["n$loc2"]=='28.28'){$ob2 = "straz"; $b_n2 = "�����"; $ob22 = "straz"; $b_n22 = "�����";}

else if($rt["n$loc2"]=='19.19.19'){$ob2 = "trup"; $b_n2 = "��������&nbsp����"; $ob22 = "trup"; $b_n22 = "��������&nbsp����"; $ob23 = "trup"; $b_n23 = "��������&nbsp����";}
else if($rt["n$loc2"]=='20.20.20'){$ob2 = "izi"; $b_n2 = "���"; $ob22 = "izi"; $b_n22 = "���"; $ob23 = "izi"; $b_n23 = "���";}
else if($rt["n$loc2"]=='21.21.21'){$ob2 = "kosmar"; $b_n2 = "������&nbsp������"; $ob22 = "kosmar"; $b_n22 = "������&nbsp������"; $ob23 = "kosmar"; $b_n23 = "������&nbsp������";}
else if($rt["n$loc2"]=='22.22.22'){$ob2 = "prok"; $b_n2 = "���������&nbsp������"; $ob22 = "prok"; $b_n22 = "���������&nbsp������"; $ob23 = "prok"; $b_n23 = "���������&nbsp������";}
else if($rt["n$loc2"]=='23.23.23'){$ob2 = "uzas"; $b_n2 = "����&nbsp������"; $ob22 = "uzas"; $b_n22 = "����&nbsp������"; $ob23 = "uzas"; $b_n23 = "����&nbsp������";}
///////////////////////////////////////////////////////////////////
else if($rt["n$loc2"]=='24.24.24'){$ob2 = "bes"; $b_n2 = "���"; $ob22 = "bes"; $b_n22 = "���"; $ob23 = "bes"; $b_n23 = "���";}
else if($rt["n$loc2"]=='25.25.25'){$ob2 = "zelen"; $b_n2 = "�������&nbsp�����"; $ob22 = "zelen"; $b_n22 = "�������&nbsp�����"; $ob23 = "zelen"; $b_n23 = "�������&nbsp�����";}
else if($rt["n$loc2"]=='26.26.26'){$ob2 = "demon"; $b_n2 = "��������&nbsp�����"; $ob22 = "demon"; $b_n22 = "��������&nbsp�����"; $ob23 = "demon"; $b_n23 = "��������&nbsp�����";}
else if($rt["n$loc2"]=='27.27.27'){$ob2 = "skelet"; $b_n2 = "������"; $ob22 = "skelet"; $b_n22 = "������"; $ob23 = "skelet"; $b_n23 = "������";}
else if($rt["n$loc2"]=='28.28.28'){$ob2 = "straz"; $b_n2 = "�����"; $ob22 = "straz"; $b_n22 = "�����"; $ob23 = "straz"; $b_n23 = "�����";}  

if($rt["n$loc2"]=='1' or $rt["n$loc2"]=='2' or $rt["n$loc2"]=='3' or $rt["n$loc2"]=='4' or $rt["n$loc2"]=='5' or $rt["n$loc2"]=='6' or $rt["n$loc2"]=='7' or $rt["n$loc2"]=='8' or $rt["n$loc2"]=='9' or $rt["n$loc2"]=='10' or $rt["n$loc2"]=='11' or $rt["n$loc2"]=='12' or $rt["n$loc2"]=='13' or $rt["n$loc2"]=='14' or $rt["n$loc2"]=='15' or $rt["n$loc2"]=='16' or $rt["n$loc2"]=='17' or $rt["n$loc2"]=='18' or $rt["n$loc2"]=='19' or $rt["n$loc2"]=='20' or $rt["n$loc2"]=='21' or $rt["n$loc2"]=='22' or $rt["n$loc2"]=='23' or $rt["n$loc2"]=='24' or $rt["n$loc2"]=='25' or $rt["n$loc2"]=='26' or $rt["n$loc2"]=='27' or $rt["n$loc2"]=='28' or $rt["n$loc2"]=='29' or $rt["n$loc2"]=='30' or $rt["n$loc2"]=='31'){$k_b2 = 1;}
if($rt["n$loc2"]=='1.1' or $rt["n$loc2"]=='1.2' or $rt["n$loc2"]=='1.3' or $rt["n$loc2"]=='2.2' or $rt["n$loc2"]=='2.3' or $rt["n$loc2"]=='3.3' or $rt["n$loc2"]=='9.9' or $rt["n$loc2"]=='10.10' or $rt["n$loc2"]=='11.11' or $rt["n$loc2"]=='12.12' or $rt["n$loc2"]=='13.13' or $rt["n$loc2"]=='14.14' or $rt["n$loc2"]=='15.15' or $rt["n$loc2"]=='16.16' or $rt["n$loc2"]=='17.17' or $rt["n$loc2"]=='18.18' or $rt["n$loc2"]=='19.19' or $rt["n$loc2"]=='20.20' or $rt["n$loc2"]=='21.21' or $rt["n$loc2"]=='22.22' or $rt["n$loc2"]=='23.23' or $rt["n$loc2"]=='24.24' or $rt["n$loc2"]=='25.25' or $rt["n$loc2"]=='26.26' or $rt["n$loc2"]=='27.27' or $rt["n$loc2"]=='28.28'){$k_b2 = 2;}
if($rt["n$loc2"]=='1.1.1' or $rt["n$loc2"]=='1.1.2' or $rt["n$loc2"]=='1.1.3' or $rt["n$loc2"]=='1.2.2' or $rt["n$loc2"]=='1.3.2' or $rt["n$loc2"]=='1.3.3' or $rt["n$loc2"]=='2.2.2' or $rt["n$loc2"]=='2.2.3' or $rt["n$loc2"]=='2.3.3' or $rt["n$loc2"]=='3.3.3' or $rt["n$loc2"]=='1.2.3' or $rt["n$loc2"]=='9.9.9' or $rt["n$loc2"]=='10.10.10' or $rt["n$loc2"]=='11.11.11' or $rt["n$loc2"]=='12.12.12' or $rt["n$loc2"]=='13.13.13' or $rt["n$loc2"]=='14.14.14' or $rt["n$loc2"]=='15.15.15' or $rt["n$loc2"]=='16.16.16' or $rt["n$loc2"]=='17.17.17' or $rt["n$loc2"]=='18.18.18' or $rt["n$loc2"]=='19.19.19' or $rt["n$loc2"]=='20.20.20' or $rt["n$loc2"]=='21.21.21' or $rt["n$loc2"]=='22.22.22' or $rt["n$loc2"]=='23.23.23' or $rt["n$loc2"]=='24.24.24' or $rt["n$loc2"]=='25.25.25' or $rt["n$loc2"]=='26.26.26' or $rt["n$loc2"]=='27.27.27' or $rt["n$loc2"]=='28.28.28'){$k_b2 = 3;}
?>
