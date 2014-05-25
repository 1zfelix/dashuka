</div>


<footer class="footers">
	<p class="text-center text-muted">©<?=date('Y')?> FELIX</p>
	<p class="text-center text-muted">联系我&nbsp;:&nbsp;<a href="mailto:fz0420@hotmail.com" class="text-muted">fz0420@hotmail.com</a></p>
</footer>

<script src="<?=base_url('js/jquery.min.js')?>"></script>
<script src="<?=base_url('js/bootstrap.min.js')?>"></script>
<script src="<?=base_url('js/headroom.min.js')?>"></script>
<script src="<?=base_url('js/jQuery.headroom.min.js')?>"></script>

<script type="text/javascript">
var shlfcnt=0;
var shlfnum=0;
$(document).ready(function(){
  	$("#addtoshelf").click(function(){
  		if (shlfnum==0) {
  			$("#panel_empty")[0].setAttribute("style","display:none;");
  		};
  		shlfcnt++;
  		shlfnum++;
  		var newdiv=document.createElement('div');
  		var text_name=$("#name").val();
  		var text_type=$("#type  option:selected").text();
  		var str='<div class="panel panel-default"><div class="panel-heading">['+text_type+']&nbsp;《'+text_name+'》</div><div class="panel-body">'+$("#authors").val()+'著&nbsp;'+$("#press").val()+'</div><div class="panel-footer"><div class="row"><a href="#" class="col-lg-1 col-lg-offset-9 glyphicon glyphicon-edit"></a><a href="#" class="col-lg-1 glyphicon glyphicon-trash" id="del'+shlfcnt+'" onclick="removeshelf('+shlfcnt+')"></a></div></div></div></div>';
        newdiv.innerHTML=str;
        newdiv.setAttribute("Id","panel_test"+shlfcnt);
        newdiv.setAttribute("style","display:none;");
  		$("#bookshelf").prepend(newdiv);
  		$("#panel_test"+shlfcnt).fadeIn();
  	});
});
</script>

<script type="text/javascript">
function removeshelf(i){
	shlfnum--;
	$("#panel_test"+i).fadeOut();
	if (shlfnum==0 && $("#panel_test"+i)[0].style.display=="none") $("#panel_empty")[0].setAttribute("style","display:block;");
	//$("#panel_empty").fadeIn();
	
}
</script>

<script type="text/javascript">
$(document).ready(function(){
  $(".contactclass").click(function(){
		$("#contactbtn").text($(this).text());
	});
});
</script>

</body>
</html>