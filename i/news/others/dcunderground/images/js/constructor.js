var toInvPhrase = '� ��������� ';
var reCount = /^\(X([0-9]+)\)/;

var ingridients = [
/*			["����� ��������� �����", "mater1", 60, 60],
			["������", "mater2", 60, 60],
			["�������", "mater3", 60, 60],
			["�������� �������", "mater4", 60, 60],
			["������", "mater5", 60, 60],
			["�������� ������", "mater6", 60, 60],
			["������ ��������� ����", "mater7", 60, 60],
			["����������", "mater8", 60, 60],
			["������ �������� ������", "mater9", 60, 60],
			["���� �������� ������", "mater10", 60, 60],
			["���� ������ �����", "mater11", 60, 60],
			["�����", "mater12", 60, 60],
			["�������� ������ �������", "mater13", 60, 60],
			["������� �����", "mater14", 60, 60],
			["������� �������", "mater15", 60, 60],
			["��������� ������", "mater16", 60, 60],
			["���� �������� ������", "mater17", 60, 60],
			["������������ ������", "mater18", 60, 60],
			["�������� ������", "mater19", 60, 60],
			["�������� ������� �����", "mater20", 60, 60],
			["�������� �������", "mater21", 60, 60],
			["�������� �������", "mater22", 60, 60],
			["�������", "mater23", 60, 60],
			["���������", "mater24", 60, 60],
			["�������� ������ �������", "mater25", 60, 60],
			["�������� ������������", "mater26", 60, 60],
			["������ ���������� ������", "mater27", 60, 60],
			["�������� �����", "mater28", 60, 60],
			["�������� �����", "mater29", 60, 60],
			["����� ���", "mater30", 60, 60],
			["�������� ���������� �����", "mater31", 60, 60],

			["������ �����", "mater261", 60, 60],
			["������� ������", "mater262", 60, 60],
			["������������ �����", "mater267", 60, 60],
			["����� ��������", "mater275", 60, 60],
			["�������� ����", "mater276", 60, 60],
			["�������� ������", "sp_mat3", 40, 25],
			["�������� ��������", "sp_mat5", 40, 25],
			["�������� ��������", "sp_mat7", 40, 25],
			["�������� ��������", "sp_mat9", 40, 25],
			["�������� �����", "sp_mat13", 40, 25],
			["�������� �����", "sp_mat15", 40, 25],
			["�������� �����", "sp_mat15", 40, 25],

 
			["����������� �����", "mater292", 60, 60],
			["��������� ��������", "mater293", 60, 60],
			["����� ������� ��������", "mater294", 60, 60],
			["���������� �����", "mater295", 60, 60],
			["��������� ���������� �������", "mater296", 60, 60],
			["���������� ���������", "mater297", 60, 60],
			["������� ���", "mater298", 60, 60],
			["������ �����", "mater299", 60, 60],
			["����� �����", "mater300", 60, 60],
			["����� ��������� ������", "mater301", 60, 60],
 
   ["������� �������������� ����� 1", "key_cube_1", 60, 60],
   ["������� �������������� ����� 2", "key_cube_2", 60, 60] ,
   ["������������� ����", "key_cube_3", 60, 60],
	["���������� ��������� [0]", "enh_1_0", 40, 25],
 ["���������� ������ [0]", "enh_3_0", 40, 25],
 ["���������� ����� [0]", "enh_4_0", 40, 25],
 ["���������� �������� [0]", "enh_5_0", 40, 25],
 ["���������� ���� [0]", "enh_9_0", 40, 25],
	["���������� ��������� [1]", "enh_1_1", 40, 25],
 ["���������� ������ [1]", "enh_3_1", 40, 25],
 ["���������� ����� [1]", "enh_4_1", 40, 25],
 ["���������� �������� [1]", "enh_5_1", 40, 25],
 ["���������� ���� [1]", "enh_9_1", 40, 25],
	["���������� ��������� [2]", "enh_1_2", 40, 25],
 ["���������� ������ [2]", "enh_3_2", 40, 25],
 ["���������� ����� [2]", "enh_4_2", 40, 25],
 ["���������� �������� [2]", "enh_5_2", 40, 25],
 ["���������� ���� [2]", "enh_9_2", 40, 25],
 ["������� ����� ����� �������", "key_amul_1", 60, 60],
 ["������ ����� ����� �������", "key_amul_2", 60, 60],
 ["����� ����� ����� �������", "key_amul_3", 60, 60],
 ["������ ����� ����", "key_TR_1", 60, 60],
	["������ ����� ����", "key_TR_2", 60, 60],
 ["������ ����� ����", "key_TR_3", 60, 60],
 ["�������� ����� ����", "key_TR_4", 60, 60],
 ["����� ����� ����", "key_TR_5", 60, 60],
 */
			/*["��������", "gg_token", 60, 60],
			["��������� ��������", "gg_small_token", 60, 60],

 ["����� ������ ������ ��������", "gg3_hishn_kolch", 60, 60],
 ["������� �������", "gg3_hishn_dosp", 60, 60],
 ["������� ����", "gg3_hishn_sword", 60, 60],
 ["����� ������ ��������", "gg3_hishn_finger", 60, 60]*/

 

			];



	ingridients.sort();
	
	var recipes = [
/*
		["spell_curse", "������ �����", {"mater12": 1, "mater28": 1, "mater16": 1, "mater17": 1, "mater18": 1, "mater29": 1}, {}],
		["spell_curseb", "������� �����", {"mater4": 1, "mater14": 3, "mater25": 1, "mater27": 1, "mater30": 1, "mater31": 1, "mater24": 1}, {}],

 
  ["key_amul_4", "���� �������", {"key_amul_1": 1, "key_amul_2": 1, "key_amul_3": 1}, {}],

		["sp_tacpts_BLK1", "������� ������: 1", {"mater11": 3}, {}],
		["sp_tacpts_BLK2", "������� ������: 2", {"mater19": 2}, {}],
		["sp_tacpts_BLK3", "������� ������: 3", {"mater29": 2}, {}],
		["sp_tacpts_BLK4", "������� ������: 4", {"mater21": 1}, {}],
		["sp_tacpts_BLK5", "������� ������: 5", {"mater21": 1, "mater23": 1}, {}],
	
		["sp_tacpts_HIT1", "������� ���: 1", {"mater7": 3}, {}],
		["sp_tacpts_HIT2", "������� ���: 2", {"mater18": 2}, {}],
		["sp_tacpts_HIT3", "������� ���: 3", {"mater30": 2}, {}],
		["sp_tacpts_HIT4", "������� ���: 4", {"mater22": 1}, {}],
		["sp_tacpts_HIT5", "������� ���: 5", {"mater22": 1, "mater23": 1}, {}],
	
		["sp_tacpts_KRT1", "������� �����: 1", {"mater9": 3}, {}],
		["sp_tacpts_KRT2", "������� �����: 2", {"mater16": 2}, {}],
		["sp_tacpts_KRT3", "������� �����: 3", {"mater27": 2}, {}],
		["sp_tacpts_KRT4", "������� �����: 4", {"mater31": 1}, {}],
		["sp_tacpts_KRT5", "������� �����: 5", {"mater31": 1, "mater23": 1}, {}],
	
		["sp_tacpts_CNTR1", "������� ������: 1", {"mater10": 3}, {}],
		["sp_tacpts_CNTR2", "������� ������: 2", {"mater17": 2}, {}],
		["sp_tacpts_CNTR3", "������� ������: 3", {"mater28": 2}, {}],
		["sp_tacpts_CNTR4", "������� ������: 4", {"mater20": 1}, {}],
		["sp_tacpts_CNTR5", "������� ������: 5", {"mater20": 1, "mater23": 1}, {}],
	
		["sp_tacpts_PRY1", "������� ���������: 1", {"mater8": 3}, {}],
		["sp_tacpts_PRY2", "������� ���������: 2", {"mater15": 2}, {}],
		["sp_tacpts_PRY3", "������� ���������: 3", {"mater26": 2}, {}],
		["sp_tacpts_PRY4", "������� ���������: 4", {"mater24": 1}, {}],
		["sp_tacpts_PRY5", "������� ���������: 5", {"mater24": 1, "mater23": 1}, {}],

  ["key_cube_3", "������������� ����", {"key_cube_1": 1, "key_cube_2": 1}],
 
  ["key_TR_6", "���������� ����", {"key_TR_1": 1, "key_TR_2": 1, "key_TR_3": 1, "key_TR_4": 1, "key_TR_5": 1}, {}],


  ["dispell1", "����� ���������", {'mater298': 5,'mater294': 1}],


	 ["enh_1_1", "���������� ��������� [1]", {"enh_1_0": 3,"key_cube_3": 1}, {}],
		["enh_3_1", "���������� ������ [1]", {"enh_3_0": 3,"key_cube_3": 1}, {}],
		["enh_4_1", "���������� ����� [1]", {"enh_4_0": 3,"key_cube_3": 1}, {}],
		["enh_5_1", "���������� �������� [1]", {"enh_5_0": 3,"key_cube_3": 1}, {}],
		["enh_9_1", "���������� ���� [1]", {"enh_9_0": 3,"key_cube_3": 1}, {}],
  ["enh_1_2", "���������� ��������� [2]", {"enh_1_1": 3,"key_cube_3": 1}, {}],
		["enh_3_2", "���������� ������ [2]", {"enh_3_1": 3,"key_cube_3": 1}, {}],
		["enh_4_2", "���������� ����� [2]", {"enh_4_1": 3,"key_cube_3": 1}, {}],
		["enh_5_2", "���������� �������� [2]", {"enh_5_1": 3,"key_cube_3": 1}, {}],
		["enh_9_2", "���������� ���� [2]", {"enh_9_1": 3,"key_cube_3": 1}, {}],
  ["enh_1_3", "���������� ��������� [3]", {"enh_1_2": 3,"key_cube_3": 1,"mater24": 1}, {}],
		["enh_3_3", "���������� ������ [3]", {"enh_3_2": 3,"key_cube_3": 1,"mater22": 1}, {}],
		["enh_4_3", "���������� ����� [3]", {"enh_4_2": 3,"key_cube_3": 1,"mater21": 1}, {}],
		["enh_5_3", "���������� �������� [3]", {"enh_5_2": 3,"key_cube_3": 1,"mater20": 1}, {}],
		["enh_9_3", "���������� ���� [3]", {"enh_9_2": 3,"key_cube_3": 1,"mater31": 1}, {}],
*/

 ["gg_token", "��������", {"gg_small_token": 10}],

 ["gg3_suv_grib1", "���������� ����", {"gg3_hishn_kolch": 2}],
 ["gg3_suv_grib2", "���������� ����", {"gg3_hishn_kolch": 2}],
 ["gg3_suv_grib3", "���������� ����", {"gg3_hishn_kolch": 2}],

 ["gg3_suv_insect_f", "��������� � �����", {"gg3_hishn_dosp": 2}],
 ["gg3_suv_insect_m", "��������� � �����", {"gg3_hishn_sword": 2}],

 ["gg3_suv_civiar", "��� � ���������� ����������", {"gg3_hishn_finger": 2}],
 ["gg3_suv_orchid", "��������� ������", {"gg3_hishn_kolch": 2,"gg3_hishn_dosp": 2}],
 ["gg3_suv_horn1", "�����", {"gg3_hishn_sword": 2,"gg3_hishn_finger": 2}],
 ["gg3_suv_horn2", "�����", {"gg3_hishn_sword": 2,"gg3_hishn_finger": 2}]
	];

