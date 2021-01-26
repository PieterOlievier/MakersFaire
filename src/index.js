require('./style.css');
//  require(['skrollr'], function(skrollr){
//  	var s = skrollr.init();
//  });
{

  const stepNumber = [];

  const steps = ["#intro", "#fiets", "#voorbereiding", "#step1", "#step2", "#step3", "#step4", "#step5", "#step6", "#step7", "#step8"];

  let currentUrl = window.location.href


  const previousStep = () => {
    if (event.key == 'ArrowLeft') {
      stepNumber.splice(-1, 1)
      console.log(stepNumber)
      location.href = steps[stepNumber.length];
      currentUrl = window.location.href
      console.log(currentUrl)
    }

  }

  const nextStep = () => {
    if (event.key == 'ArrowRight') {
      const newStep = stepNumber.push("1")
      console.log(stepNumber)
      location.href = steps[stepNumber.length];
      currentUrl = window.location.href
      console.log(currentUrl)
    }
  }






  // check 60 keer per seconde ofdat element in viewport is met requestanimationframe
  // als dit true weergeeft, haal je de vidoe op en kan je hem laten afspelen en pauzeren




  function checkKeyStep1(e) {
    console.log("uitgevoerd")
    var video = document.getElementById('step1-clip');
    var key = e.which || e.keyCode;
    if (key === 112) {
      video.paused ? video.play() : video.pause();
    };
  }

  function checkKeyStep4(e) {
    console.log("uitgevoerd")
    var video = document.getElementById('step4-clip');
    var key = e.which || e.keyCode;
    if (key === 112) {
      video.paused ? video.play() : video.pause();
    };
  }

  function checkKeyStep7(e) {
    console.log("uitgevoerd")
    var video = document.getElementById('step7-clip');
    var key = e.which || e.keyCode;
    if (key === 112) {
      video.paused ? video.play() : video.pause();
    };
  }






  function step1ClipInViewport(step1Clip) {

    var bounding = step1Clip.getBoundingClientRect();
    var myElementHeight = step1Clip.offsetHeight;
    var myElementWidth = step1Clip.offsetWidth;

    var bounding = step1Clip.getBoundingClientRect();

    if (bounding.top >= -myElementHeight
      && bounding.left >= -myElementWidth
      && bounding.right <= (window.innerWidth || document.documentElement.clientWidth) + myElementWidth
      && bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) + myElementHeight) {

      //console.log('step1Clip in VP');
      document.addEventListener("keypress", checkKeyStep1);
      return true;
    } else {

      //console.log('step1Clip niet in VP');
      return false;
    }
  }


  function step4ClipInViewport(step4Clip) {

    var bounding = step4Clip.getBoundingClientRect();
    var myElementHeight = step4Clip.offsetHeight;
    var myElementWidth = step4Clip.offsetWidth;

    var bounding = step4Clip.getBoundingClientRect();

    if (bounding.top >= -myElementHeight
      && bounding.left >= -myElementWidth
      && bounding.right <= (window.innerWidth || document.documentElement.clientWidth) + myElementWidth
      && bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) + myElementHeight) {

      //console.log('step1Clip in VP');
      document.addEventListener("keypress", checkKeyStep4);
      return true;
    } else {

      //console.log('step1Clip niet in VP');
      return false;
    }
  }

  function step7ClipInViewport(step7Clip) {

    var bounding = step7Clip.getBoundingClientRect();
    var myElementHeight = step7Clip.offsetHeight;
    var myElementWidth = step7Clip.offsetWidth;

    var bounding = step7Clip.getBoundingClientRect();

    if (bounding.top >= -myElementHeight
      && bounding.left >= -myElementWidth
      && bounding.right <= (window.innerWidth || document.documentElement.clientWidth) + myElementWidth
      && bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) + myElementHeight) {

      //console.log('Element is in the viewport!');
      document.addEventListener("keypress", checkKeyStep7);
      return true;
    } else {

      //console.log('Element is NOT in the viewport!');
      return false;
    }
  }



  function repeatOften() {


    // var myElement = document.querySelector(".step7-clip")

    var step1Clip = document.getElementById('step1-clip')
    step1ClipInViewport(step1Clip)

    var step4Clip = document.getElementById('step4-clip')
    step4ClipInViewport(step4Clip)

    var step7Clip = document.getElementById('step7-clip')
    step7ClipInViewport(step7Clip)




    requestAnimationFrame(repeatOften);
  }
  requestAnimationFrame(repeatOften);




  let step6Tech = document.querySelector(".step6-tech__question");
  step6Tech.addEventListener("click", function () {
    let step6Tech = document.querySelector(".step6-tech");
    console.log(step6Tech)
    step6Tech.classList.remove("hidden");
  });



  let hideStep6Tech = document.querySelector(".step6-tech-hide");
  console.log(hideStep6Tech)
  hideStep6Tech.addEventListener("click", function () {
    console.log("geklikt")
    let step6Tech = document.querySelector(".step6-tech");
    console.log(step6Tech)
    step6Tech.classList.add("hidden");
  });

  // const updateGreeting = () => {
  //   document.getElementById('textbox_id').value
  //   console.log("update uitgevoerd")
  // }

  // var greeting = document.getElementById("voornaam");
  // greeting.onchange = function () {
  //   console.log(greeting.value);
  // }


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