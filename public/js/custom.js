$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
    $('#search').focus(function(){
    	$('#search-btn').show(500);
    });
    $('#search').focusout(function(){
    	$('#search-btn').hide(500);
    });

});
var count = 1;
$('#add-auth').on('click', function (e) {
	++count;
	// $('#more-authors').append('<div class="form-group row"><div class="col-md-8 col-md-offset-2"><input class="form-control" type="text" name="author[]" placeholder="Firstname Middlename Lastname"></div></div>');
	$('#more-authors').append('<div class="form-group row" id="'+count+'"><div class="col-md-2"><div class="col-md-1 pull-right"><span class="fa fa-minus" onclick="remove('+count+')" title="Remove field"></span></div></div><div class="col-md-2"><input class="form-control" type="text" name="fname[]" placeholder="First name"></div><div class="col-md-2"><input class="form-control" type="text" name="mname[]" placeholder="Middle name"></div><div class="col-md-2"><input class="form-control" type="text" name="sname[]" placeholder="Surname"></div><div class="col-md-2"><select class="form-control" type="text" name="authShip[]"><option>Authorship</option><option>First Author</option><option>Co Author</option><option>Last Author</option></select></div><div class="col-md-2"><select class="form-control" type="text" name="autInst[]"><option value="" selected disabled >Choose center</option><option>NIMR AMANI</option><option>NIMR MWANZA</option><option>NIMR HEADQUATERS</option><option>NIMR TANGA</option><option>NIMR MBEYA</option><option>NIMR MUHIMBILI</option><option>NIMR NGONGONGARE</option><option>NIMR TUKUYU</option></select></div></div>')});
$('#addfield').on('click', function (e) {
	$('#nimrauthor').append('<div class="form-group row"><div class="col-md-4 col-md-offset-2"><input class="form-control" type="text" name="nimrAuth[]" id="nimrAuth"></div><div class="col-md-4"><select class="form-control" type="text" name="role[]"><option value="">Authorship</option><option>First Author</option><option>Co-Author</option></select></div></div>');
});

function remove(id){
	var dv = "#"+id;
	$(dv).remove();
}
function otherArea(obj){
	var index = obj.selectedIndex;
	var len = obj.length;
	if(index == len - 1){
		$('#otherResearchArea').fadeIn(500);
	}
	else{
		$('#otherResearchArea').hide(500);
	}
}
function validateRegEmail(obj){
 if (/^\w+([\.-]?\w+)*@nimr.or.tz/.test(obj))  
  {  
    return (true)  
  }  
    
    return (false) 
}
$("#ajaxSearch").keyup(function(e){
var search_key = $(this).val();
var base_url = $(this).attr("data-link")+"/";

$.ajax({
	url:base_url+search_key,
	success:function(response){
		console.log(response);
	},
	error:function(response){

	}
});
});
