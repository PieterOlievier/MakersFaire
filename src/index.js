require('./style.css');
{

  const makeItColorful = () => {
    if (document.querySelector(`.colorful-text`)) {
      const randomColor = [`green-txt`, `red-txt`, `blue-txt`, `darkblue-txt`, `purple-txt`];
      const randNums = [];
      while (randNums.length < 5) {
        let i = Math.floor(Math.random() * 5);
        if (randNums.indexOf(i) === -1) {
          randNums.push(i)
        };
      }
      const $colorfulText = document.querySelectorAll(`.colorful-text`);
      $colorfulText.forEach(element => {
        if (element.textContent.length === 1) {
          element.innerHTML = `<span class="${randomColor[randNums[0]]}">${element.textContent}</span>`;
        } else {
          const splitElement = element.textContent.split('');
          console.log(splitElement);
          if (parseInt(splitElement[1]) > 5 || parseInt(element.textContent) > 50) {
            element.innerHTML = `<span class="${randomColor[randNums[0]]}">${splitElement[0]}</span><span class="${randomColor[randNums[1]]}">${splitElement[1]}</span>`;
          } else {
            element.innerHTML = `<span class="${randomColor[randNums[2]]}">${splitElement[0]}</span><span class="${randomColor[randNums[3]]}">${splitElement[1]}</span>`;
          }
        }

      });
    }
  }


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
    if (document.querySelector(`.lvl-text`)) {
      userLevel();
    }

    if (document.querySelectorAll(`.colorful-text`)) {
      makeItColorful();
    }

    // function clickFunction() {
    //   setTimeout(function () {
    //     const button = document.querySelector(`.sort-week-button`);
    //     button.form.submit();
    //   }, 10);
    // }

    //console.log(document.querySelector(`.colorful-text`).textContent.length)

    if (document.querySelector(`.time__tester`)) {
      const getHour = document.querySelector(`.time__tester`);
      console.log(getHour.value);
    }


  };


  init();
}