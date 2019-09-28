if('serviceWorker' in navigator){
	console.log('logrado pa');
	
	navigator.serviceWorker.register('./sw.js')
							.then(res => console.log('servicio cargado pa', res))
							.catch(err => console.log('error pa', err));

}else{
	console.log('no');
}