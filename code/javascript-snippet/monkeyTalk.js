// Fungsi monkeytalk 
// Solusi dari codewars kata 6

function monkeyTalk(phrase){

	let monkey = phrase.split(' ').map((i)=>{
		return i[0].match(/[aeiou]/i)? 'eek':'ook'
	})

	monkey[0]= monkey[0].charAt(0).toUpperCase() + monkey[0].slice(1)

 	return monkey.join(' ') + "."
	
}
