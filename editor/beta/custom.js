

var SRC;
var canvas;
var scale= 1;
var fontfamily;
var text1;
var searches = {};
var imgs = [];
var query = "girl";
var cimg = new Image();	
var fonts = ['Roboto', 'Open_Sans', 'Raleway', 'Old Standard TT'];

window.rand = function(min, max) { 
	// range [min, max] integers				
	// Math.random() === [0,1[
	var dx = max - min + 1; // add 1 to make max inclusive
	return min + Math.floor(Math.random()*dx);
}

$(document).ready(function(){
	canvas  = new fabric.Canvas('canvas');
	font_init_selector();
	step1();
});

function font_init_selector() {
	var sel = $('#fontsel');
    $.each(fonts, function(index) { 
        sel.append('<option value="'+index+'">'+fonts[index]+'</option>');
    });
    sel.on('change', function(e) {
    	font_change($(this).val(), text1.fontSize, text1.fontWeight);
    });

    var fillsel = $('.jscolor');
    fillsel.on('change', function(e) {
    	font_change_color($(this).val());
    });
}
function font_change(index, fontSize, fontWeight) {
	fontfamily = fonts[index];
	$('#fontsel').val(index);
	if (text1 != null) {
		text1.fontFamily = fontfamily;
		text1.fontSize = fontSize;
		text1.fontWeight = fontWeight;
		canvas.renderAll();
	}
}
function font_change_color(color) {
	if (text1 != null) {
		text1.setFill('#'+color);
		canvas.renderAll();
	}
}
function fontsize_plus() {
	if (text1 != null) {
		text1.fontSize+=2;
		canvas.renderAll();
	}
}
function fontsize_minus() {
	if (text1 != null) {
		text1.fontSize-=2;
		canvas.renderAll();
	}
}
function randomize_fontStyle() {
	var fontScalar = canvas.getWidth() > canvas.getHeight() ? canvas.getWidth() : canvas.getHeight();
	font_change(
		Math.floor(Math.random() * fonts.length), 
		rand(fontScalar*5/100,fontScalar*5/100),
		rand(0,1)==0?"normal":"bold"
	);
}

var comp_it_max = 3;
var comp_it = 1;
function step1() {
	$('button').attr("disabled", "disabled");
	comp_it = 1;
	canvas.setHeight(0); // !!
	cimg.onload = function() {
		fabric.Image.fromURL(cimg.src, function(oImg) {
			step2(oImg);	
			if (++comp_it <= comp_it_max) {
				cimg.src="../api/getpic-new.php?rand="+Math.random();  
			} else {
				var minWidth = imgs[0].width;
				$.each( imgs, function( key, img ) {
					if (img.width < minWidth) {
						minWidth = img.width;
					}
				});
				console.log(minWidth);
				canvas.setWidth(minWidth); // !!
				
				var parentCanvas = $('#canvas-placeholder');
				var scale_1=1, scale_2=1;
				scale_1 = parentCanvas.width()/minWidth;
				if (parentCanvas.visibleHeight() > 250) {
					scale_2 = parentCanvas.visibleHeight()/canvas.getHeight();
				}
				scale = scale_1 < scale_2 ? scale_1 : scale_2;
				zoomIt(scale);

				add_text_and_decorate();
				$('button').removeAttr("disabled");  
				canvas.renderAll();
			}
		});
	};
	cimg.src="../api/getpic-new.php?rand="+Math.random();
}
$.fn.visibleHeight = function() {
    var elBottom, elTop, scrollBot, scrollTop, visibleBottom, visibleTop;
    scrollTop = $(window).scrollTop();
    scrollBot = scrollTop + $(window).height();
    elTop = this.offset().top;
    elBottom = elTop + this.outerHeight();
    visibleTop = elTop < scrollTop ? scrollTop : elTop;
    visibleBottom = elBottom > scrollBot ? scrollBot : elBottom;
    return visibleBottom - visibleTop
}
function step2(oImg) {
	oImg.set({
      	top: canvas.getHeight() ,
      	left: 0
	});
	console.log(oImg);
	canvas.setHeight(canvas.getHeight() + oImg.height); // !!

	imgs.push(oImg);
	oImg.selectable = false;
	canvas.add(oImg);
	canvas.sendToBack(oImg);

}

function add_text_and_decorate() {
	if (text1 == null) {
		text1 = new fabric.Textbox('loading...');
		canvas.add(text1);
		font_change_color($('.jscolor').val());
	}

	randomize_text();
	randomize_textPos();
	randomize_fontStyle();
}

function randomize_all() {
	canvas.clear();
	text1=null;
	cimg = new Image();	
	step1();
}

