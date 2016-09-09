window.addEventListener('hashchange', function() {
    var viewID = location.hash.slice(1);
    window.scrollTop = 0;
		var actT = document.querySelectorAll("nav a[href='#"+viewID+"']");
		var allT = document.querySelectorAll("nav a");
		[].forEach.call(allT, function(el) {
			el.classList.remove("active");
		});
		[].forEach.call(actT, function(el) {
			el.classList.add("active");
		});
});

var tabs = document.querySelectorAll("nav a"),
		i = tabs.length;

while(i--) {
	links[i].onclick = function() {
		var hash = this.href;
		if(history.pushState) {
			history.pushState(null, null, hash);
		} else {
			location.hash = hash;
		}
		
		return false;
	}
}