var addedIngr = new Array();
var addedIngrKeys = new Array();
var selectedIngr = new Array();
var foundRecipes = new Array();
var acceptedRecipes = new Array();
var activeIngr;

function controlNumber(){
	if ( event.keyCode < 48 || event.keyCode > 57 ) event.returnValue = false;
}

function add(obj){
	this[this.length] = obj;
	return this;
}

Array.prototype.add = add;

function trim() {
	return this.replace(/^\s+|\s*([\+\,>\s;:])\s*|\s+$/g,"$1");
}

String.prototype.trim = trim;

function showAllRecipes(ingr){
	if ( ingr != "" )
		activeIngr = ingridients[ingr];
	else
		activeIngr = null;
	var showRecipes = new Array();
	for ( var i = 0; i < recipes.length; i++ ){
		var shouldShow = true;
		if ( activeIngr ){
			shouldShow = false;
			for ( var j in recipes[i][2] ){
				if ( j == activeIngr[1] ){
					shouldShow = true;
					break;
				}
			}
		}
		if ( shouldShow )
			showRecipes.add([i, 0]);
	}
	var str = "������� �������� ("+(activeIngr ? "��� ������������ <b>"+activeIngr[0]+"</b>" : "<b>�����</b>")+"): <b>"+showRecipes.length+"</b>";
	str += drawRecipes(showRecipes, activeIngr ? 3 : 4);
	showDialogWindow1("�������", str, 400);
}

