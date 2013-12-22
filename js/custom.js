
//activateTab();

// First, set up the options for the ajax submission
var options = { 
    type: 'post',
    url: '/classes/p_newclass',
    success: function(response) { 
        // Load the results recieved from process.php into the results div
        $('#answerDiv').html(response);       
    } 
}; 

// Then attach the ajax form plugin to this form so that when it's submitted, 
// it will be submitted via ajax    
$('#newClass').ajaxForm(options);

$(".front").click( function() {
	var fname = $( this ).attr("name");
	$(".back[name='"+fname+"']").css("visibility","visible");

});

$("input").attr("maxlength","255");

function activateTab() {

	//reset all tabs to default/inactive
	var allTabs = document.getElementsByTagName("li");
	for (i = allTabs.length - 1; i >= 0; i--) {
		if ((allTabs[i].id == "loginTab") || (allTabs[i].id == "logoutTab")) {
			allTabs[i].setAttribute("class", "pull-right");
		}
		else if (allTabs[i].id) {
			allTabs[i].setAttribute("class", "");
		}
	}	

	//now check what page we're on by finding a unique element on that page
	var currentTab;
	
	if (document.getElementById("loginBtn")) {
		currentTab = document.getElementById("loginTab");
		currentTab.setAttribute("class", "active pull-right");
	}
	else if (document.getElementById("signupBtn")) {
		currentTab = document.getElementById("signupTab");
		currentTab.setAttribute("class", "active");
	}
	else if (document.getElementById("homeHdr")) {
		currentTab = document.getElementById("homeTab");
		currentTab.setAttribute("class", "active");
	}
	else if (document.getElementById("profileHdr")) {
		currentTab = document.getElementById("profileTab");
		currentTab.setAttribute("class", "active");
	}
	else if (document.getElementById("settings")) {
		currentTab = document.getElementById("settingsTab");
		currentTab.setAttribute("class", "active");
	}
	else if (document.getElementById("others")) {
		currentTab = document.getElementById("findOthersTab");
		currentTab.setAttribute("class", "active");
	}
/*
	if ((currentTab.id == "logoutTab") || (currentTab.id = "loginTab")) {
		currentTab.setAttribute("class","active pull-right");
		window.alert("if - setActive - "+ currentTab.id);
	}
	
	else {
		currentTab.setAttribute("class", "active");
		window.alert("else - setActive - " + currentTab.id);
	}
*/
}
