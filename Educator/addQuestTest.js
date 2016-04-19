function addQuestTest(questId){
	ajaxCall("addQuestTest.php",{"quest_id":questId},function(ret){
		console.log(ret)
	});
}