function ingrChoose(id){
	var img = new Image();
	img = document.getElementById("ingrPic");
	if ( id != "" ){
		var ingr = ingridients[id];
		img.src = imP3 +ingr[1]+ ".gif";
		img.width = ingr[2];
		img.height = ingr[3];
	}
	else
		img.src = initvars.imageBlank;
	document.getElementById("ingrId").innerHTML = id ? ingr[1] : "";
}

function addIngr(){



	var ingrQuant = parseInt(document.getElementById("ingrQuant").value);
	if ( !(ingrQuant > 0) ){
		alert("���������� ���������� ������ ���� �������� �� ���� �����!");
		return;
	}
	var selectControl = document.getElementById("ingrName");
	var i = selectControl.selectedIndex;
	var optionValue = selectControl.options[i].value;
	var optionText = selectControl.options[i].text;
	if ( optionValue == "" ){
		alert("���������� �� ������!");
		return;
	}
	var ingr = ingridients[optionValue];
	addIngrInArray(ingr, ingrQuant);
	drawAddedIngr();
}

function addIngrInArray(ingr, ingrQuant){
	var alreadyAdded = false;
	for ( var i = 0; i < addedIngr.length; i++ ){
		if ( addedIngr[i][0] == ingr[1] ){
			var totalIngrQuant = parseInt(addedIngr[i][2])+ingrQuant;
			addedIngr[i][2] = totalIngrQuant;
			addedIngrKeys[ingr[1]] = totalIngrQuant;
			alreadyAdded = true;
		}
		if ( alreadyAdded == true )
			break;
	}
	if ( !alreadyAdded ){
		addedIngr.add([ingr[1], ingr[0], ingrQuant]);
		addedIngrKeys[ingr[1]] = ingrQuant;
	}
}

