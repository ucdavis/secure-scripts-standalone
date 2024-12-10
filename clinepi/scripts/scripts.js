pageLoaded = 0;				// Prevent access to layers until they're loaded

// Set the pageLoaded variable to denote that the layers are ready to be used 
function doLoadProc() {
	pageLoaded = 1;
}

// swapImg - swaps an image for another that has already been preloaded.
function swapImg(imgName, preloadedImgName) {
	document[imgName].src = eval(preloadedImgName).src;
}

function preload(imgSrc) {
	img = new Image();
	img.src = imgSrc;
	return img;
}

function dropdownGo(selBoxObj) {
	selectedOption = selBoxObj.options[selBoxObj.selectedIndex];
	url = selectedOption.value;
	target = "_top";

	if (selectedOption.getAttribute("target")) {
		target = selectedOption.getAttribute("target");
	}

	if (url.length > 0) {
		if (target != "_top") {
			window.open(url, target);
		} else {
			document.location = url;
		}
	}
}
