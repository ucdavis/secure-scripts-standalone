NAV_HIDE_DELAY = 500; // wait to hide navigation (ms)

navTimeout = null;
currentNav = "";
currentSubnav = "";
defaultNav = "";

rslt = navigator.appVersion.match(/MSIE (\d+\.\d+)/, '');
isIE55 = (rslt != null && Number(rslt[1]) >= 5.5);

function showNav(navName) {
	if (!document.layers && pageLoaded && (navName != currentNav || navTimeout != null)) {
	
		resetDelayedHide();
		
		if (currentNav != "") {
			hideAllNav();
		}
		
		if (defaultNav != "" && navName != defaultNav) {
	        navSwap(defaultNav, "Behind");
			hideLayer(defaultNav + "Dhtmlnav");
		}

		if (defaultNav != navName) {
	        navSwap(navName, "On");
			if (document.getElementById(navName + "Link")) {
				swapStyle(document.getElementById(navName + "Link"), "mainNavItemOn");
			}
		}

		showLayer("hideDhtml");
		showLayer(navName + "Dhtmlnav");

		if (isIE55) {
			setIframe(navName + "Dhtmlnav");
			showLayer(navName + "DhtmlnavIFrame");
		}

		currentNav = navName;
	}
}

function showSubnav(subnavName) {
	if (!document.layers && pageLoaded && (subnavName != currentSubnav || navTimeout != null)) {

		resetDelayedHide();
		
		if (currentSubnav != "") {
			hideAllSubnav();
		}
		
		showLayer("hideDhtml");
		swapStyle(document.getElementById(subnavName + "DhtmlNavitem"), "dhtmlnavitemOn");
		showLayer(subnavName + "DhtmlSubnav");

		if (isIE55) {
			setIframe(subnavName + "DhtmlSubnav");
			showLayer(subnavName + "DhtmlSubnavIFrame");
		}

		currentSubnav = subnavName;
	}
}


function resetDelayedHide() {
	if (navTimeout != null && !document.layers) {
		clearTimeout(navTimeout);
		navTimeout = null;
	}
}

function delayedNavHide() {
	if (pageLoaded && currentNav != "" && navTimeout == null && !document.layers) {
		hideLayer("hideDhtml");
		navTimeout = setTimeout("hideAllNav()", NAV_HIDE_DELAY);
	}
}

function hideAllNav() {
	if (currentNav != "" && !document.layers) {
	    navSwap(currentNav, "Off");
		if (document.getElementById(currentNav + "Link")) {
			swapStyle(document.getElementById(currentNav + "Link"), itemClasses[currentNav + "Link"]);
		}
		hideLayer(currentNav + "Dhtmlnav");
		if (isIE55) {
			hideLayer(currentNav + "DhtmlnavIFrame");
		}
		currentNav = "";
		
		if (defaultNav != "") {
			navSwap(defaultNav, "In");
			showLayer(defaultNav + "Dhtmlnav");
		}
		
		navTimeout = null;
		hideAllSubnav();
	}
}

function hideAllSubnav() {
	if (currentSubnav != "" && !document.layers) {
		if (document.getElementById(currentSubnav + "DhtmlNavitem")) {
			swapStyle(document.getElementById(currentSubnav + "DhtmlNavitem"), itemClasses[currentSubnav + "DhtmlNavitem"]);
		}
		hideLayer(currentSubnav + "DhtmlSubnav");
		if (isIE55) {
			hideLayer(currentSubnav + "DhtmlSubnavIframe");
		}
		currentSubnav = "";
		navTimeout = null;
	}
}

itemClasses = new Array();
function swapStyle(element, className) {
	if (!document.layers) {
		itemClasses[element.id] = element.className;
		element.className = className;
	}
}

function showLayer(layerId) {
	if (!document.layers && pageLoaded && document.getElementById(layerId)) {
		document.getElementById(layerId).style.visibility = "visible";
		document.getElementById(layerId).style.display = "block";
	}
}

function hideLayer(layerId) {
	if (!document.layers && pageLoaded && document.getElementById(layerId)) {
		document.getElementById(layerId).style.visibility = "hidden";
		document.getElementById(layerId).style.display = "none";
	}
}


// Uses the arguments[] array to get the ID's of each layer to hide.
function hideDropdowns() {
    if (!document.layers) {
        for (var i = 0; i < arguments.length; i++) {
            document.getElementById(arguments[i]).style.visibility = "hidden";
        }
    }
}

function navSwap(prefix, onOff) {
	if (!document.layers && document[prefix + "Image"]) {
		document[prefix + "Image"].src = eval(prefix + "Image" + onOff).src;
	}
}

function setIframe(layerName) {
	if (isIE55 && document.getElementById(layerName + "IFrame")) {
		obj = document.getElementById(layerName);
		ifrm = document.getElementById(layerName + "IFrame");
		
		ifrm.style.top = obj.offsetTop;
		ifrm.style.left = obj.offsetLeft;
		ifrm.style.height = obj.offsetHeight;
		ifrm.style.width = obj.offsetWidth;
	}
}