function drawAddedIngr(){
	var str = ""
	for ( var i = addedIngr.length-1; i >= 0; i-- ){
		str += "<table width=100% id=constr><tbody>";
		str += "<tr><td width=60 valign=top><img src='"+imP3+addedIngr[i][0]+".gif'></td>";
		str += "<td valign=top><b>"+addedIngr[i][1]+"</b><br>����������: <b>"+addedIngr[i][2]+" ��.</b></td>";
		str += "<td width=30><input type=button class=b value='-' onClick=\"javascript:removeIngr("+i+");\"></td></tr>";
		str += "</tbody></table>";
	}
	document.getElementById("constrContent").innerHTML = str;
}

function removeIngr(i){
	var ingr = addedIngr[i];
	addedIngr.splice(i, 1);
	addedIngrKeys[ingr[0]] = null;
	drawAddedIngr();
	findRecipes(true);
	acceptedRecipes = new Array();
	drawAcceptedRecipes();
}

function findRecipes(noAlert){
	if ( !noAlert ){
		acceptedRecipes = new Array();
		drawAcceptedRecipes();
	}
	foundRecipes = new Array();
	for ( var i = 0; i < recipes.length; i++ ){
		var composition = recipes[i][2];
		var hasIngr = true;
		var maxTimes = 0;
		for ( var j in composition ){
			if ( composition[j] <= addedIngrKeys[j] ){
				var max = parseInt(addedIngrKeys[j]/composition[j]);
				if ( (maxTimes > max) || maxTimes == 0 )
					maxTimes = max;
			}
			else {
				hasIngr = false;
				break;
			}
		}
		if ( !hasIngr )
			continue;
		foundRecipes.add([i, maxTimes]);
	}
	if ( foundRecipes.length == 0 && !noAlert )
		alert("�� ������� �� ������ �������!");
	drawAviableRecipes();
}

