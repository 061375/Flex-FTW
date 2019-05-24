const template = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda non error, accusamus voluptate quo itaque doloribus, adipisci mollitia architecto vitae aliquid amet illum, aliquam voluptatem. Quis ipsum minus vero impedit?'
const kos = [
	'text',
	'color',
	'image'
]
const imagepath = 'http://jeremyheminger.com/sites/default/files/photo_library/'
const images = [
	'63.jpg',
	'78.jpg',
	'82.jpg',
	'84.jpg',
	'85.jpg',
	'01.jpg',
	'23.jpg',
	'25.jpg',
	'27.jpg',
	'31.jpg',
	'32.jpg',
	'35.jpg',
	'47.jpg',
	'50.jpg',
	'52.jpg',
	'59.jpg'
]
function runRandom() {
	let cols = document.getElementsByClassName('col')
	for(let i=0;i<cols.length;i++) {
		switch(kos[Math.floor(Math.random() * 3)]) {
			case 'text':
				setText(cols[i])
				break
			case 'color':
				setColor(cols[i])
				break
			case 'image':
				setImage(cols[i])
				break
		}
		for(let j=1;j<6;j++) {
			if(cols[i].hasClass('c'+j))
				cols[i].removeClass('c'+j)
		}
		cols[i].addClass('c'+(Math.floor(Math.random() * 5)+1))
	}
}
function setText($t) {
	$t.innerHTML = ''
	for(let i=0;i<Math.floor(Math.random() * 5)+1;i++) {
		let p = document.createElement('p');
			p.innerHTML = template
		$t.appendChild(p)
	}
}
function setColor($t) {
	$t.style.background = color.random()
}
function setImage($t) {
	$t.innerHTML = ''
	let i = document.createElement('img')
		i.setAttribute('src',imagepath+images[Math.floor(Math.random() * images.length)])
	$t.appendChild(i)
}
HTMLElement.prototype.hasClass = function(c) {
    if (this.classList) {
        return this.classList.contains(c);
    }
    return !!this.className.match(new RegExp('(\\s|^)' + c + '(\\s|$)'));
}
HTMLElement.prototype.addClass = function(c) {
    if (this.classList) {
        this.classList.add(c);
    }else{
        if (!this.hasClass(c)) {
            this.className += c;
        }
    }
}
HTMLElement.prototype.removeClass = function(c) {
    if (this.classList) {
        this.classList.remove(c);
    }else{
        if (this.hasClass(c)) {
            var reg = new RegExp('(\\s|^)' + c + '(\\s|$)');
            this.className=this.className.replace(reg, ' ');
        }
    }
}
const color = {
	  /**
	   * returns a color hex value from an integer
	   * @param {Number}
	   *
	   * @returns {String}
	   * */
	  componentToHex: function(c) {
	    c = parseInt(c);
	    var hex = c.toString(16);
	    return hex.length == 1 ? "0" + hex : hex;
	  },
	  /**
	   * returns a color hex value from an 3 integers
	   * @param {Number}
	   * @param {Number}
	   * @param {Number}
	   *
	   * @returns {String}
	   * */
	  rgbToHex: function(r, g, b) {
	    return "#" + color.componentToHex(r) + color.componentToHex(g) + color.componentToHex(b);
	  },
	  /**
	   * returns a random color
	   * @returns {String}
	   * */
	  random: function() {
	    var c = [];
	      for(var i=0; i<3;i++) {
	        c.push(~~(Math.random() * 255));
	      }
	      return color.rgbToHex(c[0],c[1],c[2]);
	  }
}