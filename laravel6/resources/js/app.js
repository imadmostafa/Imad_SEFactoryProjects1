/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
*/
require('./components/Example');
var b= false ;
var temp ;
document.getElementById('add_article').addEventListener('click',function(){
//alert ("article added");
//document.getElementById('add_article').textContent='whyyyyy';
b=!b;
window.location.replace('/addArticle');

});





let button_myArticles=document.getElementById('myArticles');
button_myArticles.addEventListener('click',function(){
window.location.replace('/myArticles');
});


let button_home=document.getElementById('home');
button_home.addEventListener('click',function(){
window.location.replace('/home');
});