function drawRecipes(recipesArray, mode){
	var str = "";
	for ( var i = 0; i < recipesArray.length; i++ ){
		var recipe = recipes[recipesArray[i][0]];
		var str1 = "<table width=100% id=constr><tbody>";
		str1 += "<tr><td width=60 valign=top><img src='"+imP3+recipe[0]+".gif'></td>";
		str1 += "<td valign=top><b>"+recipe[1]+"</b><br><b>������:</b> ";
		var str2 = "";
		var k = 1;
		for ( var j in recipe[2] ){
			var str3 = getNameForIngr(j);
			if ( mode == 3 && j == activeIngr[1] )
				str3 = "<u>"+str3+"</u>";
			str2 += str3+" (<b>"+recipe[2][j]+"��.</b>)";
			if ( k != recipe[2].length )
				str2 += ", ";
			k++;
		}
		str1 += str2+"<br>";
		str2 = "";
		var k = 1;
		for ( var j in recipe[3] ){
			if ( k == 1 )
				str2 += "<b>������������� ���������:</b> ";
			str2 += j+" (<b>"+recipe[3][j]+"��.</b>)";
			str2 += ", ";
			k++;
		}
		str1 += str2+"<br>";
		if ( mode == 1 || mode == 2 ){
			if ( mode == 1 )
				str1 += "����. ����������:";
			else if ( mode == 2 )
				str1 += "��������� ����������:";
			str1 += " <b>"+recipesArray[i][1]+"��.</b></td>";
		}
		if ( mode == 1 ){
			str1 += "<td width=60 align=center>�������<br>";
			str1 += "<input type=text class=in id="+mode+"recipe"+i+" style='text-align:right;width:25px;' value=0 onKeyPress=\"javascript:controlNumber();\"> ��.<br>";
			str1 += "<input type=button class=b value=go onClick=\"javascript:addRecipe("+i+", parseInt(document.getElementById('"+mode+"recipe"+i+"').value))\"></td>";
		}
		else if ( mode == 2 ){
			str1 += "<td width=30><input type=button class=b value='-' onClick=\"javascript:removeAcceptedRecipe("+i+");\"></td>";
		}
		else if ( mode == 3 || mode == 4 ){
			str1 += "<td width=80 align=center>�������� ����������� ��� ";
			str1 += "<input type=text class=in id="+mode+"recipe"+i+" style='text-align:right;width:25px;' value=0 onKeyPress=\"javascript:controlNumber();\"> ��.<br>";
			str1 += "<input type=button class=b value=go onClick=\"javascript:addIngridientsForRecipe("+recipesArray[i][0]+", parseInt(document.getElementById('"+mode+"recipe"+i+"').value))\"></td>";
		}
		str1 += "</tr></thead></table>";
		str += str1;
	}
	return str;
}

function addIngridientsForRecipe(recipeId, recipeQuant){
	var recipe = recipes[recipeId];
	if ( !(recipeQuant > 0) ){
		alert("���������� ����������� �������� ���������� ������ ����!");
		return;
	}
	for ( var i in recipe[2] ){
		for ( var j = 0; j < ingridients.length; j++ ){
			var ingr = ingridients[j];
			if ( ingr[1] == i ){
				addIngrInArray(ingr, recipeQuant*recipe[2][i]);
			}	
		}
	}
	drawAddedIngr();
	hideDialogWindow();
}

function showAnalyzeWindow(){
	var str = "������� ���������� ������ ������� (�������� \"<b>������</b>\"):<br>";
	str += "<textarea id='bagContent' style='width:100%; height: 300px;'></textarea><br>";
	str += "<input type=button class=info_button value='���������� � ���������' ";
	str += "onClick=\"javascript:makeAnalyze(document.getElementById('bagContent').value);\">";
	showDialogWindow1("������ ����������� �������", str, 400);
}

