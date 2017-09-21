function randomnum(smin, smax) {// 获取2个值之间的随机数
	var Range = smax - smin;
	var Rand = Math.random();
	return (smin + Math.round(Rand * Range));
}

function runzp() {
    var data = '[{"id":1,"prize":"100金币","v":1.0},{"id":2,"prize":"20金币","v":2.0},{"id":3,"prize":"2金币","v":48.0}]';
	var obj = eval('(' + data + ')');
	var result = randomnum(1, 100);
	var line = 0;
	var temp = 0;
	var returnobj = "0";
	var index = 0;

	//alert("随机数"+result);
	for ( var i = 0; i < obj.length; i++) {
		var obj2 = obj[i];
		var c = parseFloat(obj2.v);
		temp = temp + c;
		line = 100 - temp;
		if (c != 0) {
			if (result > line && result <= (line + c)) {
				index = i;
				// alert(i+"中奖"+line+"<result"+"<="+(line + c));
				returnobj = obj2;
				break;
			}
		}
	}
	var angle = 330;
	var message = "";
	var myreturn = new Object;
	if (returnobj != "0") {// 有奖是1
		message = "1";
		var angle0 = [ 344, 373 ];
		var angle1 = [ 226, 256 ];
		var angle2 = [ 109, 136 ];
		switch (index) {
		case 0:// 一等奖
			var r0 = randomnum(angle0[0], angle0[1]);
			angle = r0;
			break;
		case 1:// 二等奖
			var r1 = randomnum(angle1[0], angle1[1]);
			angle = r1;
			break;
		case 2:// 三等奖
			var r2 = randomnum(angle2[0], angle2[1]);
			angle = r2;
			break;
		}
		myreturn.prize = returnobj.prize;
	} else {// 没有奖是0
		message = "0";
		var angle3 = [ 17, 103 ];
		var angle4 = [ 197, 220 ];
		var angle5 = [ 259, 340 ];
		var r = randomnum(3, 5);
		var angle;
		switch (r) {
		case 3:
			var r3 = randomnum(angle3[0], angle3[1]);
			angle = r3;
			break;
		case 4:
			var r4 = randomnum(angle4[0], angle4[1]);
			angle = r4;
			break;
		case 5:
			var r5 = randomnum(angle5[0], angle5[1]);
			angle = r5;
			break;
		}
		myreturn.prize = "0";

	}
	myreturn.angle = angle;
	myreturn.message = message;
	return myreturn;
}