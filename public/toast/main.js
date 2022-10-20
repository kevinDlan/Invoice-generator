const successToast = (message) => {
  return iziToast.show({
    // title: "Succès",
    titleColor: '#FFFFFF',
    // icon: "fa fa-check",
    // iconColor:"#FFFFFF",
    position: "topCenter",
    message,
    messageColor:"#FFFFFF",
    color: "#28b463",
    progressBarColor: '#FFFFFF',
  });
};
const errorToast = (message) => {
  return iziToast.show({
    // title: "",
    titleColor: '#FFFFFF',
    // icon: "",
    // iconColor:"#FFFFFF",
    position: "topCenter",
    message,
    messageColor:"#FFFFFF",
    color: "#85c1e9",
    progressBarColor: '#FFFFFF',
  });
};