function makeAnalyze(content){
	var lines = content.split("\n");
	var foundSmth = false;
	for ( var i = 0; i < lines.length; i++ ){
		var line = lines[i].trim();
		if (line.indexOf(toInvPhrase) == 0)
		{
			line = line.substr(toInvPhrase.length);
		}
		var upperLine = line.toUpperCase();
		for ( var j = 0; j < ingridients.length; j++ ){
			var ingr = ingridients[j];
			var cuc = ingr[0].toUpperCase();
			if ( upperLine.indexOf(cuc) == 0 )
			{
				foundSmth = true;
				var count = 1;
				var trailer = upperLine.substr(cuc.length).trim();
				var m = trailer.match(reCount);
				if (m != null)
				{
					count = parseInt(m[1]);
				}
				addIngrInArray(ingr, count);
				break;
			}
		}
	}
	if ( !foundSmth )
		alert("������ �� �������...");
	else
		drawAddedIngr();
	hideDialogWindow();
}

function drawAviableRecipes(){
	document.getElementById("aviableRecipes").innerHTML = drawRecipes(foundRecipes, 1);
}

function drawAcceptedRecipes(){
	document.getElementById("acceptedRecipes").innerHTML = drawRecipes(acceptedRecipes, 2);
}

function removeAcceptedRecipe(i){
	var q = acceptedRecipes[i][1];
	var recipe = recipes[acceptedRecipes[i][0]];
	for ( var j in recipe[2] ){
		addedIngrKeys[j] += recipe[2][j]*q;
	}
	acceptedRecipes.splice(j, 1);
	drawAcceptedRecipes();
	findRecipes(true);
}

function addRecipe(i, q){
	var q1 = foundRecipes[i][1];
	if ( !(q > 0) ){
		alert("���������� ���������� ����� ������ ���� ������ ����!");
		return;
	}
	else if ( q > q1 ){
		alert("���������� ���������� ����� �� ����� ���� ������ �� ����������� ���������� ����������!");
		return
	}
	var recipe = recipes[foundRecipes[i][0]];
	for ( var j in recipe[2] ){
		addedIngrKeys[j] -= recipe[2][j]*q;
	}
	var alreadyAdded = false;
	for ( var j = 0; j < acceptedRecipes.length; j++ ){
		if ( acceptedRecipes[j][0] == foundRecipes[i][0] ){
			acceptedRecipes[j][1] = parseInt(acceptedRecipes[j][1]) + parseInt(q);
			alreadyAdded = true;
			break;
		}
	}
	if ( !alreadyAdded )
		acceptedRecipes.add([foundRecipes[i][0], q]);
	drawAcceptedRecipes()
	findRecipes(true);
}

function getNameForIngr(ingr){
	for ( var i = 0; i < ingridients.length; i++ ){
		if ( ingridients[i][1] == ingr )
			return ingridients[i][0];
	}
	return "???";
}

function makeSelectBlock(){
	var str = "<table id=constr border=0><thead><tr><td colSpan=4>�������� � �����������</td></tr></thead><tbody>";
	str += "<tr><td align=right width=25%>��������:</td>";
	str += "<td colSpan=2><select id='ingrName' onChange=\"javascript:ingrChoose(this.value);\"><option value=''>-----</option>";
	for ( var i = 0; i < ingridients.length; i++ ){
		str += "<option value="+i+">"+ingridients[i][0]+"</option>";
	}
	str += "</select></td>";
	str += "<td width=25% rowSpan=3><img src='"+initvars.imageBlank+"' height=60 width=60 id='ingrPic'></td></tr>";
	str += "<tr><td align=right>ID:</td><td id='ingrId'></td>";
	str += "<td width=25% align=right>�����������:</td></tr>";
	str += "<tr><td align=right>����������:</td><td colSpan=2><input type=text class=in maxlength=5 style='width:80px;' id=ingrQuant onKeyPress=\"javascript:controlNumber();\"> ��.</td></tr>";
	str += "<tr><td>&nbsp;</td><td><input type=button class=b value=�������� onClick=\"javascript:addIngr();\"></td>";
	//str += "<td colSpan=2 align=center><input type=button class=b value='�������' onClick=\"javascript:showAllRecipes(document.getElementById('ingrName').value);\"></td></tr>";
	str += "<tr><td colSpan=4 align=center><input type=button class=b value='������ ����������� �������' onClick=\"javascript:showAnalyzeWindow();\"></td></tr>";
	str += "<tr><td colSpan=4 align=center><input type=button class=b value='���������� � ������ ��������' onClick=\"javascript:findRecipes();\"></td></tr>"; 
	str += "<tr><td colSpan=4 align=center><input type=button class=b value='�������� �����������' onClick=\"javascript:makeConstructor();\"></td></tr>";
	str += "<tr><td colSpan=4 align=center>&nbsp;</td></tr>";
	str += "<tr><td colSpan=2 align=right>���������� ������������:</td><td colSpan=2><b>"+ingridients.length+"</b></td></tr>";
	str += "<tr><td colSpan=2 align=right>���������� ��������:</td><td colSpan=2><b>"+recipes.length+"</b></td></tr>";
	str += "</tbody></table>";
	return str;
}

