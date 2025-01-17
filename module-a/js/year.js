const year = new Date();

// Replace the year in the footer
const yearElement = document.getElementsByClassName("year");
yearElement.textContent =
  " ©" + year.getFullYear() + "WorldSkills. All rights reserved. ";
