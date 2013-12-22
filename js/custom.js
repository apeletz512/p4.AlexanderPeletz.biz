
// New class submission
var cOptions = { 
    type: 'post',
    url: '/classes/p_newclass',
    success: function(response) { 
        // Load the results recieved from process.php into the results div
        $('#answerDiv').html(response);       
    } 
}; 
  
$('#newClass').ajaxForm(cOptions);


// New institution submission
var iOptions = { 
    type: 'post',
    url: '/institutions/p_newinstitution',
    success: function(response) { 
        // Load the results recieved from process.php into the results div
        $('#answerDiv').html(response);       
    } 
}; 

$('#newInstitution').ajaxForm(iOptions);

// New flashcard submission
var classID = $('#classID').attr("name");
var fcOptions = { 
    type: 'post',
    url: '/notes/p_newflashcard/'+classID,
    success: function(response) { 
        // Load the results recieved from process.php into the results div
        $('#answerDiv').html(response);       
    } 
}; 

$('#newFlashcard').ajaxForm(fcOptions);


// Enable flash card functionality
$(".front").click( function() {
	var fname = $( this ).attr("name");
	$(".back[name='"+fname+"']").css("visibility","visible");
});

// Set all inputs max length (easier than finding them all in the HTML)
$("input").attr("maxlength","255");