function makeConstructorItemsBlock(){
	var str = "<table id=constr><thead><tr><td>��������� � �����������</td></tr></thead><tbody><tr><td>";
	str += "<div id=constrContent style='width:100%;height:200px;overflow:auto;'>";
	str += "</div></td></tr></tbody></table>";
	return str;
}

function makeAviableRecipesBlock(){
	var str = "<table id=constr><thead><tr><td>��������� �������</td></tr></thead><tbody><tr><td>";
	str += "<div id=aviableRecipes style='width:100%;height:200px;overflow:auto;'>";
	str += "</div></td></tr></tbody></table>";
	return str;
}

function makeAcceptedRecipesBlock(){
	var str = "<table id=constr><thead><tr><td>�������� �������</td></tr></thead><tbody><tr><td>";
	str += "<div id=acceptedRecipes style='width:100%;height:200px;overflow:auto;'>";
	str += "</div></td></tr></tbody></table>";
	return str;
}

function makeConstructor(){
	addedIngr = new Array();
	addedIngrKeys = new Array();
	selectedIngr = new Array();
	foundRecipes = new Array();
	acceptedRecipes = new Array();

	var str = "<table width='100%'><tbody><tr><td width='50%' valign=top>";
	str += makeSelectBlock();
	str += "</td><td width='50%' valign=top>";
	str += makeConstructorItemsBlock();
	str += "</td></tr><tr><td valign=top>";
	str += makeAviableRecipesBlock();
	str += "</td><td valign=top>";
	str += makeAcceptedRecipesBlock();
	str += "</tbody></table>";
	document.getElementById("constructor").innerHTML = str;
}
function prepareScriptStatus1(w, h, id, closingFunction){
	if ( !document.getElementById(id) ){
		var str = "<table id='"+id+"' class='info_table' style='width:"+w+"px;'>";
		str += "<tr><td class='info_header' id='"+id+"Header'></td></tr>";
		str += "<tr><td class='info_content'><div id='"+id+"Text' style='height:20px;width:100%;overflow:auto;text-align:center;'></div></td></tr>";
		if ( closingFunction != null ){
			str += "<tr><td align='center'>";
			str += "<input type='button' class='info_button' value='�������' onClick=\"javascript:"+closingFunction+"\"></td></tr>";
		}
		str += "</table>";
		document.getElementById('baseDiv').innerHTML += str;
	}
	getCurrentWindowSize();
	document.getElementById(id).style.left = parseInt((winW-w)/2);
	document.getElementById(id).style.top = parseInt((winH-h)/2);
}

function showDialogWindow1(dialogName, dialogText, dialogHeight){
	prepareScriptStatus1(500, 400, "dialogWindowTable", "hideDialogWindow()");
	document.getElementById("dialogWindowTableHeader").innerHTML = dialogName;
	document.getElementById("dialogWindowTableText").style.height = dialogHeight;
	document.getElementById("dialogWindowTableText").innerHTML = dialogText;

	hideElementsIfNeeded("dialogWindowTable");
	document.getElementById("dialogWindowTable").style.display = "block";
}

