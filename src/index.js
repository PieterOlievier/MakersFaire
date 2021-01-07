require('./style.css');
{



  const userLevel = () => {
    const badges = document.querySelectorAll(`.badge`)
    console.log(badges)
    let badgeArr = Array.prototype.slice.call(badges);
    console.log(badgeArr.length)
    userLvl = badgeArr.length
    const lvlTxt = document.querySelector(`.lvl-text`)
    console.log(lvlTxt)
    lvlTxt.innerHTML = userLvl
  }


  /*---------------------------------------------------------------------------------------------------------------------------*/


  const init = () => {
   


  };


  init();
}