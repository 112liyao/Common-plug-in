$(function(){

	jQuery.extend({
		//滑动到指定高度
		returnTop:function(top,time){
			var time=time||500;
			var top=top||0;
			var newobj={top:$(document).scrollTop()};
			$(newobj).animate({top:top},{
				duration:time,
				step:function(){
					$(document).scrollTop(newobj.top);
				}
			})
		}
	})
	jQuery.fn.extend({
		mousewheel:function(upfun,downfun){
			$(this).each(function(index,dom){
				if(dom.attachEvent){
					dom.attachEvent("onmousewheel",scrollFn);
				}else if(dom.addEventListener){
					dom.addEventListener("mousewheel",scrollFn,false);
					dom.addEventListener("DOMMouseScroll",scrollFn,false);
				}
				function scrollFn(e){
					var e=e||window.event;
					if(e.preventDefault()){
						e.preventDefault();
					}else{
						e.returnValue=false;
					}
					var fx=e.wheelDelta||e.detail;
					if(fx==-3||fx==120){
						if(upfun){
							upfun.call(dom);
						}
					}
					if(fx==3||fx==-120){
						if(downfun){
							downfun.call(dom);
						}
					}
				}
			})
		}
	})


})