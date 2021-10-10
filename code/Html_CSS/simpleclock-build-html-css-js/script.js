const clock = document.getElementById('clock');
const seconds = document.getElementById('seconds');
const minutes = document.getElementById('minutes');
const hours = document.getElementById('hours');
const ticks = document.getElementById('ticks');






function makeTicks(){
	for (let i=0; i<60; i++){
		const tick = document.createElementNS('http://www.w3.org/2000/svg', 'line');
		tick.setAttribute('y1', i%5 ? 33 : 30);
		tick.setAttribute('y2', i%5 ? 36 : 36);
		tick.setAttribute('stroke-width', i%5 ? 1 : 2);
		tick.setAttribute('stroke','black');
		tick.setAttribute('transform', `rotate(${i*360/60})`);
		ticks.appendChild(tick);
	}
}

function animate(){
	requestAnimationFrame(animate);
	const date = new Date();
	const s = date.getMilliseconds()/1000 + date.getSeconds();
	const m = date.getMinutes() + date.getSeconds()/60 + date.getMilliseconds()/1000/60;
	const h = date.getHours() + date.getMinutes()/60 + date.getMilliseconds()/1000/60/60;
	
	seconds.setAttribute('transform', `rotate(${360 * s/60})`);
	minutes.setAttribute('transform', `rotate(${360 * m/60})`);
	hours.setAttribute('transform', 	`rotate(${360 * h/12})`);
}

makeTicks();
animate();