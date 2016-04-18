<?php
session_start();

?>

<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

</style>
<!-- Modal -->
<div class="modal bs-example-modal-lg" tabindex="-1" role="dialog" id="testMakeModal">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" id="TestModalDismiss"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Lets Make A Test</h4>
			</div>
			<div class="modal-body">
				<input type="text" class="form-control" placeholder="Test Name" id="testName">
				<div class="form-group">
					<label for="description">Test Description</label>
					<textarea class="form-control" rows="5" id="description" required name="textArea"></textarea>
				</div>
				<button type="button" class="btn btn-primary" id="createTest">Create Test</button>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
window.onload =function(){
	document.getElementById("makeTestBtn").onclick =function(){
		document.getElementById("testMakeModal").style.display ="block";
	};
	
	document.getElementById("TestModalDismiss").onclick=function(){
		document.getElementById("testMakeModal").style.display ="none";
	};
	
	document.getElementById("toolTestMake").onclick=function(){
		document.getElementById("testMakeModal").style.display ="block";
	};
	
	document.getElementById("navTestMake").onclick=function(){
		document.getElementById("testMakeModal").style.display ="block";
	};
	
	document.getElementById("createTest").onclick=function(){
		var data={'testName':document.getElementById("testName").value}
		
		data['dsc']=document.getElementById("description").value;
		
		ajaxCall("createTest.php",data,function(data){
			console.log(data);
			
			if(data.valid){
				window.location.href="http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/Educator/testMaker.php";
			}
		});
	};
	
};
var modal = document.getElementById('testMakeModal');
window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
}

</script>