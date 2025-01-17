/* eslint-disable no-undef */
/*
-Define the target date and time for the countdown (Asia/Shanghai timezone)
*/

// const COUNTDOWN_TARGET = new Date('YOUR_TARGET_DATE_HERE');

/*
-Get the countdown elements (add your code here to define the elements)
*/

let interval = null;

//Decrements the values in the countdown.

const updateCountdown = () => {
  const target = new Date('2026-09-22T00:09:00.000+08:00')
  const now = new Date();
  const diff = target - now;

  if (diff <= 0 && interval != null) {
    // The countdown has ended
    clearInterval(interval);
  }

  const formatter = new Intl.NumberFormat('en-US');

  const days = Math.floor(diff / (1000 * 60 * 60 * 24));
  const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((diff % (1000 * 60)) / 1000);

  let daysElem = document.getElementsByClassName('remaining-days')[0];
  let hoursElem = document.getElementsByClassName('remaining-hours')[0];
  let minutesElem = document.getElementsByClassName('remaining-minutes')[0];
  let secondsElem = document.getElementsByClassName('remaining-seconds')[0];


  daysElem.textContent = formatter.format(days).padStart(3, '0');
  hoursElem.textContent = formatter.format(hours).padStart(2, '0');
  minutesElem.textContent = formatter.format(minutes).padStart(2, '0');
  secondsElem.textContent = formatter.format(seconds).padStart(2, '0');
};

//Prepares the countdown.

const initCountdown = () => {
  interval = setInterval(updateCountdown, 1000);
};

//Initialise the countdown
document.addEventListener('DOMContentLoaded', initCountdown);