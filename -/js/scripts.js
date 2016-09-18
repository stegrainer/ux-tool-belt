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
}

window.onload = belt;