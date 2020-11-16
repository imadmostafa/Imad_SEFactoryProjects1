const { first } = require("lodash");

let root = document.getElementById('root');


let firstdiv=document.createElement('div');
let button1= document.createElement('button');
firstdiv.append(button1);
button1.textContent='buttonss';

root.appendChild(firstdiv);
button1.addEventListener('click',function(){
  //  alert('hahaha');
  getJobAsync('jobPositionHere')
  .then(data => console.log(data));
    
});




async function getJobAsync()
{
  //let response = await fetch('https://cors-anywhere.herokuapp.com/https://jobs.github.com/positions.json');
  let response = await fetch('http://localhost:8000/api/ss');
  console.log(response);
  let data = await response.json();
  
  return data;
}
getJobAsync()
  .then(data => console.log(data));



