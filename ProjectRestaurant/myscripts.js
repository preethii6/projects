function ab1(){
  let mailid = document.getElementById("mail1").value;
  let name = document.getElementById("name1").value;
  let name2 = document.getElementById("name2").value;
  let con = document.getElementById("conatct1").value;

  let regex = /^([a-z 0-9 \. _]+)@([a-z]+).([a-z]{2,6})(.[a-z]{2,6})?$/; 
  if(mailid=="" || name==""  ||  con==""  || name2=="" ){
    alert("invalid");
  }
  else if(regex.test(mailid)){
    return true;
  }
  else{
    alert("Invalid");
  }
}


function calculate(val){

  let option = document.getElementById("cars").value;

let can={
  price:1500,
}
let dinner={
 price:2500,
}
let buffect={
 price:700,
}
let birth={
 price:3000,
}

if(option=="candle"){
 let a  = parseInt(can.price*val)+15;
 document.getElementById("total").value = a;
}

if(option=="dinner"){
  let a  = parseInt(can.price*val);
  document.getElementById("total").value = a;
 }

 if(option=="birthday"){
  let a  = parseInt(can.price*val);
  document.getElementById("total").value = a;
 }

 if(option=="buffet"){
  let a  = parseInt(can.price*val);
  document.getElementById("total").value = a;
 }
}



 function abc(){
let mailid = document.getElementById("mail").value;
let name = document.getElementById("name").value;
let con = document.getElementById("conatct").value;
let option = document.getElementById("cars").value;
let per = document.getElementById("person").value;
let total = document.getElementById("total").value;
let gst = document.getElementById("gst").value;
let regex = /^([a-z 0-9 \. _]+)@([a-z]+).([a-z]{2,6})(.[a-z]{2,6})?$/; 
if(mailid=="" || name==""  ||  con==""  || option=="" ){
  alert("invalid");
}
else if(regex.test(mailid)){
  return true;
}
else{
  alert("Invalid details");
}

localStorage.setItem('email',mailid);
localStorage.setItem('name',name);
localStorage.setItem('con',con);
localStorage.setItem('option',option);
localStorage.setItem('person',per);
localStorage.setItem('gst',gst);
localStorage.setItem('total',total);


} 



 window.addEventListener(
  "scroll",
  () => {
    document.body.style.setProperty(
      "--scroll",
      window.scrollY / (document.body.offsetHeight - window.innerHeight)
    );
  },
  false
); 


 const blur = document.querySelector(".main");

const login = document.querySelector(".gal");
window.addEventListener("load", function(){
show();
}
)
function show(){ 
  const time=5;
  let i =0;
  const timer = setInterval(function(){
 i++;
 if(i==time){
  clearInterval(timer);  
    login.classList.add("show");  
 }
  },1000);
}

function remove(){
  login.classList.remove("show");
}  











