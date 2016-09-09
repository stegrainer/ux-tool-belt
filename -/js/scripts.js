window.addEventListener('hashchange', function() {
	setAcTab();
});

function setAcTab() {
	var viewID = location.hash.slice(1);
    
	var actT = document.querySelectorAll("nav a[href='#"+viewID+"']");
	var allT = document.querySelectorAll("nav a");
	[].forEach.call(allT, function(el) {
		el.classList.remove("active");
		if(el.getAttribute('href') == '#'+viewID) {
			el.classList.add("active");
		}
	});
}