var download = function(filename, dataUrl) {
    var element = document.createElement('a')

    var dataBlob = dataURLtoBlob(dataUrl)
    element.setAttribute('href', URL.createObjectURL(dataBlob))
    element.setAttribute('download', filename)

    element.style.display = 'none'
    document.body.appendChild(element)

    element.click()

    var clickHandler;
    element.addEventListener('click', clickHandler=function() {
        // ..and to wait a frame
        requestAnimationFrame(function() {
            URL.revokeObjectURL(element.href);
        })

        element.removeAttribute('href')
        element.removeEventListener('click', clickHandler)
    })

    document.body.removeChild(element)
}
var dataURLtoBlob = function(dataurl) {
    var parts = dataurl.split(','), mime = parts[0].match(/:(.*?);/)[1]
    if(parts[0].indexOf('base64') !== -1) {
        var bstr = atob(parts[1]), n = bstr.length, u8arr = new Uint8Array(n)
        while(n--){
            u8arr[n] = bstr.charCodeAt(n)
        }

        return new Blob([u8arr], {type:mime})
    } else {
        var raw = decodeURIComponent(parts[1])
        return new Blob([raw], {type: mime})
    }
}
function exportimg() {
	//window.open(canvas.toDataURL('png')); // <--- does not work in chrome
	zoomIt(1/scale); //to original
	var win=window.open();
	win.document.write("<img src='"+canvas.toDataURL()+"'/>");
	//download("test.png", document.getElementById("canvas").toDataURL());
	zoomIt(scale); //restore
}
function zoomIt(factor) {
	canvas.setHeight(canvas.getHeight() * factor);
	canvas.setWidth(canvas.getWidth() * factor);
	if (canvas.backgroundImage) {
	    // Need to scale background images as well
	    var bi = canvas.backgroundImage;
	    bi.width = bi.width * factor; bi.height = bi.height * factor;
	}
	var objects = canvas.getObjects();
	for (var i in objects) {
	    var scaleX = objects[i].scaleX;
	    var scaleY = objects[i].scaleY;
	    var left = objects[i].left;
	    var top = objects[i].top;

	    var tempScaleX = scaleX * factor;
	    var tempScaleY = scaleY * factor;
	    var tempLeft = left * factor;
	    var tempTop = top * factor;

	    objects[i].scaleX = tempScaleX;
	    objects[i].scaleY = tempScaleY;
	    objects[i].left = tempLeft;
	    objects[i].top = tempTop;

	    objects[i].setCoords();
	}
	canvas.renderAll();
	canvas.calcOffset();
}

var current_filter_count = 1;
function randomize_filter() {
	var filter;
	switch(current_filter_count++) {
		case 1:
			filter = ( new fabric.Image.filters.Grayscale() );
			break;
		case 2:
			filter = ( new fabric.Image.filters.Sepia() );
			break;
		case 3:
			filter = ( new fabric.Image.filters.Sepia2() );
			break;
		case 4:
			filter = ( new fabric.Image.filters.Brightness({ brightness: (rand(0,1)==0?-1:1)*rand(1,100) }) );
			break;
		case 5:
			filter = ( new fabric.Image.filters.Tint({
								  color: '#'+rand(0,4294967295).toString(16),
								  opacity: rand(1,100)/100
								}) );
			current_filter_count = 1;
			break;

	}
	$.each( imgs, function( key, img ) {
		img.filters.pop();
		img.filters.push(filter);
		img.applyFilters(canvas.renderAll.bind(canvas));		
	});
}



function randomize_textPos() {
	text1.width = rand(canvas.getWidth()*2/3, canvas.getWidth());
	text1.textAlign = (rand(0,1) == 0 ? 'center' : (rand(0,1) == 0 ? 'left' : 'right'));
	text1.setTop(  rand(0, canvas.getHeight() - text1.height < 0 ? 0 : canvas.getHeight() - text1.height)  );
	text1.setLeft( rand(0, canvas.getWidth() - text1.width < 0 ? 0 : canvas.getWidth() - text1.width) );
	text1.setCoords();
	
	canvas.renderAll();
}
function randomize_text() {
	query = $('#query').val();
	if (query == null || query.length == 0) {
		alert("missing query/keyword");
		return;
	}
	if (searches[query] != null) {
		randomize_text_process(searches[query]);
	} else {
		$.ajax({
		    url: "../api/getquote.php?q="+query,
		    dataType: "json",
		    async:false,
	        success: function(data, status, xhr) {
	            searches[query] = data;
	            randomize_text_process(searches[query]);
	        }
		});
	}
}
function randomize_text_process(data) {
    var output = $("<div />").html( data[rand(0,data.length-1)] ).text();
    text1.text = output;
    canvas.renderAll();
}