function addQuestTest(questId){
	ajaxCall("addQuestTest.php",{"quest_id":questId},function(ret){
		if(ret.valid){
			window.location.reload();
		}
	});
}