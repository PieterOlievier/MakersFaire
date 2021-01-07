require('./style.css');
{

const urls = [
  "http://localhost/integration3/src/index.php?page=index",
  "http://localhost/integration3/src/index.php?page=step1",
  "http://localhost/integration3/src/index.php?page=step2",
  "http://localhost/integration3/src/index.php?page=step3"
];

const newUrls = [
  "http://localhost/integration3/src/index.php?page=index",
  "http://localhost/integration3/src/index.php?page=step1",
  "http://localhost/integration3/src/index.php?page=step2",
  "http://localhost/integration3/src/index.php?page=step3",
];

const testUrls = [
  "http://localhost/integration3/src/index.php?page=index",
  "http://localhost/integration3/src/index.php?page=step3",
  "http://localhost/integration3/src/index.php?page=step2",
  "http://localhost/integration3/src/index.php?page=step1"
];


  const nextStep = () => {
    if (event.key == 'ArrowUp') {
      console.log(window.location.href)
   url = window.location.href;
   urlIndex = arraycontainsturtles = (urls.indexOf(url));
   console.log(arraycontainsturtles = (urls.indexOf(url)))
   document.location.href = newUrls[urlIndex]
  }
   
  }

  const previousStep = () => {
    if (event.key == 'ArrowDown') {
    console.log(window.location.href)
    url = window.location.href;
    urlIndex = arraycontainsturtles = (urls.indexOf(url));
    console.log(arraycontainsturtles = (urls.indexOf(url)))
    document.location.href = newUrls[urlIndex]
    }
   }


  /*---------------------------------------------------------------------------------------------------------------------------*/


  const init = () => {
   
    document.addEventListener('keydown', (event) => {
      console.log("keydown")
      // document.location.href = "http://localhost/integration3/src/index.php?page";
      nextStep()
  });

  document.addEventListener('keyup', (event) => {
    console.log("keyup")
    // document.location.href = "http://localhost/integration3/src/index.php?page";
    previousStep()
});


  };


  init();
}