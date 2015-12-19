
var jigsaw = {

	snapCenters : [[83,82],[80,222],[82,376],[80,524],[227,77],[228,223],[227,376],[227,519],[378,79],[379,224],[378,376],[379,524],[535,77],[536,224],[536,376],[536,518],[702,80],[705,224],[703,377],[705,523]],
	snapPoints : [[0,0],[0,139],[0,282],[0,448],[148,0],[140,133],[149,291],[140,438],[285,0],[294,142],[285,285],[293,448],[450,0],[441,133],[451,293],[442,437],[604,0],[610,142],[605,285],[610,447]],

	getDistance: function(p1,p2) {
		return Math.sqrt(Math.pow(p1[0]-p2[0],2) + Math.pow(p1[1]-p2[1],2));
	},
	dragging : {

		isDragging: false,
		mx: 0,
		my: 0,
		target: "",

		enableDragging: function(obj) {
			obj.onmousedown = jigsaw.dragging.mouseDown;
			obj.onmouseup = jigsaw.dragging.mouseUp;
			obj.oncontextmenu = function() {return false;};
		},

		mouseUp: function(e) {
			if(e.which==3) //3 mouse button action - right click
				return;
			jigsaw.dragging.isDragging = false;

			var cx = !parseInt(jigsaw.dragging.target.style.left)?0:parseInt(jigsaw.dragging.target.style.left) + parseInt(jigsaw.dragging.target.style.width)/2;
			var cy  = !parseInt(jigsaw.dragging.target.style.top)?0:parseInt(jigsaw.dragging.target.style.top) + parseInt(jigsaw.dragging.target.style.height)/2;

			e.target.style.zIndex = "initial";

			if(cx >30 && cx < 830 && cy>30 && cy<630) {
				var c = [cx,cy];
				var min=0,mini=0;
				for(var i=0;i<jigsaw.snapCenters.length;i++)
				{
					var d = jigsaw.getDistance(jigsaw.snapCenters[i],c);
					if(i==0)
						min=d;
					else if(d<min)
					{
						min = d;
						mini = i;
					}
				}
				jigsaw.dragging.target.pos = mini;
				jigsaw.dragging.target.style.left = jigsaw.snapPoints[mini][0] + "px";
				jigsaw.dragging.target.style.top = jigsaw.snapPoints[mini][1] + "px";
			}
			else
				jigsaw.dragging.target.pos=-1;

		},

		mouseDown: function(e) {
			if(e.which==1) {  //1 mouse button action - left click
				jigsaw.dragging.isDragging = true;
				jigsaw.dragging.mx = e.pageX;
				jigsaw.dragging.my = e.pageY;
				jigsaw.dragging.target=e.target;
				e.target.style.zIndex = "10";
			}
			else
			{
				e.preventDefault();
				switch(e.target.style.transform)
				{
					case "rotate(90deg)":
						e.target.style.transform = "rotate(180deg)";
						e.target.setAttribute("rot","180");
						break;
					case "rotate(180deg)":
						e.target.style.transform = "rotate(270deg)";
						e.target.setAttribute("rot","270");
						break;
					case "rotate(270deg)":
						e.target.style.transform = "rotate(360deg)";
						e.target.setAttribute("rot","360");
						break;
					default:
						e.target.style.transform = "rotate(90deg)";
						e.target.setAttribute("rot","90");
				}
			}
		},

		mouseMove: function(e) {

			if(jigsaw.dragging.isDragging) {
				var X = e.pageX - jigsaw.dragging.mx;
				var Y = e.pageY - jigsaw.dragging.my;
				jigsaw.dragging.mx = e.pageX;
				jigsaw.dragging.my = e.pageY;
				var left = !parseInt(jigsaw.dragging.target.style.left)?0:parseInt(jigsaw.dragging.target.style.left);
				var top  = !parseInt(jigsaw.dragging.target.style.top)?0:parseInt(jigsaw.dragging.target.style.top);
				jigsaw.dragging.target.style.left = (X + left) + "px";
				jigsaw.dragging.target.style.top = (Y + top) + "px";
			}
		},


	},

	init: function() {

		window.onmouseup = function() {jigsaw.dragging.isDragging=false};
		window.onmousemove = jigsaw.dragging.mouseMove;

		window.onkeydown = function(e) {
			if(jigsaw.dragging.target=="")
				return;
			var X=0,Y=0;

			switch(e.keyCode) {
				case 37:
					X=-1;
					break;
				case 38:
					Y=-1;
					break;
				case 39:
					X=1;
					break;
				case 40:
					Y=1;
					break;
			}

			var left = !parseInt(jigsaw.dragging.target.style.left)?0:parseInt(jigsaw.dragging.target.style.left);
			var top  = !parseInt(jigsaw.dragging.target.style.top)?0:parseInt(jigsaw.dragging.target.style.top);
			jigsaw.dragging.target.style.left = (X + left) + "px";
			jigsaw.dragging.target.style.top = (Y + top) + "px";
		};

		
		var pieces = document.getElementsByClassName("piece");
		for(var i=0;i<pieces.length;i++) {
			jigsaw.dragging.enableDragging(pieces[i]);
			pieces[i].pos=-1;

			pieces[i].pos=i;
			pieces[i].style.left = jigsaw.snapPoints[i][0] + "px";
			pieces[i].style.top = jigsaw.snapPoints[i][1] + "px";
		}

	}
};