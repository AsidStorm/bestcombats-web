var angel_relations={};(function(){function l(){var a={id:341269,t:50,j:true,js:13,rand:Math.random(),r:escape(document.referrer)};if(screen){a.s=[screen.width,screen.height].join("*");a.d=screen.colorDepth?screen.colorDepth:screen.pixelDepth}var b=[];for(var c in a)b.push(c+"="+a[c]);return _e("div").ex("a",{target:"_blank",href:"http://top.mail.ru/jump?from="+a.id})}var e=LocalText.Inherit(location.search.substr(1)||top.document.documentElement.lang||document.documentElement.lang||"ru",{ru:{rel0:"Р‘РµР·СЂР°Р·Р»РёС‡РёРµ",rel1:"РЎРёРјРїР°С‚РёСЏ",rel2:"РЈРІР°Р¶РµРЅРёРµ",rel3:"РЎРѕС‚СЂСѓРґРЅРёС‡РµСЃС‚РІРѕ",rel4:"Р”РѕРІРµСЂРёРµ",rel5:"Р“Р°СЂРјРѕРЅРёСЏ",rel6:"Р”СЂСѓР¶Р±Р°","rel-1":"РќРµРґРѕРІРµСЂРёРµ","rel-2":"РќРµРїСЂРёСЏР·РЅСЊ","rel-3":"Р’СЂР°Р¶РґРµР±РЅРѕСЃС‚СЊ","rel-4":"РћС‚РІСЂР°С‰РµРЅРёРµ","rel-5":"РћРјРµСЂР·РµРЅРёРµ","rel-6":"РќРµРЅР°РІРёСЃС‚СЊ",rel026:"Р‘РµСЃРїСЂРёСЃС‚СЂР°СЃС‚РЅРѕСЃС‚СЊ",mutualN:"Р’Р·Р°РёРјРЅРѕРµ",mutualM:"Р’Р·Р°РёРјРЅС‹Р№",mutualF:"Р’Р·Р°РёРјРЅР°СЏ",angel11:"РњСѓСЃРѕСЂС‰РёРє",angel12:"Р’РѕР»С‹РЅС‰РёРє",angel13:"Р�СЃРєСѓС€РµРЅРёРµ",angel14:"РџР°РґР°Р»СЊС‰РёРє",angel15:"РњРёСЂРѕР·РґР°С‚РµР»СЊ",angel16:"Р‘Р»Р°РіРѕРґР°С‚СЊ",angel17:"РњРёР»РѕСЃРµСЂРґРёРµ",angel18:"Р’РѕР·РЅРµСЃРµРЅРёРµ",angel19:"РџРѕРІРµР»РёС‚РµР»СЊ Р’РѕРґС‹",angel20:"РџРѕРІРµР»РёС‚РµР»СЊ РћРіРЅСЏ",angel21:"РџРѕРІРµР»РёС‚РµР»СЊ Р’РѕР·РґСѓС…Р°",angel22:"РџРѕРІРµР»РёС‚РµР»СЊ Р—РµРјР»Рё",angel23:"РџРѕРІРµР»РёС‚РµР»СЊ Р’РµС‡РЅРѕСЃС‚Рё",angel24:"РџРѕРІРµР»РёС‚РµР»СЊ РњРµС‚Р°Р»Р»Р°",angel25:"РџРѕРІРµР»РёС‚РµР»СЊ РЎРЅРѕРІ",angel26:"РЎРїСЂР°РІРµРґР»РёРІРѕСЃС‚СЊ",angel27:"РџРµСЂРµСЃРјРµС€РЅРёРє",angel28:"Р›РѕСЂРґ Р Р°Р·СЂСѓС€РёС‚РµР»СЊ"},en:{angel11:"Dustman"}});angel_relations.Render=function(a){var b=document.createDocumentFragment(),c=_e("table").sa("align","center"),f=c.tr(),h=a[0],i=a[1].length;f.td();for(idx=0;idx<i;idx++){var d=idx+h;f.td().sc("angel_size angel"+d).tt(e["angel"+d])}for(idx=1;idx<=i;idx++){f=c.tr();d=idx+h-1;var k=e["angel"+d];f.td().sc("angel_size angel"+d).tt(k);for(var g=0;g<i;g++){var m=e["angel"+(g+h)],j="rel"+a[idx][g];f.td().sc(j).tt(k+"в†’"+m+": "+(e[j+d]||e[j]))}}b.appendChild(c);b.appendChild(l());document.body.appendChild(b)}})()