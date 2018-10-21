function setTimer()
{
	var ids=["d","h","m",'s','ds','hs','ms','ss'];
    var ids2=["d2","h2","m2",'s2','ds2','hs2','ms2','ss2'];
  var ms = cnt_diff('27 December 2015 13:27' , 2, 0);
  if (ms>1)
    {
        var sec=(parseInt(ms/1000));
        var days=(parseInt(sec/(24*60*60)));
        var secInLastDay=sec-days*24*3600;
        var hours=(parseInt(secInLastDay/3600));
        var secInLastHour=secInLastDay-hours*3600;
        var minutes=(parseInt(secInLastHour/60));
        var lastSec=secInLastHour-minutes*60;
		document.getElementById(ids[0]).innerHTML = "0<span></span>" + days;
        document.getElementById(ids2[0]).innerHTML = "0<span></span>" + days;


        document.getElementById(ids[1]).innerHTML = ((hours<10)?(hours="0<span></span>"+hours): Math.floor(hours/10)+"<span></span>"+ (hours%10));
        document.getElementById(ids2[1]).innerHTML = ((hours<10)?(hours="0<span></span>"+hours): Math.floor(hours/10)+"<span></span>"+ (hours%10));

		document.getElementById(ids[2]).innerHTML = ((minutes<10)?(minutes="0<span></span>"+minutes): Math.floor(minutes/10)+"<span></span>"+ (minutes%10));
        document.getElementById(ids2[2]).innerHTML = ((minutes<10)?(minutes="0<span></span>"+minutes): Math.floor(minutes/10)+"<span></span>"+ (minutes%10));

        document.getElementById(ids[3]).innerHTML = ((lastSec<10)?(lastSec="0<span></span>"+lastSec): Math.floor(lastSec/10)+"<span></span>"+ (lastSec%10));
        document.getElementById(ids2[3]).innerHTML = ((lastSec<10)?(lastSec="0<span></span>"+lastSec): Math.floor(lastSec/10)+"<span></span>"+ (lastSec%10));


		var daysStr = "дня";
		if(days==0 || days >= 5) daysStr = "дней"; else if(days==1)daysStr="день";
		var hourStr = "часов";
		if((hours>=2 && hours<=4) || hours>=22) hourStr="часа"; else if(hours==1 || hours==21) hourStr='час';
		var minStr="минут";
		if(minutes%10==1 && Math.floor(minutes/10)!=1) minStr="минута"; else if ((minutes%10>=2 && minutes%10<=4) && Math.floor(minutes/10)!=1) minStr="минуты";
		var secStr ="секунд";
		if(lastSec%10==1 && Math.floor(lastSec/10)!=1) secStr="секунда"; else if ((lastSec%10>=2 && lastSec%10<=4) && Math.floor(lastSec/10)!=1) secStr="секунды";
        document.getElementById(ids[4]).innerHTML = daysStr;
        document.getElementById(ids2[4]).innerHTML = daysStr;
		document.getElementById(ids[5]).innerHTML = hourStr;
        document.getElementById(ids2[5]).innerHTML = hourStr;
		document.getElementById(ids[6]).innerHTML = minStr;
        document.getElementById(ids2[6]).innerHTML = minStr;
		document.getElementById(ids[7]).innerHTML = secStr;
        document.getElementById(ids2[7]).innerHTML = secStr;

        setTimeout("setTimer()",1000);
    
  }
}
function cnt_diff(dfrom, days, hours ){
var differ = new Date() - new Date(dfrom);
var period = (days*24+hours)*3600*1000;
return period - differ % period;
}
window.onload=setTimer;
// JavaScript Document