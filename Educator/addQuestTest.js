function addQuestTest(questId){
	ajaxCall("addQuestTest.php",{"quest_id":questId},function(ret){
		if(ret.valid){
			document.getElementById("b"+questId.toString()).disabled=true;
			document.getElementById("b"+questId.toString()).innerHTML="Already in Test";
		}
	});
}