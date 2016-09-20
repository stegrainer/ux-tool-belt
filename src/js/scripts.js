function belt() {
	var addHash = function(hash) {
		if(history.pushState) {
			history.pushState(null, null, '#'+hash);
		} else {
			location.hash = '#'+hash;
		}
	}

	var loadImg = function(src,alt,id) {
		var image = document.createElement('img');
		var frame = document.getElementById(id);
		image.setAttribute('alt',alt);
		image.setAttribute('src',src);
		frame.appendChild(image);
		frame.className += 'loaded';
	}

	var hasClass = function(elem,c) {
		return (" " + elem.className + " " ).indexOf( " "+c+" " ) > -1;
	}

	loadImg('-/img/ux-belt.svg','The UX Tool Belt','logo');

	var tabs = document.querySelectorAll(".tabs label");
	for(var i=0; i<tabs.length; i++) {
		tabs[i].onclick = function() {
			var tab = this.getAttribute('for');
			addHash(tab);
		};
	}
	tabs = null;
	
	var here = location.hash.slice(1);
	if((typeof here === 'string') && (here.length > 0)) {
		var radio = document.getElementById(here);
		radio.checked = true;
	} else {
		addHash('think')
	}
	
	var pName = document.getElementById('project');
	pName.onblur = function() {
		if(this.value != this.defaultValue) {
			this.form.submit();
		}
	};
	
	var clrLinks = document.getElementsByClassName('warn');
	for(var i=0; i<clrLinks.length; i++) {
		clrLinks[i].onclick = function() {
			if(hasClass(this,'remove')) {
				var q = 'Are you sure you want to remove this tool?\nClicking OK will remove it.';
			} else {
				var q = 'Are you sure you want to clear this project?\nClicking OK will clear it.';
			}
			return confirm(q);
		};
	}
}

window.onload = belt;