/**
	Copyright (c) 2008 Victor Stanciu; contact [at] victorstanciu [dot] ro; http://www.victorstanciu.ro/

	Permission is hereby granted, free of charge, to any person obtaining a copy
	of this software and associated documentation files (the "Software"), to deal
	in the Software without restriction, including without limitation the rights
	to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
	copies of the Software, and to permit persons to whom the Software is
	furnished to do so, subject to the following conditions:

	The above copyright notice and this permission notice shall be included in
	all copies or substantial portions of the Software.

	THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
	IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
	FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
	AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
	LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
	OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
	THE SOFTWARE.
*/

/** 
 * @description		carousel plugin for prototype.js
 * @author		Victor Stanciu; contact [at] victorstanciu [dot] ro; http://www.victorstanciu.ro/ 
				inspired by Glider.js by Bruno Bornsztein - http://missingmethod.com/projects/glider.html
 * @date		30/03/08
 * @requires		prototype.js 1.6, effects.js 1.8
*/

Carousel = Class.create(Abstract, {

	initialize: function (scroller, slides, controls, options) {

		this.scrolling	= false;
		this.scroller	= scroller;
		this.slides		= slides;
		this.controls	= controls;

		this.options    = Object.extend({ duration: 1.0, frequency: 3, controlClassName: 'carousel-control', jumperClassName: 'carousel-jumper' }, options || {});

		this.slides.each(function(slide, index) {
			slide._index = index; 
			});

		if (this.controls) {
			this.controls.invoke('observe', 'click', this.click.bind(this));
			}

		if (this.options.auto) {
			this.start();
			this.slides.invoke('observe', 'mouseover', this.pause.bind(this));
			this.slides.invoke('observe', 'mouseout', this.resume.bind(this));
			}

		},
	
	click: function (event) {

		this.stop();

		var element = event.findElement('a');

		if (!element.hasClassName('disabled')) {
			this.deactivateControls();
			if (element.hasClassName(this.options.controlClassName)) {
				eval("this." + element.rel + "()");
				} else if (element.hasClassName(this.options.jumperClassName)) {
					this.moveTo(element, element.rel);
					}
			}

		event.stop();

		},

	moveTo: function (trigger, element) {

		if (this.options.beforeMove && (typeof this.options.beforeMove == 'function')) {
			this.options.beforeMove();
			}

		if (this.controls && this.options.selectedClassName) {
			this.controls.each((function (elm) { elm.removeClassName(this.options.selectedClassName); }).bind(this));
			trigger.addClassName(this.options.selectedClassName);
			}

		this.previous= this.current ? this.current : this.slides[0];
		this.current = $(element);

		var scrollerOffset = this.scroller.cumulativeOffset();
		var elementOffset = this.current.cumulativeOffset();
		
		if (this.scrolling) {
			this.scrolling.cancel();
			}
		
		this.scrolling = new Effect.SmoothScroll(this.scroller, {
				duration: this.options.duration, 
				x: (elementOffset[0] - scrollerOffset[0]), 
				y: (elementOffset[1] - scrollerOffset[1]), 
				queue: {position: 'end', limit: 1, scope: this.scroller.id}, 
				afterFinish: (function () { 
					if (this.controls) {
						this.activateControls(); 
						}
					}).bind(this)});

		if (this.options.afterMove && (typeof this.options.afterMove == 'function')) {
			this.options.afterMove();
			}

		return false;

		},

	prev: function () {
		if (this.current) {
			var currentIndex = this.current._index;
			var prevIndex = (currentIndex == 0) ? this.slides.length - 1 : currentIndex - 1;
			} else { 
				var prevIndex = this.slides.length - 1;
				}

		this.moveTo(this.controls ? this.controls[prevIndex] : false, this.slides[prevIndex]);
		},		

	next: function () {
		if (this.current) {
			var currentIndex = this.current._index;
			var nextIndex = (this.slides.length - 1 == currentIndex) ? 0 : currentIndex + 1;      
			} else {
				var nextIndex = 1;
				}
		
		this.moveTo(this.controls ? this.controls[nextIndex] : false, this.slides[nextIndex]);
		},

	first: function () {
		var firstIndex = 0;
		if (this.current) {
			var currentIndex = this.current._index;
			}

		this.moveTo(this.controls[firstIndex], this.slides[firstIndex]);	
		},

	last: function () {
		var lastIndex = (this.slides.length - 1);
		if (this.current) {
			var currentIndex = this.current._index;
			}

		this.moveTo(this.controls[lastIndex], this.slides[lastIndex]);
		},
	
	toggle: function () {
		if (this.previous) {
			this.moveTo(this.controls[this.previous._index], this.slides[this.previous._index]);
			} else {
				return false;
				}
		},

	stop: function () { clearTimeout(this.timer); },
	
	start: function () { this.periodicallyUpdate(); },
		
	pause: function (event) {
		this.stop();
		this.activateControls();
		},

	resume: function (event) {
		if (event) {
			var related = event.relatedTarget || event.toElement;	
			if (!related || (!this.slides.include(related) && !this.slides.any(function (slide) { return related.descendantOf(slide); }))) {
				this.start();
				}
			} else {
				this.start();
				}
		},
	
	periodicallyUpdate: function () {
		if (this.timer != null) {
			clearTimeout(this.timer);
			this.next();
			}
		this.timer = setTimeout(this.periodicallyUpdate.bind(this), this.options.frequency * 1000);
		},

	deactivateControls: function () {
		this.controls.invoke('addClassName', 'disabled');
		},

	activateControls: function () {
		this.controls.invoke('removeClassName', 'disabled');
		}
	
	});

Effect.SmoothScroll = Class.create();

Object.extend(Object.extend(Effect.SmoothScroll.prototype, Effect.Base.prototype), {

	initialize: function (element) {
		this.element = $(element);
		var options = Object.extend({ x: 0, y: 0, mode: 'absolute' } , arguments[1] || {});
		this.start(options);
		},

	setup: function () {
		if (this.options.continuous && !this.element._ext ) {
			this.element.cleanWhitespace();
			this.element._ext = true;
			this.element.appendChild(this.element.firstChild);
			}
   
		this.originalLeft = this.element.scrollLeft;
		this.originalTop = this.element.scrollTop;

		if (this.options.mode == 'absolute') {
			this.options.x -= this.originalLeft;
			this.options.y -= this.originalTop;
			}
		},

	update: function (position) {   
		this.element.scrollLeft = this.options.x * position + this.originalLeft;
		this.element.scrollTop  = this.options.y * position + this.originalTop;
		}

	});