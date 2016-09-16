function Hijax() {

 var container,url,canvas,data,loading,callback,request;

 this.setContainer = function(value) {
  container = value;
 };
 this.setUrl = function(value) {
  url = '-/inc/'+value;
 };
 this.setCanvas = function(value) {
  canvas = value;
 };
 this.setLoading = function(value) {
  loading = value;
 };
 this.setCallback = function(value) {
  callback = value;
 };

 this.captureData = function() {
  if (container.nodeName.toLowerCase() == "form") {
   container.onsubmit = function() {
    var query = "";
    for (var i=0; i<this.elements.length; i++) {
     query+= this.elements[i].name;
     query+= "=";
     query+= escape(this.elements[i].value);
     query+= "&";
    }
    data = query;
    return !start();
   };
  } else {
   var links = container.getElementsByTagName("a");
   for (var i=0; i<links.length; i++) {
    links[i].onclick = function() {
     var query = this.getAttribute("href").split("?")[1];
     url+= "?"+query;
     return !start();
    };
   }
   links = null;
  }
 };

 var start = function() {
  request = getHTTPObject();
  if (!request || !url) {
   return false;
  } else {
   initiateRequest();
   return true;
  }
 };

 var getHTTPObject = function() {
  var xmlhttp = false;
  if (window.XMLHttpRequest) {
   xmlhttp = new XMLHttpRequest();
  } else if(window.ActiveXObject) {
   try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
   } catch (e) {
    try {
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (e) {
     xmlhttp = false;
    }
   }
  }
  return xmlhttp;
 };

 var initiateRequest = function() {
  if (loading) {
   loading();
  }
  request.onreadystatechange = completeRequest;
  if (data) {
   request.open("POST", url, true);
   request.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
   request.send(data);
  } else {
   request.open("GET", url, true);
   request.send(null);
  }
 };

 var completeRequest = function() {
  if (request.readyState == 4) {
   if (request.status == 200 || request.status == 304) {
    if (canvas) {
     canvas.innerHTML = request.responseText;
    }
    if (callback) {
     callback();
    }
   }
  }
 };

}

function toolbelt() {
	var prepCard = function(element) {
		var xhr = new Hijax();
		xhr.setContainer(element);
		xhr.setUrl('card.php');
		xhr.setCanvas(document.getElementById("card"));
		xhr.setLoading(function() {});
		xhr.setCallback(function() {});
		xhr.captureData();
	};
	
	var tools = document.querySelectorAll(".tools");
	for(var i=0; i<tools.length; i++) {
		prepCard(tools[i]);
	}
	tools = null;
}

window.onload = toolbelt;