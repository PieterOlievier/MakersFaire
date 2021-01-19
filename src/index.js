require('./style.css');
//  require(['skrollr'], function(skrollr){
//  	var s = skrollr.init();
//  });
{

const stepNumber = [];

const steps = ["#intro", "#fiets","#voorbereiding", "#step1", "#step2","#step3"];

let currentUrl = window.location.href


  const previousStep = () => {
    if (event.key == 'ArrowLeft') {
      stepNumber.splice(-1,1)
      console.log(stepNumber)
      location.href = steps[stepNumber.length];
      currentUrl = window.location.href
      console.log(currentUrl)
    //playCorrectVideo(currentUrl)
  }
   
  }

  const nextStep = () => {
    if (event.key == 'ArrowRight') {
    const newStep = stepNumber.push("1")
    console.log(stepNumber)
    location.href = steps[stepNumber.length];
    currentUrl = window.location.href
    console.log(currentUrl)
    //playCorrectVideo(currentUrl)
    }
   }






// check 60 keer per seconde ofdat element in viewport is met requestanimationframe
// als dit true weergeeft, haal je de vidoe op en kan je hem laten afspelen en pauzeren




  function checkKey(e) {
    console.log("uitgevoerd")
    var video = document.getElementById('test-video');  
    var key = e.which || e.keyCode;
    if (key === 112){
      video.paused ? video.play() : video.pause();
    };
  }

//   const uitvoeren = () =>{
//   document.addEventListener("keypress", displayDate);

// function displayDate() {
//   console.log("uitgevoerd")
// }
// }



 

function elementInViewport(myElement) {
  
  var bounding = myElement.getBoundingClientRect();
  var myElementHeight = myElement.offsetHeight;
  var myElementWidth = myElement.offsetWidth;

    var bounding = myElement.getBoundingClientRect();

    if (bounding.top >= -myElementHeight 
        && bounding.left >= -myElementWidth
        && bounding.right <= (window.innerWidth || document.documentElement.clientWidth) + myElementWidth
        && bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) + myElementHeight) {

        console.log('Element is in the viewport!');
        document.addEventListener("keypress", checkKey);
        return true;
    } else {

        console.log('Element is NOT in the viewport!');
        return false;
    }
}



function repeatOften() {

  //let el = document.querySelector(".test-video")
  var myElement = document.querySelector(".test-video")
  //console.log(myElement)
  //console.log(document.querySelector(".test-video"))
  elementInViewport(myElement)

  //const spanList = [...document.querySelectorAll"(".test-video")];
  //console.log(spanList)

  //spanList.forEach(element => elementInViewport(element));
  
  
  requestAnimationFrame(repeatOften);
}
requestAnimationFrame(repeatOften);





  /*---------------------------------------------------------------------------------------------------------------------------*/


  const init = () => {

    //document.addEventListener("keypress", checkUrl());
   
    document.addEventListener('keydown', (event) => {
      //console.log("keydown")
      // document.location.href = "http://localhost/integration3/src/index.php?page";
      nextStep()
  });

  document.addEventListener('keyup', (event) => {
    //console.log("keyup")
    // document.location.href = "http://localhost/integration3/src/index.php?page";
    previousStep()
});




  };


  init();
}