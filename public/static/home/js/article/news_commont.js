$(document).ready(function(){
    var len=3;//控制要显示的数量
    var arr=$("#dk li:not(:hidden)");
     if(arr.length>len)
    $('#dk li:gt('+(len-1)+')').hide();
   var arr1=$("#todaydk li:not(:hidden)");
   if(arr1.length>len)
	    $('#todaydk li:gt('+(len-1)+')').hide();
});

 //从一个给定的数组arr中,随机返回num个不重复项    
function getArrayItems(arr, num) {
	//新建一个数组,将传入的数组复制过来,用于运算,而不要直接操作传入的数组;
	var temp_array = new Array();
	for (var index in arr) {
	temp_array.push(arr[index]);
	}
	//取出的数值项,保存在此数组
	var return_array = new Array();
	for (var i = 0; i<num; i++){
		//判断如果数组还有可以取出的元素,以防下标越界
		if(temp_array.length>0){
				//在数组中产生一个随机索引
				var arrIndex = Math.floor(Math.random()*temp_array.length);
				//将此随机索引的对应的数组元素值复制出来
				return_array[i] = temp_array[arrIndex];
				//然后删掉此索引的数组元素,这时候temp_array变为新的数组
				temp_array.splice(arrIndex, 1);
		}else{
				//数组中数据项取完后,退出循环,比如数组本来只有10项,但要求取出20项.
				break;
		}
	}
	return return_array;
}
$("#newsdk").click(function(){
    var arr = new Array(); 
  $('#dk > li').each(function(i){
	   arr[i] = this.id;
  });
  	arr=getArrayItems(arr,3);
 	console.log(arr);//把取出的值打印在控制台上
 	$("#dk li").hide();
 	console.log(arr[0]);
 	console.log(arr[1]);
 	console.log(arr[2]);
   $("#dk li").eq(arr[0]).show();
   $("#dk li").eq(arr[1]).show();
   $("#dk li").eq(arr[2]).show();
	

   
});	

$("#todaynewsdk").click(function(){
    var arr = new Array(); 
  $('#todaydk > li').each(function(i){
	   arr[i] = this.id;
  });
  	arr=getArrayItems(arr,3);
 	console.log(arr);//把取出的值打印在控制台上
 	$("#todaydk li").hide();
 	console.log(arr[0]);
 	console.log(arr[1]);
 	console.log(arr[2]);
   $("#todaydk li").eq(arr[0]).show();
   $("#todaydk li").eq(arr[1]).show();
   $("#todaydk li").eq(arr[2]).show();
	

   
});	