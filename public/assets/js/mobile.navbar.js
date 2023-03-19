
const mobileHome = document.querySelector(".mobile_home")
const mobileCalendar = document.querySelector(".mobile_calendar");
const mobileBrain = document.querySelector(".mobile_brain");
const mobilePhone = document.querySelector(".mobile_phone");
const mobileCoins = document.querySelector(".mobile_coins");
const mobileSettings = document.querySelector(".mobile_settings");

const dropdown_home = document.querySelector(
  ".dropdown_home"
);
const dropdown_calendar = document.querySelector(
  ".dropdown_calendars"
);
const dropdown_formations = document.querySelector(
  ".dropdown_formations"
);
const dropdown_astreintes = document.querySelector(
  ".dropdown_astreintes"
);
const dropdown_regie = document.querySelector(
  ".dropdown_regie"
);
const dropdown_settings = document.querySelector(
  ".dropdown_settings"
);

const personnal_group = document.querySelector(
  ".Personnal_group"
);


// Home
mobileHome.addEventListener("mouseover", () => {
  dropdown_calendar.style.display ="none";
  dropdown_formations.style.display = "none";
  dropdown_astreintes.style.display = "none";
  dropdown_regie.style.display = "none";
  dropdown_settings.style.display = "none";
});
mobileHome.addEventListener("mouseout", () => {
  dropdown_home.style.display = "flex";
  dropdown_home.addEventListener("mouseout",() => {
    dropdown_home.style.display = "none";
  });
});

// calendar
mobileCalendar.addEventListener("mouseover", () => {
  dropdown_calendar.style.display = "flex";
  dropdown_formations.style.display = "none";
  dropdown_astreintes.style.display = "none";
  dropdown_regie.style.display = "none";
  dropdown_settings.style.display = "none";
});
mobileCalendar.addEventListener("mouseout", () => {
  dropdown_calendar.style.display = "flex";
  dropdown_calendar.addEventListener("mouseover",() => {
    dropdown_calendar.style.display = "flex";
  });
  dropdown_calendar.addEventListener("mouseout",() => {
    dropdown_calendar.style.display = "none";
  });
});

// Formations
mobileBrain.addEventListener("mouseover", () => {
  dropdown_calendar.style.display ="none";
  dropdown_formations.style.display = "flex";
  dropdown_astreintes.style.display = "none";
  dropdown_regie.style.display = "none";
  dropdown_settings.style.display = "none";
});
mobileBrain.addEventListener("mouseout", () => {
  dropdown_formations.style.display = "flex";
  dropdown_formations.addEventListener("mouseover",() => {
    dropdown_formations.style.display = "flex";
  })
  dropdown_formations.addEventListener("mouseout",() => {
    dropdown_formations.style.display = "none";
  })
});

// Astreintes
mobilePhone.addEventListener("mouseover", () => {
  dropdown_calendar.style.display ="none";
  dropdown_formations.style.display = "none";
  dropdown_astreintes.style.display = "flex";
  dropdown_regie.style.display = "none";
  dropdown_settings.style.display = "none";
});
mobilePhone.addEventListener("mouseout", () => {
  dropdown_astreintes.style.display = "flex";
  dropdown_astreintes.addEventListener("mouseover",() => {
    dropdown_astreintes.style.display = "flex";
  });
  dropdown_astreintes.addEventListener("mouseout",() => {
    dropdown_astreintes.style.display = "none";
  });
});

// Regie
mobileCoins.addEventListener("mouseover", () => {
  dropdown_calendar.style.display ="none";
  dropdown_formations.style.display = "none";
  dropdown_astreintes.style.display = "none";
  dropdown_regie.style.display = "flex";
  dropdown_settings.style.display = "none";
  });
mobileCoins.addEventListener("mouseout", () => {
  dropdown_regie.style.display = "flex";
  dropdown_regie.style.display = "flex";
  dropdown_regie.addEventListener("mouseover",() => {
    dropdown_regie.style.display = "flex";
  });
  dropdown_regie.addEventListener("mouseout",() => {
    dropdown_regie.style.display = "none";
  });
  });
  
// Settings
mobileSettings.addEventListener("mouseover", () => {
  dropdown_calendar.style.display ="none";
  dropdown_formations.style.display = "none";
  dropdown_astreintes.style.display = "none";
  dropdown_regie.style.display = "none";
  dropdown_settings.style.display = "flex";
});
mobileSettings.addEventListener("mouseout", () => {
  dropdown_settings.style.display = "flex";
  dropdown_settings.style.display = "flex";
  dropdown_settings.addEventListener("mouseover",() => {
    dropdown_settings.style.display = "flex";
  });
  dropdown_settings.addEventListener("mouseout",() => {
    dropdown_settings.style.display = "none";
  });
});

personnal_group.addEventListener("mouseover", () => {
  dropdown_calendar.style.display ="none";
  dropdown_formations.style.display = "none";
  dropdown_astreintes.style.display = "none";
  dropdown_regie.style.display = "none";
  dropdown_settings.style.display = "none";
});

