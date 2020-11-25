var _e
;(function(){ // Global closure START
if(_e){ return }

// Helpers
// Create 'input' reliably with correct call or broken IE<8 call.
// Pre-8 IE:
// 1) Doesn't allow to set name on dynamicaly created element.
// 2) Doesn't allow to set type after element is appended to tree.
function input(type, name){
	var ielem
	try{ 	// Old IE way
		var namea=''; if(name || name==0){ namea=' name="'+name+'"' }
		var typea=''; if(type){ typea=' type="'+type+'"' }
		ielem=document.createElement('<input'+namea+typea+'/>')
	 }
	catch(err){ ielem=document.createElement('input') }	// Correct way
	ielem.name=name; ielem.type=type			// Correct way + double it just in case IE way works for some weird reason
	return _e(ielem)
}

function input_return(where, type, name, value, prop, return_new){
	var ielem=input(type, name)
	if(prop && (value || value==0)){ ielem.sp(prop, value) }
 	if(where){ where.AppendChild(ielem) }	// IE doesn't allows to change input type after append.
	if(return_new){
		if(typeof(return_new)=='object'){ ielem.sp(return_new) } else { return ielem }
	}
	return where
}

// Copies properties from arguments to target object. Arguments can be any of
// complete objects - every property will be copied from it or pair
// of key+value strings. You can also mix them.
function set_properties(target, args, method){
	var len=args.length
	for(var idx=0; idx<len; idx++){
		var arg=args[idx]
		if(typeof arg=='object'){
			for(var prop in arg){
				var value=arg[prop]
				if(method){ target[method](prop, value) } else { target[prop]=value }
				if(value && value.addRewritable){ value.addRewritable(target, method, prop, value.addRewritableKey) }
			}
		} else {
			var value=args[idx+1]
			if(method){ target[method](arg, value) } else { target[arg]=value }
			idx++
			if(value && value.addRewritable){ value.addRewritable(target, method, arg, value.addRewritableKey) }
		}
	}
}

var _e_prototype={
	'__is_e':function(){ return true },
	'AppendText':function(text, args){
		if(text===''){ return this }
		if(typeof(args)!='object'){
			var tnode=document.createTextNode(text)
			if(text && text.addRewritable){ text.addRewritable(tnode, '', 'data', text.addRewritableKey) }
			this.appendChild(tnode)
			return this
		}
		if(args.br){
			var parts=text.split('\n')
			for(var idx=0; idx<parts.length-1; idx++){
				this.appendChild(document.createTextNode(parts[idx]))
				this.appendChild(document.createElement('br'))
			}
			// *** FIX ***: this must be adjusted to work with rewriter!
			this.appendChild(document.createTextNode(parts[parts.length-1]))
		} else {
			this.appendChild(document.createTextNode(text))
		}
		return this
	},
	'AppendChild':function(child){ this.appendChild(child); return this },
	'SetProperties':function(){ set_properties(this, arguments); return this },
	'SetStyle':function(){ set_properties(this.style, arguments); return this },
	'SetAttributes':function(){ set_properties(this, arguments, 'setAttribute'); return this },
	'SetClass':function(className){ this.SetProperties('className', className); return this; },
	'AppendElement':function(element_name, attrs){ this.AppendChild(_e(element_name, attrs)); return this },
	'Title':function(title){ var prop=['title', title]; set_properties(this, prop, 'setAttribute'); set_properties(this, prop); return this },
	// Returns newly created element instead of "this".
	'AppendElementNext':function(element_name, attrs){ var ne=_e(element_name, attrs); this.AppendChild(ne); return ne },
	'AddEvent':function(event, func){ if (this.addEventListener){ this.addEventListener(event, func, false) } else if (this.attachEvent){ this.attachEvent('on'+event, func) } return this },
	// Pre-cooked elements
	'checkbox':function(name, value, checked, return_new){ var ch=input_return(this, 'checkbox', name, checked, 'defaultChecked', 1); ch.value=value; if(return_new){ return ch } else { return this } },
	'submit':function(name, value, return_new){ return input_return(this, 'submit', name, value, 'value', return_new) },
	'button':function(value, return_new){ return input_return(this, 'button', null, value, 'value', return_new) },
	'hidden':function(name, value, return_new){ return input_return(this, 'hidden', name, value, 'value', return_new) },
	'input':function(name, value, return_new){ return input_return(this, 'text', name, value, 'value', return_new) },
	// Table-cell. *** Not chained - returns new element! ***
	'td':function(){ return _e(this.insertCell(-1)) },
	// Table-row. *** Not chained - returns new element! ***
	'tr':function(){ return _e(this.insertRow(-1)) }
}

// Aliases
var aliases={
	'AppendText':['at'],
	'AppendChild':['ac'],
	'SetProperties':['sp'],
	'SetStyle':['st', 'ss'],
	'SetAttributes':['sa'],
	'SetClass':['sc'],
	'AppendElement':['e'],
	'AppendElementNext':['ex'],
	'AddEvent':['ev'],
	'Title':['tt']
}

for(var orig in aliases){ var idx=aliases[orig].length; while(idx--){ _e_prototype[aliases[orig][idx]]=_e_prototype[orig] } }

_e=function(element_name, attrs){
	var element=typeof(element_name)=='string'?document.createElement(element_name):element_name
	if(!element.__is_e){ for(func in _e_prototype){ element[func]=_e_prototype[func] } }
	if(attrs){
		if(typeof(attrs)=='object'){ element.SetAttributes(attrs) }
		else { element.SetProperties('className', attrs) }
	}
	return element
}

// Global _e object level methods

_e.add=function(name, func){ _e_prototype[name]=func }

_e.post=function(){
	var form=document.createElement('form')
	form.method='POST'
	form.style.display='none'
	var len=arguments.length
	for(var idx=0; idx<len; idx++){
		var arg=arguments[idx]
		if(typeof arg=='object'){
			for(prop in arg){
				var input=document.createElement('input')
				input.name=prop
				input.value=arg[prop]
				form.appendChild(input)
			}
		} else {
			var input=document.createElement('input')
			input.name=arg
			input.value=arguments[idx+1]
			form.appendChild(input)
			idx++
		}
	}
	document.body.appendChild(form)
	form.submit()
}

var head=document.getElementsByTagName('head')[0]
var haveCSS={}
_e.css=function(src, encoding){
	if(haveCSS[src]){ return }
	var css=_e('link')
	css.sa('rel', 'stylesheet', 'type', 'text/css', 'href', src)
	if(encoding){ css.sa('charset', encoding) }
	head.appendChild(css)
	haveCSS[src]=true
}

})() // Global closure END