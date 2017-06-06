/*$(function(){
	$(document).on('click','.language',function(){
		var lang = $(this).attr('id');

		$.post('index.php?r=site/language',{'lang':lang},function(data)
		{
			location.reload();
		});
	});
	

	$(document).on('click','.fc-day',function(){
		var date = $(this).attr('data-date');

		$.get('index.php?r=event/create',{'date':date},function(data)
		{
			$('#modal').modal('show')
			.find('#modalContent')
			.html(data);
		});

	});
		
		

	$('#modalButton').click(function(){
		$('#modal').modal('show')
			.find('#modalContent')
			.load($(this).attr('value'));
	});

  

});
*/
/* If you call doneCb([value], true), the next edit will be automatically 
   activated. This works only in the first round. */
function acEditFn(container, data, doneCb) {
  var input = $('<input type="text">')
  input.val(data)
  input.blur(function() { doneCb(input.val()) })
  input.keyup(function(e) { if ((e.keyCode||e.which)===13) input.blur() })
  container.html(input)
  input.focus()
}
 
/* Called whenever bracket is modified
 *
 * data:     changed bracket object in format given to init
 * userData: optional data given when bracket is created.
 */
function saveFn(data, userData) {
  var json = jQuery.toJSON(data)
  console.log('json es: '+json)             
  //$.post("index.php?secretMode="+retParam("secretMode")+"&tid="+ retParam("tid"), {'data':json});                               
  //$.post(("index.php?",{'data':json});                               
  //$.post("index.php?r=lan-brackets%2Fview&"+"",{'data':json});                               
  //$.post("index.php",{'data':json});                      
  $.post("index.php?r=lan-brackets%2Fview"+"&id="+ retParam("id"), {'data':json});                               

} 

function  retParam(name)
{ 
  //var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
  var results = new RegExp('[&]' + name + '=([^&#]*)').exec(window.location.href);
  return results[1] || 0;
}     


function acRenderFn(container, data, score, state) {
    if(state=='empty-bye'){
      container.append('BYE')
      return;
    }
    else if(state=='empty-tbd'){
      container.append('Upcomming')
      return;
    }
    else{
      container.append(data)
      return;
    }
}

function generarBracket(){
  console.log('generando bracket')
  $('#autoComplete').bracket({
    teamWidth: 100,
    scoreWidth: 20,
    matchMargin: 10,
    roundMargin: 50,
    skipConsolationRound: true,
    init: autoCompleteData,
    save: saveFn,
    decorator: {edit: acEditFn,
                render: acRenderFn}
  })
}

$(document).ready(function(){

  generarBracket();
  //$json1={"teams":[["Luis","Rony"],["Jorge","Dan"]],"results":[[[[10,0],[0,1]],[[1,0]]],[[[1,0]],[[null,null]]],[[[null,null]]]]};
  //$.post("index.php?r=lan-brackets%2Fview&id=9",{'data':$json1});
});